<?php

namespace App\Console\Commands;

use App\Http\Traits\SendEmail;
use App\Models\Booking;
use DateTime;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReminderH7 extends Command
{
    use SendEmail;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:reminderH7-infosession';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email reminder to registrant H-7 from uni info session';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        # uni info session 10 - 14 April
        # h-7 remind jadwal tanpa link -> 3 April
        # h-1 remind jadwal with link -> 9 April
        
        # send reminder on 3 April 2023
        $uni_info_session = new DateTime('2023-04-10'); # insert date here
        // $uni_info_session = new DateTime('2023-03-06'); # insert date here
        $today = new DateTime(date('Y-m-d'));
        $interval = $today->diff($uni_info_session);
        if ($interval->days != 7) {
            return Command::SUCCESS;
        }

        try {

            $bookings = Booking::where('reminder_H7', '=', 0)->get();

            if ($bookings->count() == 0) {
                Log::info('Cron H7 is work fine : '.$bookings->count().' data');
            }
            foreach ($bookings as $booking) {

                $this->sendReminderH7([
                    'client' => $booking->client,
                    'subject' => "In 1 week, meet your dream university reps and admission officers!",
                    'recipient' => [
                        'email' => $booking->client->email_address,
                        'name' => $booking->client->fullname
                    ],
                ]);

                $booking->reminder_H7 = 1;
                $booking->save();
            
                Log::info('Email info session H7 reminder to '.$booking->client->email_address);
            }

        } catch (Exception $e) {
            
            Log::error('Cron H7 is not working : '.$e->getMessage());

        }

        return Command::SUCCESS;
    }
}
