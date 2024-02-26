@extends('backpanel.layouts.master')

@section('content')

    <h2>All Users </h2>
    <a href="{{ route('user.index') }}" class="btn btn-primary"> All User</a>
    <div class="d-flex justify-content-between flex-column">
        <h3 class="text-center">Create A New User</h3>

        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class='form-group'>
                <label for='name' class='form-label'>Username : </label>
                <input type='text' name='name' id='name' class='form-control' placeholder='Enter username...' />
                <span class="text-sm text-danger fs-1">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class='form-group'>
                <label for='email' class='form-label'>Email</label>
                <input type='email' name='email' id='email' class='form-control' placeholder='Enter your mail...' />
                <span class="text-sm text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="form-group col-4" style="padding-left:0px">
                <label for="role">Role:</label>
                <select id="role" name="role" class="form-control">
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ strtoupper($role->name) }}</option>
                    @endforeach
                </select>
                <span class="text-sm text-danger">
                    @error('role')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class='form-group'>
                <label for='password' class='form-label'>Password</label>
                <input type='password' name='password' id='password' class='form-control' placeholder='Enter Password..' />
                <span class="text-sm text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <input type="file" name="avatar" id="avatar" class="form-control my-2">
            <span class="text-sm text-danger">
                @error('avatar')
                    {{ $message }}
                @enderror
            </span>

            <div class="form-group">
                <button class="btn btn-primary btn-block rounded" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection
