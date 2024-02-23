@extends('backpanel.layouts.master')

@section('content')
    <a href="{{ route('tag.index') }}" class="btn btn-primary"> All Tags</a>
    <div class="d-flex justify-content-between flex-column">
        <h3 class="text-center">Update Tag</h3>

        <form action="{{ route('tag.update', ['tag' => $tag->id]) }}" method="POST">
            @csrf
            @method('put')
            <div class='form-group'>
                <label for='name' class='form-label'>Tag name : </label>
                <input type='text' name='name' id='name' class='form-control'
                    placeholder='Enter tag name ...' value="{{ $tag->name }}" />
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block rounded" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection
