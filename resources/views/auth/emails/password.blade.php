<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Webadmin Starterkit Password Reset</title>
</head>
<body style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box;width: 100% !important;height: 100%;margin: 0;line-height: 1.4;background-color: #F2F4F6;color: #74787E;-webkit-text-size-adjust: none">
  <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box;width: 100%;margin: 0;padding: 0;background-color: #F2F4F6">
    <tr style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box">
      <td align="center" style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box">
        <table class="email-content" width="100%" cellpadding="0" cellspacing="0" style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box;width: 100%;margin: 0;padding: 0">
          <!-- Logo -->
          <tr style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box">
            <td class="email-masthead" style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box;padding: 25px 0;text-align: center">
              <a class="email-masthead_name" style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box;color: #bbbfc3;font-size: 16px;font-weight: bold;text-decoration: none;text-shadow: 0 1px 0 white">Webadmin Starterkit</a>
            </td>
          </tr>
          <!-- Email Body -->
          <tr style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box">
            <td class="email-body" width="100%" style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box;width: 100%;margin: 0;padding: 0;border-top: 1px solid #EDEFF2;border-bottom: 1px solid #EDEFF2;background-color: #FFF">
              <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box;width: 570px;margin: 0 auto;padding: 0">
                <!-- Body content -->
                <tr style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box">
                  <td class="content-cell" style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box;padding: 35px">
                    <h1 style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box;margin-top: 0;color: #2F3133;font-size: 19px;font-weight: bold;text-align: left">Hi,</h1>
                    <p style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box;margin-top: 0;color: #74787E;font-size: 16px;line-height: 1.5em;text-align: left">You recently requested to reset your password for Webadmin account. Click the button below to reset it.</p>
                    <!-- Action -->
                    <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box;width: 100%;margin: 30px auto;padding: 0;text-align: center">
                      <tr style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box">
                        <td align="center" style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box">
                          <div style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box">
                            <!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}" style="height:45px;v-text-anchor:middle;width:200px;" arcsize="7%" stroke="f" fill="t">
                              <v:fill type="tile" color="#dc4d2f" />
                              <w:anchorlock/>
                              <center style="color:#ffffff;font-family:sans-serif;font-size:15px;">Reset your password</center>
                            </v:roundrect><![endif]-->
                            <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}" class="button button--red" style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box;color: #fff;display: inline-block;width: 200px;background-color: #dc4d2f;border-radius: 3px;font-size: 15px;line-height: 45px;text-align: center;text-decoration: none;-webkit-text-size-adjust: none;mso-hide: all">Reset your password</a>
                          </div>
                        </td>
                      </tr>
                    </table>
                    <p style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box;margin-top: 0;color: #74787E;font-size: 16px;line-height: 1.5em;text-align: left">If you did not request a password reset, please ignore this email. This password reset is only valid for the next 30 minutes.</p>
                    <p style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box;margin-top: 0;color: #74787E;font-size: 16px;line-height: 1.5em;text-align: left"><strong style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box">P.S.</strong> Please do not reply this email</p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box">
            <td style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box">
              <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0" style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box;width: 570px;margin: 0 auto;padding: 0;text-align: center">
                <tr style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box">
                  <td class="content-cell" style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box;padding: 35px">
                    <p class="sub center" style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box;color: #AEAEAE;margin-top: 0;font-size: 12px;line-height: 1.5em;text-align: center">© {{ date('Y') }} Badr Interactive. All rights reserved.</p>
                    <p class="sub center" style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box;color: #AEAEAE;margin-top: 0;font-size: 12px;line-height: 1.5em;text-align: center">
                      PT. Badr Interactive
                      <br style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box" />Komplek Startup Center
                      <br style="font-family: Arial, &quot;Helvetica Neue&quot;, Helvetica, sans-serif;-webkit-box-sizing: border-box;box-sizing: border-box" />Jl. Juanda Raya No. 43, Depok 16418
                    </p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
