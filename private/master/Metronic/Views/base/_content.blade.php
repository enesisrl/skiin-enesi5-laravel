{{-- Content --}}
@if (config('metronic.content.extended'))
    @yield('content')
@else
    <div class="d-flex flex-column-fluid custom-main-content">
        <div class="{{ Metronic::printClasses('content-container', false) }}">
            @yield('content')
        </div>
    </div>
@endif
