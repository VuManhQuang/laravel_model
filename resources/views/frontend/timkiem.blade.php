<?php $index=1; ?>
@extends('frontend.layout.index')
@section('thuvien')

@stop
@section('content')

<div class="container-fluid" style="margin-top:3px;">

<!--Sản phẩm -->

 <div class="row" >

    <div class="col-md-12 ">
<h2 class="product-title" style="margin:0 0 30px -15px;"><span>  SẢN PHẨM TÌM KIẾM THEO "{{ $danhmucdachon }}"</span></h2>


    <div  class="col-md-12 " >
                @if(isset($sanpham)&&count($sanpham)>0)
                 <?php $dem=0;  ?>
                    @foreach($sanpham as $getsanpham)
                 <?php $dem++; ?>
           @if($dem%3==0)
              <div class="row">
           @endif  
          
          <div class="col-lg-4 col-md-4 col-sm-6 " style="margin-left: -2px;" >
          <div class="hoversanpham">
                        <center>

                   <a onclick="location.href='{!! route('chitietsanpham',$getsanpham->alias) !!}.html'" href="javascript:void(0)">
               <img class="anhspresponsive" href="#" src="{{ url('resources/upload/sanpham/anh_sanpham_to') }}/{{$getsanpham->anh_sanpham_to}}"  >  
             </a>
          <p class="tensanpham"><a onclick="location.href='{!! route('chitietsanpham',$getsanpham->alias) !!}.html'" href="javascript:void(0)" class="hoverten" style="text-decoration: none;">{{$getsanpham->ten_sanpham}} </a></p><br>
          <div class='raty' style='margin:10px 0px' alias='{{ $getsanpham->alias }}' data-score='{!! ($getsanpham->rate_count>0)? $getsanpham->rate_total/$getsanpham->rate_count : 0 !!}'></div>
                    <p>Lượt xem: {!! number_format( intval($getsanpham->view),3,'.','.')!!}</p>

            <p class="gia">Giá gốc: {{ number_format($getsanpham->gia,3,'.','.')}} VNĐ</p>
            @if($getsanpham->discount>0)
            <p class="giam">Giảm: <span class="giamgia">{{ number_format($getsanpham->discount,3,'.','.')}} VNĐ </span></p>
            @else
             <p class="giam"> <span class="giamgia"></span></p><br>
            @endif
            </center> 
          </div>
    
               
          </div>
           <br class=" hidden-lg hidden-md hidden-sm">

        @if($dem%3==0)
              </div><br>
           @endif 

                    @endforeach
             @else
             <b style="color: red;text-transform: uppercase;font-size: 15px;">Sản phẩm cho danh mục này đang cập nhật</b>
             @endif
             <div class="row">
               <center>
               <div class="col-md-12">
                <center>
                    {!! $sanpham->links() !!}
               </center> 

               </div>
             </div>

    </div>



</div>


</div>
<!--end sản phẩm mới nhất--> 
</div>
@stop
@section('danhsach')


@stop