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

    <meta name="robots" content="@yield('robots', $robots ?? 'noindex, nofollow')" />

    {{-- Icons --}}
    <link rel="shortcut icon" href="/assets/main/favicon.ico" />


    {{-- Fonts --}}
    {{ Metronic::getGoogleFontsInclude() }}

    {{-- Global Theme Styles (used by all pages) --}}
    @foreach(config('metronic.resources.css') as $style)
        <link href="{{ \Master\Facades\Version::get($style) }}" rel="stylesheet" type="text/css"/>
    @endforeach

    {{-- Includable CSS --}}
    @yield('styles')

</head>

<body data-view-name="{!! (isset($viewName) ? 'view-'.$viewName : null) !!}" {{ Metronic::printAttrs('body') }} {{ Metronic::printClasses('body') }}>

@if (config('metronic.page-loader.type') != '')
    @include('Metronic::partials._page-loader')
@endif

@include('Metronic::base._layout')

{{-- Global Config (global config for global JS scripts) --}}
<script>
    window.HOST_URL = "";
    window.adminBaseUrl = "{!! config('master.admin.baseurl') ? "/".ltrim(config('master.admin.baseurl'),"/") : "" !!}";
    window.currentLocale = "{!! \Illuminate\Support\Facades\App::getLocale() !!}";
    window.currentLocaleCode = "{!! \Master\Facades\Admin::getCurrentLocaleCode() !!}";
    window.isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
    window.KTAppSettings = @json(config('metronic.js'), JSON_PRETTY_PRINT);
            @if(Cache::store(config('master.translations.cache_driver'))->has('translations_admin_' . app()->getLocale()))
                window.translations = {!! Cache::store(config('master.translations.cache_driver'))->get('translations_admin_' . app()->getLocale()) ?? "''" !!};
            @endif
            @if(session()->has('adminCallbacks'))
                window.adminCallbacks = @json(session('adminCallbacks'));
            @endif
                window.adminConstants = @json(config('master.constants'));
        </script>

        @firebaseConfig

        {{-- Global Theme JS Bundle (used by all pages)  --}}
        @foreach(config('metronic.resources.js') as $script)
            <script src="{{ \Master\Facades\Version::get($script) }}" type="text/javascript"></script>
        @endforeach

	@if(\Master\Facades\Admin::getCurrentLocaleCode())
	    <script src="https://releases.transloadit.com/uppy/locales/v3.3.1/{!! \Master\Facades\Admin::getCurrentLocaleCode() !!}.min.js"></script>
	@endif


        @if(auth()->user())
        <script type="text/javascript">
            jQuery(document).ready(function(){
                Admin.ajax({
                    showLoader: false,
                    method: 'post',
                    url: '{{\Master\Modules\Services\Facades\Services::adminRoute('service_custom_scripts')}}'
                });
            });
        </script>
        @endif
        @if(\Master\Modules\Websites\Facades\Websites::current("google_api_key"))
            <script type="text/javascript" src="//maps.google.com/maps/api/js?language={!! \Illuminate\Support\Facades\App::getLocale() !!}&key={!! \Master\Modules\Websites\Facades\Websites::current("google_api_key") !!}" async></script>
        @endif
{{-- Includable JS --}}
@yield('scripts')
</body>
</html>

