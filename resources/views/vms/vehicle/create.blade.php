@extends('layouts.admin.master')
@section('head')
 <script type="text/javascript" src="{{url('libs/dropzone/dropzone.min.js')}}"></script>
 <link rel="stylesheet"  href="{{url('libs/dropzone/dropzone.min.css')}}">

@stop
@section('contents')
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption uppercase">
            <i class="fa fa-book"></i> Danh sách xe</div>

    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
            <form  method="post" action="{{route('vms.vehicle.store')}}" id="myForm"  enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="row" data-pg-collapsed>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="formInput481">Loại xe
                                <br>
                            </label>
                            <select id="formInput481" class="form-control" name="cat_veh" required>
                                @if(!empty($vehicles))
                                    @foreach($vehicles as $item)
                                        <option value="{{$item->id}}" data-tokens="{{ $item->name }}">{{$item->name }} </option>
                                    @endforeach
                                @endif
                                @if(count($vehicles)==0)
                                    <option value=""><em>(Không loại xe nào)</em></option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="formInput424">Sức chứa</label>
                            <input type="text" name="capacity" class="form-control" id="formInput424" placeholder="Sức chứa của xe" required>
                        </div>
                    </div>
                </div>
            {{--<div class="row" style="display: none">
                <div class="grid_4 col-md-12">
                    <label>
                        <input class="control-label" type="checkbox" value="0" name="fix_road" id="fix_road">Xe chạy tuyến cố định
                    </label>
                </div>
            </div>
            <div class="row" data-pg-collapsed id="vs-road">--}}
                    {{--<div class="col-md-6">--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="control-label" for="formInput516">Địa điểm khởi hành (Tỉnh/TP)</label>--}}
                            {{--<select id="formInput516" class="form-control" name="cat_province_from" required>--}}
                                {{--@if(!empty($provinces))--}}
                                    {{--<option value="">--Lựa chọn điểm đi-- </option>--}}
                                    {{--@foreach($provinces as $item)--}}
                                        {{--<option value="{{$item->id}}" data-tokens="{{ $item->name }}">{{$item->name }} </option>--}}
                                    {{--@endforeach--}}
                                    {{--<input type="hidden" name="cat_pro_from_name"/>--}}
                                {{--@endif--}}
                                {{--@if(count($provinces)==0)--}}
                                    {{--<option value=""><em>(Không danh mục nào)</em></option>--}}
                                {{--@endif--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-6">--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="control-label" for="formInput539">Địa điểm đến (Tỉnh/TP)</label>--}}
                            {{--<select id="formInput539" class="form-control" name="cat_province_to" required>--}}
                                {{--@if(!empty($provinces))--}}
                                    {{--<option value="">--Lựa chọn điểm đến-- </option>--}}
                                    {{--@foreach($provinces as $item)--}}
                                        {{--<option value="{{$item->id}}" data-tokens="{{ $item->name }}">{{$item->name }} </option>--}}
                                    {{--@endforeach--}}
                                    {{--<input type="hidden" name="cat_pro_to_name"/>--}}
                                {{--@endif--}}
                                {{--@if(count($provinces)==0)--}}
                                    {{--<option value=""><em>(Không danh mục nào)</em></option>--}}
                                {{--@endif--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
                <div class="row" data-pg-collapsed>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label" for="formInput745">Mô tả</label>
                            <textarea class="form-control" rows="3" id="formInput745" name="desc"></textarea>
                        </div>
                    </div>
                </div>

                @if($errors->has('infomation'))
                    <span class="help-block">
                                    <strong style="color: red;">{{$errors->first('infomation')}}</strong>
                                </span>
                @endif
                <div class="form-group">
                    <div class="form-group form-md-line-input" {{ $errors->has('avatar') ? 'has-error' : '' }}>
                        <label for="avatar">Ảnh đại diện:</label><input type="file" name="avatar" value="" id="avatar" class="required borrowerImageFile" data-errormsg="PhotoUploadErrorMsg">

                        <img id="previewHolder" alt="" width="170px" height="100px"/>
                    </div>
                </div>

                <div class="panel panel-default">

                    <label>Thêm nhiều ảnh:<span class="requireds"> (*)</span></label>
                    <div id="drop" class="dropzone" name="images" action="" >

                    </div>
                </div>

                <div class="row" data-pg-collapsed>
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary" type="submit" id="btnSubmit">Thêm mới</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
@section('footer')

    <script>
        /*function changeFixRoad() {
            if ($(this).is(':checked')) {
                $("#vs-road").css('display', '');
                $("#fix_road").val("1");
            } else {
                $("#vs-road").css("display", "none");
                $("#fix_road").val("0");
            }
        }*/

        $(document).ready(function(){

            //veh road style
            // $("#vs-road").css("display", "none");

            // changeFixRoad();
            // $("#fix_road").change(function () {
            //     changeFixRoad.call(this);
            // });
            //
            // //get name of province selected
            // $("[name='cat_province_from']").change(function () {
            //    $("[name='cat_pro_from_name']").val($(this).find("option:selected").text());
            // });
            // $("[name='cat_province_to']").change(function () {
            //     $("[name='cat_pro_to_name']").val($(this).find("option:selected").text());
            // });

            Dropzone.autoDiscover = false;
            var dropzone = new Dropzone('#drop',{
                maxFilesize: 6,
                maxFiles:40,
                parallelUploads: 10000,
                paramName: "file",
                addRemoveLinks:true,
                uploadMultiple:false,
                acceptedFiles : 'video/mp4, images/jpg, image/png',
                url : "{{route('vms.vehicle.uploadImage')}}",

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
                            url: '{{route("vms.vehicle.removeImage")}}',
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
                        $('#frmCreateNews').append(hidden_data);
                    });

                    this.on("sending", function(file, xhr, formData){
                        formData.append("_token", "{{ csrf_token() }}");
                    });
                }
            });


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
                console.log(reader);
            }
        }

        $("#avatar").change(function() {
            readURL(this);
        });
    </script>
@stop