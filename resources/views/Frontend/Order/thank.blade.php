@extends('layout.Pagination_f.master')
@section('title','Thanks')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Thanks</li>
  </ol>
</nav>
<section id="cart_items">
<div class="container-fluid">
</div>
</section>

<section id="do_action">
<div class="container">
<div class="heading" align="center">
	<h1>Cảm ơn quý khách đã chọn sản phẩm của chúng tôi !</h1>
<h3>Đơn hàng của bạn đã được tiếp nhận </h3>
<p>Mã đơn hàn của bạn là {{Session::get('order_id')}}
và tổng số phải trả là {{Session::get('total')}}</p>
</div>

</div>
</section>
@stop
<?php
Session::forget('total');
Session::forget('order_id');

?>