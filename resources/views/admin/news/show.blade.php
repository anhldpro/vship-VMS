@extends('layouts.admin.master')
@section('contents')
<div class="">
   <h4 class="page-title">{{ trans('news.admin_detail') }} </h4>
</div>
 <div class="row">
     <div class="col-sm-12">
     <table class="table table-hover " id="sample_1">
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
               <td>{{ $data[ 'title' ] }}</td>
            </tr>
            <tr>
               <td>{{trans('news.admin_describe')}}</td>
               <td>{!! $data[ 'describe' ]!!}</td>
            </tr>
            <tr>
               <td>{{trans('news.admin_content')}}</td>
               <td>{!! $data[ 'content' ] !!} </td>
            </tr>
            <tr>
               <td>{{trans('news.admin_img')}}</td>
               <td><img src="{{URL::asset( $data['images' ] )}}"  class="img-responsive" style="width: 100px" /></td></td>
            </tr>
            <tr>
               <td>{{trans('news.admin_author')}}</td>
               <td>{{ $data->user['name'] }}</td>
            </tr>
            {{-- <tr>
               <td>Bài viết liên quan</td>
               <td>{{ $news_title }}</td>
            </tr> --}}
             <tr>
               <td>Ngôn ngữ</td>
               <td>@if ($data[ 'Lang' ] =='vi') Tiếng Việt @else Tiếng Anh @endif</td>
            </tr>
            <tr>
               <td>{{trans('news.admin_createat')}}</td>
               <td>{{ date("H:i:s d/m/Y",strtotime( $data[ 'created_at' ] ))}}</td>
            </tr>
            
         </tbody>
      </table>
      <div class="form-actions text-center">
         <div class="col-xs-12 col-sm-12" style="margin-top: 20px;">
           {{--<a href="{{route('admin.news.index')}}" class="btn btn-outline green button-pre btn-circle"> {{trans('news.admin_back')}}
           </a>--}}
             <a href="{{route('admin.news.index')}}" class="btn btn-primary btn-rounded btn-icon left-icon">
                 <i class="fa fa-eye"></i> <span>{{trans('news.admin_back')}} </span>
             </a>
         </div>
      </div>
@endsection                      