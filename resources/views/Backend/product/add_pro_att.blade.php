@extends('layout.Pagination_b.master')
@section('title','Add Attribute')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('product.index')}}">Products</a> <a href="#" class="current">Add Attribute</a> </div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong></strong>{{Session::get('message')}}
            </div>
        @endif
            <div class="row-fluid">
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
                            <h5>Product : {{$product->name}}</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <ul class="recent-posts">
                                <li>
                                    <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{url('/uploads/products/small',$product->image)}}"> </div>
                                    <div class="article-post">
                                        <span class="user-info">Product Code : <b>{{$product->code}}</b></span>
                                        <p>Product Color : <b>{{$product->color}}</b></p>
                                    </div>
                                </li>
                                <li>
                                    <form action="{{route('product_att.store')}}" method="post" role="form">
                                        <legend>Add Attribute</legend>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group">
                                            <input type="hidden" name="products_id" value="{{$product->id}}">
                                            <input type="hidden" name="products_name" value="{{$product->name}}">

                                            <input type="hidden" class="form-control" name="sku" value="{{old('sku')}}" id="sku" placeholder="SKU" required>
                                            <span style="color: red;">{{$errors->first('sku')}}</span>
                                            <input type="text" class="form-control" name="size" value="{{old('size')}}" id="size" placeholder="Size" required>
                                            <span style="color: red;">{{$errors->first('size')}}</span>

                                            <input type="number" class="form-control" name="stock" value="{{old('stock')}}" id="stock" placeholder="Stock" required>
                                             <span style="color: red;">{{$errors->first('stock')}}</span>
                                        </div>
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
                            <h5>List Products Attribute</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="{{route('product_att.update',$product->id)}}" method="post" role="form">
                                {{method_field("PUT")}}
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>SKU</th>
                                    <th>Size</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($attributes as $attribute)
                                    <input type="hidden" name="id[]" value="{{$attribute->id}}">
                                <tr>
                                    <td class="taskDesc">
                                        <input type="text" name="sku[]" id="sku" class="form-control" value="{{$attribute->sku}}" required="required" style="width: 75px;">
                                    </td>
                                    <td class="taskStatus">
                                        <input type="text" name="size[]" id="size" class="form-control" value="{{$attribute->size}}" required="required" style="width: 75px;">
                                    </td>

                                    <td class="taskOptions">
                                        <input type="text" name="stock[]" id="amount" class="form-control" value="{{$attribute->stock}}" required="required" style="width: 75px;">
                                    </td>
                                    <td style="text-align: center; ">
                                        <button type="submit" class="btn btn-success btn-mini">Edit</button>
                                        <a href="javascript:" rel="{{$attribute->id}}" rel1="delete-attribute" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
@section('jsblock')
    <script src="{{asset('Backend/js/jquery.min.js')}}"></script>
    <script src="{{asset('Backend/js/jquery.ui.custom.js')}}"></script>
    <script src="{{asset('Backend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('Backend/js/bootstrap-colorpicker.js')}}"></script>
    <!-- <script src="{{asset('Backend/js/jquery.toggle.buttons.js')}}"></script> -->
    <script src="{{asset('Backend/js/masked.js')}}"></script>
    <script src="{{asset('Backend/js/jquery.uniform.js')}}"></script>
    <script src="{{asset('Backend/js/select2.min.js')}}"></script>
    <script src="{{asset('Backend/js/matrix.js')}}"></script>
   <!--  <script src="{{asset('Backend/js/matrix.form_common.js')}}"></script> -->
    <!-- <script src="{{asset('Backend/js/wysihtml5-0.3.0.js')}}"></script> -->
    <script src="{{asset('Backend/js/jquery.peity.min.js')}}"></script>
   <!--  <script src="{{asset('Backend/js/bootstrap-wysihtml5.js')}}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
      <script>
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
</script>
    <script>
        $(".deleteRecord").click(function () {
             if (confirm('Bạn có chắc muốn xóa không?')) {
                var id=$(this).attr('rel');
                var userId = $(this).attr('rel1');
                var _this = $(this);
                $.ajax({
                    url:"/admin/"+userId+"/"+id,
                    type:'get',

                    success:function(res){
                     _this.parent().parent().remove()
                 },
                 error:function(err){

                 }

             })
            }
        });
    </script>
@endsection