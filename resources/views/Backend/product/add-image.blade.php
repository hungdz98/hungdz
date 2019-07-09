@extends('layout.Pagination_b.master')
@section('title','Add Images')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('product.index')}}">Products</a> <a href="#" class="current">Add Images </a> </div>
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
                                <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{url('uploads/products/small',$product->image)}}"> </div>
                                <div class="article-post">
                                    <span class="user-info">Product Code : <b>{{$product->code}}</b></span>
                                    <p>Product Color : <b>{{$product->color}}</b></p>
                                </div>
                            </li>
                            <li>
                                <form action="{{route('images.store')}}" method="post" role="form" enctype="multipart/form-data">
                                    <legend>Bạn có thể thêm nhiều ảnh</legend>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group">
                                        <input type="hidden" name="products_id" value="{{$product->id}}">
                                        <input type="file" name="image[]" id="id_imageGallery" class="form-control" multiple="multiple" required>
                                        <span class="text-danger">{{$errors->first('image')}}</span>
                                        <button type="submit" class="btn btn-success">Upload</button>
                                    </div>

                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
                        <h5>List Images </h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;?>
                                @foreach($images as $image)
                                    <tr>
                                        <td class="taskDesc" style="text-align: center;vertical-align: middle;">{{$i++}}</td>
                                        <td class="taskOptions" style="text-align: center;vertical-align: middle;"><img src="{{url('uploads/products/small',$image->image)}}" class="img-responsive" alt="Image" width="60"></td>
                                        <td style="text-align: center;vertical-align: middle;"><a href="javascript:" rel="{{$image->id}}" rel1="delete-image" class="btn btn-danger btn-mini deleteRecord">Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
    <!-- <script src="{{asset('Backend/js/matrix.form_common.js')}}"></script> -->
    <!-- <script src="{{asset('Backend/js/wysihtml5-0.3.0.js')}}"></script> -->
    <script src="{{asset('Backend/js/jquery.peity.min.js')}}"></script>
  <!--   <script src="{{asset('Backend/js/bootstrap-wysihtml5.js')}}"></script> -->
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