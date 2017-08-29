<!DOCTYPE html>
<html lang="en" >


<!-- Mirrored from dev.lorvent.com/fitness/news.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2016 10:51:26 GMT -->
<head>
    <meta charset="UTF-8">
    <title>Viky</title>
    <link rel="shortcut icon" href="{{ url('public/favicon.ico')}}" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
   <!--<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/style-responsive.css" rel="stylesheet" type="text/css" media="all"> -->
    <link href="{{ url('public/frontend/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all">

    <link href="{{ url('public/frontend/dropdown/menu/css/bootnap.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{ url('public/frontend/dropdown/menu/css/bootstrap-dropdownhover.min.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{ url('public/frontend/slide/css/animate.css')}}" rel="stylesheet" type="text/css" >
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="{{ url('public/frontend/dropdown/menu/css/demonew.css')}}" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="{{ url('public/frontend/dropdown/sidebar/css/reset.css')}}"> <!-- CSS reset -->
    <link rel="stylesheet" href="{{ url('public/frontend/dropdown/sidebar/css/stylene.css')}}"> <!-- Resource style -->
    <script src="{{ url('public/frontend/dropdown/sidebar/js/modernizr.js')}}"></script> <!-- Modernizr -->
    <link href="{{ url('public/frontend/slide/css/slidenew.css')}}" rel="stylesheet" type="text/css" >
        <link href="{{ url('public/frontend/product/css/product.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{ url('public/frontend/css/footernew.css')}}" rel="stylesheet" type="text/css" >

    <link href="{{ url('public/frontend/slide/css/owl.theme.default.min.css')}}" rel="stylesheet" type="text/css" >
        <link href="{{ url('public/frontend/slide/css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css"/>

    @yield('css')

    <!--page level css -->
 <style>

</style>
</head>

<body  >
    <!-- header logo: style can be found in header-->


    <header class="header">
       @include('frontend.layout.headerfrontend')
      
    </header>

    <div class="container">

<div class="row" >

  <div class="col-md-3 ">
       @include('frontend.layout.sidebar')

  </div>
  <div class="col-md-9" >
    <!-- slide -->
    @yield('content')

    <!--end slide -->
  </div>

</div>       
<br>
 
<!--Liên hệ-->
<br>
<div class="row">
<div class="col-md-1 ">
      </div>
  <div class="col-md-6 ">
        <div class="block-news block-left1">
                <h4><span>Liên hệ</span></h4><br>
                <p ><b class="mauchu">Người đại diện: </b><b class="nguoidaidien">Vũ Mạnh Quang</b></p>
                <br>
                <p><i class="text-primary glyphicon glyphicon-map-marker"></i> <b class="nguoidaidien">Địa chỉ: </b><b class="mauchu"> 23/51 Bạch Đằng-Hạ Lý- Hồng Bàng- Hải Phòng</b></p>
                <br>
                <p><i class="text-primary glyphicon glyphicon-earphone"></i> <b class="nguoidaidien">Điện thoại: </b><b class="mauchu"> 0903925124</b></p>
                 <br>
                <p><i class="text-primary glyphicon glyphicon-envelope"></i> <b class="nguoidaidien">Email: </b><b class="mauchu"> manhquangit@gmail.com</b></p>
                <br>
                 <a href="https://www.facebook.com/bootsnipp"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
              <a href="https://twitter.com/bootsnipp"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
              <a href="https://plus.google.com/+Bootsnipp-page"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
              <a href="mailto:bootsnipp@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
                </div>
  </div>
  <div class="col-md-4 ">
      <div class="block-news block-left1">
                <h4><span>Fanpage trên Facebook</span></h4>
                
                    <ul>  
                        <li>
                          <div> 
                           <iframe src="http://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/yvesrocherinvietnam&amp;width=350&amp;height=200&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;border_color&amp;header=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:200px;" allowtransparency="true">
                   </iframe>
                   </div>
                        </li>
                        
                        
                    </ul> <br>
     
                </div>
    
  </div>
    <div class="col-md-1 ">
      </div>
</div><br>
<!--end liên hệ-->

    </div>
<footer id="footer">
    @include('frontend.layout.footer')
</footer>



<script type="text/javascript" src="{{ url('public/frontend/js/jquery-1.11.2.min.js')}}"></script>
<script  src="{{ url('public/frontend/bootstrap/js/bootstrap.min.js')}}"></script>
<script  src="{{ url('public/frontend/dropdown/menu/js/bootsnip.js')}}"></script>
<script  src="{{ url('public/frontend/dropdown/menu/js/bootstrap-dropdownhover.min.js')}}"></script>
<script src="{{ url('public/frontend/dropdown/sidebar/js/jquery-2.1.1.js')}}"></script>
<script src="{{ url('public/frontend/dropdown/sidebar/js/jquery.menu-aim.js')}}"></script> <!-- menu aim -->
<script src="{{ url('public/frontend/dropdown/sidebar/js/main.js')}}"></script>
<script src="{{ url('public/frontend/slide/js/slide.js')}}"></script>
<script src="{{ url('public/frontend/slide/js/ifvisible.js')}}"></script>

<script src="{{ url('public/frontend/product/js/productb.js')}}"></script>

        <script src="{{ url('public/frontend/slide/js/owl.carousel.js')}}" type="text/javascript"></script>

    @yield('script')
</body>


<!-- Mirrored from dev.lorvent.com/fitness/news.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2016 10:51:27 GMT -->
</html>
