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
            @include('balance-header')

            <section>
                <div class="container">

                    @include('popup.add-transaction')

                    @include('popup.delete-programed-transaction')

                    @include('popup.program-transaction')


                    <div class="iconContainer">
                        <div class="dropdown">
                            <img class="icon excel dropbtn" src="images/excel-svgrepo-com.svg" />

                            <div class="dropdown-content">
                                <a id="download-excel-button" href="{{ route('download.transactions.excel') }}">Download
                                    excel</a>
                            </div>
                        </div>

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
                        @include('transaction')
                    @endforeach

                </ul>
            </section>
        @endauth

    </main>

    <!-- <script src="script.js"></script> -->

    <script>
        var isAuthenticated = @json(Auth::check());
    </script>
    <script type="text/javascript" src="js/scripts.js"></script>

</body>

</html>
