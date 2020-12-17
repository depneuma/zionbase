<?php

namespace App\Notifications;

use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BlogPostCreated extends Notification implements ShouldQueue
{
    use Queueable;
    private $blog;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($blog)
    {
        $this->blog = $blog;
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
                ->line('A new Life News Article has been posted on '.Setting::get('domain_name'))
                ->line('The title is : '.$this->blog->title)
                ->action('Read Your Life News Article', route('pages.blogs.show', $this->blog->slug))
                ->line('You will be edified as you read.');
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
