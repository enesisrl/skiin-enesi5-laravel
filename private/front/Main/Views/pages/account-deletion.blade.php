@extends('base.layout')
@section('content')
    <div class="heading-section">
        <h2>
            {!! __('front::title.how_to_delete_account') !!}
        </h2>
        <p>
            {!! nl2br(__('front::text.how_to_delete_account')) !!}
        </p>
    </div>
@endsection
