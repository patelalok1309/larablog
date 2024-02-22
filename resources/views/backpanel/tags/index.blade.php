@extends('backpanel.layouts.master')

@section('content')
    @include('layouts.success')

    <h2>All Categorys </h2>
    <a href="{{ route('category.create') }}" class="btn btn-primary rounded"> Create Categories </a>
    <a href="{{ route('category.trashed') }}" class="btn btn-danger rounded float-right">
        <i class="material-icons">delete</i> trash
    </a>

    <div class="d-flex justify-content-between flex-column">
        <table class="table table-hover">

            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>

            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>

                    <td class="d-flex justify-content-start align-items-center gap-2">
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm rounded">
                            <i class="material-icons">edit</i>
                            Edit
                        </a>

                        <form action="{{ route('category.destroy', ['category' => $category->id]) }}" method="POST"
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
                    <td colspan="4">No Categorys found</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
