<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        // return dashboard page
        return view('Users\dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return view
     */
    public function create()
    {
        // return register form
        return view('Users\register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get register form data
        $fname = $request->fname;
        $lname = $request->lname;
        $email = $request->email;
        $password = $request->password;
        $role = $request->role;
        $storedUsers = User::get();
        foreach($storedUsers as $storedUser)
        {
            if($email == $storedUser->email)
            {
                return view('Users\registerError');
            }
        }
        // create new user
        $user = new User();
        // store the data in the database
        if(isset($fname))
        {
            $user->fname = $fname;
        }
        if(isset($lname))
        {
            $user->lname = $lname;
        }
        if(isset($email))
        {
            $user->email = $email;
        }
        if(isset($password))
        {
            $user->password = Hash::make($password);
        }
        if(isset($role))
        {
            $user->role = $role;
        }
        // save the data
        $user->save();
        Auth::attempt(['email' => $email, 'password' => $password]);
        return redirect('/dashboard');
    }

    /**
     * Display login form
     *
     * @return view
     */
    public function login()
    {
        // return login form
        return view('Users\login');
    }

    /**
     * handelLogin function
     * @param Request $request
     * check data for login
     * @return dashboard >> if the user is register
     * @return errorLogin view >> if the user not register
     */

    public function handle_login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return redirect('/dashboard');
        } else {
            return view('Users\loginError');
        }
    }

    /**
     * logout function
     * @return login page after logout
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function notauth()
    {
        // return notauth page
        return view('Users\notauth');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get user with id
        $user = User::where('id', $id)->first();
        if(! isset($user->id))
        {
            return redirect('/notfound');
        }
        if($user->id !== Auth::user()->id)
        {
            // notauth
            return redirect('/notauth');
        } else {
            // return view with user data
            return view('Users\show', compact('user'));
        }
    }

    /**
     * Show users page
     *
     * @return view
     */
    public function show_users()
    {
        // get all users
        $users = User::get();
        // return all users
        return view('Users\showAll', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get user
        $user = User::where('id', $id)->first();
        // return edit form
        return view('Users\edit', compact('user'));
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
        // get register form data
        $fname = $request->fname;
        $lname = $request->lname;
        $email = $request->email;
        $role = $request->role;
        $storedUsers = User::get();
        foreach($storedUsers as $storedUser)
        {
            if($email == $storedUser->email)
            {
                return view('Users\registerError');
            }
        }
        // create new user
        $user = User::where('id', $id)->first();
        if(! isset($user->id))
        {
            return redirect('/notfound');
        }
        // store the data in the database
        if(isset($fname))
        {
            $user->fname = $fname;
        }
        if(isset($lname))
        {
            $user->lname = $lname;
        }
        if(isset($email))
        {
            $user->email = $email;
        }
        if(isset($role))
        {
            $user->role = $role;
        }
        // save the data
        $user->save();
        return redirect('/users/showAll');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get user
        $user = User::where('id', $id)->first();
        if(! isset($user->id))
        {
            return redirect('/notfound');
        }
        // delete
        $user->delete();
        return redirect('/users/showAll');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_account($id)
    {
        // get user
        $user = User::where('id', $id)->first();
        if(! isset($user->id))
        {
            return redirect('/notfound');
        }
        if($user->id === Auth::user()->id)
        {
            $user->delete();
        }
        return redirect('/');
    }
}
