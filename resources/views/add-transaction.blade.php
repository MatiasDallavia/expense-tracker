

<div class="forms-container">
    <h3>Add Transaction</h3>

    <form method="POST" action="{{ route('transactions.store') }}">
      @csrf
        <div class="switch-container">
            
            <div class="switch-label add-transaction">EXPENSE</div>
            <div class="switch add-transaction">
                <input type="checkbox" id="switchTransactions" class="checkbox" name="isIncome">
                <label for="switchTransactions" class="slider"></label>
            </div>   

        </div>

        <div>
            <label for="category">Category</label>
            <input type="text" name="category" required>
        </div>
        <div>
            <label for="amount">Amount</label>
            <input type="number" name="amount" value="0" min="0.01" step="0.01" required>
        </div>
        <div>
            <label for="date">Date</label>
            <input type="date" name="date" required>
        </div>
        <button type="submit">Submit</button>
  </form>
  </div>