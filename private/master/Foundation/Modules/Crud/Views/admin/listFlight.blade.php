@if($permission)

        <div class="d-flex align-items-center justify-content-between flex-wrap mr-1">
            @if (!$searchForm->hasFields())
                @include ('CrudModulePreset::admin.partials.datatable_search_field')
            @endif
            <div class="d-flex align-items-center justify-content-between flex-wrap mr-1">
                <button type="button" disabled="disabled" data-crud-import-selected="" data-crud-import="{{ $module->adminRoute('importSelected', request()->query()) }}" class="btn btn-light font-weight-bolder btn-sm mr-2">
                    <i class="la la-file-import"></i> {{ __('admin::label.import_selected') }}
                </button>
                @php
                /*
                @if($module->can('create'))
                    <button data-admin-ajax-call='{"action":"{{ $module->adminRoute('create', request()->query()) }}","data":{"mode":"flight","onsave":"import"}' class="btn btn-primary font-weight-bolder btn-sm"><i class="ki ki-plus icon-sm"></i> {{ __('admin::label.create') }}</button>
                @endif
                */
                @endphp
            </div>
        </div>

        <br />
        <br />

    @include ('CrudModulePreset::admin.partials.datatable')
@else
    <div class="alert alert-danger">{{__("admin::message.permission_denied")}}</div>
@endif
