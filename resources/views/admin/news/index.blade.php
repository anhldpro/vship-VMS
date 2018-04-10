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
        <i class="fa fa-book"></i>TIN TỨC</div>
   
</div>
<div class="row">
    <div class="col-xs-12 col-sm-4 col-md-6 col-lg-5">
     @permission('news-create')
        {{-- <button onclick="addBlog();" class="btn green btn-circle"><i class="fa fa-plus"></i> Thêm mới</button> --}}
        {{Form::button('Thêm mới',[
          'class'=>'btn green btn-circle',
          'onclick'=>'addBlog()'
        ])}}
        @endpermission
    </div>
    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-7">
        <form method="get" action="">
            <input type="text" class="search-class form-control" id="search"  name="search"  placeholder="{{ trans('admin.admin_search') }}">
        </form>
    </div>
</div>
<div class="portlet-body">
    <div class="table-wrap">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="sample_1">
            <thead>
                <tr>
                  <th style="text-align: center;">{{trans('news.admin_stt')}}</th>
                  <th style="text-align: center;">{{trans('news.admin_title')}}</th>
                  <th style="text-align: center;">{{trans('news.admin_describe')}}</th>
                  <th style="text-align: center;">{{trans('news.admin_img')}}</th>
                  <th style="text-align: center;">{{trans('news.admin_author')}}</th>
                  <th style="text-align: center;">{{trans('news.admin_createat')}}</th>
                  <th style="text-align: center;">{{trans('admin.admin_func')}}</th>
                </tr>
            </thead>
            <tfoot>
            <tr>
                <th style="text-align: center;">{{trans('news.admin_stt')}}</th>
                <th style="text-align: center;">{{trans('news.admin_title')}}</th>
                <th style="text-align: center;">{{trans('news.admin_describe')}}</th>
                <th style="text-align: center;">{{trans('news.admin_img')}}</th>
                <th style="text-align: center;">{{trans('news.admin_author')}}</th>
                <th style="text-align: center;">{{trans('news.admin_createat')}}</th>
                <th style="text-align: center;">{{trans('admin.admin_func')}}</th>
            </tr>
            </tfoot>
            <tbody>
                      <?php $id=1 ?>
                      @if($data) @foreach($data as $key => $list)
        
                      <tr>
                        <td style="text-align: center;">{{$id++}}</td>
                        <td style="text-align: center;">{{ $list->title }}</td>
                        <td style="text-align: center;">{!! str_limit($list->describe , $limit = 100, $end = '...') !!}</td>
                        <td ><img src="{{URL::asset($list->images)}}"  class="img-responsive" style="width: 100px" /></td>
                        <td style="text-align: center;">{{ $list->user['name']}}</td>
                        <td style="text-align: center;">{{ $list->created_at}}</td>
                    <td class="text-center" style="width: 130px">
                        {{--<a href="{{route('admin.news.show',$list->id)}}" class="btn btn-outline btn-circle btn-sm blue">
                            <i class="fa fa-eye" aria-hidden="true"></i> {{trans('admin.admin_show')}} 
                        </a>--}}

                        {{--<a href="{{route('admin.news.show',$list->id)}}" class="left-icon">
                            <i class="fa fa-eye"></i> <span>{{trans('admin.admin_show')}} </span>
                        </a>--}}

                        <a href="{{route('admin.news.show',$list->id)}}" data-toggle="tooltip" data-original-title="Show"> <i class="fa fa-eye text-inverse mr-20"></i> </a>

                        @permission('news-edit')
                        {{--<a href="{{route('admin.news.edit',$list['id'])}}" class="">
                            <i class="fa fa-edit"></i>  {{trans('admin.admin_edit')}}
                        </a>--}}
                        <a href="{{route('admin.news.edit',$list['id'])}}" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse mr-20"></i> </a>
                        @endpermission
                        @permission('news-edit')
                        <form action="#" method="DELETE" style="display: initial;">
                          {{--<a href="#" type="submit" onclick="alertDel({{$list->id}})" class="">
                            <i class="fa fa-trash-o"></i> {{trans('admin.admin_del')}} 
                          </a>--}}
                            <a href="#" type="submit" onclick="alertDel({{$list->id}})" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
                        </form>
                        @endpermission
                        
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

    </div>{{$data->links()}}
</div>
</div>

{{--
<script src="{{ url("js/jquery-3.1.0.min.js")}}"></script>--}}

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
  var path = "{{URL::asset('')}}admin/news/" + id;
  console.log(path);

    swal({
        title: "Bạn có thực sự muốn xóa?",
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
<script src="{{asset('js/jquery-ui.min.js')}}" type="text/javascript"></script>
<link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
 <script type="text/javascript">
$(document).ready(function(){
    $("#search").autocomplete({
        source: "{{ route('admin.news.search') }}",
            focus: function( event, ui ) {
            //$( "#search" ).val( ui.item.title ); // uncomment this line if you want to select value to search box  
            return false;
        },
        select: function( event, ui ) {
            window.location.href = ui.item.url;
        }
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        var inner_html = '<a href="' + item.url + '" ><div class="list_item_container"><div class="label"><h6><b>' + item.title + '</b></h6></div></div></a>';
        return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append(inner_html)
                .appendTo( ul );
    };
});
</script>  
 <script src="{{-- {{url('js/curd-Course.js')}} --}}" type="text/javascript"></script>
 <script>
     function addBlog() {
         window.location = "{{ route('admin.news.create') }}"
     }
 </script>
 <script>
  $("#search").on('keyup', function() {
    setTimeout(function(){
      var keyword = $("#search").val();
      if (keyword == ''){
        window.location.replace('{{ route('admin.news.index')}}');
      };
          $.ajax({
              type: "GET",
              url: "news/search?keyword=" + keyword,
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