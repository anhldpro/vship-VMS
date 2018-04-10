@extends('layouts.masterTicket')
@section('contents')
 <!--  TRANG THONG TIN VE XE -->
  <div id="replaceTable">
  <header id="header">
    <div class="container">
      <div class="row header-row">
        <div class="col-md-12 col-sm-12 col-xs-12 mt10 date-container ">
          <h6 class="mt0 route-title hidden-sm hidden-xs route-title-bus-ticket">
                            <span class="mt0 mb0 text-gray"><a style="color: #6874ad;" href="#">{{ trans('vexe.ticket')}}</a>  &gt; <a style="color: #6874ad;" href="#">{{ trans('vexe.car_start') }}{{ $departPlace }}  đi  {{ $destination }}</a> </span>

                    </h6>
          <input id="routeName" type="hidden" value="Sài Gòn - Hà Nội">
          <h1 class="title-text-route">
                        <span class="hidden-xs hidden-sm">{{ trans('vexe.ticket_start')}}</span>   {{ $departPlace }}  <i class="pl5 pr5 text-gray left-arrow">→</i>  {{ $destination }}
                    </h1>
          <div class="date-picker-nav hidden-md hidden-lg text-center">
            <div class="btn-group btn-group-xs" role="group">
              <button id="btPrevDate" type="button" class="btn btn-default"><img class="img-change-date" src="../images/vexe/icon-previous.png"></button>
              <input type="button" id="span-current-date" value="" tabindex="1" class="btn btn-vxr current-date hasDatepicker">
              <button id="btNextDate" type="button" class="btn btn-default"><img class="img-change-date" src="../images/vexe/icon-next.png"></button>
            </div>
          </div>
          <div class="search-butt pull-left ml10 modify-container hidden-lg hidden-md hidden-sm">
            <a id="btModify" class="text-blue " href="#"></a>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div id="dvSearchTicket" class="ticket-search-filter ">
    <div class="container desktop-route-search hidden-xs">
      <form id="searchForm" name="searchForm" class="form-inline" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="form-group place_viewlist">
          <select class="selectpicker " id="departPlace" name="departPlace" title="{{ trans('vexe.title_departPlace')}}" data-live-search="true" tabindex="-98">
                              <option disabled selected></option>
                              @if(count($place)!=0)
                                  @foreach($place as $db_place)
                                  <option value="{{$db_place->name}}" data-tokens="{{$db_place->name}}" >{{$db_place->name }} </option>
                                  @endforeach
                               @endif
                              @if(count($place)==0)
                              <option value=""><em>({{trans('vexe.no_address')}})</em></option>
                             @endif
                           </select>
        </div>
        <div class="form-group hidden-xs">
          <a href="#" class="switchButton">⇌</a>
        </div>
        <div class="form-group place_viewlist">
          {{--<input id="destination" name="destination" type="text" value="" class="input-txt place ui-autocomplete-input location-search desti" placeholder="Gõ vào tỉnh đến" >--}}
          <select class="selectpicker " id="destination" name="destination" title="{{ trans('vexe.title_destination')}}" data-live-search="true" tabindex="-98">
                              <option disabled selected></option>
                              @if(count($place)!=0)
                                  @foreach($place as $db_place)
                                  <option value="{{$db_place->name}}" data-tokens="{{$db_place->name}}" >{{$db_place->name }} </option>
                                  @endforeach
                               @endif
                              @if(count($place)==0)
                              <option value=""><em>({{trans('vexe.no_address')}})</em></option>
                             @endif
                           </select>
        </div>
        <div class="form-group departDate-fg">
          <input id="date_start" readonly="" name="date_start" type="text" class="input-txt date calendar-search hasDatepicker" placeholder="Chọn ngày đi" accesskey="1" style="height: 34px;margin-top: 2px;">
          <div class="form-group quick-date-select fr hidden-xs hidden-sm">
            <button type="button" class="fl btn btn-gray btn-today" >{{ trans('vexe.today')}}</button>
           {{--  <button type="button" class="fl btn btn-gray btn-tomorrow">
              Ngày mai
            </button> --}}
          </div>
        </div>
        <div class="form-group pull-right center-m" style="margin-top: 8px">
          <button name="searchSubmit" type="submit" class="submit-btn btn" tabindex="4">
            {{ trans('vexe.find_ticket_list')}}
          </button>
        </div>
      </form>
    </div>
    <div class="mobi-display hidden-ms">
    </div>
  </div>
  <div id="dvSearchFilter" class="dvSearchFilter col-12 col-md-12 col-xs-12" style="padding: 0px; margin: 0px; display: block;">
    <div class="container filter-container ">
      <table class="table filter-table table-noborder mb0 ">
        <tbody>
          <tr>
            <td class="pl0 td-bus-operater-filter operater-filter ">
              <a style="color: #6874ad;" href="#" {{-- class="show_hide" --}}> {{ trans('vexe.car_cpm')}} </a>
            </td>
            <td class="hidden-xs ">
              <span class="operater-filter "> <a style="color: #6874ad;" href="#"{{--  class="show_hide" --}}>{{ trans('vexe.date_start')}}</a></span>
              {{-- <i id="departure-time " class="fa fa-sort-desc vt from-time-sort-i "></i> --}}
            </td>
            <td class="hidden-xs operater-filter ">
              <a style="color: #6874ad;" href="# " {{-- class="show_hide" --}}> {{ trans('vexe.time_start')}} </a>
            </td>
            <td class="hidden-xs operater-filter ">
              <a style="color: #6874ad;" href="#" {{-- " class="show_hide" --}}>{{ trans('vexe.departPlace')}} </a>
            </td>
            <td class="hidden-xs operater-filter ">
              <a style="color: #6874ad;" href="# " {{-- class="show_hide" --}}>{{ trans('vexe.destination')}}</a>
            </td>
            <td class="hidden-xs operater-filter ">
              <a style="color: #6874ad;" href="# " {{-- class="show_hide" --}}>{{ trans('vexe.comfortable')}}</a>
            </td>
            <td class="td-rate-filter giave-order ">
              <a style="color: #6874ad;" id="rateFilter " {{-- class="mr10 " --}}>{{ trans('vexe.notable')}}</a> 
            </td>
            <td class="td-fare-filter giave-order ">
              <a style="color: #6874ad;" id="fareFilter " {{-- class="mr10 " --}}>{{ trans('vexe.ticket_fare')}}</a>
            </td>
          </tr>
        </tbody>
      </table>
      <!-- <ul class="visible-xs filter-mobile-header ">
        <li id="li-departure-time "><a href="# ">Giờ chạy</a><i class="fa fa-sort-desc vt from-time-sort-i "></i></li>
        <li id="li-rating "><a href="# ">Đánh giá</a><i class="fa fa-sort-desc vt rate-sort-i "></i></li>
        <li id="li-fare "><a href="# ">Giá vé</a> <i class="fa fa-sort-desc vt fare-sort-i "></i></li>
        <li id="li-filter "><a href="# ">Lọc</a></li>
      </ul> -->
    </div>
  </div>
  <!--tao bang chon-->
  <div class="from-search-detail " style="padding: 0px; margin: 0px; display: none;" id="toggle_tst">
    <div class="col-md-1 col-sm-4 col-xs-6 promotiont-search">
      <ul class="list-property list-discount list-discount-pc">
        <li>
          <input type="checkbox" id="discount-1">
          <label for="discount-1">{{ trans('vexe.sale')}}</label>
        </li>
      </ul>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 property">
      <input type="text" class="tex-search search-hx" placeholder="Hãng xe">
      <ul class="list-property trasporter-list trasporter-list-pc">
        <li>
          <input type="checkbox" id="11078" data-id="11078">
          <label for="11078">A Ba</label>
        </li>
        <li>
          <input type="checkbox" id="14197" data-id="14197">
          <label for="14197">Anh Tuyên (Hà Nội)</label>
        </li>
        <li>
          <input type="checkbox" id="679">
          <label for="679">Hiền Phước</label>
        </li>
        <li>
          <input type="checkbox" id="12635">
          <label for="12635">Hiền Phương</label>
        </li>
        <li>
          <input type="checkbox" id="771">
          <label for="771">Hoàng Long</label>
        </li>
        <li>
          <input type="checkbox" id="12857">
          <label for="12857">HTX xe khách Trung Nam</label>
        </li>
        <li>
          <input type="checkbox" id="528">
          <label for="528">Mai Linh</label>
        </li>
        <li>
          <input type="checkbox" id="17471">
          <label for="17471">Nam Quân</label>
        </li>
        <li>
          <input type="checkbox" id="12577">
          <label for="12577">Ngọc Lễ</label>
        </li>
        <li>
          <input type="checkbox" id="11925">
          <label for="11925">Phượng Hoàng</label>
        </li>
        <li ><input type="checkbox" id="12661 "><label for="12661 ">Phương Tuấn</label></li>
                    <li><input type="checkbox" id="12986 " ><label for="12986 ">Tín Nghĩa</label></li>
                    <li><input type="checkbox" id="17477 "><label for="17477 ">Tuấn Duyên</label></li>
                    <li ><input type="checkbox" id="17474 " ><label for="17474 ">Thành Thương</label></li>
                    <li><input type="checkbox" id="12984 " ><label for="12984 ">Thịnh Hồng</label></li>
                    <li ><input type="checkbox" id="11768 " ><label for="11768 ">Thu Khuyên</label></li>
                    <li ><input type="checkbox" id="16931 " ><label for="16931 ">Vĩnh Yên</label></li>

            </ul>
        </div>
        <div class="col-md-1 col-sm-4 col-xs-6 ">
            <span>{{ trans('vexe.time_start')}}</span>
            <ul class="list-property from-time-list from-time-list-pc " >
                        <li><input type="checkbox" id="fromtimegroup-2 " >
          <label>06:00 - 11:59</label>
        </li>
        <li>
          <input type="checkbox" id="fromtimegroup-3 ">
          <label>12:00 - 17:59</label>
        </li>
        <li>
          <input type="checkbox" id="fromtimegroup-4 ">
          <label>18:00 - 23:59</label>
        </li>
      </ul>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 ">
      <input type="text " class="tex-search search-nd " placeholder="Nơi đi ">
      <ul class="list-property start-point-list start-point-list-pc " >
        <li>
          <input type="checkbox" id="Bình Thạnh ">
          <label for="Bình Thạnh ">Bình Thạnh</label>
        </li>
        <li>
          <input type="checkbox" id="Hồ Chí Minh ">
          <label for="Hồ Chí Minh ">Hồ Chí Minh</label>
        </li>
        <li>
          <input type="checkbox" id="Quận 12 ">
          <label for="Quận 12 ">Quận 12</label>
        </li>
        <li>
          <input type="checkbox" id="Thủ Đức ">
          <label for="Thủ Đức ">Thủ Đức</label>
        </li>
      </ul>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 ">
      <input type="text " class="tex-search search-from-filter " placeholder="Nơi đến ">
      <ul class="list-property end-point-list end-point-list-pc ">
        <li>
          <input type="checkbox" id="Hà Đông ">
          <label for="Hà Đông ">Hà Đông</label>
        </li>
        <li>
          <input type="checkbox" id="Hà Nội ">
          <label for="Hà Nội ">Hà Nội</label>
        </li>
        <li>
          <input type="checkbox" id="Hoàng Mai ">
          <label for="Hoàng Mai ">Hoàng Mai</label>
        </li>
        <li>
          <input type="checkbox" id="Sơn Tây ">
          <label for="Sơn Tây ">Sơn Tây</label>
        </li>
        <li>
          <input type="checkbox" id="Từ Liêm ">
          <label for="Từ Liêm ">Từ Liêm</label>
        </li>
      </ul>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 ">
      <span>Loại xe</span>
      <ul class="list-property vehicle-type-list vehicle-type-list-pc ">
        <li>
          <input type="checkbox" id="Gường nằm 40 chỗ ">
          <label for="Gường nằm 40 chỗ ">Gường nằm 40 chỗ</label>
        </li>
        <li>
          <input type="checkbox" id="Giường nằm 38 chỗ ">
          <label for="Giường nằm 38 chỗ ">Giường nằm 38 chỗ</label>
        </li>
        <li>
          <input type="checkbox" id="Giường nằm 39 chỗ ">
          <label for="Giường nằm 39 chỗ ">Giường nằm 39 chỗ</label>
        </li>
        <li>
          <input type="checkbox" id="Giường nằm 40 chỗ ">
          <label for="Giường nằm 40 chỗ ">Giường nằm 40 chỗ</label>
        </li>
        <li>
          <input type="checkbox" id="Giường nằm 45 chỗ ">
          <label for="Giường nằm 45 chỗ ">Giường nằm 45 chỗ</label>
        </li>
      </ul>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 ">
      <span>{{ trans('vexe.comfortable')}}</span>
      <ul class="list-property facilities-type-list facilities-type-list-pc ">
        <li>
          <input type="checkbox" id="Chăn đắp ">
          <label for="Chăn đắp ">Chăn đắp</label>
        </li>
        <li>
          <input type="checkbox" id="DVD ">
          <label for="DVD ">DVD</label>
        </li>
        <li>
          <input type="checkbox" id="Điều hòa ">
          <label for="Điều hòa ">Điều hòa</label>
        </li>
        <li>
          <input type="checkbox" id="Đón khác ">
          <label for="Đón khác ">Đón khác</label>
        </li>
        <li>
          <input type="checkbox" id="Đón khách ">
          <label for="Đón khách ">Đón khách</label>
        </li>
        <li>
          <input type="checkbox" id="Khăn lạnh ">
          <label for="Khăn lạnh ">Khăn lạnh</label>
        </li>
        <li>
          <input type="checkbox" id="Nước uống ">
          <label for="Nước uống ">Nước uống</label>
        </li>
        <li>
          <input type="checkbox" id="Toilet ">
          <label for="Toilet ">Toilet</label>
        </li>
        <li>
          <input type="checkbox" id="Thức ăn ">
          <label for="Thức ăn ">Thức ăn</label>
        </li>
        <li>
          <input type="checkbox" id="Wifi ">
          <label for="Wifi ">Wifi</label>
        </li>
      </ul>
    </div>

    <div class="col-md-12 col-xs-12 buttom-search " style="width:100%;margin-top:30px;text-align:center; ">
        <a class="hoantat show_hide ">Hoàn tất</a>
        <a class="xoachon show_hide ">Xóa đã chọn</a>
    </div>

    <img src="../images/vexe/closed.svg " class="close-form-sort show_hide ">
  </div>
 
  @foreach( $itinerary as $key => $list)
  <section class="searchResults ">
    <div id="main " class="container ">
      <!-- <div class="bus-content "> -->
      <table class="table result-list " id="hoang">
        <tbody>
          <tr class="schedule-ticket result-item product_box col-12 col-md-12 col-xs-12 " style="margin-top: 38px;     margin-bottom: -41px;">
            <td class="col-2 col-md-2 col-xs-2 pl0 " style="z-index: 1; ">

              <div class="pull-left ml10 comp-name-container">
            <div class="hidden-lg hidden-md star-mobile hidden-sm" >
                <div class="pull-left pull-left-star-mobi">
                            <h6 class="span-from-time-mobi mt0 mb5" >
                                {{ $date_start }}
                            </h6>

                </div>
                <div class="pull-left"><i class="pl5 pr5 text-gray3 left-arrow">→</i></div>
                <div class="pull-left pull-left-mobi">

                            <h6 class="span-to-time-mobi mt0 mb5 text-gray3" >
                                {{ $list->time_start}}
                            </h6>
                           
                </div>
            </div>


            <h6 class="mt0 mb10 comp-name-title text-gray3 ">{{ $list->car_company['name'] }}</h6>
                <div class="col-lg-12 service-plus-in hidden-xs ">
                  <img src="../images/vexe/wifi.svg">
                  <img src="../images/vexe/Water.svg ">
                </div>
            <ul class="busInfo hidden-sm hidden-xs" >

                <li ><a id="transfer-29-07-00" href="#" class="ml5 ticket-detail-tab-link text-route-link hover-orange-border hover-blue-text hidden hidden-xs hidden-sm" >Trung chuyển</a></li>

            </ul>
            {{-- <p class="text-gray vehicle-type-p mb3 hidden-lg hidden-md" >
                Hồ Chí Minh → Hà Nội
            </p> --}}
            {{-- <p class="text-gray vehicle-type-p mb3 hidden-lg hidden-md" >
                Giường nằm 38 chỗ
            </p> --}}
        </div>
            </td>
            <td class=" col-4 col-md-4 col-xs-4 hidden-xs detail-route ">
              <div class="col-12 ml10 text-center ">
                <div class="col-5 col-md-5 ">
                  <h6 class="span-from-time mt0 mb5 " >
                            {{ $date_start }}
                        </h6>
                </div>
                <div class="col-2 col-md-2 "><i class="pl5 pr5 text-gray3 left-arrow ">→<br></i></div>
                <div class="col-5 col-md-5 ">
                  <h6 class="span-to-time mt0 mb5 " >
                            {{ $list->time_start}}
                        </h6>
                </div>
                <div class="clearfix "></div>
                <div class="col-5 col-md-5 hidden-xs hidden-sm mt25 ">
                  <ul class="busInfo ">
                    <li>
                      <a style="color: #6874ad;" class="mt0 depart-station ticket-detail-tab-link text-route-link hover-orange-border hover-blue-text "  href="# " >
                            {{ $departPlace }}
                        </a>
                    </li>
                  </ul>

                </div>
                <div class="col-2 col-md-2 hidden-xs hidden-sm mt25 total-time-text "></div>
                <div class="col-5 col-md-5 hidden-xs hidden-sm mt25 ">
                  <ul class="busInfo ">
                    <li>
                      <a style="color: #6874ad;" class="mt0 destination-station ticket-detail-tab-link text-route-link hover-orange-border hover-blue-text "  href="# " onclick="return false; " >
                            {{ $destination }} 
                            <div class="pop-vxr w300 destination-station-tip " style="display: none; ">
                                {{-- <div class="head-pop clearfix ">
                                    <h5 class="mb5 mt5 ">ĐIẾM ĐẾN / TRẢ DỌC ĐƯỜNG</h5>
                                </div> --}}
                              {{--   <div class="body-pop ">
                                    <h5 class="mt0 mb5 ">

                                        Hà Nội (Điểm đến) <span>17:00</span>
                                    </h5>
                                    <div class="div-pickup-info-24-07-00 ">
                                        <p class="mt10 ">Địa chỉ: Hà Nội - Hà Nội - Hà Nội</p>
                                    </div>
                                </div> --}}
                                {{-- <div class="footer-pop clearfix ">
                                    <img class="logo-sm " src="images/vexe/logo-sm.svg " alt=" ">
                                </div> --}}
                            </div>
                        </a>
                    </li>
                  </ul>
                </div>
              </div>
            </td>
            <td class="pl0 col-2 col-md-2 col-xs-2 ">
              <p class="text-center chinh-sach-huy ">
                <a style="color: #6874ad;" class="ml5 ticket-detail-tab-link text-route-link hover-orange-border hover-blue-text link-chinh-sach-huy  "  href="# " >
                {{ trans('vexe.cancel_policy')}}
            </a>
              </p>
            </td>
            <td class="text-left  col-md-2 col-xs-2 text-center ">
              <ul class="list-inline pull-left rate-star ">
                @if ($list->rating->count == 0)
                <?php for ($i = 4; $i--; $i > 0) {?>
                <li><i class="glyphicon glyphicon-star text-gray "></i></li>
                <?php } ?>
                @else 
                <?php for ($i = floor(($list->rating->overall+$list->rating->quality+$list->rating->intime+$list->rating->service)/($list->rating->count*4)) ; $i--; $i > 0) {?>
                <li><i class="glyphicon glyphicon-star text-yellow "></i></li>
                <?php } ?>
                <?php for ($i = 4-floor(($list->rating->overall+$list->rating->quality+$list->rating->intime+$list->rating->service)/($list->rating->count*4)); $i--; $i > 0) {?>
                <li><i class="glyphicon glyphicon-star text-gray "></i></li>
                <?php } ?>
                @endif
              </ul>

              <div class="padd-top-1">
                <span class="totalComments " style="display:none " >{{$list->rating->count}}</span>
                <a  href="# " data-tab="danhgia_{{$list->car_id}}" class="danhgia_link">
                  @if ($list->rating->count == 0)
                  <span class="BusQualityRating blue "> 0 <span></span> {{ trans('vexe.lowercase_notable')}} <i class="fa fa-sort-desc vt"></i></a>
                  @else 
                  <span class="BusQualityRating blue ">{{round(($list->rating->overall+$list->rating->quality+$list->rating->intime+$list->rating->service)/($list->rating->count*4),2)}}/4</span> {{$list->rating->count}} <span></span> {{ trans('vexe.lowercase_notable')}} <i class="fa fa-sort-desc vt"></i></a>
                  @endif
                  <div class="pop-vxr w300 bus-rating-tip " id="danhgia_{{$list->car_id}}">
                    <div class="head-pop clearfix ">
                      <h5 class="mb5 mt5 text-de">{{ trans('vexe.notable_carcpn')}}</h5>
                    </div>
                    <div class="body-pop" >
                      <h5 class="mt0 mb5 text-de">{{ trans('vexe.notable_carcpn_passenger')}} {{$list->rating->count}} {{ trans('vexe.passenger')}}</h5>
                      <table class="table table-rating ">
                        <tbody>
                          <tr>
                            <td><b class="text-de">{{ trans('vexe.overview')}}:</b></td>
                            <td>
                              <ul class="list-inline pull-left rate-star " data-value="1">
                              @if ($list->rating->count == 0)
                              <?php for ($i = 4; $i--; $i > 0) {?>
                                <li><i class="glyphicon glyphicon-star text-gray "></i></li>
                              <?php } ?>
                              @else
                                <?php for ($i = floor(($list->rating->overall)/($list->rating->count)) ; $i--; $i > 0) {?>
                                <li><i class="glyphicon glyphicon-star text-yellow "></i></li>
                                <?php } ?>
                                <?php for ($i = 4-floor(($list->rating->overall)/($list->rating->count)); $i--; $i > 0) {?>
                                <li><i class="glyphicon glyphicon-star text-gray "></i></li>
                                <?php } ?>
                                @endif
                              </ul>

                            </td>
                          </tr>
                          <tr>
                            <td><b class="text-de">{{trans('vexe.car_quality')}}:</b></td>
                            <td>
                              <ul class="list-inline pull-left rate-star " data-value="3,927778 ">
                                @if ($list->rating->count == 0)
                                <?php for ($i = 4; $i--; $i > 0) {?>
                                <li><i class="glyphicon glyphicon-star text-gray "></i></li>
                                <?php } ?>
                                @else
                                <?php for ($i = floor(($list->rating->quality)/($list->rating->count)) ; $i--; $i > 0) {?>
                                <li><i class="glyphicon glyphicon-star text-yellow "></i></li>
                                <?php } ?>
                                <?php for ($i = 4-floor(($list->rating->quality)/($list->rating->count)); $i--; $i > 0) {?>
                                <li><i class="glyphicon glyphicon-star text-gray "></i></li>
                                <?php } ?>
                                @endif
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            <td><b class="text-de">{{trans('vexe.on_time')}}:</b></td>
                            <td>
                              <ul class="list-inline pull-left rate-star " data-value="3,805556 ">
                                @if ($list->rating->count == 0)
                                <?php for ($i = 4; $i--; $i > 0) {?>
                                <li><i class="glyphicon glyphicon-star text-gray "></i></li>
                                <?php } ?>
                                @else
                                <?php for ($i = floor(($list->rating->intime)/($list->rating->count)) ; $i--; $i > 0) {?>
                                <li><i class="glyphicon glyphicon-star text-yellow "></i></li>
                                <?php } ?>
                                <?php for ($i = 4-floor(($list->rating->intime)/($list->rating->count)); $i--; $i > 0) {?>
                                <li><i class="glyphicon glyphicon-star text-gray "></i></li>
                                <?php } ?>
                                @endif
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            <td><b class="text-de">{{ trans('vexe.service_attitude')}}:</b></td>
                            <td>
                              <ul class="list-inline pull-left rate-star " data-value="3,755556 ">
                                @if ($list->rating->count == 0)
                                <?php for ($i = 4; $i--; $i > 0) {?>
                                <li><i class="glyphicon glyphicon-star text-gray "></i></li>
                                <?php } ?>  
                                @else
                                <?php for ($i = floor(($list->rating->intime)/($list->rating->count)) ; $i--; $i > 0) {?>
                                <li><i class="glyphicon glyphicon-star text-yellow "></i></li>
                                <?php } ?>
                                <?php for ($i = 4-floor(($list->rating->intime)/($list->rating->count)); $i--; $i > 0) {?>
                                <li><i class="glyphicon glyphicon-star text-gray "></i></li>
                                <?php } ?>
                                @endif
                              </ul>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="footer-pop clearfix ">
                      <img class="logo-sm " src="../images/vexe/logo-sm.svg " alt=" 1">
                    </div>
                  </div>
                </a>
              </div>
              <div>
                <a style="color: #6874ad;" class="comment-btn-popup text-route-link hover-blue-text comment-text rating" href="{{route('ticket.rate',['car_id'=>$list->car_id,'itinerary_id'=>$list->itinerary_id])}}">
                   {{ trans('vexe.write_notable')}}
                </a>
              </div>
            </td>
            <td class="text-right pr0 col-md-3 col-xs-3 ">
              
              <h6 class="mt0 price ">
                            {{ $list->itinerary['ticket_fare']}} <small class="unit-price-small ">{{ trans('vexe.money_ticket')}}</small>/{{ trans('vexe.ticket')}}
              </h6>
              <p>
                <a id="a-12062017-00701700 " class="ticket-ac-btn btn-vxr-lg btn pull-right w100 hasSeat closed a- online-button "
                style="display: block;">{{ trans('vexe.book_ticket')}}</a>
                <!-- <a style="display: none; " title="Nhấp để đóng lại " href="javascript:; " class="ticket-ac-btn btn btn-lg btn-vxr-gray-lg w100 open online-button ">Đóng lại</a> -->
              </p>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!--main-->
    <form id="formCustomer" name="formCustomer" action="{{route('ticket.postCheckout')}}" method="POST" >
  {{Form::token()}}
  <div class="content-infor " id="choncho">
    <div class="container ">
      <div id="main-infor " class="booking-expand ">
        <div class="row " style="margin-bottom: -10px;">
          <div class="col-md-12 ">
            <div class=" bg-primary ">
              <div class="col-md-8 inf-xs text-inf ">{{ trans('vexe.ticket_info')}}</div>
              {{-- <div class="hidden-xs col-md-4 hidden-sm text-inf ">Bấm ghế trống để chọn, bấm lần nữa để huỷ</div> --}}
              <div class="hidden-xs hidden-sm col-md-4 text-inf ">{{ trans('vexe.passenger_info')}} <span class="btn btn-close-road "><img src="../images/vexe/btn-close.png " alt=" " class="online-button"></span></div>
            </div>
          </div>
        </div>
        <!--row-->
        <div class="white-1 ">
          <div class="row " style="margin-bottom: -55px;">
            <div class="col-md-7 col-md-offset-0 col-xs-10 col-xs-offset-1 hidden-xs ">
              <div class="table-info ">
                <!--   <div class="hidden-md hidden-sm "><h4 class="text-center hidden-xs ">THÔNG TIN VÉ XE</h4></div> -->
                <ul class="ul-table ">
                  <li><span class="span-text-2 ">{{ trans('vexe.itinerary')}}:</span><b class="pull-right ">{{ $departPlace }} → {{ $destination }} </b></li>
                   <input type="hidden" name="itinerary_id" value="{{ $list->id }}">
                  <li><span class="span-text-2 ">{{ trans('vexe.date_start')}}:</span><b class="pull-right ">{{ $date_start }} </b></li>
                  <li><span class="span-text-2 ">{{ trans('vexe.time_start')}}:</span><b class="pull-right ">{{ $list->time_start}} </b></li>
                  @if($date_back==NULL)
                  <li style="display: none;"><span class="span-text-2 ">{{ trans('vexe.date_start')}}:</span><b class="pull-right ">{{ $date_back }} </b></li>
                  <li style="display: none;"><span class="span-text-2 ">{{ trans('vexe.time_start')}}:</span><b class="pull-right ">{{ $list->time_back}} </b></li>
                  @else
                  <li style="display: block;"><span class="span-text-2 ">{{ trans('vexe.date_back')}}:</span><b class="pull-right ">{{ $date_back }} </b></li>
                  <li style="display: block;"><span class="span-text-2 ">{{ trans('vexe.time_back')}}:</span><b class="pull-right ">{{ $list->time_back}} </b></li>
                  @endif
                    <input type="hidden" value="{{ $date_back }}" name="date_back">
                    <input type="hidden" value="{{  $list->time_back }}" name="time_back">
                  <input type="hidden" value="{{ $date_start }}" name="date_start">
                  <input type="hidden" value="{{  $list->time_start }}" name="time_start">
                  
                  <li><span class="span-text-2 ">{{ trans('vexe.departPlace_address')}}:</span><b class="pull-right ">{{ $departPlace }} </b></li>
                  <li><span class="span-text-2 ">{{ trans('vexe.destination_address')}}:</span><b class="pull-right ">{{ $destination }}</b></li>
                  <input type="hidden" name="car_id" value="{{ $list->car_id}}">

                </ul>
            </div>
            </div>
      
            <div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-0 customer-info-col " style="margin-left: 5%">
              <!--  <div class="hidden-md hidden-sm "><h4 class="text-center hidden-xs ">THÔNG TIN KHÁCH HÀNG</h4></div> -->
              <div class="form-group CustomerFullName ">
                <div class="col-md-12 col-sm-12 col-xs-12 pl0 pr0 ">
                  <label class="col-md-12 pl0 pr0 col-sm-3 control-label text-left user-control-label">{{ trans('vexe.name_passenger')}}:</label>
                  <input id="name"  name="name" type="text " class="form-control input-vxr " value="" placeholder="{{ trans('vexe.name_passenger')}}" >
                </div>
              </div>
              <div class="col-md-12 col-sm-12 pl0 pr0 ">
                <label class="col-md-8 pl0 pr0 control-label text-left user-control-label">{{ trans('vexe.phone')}}:</label>
                <input id="phone"  name="phone" type="tel " class="form-control input-vxr " value="" placeholder="VD: 0912345678 ">
              </div>

               <div class="col-md-12 col-sm-12 pl0 pr0 ">
                <label class="col-md-8 pl0 pr0 control-label text-left user-control-label">{{ trans('vexe.email')}}:</label>
                <input id="email" name="email" type="text " class="form-control input-vxr " value="" placeholder="Email ">
              </div>

              <div class="col-md-12 col-sm-12 pl0 pr0">
                <label class="col-md-8 pl0 pr0 control-label text-left user-control-label">{{ trans('vexe.number_of_tickets')}}:</label>
                <select class="form-control" id="myOptions" name="numberTicket">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
              </div>
              <div class="form-group ">
                <label class="col-md-11 pl5 pr5 col-sm-11 text-center label-text ">{{ trans('vexe.note')}}</label>
              </div>
            </div>
            <!--col-3-->
          </div>
          <!--row2-->
          <div class="row ">
            <div class="price-col ">
              <div class="col-md-4 col-md-offset-0 col-xs-5 col-xs-offset-1 ">
                <span clas="span-text ">{{ trans('vexe.ticket_fare')}}:</span>
                <div id="single" data-price='{{ $ticket_fare}} '><b class="b-text" >{{ $ticket_fare}} </b></div>
              </div>
              <input type="hidden" name="price_one" value="{{ $ticket_fare}}">
              <div class="col-md-4 col-md-offset-0 col-xs-5 col-xs-offset-0 ">
                <div class="col-md-6 col-xs-12 ">
                  {{-- <span clas="span-text ">Số ghế: </span>
                  <b><span class="seat-template-seat-code pull-right ">Vui lòng chọn ít nhất 1 chỗ ngồi</span></b> --}}
                </div>
                <div class="col-md-6 col-xs-12 ">
                  <span class="span-text1 ">{{ trans('vexe.sum_money')}}:</span>
                  <div class="pull-right ">
                    <span class="seat-template-old-total-fare "></span>
                    <h4 class="seat-template-total-fare h4-text " id="sum-price">{{ $ticket_fare}}</h4><small class="unit-price-small ">{{ trans('vexe.money_ticket')}}</small>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-md-offset-0 col-xs-8 col-xs-offset-2 ">
                <div class="form-group mb0 ">
                  <div class="col-md-offset-3 col-md-8 col-sm-11 pl0 pr0 cont-container text-center ">
                    <button type="button " class="cont-btn btn btn-vxr-lg btn-vxr-lg-action " style="margin-top: 0px;">
                      {{ trans('vexe.next')}} <i class="glyphicon glyphicon-chevron-right f14 "></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--row-3-->
        </div>
        <!--white-->
        <div class="row ">
          <div class="col-md-12 col-xs-12 ">
            <h6 class="text-wblue thin200 pull-left pl5 selfie ">{{ trans('vexe.slogan')}}</h6>
            <img class="logo-sm " src="../images/vexe/logo-sm.svg " alt=" ">
            <h6 class="text-wblue thin200 pull-right pr5 ">{{ trans('vexe.question_contact')}}:  <b><a class="hotline-link " href="tel:{{ $data_configView['hot-line'] }} ">{{ $data_configView['hot-line'] }}</a></b></h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
  <!--  TRANG THONG TIN VE XE -->
  <div class="fancybox-overlay fancybox-overlay-fixed" id="viet_dg" >
  <div class="container">
      <div class="wrapper-pop">
        <div class="title-pop">
          <img src="../images/vexe/pop-ico-pen.jpg" alt=""> {{ trans('vexe.write_notable')}}
          <img class="pop-logo hidden-xs" src="../images/vexe/pop-logo.jpg" alt="">
        </div>
        <div class="pop-content">
          <form id="busrating" >
            <!-- <input id="BusOperatorId" name="BusOperatorId" type="hidden" value=""> -->
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="nhaxe clearfix">
                  <p class="p-text">{{ trans('vexe.car_cpm')}}: <b id="company_name"></b></p>
                  <p class="check-input-route ">
                    <span class="span-tt ">{{ trans('vexe.itinerary')}}:</span><b id="itinerary_name"></b>
                    <input class="rating-input-item" data-val="true" data-val-number="The field RouteId must be a number." id="RouteId" name="RouteId" type="hidden" value="8087">
                    </p>
                </div>
                <div class="form-nhaxe clearfix">
                  <div class="check-input-date">
                    <span class="fa fa-calendar input-icon hidden-sm"></span>
                    <input id="startDate"  name="DateOfJourney" class="departDate txt rating-input-item hasDatepicker" type="text" placeholder="{{ trans('vexe.get_date_start')}} *">
                    <span class="alert-no"></span>
                    <span class="alert-yes"></span>
                  </div>
                  <div class="clearfix"></div>
                  <div class="check-input-name">
                    <span class="fa fa-user input-icon hidden-sm"></span>
                    <input id="firstName" name="FirstName" class="txt rating-input-item" type="text" placeholder="{{ trans('vexe.name_passenger')}}: *">
                    <span class="alert-no"></span>
                    <span class="alert-yes"></span>
                  </div>
                  <div class="clearfix"></div>
                  <div class="check-input-email">
                    <span class="fa fa-envelope input-icon hidden-sm"></span>
                    <input id="email_rating" name="Email" class="txt rating-input-item" type="text" placeholder="{{ trans('vexe.email')}}: *">
                    <span class="alert-no"></span>
                    <span class="alert-yes"></span>
                  </div>
                  <div class="clearfix"></div>
                  <p>{{ trans('vexe.write_notable')}} </p>
                  <div class="check-input-cmt">
                    <span class="fa fa-comment input-icon hidden-sm"></span>
                    <textarea id="comment" class="rating-input-item" name="Comment" placeholder="{{ trans('placeholder_notable')}}"></textarea>
                    <span class="alert-no"></span>
                    <span class="alert-yes"></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <h6 class="uppercase top-padd text-center" >
                      <img class ="ico-1" src="../images/vexe/pop-ico-danhgia.png" alt=""><b>{{ trans('vexe.notable')}}:
                  </b></h6>
                <div class="alert-text text-center">
                ( {{ trans('vexe.plesase_click')}} <img src="../images/vexe/pop-star-silver.png" alt=""> {{ trans('to_notable')}})
                </div>
                <div class="pop-option-rate rate-chuyendi">
                  <span class="alert-yes"></span>
                  <span class="alert-no"></span>
                  <p><span class="pull-left">{{ trans('vexe.overview')}}:</span></p>

                  <div class="rate_row" id="overAllRating">
                  <span class="rate_star" data-value="1"></span>
                  <span class="rate_star" data-value="2"></span>
                  <span class="rate_star" data-value="3"></span>
                  <span class="rate_star" data-value="4"></span>
                  <!-- <span class="rate_star" data-value="5"></span> -->
                  <input type="hidden" id="overAllRatingPoint" name="overAllRatingPoint" class="get_star" value="0">
                </div>
                  <p id="OverallRatingHint" class="RatingHint hidden-sm"></p>
                  <div class="clearfix"></div>
                </div>
                <div class="pop-point-rate pop-option-rate rate-chuyendi">
                  <span class="alert-yes"></span>
                  <span class="alert-no"></span>
                  <p><span class="pull-left">{{ trans('vexe.quality')}}:</span></p>

                  <div class="rate_row" id="qualityRating">
                    <span class="rate_star" data-value="1"></span>
                    <span class="rate_star" data-value="2"></span>
                    <span class="rate_star" data-value="3"></span>
                    <span class="rate_star" data-value="4"></span>
                    <!-- <span class="rate_star" data-value="5"></span> -->
                    <input type="hidden" id="qualityRatingPoint" name="qualityRatingPoint" class="get_star" value="0">
                  </div>
                  <p id="VehicleQualityRatingHint" class="RatingHint hidden-sm"></p>
                  <div class="clearfix"></div>
                </div>
                <div class="pop-option-rate">
                  <span class="alert-yes"></span>
                  <span class="alert-no"></span>
                  <p><span class="pull-left">{{ trans('vexe.on_time')}}:</span></p>

                  <div class="rate_row" id="inTimeRating">
                <span class="rate_star" data-value="1"></span>
                  <span class="rate_star" data-value="2"></span>
                  <span class="rate_star" data-value="3"></span>
                  <span class="rate_star" data-value="4"></span>
                  <!-- <span class="rate_star" data-value="5"></span> -->
                  <input type="hidden" id="inTimeRatingPoint" name="inTimeRatingPoint" class="get_star" value="0">
                </div>
                  <p id="OnTimeRatingHint" class="RatingHint hidden-sm"></p>
                  <div class="clearfix"></div>
                </div>
                <div class="pop-option-rate">
                  <span class="alert-yes"></span>
                  <span class="alert-no"></span>
                  <p><span class="pull-left">{{ trans('vexe.service_attitude')}}:</span></p>

                  <div class="rate_row" id="serviceRating">
                <span class="rate_star" data-value="1"></span>
                  <span class="rate_star" data-value="2"></span>
                  <span class="rate_star" data-value="3"></span>
                  <span class="rate_star" data-value="4"></span>
                  <!-- <span class="rate_star" data-value="5"></span> -->
                  <input type="hidden" id="serviceRatingPoint" name="serviceRatingPoint" class="get_star" value="0">
                </div>
                  <p id="ServiceRatingHint" class="RatingHint hidden-sm"></p>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
               <div class="col-md-12 col-xs-12">
                <div class="pop-ckb-confirm ">
                    <input class="pop-ckb CheckBoxClass pull-left" id="condition" type="checkbox">
                    <label id="Label1" for="condition" class="CheckBoxLabelClass pull-left">&nbsp;</label>
                    <p>{{ trans('vexe.confirm_passenger')}}</p>
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-md-2 col-md-offset-5 col-xs-12">
            <a class="btn-danhgia uppercase" href="#" id="send_rating">{{ trans('vexe.send_notable')}}</a>
            <!-- <button class="btn-danhgia uppercase" type="submit">Gửi Đánh Giá</button> -->
            </div>
            </div>
          </form>
          <span class="btn btn-close-road-1 close-1 ">
          <img src="../images/vexe/btn-close.png " alt=" " ></span>
        </div>

      </div>
    </div>
    <!--end popup-->
  </div>

@endforeach
</div>
  </section>

  
@stop
@section('footer')
<script src="{{url('js/jqueryValidate/jquery.validate.js')}}" type="text/javascript"></script>
<script>
  $('#myOptions').change(function() {
    var val = $("#myOptions option:selected").text();
    var price_one = $( "#single" ).data('price');
    var sum_price = val*price_one;
    $( "#sum-price" ).text(sum_price);
  });
</script>
<script>
  jQuery.validator.addMethod("phoneUS", function (phone_number, element) {
            phone_number = phone_number.replace(/\s+/g, "");
            return this.optional(element) || phone_number.length > 9 &&
                  phone_number.match(/^(\(?(0|\+84)[1-9]{1}\d{1,4}?\)?\s?\d{3,4}\s?\d{3,4})$/);
        }, "Invalid phone number");
            $('#formCustomer').validate({
                errorElement:"span",
            rules: {
                name:{
                    required:true,
                    
                },
                phone:{
                    required:true,
                    minlength : 9,
                    phoneUS   : true,
                    number    : true,
                   
                },
                email:{
                    required:true,
                    email :true,
                },
              },        
              messages:{
                name:{
                    required:'{{ trans('vexe.required_name')}}',
                    
                },
                phone:{
                    required:'{{ trans('vexe.required_phone')}}',
                    minlength : "{{ trans('vexe.format_validate')}}",
                    phoneUS   : "{{ trans('vexe.phoneUS_phone')}}",
                    number : "{{ trans('vexe.format_validate')}}",  

                },
                email:{
                    required:'{{ trans('vexe.required_email')}}',
                    email : "{{ trans('vexe.format_validate')}}",
                },
          }
        }); 
</script>
<script type="text/javascript">
  $('.rating').on('click', function(e) {
    e.preventDefault();
    $('#overAllRating').starwarsjs ({
      star : 4,
      count : 1,
      on_select : function(data) {
        $('#overAllRatingPoint').val(data);
      }
    });
    $('#qualityRating').starwarsjs({
      star : 4,
      count : 1,
      on_select : function(data) {
        $('#qualityRatingPoint').val(data);
      }
    });
    $('#inTimeRating').starwarsjs({
      star : 4,
      count : 1,
      on_select : function(data) {
        $('#inTimeRatingPoint').val(data);
      }
    });
    $('#serviceRating').starwarsjs({
      star : 4,
      count : 1,
      on_select : function(data) {
        $('#serviceRatingPoint').val(data);
      }
    });
    var url = $(this).attr('href');
    $.ajax({
      url : url,
    }).done(function(data) {
      var company_name = data[0][0].name;
      var itinerary_name = data[1][0].slug;
      var car_id = data[0][0].id;
      var itinerary_id = data[1][0].id;
      $('#company_name').text(company_name);
      $('#itinerary_name').text(itinerary_name);
      $('#send_rating').attr('href',url);
    });
  });


  $('#send_rating').on('click',function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    var overAllRatingPoint = $('#overAllRatingPoint').val();
    var qualityRatingPoint = $('#qualityRatingPoint').val();
    var inTimeRatingPoint = $('#inTimeRatingPoint').val();
    var serviceRatingPoint = $('#serviceRatingPoint').val();
    var startDate = $('#startDate').val();
    var firstName = $('#firstName').val();
    var email = $('#email_rating').val();
    var comment = $('#comment').val();
    $.ajax({
     headers: {
      'X-CSRF-TOKEN': '{{csrf_token()}}'
    },
      url : url,
      type : "POST",
      data : {
        departDate : startDate,
        name : firstName,
        email : email,
        comment : comment,
        overall_rating : overAllRatingPoint,
        quality_rating : qualityRatingPoint,
        intime_rating : inTimeRatingPoint,
        service_rating : serviceRatingPoint,
      }
    }).done(function(data) {
      $('#viet_dg').css('display','none');
      toastr.success('{{ trans('vexe.notification_system')}}');
    });
  });

</script>

<script>
     $('#searchForm').on('submit',function(e){
      
         e.preventDefault();
          $.ajaxSetup({
              headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          var url = "{{route('ticket.search')}}";
          var date_start = $("#date_start").val();
          date_start = moment(date_start).format('DD/MM/YYYY');
      $.ajax({
          type:'GET',
          url: url,
          data: {
          departPlace : $("#departPlace").val(),
          destination : $("#destination").val(),
          date_start : date_start,
          },
      }).done(function(data) {
            $("#replaceTable").html('');
            $("#replaceTable").append(data);
      });
    });
</script>

@endsection