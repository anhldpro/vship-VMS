@extends('layouts.admin.master')
@section('head')

@endsection
@section('contents')
    <div class="container-fluid">
        <div class="panel">
            <div class="panel-heading">
                <h3>Thêm mới xe</h3>
            </div>
            <div class="panel-body">
                <div class="row" data-pg-collapsed>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="formInput481">Loại xe
                                <br>
                            </label>
                            <select id="formInput481" class="form-control" required>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="formInput516">Địa điểm khởi hành (Tỉnh/TP)</label>
                            <select id="formInput516" class="form-control" required>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="formInput424">Sức chứa</label>
                            <input type="text" class="form-control" id="formInput424" placeholder="Placeholder text" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="formInput539">Địa điểm đến (Tỉnh/TP)</label>
                            <select id="formInput539" class="form-control" required>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" data-pg-collapsed>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label" for="formInput745">Mô tả</label>
                            <textarea class="form-control" rows="3" id="formInput745"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row" data-pg-collapsed>
                    <div class="col-md-6 pull-left">
                        <input type="file" class="form-control" placeholder="Placeholder text">
                    </div>
                    <div class="col-md-6 pull-right">
                        <img src="file:///D:/DevTools/Bootstrap/Pinegrow%20Web%20Designer/placeholders/img8.jpg" width="200" />
                    </div>
                </div>
                <br />
                <div class="row" data-pg-collapsed>
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary" type="button">Đăng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
