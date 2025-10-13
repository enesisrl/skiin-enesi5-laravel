{{-- Extends layout --}}
@extends('Metronic::default')


{{-- Page Left Toolbar --}}
@section('page_left_toolbar')
    @if (!$searchForm->hasFields())
        @include ('CrudModulePreset::admin.partials.datatable_search_field')
    @endif
@endsection


{{-- Page Right Toolbar --}}
@section('page_right_toolbar')

    @yield('toolbar_extra_buttons')

    @if($module->can('destroy'))
        <button type="button" disabled data-crud-destroy-selected data-crud-destroy="{{ $module->adminRoute('destroySelected', request()->query()) }}" class="btn btn-light font-weight-bolder btn-sm mr-2">
            <i class="la la-trash"></i> {{__('admin::label.delete_selected')}}
        </button>
    @endif

    @if($module->can('create'))
        <a href="{{ $module->adminRoute('create', request()->query()) }}" class="btn btn-primary font-weight-bolder btn-sm">
            <i class="ki ki-plus icon-sm"></i> {{ __('admin::label.create') }}
        </a>
    @endif
@endsection


{{-- Content --}}
@section('content')
    @if ($searchForm->hasFields() && $module->can('read'))

    <!--begin::Card-->
    <div class="search-form card card-custom {{ $searchForm->hasValues() ? null : 'card-collapsed'}}" data-card="true" id="kt_card_4">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">{{ @$search_section_title }}</h3>
            </div>
            <div class="card-toolbar">
                <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-1" data-card-tool="toggle">
                    <i class="ki ki-arrow-{{ $searchForm->hasValues() ? 'up' : 'down'}} icon-nm"></i>
                </a>
            </div>
        </div>
        <form data-crud-form-search class="form" method="post">
            <div class="card-body">
                    <input type="hidden" name="fromAdmin" value="1">

                    {{csrf_field()}}

                    {!! $searchForm->render() !!}
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success mr-2">{{ __('admin::label.search') }}</button>
                <button type="button" onclick="$(this).closest('form').clearForm()" class="btn btn-secondary">{{ __('admin::label.reset') }}</button>
            </div>
        </form>
    </div>
    <!--end::Card-->
    <br />
    @endif

    <div class="card card-custom">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">{{ @$section_title }}</h3>
            </div>
            <div class="card-toolbar">
            </div>
        </div>

        <div class="card-body">
            @if($module->can('read'))
                @include ('CrudModulePreset::admin.partials.datatable')
            @else
                <div class="alert alert-danger">{{__("admin::message.permission_denied")}}</div>
            @endif
        </div>
    </div>
@endsection
