{{-- Extends layout --}}
@extends('Metronic::default')

@if($permission)
{{-- Page Right Toolbar --}}
@section('page_right_toolbar')
    <a href="{{ $module->adminRoute('index', request()->query()) }}" class="btn btn-light font-weight-bolde btn-sm">
        <i class="ki ki-long-arrow-back icon-xs"></i> {{ __('admin::label.back') }}
    </a>

    @if($op !== 'view')
    <div class="btn-group ml-2">
        <button data-admin-form-submit='{"selector": "[data-crud-form]", "onsave": "list"}' type="button" class="btn btn-primary font-weight-bold btn-sm px-3 font-size-base">{{ __('admin::label.save') }}</button>
        <button type="button" class="btn btn-primary font-weight-bold btn-sm px-3 font-size-base dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
        <div class="dropdown-menu dropdown-menu-sm p-0 m-0 dropdown-menu-right">
            <ul class="navi py-5">
                <li class="navi-item">
                    <a data-admin-form-submit='{"selector": "[data-crud-form]", "onsave": "edit"}' href="#" class="navi-link">
                        <span class="navi-icon"><i class="flaticon2-writing"></i></span>
                        <span class="navi-text">{{ __('admin::label.save_edit') }}</span>
                    </a>
                </li>
                @if($module->can('create'))
                    <li class="navi-item">
                        <a data-admin-form-submit='{"selector": "[data-crud-form]", "onsave": "create"}' href="#" class="navi-link">
                            <span class="navi-icon"><i class="flaticon2-medical-records"></i></span>
                            <span class="navi-text">{{ __('admin::label.save_create') }}</span>
                        </a>
                    </li>
                @endif
                <li class="navi-item">
                    <a data-admin-form-submit='{"selector": "[data-crud-form]", "onsave": "list"}' href="#" class="navi-link">
                        <span class="navi-icon"><i class="flaticon2-hourglass-1"></i></span>
                        <span class="navi-text">{{ __('admin::label.save_list') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    @else
        @if($module->can('update'))
            <div class="ml-2">
                <a href="{{ $module->adminRoute('edit', array_merge(request()->query(), [$model->id])) }}" class="btn btn-success font-weight-bold btn-sm px-3 font-size-base">
                    <i class="la la-edit"></i> {{ __('admin::label.edit') }}
                </a>
            </div>
        @endif
    @endif
@endsection

{{-- Content --}}
@section('content')
    <form data-admin-ajax-form data-crud-form class="form" method="post" action="{{($model->id) ? $module->adminRoute('update',array_merge(request()->query(),[$model->id])) : $module->adminRoute('store', request()->query())}}">
        <input type="hidden" name="fromAdmin" value="1">
        <input type="hidden" name="op" value="{{$op}}">
        @if($model->id)
            <input type="hidden" name="id" value="{{$model->id}}">
            {{ method_field('PATCH') }}
        @endif

        {{csrf_field()}}

        {!! $form->render() !!}
    </form>
@endsection
@else
    @section('page_right_toolbar')
        <a href="{{ $module->adminRoute('index', request()->query()) }}" class="btn btn-light font-weight-bolde btn-sm">
            <i class="ki ki-long-arrow-back icon-xs"></i> {{ __('admin::label.back') }}
        </a>
    @endsection

    @section('content')
        <div class="card card-custom">
            <div class="card-body">
                <div class="alert alert-danger">{{__("admin::message.permission_denied")}}</div>
            </div>
        </div>
    @endsection
@endif