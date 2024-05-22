<?php

namespace App\Http\Controllers;

use App\Models\Alarms;
use App\Models\ScheduledTransactions;
use App\Models\Transactions;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();

        $transactions = $user_id ? Transactions::where("user_id", $user_id)->get()->reverse() : [];
        $total = $user_id ? Transactions::get_total($user_id) : 0;
        $lastTransaction = $user_id ? Transactions::last_transaction($user_id) : 0;
        $scheduledTransactions = $user_id ? ScheduledTransactions::get_scheduled_transaction($user_id) : [];

        return view('index', [
            "transactions" => $transactions,
            "total" => $total,
            "last_transaction" => $lastTransaction,
            "scheduledTransactions" => $scheduledTransactions,
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

        $transaction = new Transactions();
        $transaction->amount = $amount;
        $transaction->category = request()->get("category", now());
        $transaction->date = request()->get("date", now());
        $transaction->user_id = Auth::user()->id;
        $transaction->save();


        return redirect("/");
    }

    public function destroy($id)
    {
        $transaction = Transactions::where("id", $id)->where("user_id", Auth::user()->id)->firstOrFail();
        $transaction->delete();
        return redirect("/");
    }
}
