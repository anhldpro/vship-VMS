<!DOCTYPE html>
<html lang="vi">

<head>
    <title>{{trans('vexe.title_page')}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Bootstrap -->
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('css/normalize.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('css/font.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('css/responsive.css')}}"/>
    <link rel="stylesheet prefetch" href="{{url('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('slick/slick-theme.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('css/multi-select/bootstrap-select.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/starwars.css')}}">
    <link href="{{url('css/toastr.min.css')}}" rel="stylesheet"/>

    <script src="{{url('js/jquery.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{url('js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{url('js/jquery-ui.js')}}"></script>


</head>

<body>
<nav class="navbar navbar-default header-blue">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-5 col-xs-6">
                <a href="{{ route('ticket.create') }}"><img style="margin-bottom: 11px;margin-top: 14px;"
                                                            src="{{url('images/vexe/logo.png')}}"
                                                            class="img-responsive logo"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="col-md-9 col-sm-7 col-xs-12">
                <button type="button" class="navbar-toggle collapsed padd-2" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse padd-1" id="bs-example-navbar-collapse-1">
                    <div class=" menu-top ">
                        <ul class="nav navbar-nav ul-menu">
                            <li><a href="{{ route('ticket.create') }}" class="home">{{ trans('vexe.home_page')}} </a>
                            </li>
                            <li><a href="{{ route('ticket.checkedTicket') }}"
                                   class="home">{{ trans('vexe.check_ticket')}}</a></li>
                            <li><a href="{{ route('ticket.cancelTicket') }}"
                                   class="home">{{ trans('vexe.cancel_ticket')}} </a></li>
                            <li><a href="{{ route('ticket.contact.us') }}" class="home">{{ trans('vexe.contact')}}</a>
                            </li>
                            <li><a href="{{ route('news.index') }}" class="home">{{ trans('vexe.news')}}</a></li>

                            <li>

                                @if (Auth::guard('web')->check())

                                    <a href="javascript:;" class="dropdown-toggle home" data-toggle="dropdown"
                                       data-hover="dropdown" data-close-others="true">{{Auth::user()->name}}
                                        <span class="caret link-frame"></span>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-default"
                                        style="padding: 0;min-width: 142px;">
                                        <li>
                                            <a href="{{ route('admin.news.index') }}">{{ trans('vexe.management_page')}}</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/logout') }}"
                                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                                <i class="icon-key"></i> {{ trans('vexe.logout')}} </a>
                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                                  style="display: none;">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            </form>
                                        </li>
                                    </ul>
                            @else
                                <li><a href="{{ route('login') }}" class="home">{{ trans('vexe.login')}} </a></li>
                                @endif

                                </li>
                                <li>
                                    <select class="form-control" id="languageSwitcher">
                                        <option value="">{{trans('vexe.language')}}</option>
                                        <option value="vi">{{trans('vexe.vietnamese')}}</option>
                                        <option value="en" {{-- {{ Lang::locale() === 'en' ? 'selected' : '' }} --}}>{{trans('vexe.eng')}}</option>
                                    </select>
                                </li>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!--row-->
    </div>
    <!-- /.container -->
</nav>


@yield('contents')

<!--tintuc-->
<div id="backLinkDiv" class="back-links odd-row clearfix hidden-xs hidden-sm">
    <div class="container">
        <div class="clearfix row">
            <div class="col-md-12 col-xs-12 pr0">
                <h3>{{ trans('vexe.car_cpm')}}</h3>
                <ul id="transporters_1">
                    @foreach ($car_company as $list_carcpn)
                        <li><a href="{{ route('car.show',$list_carcpn['id'])}}">{{ $list_carcpn['name']}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4 col-xs-12 pr0">
              <h3>Bến xe khách</h3>
              <ul id="transporters_2">
                @foreach ($station as $list_station)
                <li><a href="#">{{ $list_station['name']}}</a></li>
              @endforeach
              </ul>
            </div>
        </div>
    </div>
</div>


</div>
<div id="footer">

    <div class="container">

        <div class="row hidden-sm hidden-xs contentfooter">
            <div class="col-md-4 col-sm-3 col-xs-12">
                <h4>Về chúng tôi</h4>
                <ul class="footer-links">
                    <li><a href="/vi-vn/tuyen-dung">Tuyển dụng</a></li>
                    <li><a href="/vi-VN/tin-tuc">Tin tức</a></li>
                    <li><a rel="nofollow" href="/vi-VN/gioi-thieu.html">Giới Thiệu VeXeRe.com</a></li>
                    <li><a rel="nofollow" href="/vi-VN/lien-he.html">Liên hệ</a></li>
                    <li><a href="/vexetet">Vé Xe Tết 2019</a></li>
                </ul>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12">
                <h4>Hỗ trợ</h4>
                <ul class="footer-links">
                    <li><a rel="nofollow" href="/vi-VN/huong-dan-thanh-toan-tren-website.html">Hướng dẫn thanh toán</a></li>
                    <li><a rel="nofollow" href="/vi-VN/quy-che.html">Quy chế VeXeRe.com</a></li>
                    <li><a rel="nofollow" href="/vi-VN/nhung-cau-hoi-thuong-gap.html">Những câu hỏi thường gặp</a></li>
                    <li><a href="/vi-vn/phan-mem-quan-ly-ban-ve-xe-khach-vexere.html">Phần mềm quản lý bán vé xe khách VBMS</a></li>
                    <li><a href="/">Đặt vé xe khách trực tuyến</a></li>
                </ul>
            </div>

            <div class="col-md-3 hidden-xs">
                <h4>Kết nối</h4>

                <div class="social col-08 clearfix">
                    <a class="social-icon fb" rel="nofollow" title="Facebook" href="https://www.facebook.com/Vexere" target="_blank">Facebook</a>
                    <a class="social-icon yt" rel="nofollow" title="Youtube" href="http://www.youtube.com/channel/UCyUfbHAH0X_CXF4n2Zg2WSA" target="_blank">Youtube</a>
                    <a class="social-icon google-plus" rel="nofollow" title="Google+" href="https://plus.google.com/b/114193555551619053500/+VexereVN/posts?gmbpt=true&amp;hl=en" target="_blank">Google+</a>

                </div>

                <h4>Đối tác</h4>
                <div class="col-08 clearfix">
                    <a target="_blank" href="http://csip.vn/" rel="nofollow"><img src="/Content/vxr/images/logo-csip.png?v=2" style="width: 75px;"></a>
                    <a target="_blank" href="http://bssc.vn/" rel="nofollow"><img src="/Content/vxr/images/logo-bssc.png?v=2" style="width: 75px; margin-left: 10px;"></a>
                    <a target="_blank" href="http://shtpic.org/" rel="nofollow"><img src="/Content/vxr/images/logo-shtp-ic.png?v=2" style="width: 75px; margin-left: 10px;"></a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="copyright-panel">
            <div class="col-md-8 footer-info-panel">
                <div class="left-img">
                    <a itemprop="url" class="footer-logo" href="/" title="Sàn giao lưu xe tải lớn nhất Việt Nam">
                        <img itemprop="logo" src="{{URL::asset('images/vexe/')}}/{{$img_logo_footer}}" alt=""
                             class="logo-1 img-responsive">
                    </a>
                </div>
                <div class="footer-info pull-right">
                    {!! $data_configView['footer-info'] !!}
                </div>

            </div>
            <!-- Start Mixpanel Partner -->
            <div style="float: left">
                <a href="#" rel="nofollow">
                    <img src="{{url('images/vexe/badge_light.png')}}" alt="Mobile Analytics" style="width: 1px">
                </a>
            </div>
            <!-- End Mixpanel Partner -->
        </div>
        <div class="col-md-4 certificate-panel" style="margin-top: -40px;">
            <div class="col-md-6 col-sm-3 col-xs-4">
                <img src="{{URL::asset('images/vexe/')}}/{{$footer_certificate1}}">
            </div>
            <div class="col-md-6  col-sm-3 col-xs-4">
                <img src="{{URL::asset('images/vexe/')}}/{{$footer_certificate2}}">
            </div>
            <div class="col-md-6 col-sm-3 col-xs-4">
                <a href="#">
                    <img src="{{URL::asset('images/vexe/')}}/{{$footer_certificate3}}">
                </a>
            </div>
            <div class="col-md-6 col-sm-3 col-xs-4">
                <a href="#">
                    <img src="{{URL::asset('images/vexe/')}}/{{$footer_certificate4}}">
                </a>
            </div>
        </div>
        <!-- End Copyright -->
    </div>
</div>


</div>
@yield('footer')


<script src="{{url('js/multi-select/bootstrap-select.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{url('js/jquery.jcarousel.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript" src="{{url('js/jcarousel.responsive.js')}}"></script>
<script type="text/javascript" src="{{url('js/starwarsjs.js')}}"></script>
<script type="text/javascript" src="{{url('js/moment.js')}}"></script>
<script type="text/javascript" src="{{url('js/JQuery.curtail.js')}}"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript" src="{{url('slick/slick.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/home.js')}} "></script>
<script type="text/javascript" src="{{url('js/lang.js')}} "></script>
<script>
    @if ( Session::has('success'))
    toastr.success('{{ session('success')}}');
    @endif
</script>
<script>
    jQuery(document).ready(function ($) {
        var date_start = $('input[name="date_start"]'); //our date input has the name "date"
        var date_back = $('input[name="date_back"]');
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        date_start.datepicker({
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
            startDate: '+0d',
        });
        date_back.datepicker({
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
            startDate: '+1d',
        })
    });
</script>
{{--   <script>
    jQuery(document).ready(function($){
        $("#date_start").datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numbeOfMonthgs: 1,
          onClose: function( selectedDate){
            $( "#date_back").datepicker( "option", 'minDate', selectedDate);
            var day1 = $(this).datepicker('getDate').getDate();
            var month1 = $(this).datepicker('getDate').getMonth();
            var year1 = $(this).datepicker('getDate').getYear();
          }
        });
        $("#date_back").datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numbeOfMonthgs: 1,
          onClose: function( selectedDate){
            $( "#date_start").datepicker( "option", 'maxDate', selectedDate);
            var day2 = $(this).datepicker('getDate').getDate();
            var month2 = $(this).datepicker('getDate').getMonth();
            var year2 = $(this).datepicker('getDate').getYear();
          }
        });
    });
  </script> --}}
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    var editor_config = {
        path_absolute: "/",
        selector: "textarea.my-editor",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor textcolor colorpicker textpattern"
        ],
        toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
        toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
        toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | visualchars visualblocks nonbreaking template pagebreak restoredraft",
        relative_urls: false,
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'],

        menubar: false,
        toolbar_items_size: 'small',

        style_formats: [{
            title: 'Bold text',
            inline: 'b'
        }, {
            title: 'Red text',
            inline: 'span',
            styles: {
                color: '#ff0000'
            }
        }, {
            title: 'Red header',
            block: 'h1',
            styles: {
                color: '#ff0000'
            }
        }, {
            title: 'Example 1',
            inline: 'span',
            classes: 'example1'
        }, {
            title: 'Example 2',
            inline: 'span',
            classes: 'example2'
        }, {
            title: 'Table styles'
        }, {
            title: 'Table row 1',
            selector: 'tr',
            classes: 'tablerow1'
        }],

        templates: [{
            title: 'Test template 1',
            content: 'Test 1'
        }, {
            title: 'Test template 2',
            content: 'Test 2'
        }],
        file_browser_callback: function (field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>
</body>

</html>





