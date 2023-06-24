<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head content... -->
</head>
<body style="background-color: #E4D0D0;">
    <div class="container">
        <form action="{{ route('password-reset') }}" method="POST">
            @csrf
            <div>
                <img class="avatar" src="{{ asset('img/apexlogo.png') }}" alt="Avatar" style="width: 100px; height: 50px; margin-bottom: 10px;">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">New Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <input type="hidden" name="token" value="{{ $token }}">
            <div>
                <button type="submit">Reset Password</button>
            </div>
        </form>
    </div>
</body>
</html>
