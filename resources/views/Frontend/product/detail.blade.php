@extends('layout.Pagination_f.master')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$detail_product->name}}</li>
  </ol>
</nav>
	<div class="container">
		 @if(Session::has('message'))
                    <div class="alert alert-success text-center" role="alert">
                        {{Session::get('message')}}
                    </div>
                @endif
		<div id="content" style="padding-top: 50px;">
			<div class="row">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-6">
							<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
								<a href="{{url('uploads/products/large',$detail_product->image)}}">
									<img src="{{url('uploads/products/small',$detail_product->image)}}" alt="" id="dynamicImage" width="500px" height="400px" />
								</a>
							</div>

							<ul class="thumbnails" style="margin-left: -10px;">
								<li>
									@foreach($imagesGalleries as $imagesGallery)
									<a href="{{url('uploads/products/large',$imagesGallery->image)}}" data-standard="{{url('uploads/products/small',$imagesGallery->image)}}">
										<img src="{{url('uploads/products/small',$imagesGallery->image)}}" alt="" width="75" style="padding: 8px;">
									</a>
									@endforeach
								</li>
							</ul>
						</div>
						<div class="col-sm-6">

						<form action="{{route('addToCart')}}" method="post" role="form">

                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="products_id" value="{{$detail_product->id}}">
                    <input type="hidden" name="product_name" value="{{$detail_product->name}}">
                    <input type="hidden" name="product_color" value="{{$detail_product->color}}">
                    <input type="hidden" name="product_image" value="{{$detail_product->image}}">
                    @if($detail_product->sale == 0)
                        <input type="hidden" name="price" value="{{$detail_product->price}}" id="dynamicPriceInput">

                    @else
                         <input type="hidden" name="price" value="{{$detail_product->price*((100-$detail_product->sale)/100)}}" id="dynamicPriceInput">

                    @endif
                    <div class="product-information"><!--/product-information-->
                        <img src="" class="newarrival" alt="" />
                        <h2>Tên sản phẩm: {{$detail_product->name}}</h2>
                        <p>Color: {{$detail_product->color}}</p>
                        <span>
                            <select name="size" id="idSize" class="form-control" style="width: 100px">
                        	<option value="">Size</option>
                            @foreach($detail_product->attributes as $attrs)
                                <option value="{{$detail_product->id}}-{{$attrs->size}}">{{$attrs->size}}</option>
                            @endforeach
                        </select>
                        </span><br>
                        <span>

                             <div class="m-bot15"> <strong>Price : </strong>
                                @if($detail_product->sale!=0)
                                <span class="amount-old" style=" text-decoration: line-through;">{{number_format($detail_product->price, 2, ',', '.').' VNĐ'}}</span>  <span class="pro-price">   {{number_format($detail_product->price*((100-$detail_product->sale)/100), 2, ',', '.').' VNĐ'}}</span>
                                @else
                                <span>
                                    {{number_format($detail_product->price, 2, ',', '.').' VNĐ'}}</span>
                                </span>
                                 @endif
                            </div>
                            <label>Quantity:</label>
                            <input type="number" min="1" max="100" width="20px"name="quantity" value="{{$totalStock}}" id="inputStock"/>
                            @if($totalStock>0)
                            <button type="submit" class="btn btn-round btn-danger" id="buttonAddToCart">
                                <i class="fa fa-shopping-cart"></i>
                                Thêm vào giỏ hàng
                            </button>
                            @endif
                        </span>
                        <p><b>Trạng thái:</b>
                            @if($totalStock>0)
                                <span id="availableStock">Còn hàng</span>
                            @else
                                <span id="availableStock">Hết Hàng</span>
                            @endif
                        </p>
                        <p><b>Hoặc đặt mua:</b> 0362188088(Tư vẫn miễn phí)</p>

                    </div><!--/product-information-->
                </form>
						</div>
					</div>


				</div>
			</div>
		</div> <!-- #content -->
		<div class="recommended_items">
			<h2>Sản phẩm liên quan</h2>
		<div class="owl-carousel owl-theme">
			@foreach($relateProducts as $item)

				<div class="item">
            <div class="product-grid4">
                <div class="product-image4">
                    <a href="{{url('/product-detail',$item->id)}}">
                        <img class="pic-1" src="{{url('uploads/products/small/',$item->image)}}">
                        <img class="pic-2" src="{{url('uploads/products/small/',$item->image)}}">
                    </a>
                    <ul class="social">
                        <li><a href="{{url('/product-detail',$item->id)}}" data-tip="View"><i class="fa fa-eye"></i></a></li>

                    </ul>
                    <span class="product-new-label">New</span>
                    @if($item->sale !=0)
                    <span class="product-discount-label">-{{$item->sale}}%</span>
                    @endif
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">{{$item->name}}</a></h3>
                    <div class="price">
                         @if($item->sale!=0)
                        {{number_format($item->price*((100-$item->sale)/100), 2, ',', '.').' VNĐ'}}
                        <span>{{number_format($item->price, 2, ',', '.').' VNĐ'}}</span>
                        @else

                        <div >{{number_format($item->price, 2, ',', '.').' VNĐ'}}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

			@endforeach
		</div>
	</div>

	</div>





@endsection
