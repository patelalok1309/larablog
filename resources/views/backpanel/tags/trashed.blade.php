@extends('backpanel.layouts.master')

@section('content')
    @include('layouts.success')

    <h2>All Trashed Tags </h2>
    <a href="{{ route('tag.create') }}" class="btn btn-primary rounded"> Create Tag </a>
    <a href="{{ route('tag.index') }}" class="btn btn-primary rounded float-right"> All Tags</a>

    <div class="d-flex justify-content-between flex-column">
        <table class="table table-hover">

            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>

            @forelse ($tags as $tag)
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->slug }}</td>

                    <td class="d-flex justify-content-start align-items-center gap-2" >
                        <form action="{{ route('tag.restore', $tag) }}" method="POST" style="margin: 0px 5px ">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-sm rounded">
                                <i class="material-icons">restore</i>
                                restore
                            </button>
                        </form>

                        <form action="{{ route('tag.force.delete', ['tag' => $tag->id]) }}" method="POST"
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
                    <td colspan="4">No Tags found</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
