@extends('layouts.admin.master')
@section('contents')

<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption uppercase">
            <i class="fa fa-book"></i> Danh sách xe</div>

    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="btn-group" data-pg-collapsed>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> Loại xe
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="#">Action</a>
                    </li>
                    <li>
                        <a href="#">Another action</a>
                    </li>
                    <li>
                        <a href="#">Something else here</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">Separated link</a>
                    </li>
                </ul>

            </div>
            <a class="btn btn-primary btn-success" href="{{route('vms.vehicle.create')}}" ><i class="fa fa-plus"></i> Thêm xe mới</a>
            {{--<h4 class=" pull-left">Lọc: </h4>--}}
        </div>
        <div class="panel-body">
            <div class="row">
            <div class="container" data-pg-collapsed>
                @foreach($vehicles as $item)
                <div class="row">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="col-md-2">
                                <img src="{{ url($item->avatar) }}" width="100" class="img-responsive img-rounded text-justify" />
                            </div>
                            <div class="col-md-10">
                                <h3>{{$item->vehType->name}}</h3>
                                <h4>Tải trọng: {{$item->veh_capacity}}</h4>
                                <p>{{$item->desc}}</p>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <ul class="list-inline">
                                <li>
                                    <a class="btn btn-primary" href="#"><i class="fa fa-trash-o"></i> Xóa</a>
                                </li>
                                <li>
                                    <a class="btn btn-primary" href="#"><i class="fa fa-edit"></i> Sửa</a>
                                </li>
                                <li>
                                    <a class="btn btn-primary" href="{{route('vms.vehicle.show', ['id'=>$item->id])}}"><i class="fa fa-truck"></i> Lịch trình</a>
                                </li>
                                <li>
                                    <a class="btn btn-primary" href="{{route('vms.road.create', ['id'=>$item->id])}}"><i class="fa fa-plus-circle"></i> Thêm lịch trình</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>
    </div>
</div>
    {{$vehicles->links()}}

<script>
 function alertDel(id){

  //-----------Notification when delete---------------
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "500",
    "hideDuration": "500",
    "timeOut": "2500",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  };
  console.log(id);
  var path = "{{URL::asset('')}}admin/car_company/" + id;
  console.log(path);

    swal({
        title: "Do you want to delete?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "Không",
        confirmButtonText: "Có",
        
        // closeOnConfirm: false,
    },
    function(isConfirm) {
        if (isConfirm) {  

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
              type: "DELETE",
              url: path,
              success: function(res)
              {
                if(!res.error) {
                    toastr.success('Xóa thành công!');
                    setTimeout(function () {
                        location.reload();
                    }, 2500)                   
                }
              },
              error: function (xhr, ajaxOptions, thrownError) {
                toastr.error(thrownError);
              }
        });

            
        } else {
            toastr.info("Đã hủy!");
        }
    });
 }   
 </script>

@endsection
@section('footer')
<script type="text/javascript">
$(document).ready(function(){

});
</script>
@endsection