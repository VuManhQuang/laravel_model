
<!-- banner đầu-->
<div class="container-fluid" style="margin-top:30px; ">
     <div class="container">
           <div class="row" >
               <div class="col-md-2  col-xs-12 ">
                   <a onclick="location.href='{{ url('') }}'" href="javascript:void(0)">
                     <img src="{{ url('public/frontend/logo.png')}}" style="margin-left: auto; margin-right: auto;" class="img-responsive">
                   </a>
               </div>
               <div class="col-md-6 col-md-offset-1 col-xs-12 ">
                 <form id="timkiemsp"  action="{!! route('timkiem') !!}" method="POST" class="form-horizontal" enctype="multipart/form-data" >
                  {!! csrf_field() !!}
               
                 <div class=" input-group input-group-lg" style="margin-top:10px; ">
               <input type="text"  class="ui-autocomplete-input form-control "  id="text_search" placeholder="Bạn muốn mua gì..." name="key_search" value="{!! old('key_search') !!}"   autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-search"></i></button>
                    </span>
              </div>
               </form>
              </div>
              
               <div class="col-md-2 col-md-offset-1 col-xs-4 luitrai">
                            <?php $sohang_tronggio=0; ?>
                                     @foreach($cartItems as $cartItem)
                                     <?php $sohang_tronggio +=$cartItem->qty ?>
                                     @endforeach

                   <a class="btn btn-lg btn-success "  style="margin-top:10px; " onclick="location.href='{!! route('giohang') !!}'" href="javascript:void(0)"> Giỏ hàng <i class="glyphicon glyphicon-shopping-cart"></i>: {{$sohang_tronggio}}</a>
               </div>
           </div>

     </div>
</div>
<!--end banner đầu-->

<!-- menu-->
<nav class="navbar  navbar-material-blue  navbar-static-top"  style="margin-top:20px; ">
  <div class="container-fluid">
      <div class="container">
    
    <div class=" navbar-header">
      <button type="button" class="navbar-toggle navbar-left " data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
 <button type="button" class="navbar-toggle "  data-toggle="collapse" data-target=".navbar-collapse">
         <b style="color:white;font-size:15px;">MENU</b>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-animations" data-hover="dropdown" data-animations="fadeInDownNew fadeInRightNew fadeInUpNew fadeInLeftNew">
      <ul class="nav navbar-nav ">
        <?php $dem=0; ?>
        @foreach($menu as $getmenu)
        <?php $dem++; ?>
         @if($dem==1)
                    @if($getmenu['url']==$index)
                      @if($getmenu['url']=="dangky"&&Auth::guard('web')->check())
                     <li class=" active"><a data-toggle="tooltip" onclick="location.href='{{ url('thongtintaikhoan') }}'" href="javascript:void(0)" title="Thông tin cá nhân"><i class="glyphicon glyphicon-user"></i> Xin chào: {!! Auth::user()->username !!}</a></li>
                      @elseif($getmenu['url']=="login"&&Auth::guard('web')->check())
                    <li class=" active"><a data-toggle="tooltip" onclick="location.href='{{ url('logout') }}'" href="javascript:void(0)" title="Thoát tài khoản"><i class="glyphicon glyphicon-log-out"></i> Đăng xuất</a></li>
                      @else
                      <li class=" active"><a data-toggle="tooltip" onclick="location.href='{{ url('') }}/{{ $getmenu['url'] }}'" href="javascript:void(0)" title="{!! $getmenu['goiy_menu'] !!}">{!! $getmenu['ten_menu'] !!}</a></li>
                      @endif

                    @else
                        @if($getmenu['url']=="dangky"&&Auth::guard('web')->check())
                     <li ><a data-toggle="tooltip" onclick="location.href='{{ url('thongtintaikhoan') }}'" href="javascript:void(0)" title="Thông tin cá nhân"><i class="glyphicon glyphicon-user"></i> Xin chào: {!! Auth::user()->username !!}</a></li>
                      @elseif($getmenu['url']=="login"&&Auth::guard('web')->check())
                    <li ><a data-toggle="tooltip" onclick="location.href='{{ url('logout') }}'" href="javascript:void(0)" title="Thoát tài khoản"><i class="glyphicon glyphicon-log-out"></i> Đăng xuất</a></li>
                      @else
                      <li ><a data-toggle="tooltip" onclick="location.href='{{ url('') }}/{{ $getmenu['url'] }}'" href="javascript:void(0)" title="{!! $getmenu['goiy_menu'] !!}">{!! $getmenu['ten_menu'] !!}</a></li>
                      @endif

                    @endif          
           @else
                     @if($getmenu['url']==$index)
                      @if($getmenu['url']=="dangky"&&Auth::guard('web')->check())
                     <li class=" active luitrai1"><a data-toggle="tooltip" onclick="location.href='{{ url('thongtintaikhoan') }}'" href="javascript:void(0)" title="Thông tin cá nhân"><i class="glyphicon glyphicon-user"></i> Xin chào: {!! Auth::user()->username !!}</a></li>
                      @elseif($getmenu['url']=="login"&&Auth::guard('web')->check())
                    <li class=" active luitrai1"><a data-toggle="tooltip" onclick="location.href='{{ url('logout') }}'" href="javascript:void(0)" title="Thoát tài khoản"><i class="glyphicon glyphicon-log-out"></i> Đăng xuất</a></li>
                      @else
                      <li class=" active luitrai1"><a data-toggle="tooltip" onclick="location.href='{{ url('') }}/{{ $getmenu['url'] }}'" href="javascript:void(0)" title="{!! $getmenu['goiy_menu'] !!}">{!! $getmenu['ten_menu'] !!}</a></li>
                      @endif

                    @else
                        @if($getmenu['url']=="dangky"&&Auth::guard('web')->check())
                     <li class="luitrai1"><a data-toggle="tooltip" onclick="location.href='{{ url('thongtintaikhoan') }}'" href="javascript:void(0)" title="Thông tin cá nhân"><i class="glyphicon glyphicon-user"></i> Xin chào: {!! Auth::user()->username !!}</a></li>
                      @elseif($getmenu['url']=="login"&&Auth::guard('web')->check())
                    <li class="luitrai1"><a data-toggle="tooltip" onclick="location.href='{{ url('logout') }}'" href="javascript:void(0)" title="Thoát tài khoản"><i class="glyphicon glyphicon-log-out"></i> Đăng xuất</a></li>
                      @else
                      <li class="luitrai1"><a data-toggle="tooltip" onclick="location.href='{{ url('') }}/{{ $getmenu['url'] }}'" href="javascript:void(0)" title="{!! $getmenu['goiy_menu'] !!}">{!! $getmenu['ten_menu'] !!}</a></li>
                      @endif

                    @endif     
                   
           @endif
   
              

          @endforeach 


        </ul>
     </div>
    </div>
  </div>
</nav>

<!-- end menu-->
