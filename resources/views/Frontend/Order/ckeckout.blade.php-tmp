@extends('layout.Pagination_f.master')
@section('title','Check out')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Đặt hàng</li>
  </ol>
</nav>
 <div class="container">

    @if (session()->has('success_message'))
    <div class="spacer"></div>
    <div class="alert alert-success">
        {{ session()->get('success_message') }}
    </div>
    @endif

    @if(count($errors) > 0)
    <div class="spacer"></div>
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <h1 class="checkout-heading stylish-heading">Đặt hàng</h1>
    <div class="checkout-section">
         <form action="{{route('order')}}" method="POST" id="payment-form">
                    {{ csrf_field() }}
        <div class="row">
            <input type="hidden" id="user_id" name="user_id" value="{{$userDetails->id}}">
            <div class="col-sm-6">
                    <div class="form-group">
                        <label for="">Họ tên*</label>
                        <input name="billing_name" id="billing_name" @if(!empty($userDetails->name)) value="{{$userDetails->name}}" @endif
                        type="text" placeholder="Name" class="form-control" />

                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="">Email*</label>
                            <input name="billing_email" id="billing_email" @if(!empty($userDetails->email)) value="{{$userDetails->email}}" @endif
                            type="text" placeholder="Email" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="">Địa chỉ*</label>
                            <input name="billing_address" id="billing_address" @if(!empty($userDetails->address)) value="{{$userDetails->address}}" @endif
                            type="text" placeholder="Address" class="form-control"/>
                        </div>
                        <label for="">Điện thoại*</label>
                        <input name="billing_mobile" id="billing_mobile" @if(!empty($userDetails->mobile)) value="{{$userDetails->mobile}}" @endif
                        type="text" placeholder="Mobile" class="form-control"/>
                    </div>

            </div>
            <div class="col-sm-6">

                       <div class="your-order">
                        <div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
                        <div class="your-order-body" style="padding: 0px 10px">
                            <div class="your-order-item">
                                <div>
                               @foreach (Cart::session(auth()->user()->id)->getContent() as $item)
                                <!--  one item   -->
                                    <div class="media">
                                         <img class="pull-left" src="{{url('uploads/products/small/',$item->attributes->image)}}" alt="" width="100px">
                                        <div class="media-body">
                                            <p class="font-large">{{ $item->name }}</p>
                                            <span class="color-gray your-order-info">Đơn giá: {{number_format($item->price, 2, ',', '.').' VNĐ'}}</span>
                                            <span class="color-gray your-order-info">Số lượng: {{$item->quantity}}</span>
                                        </div>
                                    </div>
                                <!-- end one item -->
                                @endforeach

                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
                                <div class="pull-right"><h5 class="color-black">{{number_format(Cart::session(auth()->user()->id)->getTotal(), 2, ',', '.').' VNĐ'}}</h5></div>
                                 <input type="hidden" id="total" name="total" value="{{Cart::getTotal()}}">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>

                        <div class="your-order-body">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
                                    <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>

                                </li>

                                <li class="payment_method_cheque">
                                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
                                    <label for="payment_method_cheque">Chuyển khoản </label>

                                </li>

                            </ul>
                        </div>

                        <div class="text-center"><button type="submit" class="beta-btn primary" href="#">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
                    </div>
        </form>

</div> <!-- end checkout-section -->
</div>
</div>
@stop