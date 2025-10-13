<!DOCTYPE html>
<html lang="{{ Websites::currentLanguage('iso_code2') }}">
<head>
    {!! Meta::render() !!}
    {!! Dom::renderCookieBanner() !!}
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{-- Includable CSS --}}
    @include('base.head')
    @yield('head')
</head>
<body class="lang-{{ Websites::currentLanguage('iso_code2') }}" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly;">
    <div style="max-width: 600px; margin: 0 auto; position: relative; height: 100%;" class="email-container">
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
            <tbody><tr>
                <td valign="middle" class="hero bg_white" style="height: 100px;">
                    @include('base.header')
                </td>
            </tr>

            <tr>
                <td class="bg_white email-section" style="text-align:center; padding-bottom: 5em;">
                    @yield('content')
                </td>
            </tr><!-- end: tr -->
            </tbody>
        </table>
        @include('base.footer')
</div>

{{-- Global Config (global config for global JS scripts) --}}
<script>
    window.front = {
        route: '{{ Front::currentRouteName() }}',
        lang: '{{ App::getLocale() }}',
        google_api_key: '{{ Websites::current('google_api_key') }}'
    }
    @if(Cache::has('translations_front_' . App::getLocale()))
        window.front.translations = {!! Cache::get('translations_front_' . App::getLocale()) ?? "''" !!};
    @endif
    @if(session()->has('callbacks'))
        window.front.callbacks = @json(session('callbacks'));
    @endif
</script>

{{-- Includable JS --}}
@include('base.scripts')
@yield('scripts')

</body>
</html>
