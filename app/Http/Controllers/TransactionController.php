<?php

namespace App\Http\Controllers;

use App\Models\Alarms;
use App\Models\ScheduledTransactions;
use App\Models\transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;

        return view('index', [
            "transactions" => transaction::where("user_id", $user_id)->get()->reverse(),
            "total" => transaction::get_total($user_id),
            "last_transaction" => transaction::last_transaction($user_id),
            "scheduledTransactions" => ScheduledTransactions::get_scheduled_transaction($user_id),
            // "alarms" => Alarms::where("user_id", $user_id)->get(),
        ]);
    }

    public function store()
    {


        request()->validate([
            "date" => "required|date",
            "category" => "required|min:1|max:25",
            "amount" => "required|numeric|min:1",
        ]);

        $isIncome = request()->has("isIncome");

        $amount = request()->get("amount", 0);

        if (!$isIncome) {
            $amount = -$amount;
        }

        $transaction = new Transaction();
        $transaction->amount = $amount;
        $transaction->category = request()->get("category", now());
        $transaction->date = request()->get("date", now());
        $transaction->user_id = Auth::user()->id;
        $transaction->save();


        return redirect("/");
    }

    public function destroy($id)
    {
        $transaction = transaction::where("id", $id)->where("user_id", Auth::user()->id)->firstOrFail();
        $transaction->delete();
        return redirect("/");
    }
}
