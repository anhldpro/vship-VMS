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

@section('contents')
<div class="portlet light bordered" id="form_wizard_1">
   <div class="portlet-title">
      <div class="caption">
         <span class="caption-subject font-red bold uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> {{ trans('news.admin_edit_post') }}  </span>
      </div>
   </div>
   <h3 class="block text-center">{{ trans('news.admin_edit_post') }} </h3>
   <div class="portlet-body form">
   @if(count($errors))
      <div class="alert alert-danger text-center">
        <strong>{{ trans('news.error') }}</strong>{{ trans('news.admin_checkdata') }}  
      </div>
    @endif
         <form  action="{{ route('admin.new.update', $data->id)}}" id="frmEditNews" name="frmEditNews" method="POST" enctype="multipart/form-data" autocomplete="off">
          {{Form::token()}}
         {{ method_field('PUT') }}
         <div class="form-wizard">
            <div class="form-body">
               <div class="tab-content">
                  <div class="tab-pane active">
                     <div class="form-body col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1">
                        <div class="form-group form-md-line-input">
                                <label  class="col-sm-2 control-label" for="status">Trạng Thái</label>
                                <div class="col-sm-9">
                                   <select class="form-control" name="Lang" id="">
                                       <option @if($data->Lang == 'vi') selected @endif value="vi">Tiếng Việt</option>
                                      <option  @if($data->Lang == 'en') selected @endif value="en">Tiếng Anh</option>
                                   </select>
                                
                                </div>
                        </div>      
                        <div class="form-group form-md-line-input {{ $errors->has('title') ? 'has-error' : '' }}">
                           {{Form::text('title',$data->title,['class'=>'form-control',
                           'name'=>'title'])}}
                           <label for="name">{{ trans('news.admin_title') }}:<span class="requireds"> (*)</span></label>
                        </div>
                            @if($errors->has('title'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('title')}}</strong>
                                        </span>   
                                    @endif      


                        <div class="form-group form-md-line-input {{ $errors->has('describe') ? 'has-error' : '' }}">
                
                           <textarea class="form-control my-editor my-editor" rows="5" id="describe" name="describe" placeholder="Nội Dung">{!! $data->describe !!}</textarea>
                           <label for="name">{{ trans('news.admin_describe') }}: <span class="requireds"> (*)</span></label>
                        </div>
                            @if($errors->has('describe'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('describe')}}</strong>
                                        </span>   
                                    @endif
                      
                        <div class="form-group">
                            <label>{{ trans('news.admin_content') }}: </label>
                            <br>
                            <textarea class="form-control my-editor my-editor" rows="20" id="content" name="content" placeholder="Nội Dung">{!! $data->content !!}</textarea>
                         </div>
                         <div class="form-group col-md-12 ">
                         <label class="lable-select" for="id_teacher">Điểm Đến</label>
                          <br>
                           <select class="selectpicker " id="Vid" name="Vid" title="Choose one of the following..." data-live-search="true" tabindex="-98">
                               @if(count($news)!=0)
                                  @foreach($news as $db_news)
                                  <option 
                                  @if ($db_news->id == $data['Vid']) selected @endif value="{{$db_news->id}}" >{{$db_news->title }} </option>
                                  @endforeach
                                   </option>
                               @endif
                              @if(count($news)==0)
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
                               <label for="images">{{ trans('news.admin_img') }}:</label><input type="file" name="images" value="" id="images" class=" " data-errormsg="PhotoUploadErrorMsg">
                            
                              <img id="previewHolder" alt="" src="{{URL::asset('')}}{{$data->images}}" width="170px" height="100px"/>
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
                      'class'=>'btn green btn-circle'
                    ])}}  
               </div>
            </div>
         </div>
      {{Form::close()}}
   </div>
</div>
 
@endsection
@section('footer')
<script>
       $(function(){
    jQuery.validator.addMethod("formatImg", function(extension , element) {
  // allow any non-whitespace characters as the host part
      return this.optional( element ) || /\.(jpe?g|gif|png)$/i.test( value );
    }, 'Please enter a valid Images.');
  });
            $('#frmEditNews').validate({
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
                    required:'Please select a photo',
                    extension: 'Photos must be in jpg, jpeg, gif, png format',
                },
                title:{
                    required:'Please enter the title',
                    
                },
                describe:{
                    required:'Please enter the describe',
                
                },
                content:{
                    required:'Please enter the content',
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

  $("#images").change(function() {
    // alert('xxx');
  readURL(this);
});
  </script>
@endsection


