@extends('backpanel.layouts.master')

@section('content')
    <a href="{{ route('role.index') }}" class="btn btn-primary"> All User</a>
    <div class="d-flex justify-content-between flex-column">
        <h3 class="text-center">Update Role</h3>

        <form action="{{ route('role.update', ['role' => $role->id]) }}" method="POST" >
            @csrf
            @method('put')
            <div class='form-group'>
                <label for='name' class='form-label'>Role name : </label>
                <input type='text' name='name' id='name' class='form-control' placeholder='Enter role name ...'
                    value="{{ $role->name }}" />
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block rounded" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection

