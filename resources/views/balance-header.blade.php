<header>
    <div>

        <h1 class="title">Expense Tracker</h1>

    </div>
    <div>
        <h5>Total Balance</h5>
        @if ($total > 0)
            <span id="balance">${{ $total }}</span>
        @else
            <span id="balance" class="amount income-negative">${{ $total }}</span>
        @endif
    </div>
    <div>
        <h5>Last Transaction</h5>
        @if ($last_transaction > 0)
            <span id="balance" class="amount income-positive">${{ $last_transaction }}</span>
        @else
            <span id="balance" class="amount income-negative">${{ $last_transaction }}</span>
        @endif
    </div>
</header>
