@extends('layouts.admin.master')
@section('head')
<!-- include summernote css/js-->

<link rel="stylesheet" type="text/css" href="{{url('css//bootstrap-select.min.css')}}">
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
@endsection
@section('contents')
<div class="portlet light bordered" id="form_wizard_1">
   <div class="portlet-title">
      <div class="caption">
         <span class="caption-subject font-red bold uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> TẠO MỚI BÀI VIẾT </span>
      </div>
   </div>
   <h3 class="block text-center">TẠO MỚI BÀI VIẾT</h3>
   <div class="portlet-body form">
   @if(count($errors))
      <div class="alert alert-danger text-center">
        <strong>Lỗi!</strong> Hãy kiểm tra lại dữ liệu bạn vừa nhập vào.
      </div>
    @endif
      <form  action="{{route('blog.store')}}" id="frmCreateBlog" name="frmCreateBlog" method="POST" enctype="multipart/form-data" autocomplete="off">
         {{ csrf_field() }}
         <div class="form-wizard">
            <div class="form-body">
               <div class="tab-content">
                  <div class="tab-pane active">
                     <div class="form-body col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1">

                        <div class="form-group form-md-line-input form-md-floating-label {{ $errors->has('title') ? 'has-error' : '' }}">
                           {{Form::text('title',old('title'),['class'=>'form-control',
                           'name'=>'title'])}}
                           <label for="name">Tiêu đề<span class="requireds"> (*)</span></label>
                        </div>
                        <p class="font-red-mint">{{ $errors->first('title') }}</p>

                        <div class="form-group form-md-line-input form-md-floating-label {{ $errors->has('short_contents') ? 'has-error' : '' }}">
                           {{Form::text('short_contents',old('short_contents'),['class'=>'form-control',
                                                                                'name'=>'short_contents'])}}
                           <label for="code">Tóm tắt <span class="requireds"> (*)</span></label>
                        </div>
                        <p class="font-red-mint">{{ $errors->first('short_contents') }}</p>
                       <div class="form-group">
                              <textarea class="form-control" name="contents" cols="120" rows="10" placeholder="Nội dung"></textarea>
                            </div>
                        <div class="form-group">
                              <div class="form-group form-md-line-input form-md-floating-label" {{ $errors->has('image') ? 'has-error' : '' }}>
                               <label for="image">Image<input type="file" name="image" value="" ></label> 
                              </div>
                              <p class="font-red-mint">{{ $errors->first('image') }}</p>
                        </div>
                        <div class="form-group form-md-line-input form-md-floating-label">
                           <select  id = "category_id" class="form-control" name="category_id">
                              @if(!empty($list_category))
                              <option value=""></option>
                              @foreach($list_category as $db)
                              <option value="{{$db->id}}">{{$db->name}}</option>
                              @endforeach
                              @else
                              <option value=""></option>
                              @endif
                           </select>
                          {{--   {{Form::select('category_id', @if(!empty($list_category))
                                                          <option value=""></option>
                                                          @foreach($list_category as $db)
                                                          <option value="{{$db->id}}">{{$db->name}}</option>
                                                          @endforeach
                                                          @else
                                                          <option value=""></option>
                                                          @endif) , ['class'=>'form-control','name'=>'category_id']}} --}}
                         <label for="category_id">Thể loại (<span style="color:red;">*</span>)</label>
                        </div>
            
                         <div class="form-group form-md-line-input form-md-floating-label">
                           <select  id = "user_id" class="form-control" name="user_id">
                              @if(!empty($list_user))
                              <option value=""></option>
                              @foreach($list_user as $db)
                              <option value="{{$db->id}}">{{$db->name}}</option>
                              @endforeach
                              @else
                              <option value=""></option>
                              @endif
                           </select>
                           <label for="user_id">Tác giả (<span style="color:red;">*</span>)</label>
                        </div>
                         <div class="form-group form-md-line-input form-md-floating-label">
                           <select  id = "tags_id" class="form-control" name="tags_id">
                              @if(!empty($list_tags))
                              <option value=""></option>
                              @foreach($list_category as $db)
                              <option value="{{$db->id}}">{{$db->name}}</option>
                              @endforeach
                              @else
                              <option value=""></option>
                              @endif
                           </select>
                           <label for="tags_id">Tags (<span style="color:red;">*</span>)</label>
                        </div>
                     </div>
                  </div>
                  </div>
               </div>
            </div>
            <div class="form-actions text-center">
               <div class="col-xs-12 col-sm-12" style="margin-top: 20px;">
                    <a href="{{route('blog.index')}}" class="btn btn-outline green button-pre btn-circle"> Quay Lại
                    </a>               
                    {{Form::submit('Thêm Mới',[
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
{{-- <script src="{{url('js/jqueryValidate/jquery.validate.js')}}" type="text/javascript"></script>
<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
<script>
   tinymce.PluginManager.add('placeholder', function (editor) {
        editor.on('init', function () {
            var label = new Label;
            onBlur();
            tinymce.DOM.bind(label.el, 'click', onFocus);
          
            editor.on('focus', onFocus);
            editor.on('blur', onBlur);
            editor.on('change', onBlur);
            editor.on('setContent', onBlur);
            function onFocus() { if (!editor.settings.readonly === true) { label.hide(); } editor.execCommand('mceFocus', false); }
            function onBlur() { if (editor.getContent() == '') { label.show(); } else { label.hide(); } }
        });
        var Label = function () {
            var placeholder_text = editor.getElement().getAttribute("placeholder") || editor.settings.placeholder;
            var placeholder_attrs = editor.settings.placeholder_attrs || { style: { position: 'absolute', top: '2px', left: 0, color: '#aaaaaa', padding: '.25%', margin: '5px', width: '80%', 'font-size': '17px !important;', overflow: 'hidden', 'white-space': 'pre-wrap' } };
            var contentAreaContainer = editor.getContentAreaContainer();
            tinymce.DOM.setStyle(contentAreaContainer, 'position', 'relative');
            this.el = tinymce.DOM.add(contentAreaContainer, "label", placeholder_attrs, placeholder_text);
        }
        Label.prototype.hide = function () { tinymce.DOM.setStyle(this.el, 'display', 'none'); }
        Label.prototype.show = function () { tinymce.DOM.setStyle(this.el, 'display', ''); }
    });
   
    tinymce.init({selector: ".EditorControl",plugins: ["placeholder"]});
</script> --}}
@endsection
