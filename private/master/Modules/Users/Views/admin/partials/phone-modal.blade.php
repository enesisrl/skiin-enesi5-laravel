{{-- Modal per inserire numero WhatsApp --}}
<div class="modal fade" id="{{ $method }}_phone_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('admin::2fa.' . $method . '_phone_required_title') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ $module->adminRoute('2fa.set-' . $method . '-phone') }}" id="{{ $method }}_phone_form">
                @csrf
                <input type="hidden" name="user_id" value="{{ $model->id }}">
                <input type="hidden" name="method" value="{{ $method }}">

                <div class="modal-body">
                    <div class="alert alert-info">
                        <i class="{{ $methodConfig['icon'] }} {{ $methodConfig['icon_color'] }}"></i>
                        {{ __('admin::2fa.' . $method . '_phone_explanation') }}
                    </div>

                    <div class="form-group">
                        <label for="{{ $method }}_phone">{{ __('admin::label.' . $phoneField) }}</label>
                        <input type="tel"
                               id="{{ $method }}_phone"
                               name="{{ $phoneField }}"
                               class="form-control"
                               value="{{ $model->{$phoneField} ?? '' }}"
                               required>
                        <small class="form-text text-muted">{{ __('admin::2fa.' . $method . '_phone_format') }}</small>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        {{ __('admin::label.cancel') }}
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> {{ __('admin::2fa.save_and_enable') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
