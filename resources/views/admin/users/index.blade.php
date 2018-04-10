@extends('layouts.admin.master')
 
@section('contents')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>QUẢN LÝ TÀI KHOẢN</h2>
	        </div>
	        <div class="pull-right">
	        @permission('user-role-create')
	            <a class="btn green btn-circle" href="{{ route('users.create') }}"> Thêm mới</a>
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
					<th>Họ tên</th>
					<th>Email</th>
					<th>Quyền</th>
					<th width="280px">Chức năng</th>
				</tr>
			</thead>
			@foreach ($data as $key => $user)
			<tr>
				<td>{{ ++$i }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>
					@if(!empty($user->roles))
						@foreach($user->roles as $v)
							<label class="label label-success" style="-moz-border-radius: 10px;-webkit-border-radius: 10px;">{{ $v->display_name }}</label>
						@endforeach
					@endif
				</td>
				<td>
					<a class="btn btn-outline btn-circle btn-sm blue" href="{{ route('users.show',$user->id) }}">Chi tiết</a>
					@permission('user-role-edit')
					<a class="btn btn-outline btn-circle green btn-sm purple" href="{{ route('users.edit',$user->id) }}">Sửa</a>
					@endpermission
					@permission('user-role-delete')
					{!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
		            {!! Form::submit('Xóa', ['class' => 'btn btn-outline btn-circle dark btn-sm red']) !!}
		        	{!! Form::close() !!}
		        	@endpermission
				</td>
			</tr>
			@endforeach
			</table>
		</div>
	</div>
	{!! $data->render() !!}
@endsection