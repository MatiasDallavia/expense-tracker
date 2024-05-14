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
        dump($last_transaction);

        return $last_transaction->amount;
    }
}
