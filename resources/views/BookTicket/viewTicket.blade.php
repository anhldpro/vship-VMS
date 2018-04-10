<!DOCTYPE html>
<html>
<head>
    <title>{{ trans('vexe.title_viewTicket')}}</title>
    <meta charset="utf-8">
  {{-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <!-- Bootstrap -->
  <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ url('css/normalize.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ url('css/font.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ url('css/font-awesome.min.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ url('css/styles.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ url('css/responsive.css') }}" />
  <script type="text/javascript" src="{{url('js/jquery.min.js')}} "></script>
  <script type="text/javascript" src="{{url('js/jquery-migrate-1.2.1.min.js')}}"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script type="text/javascript" src="{{url('js/bootstrap.js')}}"></script>
  <script type="text/javascript" src="{{url('js/jquery-ui.js')}}"></script>
</head>
<body>

<header id="payment-header">
    <nav class="header-blue">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ route('ticket.create') }}" >
                    <img src="../images/logo.svg" class="logo img-reponsive"></a>
                </div>
                <div class="col-md-6 middle text-center">
                    <p class="text-white">{{ trans('vexe.slogan1_viewTicket')}}</p>
                    <h5 class="h5-tt">{{ trans('vexe.slogan2_viewTicket')}}</h5>
                </div>
                {{-- <div class="col-md-3 header-blue-right-menu time-left">
                    <ul class="header-blue-menu-list">
                        <li>
                            <h4 class="h4-tt text-white "><i class="fa fa-clock-o"></i> <small>Thời gian thanh toán còn lại</small> <span id="countdown" class="text-time-left mt0 mb0 style colorDefinition size_sm timer"></span>
                            </h4>
                        </li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </nav>  
</header> <!--header-->
<div id="page-thanhtoan">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="row mt5 payment-select-row ">

                    <div class="col-md-12 col-xs-12">

                        <h5 class="text-bold h5-txt" >
                            Vui lòng chọn hình thức thanh toán để hoàn tất việc đặt vé
                        </h5>
                    </div>
                 </div> <!--row-1-->
                <div class="row mt5">
                    <!-- <div class="col-md-12 visible-xs visible-sm">
                        <h5 class="text-bold h5-txt" >
                            Vui lòng chọn hình thức thanh toán để hoàn tất việc đặt vé
                        </h5>
                    </div> --><!-- col-1 -->
                    <div class="col-md-12 tab-wrapper">
                        <div class="panel-group" id="accordion" role="tablist">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                     <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#payment-visa" aria-expanded="false" aria-controls="payment-visa" class="collapsed" >
                                            <span class="fa fa-credit-card padd-icon"></span>
                                            <span class="hidden-xs hidden-sm">Thanh toán bằng thẻ quốc tế
                                                <img class="creditcard-logo" src="../images/vexe/visa-logo web.png">
                                                <img class="creditcard-logo" src="../images/vexe/mastercard-logo web.png">
                                                <img class="creditcard-logo" src="../images/vexe/jcb-logo web.png">
                                                </span><!--span-1-->
                                            <!-- <span class="visible-xs-sm-inline">Thẻ quốc tế
                                            <img class="creditcard-logo" src="images/visa-logo web.png">
                                            <img class="creditcard-logo" src="images/mastercard-logo web.png">
                                            <img class="creditcard-logo" src="images/jcb-logo web.png">
                                            </span> -->
                                        
                                        <i class="pull-right fa fa-angle-down"></i>;
                                        <span class="img-payment-guide"></span>
                                        <input type="radio" name="PaymentMethod" style="display: none;" class="radio" value="VISA">
                                        <span class="check">
                                            <span class="inside">
                                                
                                            </span>
                                        </span>
                                        </a>
                                     </h4>
                                </div>
                                <div id="payment-visa" class="panel-collapse collapse" role="tabpanel">
                                    <div class="panel-body">
                                        <p>
                                            <span>Trên thẻ của bạn phải có các ký hiệu Visa, Master hay JCB để thanh toán được bằng hình thức này</span>
                                        </p>
                                                                                
                                        <p>
                                            <span>1. Bạn sẽ được chuyển hướng về cổng thanh toán Cybersource để hoàn tất thanh toán.
                                            </span>
                                        </p>
                                        <p>
                                            <span>2. Nhập thông tin trên thẻ</span>
                                        </p>
                                       <p>
                                        <span>3. Sau khi thanh toán, bạn sẽ nhận được
                                            <span class="">vé điện tử qua tin nhắn và Email thay cho vé giấy để lên xe</span>
                                        </span>
                                        </p>
                                    <div>
                                            <div class="hadcoupon-mobi hidden-md hidden-lg">
                                                <span id="spHadCoupon-mobi">Bạn có mã giảm giá?</span> <a class="lbgiamgia-mobi  hidden-md hidden-lg">Sử dụng</a>
                                            </div>
                                            <div class="input-group coupon-row coupon-row-mobi visible-xs w100 displaynone">
                                                <input type="text" class="form-control payment-input redeemCode" placeholder="Mã giảm giá">
                                                <button type="button" class="btn btn-md btn-vxr redeemBtn">Sử dụng</button>
                                            </div>
                                        <hr class="hidden-xs">

                                        
                                        <p class="rule-container">
                                                                                                              
                                                <label class="cancel-rule-container text-left">
                                                <input type="checkbox" class="cancel-rule-cb"> Tôi chấp nhận vé này khi hủy sẽ không được hoàn tiền
                                                </label>
                                                </label>
                                        </p>

                                        <div class="form-group total-container pull-right mt10">
                                            <label class="pr0 pl0" >
                                                <span>Tổng tiền: </span>
                                                <span class="text-total-fare text-pr-mb text-red">
                                                    620.000 VNĐ
                                                </span>

                                            </label>
                                            <button type="button" class="btn btn-lg btn-vxr-thanhtoan payment-submit-btn">Thanh toán</button>
                                        </div>
                                        <div class="col-md-12 mt10 note-payment ml-payment hidden-sm hidden-xs">
                                            <label>
                                                Gọi ngay hotline <a href="tel:1900 7070" >1900 7070</a><span> - </span><a href="tel:1900 969681" >1900 969681</a> hoặc gửi email về <span>cs@vexere.com</span> nếu bạn gặp vấn đề trong quá trình thanh toán.
                                             </label>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!--an tab-1-->
                            </div><!-- PANEL-1 -->
                            <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#payment-atm" aria-expanded="false" aria-controls="payment-atm">
                                                <span class="fa fa-credit-card padd-icon"></span>
                                                <span class="hidden-xs hidden-sm">Thanh toán bằng thẻ ATM đã đăng ký Internet Banking</span>
                                                <span class="visible-xs-sm-inline">Thẻ ATM Internet Banking</span>
                                                <i class="pull-right fa fa-angle-down">
                                                    
                                                </i>
                                                <span class="img-payment-guide"></span>
                                                <input type="radio" name="PaymentMethod" class="radio" style="display: none;" value="ATM">
                                                <span class="check">
                                                    <span class="inside"></span>
                                                </span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="payment-atm" class="panel-collapse collapse" role="tabpanel" aria-expanded="false" >
                                        <div class="panel-body">
                                            <p><span>Thẻ của bạn phải có đăng ký dịch vụ Internet Banking với ngân hàng</span></p>
                                            <p><span>1. Chọn ngân hàng trên thẻ của bạn</span></p>
                                            <div class="container-fluid pl0 pr0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <select id="bankSelect" class="form-control" name="bankCode">
                                                            <option value="">Vui lòng chọn Ngân hàng để thanh toán</option>
                                                            <option value="123PABB-ABB">ABBank - NHTMCP An Bình</option>
                                                            <option value="123PACB-ACB">ACB - NHTMCP Á Châu</option>
                                                            <option value="123PAGB-ARGI">Agribank - NH Nông Nghiệp và PT Nông Thôn VN</option>
                                                            <option value="123PBIDV-BIDV">BIDV - NHTMCP Đầu Tư Và Phát Triển VN</option>
                                                            <option value="123PDAB-DNA">DongA Bank - NHTMCP Đông Á</option>
                                                            <option value="123PEIB-EXB">EximBank - NHTMCP Xuất Nhập Khẩu VN</option>
                                                            <option value="123PGPB-GPB">GP Bank - NHTNHH MTV Dầu Khí Toàn Cầu</option>
                                                            <option value="123PHDB-HDB">HDBank - NHTMCP Phát Triển TP.HCM</option>
                                                            <option value="123PMRTB-MRTB">Maritime Bank - NHTMCP Hàng Hải</option>
                                                            <option value="123PMB-MBB">MBBank - NHTMCP Quân Đội</option>
                                                            <option value="123PNAB-NAB">Nam A Bank - NHTMCP Nam Á</option>
                                                            <option value="123PNVB-NVB">Navibank - NHTMCP Nam Việt</option>
                                                            <option value="123POCB-OCB">OCB - NHTMCP Phương Đông VN</option>
                                                            <option value="123POCEB-OCEB">Ocean Bank - NHTMTNHH MTV Đại Dương</option>
                                                            <option value="123PPGB-PGB">PG Bank - NHTMCP Xăng Dầu Petrolimex</option>
                                                            <option value="123PSCB-SACB">Sacombank - NHTMCP Sài Gòn Thương Tín</option>
                                                            <option value="123PSGB-SGB">Saigonbank - NHTMCP SG Công Thương</option>
                                                            <option value="123PTCB-TECH">Techcombank - NHTMCP Kỹ Thương VN</option>
                                                            <option value="123PVIB-VIB">VIB - NHTMCP Quốc Tế</option>
                                                            <option value="123PVAB-VAB">VietA Bank - NHTMCP Việt Á</option>
                                                            <option value="123PVCB-VCOM">Vietcombank - NHTMCP Ngoại Thương Việt Nam</option>
                                                            <option value="123PVTB-CTG">VietinBank - NHTMCP Công Thương VN</option>
                                                            <option value="123PVPB-VPB">VPBank - NHTMCP VN Thịnh Vượng</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt10"><span>2. Bạn sẽ được chuyển hướng về cổng thanh toán 123Pay để hoàn tất thanh toán. 123Pay hiện đã hỗ trợ thanh toán qua 25 ngân hàng tại Việt Nam.
                                            </span></p>
                                            <p><span>3. Sau khi thanh toán, bạn sẽ nhận được <span class="">vé điện tử qua tin nhắn và Email thay cho vé giấy để lên xe</span></span></p>


                                                <div class="hadcoupon-mobi hidden-md hidden-lg">
                                                    <span id="spHadCoupon-mobi">Bạn có mã giảm giá?</span> <a class="lbgiamgia-mobi  hidden-md hidden-lg">Sử dụng</a>
                                                </div>
                                                <div class="input-group coupon-row coupon-row-mobi visible-xs w100 displaynone">
                                                    <input type="text" class="form-control payment-input redeemCode" placeholder="Mã giảm giá">
                                                    <button type="button" class="btn btn-md btn-vxr redeemBtn">Sử dụng</button>
                                                </div>
                                            <hr class="hidden-xs">
                                            
                                            <p class="rule-container">
                                                    <label class="text-right second-checkbox">
                                                        <label class="cancel-rule-container text-left"><input type="checkbox" class="cancel-rule-cb"> Tôi chấp nhận vé này khi hủy sẽ không được hoàn tiền
                                                        </label>
                                                    </label>
                                            </p>

                                            <div class="form-group total-container pull-right mt10">
                                               <!--  <label class="old-total-fare-row pr10">
                                                    <span>Tạm tính: </span>
                                                    <span class="txtOldTotalFare text-pr-mb"></span>
                                                </label> -->
                                                <!-- <label class="pr10 coupon-result-row">
                                                    <span class="col-xs-7" >
                                                        Mã giảm giá: <b class="txtCouponCode"></b><br>
                                                        <label class="text-edit">Chỉnh sửa</label>
                                                    </span>
                                                    <span class="txtCouponValue text-pr-mb"></span>
                                                </label> -->
                                                <label class="pr0 pl0" >
                                                    <span>Tổng tiền: </span>
                                                    <span class="text-total-fare text-pr-mb text-red">
                                                        620.000 VNĐ
                                                    </span>

                                                </label>

                                                

                                                <button type="button" class="btn btn-lg btn-vxr-thanhtoan payment-submit-btn">Thanh toán</button>
                                            </div>
                                            <div class="row visible-md visible-lg">
                                                
                                                <div class="col-md-12 mt10 note-payment ml-payment">
                                                    <label>


                                                        Gọi ngay hotline <a href="tel:1900 7070" ><b>1900 7070</b></a><span > - </span><a href="tel:1900 969681" ><b>1900 969681</b></a> hoặc gửi email về <span ><b>cs@vexere.com</b></span> nếu bạn gặp vấn đề trong quá trình thanh toán.
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                        </div>
                    </div><!-- col-2 -->
                </div><!--rơ-2-->
                <div class="col-md-12" class="padd-top">
                    <p class="p-top">
                        <span class="text-ten-thousand">500.000+</span> 
                        <span class="span-txt">vé đã được thanh toán trên VeXeRe<br></span>
                    </p>
                </div>
                <div class="col-md-12 mt10 pl0">
                    <div class="col-md-6">
                        Giao dịch tại VeXeRe.com được cam kết an toàn và bảo mật biểu thị qua biểu tượng ổ khoá màu xanh trên thanh trình duyệt của bạn.
                    </div>
                    <div class="col-md-6">

                        <div class="row back-gr1" >
                            <div class="col-md-5">
                                <img class="img-responsive" src="../images/vexe/certificate0.png">
                            </div>
                            <div class="col-md-5 pl0">
                                <img class="img-responsive" src="../images/vexe/certificate1.png">
                            </div>
                        </div>

                    </div>

                </div>
                
            </div><!--col-1-->
            <!--col-left-->
            <div class="col-md-4 col-xs-12 col-ticket-info ">

                <div class="row">
                    <div class="col-md-5">
                        {{ trans('vexe.name_passenger')}}: 	
                    </div>
                    <div class="col-md-7">
						{{ $datas['name'] }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        {{ trans('vexe.phone')}}: 
                    </div>
                    <div class="col-md-7">
                     	{{$datas['phone']}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        {{ trans('vexe.email')}}: 
                    </div>
                    <div class="col-md-7">
                       {{ $datas['email'] }} 
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5">
                        {{ trans('vexe.car_cpm')}}: 
                    </div>
                    <div class="col-md-7">
                        {{ $datas->car_company['name'] }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        {{ trans('vexe.itinerary')}}: 
                    </div>
                    <div class="col-md-7">
                       {{ $datas->itinerary['slug'] }} 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        {{ trans('vexe.departPlace')}}: 
                    </div> 
                    <div class="col-md-7">
                       {{ $datas->itinerary['departPlace'] }} 
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        {{ trans('vexe.destination')}}:  
                    </div>
                    <div class="col-md-7">
                      {{ $datas->itinerary['destination'] }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        {{ trans('vexe.date_start')}}: 
                    </div>
                    <div class="col-md-7">
                       {{ $datas['date_start'] }}
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-5">
                         {{ trans('vexe.time_start')}}:
                        </div>
                        <div class="col-md-7">
                           {{ $datas['time_start'] }}  
                        </div>
                </div>
                  <div class="row">
                    <div class="col-md-5">
                        {{ trans('vexe.date_back') }}: 
                    </div>
                    <div class="col-md-7">
                       {{ $datas['date_back'] }}
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-5">
                          {{ trans('vexe.time_back') }}: :
                        </div>
                        <div class="col-md-7">
                           {{ $datas['time_back'] }}  
                        </div>
                </div>
                <div class="row">
                        <div class="col-md-5">
                          {{ trans('vexe.ticket_code')}}: 
                        </div>
                        <div class="col-md-7">
                          {{ $datas[ 'code' ] }}  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                          {{ trans('vexe.number_of_tickets')}}: 
                        </div>
                        <div class="col-md-7">
                          {{ $datas[ 'number_of_ticket' ] }}  
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-5">
                          {{ trans('vexe.ticket_type')}}: 
                        </div>
                        <div class="col-md-7">
                         <td>@if ($datas[ 'ticket_type' ] ==1) {{ trans('vexe.ticket_one_way')}} @else {{ trans('vexe.ticket_round_trip')}} @endif</td>  
                        </div>
                    </div>

                   {{-- <div class="row coupon-row">
                        <div class="col-md-5 pr0">
                            <span id="spHadCoupon" >Bạn có mã giảm giá?</span>
                            
                        </div>
                        <div class="col-md-7">
                            <label class="lbgiamgia" >Sử dụng</label>

                        </div>
                   </div> --}}

             {{--       <div class="row">
                   <div class="col-md-5">
                   <input id="txtCheckRedeemCode" type="text" style="display: none;" class="form-control payment-input redeemCode hidd-1" placeholder="Nhập mã giảm giá">
                            
                    
                   </div>
                   <div class="col-md-7">
                   <button id="btnCheckRedeemCode" type="button" style="display: none;" class="btn btn-md btn-vxr redeemBtn hidd-1" data-toggle="modal" data-target="#myModal">Sử dụng mã</button>
                    
                   </div>
                    
                   </div> --}}
                   {{-- <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                   <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h3><i class="fa fa-exclamation-circle" style="color: #DB0601;font-size: 32px;"></i>&nbsp; Thông báo</h3>
                            </div>
                            <div class="modal-body">
                                <p>Mã coupon không hợp lệ<br> <b>Quý khách vui lòng thử lại</b></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng lại</button>
                            </div>
                    </div>
                    </div>
                    </div> --}}
                {{-- <div class="row old-total-fare-row-lg">
                    <div class="col-md-5">
                        Tạm tính:
                    </div>
                    <div class="col-md-7">
                        <span class="txtOldTotalFare"></span>
                    </div>
                </div> --}}
                {{-- <div class="row coupon-result-row-lg">
                    <div class="col-md-5">
                        Mã giảm giá: <span class="txtCouponCode"></span>
                    </div>
                    <div class="col-md-7">
                        <span class="txtCouponValue"></span>&nbsp; <label class="text-edit">Chỉnh sửa</label>
                    </div>
                </div> --}}
                {{-- <div class="row shipping-fee-row" style="display: none;">
                    <div class="col-md-5">
                        Phí thu tiền:
                    </div>
                    <div class="col-md-7">
                        <span class="shipping-fee"></span> VNĐ
                    </div>
                </div> --}}
               {{--  <div class="row row-payoo-discount" style="display: none;">
                    <div class="col-md-5">
                        Giảm giá:
                    </div>
                    <div class="col-md-7">
                        <span class="payoo-discount-value text-vxr"></span>
                    </div>
                </div> --}}
                <div class="row row-total">
                    <div class="col-md-5 col-total">
                        {{ trans('vexe.sum_money')}}:
                    </div>
                    <div class="col-md-7 col-total">
                        <span class="text-total-fare-col">
                             {{ $datas[ 'sum_price' ] }}  
                        </span><small></small>
                    </div>
                </div>

              
            </div><!--right-->
        </div><!--row-->
        
    </div><!--container-->
    
</div><!--page-1-->
<footer class="page-foot">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12 text-left hdtt-cstt">
                <p class="p-top">Tất cả các giao dịch thanh toán tại VeXeRe.com được đảm bảo 100% bảo mật và xác thực bởi các tổ chức Norton và Trustware</p>
                <p>Bằng cách Đặt vé hay Thanh toán, bạn đã đồng ý với 
                <a class="text-link" href="#" >Chính sách bảo mật</a> và 
                <a class="text-link" href="#" >Điều khoản sử dụng</a> của VeXeRe</p>
            </div>
        </div>
    </div>
</footer>
  <script type="text/javascript" src="{{ url('js/home.js') }}"></script>

</body>
</html>