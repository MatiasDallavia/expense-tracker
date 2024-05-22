<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Expense Tracker</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{-- <link
      rel="stylesheet"
      href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"
    /> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  </head>

  <body>
    <main>

      @guest
        @include('user.login')
        @include('user.register')
      @endguest

      @auth    
        @include("balance-header")
      
        <section>
          <div class="container">

              @include('add-transaction')

              @include("popup.delete-programed-transaction")

              @include("program-transaction")

              {{-- @include('user.login') --}}



              {{-- @include("program-transaction") --}}

            {{-- @include("popup.new-alarm") --}}

            {{-- @include("popup.delete-alarm") --}}

            <div class="iconContainer">
              <div class="dropdown">
                <img class="icon excel dropbtn" src="images/excel-svgrepo-com.svg" />

                <div class="dropdown-content">
                  <a id="download-excel-button" href="{{ route('download.transactions.excel') }}">Download excel</a>
                </div>
              </div>

              {{-- <div class="dropdown">
                <img class="icon dropbtn" src="images/clock-lines-svgrepo-com.svg" />

                <div class="dropdown-content">
                  <a id="create-alarm-button" href="#">Create Alarm</a>
                  <a id="remove-alarm-button" href="#">Remove Alarm</a>
                </div>

              </div> --}}

              <div class="dropdown">
                <img class="icon calendar dropbtn" src="images/calendar.svg" />

                <div class="dropdown-content">
                  <a id="create-prog-transaction-button" href="#">Program Transaction</a>
                  <a id="remove-prog-transaction-button" href="#">Remove Transaction</a>
                </div>    
              </div>

            </div>
          </div>

        </section>

        <section>
          <h3 id="transactionTitle">Transactions</h3>
          <hr />
          <ul id="transactionList">

              @foreach ($transactions as $transaction)
                @include("transaction")
              @endforeach          
              
          </ul>
        </section>
        @endauth

      </main>

    <!-- <script src="script.js"></script> -->
    <script>


        const switchLabel = document.querySelector('.switch-label.add-transaction');
        const switchInput = document.querySelector('#switchTransactions');

        switchInput.addEventListener('change', function() {
          console.log(this.checked);
          if (this.checked) {
            console.log("checked");

            switchLabel.innerText = 'INCOME';
          } else {
            console.log("object");
            switchLabel.innerText = 'EXPENSE';
          }
        });

        const switchLabel2 = document.querySelector('.switch-label.program-transaction');
        const switchInput2 = document.querySelector('#switchScheduledTransactions');

        switchInput2.addEventListener('change', function() {
          console.log(this.checked);
          if (this.checked) {
            console.log("checked");

            switchLabel2.innerText = 'INCOME';
          } else {
            console.log("object");
            switchLabel2.innerText = 'EXPENSE';
          }
        });        



  </script>

  <script>
    document.getElementById('datePikcer').min = new Date().toISOString().split('T')[0];

    function handleCheckboxChange(checkbox) {
      // Obtener el input de fecha
      const dateInput = document.getElementById('datePikcer');
    
      // Deshabilitar el input de fecha si se selecciona algún checkbox
      dateInput.disabled = checkbox.checked;
    
      // Desmarcar el otro checkbox si este checkbox está marcado
      if (checkbox.checked) {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(cb => {
          if (cb !== checkbox) {
            cb.checked = false;
          }
        });
      }
    }
    </script>  

  <script>

    const transactions = document.querySelectorAll(".transactionCard").forEach(transaction => {
      const id = transaction.getAttribute("id");
      const deleteButton = transaction.querySelector(".deleteTransactionButton").addEventListener("click", async () => {
          console.log("APRETADO");
          fetch(`http://127.0.0.1:8000/transactions/${id}`, {
            method: "DELTE",
          })
              .then(response => window.location.href = "/23")  // convertir a json
              .then(json => console.log(json))    //imprimir los datos en la consola
              .catch(err => console.log('Solicitud fallida', err)); // Capturar errores         
            });
      console.log(deleteButton);
    });
  </script>
  

    <script>

      document.querySelector("#NotRegistredYet").addEventListener("click", function(event) {
        event.preventDefault();
        document.querySelector(".loginOverlay").style.display = "none";
        document.querySelector(".registerOverlay").style.display = "block";
      })


      document.querySelector("#AlreadyRegistred").addEventListener("click", function(event) {
        event.preventDefault();
        document.querySelector(".registerOverlay").style.display = "none";
        document.querySelector(".loginOverlay").style.display = "block";
      })      

      document
        .getElementById("download-excel-button")
        .addEventListener("click", function () {
          document.getElementById("overlay").style.display = "block";
        });

      // document
      //   .getElementById("create-alarm-button")
      //   .addEventListener("click", function () {
      //     document.getElementById("overlay").style.display = "block";
      //   });

      // document
      //   .getElementById("remove-alarm-button")
      //   .addEventListener("click", function () {
      //     document.getElementById("deleteAlarmoverlay").style.display = "block";
      //   });

        console.log(        document
        .querySelector("#create-prog-transaction-button"));
        document
        .querySelector("#create-prog-transaction-button")
        .addEventListener("click", function () {
          console.log("PULSANDO");
          document.querySelector(".newProgrammedTransaction").style.display = "block";
        });

      document
        .getElementById("remove-prog-transaction-button")
        .addEventListener("click", function () {
          document.querySelector("#deleteScheduledTransactionOverlay").style.display = "block";
          console.log(document.querySelector(".newProgrammedTransaction").style.display);
        });

        document
        .querySelector(".closePopup.ProgramTransaction")
        .addEventListener("click", function () {
          document.getElementById("deleteScheduledTransactionOverlay").style.display = "none";
        });

        document
        .querySelector(".closePopup.newProgrammedTransaction")
        .addEventListener("click", function () {
          document.querySelector(".overlay.newProgrammedTransaction").style.display = "none";
        });        


      document
        .getElementById("closePopup")
        .addEventListener("click", function () {
          document.getElementById("overlay").style.display = "none";
        });
        

      document
        .querySelector(".closePopup.closeDeleteAlarm")
        .addEventListener("click", function () {
          document.getElementById("deleteAlarmoverlay").style.display = "none";
        });


      document
        .querySelector(".closePopup.ProgramTransaction")
        .addEventListener("click", function () {
          document.querySelector(".overlay.ProgramTransaction").style.display = "none";
        });

      document
        .querySelector(".closePopup.newProgrammedTransaction")
        .addEventListener("click", function () {
          document.querySelector(".overlay.newProgrammedTransaction").style.display = "none";
        });        


    </script>

    <script>
      document.getElementById('deleteTransactionButton').addEventListener('click', function(event) {
          event.preventDefault();
          document.getElementById('deleteTransactionForm').submit();
      });
    </script>

    <script>
      $(document).ready(function () {
        $("#datepicker")
          .datepicker({
            startDate: new Date(),
            multidate: true,
            format: "dd/mm/yyyy",
            daysOfWeekHighlighted: "5,6",
            datesDisabled: ["31/08/2017"],
            language: "en",
          })
          .on("changeDate", function (e) {
            // `e` here contains the extra attributes
            $(this)
              .find(".input-group-addon .count")
              .text(" " + e.dates.length);
          });
      });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <script>
          const belowCheckbox = document.getElementById('below-threshold');
          const aboveCheckbox = document.getElementById('above-threshold');

          belowCheckbox.addEventListener('change', function() {
              if (this.checked) {
                  aboveCheckbox.checked = false;
              }
          });

          aboveCheckbox.addEventListener('change', function() {
              if (this.checked) {
                  belowCheckbox.checked = false;
              }
          });
    </script>

    <script>
      $(document).ready(function () {
        $("#datepicker").datepicker({
          startDate: new Date(),
          multidate: true,
          format: "dd/mm/yyyy",
          daysOfWeekHighlighted: "5,6",
          datesDisabled: ["31/08/2017"],
          language: "en",
          beforeShowDay: function (date) {
            var string = jQuery.datepicker.formatDate("dd/mm/yyyy", date);
            var highlight =
              selectedDates.indexOf(string) !== -1 ? "dp-highlight" : "";
            return [true, highlight];
          },
          onSelect: function (dateText) {
            var date = $(this).datepicker("getDate");
            var string = jQuery.datepicker.formatDate("dd/mm/yyyy", date);

            if (selectedDates.indexOf(string) === -1) {
              selectedDates.push(string);
            } else {
              selectedDates = selectedDates.filter(function (item) {
                return item !== string;
              });
            }

            $(this).datepicker("setDate", null);
            $(this).datepicker("refresh");
            $(this)
              .find(".input-group-addon .count")
              .text(" " + selectedDates.length);
          },
        });
      });
    </script>
  </body>
</html>
