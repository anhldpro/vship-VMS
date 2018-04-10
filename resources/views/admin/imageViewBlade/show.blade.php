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
               <td>Tên</td>
               <td>{{ $data['name']  }}</td>
            </tr>
            <tr>
               <td>Ảnh</td>
               <td><img id="previewHolder" alt="" src="{{URL::asset('')}}{{$data->images}}" width="200px" height="150px"/></td>
            </tr>
            <tr>
               <td>{{trans('news.admin_createat')}}</td>
               <td>{{ date("H:i:s d/m/Y",strtotime( $data[ 'created_at' ] ))}}</td>
            </tr>
            
         </tbody>
      </table>
      <div class="form-actions text-center">
         <div class="col-xs-12 col-sm-12" style="margin-top: 20px;">
           <a href="{{route('admin.imgBlade.index')}}" class="btn btn-outline green button-pre btn-circle"> {{trans('news.admin_back')}}
           </a>               
         </div>
      </div>
@endsection                      