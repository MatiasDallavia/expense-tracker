<?php

namespace App\Exports;

use App\Models\transaction;
use App\Models\Transactions;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransactionsExports implements FromCollection, WithHeadings
{

    protected $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return transaction::select("amount", "category", "date")->where("user_id", $this->userId)->get();
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
