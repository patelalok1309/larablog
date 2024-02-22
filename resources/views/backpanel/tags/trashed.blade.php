@extends('backpanel.layouts.master')

@section('content')
    @include('layouts.success')

    <h2>All Trashed Categories </h2>
    <a href="{{ route('category.create') }}" class="btn btn-primary rounded"> Create Category </a>
    <a href="{{ route('category.index') }}" class="btn btn-primary rounded float-right"> All Categories</a>

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

                    <td class="d-flex justify-content-start align-items-center gap-2" >
                        <form action="{{ route('category.restore', $category) }}" method="POST" style="margin: 0px 5px ">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm rounded">
                                <i class="material-icons">restore</i>
                                restore
                            </button>
                        </form>

                        <form action="{{ route('category.force.delete', ['category' => $category->id]) }}" method="POST"
                            style="margin-bottom: 0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm rounded">
                                <i class="material-icons">delete</i>
                                Force Delete
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
