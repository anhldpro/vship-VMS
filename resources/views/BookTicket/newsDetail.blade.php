@extends('layouts.masterTicket')
<style>
    .news-time {
    border-bottom: 1px solid #d5d5d5;
    background: #E8E9EB;
    padding: 5px 10px;
    margin-bottom: 15px;
}
.news-detail-tt {
    font-size: 33px;
    font-weight: bold;
    color: #1867aa;
}
</style>
@section('contents')  
<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="main-detail-news">
        <div class="container">
            <div class="row">
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="title-detail-news">
                <div style="padding: 5px 10px;margin-bottom: 15px;">
                </div>
                     <!--End#news-time-->
                    <h1 class="news-detail-tt">{{ $data['title'] }}</h1>
                    {{-- <div class="news-time">
                         <span class="date-time fl-l">{{ $data->created_at->diffForHumans() }}</span>
                    </div> --}}
                </div> <!--End#title-detail-news-->
                <div class="content-detail-news">
                 <div class="introduce">
                {!! $data['describe'] !!}
                </div> <!--End#introduce-->
                <br><br>
            <div class="article-detail">
                <p>{!! $data['content'] !!}</p>
             
            </div> <!--End#article-detail-->
            </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3 tintucrow">
            <div class="list-ds">
            <div class="row tintuc_left">
            <div class="col-xs-12">
            <h4 class="tintucList" >{{ trans('news.news_list')}}</h4>
            </div>
            </div>
            @foreach($datas as $list)
            <ol>
                <li>
                <div class="row">
                <div class="col-xs-5 col-md-5 col-sm-5">
                <a href="{{route('news.show',$list->slug)}}"><img src="{{ URL::asset( $list->images ) }}" class="img-responsive" style="width: 100%; height: 80px;"></a>
                </div>
                <div class="col-xs-7 col-md-7 col-sm-7">
                <a style="color: black;  font-size: 14px;line-height: 18px;" href="{{route('news.show',$list->slug)}}">{{ $list->title }}</a>
                    
                </div>
                </div>
                </li>
            </ol>
            @endforeach     
            </div>
            </div>
        </div> <!--End#content-detail-news-->
        <div class="news-footer">
           <a  href="{{ route('news.index')}}"> <img src="{{ url('images/vexe/back.jpg')}}"></a>
            <a style="color: #6874ad;" class="back-news" href="{{ route('news.index')}}">{{ trans('news.back')}}</a>
        </div>  

        </div> <!--End#container-->
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