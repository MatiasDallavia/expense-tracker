

<div class="forms-container">
    <h3>Add Transaction</h3>

    <form id="transactionForm">
      <div>
        <label for="type">
          <input type="checkbox" name="type" id="type" />
          <div class="option">
            <span>Expense</span>
            <span>Income</span>
          </div>
        </label>
      </div>
      <div>
        <label for="name">Name</label>
        <input type="text" name="name" required />
      </div>
      <div>
        <label for="amount">Amount</label>
        <input
          type="number"
          name="amount"
          value="0"
          min="0.01"
          step="0.01"
          required
        />
      </div>
      <div>
        <label for="date">Date</label>
        <input type="date" name="date" required />
      </div>
      <button type="submit">Submit</button>
    </form>
  </div>