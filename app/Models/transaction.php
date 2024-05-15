<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\User;
use App\Models\Alarms;


class transaction extends Model
{
    use HasFactory;


    protected $fillable = [
        'amount',
        'date',
        'created_at',
        'user',
    ];

    public static function get_total()
    {
        $transactions = self::all();
        $total = 0;

        foreach ($transactions as &$transaction) {
            $total = $total + $transaction->amount;
        }

        return $total;
    }

    public static function last_transaction()
    {
        $last_transaction = self::latest()->get()->first();

        return $last_transaction->amount;
    }

    public static function check_alarms($transaction_amount, $user_id)
    {
        // $user = User::where("id", $user_id)->firstOrFail();

        // if (!$user){
        //     dd("ERROR");
        // }

        $alarms = Alarms::where("user_id", $user_id)->get();

        foreach ($alarms as $alarm) {
            # code...
            $total = transaction::get_total();
            $final_total = $total + $transaction_amount;
            dump($alarm->trigger_when_suprass);

            if(
                $final_total > $alarm->treshold 
                && $alarm->trigger_when_suprass
                && $total < $final_total)
                {
                    dd("ERROR");
            }

            else if(
                $final_total < $alarm->treshold 
                && !$alarm->trigger_when_suprass
                && $total > $final_total
                ){
                    dd("ERROR");
            }
        }


        $last_transaction = self::latest()->get()->first();

        return $last_transaction->amount;
    }
}
