@extends('layouts.admin.master')
 
@section('contents')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>QUẢN LÝ QUYỀN</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('role-create')
	            <a class="btn green btn-circle" href="{{ route('roles.create') }}"> Thêm mới</a>
	            @endpermission
	        </div>
	    </div>
	</div>
	<div class="portlet-body">
    	<div class="table-scrollable">
			<table class="table table-striped table-bordered table-hover" id="sample_1">
				<thead>
					<tr>
						<th>STT</th>
						<th>Tên quyền</th>
						<th>Mô Tả</th>
						<th width="280px">Chức năng</th>
					</tr>
				</thead>
			@foreach ($roles as $key => $role)
			<tr>
				<td>{{ ++$i }}</td>
				<td>{{ $role->display_name }}</td>
				<td>{{ $role->description }}</td>
				<td>
					<a class="btn btn-outline btn-circle btn-sm blue" href="{{ route('roles.show',$role->id) }}">Chi tiết</a>
					@permission('role-edit')
					<a class="btn btn-outline btn-circle green btn-sm purple" href="{{ route('roles.edit',$role->id) }}">Sửa</a>
					@endpermission
					@permission('role-delete')
					{!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
		            {!! Form::submit('Xóa', ['class' => 'btn btn-outline btn-circle dark btn-sm red']) !!}
		        	{!! Form::close() !!}
		        	@endpermission
				</td>
			</tr>
			@endforeach
			</table>
		</div>
	</div>			
	{!! $roles->render() !!}
@endsection