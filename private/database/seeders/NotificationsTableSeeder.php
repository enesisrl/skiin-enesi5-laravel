<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NotificationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('notifications')->delete();
        
        \DB::table('notifications')->insert(array (
            0 => 
            array (
                'id' => '01990e6b-28a3-7275-814e-336c33e00c2e',
                'model_type' => 'Master\\Modules\\AppUsers\\Models\\AppUser',
                'model_id' => '019909de-5cc5-72cb-948f-e46f9eec9af2',
                'recipients' => '["emanuele.toffolon@enesi.it"]',
                'message_type' => NULL,
                'date_sent' => '2025-09-03 07:12:07',
                'subject' => 'Credenziali di accesso a MyCampo',
                'message' => '<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<title>CampoDeiFiori</title>

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
<body style="margin: 0; padding: 0; background-color: #D70F2A; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #D70F2A;">
<tr>
<td style="padding: 20px 0 0 0;">
<table class="email-container" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto; max-width: 600px; width: 100%;">
<tr>
<td class="bg-black" style="background-color: #FFFFFF; padding: 20px 0;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center; padding: 15px 20px;">
<img src="https://my.campodeifiori.cc/assets/mail/images/logo-email.jpg"
alt="CampoDeiFiori"
width="300"
height="auto"
style="display: block; margin: 0 auto; max-width: 300px; height: auto;">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-black mobile-padding" style="background-color: #FFFFFF; padding: 40px 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">

<h1 class="heading-large text-white font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 28px; line-height: 34px; font-weight: 400; margin: 0 0 20px 0; text-align: center;">
Nuove credenziali
di accesso a MyCampo
</h1>

<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="text-body text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 22px; font-weight: 400; margin: 0 0 30px 0; text-align: center;">
Ciao ,<br />
come richiesto di seguito trovi le tue nuove credenziali di accesso all\'app MyCampo:<br />
<br />
E-mail: <strong>emanuele.toffolon@enesi.it</strong><br />
Password temporanea: <strong>38563630</strong><br />
<br />
Eseguito l\'accesso provvedi ad impostare una nuova password
</td>
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
<td class="bg-dark mobile-padding" style="background-color: #F9F9F9; padding: 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: left;">
<div class="text-small text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight: 400;">

<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>Consorzio degli Operatori del Centro Commerciale Campo dei Fiori</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>viale Ticino, 82</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span >21026 Gavirate (VA)</span><p>
</div>
</td>
</tr>
</table>                            </td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                'attachments' => NULL,
                'additional_info' => NULL,
                'status' => 'sent',
                'delayed_send_date' => NULL,
                'readings' => NULL,
                'created_at' => '2025-09-03 07:12:07',
                'updated_at' => '2025-09-03 07:12:07',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => '01990f02-7714-71e1-b353-b48ce30aad0a',
                'model_type' => 'Master\\Modules\\AppUsers\\Models\\AppUser',
                'model_id' => '0198f0a7-a01c-701f-a906-f23b3d65f80f',
                'recipients' => '["emanuele@enesi.it"]',
                'message_type' => NULL,
                'date_sent' => '2025-09-03 09:57:23',
                'subject' => 'MyCampo - Conferma account',
                'message' => '<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<title>CampoDeiFiori</title>

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
<body style="margin: 0; padding: 0; background-color: #D70F2A; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #D70F2A;">
<tr>
<td style="padding: 20px 0 0 0;">
<table class="email-container" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto; max-width: 600px; width: 100%;">
<tr>
<td class="bg-black" style="background-color: #FFFFFF; padding: 20px 0;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center; padding: 15px 20px;">
<img src="https://my.campodeifiori.cc/assets/mail/images/logo-email.jpg"
alt="CampoDeiFiori"
width="300"
height="auto"
style="display: block; margin: 0 auto; max-width: 300px; height: auto;">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-black mobile-padding" style="background-color: #FFFFFF; padding: 40px 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">

<h1 class="heading-large text-white font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 28px; line-height: 34px; font-weight: 400; margin: 0 0 20px 0; text-align: center;">
Benvenuto sull\'app MyCampo
</h1>

<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="text-body text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 22px; font-weight: 400; margin: 0 0 30px 0; text-align: center;">
Grazie per esserti registrato nella nostra app MyCampo.<br><br><strong>E’ necessario confermare la tua iscrizione entro 7 giorni.</strong>
<br /><br />
<table class="btn-table" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 20px auto 0 auto;">
<tr>
<td class="btn-cell" style="background-color: #436A62; border-radius: 0;">
<!--[if mso]>
<v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://marelli.dimsport.enesi.vm/it/account-confirmation/24ea6ed6-b5ed-462f-bd8c-5f55358128c7" style="height:50px;v-text-anchor:middle;width:200px;" arcsize="0%" stroke="f" fillcolor="#436A62">
<w:anchorlock/>
<center style="color:#1e1e1e;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;font-weight:600;">Conferma account</center>
</v:roundrect>
<![endif]-->
<!--[if !mso]><!-->
<a href="https://my.campodeifiori.cc/it/account-confirmation/0198f0a7-a01c-701f-a906-f23b3d65f80f"
class="btn-link"
style="display: block; padding: 15px 30px; background-color: #D70F2A; color: #FFFFFF; text-decoration: none; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; text-align: center; border: none; border-radius: 0; -webkit-text-size-adjust: none;">
Conferma account
</a>
<!--<![endif]-->
</td>
</tr>
</table>

<p><br><small>Se il tuo account non verrà confermato, sarà automaticamente cancellato.</small></p>
</td>
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
<td class="bg-dark mobile-padding" style="background-color: #F9F9F9; padding: 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: left;">
<div class="text-small text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight: 400;">

<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>Consorzio degli Operatori del Centro Commerciale Campo dei Fiori</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>viale Ticino, 82</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span >21026 Gavirate (VA)</span><p>
</div>
</td>
</tr>
</table>                            </td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                'attachments' => NULL,
                'additional_info' => NULL,
                'status' => 'sent',
                'delayed_send_date' => NULL,
                'readings' => NULL,
                'created_at' => '2025-09-03 09:57:23',
                'updated_at' => '2025-09-03 09:57:23',
                'deleted_at' => NULL,
                'created_by' => '6376a913-517a-4437-b06c-ad5764cf6710',
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            2 => 
            array (
                'id' => '019918e8-6561-73ba-b8e8-746fc9fbbfec',
                'model_type' => 'Master\\Modules\\AppUsers\\Models\\AppUser',
                'model_id' => '0198f0a7-a01c-701f-a906-f23b3d65f80f',
                'recipients' => '["emanuele@enesi.it"]',
                'message_type' => NULL,
                'date_sent' => '2025-09-05 08:05:07',
                'subject' => 'MyCampo - Il tuo account sta per scadere!',
                'message' => '<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<title>CampoDeiFiori</title>

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
<body style="margin: 0; padding: 0; background-color: #D70F2A; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #D70F2A;">
<tr>
<td style="padding: 20px 0 0 0;">
<table class="email-container" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto; max-width: 600px; width: 100%;">
<tr>
<td class="bg-black" style="background-color: #FFFFFF; padding: 20px 0;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center; padding: 15px 20px;">
<img src="https://my.campodeifiori.cc/assets/mail/images/logo-email.jpg"
alt="CampoDeiFiori"
width="300"
height="auto"
style="display: block; margin: 0 auto; max-width: 300px; height: auto;">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-black mobile-padding" style="background-color: #FFFFFF; padding: 40px 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">

<h1 class="heading-large text-white font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 28px; line-height: 34px; font-weight: 400; margin: 0 0 20px 0; text-align: center;">
Il tuo account MyCampo sta per scadere!
</h1>

<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="text-body text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 22px; font-weight: 400; margin: 0 0 30px 0; text-align: center;">
In meno di 24 ore, il tuo account sarà cancellato: <strong>per favore, conferma la tua e-mail per poter contnuare ad utilizzare l\'app.</strong>
<br /><br />
<table class="btn-table" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 20px auto 0 auto;">
<tr>
<td class="btn-cell" style="background-color: #436A62; border-radius: 0;">
<!--[if mso]>
<v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://marelli.dimsport.enesi.vm/it/account-confirmation/24ea6ed6-b5ed-462f-bd8c-5f55358128c7" style="height:50px;v-text-anchor:middle;width:200px;" arcsize="0%" stroke="f" fillcolor="#436A62">
<w:anchorlock/>
<center style="color:#1e1e1e;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;font-weight:600;">Conferma account</center>
</v:roundrect>
<![endif]-->
<!--[if !mso]><!-->
<a href="https://my.campodeifiori.cc/it/account-confirmation/0198f0a7-a01c-701f-a906-f23b3d65f80f"
class="btn-link"
style="display: block; padding: 15px 30px; background-color: #D70F2A; color: #FFFFFF; text-decoration: none; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; text-align: center; border: none; border-radius: 0; -webkit-text-size-adjust: none;">
Conferma account
</a>
<!--<![endif]-->
</td>
</tr>
</table>

<p><br><small>Grazie di essere parte della famiglia MyCampo</small></p>
</td>
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
<td class="bg-dark mobile-padding" style="background-color: #F9F9F9; padding: 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: left;">
<div class="text-small text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight: 400;">

<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>Consorzio degli Operatori del Centro Commerciale Campo dei Fiori</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>viale Ticino, 82</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span >21026 Gavirate (VA)</span><p>
</div>
</td>
</tr>
</table>                            </td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                'attachments' => NULL,
                'additional_info' => NULL,
                'status' => 'sent',
                'delayed_send_date' => NULL,
                'readings' => NULL,
                'created_at' => '2025-09-05 08:05:07',
                'updated_at' => '2025-09-05 08:05:07',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            3 => 
            array (
                'id' => '01992d81-d483-7274-bc72-7d297cc81252',
                'model_type' => 'Master\\Modules\\AppUsers\\Models\\AppUser',
                'model_id' => '0199098f-0f60-7037-9119-e624f9c7b2be',
                'recipients' => '["toffolon.emanuele@gmail.com"]',
                'message_type' => NULL,
                'date_sent' => '2025-09-09 08:05:07',
                'subject' => 'MyCampo - Il tuo account sta per scadere!',
                'message' => '<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<title>CampoDeiFiori</title>

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
<body style="margin: 0; padding: 0; background-color: #D70F2A; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #D70F2A;">
<tr>
<td style="padding: 20px 0 0 0;">
<table class="email-container" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto; max-width: 600px; width: 100%;">
<tr>
<td class="bg-black" style="background-color: #FFFFFF; padding: 20px 0;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center; padding: 15px 20px;">
<img src="https://my.campodeifiori.cc/assets/mail/images/logo-email.jpg"
alt="CampoDeiFiori"
width="300"
height="auto"
style="display: block; margin: 0 auto; max-width: 300px; height: auto;">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-black mobile-padding" style="background-color: #FFFFFF; padding: 40px 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">

<h1 class="heading-large text-white font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 28px; line-height: 34px; font-weight: 400; margin: 0 0 20px 0; text-align: center;">
Il tuo account MyCampo sta per scadere!
</h1>

<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="text-body text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 22px; font-weight: 400; margin: 0 0 30px 0; text-align: center;">
In meno di 24 ore, il tuo account sarà cancellato: <strong>per favore, conferma la tua e-mail per poter contnuare ad utilizzare l\'app.</strong>
<br /><br />
<table class="btn-table" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 20px auto 0 auto;">
<tr>
<td class="btn-cell" style="background-color: #436A62; border-radius: 0;">
<!--[if mso]>
<v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://marelli.dimsport.enesi.vm/it/account-confirmation/24ea6ed6-b5ed-462f-bd8c-5f55358128c7" style="height:50px;v-text-anchor:middle;width:200px;" arcsize="0%" stroke="f" fillcolor="#436A62">
<w:anchorlock/>
<center style="color:#1e1e1e;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;font-weight:600;">Conferma account</center>
</v:roundrect>
<![endif]-->
<!--[if !mso]><!-->
<a href="https://my.campodeifiori.cc/it/account-confirmation/0199098f-0f60-7037-9119-e624f9c7b2be"
class="btn-link"
style="display: block; padding: 15px 30px; background-color: #D70F2A; color: #FFFFFF; text-decoration: none; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; text-align: center; border: none; border-radius: 0; -webkit-text-size-adjust: none;">
Conferma account
</a>
<!--<![endif]-->
</td>
</tr>
</table>

<p><br><small>Grazie di essere parte della famiglia MyCampo</small></p>
</td>
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
<td class="bg-dark mobile-padding" style="background-color: #F9F9F9; padding: 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: left;">
<div class="text-small text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight: 400;">

<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>Consorzio degli Operatori del Centro Commerciale Campo dei Fiori</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>viale Ticino, 82</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span >21026 Gavirate (VA)</span><p>
</div>
</td>
</tr>
</table>                            </td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                'attachments' => NULL,
                'additional_info' => NULL,
                'status' => 'sent',
                'delayed_send_date' => NULL,
                'readings' => NULL,
                'created_at' => '2025-09-09 08:05:07',
                'updated_at' => '2025-09-09 08:05:07',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            4 => 
            array (
                'id' => '01992d81-df9e-73db-a2a0-90bf50d1fcd8',
                'model_type' => 'Master\\Modules\\AppUsers\\Models\\AppUser',
                'model_id' => '019909de-5cc5-72cb-948f-e46f9eec9af2',
                'recipients' => '["emanuele.toffolon@enesi.it"]',
                'message_type' => NULL,
                'date_sent' => '2025-09-09 08:05:10',
                'subject' => 'MyCampo - Il tuo account sta per scadere!',
                'message' => '<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<title>CampoDeiFiori</title>

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
<body style="margin: 0; padding: 0; background-color: #D70F2A; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #D70F2A;">
<tr>
<td style="padding: 20px 0 0 0;">
<table class="email-container" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto; max-width: 600px; width: 100%;">
<tr>
<td class="bg-black" style="background-color: #FFFFFF; padding: 20px 0;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center; padding: 15px 20px;">
<img src="https://my.campodeifiori.cc/assets/mail/images/logo-email.jpg"
alt="CampoDeiFiori"
width="300"
height="auto"
style="display: block; margin: 0 auto; max-width: 300px; height: auto;">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-black mobile-padding" style="background-color: #FFFFFF; padding: 40px 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">

<h1 class="heading-large text-white font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 28px; line-height: 34px; font-weight: 400; margin: 0 0 20px 0; text-align: center;">
Il tuo account MyCampo sta per scadere!
</h1>

<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="text-body text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 22px; font-weight: 400; margin: 0 0 30px 0; text-align: center;">
In meno di 24 ore, il tuo account sarà cancellato: <strong>per favore, conferma la tua e-mail per poter contnuare ad utilizzare l\'app.</strong>
<br /><br />
<table class="btn-table" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 20px auto 0 auto;">
<tr>
<td class="btn-cell" style="background-color: #436A62; border-radius: 0;">
<!--[if mso]>
<v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://marelli.dimsport.enesi.vm/it/account-confirmation/24ea6ed6-b5ed-462f-bd8c-5f55358128c7" style="height:50px;v-text-anchor:middle;width:200px;" arcsize="0%" stroke="f" fillcolor="#436A62">
<w:anchorlock/>
<center style="color:#1e1e1e;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;font-weight:600;">Conferma account</center>
</v:roundrect>
<![endif]-->
<!--[if !mso]><!-->
<a href="https://my.campodeifiori.cc/it/account-confirmation/019909de-5cc5-72cb-948f-e46f9eec9af2"
class="btn-link"
style="display: block; padding: 15px 30px; background-color: #D70F2A; color: #FFFFFF; text-decoration: none; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; text-align: center; border: none; border-radius: 0; -webkit-text-size-adjust: none;">
Conferma account
</a>
<!--<![endif]-->
</td>
</tr>
</table>

<p><br><small>Grazie di essere parte della famiglia MyCampo</small></p>
</td>
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
<td class="bg-dark mobile-padding" style="background-color: #F9F9F9; padding: 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: left;">
<div class="text-small text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight: 400;">

<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>Consorzio degli Operatori del Centro Commerciale Campo dei Fiori</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>viale Ticino, 82</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span >21026 Gavirate (VA)</span><p>
</div>
</td>
</tr>
</table>                            </td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                'attachments' => NULL,
                'additional_info' => NULL,
                'status' => 'sent',
                'delayed_send_date' => NULL,
                'readings' => NULL,
                'created_at' => '2025-09-09 08:05:10',
                'updated_at' => '2025-09-09 08:05:10',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            5 => 
            array (
                'id' => '019932a8-40a2-72ed-8b07-fc43fe01abfc',
                'model_type' => 'Master\\Modules\\AppUsers\\Models\\AppUser',
                'model_id' => '0199098f-0f60-7037-9119-e624f9c7b2be',
                'recipients' => '["toffolon.emanuele@gmail.com"]',
                'message_type' => NULL,
                'date_sent' => '2025-09-10 08:05:11',
                'subject' => 'MyCampo - Il tuo account sta per scadere!',
                'message' => '<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<title>CampoDeiFiori</title>

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
<body style="margin: 0; padding: 0; background-color: #D70F2A; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #D70F2A;">
<tr>
<td style="padding: 20px 0 0 0;">
<table class="email-container" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto; max-width: 600px; width: 100%;">
<tr>
<td class="bg-black" style="background-color: #FFFFFF; padding: 20px 0;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center; padding: 15px 20px;">
<img src="https://my.campodeifiori.cc/assets/mail/images/logo-email.jpg"
alt="CampoDeiFiori"
width="300"
height="auto"
style="display: block; margin: 0 auto; max-width: 300px; height: auto;">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-black mobile-padding" style="background-color: #FFFFFF; padding: 40px 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">

<h1 class="heading-large text-white font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 28px; line-height: 34px; font-weight: 400; margin: 0 0 20px 0; text-align: center;">
Il tuo account MyCampo sta per scadere!
</h1>

<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="text-body text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 22px; font-weight: 400; margin: 0 0 30px 0; text-align: center;">
In meno di 24 ore, il tuo account sarà cancellato: <strong>per favore, conferma la tua e-mail per poter contnuare ad utilizzare l\'app.</strong>
<br /><br />
<table class="btn-table" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 20px auto 0 auto;">
<tr>
<td class="btn-cell" style="background-color: #436A62; border-radius: 0;">
<!--[if mso]>
<v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://marelli.dimsport.enesi.vm/it/account-confirmation/24ea6ed6-b5ed-462f-bd8c-5f55358128c7" style="height:50px;v-text-anchor:middle;width:200px;" arcsize="0%" stroke="f" fillcolor="#436A62">
<w:anchorlock/>
<center style="color:#1e1e1e;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;font-weight:600;">Conferma account</center>
</v:roundrect>
<![endif]-->
<!--[if !mso]><!-->
<a href="https://my.campodeifiori.cc/it/account-confirmation/0199098f-0f60-7037-9119-e624f9c7b2be"
class="btn-link"
style="display: block; padding: 15px 30px; background-color: #D70F2A; color: #FFFFFF; text-decoration: none; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; text-align: center; border: none; border-radius: 0; -webkit-text-size-adjust: none;">
Conferma account
</a>
<!--<![endif]-->
</td>
</tr>
</table>

<p><br><small>Grazie di essere parte della famiglia MyCampo</small></p>
</td>
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
<td class="bg-dark mobile-padding" style="background-color: #F9F9F9; padding: 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: left;">
<div class="text-small text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight: 400;">

<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>Consorzio degli Operatori del Centro Commerciale Campo dei Fiori</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>viale Ticino, 82</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span >21026 Gavirate (VA)</span><p>
</div>
</td>
</tr>
</table>                            </td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                'attachments' => NULL,
                'additional_info' => NULL,
                'status' => 'sent',
                'delayed_send_date' => NULL,
                'readings' => NULL,
                'created_at' => '2025-09-10 08:05:11',
                'updated_at' => '2025-09-10 08:05:11',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            6 => 
            array (
                'id' => '019932a8-4b52-72ac-b260-5c95f48f845c',
                'model_type' => 'Master\\Modules\\AppUsers\\Models\\AppUser',
                'model_id' => '019909de-5cc5-72cb-948f-e46f9eec9af2',
                'recipients' => '["emanuele.toffolon@enesi.it"]',
                'message_type' => NULL,
                'date_sent' => '2025-09-10 08:05:14',
                'subject' => 'MyCampo - Il tuo account sta per scadere!',
                'message' => '<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<title>CampoDeiFiori</title>

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
<body style="margin: 0; padding: 0; background-color: #D70F2A; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #D70F2A;">
<tr>
<td style="padding: 20px 0 0 0;">
<table class="email-container" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto; max-width: 600px; width: 100%;">
<tr>
<td class="bg-black" style="background-color: #FFFFFF; padding: 20px 0;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center; padding: 15px 20px;">
<img src="https://my.campodeifiori.cc/assets/mail/images/logo-email.jpg"
alt="CampoDeiFiori"
width="300"
height="auto"
style="display: block; margin: 0 auto; max-width: 300px; height: auto;">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-black mobile-padding" style="background-color: #FFFFFF; padding: 40px 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">

<h1 class="heading-large text-white font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 28px; line-height: 34px; font-weight: 400; margin: 0 0 20px 0; text-align: center;">
Il tuo account MyCampo sta per scadere!
</h1>

<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="text-body text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 22px; font-weight: 400; margin: 0 0 30px 0; text-align: center;">
In meno di 24 ore, il tuo account sarà cancellato: <strong>per favore, conferma la tua e-mail per poter contnuare ad utilizzare l\'app.</strong>
<br /><br />
<table class="btn-table" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 20px auto 0 auto;">
<tr>
<td class="btn-cell" style="background-color: #436A62; border-radius: 0;">
<!--[if mso]>
<v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://marelli.dimsport.enesi.vm/it/account-confirmation/24ea6ed6-b5ed-462f-bd8c-5f55358128c7" style="height:50px;v-text-anchor:middle;width:200px;" arcsize="0%" stroke="f" fillcolor="#436A62">
<w:anchorlock/>
<center style="color:#1e1e1e;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;font-weight:600;">Conferma account</center>
</v:roundrect>
<![endif]-->
<!--[if !mso]><!-->
<a href="https://my.campodeifiori.cc/it/account-confirmation/019909de-5cc5-72cb-948f-e46f9eec9af2"
class="btn-link"
style="display: block; padding: 15px 30px; background-color: #D70F2A; color: #FFFFFF; text-decoration: none; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; text-align: center; border: none; border-radius: 0; -webkit-text-size-adjust: none;">
Conferma account
</a>
<!--<![endif]-->
</td>
</tr>
</table>

<p><br><small>Grazie di essere parte della famiglia MyCampo</small></p>
</td>
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
<td class="bg-dark mobile-padding" style="background-color: #F9F9F9; padding: 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: left;">
<div class="text-small text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight: 400;">

<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>Consorzio degli Operatori del Centro Commerciale Campo dei Fiori</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>viale Ticino, 82</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span >21026 Gavirate (VA)</span><p>
</div>
</td>
</tr>
</table>                            </td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                'attachments' => NULL,
                'additional_info' => NULL,
                'status' => 'sent',
                'delayed_send_date' => NULL,
                'readings' => NULL,
                'created_at' => '2025-09-10 08:05:14',
                'updated_at' => '2025-09-10 08:05:14',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            7 => 
            array (
                'id' => '019937ce-9105-7203-a6b4-b2478e19b55c',
                'model_type' => 'Master\\Modules\\AppUsers\\Models\\AppUser',
                'model_id' => '0199098f-0f60-7037-9119-e624f9c7b2be',
                'recipients' => '["toffolon.emanuele@gmail.com"]',
                'message_type' => NULL,
                'date_sent' => '2025-09-11 08:05:08',
                'subject' => 'MyCampo - Il tuo account è scaduto',
                'message' => '<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<title>CampoDeiFiori</title>

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
<body style="margin: 0; padding: 0; background-color: #D70F2A; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #D70F2A;">
<tr>
<td style="padding: 20px 0 0 0;">
<table class="email-container" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto; max-width: 600px; width: 100%;">
<tr>
<td class="bg-black" style="background-color: #FFFFFF; padding: 20px 0;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center; padding: 15px 20px;">
<img src="https://my.campodeifiori.cc/assets/mail/images/logo-email.jpg"
alt="CampoDeiFiori"
width="300"
height="auto"
style="display: block; margin: 0 auto; max-width: 300px; height: auto;">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-black mobile-padding" style="background-color: #FFFFFF; padding: 40px 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">

<h1 class="heading-large text-white font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 28px; line-height: 34px; font-weight: 400; margin: 0 0 20px 0; text-align: center;">
Il tuo account MyCampo app è scaduto :(
</h1>

<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="text-body text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 22px; font-weight: 400; margin: 0 0 30px 0; text-align: center;">
Purtroppo il tuo account è scaduto, ci dispiace vederti andare via.<br><br>Non dimenticare che puoi in qualsiasi momento creare un nuovo account con l\'app MyCampo.<br><br><strong>Grazie!</strong>
</td>
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
<td class="bg-dark mobile-padding" style="background-color: #F9F9F9; padding: 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: left;">
<div class="text-small text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight: 400;">

<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>Consorzio degli Operatori del Centro Commerciale Campo dei Fiori</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>viale Ticino, 82</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span >21026 Gavirate (VA)</span><p>
</div>
</td>
</tr>
</table>                            </td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                    'attachments' => NULL,
                    'additional_info' => NULL,
                    'status' => 'sent',
                    'delayed_send_date' => NULL,
                    'readings' => NULL,
                    'created_at' => '2025-09-11 08:05:08',
                    'updated_at' => '2025-09-11 08:05:08',
                    'deleted_at' => NULL,
                    'created_by' => NULL,
                    'updated_by' => NULL,
                    'deleted_by' => NULL,
                ),
                8 => 
                array (
                    'id' => '019937ce-a49c-7047-885d-46c2f46885e0',
                    'model_type' => 'Master\\Modules\\AppUsers\\Models\\AppUser',
                    'model_id' => '019909de-5cc5-72cb-948f-e46f9eec9af2',
                    'recipients' => '["emanuele.toffolon@enesi.it"]',
                    'message_type' => NULL,
                    'date_sent' => '2025-09-11 08:05:13',
                    'subject' => 'MyCampo - Il tuo account è scaduto',
                    'message' => '<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<title>CampoDeiFiori</title>

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
<body style="margin: 0; padding: 0; background-color: #D70F2A; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #D70F2A;">
<tr>
<td style="padding: 20px 0 0 0;">
<table class="email-container" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto; max-width: 600px; width: 100%;">
<tr>
<td class="bg-black" style="background-color: #FFFFFF; padding: 20px 0;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center; padding: 15px 20px;">
<img src="https://my.campodeifiori.cc/assets/mail/images/logo-email.jpg"
alt="CampoDeiFiori"
width="300"
height="auto"
style="display: block; margin: 0 auto; max-width: 300px; height: auto;">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-black mobile-padding" style="background-color: #FFFFFF; padding: 40px 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">

<h1 class="heading-large text-white font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 28px; line-height: 34px; font-weight: 400; margin: 0 0 20px 0; text-align: center;">
Il tuo account MyCampo app è scaduto :(
</h1>

<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="text-body text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 22px; font-weight: 400; margin: 0 0 30px 0; text-align: center;">
Purtroppo il tuo account è scaduto, ci dispiace vederti andare via.<br><br>Non dimenticare che puoi in qualsiasi momento creare un nuovo account con l\'app MyCampo.<br><br><strong>Grazie!</strong>
</td>
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
<td class="bg-dark mobile-padding" style="background-color: #F9F9F9; padding: 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: left;">
<div class="text-small text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight: 400;">

<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>Consorzio degli Operatori del Centro Commerciale Campo dei Fiori</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>viale Ticino, 82</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span >21026 Gavirate (VA)</span><p>
</div>
</td>
</tr>
</table>                            </td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                        'attachments' => NULL,
                        'additional_info' => NULL,
                        'status' => 'sent',
                        'delayed_send_date' => NULL,
                        'readings' => NULL,
                        'created_at' => '2025-09-11 08:05:13',
                        'updated_at' => '2025-09-11 08:05:13',
                        'deleted_at' => NULL,
                        'created_by' => NULL,
                        'updated_by' => NULL,
                        'deleted_by' => NULL,
                    ),
                    9 => 
                    array (
                        'id' => '019937e1-577e-7351-b6e3-2f138e4a9abe',
                        'model_type' => 'Master\\Modules\\AppUsers\\Models\\AppUser',
                        'model_id' => '019937e1-3e4d-713f-b22b-72d5da7c8129',
                        'recipients' => '["massimiliano.boggio@gmail.com"]',
                        'message_type' => NULL,
                        'date_sent' => '2025-09-11 08:25:38',
                        'subject' => 'MyCampo - Conferma account',
                        'message' => '<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<title>CampoDeiFiori</title>

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
<body style="margin: 0; padding: 0; background-color: #D70F2A; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #D70F2A;">
<tr>
<td style="padding: 20px 0 0 0;">
<table class="email-container" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto; max-width: 600px; width: 100%;">
<tr>
<td class="bg-black" style="background-color: #FFFFFF; padding: 20px 0;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center; padding: 15px 20px;">
<img src="https://my.campodeifiori.cc/assets/mail/images/logo-email.jpg"
alt="CampoDeiFiori"
width="300"
height="auto"
style="display: block; margin: 0 auto; max-width: 300px; height: auto;">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-black mobile-padding" style="background-color: #FFFFFF; padding: 40px 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">

<h1 class="heading-large text-white font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 28px; line-height: 34px; font-weight: 400; margin: 0 0 20px 0; text-align: center;">
Benvenuto sull\'app MyCampo
</h1>

<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="text-body text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 22px; font-weight: 400; margin: 0 0 30px 0; text-align: center;">
Grazie per esserti registrato nella nostra app MyCampo.<br><br><strong>E’ necessario confermare la tua iscrizione entro 7 giorni.</strong>
<br /><br />
<table class="btn-table" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 20px auto 0 auto;">
<tr>
<td class="btn-cell" style="background-color: #436A62; border-radius: 0;">
<!--[if mso]>
<v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://marelli.dimsport.enesi.vm/it/account-confirmation/24ea6ed6-b5ed-462f-bd8c-5f55358128c7" style="height:50px;v-text-anchor:middle;width:200px;" arcsize="0%" stroke="f" fillcolor="#436A62">
<w:anchorlock/>
<center style="color:#1e1e1e;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;font-weight:600;">Conferma account</center>
</v:roundrect>
<![endif]-->
<!--[if !mso]><!-->
<a href="https://my.campodeifiori.cc/it/account-confirmation/019937e1-3e4d-713f-b22b-72d5da7c8129"
class="btn-link"
style="display: block; padding: 15px 30px; background-color: #D70F2A; color: #FFFFFF; text-decoration: none; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; text-align: center; border: none; border-radius: 0; -webkit-text-size-adjust: none;">
Conferma account
</a>
<!--<![endif]-->
</td>
</tr>
</table>

<p><br><small>Se il tuo account non verrà confermato, sarà automaticamente cancellato.</small></p>
</td>
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
<td class="bg-dark mobile-padding" style="background-color: #F9F9F9; padding: 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: left;">
<div class="text-small text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight: 400;">

<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>Consorzio degli Operatori del Centro Commerciale Campo dei Fiori</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>viale Ticino, 82</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span >21026 Gavirate (VA)</span><p>
</div>
</td>
</tr>
</table>                            </td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                        'attachments' => NULL,
                        'additional_info' => NULL,
                        'status' => 'sent',
                        'delayed_send_date' => NULL,
                        'readings' => NULL,
                        'created_at' => '2025-09-11 08:25:38',
                        'updated_at' => '2025-09-11 08:25:38',
                        'deleted_at' => NULL,
                        'created_by' => NULL,
                        'updated_by' => NULL,
                        'deleted_by' => NULL,
                    ),
                    10 => 
                    array (
                        'id' => '01993d50-a184-71f1-a644-4eb5d195a2b6',
                        'model_type' => 'Master\\Modules\\AppUsers\\Models\\AppUser',
                        'model_id' => '019937e1-3e4d-713f-b22b-72d5da7c8129',
                        'recipients' => '["massimiliano.boggio@gmail.com"]',
                        'message_type' => NULL,
                        'date_sent' => '2025-09-12 09:45:18',
                        'subject' => 'MyCampo - Il tuo account è stato cancellato',
                        'message' => '<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<title>CampoDeiFiori</title>

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
<body style="margin: 0; padding: 0; background-color: #D70F2A; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #D70F2A;">
<tr>
<td style="padding: 20px 0 0 0;">
<table class="email-container" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto; max-width: 600px; width: 100%;">
<tr>
<td class="bg-black" style="background-color: #FFFFFF; padding: 20px 0;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center; padding: 15px 20px;">
<img src="https://my.campodeifiori.cc/assets/mail/images/logo-email.jpg"
alt="CampoDeiFiori"
width="300"
height="auto"
style="display: block; margin: 0 auto; max-width: 300px; height: auto;">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-black mobile-padding" style="background-color: #FFFFFF; padding: 40px 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">

<h1 class="heading-large text-white font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 28px; line-height: 34px; font-weight: 400; margin: 0 0 20px 0; text-align: center;">
Il tuo account MyCampo è stato cancellato
</h1>

<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="text-body text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 22px; font-weight: 400; margin: 0 0 30px 0; text-align: center;">
Come da tua richiesta, abbiamo provveduto a cancellare il tuo account.<br><br>Non dimenticare che in qualsiasi momento puoi creare un nuovo account con l\'app MyCampo.<br><br><strong>Grazie!</strong>
</td>
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
<td class="bg-dark mobile-padding" style="background-color: #F9F9F9; padding: 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: left;">
<div class="text-small text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight: 400;">

<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>Consorzio degli Operatori del Centro Commerciale Campo dei Fiori</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>viale Ticino, 82</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span >21026 Gavirate (VA)</span><p>
</div>
</td>
</tr>
</table>                            </td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                        'attachments' => NULL,
                        'additional_info' => NULL,
                        'status' => 'sent',
                        'delayed_send_date' => NULL,
                        'readings' => NULL,
                        'created_at' => '2025-09-12 09:45:18',
                        'updated_at' => '2025-09-12 09:45:18',
                        'deleted_at' => NULL,
                        'created_by' => NULL,
                        'updated_by' => NULL,
                        'deleted_by' => NULL,
                    ),
                    11 => 
                    array (
                        'id' => '01993d53-4280-7341-8d10-d28d5c56179d',
                        'model_type' => 'Master\\Modules\\AppUsers\\Models\\AppUser',
                        'model_id' => '01993d53-2e35-728d-824c-eb2048576477',
                        'recipients' => '["692h89cbmm@privaterelay.appleid.com"]',
                        'message_type' => NULL,
                        'date_sent' => '2025-09-12 09:48:10',
                        'subject' => 'MyCampo - Conferma account',
                        'message' => '<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<title>CampoDeiFiori</title>

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
<body style="margin: 0; padding: 0; background-color: #D70F2A; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #D70F2A;">
<tr>
<td style="padding: 20px 0 0 0;">
<table class="email-container" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto; max-width: 600px; width: 100%;">
<tr>
<td class="bg-black" style="background-color: #FFFFFF; padding: 20px 0;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center; padding: 15px 20px;">
<img src="https://my.campodeifiori.cc/assets/mail/images/logo-email.jpg"
alt="CampoDeiFiori"
width="300"
height="auto"
style="display: block; margin: 0 auto; max-width: 300px; height: auto;">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-black mobile-padding" style="background-color: #FFFFFF; padding: 40px 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">

<h1 class="heading-large text-white font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 28px; line-height: 34px; font-weight: 400; margin: 0 0 20px 0; text-align: center;">
Benvenuto sull\'app MyCampo
</h1>

<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="text-body text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 22px; font-weight: 400; margin: 0 0 30px 0; text-align: center;">
Grazie per esserti registrato nella nostra app MyCampo.<br><br><strong>E’ necessario confermare la tua iscrizione entro 7 giorni.</strong>
<br /><br />
<table class="btn-table" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 20px auto 0 auto;">
<tr>
<td class="btn-cell" style="background-color: #436A62; border-radius: 0;">
<!--[if mso]>
<v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://marelli.dimsport.enesi.vm/it/account-confirmation/24ea6ed6-b5ed-462f-bd8c-5f55358128c7" style="height:50px;v-text-anchor:middle;width:200px;" arcsize="0%" stroke="f" fillcolor="#436A62">
<w:anchorlock/>
<center style="color:#1e1e1e;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;font-weight:600;">Conferma account</center>
</v:roundrect>
<![endif]-->
<!--[if !mso]><!-->
<a href="https://my.campodeifiori.cc/it/account-confirmation/01993d53-2e35-728d-824c-eb2048576477"
class="btn-link"
style="display: block; padding: 15px 30px; background-color: #D70F2A; color: #FFFFFF; text-decoration: none; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; text-align: center; border: none; border-radius: 0; -webkit-text-size-adjust: none;">
Conferma account
</a>
<!--<![endif]-->
</td>
</tr>
</table>

<p><br><small>Se il tuo account non verrà confermato, sarà automaticamente cancellato.</small></p>
</td>
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
<td class="bg-dark mobile-padding" style="background-color: #F9F9F9; padding: 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: left;">
<div class="text-small text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight: 400;">

<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>Consorzio degli Operatori del Centro Commerciale Campo dei Fiori</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>viale Ticino, 82</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span >21026 Gavirate (VA)</span><p>
</div>
</td>
</tr>
</table>                            </td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                        'attachments' => NULL,
                        'additional_info' => NULL,
                        'status' => 'sent',
                        'delayed_send_date' => NULL,
                        'readings' => NULL,
                        'created_at' => '2025-09-12 09:48:10',
                        'updated_at' => '2025-09-12 09:48:10',
                        'deleted_at' => NULL,
                        'created_by' => NULL,
                        'updated_by' => NULL,
                        'deleted_by' => NULL,
                    ),
                    12 => 
                    array (
                        'id' => '01993d56-62ab-71ee-a3ba-5b7acdf23573',
                        'model_type' => 'Master\\Modules\\AppUsers\\Models\\AppUser',
                        'model_id' => '01993d53-2e35-728d-824c-eb2048576477',
                        'recipients' => '["692h89cbmm@privaterelay.appleid.com"]',
                        'message_type' => NULL,
                        'date_sent' => '2025-09-12 09:51:35',
                        'subject' => 'MyCampo - Il tuo account è stato cancellato',
                        'message' => '<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<title>CampoDeiFiori</title>

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
<body style="margin: 0; padding: 0; background-color: #D70F2A; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #D70F2A;">
<tr>
<td style="padding: 20px 0 0 0;">
<table class="email-container" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto; max-width: 600px; width: 100%;">
<tr>
<td class="bg-black" style="background-color: #FFFFFF; padding: 20px 0;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center; padding: 15px 20px;">
<img src="https://my.campodeifiori.cc/assets/mail/images/logo-email.jpg"
alt="CampoDeiFiori"
width="300"
height="auto"
style="display: block; margin: 0 auto; max-width: 300px; height: auto;">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-black mobile-padding" style="background-color: #FFFFFF; padding: 40px 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">

<h1 class="heading-large text-white font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 28px; line-height: 34px; font-weight: 400; margin: 0 0 20px 0; text-align: center;">
Il tuo account MyCampo è stato cancellato
</h1>

<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="text-body text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 22px; font-weight: 400; margin: 0 0 30px 0; text-align: center;">
Come da tua richiesta, abbiamo provveduto a cancellare il tuo account.<br><br>Non dimenticare che in qualsiasi momento puoi creare un nuovo account con l\'app MyCampo.<br><br><strong>Grazie!</strong>
</td>
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
<td class="bg-dark mobile-padding" style="background-color: #F9F9F9; padding: 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: left;">
<div class="text-small text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight: 400;">

<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>Consorzio degli Operatori del Centro Commerciale Campo dei Fiori</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>viale Ticino, 82</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span >21026 Gavirate (VA)</span><p>
</div>
</td>
</tr>
</table>                            </td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                        'attachments' => NULL,
                        'additional_info' => NULL,
                        'status' => 'sent',
                        'delayed_send_date' => NULL,
                        'readings' => NULL,
                        'created_at' => '2025-09-12 09:51:35',
                        'updated_at' => '2025-09-12 09:51:35',
                        'deleted_at' => NULL,
                        'created_by' => NULL,
                        'updated_by' => NULL,
                        'deleted_by' => NULL,
                    ),
                    13 => 
                    array (
                        'id' => '01993d58-aa6a-714d-99ec-b69812c80962',
                        'model_type' => 'Master\\Modules\\AppUsers\\Models\\AppUser',
                        'model_id' => '01993d58-a382-71bb-bb7e-f642c6337f9d',
                        'recipients' => '["692h89cbmm@privaterelay.appleid.com"]',
                        'message_type' => NULL,
                        'date_sent' => '2025-09-12 09:54:05',
                        'subject' => 'MyCampo - Conferma account',
                        'message' => '<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<title>CampoDeiFiori</title>

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
<body style="margin: 0; padding: 0; background-color: #D70F2A; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #D70F2A;">
<tr>
<td style="padding: 20px 0 0 0;">
<table class="email-container" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto; max-width: 600px; width: 100%;">
<tr>
<td class="bg-black" style="background-color: #FFFFFF; padding: 20px 0;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center; padding: 15px 20px;">
<img src="https://my.campodeifiori.cc/assets/mail/images/logo-email.jpg"
alt="CampoDeiFiori"
width="300"
height="auto"
style="display: block; margin: 0 auto; max-width: 300px; height: auto;">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-black mobile-padding" style="background-color: #FFFFFF; padding: 40px 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">

<h1 class="heading-large text-white font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 28px; line-height: 34px; font-weight: 400; margin: 0 0 20px 0; text-align: center;">
Benvenuto sull\'app MyCampo
</h1>

<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="text-body text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 22px; font-weight: 400; margin: 0 0 30px 0; text-align: center;">
Grazie per esserti registrato nella nostra app MyCampo.<br><br><strong>E’ necessario confermare la tua iscrizione entro 7 giorni.</strong>
<br /><br />
<table class="btn-table" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 20px auto 0 auto;">
<tr>
<td class="btn-cell" style="background-color: #436A62; border-radius: 0;">
<!--[if mso]>
<v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://marelli.dimsport.enesi.vm/it/account-confirmation/24ea6ed6-b5ed-462f-bd8c-5f55358128c7" style="height:50px;v-text-anchor:middle;width:200px;" arcsize="0%" stroke="f" fillcolor="#436A62">
<w:anchorlock/>
<center style="color:#1e1e1e;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;font-weight:600;">Conferma account</center>
</v:roundrect>
<![endif]-->
<!--[if !mso]><!-->
<a href="https://my.campodeifiori.cc/it/account-confirmation/01993d58-a382-71bb-bb7e-f642c6337f9d"
class="btn-link"
style="display: block; padding: 15px 30px; background-color: #D70F2A; color: #FFFFFF; text-decoration: none; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; text-align: center; border: none; border-radius: 0; -webkit-text-size-adjust: none;">
Conferma account
</a>
<!--<![endif]-->
</td>
</tr>
</table>

<p><br><small>Se il tuo account non verrà confermato, sarà automaticamente cancellato.</small></p>
</td>
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
<td class="bg-dark mobile-padding" style="background-color: #F9F9F9; padding: 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: left;">
<div class="text-small text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight: 400;">

<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>Consorzio degli Operatori del Centro Commerciale Campo dei Fiori</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>viale Ticino, 82</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span >21026 Gavirate (VA)</span><p>
</div>
</td>
</tr>
</table>                            </td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                        'attachments' => NULL,
                        'additional_info' => NULL,
                        'status' => 'sent',
                        'delayed_send_date' => NULL,
                        'readings' => NULL,
                        'created_at' => '2025-09-12 09:54:05',
                        'updated_at' => '2025-09-12 09:54:05',
                        'deleted_at' => NULL,
                        'created_by' => NULL,
                        'updated_by' => NULL,
                        'deleted_by' => NULL,
                    ),
                    14 => 
                    array (
                        'id' => '01993d59-ad7a-70c3-a34b-0589edfa30fc',
                        'model_type' => 'Master\\Modules\\AppUsers\\Models\\AppUser',
                        'model_id' => '01993d58-a382-71bb-bb7e-f642c6337f9d',
                        'recipients' => '["692h89cbmm@privaterelay.appleid.com"]',
                        'message_type' => NULL,
                        'date_sent' => '2025-09-12 09:55:11',
                        'subject' => 'MyCampo - Il tuo account è stato cancellato',
                        'message' => '<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<title>CampoDeiFiori</title>

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
<body style="margin: 0; padding: 0; background-color: #D70F2A; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #D70F2A;">
<tr>
<td style="padding: 20px 0 0 0;">
<table class="email-container" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto; max-width: 600px; width: 100%;">
<tr>
<td class="bg-black" style="background-color: #FFFFFF; padding: 20px 0;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center; padding: 15px 20px;">
<img src="https://my.campodeifiori.cc/assets/mail/images/logo-email.jpg"
alt="CampoDeiFiori"
width="300"
height="auto"
style="display: block; margin: 0 auto; max-width: 300px; height: auto;">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-black mobile-padding" style="background-color: #FFFFFF; padding: 40px 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">

<h1 class="heading-large text-white font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 28px; line-height: 34px; font-weight: 400; margin: 0 0 20px 0; text-align: center;">
Il tuo account MyCampo è stato cancellato
</h1>

<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="text-body text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 22px; font-weight: 400; margin: 0 0 30px 0; text-align: center;">
Come da tua richiesta, abbiamo provveduto a cancellare il tuo account.<br><br>Non dimenticare che in qualsiasi momento puoi creare un nuovo account con l\'app MyCampo.<br><br><strong>Grazie!</strong>
</td>
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
<td class="bg-dark mobile-padding" style="background-color: #F9F9F9; padding: 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: left;">
<div class="text-small text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight: 400;">

<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>Consorzio degli Operatori del Centro Commerciale Campo dei Fiori</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>viale Ticino, 82</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span >21026 Gavirate (VA)</span><p>
</div>
</td>
</tr>
</table>                            </td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                        'attachments' => NULL,
                        'additional_info' => NULL,
                        'status' => 'sent',
                        'delayed_send_date' => NULL,
                        'readings' => NULL,
                        'created_at' => '2025-09-12 09:55:11',
                        'updated_at' => '2025-09-12 09:55:11',
                        'deleted_at' => NULL,
                        'created_by' => NULL,
                        'updated_by' => NULL,
                        'deleted_by' => NULL,
                    ),
                    15 => 
                    array (
                        'id' => '01993d5a-b75a-719c-ae89-833f043bcdd1',
                        'model_type' => 'Master\\Modules\\AppUsers\\Models\\AppUser',
                        'model_id' => '01993d5a-ac6f-73bc-ad3b-720e1223d755',
                        'recipients' => '["692h89cbmm@privaterelay.appleid.com"]',
                        'message_type' => NULL,
                        'date_sent' => '2025-09-12 09:56:19',
                        'subject' => 'MyCampo - Conferma account',
                        'message' => '<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<title>CampoDeiFiori</title>

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
<body style="margin: 0; padding: 0; background-color: #D70F2A; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #D70F2A;">
<tr>
<td style="padding: 20px 0 0 0;">
<table class="email-container" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto; max-width: 600px; width: 100%;">
<tr>
<td class="bg-black" style="background-color: #FFFFFF; padding: 20px 0;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center; padding: 15px 20px;">
<img src="https://my.campodeifiori.cc/assets/mail/images/logo-email.jpg"
alt="CampoDeiFiori"
width="300"
height="auto"
style="display: block; margin: 0 auto; max-width: 300px; height: auto;">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-black mobile-padding" style="background-color: #FFFFFF; padding: 40px 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">

<h1 class="heading-large text-white font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 28px; line-height: 34px; font-weight: 400; margin: 0 0 20px 0; text-align: center;">
Benvenuto sull\'app MyCampo
</h1>

<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="text-body text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 22px; font-weight: 400; margin: 0 0 30px 0; text-align: center;">
Grazie per esserti registrato nella nostra app MyCampo.<br><br><strong>E’ necessario confermare la tua iscrizione entro 7 giorni.</strong>
<br /><br />
<table class="btn-table" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 20px auto 0 auto;">
<tr>
<td class="btn-cell" style="background-color: #436A62; border-radius: 0;">
<!--[if mso]>
<v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="https://marelli.dimsport.enesi.vm/it/account-confirmation/24ea6ed6-b5ed-462f-bd8c-5f55358128c7" style="height:50px;v-text-anchor:middle;width:200px;" arcsize="0%" stroke="f" fillcolor="#436A62">
<w:anchorlock/>
<center style="color:#1e1e1e;font-family:\'Helvetica Neue\', Helvetica, Arial, sans-serif;font-size:16px;font-weight:600;">Conferma account</center>
</v:roundrect>
<![endif]-->
<!--[if !mso]><!-->
<a href="https://my.campodeifiori.cc/it/account-confirmation/01993d5a-ac6f-73bc-ad3b-720e1223d755"
class="btn-link"
style="display: block; padding: 15px 30px; background-color: #D70F2A; color: #FFFFFF; text-decoration: none; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; text-align: center; border: none; border-radius: 0; -webkit-text-size-adjust: none;">
Conferma account
</a>
<!--<![endif]-->
</td>
</tr>
</table>

<p><br><small>Se il tuo account non verrà confermato, sarà automaticamente cancellato.</small></p>
</td>
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
<td class="bg-dark mobile-padding" style="background-color: #F9F9F9; padding: 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: left;">
<div class="text-small text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight: 400;">

<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>Consorzio degli Operatori del Centro Commerciale Campo dei Fiori</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>viale Ticino, 82</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span >21026 Gavirate (VA)</span><p>
</div>
</td>
</tr>
</table>                            </td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                        'attachments' => NULL,
                        'additional_info' => NULL,
                        'status' => 'sent',
                        'delayed_send_date' => NULL,
                        'readings' => NULL,
                        'created_at' => '2025-09-12 09:56:19',
                        'updated_at' => '2025-09-12 09:56:19',
                        'deleted_at' => NULL,
                        'created_by' => NULL,
                        'updated_by' => NULL,
                        'deleted_by' => NULL,
                    ),
                    16 => 
                    array (
                        'id' => '01996657-b572-71d3-95a1-4e4f7875f87c',
                        'model_type' => 'Master\\Modules\\AppUsers\\Models\\AppUser',
                        'model_id' => '01993d5a-ac6f-73bc-ad3b-720e1223d755',
                        'recipients' => '["692h89cbmm@privaterelay.appleid.com"]',
                        'message_type' => NULL,
                        'date_sent' => '2025-09-20 08:57:28',
                        'subject' => 'MyCampo - Registrazione',
                        'message' => '<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<title>CampoDeiFiori</title>

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
<body style="margin: 0; padding: 0; background-color: #D70F2A; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #D70F2A;">
<tr>
<td style="padding: 20px 0 0 0;">
<table class="email-container" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto; max-width: 600px; width: 100%;">
<tr>
<td class="bg-black" style="background-color: #FFFFFF; padding: 20px 0;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center; padding: 15px 20px;">
<img src="https://cdf.test/assets/mail/images/logo-email.jpg"
alt="CampoDeiFiori"
width="300"
height="auto"
style="display: block; margin: 0 auto; max-width: 300px; height: auto;">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-black mobile-padding" style="background-color: #FFFFFF; padding: 40px 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">

<h1 class="heading-large text-white font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 28px; line-height: 34px; font-weight: 400; margin: 0 0 20px 0; text-align: center;">
Benvenuto sull\'app MyCampo
</h1>

<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="text-body text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 22px; font-weight: 400; margin: 0 0 30px 0; text-align: center;">
Grazie per esserti registrato nella nostra app MyCampo.
<br /><br />
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-dark mobile-padding" style="background-color: #F9F9F9; padding: 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: left;">
<div class="text-small text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight: 400;">

<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>Consorzio degli Operatori del Centro Commerciale Campo dei Fiori</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>viale Ticino, 82</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span >21026 Gavirate (VA)</span><p>
</div>
</td>
</tr>
</table>                            </td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                        'attachments' => NULL,
                        'additional_info' => NULL,
                        'status' => 'sent',
                        'delayed_send_date' => NULL,
                        'readings' => NULL,
                        'created_at' => '2025-09-20 08:57:28',
                        'updated_at' => '2025-09-20 08:57:28',
                        'deleted_at' => NULL,
                        'created_by' => 'c2777a10-999e-42f2-bce8-4100579834f3',
                        'updated_by' => NULL,
                        'deleted_by' => NULL,
                    ),
                    17 => 
                    array (
                        'id' => '01997af9-a66a-7023-ab45-7f660da443e9',
                        'model_type' => 'Master\\Modules\\AppUsers\\Models\\AppUser',
                        'model_id' => '01997af9-7f69-73a4-adb0-cdb6f06539c7',
                        'recipients' => '["emanuele.toffolon@enesi.it"]',
                        'message_type' => NULL,
                        'date_sent' => '2025-09-24 11:06:45',
                        'subject' => 'MyCampo - Registrazione',
                        'message' => '<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<title>CampoDeiFiori</title>

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
<body style="margin: 0; padding: 0; background-color: #D70F2A; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #D70F2A;">
<tr>
<td style="padding: 20px 0 0 0;">
<table class="email-container" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto; max-width: 600px; width: 100%;">
<tr>
<td class="bg-black" style="background-color: #FFFFFF; padding: 20px 0;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center; padding: 15px 20px;">
<img src="https://cdf.test/assets/mail/images/logo-email.jpg"
alt="CampoDeiFiori"
width="300"
height="auto"
style="display: block; margin: 0 auto; max-width: 300px; height: auto;">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-black mobile-padding" style="background-color: #FFFFFF; padding: 40px 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">

<h1 class="heading-large text-white font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 28px; line-height: 34px; font-weight: 400; margin: 0 0 20px 0; text-align: center;">
Benvenuto sull\'app MyCampo
</h1>

<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="text-body text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 22px; font-weight: 400; margin: 0 0 30px 0; text-align: center;">
Grazie per esserti registrato nella nostra app MyCampo.
<br /><br />
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-dark mobile-padding" style="background-color: #F9F9F9; padding: 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: left;">
<div class="text-small text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight: 400;">

<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>Consorzio degli Operatori del Centro Commerciale Campo dei Fiori</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>viale Ticino, 82</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span >21026 Gavirate (VA)</span><p>
</div>
</td>
</tr>
</table>                            </td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                        'attachments' => NULL,
                        'additional_info' => NULL,
                        'status' => 'sent',
                        'delayed_send_date' => NULL,
                        'readings' => NULL,
                        'created_at' => '2025-09-24 11:06:45',
                        'updated_at' => '2025-09-24 11:06:45',
                        'deleted_at' => NULL,
                        'created_by' => NULL,
                        'updated_by' => NULL,
                        'deleted_by' => NULL,
                    ),
                    18 => 
                    array (
                        'id' => '01997afa-2437-707c-b31e-735089363866',
                        'model_type' => 'Master\\Modules\\AppUsers\\Models\\AppUser',
                        'model_id' => '01997af9-7f69-73a4-adb0-cdb6f06539c7',
                        'recipients' => '["emanuele.toffolon@enesi.it"]',
                        'message_type' => NULL,
                        'date_sent' => '2025-09-24 11:07:17',
                        'subject' => 'MyCampo - Il tuo account è stato cancellato',
                        'message' => '<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<title>CampoDeiFiori</title>

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
<body style="margin: 0; padding: 0; background-color: #D70F2A; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #D70F2A;">
<tr>
<td style="padding: 20px 0 0 0;">
<table class="email-container" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto; max-width: 600px; width: 100%;">
<tr>
<td class="bg-black" style="background-color: #FFFFFF; padding: 20px 0;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center; padding: 15px 20px;">
<img src="https://cdf.test/assets/mail/images/logo-email.jpg"
alt="CampoDeiFiori"
width="300"
height="auto"
style="display: block; margin: 0 auto; max-width: 300px; height: auto;">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-black mobile-padding" style="background-color: #FFFFFF; padding: 40px 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">

<h1 class="heading-large text-white font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 28px; line-height: 34px; font-weight: 400; margin: 0 0 20px 0; text-align: center;">
Il tuo account MyCampo è stato cancellato
</h1>

<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="text-body text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 22px; font-weight: 400; margin: 0 0 30px 0; text-align: center;">
Come da tua richiesta, abbiamo provveduto a cancellare il tuo account.<br><br>Non dimenticare che in qualsiasi momento puoi creare un nuovo account con l\'app MyCampo.<br><br><strong>Grazie!</strong>
</td>
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
<td class="bg-dark mobile-padding" style="background-color: #F9F9F9; padding: 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: left;">
<div class="text-small text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight: 400;">

<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>Consorzio degli Operatori del Centro Commerciale Campo dei Fiori</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>viale Ticino, 82</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span >21026 Gavirate (VA)</span><p>
</div>
</td>
</tr>
</table>                            </td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                        'attachments' => NULL,
                        'additional_info' => NULL,
                        'status' => 'sent',
                        'delayed_send_date' => NULL,
                        'readings' => NULL,
                        'created_at' => '2025-09-24 11:07:17',
                        'updated_at' => '2025-09-24 11:07:17',
                        'deleted_at' => NULL,
                        'created_by' => NULL,
                        'updated_by' => NULL,
                        'deleted_by' => NULL,
                    ),
                    19 => 
                    array (
                        'id' => '01997afc-4156-7282-b168-5b9842dd2f54',
                        'model_type' => 'Master\\Modules\\AppUsers\\Models\\AppUser',
                        'model_id' => '01997afc-3738-73f9-add4-68a493b6ef5d',
                        'recipients' => '["emanuele.toffolon@enesi.it"]',
                        'message_type' => NULL,
                        'date_sent' => '2025-09-24 11:09:36',
                        'subject' => 'MyCampo - Registrazione',
                        'message' => '<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<title>CampoDeiFiori</title>

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
<body style="margin: 0; padding: 0; background-color: #D70F2A; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #D70F2A;">
<tr>
<td style="padding: 20px 0 0 0;">
<table class="email-container" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto; max-width: 600px; width: 100%;">
<tr>
<td class="bg-black" style="background-color: #FFFFFF; padding: 20px 0;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center; padding: 15px 20px;">
<img src="https://cdf.test/assets/mail/images/logo-email.jpg"
alt="CampoDeiFiori"
width="300"
height="auto"
style="display: block; margin: 0 auto; max-width: 300px; height: auto;">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-black mobile-padding" style="background-color: #FFFFFF; padding: 40px 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">

<h1 class="heading-large text-white font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 28px; line-height: 34px; font-weight: 400; margin: 0 0 20px 0; text-align: center;">
Benvenuto sull\'app MyCampo
</h1>

<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="text-body text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 22px; font-weight: 400; margin: 0 0 30px 0; text-align: center;">
Grazie per esserti registrato nella nostra app MyCampo.
<br /><br />
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-dark mobile-padding" style="background-color: #F9F9F9; padding: 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: left;">
<div class="text-small text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight: 400;">

<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>Consorzio degli Operatori del Centro Commerciale Campo dei Fiori</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>viale Ticino, 82</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span >21026 Gavirate (VA)</span><p>
</div>
</td>
</tr>
</table>                            </td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                        'attachments' => NULL,
                        'additional_info' => NULL,
                        'status' => 'sent',
                        'delayed_send_date' => NULL,
                        'readings' => NULL,
                        'created_at' => '2025-09-24 11:09:36',
                        'updated_at' => '2025-09-24 11:09:36',
                        'deleted_at' => NULL,
                        'created_by' => NULL,
                        'updated_by' => NULL,
                        'deleted_by' => NULL,
                    ),
                    20 => 
                    array (
                        'id' => '01997afd-2351-718d-81c6-9de51887571f',
                        'model_type' => 'Master\\Modules\\AppUsers\\Models\\AppUser',
                        'model_id' => '01997afc-3738-73f9-add4-68a493b6ef5d',
                        'recipients' => '["emanuele.toffolon@enesi.it"]',
                        'message_type' => NULL,
                        'date_sent' => '2025-09-24 11:10:34',
                        'subject' => 'MyCampo - Il tuo account è stato cancellato',
                        'message' => '<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<title>CampoDeiFiori</title>

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
<body style="margin: 0; padding: 0; background-color: #D70F2A; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #D70F2A;">
<tr>
<td style="padding: 20px 0 0 0;">
<table class="email-container" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto; max-width: 600px; width: 100%;">
<tr>
<td class="bg-black" style="background-color: #FFFFFF; padding: 20px 0;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center; padding: 15px 20px;">
<img src="https://cdf.test/assets/mail/images/logo-email.jpg"
alt="CampoDeiFiori"
width="300"
height="auto"
style="display: block; margin: 0 auto; max-width: 300px; height: auto;">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-black mobile-padding" style="background-color: #FFFFFF; padding: 40px 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">

<h1 class="heading-large text-white font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 28px; line-height: 34px; font-weight: 400; margin: 0 0 20px 0; text-align: center;">
Il tuo account MyCampo è stato cancellato
</h1>

<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="text-body text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 22px; font-weight: 400; margin: 0 0 30px 0; text-align: center;">
Come da tua richiesta, abbiamo provveduto a cancellare il tuo account.<br><br>Non dimenticare che in qualsiasi momento puoi creare un nuovo account con l\'app MyCampo.<br><br><strong>Grazie!</strong>
</td>
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
<td class="bg-dark mobile-padding" style="background-color: #F9F9F9; padding: 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: left;">
<div class="text-small text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight: 400;">

<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>Consorzio degli Operatori del Centro Commerciale Campo dei Fiori</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>viale Ticino, 82</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span >21026 Gavirate (VA)</span><p>
</div>
</td>
</tr>
</table>                            </td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                        'attachments' => NULL,
                        'additional_info' => NULL,
                        'status' => 'sent',
                        'delayed_send_date' => NULL,
                        'readings' => NULL,
                        'created_at' => '2025-09-24 11:10:34',
                        'updated_at' => '2025-09-24 11:10:34',
                        'deleted_at' => NULL,
                        'created_by' => NULL,
                        'updated_by' => NULL,
                        'deleted_by' => NULL,
                    ),
                    21 => 
                    array (
                        'id' => '01997afd-679f-7248-974c-26b36c50b38b',
                        'model_type' => 'Master\\Modules\\AppUsers\\Models\\AppUser',
                        'model_id' => '01997afd-5f2d-7018-9e0f-4b2ecb77645c',
                        'recipients' => '["emanuele.toffolon@enesi.it"]',
                        'message_type' => NULL,
                        'date_sent' => '2025-09-24 11:10:51',
                        'subject' => 'MyCampo - Registrazione',
                        'message' => '<!DOCTYPE html>
<html lang="it" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="x-apple-disable-message-reformatting">
<meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
<title>CampoDeiFiori</title>

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
<body style="margin: 0; padding: 0; background-color: #D70F2A; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #D70F2A;">
<tr>
<td style="padding: 20px 0 0 0;">
<table class="email-container" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: 0 auto; max-width: 600px; width: 100%;">
<tr>
<td class="bg-black" style="background-color: #FFFFFF; padding: 20px 0;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center; padding: 15px 20px;">
<img src="https://cdf.test/assets/mail/images/logo-email.jpg"
alt="CampoDeiFiori"
width="300"
height="auto"
style="display: block; margin: 0 auto; max-width: 300px; height: auto;">
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-black mobile-padding" style="background-color: #FFFFFF; padding: 40px 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: center;">

<h1 class="heading-large text-white font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 28px; line-height: 34px; font-weight: 400; margin: 0 0 20px 0; text-align: center;">
Benvenuto sull\'app MyCampo
</h1>

<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td class="text-body text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 15px; line-height: 22px; font-weight: 400; margin: 0 0 30px 0; text-align: center;">
Grazie per esserti registrato nella nostra app MyCampo.
<br /><br />
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td class="bg-dark mobile-padding" style="background-color: #F9F9F9; padding: 30px;">
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
<td style="text-align: left;">
<div class="text-small text-light font-primary"
style="color: #1e1e1e; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight: 400;">

<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>Consorzio degli Operatori del Centro Commerciale Campo dei Fiori</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>viale Ticino, 82</span><p>
<p style="margin: 0 0 5px 0;color: #1e1e1e;"><span >21026 Gavirate (VA)</span><p>
</div>
</td>
</tr>
</table>                            </td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
',
                        'attachments' => NULL,
                        'additional_info' => NULL,
                        'status' => 'sent',
                        'delayed_send_date' => NULL,
                        'readings' => NULL,
                        'created_at' => '2025-09-24 11:10:51',
                        'updated_at' => '2025-09-24 11:10:51',
                        'deleted_at' => NULL,
                        'created_by' => NULL,
                        'updated_by' => NULL,
                        'deleted_by' => NULL,
                    ),
                ));
        
        
    }
}