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
                <th style="padding: 8px; vertical-align: top;border: 1px solid #ddd;border-left: none;text-align: left;"> Name</th>
                <th style="padding: 8px; vertical-align: top;border: 1px solid #ddd;border-left: none;text-align: center;">
                   Phone
                </th>
                <th style="padding: 8px; vertical-align: top;border: 1px solid #ddd;border-left: none;text-align: right;">
                    Email
                </th>
                <th style="padding: 8px; vertical-align: top;border: 1px solid #ddd;border-left: none;text-align: right;">
                    Content
                </th>      
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="background-color: #f5f5f5;padding: 8px; vertical-align: top;border-right: 1px solid #ddd;border-bottom: 1px solid #ddd;">{{ $datas['name']}}</td>
                <td style="background-color: #f5f5f5;padding: 8px; vertical-align: top;border-right: 1px solid #ddd;border-bottom: 1px solid #ddd;">
                    <div  style="text-align: center;">{{ $datas->['phone'] }}</div>
                </td>
                <td style="background-color: #f5f5f5;padding: 8px; vertical-align: top;border-right: 1px solid #ddd;border-bottom: 1px solid #ddd;">
                    <div style="text-align: right;">{{ $datas['email'] }}</div>
                </td>
                <td style="background-color: #f5f5f5;padding: 8px; vertical-align: top;border-right: 1px solid #ddd;border-bottom: 1px solid #ddd;">
                    <div style="text-align: right;">{{ $datas['content'] }}</div>
                </td>
               
            
            </tr>
            </tbody>
        </table>
   </div>

</body>
</html>
