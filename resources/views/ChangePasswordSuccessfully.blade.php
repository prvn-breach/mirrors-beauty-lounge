<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
  <title>Change Password </title>

  <style type="text/css">
    body {
      width: 100%;
      background-color: #e6e7e8;
      margin: 0;
      padding: 0;
      -webkit-font-smoothing: antialiased;
      mso-margin-top-alt: 0px;
      mso-margin-bottom-alt: 0px;
      mso-padding-alt: 0px 0px 0px 0px;
      font-family: 'Gotham', sans-serif;
    }

    p,
    h1,
    h2,
    h3,
    h4 {
      margin-top: 0;
      margin-bottom: 0;
      padding-top: 0;
      padding-bottom: 0;
    }

    span.preheader {
      display: none;
      font-size: 1px;
    }

    html {
      width: 100%;
    }

    table {
      font-size: 12px;
      border: 0;
    }

    .menu-space {
      padding-right: 25px;
    }


    @media only screen and (max-width:640px) {
      body {
        width: auto !important;
      }

      body[yahoo] .main {
        width: 440px !important;
      }

      body[yahoo] .two-left {
        width: 420px !important;
        margin: 0px auto;
      }

      body[yahoo] .full {
        width: 100% !important;
        margin: 0px auto;
      }

      body[yahoo] .alaine {
        text-align: center;
      }

      body[yahoo] .menu-space {
        padding-right: 0px;
      }

      body[yahoo] .banner {
        width: 438px !important;
      }

      body[yahoo] .menu {
        width: 438px !important;
        margin: 0px auto;
        border-bottom: #e1e0e2 solid 1px;
      }

      body[yahoo] .date {
        width: 438px !important;
        margin: 0px auto;
        text-align: center;
      }

      body[yahoo] .two-left-inner {
        width: 400px !important;
        margin: 0px auto;
      }

      body[yahoo] .menu-icon {
        display: block;
      }

      body[yahoo] .two-left-menu {
        text-align: center;
      }

    }

    @media only screen and (max-width:479px) {
      body {
        width: auto !important;
      }

      body[yahoo] .main {
        width: 310px !important;
      }

      body[yahoo] .two-left {
        width: 300px !important;
        margin: 0px auto;
      }

      body[yahoo] .full {
        width: 100% !important;
        margin: 0px auto;
      }

      body[yahoo] .alaine {
        text-align: center;
      }

      body[yahoo] .menu-space {
        padding-right: 0px;
      }

      body[yahoo] .banner {
        width: 308px !important;
      }

      body[yahoo] .menu {
        width: 308px !important;
        margin: 0px auto;
        border-bottom: #e1e0e2 solid 1px;
      }

      body[yahoo] .date {
        width: 308px !important;
        margin: 0px auto;
        text-align: center;
      }

      body[yahoo] .two-left-inner {
        width: 280px !important;
        margin: 0px auto;
      }

      body[yahoo] .menu-icon {
        display: none;
      }

      body[yahoo] .two-left-menu {
        width: 310px !important;
        margin: 0px auto;
      }


    }
  </style>

</head>

<body yahoo="fix" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">


  <!--Main Table Start-->

  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#e6e7e8"
    style="background:#e6e7e8;">
    <tr>
      <td align="center" valign="top">


        <!--Top Space Start-->

        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="top">
              <table width="650" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
                <tr>
                  <td height="80" align="center" valign="middle" bgcolor="#e6e7e8" style="background:#e6e7e8;">
                    <table border="0" cellspacing="0" cellpadding="0" class="two-left">
                      <tr>
                        <td align="center"
                          style="font-family: 'Gotham', sans-serif; font-size:13px; color:#333; font-weight:normal;line-height:22px;"
                          mc:edit="view">
                          <multiline>You can&rsquo;t see this email? <a href="#"
                              style="text-decoration:none; color:#0d9450;">View it in your browser.</a></multiline>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

        <!--Top Space End-->


        <!--Banner part Start-->

        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="top">
              <table width="650" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
                <tr>
                  <td height="333" align="center" valign="top" bgcolor="#0f0c0b"
                    style="background: url({{ $message->embed(public_path('images/email-template-images/pwd-bg.jpg')) }}) #0f0c0b no-repeat; height:350px;">
                    <table width="595" border="0" align="center" cellpadding="0" cellspacing="0" class="two-left">
                      <tr>
                        <td height="40" align="center" valign="top" style="line-height:40px;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center" valign="top">


                          <!--Logo Start-->

                          <table border="0" align="left" cellpadding="0" cellspacing="0" class="two-left">
                            <tr>
                              <td align="center" valign="top"><a href="#"><img mc:edit="logo" editable="true"
                                    src="{{ $message->embed(public_path('images/email-template-images/logo.png')) }}" width="112" height="27" style="display:block;" alt="" /></a>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" valign="top">&nbsp;</td>
                            </tr>
                          </table>

                          <!--Logo End-->


                          <!--Date Start-->

                          <table border="0" align="right" cellpadding="0" cellspacing="0" class="two-left">
                            <tr>
                              <td align="center" valign="top"
                                style="font-family: 'Gotham', sans-serif; font-size:14px; color:#FFF; font-weight:normal; padding-top:6px;"
                                mc:edit="date">
                                <multiline>{{ date('d/m/Y') }}, {{ date('H:i A') }}</multiline>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" valign="top">&nbsp;</td>
                            </tr>
                          </table>

                          <!--Date End-->


                        </td>
                      </tr>
                      <tr>
                        <td height="100" align="center" valign="top" style="line-height:100px;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center" valign="top">

                          <!--Banner Text Start-->

                          <table width="500" border="0" align="center" cellpadding="0" cellspacing="0" class="two-left">
                            <tr>
                              <td align="center" valign="top"
                                style="font-family: 'Gotham', sans-serif; font-size:40px; color:#FFF; font-weight:500;"
                                mc:edit="banner-title">
                                <multiline>Online Shopping Portal </multiline>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" valign="top">&nbsp;</td>
                            </tr>
                          </table>

                          <!--Banner Text End-->

                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

        <!--Banner part End-->

        <!--Single-post-text Start-->

        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="top">
              <table width="650" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
                <tr>
                  <td align="center" valign="top" bgcolor="#ff9ba1" style="background:#ff9ba1;">
                    <table width="560" border="0" align="center" cellpadding="0" cellspacing="0" class="two-left">
                      <tr>
                        <td height="60" align="left" valign="top" style="line-height:24px;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" valign="top">
                          <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                              <td align="center" valign="top"
                                style="font-family: 'Gotham', sans-serif; font-size:26px; color:#FFF; font-weight:500;"
                                mc:edit="single-post-image-title">
                                <multiline>Change Password </multiline>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" valign="top"
                                style="font-family: 'Gotham', sans-serif; font-size:16px; color:#FFF; font-weight:300; padding-top:10px;"
                                mc:edit="single-post-image-inner">
                                <multiline>You are successfully changed password</multiline>
                              </td>
                            </tr>
                          </table>
                          <table width="385" border="0" align="center" cellpadding="0" cellspacing="0" class="two-left">
                          <tbody>
                            <tr>
                              <td align="center" valign="top">
                                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                  <tbody>
                                    <tr>
                                      <td align="center" valign="top">
                                        <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tbody>
                                            <tr>
                                              <td height="20" align="center" valign="top" style="line-height:20px;">
                                                &nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td height="42" align="center" valign="middle" bgcolor="#000000" style="background:#000000; font-family: 'Gotham', sans-serif; font-size:16px; color:#FFF; font-weight:normal; line-height:24px; -moz-border-radius: 4px;border-radius: 4px;" mc:edit="have-qustion-button">
                                                <multiline><a href="{{ env('APP_URL') }}" target="_blank" style="color:#FFF; text-decoration:none;"> Shop Now </a></multiline>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td align="center" valign="top">&nbsp;</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        </td>
                      </tr>
                      <tr>
                        <td height="60" align="left" valign="top" style="line-height:35px;">&nbsp;</td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table> 

 
      




        <!--Service list 1 Start-->

        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="top">
              <table width="650" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
                <tr>
                  <td align="center" valign="top" bgcolor="#FFFFFF" style="background:#FFFFFF;">
                    <table width="560" border="0" cellspacing="0" cellpadding="0" class="two-left">
                      <tr>
                        <td align="left" valign="top">

                          <!--Service 1 Start-->

                          <table width="270" border="0" align="left" cellpadding="0" cellspacing="0" class="two-left">
                            <tr>
                              <td align="left" valign="top">
                                <table width="270" border="0" align="left" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td height="35" align="left" valign="top" style="line-height:35px;">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="top">


                                      <table width="70" border="0" align="left" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td height="65" align="center" valign="middle" bgcolor="#e6e7e8"
                                            style="background:#e6e7e8;-moz-border-radius: 6px;border-radius: 6px;"><img
                                              mc:edit="service-icon1" editable="true" src="{{$message->embed(public_path('images/email-template-images/point-1.png'))}}"
                                              width="32" height="32" style="display:block;" alt="" /></td>
                                        </tr>
                                      </table>

                                      <table width="180" border="0" align="right" cellpadding="0" cellspacing="0">

                                        <tr>
                                          <td align="left" valign="top">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td align="left" valign="top"
                                                  style="font-family: 'Gotham', sans-serif; font-size:16px; color:#3f3d3d; font-weight:500;"
                                                  mc:edit="service-icon1-title">
                                                  <multiline>Trusted Shipping </multiline>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td align="left" valign="top"
                                                  style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#767575; font-weight:normal;line-height:20px; padding:4px 0px 4px 0px;"
                                                  mc:edit="service-icon1-inner">
                                                  <multiline>Lorem Ipsum is dummy page looking its layou [..]
                                                  </multiline>
                                                </td>
                                              </tr>
                                            </table>
                                          </td>
                                        </tr>
                                      </table>

                                    </td>
                                  </tr>
                                  <tr>
                                    <td height="40" align="left" valign="top" style="line-height:40px;">&nbsp;</td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>


                          <!--Service 1 End-->


                          <!--Service 2 Start-->

                          <table width="270" border="0" align="right" cellpadding="0" cellspacing="0" class="two-left">
                            <tr>
                              <tr>
                                <td height="35" align="left" valign="top" style="line-height:35px;">&nbsp;</td>
                              </tr>
                              <td align="left" valign="top">
                                <table width="270" border="0" align="left" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td align="left" valign="top">


                                      <table width="70" border="0" align="left" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td height="65" align="center" valign="middle" bgcolor="#e6e7e8"
                                            style="background:#e6e7e8; -moz-border-radius: 6px;border-radius: 6px;"><img
                                              mc:edit="service-icon2" editable="true" src="{{$message->embed(public_path('images/email-template-images/point-2.png'))}}"
                                              width="32" height="32" style="display:block;" alt="" /></td>
                                        </tr>
                                      </table>

                                      <table width="180" border="0" align="right" cellpadding="0" cellspacing="0">

                                        <tr>
                                          <td align="left" valign="top">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td align="left" valign="top"
                                                  style="font-family: 'Gotham', sans-serif; font-size:16px; color:#3f3d3d; font-weight:500;"
                                                  mc:edit="service-icon2-title">
                                                  <multiline>Standard Delivery </multiline>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td align="left" valign="top"
                                                  style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#767575; font-weight:normal;line-height:20px; padding:4px 0px 4px 0px;"
                                                  mc:edit="service-icon2-inner">
                                                  <multiline>Lorem Ipsum is dummy page looking its layou [..]
                                                  </multiline>
                                                </td>
                                              </tr>
                                            </table>
                                          </td>
                                        </tr>
                                      </table>

                                    </td>
                                  </tr>
                                  <tr>
                                    <td height="40" align="left" valign="top" style="line-height:40px;">&nbsp;</td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>


                          <!--Service 2 End-->

                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

        <!--Service list 1 End-->


        <!--Service list 2 Start-->

        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="top">
              <table width="650" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
                <tr>
                  <td align="center" valign="top" bgcolor="#FFFFFF" style="background:#FFFFFF;">
                    <table width="560" border="0" cellspacing="0" cellpadding="0" class="two-left">
                      <tr>
                        <td align="left" valign="top">

                          <!--Service 3 Start-->

                          <table width="270" border="0" align="left" cellpadding="0" cellspacing="0" class="two-left">
                            <tr>
                              <td align="left" valign="top">
                                <table width="270" border="0" align="left" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td align="left" valign="top">


                                      <table width="70" border="0" align="left" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td height="65" align="center" valign="middle" bgcolor="#e6e7e8"
                                            style="background:#e6e7e8;-moz-border-radius: 6px;border-radius: 6px;"><img
                                              mc:edit="service-icon3" editable="true" src="{{$message->embed(public_path('images/email-template-images/point-3.png'))}}"
                                              width="32" height="32" style="display:block;" alt="" /></td>
                                        </tr>
                                      </table>

                                      <table width="180" border="0" align="right" cellpadding="0" cellspacing="0">

                                        <tr>
                                          <td align="left" valign="top">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td align="left" valign="top"
                                                  style="font-family: 'Gotham', sans-serif; font-size:16px; color:#3f3d3d; font-weight:500;"
                                                  mc:edit="service-icon3-title">
                                                  <multiline>Return Policy</multiline>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td align="left" valign="top"
                                                  style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#767575; font-weight:normal;line-height:20px; padding:4px 0px 4px 0px;"
                                                  mc:edit="service-icon3-inner">
                                                  <multiline>Lorem Ipsum is dummy page looking its layou [..]
                                                  </multiline>
                                                </td>
                                              </tr>
                                            </table>
                                          </td>
                                        </tr>
                                      </table>

                                    </td>
                                  </tr>
                                  <tr>
                                    <td height="35" align="left" valign="top" style="line-height:35px;">&nbsp;</td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>


                          <!--Service 3 End-->

                          <!--Service 4 Start-->

                          <table width="270" border="0" align="right" cellpadding="0" cellspacing="0" class="two-left">
                            <tr>
                              <td align="left" valign="top">
                                <table width="270" border="0" align="left" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td align="left" valign="top">


                                      <table width="70" border="0" align="left" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td height="65" align="center" valign="middle" bgcolor="#e6e7e8"
                                            style="background:#e6e7e8;-moz-border-radius: 6px;border-radius: 6px;"><img
                                              mc:edit="service-icon4" editable="true" src="{{$message->embed(public_path('images/email-template-images/point-4.png'))}}"
                                              width="32" height="32" style="display:block;" alt="" /></td>
                                        </tr>
                                      </table>

                                      <table width="180" border="0" align="right" cellpadding="0" cellspacing="0">

                                        <tr>
                                          <td align="left" valign="top">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tr>
                                                <td align="left" valign="top"
                                                  style="font-family: 'Gotham', sans-serif; font-size:16px; color:#3f3d3d; font-weight:500;"
                                                  mc:edit="service-icon4-title">
                                                  <multiline>Secure Payment </multiline>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td align="left" valign="top"
                                                  style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#767575; font-weight:normal;line-height:20px; padding:4px 0px 4px 0px;"
                                                  mc:edit="service-icon4-inner">
                                                  <multiline>Lorem Ipsum is dummy page looking its layou [..]
                                                  </multiline>
                                                </td>
                                              </tr>
                                            </table>
                                          </td>
                                        </tr>
                                      </table>

                                    </td>
                                  </tr>
                                  <tr>
                                    <td height="35" align="left" valign="top" style="line-height:35px;">&nbsp;</td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>


                          <!--Service 4 End-->

                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      

        <!--Footer-contact-info Start-->

        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="top">
              <table width="650" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
                <tr>
                  <td align="center" valign="top" bgcolor="#9f9f9f" style="background:#9f9f9f;">
                    <table width="580" border="0" align="center" cellpadding="0" cellspacing="0" class="two-left">
                      <tr>
                        <td align="left" valign="top">
                          <table width="400" border="0" align="left" cellpadding="0" cellspacing="0" class="two-left">
                            <tr>
                              <td align="left" valign="top">


                                <!--Our location Start-->

                                <table width="210" border="0" align="left" cellpadding="0" cellspacing="0"
                                  class="two-left">
                                  <tr>
                                    <td height="35" align="left" valign="top" style="line-height:30px;">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td height="22" align="left" valign="top" style="line-height:22px;">
                                      <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td align="left" valign="top"
                                            style="font-family:Verdana, Geneva, sans-serif; font-size:18px; color:#FFF; font-weight:normal; padding-bottom:12px;"
                                            mc:edit="our-location-title">
                                            <multiline>Our Location</multiline>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td align="left" valign="top"
                                            style="font-family:Verdana, Geneva, sans-serif; font-size:13px; color:#FFF; font-weight:normal; line-height:22px;"
                                            mc:edit="our-location-inner">
                                            <multiline>Al rigga, Dubai, UAE</multiline>
                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td height="35" align="left" valign="top" style="line-height:35px;">&nbsp;</td>
                                  </tr>
                                </table>

                                <!--Our location End-->


                                <!--Contact info Start-->

                                <table width="160" border="0" align="right" cellpadding="0" cellspacing="0"
                                  class="two-left">
                                  <tr>
                                    <td height="35" align="left" valign="top" style="line-height:30px;">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="top">
                                      <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td align="left" valign="top"
                                            style="font-family:Verdana, Geneva, sans-serif; font-size:18px; color:#FFF; font-weight:normal; padding-bottom:12px;"
                                            mc:edit="our-contact-info-title">
                                            <multiline>Contact Info</multiline>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td align="left" valign="top"
                                            style="font-family:Verdana, Geneva, sans-serif; font-size:13px; color:#FFF; font-weight:normal; line-height:22px;"
                                            mc:edit="our-contact-info-inner">
                                            <multiline>info@mirrorssupport.com<br />
                                              04 204 9494</multiline>
                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td height="35" align="left" valign="top" style="line-height:30px;">&nbsp;</td>
                                  </tr>
                                </table>

                                <!--Contact info End-->

                              </td>
                            </tr>
                          </table>


                          <!--Follow us Start-->

                          <table width="150" border="0" align="right" cellpadding="0" cellspacing="0" class="two-left">
                            <tr>
                              <td height="35" align="left" valign="top" style="line-height:30px;">&nbsp;</td>
                            </tr>
                            <tr>
                              <td align="left" valign="top">
                                <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td align="left" valign="top"
                                      style="font-family:Verdana, Geneva, sans-serif; font-size:18px; color:#FFF; font-weight:normal; padding-bottom:12px;"
                                      mc:edit="follow-us-title">
                                      <multiline>Follow Us</multiline>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td align="left" valign="top">
                                      <table width="150" border="0" align="left" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td align="center" valign="top">
                                            <table width="100%" border="0" align="center" cellpadding="0"
                                              cellspacing="0">
                                              <tr>
                                                <td align="center" valign="top"><img mc:edit="facebook" editable="true"
                                                    src="{{$message->embed(public_path('images/email-template-images/facebook.png'))}}" width="22" height="22"
                                                    style="display:block;" alt="" /></td>
                                              </tr>
                                            </table>
                                          </td>
                                          <td align="center" valign="top">
                                            <table width="100%" border="0" align="center" cellpadding="0"
                                              cellspacing="0">
                                              <tr>
                                                <td align="center" valign="top"><img mc:edit="twitter" editable="true"
                                                    src="{{$message->embed(public_path('images/email-template-images/twitter.png'))}}" width="22" height="22"
                                                    style="display:block;" alt="" /></td>
                                              </tr>
                                            </table>
                                          </td>
                                          <td align="center" valign="top">
                                            <table width="100%" border="0" align="center" cellpadding="0"
                                              cellspacing="0">
                                              <tr>
                                                <td align="center" valign="top"><img mc:edit="google-plus"
                                                    editable="true" src="{{$message->embed(public_path('images/email-template-images/insta.png'))}}" width="22" height="22"
                                                    style="display:block;" alt="" /></td>
                                              </tr>
                                            </table>
                                          </td>
                                          <td align="center" valign="top">
                                            <table width="100%" border="0" align="center" cellpadding="0"
                                              cellspacing="0">
                                              <tr>
                                                <td align="center" valign="top"><img mc:edit="youtube" editable="true"
                                                    src="{{$message->embed(public_path('images/email-template-images/you-tube.png'))}}" width="22" height="22"
                                                    style="display:block;" alt="" /></td>
                                              </tr>
                                            </table>
                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                            <tr>
                              <td height="35" align="left" valign="top" style="line-height:30px;">&nbsp;</td>
                            </tr>
                          </table>
                          <!--Follow us End-->
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        <!--Footer-contact-info End-->

        <!--Copyright part Start-->
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="top">
              <table width="650" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
                <tr>
                  <td align="center" valign="top" bgcolor="#FFFFFF" style="background:#FFFFFF;">
                    <table width="580" border="0" align="center" cellpadding="0" cellspacing="0" class="two-left">
                      <tr>
                        <td height="20" align="center" valign="top" style="line-height:20px;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center" valign="top">

                          <table border="0" align="left" cellpadding="0" cellspacing="0" class="two-left">
                            <tr>
                              <td align="left" valign="top"
                                style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#3f3d3d; font-weight:normal;line-height:20px;"
                                mc:edit="copy-right">
                                <multiline>Copyright &copy; 2021 Mirrors. All right reserved</multiline>
                              </td>
                            </tr>
                          </table>

                          <table border="0" align="right" cellpadding="0" cellspacing="0" class="two-left">
                            <tr>
                              <td align="left" valign="top"
                                style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#3f3d3d; font-weight:normal;line-height:20px;"
                                mc:edit="support">
                                <multiline>Support /</multiline>
                                <unsubscribe> Unsubscribe </unsubscribe>
                              </td>
                            </tr>
                          </table>

                        </td>
                      </tr>
                      <tr>
                        <td height="20" align="center" valign="top" style="line-height:20px;">&nbsp;</td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        <!--Copyright part End-->
        <!--Bottom space Start-->
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="top">
              <table width="650" border="0" align="center" cellpadding="0" cellspacing="0" class="main">
                <tr>
                  <td height="80" align="center" valign="top" bgcolor="#e6e7e8"
                    style="background:#e6e7e8; line-height:80px;">&nbsp;</td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        <!--Bottom space End-->
      </td>
    </tr>
  </table>
  <!--Main Table End-->
</body>
</html>