@extends('layouts.admin.master')
@section('head')
<style>
	.error{
		color:red;
		font-family: arial;
		font-size: 14px;
	}

</style>

<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css">
<link href="{{asset('css/dropzone.css')}}" rel="stylesheet">
@endsection
@section('contents')
<div class="portlet light bordered" id="form_wizard_1">
	<div class="portlet-title">
		<div class="caption">
			<span class="caption-subject font-red bold uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> SỬA THÔNG TIN BẾN XE </span>
		</div>
	</div>
	<h3 class="block text-center"><b>SỬA BẾN XE</b></h3>
	<div class="portlet-body form">
		@if(count($errors))
		<div class="alert alert-danger text-center">
			<strong>{{ trans('news.error') }}</strong> {{ trans('news.admin_checkdata') }}  
		</div>
		@endif
		@if (Session::has('responseData'))
		@if (Session::get('responseData')['statusCode'] == 1)
		<div class="alert alert-success" style="margin-top:20px">{{ Session::get('responseData')['message'] }}</div>
		@elseif (Session::get('responseData')['statusCode'] == 2)
		<div class="alert alert-danger" style="margin-top:20px" >{{ Session::get('responseData')['message'] }}</div>
		@endif
		@endif

		<form  action="{{--{{route('admin.stations.update')}}--}}" id="form" name="form" method="POST" enctype="multipart/form-data" autocomplete="off" >
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-wizard">
				<div class="form-body">
					<div class="tab-content">
						<div class="tab-pane active">
							<div class="form-body col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1">
								<div class="form-group form-md-line-input {{ $errors->has('name') ? 'has-error' : '' }}">
									<input type="text" class="form-control" id="name" name="name" value="{{$data->name}}">
									<label for="name">Tên bến xe:<span class="requireds"> (*)</span></label>
								</div>
								@if($errors->has('name'))
								<span class="help-block">
									<strong style="color: red;">{{$errors->first('name')}}</strong>
								</span>   
								@endif  

								<div class="form-group form-md-line-input {{ $errors->has('phone') ? 'has-error' : '' }}">
									<input type="text" class="form-control" id="phone" name="phone" value="{{$data->phone}}">
									<label for="name">Số điện thoại:<span class="requireds"> (*)</span></label>
								</div>
								<p style="color:red;display:none" class="error errorPhone"></p>
								@if($errors->has('phone'))
								<span class="help-block">
									<strong style="color: red;">{{$errors->first('phone')}}</strong>
								</span>   
								@endif 

								<div class="form-group form-md-line-input {{ $errors->has('email') ? 'has-error' : '' }}">
									<input type="text" class="form-control" id="email" name="email" value="{{$data->email}}">
									<label for="name">Email:<span class="requireds"> (*)</span></label>
								</div>
								<p style="color:red;display:none" class="error errorEmail"></p>

								@if($errors->has('email'))
								<span class="help-block">
									<strong style="color: red;">{{$errors->first('email')}}</strong>
								</span>   
								@endif 
                <div class="form-group col-md-12 form-md-line-input" style="padding-left: 0px;">
                        <label class="lable-select" for="id_teacher">Tỉnh, thành phố</label>
                        <br>
                           <select class="selectpicker " id="place_id" name="place_id" title="Choose one of the following..." data-live-search="true" tabindex="-98">
                              <option disabled selected></option>
                              @if(count($place)!=0)
                                  @foreach($place as $db_place)
                                  <option @if ($db_place->id == $data['place_id']) selected @endif value="{{$db_place->id}}" >{{$db_place->name }} </option>
                                  @endforeach
                               @endif
                              @if(count($place)==0)
                              <option value=""><em>(Chưa có địa chỉ nào)</em></option>
                             @endif
                           </select>
                           <span class="help-block"></span>       
                      </div>
                            @if($errors->has('place_id'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('place_id')}}</strong>
                                        </span>   
                            @endif 
								<div class="form-group">
									<div style="margin-bottom: 15px;color: #888;">Thông tin bến xe:</div>
									<textarea class="form-control my-editor" rows="10" id="infomation" name="infomation" placeholder="Mô Tả" value="">{{ $data->infomation }}</textarea>

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

								<!-- Drop Zone -->
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
					{{Form::submit('Save',[
					'class'=>'btn green btn-circle '
					])}}

				</div>

			</div>
		</div>
	</form>
	
</div>
<script src="{{asset('js/dropzone.js')}}"></script>
<script type="text/javascript">
   Dropzone.options.dropzone1 = {
      url : "{{route('admin.station.uploadImage')}}",
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
      			url: '{{route("admin.station.removeImage")}}',
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
      				$('#form').append(hidden_data);
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
               $('#form').append(hidden_data);
             	});

      	this.on("sending", function(file, xhr, formData){
      		formData.append("_token", "{{ csrf_token() }}");
      	});
            // Get images from database
            $.ajax({
            	url : '{{route("admin.station.getImages")}}',
            	data : {
            		id : {{$data->id}},
            	},
            	type: 'GET',
            }).done(function(data){
            	$.each(data,function(index,value){
            		var string = value.url.split('/');
            		var img_folder = 'images/stations/';
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
@stop
