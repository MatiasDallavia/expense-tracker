<div class="deleteAlarmoverlay" id="deleteAlarmoverlay">
    <div class="popup" id="popup">
      <h2>Remove Alarm</h2>

      <form id="delete alarmsAlarmForm">
        <br />
        <div id="alarmTableContainer">
          <table id="alarmTable">
            @foreach ($alarms as $alarm)
              <tr>
                <td colspan="2">
                  <div class="alarm-name">
                     {{ $alarm->trigger_when_suprass ? 'Above ' : 'Below ' }}${{$alarm->treshold}} 
                  </div>
                  <div class="alarm-description">
                    Created the {{explode(" ",$alarm->created_at)[0]}}
                  </div>
                </td>
                <td><button class="deleteButton">x</button></td>
              </tr>                
            @endforeach

            <!-- Agrega más filas según sea necesario -->
          </table>
        </div>
        <br />
      </form>
      <button id="closePopup">Cerrar</button>
    </div>
  </div>