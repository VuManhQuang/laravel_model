@extends('layouts.myapp')

@section('content')


   <img src="{{ url('public/backend/logo.png')}}"  class="logo" alt="image not found">
                <h3 class="text-center">Quản lý</h3>
                <form class="form"  method="post" action="{!! route('backend.login.submit') !!}" >
{!! csrf_field() !!}
                    <div class="form-group">
                        <label class="sr-only"></label>
                        <input type="text" class="form-control" name="username" placeholder="Tài khoản" required value="{{old('username')}}">
                    </div>
                    <div class="form-group">
                        <label class="sr-only"></label>
                        <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
                    </div>
                    <div class="checkbox text-left">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Lưu mật khẩu
                        </label>
                    </div>
                    <input type="submit" class="btn btn-block btn-warning" value="Đăng nhập">
                </form>
                <p class="text-right"><a href="{{ route('backend.password.request') }}" class="text-warning forgot_color">Quên mật khẩu ?</a></p>

@endsection
