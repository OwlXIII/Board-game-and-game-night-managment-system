<?php

namespace App\Console\Commands;

use App\Models\GameNight;
use App\Notifications\GameNightReminderNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendGameNightReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gamenights:send-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email reminders to participants 24 hours before game nights.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $events = GameNight::whereBetween('event_time', [now(), now()->addDay()])->get();

        foreach ($events as $event) {
            $event->creator?->notify(new GameNightReminderNotification($event));
            foreach ($event->participants as $registration) {
                $registration->user->notify(new GameNightReminderNotification($event));
            }
        }

        $this->info('Reminders sent for ' . $events->count() . ' events.');
    }
}
