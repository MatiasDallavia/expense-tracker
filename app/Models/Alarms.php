<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alarms extends Model
{
    use HasFactory;

    protected $fillable = [
        "treshold",
        "trigger_when_suprass",
        "user_id",
    ];
}
