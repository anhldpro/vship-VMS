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
         <span class="caption-subject font-red bold uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> THÊM MỚI LỘ TRÌNH VÀ GIỜ XUẤT PHÁT </span>
      </div>
   </div>
   <h3 class="block text-center"><b>THÊM MỚI LỘ TRÌNH VÀ GIỜ XUẤT PHÁT</b></h3>
   <div class="portlet-body form">
   @if(count($errors))
      <div class="alert alert-danger text-center">
        <strong>{{ trans('news.error') }}</strong> {{ trans('news.admin_checkdata') }}  
      </div>
    @endif
      <form  action="{{ route( 'admin.ticketInfo.store' )}}" id="frmCreateNews" name="frmCreateNews" method="POST" enctype="multipart/form-data" autocomplete="off">
         {{ csrf_field() }}
         <div class="form-wizard">
            <div class="form-body">
               <div class="tab-content">
                  <div class="tab-pane active">
                     <div class="form-body col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1">
                      
                      <div class="form-group form-md-line-input form-md-floating-label">
                        <label class="lable-select" for="id_teacher">Nhà Xe</label>
                        <br>
                           <select class="selectpicker " id="car_id" name="car_id" title="Choose one of the following..." data-live-search="true" tabindex="-98">
                              @if(!empty($car_company))
                             
                                  @foreach($car_company as $car)
                                  <option value="{{$car->id}}" data-tokens="{{ $car->name }}">{{$car->name }} </option>
                                  @endforeach
                               @endif
                              @if(count($car)==0)
                              <option value=""><em>(Không có nhà xe nào)</em></option>
                             @endif
                           </select>
                    
                           <span class="help-block"></span>
                      </div>
                            @if($errors->has('car_id'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('car_id')}}</strong>
                                        </span>   
                            @endif 

                   <div class="form-group form-md-line-input form-md-floating-label ">
                      <label class="lable-select" for="">Tuyến Đường</label>
                      <br>
                       <div class="col-md-6" style="padding-left: 0px; ">
                          <select class="selectpicker" id="itinerary_id" name="itinerary_id" title="Choose one of the following..." data-live-search="true" tabindex="-98" style="width: 100%;">
                              @if(!empty($itinerary))
                             
                                  @foreach($itinerary as $db_itinerary)
                                  <option value="{{$db_itinerary->id}}" data-tokens="{{$db_itinerary->slug}}">{{$db_itinerary->slug }} </option>
                                  @endforeach
                               @endif
                              @if(count($db_itinerary)==0)
                              <option value=""><em>(Không có tuyến đường nào)</em></option>
                             @endif
                           </select>
                      </div>
                        <button type="button" class="btn green btn-circle " data-toggle="modal" data-target="#myModal">Thêm tuyến đường</button>

                       <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                          <div class="modal-dialog">
                          
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                              </div>
                              <div class="modal-body">
                        <div class="form-group col-md-12">
                        <label class="lable-select" for="id_teacher">Điểm Xuất Phát</label>
                        <br>
                           <select class="selectpicker" id="departPlace" name="departPlace" title="Choose one of the following..." data-live-search="true" tabindex="-98">
                              <option disabled selected></option>
                              @if(count($place)!=0)
                                  @foreach($place as $db_place)
                                  <option value="{{$db_place->id}}" data-tokens="{{$db_place->name}}" >{{$db_place->name }} </option>
                                  @endforeach
                               @endif
                              @if(count($place)==0)
                              <option value=""><em>(Chưa có địa chỉ nào)</em></option>
                             @endif
                           </select>
                           <span class="help-block"></span>
                            <div style="margin-top: 10px;">
                             <label for="name">Các bến xe :<span class="requireds"> (*)</span></label>
                             <select  class="form-control" id="station_id_dp" name="station_id_dp" >
                               <option value=""  ><em></em></option>
                             </select>
                            </div>
                      </div>
                      <div class="form-group col-md-12 ">
                      <label class="lable-select" for="id_teacher">Điểm Đến</label>
                      <br>
                           <select class="selectpicker " id="destination" name="destination" title="Choose one of the following..." data-live-search="true" tabindex="-98">
                               @if(count($place)!=0)
                             
                                  @foreach($place as $db_place)
                                  <option value="{{$db_place->id}}" data-tokens="{{$db_place->name}}">{{$db_place->name }} </option>
                                  @endforeach
                               @endif
                              @if(count($place)==0)
                              <option value=""><em>(Chưa có địa chỉ nào)</em></option>
                             @endif
                           </select>
                           <span class="help-block"></span>
                    </div>
                    <div class="col-md-12 ">
                     <label for="name">Bến xe:<span class="requireds"> (*)</span></label>
                      <select class="form-control" id="station_id_des" name="station_id_des">
                     
                       <option value="" ></option>
                      
                     </select>
                              </div>
                              <div class="form-group  {{ $errors->has('title') ? 'has-error' : '' }} col-md-12">
                                <label for="name">Giá Vé:<span class="requireds"> (*)</span></label>
                                 <input type="text" class="form-control" id="ticket_fare" name="ticket_fare">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>

                                <button type="button" id="xxx" class="btn btn-default">Lưu</button>
                              </div>
                            </div>
                            
                          </div>
                        </div>
                    </div>

                    {{-- ENd Model --}}
                          @if($errors->has('itinerary_id'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('itinerary_id')}}</strong>
                                        </span>   
                            @endif 
                    <div style="margin-top: 25px;">
                      <label for="name">Giờ khởi hành:<span class="requireds"> (*)</span></label>
                   
                    <div class="form-group form-md-line-input {{ $errors->has('title') ? 'has-error' : '' }}">
                           <input id="timepicker1" type="text" name="time_start" class="form-control input-small">
                    </div>
                     </div>  
                            @if($errors->has('time_start'))
                              <span class="help-block">
                                  <strong style="color: red;">{{$errors->first('time_start')}}</strong>
                              </span>   
                            @endif 
                    <label for="name">Giờ trở về:<span class="requireds"> (*)</span></label>
                    <div class="form-group form-md-line-input {{ $errors->has('title') ? 'has-error' : '' }}">
                           <input id="timepicker2" type="text" name="time_back" class="form-control input-small">
                           
                    </div>
                      @if($errors->has('time_back'))
                                  <span class="help-block">
                                      <strong style="color: red;">{{$errors->first('time_start')}}</strong>
                                  </span>   
                      @endif                  
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-actions text-center">
               <div class="col-xs-12 col-sm-12" style="margin-top: 20px;">
                    <a href="{{route('admin.ticketInfo.index')}}" class="btn btn-outline green button-pre btn-circle"> {{ trans('news.admin_back') }}
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
<meta name="_token" content="{!! csrf_token() !!}" />
<script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
  $(document).ready(function(){
  
    $("#xxx").click(function() {
      
        var departPlace = $('select[name=departPlace]').val();
        var station_id_dp = $("#station_id_dp").val();
        var destination = $("#destination").val();
        var station_id_des = $("#station_id_des").val();
        var ticket_fare = $('#ticket_fare').val();
        
                 $.ajax({
                    url: '{{route('admin.itinerary.store2')}}',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {'departPlace': departPlace,'destination': destination,'station_id_dp': station_id_dp, 'station_id_des': station_id_des,'ticket_fare' : ticket_fare},
                    success: function(data){
                       
                        console.log(data);
                        $('#itinerary_id').append('<option value="'+data.itinerary_id+'" data-tokens="'+data.slug+'">'+data.slug+'</option>');
                         toastr.success('Thêm mới tuyến đường thành công!');
                        setTimeout(function () {
                        window.location.reload();
                        }, 2500);               
                       
                    }
                });
         
    }); 
  });
</script>
 <script type="text/javascript">

    $(document).ready(function(){
      $('#departPlace').change(function(){
        var id = $('#departPlace').val();
        // alert(id);
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
          $.ajax({
            url:'{{URL::asset('')}}admin/itinerary/'+id,
            type:'post',
            data:{'id':id},
            success:function(data){
              console.log(data);
                $('#station_id_dp').html(data);

            }

          });
      });
       $('#destination').change(function(){
        var id = $('#destination').val();
        // alert(id);
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
          $.ajax({
            url:'{{URL::asset('')}}admin/itiner/'+id,
            type:'post',
            data:{'id':id},
            success:function(data){
              console.log(data);
               $('#station_id_des').html(data);

            }

          });
      });
    });
      
          

</script>

@endsection
