<div class="loginOverlay" id="overlay">
    <div class="popup" id="popup">
        <h2>Login</h2>

        <form method="POST" action="{{ route('users.auth') }}" id="loginForm">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <br>
            <div class="alarm-options">

                <label for="name">Email</label>
                <input type="text" name="email" required />

                <label for="name">Password</label>
                <input type="text" name="password" required />

                <br>

                <a id="NotRegistredYet" href="">Not registred yet?</a>


            </div>



            <button type="submit">Submit</button>


        </form>
    </div>
</div>
