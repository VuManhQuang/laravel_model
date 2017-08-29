<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from dev.lorvent.com/fitness/admin_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2016 10:54:53 GMT -->
<head>
    <title>Xin mời bạn đăng nhập để vào quản lý</title>
    <link rel="shortcut icon" href="{{ url('public/favicon.ico')}}" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="{{ url('public/backend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/backend/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- end of global css-->
    <!-- page level styles-->
    <link href="{{ url('public/backend/vendors/iCheck/skins/all.css')}}" rel="stylesheet" type="text/css">
    <link type="text/css" href="{{ url('public/backend/vendors/bootstrapvalidator/dist/css/bootstrapValidator.css')}}" rel="stylesheet" />
    <link href="{{ url('public/backend/css/custom_css/admin-login.css')}}" rel="stylesheet" type="text/css">
    <!-- end of page level styles-->
</head>

<body>
    <div class="container">
        <div class="full-content-center">
            <div class="box bounceInLeft animated">
                <img src="{{ url('public/backend/logo.png')}}"  class="logo" alt="image not found">
                <h3 class="text-center">Quản lý</h3>
                <form class="form" id="log_in" method="post" action="{!! route('backend.getLogin') !!}">
                  <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
                    <div class="form-group">
                        <label class="sr-only"></label>
                        <input type="text" class="form-control" name="username" placeholder="Tài khoản" required >
                    </div>
                    <div class="form-group">
                        <label class="sr-only"></label>
                        <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
                    </div>
                    <div class="checkbox text-left">
                        <label>
                            <input type="checkbox"> Lưu mật khẩu
                        </label>
                    </div>
                    <input type="submit" class="btn btn-block btn-warning" value="Đăng nhập">
                </form>
                <p class="text-right"><a href="user_forgot.html" class="text-warning forgot_color">Quên mật khẩu ?</a></p>
                <div class="row">
                <div class="col-lg-12">
                           @if(Session::has('flash_message'))
                        <div class="alert alert-{!! Session::get('flash_level') !!} ">
                            {!! Session::get('flash_message') !!}
                        </div>
                     @endif
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- global js -->
    <script src="{{ url('public/backend/js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ url('public/backend/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <script src="{{ url('public/backend/vendors/iCheck/icheck.min.js')}}" type="text/javascript"></script>
    <script src="{{ url('public/backend/vendors/bootstrapvalidator/dist/js/bootstrapValidator1.js')}}" type="text/javascript"></script>
    <script src="{{ url('public/backend/js/custom_js/login2.js')}}" type="text/javascript"></script>
    <!-- end of page level js -->
</body>


<!-- Mirrored from dev.lorvent.com/fitness/admin_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2016 10:54:54 GMT -->
</html>
