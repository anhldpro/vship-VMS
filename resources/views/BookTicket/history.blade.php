<!DOCTYPE html>
<html>
<head>
  <title>thanh toan ve xe</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
                    <img src="../images/vexe/logo.svg" class="logo img-reponsive"></a>
                </div>
                <div class="col-md-6 middle text-center">
                    <p class="text-white">Mua vé online, cùng góp phần vào sứ mệnh</p>
                    <h5 class="h5-tt">VÌ HÀNG TRIỆU NGƯỜI VIỆT NAM KHÔNG AI PHẢI XẾP HÀNG MUA VÉ</h5>
                </div>
            </div>
        </div>
    </nav>  
</header> <!--header-->
<div id="page-thanhtoan">
  <div class="container">
    <div class="row">
      <div class="table-scrollable">
        <table class="table table-striped table-bordered table-hover" id="sample_1">
            <thead>
                <tr>
                  <th style="text-align: center;">{{trans('news.admin_stt')}}</th>
                  <th style="text-align: center;">Lộ trình</th>
                  <th style="text-align: center;">Nhà Xe</th>
                  <th style="text-align: center;">Ngày đi</th>
                  <th style="text-align: center;">Tên người đặt</th>
                  <th style="text-align: center;">Email người đặt</th>
                  <th style="text-align: center;">Mã vé</th>
                </tr>
                
            </thead>
            <tbody>
                   <?php $id=1 ?>   
                  @if($history) @foreach($history as $key => $list)
                      <tr>
                        <td style="text-align: center;">{{ $id++ }}</td>
                        <td style="text-align: center;">{{ $list->itinerary['slug']  }}</td>
                        <td style="text-align: center;">{{ $list->car_company['name'] }}</td>
                        <td style="text-align: center;">{{ $list->date_start }}</td>
                        <td style="text-align: center;">{{ $list->name }}</td>
                        <td style="text-align: center;">{{ $list->email }}</td>     
                        <td style="text-align: center;">{{ $list->code }}</td>     
                   
                </tr>
                  @endforeach
                  @else
                  <tr>
                    <td colspan="4" class="text-center"> {{trans('admin.admin_no')}}</td>
                  </tr>
                 @endif
            </tbody>
               
        </table>
          <div class="form-actions text-center">
         <div class="col-xs-12 col-sm-12" style="margin-top: 20px;">
           <a href="{{route('ticket.find_history')}}" class="btn btn-outline green button-pre btn-circle"> {{trans('news.admin_back')}}
           </a>               
         </div>
      </div>
    </div>
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
                <a class="text-link" href="#" >Điều khoản sử dụng</a> của VeXeRe.com</p>
            </div>
        </div>
    </div>
</footer>


  
</body>
</html>