@extends('backpanel.layouts.master')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <h2>All Users </h2>
    <a href="{{ route('user.create') }}" class="btn btn-primary"> Create User</a>

    <div class="d-flex justify-content-between flex-column">
        <table class="table table-hover">

            <tr>
                <th>Thumb</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>

            @forelse ($users as $user)
                <tr>
                    <td><img src="{{ $user->avatar }}" alt="avatar" height="90px" width="120px" class="img img-thumbnail">
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->getRoleNames()->first() }}</td>
                    <td>
                        <div class="d-flex justify-content-start align-items-center gap-2">
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm rounded">
                                <i class="material-icons">edit</i>
                                Edit
                            </a>
                            <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="POST"
                                style="margin-bottom: 0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm rounded">
                                    <i class="material-icons">delete</i>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No users found</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
