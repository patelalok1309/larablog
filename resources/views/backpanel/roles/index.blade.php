@extends('backpanel.layouts.master')

@section('content')
    @include('layouts.success')

    <h2>All Roles </h2>
    <a href="{{ route('role.create') }}" class="btn btn-primary"> Create Roles </a>

    <div class="d-flex justify-content-between flex-column">
        <table class="table table-hover">

            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>

            @forelse ($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td class="d-flex justify-content-start align-items-center gap-2">


                        <a href="{{ route('role.assign.permission' , $role) }}" class="btn btn-success btn-sm rounded">
                            <i class="material-icons">rocket_launch</i>
                            Assigning Permission    
                        </a>
                        <a href="{{ route('role.edit', $role->id) }}" class="btn btn-warning btn-sm rounded">
                            <i class="material-icons">edit</i>
                            Edit
                        </a>

                        <form action="{{ route('role.destroy', ['role' => $role->id]) }}" method="POST"
                            style="margin-bottom: 0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded">
                                <i class="material-icons">delete</i>
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No Roles found</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
