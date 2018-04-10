@extends('layouts.masterTicket')
@section('contents')
<input type="hidden" name="_token" value="{{ csrf_token() }}">
   <div class="header-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 style="color: #6874ad; font-size: 27px;"><strong> {{ trans('news.news_from_vexe')}}</strong></h1>
                </div>
            </div>
            <!--End#row-->
        </div>
        <!--End#container-->
    </div>
    <!--End#header-content-->
<div class="main-content col-md-12">
        <div class="container">
            <div class="row">
                <div class="list-content">
                    <ul class="news-list-content" style=" padding-left: 0px;">
                    @foreach( $data as $key => $list)
                        <li class="news-item-content" style="list-style: none; border-bottom: 1px dashed #d5d5d5; padding-top: 30px; overflow: hidden;">
                        
                            <div class="col-md-2 col-sm-3 img_news" style="width: 166px">
                                <a class="img-content" href="{{route('news.show',$list->slug)}}" title="{{ $list->title }}"> <img style="width: 100%" src="{{ URL::asset( $list->images ) }}" alt="Vexegiare">
                                </a>
                            </div>
                            <div class="col-md-9 col-sm-9 ">
                                <div class="title">
                                    <a class="news-tt" href="{{route('news.show',$list->slug)}}" style="color: #6874ad; text-decoration: none; text-transform: uppercase;font-weight: bold;">{{ $list->title }} </a>
                                    <p> {!! $list->describe !!}</p>
                                </div>
                                <!--End#title-->
                                <p class="share" style="float: left;">
                                    {{ trans('news.share')}}
                                    <a class="social-link share-fb" href="#" title="chia sẻ trên Facebook" style="margin-left: 3px;"> <img src="{{url('images/vexe/icon-fb.png')}}" alt="Vexegiare"> </a>
                                    {{-- <a class="social-link share-gg" href="#" title="chia sẻ trên Google"> <img src=="{{url('images/vexe/icon-google.png')}}" alt="Vexegiare"> </a> --}}
                                    <a class=" social-link share-zing" href="#" title="chia sẻ trên Zing"> <img src="{{url('images/vexe/icon-zing.png')}}" alt="Vexegiare"> </a>
                                </p>
                                <!--End#share-->
                            </div>
                        </li>
                        <!--End#news-item-content-->
                    @endforeach
                    </ul>
                    <!--End#news-list-content-->
                    <div class="page-next" style="float: left;">
                      {{--   {{$data->links()}} --}}
                    </div>
                    <!--End#page-next-->
                </div>
                <!--End#in-content-->
            </div>
            <!--End#row-->
        </div>
        <!---End#container-->
    </div>
    <div class="main-content col-md-12">
        <div class="container">
            <div class="route-search-panel">
    <div class="container">
      <div >
        <h2 class="text-center h2-text col-txt">
        <span>{{ $data_configView['content-itinerary'] }}</span>
        <MARQUEE class="text-run"><b>{{ $data_configView['text-slide'] }}</b></MARQUEE>
        </h2>
        <div class="clearfix" style="height: 44px">
          <ul class="nav nav-tabs clearfix a-link" role="tablist">
            <li id="lihanoi" role="presentation" class="active hanoilink"><a href="#hanoi" class ="" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true">{{trans('vexe.hanoi')}}</a></li>
            <li id="lidanang" role="presentation" class=""><a href="#danang" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false">{{trans('vexe.danang')}}</a></li>
            <li id="lisaigon" role="presentation" class=""><a href="#saigon" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false">{{trans('vexe.saigon')}}</a></li>
            <li id="liquangninh" role="presentation" class=""><a href="#quangninh" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false">{{trans('vexe.quangninh')}}</a></li>
            <li id="linhatrang" role="presentation" class=""><a href="#nhatrang" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false">{{trans('vexe.nhatrang')}}</a></li>
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
                    <a style=" color: #6874ad;"><span class="route fl"><small>{{ $listHanoi['departPlace'] }} →</small> {{ $listHanoi['destination'] }}</span></a>
                    <span class="price fl">{{ $listHanoi['ticket_fare'] }} {{trans('vexe.money_ticket')}}/{{ trans('vexe.ticket')}}</span>
                    <input class="input-txt selectDate hasDatepicker" data-departplace= "{{ $listHanoi['departPlace'] }}" type="hidden" data-destination="{{ $listHanoi['destination'] }} " id="dp1496851696961">
                    <button type="button" class="datepicker mybutton">{{trans('vexe.get_date')}}</button>
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
                    <a style=" color: #6874ad;" ><span class="route fl"><small>{{ $listDanang['departPlace'] }} →</small> {{ $listDanang['destination'] }}</span></a>
                    <span class="price fl">{{ $listDanang['ticket_fare'] }} {{trans('vexe.money_ticket')}}</span>
                    <input class="input-txt selectDate hasDatepicker" data-departplace= "{{ $listDanang['departPlace'] }}" type="hidden" data-destination="{{ $listDanang['destination'] }} " id="dp1496851696961">
                    <button type="button" class="datepicker mybutton" >{{trans('vexe.get_date')}}</button>
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
                    <a style=" color: #6874ad;"><span class="route fl"><small>{{ $listSaigon['departPlace'] }} →</small> {{ $listSaigon['destination'] }}</span></a>
                    <span class="price fl">{{ $listSaigon['ticket_fare'] }} {{trans('vexe.money_ticket')}}</span>
                    <input class="input-txt selectDate hasDatepicker" data-departplace= "{{ $listSaigon['departPlace'] }}" type="hidden" data-destination="{{ $listSaigon['destination'] }} " id="dp1496851696961">
                    <button type="button" class="datepicker mybutton" >{{trans('vexe.get_date')}}</button>
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
                    <a style=" color: #6874ad;"><span class="route fl"><small>{{ $listQuangninh['departPlace'] }} →</small> {{ $listQuangninh['destination'] }}</span></a>
                    <span class="price fl">{{ $listQuangninh['ticket_fare'] }} {{trans('vexe.money_ticket')}}</span>
                    <input class="input-txt selectDate hasDatepicker" data-departplace= "{{ $listQuangninh['departPlace'] }}" type="hidden" data-destination="{{ $listQuangninh['destination'] }} " id="dp1496851696961">
                    <button type="button" class="datepicker mybutton" >{{trans('vexe.get_date')}}</button>
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
                    <a style=" color: #6874ad;"><span class="route fl"><small>{{ $listNhaTrang['departPlace'] }} →</small> {{ $listNhaTrang['destination'] }}</span></a>
                    <span class="price fl">{{ $listNhaTrang['ticket_fare'] }} {{trans('vexe.money_ticket')}}</span>
                    <input class="input-txt selectDate hasDatepicker" data-departplace= "{{ $listNhaTrang['departPlace'] }}" type="hidden" data-destination="{{ $listNhaTrang['destination'] }} " id="dp1496851696961">
                    <button type="button" class="datepicker mybutton" >{{trans('vexe.get_date')}}</button>
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
    </div>
  </div>
@stop
<script>     
     $(document).ready(function(){
        var img_news = $('.img_news img').width();
        $('.img_news img').height( 1.56603773585 * parseInt(img_news));
    });
</script>
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

