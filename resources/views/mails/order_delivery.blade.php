<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title></title>
    <!--[if (mso 16)]>
    <style type="text/css">
        a {
            text-decoration: none;
        }
    </style>
    <![endif]-->
    <!--[if gte mso 9]>
    <style>sup {
        font-size: 100% !important;
    }</style><![endif]-->
    <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG></o:AllowPNG>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
    <!--[if gte mso 9]>
    <style>sup {
        font-size: 100% !important;
    }</style><![endif]-->
    <!--[if !mso]><!-- -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet">
    <!--<![endif]-->
</head>

<body>
<div dir="ltr" class="es-wrapper-color">
    <!--[if gte mso 9]>
    <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
        <v:fill type="tile" color="#f8f9fd"></v:fill>
    </v:background>
    <![endif]-->
    <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td class="esd-email-paddings" valign="top">
                <table cellpadding="0" cellspacing="0" class="esd-header-popover es-header" align="center">
                    <tbody>
                    <tr>
                        <td class="esd-stripe" align="center">
                            <table bgcolor="#ffffff" class="es-header-body" align="center" cellpadding="0"
                                   cellspacing="0" width="500">
                                <tbody>
                                <tr>
                                    <td class="esd-structure es-p10t es-p15b es-p30r es-p30l" align="left">
                                        <table cellpadding="0" cellspacing="0" width="100%">
                                            <tbody>
                                            <tr>
                                                <td width="440" class="esd-container-frame" align="center" valign="top">
                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody>
                                                        <tr>
                                                            <td align="center" class="esd-block-image"
                                                                style="font-size: 0px;"><img
                                                                    src="{{ asset('web_assets/images/REBEL-LOGO.png') }}"
                                                                    alt="logo" style="display: block;" width="245">
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table cellpadding="0" cellspacing="0" class="es-content" align="center">
                    <tbody>
                    <tr>
                        <td class="esd-stripe" align="center" bgcolor="#f8f9fd" style="background-color: #f8f9fd;">
                            <table bgcolor="transparent" class="es-content-body" align="center" cellpadding="0"
                                   cellspacing="0" width="500" style="background-color: transparent;">
                                <tbody>
                                <tr>
                                    <td class="esd-structure es-p20t es-p10b es-p20r es-p20l" align="left">
                                        <table cellpadding="0" cellspacing="0" width="100%">
                                            <tbody>
                                            <tr>
                                                <td width="460" class="esd-container-frame" align="center" valign="top">
                                                    <table cellpadding="0" cellspacing="0" width="100%">
                                                        <tbody>
                                                        <tr>
                                                            <td align="center" class="esd-block-text">
                                                                <p style="line-height: 150%; font-size: 24px;">{{ $order->code }}</p>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table cellpadding="0" cellspacing="0" class="es-content" align="center">
                    <tbody>
                    <tr>
                        <td class="esd-stripe" align="center" bgcolor="#f8f9fd" style="background-color: #f8f9fd;">
                            <table bgcolor="transparent" class="es-content-body" align="center" cellpadding="0"
                                   cellspacing="0" width="500" style="background-color: transparent;">
                                <tbody>
                                @php
                                    $items = json_decode($order->products)
                                @endphp
                                @foreach($items as $product)
                                    <tr>
                                        <td class="esd-structure es-p20t es-p10b es-p20r es-p20l" align="left">
                                            <table cellpadding="0" cellspacing="0" width="100%">
                                                <tbody>
                                                <tr>
                                                    <td class="es-m-p0r esd-container-frame es-m-p20b" width="460"
                                                        align="center" esdev-config="h1">
                                                        <table width="100%" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                            <tr>
                                                                <td class="esd-block-image es-p20r es-p20l"
                                                                    align="center">
                                                                    <img class="adapt-img"
                                                                         src="{{ asset($product->image) }}"
                                                                         alt="Product Image" style="display: block;"
                                                                         width="99"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="esd-block-text es-p5t es-p5b" align="center">
                                                                    <p class="product-name">{{ $product->name }}
                                                                        - {{ $product->pivot->size }}
                                                                        * {{ $product->pivot->quantity }}</p>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table cellpadding="0" cellspacing="0" class="es-content" align="center">
                    <tbody>
                    <tr>
                        <td class="esd-stripe" align="center" bgcolor="#f8f9fd" style="background-color: #f8f9fd;">
                            <table bgcolor="transparent" class="es-content-body" align="center" cellpadding="0"
                                   cellspacing="0" width="500" style="background-color: transparent;">
                                <tbody>
                                <tr>
                                    <td class="esd-structure es-p20t es-p10b es-p20r es-p20l" align="left">
                                        <table cellpadding="0" cellspacing="0" width="100%">
                                            <tbody>
                                            <tr>
                                                <td class="es-m-p0r esd-container-frame es-m-p20b" width="460"
                                                    align="center">
                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                        <tr>
                                                            <td align="left" class="esd-block-text">
                                                                <p>Your order has been delivered!<br>Check your account
                                                                    points' balance on the website now!<br></p>
                                                                <p><br></p>
                                                                <p>If you have any problems with your order please
                                                                    contact us immediately.</p>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table cellpadding="0" cellspacing="0" class="es-content esd-footer-popover" align="center">
                    <tbody>
                    <tr>
                        <td class="esd-stripe" align="center" bgcolor="#f8f9fd" style="background-color: #f8f9fd;">
                            <table bgcolor="transparent" class="es-content-body" align="center" cellpadding="0"
                                   cellspacing="0" width="500" style="background-color: transparent;">
                                <tbody>
                                <tr>
                                    <td class="esd-structure es-p20t es-p10b es-p20r es-p20l" align="left">
                                        <table cellpadding="0" cellspacing="0" width="100%">
                                            <tbody>
                                            <tr>
                                                <td class="es-m-p0r esd-container-frame es-m-p20b" width="460"
                                                    align="center">
                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                        <tr>
                                                            <td align="left" class="esd-block-text">
                                                                <p style="line-height: 150%; font-size: 14px;"><br></p>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>

</html>
