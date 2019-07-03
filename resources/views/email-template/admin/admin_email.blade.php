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
                <td colspan="3" style="background:#ededed;text-align:center; padding:20px;">
                    <a href="#" title="ZHM" rel="home" target="_blank">  
                        <img src="{{asset('public/admin-asset/images/Logo.png')}}" style="width: 175px;" alt="RightClick"> 
                    </a>
                </td>
            </tr>
            <!-- HEADER ENDS -->

            <!-- MAIL BODY CONTENT STARTS -->
            <tr style="background:#fafafa">
                <td colspan="3" style="padding:35px;">
                    <table>
                        <tbody>
                            <tr>
                                <td colspan="2"><h2>Your Login Information</h2></td> 
                            </tr>
                            <tr>
                                <td style="padding-right: 35px;">Name</td>
                                <td>{{$name}}</td>
                            </tr>
                            <tr>
                                <td style="padding-right: 35px;">Phone number</td>
                                <td>{{$phone_no}} </td>
                            </tr>
                            <tr>
                                <td style="padding-right: 35px;">Email</td>
                                <td>{{$email}}</td>
                            </tr>
                             <tr>
                                <td style="padding-right: 35px;">Password</td>
                                <td>{{$password}}</td>
                            </tr>
                            <tr>
                                <td style="padding-right: 35px;">Admin Type</td>
                                <td>{{$type}} </td>
                            </tr> 
                            <tr>
                                <td colspan="2"><a href="{{ url('/admin') }}"><h3>Enjoy your account - login </h3></a></td> 
                            </tr> 
                            <tr>
                                <td style="padding-right: 35px; padding-top: 50px;">Best regards</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td style="padding-right: 35px; padding-top: 0px;"> <a href="http://rightclick.com.bd/">Rightclick.com.bd</a></td>
                                <td></td>
                            </tr>
                            
                        </tbody> 
                    </table>
                </td>
            </tr>
            <!-- MAIL BODY CONTENT ENDS -->

            <!-- HIGHLIGHTED TEXT STARTS -->
            <tr>
                <td colspan="3"><p style="background:#1b2d4f; color:#fff;text-align:center;padding:20px;font-weight:bold;font-size:18px;margin:0;">Registration Date and time <span>{{$created_at}}</span> </p></td>
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