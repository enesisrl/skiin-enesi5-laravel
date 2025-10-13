
{{-- Extends layout --}}
@extends('CrudModulePreset::admin.form')

@if($permission)

@section('page_right_toolbar')
    @if($op !== 'view')
        <button onclick="saveUserProfile();" type="button" class="btn btn-primary font-weight-bold btn-sm px-3 font-size-base">{{ __('admin::label.save') }}</button>
    @endif
@endsection

{{-- Scripts --}}
@section('scripts')

    <script type="text/javascript">
        function saveUserProfile(){
            let form = $('[data-crud-form]');
            let url = '{{ $module->adminRoute('storeEditProfile', ['id' => $model->id]) }}';
            let data = form.serialize();
            data.editProfile = 1;
            Admin.ajax({
                    url: url,
                    method: 'patch',
                    data: data,
                }
            )
        }
    </script>

@endsection
@else
    @section('page_right_toolbar')

    @endsection

    @section('content')
        <div class="card card-custom">
            <div class="card-body">
                <div class="alert alert-danger">{{__("admin::message.permission_denied")}}</div>
            </div>
        </div>
    @endsection
@endif
