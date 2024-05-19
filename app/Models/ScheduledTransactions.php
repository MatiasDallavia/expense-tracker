<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\transaction;

class ScheduledTransactions extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "transaction_id",
        "daily",
        "monthly",
        "scheduled_for",
        "created_at",
    ];

    public static function get_scheduled_transaction($user_id)
    {
        return self::where("user_id", $user_id)->where("transaction_id", null)->get();
    }

    public function get_schedule_info(){
        if($this->daily)
            return "Daily";
        if($this->monthly)
            return "Monthly";
        return "Scheduled for " . $this->scheduled_for;
    }
}
