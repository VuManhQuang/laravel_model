<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from dev.lorvent.com/fitness/news.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2016 10:51:26 GMT -->
<head>
    <meta charset="UTF-8">
    <title>Quản trị hệ thống Yvesrocher</title>
    <link rel="shortcut icon" href="{{ url('public/favicon.ico')}}" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- global css -->
    <link type="text/css" href="{{ url('public/backend/css/style.css')}}" rel="stylesheet" />

    <link type="text/css" href="{{ url('public/backend/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{ url('public/backend/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{ url('public/backend/scss/custom_css/metisMenu.css')}}" rel="stylesheet" />

    <link type="text/css" rel="stylesheet" href="{{ url('public/backend/css/custom_css/panel.css')}}" />
    <!-- end of global css -->
    <!--page level css -->
    <link type="text/css" href="{{ url('public/backend/css/custom_css/fitness.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{ url('public/backend/vendors/sweetalert/dist/sweetalert2.css')}}" rel="stylesheet" />
    <link type="text/css" href="{{ url('public/backend/css/custom_css/news.css')}}" rel="stylesheet" />
    <!--end of page level css-->
    <link type="text/css" href="{{ url('public/backend/vendors/summernote/summernote.css')}}" rel="stylesheet" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ url('public/backend/vendors/jasny-bootstrap/css/jasny-bootstrap.css')}}">
    <link type="text/css" href="{{ url('public/backend/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{ url('public/backend/vendors/bootstrapvalidator/dist/css/bootstrapValidator.css')}}" rel="stylesheet" />

    @yield('css')

    <!--page level css -->
  <style type="text/css">
      
  </style>
</head>

<body  >
    <div class="se-pre-con"></div>
    <!-- header logo: style can be found in header-->
    <header class="header">
       @include('backend.layout.header')
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar-->
       @include('backend.layout.sidebar')
            <!-- /.sidebar -->

        </aside>
        <aside class="right-side right-padding">

        @yield('title')

             <div class="container-fluid">
                <div class="row">

                        <div class="col-lg-12">
                     @if(Session::has('flash_message'))
                        <div class="alert alert-{!! Session::get('flash_level') !!} ">
                            {!! Session::get('flash_message') !!}
                        </div>
                     @endif
                    @if(Session::has('flash_loi'))
                            {!! Session::get('flash_loi') !!}
                     @endif
                        </div>
        @yield('content')
                </div>
             </div>
         </aside>
    </div>
    <!--section ends-->
    <!-- /.content -->
    <!-- ./wrapper -->
    <!-- global js -->

    <script src="{{ url('public/backend/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ url('public/backend/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{ url('public/backend/js/custom_js/app.js')}}" type="text/javascript"></script>
    <script src="{{ url('public/backend/js/custom_js/metisMenu.js')}}" type="text/javascript"></script>
 
    <script src="{{ url('public/backend/vendors/sweetalert/dist/sweetalert2.js')}}" type="text/javascript"></script>
      

    <!-- end of page level js -->

    <script src="{{ url('public/backend/vendors/jasny-bootstrap/js/jasny-bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{ url('public/backend/vendors/summernote/summernote.min.js')}}" type="text/javascript"></script>
    <script src="{{ url('public/backend/vendors/bootstrapvalidator/dist/js/bootstrapValidator1.js')}}" type="text/javascript"></script>
    <script src="{{ url('public/js/myscript.js')}}" type="text/javascript"></script>
    <script src="{{ url('public/backend/js/custom_js/news.js')}}" type="text/javascript"></script>

<script type="text/javascript">$('#modalbaoloi').modal('show');
</script>
    <script src="{{ url('public/backend/vendors/datatables/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>

    @yield('script')
</body>


<!-- Mirrored from dev.lorvent.com/fitness/news.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2016 10:51:27 GMT -->
</html>
