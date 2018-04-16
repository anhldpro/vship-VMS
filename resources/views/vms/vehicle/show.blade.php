@extends('layouts.admin.master')
@section('head')

@stop
@section('contents')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption uppercase">
                <i class="fa fa-book"></i> Chi tiết xe
            </div>

        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <div class="container-fluid">
                    <div class="row" data-pg-collapsed>
                        <div class="panel">
                            <div class="panel-body">
                                <div class="col-md-2">
                                    <img src="{{url($vehicle->avatar)}}" width="300" height="300" class="img-responsive img-rounded text-justify" />
                                </div>
                                <div class="col-md-10">
                                    <h3>{{$vehicle->vehType->name}}</h3>
                                    <h4>Tải trọng: {{$vehicle->veh_capacity}}</h4>
                                    <p>{{$vehicle->desc}}</p>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <ul class="list-inline">
                                    <li>
                                        <a class="btn btn-primary" href="#"><i class="fa fa-trash-o"></i> Xóa</a>
                                    </li>
                                    <li>
                                        <a class="btn btn-primary" href="#"><i class="fa fa-edit"></i> Sửa</a>
                                    </li>
                                    <li>
                                        <a class="btn btn-primary" href="{{route('vms.road.create', ['id'=> $vehicle->id])}}"><i class="fa fa-plus-circle"></i> Thêm lịch
                                            trình</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    @foreach($roads as $item)
                    <div class="row pg-empty-placeholder">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="container-fluid">
                                    <div class="col-md-6">
                                        <ul class="list-unstyled">
                                            <li>
                                                <span class="glyphicon glyphicon-map-marker"></span>
                                                <span>Điểm đi: </span>
                                                <span>{{$item->from_name}}</span>
                                            </li>
                                            <li>
                                                <span class="glyphicon glyphicon-map-marker"></span>
                                                <span>Điểm đến: </span>
                                                <span>{{$item->to_name}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('vms.road.show', ['id'=>$item->id])}}" class="btn btn-primary pull-right">Chi tiết</a>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="clearfix clear-columns"></div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="container-fluid">
                                            <div class="col-md-3" data-pg-collapsed>
                                                <i class="fa fa-calendar"></i> T2: {{$item->vehSched->mon}}
                                            </div>
                                            <div class="col-md-3">
                                                <i class="fa fa-calendar"></i> T3: {{$item->vehSched->tue}}
                                            </div>
                                            <div class="col-md-3">
                                                <i class="fa fa-calendar"></i> T4: {{$item->vehSched->wed}}
                                            </div>
                                            <div class="col-md-3">
                                                <i class="fa fa-calendar"></i> T5: {{$item->vehSched->thu}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="container-fluid">
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-3 pull-right">
                                                <a style="cursor: pointer" class="pull-right"><i class="fa fa-map-o"></i> Bản đồ</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="container-fluid">
                                            <div class="col-md-3">
                                                <span><i class="fa fa-calendar"></i><span> T6: {{$item->vehSched->fri}}</span></span>
                                            </div>
                                            <div class="col-md-3">
                                                <span ><i class="fa fa-calendar"></i> T7: {{$item->vehSched->sat}}</span>
                                            </div>
                                            <div class="col-md-3">
                                                <span><i class="fa fa-calendar"></i> CN: {{$item->vehSched->sun}}</span>
                                            </div>
                                            <div class="col-md-3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="container-fluid">
                                            <div class="col-md-3">
                                                <a href="{{route('vms.road.destroy', ['id'=> $item->id])}}" class="btn btn-danger btn-sm btn-icon">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                <a href="{{route('vms.road.edit', ['id'=>$item->id])}}" class="btn btn-primary btn-sm btn-icon">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
@endsection