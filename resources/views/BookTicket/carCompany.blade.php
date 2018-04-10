@extends('layouts.masterTicket')
@section('contents')
<!--End#nav#header-top-->
    <div id="hl">
    <div class="hl-1-transport">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline">
                        <li>
                            <a href="/">Vé xe giá rẻ</a>
                        </li>
                        <li>
                            <a href="/">{{ $car_cpn['name'] }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--End#row-->
        </div>
        <!--End#container-->
    </div>
    <!--End#hl-1-transport-->
    <div class="main-hl-tran">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 hidden-sm hidden-xs col-xs-12 left-colunm">
                    <h1 class="mt0 hidden-xs hidden-sm operator-name">
                        <b>{{ $car_cpn['name'] }}</b>
                        <div class="stars">
                            <select class="example">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                            </select>
                        </div>

                    </h1>
                    <table class="table table-bordered table-rate">
                        <tbody>
                            <tr>
                                <td class="text-center">
                                @if ($car_cpn->rating->count == 0)
                                <h5><b>0</b> </h5>
                                    <p id="lnk-view-rating">
                                        <a class="text-black" href="#">
                                            <small class="review-description">0 Đánh giá</small>
                                        </a>
                                    </p>
                                @else
                                    <h5><b>{{round(($car_cpn->rating->overall+$car_cpn->rating->quality+$car_cpn->rating->intime+$car_cpn->rating->service)/($car_cpn->rating->count*4),1)}}</b> </h5>
                                    <p id="lnk-view-rating">
                                        <a class="text-black" href="#">
                                            <small class="review-description">{{$car_cpn->rating->count}} Đánh giá</small>
                                        </a>
                                    </p>
                                @endif
                                </td>
                                <td class="text-center bg-gray">
                                @if ($car_cpn->rating->count == 0)
                                    <h5><b>0</b></h5>
                                @else
                                    <h5><b>{{round($car_cpn->rating->quality/$car_cpn->rating->count,1)}}</b></h5>
                                @endif
                                    <p><small class="review-description">Chất lượng xe</small></p>
                                </td>
                                <td class="text-center bg-gray">
                                @if ($car_cpn->rating->count == 0)
                                    <h5><b>0</b></h5>
                                @else
                                    <h5><b>{{round($car_cpn->rating->intime/$car_cpn->rating->count,1)}}</b></h5>
                                @endif
                                    <p><small class="review-description">Đúng giờ</small></p>
                                </td>
                                <td class="text-center bg-gray">
                                @if ($car_cpn->rating->count == 0)
                                    <h5><b>0</b></h5>
                                @else
                                    <h5><b>{{round($car_cpn->rating->service/$car_cpn->rating->count,1)}}</b></h5>
                                @endif
                                    <p><small class="review-description">Phục vụ</small></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p style="margin-top:20px;"><small class="pt10" style="font-size: 16px;"><i class="glyphicon glyphicon-map-marker"></i><b>Trụ sở:</b>{{ $car_cpn['address'] }}</small></p>
                    <div>
                        <div style="padding-left: 0px">
                            <div class="jcarousel-main1">
                            <div class="jcarousel-wrapper">
                                <div class="jcarousel">
                                    <ul>
                                    @foreach ($data as $key => $list)

                                        <li><img src="{{ URL::asset( $list->url ) }}"></li>
                                    @endforeach
                                    </ul>
                                </div>
                                <a href="#" class="jcarousel-control-prev inactive" data-jcarouselcontrol="true" style=" text-decoration: none;"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                                <a href="#" class="jcarousel-control-next" data-jcarouselcontrol="true" style="text-decoration: none;">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                            </div>
                              </div>
                            <h2 style="margin-top:20px;margin-bottom:0"><small class="pt10" style="font-size: 16px;"><b>{{ $car_cpn['name'] }}:</b></small></h2>
                            <div class="readmore" data-readmore="" aria-expanded="false">
                                <p style="font-size:14px">{!! $car_cpn['infomation'] !!}</p>
                          
                            </div>
                            <!--End#readmore-->
                            
                      
                    </div>
                    </div>
                </div>
                <!--End#left-colunm-->

                <div class="col-md-8 bus-des col-xs-12 col-sm-12 right-colunm">
                    <div class="row">
                        <div class="col-md-12 home-search-ticket-panel">
                            <div class="row">
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <h2 class="text-vxr-ads">
                                    Đặt vé: 
                                </h2>
                                </div>
                            </div>
                            <!--End#row-->
                            <form class="searchForm col-md-12" action="{{route('ticket.store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            {{Form::token()}}
                                <div class="row">
                                    <div class="location-select-row form-inline col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group searchLeft col-md-5 col-sm-12 col-xs-12">
                                        <label class="control-label">Từ</label>
                                        <br>
                                           <select class="selectpicker " id="departPlace" name="departPlace" title="Chọn điểm đi..." data-live-search="true" tabindex="-98">
                                              <option disabled selected></option>
                                              @if(count($place)!=0)
                                                  @foreach($place as $db_place)
                                                  <option value="{{$db_place->name}}" data-tokens="{{$db_place->name}}" >{{$db_place->name }} </option>
                                                  @endforeach
                                               @endif
                                              @if(count($place)==0)
                                              <option value=""><em>(Chưa có địa chỉ nào)</em></option>
                                             @endif
                                           </select>
                                           <span class="help-block"></span>  
                                          @if($errors->has('departPlace'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{$errors->first('departPlace')}}</strong>
                                        </span>   
                                    @endif
                                        </div>
                                        <div class="form-group switchButton-container hidden-xs hidden-sm col-md-2">
                                            <a href="#" class="switchButton-1 bold">
                                                <img class="switch-icon" src="{{ url('images/vexe/icon-way.JPG') }}">
                                            </a>
                                        </div>
                                        <div class="form-group searchRight col-md-5 col-sm-12 col-xs-12">
                                           <label class="control-label">Đến</label>
                                        <br>
                                           <select class="selectpicker " id="destination" name="destination" title="Chọn điểm đến..." data-live-search="true" tabindex="-98">
                                              <option disabled selected></option>
                                              @if(count($place)!=0)
                                                  @foreach($place as $db_place)
                                                  <option value="{{$db_place->name}}" data-tokens="{{$db_place->name}}" >{{$db_place->name }} </option>
                                                  @endforeach
                                               @endif
                                              @if(count($place)==0)
                                              <option value=""><em>(Chưa có địa chỉ nào)</em></option>
                                             @endif
                                           </select>
                                           <span class="help-block"></span>
                                            @if($errors->has('destination'))
                                                <span class="help-block">
                                                    <strong style="color: red;">{{$errors->first('destination')}}</strong>
                                                </span>   
                                            @endif
                                        </div>
                                    </div>
                                    <!--Endlocation-select-row-->
                                    <div class="date-select-row col-md-12 col-xs-12 form-inline">
                                        <div class="form-group col-md-5 col-sm-12 col-xs-12  pl0 select-date-container">
                                        
                                            <div class="panel-input-date departDate selectDate ">
                                                <input id="departDate" readonly="" name="date_start" type="text" class="input-txt date hasDatepicker" placeholder="Chọn ngày đi" accesskey="3" tabindex="3" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <!--End#date-select-row-->
                                    <div class="form-inline col-md-6 col-md-offset-6 col-xs-12 clearfix search-submit-container">
                                        <button id="searchSubmit" type="submit" class="submit-btn search-btn fr uppercase" tabindex="6">
                                            Tìm Vé Xe Rẻ
                                        </button>
                                    </div>
                                    <!--End#search-submit-container-->
                                </div>
                                <!--End#row-->
                            </form>
                        </div>
                        <!--End#home-search-ticket-panel-->
                    </div>
                    <!--End#row-->
                    <div class="row" style="margin-top: 26px;">
                        <div class="route-search-panel padd-bus-tab">
                            <div class="tab-bus-route">
                              <div class="padd-bus-tab">
                                <h2 class="text-center h2-text col-txt" style="margin-bottom: 20px;text-align: left;">
                                <span>{{ $data_configView['content-itinerary'] }}</span>
                                <!-- <MARQUEE SCROLLDELAY=10 class="text-run"><b>Cần Thơ</b></MARQUEE>
                                <MARQUEE SCROLLDELAY=20 class="text-run"><b>Hà Nội</b></MARQUEE>
                                <MARQUEE SCROLLDELAY=70 class="text-run"><b>Hồ Chí Minh</b></MARQUEE>
                                <MARQUEE SCROLLDELAY=80 class="text-run">Nam Định</MARQUEE> -->
                                </h2>
                                <div class="clearfix" style="height: 44px">
                                  <ul class="nav nav-tabs clearfix" role="tablist">
                                    <li id="lisaigon" role="presentation" class="active"><a href="#saigon" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="false">HÀ NỘI</a></li>
                                    <li id="lihanoi" role="presentation" class=""><a href="#hanoi" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="true">ĐÀ NẴNG</a></li>
                                    <li id="lidanang" role="presentation" class=""><a href="#danang" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false">SÀI GÒN</a></li>
                                    <li id="linhatrang" role="presentation" class=""><a href="#nhatrang" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false">QUẢNG NINH</a></li>
                                    <li id="licantho" role="presentation" class=""><a href="#cantho" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false">NHA TRANG</a></li>
                                  </ul>
                                </div>
                                <div class="tab-content" style="background: white;">
                                  <!--saigon-->
                                  <div role="tabpanel" class="tab-pane active in" id="saigon">
                                    <div class="clearfix">
                                     <div class="col-md-12  pull-left pl0 pr0 padd-nav">
                                        <ul class="routes-list">
                                           @foreach ($hanoi as $key => $listHanoi)
                                            <li>
                                            <a style=" color: #6874ad;" href="Thongtinvexe.html"><span class="route fl"><small>{{ $listHanoi['departPlace'] }} →</small> {{ $listHanoi['destination'] }}</span></a>
                                            <span class="price fl">{{ $listHanoi['ticket_fare'] }} ₫/vé</span>
                                            <input class="input-txt selectDate hasDatepicker" data-departplace= "{{ $listHanoi['departPlace'] }}" type="hidden" data-destination="{{ $listHanoi['destination'] }} " id="dp1496851696961">
                                            <button type="button" class="datepicker mybutton">Chọn ngày</button>
                                          </li>
                                          @endforeach
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                  <!--hanoi-->
                                  <div role="tabpanel" class="tab-pane " id="hanoi">
                                    <div class="clearfix">
                                      <div class="col-md-12  pull-left pl0 pr0 padd-nav">
                                        <ul class="routes-list">
                                          
                                          @foreach ($danang as $key => $listDanang)
                                            <li>
                                            <a style=" color: #6874ad;" href="Thongtinvexe.html"><span class="route fl"><small>{{ $listDanang['departPlace'] }} →</small> {{ $listDanang['destination'] }}</span></a>
                                            <span class="price fl">{{ $listDanang['ticket_fare'] }} ₫/vé</span>
                                            <input class="input-txt selectDate hasDatepicker" data-departplace= "{{ $listDanang['departPlace'] }}" type="hidden" data-destination="{{ $listDanang['destination'] }} " id="dp1496851696961">
                                            <button type="button" class="datepicker mybutton" >Chọn ngày</button>
                                          </li>
                                          @endforeach
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                  <div role="tabpanel" class="tab-pane " id="danang">
                                   <div class="clearfix">
                                     <div class="col-md-12  pull-left pl0 pr0 padd-nav">
                                        <ul class="routes-list">
                                        @foreach ($saigon as $key => $listSaigon)
                                            <li>
                                            <a style=" color: #6874ad;" href="Thongtinvexe.html"><span class="route fl"><small>{{ $listSaigon['departPlace'] }} →</small> {{ $listSaigon['destination'] }}</span></a>
                                            <span class="price fl">{{ $listSaigon['ticket_fare'] }} ₫/vé</span>
                                            <input class="input-txt selectDate hasDatepicker" data-departplace= "{{ $listSaigon['departPlace'] }}" type="hidden" data-destination="{{ $listSaigon['destination'] }} " id="dp1496851696961">
                                            <button type="button" class="datepicker mybutton" >Chọn ngày</button>
                                          </li>
                                          @endforeach
                                        
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                  <!--Nhatrang-->
                                  <div role="tabpanel" class="tab-pane " id="nhatrang">
                                    <div class="clearfix">
                                      <div class="col-md-12  pull-left pl0 pr0 padd-nav">
                                        <ul class="routes-list">
                                        @foreach ($quangninh as $key => $listQuangninh)
                                            <li>
                                            <a style=" color: #6874ad;" href="Thongtinvexe.html"><span class="route fl"><small>{{ $listQuangninh['departPlace'] }} →</small> {{ $listQuangninh['destination'] }}</span></a>
                                            <span class="price fl">{{ $listQuangninh['ticket_fare'] }} ₫/vé</span>
                                            <input class="input-txt selectDate hasDatepicker" data-departplace= "{{ $listQuangninh['departPlace'] }}" type="hidden" data-destination="{{ $listQuangninh['destination'] }} " id="dp1496851696961">
                                            <button type="button" class="datepicker mybutton" >Chọn ngày</button>
                                          </li>
                                          @endforeach

                                        </ul>
                                      </div>
                                    
                                    </div>
                                  </div>
                                  <!--cantho-->
                                  <div role="tabpanel" class="tab-pane " id="cantho">
                                    <div class="clearfix">
                                      <div class="col-md-12  pull-left pl0 pr0 padd-nav">
                                        <ul class="routes-list">
                                        @foreach ($nhatrang as $key => $listNhaTrang)
                                            <li>
                                            <a style=" color: #6874ad;" href="Thongtinvexe.html"><span class="route fl"><small>{{ $listNhaTrang['departPlace'] }} →</small> {{ $listNhaTrang['destination'] }}</span></a>
                                            <span class="price fl">{{ $listNhaTrang['ticket_fare'] }} ₫/vé</span>
                                            <input class="input-txt selectDate hasDatepicker" data-departplace= "{{ $listNhaTrang['departPlace'] }}" type="hidden" data-destination="{{ $listNhaTrang['destination'] }} " id="dp1496851696961">
                                            <button type="button" class="datepicker mybutton" >Chọn ngày</button>
                                          </li>
                                          @endforeach
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
                <!--End#right-colunm-->
            </div>
            <!--End#row-->
        </div>
        <!--End#container-->
    </div>
    <!--End#main-hl-tran-->
    <div class="skyline-wrapper">
        <div class="container hidden-xs hidden-sm">
            <div class="intro-vxr-bus">
                <h4 class="mt20 mb10">VeXeRe là hệ thống bán vé xe giá rẻ lớn nhất và uy tín nhất tại Việt Nam</h4>
                <p>Với hơn 2000 nhà xe và 5000 tuyến đường, VeXeRe.com là đại lý vé xe duy nhất tại Việt Nam hỗ trợ hơn 1.5 triệu lượt tìm kiếm và đặt vé mỗi tháng. Quý khách có thể lựa chọn nhà xe và vị trí ghế ngồi của mình vô cùng dễ dàng, thanh toán vé trực tuyến an toàn và nhận vé ngay thông qua Email. Hãy đặt vé tại VeXeRe.com ngay hôm nay và tận hưởng một chuyến du lịch với nhiều kỉ niệm đáng nhớ...</p>
            </div>
            <!--End#intro-vrx-bus-->
        </div>
        <div class="bus-img">
            <img src="{{ url('images/vexe/xechay.jpg') }}" class="img-responsive">
        </div>
        <!--End#bus-img-->
    </div>
    <!--End#skyline-wrapper-->
</div> <!--End#hl-->
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
        var date_back ='';
        date_start = moment(date_start).format('DD/MM/YYYY');
        // console.log(ev);return;
        //console.log(departplace, destination, date_start);
          $('#mybutton').datepicker('hide');

          var form = $(document.createElement('form'));
          $(form).attr("action", "/list");
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

          var input = $("<input>")
              .attr("type", "hidden")
              .attr("name", "date_back")
              .val( date_back );
          $(form).append($(input));
          form.appendTo( document.body )
          $(form).submit();
      });
  });
</script>
@endsection