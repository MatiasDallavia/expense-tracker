<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransactionsExports;
use Illuminate\Support\Facades\Auth;

class ExcelController extends Controller
{

    public function show()
    {
        return Excel::download(new TransactionsExports(Auth::user()->id), 'transactions.xlsx');
    }
}
