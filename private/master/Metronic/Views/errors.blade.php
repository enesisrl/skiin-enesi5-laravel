{{--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
 --}}
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
<head>
    <meta charset="utf-8"/>

    {{-- Title Section --}}
    <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>

    {{-- Meta Data --}}
    <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- Icons --}}
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/master/icons/icon-apple-76.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/master/icons/icon-apple-120.png" />
    <link rel="apple-touch-icon" sizes="167x167" href="/assets/master/icons/icon-apple-167.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/master/icons/icon-apple-180.png" />
    <link rel="icon" type="image/png" sizes="36x36" href="/assets/master/icons/icon-36.png" />
    <link rel="icon" type="image/png" sizes="48x48" href="/assets/master/icons/icon-48.png" />
    <link rel="icon" type="image/png" sizes="72x72" href="/assets/master/icons/icon-72.png" />
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/master/icons/icon-96.png" />
    <link rel="icon" type="image/png" sizes="144x144" href="/assets/master/icons/icon-144.png" />
    <link rel="icon" type="image/png" sizes="192x192" href="/assets/master/icons/icon-192.png" />
    <meta name="msapplication-square70x70logo" content="/assets/master/icons/icon-ms-70.png" />
    <meta name="msapplication-square150x150logo" content="/assets/master/icons/icon-ms-150.png" />
    <meta name="msapplication-wide310x150logo" content="/assets/master/icons/icon-ms-310-150.png" />
    <meta name="msapplication-square310x310logo" content="/assets/master/icons/icon-ms-310.png" />
    <meta name="msapplication-TileColor" content="#8c9db0" />

    {{-- Fonts --}}
    {{ Metronic::getGoogleFontsInclude() }}

    {{-- Global Theme Styles (used by all pages) --}}
    @foreach(config('metronic.resources.css') as $style)
        <link href="{{ $style }}" rel="stylesheet" type="text/css"/>
    @endforeach

    {{-- Includable CSS --}}
    @yield('styles')
</head>
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

<div class="d-flex flex-column flex-root">
    <!--begin::Error-->
    <div class="d-flex flex-row-fluid flex-column bgi-size-cover bgi-position-center bgi-no-repeat p-10 p-sm-30" style="background-image: url('//cdn.ene.si/master/20/media/error/bg1.jpg');">
        <!--begin::Content-->
        <h1 class="font-weight-boldest text-dark-75 mt-15" style="font-size: 10rem"><a href="/{!! config('master.admin.baseurl') !!}">Error {!! $exception->getStatusCode() !!}</a></h1>
        <p class="font-size-h3 text-muted font-weight-normal">OOPS! Something went wrong here</p>
        <!--end::Content-->
    </div>
    <!--end::Error-->
</div>

{{-- Global Config (global config for global JS scripts) --}}
<script>
    window.HOST_URL = "";
    window.adminBaseUrl = "{!! config('master.admin.baseurl') ? "/".ltrim(config('master.admin.baseurl'),"/") : "" !!}";
    window.KTAppSettings = @json(config('metronic.js'), JSON_PRETTY_PRINT);
    @if(Cache::store(config('master.translations.cache_driver'))->has('translations_admin_' . app()->getLocale()))
        window.translations = {!! Cache::store(config('master.translations.cache_driver'))->get('translations_admin_' . app()->getLocale()) ?? "''" !!};
    @endif
        @if(session()->has('adminCallbacks'))
        window.adminCallbacks = @json(session('adminCallbacks'));
    @endif
</script>

{{-- Global Theme JS Bundle (used by all pages)  --}}
@foreach(config('metronic.resources.js') as $script)
    <script src="{{ $script }}" type="text/javascript"></script>
@endforeach

{{-- Includable JS --}}
@yield('scripts')

</body>
</html>
