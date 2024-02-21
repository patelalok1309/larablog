@extends('backpanel.layouts.master')

@section('content')
    @include('layouts.success')

    <h2>All Trashed posts </h2>
    <a href="{{ route('post.create') }}" class="btn btn-primary rounded"> Create post </a>
    <a href="{{ route('post.index') }}" class="btn btn-primary rounded float-right"> All Posts</a>

    <div class="d-flex justify-content-between flex-column">
        <table class="table table-hover">

            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>

            @forelse ($posts as $post)
                <tr>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->slug }}</td>

                    <td class="d-flex justify-content-start align-items-center gap-2" >
                        <form action="{{ route('post.restore', $post) }}" method="POST" style="margin: 0px 5px ">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm rounded">
                                <i class="material-icons">restore</i>
                                restore
                            </button>
                        </form>

                        <form action="{{ route('post.force.delete', ['post' => $post->id]) }}" method="POST"
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
                    <td colspan="4">No Posts found</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
