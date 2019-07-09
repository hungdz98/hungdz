@extends('layout.Pagination_f.master')
@section('title','Sản phẩm')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{url('/viewcart')}}">Giỏ hàng</a></li>
     <li class="breadcrumb-item"><a href="{{url('/viewcart')}}">Đơn hàng của bạn</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$orderDetails->id}}</li>
  </ol>
</nav>
<section id="cart_items">
<div class="container">

</div>
</section>

<section id="do_action">
<div class="container">
<div class="heading" align="center">

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Product Size</th>
                <th>Product Color</th>
                <th>Product Price</th>
                <th>Product Qty</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderDetails->orders as $pro)
            <tr>
                <td>{{$pro->product_id}}</td>
                <td>{{$pro->product_name}}</td>
                <td>{{$pro->product_size}}</td>
                <td>{{$pro->product_color}}</td>
                <td>{{$pro->product_price}}</td>
                <td>{{$pro->product_qty}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

</div>
</section>
@stop