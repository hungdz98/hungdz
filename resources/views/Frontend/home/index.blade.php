@extends('layout.Pagination_f.master')
@section('title','Trang chủ')
@section('slider')
@include ('layout.Pagination_f.slider')
@endsection
@section('content')

<div class="container-fluid padding">
	<hr>
		<h1>Sản phẩm khuyễn mãi </h1>

		@if(count($products)=="0")
        <div class="col-md-12" align="center">

            <h1 align="center" style="margin:20px">
              No products found under
			</h1>
        </div>
        @else
        <div class="row text-center" id="productslide">
        	<div class="owl-carousel owl-theme" id="productSlide">
        		@foreach($productNew as $product)
        		<div class="item">

                    <div class="product-grid4">
                        <div class="product-image4">
                            <a href="{{url('/product-detail',$product->id)}}">
                                <img class="pic-1" src="{{url('uploads/products/small/',$product->image)}}">
                                <img class="pic-2" src="{{url('uploads/products/small/',$product->image)}}">
                            </a>
                            <ul class="social">
                                <li><a href="{{url('/product-detail',$product->id)}}" data-tip="View"><i class="fa fa-eye"></i></a></li>

                            </ul>
                            <span class="product-new-label">New</span>
                            @if($product->sale !=0)
                            <span class="product-discount-label">-{{$product->sale}}%</span>
                            @endif
                        </div>
                        <div class="product-content">
                            <h3 class="title"><a href="#">{{$product->name}}</a></h3>
                            <div class="price">
                                @if($product->sale!=0)
                                {{number_format($product->price*((100-$product->sale)/100), 2, ',', '.').' VNĐ'}}
                                <span>{{number_format($product->price, 2, ',', '.').' VNĐ'}}</span>
                                @else

                                <div >{{number_format($product->price, 2, ',', '.').' VNĐ'}}</div>
                                @endif
                            </div>
                        </div>
                    </div>
				</div>

				@endforeach
		</div>
	</div>
	<div class="container-fluid" id="fillterId" >
	@if(count($products)!="0")
 <div class="row" id="fillter">
		 				 <div class="col-sm-1">
		 				 </div>
				    <div class="col-sm-2">
				    	<div for="">Khoảng giá</div>
				    	<select id="priceID" style="width: 200px;">
				    		<option value="">Mặc định</option>
				    		<option value="0-100000">0-100000</option>
				    		<option value="100000-500000">100000-500000</option>
				    		<option value="500000-1000000">500000-1000000</option>
				    		<option value="1000000-5000000">1000000-5000000</option>
				    		<option value="5000000-10000000">5000000-10000000</option>
				    	</select>
				    </div>
				          <div class="col-sm-2">
				    	<div for="">Size</div>
				    	<select id="sizeID" style="width: 200px;">
				    			<option value="">Tất cả</option>
				    			<option value="37">36</option>
								<option value="37">37</option>
								<option value="38">38</option>
								<option value="39">39</option>
								<option value="40">40</option>
								<option value="41">41</option>
								<option value="42">42</option>
								<option value="43">43</option>
								<option value="44">44</option>


				    	</select>
				    </div>
				          <div class="col-sm-2">
				    	<div for="">Color</div>
				    	<select id="colorID" style="width: 200px;" >
				    			<option value="">Tất cả</option>
								<option value="Black">Black</option>
								<option value="Blue">Blue</option>
								<option value="White">White</option>
								<option value="Red">Red</option>
								<option value="Violet">Violet</option>


				    	</select>
				    </div>
				      <div class="col-sm-2">
				    	<div for="">Sắp xếp theo</div>
				    	<select id="searchID"style="width: 200px;" >
				    			<option value="">Mặc định</option>
								<option value="0">Giá thấp đến cao</option>
								<option value="1">Giá cao điến thấp</option>


				    	</select>
				    </div>


				    <div class="col-sm-3 hidden-xs">
				    	<button id="findBtn2" class="btn btn-success pull-right">Tìm giày ngay</button>
				    </div>
				</div>
		<input type="hidden" name="id"  id="id" value="">
        @endif
</div>
		<h1>Trending</h1>
        <div class="row text-center" id="productData">

          	@foreach($products as $product)
			@if($product->category->status==1)

			<div class="col-md-3 col-sm-6">
            <div class="product-grid4">
                <div class="product-image4">
                    <a href="{{url('/product-detail',$product->id)}}">
                        <img class="pic-1" src="{{url('uploads/products/small/',$product->image)}}">
                        <img class="pic-2" src="{{url('uploads/products/small/',$product->image)}}">
                    </a>
                    <ul class="social">
                        <li><a href="{{url('/product-detail',$product->id)}}" data-tip="View"><i class="fa fa-eye"></i></a></li>

                    </ul>
                    <span class="product-new-label">New</span>
                    @if($product->sale !=0)
                    <span class="product-discount-label">-{{$product->sale}}%</span>
                    @endif
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">{{$product->name}}</a></h3>
                    <div class="price">
                        @if($product->sale!=0)
                        {{number_format($product->price*((100-$product->sale)/100), 2, ',', '.').' VNĐ'}}
                        <span>{{number_format($product->price, 2, ',', '.').' VNĐ'}}</span>
                        @else

                        <div >{{number_format($product->price, 2, ',', '.').' VNĐ'}}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


		@endif
	@endforeach

</div>
 <div class="space40">&nbsp;</div>
{!! $products->links() !!}
@endif
 </div>


@stop