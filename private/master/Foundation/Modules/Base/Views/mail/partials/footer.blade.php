<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
    <tr>
        <td style="text-align: left;">
            <div class="text-small text-light font-primary"
                 style="color: #1e1e1e; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; line-height: 18px; font-weight: 400;">

                <p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>{{ Websites::current('company.name') }}</span><p>
                <p style="margin: 0 0 5px 0;color: #1e1e1e;"><span>{{ Websites::current('sede_legale.toponimo') }} {{ Websites::current('sede_legale.indirizzo') }}</span><p>
                <p style="margin: 0 0 5px 0;color: #1e1e1e;"><span >{{ Websites::current('sede_legale.cap') }} {{ Websites::current('sede_legale.comune') }} ({{ Websites::current('sede_legale.provincia_sigla') }})</span><p>
                @if (Websites::current('company.vat_id'))
                    <p style="margin: 0; color: #1e1e1e;"><span>{{ __('admin::label.vat_id') }} {{ Websites::current('company.vat_id') }}</span><p>
                @endif
            </div>
        </td>
    </tr>
</table>