@extends('layouts.admin.master')
@section('head')
<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css">
<link href="{{asset('css/dropzone.css')}}" rel="stylesheet">
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
         <span class="caption-subject font-red bold uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> SỬA THÔNG TIN NHÀ XE </span>
      </div>
   </div>
   <h3 class="block text-center"><b>SỬA THÔNG TIN NHÀ XE</b></h3>
   <div class="portlet-body form">
   @if(count($errors))
      <div class="alert alert-danger text-center">
        <strong>{{ trans('news.error') }}</strong> {{ trans('news.admin_checkdata') }}  
      </div>
    @endif
      <form  action="" id="frmCreateNews" name="frmCreateNews" method="POST" enctype="multipart/form-data" autocomplete="off">
         {{ csrf_field() }}
         {{ method_field('PUT') }}
         <div class="form-wizard">
            <div class="form-body">
               <div class="tab-content">
                  <div class="tab-pane active">
                     <div class="form-body col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1">

                        <div class="form-group form-md-line-input {{ $errors->has('name') ? 'has-error' : '' }}">
                           <input type="text" class="form-control" id="name" name="name" value="{{ $data['name'] }}">
                           <label for="name">Tên nhà xe:<span class="requireds"> (*)</span></label>
                        </div>
                            @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('name')}}</strong>
                                        </span>   
                                    @endif 
                        <div class="form-group form-md-line-input {{ $errors->has('name') ? 'has-error' : '' }}">
                           <input type="text" class="form-control" id="address" name="address" value="{{ $data['name'] }}">
                           <label for="name">Địa chỉ:<span class="requireds"> (*)</span></label>
                        </div>
                            @if($errors->has('address'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('address')}}</strong>
                                        </span>   
                            @endif               

                        <div class="form-group form-md-line-input {{ $errors->has('phone') ? 'has-error' : '' }}">
                           <input type="text" class="form-control" id="phone" name="phone" value="{{ $data['phone'] }}">
                           <label for="name">Số điện thoại:<span class="requireds"> (*)</span></label>
                        </div>
                            @if($errors->has('phone'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('phone')}}</strong>
                                        </span>   
                                    @endif 

                        <div class="form-group form-md-line-input {{ $errors->has('email') ? 'has-error' : '' }}">
                           <input type="text" class="form-control" id="email" name="email" value="{{ $data['email'] }}">
                           <label for="name">Email:<span class="requireds"> (*)</span></label>
                        </div>
                            @if($errors->has('email'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('email')}}</strong>
                                        </span>   
                                    @endif 

                       <div class="form-group">
                            <div style="margin-bottom: 15px;color: #888;">Thông tin nhà xe:</div>
                              <textarea class="form-control my-editor" rows="15" id="infomation" name="infomation" placeholder="Mô Tả">{{ $data['infomation'] }}</textarea>
                                    
                        </div>
                         @if($errors->has('infomation'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{$errors->first('infomation')}}</strong>
                                    </span>   
                                @endif
                        <div class="form-group">
                              <div class="form-group form-md-line-input" {{ $errors->has('avatar') ? 'has-error' : '' }}>
                               <label for="images">Ảnh đại diện:</label><input type="file" name="avatar" value="" id="avatar" class=" " data-errormsg="PhotoUploadErrorMsg">
                            
                              <img id="previewHolder" alt="" src="{{URL::asset('')}}{{$data->avatar}}" width="170px" height="100px"/>
                         </div> 
                         </div> 
                          {{-- <div class="input-group">
                           <span class="input-group-btn">
                             <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                               <i class="fa fa-picture-o"></i> Choose
                             </a>
                           </span>
                           <input id="thumbnail" class="form-control" type="text" name="avatar" >
                         </div>
                         <img id="holder" style="margin-top:15px;max-height:100px;"  src="{{URL::asset('')}}{{$data->avatar}}"> --}}
                         <div id="dropzone1" class="dropzone">
                            <div class="fallback">
                              <input type="file" name="images">
                            </div>
                            <input type="hidden" name="imageListNew[]">
                            <input type="hidden" name="imageListOld[]">
                          </div>   
                     </div>
                  </div>
                  </div>
               </div>
            </div>

            <div class="form-actions text-center">
               <div class="col-xs-12 col-sm-12" style="margin-top: 20px;">
                    <a href="{{route('admin.car.index')}}" class="btn btn-outline green button-pre btn-circle"> {{ trans('news.admin_back') }}
                    </a>               
                    {{Form::submit('Update',[
                      'class'=>'btn green btn-circle '
                    ])}}   
               </div>
            </div>
         </div>
      </form>
   </div>
</div> 
<script src="{{asset('js/dropzone.js')}}"></script>
<script type="text/javascript">
   Dropzone.options.dropzone1 = {
      url : "{{route('admin.car.uploadImage')}}",
      maxFilesize : 2,
      addRemoveLinks : true,
      acceptedFiles : 'image/jpeg, images/jpg, image/png',

      init : function(){
        var fileList = new Array;
        var fileList_count = 0;//Dem anh moi duoc them vao
        var thisDropzone = this;

        this.on("removedfile", function(file) {
          $.ajax({
            type: 'POST',
            url: '{{route("admin.car.removeImage")}}',
            data : {
              id: $('#id').val(), 
              _token: $('input[name = "_token"]').val(),
              name: file.serverFileName,
            },
          }).done(function(data){
            console.log(data);
            if(data == -1){//Xoa anh moi them vao
              var index = fileList.indexOf(file);
              delete fileList[index];
              var img_info_id = "img_info"+index;
              $("#"+img_info_id).val('');
            }else{//Them vao list anh luu truoc do de xoa sau khi submit
              var index = fileList.indexOf(file);
              delete fileList[index];
              //Xoa thong tin trong trong list file
              var img_info_id = "img_info"+index;
              $("#"+img_info_id).val('');
              //Tao input luu thong tin file anh cu de xoa sau khi submit
              var hidden_data = '<input name = "img_remove[]" type="hidden" value="'+file.serverFileName + '"/>';//Input luu ten anh cu de xoa
              $('#frmCreateNews').append(hidden_data);
            }
          });
        } );

        this.on("success", function(file, serverFileName) {
          var name = file.previewElement.querySelector("[data-dz-name]");
          name.dataset.dzName = serverFileName;
          name.innerHTML = serverFileName;
          file.serverFileName = serverFileName;
               //Them vao list anh luu
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
            // Get images from database
            $.ajax({
              url : '{{route("admin.car.getImages")}}',
              data : {
                id : {{$data->id}},
              },
              type: 'GET',
            }).done(function(data){
              $.each(data,function(index,value){
                var string = value.url.split('/');
                var img_folder = 'images/car/';
                var img_name = string[2];
                var url = "{{asset('')}}"+img_folder+img_name;
                var mockFile = { name: img_name, accepted: true, serverFileName:img_name };
                thisDropzone.emit("addedfile", mockFile);
                thisDropzone.emit("success", mockFile);
                thisDropzone.emit("complete", mockFile);
                thisDropzone.files.push(mockFile);
                thisDropzone.createThumbnailFromUrl(mockFile,url);
                mockFile.serverFileName = img_name;
                var name = mockFile.previewElement.querySelector("[data-dz-name]");
                name.dataset.dzName = img_name;
                name.innerHTML = img_name;
              });
            });
      }//Init function
   };
</script>
@endsection

@section('footer')
{{-- <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
  var domain = "";
 $('#lfm').filemanager('image', {prefix: domain});

</script> --}}

<script src="{{url('js/jqueryValidate/jquery.validate.js')}}" type="text/javascript"></script>
<script>
           jQuery.validator.addMethod("phoneUS", function (phone_number, element) {
            phone_number = phone_number.replace(/\s+/g, "");
            return this.optional(element) || phone_number.length > 9 &&
                  phone_number.match(/^(\(?(0|\+84)[1-9]{1}\d{1,4}?\)?\s?\d{3,4}\s?\d{3,4})$/);
        }, "Invalid phone number");
            $('#frmCreateNews').validate({
                errorElement:"span",
            rules: {
                name:{
                    required:true,
                    
                },
                phone:{
                    required:true,
                    minlength : 9,
                    phoneUS   : true,
                    number    : true,
                   
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
                    required:'Vui lòng nhập địa chỉ',
                },
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
        }
      }

        $("#avatar").change(function() {
          // alert('xxx');
        readURL(this);
      });
        </script>
@endsection
