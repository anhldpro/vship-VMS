@extends('layouts.admin.master')
@section('head')
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
         <span class="caption-subject font-red bold uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> THÊM MỚI </span>
      </div>
   </div>
   <h3 class="block text-center"><b>THÊM MỚI</b></h3>
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
                           <label for="name">Tên:<span class="requireds"> (*)</span></label>
                        </div>
                            @if($errors->has('name'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('name')}}</strong>
                                        </span>   
                                    @endif      
                        <div class="form-group">
                          <div class="form-group form-md-line-input" {{ $errors->has('images') ? 'has-error' : '' }}>
                          <label for="images">Hình ảnh:</label><input type="file" name="images" value="" id="images" class="required borrowerImageFile" data-errormsg="PhotoUploadErrorMsg">
                                   
                          <img id="previewHolder" alt="" width="200px" height="150px"/>
                         </div> 
                         </div>  
                     </div>
                  </div>
                  </div>
               </div>
            </div>
            <div class="form-actions text-center">
               <div class="col-xs-12 col-sm-12" style="margin-top: 20px;">
                    <a href="{{route('admin.imgBlade.index')}}" class="btn btn-outline green button-pre btn-circle"> {{ trans('news.admin_back') }}
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
  <script src="{{url('js/jqueryValidate/jquery.validate.js')}}" type="text/javascript"></script>
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
                name:{
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
                name:{
                    required:'Vui lòng nhập tên',
                    
                },
          }
        }); 

</script>
@endsection