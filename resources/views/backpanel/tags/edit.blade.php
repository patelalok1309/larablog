@extends('backpanel.layouts.master')

@section('content')
    <a href="{{ route('category.index') }}" class="btn btn-primary"> All Categories</a>
    <div class="d-flex justify-content-between flex-column">
        <h3 class="text-center">Update Category</h3>

        <form action="{{ route('category.update', ['category' => $category->id]) }}" method="POST">
            @csrf
            @method('put')
            <div class='form-group'>
                <label for='name' class='form-label'>Category name : </label>
                <input type='text' name='name' id='name' class='form-control'
                    placeholder='Enter category name ...' value="{{ $category->name }}" />
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block rounded" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection
