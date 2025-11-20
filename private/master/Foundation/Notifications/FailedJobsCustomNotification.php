<?php

namespace Master\Foundation\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use NotificationChannels\Telegram\TelegramMessage;

class FailedJobsCustomNotification extends \Spatie\FailedJobMonitor\Notification
{

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage())
            ->error()
            ->subject(config('master.commands_website_name')." - job failed")
            ->line("Exception message: {$this->event->exception->getMessage()}")
            ->line("Job class: {$this->event->job->resolveName()}")
            ->line("Job body: {$this->event->job->getRawBody()}")
            ->line("Exception: {$this->event->exception->getTraceAsString()}");
    }

    /*
    public function toTelegram(): TelegramMessage
    {

        return TelegramMessage::create()->to(config('telegram.chat-id'))
            ->content(config('master.commands_website_name')." - job failed")
            ->line(" ")
            ->line("Exception message: ".$this->parseMessage($this->event->exception->getMessage()))
            ->line("Job class: {$this->parseMessage($this->event->job->resolveName())}");
    }
    */

    public function parseMessage($message){
        $message = Str::replace('_','',$message);
        $message = Str::replace('*','',$message);
        $message = Str::replace('[','',$message);
        $message = Str::replace('`','',$message);
        return $message;
    }
}
