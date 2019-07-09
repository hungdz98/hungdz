@extends('layout.Pagination_b.master')
@section('title','Add Products Page')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('product.index')}}">Products</a> <a href="#" class="current">Edit Product</a> </div>
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
                <form action="{{route('product.update',$edit_product->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    {{method_field("PUT")}}
                    <div class="control-group">
                        <label class="control-label">Select Category</label>
                        <div class="controls">
                            <select name="categories_id" style="width: 415px;">
                                @foreach($categories as $key=>$value)
                                    <option value="{{$key}}"{{$edit_category->id==$key?' selected':''}}>{{$value}}</option>
                                    <?php
if ($key != 0) {
	$sub_categories = DB::table('categories')->select('id', 'name')->where('parent_id', $key)->get();
	if (count($sub_categories) > 0) {
		foreach ($sub_categories as $sub_category) {?>
                                                <option value="{{$sub_category->id}}"{{$edit_category->id==$sub_category->id?' selected':''}}>&nbsp;&nbsp;--{{$sub_category->name}}</option>
                                           <?php }
	}
}
?>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="name" class="control-label">Name</label>
                        <div class="controls{{$errors->has('name')?' has-error':''}}">
                            <input type="text" name="name" id="name" class="form-control" value="{{$edit_product->name}}" title="" required="required" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="color" class="control-label">Color</label>
                        <div class="controls{{$errors->has('color')?' has-error':''}}">
                            <input type="text" name="color" id="color" value="{{$edit_product->color}}" required="required" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('color')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="description" class="control-label">Description</label>
                        <div class="controls{{$errors->has('description')?' has-error':''}}">
                            <textarea class="textarea_editor span12" name="description" id="description" rows="6" placeholder="Product Description" style="width: 580px;">{{$edit_product->description}}</textarea>
                            <span class="text-danger">{{$errors->first('description')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="price" class="control-label">Price</label>
                        <div class="controls{{$errors->has('price')?' has-error':''}}">
                            <div class="input-prepend"> <span class="add-on">$</span>
                                <input type="number" name="price" id="price" class="" value="{{$edit_product->price}}" title="" required="required">
                                <span class="text-danger">{{$errors->first('price')}}</span>
                            </div>
                        </div>
                    </div> <div class="control-group">
                        <label for="sale" class="control-label">Sale</label>
                        <div class="slidecontainer">
                            <input type="range" min="0" max="100" class="slider" id="myRange" name="sale" value="{{$edit_product->sale}}">
                            <div id="demo"></div>
                        </div>
                    </div>
                       <div class="control-group">
                                <label class="control-label">Enable :</label>
                                <div class="controls">
                                    <input type="checkbox" name="status" id="status" value="1" {{($edit_product->status==0)?'':'checked'}}>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Image</label>
                                <div class="controls">
                                  <input type="file" name="image" id="image">
                                  <input type="hidden" name="current_image" value="{{$edit_product->image}}">
                                  @if(!empty($edit_product->image))
                                  <img style="width:50px;" src="{{asset('/uploads/products/small/'.$edit_product->image)}}">
                                  |<a href="javascript:" rel="{{$edit_product->id}}" rel1="delete-product-image" class="btn btn-danger btn-mini deleteRecord">Delete Old Image</a>
                                  @endif
                              </div>
                          </div>

                    <div class="control-group">
                        <label for="" class="control-label"></label>
                        <div class="controls">
                            <button type="submit" class="btn btn-success">Edit Product</button>
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
   <!--  <script src="{{asset('Backend/js/wysihtml5-0.3.0.js')}}"></script> -->
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
            var id=$(this).attr('rel');
            var deleteFunction=$(this).attr('rel1');
            swal({
                title:'Are you sure?',
                text:"You won't be able to revert this!",
                type:'warning',
                showCancelButton:true,
                confirmButtonColor:'#3085d6',
                cancelButtonColor:'#d33',
                confirmButtonText:'Yes, delete it!',
                cancelButtonText:'No, cancel!',
                confirmButtonClass:'btn btn-success',
                cancelButtonClass:'btn btn-danger',
                buttonsStyling:false,
                reverseButtons:true
            },function () {
                window.location.href="/admin/"+deleteFunction+"/"+id;
            });
        });
       /* $('.textarea_editor').wysihtml5();*/
       var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value; // Display the default slider value

// Update the current slider value (each time you drag the slider handle)
slider.oninput = function() {
  output.innerHTML = this.value;
}
    </script>
@endsection