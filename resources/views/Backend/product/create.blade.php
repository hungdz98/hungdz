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
            <h5>Add New Products</h5>
        </div>
        <div class="widget-content nopadding">
            <form action="{{route('product.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="control-group">
                    <label class="control-label">Select Category</label>
                    <div class="controls">
                        <select name="categories_id" style="width: 415px;">
                            @foreach($categories as $key=>$value)
                            <option value="{{$key}}">{{$value}}</option>
                            <?php
if ($key != 0) {
	$sub_categories = DB::table('categories')->select('id', 'name')->where('parent_id', $key)->get();
	if (count($sub_categories) > 0) {
		foreach ($sub_categories as $sub_category) {
			echo '<option value="' . $sub_category->id . '">&nbsp;&nbsp;--' . $sub_category->name . '</option>';
		}
	}
}
?>
                         @endforeach
                     </select>
                 </div>
             </div>
             <div class="control-group">
                <label for="p_name" class="control-label">Name</label>
                <div class="controls{{$errors->has('name')?' has-error':''}}">
                    <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" title="" required="required" style="width: 400px;">
                    <span class="text-danger">{{$errors->first('name')}}</span>
                </div>
            </div>
          <!--   <div class="control-group">
                <label for="code" class="control-label">Code</label>
                <div class="controls{{$errors->has('code')?' has-error':''}}">
                    <input type="text" name="code" id="code" class="form-control" value="{{old('code')}}" title="" required="required" style="width: 400px;">
                    <span class="text-danger">{{$errors->first('code')}}</span>
                </div>
            </div> -->
            <div class="control-group">
                <label for="color" class="control-label">Color</label>
                <div class="controls{{$errors->has('color')?' has-error':''}}">
                    <input type="text" name="color" id="color" value="{{old('color')}}" required="required" style="width: 400px;">
                    <span class="text-danger">{{$errors->first('color')}}</span>
                </div>
            </div>
            <div class="control-group">
                <label for="description" class="control-label">Description</label>
                <div class="controls{{$errors->has('description')?' has-error':''}}">
                    <textarea class="textarea_editor span12" name="description" id="description" rows="6" placeholder="Product Description" style="width: 580px;">{{old('description')}}</textarea>
                    <span class="text-danger">{{$errors->first('description')}}</span>
                </div>
            </div>
            <div class="control-group">
                <label for="price" class="control-label">Price</label>
                <div class="controls{{$errors->has('price')?' has-error':''}}">
                    <div class="input-prepend"> <span class="add-on"></span>
                        <input type="number" name="price" id="price" class="" value="{{old('price')}}" title="" required="required">
                        <span class="text-danger">{{$errors->first('price')}}</span>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label for="sale" class="control-label">Sale</label>
                <div class="slidecontainer">
                    <input type="range" min="0" max="100" value="50" class="slider" id="myRange" name="sale">
                </div>
                <div id="demo"></div>
            </div>
            <div class="control-group{{$errors->has('status')?' has-error':''}}">
                <label class="control-label">Enable :</label>
                <div class="controls">
                    <input type="checkbox" name="status" id="status" value="1">
                    <span class="text-danger">{{$errors->first('status')}}</span>
                </div>
            </div>
          <div class="control-group">
            <label class="control-label">Image upload</label>
            <div class="controls">
                <input type="file" name="image" id="image"/>
                <span class="text-danger">{{$errors->first('image')}}</span>
            </div>
        </div>
        <div class="control-group">
            <label for="" class="control-label"></label>
            <div class="controls">
                <button type="submit" class="btn btn-success">Add New Product</button>
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
</script>
    @endsection