<?php

namespace App\Http\Controllers;

use App\Models\Alarms;
use App\Models\transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TransactionController extends Controller
{
    public function index()
    {
        // dd(Transaction::all());
        // $transaction = new Transaction();
        // $transaction->amount = 100;
        // $transaction->category = "supermarket";
        // $transaction->user_id = 1;
        // $transaction->save();

        $transactions = transaction::get_total();
        $last_transaction = transaction::last_transaction();

        return view('index', [
            "transactions" => transaction::all(),
            "total" => transaction::get_total(),
            "last_transaction" => transaction::last_transaction(),
            "alarms" => Alarms::where("user_id", 1)->get(),
        ]);
    }

    public function store()
    {

        // dd(Transaction::all());

        // $transaction = new Transaction();
        // $transaction->amount = 100;
        // $transaction->category = "supermarket";
        // $transaction->user_id = 1;
        // $transaction->save();
        request()->validate([
            "date" => "required|date",
            "name" => "required|min:1|max:25",
            "amount" => "required|numeric|min:1",
        ]);
        $isIncome = request()->has("isIncome");

        $amount = request()->get("amount", 0);


        if (!$isIncome) {
            $amount = -$amount;
        }

        transaction::check_alarms($amount, 1);

        $transaction = new Transaction();
        $transaction->amount = $amount;
        $transaction->category = request()->get("date", now());
        $transaction->user_id = 1;
        $transaction->save();

        // $transactions = transaction::get_total();
        // $last_transaction = transaction::last_transaction();
        // dd($transactions);
        // dd($transactions);

        return redirect("/");
    }

    public function destroy($id)
    {

        // $idea = Transaction::where("id", $id)->firstOrFail();
        // $idea->delete();

        return redirect("/");
    }
}
