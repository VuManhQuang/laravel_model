 @extends('backend.layout.index')
@section('title')
 <section class="content-header">
                <!--section starts-->
                <h2>Giao dịch</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="fa fa-fw fa-home"></i> Trang chủ
                        </a>
                    </li>
               
                    <li>
                        <a onclick="location.href='{{ route('backend.giaodich.danhsach')}}'" href="javascript:void(0)">Giao dịch</a>
                    </li>
                </ol>
            </section>
@endsection
  @section('content')

                    <div class="col-lg-12">
                        <!-- Basic charts strats here-->

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> Giao dịch
                            </h4>

                                <span class="pull-right">

                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body table-responsive">
                                <table class="table table-bordered text-center" id="fitness-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Stt</th>
                                            <th class="text-center">Thành viên</th>
                                            <th class="text-center">Số tiền</th>

                                            <th class="text-center" >Trạng thái</th>
                                            <th class="text-center" >Ngày giao dịch</th>
                                            <th class="text-center" >Hành động</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $stt=0; ?>
                                        @foreach($data as $val)
                                        <?php $stt++; ?>
                                         <tr>
                                             <td class="text-left">{!! $stt !!}</td>
                                         	 <td class="text-left">{{ $val['user_name'] }}</td>
                                             <td class="text-left">{{ number_format($val['amount'],3,'.','.') }} VNĐ</td>

                            
                                             <td> 
                                @if($val["status"]==0)
                                   <b class="text-info">{!! "Chờ xử lý" !!}</b>
                                @elseif($val["status"]==1)
                                  <b class="text-success">{!! "Thành công" !!}</b>
                                @else
                                   <b class="text-danger">{!! "Hủy bỏ" !!}</b>
                               
                                @endif

                                             </td>
                                 <td class="text-left">{{ date("d-m-Y - h:i:s", strtotime($val['created_at']) ) }} </td>

                                         	 <td class="text-center" >
                                             @permission('theloai-chitiet')                     
                                             <button   class="btn btn-sm btn-success" data-toggle="modal" data-target="#chitiet{{ $val['id_giaodich'] }}"><i class="glyphicon glyphicon-info-sign"></i> Chi tiết</button>
<!-- Modal  chi tiêt-->
<div class="modal fade" id="chitiet{{ $val['id_giaodich'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center text-primary" id="myModalLabel"> Chi tiết về giao dịch ngày: <b class="text-success">{{ $val['created_at'] }}</b></h4>
      </div>
      <div class="modal-body">
              <div class="panel-body table-responsive">
                    <table class="table  text-left" id="fitness-table">
                                    <thead>
                                        <tr>
                                            <td >Thành viên</td>
                                            <td><b class="text-primary">{{ $val['user_name'] }}</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                 
                                  
                                    </tbody>
                    </table>
             </div>
                                         
      </div>
      <div class="modal-footer">
      <center>

        <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
        </center>
      </div>
    </div>
  </div>
</div>
<!--end Modal chi tiết-->
                                                 @endpermission                    

                                                 @permission('theloai-sua')                     

                                             <a   class="btn btn-sm btn-primary" onclick="location.href='{!! route('backend.theloai.getSua',$val['id_giaodich']) !!}'" href="javascript:void(0)" ><i class="glyphicon glyphicon-edit"></i> Sửa</a>
                                                 @endpermission                    
                                                 @permission('theloai-xoa')                     

                                             <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#{{ $val['id_giaodich'] }}"><i class="fa fa-trash-o"></i> Xóa</button>

<!-- Modal  xóa-->
<div class="modal fade" id="{{ $val['id_giaodich'] }}"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title  text-primary text-left" id="myModalLabel"><i class="glyphicon glyphicon-question-sign"></i> Thông báo</h4>
      </div>
      <div class="modal-body">
          <div class="text-danger text-center"><h3> Bạn có chắc chắn muốn xóa giao dịch ngày: <b class="text-info">{{ $val['created_at'] }}</b> không ?</h3></div>
      </div>
      <div class="modal-footer">
      <center>
        <a type="button" class="btn btn-primary" onclick="location.href='{!! route('backend.theloai.getXoa',$val['id_giaodich']) !!}'" href="javascript:void(0)" >Có</a>

        <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
        </center>
      </div>
    </div>
  </div>
</div>
<!--end Modal xóa-->
                                                 @endpermission                    


                                             </td>
                                         </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
         
@endsection