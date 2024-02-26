@extends('backpanel.layouts.master')

@section('content')
    @include('layouts.success')

    <h2>All Posts </h2>
    <a href="{{ route('post.create') }}" class="btn btn-primary rounded"> Create Posts </a>
    <a href="{{ route('post.trashed') }}" class="btn btn-danger rounded float-right">
        <i class="material-icons">delete</i> trash
    </a>

    <div class="d-flex justify-content-between flex-column">
        <table class="table table-hover">

            <tr>
                <th>Thumb</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

            @forelse ($posts as $post)
                <tr>
                    <td><img src="{{ $post->url }}" alt="post thumbnail" class="img img-thumbnail" height="150  px"
                            width="100px"></td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->status }}</td>

                    <td class="d-flex justify-content-start align-items-center gap-2">
                        <a href="{{ route('single.post', [$post->slug]) }}" class="btn btn-success btn-sm rounded">
                            <i class="material-icons">remove_red_eye</i>
                            View
                        </a>

                        @can('update', $post)
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning btn-sm rounded">
                                <i class="material-icons">edit</i>
                                Edit
                            </a>
                        @endcan

                        @can('delete', $post)
                            <form action="{{ route('post.destroy', ['post' => $post->id]) }}" method="POST"
                                style="margin-bottom: 0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm rounded">
                                    <i class="material-icons">delete</i>
                                    Delete
                                </button>
                            </form>
                        @endcan
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
