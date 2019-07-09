@extends('layout.Pagination_f.master')
@section('title','Tìm kiếm')
@section('slider')
@include ('layout.Pagination_f.slider')
@endsection
@section('content')

<div class="container-fluid padding">
	<div class="row text-center" id="productData">
		<div class="col-md-12">
			<div class="producs">
				<p class="pull-left">Kết quả tìm kiếm {{count($data)}} sản phẩm</p>
				<div class="clearfix"></div>
			</div>
		</div>
		@foreach($data as $p)
		<div class="col-md-3 col-sm-6">
            <div class="product-grid4">
                <div class="product-image4">
                    <a href="{{url('/product-detail',$p->id)}}">
                        <img class="pic-1" src="{{url('uploads/products/small/',$p->image)}}">
                        <img class="pic-2" src="{{url('uploads/products/small/',$p->image)}}">
                    </a>
                    <ul class="social">
                        <li><a href="{{url('/product-detail',$p->id)}}" data-tip="View"><i class="fa fa-eye"></i></a></li>

                    </ul>
                    <span class="product-new-label">New</span>
                    @if($p->sale !=0)
                    <span class="product-discount-label">-{{$p->sale}}%</span>
                    @endif
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#">{{$p->name}}</a></h3>
                    <div class="price">
                        @if($p->sale!=0)
                        {{number_format($p->price*((100-$p->sale)/100), 2, ',', '.').' VNĐ'}}
                        <span>{{number_format($p->price, 2, ',', '.').' VNĐ'}}</span>
                        @else

                        <div >{{number_format($p->price, 2, ',', '.').' VNĐ'}}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

		@endforeach
	</div>
</div>

@stop