<div class="programmedTransaction">
    <div class="popup" id="popup">
      <h2>Program</h2>

      <form id="programmedTransactionForm">
        <div>
          <label class="alarm-container"
            >Below Treshold
            <input type="radio" checked="checked" name="alarm-radio" />
            <span class="alarm-checkmark"></span>
          </label>

          <br />

          <label class="alarm-container"
            >Above Treshold
            <input type="radio" name="alarm-radio" />
            <span class="alarm-checkmark"></span>
          </label>
        </div>
        <br />

        <div>
          <label for="transaction-amount">Transaction Amount</label>
          <input
            id="transaction-amount"
            type="number"
            name="treshold-amount"
            value="0"
            min="0.0"
            step="0.1"
            required
          />
        </div>
        <!-- 
                    <div class="input-group date form-group" id="datepicker">
                        <input type="text" class="form-control" id="Dates" name="Dates"
                            placeholder="Select days" required />
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i><span
                                class="count"></span></span>
                    </div> -->

        <button type="submit">Submit</button>
      </form>
      <button id="closePopup">Close</button>
    </div>
  </div>