@extends('layouts.backend')

@section('content')
    @include('backend.users._nav')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('backend.users.edit', $user) }}" class="btn btn-primary mr-1">Edit</a>

        <form method="POST" action="{{ route('backend.users.destroy', $user) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th>Name</th><td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email</th><td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Role</th>
            <td>
                @if ($user->isAdmin())
                    <span class="badge badge-danger">Admin</span>
                @elseif ($user->isModerator())
                    <span class="badge badge-secondary">Moderator</span>
                @else
                    <span class="badge badge-secondary">User</span>
                @endif
            </td>
        </tr>
        <tbody>
        </tbody>
    </table>
@endsection