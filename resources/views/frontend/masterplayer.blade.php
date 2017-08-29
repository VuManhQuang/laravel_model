<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thế giới phim</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="{{asset('frontend/js/jquery-2.2.0.min.js')}}" type="text/javascript"></script>
   <script src="{{asset('frontend/js/jssor.slider-21.1.6.mini.js')}}" type="text/javascript"></script>
  <script src="{{asset('frontend/js/tgphim.js')}}" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/slick.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/slick-theme.css')}}">
    <!--End Style va Jquerry cua banner anh-->
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/tgphim.css')}}">
  <!--extend css-->
  @yield('header')
  <!--extend css-->
  </head>

  <body class="ui-mobile-viewport ui-overlay-a" style="background-color:#f4f4f4;">
        <header style="font-family: Roboto,'segoe ui',Helvetica,Arial,sans-serif;color:#474747;" >

           <nav class="navbar  navbar-fixed-top" role="navigation"  >



         <div class="row navbar-inverse" style="color:#1c1c1c;">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
          </div>
          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
              <a style="padding: 0px 0 0 0;" class=" navbar-brand" href="#" ><img src="{{asset('frontend/img\icon\logo.jpg')}}" data-at2x="{{asset('frontend/img\icon\logo.jpg')}}" width="120px" height="50px" class="rounded float-xs-left" ></a>
          </div>
          <div class="col-lg-1 col-md-1 col-sm-1 col-xs-3">
          </div>
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
             <div class=" input-group input-group-sm text-right" style="margin-top:10px; "  >
               <input type="text" width="200px" class="form-control" name="search" id="search" placeholder="TÌM KIẾM PHIM" required="">
                    <span class="input-group-btn">
                      <button type="submit"  class="btn btn-info"><i  class="glyphicon glyphicon-search"></i></button>
                    </span>
              </div>
          </div>
         <div class="col-lg-2 col-md-2 col-sm-1 col-xs-1">
          </div>
             <div class="col-lg-3 col-md-3 col-sm-4 col-xs-7 navbar-left text-left" style="margin-top:17px;">
              <a href="#" style="color: white;" title="Đăng Nhập"><b class="glyphicon glyphicon-user"></b> Đăng Nhập</a><b style="color:white"> / </b><a href="#" style="color: white;" title="Đăng Nhập">Đăng Ký</a>
              </div>
    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2" style="margin-top:0px;padding-right:0px;">
              <button type="button"  class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
             <span class="icon-bar"></span>
            </button>
          </div>
          <!-- /.navbar-collapse -->
          </div>
         <div class="row navbar-default">
          <!-- Brand and toggle get grouped for better mobile display -->
           <div class="navbar-header col-lg-1 col-md-1 col-sm-1 ">

           </div>

          <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12 ">

            <!--Collapse menu -->

             <div class=" collapse navbar-collapse navbar-ex1-collapse ">
                           <ul class="nav navbar-nav">
            <!--TV Show-->
            <li class="dropdown" > <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="10"  data-close-others="false" style="font-family: Roboto,'segoe ui',Helvetica,Arial,sans-serif;color:#474747;" >TV Show</a>
     <ul class="dropdown-menu multi-column"  style="width: 400px;" >
      <div class="row" >
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <ul class="multi-column-dropdown" >
         <li><a href="#" >Show Việt Nam</a>
         </li>
         <li><a href="#">Show Mỹ</a>
         </li>
         <li><a href="#">Show Thái Lan</a>
         </li>

        </ul>
       </div>
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <ul class="multi-column-dropdown">
         <li><a href="#">Show Trung Quốc</a>
         </li>
         <li><a href="#">Show Hàn Quốc</a>
         </li>
        </ul>
       </div>
      </div>
     </ul>
    </li>
     <!--End TV Show-->
       <!--Phim Truyền Hình-->
         <li class="dropdown" > <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10"  data-close-others="false" style="font-family: Roboto,'segoe ui',Helvetica,Arial,sans-serif;color:#474747;" >Phim Truyền Hình</a>
     <ul class="dropdown-menu multi-column"  style="width: 614px;" >
      <div class="row" >
       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <ul class="multi-column-dropdown" >
         <li><a href="#" >Phim Việt Nam</a>
         </li>
         <li><a href="#">Phim Âu Mỹ</a>
         </li>
         <li><a href="#">Phim Thái Lan</a>
         </li>

        </ul>
     </div>
       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <ul class="multi-column-dropdown">
         <li><a href="#">Phim Trung Quốc</a>
         </li>
         <li><a href="#">Phim Hàn Quốc</a>
         </li>
         <li><a href="#">Khoa Học-Viễn Tưởng</a>
         </li>
        </ul>
       </div>
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <ul class="multi-column-dropdown">
         <li><a href="#">Phim Hành Động</a>
         </li>
         <li><a href="#">Phim Kinh Dị</a>
         </li>
         <li><a href="#">Phim Tâm Lý</a>
         </li>
        </ul>
       </div>
      </div>
     </ul>
    </li>
    <!--End Phim Truyền Hình-->
           <!--Hoạt Hình-->
         <li class="dropdown" > <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10"  data-close-others="false" style="font-family: Roboto,'segoe ui',Helvetica,Arial,sans-serif;color:#474747;" >Hoạt Hình</a>
     <ul class="dropdown-menu multi-column"  style="width: 400px;" >
      <div class="row" >
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <ul class="multi-column-dropdown" >
         <li><a href="#" >Anime</a>
         </li>
         <li><a href="#">Marvel</a>
         </li>
         <li><a href="#">Dicicomic</a>
         </li>

        </ul>
     </div>
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <ul class="multi-column-dropdown">
         <li><a href="#">Mẹ và Bé</a>
         </li>

        </ul>
       </div>

      </div>
     </ul>
    </li>
    <!--End Hoạt Hình-->
               <!--Hài Hước-->
         <li class="dropdown" > <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10"  data-close-others="false" style="font-family: Roboto,'segoe ui',Helvetica,Arial,sans-serif;color:#474747;">Hài Hước</a>
     <ul class="haihuoc_co dropdown-menu multi-column" >
      <div class="row" >
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <ul class="multi-column-dropdown" >
         <li><a href="#" >Anime</a>
         </li>
         <li><a href="#">Marvel</a>
         </li>
         <li><a href="#">Dicicomic</a>
         </li>

        </ul>
     </div>
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <ul class="multi-column-dropdown">
         <li><a href="#">Mẹ và Bé</a>
         </li>

        </ul>
       </div>

      </div>
     </ul>
    </li>
    <!--End Hài Hước-->
      <!--Phim Lẻ-->
         <li class="dropdown" > <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10"  data-close-others="false" style="font-family: Roboto,'segoe ui',Helvetica,Arial,sans-serif;color:#474747;">Phim Lẻ</a>
     <ul class="phimle_co dropdown-menu multi-column" >
      <div class="row" >
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <ul class="multi-column-dropdown" >
         <li><a href="#" >Anime</a>
         </li>
         <li><a href="#">Marvel</a>
         </li>
         <li><a href="#">Dicicomic</a>
         </li>

        </ul>
     </div>
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <ul class="multi-column-dropdown">
         <li><a href="#">Mẹ và Bé</a>
         </li>

        </ul>
       </div>

      </div>
     </ul>
    </li>
    <!--End Phim Lẻ-->
          <!--Thiếu Nhi-->
         <li class="dropdown" > <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10"  data-close-others="false" style="font-family: Roboto,'segoe ui',Helvetica,Arial,sans-serif;color:#474747;">Thiếu Nhi</a>
     <ul class="thieunhi_co dropdown-menu multi-column" >
      <div class="row" >
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <ul class="multi-column-dropdown" >
         <li><a href="#" >Anime</a>
         </li>
         <li><a href="#">Marvel</a>
         </li>
         <li><a href="#">Dicicomic</a>
         </li>

        </ul>
     </div>
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <ul class="multi-column-dropdown">
         <li><a href="#">Mẹ và Bé</a>
         </li>

        </ul>
       </div>

      </div>
     </ul>
    </li>
    <!--End Thiếu Nhi-->
        <!--Giáo dục-->
         <li class="dropdown" > <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10"  data-close-others="false" style="font-family: Roboto,'segoe ui',Helvetica,Arial,sans-serif;color:#474747;">Giáo dục</a>
     <ul class="giaoduc_co dropdown-menu multi-column" >
      <div class="row" >
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <ul class="multi-column-dropdown" >
         <li><a href="#" >Anime</a>
         </li>
         <li><a href="#">Marvel</a>
         </li>
         <li><a href="#">Dicicomic</a>
         </li>

        </ul>
     </div>
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <ul class="multi-column-dropdown">
         <li><a href="#">Mẹ và Bé</a>
         </li>

        </ul>
       </div>

      </div>
     </ul>
    </li>
    <!--End Giao dục-->
      <!--Kênh Truyền Hình-->
         <li class="dropdown" > <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10"  data-close-others="false" style="font-family: Roboto,'segoe ui',Helvetica,Arial,sans-serif;color:#474747;">Kênh Truyền Hình</a>
     <ul class="kenhtruyenhinhco dropdown-menu multi-column"  >
      <div class="row" >
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <ul class="multi-column-dropdown" >
         <li><a href="#" >Anime</a>
         </li>
         <li><a href="#">Marvel</a>
         </li>
         <li><a href="#">Dicicomic</a>
         </li>

        </ul>
     </div>
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <ul class="multi-column-dropdown">
         <li><a href="#">Mẹ và Bé</a>
         </li>

        </ul>
       </div>

      </div>
     </ul>
    </li>
    <!--End Kênh Truyền Hình-->
    <li><a href="#" style="font-family: Roboto,'segoe ui',Helvetica,Arial,sans-serif;color:#474747;">Tuyển Tập</a></li>
    <!--Khác-->
         <li class="dropdown" > <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="10"  data-close-others="false" style="font-family: Roboto,'segoe ui',Helvetica,Arial,sans-serif;color:#474747;">Khác</a>
     <ul class="khac_co dropdown-menu multi-column" >

          <div class="row" >
      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <ul class=" multi-column-dropdown" style="width:640px;">
         <li class="menudainhat" ><a href="#" style="width:100%;" class="text-center" >Phim Điện Ảnh</a>
         </li>
        </ul>
        </div>
       </div>
       <div class="row">
       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
         <ul class="multi-column-dropdown">
             <li><a href="#">Phim Việt Nam</a>
         </li>
         <li><a href="#">Phim Âu Mỹ</a>
         </li>
         <li><a href="#">Phim Châu Á</a>
         </li>
         <li><a href="#">Phim Gia Đình</a>
         </li>
          <li><a href="#">Hình Sự Tội Phạm</a>
         </li>
         </ul>
       </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
         <ul class="multi-column-dropdown">
             <li><a href="#">Hành Động - Phiêu Lưu</a>
         </li>
         <li><a href="#">Tâm Lý - Lãng Mạn</a>
         </li>
         <li><a href="#">Khoa Học - Viễn Tưởng</a>
         </li>
         <li><a href="#">Lịch Sử - Cổ Trang</a>
         </li>
          <li><a href="#">Giải Trí - Âm Nhạc</a>
         </li>
         </ul>
       </div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
         <ul class="multi-column-dropdown">
             <li><a href="#">Hoạt Hình</a>
         </li>
         <li><a href="#">Kinh Dị - Siêu Nhiên</a>
         </li>
         <li><a href="#">Hài Hước</a>
         </li>
         <li><a href="#">Thể Thao</a>
         </li>
          <li><a href="#">Khác</a>
         </li>
         </ul>
       </div>
     </div>
      <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
         <ul class="multi-column-dropdown" >
             <li style="width:216px;background-color:#4CAF50;border: 1px solid #DBDBDB;"><a style="border:0;" href="#"  class="text-center">Thể Thao</a>
         </li>
         <li ><a href="#">Bóng Đá Việt Nam</a>
         </li>
         <li><a href="#">Ngoại Hạng Anh</a>
         </li>
         <li><a href="#">Bóng Đá Thế Giới</a>
         </li>
         <li><a href="#">La LiGa</a>
         </li>
          <li><a href="#">Các Môn Thể Thao Khác</a>
         </li>
         </ul>
       </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
         <ul class="multi-column-dropdown">
             <li style="width:216px;background-color:#4CAF50;border: 1px solid #DBDBDB;"><a style="border:0;" href="#" class="text-center">Video Games</a>
         </li>
         <li><a href="#">Trailer Game</a>
         </li>
         <li><a href="#">eSport</a>
         </li>
          <li><a href="#">Khác</a>
         </li>
         </ul>
       </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
         <ul class="multi-column-dropdown">
             <li style="width:216px;background-color:#4CAF50;border: 1px solid #DBDBDB;"><a href="#" style="border:0;"  class="text-center">Cộng Đồng</a>
         </li>
         <li><a href="#">Video Cộng Đồng</a>
         </li>

         </ul>
       </div>
      </div>
     </div>
       <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <ul class="multi-column-dropdown">
         <li style="width:216px;background-color:#4CAF50;border: 1px solid #DBDBDB;"><a style="border:0;" href="#" class="text-center">Âm Nhạc</a>
         </li>
         <li><a href="#">Nhạc Việt Nam</a>
         </li>
         <li><a href="#">Nhạc Hàn Quốc</a>
         </li>
         <li><a href="#">Nhạc Âu Mỹ</a>
         </li>
         <li><a href="#">Nhạc Hoa Ngữ</a>
         </li>
          <li><a href="#">Live Show</a>
         </li>
        </ul>
       </div>

      </div>
     </ul>
    </li>
    <!--End Khác-->
    </ul>
             </div>
            <!--End Collapse menu -->
          </div>
          <!-- /.navbar-collapse -->
          </div>
     </nav>
    </header>
      <!---->
       <section class="contentcolai">
       <div class="container-fluid">
        <!--Banner Firt-->

@yield('slider')
<div class="container" >
  <!-- Video Mới Nổi Bật-->
<!--content-->

    @yield('content')

<!--end-content-->


<footer class="panel-footer" style="background:#111;">
<br>
      <div class="row">
       <div class="col-lg-1 col-md-1 col-ms-1">
       </div>
        <div class="col-lg-4 col-md-4 col-ms-4 text-center">
        <a href="#">
     <img src="{{asset('frontend/img\icon\logo.jpg')}}" class="rounded float-xs-left" style="width:120px;height:50px; margin-top:-10px;" ></a>
       <label> Liên Kết </label>
    <a href="http://vinaphone.com.vn/">
     <img src="{{asset('frontend/img\icon\logo_vinaphone2.png')}}" class="rounded float-xs-left" style="width:80px;height:40px; margin-top:-10px;" ></a>

        </div>
        </div><br>
      <!-- /.row -->
     <div class="row" style="background:#292929;">
            <div class="col-lg-1 col-md-1 col-ms-1">
       </div>
        <div class="col-lg-4 col-md-4 col-ms-4 text-center" style="color:white;">

     <a href="#" style="color:white;" > Trang chủ</a> | <a style="color:white;" href="#">Hướng dẫn</a>

        </div>
        <div class="col-lg-7 col-md-8 col-ms-12 text-center" ><span style="color: #666;">
        <span style="color: #666;">© 2016</span> TGPHIM.VN <span style="color: #666;">All rights reserved.</span> Copyright©2016 by VinaPhone.
        </span></div>
    <div class="col-lg-1 col-md-1 col-ms-1">
       </div>
    </div>

    </footer>
 <!--end footer-->
       <!---->
    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="{{asset('frontend/js/bootstrap.min.js')}}" ></script>
    <script src="{{asset('frontend/js/jquery.mobile.custom.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap-hover-dropdown.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap-hover-dropdown.min.js')}}"></script>
    <script src="{{asset('frontend/js/slick.js')}}" type="text/javascript" charset="utf-8"></script>

    <!-- exten fooo=ter -->
    @yield('footer')
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

  </body>
</html>