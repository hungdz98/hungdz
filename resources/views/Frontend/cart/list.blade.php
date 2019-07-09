@extends('layout.Pagination_f.master')
@section('title','Sản phẩm')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
  </ol>
</nav>
<div class="container">
			<div class="viewOrders"><a href="{{url('/orders')}}"><i class="fas fa-eye"></i>Xem đơn hàng của bạn</a></div>
			<h1 class="justify-content-end">Giỏ hàng</h3>
		<div id="content">
			@if(Cart::getTotalQuantity() >= 1)
				<div class="removeCart" style="float: right;"><a href="javascript:" class="removeCart pull-right" title="Remove this item" rel1="deleteCart"><i class="far fa-window-close"></i></a></div>
			<div class="">
				<!-- Shop Products Table -->
				<table class="table table-bordered table-striped table-responsive-stack"  id="tableOne" cellspacing="0">
					<thead class="thead-dark">
						<tr>
							<th class="product-name">Product</th>
							<th class="product-price">Price</th>
							<th class="product-quantity">Qty.</th>
							<th class="product-subtotal">Total</th>
							<th class="product-remove">Remove</th>
						</tr>
					</thead>
					<tbody>

							@foreach($items as $item)
							<tr class="cart_item">
								<td class="product-name">
									<div class="media">
										{{$item->name}}
									</div>
								<img class="pull-left" src="{{url('uploads/products/small/',$item->attributes->image)}}" alt="" width="100px">
									<div class="media-body pull-right">
										<p class="font-large table-title"></p>
										<p class="table-option">Color:{{$item->attributes->color }}</p>
										<p class="table-option">Size: {{$item->attributes->size}}</p>
									</div>
								</td>

								<td class="product-price">
									<span class="amount">{{number_format($item->price, 2, ',', '.').' VNĐ'}}</span>
								</td>

								<td class="product-quantity" width="15%">
                                    <input type="number" max="100" min="1" value="{{$item->quantity}}" class="qty-fill" id="upCart{{$item->id}}" rel="{{$item->id}}">

								</td>

								<td class="product-subtotal">
									<span class="amount">{{number_format($item->price*$item->quantity, 2, ',', '.').' VNĐ'}}</span>
								</td>

								<td class="product-remove">
									<a href="javascript:" class="remove" title="Remove this item" rel="{{$item->id}}" rel1="deleteItem"><i class="far fa-trash-alt"></i></i></a>
								</td>
							</tr>
							@endforeach

									<div class="cart-total text-right">Tổng tiền:{{number_format(Cart::gettotal(), 2, ',', '.').' VNĐ'}}<span class="cart-total-value"></span></div>






					</tbody>


					<tfoot>
						<tr>
							<!-- <td colspan="4"><div class="cart-total text-right">Tổng tiền:{{number_format($total, 2, ',', '.').' VNĐ'}}<span class="cart-total-value"></span></div></td> -->

							<td class="actions" >
								<a class="btn btn-mini btn-primary" href="{{url('/getCheckout')}}" class="pull-right">Đặt hàng</a>
							</td>
						</tr>
					</tfoot>
				</table>
				<!-- End of Shop Table Products -->
			</div>
			@else
			<p>Giỏ hàng trống</p>
			<a href="{{url('/')}}">Về trang chủ</a>
			@endif
			<div class="clearfix"></div>

		</div> <!-- #content -->
	</div> <!-- .container -->

@stop
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script>
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
</script>
<script>
	$(document).ready(function() {
		@foreach($items as $item)
		$("#upCart{{$item->id}}").on('change keyup',function(){
			var newQty = $("#upCart{{$item->id}}").val();
			var id=$(this).attr('rel');
			//alert(newQty);
				$.ajax({
					url:"/viewcart/update-quantity/"+id+"/"+newQty,
          				type:'get',
          				success:function(res){
          					location.reload();
          				},
          				error:function(err){

                 }

				});
			});
			@endforeach

		$(".remove").click(function () {
			if (confirm('Bạn có chắc muốn xóa không?')) {
				var userId = $(this).attr('rel1');
				var id=$(this).attr('rel');
				var _this = $(this);
				$.ajax({

					url:"/viewcart/"+userId+"/"+id,
					type:'get',

					success:function(res){
						_this.parent().parent().remove()
						location.reload();
					},
					error:function(err){

					}

				})
			}

		});
		$(".removeCart").click(function () {
			if (confirm('Bạn có chắc muốn xóa giỏ hàng không?')) {
				var id=$(this).attr('rel');
				var userId = $(this).attr('rel1');
				var _this = $(this);
				$.ajax({
					url:"/viewcart/"+userId,
					type:'get',

					success:function(res){
						_this.parent().parent().remove()
					},
					error:function(err){

					}

				})
			}

		});
	});

</script>
