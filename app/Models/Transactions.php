<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'category',
        'date',
        'created_at',
        'user_id'
    ];

    public static function get_total($user_id)
    {
        $transactions = self::where('user_id', $user_id)->get();
        $total = 0;

        foreach ($transactions as &$transaction) {
            $total = $total + $transaction->amount;
        }

        return $total;
    }

    public static function last_transaction($user_id)
    {
        $last_transaction = self::where('user_id', $user_id)->latest()->get()->first();

        if ($last_transaction != null) {
            return $last_transaction->amount;
        }
        return 0;
    }
}
