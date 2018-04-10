@extends('layouts.admin.master')
@section('contents')
<style>
  .ui-widget-content .ui-state-active .list_item_container {
    background-color: #f5f5f5;
}
.list_item_container {
    width:100%;
    height: 35px;
    float: left;
    /*margin-left: 20px;*/
}
.label{
    width: 100%;
    float:right;
    white-space: nowrap;
    overflow: hidden;
    color: black;
    text-align: left;
    text-transform: none;
}
</style>
<div class="portlet light bordered">
<div class="portlet-title">
    <div class="caption uppercase">
        <i class="fa fa-book"></i> {{trans('bookTicket.admin_list')}} </div>
      
</div>
<div class="row">
    <div class="col-xs-12 col-sm-4 col-md-6 col-lg-5">
        {{-- <button onclick="addBlog();" class="btn green btn-circle"><i class="fa fa-plus"></i> Thêm mới</button>
        {{Form::button('Thêm mới',[
          'class'=>'btn green btn-circle',
          'onclick'=>'addBlog()'
        ])}} --}}
    </div>
    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-7">
        <form method="get" action="">
            <input type="text" class="search-class form-control" id="search"  name="search"  placeholder="{{ trans('admin.admin_search_bookTicket') }}">
        </form>
    </div>
</div>
<div class="portlet-body">
    <div class="table-scrollable" id="replaceTable">
        <table class="table table-striped table-bordered table-hover" id="sample_1">
            <thead>
                <tr>
                  <th style="text-align: center;">{{trans('bookTicket.admin_stt')}}</th>
                  <th style="text-align: center;">{{trans('bookTicket.admin_itinerary')}}</th>
                  <th style="text-align: center;">{{trans('bookTicket.admin_car_company')}}</th>
                  <th style="text-align: center;">{{trans('bookTicket.admin_date_start')}}</th>
                  <th style="text-align: center;">{{trans('bookTicket.admin_customer')}}</th>
                  <th style="text-align: center;">{{trans('bookTicket.admin_phone')}}</th> 
                  <th style="text-align: center;">{{trans('bookTicket.admin_email')}}</th> 
                  {{-- <th style="text-align: center;">{{trans('bookTicket.admin_code')}}</th> --}}
                  <th style="text-align: center;">Status</th>
                  <th style="text-align: center;">{{trans('admin.admin_func')}}</th>
                </tr>
                
            </thead>
            <tbody>
                      <?php $id=1 ?>
                      @if($data) @foreach($data as $key => $list)
        
                      <tr>
                        <td style="text-align: center;">{{$id++}}</td>
                        <td style="text-align: center;">{{ $list->itinerary['slug'] }}</td>
                        <td style="text-align: center;">{{  $list->car_company['name'] }}</td>
                        <td style="text-align: center;">{{ $list->date_start}}</td>
                        <td style="text-align: center;">{{ $list->name}}</td>
                        <td style="text-align: center;">{{ $list->phone}}</td>
                        <td style="text-align: center;">{{ $list->email}}</td>
                        {{-- <td style="text-align: center;">{{ $list->code}}</td> --}}
                        <td style="text-align: center;">@if( $list->status ==1)Đã thanh toán @elseif($list->status ==2)Chưa thanh toán @else Đã hủy @endif</td>
                    <td class="text-center"> 
                        <a href="{{route('admin.listBookTicket.show',$list['id'])}}" class="btn btn-outline btn-circle btn-sm blue">
                            <i class="fa fa-eye" aria-hidden="true"></i> {{trans('admin.admin_show')}}  
                        </a>
                        <a href="{{route('admin.listBookTicket.edit',$list['id'])}}" class="btn btn-outline btn-circle green btn-sm purple">
                            <i class="fa fa-edit"></i> {{trans('admin.admin_edit')}}
                        </a>
                        <form action="#" method="DELETE" style="display: initial;">
                          <a href="#" type="submit" onclick="alertDel({{$list->id}})" class="btn btn-outline btn-circle dark btn-sm red">
                            <i class="fa fa-trash-o"></i> {{trans('admin.admin_del')}} 
                          </a>
                        </form>
                        
                    </td>
                   
                </tr>
                @endforeach @else
                  <tr>
                    <td colspan="4" class="text-center"> {{trans('admin.admin_no')}}</td>
                  </tr>
                @endif
             
            </tbody>
               
        </table>
    </div>
    {{$data->links()}}
</div>
</div>


<script src="{{ url("js/jquery-3.1.0.min.js")}}"></script>
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
  var path = "{{URL::asset('')}}admin/bookTicket/" + id;
  console.log(path);

    swal({
        title: "Do you want to delete?",
        // text: "Bạn sẽ không thể khôi phục lại bản ghi này!!",
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
                    toastr.success('Xóa thành công!!!');
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



<script>
  $("#search").on('keyup', function() {
    setTimeout(function(){
      var keyword = $("#search").val();
      if (keyword == ''){
        window.location.replace('{{ route('admin.listBookTicket.index')}}');
      };
          $.ajax({
              type: "GET",
              url: "bookTicket/search?keyword=" + keyword,
              cache: false,
              success: function(datas)
              {
                
                $("#replaceTable").html('');
                $("#replaceTable").append(datas);
                
              }
          });     
    },500);
          
        // return false;
    });

</script>

@endsection