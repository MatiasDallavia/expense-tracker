<div class="overlay newProgrammedTransaction">
    <div class="popup" id="popup">
      <h2>Program a Transaction</h2>

      <form id="programmedTransactionForm" method="POST" action="{{ route('schedule.store') }}">
        @csrf
      
        <div class="form-group">
          <label for="datePikcer">Exact Date:</label>
          <input type="date" id="datePikcer" name="schedule-for" min="2022-01-01" max="2024-12-31">
        </div>

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="category" required>
        </div>

        <div class="form-group flex-container">

          <div class="switch-label program-transaction">INCOME</div>
          <div class="switch">
              <input type="checkbox" id="switchScheduledTransactions" class="checkbox" name="is-income">
              <label for="switchScheduledTransactions" class="slider"></label>
          </div>      
        </div>

      
        <div class="form-group flex-container">
          <label for="aboveThreshold">Monthly:</label>
          <input type="checkbox" id="aboveThreshold" name="monthly" onclick="handleCheckboxChange(this)">
          <label for="belowThreshold">Daily:</label>
          <input type="checkbox" id="belowThreshold" name="daily" onclick="handleCheckboxChange(this)">
        </div>
      
        <div class="form-group flex-container">
          <label for="transaction-amount">Transaction Amount</label>
          <input
            id="transaction-amount"
            type="number"
            name="amount"
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
