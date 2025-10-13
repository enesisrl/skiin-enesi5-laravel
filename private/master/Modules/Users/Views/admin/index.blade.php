
{{-- Extends layout --}}
@extends('CrudModulePreset::admin.index')

{{-- Scripts --}}
@section('scripts')
    @parent
    <script type="text/javascript">
        function showLoginToken(token){
            bootbox.alert('{{__('admin::label.your_auth_token_is')}}: '+token);
        }
    </script>
@endsection
