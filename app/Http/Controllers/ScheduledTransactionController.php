<?php

namespace App\Http\Controllers;

use App\Models\ScheduledTransactions;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ScheduledTransactionController extends Controller
{
    public function store()
    {

        // request()->validate([
        //     "transaction-amount" => "required"
        // ]);
        $hasDaily = request()->has("daily");
        $hasMonthly = request()->has("monthly");
        $hasScheduleFor = request()->has("schedule-for");
        $isIncome = request()->has("is-income");

        $amount = request()->amount;

        $inputFields = [
            $hasMonthly, $hasDaily, $hasScheduleFor
        ];
        $countTrue = count(array_filter($inputFields));

        if ($countTrue >= 2) {
            dump("ERROR");
        }

        $ScheduledTransaction = new ScheduledTransactions();
        $ScheduledTransaction->user_id = 1;

        if ($hasScheduleFor) {
            $date = request()->get("schedule-for");
            $actual_date = today();

            if (Carbon::parse(request()->get("schedule-for")) <= $actual_date) {
                dump("LA FECHA DEBE SER ANTES");
            } else {
                dump("LA FECHA Esta BIEN");
            }

            $ScheduledTransaction->scheduled_for = $date;
        }

        $ScheduledTransaction->daily = $hasDaily;
        $ScheduledTransaction->monthly = $hasMonthly;
        $ScheduledTransaction->amount = $isIncome ? $amount : -$amount;

        $ScheduledTransaction->save();

        return redirect("/");
    }

    public function destroy($id)
    {
        $scheduledTransaction = ScheduledTransactions::where("id", $id)->firstOrFail();
        $scheduledTransaction->delete();
        return redirect("/");
    }
}
