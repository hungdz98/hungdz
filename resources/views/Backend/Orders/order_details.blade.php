
@extends('layout.Pagination_b.master')
@section('title','List Products')
@section('content')

<div id="content-header">
<div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Orders</a> </div>

@if(Session::has('message'))
<div class="alert alert-success alert-block">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
</button>
<strong>{{ session('message') }}</strong>
</div>
@endif
<h1>Oder: {{$orderDetails->id}}</h1>

</div>
<div class="container-fluid">
<hr>
<div class="row-fluid">
        <div class="span6">
                <div class="widget-box">
                <div class="widget-title">
                    <h5>Chi tiết đặt hàng</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-striped table-bordered">

            <tbody>
                <tr>
                <td class="taskDesc"> Ngày đặt hàng</td>
                <td class="taskStatus">{{$orderDetails->created_at}}</td>
                </tr>
                <tr>
                <td class="taskDesc"> Tình trạng đặt hàng</td>
                <td class="taskStatus">{{$orderDetails->order_status}}</td>
                </tr>
                <tr>
                <td class="taskDesc">Tổng số đơn hàng</td>
                <td class="taskStatus">{{$orderDetails->grand_total}}</td>
                </tr>
                <td class="taskDesc">Chi phí vận chuyển</td>
                <td class="taskStatus">{{$orderDetails->shiping_charges}}</td>
                </tr>
                <tr>
                <td class="taskDesc"> Phương thức thanh toán</td>
                <td class="taskStatus">{{$orderDetails->payment_method}}</td>
                </tr>
            </tbody>
                    </table>
                </div>
                </div>
                <div class="widget-box">
                <div class="widget-title">
                    <h5>Địa chỉ nhận hàng</h5>
                </div>
                <div class="widget-content">
                    Tên: {{$orderDetails->name}} <br>
                     Địa chỉ: {{$orderDetails->address}} <br>
                    Số điện thoại: {{$orderDetails->mobile}} <br>

                </div>
                </div>
    </div>
<div class="span6">
        <div class="widget-box">
                <div class="widget-title">
                    <h5>Chi tiết khách hàng</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-striped table-bordered">

            <tbody>
                <tr>
                <td class="taskDesc">Tên khách hàng</td>
                <td class="taskStatus">{{$orderDetails->name}}</td>
                </tr>
                <tr>
                <td class="taskDesc">Email của khách hàng</td>
                <td class="taskStatus">{{$orderDetails->user_email}}</td>
                </tr>
            </tbody>
                    </table>
                </div>
                </div>
        <div class="widget-box">
            <div class="widget-title">
                <h5>Cập nhật trạng thái giao hàng</h5>
            </div>
            <div class="widget-content">
            <form action="{{url('/admin/update-order-status')}}" method="post"> {{csrf_field()}}
            <input type="hidden" name="order_id" value="{{$orderDetails->id}}">
                   <table style="width:100%;">
                    <tr>
                    <td>
                   <select name="order_status" id="order_status"  required="">
                     <option value="New" @if($orderDetails->order_status== "New") selected @endif>
                         Mới</option>
                     <option value="Pending" @if($orderDetails->order_status== "Pending") selected @endif>
                         Đang chờ xử lý</option>
                     <option value="Shipped" @if($orderDetails->order_status== "Shipped") selected @endif>
                         Đang vận chuyển</option>
                     <option value="Delivered" @if($orderDetails->order_status== "Delivered") selected @endif>
                         Đã giao hàng</option>
                     <option value="Cancelled" @if($orderDetails->order_status== "Cancelled") selected @endif>
                         Đã hủy</option>
                    <option value="Paid" @if($orderDetails->order_status== "Paid") selected @endif>
                            Đã thanh toán</option>
                   </select>
                    </td>
                    <td>
                   <input type="submit" value="Cập nhật trạng thái" class="btn btn-info">
                    </td>
                    </tr>
                   </table>
               </form>
            </div>
        </div>
</div>
</div>
<hr>
 <div class="row-fluid">
     <h3 align="center">Danh sách sản phẩm đặt hàng</h3>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>

                <th>Tên sản phẩm</th>
                <th>Kích thước sản phẩm</th>
                <th>Màu sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Số lượng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderDetails->orders as $pro)
            <tr>

                <td>{{$pro->product_name}}</td>
                <td>{{$pro->product_size}}</td>
                <td>{{$pro->product_color}}</td>
                <td>{{$pro->product_price}}</td>
                <td>{{$pro->product_qty}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

 </div>
</div>

<!--main-container-part-->
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




