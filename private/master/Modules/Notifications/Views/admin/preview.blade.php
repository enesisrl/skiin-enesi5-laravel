
<div class="row">
    <div class="col-sm-4">
        <div class="card card-custom mt-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>{{ __("admin::label.subject") }}</label>
                            <h5>{{ $notification->subject }}</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>{{ __("admin::label.created_at") }}</label>
                            <h5>{{ $notification->created_at }}</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>{{ __("admin::label.status") }}</label>
                            @php
                                $label = (Lang::has('admin::notification_status.'.strtolower($notification->status))) ? strtoupper(__('admin::notification_status.'.strtolower($notification->status))) : $notification->status;
                                switch($notification->status){
                                    case 'awaiting':
                                        $class = 'bg-warning-o-20 text-warning';
                                        break;
                                    case 'sent':
                                        $class = 'bg-success-o-20 text-success';
                                        break;
                                    default:
                                        $class = 'bg-danger-o-20 text-danger';
                                        break;
                                }
                                echo '<p class="rounded p-2 text-center  '.$class.'">'.$label.'</p>';
                            @endphp
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>{{ __("admin::label.delayed_send_date") }}</label>
                            <h5>{{ ($notification->delayed_send_date) ? $notification->delayed_send_date->format('d-m-Y H:i:s') : " - " }}</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>{{ __("admin::label.date_sent") }}</label>
                            <h5>{{ $notification->date_sent }}</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>{{ __("admin::label.recipients") }}</label>
                            <h5>
                                @foreach($notification->recipients as $recipient)
                                    <span class="label label-xl label-inline mr-2 label-rounded"><a href="mailto:{!! $recipient !!}">{!! $recipient !!}</a></span>
                                @endforeach
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if($notification->attachments)
                        <div class="col-12">
                            <div class="form-group">
                                <label>{{ __("admin::label.attachments") }}</label>
                                <h5>
                                    @foreach($notification->attachments as $attachment)
                                        <span class="label label-xl label-inline mr-2 label-rounded"><a href="{!! $attachment !!}" target="_blank">{!! pathinfo($attachment, PATHINFO_FILENAME) !!}</a></span>
                                    @endforeach
                                </h5>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="card card-custom mt-4">
            <div class="card-body">
                <iframe style="border:none; width: 100%; height: 70vh;" src="{!! $module->adminRoute('message',['id'=>$notification->id]) !!}"></iframe>
            </div>
        </div>
    </div>
</div>


