{{-- Header --}}
<div id="kt_header" class="header {{ Metronic::printClasses('header', false) }}" {{ Metronic::printAttrs('header') }}>

    {{-- Container --}}
    <div class="container-fluid d-flex align-items-center justify-content-between">
        @if (config('metronic.header.self.display'))

            @php
                $kt_logo_image = '/assets/master/images/logo-light.png';
            @endphp

            @if (config('metronic.header.self.theme') === 'light')
                @php $kt_logo_image = '/assets/master/images/logo-dark.png' @endphp
            @elseif (config('metronic.header.self.theme') === 'dark')
                @php $kt_logo_image = '/assets/master/images/logo-light.png' @endphp
            @endif

            {{-- Header Menu --}}
            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                @if(config('metronic.aside.self.display') == false)
                    <div class="header-logo">
                        <a href="{{ url('/') }}">
                            <img alt="Logo" src="{{ $kt_logo_image }}"/>
                        </a>
                    </div>
                @endif

                <div id="kt_header_menu" class="header-menu header-menu-mobile {{ Metronic::printClasses('header_menu', false) }}" {{ Metronic::printAttrs('header_menu') }}>
                    <ul class="menu-nav {{ Metronic::printClasses('admin_header_menu_nav', false) }}">
                        {{ Menu::renderHeader() }}
                    </ul>
                </div>
            </div>

        @else
            <div></div>
        @endif

        @include('Metronic::partials._topbar')
    </div>
</div>
