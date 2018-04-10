@extends('layouts.admin.master')
@section('head')
<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css">
</head>
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
         <span class="caption-subject font-red bold uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> THÊM MỚI THÔNG TIN BẾN XE</span>
      </div>
   </div>
   <h3 class="block text-center"><b>THÊM THÔNG TIN BẾN XE</b></h3>
   <div class="portlet-body form">
   @if(count($errors))
      <div class="alert alert-danger text-center">
        <strong>{{ trans('news.admin_error') }}</strong> {{ trans('news.admin_checkdata') }}  
      </div>
    @endif
        @if (Session::has('responseData'))
                @if (Session::get('responseData')['statusCode'] == 1)
                <div class="alert alert-success" style="margin-top:20px">{{ Session::get('responseData')['message'] }}</div>
                @elseif (Session::get('responseData')['statusCode'] == 2)
                <div class="alert alert-danger" style="margin-top:20px" >{{ Session::get('responseData')['message'] }}</div>
                @endif
                @endif
      <form  action="{{route('admin.stations.store')}}" id="form" name="form" method="POST" enctype="multipart/form-data" autocomplete="off" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <div class="form-wizard">
            <div class="form-body">
               <div class="tab-content">
                  <div class="tab-pane active">
                     <div class="form-body col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1">

                        <div class="form-group form-md-line-input {{ $errors->has('name') ? 'has-error' : '' }}">
                           <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                           <label for="name">Tên bến xe:<span class="requireds"> (*)</span></label>
                        </div>
                            @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('name')}}</strong>
                                        </span>   
                                    @endif  

                        <div class="form-group form-md-line-input {{ $errors->has('phone') ? 'has-error' : '' }}">
                           <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                           <label for="name">Số điện thoại:<span class="requireds"> (*)</span></label>
                        </div>
                        <p style="color:red;display:none" class="error errorPhone"></p>
                            @if($errors->has('phone'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('phone')}}</strong>
                                        </span>   
                                    @endif 

                        <div class="form-group form-md-line-input {{ $errors->has('email') ? 'has-error' : '' }}">
                           <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                           <label for="name">Email:<span class="requireds"> (*)</span></label>
                        </div>
                        <p style="color:red;display:none" class="error errorEmail"></p>

                            @if($errors->has('email'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('email')}}</strong>
                                        </span>   
                                    @endif 
                        <div class="form-group form-md-line-input">
                        <label class="lable-select" for="id_teacher">Tỉnh, Thành phố</label>
                        <br>
                           <select class="selectpicker " id="place_id" name="place_id" title="Choose one of the following..." data-live-search="true" tabindex="-98">
                              @if(!empty($place))
                             
                                  @foreach($place as $db_place)
                                  <option value="{{$db_place->id}}" data-tokens="{{ $db_place->name }}">{{$db_place->name }} </option>
                                  @endforeach
                               @endif
                              @if(count($db_place)==0)
                              <option value=""><em>(Không có tỉnh, thành phố nào)</em></option>
                             @endif
                           </select>
                            
                      </div>
                      @if($errors->has('place_id'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('place_id')}}</strong>
                                        </span>   
                            @endif 
                       <div class="form-group">
                            <div style="margin-bottom: 15px;color: #888;">Thông tin bến xe:</div>
                              <textarea class="form-control my-editor" rows="10" id="infomation" name="infomation" placeholder="Mô Tả">{{ old('infomation') }}</textarea>
                                    
                        </div>
                         @if($errors->has('infomation'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{$errors->first('infomation')}}</strong>
                                    </span>   
                                @endif
                
                      <div class="form-group">
                            <div class="form-group form-md-line-input" {{ $errors->has('avatar') ? 'has-error' : '' }}>
                                <label for="avatar">Ảnh đại diện:</label><input type="file" name="avatar" value="" id="avatar" class="borrowerImageFile" data-errormsg="PhotoUploadErrorMsg">
                                         
                                <img id="previewHolder" alt="" width="170px" height="100px"/>
                           </div> 
                        </div> 
                     </div>
                  </div>
                  </div>
                </div>
                <div class="panel panel-default">
        
                  <label>Thêm nhiều ảnh:<span class="requireds"> (*)</span></label>
                    <div id="drop" class="dropzone" name="images" action="" >
    
                </div>
            <div class="form-actions text-center">
               <div class="col-xs-12 col-sm-12" style="margin-top: 20px;">
                    <a href="{{route('admin.station.index')}}" class="btn btn-outline green button-pre btn-circle"> {{ trans('news.admin_back') }}
                    </a>               
                    {{Form::submit('Save',[
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

<script>
  $(document).ready(function(){
    Dropzone.autoDiscover = false;
    var dropzone = new Dropzone('#drop',{
      maxFilesize: 3, 
      maxFiles:40,
      parallelUploads: 10000,
      paramName: "file",
      addRemoveLinks:true,
      uploadMultiple:false,
      url : "{{route('admin.station.uploadImage')}}",
      
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
                url: '{{route("admin.station.removeImage")}}',
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
               $('#form').append(hidden_data);
             });

            this.on("sending", function(file, xhr, formData){
              formData.append("_token", "{{ csrf_token() }}");
            });
          }
        });
  });
</script>

<script src="{{url('js/jqueryValidate/jquery.validate.js')}}" type="text/javascript"></script>
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
            $('#form').validate({
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
              },        
              messages:{
                name:{
                    required:'Vui lòng nhập tên bến xe!!!',
                    
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
          }
        }); 
 
</script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.js"></script>

@endsection
