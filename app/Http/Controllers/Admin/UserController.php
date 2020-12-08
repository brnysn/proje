<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Auth;

class UserController extends Controller
{
    public function profile()
    {
        $user= User::findOrFail(Auth::user()->id);
        return view('users.profile', compact('user'));
    }

    
    public function edit()
    {
        $user= User::findOrFail(Auth::user()->id);
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request)
    {
        $user= User::findOrFail(Auth::user()->id);
        $user->update($request->all());
        return redirect()->route('admin.users.profile');
    }

}
