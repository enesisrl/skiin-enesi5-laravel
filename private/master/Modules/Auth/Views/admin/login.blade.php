@extends('Metronic::default')


{{-- Content --}}
@section('content')
    @include('AuthModule::admin.topbar')
    <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url(//cdn.ene.si/master/20/media/bg/bg-2.jpg);">
            <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                <div class="d-flex flex-center mb-15">
                    <img src="/assets/master/images/logo-dark.png">
                </div>

                <div class="login-signin">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form data-admin-ajax-form class="form" method="post" action="{{ $module->adminRoute('login') }}">
                        <div class="form-group fv-plugins-icon-container">
                            <input class="form-control h-auto form-control-solid py-4 px-8 @error('username') is-invalid @enderror" id="username" type="text" placeholder="{{ __('admin::label.username') }}" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group fv-plugins-icon-container">
                            <input id="password" type="password" placeholder="{{ __('admin::label.password') }}" class="form-control h-auto form-control-solid py-4 px-8 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8 opacity-60">
                            <div class="checkbox-inline">
                                @if(!config('two-factor.enabled',false))
                                    <label class="checkbox m-0 text-muted">
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                        <span></span>{{ __('admin::label.remember_me') }}</label>
                                @endif
                            </div>

                            <a class="text-muted text-hover-primary" href="{{ $module->adminRoute('password.request') }}">
                                {{ __('admin::label.forgot_your_password') }}
                            </a>

                        </div>
                        <div class="form-group text-center mt-10">
                            <button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">{{ __('admin::label.login') }}</button>
                        </div>
                    </form>
                </div>

                <div class="login-forgot">
                    <div class="mb-20">
                        <h3 class="opacity-40 font-weight-normal">Forgotten Password ?</h3>
                        <p class="opacity-40">Enter your email to reset your password</p>
                    </div>
                    <form class="form" id="kt_login_forgot_form">
                        <div class="form-group mb-10">
                            <input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
                        </div>
                        <div class="form-group">
                            <button id="kt_login_forgot_submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3 m-2">Request</button>
                            <button id="kt_login_forgot_cancel" class="btn btn-pill btn-outline-white opacity-70 px-15 py-3 m-2">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('styles')
    <link href="//cdn.ene.si/master/20/css/pages/login/classic/login-4.css" rel="stylesheet">
@endsection
