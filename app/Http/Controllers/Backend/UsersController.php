<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\Backend\UpdateRequest;
use App\Http\Requests\Backend\CreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{


    public function index(Request $request)
    {
        $query = User::orderByDesc('id');

        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }

        if (!empty($value = $request->get('name'))) {
            $query->where('name', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('email'))) {
            $query->where('email', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('status'))) {
            $query->where('status', $value);
        }

        if (!empty($value = $request->get('role'))) {
            $query->where('role', $value);
        }

        $users = $query->paginate(20);


        $roles = User::rolesList();

        return view('backend.users.index', compact('users', 'roles'));
    }
    public function create()
    {
        if (!Gate::allows('manage-users')) {
           dd(403);
        }
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
        $roles = User::rolesList();
        return view('backend.users.edit', compact('user','roles'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $user->update($request->only(['name', 'email']));

        if ($request['role'] !== $user->role) {
            //dd($request['role']);
            $user->changeRole($request['role']);
        }
        return redirect()->route('backend.users.show', $user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('backend.users.index');
    }
}
