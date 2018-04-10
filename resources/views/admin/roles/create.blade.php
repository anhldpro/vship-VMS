@extends('layouts.admin.master')
 
@section('contents')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>THÊM QUYỀN</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-outline green button-pre btn-circle" href="{{ route('roles.index') }}"> Trở lại</a>
	        </div>
	    </div>
	</div>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Lỗi!</strong> Có vấn đề với giá trị nhập vào..<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tên quyền:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Tên quyền','class' => 'form-control')) !!}
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tên hiển thị:</strong>
                {!! Form::text('display_name', null, array('placeholder' => 'Tên hiển thị','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mô tả:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Mô tả','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quyền:</strong>
                <br/>
                @foreach($permission as $value)
                	<label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                	{{ $value->display_name }}</label>
                	<br/>
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn green btn-circle">Lưu</button>
        </div>
	</div>
	{!! Form::close() !!}
@endsection