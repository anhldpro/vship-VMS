@extends('layouts.master')
@section('contents')

<div class="portlet light bordered">
<div class="portlet-title">
    <div class="caption uppercase">
        <i class="fa fa-book"></i> DANH SÁCH TIN </div>
   
</div>
<div class="row">
    <div class="col-xs-12 col-sm-4 col-md-6 col-lg-5">
        {{-- <button onclick="addBlog();" class="btn green btn-circle"><i class="fa fa-plus"></i> Thêm mới</button> --}}
        {{Form::button('Thêm Mới',[
          'class'=>'btn green btn-circle',
          'onclick'=>'addBlog()'
        ])}}
    </div>
    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-7">
        <form method="get" action="">
            <input type="text" class="search-class form-control" id="search"  name="search"  placeholder="Nhập Thông Tin Tìm Kiếm">
        </form>
    </div>
</div>
<div class="portlet-body">
    <div class="table-scrollable">
        <table class="table table-striped table-bordered table-hover" id="sample_1">
            <thead>
                <tr>
                  <th style="text-align: center;">ID</th>
                  <th style="text-align: center;">Title</th>
                  <th style="text-align: center;">Short Contents</th>
                  <th style="text-align: center;">Content</th>
                  <th style="text-align: center;">Image</th>
                  <th style="text-align: center;">Category</th>
                  <th style="text-align: center;">User</th>
                  <th style="text-align: center;">Tags</th>
                  <th style="text-align: center;">Function</th>
                </tr>
                
            </thead>
            <tbody>
               
                      @if($data) @foreach($data as $key => $list)
                      <tr>
                        <td style="text-align: center;">{{$key+1}}</td>
                        <td style="text-align: center;">{{ $list->title }}</td>
                        <td style="text-align: center;">{{ $list->short_contents }}</td>
                        <td style="text-align: center;">{{ $list->contents }}</td>
                         <td ><img src="{{URL::asset($list->image)}}"  class="img-responsive" style="width: 100px" /></td>
                        <td style="text-align: center;">{{ $list->category['name'] }}</td>
                        <td style="text-align: center;">{{ $list->user['name']}}</td>
                        <td style="text-align: center;">{{ $list->tags['name']}}</td>
                    <td class="text-center"> 
                        <a href="{{-- {{route('courses.show', $course->id)}} --}}" class="btn btn-outline btn-circle btn-sm blue">
                            <i class="fa fa-eye" aria-hidden="true"></i> Xem 
                        </a>
                        <a href="{{route('blog.edit',$list['id'])}}" class="btn btn-outline btn-circle green btn-sm purple">
                            <i class="fa fa-edit"></i> Sửa 
                        </a>
                        {{-- <form action="#" method="DELETE" style="display: initial;"> --}}
                          <a href="#" type="submit" onclick="alertDel({{$list->id}})" class="btn btn-outline btn-circle dark btn-sm red">
                            <i class="fa fa-trash-o"></i> Xóa 
                          </a>
                        {{-- </form> --}}
                        
                    </td>
                   
                </tr>
                @endforeach @else
                  <tr>
                    <td colspan="4" class="text-center"> Không có bản ghi nào </td>
                  </tr>
                @endif
                {{$data->links()}}
            </tbody>
        </table>
    </div>
</div>
</div>

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
  var path = "{{URL::asset('')}}blog/" + id;
  console.log(path);

    swal({
        title: "Bạn có chắc muốn xóa?",
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
            toastr.info("Thao tác xóa đã bị huỷ bỏ!");
        }
    });
 }   
 </script>
@endsection
@section('footer')
 <script src="{{-- {{url('js/curd-Course.js')}} --}}" type="text/javascript"></script>
 <script>
     function addBlog() {
         window.location = "{{route('blog.create')}}"
     }
 </script>
@endsection