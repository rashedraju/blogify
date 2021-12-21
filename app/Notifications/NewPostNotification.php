<?php

namespace App\Notifications;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewPostNotification extends Notification
{
    use Queueable;
    private $post;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $details = [
            'title' => $this->post->title,
            'excerpt' => $this->post->excerpt,
            'link' => url("/") . '/posts/' . $this->post->slug
        ];
        return (new MailMessage)->markdown('mail.new-post', ['details' => $details]);
    }

    public function toDatabase($notifiable){
        return [
            'heading' => ucfirst($this->post->author->name) . " created new Post",
            'title' => $this->post->title,
            'link' => url("/posts/{$this->post->slug}"),
        ];
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
