@extends('layouts.admin.master')
@section('contents')
<div class="">
   <h4 class="page-title">CHI TIẾT</h4>
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
         <tbody id="tbodyTable">
            <tr>
               <td>ID</td>
               <td>{{ $data[ 'id' ] }}</td>
            </tr>
            <tr>
               <td>Nhà Xe</td>
               <td>{{ $data->car_company['name']  }}</td>
            </tr>
            <tr>
               <td>Tuyến Đường</td>
               <td>{{ $data->itinerary['slug']}}</td>
            </tr>
            <tr>
               <td>Giờ xuất phát</td>
               <td>{{ $data->time_start}}</td>
            </tr>
            <tr>
               <td>Giờ về</td>
               <td>{{ $data->time_back}}</td>
            </tr>
            <tr>
               <td>{{trans('news.admin_createat')}}</td>
               <td>{{ date("H:i:s d/m/Y",strtotime( $data[ 'created_at' ] ))}}</td>
            </tr>
            
         </tbody>
      </table>
      <div class="form-actions text-center">
         <div class="col-xs-12 col-sm-12" style="margin-top: 20px;">
           <a href="{{route('admin.ticketInfo.index')}}" class="btn btn-outline green button-pre btn-circle"> {{trans('news.admin_back')}}
           </a>               
         </div>
      </div>
@endsection                      