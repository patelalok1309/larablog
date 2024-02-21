@extends('backpanel.layouts.master')

@section('content')
    <a href="{{ route('post.index') }}" class="btn btn-primary"> All Posts</a>
    <div class="d-flex justify-content-between flex-column">
        <h3 class="text-center">Update Post</h3>

        <form action="{{ route('post.update', ['post' => $post->id]) }}" method="POST">
            @csrf
            @method('put')
            <div class='form-group'>
                <label for='name' class='form-label'>Post name : </label>
                <input type='text' name='name' id='name' class='form-control'
                    placeholder='Enter post name ...' value="{{ $post->name }}" />
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block rounded" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection
