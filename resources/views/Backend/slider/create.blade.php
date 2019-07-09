@extends('layout.Pagination_b.master')
@section('title','Add Products Page')
@section('content')
<div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('product.index')}}">Products</a> <a href="{{route('product.create')}}" class="current">Add New Product</a> </div>
<div class="container-fluid">
    @if(Session::has('message'))
    <div class="alert alert-success text-center" role="alert">
        <strong></strong>{{Session::get('message')}}
    </div>
    @endif
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Add New Slider</h5>
        </div>
        <div class="widget-content nopadding">
            <form action="{{route('slider.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
               <!--  <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
            @csrf
          <div class="control-group">
            <label class="control-label">Slider upload</label>
            <div class="controls">
                <input type="file" name="image" id="image" onchange="changeImg(this)"/>
                <span class="text-danger">{{$errors->first('image')}}</span>
                <img id="avatar" class="thumbnail" width="500px" height="300px" src="">
            </div>
        </div>
        <div class="control-group">
            <label for="" class="control-label"></label>
            <div class="controls">
                <button type="submit" class="btn btn-success">Add New Slider</button>
            </div>
        </div>
    </form>
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
<!-- <script src="{{asset('Backend/js/bootstrap-wysihtml5.js')}}"></script> -->
   <!--  <script>
        $('.textarea_editor').wysihtml5();
    </script> -->
<script>
           var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  output.innerHTML = this.value;
}
function changeImg(input){
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if(input.files && input.files[0]){
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function(e){
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            $('#avatar').click(function(){
                $('#img').click();
            });
        });
    </script>
</script>
    @endsection