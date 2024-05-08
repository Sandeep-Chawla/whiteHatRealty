<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'White Hat Realty')</title>

    <link rel="stylesheet" href="{{url('assets/libraries/css/bootstrap.min.css')}}">
    
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('assets/libraries/css/dataTable.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/libraries/css/dataTableResponsive.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/libraries/css/buttons.css')}}">
    
    <link rel="stylesheet" href="{{url('assets/customs/css/admin.css')}}">
    @yield('customCss')
    
    <script src="{{url('assets/libraries/js/jquery.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
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
               <section class="content">
                    <div class="container-fluid">
                      <div class="row justify-content-center">
                      </div>
                    </div>
                  </section>
               
               <div class="middle_cont">
                  @yield('content')
                  
                  
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <!-- jQuery -->
    <script src="{{url('assets/libraries/js/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/libraries/js/fontsawesome.js')}}"></script>
    
    <!-- DataTables  & Plugins -->
        <script src="{{url('assets/libraries/js/jquery.dataTable.min.js')}}"></script>
        <script src="{{url('assets/libraries/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{url('assets/libraries/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{url('assets/libraries/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{url('assets/libraries/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{url('assets/libraries/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{url('assets/libraries/js/jszip.min.js')}}"></script>
        <script src="{{url('assets/libraries/js/pdfmake.min.js')}}"></script>
        <script src="{{url('assets/libraries/js/vfs_fonts.js')}}"></script>
        <script src="{{url('assets/libraries/js/buttons.html5.min.js')}}"></script>
        <script src="{{url('assets/libraries/js/buttons.print.min.js')}}"></script>
        <script src="{{url('assets/libraries/js/buttons.colVis.min.js')}}"></script>
        
        @yield('customJs')
   </body>

</html>