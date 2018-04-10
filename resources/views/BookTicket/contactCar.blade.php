@extends('layouts.masterTicket')
@section('contents')
<div class="contact-1">
  <div class="container">
    <div class="header-content">
      <div class="row">
        <div class="col-md-12">
          <h1 class="h1-text uppercase">
            <strong>Liên hệ </strong>
          </h1>
        </div>
      </div>
    </div>
    <div id="main">
      <div class="row main-content">
        <div class="col-md-3">
          <div class="lh-quote">
            <div class="tt-lh">
              <h6 class="h6-text">BAN QUAN TRỊ WEBSITE VEXERE.COM</h6>
              <p class="p-text"><i class="fa fa-home"></i>
                <a href="# ">Luu M, Khu B, Tòa nhà Sài Gòn Town, Phuong Hòa Thanh, Quận Tân Phú, TP. Hồ Chí Minh.</a> </p>
              </div>
            </div>
          </div><!--left-->
          <div class="col-md-9 contact-content ">
            <div id="lienhe ">
             <form method="post" id="contact" action="contact"  enctype= "multipart/form-data">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">

               <div class="panel panel-default ">
                 @if(count($errors)>0)
                 <div class="  alert alert-danger ">
                   <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
                @if (Session::has('responseData'))
                @if (Session::get('responseData')['statusCode'] == 1)
                <div class="alert alert-success" style="margin-top:20px">{{ Session::get('responseData')['message'] }}</div>
                @elseif (Session::get('responseData')['statusCode'] == 2)
                <div class="alert alert-danger" style="margin-top:20px" >{{ Session::get('responseData')['message'] }}</div>
                @endif
                @endif
                <div class="panel-heading bold uppercase ">Tên nhà xe</div>
                <div class="panel-body ">
                  <div class="form-horizontal ">
                    <div class="form-group ">
                      <label for="input1 " class="col-sm-3 control-label ">Tên nhà xe</label>
                      <div class="col-sm-6">
                       <select class="form-control" id="sel" name="car_name">
                        @foreach($car_company as $key=>$cc)
                        <option id="{{$key}}" value="{{$cc->id}}" >{{$cc->name}}</option>
                        @endforeach
                      </select>
                      <span class="field-validation-valid " ></span>
                    </div>

                  </div>
                  <div class="form-group ">
                  <label for="input4 " class="col-sm-3 control-label ">Các tuyến đường</label>
                    <div class="col-sm-9">
                      <select multiple class="form-control" id="sel2" name="select">
                       @foreach($car_company as $key=>$cc)
                       <option value="{{$cc->id}}" ></option>
                       @endforeach
                     </select>
                   </div>
                 </div>
               </div>
             </div>
             <div class="panel-heading bold uppercase ">THÔNG TIN NGƯỜI LIÊN HỆ</div>
             <div class="panel-body ">
              <div class="form-horizontal ">
                <div class="form-group ">
                 <label  class="col-sm-3">Họ tên</label>
                 <div class="col-sm-9 ">
                  <input type="text " id="name " name="name "  class="form-control col-sm-6 " >
                </div>
              </div>
              <div class="form-group ">
                <label for="input6 " class="col-sm-3">Ðiện thoại</label>
                <div class="col-sm-9 ">
                  <input type="text " name="phone "  class="form-control " id="phone " value="0">
                  <span class="field-validation-valid " ></span>
                </div>
              </div>
              <div class="form-group ">
                <label for="input7 " class="col-sm-3">Email</label>
                <div class="col-sm-9 ">
                  <input type="text " name="email "  class="form-control " id="email ">
                  <span class="field-validation-valid " ></span>
                </div>
              </div>

              <div class="form-group ">
                <div class="col-sm-offset-3 col-sm-9 ">
                  <button type="button " class="btn btn-default ">Gửi</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="clearfix "></div>
</div>
</div>
@endsection