<!DOCTYPE html>
<html lang="vi">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{url('css/normalize.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{url('css/font.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{url('css/font-awesome.min.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{url('css/styles.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{url('css/responsive.css')}}" />
  <!--  <link rel="stylesheet" type="text/css" href="js/bootstrap-datepicker.js" /> -->
  <link rel="stylesheet prefetch" href="{{url('css/bootstrap-datepicker3.css')}}">
  <link rel="stylesheet" type="text/css" href="{{url('slick/slick.css')}}" />
  <!-- // Add the new slick-theme.css if you want the default styling -->
  <link rel="stylesheet" type="text/css" href="{{url('slick/slick-theme.css')}}" />
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
  <script >
  $(document).ready(function(){
    $('#sel').change(function(){
      var id = $('#sel').val();
      // alert(id);
      $.ajax({
         type:'get',
         url:'ajaxSel/'+id,
         data:{id:id},
         cache:false,
         success:function(data){
            $('#sel2').html(data);
         }
      });
    });
   
  });
  </script>
</head>

<body>
  <nav class="navbar navbar-default header-blue">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
          <a href="{{ route('ticket.create') }}"><img src="{{url('images/vexe/logo.svg')}}" class="img-responsive logo" style="display: inline-block;">
          </a>
          <button type="button" class="navbar-toggle push-right" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="true">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="col-md-9 col-sm-12 col-xs-12">
          <div class="navbar-collapse collapse in" id="bs-example-navbar-collapse-1" aria-expanded="true">
            <div class=" menu-top ">
              <ul class="nav navbar-nav ul-menu">
                <li><a href="{{ route('ticket.checkedTicket') }}" class="home">Kiểm tra vé </a></li>
                <li><a href="{{ route('ticket.cancelTicket') }}" class="home">Hủy vé </a></li>
                <li><a href="{{ route('ticket.find_history') }}" class="home">Lịch sử đặt vé </a></li>
                <li><a href="{{ route('login') }}" class="home">Đăng nhập </a></li>
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
  <!--trang lien he-->
  
@yield('content')

<div id="backLinkDiv" class="back-links odd-row clearfix hidden-xs hidden-sm">
  <div class="container">
    <div class="clearfix row">
      <div class="col-md-8 col-lg-8 pr0">
        <h3>Hãng xe khách</h3>
      </div>
      <div class="col-md-4 col-lg-4 pr0">
        <h3>Bến xe khách</h3>
      </div>
    </div>
    
    <div class="clearfix row">
      <div class="col-lg-2  col-md-2 pr0">
        <ul id="transporters">
       
          <li><a href="#">Xe Hiếu Hoa </a></li>
          <li><a href="#">Xe Hoàng Khải </a></li>
          <li><a href="#">Xe Hoàng Long </a></li>
          <li><a href="#">Xe Hoàng Nhân </a></li>
          <li><a href="#">Xe Hưng Long </a></li>
          <li><a href="#">Xe Huỳnh Gia </a></li>
          <li><a href="#">Xe Hòa Thuận Anh </a></li>
          <li><a href="#">Xe Camel Travel </a></li>
        </ul>
      </div>
      <div class="col-lg-2  col-md-2 pr0">
        <ul>
          <li><a href="#">Xe Sao Việt </a></li>
          <li><a href="#">Xe Sapa Express </a></li>
          <li><a href="#">Xe Thành Công </a></li>
          <li><a href="#">Xe Phúc Xuyên </a></li>
          <li><a href="#">Xe Phúc Thuận Thảo </a></li>
          <li><a href="#">Xe Thuận Tiến </a></li>
          <li><a href="#">Xe Năm Rùm </a></li>
          <li><a href="#">Xe Phương Heng </a></li>
        </ul>
      </div>
      <div class="col-lg-2  col-md-2 pr0">
        <ul>
          <li><a href="#">Xe Mai Linh </a></li>
          <li><a href="#">Xe Liên Hưng </a></li>
          <li><a href="#">Xe Phương Trang </a></li>
          <li><a href="#">Xe Xe Nhà </a></li>
          <li><a href="#">Xe Kumho Samco </a></li>
          <li><a href="#">Xe Kim Hoàng </a></li>
          <li><a href="#">Xe Quê Hương Phan Rang </a></li>
          <li><a href="#">Xe Hoàng Anh - Phan Rang </a></li>
        </ul>
      </div>
      <div class="col-lg-2  col-md-2 pr0">
        <ul>
          <li><a href="#">Xe Tiến Oanh </a></li>
          <li><a href="#">Xe Tuyết Hon </a></li>
          <li><a href="#">Xe Hà Linh </a></li>
          <li><a href="#">Xe Inter Bus Lines </a></li>
          <li><a href="#">Xe Hoa Mai </a></li>
          <li><a href="#">Xe Thành Bưởi </a></li>
          <li><a href="#">Xe Pumpkin Limousine </a></li>
          <li><a href="#">Xe Mekong Express </a></li>
        </ul>
      </div>
      <div class="col-lg-2 col-md-2  pr0">
        <ul>
          <li><a href="#">Bến xe Miền Đông </a></li>
          <li><a href="#">Bến xe Miền Tây </a></li>
          <li><a href="#">Bến xe An Sương </a></li>
          <li><a href="#">Bến xe Mỹ Đình </a></li>
          <li><a href="#">Bến xe Nước Ngầm </a></li>
          <li><a href="#">Bến xe Tam Bạc </a></li>
        </ul>
      </div>
      <div class="col-lg-2 col-md-2  pr0">
        <ul>
          <li><a href="#">Bến xe Giáp Bát </a></li>
          <li><a href="#">Bến xe Lương Yên </a></li>
          <li><a href="#">Bến xe 91B Cần Thơ </a></li>
          <li><a href="#">Bến xe TT Đà Nẵng </a></li>
          <li><a href="#">Bến xe Đà Nẵng </a></li>
          <li><a href="#">Bến xe Cầu Rào </a></li>
          <li><a href="#">Bến xe Niệm Nghĩa </a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="footer-1">
      <div class="clearfix row">
        <div class="col-md-12 col-lg-12 pr0">
          <h3>Đặt mua vé xe các tuyến đường phổ biến</h3>
        </div>
      </div>
      <div class="clearfix row">
        <div class="col-md-4 col-lg-4 pr0">
          <ul>
            <li><a href="#">Vé xe Sài Gòn - Mũi Né</a></li>
            <li><a href="#">Vé Hà Nội - Tam Cốc Bích Động</a></li>
          </ul>
        </div>
        <div class="col-md-4 col-lg-4 pr0">
          <ul>
            <li><a href="#">Vé xe Hà Nội - Tràng An Bái Đính</a></li>
            <li><a href="#">Vé Hà Nội - Phong Nha Quảng Bình</a></li>
          </ul>
        </div>
        <div class="col-md-4 col-lg-4 pr0">
          <ul>
            <li><a href="#">Vé xe Hà Nội - Cát Bà Hải Phòng</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="footer">

      <div class="container">
        <!-- Copyright -->
        <div class="copyright-panel">
          <div class="col-md-8 footer-info-panel">
            <div class="left-img">
              <a itemprop="url" class="footer-logo" href="/" title="Cổng thông tin vé xe khách lớn nhất Việt Nam">
                <img itemprop="logo" src="{{url('images/vexe/icon-vxr.svg')}}" alt="" class="logo-1 img-responsive">
              </a>
            </div>
            <p>Bản quyền © 2017 thuộc về <span itemprop="name">Khoa học tự nhiên</span></p>
            <p>
              Trường đại học khoa học tự nhiên
              <br> Địa chỉ: Số 334 Nguyễn Trãi - Thanh Xuân - Hà Nội
            </p>
            <!-- <div class="text-p1">
              <p>
                Địa chỉ:
                <a href="#" title="Xem bản đồ" target="_blank"><span itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress"><span itemprop="streetAddress">164 Khuất Duy Tiến,</span>, <span itemprop="addressLocality">Thanh Xuân</span>, <span itemprop="addressRegion">Hà Nội.</span>, <span itemprop="addressCountry">Việt Nam</span></span></a>
              </p>
            </div> -->
            <!-- Start Mixpanel Partner -->
            <div style="float: left">
              <a href="#" rel="nofollow">
                <img src="{{url('images/vexe/badge_light.png')}}" alt="Mobile Analytics" style="width: 1px">
              </a>
            </div>
            <!-- End Mixpanel Partner -->
          </div>
          <div class="col-md-4 certificate-panel">
            <div class="col-md-6 col-sm-3 col-xs-4">
              <img src="{{url('images/vexe/certificate0.png')}}">
            </div>
            <div class="col-md-6  col-sm-3 col-xs-4">
              <img src="{{url('images/vexe/certificate1.png')}}">
            </div>
            <div class="col-md-6 col-sm-3 hidden-xs">
              <a href="#">
                <img src="{{url('images/vexe/certificate2.png')}}">
              </a>
            </div>
            <div class="col-md-6 col-sm-3 col-xs-4">
              <a href="#">
                <img src="{{url('images/vexe/certificate3.png')}}">
              </a>
            </div>
          </div>
          <!-- End Copyright -->
        </div>
      </div>


    </div>
<!-- Include all compiled plugins (below), or include individual files as needed -->

</body>

</html>
