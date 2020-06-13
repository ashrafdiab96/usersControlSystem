<?php

namespace App\Http\Controllers;

use App\Finance;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * Show operations page
     *
     * @return view
     */
    public function show_operations()
    {
        // get all finances
        $finance = Finance::get();
        // return finance view
        return view('Finance\show', compact('finance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        // return form
        return view('Finance\create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = $request->project;
        $tech = $request->tech;
        $cost = $request->cost;
        $finance = new Finance();
        if(isset($project))
        {
            $finance->project = $project;
        }
        if(isset($tech))
        {
            $finance->tech = $tech;
        }
        if(isset($cost))
        {
            $finance->cost = $cost;
        }
        $finance->save();
        return redirect('/finance/show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return view
     */
    public function edit($id)
    {
        // get the specific finance
        $finance = Finance::where('id', $id)->first();
        // return edit form
        return view('Finance\edit', compact('finance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = $request->project;
        $tech = $request->tech;
        $cost = $request->cost;
        $finance = Finance::where('id', $id)->first();
        if(! isset($finance->id))
        {
            return redirect('/notfound');
        }
        if(isset($project))
        {
            $finance->project = $project;
        }
        if(isset($tech))
        {
            $finance->tech = $tech;
        }
        if(isset($cost))
        {
            $finance->cost = $cost;
        }
        $finance->save();
        return redirect('/finance/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $finance = Finance::where('id', $id)->first();
        if(! isset($finance->id))
        {
            return redirect('/notfound');
        }
        $finance->delete();
        return redirect('/finance/show');
    }
}
