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
                    <div class="bg-body p-10 p-lg-15 mx-auto">
                        <form data-admin-ajax-form class="form w-100" method="POST" action="{{ \Master\Modules\Auth\Facades\Auth::adminRoute('two-factor.choose-method.store') }}">
                            @csrf

                            <div class="text-center mb-11">
                                <h1 class="text-white fw-bolder mb-3">{{ __('admin::2fa.choose_method_title') }}</h1>
                                <div class="text-white fw-semibold fs-6">{{ __('admin::2fa.choose_method_description') }}</div>
                            </div>

                            <div class="mb-8">
                                <h4 class="font-weight-bolder text-center text-white mb-10">{{ __('admin::2fa.available_methods') }}</h4>
                                <div class="radio-list">
                                    @foreach($methods as $method)

                                        <label class="radio border rounded p-5 d-flex align-items-center mb-5">
                                            <input class="form-check-input" type="radio" name="method" value="{{ $method }}"
                                                   id="method_{{ $method }}" {{ $loop->first ? 'checked' : '' }}>
                                            <span></span>
                                            {{ __('admin::2fa.method_' . $method) }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Checkbox per impostare come primario --}}
                            <div class="mb-8">

                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-lg text-white">
                                        <input type="checkbox" value="1" id="set_as_primary" name="set_as_primary">
                                        <span></span>
                                        {{ __('admin::2fa.set_as_primary') }}
                                    </label>
                                </div>
                                <div class="form-text text-white mt-2 text-left">
                                    {{ __('admin::2fa.set_as_primary_description') }}
                                </div>
                            </div>

                            <div class="d-grid mb-10">
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">{{ __('admin::2fa.continue') }}</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection
