@extends('backpanel.layouts.master')

@section('content')
    <h2>Create Tag </h2>
    <a href="{{ route('tag.index') }}" class="btn btn-primary"> All tags</a>

    <div class="d-flex justify-content-between flex-column">
        <h3 class="text-center">Create A New Tag</h3>
        <form action="{{ route('tag.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class='form-group'>
                <label for='name' class='form-label'>tag Name : </label>
                <input type='text' name='name' id='name' class='form-control' placeholder='Enter Tag name...' />
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
