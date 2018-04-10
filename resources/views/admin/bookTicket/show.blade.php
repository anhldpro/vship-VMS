@extends('layouts.admin.master')
@section('contents')
<div class="">
   <h4 class="page-title">TICKET DETAIL </h4>
</div>
 <div class="row">
     <div class="col-sm-12">
     <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
         <thead>
            <tr>
               <th class="stl-column color-column col-sm-2">{{trans('news.admin_title')}}</th>
               <th class="stl-column color-column">{{trans('news.admin_content')}}</th> 
            </tr>
         </thead>
    <form  action="{{ route('admin.listBookTicket.update', $data->id)}}" id="frmEditNews" name="frmEditNews" method="POST" enctype="multipart/form-data" autocomplete="off">
    {{Form::token()}}
         {{ method_field('PUT') }}
         <tbody id="tbodyTable">
         {{-- @foreach($users as $user) --}}
            <tr>
               <td>ID</td>
               <td>{{ $data[ 'id' ] }}</td>
            </tr>
            <tr>
               <td>{{trans('bookTicket.admin_itinerary')}}</td>
               <td>{{ $data->itinerary['slug']  }}</td>
            </tr>
            <tr>
               <td>{{trans('bookTicket.admin_car_company')}}</td>
               <td>{{ $data->car_company['name']}}</td>
            </tr>
            <tr>
               <td>{{trans('bookTicket.admin_date_start')}}</td>
               <td>{!! $data[ 'date_start' ] !!} </td>
            </tr>
            <tr>
               <td>{{trans('bookTicket.admin_time')}}</td>
               <td>{{ $data[ 'time_start' ] }}</td>
            </tr>
            
            <tr>
               <td >{{trans('bookTicket.admin_date_back')}}</td>
               <td >{{ $data[ 'date_back' ] }} </td>
            </tr>
            <tr>
               <td > {{trans('bookTicket.admin_time_back')}}</td>
               <td >{{ $data[ 'time_back' ] }}</td>
            </tr>
            <tr>
               <td>{{trans('bookTicket.admin_customer')}}</td>
               <td>{{ $data[ 'name' ] }}</td>
            </tr>
            <tr>
               <td>{{trans('bookTicket.admin_phone')}}</td>
               <td>{{ $data[ 'phone' ] }}</td>
            </tr>
            <tr>
               <td>{{trans('bookTicket.admin_email')}}</td>
               <td>{{ $data[ 'email' ] }}</td>
            </tr>
            <tr>
               <td>{{trans('bookTicket.admin_code')}}</td>
               <td>{{ $data[ 'code' ] }}</td>
            </tr>
            <tr>
               <td>Loại vé</td>
               <td>@if ($data[ 'ticket_type' ] ==1) Vé 1 chiều @else Vé 2 chiều @endif</td>
            </tr>
            <tr>
               <td>Status</td>
               {{-- <td>@if ($data[ 'status' ] ==1) Đã thanh toán @elseif($data[ 'status' ] ==2) Chưa thanh toán @else Đã hủy @endif</td> --}}
               <td>
               <select class="form-control" name="status" id="">
                  <option @if($data->status == 1) selected @endif value="1">Đã thanh toán</option>
                 <option  @if($data->status == 0) selected @endif value="0">Đã hủy</option>
                 <option  @if($data->status == 2) selected @endif value="2">Chưa thanh toán</option>
              </select>
              </td>
            </tr>

            <tr>
               <td>{{trans('news.admin_createat')}}</td>
               <td>{{ date("H:i:s d/m/Y",strtotime( $data[ 'created_at' ] ))}}</td>
            </tr>
            
         </tbody>

      </table>
      <div class="form-actions text-center">
         <div class="col-xs-12 col-sm-12" style="margin-top: 20px;">
           <a href="{{route('admin.listBookTicket.index')}}" class="btn btn-outline green button-pre btn-circle"> {{trans('news.admin_back')}}
           </a> 
           {{Form::submit('Lưu',[
                      'class'=>'btn green btn-circle'
                    ])}}                
         </div>
      </div>
      {{Form::close()}}
@endsection                      