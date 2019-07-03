<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Right Click | Email Template</title>
</head>

<body style="margin:0">
  <div class="wrapper">
   <table width="100%" border="0" border-collapse="collapse"style="border-spacing:0;width:80%;margin:0 auto;">
    <tbody border="0">

     <!-- HEADER STARTS -->
     <tr>
      <td colspan="3" style="background:#ededed;text-align:center; padding:20px;"><a href="#" title="ZHM" rel="home" target="_blank"> <img src="{{asset('public/admin-asset/images/Logo.png')}}" style="width: 175px;" alt="RightClick"> </a></td>

    </tr>
    <!-- HEADER ENDS -->

    <!-- MAIL BODY CONTENT STARTS -->
    <tr style="background:#fafafa">
      <td colspan="3" style="padding:35px; padding-left: 20%;">
        <table>
          <tbody>
            <tr>
              <td style="padding-right: 35px; font-family: Avenir,Helvetica,sans-serif;
              box-sizing: border-box;
              color: #2f3133;
              font-size: 19px;
              font-weight: bold;
              margin-top: 0;
              text-align: left;"><h2>Hello!</h2></td>

            </tr>
            @foreach ($introLines as $line)                             
            <tr>
              <td style="padding-right: 35px; font-family: Avenir,Helvetica,sans-serif;
              box-sizing: border-box;
              color: #74787e;
              font-size: 16px;
              line-height: 1.5em;
              margin-top: 0;
              text-align: left;">{{ $line }}</td>

            </tr>
            @endforeach
            <tr><td style="padding-top: 10px;"><a href="{{$actionUrl}}" style="font-family: Avenir,Helvetica,sans-serif;box-sizing: border-box;border-radius: 3px;color: #fff;display: inline-block;text-decoration: none;background-color: #3097d1;border-top: 10px solid #3097d1;border-right: 18px solid #3097d1;border-bottom: 10px solid #3097d1;border-left: 18px solid #3097d1;">Password Reset Link</a></td>
            </tr>
             @foreach ($outroLines as $line) 
            <tr>
              <td style="padding-right: 35px;">
                <p style="font-family: Avenir,Helvetica,sans-serif;
                box-sizing: border-box;
                color: #74787e;
                font-size: 16px;
                line-height: 1.5em;
                margin-top: 0;
                text-align: left;">
                {{ $line }}
              </p>
            </td>
            @endforeach
            
          </tr>
          <tr>
            <td style="padding-right: 35px;">
              <p style="font-family: Avenir,Helvetica,sans-serif;
              box-sizing: border-box;
              color: #74787e;
              font-size: 16px;
              line-height: 1.5em;
              margin-top: 0;
              text-align: left;"> 
              Regards,<br>
              Right Click
            </p>
          </td>

        </tr> 
      </tbody>
    </table>
  </td>
</tr>
<!-- MAIL BODY CONTENT ENDS -->

<!-- HIGHLIGHTED TEXT STARTS -->
<tr>
  <td colspan="3"><p style="background:#1b2d4f; color:#fff;text-align:center;padding:20px;font-weight:bold;font-size:18px;margin:0;">© 2019 Right Click. All rights reserved. <span></span> </p></td>
</tr>
<!-- HIGHLIGHTED TEXT ENDS -->

<!-- FOOTER STARTS -->

<!-- FOOTER ENDS -->

<!-- FOOTER BOTTOM STARTS -->

<!-- FOOTER BOTTOM ENDS -->
</tbody>
</table>
</div>
</body>
</html>