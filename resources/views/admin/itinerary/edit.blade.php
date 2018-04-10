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
         <span class="caption-subject font-red bold uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> SỬA THÔNG TIN TUYẾN ĐƯỜNG </span>
      </div>
   </div>
   <h3 class="block text-center"><b>SỬA THÔNG TIN TUYẾN ĐƯỜNG</b></h3>
   <div class="portlet-body form">
   @if(count($errors))
      <div class="alert alert-danger text-center">
        <strong>{{ trans('news.error') }}</strong> {{ trans('news.admin_checkdata') }}  
      </div>
    @endif
      <form  action="{{-- {{ route( 'admin.itinerary.update' )}} --}}" id="frmCreateNews" name="frmCreateNews" method="POST" enctype="multipart/form-data" autocomplete="off">
        {{ csrf_field() }}
         {{ method_field('PUT') }}
         <div class="form-wizard">
            <div class="form-body">
               <div class="tab-content">
                  <div class="tab-pane active">
                     <div class="form-body col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1">
                     <div class="form-group col-md-12">
                        <label class="lable-select" for="id_teacher">Điểm Xuất Phát</label>
                        <br>
                           <select class="selectpicker " id="departPlace" name="departPlace" title="Choose one of the following..." data-live-search="true" tabindex="-98">
                              <option disabled selected></option>
                              @if(count($place)!=0)
                                  @foreach($place as $db_place)
                                  <option @if ($db_place->name == $data['departPlace']) selected @endif value="{{$db_place->id}}" >{{$db_place->name }} </option>
                                  @endforeach
                               @endif
                              @if(count($place)==0)
                              <option value=""><em>(Chưa có địa chỉ nào)</em></option>
                             @endif
                           </select>
                           <span class="help-block"></span>
                         
                             <label for="name">Các bến xe :<span class="requireds"> (*)</span></label>
                             <select class="form-control" id="station_id_dp" name="station_id_dp" >
                                  {{-- @if(!$data['station_id_dp'])
                                      <option value="" >Xe không vào bến</option>
                                  @endif --}}
                                  @foreach($station_dp as $db_station_dp)
                                      <option @if ($db_station_dp['id'] == $data['station_id_dp']) selected @endif value="{{$db_station_dp['id']}}" >{{$db_station_dp['name'] }} </option>
                                  @endforeach
                                  <option value="" >Xe không vào bến</option>
                             </select>              
                      </div>
                            @if($errors->has('departPlace'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('departPlace')}}</strong>
                                        </span>   
                            @endif 
                   <div class="form-group col-md-12 ">
                      <label class="lable-select" for="id_teacher">Điểm Đến</label>
                      <br>
                           <select class="selectpicker " id="destination" name="destination" title="Choose one of the following..." data-live-search="true" tabindex="-98">
                               @if(count($place)!=0)
                                  @foreach($place as $db_place)
                                  <option 
                                  @if ($db_place->name == $data['destination']) selected @endif value="{{$db_place->id}}" >{{$db_place->name }} </option>
                                  @endforeach
                                   </option>
                               @endif
                              @if(count($place)==0)
                              <option value=""><em>(Chưa có địa chỉ nào)</em></option>
                             @endif
                           </select>
                           <span class="help-block"></span>
                    </div>
                    @if($errors->has('destination'))
                         <span class="help-block">
                             <strong style="color: red;">{{$errors->first('destination')}}</strong>
                         </span>   
                    @endif 
                     <div class="col-md-12 ">
                     <label for="name">Bến xe:<span class="requireds"> (*)</span></label>
                      <select class="form-control" id="station_id_des" name="station_id_des"> 
                        {{-- @if(!$data['station_id_des'])
                        <option value="" >Xe không vào bến</option>
                        @endif --}}
                        @foreach($station_des as $db_station_des)
                        <option @if ($db_station_des['id'] == $data['station_id_des']) selected @endif value="{{$db_station_des['id']}}" >{{$db_station_des['name'] }} </option>
                        @endforeach
                         <option value="" >Xe không vào bến</option>
                     </select>
                   </div>

                    <div class="form-group  {{ $errors->has('title') ? 'has-error' : '' }} col-md-12" style="margin-top: 15px;">
                          <label for="name">Giá Vé:<span class="requireds"> (*)</span></label>
                           <input type="text" class="form-control" value="{{ $data['ticket_fare']}}" id="ticket_fare" name="ticket_fare">
                        </div>
                                @if($errors->has('ticket_fare'))
                                <span class="help-block">
                                 <strong style="color: red;">{{$errors->first('ticket_fare')}}</strong>
                               </span>   
                               @endif 
                            @if($errors->has('ticket_fare'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('ticket_fare')}}</strong>
                                        </span>   
                                @endif                        
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-actions text-center">
               <div class="col-xs-12 col-sm-12" style="margin-top: 20px;">
                    <a href="{{route('admin.itinerary.index')}}" class="btn btn-outline green button-pre btn-circle"> {{ trans('news.admin_back') }}
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
