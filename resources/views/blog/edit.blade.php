@extends('layouts.master')
@section('head')
<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
@endsection

@section('contents')
<div class="portlet light bordered" id="form_wizard_1">
   <div class="portlet-title">
      <div class="caption">
         <span class="caption-subject font-red bold uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> SỬA THỂ LOẠI  </span>
      </div>
   </div>
   <h3 class="block text-center">SỬA THỂ LOẠI</h3>
   <div class="portlet-body form">
   @if(count($errors))
      <div class="alert alert-danger text-center">
        <strong>Lỗi!</strong> Hãy kiểm tra lại dữ liệu bạn vừa nhập vào.
      </div>
    @endif
        {{Form::open(['route' =>['blog.update', $datas->id], 'method' => 'POST', 'enctype'=>'multipart/form-data'])}}
         {{Form::token()}}
         {{ method_field('PUT') }}
         <div class="form-wizard">
            <div class="form-body">
               <div class="tab-content">
                  <div class="tab-pane active">
                     <div class="form-body col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1">
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <label for="title">Title </label>
                                  {{-- <input type="text" class="form-control" id="title" name="title" value="{{$datas->title}}"> --}}
                                  {{Form::text('title',$datas->title,['class'=>'form-control','name'=>'title'])}}
                                    <span class="help-block"></span>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <label for="short_contents">Short Content </label>
                                          {{-- short_contents --}}
                                  {{Form::text('short_contents',$datas->short_contents,['class'=>'form-control','name'=>'short_contents'])}}
                                      <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label>Content: </label>
                            <br>
                            <textarea class="form-control" name="contents" cols="120" rows="10" value="">{{$datas->contents}}</textarea>
                         </div>  
                          <div class="form-group">
                                  <div class="">
                                   <label>Image <input type="file" name="image" value="{{$datas->image}}" ></label> 
                                  </div>
                          </div>

                          <div class="form-group form-md-line-input form-md-floating-label ">
                              <label for="category_id">Category<span class="requireds"></span></label>
                                  <select  id = "category_id" class="form-control" name="category_id">
                                     @foreach($list_category as $db_category)
                                      <option value="{{$db_category->id}}" @if($db_category->id ==$datas->category_id) selected='selected' @endif>{{$db_category->name }} </option>
                                      @endforeach
                                      
                                  </select>
                          </div>
                          <div class="form-group form-md-line-input form-md-floating-label ">
                                <label for="category_id">User<span class="requireds"></span></label>
                                     <select  id = "user_id" class="form-control" name="user_id">
                                         @foreach($list_user as $db_user)
                                          <option value="{{$db_user->id}}"  @if($db_user->id ==$datas->user_id) selected='selected' @endif>{{$db_user->name }} </option>
                                          @endforeach
                                          
                                     </select>
                          </div>
                          <div class="form-group form-md-line-input form-md-floating-label ">
                                <label for="category_id">Tags<span class="requireds"></span></label>
                                     <select  id = "user_id" class="form-control" name="user_id">
                                         @foreach($list_tags as $db_tags)
                                          <option value="{{$db_tags->id}}"  @if($db_tags->id ==$datas->tags_id) selected='selected' @endif>{{$db_tags->name }} </option>
                                          @endforeach
                                     </select>
                          </div>
                     </div>
                  </div>
                  </div>
               </div>
            </div>
            <div class="form-actions text-center">
               <div class="col-xs-12 col-sm-12" style="margin-top: 20px;">
                    <a href="{{route('categories.index')}}" class="btn btn-outline green button-pre btn-circle"> Quay Lại
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


