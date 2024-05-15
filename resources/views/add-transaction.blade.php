

<div class="forms-container">
    <h3>Add Transaction</h3>

    <form method="POST" action="{{ route('transaction.store') }}">
      @csrf
        <div class="switch-container">
            <div class="switch-label">EXPENSE</div>
            <div class="switch">
                <input type="checkbox" id="switch" class="checkbox" name="isIncome">
                <label for="switch" class="slider"></label>
            </div>
        </div>

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" required>
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