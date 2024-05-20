<?php

namespace App\Exports;

use App\Models\transaction;
use App\Models\Transactions;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionsExports implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return transaction::select("amount", "category", "date")->get();
    }

    public function headings(): array
    {
        return [
            'Amount',
            'Category',
            'Date',
        ];
    }
}
