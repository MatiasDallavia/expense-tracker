<?php

namespace App\Console\Commands;

use App\Models\ScheduledTransactions;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Console\Command;

class ExecuteDailyTransactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:execute-daily-transactions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {

            $scheduledTransactions = ScheduledTransactions::where("user_id", $user->id)
                ->where("daily", true)
                ->where("transaction_id", null)
                ->get();

            foreach ($scheduledTransactions as $scheduledTransaction) {

                $transaction = Transactions::create([
                    "amount" => $scheduledTransaction->amount,
                    "date" => today(),
                    "category" => $scheduledTransaction->category,
                    "user_id" => $user->id,
                ]);

                $scheduledTransaction->transaction_id = $transaction->id;
                $scheduledTransaction->save();                
            }
        }

        return 0;
    }
}
