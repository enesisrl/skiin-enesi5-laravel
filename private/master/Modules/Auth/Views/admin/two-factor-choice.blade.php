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
                        <h3 class="text-muted font-weight-normal">{{ __('admin::2fa.account_security') }}</h3>
                        <p class="text-white">{!! nl2br(__('admin::2fa.activate_info')) !!}</p>
                    </div>
                    @if(session('message'))
                        <div class="alert alert-info">{{ session('message') }}</div>
                    @endif

                    <div class="d-grid gap-2">
                        <form method="post" data-admin-ajax-form action="{{ \Master\Modules\Auth\Facades\Auth::adminRoute('two-factor.enable') }}">
                            @csrf
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="fas fa-shield-alt"></i> {{ __('admin::2fa.yes_activate') }}
                            </button>
                        </form>
                        <br />
                        <hr />
                        <br />
                        <form method="post" data-admin-ajax-form action="{{ \Master\Modules\Auth\Facades\Auth::adminRoute('two-factor.skip-choice') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-times"></i> {{ __('admin::2fa.no_skip') }}
                            </button>
                            <hr />
                            <div class="form-check mb-3 d-flex justify-content-center">
                                <div class="checkbox-inline m-auto">
                                    <label class="checkbox m-0 text-muted">
                                        <input class="form-check-input" type="checkbox" id="remember_device" name="remember_device" value="1">
                                        <span></span>{{ __('admin::2fa.remember_me', ['days'=>config('two-factor.remember_device_days')]) }}</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
