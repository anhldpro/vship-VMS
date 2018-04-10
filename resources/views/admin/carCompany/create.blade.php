@extends('layouts.admin.master')
@section('head')
<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css">
<style>
        .error{
            color:red;
            font-family: arial;
            font-size: 14px;
        }
    </style>
@endsection
@section('contents')
  <div class="portlet light bordered" id="form_wizard_1">
   <div class="portlet-title">
      <div class="caption">
         <span class="caption-subject font-red bold uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> THÊM MỚI NHÀ XE</span>
      </div>
   </div>
   <h3 class="block text-center"><b>THÊM MỚI NHÀ XE</b></h3>
   <div class="portlet-body form">
   @if(count($errors))
      <div class="alert alert-danger text-center">
        <strong>{{ trans('news.admin_error') }}</strong> {{ trans('news.admin_checkdata') }}  
      </div>
    @endif
      <form  action="{{route('admin.car.store')}}" id="frmCreateNews" name="frmCreateNews" method="POST" enctype="multipart/form-data" autocomplete="off">
         {{ csrf_field() }}
         <div class="form-wizard">
            <div class="form-body">
               <div class="tab-content">
                  <div class="tab-pane active">
                     <div class="form-body col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1">

                        <div class="form-group form-md-line-input {{ $errors->has('name') ? 'has-error' : '' }}">
                           <input type="text" class="form-control" id="name" name="name">
                           <label for="name">Tên nhà xe:<span class="requireds"> (*)</span></label>
                        </div>
                            @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('name')}}</strong>
                                        </span>   
                                    @endif  

                        <div class="form-group form-md-line-input {{ $errors->has('address') ? 'has-error' : '' }}">
                           <input type="text" class="form-control" id="address" name="address">
                           <label for="name">Địa Chỉ:<span class="requireds"> (*)</span></label>
                        </div>
                            @if($errors->has('address'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('address')}}</strong>
                                        </span>   
                                    @endif  

                        <div class="form-group form-md-line-input{{ $errors->has('phone') ? 'has-error' : '' }}">
                           <input type="text" class="form-control" id="phone" name="phone">
                           <label for="name">Số điện thoại:<span class="requireds"> (*)</span></label>
                        </div>
                        <p style="color:red;display:none" class="error errorPhone"></p>
                            @if($errors->has('phone'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('phone')}}</strong>
                                        </span>   
                                    @endif 

                        <div class="form-group form-md-line-input {{ $errors->has('email') ? 'has-error' : '' }}">
                           <input type="text" class="form-control" id="email" name="email">
                           <label for="name">Email:<span class="requireds"> (*)</span></label>
                        </div>
                        <p style="color:red;display:none" class="error errorEmail"></p>

                            @if($errors->has('email'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('email')}}</strong>
                                        </span>   
                                    @endif 

                       <div class="form-group">
                            <div style="margin-bottom: 15px;color: #888;">Thông tin nhà xe:</div>
                              <textarea class="form-control my-editor" rows="10" id="infomation" name="infomation" placeholder="Mô Tả">{{ old('infomation') }}</textarea>
                                    
                        </div>
                         @if($errors->has('infomation'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{$errors->first('infomation')}}</strong>
                                    </span>   
                                @endif
                        <div class="form-group">
                            <div class="form-group form-md-line-input" {{ $errors->has('avatar') ? 'has-error' : '' }}>
                                <label for="avatar">Ảnh đại diện:</label><input type="file" name="avatar" value="" id="avatar" class="required borrowerImageFile" data-errormsg="PhotoUploadErrorMsg">
                                         
                                <img id="previewHolder" alt="" width="170px" height="100px"/>
                           </div> 
                        </div>  
                     </div>
                  </div>
                  </div>
               </div>
            </div>
           {{--  <div class="input-group">
                           <span class="input-group-btn">
                             <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                               <i class="fa fa-picture-o"></i> Choose
                             </a>
                           </span>
                           <input id="thumbnail" class="form-control" type="text" name="filepath">
                         </div>
                         <img id="holder" style="margin-top:15px;max-height:100px;"> --}}
            <div class="panel panel-default">
                  
                  <label>Thêm nhiều ảnh:<span class="requireds"> (*)</span></label>
                    <div id="drop" class="dropzone" name="images" action="" >
    
                </div>
            <div class="form-actions text-center">
               <div class="col-xs-12 col-sm-12" style="margin-top: 20px;">
                    <a href="{{route('admin.car.index')}}" class="btn btn-outline green button-pre btn-circle"> {{ trans('news.admin_back') }}
                    </a>               
                    {{Form::submit('Lưu',[
                      'class'=>'btn green btn-circle '
                    ])}}   
               </div>
            </div>
         </div>
      </form>
   </div>
</div> 
@endsection
@section('footer')
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
{{-- <script>
  var domain = "";
 $('#lfm').filemanager('image', {prefix: domain});

</script> --}}
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.js"></script>
<script src="{{url('js/jqueryValidate/jquery.validate.js')}}" type="text/javascript"></script>
<script>
  $(document).ready(function(){
    Dropzone.autoDiscover = false;
    var dropzone = new Dropzone('#drop',{
      maxFilesize: 6, 
      maxFiles:40,
      parallelUploads: 10000,
      paramName: "file",
      addRemoveLinks:true,
      uploadMultiple:false,
      acceptedFiles : 'video/mp4, images/jpg, image/png',
      url : "{{route('admin.car.uploadImage')}}",
      
      init:function(){
        var dropzone = this;
        var fileList = new Array;
            var fileList_count = 0;//Dem anh moi duoc them vao
            this.on('removedfile',function(file){
              $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
            
              $.ajax({
                type: 'POST',
                url: '{{route("admin.car.removeImage")}}',
                data : {
                  id: $('#id').val(), 
                  _token: $('input[name = "_token"]').val(),
                  name: file.serverFileName,
                },
              }).done(function(data){
                if(data == -1){//Xoa anh moi them vao
                  var index = fileList.indexOf(file);
                  delete fileList[index];
                  var img_info_id = "img_info"+index;
                  $("#"+img_info_id).val('');
                }
              });
            });

            this.on("success", function(file, serverFileName) {
              var name = file.previewElement.querySelector("[data-dz-name]");
              name.dataset.dzName = serverFileName;
              name.innerHTML = serverFileName;
              file.serverFileName = serverFileName;
              fileList[++fileList_count] = file;
               //Them the div de luu thong tin anh
               var img_info_id = "img_info"+fileList_count;
               var hidden_data = '<input name = "img_info[]" type="hidden" value="'+file.serverFileName+
               '" id="'+img_info_id+'" />';
               $('#frmCreateNews').append(hidden_data);
             });

            this.on("sending", function(file, xhr, formData){
              formData.append("_token", "{{ csrf_token() }}");
            });
          }
        });
  });
</script>

<script>
    $("#phone").blur(function() {
        $.ajax({
            type: 'get',
            url: "{{route('admin.car.checkphone')}}",
            data: {
                'value': $(this).val()
            },
            success: function(result) {
                console.log(result);
                if (result > 0) {
                    $('.errorPhone').show().text("Số điện thoại này đã tồn tại,bạn không thể đăng ký bằng số này!!");
                } else {
                    $('.errorPhone').hide();
                }
            }
        });
    });

     $("#email").blur(function() {
        $.ajax({
            type: 'get',
            url: "{{route('admin.car.checkemail')}}",
            data: {
                'value': $(this).val()
            },
            success: function(result) {
                console.log(result);
                if (result > 0) {
                    $('.errorEmail').show().text("Email này đã tồn tại,bạn không thể đăng ký bằng Email này!!");
                } else {
                    $('.errorEmail').hide();
                }
            }
        });
    });
</script>
<script>
jQuery.validator.addMethod("phoneUS", function (phone_number, element) {
            phone_number = phone_number.replace(/\s+/g, "");
            return this.optional(element) || phone_number.length > 9 &&
                  phone_number.match(/^(\(?(0|\+84)[1-9]{1}\d{1,4}?\)?\s?\d{3,4}\s?\d{3,4})$/);
        }, "Invalid phone number");
  $(function(){
    jQuery.validator.addMethod("formatImg", function(extension , element) {
  // allow any non-whitespace characters as the host part
      return this.optional( element ) || /\.(jpe?g|gif|png)$/i.test( value );
    }, 'Please enter a valid Images.');
  });
  
            $('#frmCreateNews').validate({
                errorElement:"span",
            rules: {
                name:{
                    required  :true,
                    
                },
                phone:{
                    required  :true,
                    minlength : 9,
                    phoneUS   : true,
                    number    : true,
                   
                },
                avatar: {
                    required  :true,
                    extension: true,
                },     
                email:{
                    required:true,
                    email :true,
                },
                address:{
                    required:true,
                },
              },        
              messages:{
                name:{
                    required:'Vui lòng nhập tên nhà xe!!!',
                    
                },
                avatar:{
                    required:'Vui lòng chọn ảnh',
                    extension: 'Ảnh phải có một trong các định dạng: jpg, jpeg, gif, png',
                },   
                phone:{
                    required:'Vui lòng nhập số điện thoại',
                    minlength : "Số điện thoại phải có nhiều hơn 9 số",
                    phoneUS   : "Số điện thoại không đúng định dạng VD:(0|+84)999 999 999",
                    number : "Ký tự nhập vào phải là kiểu số",  

                },
                email:{
                    required:'Vui lòng nhập email',
                    email : "Email không đúng định dạng",
                },
                address:{
                    required: 'Vui lòng nhập địa chỉ'
                }
          }
        }); 


    
</script>

<script type="text/javascript">
    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#previewHolder').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
    console.log(reader);
  }
}

  $("#avatar").change(function() {
  readURL(this);
});
  </script>

@endsection
