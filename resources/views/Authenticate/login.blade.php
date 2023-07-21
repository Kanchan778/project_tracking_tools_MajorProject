<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400&display=swap" rel="stylesheet"> 
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: rgb(255, 255, 255,0.6);
            padding: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 30%;
            height:80%;
            border-radius:10px;
        }

      
        .username{
            margin-top:20px;
            margin-left:40px;
            font-size:18px;
            font-family: 'Roboto Slab', serif;
        }
        .username input{
            padding:5px 5px 5px 5px;
            width:80%;
            border-radius:10px;
        }
       
        .btn{
            margin-top:30px;
            background: linear-gradient(90deg, rgba(238,174,174,1) 0%, rgba(225,174,237,1) 1%, rgba(148,171,233,1) 100%);
            font-size:18px;
            padding:8px 50px 8px 50px ;
            border-radius:10px;
            border:none;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.4);
        }
        .signwith{
            margin-top:20px;
            font-size:14px;
            font-family: 'Roboto Slab', serif;
            text-decoration:none;
           
        }
        .signwith1{
            margin-top:20px;
            font-size:14px;
            font-family: 'Roboto Slab', serif;
            text-decoration:none;
           color:blue;
        }

        .error-message {
            color: red;
            margin-top: 10px;
            
        }
    </style>
</head>
<body style="background: rgb(238,174,174);
background: linear-gradient(90deg, rgba(238,174,174,1) 0%, rgba(225,174,237,1) 1%, rgba(148,171,233,1) 100%);">
    <div class="container">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <img class="avatar" src="{{ asset('img/apexlogo.png') }}" alt="Avatar" style="width: 190px; height: 50px; margin-bottom: 10px;">
            </div>
            <div class="username">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required autofocus>
            </div>
            <div class="username">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            @if($errors->any())
                <div class="error-message">
                    Invalid credentials. Please try again.
                </div>
            @endif
            <div>
                <button class="btn" type="submit">Login</button>
            </div>
            <div>
                <p class="signwith">Or Sign Up with:</p>
                <div>
                    <a href="{{ route('login-facebook') }}"><img class="facebook-icon" src="{{ asset('img/fblogo.png') }}" alt="Facebook" style="width: 220px; height: 50px;"></a>
                </div>
                <div>
                   <a href="{{ route('login-gmail') }}"><img class="gmail-icon" src="{{ asset('img/google.jpg') }}" alt="Gmail" style="width: 220px; height: 50x;"></a>
                </div>
            </div>
            <div class="signwith1">
                <a class="signwith1" href="{{ route('password-reset') }}">Forgot Password?</a>
            </div>
            <div class="signwith" >
                Don't have an account? <a class="signwith1" href="{{ route('registeration') }}">Create Account</a>
            </div>
        </form>

        <script src="{{ asset('js/login.js') }}"></script>
    </div>
</body>
</html>
