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
   <h3 class="block text-center">EDIT </h3>
   <div class="portlet-body form">
   @if(count($errors))
      <div class="alert alert-danger text-center">
        <strong>{{ trans('news.error') }}</strong>{{ trans('news.admin_checkdata') }}  
      </div>
    @endif
         <form  action="{{ route('admin.viewBlade.update', $data->id)}}" id="frmEditNews" name="frmEditNews" method="POST" enctype="multipart/form-data" autocomplete="off">
          {{Form::token()}}
         {{ method_field('PUT') }}
         <div class="form-wizard">
            <div class="form-body">
               <div class="tab-content">
                  <div class="tab-pane active">
                     <div class="form-body col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1">
                        <div class="form-group form-md-line-input  {{ $errors->has('name') ? 'has-error' : '' }}">
                           {{Form::text('name',$data->name,['class'=>'form-control',
                           'name'=>'name'])}}
                           <label for="name">Tiêu Đề:<span class="requireds"> (*)</span></label>
                        </div>
                            @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('name')}}</strong>
                                        </span>   
                                    @endif      
                      
                        <div class="form-group">
                            <label>Nội Dung Tiếng Việt: </label>
                            <br>
                            <textarea class="form-control" name="value" cols="120" rows="20" value="">{!! $data->value !!}</textarea>
                         </div>
                        <div class="form-group">
                            <label>Nội Dung Tiếng Anh: </label>
                            <br>
                            <textarea class="form-control" name="value_en" cols="120" rows="20" value="">{!! $data->value_en !!}</textarea>
                         </div>
                         <div class="form-group form-md-line-input">
                                <label  class="col-sm-2 control-label" for="status">Trạng Thái</label>
                                <div class="col-sm-9">
                                   <select class="form-control" name="status" id="">
                                       <option @if($data->status == 1) selected @endif value="1">Đang mở</option>
                                      <option  @if($data->status == 0) selected @endif value="0">Đã đóng</option>
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
                    <a href="{{route('admin.viewBlade.index')}}" class="btn btn-outline green button-pre btn-circle"> {{ trans('news.admin_back') }}
                    </a>               
                   {{Form::submit('Update',[
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
     
            $('#frmEditNews').validate({
                errorElement:"span",
            rules: {
                name:{
                    required:true,
                    
                },
              },        
              messages:{
                name:{
                    required:'Please enter the name',
                    
                },
              }
            }); 

    </script>
@endsection


