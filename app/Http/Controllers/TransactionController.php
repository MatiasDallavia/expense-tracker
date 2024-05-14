<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TransactionController extends Controller
{
    public function store()
    {

        // dd(Transaction::all());

        // $transaction = new Transaction();
        // $transaction->amount = 100;
        // $transaction->category = "supermarket";
        // $transaction->user_id = 1;
        // $transaction->save();

        $transactions = transaction::get_total();
        $last_transaction = transaction::last_transaction();
        // dd($transactions);

        return view('index', [
            "transactions" => transaction::all(),
            "total" => transaction::get_total(),
            "last_transaction" => transaction::last_transaction()
        ]);
    }
}
