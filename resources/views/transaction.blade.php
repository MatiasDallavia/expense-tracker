<li id="{{ $transaction->id }}" class="transactionCard">
    <div class="name">
        <h4>{{ $transaction->category }}</h4>
        <p>{{ $transaction->date }}</p>
    </div>

    @if ($transaction->amount > 0)
        <div class="amount income-positive">
            <span>+{{ $transaction->amount }}</span>
        </div>
    @else
        <div class="amount income-negative">
            <span>{{ $transaction->amount }}</span>
        </div>
    @endif

    <div class="action">
        <div class="menu">

            <form method="POST" action="{{ route('transactions.destroy', $transaction->id) }}" id="deleteTransactionForm">
                @csrf
                @method('DELETE')

                <button id="deleteTransactionButton" type="submit" style="border:none; font-size:20px; cursor:pointer;"
                    src="x-icon.svg">
                    X
                </button>
            </form>
        </div>
    </div>
</li>
