<?php

namespace TCableBilling\Http\Controllers;

use Illuminate\Http\Request;

use TCableBilling\Http\Models\User;

/**
 * Class UsersController
 *
 * @package TCableBilling\Http\Controllers
 */
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->role != 'Admin')
            return \Redirect::to('home');
        $users = User::paginate(150);
        return view('users.all', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Auth::user()->role != 'Admin')
            return \Redirect::to('home');
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (\Auth::user()->role != 'Admin')
            return \Redirect::to('home');
        $user = new User;
        $user->name = \Input::get('name');
        $user->username = \Input::get('username');
        $user->email = \Input::get('email');
        $user->role = \Input::get('role');
        $user->password = bcrypt(\Input::get('password'));
        if (\Input::get('password') == \Input::get('password_confirmation')) {
            $user->save();
            \Alert::success('Your requested user has been created.', 'User Created !');
        }
        return \Redirect::to('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return \Redirect::to('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (\Auth::user()->role != 'Admin')
            return \Redirect::to('home');
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
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
        if (\Auth::user()->role != 'Admin')
            return \Redirect::to('home');
        $user = User::findOrFail($id);
        $user->name = \Input::get('name');
        $user->email = \Input::get('email');
        $user->role = \Input::get('role');
        $user->password = bcrypt(\Input::get('password'));
        if (\Input::get('password') == \Input::get('password_confirmation')) {
            $user->save();
            \Alert::success('Your requested user has been updated.', 'User Updated !');
        }
        return \Redirect::to('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (\Auth::user()->role != 'Admin')
            return \Redirect::to('home');
        $user = User::findOrFail($id);
        $user->delete();
        \Alert::info('Your requested user has been deleted.', 'User Deleted !');
        return \Redirect::to('/users');
    }
}
