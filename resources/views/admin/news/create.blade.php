@extends('layouts.admin.master')
@section('head')
<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
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
         <span class="caption-subject font-red bold uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> @lang('news.admin_create_post') </span>
      </div>
   </div>
   <h3 class="block text-center"><b>{{ trans('news.admin_create_post') }}</b></h3>
   <div class="portlet-body form">
   @if(count($errors))
      <div class="alert alert-danger text-center">
        <strong>{{ trans('news.error') }}</strong> {{ trans('news.admin_checkdata') }}  
      </div>
    @endif
      <form  action="" id="frmCreateNews" name="frmCreateNews" method="POST" enctype="multipart/form-data" autocomplete="off">
         {{ csrf_field() }}
         <div class="form-wizard">
            <div class="form-body">
               <div class="tab-content">
                  <div class="tab-pane active">
                     <div class="form-body col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1">
                        <div class="form-group form-md-line-input">
                                
                                <div class="form-group">
                                <label  class="col-sm-2 control-label" for="Lang">Ngôn ngữ</label>
                                  <select class="form-control" name="Lang" id="">
                                      <option value="vi">Tiếng Việt</option>
                                      <option  value="en">Tiếng Anh</option>
                                   </select>
                                
                                </div>
                        </div> 
                        <div class="form-group form-md-line-input {{ $errors->has('title') ? 'has-error' : '' }}">
                           <input type="text" class="form-control" id="title" name="title">
                           <label for="name">{{ trans('news.admin_title') }}:<span class="requireds"> (*)</span></label>
                        </div>
                            @if($errors->has('title'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('title')}}</strong>
                                        </span>   
                                    @endif      
                        <div class="form-group">
                            <label for="name">{{ trans('news.admin_describe') }}: <span class="requireds"> (*)</span></label>
                            <textarea class="form-control my-editor" rows="5" id="describe" name="describe"></textarea>    
                        </div>
                        @if($errors->has('describe'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('describe')}}</strong>
                                        </span>   
                                    @endif   
                       <div class="form-group">
                            <div style="margin-bottom: 15px;color: #888;">{{ trans('news.admin_content') }}:</div>
                              <textarea class="form-control my-editor" rows="20" id="content" name="content" placeholder="Nội Dung">{{ old('content') }}</textarea>
                                    
                        </div>
                         @if($errors->has('content'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{$errors->first('content')}}</strong>
                                    </span>   
                                @endif
                        <div class="form-group col-md-12">
                        <label class="lable-select" for="id_teacher">Bài viết liên quan</label>
                        <br>
                           <select class="selectpicker " id="Vid" name="Vid" title="Chọn bài viết liên quan..." data-live-search="true" tabindex="-98">
                              <option disabled selected></option>
                              @if(count($data)!=0)
                                  @foreach($data as $db_data)
                                  <option value="{{$db_data->id}}" data-tokens="{{$db_data->title}}" >{{$db_data->title }} </option>
                                  @endforeach
                               @endif
                              @if(count($data)==0)
                              <option value=""><em>(Chưa có bài viết nào)</em></option>
                             @endif
                           </select>
                           <span class="help-block"></span>                         
                      </div>
                            @if($errors->has('Vid'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('Vid')}}</strong>
                                        </span>   
                            @endif 
                        <div class="form-group">
                          <div class="form-group form-md-line-input" {{ $errors->has('images') ? 'has-error' : '' }}>
                          <label for="images">{{ trans('news.admin_img') }}:</label><input type="file" name="images" value="" id="images" class="required borrowerImageFile" data-errormsg="PhotoUploadErrorMsg">
                                   
                          <img id="previewHolder" alt="" width="170px" height="100px"/>
                         </div> 
                         </div>  
                     </div>
                  </div>
                  </div>
               </div>
            </div>
            <div class="form-actions text-center">
               <div class="col-xs-12 col-sm-12" style="margin-top: 20px;">
                    <a href="{{route('admin.news.index')}}" class="btn btn-outline green button-pre btn-circle"> {{ trans('news.admin_back') }}
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
<script src="{{url('js/jqueryValidate/jquery.validate.js')}}" type="text/javascript"></script>

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

  $("#images").change(function() {
  readURL(this);
});
  </script>
<script>
        $(function(){
    jQuery.validator.addMethod("formatImg", function(extension , element) {
  // allow any non-whitespace characters as the host part
      return this.optional( element ) || /\.(jpe?g|gif|png)$/i.test( value );
    }, 'Please enter a valid Images.');
  });
            $('#frmCreateNews').validate({
                errorElement:"span",
            rules: {
                title:{
                    required:true,
                    
                },
                describe:{
                    required:true,
                   
                },
                contents:{
                    required:true,
                },
                images: {
                    required  :true,
                    extension: true,
                },     
              },        
              messages:{
                images:{
                    required:'Vui lòng chọn ảnh',
                    extension: 'Ảnh phải có một trong các định dạng: jpg, jpeg, gif, png',
                },
                title:{
                    required:'Vui lòng nhập tiêu đề',
                    
                },
                describe:{
                    required:'Vui lòng nhập mô tả',
                
                },
                content:{
                    required:'Vui lòng nhập nội dung',
                },
          }
        }); 


    
</script>

@endsection
