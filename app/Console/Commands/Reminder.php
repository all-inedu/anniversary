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
        $bookings = Booking::leftJoin('tbl_booking_univ', 'tbl_booking_univ.booking_id', '=', 'tbl_booking.id')->
            leftJoin('tbl_university', 'tbl_university.id', '=', 'tbl_booking_univ.univ_id')->
            whereRaw('DATEDIFF(session_start, now()) = ?', [3])->get();

        try {

            foreach ($bookings as $booking) {

                $this->sendReminder([
                    'client' => $booking->client,
                    'subject' => "Don't Miss Out on Your Info Sessions & Uni Prep Talk!",
                    'recipient' => [
                        'email' => $booking->client->email_address,
                        'name' => $booking->client->fullname
                    ],
                ]);
                Log::info('Email reminder to '.$booking->client->email_address);
            }

        } catch (Exception $e) {
            
            Log::error($e->getMessage());

        }

        return Command::SUCCESS;
    }
}
