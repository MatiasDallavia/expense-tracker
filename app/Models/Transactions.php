<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\User;
use App\Models\Alarms;


class Transactions extends Model
{
    use HasFactory;


    protected $fillable = [
        'amount',
        'category',
        'date',
        'created_at',
        'user_id',
    ];

    public static function get_total($user_id)
    {
        $transactions = self::where("user_id", $user_id)->get();
        $total = 0;

        foreach ($transactions as &$transaction) {
            $total = $total + $transaction->amount;
        }

        return $total;
    }

    public static function last_transaction($user_id)
    {
        $last_transaction = self::where("user_id", $user_id)->latest()->get()->first();

        if ($last_transaction != null){
            return $last_transaction->amount;
        }
        return 0;
    }

    // DEPRECATED
    public static function check_alarms($transaction_amount, $user_id)
    {

        $alarms = Alarms::where("user_id", $user_id)->get();

        foreach ($alarms as $alarm) {
            # code...
            $total = self::get_total(1);
            $final_total = $total + $transaction_amount;

            if (
                $final_total > $alarm->treshold
                && $alarm->trigger_when_suprass
                && $total < $final_total
            ) {
                dd("ERROR");
            } else if (
                $final_total < $alarm->treshold
                && !$alarm->trigger_when_suprass
                && $total > $final_total
            ) {
                dd("ERROR");
            }
        }


        $last_transaction = self::latest()->get()->first();

        return $last_transaction->amount;
    }
    // DEPRECATED

}
