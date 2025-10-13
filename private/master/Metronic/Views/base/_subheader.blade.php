{{-- Subheader V1 --}}

<div class="subheader py-2 {{ Metronic::printClasses('subheader', false) }}" id="kt_subheader">
    <div class="{{ Metronic::printClasses('subheader-container', false) }} d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">

		{{-- Info --}}
        <div class="d-flex align-items-center flex-wrap mr-1">

			{{-- Page Title --}}
            <h5 class="text-dark font-weight-bold my-2 mr-5">
                {{ @$page_title }}

                @if (isset($page_description) && config('metronic.subheader.displayDesc'))
                    <small>{{ @$page_description }}</small>
                @endif
            </h5>

            @if (!empty($page_breadcrumbs))
				{{-- Separator --}}
                <div class="subheader-separator subheader-separator-ver my-2 mr-4 d-none"></div>

                {{-- Breadcrumb --}}
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2">
                    @foreach ($page_breadcrumbs as $k => $item)
						<li class="breadcrumb-item">
                            @if (isset($item['page']))
                                <a href="{{ url($item['page']) }}" class="text-muted">{{ $item['title'] }}</a>
                            @else
                        	    <span class="text-muted">{{ $item['title'] }}</span>
                            @endif
						</li>
                    @endforeach
                </ul>
            @endif

            @hasSection('page_left_toolbar')
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 ml-5 bg-gray-200"></div>
                @yield('page_left_toolbar')
            @endif
        </div>

		{{-- Toolbar --}}
        <div class="d-flex align-items-center">
            @hasSection('page_right_toolbar')
                @yield('page_right_toolbar')
            @endif
        </div>

    </div>
</div>
