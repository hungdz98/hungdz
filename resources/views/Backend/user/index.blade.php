@extends('layout.Pagination_b.master')
@section('title','List Categories')
@section('content')
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{route('user.index')}}" class="current">User</a></div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong></strong> {{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"></i></span>
                <h5>List Users</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                    <tr>
                        <td style="text-align: center;">{{$user->name}}</td>
                        <td style="text-align: center;">{{$user->email}}</td>
                        <td style="text-align: center;">{{$user->address}}</td>
                        <td style="text-align: center;">{{$user->mobile}}</td>
                        <td style="text-align: center;">{{($user->admin==0)?' User':'Admin'}}</td>
                        <td style="text-align: center;">
                            @if($user->admin==0)
                               <a data-url="{{ route('delete-user',$user->id) }}"​  data-target="#delete" data-toggle="modal" class="btn btn-danger btn-mini btn-delete">Delete</a>

                            @endif

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

      });
    </script>
    <script>
        $('.btn-delete').click(function(){
                    var url = $(this).attr('data-url');
                    var _this = $(this);
                    if (confirm('Bạn có chắc muốn xóa không?')) {
                        $.ajax({
                            type: 'get',
                            url: url,
                            success: function(res) {
                                 _this.parent().parent().remove()
                                 toastr.success('Delete success!')
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                //xử lý lỗi tại đây
                            }
                        })
                    }
                })
    </script>
@endsection