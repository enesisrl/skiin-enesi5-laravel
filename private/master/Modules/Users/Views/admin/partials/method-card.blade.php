<div class="d-flex align-items-center justify-content-between border rounded p-3 mb-2 {{ $isPrimary ? 'bg-light border-primary' : ($isEnabled ? 'bg-light' : '') }}">
    <div>
        <strong>
            <i class="{{ $methodConfig['icon'] }} {{ $methodConfig['icon_color'] }} mr-3"></i>
            {{ __('admin::2fa.' . $methodConfig['label']) }}
        </strong>

        @if($displayValue)
            <small class="text-muted d-block">{{ $displayValue }}</small>
        @endif

        @if($isEnabled)
            <small class="text-success">{{ __('admin::2fa.verified') }}</small>
        @else
            <small class="text-muted d-block">{{ __('admin::2fa.method_' . $method . '_description') }}</small>
            <small class="text-warning">{{ __('admin::2fa.not_configured') }}</small>
        @endif
    </div>

    <div class="d-flex align-items-center">
        @if($isEnabled)
            @if($isPrimary)
                <span class="label label-xl label-primary label-inline mr-2">{{ __('admin::2fa.primary') }}</span>
            @elseif(count($availableMethods) > 1)
                <button type="button"
                        class="btn btn-sm btn-outline-primary mr-2 set-primary-method"
                        data-method="{{ $method }}"
                        data-user-id="{{ $model->id }}">
                    {{ __('admin::2fa.set_as_primary') }}
                </button>
            @endif

            @if($canDisable)
                {{-- Disabilita metodo --}}
                <form method="post" action="{{ $module->adminRoute('2fa.disable-method') }}" class="d-inline disable-method-form">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $model->id }}">
                    <input type="hidden" name="method" value="{{ $method }}">
                    <button type="button" class="btn btn-sm btn-danger disable-method-btn"
                            data-method="{{ $method }}">
                        <i class="fa fa-times"></i> {{ __('admin::2fa.disable_method') }}
                    </button>
                </form>
            @endif
        @else
            {{-- Abilita metodo --}}
            @if(isset($methodConfig['phone_field']) && !$model->{$methodConfig['phone_field']})
                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#{{ $method }}_phone_modal">
                    <i class="fa fa-plus"></i> {{ __('admin::2fa.enable_method') }}
                </button>
            @else
                <form method="post" action="{{ $module->adminRoute('2fa.enable-method') }}" class="d-inline">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $model->id }}">
                    <input type="hidden" name="method" value="{{ $method }}">
                    <button type="submit" class="btn btn-sm btn-success">
                        <i class="fa fa-plus"></i> {{ __('admin::2fa.enable_method') }}
                    </button>
                </form>
            @endif
        @endif
    </div>
</div>
