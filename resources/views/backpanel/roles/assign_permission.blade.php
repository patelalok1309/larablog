@extends('backpanel.layouts.master')

@section('content')

    @include('layouts.success')

    <h2>Assign Role To {{ $role->name }} </h2>

    <form action="{{ route('role.store.permission', [$role->id]) }}" method="POST">

        @csrf

        <div class="row">
            <div class="col-6">
                <table class="table">
                    @forelse ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <input name="permission[]" type="checkbox" value="{{ $permission->name }}" id="permission" {{ $role->hasPermissionTo($permission->id) ? "checked" : ""}}>
                            </td>
                        </tr>
                    @empty
                        <p>No Permission Added Yet</p>
                    @endforelse
                </table>

                <button type="submit" class="btn btn-primary btn-block rounded">Save Permission</button>
            </div>
        </div>
    </form>
@endsection
