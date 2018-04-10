@extends('layouts.masterTicket')
@section('contents')
    <section class="main-bg-vn">
        <div class="container">
            <div class="row">
                <div class="col-md-12- col-ms-12 col-xs-12">
                    <div id="hot-line">
                        <i class="fa fa-phone"></i>
                        Hotline {{ $data_configView['hot-line'] }}
                    </div>
                    <div class="teaser">
                        {{ $data_configView['header-slogan'] }}
                        <br>
                        <span>({{ $data_configView['header-place'] }})</span>
                    </div>
                    <div class="htp">
                        <ul class="ribbon-wrap">
                            <li class="ribbon-left"><a href="">Giảm tới <span>30% &nbsp;</span></a></li>
                            <li class="ribbon-right"><a data-toggle="modal" data-target="#static-ad" href="">&nbsp;Mã khuyến mãi: <span>EBVN30</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12 col-xs-12 col-sm-12">
                    <div class="search-box">
                        <div class="tab-content" style="margin-top: 18%">
                            <div class="search-box">
                                <div class="row radio-style">
                                    <div class="col-md-12 col-sm-6" style="margin-left: 26px;margin-top: 23px;">
                                        <label class="radio-inline">
                                            <input class="radio" type="radio" name="fooby" value="1">
                                            {{trans('vexe.one_way')}}
                                        </label>
                                        <label class="radio-inline">
                                            <input checked="" class="radio" type="radio" name="fooby" value="2">
                                            {{trans('vexe.round_trip')}}
                                        </label>
                                    </div>
                                </div>
                                <form id="bus-search-box" action="{{route('ticket.store')}}" method="POST"
                                      enctype="multipart/form-data" autocomplete="off">
                                    {{Form::token()}}
                                    <div class="row" style="padding-right: 3%;padding-left: 3%;">

                                        <div class="col-md-3 col-xs-6">
                                            <div class="form-group has-feedback has-feedback-left">
                                                <label class="control-label">{{trans('vexe.from')}}</label>
                                                <br>
                                                <select class="selectpicker " id="departPlace" name="departPlace"
                                                        title="{{ trans('vexe.title_departPlace')}}"
                                                        data-live-search="true" tabindex="-98">
                                                    <option disabled selected></option>
                                                    @if(count($place)!=0)
                                                        @foreach($place as $db_place)
                                                            <option value="{{$db_place->name}}"
                                                                    data-tokens="{{$db_place->name}}">{{$db_place->name }} </option>
                                                        @endforeach
                                                    @endif
                                                    @if(count($place)==0)
                                                        <option value=""><em>({{trans('vexe.no_address')}})</em>
                                                        </option>
                                                    @endif
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                            @if($errors->has('departPlace'))
                                                <span class="help-block">
                            <strong class="text-danger">{{$errors->first('departPlace')}}</strong>
                        </span>
                                            @endif
                                        </div>


                                        <div class="col-md-3 col-xs-6">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">{{trans('vexe.to')}}</label>
                                                <br>
                                                <select class="selectpicker " id="destination" name="destination"
                                                        title="{{ trans('vexe.title_destination')}}"
                                                        data-live-search="true" tabindex="-98">
                                                    <option disabled selected></option>
                                                    @if(count($place)!=0)
                                                        @foreach($place as $db_place)
                                                            <option value="{{$db_place->name}}"
                                                                    data-tokens="{{$db_place->name}}">{{$db_place->name }} </option>
                                                        @endforeach
                                                    @endif
                                                    @if(count($place)==0)
                                                        <option value=""><em>({{trans('vexe.no_address')}})</em>
                                                        </option>
                                                    @endif
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                            @if($errors->has('destination'))
                                                <span class="help-block">
                            <strong class="text-danger">{{$errors->first('destination')}}</strong>
                        </span>
                                            @endif
                                        </div>

                                        <div class="col-md-2 col-xs-6">
                                            <div class="form-group has-feedback">
                                                <label class="control-label">{{trans('vexe.date_start')}}</label>
                                                <input id="date_start" readonly="" type="text" name="date_start"
                                                       class="form-control background-3 input-txt"
                                                       placeholder="{{ trans('vexe.get_date_start')}}" ccesskey="3"
                                                       tabindex="3">
                                                <i class="glyphicon glyphicon-calendar form-control-feedback"></i>
                                                @if($errors->has('date_start'))
                                                    <span class="help-block" style="margin-top: 12px;">
                            <strong class="text-danger">{{$errors->first('date_start')}}</strong>
                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-xs-6">
                                            <div class="form-group has-feedback" id="form-date-back">
                                                <label class="control-label">{{trans('vexe.date_back')}}</label>
                                                <input id="date_back" readonly="" type="text" name="date_back"
                                                       class="form-control background-3 input-txt"
                                                       placeholder="{{ trans('vexe.get_date_back')}}" ccesskey="3"
                                                       tabindex="3">
                                                <i class="glyphicon glyphicon-calendar form-control-feedback"></i>
                                                @if($errors->has('date_back'))
                                                    <span class="help-block">
                            <strong class="text-danger">{{$errors->first('date_back')}}</strong>
                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-6 col-xs-offset-3">
                                            <div class="form-group">
                                                <div class="search-btn">
                                                    <button class="btn btn-orange" type="submit"
                                                            value="Submit">{{trans('vexe.find')}} </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <div class="route-search-panel">
        <div class="container">
            <div>
                <h2 class="text-center h2-text col-txt">
                    <span>{{ $data_configView['content-itinerary'] }}</span>
                    <MARQUEE class="text-run"><b>{{ $data_configView['text-slide'] }}</b></MARQUEE>
                </h2>
                <div class="clearfix" style="height: 44px">
                    <ul class="nav nav-tabs clearfix a-link" role="tablist">
                        <li id="lihanoi" role="presentation" class="active hanoilink"><a href="#hanoi" class=""
                                                                                         aria-controls="home" role="tab"
                                                                                         data-toggle="tab"
                                                                                         aria-expanded="true">{{trans('vexe.hanoi')}}</a>
                        </li>
                        <li id="lidanang" role="presentation" class=""><a href="#danang" aria-controls="profile"
                                                                          role="tab" data-toggle="tab"
                                                                          aria-expanded="false">{{trans('vexe.danang')}}</a>
                        </li>
                        <li id="lisaigon" role="presentation" class=""><a href="#saigon" aria-controls="messages"
                                                                          role="tab" data-toggle="tab"
                                                                          aria-expanded="false">{{trans('vexe.saigon')}}</a>
                        </li>
                        <li id="liquangninh" role="presentation" class=""><a href="#quangninh" aria-controls="settings"
                                                                             role="tab" data-toggle="tab"
                                                                             aria-expanded="false">{{trans('vexe.quangninh')}}</a>
                        </li>
                        <li id="linhatrang" role="presentation" class=""><a href="#nhatrang" aria-controls="settings"
                                                                            role="tab" data-toggle="tab"
                                                                            aria-expanded="false">{{trans('vexe.nhatrang')}}</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" style="background: white;">
                    <!--saigon-->
                    <div role="tabpanel" class="tab-pane fade active in" id="hanoi">
                        <div class="clearfix">
                            <div class="col-md-12  pull-left pl0 pr0 padd-nav">
                                <ul class="routes-list">
                                    @foreach ($hanoi as $key => $listHanoi)
                                        <li>
                                            <a style=" color: #6874ad;"><span class="route fl"><small>{{ $listHanoi['departPlace'] }}
                                                        →</small> {{ $listHanoi['destination'] }}</span></a>
                                            <span class="price fl">{{ $listHanoi['ticket_fare'] }} {{trans('vexe.money_ticket')}}
                                                /{{ trans('vexe.ticket')}}</span>
                                            <input class="input-txt selectDate hasDatepicker"
                                                   data-departplace="{{ $listHanoi['departPlace'] }}" type="hidden"
                                                   data-destination="{{ $listHanoi['destination'] }} "
                                                   id="dp1496851696961">
                                            <button type="button"
                                                    class="datepicker mybutton">{{trans('vexe.get_date')}}</button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--hanoi-->
                    <div role="tabpanel" class="tab-pane " id="danang">
                        <div class="clearfix">
                            <div class="col-md-12  pull-left pl0 pr0 padd-nav">
                                <ul class="routes-list">

                                    @foreach ($danang as $key => $listDanang)
                                        <li>
                                            <a style=" color: #6874ad;"><span class="route fl"><small>{{ $listDanang['departPlace'] }}
                                                        →</small> {{ $listDanang['destination'] }}</span></a>
                                            <span class="price fl">{{ $listDanang['ticket_fare'] }} {{trans('vexe.money_ticket')}}</span>
                                            <input class="input-txt selectDate hasDatepicker"
                                                   data-departplace="{{ $listDanang['departPlace'] }}" type="hidden"
                                                   data-destination="{{ $listDanang['destination'] }} "
                                                   id="dp1496851696961">
                                            <button type="button"
                                                    class="datepicker mybutton">{{trans('vexe.get_date')}}</button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane " id="saigon">
                        <div class="clearfix">
                            <div class="col-md-12  pull-left pl0 pr0 padd-nav">
                                <ul class="routes-list">
                                    @foreach ($saigon as $key => $listSaigon)
                                        <li>
                                            <a style=" color: #6874ad;"><span class="route fl"><small>{{ $listSaigon['departPlace'] }}
                                                        →</small> {{ $listSaigon['destination'] }}</span></a>
                                            <span class="price fl">{{ $listSaigon['ticket_fare'] }} {{trans('vexe.money_ticket')}}</span>
                                            <input class="input-txt selectDate hasDatepicker"
                                                   data-departplace="{{ $listSaigon['departPlace'] }}" type="hidden"
                                                   data-destination="{{ $listSaigon['destination'] }} "
                                                   id="dp1496851696961">
                                            <button type="button"
                                                    class="datepicker mybutton">{{trans('vexe.get_date')}}</button>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--Nhatrang-->
                    <div role="tabpanel" class="tab-pane " id="quangninh">
                        <div class="clearfix">
                            <div class="col-md-12  pull-left pl0 pr0 padd-nav">
                                <ul class="routes-list">
                                    @foreach ($quangninh as $key => $listQuangninh)
                                        <li>
                                            <a style=" color: #6874ad;"><span class="route fl"><small>{{ $listQuangninh['departPlace'] }}
                                                        →</small> {{ $listQuangninh['destination'] }}</span></a>
                                            <span class="price fl">{{ $listQuangninh['ticket_fare'] }} {{trans('vexe.money_ticket')}}</span>
                                            <input class="input-txt selectDate hasDatepicker"
                                                   data-departplace="{{ $listQuangninh['departPlace'] }}" type="hidden"
                                                   data-destination="{{ $listQuangninh['destination'] }} "
                                                   id="dp1496851696961">
                                            <button type="button"
                                                    class="datepicker mybutton">{{trans('vexe.get_date')}}</button>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>

                        </div>
                    </div>
                    <!--cantho-->
                    <div role="tabpanel" class="tab-pane " id="nhatrang">
                        <div class="clearfix">
                            <div class="col-md-12  pull-left pl0 pr0 padd-nav">
                                <ul class="routes-list">
                                    @foreach ($nhatrang as $key => $listNhaTrang)
                                        <li>
                                            <a style=" color: #6874ad;"><span class="route fl"><small>{{ $listNhaTrang['departPlace'] }}
                                                        →</small> {{ $listNhaTrang['destination'] }}</span></a>
                                            <span class="price fl">{{ $listNhaTrang['ticket_fare'] }} {{trans('vexe.money_ticket')}}</span>
                                            <input class="input-txt selectDate hasDatepicker"
                                                   data-departplace="{{ $listNhaTrang['departPlace'] }}" type="hidden"
                                                   data-destination="{{ $listNhaTrang['destination'] }} "
                                                   id="dp1496851696961">
                                            <button type="button"
                                                    class="datepicker mybutton">{{trans('vexe.get_date')}}</button>
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
    <!--chonngay-->
    <div id="bus-network" class="clearfix ">
        <div class="container">
            <div>
                <div class="text-bus clearfix">
                    <div class="col-xs-12 col-sm-12 col-md-12 " style="padding-left: 0px;">
                        {!! $data_configView['garage-network'] !!}
                    </div>
                </div>

                <div class="col-xs-12 col-md-12 col-sm-12">
                    <div class="slider lazy">
                        @foreach( $car_company as $key => $list_car)
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <a style="color: #6874ad;" href="{{ route('car.show',$list_car->id)}} ">
                                    <div class="slick-overlay">
                                        <p class="bt-info">{{ trans('vexe.show_more')}}</p>
                                        <img src="{{ URL::asset('images/car/') }}/{{$list_car->avatar}}" class="img-responsive"
                                             alt="{{ $list_car->name}}">
                                    </div>
                                </a>
                                <span class="title"><a href="{{ route('car.show',$list_car->id)}}"
                                                       style="color: #6874ad; font-size: 12px;">{{ $list_car->name}}</a></span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--network-->
    <div id="news-panel" class="hidden-sm hidden-xs">
        <div class="container" style="margin-bottom: 19px;">
            <div>
                <div class="col-md-6">
                    <div id="news" class="content-box fl-l">
                        <h4 class="h3-tt multilanguage" data-key="{{ trans('vexe.news')}}">{{ trans('vexe.news')}}</h4>
                        <div class="news-ctn clearfix">
                            @foreach( $news as $key => $listNews)
                                <p class="news-tt">
                                    <em class="date">{{ $listNews[ 'created_at'] }}</em> - <a
                                            style="color:#6874ad!important;"
                                            href="{{ route('news.show',$listNews->slug) }}">{{ $listNews['title'] }}</a>
                                </p>
                            @endforeach

                        </div>
                        <div class="link-ctn clearfix">
                            <a class="more fl-r multilanguage" href="{{ route('news.index') }}"
                               data-key="xemthem">{{ trans('vexe.show_more')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 class="h3-tt">{{ trans('vexe.customers_talk')}}</h4>
                    <div>
                        <div class="col-md-12">
                            <p class="p-text">{{ trans('vexe.content_ctm_talk')}}</p>
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

        jQuery(document).ready(function ($) {
            $('.mybutton')
                .datepicker()
                .on('changeDate', function (ev) {
                    var $input = $('input', $(this).parents().eq(0));
                    var departplace = $input.data('departplace');
                    var destination = $input.data('destination');
                    var date_start = ev.timeStamp;
                    var date_back = '';
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
                        .val("{{ csrf_token() }}");
                    $(form).append($(input));

                    var input = $("<input>")
                        .attr("type", "hidden")
                        .attr("name", "departPlace")
                        .val(departplace);
                    $(form).append($(input));

                    var input = $("<input>")
                        .attr("type", "hidden")
                        .attr("name", "destination")
                        .val(destination);
                    $(form).append($(input));

                    var input = $("<input>")
                        .attr("type", "hidden")
                        .attr("name", "date_start")
                        .val(date_start);
                    $(form).append($(input));

                    var input = $("<input>")
                        .attr("type", "hidden")
                        .attr("name", "date_back")
                        .val(date_back);
                    $(form).append($(input));
                    form.appendTo(document.body)
                    $(form).submit();
                });
        });
    </script>
    <script type="text/javascript">
        $('input[name=fooby]').change(function () {
            if ($("input[name='fooby']:checked").val() == 1) {
                $('#form-date-back').css('display', 'none');
            } else {
                $('#form-date-back').css('display', 'block');
            }
        });
    </script>
@endsection