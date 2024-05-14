<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class transaction extends Model
{
    use HasFactory;


    protected $fillable = [
        'amount',
        'created_at',
        'user',
    ];

    public static function get_total()
    {
        $transactions = self::where("user_id", 1);
        $total = 0;
        Log::info("HOLA");

        foreach ($transactions as &$transaction) {
            dump($transaction->amount);
            Log::info("HOLA");
            $total = $total + $transaction->amount;
        }

        return $total;
    }
}
