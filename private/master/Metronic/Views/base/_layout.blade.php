@if(config('metronic.self.layout') == 'blank')
    <div class="d-flex flex-column flex-root">
        @yield('content')
    </div>
@else

    @include('Metronic::base._header-mobile')

    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-row flex-column-fluid page">

            @if(config('metronic.aside.self.display'))
                @include('Metronic::base._aside')
            @endif

            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                @include('Metronic::base._header')

                <div class="content {{ Metronic::printClasses('content', false) }} d-flex flex-column flex-column-fluid" id="kt_content">

                    @if(config('metronic.subheader.display'))
                        @include('Metronic::base._subheader')
                    @endif

                    @include('Metronic::base._content')
                </div>

                @include('Metronic::base._footer')
            </div>
        </div>
    </div>

@endif

@if (config('metronic.self.layout') != 'blank')

    @include('Metronic::partials._scrolltop')

@endif

@include('Metronic::partials._userPanel')
