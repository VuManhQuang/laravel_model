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
    <link href="{{ url('public/frontend/product/css/animate.css')}}" rel="stylesheet" type="text/css" >
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ url('public/frontend/dropdown/menu/css/demo.css')}}" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="{{ url('public/frontend/dropdown/sidebar/css/resetweb.css')}}"> <!-- CSS reset -->
    <link rel="stylesheet" href="{{ url('public/frontend/dropdown/sidebar/css/stylea.css')}}"> <!-- Resource style -->
    <script src="{{ url('public/frontend/dropdown/sidebar/js/modernizr.js')}}"></script> <!-- Modernizr -->
        <link href="{{ url('public/frontend/product/css/product.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{ url('public/frontend/css/footer.css')}}" rel="stylesheet" type="text/css" >

    <link href="{{ url('public/frontend/product/css/owl.theme.default.min.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{ url('public/frontend/product/css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('public/frontend/slider/css/slidernew.css')}}" rel="stylesheet" type="text/css"/>

<script type="text/javascript" src="{{ url('public/frontend/js/jquery-2.2.0.min.js')}}"></script>

                <script src="{{ url('public/frontend/slider/new/js/wow.min.js')}}" type="text/javascript"></script>

       <script src="{{ url('public/frontend/slider/new/js/amazingslider.js')}}"></script>
<script src="{{ url('public/frontend/slider/new/js/initslider.js')}}"></script>

             <!--search tự động tìm tên-->
<link type="text/css" href="{{ url('public/frontend/autocomplete/css/jquery-ui.min.css')}}" rel="stylesheet">
<link type="text/css" href="{{ url('public/frontend/autocomplete/css/autocomplete.css')}}" rel="stylesheet">  

<script type="text/javascript" src="{{ url('public/frontend/autocomplete/js/jquery-ui.js')}}"></script>

<script type="text/javascript">
/*
 ấn chọn giá trị sự tự thay 
$('#test-key-press').keypress(function() {
  $('#test-result').val(($(this).val()));
})


*/
$(function() {

    $( "#text_search" ).autocomplete({
        source: "{!! url('timkiem_tudong') !!}",
        minLength:3,
        select: function(event, ui)
        {
             $('#text-search').val(ui.item.value);
        }

    });




});
    $('#timkiemsp').submit(function(event){

  // prevent default browser behaviour
  event.preventDefault();

   });
</script>
        <!--end search tự động tìm tên-->
        <!-- tool tip-->
        <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
        <!-- tool tip -->
        <!-- raty -->
     <script type="text/javascript" src="{{ url('public/frontend/raty/jquery.raty.min.js')}}"></script>
     <script type="text/javascript">
        $(function() {
           $.fn.raty.defaults.path = '{{ url("public/frontend/raty/img")}}';
           $('.raty').raty({
                score: function() {
                  return $(this).attr('data-score');
                },
                readOnly  : true,
            });
        });
       </script>

       <style>
       .raty img{width:16px !important;height:16px!important;}
       </style>
       <!--End raty -->
     

     @yield('thuvien')
    <!--page level css -->

</head>

<body  >
    <!-- header logo: style can be found in header-->

    <header class="header">
       @include('frontend.layout.header')
      
    </header>

    <div class="container">
<div class="row">
               <div class="col-lg-12">
            
                    @if(Session::has('flash_thongbao'))
                            {!! Session::get('flash_thongbao') !!}
                     @endif
               </div>
</div>
<div class="row" >
  
  <div class="col-md-3 ">
       @include('frontend.layout.sidebar')

  </div>
  <div class="col-md-9 luitrai" >
    <!-- slide or content -->
    @yield('content')

    <!--end slide or content -->
  </div>

</div>       
<br>
    <!-- danh sách -->

    @yield('danhsach')
     <!-- end danh sách -->

<!--Liên hệ-->
<br>
<div class="row">
   @include('frontend.layout.contact')
</div><br>
<!--end liên hệ-->
<!--nút ấn lên đầu trang-->
<div class="scroll-top-wrapper ">
  <span class="scroll-top-inner">
    <i class="glyphicon glyphicon-chevron-up"></i>
  </span>
</div>
<!--end nút ấn lên đầu trang-->

    </div>








<footer id="footer">
    @include('frontend.layout.footer')
</footer>



<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/598430ea4471ce54db65287d/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<script  src="{{ url('public/frontend/bootstrap/js/bootstrap.min.js')}}"></script>
<script  src="{{ url('public/frontend/dropdown/menu/js/bootsnip.js')}}"></script>
<script  src="{{ url('public/frontend/dropdown/menu/js/bootstrap-dropdownhover.min.js')}}"></script>
<script src="{{ url('public/frontend/dropdown/sidebar/js/jquery.menu-aim.js')}}"></script> <!-- menu aim -->
<script src="{{ url('public/frontend/dropdown/sidebar/js/main.js')}}"></script>

<script src="{{ url('public/frontend/product/js/product.js')}}"></script>
<script type="text/javascript">$('#modalthongbao').modal('show');
</script>
        <script src="{{ url('public/frontend/product/js/owl.carousel.js')}}" type="text/javascript"></script>

    @yield('script')
</body>


<!-- Mirrored from dev.lorvent.com/fitness/news.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 10 Nov 2016 10:51:27 GMT -->
</html>
