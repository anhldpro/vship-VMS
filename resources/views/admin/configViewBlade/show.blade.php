@extends('layouts.admin.master')
{{-- @section('head')
<link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}" />
@endsection --}}
@section('contents')
<div class="">
   <h4 class="page-title">{{ trans('news.admin_detail') }} </h4>
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
         {{-- @foreach($users as $user) --}}
            <tr>
               <td>ID</td>
               <td>{{ $data[ 'id' ] }}</td>
            </tr>
            <tr>
               <td>Tiêu Đề:</td>
               <td>{{ $data[ 'name' ] }}</td>
            </tr>
            <tr>
               <td>Nội Dung Tiếng Việt</td>
               <td>{!! $data[ 'value' ] !!} </td>
            </tr>
            <tr>
               <td>Nội Dung Tiếng Anh</td>
               <td>{!! $data[ 'value_en' ] !!} </td>
            </tr>
            <tr>
               <td>Trạng Thái</td>
               <td>@if( $data['status'] ==1) Đang Mở @else Đã Đóng @endif </td>
            </tr>
            <tr>
               <td>{{trans('news.admin_createat')}}</td>
               <td>{{ date("H:i:s d/m/Y",strtotime( $data[ 'created_at' ] ))}}</td>
            </tr>
            
         </tbody>
      </table>
      <div class="form-actions text-center">
         <div class="col-xs-12 col-sm-12" style="margin-top: 20px;">
           <a href="{{route('admin.viewBlade.index')}}" class="btn btn-outline green button-pre btn-circle"> {{trans('news.admin_back')}}
           </a>               
         </div>
      </div>
@endsection                      