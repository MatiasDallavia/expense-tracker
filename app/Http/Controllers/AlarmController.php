<?php

namespace App\Http\Controllers;

use App\Models\Alarms;
use Illuminate\Http\Request;

class AlarmController extends Controller
{
    //
    public function store()
    {
        $alarm = new Alarms();

        $alarm->treshold = request()->get("treshold-amount");
        $alarm->user_id = 1;

        if (request()->has("above-treshold")) {
            $alarm->trigger_when_suprass = true;
        } else {
            $alarm->trigger_when_suprass = false;
        }

        $alarm->save();

        return redirect("/");
    }
}
