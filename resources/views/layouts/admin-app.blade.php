<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'White Hat Realty')</title>

    <link rel="stylesheet" href="{{url('assets/libraries/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/customs/css/style.css')}}">
    @yield('customCss')
    <script src="{{url('assets/libraries/js/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/libraries/js/jquery.js')}}"></script>
    <script src="{{url('assets/libraries/js/fontsawesome.js')}}"></script>

</head>

<body>
    <!--Main Navigation-->
    <header>
        @include('layouts.sidebar')

        @include('layouts.header')
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 58px;">
        <div class="container pt-4">
            @yield('content')
        </div>
    </main>
    <!--Main layout-->
    @yield('customJs')
</body>

</html>