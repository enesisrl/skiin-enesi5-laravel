@extends('Metronic::default')

@section('content')
    @include('AuthModule::admin.topbar')
    <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(//cdn.ene.si/master/20/media/bg/bg-2.jpg);">
            <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                <div class="d-flex flex-center mb-15">
                    <img src="/assets/master/images/logo-dark.png">
                </div>

                <div class="login-signin">
                    <div class="mb-20">
                        <h3 class="text-muted font-weight-normal">{{ __('admin::2fa.activation_title') }}</h3>
                    </div>
                    <form data-admin-ajax-form class="form" method="post" action="{{ \Master\Modules\Auth\Facades\Auth::adminRoute('two-factor.verify.post') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="otp" class="text-white">{{ __('admin::2fa.insert_otp_code') }}</label>
                            <input type="text"  class="form-control text-center font-weight-bold font-size-h1 @error('otp') is-invalid @enderror"
                                   id="otp" name="otp" maxlength="6" required autocomplete="off">
                            @error('otp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">{{ __('admin::2fa.activate_and_login') }}</button>
                    </form>

                    <hr class="my-4">

                    <form method="POST" action="{{ \Master\Modules\Auth\Facades\Auth::adminRoute('two-factor.skip') }}">
                        @csrf
                        <div class="text-center">
                            <p class="text-white small">
                                {{ __('admin::2fa.skip2fa_text') }}
                            </p>
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-skip-forward"></i> {{ __('admin::2fa.skip_activation') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
