{{-- Extends layout --}}
@extends('Metronic::default')

{{-- Page Left Toolbar --}}
@section('page_left_toolbar')

@endsection

{{-- Page Right Toolbar --}}
@section('page_right_toolbar')

@endsection

{{-- Content --}}
@section('content')

    @if(!$model->two_factor_enabled)
        <div class="alert alert-warning">
            <i class="fa fa-exclamation-triangle text-white"></i>&nbsp;&nbsp;{{ __('admin::2fa.2fa_is_not_active') }}
        </div>
    @endif

    <div class="card card-custom">
        <div class="card-body">
            <h3 class="mb-4">
                <i class="fa fa-shield-alt text-primary"></i>
                {{ __('admin::2fa.setup_title') }}
            </h3>

            {{-- Messaggi di successo o errore --}}
            @if(session('message'))
                <div class="alert alert-success">
                    <i class="fa fa-check-circle text-white"></i>&nbsp;&nbsp;{{ session('message') }}
                </div>
            @endif

            @if($errors->has('otp'))
                <div class="alert alert-danger">
                    <i class="fa fa-exclamation-circle text-white"></i>&nbsp;&nbsp;{{ $errors->first('otp') }}
                </div>
            @endif

            {{-- Stato attuale 2FA --}}
            @if($model->two_factor_enabled)
                @php
                    $primaryMethod = $model->getPrimaryTwoFactorMethod();
                @endphp

                {{-- Metodo Email (sempre presente) --}}
                @include('UsersModule::admin.partials.method-card', [
                    'method' => 'email',
                    'methodConfig' => $availableMethods['email'],
                    'methodData' => null,
                    'displayValue' => $model->email,
                    'isPrimary' => $primaryMethod === 'email',
                    'isEnabled' => true,
                    'canDisable' => false
                ])

                {{-- Metodi aggiuntivi (dinamici) --}}
                <div class="mb-4">
                    @foreach($availableMethods as $methodName => $methodConfig)
                        @if($methodName !== 'email')
                            @php
                                $methodData = $model->twoFactorMethods->where('method', $methodName)->first();
                                $phoneField = $methodConfig['phone_field'] ?? null;
                                $displayValue = $phoneField ? ($model->{$phoneField} ?? __('admin::2fa.phone_not_set')) : null;
                            @endphp

                            @include('UsersModule::admin.partials.method-card', [
                                'method' => $methodName,
                                'methodConfig' => $methodConfig,
                                'methodData' => $methodData,
                                'displayValue' => $displayValue,
                                'isPrimary' => $primaryMethod === $methodName,
                                'isEnabled' => $methodData && $methodData->is_enabled,
                                'canDisable' => true
                            ])
                        @endif
                    @endforeach
                </div>

                {{-- Bottone per disabilitare completamente la 2FA --}}
                <form method="post" action="{{ $module->adminRoute('2fa.disable') }}" class="mb-3 disable-2fa-completely-form">
                    <input type="hidden" name="user_id" value="{{ $model->id }}">
                    @csrf
                    <button type="button" class="btn btn-danger disable-2fa-completely">
                        <i class="fa fa-times-circle"></i> {{ __('admin::2fa.disable_2fa_completely') }}
                    </button>
                </form>

                {{-- Rimuovi tutti i dispositivi memorizzati --}}
                @if($model->rememberedDevices->count() > 0)
                    <form method="post" action="{{ $module->adminRoute('2fa.forget-all-devices') }}" class="mb-3 mt-10 forget-all-devices-form">
                        <input type="hidden" name="user_id" value="{{ $model->id }}">
                        @csrf
                        <button type="button" class="btn btn-warning remove-all-devices-btn">
                            <i class="fa fa-mobile-alt"></i> {{ __('admin::2fa.forget_all_devices') }} ({{ $model->rememberedDevices->count() }})
                        </button>
                    </form>
                @endif

            @else
                {{-- Setup iniziale 2FA (solo email) --}}
                <div class="mb-4">
                    <div class="alert alert-custom alert-outline-info fade show mb-5">
                        <div class="alert-icon"><i class="fa fa-info-circle"></i></div>
                        <div class="alert-text">{{ __('admin::2fa.setup_description') }}</div>
                        <div class="alert-close">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                            </button>
                        </div>
                    </div>

                    <form method="post" action="{{ $module->adminRoute('2fa.setup') }}" id="setup_2fa_form">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $model->id }}">
                        <input type="hidden" name="method" value="email">

                        <div class="mb-3">
                            <div class="d-flex align-items-center p-3 border rounded bg-light">
                                <i class="fa fa-envelope text-primary fa-2x mr-3"></i>
                                <div class="flex-grow-1">
                                    <strong>{{ __('admin::2fa.method_email') }}</strong>
                                    <small class="text-muted d-block">{{ $model->email }}</small>
                                    <small class="text-info d-block">{{ __('admin::2fa.primary_method_required') }}</small>
                                </div>
                                <span class="badge badge-primary">{{ __('admin::2fa.required') }}</span>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-shield-alt"></i> {{ __('admin::2fa.setup_2fa') }}
                        </button>
                    </form>
                </div>
            @endif

            {{-- Dispositivi memorizzati (se presenti) --}}
            @if($model->rememberedDevices->count() > 0)
                <div class="separator separator-solid separator-border-2 mt-10 mb-10"></div>
                <div class="mt-4">
                    <h5>{{ __('admin::2fa.remembered_devices') }}</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">{{ __('admin::2fa.device_name') }}</th>
                                <th scope="col">{{ __('admin::2fa.last_used') }}</th>
                                <th scope="col">{{ __('admin::2fa.expires') }}</th>
                                <th scope="col">{{ __('admin::label.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($model->rememberedDevices as $device)
                                <tr>
                                    <td>
                                        <i class="fa fa-mobile-alt text-muted"></i>
                                        {{ $device->device_name ?? __('admin::2fa.unknown_device') }}
                                    </td>
                                    <td>{{ $device->last_used_at?->diffForHumans() ?? '-' }}</td>
                                    <td>{{ $device->expires_at->diffForHumans() }}</td>
                                    <td>
                                        <form method="post" action="{{ $module->adminRoute('2fa.forget-device') }}" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $model->id }}">
                                            <input type="hidden" name="device_id" value="{{ $device->id }}">
                                            <button type="submit" class="btn btn-sm btn-clean btn-icon">
                                                <i class="la la-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>

    {{-- Modal per inserimento OTP --}}
    <div class="modal fade" id="otp_modal" tabindex="-1" role="dialog" aria-labelledby="otpModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="otpModalLabel">
                        <i class="fa fa-shield-alt text-primary"></i>
                        {{ __('admin::2fa.verify_title') }}
                    </h5>
                </div>
                <form method="post" action="{{ $module->adminRoute('2fa.verify') }}" id="verify_otp_form">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $model->id }}">

                    <div class="modal-body">

                        <div class="alert alert-custom alert-info fade show mb-5" id="otp_method_info">
                            <div class="alert-icon"><i class="fa fa-info-circle"></i></div>
                            <div class="alert-text"><span id="otp_method_text">{{ __('admin::2fa.otp_sent_to_method', ['method' => __('admin::2fa.method_' . session('2fa_method', 'email'))]) }}</span></div>
                        </div>

                        <div class="form-group">
                            <label for="otp_input">{{ __('admin::2fa.insert_otp_code') }}</label>
                            <input type="text"
                                   name="otp"
                                   id="otp_input"
                                   class="form-control text-center font-weight-bold font-size-h4"
                                   required
                                   autofocus
                                   maxlength="6"
                                   placeholder="000000"
                                   autocomplete="off">
                            <small class="form-text text-muted">{{ __('admin::2fa.otp_expires_in', ['minutes' => config('otp.otp-validity-minutes')]) }}</small>
                        </div>

                        {{-- Messaggi di errore per il resend --}}
                        <div id="resend_error_container" style="display: none;">
                            <div class="alert alert-warning mb-3">
                                <span id="resend_error_message"></span>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-between">
                        <div>
                            <button type="button" class="btn btn-outline-primary btn-sm" id="resend_otp_btn">
                                <i class="fa fa-redo"></i> {{ __('admin::2fa.resend_code') }}
                            </button>
                        </div>
                        <div>
                            <button type="button" class="btn btn-secondary" onclick="location.reload()">
                                {{ __('admin::label.cancel') }}
                            </button>
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check"></i> {{ __('admin::2fa.verify') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modals dinamici per metodi che richiedono phone --}}
    @foreach($availableMethods as $methodName => $methodConfig)
        @if(isset($methodConfig['phone_field']))
            @include('UsersModule::admin.partials.phone-modal', [
                'method' => $methodName,
                'methodConfig' => $methodConfig,
                'phoneField' => $methodConfig['phone_field']
            ])
        @endif
    @endforeach


@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Auto-submit OTP quando vengono inseriti 6 caratteri
            $('#otp_input').on('input', function() {
                if ($(this).val().length === 6) {
                    $('#verify_otp_form').submit();
                }
            });

            // Gestione resend OTP via AJAX
            $('#resend_otp_btn').on('click', function() {
                const $btn = $(this);
                const $errorContainer = $('#resend_error_container');
                const $errorMessage = $('#resend_error_message');

                $btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> {{ __('admin::2fa.resending') }}...');
                $errorContainer.hide();

                $.post('{{ $module->adminRoute('2fa.resend') }}', {
                    _token: '{{ csrf_token() }}',
                    user_id: '{{ $model->id }}'
                })
                    .done(function(data) {
                        // Successo - mostra messaggio di successo
                        $('#otp_method_info').removeClass('alert-info').addClass('alert-success')
                            .find('span').text('{{ __('admin::2fa.code_sent_again') }}');

                        // Reset input OTP
                        $('#otp_input').val('').focus();
                    })
                    .fail(function(xhr) {
                        // Errore - mostra messaggio di errore
                        if (xhr.responseJSON && xhr.responseJSON.errors && xhr.responseJSON.errors.resend) {
                            $errorMessage.text(xhr.responseJSON.errors.resend[0]);
                            $errorContainer.show();
                        } else {
                            $errorMessage.text('{{ __('admin::2fa.resend_error') }}');
                            $errorContainer.show();
                        }
                    })
                    .always(function() {
                        // Riabilita il bottone dopo 3 secondi
                        setTimeout(function() {
                            $btn.prop('disabled', false).html('<i class="fa fa-redo"></i> {{ __('admin::2fa.resend_code') }}');
                        }, 3000);
                    });
            });

            // Gestione selezione metodo primario
            $('.set-primary-method').on('click', function() {
                const $btn = $(this);
                const method = $btn.data('method');
                const userId = $btn.data('user-id');

                // Disabilita il bottone
                $btn.prop('disabled', true).text('{{ __('admin::2fa.saving') }}...');

                $.post('{{ $module->adminRoute('2fa.set-primary-method') }}', {
                    _token: '{{ csrf_token() }}',
                    user_id: userId,
                    method: method
                })
                    .done(function(data) {
                        // Ricarica la pagina per aggiornare la vista
                        location.reload();
                    })
                    .fail(function(xhr) {
                        alert('{{ __('admin::2fa.primary_method_error') }}');
                        $btn.prop('disabled', false).text('{{ __('admin::2fa.set_as_primary') }}');
                    });
            });

            // Mostra modal OTP se necessario
            @if(session('2fa_otp_required'))
            $('#otp_modal').modal('show');
            @endif

            // Focus automatico sull'input OTP quando si apre la modal
            $('#otp_modal').on('shown.bs.modal', function () {
                $('#otp_input').focus();
            });


            $('.disable-2fa-completely').on('click', function() {
                const $btn = $(this);
                const $form = $btn.closest('.disable-2fa-completely-form');

                bootbox.confirm({
                    title: '<i class="fa fa-exclamation-triangle text-warning"></i> {{ __('admin::2fa.disable_2fa_completely') }}',
                    message: '{{ __('admin::2fa.confirm_disable_all') }}',
                    buttons: {
                        cancel: {
                            label: '<i class="fa fa-times"></i> {{ __('admin::label.cancel') }}',
                            className: 'btn-secondary'
                        },
                        confirm: {
                            label: '<i class="fa fa-check"></i> {{ __('admin::2fa.disable_method') }}',
                            className: 'btn-danger'
                        }
                    },
                    callback: function (result) {
                        if (result) {
                            $form.submit();
                        }
                    }
                });
            });
            $('.remove-all-devices-btn').on('click', function() {
                const $btn = $(this);
                const $form = $btn.closest('.forget-all-devices-form');

                bootbox.confirm({
                    title: '<i class="fa fa-exclamation-triangle text-warning"></i> {{ __('admin::2fa.forget_all_devices') }}',
                    message: '{{ __('admin::2fa.confirm_forget_devices') }}',
                    buttons: {
                        cancel: {
                            label: '<i class="fa fa-times"></i> {{ __('admin::label.cancel') }}',
                            className: 'btn-secondary'
                        },
                        confirm: {
                            label: '<i class="fa fa-check"></i> {{ __('admin::label.delete') }}',
                            className: 'btn-danger'
                        }
                    },
                    callback: function (result) {
                        if (result) {
                            $form.submit();
                        }
                    }
                });
            });
            $('.disable-method-btn').on('click', function() {
                const $btn = $(this);
                const $form = $btn.closest('.disable-method-form');
                const method = $btn.data('method');

                bootbox.confirm({
                    title: '<i class="fa fa-exclamation-triangle text-warning"></i> {{ __('admin::2fa.confirm_disable_title') }}',
                    message: '{{ __('admin::2fa.confirm_disable_method_message', ['method' => ':method']) }}'.replace(':method', method),
                    buttons: {
                        cancel: {
                            label: '<i class="fa fa-times"></i> {{ __('admin::label.cancel') }}',
                            className: 'btn-secondary'
                        },
                        confirm: {
                            label: '<i class="fa fa-check"></i> {{ __('admin::2fa.disable_method') }}',
                            className: 'btn-danger'
                        }
                    },
                    callback: function (result) {
                        if (result) {
                            $form.submit();
                        }
                    }
                });
            });

        });

    </script>
@endsection
