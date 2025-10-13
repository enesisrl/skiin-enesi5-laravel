
@if(isset($exclude_ids))
    @foreach($exclude_ids as $excluded_id)
        <input type="hidden" data-crud-exclude-ids value="{{$excluded_id}}" />
    @endforeach
@endif
<table
        data-crud-table = '{!! $module->getName() !!}'
        data-admin-datatable='{
                    "preset": "crud",
                    "ajaxUrl": "{{ $module->adminRoute('getList', request()->query()) }}",
                    "searchInput": "[data-crud-input-search]",
                    "searchFormSelector": "[data-crud-form-search]",
                    "destroySelectedButton": "[data-crud-destroy-selected]",
                    @if(isset($exclude_ids))
                    "excludeIds": "[data-crud-exclude-ids]",
                    @endif
                    @if(isset($discardStateSave))
                    "discardStateSave": "1",
                    @endif
                    "importSelectedButton": "[data-crud-import-selected]"
                }'
        class="table table-separate table-head-custom table-checkable">
    <thead>
    <tr>
        @foreach ($module->getListStructure() as $k_field=>$field)
            <th style="width: {{$field['width'] ?? null}}"
                data-column-name="{{ $field['name'] ?? null }}"
                data-column-type=" {{ $field['type'] ?? null }}"
                data-field-name=" {{ $field['field_name'] ?? $field['name'] ?? null }}"
                data-order="{{ $field['order'] ?? null }}"
                data-order-default="{{ $field['orderDefault'] ?? null }}"
                data-order-default-type="{{ $field['orderDefaultType'] ?? null }}"
                data-column-classname="{{ $field['className'] ?? '' }}"
                data-priority="{{ $field['responsivePriority'] ?? $k_field }}"
            >
                @switch($field['type'])
                    @case("checkbox")
                        <label class="checkbox"><input type="checkbox" data-admin-check-all='{"target":"{{ $module->getName() }}"}'><span></span></label>
                        @break
                    @default
                        {{ $field['label'] }}
                @endswitch
            </th>
        @endforeach
    </tr>
    </thead>
</table>
