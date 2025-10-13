<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto; position: {!! isset($position_footer) ? $position_footer : 'absolute' !!}; bottom: 0; background: #303030;">
    <tbody><tr>
        <td valign="middle" class="bg_grey footer email-section">
            <table>
                <tbody><tr>
                    <td valign="top" width="33.333%">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tbody><tr>
                                <td style="text-align: left; padding-right: 10px;">
                                    <p>{{ Websites::current('company.name') }}<br>
                                        {{ Websites::current('sede_legale.toponimo') }} {{ Websites::current('sede_legale.indirizzo') }}<br>
                                        {{ Websites::current('sede_legale.cap') }} {{ Websites::current('sede_legale.comune') }} ({{ Websites::current('sede_legale.provincia_sigla') }})<br>
                                        @if (Websites::current('company.vat_id'))
                                            {{ __('admin::label.vat_id') }} {{ Websites::current('company.vat_id') }}
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            </tbody></table>
                    </td>
                    <td valign="top" width="33.333%">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tbody><tr>
                                <td style="text-align: right; padding-left: 5px; padding-right: 5px;">
                                    <p>
                                        @if (Websites::current('contacts.phone'))
                                            {{ __('admin::label.phone') }} {{ Websites::current('contacts.phone') }}<br>
                                        @endif
                                        @if (Websites::current('contacts.fax'))
                                            {{ __('admin::label.fax') }} {{ Websites::current('contacts.fax') }}<br>
                                        @endif
                                        @if (Websites::current('contacts.mobile'))
                                            {{ __('admin::label.mobile') }} {{ Websites::current('contacts.mobile') }}<br>
                                        @endif
                                        @if (Websites::current('contacts.whatsapp'))
                                            {{ __('admin::label.whatsapp') }} {{ Websites::current('contacts.whatsapp') }}<br>
                                        @endif
                                        @if (Websites::current('contacts.email'))
                                            <a href="mailto:{{ Websites::current('contacts.email') }}">{{ Websites::current('contacts.email') }}</a><br>
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            </tbody></table>
                    </td>
                </tr>
                </tbody></table>
        </td>
    </tr>
    </tbody></table>
