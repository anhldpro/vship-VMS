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
      <i class="fa fa-book"></i> Quản lý thông tin bến xe khách </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-4 col-md-6 col-lg-5">
        {{Form::button('Thêm mới',[
        'class'=>'btn green btn-circle',
        'onclick'=>'addBlog()'
        ])}}
      </div>
      <div class="col-xs-12 col-sm-8 col-md-6 col-lg-7">
        <form method="get" action="">
          <input type="text" class="search-class form-control" id="search"  name="search"  placeholder="{{ trans('admin.admin_search') }}">
        </form>

      </div>
    </div>
    <div class="portlet-body">
      <div class="table-scrollable" id="replaceTable">
        <table class="table table-striped table-bordered table-hover" id="sample_1">
          <thead>
            <tr>
              <th style="text-align: center;">@Lang('news.admin_stt')</th>
              <th style="text-align: center;">Tên bến xe:</th>
              <th style="text-align: center;">Số điện thoại:</th>
              <th style="text-align: center;">Email:</th>
              <th style="text-align: center;">Thông tin bến xe:</th>
              <th style="text-align: center;">@Lang('admin.admin_func')</th>
            </tr>

          </thead>
          <tbody>
            @if($data) @foreach($data as $key=>$st)
            <tr>
              <td style="text-align: center;">{{$key+1}}</td>
              <td style="text-align: center;">{{$st->name}}</td>
              <td style="text-align: center;">{{$st->phone}}</td>
              <td style="text-align: center;">{{$st->email}}</td>
              <td style="text-align: center;">{!! str_limit($st->infomation , $limit = 50, $end = '...') !!}</td>
              <td class="text-center"> 
                <a href="{{route('admin.station.show',$st->id)}}" class="btn btn-outline btn-circle btn-sm blue">
                  <i class="fa fa-eye" aria-hidden="true"></i> {{trans('admin.admin_show')}} 
                </a>
                <a href="{{route('admin.station.edit',$st->id)}}" class="btn btn-outline btn-circle green btn-sm purple">
                  <i class="fa fa-edit"></i>  {{trans('admin.admin_edit')}}
                </a>
                <form action="#" method="DELETE "  style="display: initial;">
                  <a href="#" type="submit" onclick="alertDel({{$st->id}})" class="btn btn-outline btn-circle dark btn-sm red">
                    <i class="fa fa-trash-o"></i> {{trans('admin.admin_del')}} 
                  </a>
                </form>

              </td>
            </tr>

            @endforeach @else
            <tr>
              <td colspan="4" class="text-center"> {{trans('admin.admin_no')}} </td>
            </tr>
            @endif

          </tbody>

        </table>

      </div>
      {{$data->links()}}
    </div>
  </div>


  <!-- <script src="{{ url("js/jquery-3.1.0.min.js")}}"></script> -->

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
  // console.log(id);
  var path = "{{URL::asset('')}}admin/station/" + id;
  // console.log(id);

  swal({
    title: "Do you want to delete?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    cancelButtonText: "No",
    confirmButtonText: "Yes",

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
            data:{'id':id},
            success: function(res)
            {
              if(!res.error) {
                toastr.success('Deleted successfully!');
                setTimeout(function () {
                  location.reload();
                }, 2500)                   
              }
            },
            
          });


        } else {
          toastr.info("Cancel!");
        }
      });
}   
</script>
<script> 
  @if ( Session::has('success'))
  toastr.success('{{ session('success')}}');
  @endif
</script>
@endsection
@section('footer')
<script src="{{asset('js/jquery-ui.min.js')}}" type="text/javascript"></script>
<link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
<script>
  $("#search").on('keyup', function() {
    setTimeout(function(){
      var keyword = $("#search").val();
      if (keyword == ''){
        window.location.replace('{{ route('admin.station.index')}}');
      };
          $.ajax({
              type: "GET",
              url:"station/search?keyword=" + keyword,             
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

<script>
 function addBlog() {
   window.location = "{{route('admin.stations.create')}}"
 }
</script>
@endsection