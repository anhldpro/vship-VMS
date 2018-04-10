@extends('layouts.admin.master')
@section('head')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
@endsection
@section('contents')

<div class="portlet light bordered">
<div class="portlet-title">
      <div class="col-xs-12 col-sm-4 col-md-6 col-lg-5">
        {{-- <button onclick="addBlog();" class="btn green btn-circle"><i class="fa fa-plus"></i> Thêm mới</button> --}}
        {{Form::button('Thêm mới',[
          'class'=>'btn green btn-circle',
          'onclick'=>'addBlog()'
        ])}}
    </div>
    <div class="caption uppercase">
        <i class="fa fa-book"></i> {{ trans('news.admin_edit_post') }} </div>
   <div class="row">
    
</div>
</div>

<div class="row">
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                 <th style="text-align: center;">{{trans('news.admin_stt')}}</th>
                  <th style="text-align: center;">{{trans('news.admin_title')}}</th>
                  <th style="text-align: center;">{{trans('news.admin_describe')}}</th>
                  <th style="text-align: center;">{{trans('news.admin_img')}}</th>
                  <th style="text-align: center;">{{trans('news.admin_author')}}</th>
                  <th style="text-align: center;">{{trans('news.admin_createat')}}</th>
                  
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th style="text-align: center;">{{trans('news.admin_stt')}}</th>
                  <th style="text-align: center;">{{trans('news.admin_title')}}</th>
                  <th style="text-align: center;">{{trans('news.admin_describe')}}</th>
                  <th style="text-align: center;">{{trans('news.admin_img')}}</th>
                  <th style="text-align: center;">{{trans('news.admin_author')}}</th>
                  <th style="text-align: center;">{{trans('news.admin_createat')}}</th>
                 
            </tr>
        </tfoot>
        <tbody>
                      
             
        </tbody>
               
        </table>
</div>
</div>


@endsection

@push('scripts')

  <script>
      $(function(){
        $('#example').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{{route('admin.news2.index')}}',
          columns: [
            { data: 'id', name :'id'},
            { data: 'title', name :'title'},
            { data: 'describe', name :'describe'},
            { data: 'content', name :'content'},
            { data: 'user_id', name :'user_id'},
            { data: 'created_at', name :'created_at'},

          ]
        });
      });
  </script>
@endpush
