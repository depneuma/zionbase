<?php

namespace App\Notifications;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SermonUploaded extends Notification implements ShouldQueue
{
    use Queueable;
    private $sermon;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($sermon)
    {
        $this->sermon = $sermon;
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
        return (new MailMessage)
                ->from(Setting::get('church_email'), Setting::get('domain_name'))
                ->subject('Welcome To '.Setting::get('domain_name'))
                ->greeting('Great News!')
                ->line('A new message is now available for download on '.Setting::get('domain_name'))
                ->line('The title is : '.$this->sermon->title)
                ->action('Visit Sermons Page', route('pages.sermons'))
                ->line('It will bless you specially.');
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
