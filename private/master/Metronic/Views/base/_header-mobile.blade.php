{{-- Header Mobile --}}
<div id="kt_header_mobile" class="header-mobile {{ Metronic::printClasses('header-mobile', false) }}" {{ Metronic::printAttrs('header-mobile') }}>
    <div class="mobile-logo">
        <a href="{{ url('/') }}">

            @php
                $kt_logo_image = 'logo-light.png'
            @endphp

            @if (config('metronic.aside.self.display') == false)

                @if (config('metronic.header.self.theme') === 'light')
                    @php $kt_logo_image = '/assets/master/images/logo-dark.png' @endphp
                @elseif (config('metronic.header.self.theme') === 'dark')
                    @php $kt_logo_image = '/assets/master/images/logo-light.png' @endphp
                @endif

            @else

                @if (config('metronic.brand.self.theme') === 'light')
                    @php $kt_logo_image = '/assets/master/images/logo-dark.png' @endphp
                @elseif (config('metronic.brand.self.theme') === 'dark')
                    @php $kt_logo_image = '/assets/master/images/logo-light.png' @endphp
                @endif

            @endif

            <img alt="{{ config('app.name') }}" src="{{ $kt_logo_image }}"/>
        </a>
    </div>
    <div class="d-flex align-items-center">

        @if (config('metronic.aside.self.display'))
            <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle"><span></span></button>
        @endif

        @if (config('metronic.header.menu.self.display'))
            <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle"><span></span></button>
        @endif

        <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
	        <i class="icon-xl la la-user-circle"></i>
        </button>

    </div>
</div>
