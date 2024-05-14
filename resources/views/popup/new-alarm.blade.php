<div class="overlay" id="overlay">
    <div class="popup" id="popup">
      <h2>Add Alarm</h2>

      <form id="newAlarmForm">
        <br />
        <div class="alarm-options">
          <label class="alarm-container"
            >Below Treshold
            <input type="radio" checked="checked" name="alarm-radio" />
            <span class="alarm-checkmark"></span>
          </label>
          <label class="alarm-container"
            >Above Treshold
            <input type="radio" name="alarm-radio" />
            <span class="alarm-checkmark"></span>
          </label>

          <div>
            <label for="treshold-amount">Treshold Amount</label>
            <input
              id="treshold-amount"
              type="number"
              name="treshold-amount"
              value="0"
              min="0.5"
              step="1"
              required
            />
          </div>
        </div>

        <br />

        <button type="submit">Create</button>
      </form>
      <button id="closePopup">Close</button>
    </div>
</div>