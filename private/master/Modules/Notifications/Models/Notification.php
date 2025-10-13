<?php

namespace Master\Modules\Notifications\Models;

class Notification extends \Enesisrl\LaravelMasterCore\Modules\Notifications\Models\Notification {

    public function getDateSentTzAttribute()
    {
        return optional($this->date_sent, function($date_sent) {
            $timezone = auth()->user()->timezone_str ?? 'UTC';
            $date_sent->tz($timezone);
            return $date_sent;
        });
    }

    public function getCreatedAtTzAttribute()
    {
        return optional($this->created_at, function($created_at) {
            $timezone = auth()->user()->timezone_str ?? 'UTC';
            $created_at->tz($timezone);
            return $created_at;
        });
    }
}
