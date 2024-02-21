@extends('backpanel.layouts.master')

@section('content')
    <a href="{{ route('permission.index') }}" class="btn btn-primary"> All Permissions</a>
    <div class="d-flex justify-content-between flex-column">
        <h3 class="text-center">Update Permission</h3>

        <form action="{{ route('permission.update', ['permission' => $permission->id]) }}" method="POST" >
            @csrf
            @method('put')
            <div class='form-group'>
                <label for='name' class='form-label'>Permission name : </label>
                <input type='text' name='name' id='name' class='form-control' placeholder='Enter permission name ...'
                    value="{{ $permission->name }}" />
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block rounded" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection

