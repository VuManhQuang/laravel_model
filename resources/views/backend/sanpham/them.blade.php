 @extends('backend.layout.index')
 @section('title')
 <section class="content-header">
                <!--section starts-->
                <h2>Thể loại</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="fa fa-fw fa-home"></i> Trang chủ
                        </a>
                    </li>
                    <li>
                        <a onclick="location.href='{{ route('backend.theloai.danhsach')}}'" href="javascript:void(0)">Thể loại</a>
                    </li>
                    <li>
                        <a onclick="location.href='{{ route('backend.theloai.getThem')}}'" href="javascript:void(0)">Thêm thể loại</a>
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
                                <i class="fa fa-fw fa-file-text-o" aria-hidden="true"></i> Thêm thể loại
                            </h4>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                        <form  action="{!! route('backend.theloai.getThem') !!}" method="POST" class="form-horizontal" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                                 <div class="form-body">
                                                <div class="form-group">
                                                    <label for="ten" class="col-md-3 control-label">
                                                       Tên thể loại
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-fw fa-file-text-o"></i>
                                                            </span>
                                                            <input id="ten" type="text" name="ten" class="form-control" placeholder="Mời bạn nhập tên thể loại"  value="{!! old('ten') !!}" >
                                                        </div>
                                                        <span class="text-danger"><?php echo $errors->first('ten') ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="theloai">
                                                        Thể loại
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <select class="form-control" name="theloai" id="theloai">
                                                            <option value="0">Là Cha</option>
                                                            
                                                             <?php  
                                                    
                                                             cate_parent($data,0,"--",old('theloai'));
                                                                ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="thutu" class="col-md-3 control-label">
                                                        Thứ tự
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-fw fa-file-text-o"></i>
                                                            </span>
                                                            <input id="thutu" type="number"  name="thutu" class="form-control" placeholder="Mời bạn nhập thứ tự hiển thị"  value="{!! old('thutu') !!}">
                                                        </div>
                                                          <span class="text-danger"><?php echo $errors->first('thutu') ?>
                                                        </span>
                                                    </div>

                                                </div>
                                         
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Ảnh <span class='require'>*</span></label>
                                                    <div class="col-md-7 text-center">
                                                        <div class="input-group">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail" >
                                                                    <img data-src="holder.js/580x100" src="#" alt="profile"  >
                                                                </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail" ></div>
                                                                <div class="select_align">
                                                                    <span class="btn btn-primary btn-file">
                                                                        <span class="fileinput-new">Chọn ảnh</span>
                                                                    <span class="fileinput-exists">Thay ảnh</span>
                                                                    <input type="file" name="fImages" >
                                                                    </span>
                                                                    <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Hủy ảnh</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      <span class="text-danger"><?php echo $errors->first('fImages') ?>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">
                                                        Nội dung
                                                        <span class='require'>*</span>
                                                    </label>
                                                    <div class="col-md-7">
                                                        <div class="input-group">
                                                            <textarea  class="summernote edi-css form-control" name="noidung" >{!! old('noidung') !!}</textarea>
                                                        </div>
                                                          <span class="text-danger"><?php echo $errors->first('noidung') ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                               <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-7">
                                                             <button type="submit" class="btn btn-lg btn-primary" >Thêm</button>
                                                              <a class="btn btn-lg btn-danger" onclick="location.href='{{ route('backend.theloai.danhsach')}}'" href="javascript:void(0)"> Thoát</a>
                                                   
                                                             <input type="reset" id="add-news-reset-editable" class="btn btn-lg btn-default reset-styles" value="Reset">
                                                      
                                                    </div>
                                                </div>
                                </div>
                   
                        <form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               
@endsection
@section('script')
    <script src="{{ url('public/backend/vendors/holder/holder.js')}}" type="text/javascript"></script>
        <script src="{{ url('public/backend/js/custom_js/courses.js')}}" type="text/javascript"></script>

@endsection
@section('css')


@endsection
