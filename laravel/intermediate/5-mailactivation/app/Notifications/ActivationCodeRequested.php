<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ActivationCodeRequested extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('user/activate?code='.$notifiable->activation_code);
        
        return (new MailMessage)
                    ->line('Сайна байна уу.')
                    ->line('Манай сайтад бүртгүүлсэнд баярлалаа. Та бүртгэлээ идэвхижүүлнэ үү.')
                    ->action('Идэвхижүүлэх', $url)
                    ->line('Хэрвээ дээрхи товчлуур ажиллахгүй байвал энэхүү холбоосоор бүртгэлээ идэвхижүүлнэ үү. '.$url);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
