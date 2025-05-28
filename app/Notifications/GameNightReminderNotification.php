<?php

namespace App\Notifications;

use App\Models\GameNight;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GameNightReminderNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public GameNight $gameNight){ }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject(__('Upcoming Game Night Reminder'))
            ->greeting(__('Hello ') . $notifiable->name . '!')
            ->line(__('You have an upcoming game night: ') . $this->gameNight->title)
            ->line(__('Date & Time: ') . $this->gameNight->event_time->format('Y-m-d H:i'))
            ->line(__('Location: ') . $this->gameNight->street . ' ' . $this->gameNight->street_number . ', ' . $this->gameNight->city . ', ' . $this->gameNight->country)
            ->line(__('We hope to see you there!'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
