@extends('layouts.myapp')

@section('content')

 <img src="{{ url('public/backend/logo.png')}}"  class="logo" alt="image not found">
                <h3 class="text-center">Cập nhật mật khẩu</h3>
                 @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                <form class="form"  method="post"  action="{{ route('backend.password.request') }}" >
                {!! csrf_field() !!}
                        <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <label class="sr-only"></label>
                      
                            <input id="email" type="email" placeholder="Nhập địa chỉ email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                    
                    </div>
                    <div class="form-group">
                            @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label class="sr-only"></label>
                         <input id="password" type="password" class="form-control" name="password" placeholder="Nhập mật khẩu" required>

                    </div>
                    <div class="form-group">
                       
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>
                                <div class="form-group">
                        <label class="sr-only"></label>
                
                           <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Nhập lại mật khẩu" required>


                    </div>
                    <div class="form-group">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                    </div>
                    <input type="submit" class="btn btn-block btn-primary" value="Xác nhận">
                </form>
              




@endsection
