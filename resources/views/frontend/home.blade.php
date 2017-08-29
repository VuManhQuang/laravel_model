<?php $index=''; ?>
@extends('frontend.layout.index')
@section('thuvien')

@stop
@section('content')
       @include('frontend.layout.slide')

@stop
@section('danhsach')
<!--Sản phẩm mới nhất-->
  <div class="container-fluid" >

 <div class="row" >

    <div class="col-md-12 luitrai">
<h2 class="product-title"><span>  SẢN PHẨM MỚI NHẤT</span></h2>
      @if(isset($sanphammoi)&&count($sanphammoi))  

<div class="viewport">
    <div   id="productresponsive" class="owl-carousel owl-theme" >
                    @foreach($sanphammoi as $getsanphammoi)
     <div class="item" >
            <a onclick="location.href='{!! route('chitietsanpham',$getsanphammoi['alias']) !!}.html'" href="javascript:void(0)">
               <img class="anhspresponsive" href="#" src="{{ url('resources/upload/sanpham/anh_sanpham_to') }}/{{$getsanphammoi['anh_sanpham_to']}}"  >  
             </a>
         <center>
          <p class="tensanpham"><a href="" class="hoverten" style="text-decoration: none;">{{$getsanphammoi['ten_sanpham']}} </a></p>
          <center>
          <div class='raty' style='margin:10px 0px' id='{{$getsanphammoi["id_sanpham"]}}' data-score='{!! ($getsanphammoi["rate_count"]>0)? $getsanphammoi["rate_total"]/$getsanphammoi["rate_count"] : 0; !!}'></div>
          </center>
            <p class="gia">Giá gốc: {{ number_format($getsanphammoi['gia'],3,'.','.')}} VNĐ</p>
            @if($getsanphammoi['discount']>0)
            <p class="giam">Giảm: <span class="giamgia">{{ number_format($getsanphammoi['discount'],3,'.','.')}} VNĐ </span></p>
            @endif
            </center> 
                                    
      </div>
                    @endforeach
    
  

    </div>


</div>
 @else
     <br><br>
     <b class="text-info" style="font-size: 20px;">Sản phẩm đang cập nhật</b>
     @endif
</div>

    </div>

</div>
<!--end sản phẩm mới nhất-->
<!--Quảng cáo-->
<br>
<div class="row">
	<div class="col-md-12">
      @if(isset($quangcao1)&&count($quangcao1))  

   <a href="{{ $quangcao1['link'] }}">
		<img src="{{url('resources/upload/quangcao') }}/{{$quangcao1['anh_quangcao']}}" class="img-responsive" style="width:97.5%; margin-left: -5px;">
    </a>
    
     @endif
  
	</div>
</div>
<!--end quảng cáo-->
<!--Sản phẩm được quan tâm-->
<br>
 <div class="row" >

    <div class="col-md-12 luitrai">
	<div class="container-fluid" >
<h2 class="product-title"><span>  SẢN PHẨM QUAN TÂM NHẤT</span></h2>
      @if(isset($sanphamquantam)&&count($sanphamquantam))  

<div class="viewport">

    <div   id="quantamresponsive" class="owl-carousel owl-theme" >

          @foreach($sanphamquantam as $getsanphamquantam)
     <div class="item" >
            <a onclick="location.href='{!! route('chitietsanpham',$getsanphamquantam['alias']) !!}.html'" href="javascript:void(0)">
               <img class="anhspresponsive" href="#" src="{{ url('resources/upload/sanpham/anh_sanpham_to') }}/{{$getsanphamquantam['anh_sanpham_to']}}"  >  
             </a>
         <center>
          <p class="tensanpham"><a href="" class="hoverten" style="text-decoration: none;">{{$getsanphamquantam['ten_sanpham']}} </a></p>
          <center>
          <div class='raty' style='margin:10px 0px' id='{{$getsanphamquantam["alias"]}}' data-score='{!! ($getsanphamquantam["rate_count"]>0)? $getsanphamquantam["rate_total"]/$getsanphamquantam["rate_count"] : 0; !!}'></div>
          </center>
          <p>Lượt xem: {!! number_format( intval($getsanphamquantam['view']),3,'.','.')!!}</p>
            <p class="gia">Giá gốc: {{ $getsanphamquantam['gia']}} VNĐ</p>
            @if($getsanphamquantam['discount']>0)
            <p class="giam">Giảm: <span class="giamgia">{{ $getsanphamquantam['discount']}} VNĐ </span></p>
            @endif
            </center> 
      </div>
                    @endforeach
  

    </div>
 

</div>
 @else
       <br><br>
     <b class="text-info" style="font-size: 20px;">Sản phẩm đang cập nhật</b>
     @endif
</div>

    </div>

</div>
<!--Quảng cáo-->
<br>
<div class="row">
	<div class="col-md-12">
      @if(isset($quangcao2)&&count($quangcao2))  

   <a href="{{ $quangcao2['link'] }}">
		<img src="{{url('resources/upload/quangcao') }}/{{$quangcao2['anh_quangcao']}}" class="img-responsive" style="width:97.5%; margin-left: -5px;">
  </a>
  @endif
	</div>
</div>
<!--end quảng cáo-->
@stop