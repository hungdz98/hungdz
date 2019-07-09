@extends('layout.Pagination_b.master')
@section('title','List Products')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('slider.index')}}" class="current">Slider</a></div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong></strong> {{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                <h5>List Sliders</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered table-hover data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sliders as $slider)
                        <?php $i++;?>
                        <tr class="gradeC">
                            <td>{{$i}}</td>
                            <td style="text-align: center;"><img src="{{url('uploads/sliders/',$slider->image)}}" alt="" width="400px" height="300px">
                            </td>
                            <td>
                                <a href="javascript:" rel="{{$slider->id}}" rel1="delete-slider" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('jsblock')
    <script src="{{asset('Backend/js/jquery.min.js')}}"></script>
    <script src="{{asset('Backend/js/jquery.ui.custom.js')}}"></script>
    <script src="{{asset('Backend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('Backend/js/jquery.uniform.js')}}"></script>
    <script src="{{asset('Backend/js/select2.min.js')}}"></script>
    <script src="{{asset('Backend/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('Backend/js/matrix.js')}}"></script>
    <script src="{{asset('Backend/js/matrix.tables.js')}}"></script>
    <script src="{{asset('Backend/js/matrix.popover.js')}}"></script>
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