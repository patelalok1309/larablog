@extends('backpanel.layouts.master')

@section('content')
    <h2>Create Comment </h2>
    <a href="{{ route('comment.index') }}" class="btn btn-primary"> All Comment</a>

    <div class="d-flex justify-content-between flex-column">
        <h3 class="text-center">Create A New Comment</h3>
        <form action="{{ route('comment.update', [$comment]) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <div class='form-group'>
                <label for='name' class='form-label'>Comment Name : </label>
                <textarea type='text' name='comment' id='name' class='form-control' placeholder='Enter Comment ...'> {{ $comment->comment }}</textarea>
                <span class="text-sm text-danger fs-1">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block rounded" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection
