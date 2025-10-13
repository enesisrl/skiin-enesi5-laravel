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
                    <div class="mb-20">
                        <h3 class="text-muted font-weight-normal">{{ __('admin::message.reset_password') }}</h3>
                    </div>


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form" method="post" action="{{ $module->adminRoute('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request["token"] }}">
                        <div class="form-group fv-plugins-icon-container">
                            <input class="form-control h-auto form-control-solid py-4 px-8 @error('email') is-invalid @enderror" id="email" type="text" placeholder="{{ __('admin::label.email') }}" name="email" value="{{ $request["email"] ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ __('admin::'.$message) }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group fv-plugins-icon-container">
                            <input class="form-control h-auto form-control-solid py-4 px-8 @error('password') is-invalid @enderror" id="password" type="password" placeholder="{{ __('admin::label.password') }}" name="password"  required autocomplete="new-password" autofocus>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ __($message) }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group fv-plugins-icon-container">
                            <input class="form-control h-auto form-control-solid py-4 px-8 @error('password_confirmation') is-invalid @enderror" id="password_confirmation" type="password" placeholder="{{ __('admin::label.password_confirmation') }}" name="password_confirmation"  required autocomplete="new-password" autofocus>
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ __($message) }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group text-center mt-10">
                            <button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">{{ __('admin::label.reset_password') }}</button>
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
