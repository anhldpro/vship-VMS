@extends('layouts.masterTicket')
@section('contents')
    {{-- <div style="position:  fixed; top:13%; z-index: 999;">
      <span style="font-size:18px;">
        <strong><a href="" style="color: #ff5858; font-size: 25px;"><img alt="" src="http://dangkygrabcar.vn/profiles/dangkygrabcarvn/uploads/attach/14968051551.png" style="height: 70px;width: 70px;display: inline-block;vertical-align: middle;margin-right: 10px;">0902757785</a></strong>
      </span>
    </div> --}}
  <div id="main" class="home-page">
    <div class="container">
      <div class="home-search">
        <div>
          <div class="col-md-8 col-xs-12">
            <div class="search-left">
              <h1>Mua vé xe trực tuyến tiện lợi, không cần chờ đợi</h1>
              <form id="search-form"  action="{{route('ticket.store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
               {{Form::token()}}
                <fieldset>
                  <input type="hidden" id="search-busoperator-id" value="">
                  <input type="hidden" id="search-busoperator-name" value="">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group searchLeft col-md-6">

                      <input type="text" class="form-control input-txt background-1 depart ui-autocomplete-input" id="departPlace" name="departPlace" placeholder="Gõ vào tỉnh đi" autocomplete="off">
                        @if($errors->has('departPlace'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('departPlace')}}</strong>
                                        </span>   
                                    @endif
                    </div>

                    <div class="form-group searchRight col-md-6">

                      <input type="text" class="form-control input-txt background-2 ui-autocomplete-input desti" id="destination" name="destination" placeholder="Gõ vào tỉnh đến" autocomplete="off">
                      @if($errors->has('destination'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('destination')}}</strong>
                                        </span>   
                                    @endif
                    </div>

                  </div>
                  <!--col-12-->
                  {{-- <div class="date-select-row col-md-12 col-xs-12 ">
                    <div class=" col-md-6 select-date-container">

                      <div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
                        <input id="date_start" class="form-control input-txt" readonly="" placeholder="Chọn ngày đi" type="text">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        @if($errors->has('date_start'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('date_start')}}</strong>
                                        </span>   
                                    @endif
                      </div>
                    </div>

                  </div> --}}
                  <div class="date-select-row col-md-12 col-xs-12 ">
                    <div class=" col-md-6 pl0 select-date-container">
                      <div class="panel-input-date">
                        <input id="date_start" readonly="" type="text" name="date_start" class="form-control background-3 input-txt" placeholder="Chọn ngày đi" ccesskey="3" tabindex="3">
                        @if($errors->has('date_start'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('date_start')}}</strong>
                                        </span>   
                                    @endif
                      </div>
                    </div>

                  </div>
                  <div class="form-inline col-md-6 col-md-offset-6 col-xs-12 clearfix search-submit">
                    <button id="searchSubmit" type="submit" class="submit-btn search-btn fr uppercase">
                      Tìm Vé Xe Rẻ
                    </button>
                  </div>
                  </form>
                </fieldset>
              </form>
            </div>
          </div>
          <!--col8-->
          <div class="col-md-4">
            <a href="#"><img src="images/vexe/banner-1.jpg" class="img-responsive"></a>
          </div>
        </div>
        <div class="home-page2">
          <div>
            <div class="col-xs-12">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner" role="listbox">
                  <div class="item">
                    <img src="images/vexe/banner-2.jpg" alt="">
                    <div class="carousel-caption">
                    </div>
                  </div>
                  <div class="item active">
                    <img src="images/vexe/banner-3.jpg" alt="">
                    <div class="carousel-caption">
                    </div>
                  </div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control color-left" href="#carousel-example-generic" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control color-right" href="#carousel-example-generic" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--search-->
    </div>
    <!--container-->
  </div>
  <!--main1-->
  <div class="introduct">
    <div class="container">
      <div >
        <div class="col-xs-12">
          <h2 class="h2-text text-center">VeXeRe.com là hệ thống bán vé xe giá rẻ lớn nhất và uy tín nhất tại Việt Nam</h2>
        </div>
      </div>
    </div>
  </div>
  <!--intro-->
  <div id="number-panel">
    <div class="container">
      <div >
        <div class="col col-md-3 col-sm-3 col-xs-6">
          <p class="num">5.000+</p>
          <p>Tuyến đường</p>
        </div>
        <div class="col col-md-3 col-sm-3 col-xs-6">
          <p class="num">2.000+</p>
          <p>Nhà xe</p>
        </div>
        <div class="col col-md-3 col-sm-3 col-xs-6">
          <p class="num">500.000+</p>
          <p>Vé đã bán</p>
        </div>
        <div class="col col-md-3 col-sm-3 col-xs-6">
          <p class="num">1.000+</p>
          <p>Đại lý bán vé</p>
        </div>
      </div>
    </div>
  </div>
  <div id="about-us-pannel">
    <div class="container">
      <div >
        <div class="col-md-6 col-xs-12">
          <h5 class="h5-text">Tin tức về chúng tôi</h5>

          <div class="jcarousel-wrapper">
            <div class="jcarousel">
              <ul class="slide-ja">
                <li>
                  <a href="#"><img src="images/vexe/bao-fbnc.jpg" alt="Image 1"></a>
                  <a href="#"> <img src="images/vexe/bao-tt.jpg" alt="Image 2"></a>
                </li>
                <li>
                  <a href="#"><img src="images/vexe/bao-zing.jpg" alt="Image 5"></a>
                  <a href="#"><img src="images/vexe/bao-tt.jpg" alt="Image 2"></a>
                </li>
                <li>
                  <a href="#"> <img src="images/vexe/bao-vnexpress.jpg" alt="Image 3"></a>
                  <a href="#"><img src="images/vexe/bao-zing.jpg" alt="Image 5"></a>
                </li>
                <li>
                  <a href="#"> <img src="images/vexe/bao-vnn.jpg" alt="Image 4"></a>
                  <a href="#"><img src="images/vexe/bao-vnexpress.jpg" alt="Image 3"></a>
                </li>
                <li>
                  <a href="#"> <img src="images/vexe/bao-zing.jpg" alt="Image 5"></a>
                  <a href="#"><img src="images/vexe/bao-tt.jpg" alt="Image 2"></a>
                </li>
                <li>
                  <a href="#"> <img src="images/vexe/bao-zing.jpg" alt="Image 5"></a>
                  <a href="#"><img src="images/vexe/bao-tt.jpg" alt="Image 2"></a>
                </li>
                <li>
                  <a href="#"><img src="images/vexe/bao-vnn.jpg" alt="Image 4"></a>
                  <a href="#"><img src="images/vexe/bao-zing.jpg" alt="Image 5"></a>
                </li>
              </ul>
            </div>
            <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
            <a href="#" class="jcarousel-control-next">&rsaquo;</a>
          </div>
        </div>
        <!--col6-->
        <div class="col-md-6 col-xs-12">
          <h5 class="h5-text">Giải thưởng</h5>
          <div class="awards-panel">
            <p><span class="bold">Giải nhất</span> cuộc thi Startup Việt 2016 của báo Vnexpress </p>
            <p><span class="bold">Giải nhất</span> cuộc thi Echelon Ignite Vietnam 2014 </p>
            <p><span class="bold">Giải nhì</span> cuộc thi BSSC Start-up Wheel 2014 </p>
            <p><span class="bold">Giải ba</span> cuộc thi Nhân Tài Đất Việt 2015 </p>
            <p><span class="bold">Giải nhì</span> cuộc thi Mekong Bussiness Challenge 2014 </p>
          </div>
        </div>
      </div>

    </div>
    <div class="skyline hidden-xs hidden-sm">

    <div class="skyline-city">
      <div class="bus-img">

           <MARQUEE direction="right"><img src="images/vexe/bus-vxr.png">  </MARQUEE>

      </div>
    </div>
  </div>
</div>
  <div class="route-search-panel">
    <div class="container">
      <div >
        <h2 class="text-center h2-text col-txt">
        <span>Đặt vé xe khách các tuyến đường</span>
        <MARQUEE class="text-run"><b>Nha Trang - Hà Nội - Hồ Chí Minh</b></MARQUEE>
        <!-- <MARQUEE SCROLLDELAY=10 class="text-run"><b>Cần Thơ</b></MARQUEE>
        <MARQUEE SCROLLDELAY=20 class="text-run"><b>Hà Nội</b></MARQUEE>
        <MARQUEE SCROLLDELAY=70 class="text-run"><b>Hồ Chí Minh</b></MARQUEE>
        <MARQUEE SCROLLDELAY=80 class="text-run">Nam Định</MARQUEE> -->
        </h2>
        <div class="clearfix">
          <ul class="nav nav-tabs clearfix" role="tablist">
            <li id="lisaigon" role="presentation" class="active"><a href="#saigon" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="false">SÀI GÒN</a></li>
            <li id="lihanoi" role="presentation" class=""><a href="#hanoi" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="true">HÀ NỘI</a></li>
            <li id="lidanang" role="presentation" class=""><a href="#danang" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false">ĐÀ NẴNG</a></li>
            <li id="linhatrang" role="presentation" class=""><a href="#nhatrang" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false">NHA TRANG</a></li>
            <li id="licantho" role="presentation" class=""><a href="#cantho" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false">CẦN THƠ</a></li>
          </ul>
        </div>
        <div class="tab-content">
          <!--saigon-->
          <div role="tabpanel" class="tab-pane fade active in" id="saigon">
            <div class="clearfix">
             <div class="col-md-12  pull-left pl0 pr0 padd-nav">
                <ul class="routes-list">
                @foreach ($saigon as $key => $listSaigon)
                    <li>
                    <a href="Thongtinvexe.html"><span class="route fl"><small>{{ $listSaigon['departPlace'] }} →</small> {{ $listSaigon['destination'] }}</span></a>
                    <span class="price fl">{{ $listSaigon['ticket_fare'] }} ₫/vé</span>
                    <input class="input-txt selectDate hasDatepicker" data-departplace= "{{ $listSaigon['departPlace'] }}" type="hidden" data-destination="{{ $listSaigon['destination'] }} " id="dp1496851696961">
                    <button type="button" class="datepicker mybutton" >Chọn ngày</button>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <!--hanoi-->
          <div role="tabpanel" class="tab-pane fade " id="hanoi">
            <div class="clearfix">
              <div class="col-md-12  pull-left pl0 pr0 padd-nav">
                <ul class="routes-list">
                     @foreach ($hanoi as $key => $listHanoi)
                    <li>
                    <a href="Thongtinvexe.html"><span class="route fl"><small>{{ $listHanoi['departPlace'] }} →</small> {{ $listHanoi['destination'] }}</span></a>
                    <span class="price fl">{{ $listHanoi['ticket_fare'] }} ₫/vé</span>
                    <input class="input-txt selectDate hasDatepicker" data-departplace= "{{ $listHanoi['departPlace'] }}" type="hidden" data-destination="{{ $listHanoi['destination'] }} " id="dp1496851696961">
                    <button type="button" class="datepicker mybutton">Chọn ngày</button>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="danang">
           <div class="clearfix">
             <div class="col-md-12  pull-left pl0 pr0 padd-nav">
                <ul class="routes-list">
                @foreach ($danang as $key => $listDanang)
                    <li>
                    <a href="Thongtinvexe.html"><span class="route fl"><small>{{ $listDanang['departPlace'] }} →</small> {{ $listDanang['destination'] }}</span></a>
                    <span class="price fl">{{ $listDanang['ticket_fare'] }} ₫/vé</span>
                    <input class="input-txt selectDate hasDatepicker" data-departplace= "{{ $listDanang['departPlace'] }}" type="hidden" data-destination="{{ $listDanang['destination'] }} " id="dp1496851696961">
                    <button type="button" class="datepicker mybutton" >Chọn ngày</button>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <!--Nhatrang-->
          <div role="tabpanel" class="tab-pane fade" id="nhatrang">
            <div class="clearfix">
              <div class="col-md-6  pl0 pr0">
                <ul class="routes-list">
                  <li>
                    <a href="#"><span class="route fl"><small>Nha Trang →</small> Sài Gòn</span></a>
                    <span class="price fl">179.000 ₫/vé</span>
                    <input class="input-txt selectDate hasDatepicker" type="hidden" data-url="/vi-VN/ve-xe-khach-tu-nha-trang-khanh-hoa-di-sai-gon" data-param="2359t1291.html" id="dp1496851696991">
                    <button type="button" class="datepicker">Chọn ngày</button>
                  </li>
                  <li>
                    <a href="#"><span class="route fl"><small>Nha Trang →</small> Cần Thơ</span></a>
                    <span class="price fl">260.000 ₫/vé</span>
                    <input class="input-txt selectDate hasDatepicker" type="hidden" data-url="/vi-VN/ve-xe-khach-tu-nha-trang-khanh-hoa-di-can-tho" data-param="2359t1131.html" id="dp1496851696992">
                    <button type="button" class="datepicker">Chọn ngày</button>
                  </li>
                  <li>
                    <a href="#"><span class="route fl"><small>Nha Trang →</small> Kon Tum</span></a>
                    <span class="price fl">190.000 ₫/vé</span>
                    <input class="input-txt selectDate hasDatepicker" type="hidden" data-url="/vi-VN/ve-xe-khach-tu-nha-trang-khanh-hoa-di-kon-tum" data-param="2359t1341.html" id="dp1496851696993">
                    <button type="button" class="datepicker">Chọn ngày</button>
                  </li>
                  <li>
                    <a href="#"><span class="route fl"><small>Nha Trang →</small> Đà Lạt</span></a>
                    <span class="price fl">109.000 ₫/vé</span>
                    <input class="input-txt selectDate hasDatepicker" type="hidden" data-url="/vi-VN/ve-xe-khach-tu-nha-trang-khanh-hoa-di-da-lat-lam-dong" data-param="2359t23991.html" id="dp1496851696994">
                    <button type="button" class="datepicker">Chọn ngày</button>
                  </li>
                  <li>
                    <a href="#"><span class="route fl"><small>Nha Trang →</small> Đà Nẵng</span></a>
                    <span class="price fl">235.000 ₫/vé</span>
                    <input class="input-txt selectDate hasDatepicker" type="hidden" data-url="/vi-VN/ve-xe-khach-tu-nha-trang-khanh-hoa-di-da-nang" data-param="2359t1151.html" id="dp1496851696995">
                    <button type="button" class="datepicker">Chọn ngày</button>
                  </li>
                </ul>
              </div>
              <div class="col-md-6 pl0 pr0">
                <ul class="routes-list">
                  <li>
                    <a href="#"><span class="route fl"><small>Nha Trang →</small> Gia Lai</span></a>
                    <span class="price fl">190.000 ₫/vé</span>
                    <input class="input-txt selectDate hasDatepicker" type="hidden" data-url="/vi-VN/ve-xe-khach-tu-nha-trang-khanh-hoa-di-gia-lai" data-param="2359t1211.html" id="dp1496851696996">
                    <button type="button" class="datepicker">Chọn ngày</button>
                  </li>
                  <li>
                    <a href="#"><span class="route fl"><small>Nha Trang →</small> Vũng Tàu</span></a>
                    <span class="price fl">210.000 ₫/vé</span>
                    <input class="input-txt selectDate hasDatepicker" type="hidden" data-url="/vi-VN/ve-xe-khach-tu-nha-trang-khanh-hoa-di-vung-tau-ba-ria-vung-tau" data-param="2359t2131.html" id="dp1496851696997">
                    <button type="button" class="datepicker">Chọn ngày</button>
                  </li>
                  <li>
                    <a href="#"><span class="route fl"><small>Nha Trang →</small> Phú Yên</span></a>
                    <span class="price fl">70.000 ₫/vé</span>
                    <input class="input-txt selectDate hasDatepicker" type="hidden" data-url="/vi-VN/ve-xe-khach-tu-nha-trang-khanh-hoa-di-phu-yen" data-param="2359t1451.html" id="dp1496851696998">
                    <button type="button" class="datepicker">Chọn ngày</button>
                  </li>
                  <li>
                    <a href="#"><span class="route fl"><small>Nha Trang →</small> Phan Thiết</span></a>
                    <span class="price fl">179.000 ₫/vé</span>
                    <input class="input-txt selectDate hasDatepicker" type="hidden" data-url="/vi-VN/ve-xe-khach-tu-nha-trang-khanh-hoa-di-phan-thiet-binh-thuan" data-param="2359t2961.html" id="dp1496851696999">
                    <button type="button" class="datepicker">Chọn ngày</button>
                  </li>
                  <li>
                    <a href="#"><span class="route fl"><small>Nha Trang →</small> Quy Nhơn</span></a>
                    <span class="price fl">110.000 ₫/vé</span>
                    <input class="input-txt selectDate hasDatepicker" type="hidden" data-url="/vi-VN/ve-xe-khach-tu-nha-trang-khanh-hoa-di-qui-nhon-binh-dinh" data-param="2359t2681.html" id="dp1496851697000">
                    <button type="button" class="datepicker">Chọn ngày</button>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!--cantho-->
          <div role="tabpanel" class="tab-pane fade" id="cantho">
            <div class="clearfix">
              <div class="col-md-6  pl0 pr0">
                <ul class="routes-list">
                  <li>
                    <a href="#"><span class="route fl"><small>Cần Thơ →</small> Sài Gòn</span></a>
                    <span class="price fl">90.000 ₫/vé</span>
                    <input class="input-txt selectDate hasDatepicker" type="hidden" data-url="/vi-VN/ve-xe-khach-tu-can-tho-di-sai-gon" data-param="113t1291.html" id="dp1496851697001">
                    <button type="button" class="datepicker">Chọn ngày</button>
                  </li>
                  <li>
                    <a href="#"><span class="route fl"><small>Cần Thơ →</small> Nha Trang</span></a>
                    <span class="price fl">260.000 ₫/vé</span>
                    <input class="input-txt selectDate hasDatepicker" type="hidden" data-url="/vi-VN/ve-xe-khach-tu-can-tho-di-nha-trang-khanh-hoa" data-param="113t23591.html" id="dp1496851697002">
                    <button type="button" class="datepicker">Chọn ngày</button>
                  </li>
                  <li>
                    <a href="#"><span class="route fl"><small>Cần Thơ →</small> Cà Mau</span></a>
                    <span class="price fl">120.000 ₫/vé</span>
                    <input class="input-txt selectDate hasDatepicker" type="hidden" data-url="/vi-VN/ve-xe-khach-tu-can-tho-di-ca-mau" data-param="113t1121.html" id="dp1496851697003">
                    <button type="button" class="datepicker">Chọn ngày</button>
                  </li>
                  <li>
                    <a href="#"><span class="route fl"><small>Cần Thơ →</small> Đà Nẵng</span></a>
                    <span class="price fl">630.000 ₫/vé</span>
                    <input class="input-txt selectDate hasDatepicker" type="hidden" data-url="/vi-VN/ve-xe-khach-tu-can-tho-di-da-nang" data-param="113t1151.html" id="dp1496851697004">
                    <button type="button" class="datepicker">Chọn ngày</button>
                  </li>
                  <li>
                    <a href="#"><span class="route fl"><small>Cần Thơ →</small> Đà Lạt</span></a>
                    <span class="price fl">320.000 ₫/vé</span>
                    <input class="input-txt selectDate hasDatepicker" type="hidden" data-url="/vi-VN/ve-xe-khach-tu-can-tho-di-da-lat-lam-dong" data-param="113t23991.html" id="dp1496851697005">
                    <button type="button" class="datepicker">Chọn ngày</button>
                  </li>
                </ul>
              </div>
              <div class="col-md-6 pl0 pr0">
                <ul class="routes-list">
                  <li>
                    <a href="#"><span class="route fl"><small>Cần Thơ →</small> Vũng Tàu</span></a>
                    <span class="price fl">100.000 ₫/vé</span>
                    <input class="input-txt selectDate hasDatepicker" type="hidden" data-url="/vi-VN/ve-xe-khach-tu-can-tho-di-vung-tau-ba-ria-vung-tau" data-param="113t2131.html" id="dp1496851697006">
                    <button type="button" class="datepicker">Chọn ngày</button>
                  </li>
                  <li>
                    <a href="#"><span class="route fl"><small>Cần Thơ →</small> An Giang</span></a>
                    <span class="price fl">50.000 ₫/vé</span>
                    <input class="input-txt selectDate hasDatepicker" type="hidden" data-url="/vi-VN/ve-xe-khach-tu-can-tho-di-an-giang" data-param="113t111.html" id="dp1496851697007">
                    <button type="button" class="datepicker">Chọn ngày</button>
                  </li>
                  <li>
                    <a href="#"><span class="route fl"><small>Cần Thơ →</small> Bến Tre</span></a>
                    <span class="price fl">68.000 ₫/vé</span>
                    <input class="input-txt selectDate hasDatepicker" type="hidden" data-url="/vi-VN/ve-xe-khach-tu-can-tho-di-ben-tre" data-param="113t171.html" id="dp1496851697008">
                    <button type="button" class="datepicker">Chọn ngày</button>
                  </li>
                  <li>
                    <a href="#"><span class="route fl"><small>Cần Thơ →</small> Rạch Giá</span></a>
                    <span class="price fl">110.000 ₫/vé</span>
                    <input class="input-txt selectDate hasDatepicker" type="hidden" data-url="/vi-VN/ve-xe-khach-tu-can-tho-di-rach-gia-kien-giang" data-param="113t23741.html" id="dp1496851697009">
                    <button type="button" class="datepicker">Chọn ngày</button>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--row-->
    </div>
    <!--container-->
  </div>
  <!--chonngay-->
  <div id="bus-network" class="clearfix ">
    <div class="container">
      <div >
        <div class="text-bus clearfix">
          <div class="col-xs-12 col-sm-12 col-md-12 ">
            <h2 class="fl-l h2-text col-txt">Mạng lưới nhà xe</h2>
            <span class="span-text fl-r">Hơn 1000 nhà xe và bến xe khắp Việt Nam</span>
          </div>
        </div>

        <div class="col-xs-12 col-md-12 col-sm-12">
          <div class="slider lazy">
          @foreach( $car_company as $key => $list_car)
            <div class="col-md-4 col-sm-6 col-xs-12">
              <a href="{{ route('car.show',$list_car->id)}} ">
                <div class="slick-overlay">
                  <p class="bt-info">Xem thêm</p>
                  <img src="{{ URL::asset($list_car->avatar) }}" class="img-responsive" alt="{{ $list_car->name}}">
                </div>
              </a>
              <span class="title"><a href="{{ route('car.show',$list_car->id)}}">{{ $list_car->name}} </a></span>
            </div>
          @endforeach
          </div>
        </div>
        </div>
      {{--   <div >
          <div class="text-bus clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 ">
              <h2 class="fl-l h2-text col-txt">Bến xe khách</h2>
              <span class="span-text fl-r">Hàng chục bến xe trải khắp Bắc - Trung - Nam</span>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-ms-12">

          <div class="slider lazy ">

            <div class="col-md-4 col-sm-6 col-xs-12">
              <a href="#">
                <div class="slick-overlay">
                  <p class="bt-info">Xem thêm</p>
                  <img src="images/vexe/1.jpg" class="img-responsive" alt="Hãng xe">
                </div>
              </a>
              <span class="title"><a href="#">Bến Xe Khách Giáp Báp </a></span>
            </div>
            <!--1-->
            <div class="col-md-4 col-sm-6 col-xs-12">
              <a href="#">
                <div class="slick-overlay">
                  <p class="bt-info">Xem thêm</p>
                  <img src="images/vexe/2.png" class="img-responsive" alt="anh1">
                </div>
              </a>
              <span class="title"><a href="#">Bến Xe Khách Miền Đông </a></span>
            </div>
            <!--1-->
            <div class="col-md-4 col-sm-6 col-xs-12">
              <a href="#">
                <div class="slick-overlay">
                  <p class="bt-info">Xem thêm</p>
                  <img src="images/vexe/3.jpg" class="img-responsive" alt="anh1">
                </div>
              </a>
              <span class="title"><a href="#">Bến Xe Khách Mỹ Đình</a></span>
            </div>
            <!--1-->
            <div class="col-md-4 col-sm-6 col-xs-12">
              <a href="#">
                <div class="slick-overlay">
                  <p class="bt-info">Xem thêm</p>
                  <img src="images/vexe/4.png" class="img-responsive" alt="anh1">
                </div>
              </a>
              <span class="title"><a href="#">Bến Xe Khách Trung Tâm Đà Nẵng </a></span>
            </div>
            <!--1-->
            <div class="col-md-4 col-sm-6 col-xs-12">
              <a href="#">
                <div class="slick-overlay">
                  <p class="bt-info">Xem thêm</p>
                  <img src="images/vexe/5.jpg" class="img-responsive" alt="anh1">
                </div>
              </a>
              <span class="title"><a href="#">Bến Xe Khách Gia Lâm</a></span>
            </div>
            <!--1-->
          </div>

        </div> --}}
      </div>
    </div>
    <!--network-->
    <div id="news-panel" class="hidden-sm hidden-xs">
      <div class="container">
        <div >
          <div class="col-md-6">
            <div id="news" class="content-box fl-l">
              <h4 class="h3-tt multilanguage" data-key="tintuc">Tin tức</h4>
              <div class="news-ctn clearfix">
                 @foreach( $news as $key => $listNews)
                <p class="news-tt">
                  <em class="date">{{ $listNews[ 'created_at'] }}</em> - <a style="color:#1867aa!important;" href="{{ route('news.show',$listNews->slug) }}">{{ $listNews['title'] }}</a>
                </p>
                @endforeach
                
              </div>
              <div class="link-ctn clearfix">
                <a class="more fl-r multilanguage" href="{{ route('news.index') }}" data-key="xemthem">Xem thêm</a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <h4 class="h3-tt">Khách hàng nói về chúng tôi</h4>
            <div >
              <div class="col-md-12">
                <p class="p-text">Dịch vụ đặt mua vé xe trực tuyến tại VeXeRe.com thật tuyệt vời, tôi thấy thậm chí đặt chỗ mua vé máy bay còn không được chọn chỗ ngồi như vậy. Bây giờ tôi không còn phải đi lại xếp hàng mua vé tại bến xe nữa, chỉ cần cầm mã vé qua SMS và email là đã có thể lên xe rồi. Cảm ơn VeXeRe.com.</p>
                <div class="text-center posi-text">
                  <hr class="customer-divider">
                  <img class="img-circle customer-avatar" src="images/vexe/Vancakova.jpg">
                  <p>Nguyễn Lan Tường Vy</p>
                  <div class="user">
                    <b class="b-tt">Đánh giá khách hàng về VeXeRe.com</b>
                    <ul class="list-inline pull-left rate-star" data-value="48">
                      <li><i class="glyphicon glyphicon-star text-yellow"></i></li>
                      <li><i class="glyphicon glyphicon-star text-yellow"></i></li>
                      <li><i class="glyphicon glyphicon-star text-yellow"></i></li>
                      <li><i class="glyphicon glyphicon-star text-yellow"></i></li>
                      <li><i class="glyphicon glyphicon-star text-yellow"></i></li>
                    </ul>
                    <b class="b-tt col-text">4.8/597 Đánh giá</b>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@stop
@section('footer')
<script src="{{ asset('js/moment.js') }}"></script>
  <script>

    jQuery(document).ready(function($){
      $('.mybutton')
      .datepicker()
      .on('changeDate', function(ev) {
        var $input = $('input', $(this).parents().eq(0));
        var departplace = $input.data('departplace');
        var destination = $input.data('destination');
        var date_start = ev.timeStamp;
        date_start = moment(date_start).format('DD/MM/YYYY');
        // console.log(ev);return;
        //console.log(departplace, destination, date_start);
          $('#mybutton').datepicker('hide');

          var form = $(document.createElement('form'));
          $(form).attr("action", "/bookTicket/list");
          $(form).attr("method", "POST");

          var input = $("<input>")
              .attr("type", "hidden")
              .attr("name", "_token")
              .val( "{{ csrf_token() }}" );
          $(form).append($(input));

          var input = $("<input>")
              .attr("type", "hidden")
              .attr("name", "departPlace")
              .val( departplace );
          $(form).append($(input));

          var input = $("<input>")
              .attr("type", "hidden")
              .attr("name", "destination")
              .val( destination );
          $(form).append($(input));

          var input = $("<input>")
              .attr("type", "hidden")
              .attr("name", "date_start")
              .val( date_start );
          $(form).append($(input));

          form.appendTo( document.body )
          $(form).submit();
      });
  });
</script>
@endsection