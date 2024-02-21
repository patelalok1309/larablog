@extends('backpanel.layouts.master')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" permission="alert">
            {{ session('success') }}
        </div>
    @endif

    <h2>All Permissions </h2>
    <a href="{{ route('permission.create') }}" class="btn btn-primary"> Create permissions </a>

    <div class="d-flex justify-content-between flex-column">
        <table class="table table-hover">

            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>

            @forelse ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td>
                    <td class="d-flex justify-content-start align-items-center gap-2">
                        <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-warning btn-sm rounded">
                            <i class="material-icons">edit</i>
                            Edit
                        </a>

                        <form action="{{ route('permission.destroy', ['permission' => $permission->id]) }}" method="POST"
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
                    <td colspan="4">No Permissions found</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
