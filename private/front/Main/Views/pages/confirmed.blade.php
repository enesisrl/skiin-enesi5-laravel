@extends('base.layout')
@section('content')
<div class="heading-section">
    <h2>
        @if($app_user)
            {!! __('front::label.congrats') !!}
        @else
            Ops!
        @endif
    </h2>
    <p>
        @if($app_user)
            {!! __('front::label.your_account_is_active') !!}
        @else
            {!! __('front::label.user_not_found') !!}
        @endif
    </p>
</div>
@endsection
