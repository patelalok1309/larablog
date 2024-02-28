@extends('backpanel.layouts.master')
@section('content')
    <h2>Dashboard</h2>

    <div class="row">
        <div class="col-2">
            <div class="card bg-primary">
                <div class="card-header d-flex justify-content-center align-items-center  m-2" style="gap: 3px;">
                    <b>Author</b>
                    <i class="material-icons">person</i>
                </div>
                <div class="card-body text-center">
                    Count : {{ $users }}
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card bg-secondary">
                <div class="card-header d-flex justify-content-center align-items-center m-2" style="gap: 3px;">
                    <b>Post</b>
                    <i class="material-icons">article</i>
                </div>
                <div class="card-body text-center">
                    Count : {{ $posts }}
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card bg-danger">
                <div class="card-header d-flex justify-content-center align-items-center m-2" style="gap: 3px;">
                    <b>Role</b>
                    <i class="material-icons">group_work</i>
                </div>
                <div class="card-body text-center">
                    Count : {{ $roles }}
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card bg-success">
                <div class="card-header d-flex justify-content-center align-items-center m-2" style="gap: 3px;">
                    <b>Permission</b>
                    <i class="material-icons">message</i>
                </div>
                <div class="card-body text-center">
                    Count : {{ $comments }}
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card bg-info">
                <div class="card-header d-flex justify-content-center align-items-center m-2" style="gap: 3px;">
                    <b>Tags</b>
                    <i class="material-icons">tags</i>
                </div>
                <div class="card-body text-center">
                    Count : {{ $tags }}
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card bg-warning">
                <div class="card-header d-flex justify-content-center align-items-center m-2" style="gap: 3px;">
                    <b>Categories</b>
                    <i class="material-icons">all_inbox</i>
                </div>
                <div class="card-body text-center">
                    Count : {{ $categories }}
                </div>
            </div>
        </div>
    </div>
@endsection
