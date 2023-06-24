<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            background-color: #E4D0D0;
        }
        
        .form-container {
            background-color: #D5B4B4;
            padding: 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
            margin: 0 auto;
            max-width: 700px;
        }

        .avatar {
            display: block;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="email"],
        input[type="text"],
        input[type="password"] {
            width: 80%;
            padding: 8px;
            margin-bottom: 10px;
        }

        .password-toggle {
            position: relative;
        }

        .toggle-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        .popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .popup h3 {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
        }

        .popup button {
            padding: 10px 20px;
            background-color: #fff;
            color: #333;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Registration Form</h2>

        <form action="{{ route('register') }}" method="POST" onsubmit="return validateForm()">
            @csrf
            <div>
                <img class="avatar" src="{{ asset('img/apexlogo.png') }}" alt="Avatar" style="width: 150px; height: 50px; margin-bottom: 10px;">
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="password-toggle">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <span class="toggle-icon" onclick="togglePasswordVisibility('password')">
                    <!-- Password toggle icon code -->
                </span>
            </div>

            <div class="password-toggle">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
                <span class="toggle-icon" onclick="togglePasswordVisibility('confirm-password')">
                    <!-- Password toggle icon code -->
                </span>
                <span id="password-error" class="error"></span>
            </div>

             <!-- Set the role value as "student" for all registrations -->

            <input type="hidden" name="role" value="student">
            
            <div>
                <button type="submit">Register</button>
                <button onclick="redirectToLogin()">Login</button>
            </div>
        </form>
    </div>

    <div id="success-popup" class="popup" style="display: none;">
        <h3>Successfully registered!</h3>
        <button onclick="closePopup()">Close</button>
    </div>

    <div id="error-popup" class="popup" style="display: none;">
        <h3>Error. Please try again later.</h3>
        <button onclick="closePopup()">Close</button>
    </div>
    <script>
        
        function redirectToLogin() {
       // Code to redirect to the login page goes here
       // For example, you can use window.location.href to redirect to a specific URL
       window.location.href = "{{ route('login') }}";
   }


       function validateForm() {
           var email = document.getElementById('email').value;
           var username = document.getElementById('username').value;
           var password = document.getElementById('password').value;
           var confirmPassword = document.getElementById('confirm-password').value;
           var passwordError = document.getElementById('password-error');

           if (password !== confirmPassword) {
               passwordError.innerText = "Passwords do not match.";
               return false;
           } else {
               passwordError.innerText = "";
               return true;
           }
       }

       function togglePasswordVisibility(inputId) {
           var passwordInput = document.getElementById(inputId);
           var toggleIcon = document.querySelector("#" + inputId + " ~ .toggle-icon");

           if (passwordInput.type === "password") {
               passwordInput.type = "text";
               toggleIcon.innerHTML = "&#128065;";
           } else {
               passwordInput.type = "password";
               toggleIcon.innerHTML = "&#128064;";
           }
       }


       function closePopup() {
           document.getElementById('success-popup').style.display = 'none';
           document.getElementById('error-popup').style.display = 'none';
       }

       // Check if registration was successful
       var registrationSuccessful = true; // Replace with your actual logic to determine success/failure

       if (registrationSuccessful) {
           document.getElementById('success-popup').style.display = 'flex';
       } else {
           document.getElementById('error-popup').style.display = 'flex';
       }
   </script>
    
</body>

</html>