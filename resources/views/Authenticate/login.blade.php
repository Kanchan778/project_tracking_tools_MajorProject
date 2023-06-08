<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #D5B4B4;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        div + div {
            margin-top: 10px;
        }

        button[type="submit"] {
            margin-top: 10px;
        }
    </style>
</head>
<body style="background-color: #E4D0D0;">
    <div class="container">
        <form>
            <div>
                <img class="avatar" src="{{ asset('img/apexlogo.png') }}" alt="Avatar" style="width: 100px; height: 50px; margin-bottom: 10px;">
            </div>
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div>
                <button type="submit">Login</button>
            </div>

            <div>
                <p>Or Sign Up with:</p>
                <div>
                    <a href="{{ route('login-facebook') }}"><img class="facebook-icon" src="{{ asset('img/fblogo.png') }}" alt="Facebook" style="width: 150px; height: 35px;"></a>
                </div>
                <div>
                   <a href="{{ route('login-gmail') }}"><img class="gmail-icon" src="{{ asset('img/google.jpg') }}" alt="Gmail" style="width: 150px; height: 35px;"></a>
                </div>
            </div>
            <div>
        <a href="#">Forgot Password?</a>
    </div>

    <div>
        Don't have an account? <a href="{{ route('registeration') }}">Create Account</a>
    </div>
        </form>
    </div>

   
</body>
</html>