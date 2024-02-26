@extends('backpanel.layouts.master')

@section('content')
    @include('layouts.success')

    <h2>All Comments </h2>

    <div class="d-flex justify-content-between flex-column">
        <table class="table table-hover">

            <tr>
                <th>Name</th>
                <th>Comment</th>
                <th>status</th>
                <th>Actions</th>
            </tr>

            @forelse ($comments as $comment)
                <tr>

                    <td>
                        <p class="font-weight-bold" style="margin-block: 2px">{{ $comment->name }}</p>
                        <p class="text-sm">{{ $comment->email }}</p>
                    </td>
                    <td>{{ $comment->comment }}</td>
                    <td>{{ $comment->status }}</td>

                    <td class="d-flex justify-content-start align-items-center gap-2">

                        @if ($comment->status === 'pending')
                            <form action="{{ route('comment.approve', [$comment->id]) }}" method="POST" style="margin-bottom: 0">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-sm rounded">
                                    <i class="material-icons">done_outline</i>
                                    Approve
                                </button>
                            </form>
                        @endif
                        <a href="{{ route('comment.edit', $comment->id) }}" class="btn btn-warning btn-sm rounded">
                            <i class="material-icons">edit</i>
                            Edit
                        </a>

                        <form action="{{ route('comment.destroy', ['comment' => $comment->id]) }}" method="POST"
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
                    <td colspan="4">No Comments found</td>
                </tr>
            @endforelse
        </table>
    </div>
@endsection
