@extends('layout.Pagination_b.master')
@section('title','Add Category')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('user.index')}}">User</a> <a href="{{route('user.create')}}" class="current">Add New Category</a> </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Add New Category</h5>
                </div>
                @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong></strong> {{Session::get('message')}}
            </div>
        @endif
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="{{route('user.store')}}" name="basic_validate" id="basic_validate" novalidate="novalidate">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        @foreach($errors->all() as $error)
                        <p class="alert alert-danger">{{$error}}</p>
                        @endforeach
                        <div class="control-group{{$errors->has('name')?' has-error':''}}">
                            <label class="control-label"> Name :</label>
                            <div class="controls">
                                <input type="text" name="name" id="name" value="{{old('name')}}" required>

                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Email :</label>
                            <div class="controls">
                                <input name="email" id="email" rows="3" value="{{old('email')}}" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Address :</label>
                            <div class="controls">
                                <input name="address" id="address"  value="{{old('address')}}" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Phone :</label>
                            <div class="controls">
                                <input name="mobile" type="number" id="mobile" value="{{old('mobile')}}" required>
                            </div>
                        </div>
                            <div class="control-group">
                                <label class="control-label">Password :</label>
                                <div class="controls">
                                    <input  type="password" name="password" id="password" value="{{old('password')}}" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label  class="control-label">Confirm Password:</label>
                                <div class="controls">
                                <input type="password" placeholder="Confirm Password" name="password_confirmation" value="{{old('password_confirmation')}}" required/>
                                </div>
                            </div>

                        <div class="control-group{{$errors->has('admin')?' has-error':''}}">
                            <label class="control-label">Admin :</label>
                            <div class="controls">
                                <input type="checkbox" name="input" id="input" value="0">
                                <span class="text-danger">{{$errors->first('admin')}}</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="control-label"></label>
                            <div class="controls">
                                <input type="submit" value="Add New" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
@section('jsblock')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="{{ asset('Backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('Backend/js/jquery.ui.custom.js') }}"></script>
    <script src="{{ asset('Backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Backend/js/jquery.uniform.js') }}"></script>
    <script src="{{ asset('Backend/js/select2.min.js') }}"></script>
    <script src="{{ asset('Backend/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Backend/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('Backend/js/matrix.js') }}"></script>
    <script src="{{ asset('Backend/js/matrix.form_validation.js') }}"></script>
    <script src="{{ asset('Backend/js/matrix.tables.js') }}"></script>
    <script src="{{ asset('Backend/js/matrix.popover.js') }}"></script>
@endsection