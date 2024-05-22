<div class="overlay" id="overlay">
    <div class="popup" id="popup">
        <h2>Add Alarm</h2>

        <form method="POST" action="{{ route('alarm.store') }}"id="newAlarmForm">
            @csrf
            <br />
            <div class="alarm-options">
                <label class="alarm-container">Below Treshold
                    <input type="radio" checked="checked" name="below-treshold" id="below-threshold" />
                    <span class="alarm-checkmark"></span>
                </label>
                <label class="alarm-container">Above Treshold
                    <input type="radio" name="above-treshold" id="above-threshold" />
                    <span class="alarm-checkmark"></span>
                </label>

                <div>
                    <label for="treshold-amount">Treshold Amount</label>
                    <input id="treshold-amount" type="number" name="treshold-amount" value="0" step="1"
                        required />
                </div>
            </div>

            <br />

            <button type="submit">Create</button>
        </form>
        <button id="closePopup">Close</button>
    </div>
</div>
