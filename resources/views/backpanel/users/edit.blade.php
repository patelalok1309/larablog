@extends('backpanel.layouts.master')

@section('content')
    <h2>All Users </h2>
    <a href="{{ route('user.index') }}" class="btn btn-primary"> All User</a>
    <div class="d-flex justify-content-between flex-column">
        <h3 class="text-center">Update User</h3>

        <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class='form-group'>
                <label for='name' class='form-label'>Username : </label>
                <input type='text' name='name' id='name' class='form-control' placeholder='Enter username...'
                    value="{{ $user->name }}" />
            </div>

            <div class='form-group'>
                <label for='email' class='form-label'>Email</label>
                <input type='email' name='email' id='email' class='form-control' placeholder='Enter your mail...'
                    value="{{ $user->email }}" />
            </div>

            <div class="form-group col-4" style="padding-left:0px">
                <label for="role">Role:</label>
                <select id="role" name="role" class="form-control">
                    @foreach ($AllRoles as $key)
                        <option value="{{ $key->name }}" {{ $key->name == $role ? 'selected' : '' }}>
                            {{ strtoupper($key->name) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class='form-group'>
                <label for='password' class='form-label'>Password</label>
                <input type='password' name='password' id='password' class='form-control' placeholder='Enter Password..'
                    value="{{ $user->password }}" />
            </div>

                <div class="img img-thumbnail my-2">
                    <img src="{{ $user->avatar }}" alt="avatar" height="90px" width="120px" class="img img-thumbnail"
                        id="previewImg">
                </div>
                Avatar : <input type="file" name="avatar" id="avatar">
                Remove Avatar: <input type="checkbox" name="removeAvatar" id="removeAvatar">

            <div class="form-group">
                <button class="btn btn-primary btn-block rounded" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection

@section('footer')
    <script>
        $(document).ready(function() {
            console.log($('#avatarUpdated').val());

            var avatarImgUrl = $('#previewImg').attr('src');

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#previewImg').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $('#avatar').change(function() {
                readURL(this);
            })

        })
    </script>
@endsection
