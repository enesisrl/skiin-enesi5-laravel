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
                        <h3 class="text-muted font-weight-normal">{{ __('admin::2fa.verify_title') }}</h3>
                        <div class="alert alert-info mb-3">{{ __('admin::2fa.otp_sent_by_'.session('2fa_method', 'email')) }}</div>
                    </div>
                    {{-- Messaggi di successo --}}
                    @if(session('message'))
                        <div class="alert alert-success mb-3">{{ session('message') }}</div>
                    @endif

                    {{-- Errori di validazione per il resend --}}
                    @if($errors->has('resend'))
                        <div class="alert alert-warning mb-3">{{ $errors->first('resend') }}</div>
                    @endif

                    <form method="post" data-admin-ajax-form action="{{ \Master\Modules\Auth\Facades\Auth::adminRoute('two-factor.verify.post') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="otp" class="text-white">{{ __('admin::2fa.insert_otp_code') }}</label>
                            <input type="text" class="form-control text-center font-weight-bold font-size-h1 @error('otp') is-invalid @enderror"
                                   id="otp" name="otp" maxlength="6" required autocomplete="off">
                            @error('otp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Opzione per ricordare il dispositivo --}}
                        @if(config('two-factor.can_remember_login', true))
                            <br />
                            <div class="form-group mb-5">
                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-lg text-white">
                                        <input type="checkbox" name="remember_device" value="1" />
                                        <span></span>
                                        {{ __('admin::2fa.remember_device') }}
                                    </label>
                                </div>
                                <div class="form-text text-white mt-2">
                                    {{ __('admin::2fa.remember_device_description', ['days' => config('two-factor.remember_device_days', 30)]) }}
                                </div>
                            </div>
                            <br />
                        @endif

                        <button type="submit" class="btn btn-success">{{ __('admin::2fa.verify') }}</button>
                    </form>
                    <div class="mt-10">
                        <a href="{{ \Master\Modules\Auth\Facades\Auth::adminRoute('two-factor.resend') }}" class="btn btn-link font-weight-bold text-white mr-2">
                            {{ __('admin::2fa.resend_code') }}
                        </a>
                        {{-- Link per cambiare metodo se disponibili più metodi --}}
                        @php
                            $availableMethods = session('available_methods', []);
                            $hasMultipleMethods = count($availableMethods) > 1;
                        @endphp

                        @if($hasMultipleMethods)
                            <a href="{{ \Master\Modules\Auth\Facades\Auth::adminRoute('two-factor.choose-method') }}" class="btn btn-link font-weight-bold text-white">
                                {{ __('admin::2fa.change_method') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
