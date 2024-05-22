<?php

namespace App\Http\Controllers;

use App\Models\ScheduledTransactions;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class scheduledTransactionController extends Controller
{
    public function store()
    {
        $hasDaily = request()->has('daily');
        $hasMonthly = request()->has('monthly');
        $hasScheduleFor = request()->has('schedule-for');
        $isIncome = request()->has('is-income');

        $amount = request()->amount;

        $inputFields = [$hasMonthly, $hasDaily, $hasScheduleFor];
        $countTrue = count(array_filter($inputFields));

        if ($countTrue >= 2) {
            return redirect()->back()->withErrors('Wrong scheduled time');
        }

        $scheduledTransaction = new ScheduledTransactions();
        $scheduledTransaction->user_id = Auth::user()->id;

        if ($hasScheduleFor) {
            $date = request()->get('schedule-for');
            $actual_date = today();

            if (Carbon::parse(request()->get('schedule-for')) <= $actual_date) {
                return redirect()->back()->withErrors('The date must be before today');
            }

            $scheduledTransaction->scheduled_for = $date;
        }

        $scheduledTransaction->daily = $hasDaily;
        $scheduledTransaction->monthly = $hasMonthly;
        $scheduledTransaction->amount = $isIncome ? $amount : -$amount;
        $scheduledTransaction->category = request()->get('category');

        $scheduledTransaction->save();

        return redirect('/');
    }

    public function destroy($id)
    {
        $scheduledTransaction = scheduledTransactions::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->firstOrFail();
        $scheduledTransaction->delete();
        return redirect('/');
    }
}
