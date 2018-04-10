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
         <span class="caption-subject font-red bold uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> THÊM MỚI TUYẾN ĐƯỜNG  </span>
      </div>
   </div>
   <h3 class="block text-center"><b>THÊM MỚI TUYẾN ĐƯỜNG</b></h3>
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
      <form  action="{{ route( 'admin.itinerary.store' )}}" id="frmCreateNews" name="frmCreateItiner" method="POST" enctype="multipart/form-data" autocomplete="off">
         {{ csrf_field() }}
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
                                  <option value="{{$db_place->id}}" data-tokens="{{$db_place->name}}" >{{$db_place->name }} </option>
                                  @endforeach
                               @endif
                              @if(count($place)==0)
                              <option value=""><em>(Chưa có địa chỉ nào)</em></option>
                             @endif
                           </select>
                           <span class="help-block"></span>                         
                             <label for="name">Các bến xe :<span class="requireds"> (*)</span></label>
                             <select class="form-control" id="station_id_dp" name="station_id_dp" >
                               <option value=""  ><em></em></option>
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
                                  <option value="{{$db_place->id}}" data-tokens="{{$db_place->name}}">{{$db_place->name }} </option>
                                  @endforeach
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
                     
                       <option value="" ></option>
                      
                     </select>
                   </div>
                        <div class="form-group  {{ $errors->has('title') ? 'has-error' : '' }} col-md-12">
                          <label for="name">Giá Vé:<span class="requireds"> (*)</span></label>
                           <input type="text" class="form-control" id="ticket_fare" name="ticket_fare">
                        </div>
                                @if($errors->has('ticket_fare'))
                                <span class="help-block">
                                 <strong style="color: red;">{{$errors->first('ticket_fare')}}</strong>
                               </span>   
                               @endif 
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
