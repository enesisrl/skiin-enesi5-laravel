<table align="center" cellpadding="0" cellspacing="0" class="container-for-gmail-android" width="100%">
    <tr>
        <td align="left" valign="top" width="100%" style="background:repeat-x url(https://cdn.ene.si/master/20/media/mail/templates/default/bg_top.jpg) #ffffff;">
            @include('Metronic::mail_templates.html._header')
        </td>
    </tr>
    <tr>
        <td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
            {!! $message_body !!}
        </td>
    </tr>
    <tr>
        <td align="center" valign="top" width="100%" style="background-color: #f7f7f7; height: 100px;">
            @include('Metronic::mail_templates.html._footer')
        </td>
    </tr>
</table>

