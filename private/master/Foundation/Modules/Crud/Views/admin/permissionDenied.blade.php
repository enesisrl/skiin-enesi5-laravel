{{-- Extends layout --}}
@extends('Metronic::default')

{{-- Content --}}
@section('content')
    <div class="card card-custom">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">{{ @$section_title }}</h3>
            </div>
            <div class="card-toolbar">
            </div>
        </div>
        <div class="card-body">
            <div class="alert alert-danger">{{__("admin::message.permission_denied")}}</div>
        </div>
    </div>
@endsection
