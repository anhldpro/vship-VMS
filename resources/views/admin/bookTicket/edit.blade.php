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
         <span class="caption-subject font-red bold uppercase"><i class="fa fa-plus-circle" aria-hidden="true"></i> SỬA VÉ </span>
      </div>
   </div>
   <h3 class="block text-center">{{ trans('news.admin_edit_post') }}SỬA VÉ </h3>
   <div class="portlet-body form">
   @if(count($errors))
      <div class="alert alert-danger text-center">
        <strong>{{ trans('news.error') }}</strong>{{ trans('news.admin_checkdata') }}  
      </div>
    @endif
         <form  action="{{ route('admin.listBookTicket.update', $data->id)}}" id="frmEditNews" name="frmEditNews" method="POST" enctype="multipart/form-data" autocomplete="off">
          {{Form::token()}}
         {{ method_field('PUT') }}
         <div class="form-wizard">
            <div class="form-body">
               <div class="tab-content">
                  <div class="tab-pane active">
                     <div class="form-body col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1">
                        <div class="form-group form-md-line-input">
                           {{Form::text('car_id', $data->car_company['name'],['class'=>'form-control',
                           'name'=>'', 'readonly'])}}
                           <label for="name">Nhà xe:<span class="requireds"> (*)</span></label>
                        </div>  

                        
                        <div class="form-group form-md-line-input ">
                           {{Form::text('itinerary_id', $data->itinerary['slug'],['class'=>'form-control',
                           'name'=>''], 'readonly')}}
                         <label for="name">Tuyến đường: <span class="requireds"> (*)</span></label>  
                        </div>

                        <div class="form-group form-md-line-input">
                           {{Form::text('date_start',$data->date_start,['class'=>'form-control','id'=>'date_start',
                           'name'=>'date_start'])}}
                           <label for="name">Ngày khởi hành: <span class="requireds"> (*)</span></label>
                        </div>


                        <div class="form-group form-md-line-input">
                           {{Form::text('time_start',$data->time_start,['class'=>'form-control','id'=>'timepicker1',
                           'name'=>'time_start'])}}
                           <label for="name">Giờ khởi hành: <span class="requireds"> (*)</span></label>
                        </div> 

                        <div class="form-group form-md-line-input">
                           {{Form::text('name',$data->name,['class'=>'form-control',
                           'name'=>'name'], 'readonly')}}
                           <label for="name">Tên khách hàng: <span class="requireds"> (*)</span></label>
                        </div>
                         
                         <div class="form-group form-md-line-input">
                           {{Form::text('phone',$data->phone,['class'=>'form-control',
                           'name'=>'phone', 'readonly' ])}}
                           <label for="name">Số điện thoại khách hàng: <span class="requireds"> (*)</span></label>
                        </div>

                        <div class="form-group form-md-line-input">
                           {{Form::text('email',$data->email,['class'=>'form-control',
                           'name'=>'email', 'readonly' ])}}
                           <label for="name">Email khách hàng: <span class="requireds"> (*)</span></label>
                        </div>

                        <div class="form-group form-md-line-input">
                           {{Form::text('code',$data->code,['class'=>'form-control',
                           'name'=>'code', 'readonly'])}}
                           <label for="name">Mã vé xe: <span class="requireds"> (*)</span></label>
                        </div>
      
                        <div class="form-group form-md-line-input">
                                <label  class="col-sm-2 control-label" for="status">Trạng Thái</label>
                                <div class="col-sm-9">
                                   <select class="form-control" name="status" id="">
                                       <option @if($data->status == 1) selected @endif value="1">Đã thanh toán</option>
                                      <option  @if($data->status == 0) selected @endif value="0">Đã hủy</option>
                                      <option  @if($data->status == 2) selected @endif value="2">Chưa thanh toán</option>
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
                    <a href="{{route('admin.listBookTicket.index')}}" class="btn btn-outline green button-pre btn-circle"> {{ trans('news.admin_back') }}
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




