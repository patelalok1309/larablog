@extends('backpanel.layouts.master')

@section('content')
    <a href="{{ route('post.index') }}" class="btn btn-primary"> All posts</a>

    <div class="d-flex justify-content-between flex-column">
        <h3 class="text-center">Create A New Post</h3>

        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class='form-group'>
                <label for='title' class='form-label'>Post Title : </label>
                <input type='text' name='title' id='title' class='form-control'
                    placeholder='Enter Post title...' />
                <span class="text-sm text-danger fs-1">
                    @error('title')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class='form-group'>
                <label for='title' class='form-label'>Content </label>
                <textarea name="content" id="content" cols="30" rows="100" class="form-control"
                    placeholder="Enter post content..."></textarea>
            </div>  

            <div class='form-group'>
                <label for='title' class='form-label'>Excerpt</label>
                <textarea name="excerpt" id="excerpt" cols="30" rows="5" class="form-control"
                    placeholder="Enter excerpt for post..."></textarea>
            </div>

            <div class='form-group'>
                <label for='title' class='form-label'>Select Category: </label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="0" disabled selected>select category</option>
                    @forelse ($categories as $category)
                        <option value="{{ $category->id }} ">{{ $category->name }}</option>
                    @empty
                        <option value="" disabled>No category found</option>
                    @endforelse
                </select>
            </div>


            <div class="form-group">
                <button class="btn btn-primary rounded" type="submit" value="draft" name="status">Save Post</button>
                <button class="btn btn-success rounded" type="submit" value="publish" name="status">Publish Post</button>
            </div>
        </form>
    </div>

    @section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
                .create( document.querySelector( '#content' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
</script>
    @endsection
@endsection
