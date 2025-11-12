
{{-- Extends layout --}}
@extends('Metronic::default')

@section('page_right_toolbar')

    @yield('toolbar_extra_buttons')

@endsection

@section('content')

    @if ($searchForm->hasFields() && $module->can('read'))

        <!--begin::Card-->
        <div class="card card-custom {{ !$data ? null : 'card-collapsed'}}" data-card="true" >
            <div class="card-header">
                <div class="card-title">
                    <h3 class="card-label">{{ @$search_section_title }}</h3>
                </div>
                <div class="card-toolbar">
                    <a href="#" class="btn btn-icon btn-sm btn-light-primary mr-1" data-card-tool="toggle">
                        <i class="ki ki-arrow-{{ !$data ? 'up' : 'down'}} icon-nm"></i>
                    </a>
                </div>
            </div>
            <form class="form" method="post" action="{!! url()->current() !!}">
                <div class="card-body">
                    <input type="hidden" name="fromAdmin" value="1">
                    <input type="hidden" name="searchArticles" value="1">

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

    @if($module->can('read'))
        @if($data)
            <div class="card card-custom">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">{!! $title !!}</h3>
                    </div>
                    <div class="card-toolbar">
                        <form method="post" action="{{ $module->adminRoute($tableView . 'Export') }}" style="display: inline;">
                            @csrf
                            @foreach(request()->except(['_token', '_method']) as $key => $value)
                                @if(is_array($value))
                                    @foreach($value as $v)
                                        <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                                    @endforeach
                                @else
                                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                @endif
                            @endforeach
                            <button type="submit" class="btn btn-light-success font-weight-bolder">
                                <i class="flaticon2-download"></i>
                                {{ __('admin::label.export_excel') }}
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    @include('StatisticsModule::tables.' . $tableView, ['data' => $data])
                </div>
            </div>
            <br />
        @endif
    @else
        <div class="alert alert-danger">{{__("admin::message.permission_denied")}}</div>
    @endif

@endsection


@section('scripts')

@endsection
