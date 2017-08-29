@extends('layouts.myapp')

@section('content')

 <img src="{{ url('public/backend/logo.png')}}"  class="logo" alt="image not found">
                <h3 class="text-center">Lấy Lại Mật Khẩu</h3>

                <form class="form"  method="post"  action="{{ route('backend.password.email') }}" >
                     {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="sr-only"></label>
                        <input type="email" class="form-control" name="email" placeholder="Email"  value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                    @if ($errors->has('email'))
                                    <span class="help-block alert alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                    </div>
                     @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <input type="submit" class="btn btn-block btn-primary" value="Gửi yêu cầu">
                </form>
              




@endsection
