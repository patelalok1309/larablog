<!doctype html>
<html lang="en">

<head>
    <title>Larablog Admin Side</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Material Kit CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="{{asset('back-assets/css/material-dashboard.min.css')}}" rel="stylesheet" />
    @yield('styles')
</head>

<body>
<div class="wrapper ">
    @include('backpanel.layouts.sidebar')
    <div class="main-panel">
        @include('backpanel.layouts.topbar')
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

    </div>
</div>

@yield('scripts')
</body>

</html>
