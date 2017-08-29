<?php $index=1; ?>
@extends('frontend.layout.index')

@section('thuvien')
    <script src="{{ url('public/frontend/tab/js/tab.js')}}" type="text/javascript"></script>
    <link type="text/css" rel="stylesheet" href="{{ url('public/frontend/tab/css/tab1.css')}}" />

<!-- Raty -->


<script type="text/javascript">

$(document).ready(function() {
    //raty
    $('.raty_detailt').raty({
          score: function() {
            return $(this).attr('data-score');
          },
          half    : true,
          click: function(score, evt) {
              var rate_count = $('.rate_count');
              var rate_count_total = rate_count.text();

              $.ajax({
                    url: '{!! url("raty") !!}',
                    type: 'GET',
                    data: {'id':'{{$sanpham["id_sanpham"]}}','score':score},
                    dataType: 'json',

                    success: function(data)
                    {

                        if(data.complete)
                        {
                            var total = parseInt(rate_count_total)+1;
                            rate_count.html(parseInt(total));
                        }
                        alert(data.msg);    
                    } 
              });
          }
      });
});
</script>
<!--End Raty -->

@stop
@section('script')

@stop
@section('quangcao_chitietsanpham')
 <!--Quảng cáo-->
<br>
<div class="row">
  <div class="col-md-12">
      @if(isset($quangcao1)&&count($quangcao1))  

   <a href="{{ $quangcao1['link'] }}">
    <img src="{{url('resources/upload/quangcao') }}/{{$quangcao1['anh_quangcao']}}" class="img-responsive" style="height: 180px; width: 100%;">
  </a>
  @endif
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-12">
      @if(isset($quangcao2)&&count($quangcao2))  

   <a href="{{ $quangcao2['link'] }}">
    <img src="{{url('resources/upload/quangcao') }}/{{$quangcao2['anh_quangcao']}}" class="img-responsive" style="height: 180px; width: 100%;" >
  </a>
  @endif
  </div>
</div>
<!--end quảng cáo-->
@stop
@section('content')

<div class="container-fluid" style="margin-top:3px;">

     <div class="row">
           <div  class="myBreadcrumb">
        <a href="{!! url('') !!}" ><i class="fa fa-home fa-2x"></i> TRANG CHỦ</a>

        <?php 
                   $raty=($sanpham["rate_count"]>0)? $sanpham["rate_total"]/$sanpham["rate_count"] : 0;

         parent_chon($danhmucdachon,0);

         ?>
       <a class="active" href="{{ route('chitietsanpham',$sanpham['alias'])}}.html" title="{{$sanpham['ten_sanpham']}}"><div>{{ $sanpham['ten_sanpham'] }}</div></a>  
    </div>
     </div><br>
<!--Sản phẩm -->
     <div class="row">
        <div class="col-md-12 chitietsanpham" >
          <b >{{$sanpham['ten_sanpham']}}</b>
        </div>
     </div>
     <div class="row" >
   <!--ảnh-->
     <div class="col-lg-5 col-md-5 col-sm-5">          
              
             <div class="row">
               <div class="col-md-12">
                   <center>
                       <a><img src="{{ url('resources/upload/sanpham/anh_sanpham_to') }}/{{$sanpham['anh_sanpham_to']}}"  title="{{$sanpham['ten_sanpham']}}"  class="img-responsive" data-toggle="modal" data-target="#zoomanh" style="width: 100%;"></a>
                   </center> 
               </div>   
             </div><br>
             <div class="row">
               <div class="col-lg-4 col-md-4 hidden-sm hidden-xs" style="border: 0.5px solid #5cb85c">
                   <a><img src="{{ url('resources/upload/sanpham/anh_sanpham_to') }}/{{$sanpham['anh_sanpham_to']}}"  title="{{$sanpham['ten_sanpham']}}"  class="img-responsive" ></a>
               </div>   
             </div>        

<!-- Modal  -->
<div class="modal fade" id="zoomanh"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title  text-primary text-left" id="myModalLabel">{{$sanpham['ten_sanpham']}}</h4>
      </div>
      <div class="modal-body">
          <center>
              <img src="{{ url('resources/upload/sanpham/anh_sanpham_to') }}/{{$sanpham['anh_sanpham_to']}}"  title="{{$sanpham['ten_sanpham']}}"  class="img-responsive"  style="width: 70%;"> 

          </center>
      </div>

    </div>
  </div>
</div>
<!--end Modal -->

           
   

  





     </div>
     <!--end ảnh-->
      <div class="col-lg-7 col-md-7 col-sm-7">
        <br>
       <br>
         <div class="row">
              <div class="col-md-12 cotthongtin">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                     Giá gốc: 
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8 thongtinsanpham">
                   {{ number_format($sanpham['gia'],3,'.','.')}} VNĐ
                </div>
              </div>
         </div><br>
        <div class="row">
              <div class="col-md-12 cotthongtin">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                     Giảm giá: 
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8 thongtinsanpham giamgia " style="color:red;" >
                   {{ number_format($sanpham['discount'],3,'.','.')}} VNĐ
                </div>
              </div>
         </div><br>
          <div class="row">
              <div class="col-md-12 cotthongtin">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                     Thể tích: 
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8 thongtinsanpham" >
                   {{ $sanpham['the_tich'] }}
                </div>
              </div>
         </div><br>
           <div class="row">
              <div class="col-md-12 cotthongtin">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                     Tình trạng: 
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8 thongtinsanpham">
                   @if($sanpham['ton_kho_sp']>0)
                    <b >{{ "Còn Hàng" }}</b>
                   @else
                     <b class="text-danger">{{ "Hết Hàng" }}</b>

                   @endif
                </div>
              </div>
         </div><br>
           <div class="row">
              <div class="col-md-12 cotthongtin">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                     Danh mục: 
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8 thongtinsanpham">
                   {{$danhmucdachon->ten_danhmuc}}
                </div>
              </div>
         </div><br>
             <div class="row">
              <div class="col-md-12 cotthongtin">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                     Lượt xem: 
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8 thongtinsanpham">
                  {!! number_format( intval($sanpham['view']))!!} 
                </div>
              </div>
         </div><br>
             <div class="row">
              <div class="col-md-12 cotthongtin">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                     Đánh giá: 
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-8 thongtinsanpham">
                      <span class='raty_detailt' style = 'margin:5px' id='{{$sanpham["id_sanpham"]}}' data-score='{{$raty}}'></span> 
                       | Tổng: <b  class='rate_count'>1</b> 
                </div>
              </div>
         </div><br>
         <div class="row">
           <div class="col-lg-9 col-md-9">
               <a class="btn btn-lg btn-success " onclick="location.href='{!! route('muahang',$sanpham['alias']) !!}.html'" href="javascript:void(0)" style="width: 100%;"><i class="glyphicon glyphicon-shopping-cart"></i> Đặt hàng</a>
           </div>
         </div><br>
         <div class="row">
           <div class="col-md-12 luitrai">
               <!-- AddThis Button BEGIN -->
<style type="text/css">.stButton .stButton_gradient{ height: 23px; }</style>
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="{!! url('public/frontend/share/js/buttons.js')!!}"></script>
<script type="text/javascript"></script>
<script type="text/javascript">stLight.options({publisher: "19a4ed9e-bb0c-4fd0-8791-eea32fb55964", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<div class="container-fluid">
  <span class='st_facebook_hcount' displayText='Facebook'></span>
<span class='st_fblike_hcount' displayText='Facebook Like'></span>
<span class='st_googleplus_hcount' displayText='Google +'></span>
<span class='st_twitter_hcount' displayText='Tweet'></span>
</div>

<!-- AddThis Button END -->
           </div>
         </div><br>







     </div>


    </div>
    <!-- nội dung sản phẩm-->
<div class="row">
     <div class="col-md-12">
<ul id="nav">
  <li><a>Chi tiết sản phẩm  <i class="glyphicon glyphicon-menu-down hidden-lg hidden-sm hidden-md " style="float:right;"></i></a>
    <section>
      <p>   
 @if(!empty($sanpham['noidung_sanpham']))
      {!! $sanpham['noidung_sanpham'] !!}
    @else
  B&agrave;i viết cho sản phẩm n&agrave;y đang được cập nhật ...
    @endif

    <!-- comment facebook -->

       <div id="fb-root"></div>
<script src="//connect.facebook.net/vi_VN/all.js#appId=170796359666689&amp;xfbml=1"></script>
<div class="fb-comments fb_iframe_widget fb_iframe_widget_fluid" data-href="{!! url()->current() !!}" data-num-posts="20" data-width="100%" style=" position: relative;"  fb-xfbml-state="rendered"></div>
 
 
    </p>
    </section>
  </li>
        @if(!empty($sanpham['noidung_thucvat'])) 

  <li>
         
        <a title="Thực vật" rel='tab3' href='javascript:void(0)' class="tab">Thực vật <i class="glyphicon glyphicon-menu-down hidden-lg hidden-sm hidden-md " style="float:right;"></i></a>

    <section>
      <p>{!! $sanpham['noidung_thucvat'] !!}</p>
     </section>
       
  </li>
     @endif
    @if(!empty($sanpham->noidung_hieuqua)) 

  <li><a >Hiệu quả <i class="glyphicon glyphicon-menu-down hidden-lg hidden-sm hidden-md" style="float:right;"></i></a>
    <section>
      <p>{!! $sanpham['noidung_hieuqua'] !!}</p>    
    </section>
  </li>
  @endif
  @if(!empty($sanpham['cach_sudung'])) 

  <li><a>Cách sử dụng <i class="glyphicon glyphicon-menu-down hidden-lg hidden-sm hidden-md" style="float:right;"></i></a>
    <section>
         <p>{!! $sanpham['cach_sudung'] !!}</p>
    </section>
  </li>
  @endif
</ul>

     </div>
</div>
<br>
<br>


    <!-- end nội dung sản phẩm-->
<!--end sản phẩm--> 
</div>
@stop
@section('danhsach')


@stop