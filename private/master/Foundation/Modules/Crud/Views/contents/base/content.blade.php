<div data-card="true" class="card card-custom gutter-b draggable draggableContent" id="card_contentTitle__{{$lang}}__{{ $cont }}">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">{{ $content_card_title }}</h3>
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" title="{{ __("admin::label.expand_collapse") }}">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
            @if((isset($viewMode) && !$viewMode) || !isset($viewMode))
                <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary" data-card-tool="remove" title="{{ __("admin::label.remove") }}">
                    <i class="ki ki-close icon-nm"></i>
                </a>
                <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary draggable-handle draggableContent-handle" title="{{ __("admin::label.move") }}">
                    <i class="ki ki-menu "></i>
                </a>
            @endif

            @yield('content_card_toolbar')
        </div>
    </div>
    <div class="card-body">
        <input type="hidden" class="contentId__{{$lang}}" name="contentId__{{$lang}}[{{$cont}}]" value="{{ $content->id ?? null }}" />
        <input type="hidden" class="contentSequence" name="contentSequence__{{$lang}}[{{$cont}}]" data-order value="{!! ($content->id && $content->sequence) ? $content->sequence : $cont * 10 !!}" />
        {!! $content_card_body !!}
    </div>
</div>