<div class="overlay ProgramTransaction" id="deleteScheduledTransactionOverlay">
    <div class="popup" id="scheduledPopup">
        <h2>Remove Scheduled Transaction</h2>

        @foreach ($scheduledTransactions as $scheduledTransaction)
        <form method="POST" action="{{ route('schedule.destroy', $scheduledTransaction->id) }}" id="deleteScheduledTransactionForm">
            @csrf
            @method('DELETE')
            <div id="scheduledTransactionTableContainer">
                <table id="scheduledTransactionTable">
                    <tr>
                        <td colspan="2">
                            <div class="scheduled-transactions-name">
                                ${{ $scheduledTransaction->amount }}
                            </div>
                            <div class="scheduled-transactions-description">
                                {{ $scheduledTransaction->get_schedule_info() }}
                            </div>
                        </td>
                        <td>
                            <button type="submit" class="deleteScheduledTransactionButton">x</button>
                        </td>
                    </tr>
                </table>
            </div>
        </form>

            <hr />            
        @endforeach

        <button class="closePopup ProgramTransaction">Cerrar</button>
    </div>
</div>