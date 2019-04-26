<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\Backend\UpdateRequest;
use App\Http\Requests\Backend\CreateRequest;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('id')->paginate(20);
        return view('backend.users.index',compact('users'));
    }
    public function create()
    {
        return view('backend.users.create');
    }
    public function store(CreateRequest $request)
    {
        $user = User::new(
            $request['name'],
            $request['email']
        );
        return redirect()->route('backend.users.show', $user);
    }

    public function show(User $user)
    {
        return view('backend.users.show',compact('user'));
    }

    public function edit(User $user)
    {
        //$roles = User::rolesList();
        return view('backend.users.edit', compact('user'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $user->update($request->only(['name', 'email']));
        /*
        if ($request['role'] !== $user->role) {
            $user->changeRole($request['role']);
        }*/
        return redirect()->route('backend.users.show', $user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('backend.users.index');
    }
}
