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

                        <div class="form-group form-md-line-input {{ $errors->has('name') ? 'has-error' : '' }}">
                           <input type="text" class="form-control" id="name" name="name">
                           <label for="name">Name:<span class="requireds"> (*)</span></label>
                        </div>
                            @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('name')}}</strong>
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
                        <div class="form-group form-md-line-input">
                                <label  class="col-sm-2 control-label" for="locale">Locale</label>
                                <div class="col-sm-9">
                                   <select class="form-control" name="locale" id="">
                                      <option value="vi">Tiếng Việt</option>
                                      <option  value="en">Tiếng Anh</option>
                                   </select>
                                
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
