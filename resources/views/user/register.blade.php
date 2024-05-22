<div class="registerOverlay" id="overlay">
    <div class="popup" id="popup">
        <h2>Register</h2>

        <form method="POST" action="{{ route('users.store') }}" id="registerForm">
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

            <label for="email">Email</label>
            <input type="text" name="email" value="{{ old('email') }}" required />

            <label for="username">Username</label>
            <input type="text" name="username" required />

            <label for="name">Password</label>
            <input type="password" name="password" required />

            <label for="name">Confirm Password</label>
            <input type="password" name="password_confirmation" required />

            <a id="AlreadyRegistred" href="">Already registered?</a>

            <button type="submit">Submit</button>
        </form>
        <button id="closePopup">Cerrar</button>
    </div>
</div>