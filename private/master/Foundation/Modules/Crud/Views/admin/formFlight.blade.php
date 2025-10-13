@if($permission)

<form data-admin-ajax-form data-crud-form="{{ $module->getName() }}" class="form" method="post" action="{{($model->id) ? $module->adminRoute('update',array_merge(["id"=>$model->id],request()->query())) : $module->adminRoute('store',request()->query())}}" autocomplete="off">
    <input type="hidden" name="fromAdmin" value="1">
    <input type="hidden" name="op" value="{{$op}}">
    @if($model->id)
        <input type="hidden" name="id" value="{{$model->id}}">
        {{ method_field('PATCH') }}
    @endif

    @if(request()->input('parent'))
        @foreach(request()->input('parent') as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}" />
        @endforeach
    @endif

    {{csrf_field()}}

    {!! $form->render() !!}

    <input type="hidden" name="mode" value="flight" /><input type="hidden" name="fromAdmin" value="1">

    <div class="text-right mt-3">
        @if($op !== 'view')
            <button data-admin-form-submit='{"selector": "[data-crud-form={{ $module->getName() }}]", "onsave": "{!! (request()->input('onsave')) ? request()->input('onsave') : 'list' !!}"}' type="button" class="btn btn-primary font-weight-bold btn-sm px-3 font-size-base">{{ __('admin::label.save') }}</button>
        @else
            <button type="button" onclick="bootbox.hideAll();" class="btn btn-danger font-weight-bold btn-sm px-3 font-size-base">{{ __('admin::label.close') }}</button>
        @endif
    </div>

    {{--
    @todo disabilitato
    - problemi con in salva e continua dall aggiungi (non effettuando un refresh del form ad ogni salvataggio crea un nuovo record)
    <div class="btn-group ml-2">
        <button data-admin-form-submit='{"selector": "[data-crud-form={{ $module->getName() }}]", "onsave": "list"}' type="button" class="btn btn-primary font-weight-bold btn-sm px-3 font-size-base">{{ __('admin::label.save') }}</button>
        <button type="button" class="btn btn-primary font-weight-bold btn-sm px-3 font-size-base dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
        <div class="dropdown-menu dropdown-menu-sm p-0 m-0 dropdown-menu-right">
            <ul class="navi py-5">
                <li class="navi-item">
                    <a data-admin-form-submit='{"selector": "[data-crud-form={{ $module->getName() }}]", "onsave": "edit"}' href="#" class="navi-link">
                        <span class="navi-icon"><i class="flaticon2-writing"></i></span>
                        <span class="navi-text">{{ __('admin::label.save_edit') }}</span>
                    </a>
                </li>
                {{--
                @if($module->can('create'))
                    <li class="navi-item">
                        <a data-admin-form-submit='{"selector": "[data-crud-form={{ $module->getName() }}]", "onsave": "create"}' href="#" class="navi-link">
                            <span class="navi-icon"><i class="flaticon2-medical-records"></i></span>
                            <span class="navi-text">{{ __('admin::label.save_create') }}</span>
                        </a>
                    </li>
                @endif
                - -}}
                <li class="navi-item">
                    <a data-admin-form-submit='{"selector": "[data-crud-form={{ $module->getName() }}]", "onsave": "list"}' href="#" class="navi-link">
                        <span class="navi-icon"><i class="flaticon2-hourglass-1"></i></span>
                        <span class="navi-text">{{ __('admin::label.save_list') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    --}}
</form>
@else
    <div class="alert alert-danger">{{__("admin::message.permission_denied")}}</div>
@endif
