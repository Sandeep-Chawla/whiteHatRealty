<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'White Hat Realty')</title>

    <link rel="stylesheet" href="{{url('public/assets/libraries/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('public/assets/customs/css/admin.css')}}">
    @yield('customCss')

</head>


<body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
         @include('layouts.sidebar')

         <!-- right content -->
         <div id="content">
                @include('layouts.header')
               
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  @yield('content')
                  
                  
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <!-- jQuery -->
      
      <script src="{{url('public/assets/libraries/js/jquery.js')}}"></script>
    <script src="{{url('public/assets/libraries/js/bootstrap.min.js')}}"></script>
    <script src="{{url('public/assets/libraries/js/fontsawesome.js')}}"></script>
   </body>

</html>