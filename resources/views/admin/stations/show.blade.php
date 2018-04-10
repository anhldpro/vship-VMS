@extends('layouts.admin.master')
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
               <td>{{trans('news.admin_title')}}</td>
               <td>{{ $data[ 'name' ] }}</td>
            </tr>
            <tr>
               <td>Phone</td>
               <td>{{ $data[ 'phone' ]}}</td>
            </tr>
            <tr>
               <td>Email</td>
               <td>{!! $data[ 'email' ] !!} </td>
            </tr>
           
            <tr>
               <td>Thông tin</td>
               <td>{{ $data[ 'infomation' ] }}</td>
            </tr>
            <tr>
               <td>{{trans('news.admin_createat')}}</td>
               <td>{{ date("H:i:s d/m/Y",strtotime( $data[ 'created_at' ] ))}}</td>
            </tr>
            
         </tbody>
      </table>
      <div class="form-actions text-center">
         <div class="col-xs-12 col-sm-12" style="margin-top: 20px;">
           <a href="{{route('admin.news.index')}}" class="btn btn-outline green button-pre btn-circle"> {{trans('news.admin_back')}}
           </a>               
         </div>
      </div>
@endsection                      