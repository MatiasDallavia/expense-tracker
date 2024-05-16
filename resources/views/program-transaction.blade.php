<div class="overlay newProgrammedTransaction">
    <div class="popup" id="popup">
      <h2>Program a Transaction</h2>

      <form id="programmedTransactionForm" method="POST" action="{{ route('transactions.store') }}">
        @csrf
      
        <div class="form-group">
          <label for="datePikcer">Exact Date:</label>
          <input type="date" id="datePikcer" name="fecha" min="2022-01-01" max="2024-12-31">
        </div>
      
        <div class="form-group flex-container">
          <label for="aboveThreshold">Monthly:</label>
          <input type="checkbox" id="aboveThreshold" name="Monthly" onclick="handleCheckboxChange(this)">
          <label for="belowThreshold">Daily:</label>
          <input type="checkbox" id="belowThreshold" name="Daily" onclick="handleCheckboxChange(this)">
        </div>
      
        <div class="form-group flex-container">
          <label for="transaction-amount">Transaction Amount</label>
          <input
            id="transaction-amount"
            type="number"
            name="treshold-amount"
            value="0"
            min="0"
            step="1"
            required
          />
        </div>
      
        <button style="cursor:pointer;" type="submit">Submit</button>
      
      </form>
      
      <button class="closePopup newProgrammedTransaction">Close</button>
    </div>
  </div>
