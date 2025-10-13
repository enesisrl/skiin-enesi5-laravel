<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
    <title>{{ config('app.name') }}</title>

    <!--[if mso]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
                <o:AllowPNG/>
                <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->

    <style type="text/css">
        /* Reset CSS per email */
        html, body {
            margin: 0 !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            background-color: #D70F2A;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        /* Rimozione margini automatici Android */
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        /* Outlook spacing fix */
        table, td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        /* Tabelle responsive */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            margin: 0 auto !important;
        }

        /* Immagini responsive */
        img {
            -ms-interpolation-mode: bicubic;
            max-width: 100% !important;
            height: auto !important;
            display: block;
        }

        /* Link styling - prevenzione auto-detection */
        a {
            text-decoration: none;
            /*color: inherit !important;*/
        }

        /* Auto-detection links fix - IMPORTANTE per Gmail */
        *[x-apple-data-detectors],
        .unstyle-auto-detected-links *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* Gmail download button fix */
        .a6S {
            display: none !important;
            opacity: 0.01 !important;
        }

        /* Gmail conversation thread fix */
        .im {
            color: inherit !important;
        }

        /* Gmail image fix */
        img.g-img + div {
            display: none !important;
        }

        /* Container email responsive */
        .email-container {
            max-width: 600px !important;
            width: 100% !important;
            margin: 0 auto !important;
        }

        /* Stili per bottone */
        .button-table {
            margin: 20px auto 0 auto !important;
        }

        .button-cell {
            background-color: #D70F2A !important;
        }

        .button-link {
            background-color: #D70F2A !important;
            color: #ffffff !important;
            text-decoration: none !important;
            padding: 15px 30px !important;
            display: block !important;
            font-family: Arial, sans-serif !important;
            font-size: 16px !important;
            font-weight: bold !important;
        }

        /* Stili per footer - prevenzione auto-detection */
        .footer-text {
            color: #cccccc !important;
            font-family: Arial, sans-serif !important;
            font-size: 12px !important;
            line-height: 18px !important;
        }

        .footer-text span {
            color: #cccccc !important;
        }

        /* Media queries per mobile */
        @media only screen and (max-width: 600px) {
            .email-container {
                width: 100% !important;
                max-width: 100% !important;
            }

            .mobile-text {
                font-size: 14px !important;
                line-height: 20px !important;
            }

            .mobile-title {
                font-size: 24px !important;
                line-height: 28px !important;
            }
        }
    </style>
    <!--[if mso]>
    <style type="text/css">
        .email-container {
            width: 600px !important;
        }
    </style>
    <![endif]-->

</head>
    <body style="margin: 0; padding: 0; background-color: #D70F2A; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #D70F2A;">
            <tr>
                <td style="padding: 20px 0 0 0;">
                    <table class="email-container" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto; max-width: 600px; width: 100%;">
                        <tr>
                            <td class="bg-black" style="background-color: #FFFFFF; padding: 20px 0;">
                                @include('BaseModulePreset::mail.partials.header')
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-black mobile-padding" style="background-color: #FFFFFF; padding: 40px 30px;">
                                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                    <tr>
                                        <td style="text-align: center;">
                                            @yield('content')
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-dark mobile-padding" style="background-color: #F9F9F9; padding: 30px;">
                                @include('BaseModulePreset::mail.partials.footer')
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
