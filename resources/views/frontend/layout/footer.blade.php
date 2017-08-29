
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <p><a href="#" style="color:white;font-size: 20px;">DANH MỤC SẢN PHẨM</a></p><br>
          @foreach($danhmuc as $get_danhmuc)

          <p><a href="{!! route('danhsach',$get_danhmuc['alias']) !!}.html" style="color:white;"><h3><i class="glyphicon glyphicon-chevron-right"></i> {{$get_danhmuc['ten_danhmuc']}}</h3></a></p><br>
          
           @endforeach
     
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <p><a href="#" style="color:white;font-size: 20px;">Hỗ TRỢ KHÁCH HÀNG</a></p><br>
        
          <p><a href="#" style="color:white;"><h3>Trang điểm</h3></a></p><br>
          <p><a href="#" style="color:white;"><h3>Trang điểm</h3></a></p><br>
          <p><a href="#" style="color:white;"><h3>Trang điểm</h3></a></p><br>
          <p><a href="#" style="color:white;"><h3>Trang điểm</h3></a></p>

     


        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
           <p><a href="#" style="color:white;font-size: 20px;">BÀI VIẾT MỚI</a></p><br>
          <p><a href="#" style="color:white;"><h3>Trang điểm</h3></a></p><br>
          <p><a href="#" style="color:white;"><h3>Trang điểm</h3></a></p><br>
          <p><a href="#" style="color:white;"><h3>Trang điểm</h3></a></p><br>
          <p><a href="#" style="color:white;"><h3>Trang điểm</h3></a></p><br>
          <p><a href="#" style="color:white;"><h3>Trang điểm</h3></a></p>


        </div>
      </div>
  
      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 column text-center">
        <div class="social-sharing">Các Liên kết WEBSITE</div><br>
        <div class="clearfix hidden-md hidden-sm hidden-xs padding-top-fiftheen-px"></div>
        <div class="clearfix hidden-lg hidden-md hidden-sm padding-top-ten-px"></div>
        <div class="clearfix hidden-lg hidden-xs">
          <hr class="primary">
        </div>
        <div class="row">
        <div class="col-lg-12 text-center clearfix">
         <div class="row">
            <div class="col-sm-3 col-xs-3"><a href="https://www.facebook.com/@PartnerFacebook" title="Share on Facebook" class="social-sharing" target="_blank"><i class="fa fa-2x fa-facebook-square"></i></a></div>
            <div class="col-sm-3 col-xs-3"><a href="https://twitter.com/@PartnerTwitterHandle" title="Share on Twitter" class="social-sharing" target="_blank"><i class="fa fa-2x fa-twitter-square"></i></a></div>
            <div class="col-sm-3 col-xs-3"><a href="https://www.pinterest.com/@PartnerPinterest" title="Share on Pinterest" rel="index,follow" class="social-sharing" target="_blank"><i class="fa fa-2x fa-pinterest-square"></i></a></div>
            <div class="col-sm-3 col-xs-3"><a href="https://www.linkedin.com/company/@PartnerLinkedIn" title="Share on LinkedIn" rel="index,follow" class="social-sharing" target="_blank"><i class="fa fa-2x fa-linkedin-square"></i></a></div>
          

            </div>
        <div class="row">

            <div class="col-sm-3 col-xs-3"><a href="https://www.instagram.com/@PartnerInstagram" title="Share on Instagram" rel="index,follow" class="social-sharing" target="_blank"><i class="fa fa-2x fa-instagram"></i></a></div>
            <div class="col-sm-3 col-xs-3"><a href="https://www.linkedin.com/company/@PartnerLinkedIn" title="Share on LinkedIn" rel="index,follow" class="social-sharing" target="_blank"><i class="fa fa-2x fa-linkedin-square"></i></a></div>
             <div class="col-sm-3 col-xs-3"><a href="https://play.google.com/store/apps/details?id=com.propay.mobile" title="Download from Google Play" rel="index,follow" class="social-sharing" target="_blank"><i class="fa fa-2x fa-android"></i></a></div>
            <div class="col-sm-3 col-xs-3"><a href="https://itunes.apple.com/us/app/propay-accept-credit-cards/id433046878?mt=8" rel="index,follow" title="Download from Apple Store" class="social-sharing" target="_blank"><i class="fa fa-2x fa-apple"></i></a></div>
         </div>
     
        </div>
          </div>
      </div>
    </div>
    <hr>
    <div class="col-lg-12 col-md-12 no-padding">
      <div class="row">
        <div class="col-lg-9 col-md-9 align-text-left">
          <span >
            {!!$footer['noidung_tieude']!!}

          </span>
        </div>
        <div class="col-lg-3 col-md-3 align-text-right">
          <span >
                            © Copyright 2015-
                            <script type="text/javascript">document.write(new Date().getFullYear());</script> 
                         
                            <br>
                            All rights reserved.
                        </span>
        </div>
      </div>

    </div>
  </div>
