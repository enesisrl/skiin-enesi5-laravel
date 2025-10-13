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

    <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(//cdn.ene.si/master/20/media/bg/bg-2.jpg);">
            <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                <div class="d-flex flex-center mb-15">
                    <img src="/assets/master/images/logo-dark.png">
                </div>
                <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                    <div class="bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                        <form class="form w-100" novalidate="novalidate" id="two_factor_proposal_form" action="{{ \Master\Modules\Auth\Facades\Auth::adminRoute('two-factor.proposal.accept') }}" method="POST">
                            @csrf

                            <div class="text-center mb-10">
                                <h1 class="text-white mb-3">{{ __('admin::2fa.proposal_title') }}</h1>
                                <div class="text-gray-400 fw-bold fs-4">{{ __('admin::2fa.proposal_subtitle') }}</div>
                            </div>

                            <div class="mb-10">
                                <div class="notice d-flex bg-info rounded border border-dashed p-6">
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="fw-bold">
                                            <div class="fs-6 text-white">{{ __('admin::2fa.activate_info') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-8">
                                <h4 class="text-white mb-4">{{ __('admin::2fa.proposal_benefits_title') }}</h4>
                                <div class="mb-3">
                                    <div class="text-gray-600">{{ __('admin::2fa.benefit_security') }}</div>
                                </div>
                                <div class="mb-3">
                                    <div class="text-gray-600">{{ __('admin::2fa.benefit_protection') }}</div>
                                </div>
                                <div class="mb-3">
                                    <div class="text-gray-600">{{ __('admin::2fa.benefit_compliance') }}</div>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mb-5">
                                <button type="submit" id="accept_button" class="btn btn-lg btn-primary fw-bolder">
                                    <span class="indicator-label">{{ __('admin::2fa.setup_now') }}</span>
                                </button>
                                <button type="button" id="skip_button" class="btn btn-lg btn-light-primary fw-bolder" data-toggle="modal" data-target="#skip_modal">
                                    {{ __('admin::2fa.skip_for_now') }}
                                </button>
                            </div>

                            <div class="text-center">
                                <small class="text-muted">{{ __('admin::2fa.proposal_footer') }}</small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal per le opzioni di skip -->
    <div class="modal fade" id="skip_modal" tabindex="-1" aria-labelledby="skip_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="skip_form" action="{{ \Master\Modules\Auth\Facades\Auth::adminRoute('two-factor.proposal.skip') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="skip_modal_label">{{ __('admin::2fa.skip_options') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-4">{{ __('admin::2fa.skip_description') }}</p>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="remember_choice" name="remember_choice" value="1">
                            <label class="form-check-label" for="remember_choice">
                                {{ __('admin::2fa.remember_choice') }}
                            </label>
                            <div class="form-text">{{ __('admin::2fa.remember_choice_help') }}</div>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember_device" name="remember_device" value="1">
                            <label class="form-check-label" for="remember_device">
                                {{ __('admin::2fa.remember_device') }}
                            </label>
                            <div class="form-text">{{ __('admin::2fa.remember_device_help',['days'=>config('two-factor.remember_device_days')]) }}</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('admin::label.cancel') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('admin::2fa.continue_without') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Gestione form di accettazione
            $('#two_factor_proposal_form').on('submit', function(e) {
                e.preventDefault();

                var $button = $('#accept_button');
                $button.prop('disabled', true);

                Admin.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                    },
                    error: function() {
                        $button.prop('disabled', false);
                        toastr.error('{{ __("admin::message.errore_generico") }}');
                    }
                });
            });

            // Gestione click sul pulsante "Salta per Ora" - Bootstrap 4
            $('#skip_button').on('click', function(e) {
                e.preventDefault();
                $('#skip_modal').modal('show');
            });

            // Gestione form di skip
            $('#skip_form').on('submit', function(e) {
                e.preventDefault();

                var $submitBtn = $(this).find('button[type="submit"]');
                $submitBtn.prop('disabled', true);
                $submitBtn.html('<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>{{ __("admin::label.attendere") }}...');

                Admin.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    error: function() {
                        $submitBtn.prop('disabled', false);
                        $submitBtn.html('{{ __("admin::2fa.continue_without") }}');
                        toastr.error('{{ __("admin::message.errore_generico") }}');
                    }
                });
            });

            // Gestione chiusura modal con il pulsante X o Annulla
            $('#skip_modal .btn-close, #skip_modal .btn-secondary').on('click', function() {
                $('#skip_modal').modal('hide');
            });

            // Ripristina lo stato del pulsante quando il modal si chiude
            $('#skip_modal').on('hidden.bs.modal', function() {
                var $submitBtn = $('#skip_form button[type="submit"]');
                $submitBtn.prop('disabled', false);
                $submitBtn.html('{{ __("admin::2fa.continue_without") }}');
            });
        });
    </script>
@endsection
