@extends('frontend.masterplayer')
@section('header')
@stop
@section('content')
 <section class="contentcolai">

       <div class="container-fluid">
       <div class="row banner_video">
             <br>
         <div class="container">
         <center>
      <div id="jssor_1" style=" position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1000px; height: 530px; overflow: hidden; visibility: hidden;">

        <div data-u="slides" style="cursor:  pointer; position: relative; top: 0px; left: 0px; width: 1000px; height: 530px; overflow: hidden;">
        <div>

        <div id="video-content">
            <script src="https://content.jwplatform.com/libraries/DbXZPMBQ.js"></script>
            <div id="myPlayer">Loading player...</div>
            <script>
              jwplayer("myPlayer").setup({
                  "file": "https://wowza.jwplayer.com/live/jelly.stream/playlist.m3u8",
                  "height": 360,
                  "width": 640
              });
            </script>
        </div>


        </div>
        </div>
        </div>
</center>
         </div>

             </div>











<div class="container">

 <!-- phim truyền hình-->

<div class="row">
<br>
<section class="regular slider" >
  <!--slide 1-->


    <div>

        <div class="row"  >
           <!--Ảnh to-->

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 "  >
         <div class="row "  >
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 " >

          <div class="mat_captionnho carousel-caption" >
    <h4><a href="#" title="Hôn Trộm 55 Lần" class="ten_phim">Tập 1</a></h4>

            </div>
               <a href="#"><img data-u="image" src="{{asset('frontend/img/bannervideo/anhnho/1.jpg')}}" class="anhvideo_dangmoi " /></a>
            </div>
              <div class="col-lg-6  col-md-6  col-sm-6 col-xs-6 " >
          <div class="mat_captionnho carousel-caption" >
    <h4><a href="#" title="Tình Yêu Không Có Lỗi, Lỗi Vì Người Đã Đổi Thay" class="ten_phim">Tập 2</a></h4>

            </div>
               <a href="#"><img data-u="image" src="{{asset('frontend/img/bannervideo/anhnho/2.jpg')}}"  class="anhvideo_dangmoi" /></a>
            </div>
               </div>
              </div>

        <!--End Ảnh to-->
          <!--Anh Trai-->
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 khoang_anhmobile"  >

                       <div class="row " >
               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >

          <div class="mat_captionnho carousel-caption" >
    <h4><a href="#" title="Show Diễn" class="ten_phim">Tập 3</a></h4>

            </div>
               <a href="#"><img data-u="image" src="{{asset('frontend/img/bannervideo/anhnho/3.jpg')}}"  class="anhvideo_dangmoi " /></a>
            </div>

       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 " >
          <div class="mat_captionnho carousel-caption" >
    <h4><a href="#" title="Biệt Đội Nhỏ Xinh" class="ten_phim">Tập 4</a></h4>
            </div>
               <a href="#"><img data-u="image" src="{{asset('frontend/img/bannervideo/anhnho/4.jpg')}}"  class="anhvideo_dangmoi" /></a>
            </div>
               </div>
              </div>
     <!--End Anh Trai-->




                 <!--End Anh nhỏ-->

              </div>
    </div>
    <!--end slide 1-->
    <!--slide 2-->
       <div>
        <div class="row"    >
           <!--Ảnh to-->

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 "  >
         <div class="row "  >
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >

          <div class="mat_captionnho carousel-caption" >
    <h4><a href="#" title="Hôn Trộm 55 Lần" class="ten_phim">Tập 5</a></h4>

            </div>
               <a href="#"><img data-u="image" src="{{asset('frontend/img/bannervideo/anhnho/5.jpg')}}" class="anhvideo_dangmoi " /></a>
            </div>
                   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >
          <div class="mat_captionnho carousel-caption" >
    <h4><a href="#" title="Tình Yêu Không Có Lỗi, Lỗi Vì Người Đã Đổi Thay" class="ten_phim">Tập 6</a></h4>

            </div>
               <a href="#"><img data-u="image" src="{{asset('frontend/img/bannervideo/anhnho/6.jpg')}}"  class="anhvideo_dangmoi" /></a>
            </div>
               </div>
              </div>

        <!--End Ảnh to-->
          <!--Anh Trai-->
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 khoang_anhmobile"  >
        <div class="row " >
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >

          <div class="mat_captionnho carousel-caption" >
    <h4><a href="#" title="Show Diễn" class="ten_phim">Tập 7</a></h4>

            </div>
               <a href="#"><img data-u="image" src="{{asset('frontend/img/bannervideo/anhnho/7.jpg')}}"  class="anhvideo_dangmoi " /></a>
            </div>

             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >
          <div class="mat_captionnho carousel-caption">
    <h4><a href="#" title="Biệt Đội Nhỏ Xinh" class="ten_phim">Tập 8</a></h4>
            </div>
               <a href="#"><img data-u="image" src="{{asset('frontend/img/bannervideo/anhnho/8.jpg')}}"  class="anhvideo_dangmoi" /></a>
            </div>
               </div>
              </div>
     <!--End Anh Trai-->




                 <!--End Anh nhỏ-->

              </div>
    </div>
    <!--end slide 2-->
  </section>
</div>
<!-- End phim truyền hình-->
<!-- thông tin-->
<div class="row"  >
<br>
<div class="col-lg-1 col-md-1 col-sm-1"></div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" ><b><h4 class="text-success">{{$medias->ten_media}}: Tập 0</h4></b></div>
         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 "><h4><b>37.660</b> lượt xem</h4> </div>
</div>
 <div class="row luotview">
<div class="col-lg-1 col-md-1 col-sm-1"></div>
        <div class="col-lg-2 col-md-2 col-sm-2 " ><div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like"  data-show-faces="true" data-share="false"></div></div>
           <div class="col-lg-6 col-md-6 col-sm-6 " > <div class="g-plusone" data-annotation="bubble" data-width="300"></div></div>
         <div class="col-lg-3 col-md-3 col-sm-3  "><button  style="background-color: #676b73;color: white;" class="btn btn-xs btn-default" data-toggle="modal" data-target="#baoloi" ><h5><i class='glyphicon glyphicon-paperclip' ></i> Báo lỗi</h5> </button></div>

 </div>
  <div class="row luotview">
<div class="col-lg-1 col-md-1 col-sm-1"></div>
        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12" ><b>Thể loại: <a href="#" class="text-success">Phim Truyền Hình</a>, <a href="#" class="text-success">Tâm Lý - Lãng Mạn</a>, <a href="#" class="text-success">Phim Việt Nam</a>, <a href="#" class="text-success">Phim Hàn Quốc</a>, <a href="#" class="text-success">Phim Thần Tượng</a> </b></div>


 </div><br class="luotview">
   <div class="row luotview">
<div class="col-lg-1 col-md-1 col-sm-1"></div>
        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12" ><b>Tag: <a href="#" class="text-success">Tuổi Thanh Xuân phần 2</a></b></div>


 </div><br class="luotview">
    <div class="row luotview">
<div class="col-lg-1 col-md-1 col-sm-1"></div>
        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-12" ><b>Đóng góp: <a href="#" class="text-success">sieucum</a></b></div>


 </div><br class="luotview">
     <div class="row luotview" style="background-color:white;">
<div class="col-lg-1 col-md-1 col-sm-1"></div>
        <div class="col-lg-1 col-md-1 col-sm-1" style="background-image:url('img/iconzing/ngoi_sao.png');height:60px; background-repeat:no-repeat;font-size:15px;padding-top:23px;">9.8</div>
      <div class="col-lg-3 col-md-3 col-sm-3 ">
  <br>
          <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 " >

    <div  class="ngoisao">
        <input type="radio" name="example" class="rating" value="1" />
        <input type="radio" name="example" class="rating" value="2" />
        <input type="radio" name="example" class="rating" value="3" />
        <input type="radio" name="example" class="rating" value="4" />
        <input type="radio" name="example" class="rating" value="5" />
        <input type="radio" name="example" class="rating" value="6" />
        <input type="radio" name="example" class="rating" value="7" />
        <input type="radio" name="example" class="rating" value="8" />
        <input type="radio" name="example" class="rating" value="9" />
        <input type="radio" name="example" class="rating" value="10" />
    </div>
            </div>
          </div>
            <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 " >
              96 lượt đánh giá
            </div>
          </div>
      </div>
          <div class="col-lg-3 col-md-3 col-sm-3 ">
          <br>
          Chia sẻ
          <img style="background-image:url('img/iconzing/googchua.png');">
          </div>

 </div>
<!--end thông tin-->
             </div>

       </div>

       </section> <br><br>
@stop
@section('footer')
<script type="text/javascript">
$(document).on('ready', function() {

 $(".regular ").slick({
        dots: false,
        infinite: false,
         accessibility: false,
        slidesToShow: 1,
        slidesToScroll: 1
      });

    });
  </script>
@stop