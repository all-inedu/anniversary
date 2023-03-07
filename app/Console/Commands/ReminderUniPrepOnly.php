<?php

namespace App\Console\Commands;

use App\Http\Traits\SendEmail;
use App\Models\Client;
use DateTime;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ReminderUniPrepOnly extends Command
{
    use SendEmail;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:reminder-uniprep-only';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email reminder to registrant H-1 from uni Prep';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        # will be held on 14 April 2023
        $uni_prep_talk = new DateTime('2023-04-15'); # insert date here
        // $uni_prep_talk = new DateTime('2023-02-28'); # insert date here
        $today = new DateTime(date('Y-m-d'));
        $interval = $today->diff($uni_prep_talk);
        
        if ($interval->days > 1) {

            return Command::SUCCESS;
        }
        
        try {

            $clients = Client::where('uni_prep', 1)->where('reminder_uniprep', 0)->get();
            
            if ($clients->count() == 0) {
                Log::info('Cron uni prep is work fine : '.$clients->count().' data');
            }

            foreach ($clients as $client) {

                $this->sendReminderUniPrepH1([
                    'client' => $client,
                    'subject' => $client->fullname.", see you tomorrow at ANNIFEST Uni Prep Talk!",
                    'recipient' => [
                        'email' => $client->email_address,
                        'name' => $client->fullname
                    ],
                ]);

                $client->reminder_uniprep = 1;
                $client->save();
            
                Log::info('Email reminder Uni Prep to '.$client->email_address);
            }

        } catch (Exception $e) {
            
            Log::error('Cron uni prep is not working : '.$e->getMessage());

        }

        return Command::SUCCESS;
    }
}
