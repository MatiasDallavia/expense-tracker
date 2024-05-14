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
    <h1>Expense Tracker</h1>

    <main>

        @include("balance-header")

      <section>
        <div class="container">

            @include('add-transaction')

            {{-- @include('user.login') --}}

            {{-- @include('user.register') --}}


            {{-- @include("program-transaction") --}}

          @include("popup.new-alarm")

          @include("popup.delete-alarm")

          <div class="iconContainer">
            <div class="dropdown">
              <img class="icon excel dropbtn" src="images/excel-svgrepo-com.svg" />

              <div class="dropdown-content">
                <a id="download-excel-button" href="#">Download excel</a>
              </div>
            </div>

            <div class="dropdown">
              <img class="icon dropbtn" src="images/clock-lines-svgrepo-com.svg" />

              <div class="dropdown-content">
                <a id="create-alarm-button" href="#">Create Alarm</a>
                <a id="remove-alarm-button" href="#">Remove Alarm</a>
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
    </main>

    <!-- <script src="script.js"></script> -->
    <script>
      document
        .getElementById("download-excel-button")
        .addEventListener("click", function () {
          document.getElementById("overlay").style.display = "block";
        });

      document
        .getElementById("create-alarm-button")
        .addEventListener("click", function () {
          document.getElementById("overlay").style.display = "block";
        });

      document
        .getElementById("remove-alarm-button")
        .addEventListener("click", function () {
          document.getElementById("deleteAlarmoverlay").style.display = "block";
        });

      document
        .getElementById("closePopup")
        .addEventListener("click", function () {
          document.getElementById("overlay").style.display = "none";
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
