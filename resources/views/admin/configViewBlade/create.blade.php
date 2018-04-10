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
         <span class="caption-subject font-red bold uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> {{ trans('news.admin_create_post') }} </span>
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
         {{-- {{ csrf_field() }} --}}
         <div class="form-wizard">
            <div class="form-body">
               <div class="tab-content">
                  <div class="tab-pane active">
                     <div class="form-body col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1">

                        <div class="form-group form-md-line-input  {{ $errors->has('name') ? 'has-error' : '' }}">
                           <input type="text" class="form-control" id="name" name="name">
                           <label for="name">Tên:<span class="requireds"> (*)</span></label>
                        </div>
                            @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('name')}}</strong>
                                        </span>   
                                    @endif      
                       <div class="form-group">
                            <div style="margin-bottom: 15px;color: #888;">Nội dung tiếng Việt:</div>
                              <textarea class="form-control" rows="10" id="value" name="value" placeholder="Nội dung">{{ old('content') }}</textarea>
                                    
                        </div>
                         <div class="form-group">
                            <div style="margin-bottom: 15px;color: #888;">Nội dung tiếng Anh:</div>
                              <textarea class="form-control" rows="10" id="value_en" name="value" placeholder="Nội dung">{{ old('content') }}</textarea>
                                    
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
                    {{Form::submit('Add',[
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

<script>

  $('#frmCreateNews').on('submit',function(e){

      e.preventDefault();
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      var url = "{{route('admin.viewBlade.store')}}";

      $.ajax({
          type:'POST',
          url: url,
          data: {
          name : $("#name").val(),
          value : tinymce.get('value').getContent(),
          
          },

          success:function(data){
              if(!data.error) {
                  toastr.success('Thêm mới thành công!');

                  setTimeout(function () {   
                     window.location.href = "{{route('admin.viewBlade.index')}}";
                  }, 1000);

                  $('#frmCreateNews button[type="submit"]').prop('disabled',true);
                  

              } else {
                
                  toastr.error("Thêm mới thất bại");
                  $('#frmCreateNews button[type="submit"]').prop('disabled',false);
              }
            },
            error: function (xhr, ajaxOptions, thrownError) {
              toastr.error(thrownError);

            }
      });
  }); 
</script>

<script src="{{url('js/jqueryValidate/jquery.validate.js')}}" type="text/javascript"></script>

<script>
            $('#frmCreateNews').validate({
                errorElement:"span",
            rules: {
                name:{
                    required:true,
                },
              },        
              messages:{
                name:{
                    required:'Vui lòng nhập tên',
                },
          }
        }); 


    
</script>

@endsection
