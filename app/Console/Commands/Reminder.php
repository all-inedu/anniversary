<?php

namespace App\Console\Commands;

use App\Http\Traits\SendEmail;
use App\Models\Booking;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Reminder extends Command
{
    use SendEmail;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email reminder to registrant H-3';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $event_date = '2023-02-10';

        $bookings = Booking::whereRaw('DATEDIFF(booking_date, now()) = ?', [3])->get();

        try {

            foreach ($bookings as $booking) {

                $this->sendReminder([
                    'client' => $booking->client,
                    'subject' => 'Reminder',
                    'recipient' => [
                        'email' => $booking->client->email_address,
                        'name' => $booking->client->fullname
                    ],
                ]);
            }

        } catch (Exception $e) {
            
            Log::error($e->getMessage());

        }

        return Command::SUCCESS;
    }
}
