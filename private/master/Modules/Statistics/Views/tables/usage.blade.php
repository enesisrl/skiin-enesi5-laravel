<table class="table table-striped">
    <thead>
    <tr>
        <th class="text-center" scope="col">{!! __('admin::label.code') !!}</th>
        <th scope="col">{!! __('admin::label.description') !!}</th>
        <th class="text-center" scope="col">{!! __('admin::label.category') !!}</th>
        <th class="text-center" scope="col">{!! __('admin::label.measure') !!}</th>
        <th class="text-center" scope="col">{!! __('admin::label.brand') !!}</th>
        <th class="text-center" scope="col">{!! __('admin::label.days') !!}</th>
        <th class="text-right" scope="col">{!! __('admin::label.profit') !!}</th>
    </tr>
    </thead>
    <tbody>
        @foreach($data as $record)
            <tr>
                <td class="text-center">{{ $record->article_code }}</td>
                <td>{{ $record->description }}</td>
                <td class="text-center">{{ $record->category }}</td>
                <td class="text-center">{{ $record->measure }}</td>
                <td class="text-center">{{ $record->brand }}</td>
                <td class="text-center">{{ $record->days }}</td>
                <td class="text-right">{{ number_format($record->profit,2,',','.') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>