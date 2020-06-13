<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operation;

class OperationsController extends Controller
{
    /**
     * Show operations page
     *
     * @return view
     */
    public function show_operations()
    {
        // get all operations
        $ops = Operation::get();
        // return all operations
        return view('Operations\show', compact('ops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        // return register form
        return view('Operations\create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get the data from the form
        $op = $request->op;
        $type = $request->type;
        $tech = $request->tech;
        // create new operation
        $operation = new Operation();
        // store the data
        if(isset($op))
        {
            $operation->operation = $op;
        }
        if(isset($type))
        {
            $operation->type = $type;
        }
        if(isset($tech))
        {
            $operation->tech = $tech;
        }
        // save the data
        $operation->save();
        return redirect('/operations/show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return view
     */
    public function edit($id)
    {
        // return the specific operation
        $op = Operation::where('id', $id)->first();
        if(! isset($op->id))
        {
            return redirect('/notfound');
        }
        // return view with the operation
        return view('Operations\edit', compact('op'));
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
        // return the specific operation
        $op = Operation::where('id', $id)->first();
        // get the data from the form
        $operation = $request->op;
        $type = $request->type;
        $tech = $request->tech;
        // store the data
        $op->operation = $operation;
        $op->type = $type;
        $op->tech = $tech;
        // save the data
        $op->save();
        return redirect('/operations/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $op = Operation::where('id', $id)->first();
        if(! isset($op->id))
        {
            return redirect('/notfound');
        }
        $op->delete();
        return redirect('/operations/show');
    }
}
