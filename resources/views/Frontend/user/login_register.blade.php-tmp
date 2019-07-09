@extends('layout.Pagination_f.master')
@section('title','Sản phẩm')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
</ol>
</nav>
<div class="container-fluid">
    @if(Session::has('message'))
    <div class="alert alert-success text-center" role="alert">
        {{Session::get('message')}}
    </div>
    @endif
    <div class="card bg-light">
        <div class="row">
             <div class="col-sm-2">

            </div>
            <div class="col-sm-3 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Đăng nhập</h2>
                    <form action="{{url('/user_login')}}" method="post" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">

                        <div class="form-group input-group">


                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input type="email" class="fadeIn second" placeholder="Email" name="email"/>


                        </div>
                          <div class="form-group input-group">


                              <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                           <input type="password"  class="fadeIn third" placeholder="Password" name="password"/>


                        </div>


                        <div>
                            <input type="checkbox" class="checkbox">
                            Lưu đăng nhập
                        </div>
                        <button type="submit" class="fadeIn fourth">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-2">

            </div>
            <div class="col-sm-5">
                <div class="signup-form"><!--sign up form-->
                    <h2>Tạo tài khoản!</h2>
                    <form action="{{url('/register_user')}}" method="post" class="form-horizontal">
                      <fieldset>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group input-group">


                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input type="text" placeholder="Name" name="name" value="{{old('name')}}" />
                            <span class="text-danger">{{$errors->first('name')}}</span>

                        </div>
                        <div class="form-group input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input type="email" placeholder="Email Address" name="email" value="{{old('email')}}" />
                            <span class="text-danger">{{$errors->first('email')}}</span>

                        </div>
                        <div class="form-group input-group">

                           <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-home"></i> </span>
                        </div>
                                <input type="address" placeholder="address" name="address" value="{{old('address')}}"  />
                                <span class="text-danger">{{$errors->first('address')}}</span>

                        </div>
                        <div class="form-group input-group">

                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                            </div>
                            <input type="mobile" placeholder="Email mobile" name="mobile" value="{{old('mobile')}}"  />
                            <span class="text-danger">{{$errors->first('mobile')}}</span>

                        </div>
                        <div class="form-group input-group">

                         <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input type="password" placeholder="Password" name="password" value="{{old('password')}}"  />
                        <span class="text-danger">{{$errors->first('password')}}</span>

                    </div>
                    <div class="form-group input-group">

                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input type="password" placeholder="Confirm Password" name="password_confirmation" value="{{old('password_confirmation')}}"  />
                        <span class="text-danger">{{$errors->first('password_confirmation')}}</span>

                    </div>
                    <div class="form-group">
                      <!-- Button -->
                      <div class="controls">
                        <button  type="submit" class="btn btn-primary">Đăng kí</button>
                    </div>
                </div>
            </fieldset>
        </form>

    </div><!--/sign up form-->
</div>
</div>
</div>
</div>
<div style="margin-bottom: 20px;"></div>
@stop