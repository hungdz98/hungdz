@extends('layout.Pagination_f.master')
@section('title','Sản phẩm')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{url('/viewcart')}}">Giỏ hàng</a></li>
    <li class="breadcrumb-item active" aria-current="page">Đơn hàng của bạn</li>
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
                <th>Mã đơn hàng</th>
                <th>Mặt hàng</th>
                <th>Phương thức thanh toán</th>
                <th>Tổng tiền</th>
                <th>Ngày đặt</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
            <td>{{$order->id}}</td>
                <td>
                    @foreach($order->orders as $pro)
                <a href="{{url('/orders/'.$order->id)}}">
                    {{$pro->product_name}}
                    ({{$pro->product_qty}})
                </a><br>
                    @endforeach
                </td>
                <td>{{$order->payment_method}}</td>
                <td>{{$order->grand_total}}</td>
                <td>{{$order->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

</div>
</section>
@stop