@extends('backpanel.layouts.master')

@section('content')
    @include('layouts.success')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="row">   
                    <div class="col-12">
                        <h2>Site Setting</h2>
                    </div>
                    <div class="col-lg-6 col-12">
                        <h3>Site Info</h3>
                        @include('backpanel.components.site-info')
                    </div>
                    <div class="col-lg-6 col-12">
                        <h3>Site social links</h3>
                        @include('backpanel.components.site-social-links')
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <h2>Site Owner Setting</h2>
                    </div>
                    <div class="col-lg-6 col-12">
                        <h3>Site Owner Info</h3>
                        @include('backpanel.components.site-owner-info')
                    </div>
                    <div class="col-lg-6 col-12">
                        <h3>Site Owner Social Links</h3>
                        @include('backpanel.components.site-owner-social-links')
                    </div>
                </div>

                <h3>Copyright Text</h3>
                @include('backpanel.partials.textarea-input', [
                    'id' => 'copyright_text',
                    'title' => 'Copyright Text',
                ])

                <button class="btn btn-primary btn-round btn-block" type="submit">Save Settings</button>

            </form>
        </div>
    </div>
@endsection
