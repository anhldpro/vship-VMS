<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Email</title>
</head>
<body>
 <div style="font-family: 'Arial', Arial, Helvetica, sans-serif;color:#333;padding:40px;font-size: 14px;">
      <div style="line-height: 30px;border-bottom: 1px solid #cdd2d2;padding-bottom: 20px;margin-bottom: 40px;overflow: hidden;">
         <table width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                    <td>
                        <p style="font-size: 24px;margin: 0;">Thông Tin Đặt Vé </p>
                    </td>
                </tr>
         </table>
      </div>

        <table  width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom: 40px;">
            <thead>
            <tr>
                <th style="padding: 8px; vertical-align: top;border: 1px solid #ddd;border-left: none;text-align: left;"> Nhà xe</th>
                <th style="padding: 8px; vertical-align: top;border: 1px solid #ddd;border-left: none;text-align: center;">
                   Lộ trình
                </th>
                <th style="padding: 8px; vertical-align: top;border: 1px solid #ddd;border-left: none;text-align: right;">
                    Ngày đi
                </th>
                <th style="padding: 8px; vertical-align: top;border: 1px solid #ddd;border-left: none;text-align: right;">
                    Thời gian đi
                </th>
                @if($datas['date_back']==NULL)
                <th style="padding: 8px; vertical-align: top;border: 1px solid #ddd;border-left: none;text-align: right;display: none;">
                    Ngày về
                </th>
                <th style="padding: 8px; vertical-align: top;border: 1px solid #ddd;border-left: none;text-align: right; display: none;">
                    Thời gian về
                </th>
                @else
                <th style="padding: 8px; vertical-align: top;border: 1px solid #ddd;border-left: none;text-align: right;display: block;">
                    Ngày về
                </th>
                <th style="padding: 8px; vertical-align: top;border: 1px solid #ddd;border-left: none;text-align: right;display: block;">
                    Thời gian về
                </th>
                @endif
                <th style="padding: 8px; vertical-align: top;border: 1px solid #ddd;border-left: none;text-align: right;">
                    Tên Người Đặt
                </th>
                <th style="padding: 8px; vertical-align: top;border: 1px solid #ddd;border-left: none;text-align: right;">
                    Số Điện Thoại
                </th>
                {{-- <th style="padding: 8px; vertical-align: top;border: 1px solid #ddd;border-left: none;text-align: right;">
                    Email
                </th> --}}
                <th style="padding: 8px; vertical-align: top;border: 1px solid #ddd;border-left: none;text-align: right;">
                    Mã Vé
                </th> 
                <th style="padding: 8px; vertical-align: top;border: 1px solid #ddd;border-left: none;text-align: right;">
                    Số lượng vé: 
                </th> 
                <th style="padding: 8px; vertical-align: top;border: 1px solid #ddd;border-left: none;text-align: right;">
                    Loại vé: 
                </th>              
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="background-color: #f5f5f5;padding: 8px; vertical-align: top;border-right: 1px solid #ddd;border-bottom: 1px solid #ddd;">{{ $datas->car_company['name'] }}</td>
                <td style="background-color: #f5f5f5;padding: 8px; vertical-align: top;border-right: 1px solid #ddd;border-bottom: 1px solid #ddd;">
                    <div  style="text-align: center;">{{ $datas->itinerary['slug'] }}</div>
                </td>
                <td style="background-color: #f5f5f5;padding: 8px; vertical-align: top;border-right: 1px solid #ddd;border-bottom: 1px solid #ddd;">
                    <div style="text-align: right;">{{ $datas['date_start'] }}</div>
                </td>
                <td style="background-color: #f5f5f5;padding: 8px; vertical-align: top;border-right: 1px solid #ddd;border-bottom: 1px solid #ddd;">
                    <div style="text-align: right;">{{ $datas['time_start'] }}</div>
                </td>
                @if($datas['date_back']==NULL)
                <td style="background-color: #f5f5f5;padding: 8px; vertical-align: top;border-right: 1px solid #ddd;border-bottom: 1px solid #ddd; display: none;">
                    <div style="text-align: right;">{{ $datas['date_back'] }}</div>
                </td>
                <td style="background-color: #f5f5f5;padding: 8px; vertical-align: top;border-right: 1px solid #ddd;border-bottom: 1px solid #ddd; display: none;">
                    <div style="text-align: right;">{{ $datas['time_back'] }}</div>
                </td>
                @else
                <td style="background-color: #f5f5f5;padding: 8px; vertical-align: top;border-right: 1px solid #ddd;border-bottom: 1px solid #ddd; display: block;">
                    <div style="text-align: right;">{{ $datas['date_back'] }}</div>
                </td>
                <td style="background-color: #f5f5f5;padding: 8px; vertical-align: top;border-right: 1px solid #ddd;border-bottom: 1px solid #ddd; display: block;">
                    <div style="text-align: right;">{{ $datas['time_back'] }}</div>
                </td>
                @endif
                <td style="background-color: #f5f5f5;padding: 8px; vertical-align: top;border-right: 1px solid #ddd;border-bottom: 1px solid #ddd;">
                    <div style="text-align: right;">{{ $datas['name'] }}</div>    
                </td>
                <td style="background-color: #f5f5f5;padding: 8px; vertical-align: top;border-right: 1px solid #ddd;border-bottom: 1px solid #ddd;">
                    <div style="text-align: right;">{{ $datas['phone'] }}</div>    
                </td>
               {{--  <td style="background-color: #f5f5f5;padding: 8px; vertical-align: top;border-right: 1px solid #ddd;border-bottom: 1px solid #ddd;">
                    <div style="text-align: right;">{{ $datas['email'] }}</div>    
                </td> --}}
                <td style="background-color: #f5f5f5;padding: 8px; vertical-align: top;border-right: 1px solid #ddd;border-bottom: 1px solid #ddd;">
                    <div style="text-align: right;">{{ $datas['code'] }}</div>    
                </td>
                <td style="background-color: #f5f5f5;padding: 8px; vertical-align: top;border-right: 1px solid #ddd;border-bottom: 1px solid #ddd;">
                    <div style="text-align: right;">{{ $datas['number_of_ticket'] }}</div>    
                </td>
                <td style="background-color: #f5f5f5;padding: 8px; vertical-align: top;border-right: 1px solid #ddd;border-bottom: 1px solid #ddd;">
                    <div style="text-align: right;">@if ($datas[ 'ticket_type' ] ==1) Vé 1 chiều @else Vé 2 chiều @endif</div>    
                </td>
            </tr>
            </tbody>
        </table>
   </div>

</body>
</html>
