@extends('backpanel.layouts.master')

@section('content')
    <a href="{{ route('post.index') }}" class="btn btn-primary"> All posts</a>

    <div class="d-flex justify-content-between flex-column">
        <h3 class="text-center">Create A New Post</h3>

        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            {{-- title --}}
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


            {{-- content --}}
            <div class='form-group'>
                <label for='title' class='form-label'>Content </label>
                <textarea name="content" id="content" cols="30" rows="100" class="form-control"
                    placeholder="Enter post content..."></textarea>
            </div>


            {{-- Excerpt --}}
            <div class='form-group'>
                <label for='title' class='form-label'>Excerpt</label>
                <textarea name="excerpt" id="excerpt" cols="30" rows="5" class="form-control"
                    placeholder="Enter excerpt for post..."></textarea>
            </div>


            {{-- Category --}}
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


            {{-- Post Tags --}}
            <div class="form-group">
                <label for="tags">Tags</label>
                <input type="text" name="tags" id="tags" class="form-control"
                    placeholder="Enter Post tags... Multiple Tags should be comma separated">
            </div>


            {{-- Feature Image --}}
            <div class="form-file-group">
                <input type="file" id="file-upload" class="feature-img-input" name="feature_image"
                    onchange="previewFile(this)">
                <p onclick="document.querySelector(`#file-upload`).click()">Drag Your File Here or Click this area to upload
                    <span class="material-symbols-outlined">
                        cloud_upload
                    </span>
                </p>
            </div>


            {{-- Feature Image Preview Box --}}
            <div id="previewBox">
                <img src="" alt="" id="previewImg" class="img">
                <i class="material-icons" onclick="removePreview()">delete</i>
            </div>


            {{-- Save & Publish Button --}}
            <div class="form-group">
                <button class="btn btn-primary rounded" type="submit" value="draft" name="status">Save Post</button>
                <button class="btn btn-success rounded" type="submit" value="publish" name="status">Publish Post</button>
            </div>
        </form>
    </div>

    @section('styles')
        <style>
            .feature-img-input {
                display: none;
            }

            .form-file-group {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 50%;
                min-height: 200px;
                border: 2px dashed rgba(0, 0, 0, 0.4);
                flex-direction: column;
                padding: 20px;
                cursor: pointer;

            }

            .form-file-group p {
                width: 100%;
                height: 100%;
                text-align: center;
                display: flex;
                flex-direction: column;
            }

            #previewBox {
                display: none;
                cursor: pointer;
                margin-top: 20px;
            }

            #previewImg {
                border-radius: 5px;
                width: 50%;
            }

            .bootstrap-tagsinput{
                margin: 0;
                width: 100%;
                padding: 0.5rem 0.75rem 0;
                font-size: 1rem;
                line-height: 1.25;
                transition: border-color 0.15s ease-in-out;
            }

            .bootstrap-tagsinput input{
                margin-bottom: 0.5em;
                background: no-repeat bottom , 50% calc(100% - 1px);
                background-image: none , none;
                background-size: auto;
                width: 70%;
                border: 0;
                height: 36px;
                transition: background 0s ease-out;
                padding-inline: 0; 
                font-size: 14px;
            }

            .bootstrap-tagsinput .label-info{
                display: inline-block;
                background-color: #56575a;
                padding: 0 0.4em 0.15em;
                border-radius: 0.25em;
                margin-bottom: 0.4em;
                color: white;
            }

            .bootstrap-tagsinput .tag [data-role="remove"]::after{
                content: "\00d7"; 
                display: inline-block; 
                margin-inline: 2px; 
            }
        </style>
    @endsection

    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.6.0/bootstrap-tagsinput.min.js"
            integrity="sha512-SXJkO2QQrKk2amHckjns/RYjUIBCI34edl9yh0dzgw3scKu0q4Bo/dUr+sGHMUha0j9Q1Y7fJXJMaBi4xtyfDw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('content', {
                filebrowserUploadUrl: "{{ route('post.upload', ['_token' => csrf_token()]) }}",
                filebrowserUploadMethod: "form"
            });

            function previewFile(input) {
                let file = $("input[type=file]").get(0).files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function() {
                        $("#previewImg").attr('src', reader.result);
                        $("#previewBox").css('display', 'block');
                    }
                    $(".form-file-group").css('display', 'none');
                    reader.readAsDataURL(file);
                }
            }

            function removePreview() {
                $("#previewImg").attr('src', "");
                $("#previewBox").css('display', 'none');
                $(".form-file-group").css('display', 'flex');
            }

            $(document).ready(function(){
                $('input[name="tags"]').tagsinput({
                    trimValue : true,
                    confirmKey : [44],
                    focusClass: ""
                })
            })
        </script>
    @endsection
@endsection
