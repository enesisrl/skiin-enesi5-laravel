<table class="table table-striped">
    <thead>
    <tr>
        <th class="text-right" scope="col" colspan="2">{!! __('admin::label.number_of_acceptances') !!}</th>
        <th class="text-right" scope="col">{!! __('admin::label.duration') !!}</th>
        <th class="text-right" scope="col">{!! __('admin::label.amount') !!}</th>
    </tr>
    </thead>
    <tbody>
    @php
        $total_acceptances = 0;
        $total_amount = 0;
    @endphp
    @foreach($data as $record)
        @php
            $total_acceptances += $record->n_acceptances;
            $total_amount += $record->amount;
        @endphp
        <tr>
            <td colspan="2" class="text-right">{{ $record->n_acceptances }}</td>
            <td class="text-right">{{ $record->duration }}</td>
            <td class="text-right">{{ number_format($record->amount,2,',','.') }}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td class="font-weight-bolder">{{ __('admin::label.totals') }}</td>
            <td class="text-right">{{ $total_acceptances }}</td>
            <td></td>
            <td class="text-right">{{ number_format($total_amount,2,',','.') }}</td>
        </tr>
    </tfoot>
</table>