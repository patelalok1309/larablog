@extends('backpanel.layouts.master')

@section('content')
    @include('layouts.success')

    <h2>All Tags </h2>
    <a href="{{ route('tag.create') }}" class="btn btn-primary rounded"> Create Tags </a>
    <a href="{{ route('tag.trashed')}}" class="btn btn-danger rounded float-right">
        <i class="material-icons">delete</i> trash
    </a>
    {{-- {{ route('tag.trashed') }} --}}
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

                    <td class="d-flex justify-content-start align-items-center gap-2">
                        <a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-warning btn-sm rounded">
                            <i class="material-icons">edit</i>
                            Edit
                        </a>

                        <form action="{{ route('tag.destroy', ['tag' => $tag->id]) }}" method="POST"
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
                    <td colspan="4">No Tags found</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
