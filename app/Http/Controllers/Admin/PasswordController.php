<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePasswordRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\MassDestroyPasswordRequest;
use App\Password;
use App\Tag;
use App\User;
use Auth;


class PasswordController extends Controller
{

    public function index()
    {
        $passwords = Password::where('owner', Auth::user()->id)->get();

        return view('password.index', compact('passwords'));
    }
    
    public function authonticatedIndex()
    {
        $user_id = Auth::user()->id;
        $userPasses = DB::table('password_user')->where('user_id', $user_id)->pluck('password_id');
        $passwords = Password::whereIn('id', $userPasses)->get();

        return view('password.authonticatedIndex', compact('passwords'));
    }

    public function show(Password $password)
    {
        $user_id = Auth::user()->id;
        $ownerPasses = Password::where('owner', $user_id)->get()->pluck('id')->toArray();
        $userPasses = DB::table('password_user')->where('user_id', $user_id)->pluck('password_id')->toArray();
        $passes = array_merge($ownerPasses, $userPasses);

        if (in_array($password->id, $passes)) {
            $password->load('tags', 'users');
            return view('password.show', compact('password'));
        } else {
            return redirect()->route('admin.passwords.index');
        }
    }

    public function create()
    {
        $tags = Tag::where('owner', Auth::user()->id)->pluck('name', 'id');
        $users = User::all()->except(Auth::id())->pluck('name', 'id');
        return view('password.create', compact(['tags', 'users']));
    }

    public function store(StorePasswordRequest $request)
    {
        if ( $password = Password::create($request->owner($request)->except('tags', 'users'))) {
            $password->tags()->sync($request->input('tags', []));
            $password->users()->sync($request->input('users', []));
        }

        return redirect()->route('admin.passwords.index');
    }

    public function edit(Password $password)
    {
        $user_id = Auth::user()->id;
        if ($password->owner == $user_id) {
            $password->load('tags', 'users');
            $tags = Tag::where('owner', $user_id)->pluck('name', 'id');
            $users = User::all()->except(Auth::id())->pluck('name', 'id');
            $authonticatedUsers = DB::table('password_user')->where('password_id', $password->id)->select('user_id')->get();
            return view('password.edit', compact('password','tags','users','authonticatedUsers'));
        } else {
            return redirect()->route('admin.passwords.index');
        }
    }

    public function update(UpdatePasswordRequest $request, Password $password)
    {
        $user_id = Auth::user()->id;
        if ($password->owner == $user_id) {
            $password->update($request->all());
            $password->tags()->sync($request->input('tags', []));
            $password->users()->sync($request->input('users', []));

            return redirect()->route('admin.passwords.index');
        } else {
            return redirect()->route('admin.passwords.index');
        }
    }

    public function destroy(Password $password)
    {
        $user_id = Auth::user()->id;
        if ($password->owner == $user_id) {
            $password->delete();
            return back();
        } else {
            return redirect()->route('admin.passwords.index');
        }
    }

    public function massDestroy(MassDestroyPasswordRequest $request)
    {
        $user_id = Auth::user()->id;
        foreach (request('ids') as  $id) {
            $password = Password::where('id', $id)->first();
            if ($password->owner == $user_id) {
                $password->delete();
            } 
        }
        return back();
    }
}
