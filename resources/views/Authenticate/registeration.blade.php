<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            background-color: #E4D0D0;
        }

        .error {
            color: red;
        }

        .password-toggle {
            position: relative;
        }

        .password-toggle .toggle-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #332C39; /* Set toggle button color */
        }

        .form-container {
            background-color: #D5B4B4;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            margin: 100px auto 0; /* Add margin-top of 40px */
            display: flex;
            flex-direction: column;
            align-items: center; /* Center the form vertically */
            justify-content: center; /* Center the form horizontally */
        }

        .form-container h2 {
            text-align: center;
        }

        .form-container button {
            display: block;
            margin: 0 auto;
            background-color: #F5EBEB; /* Set register button color */
        }

        .form-container div {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .form-container label {
            flex: 1;
        }

        .form-container input {
            flex: 2;
        }

        .popup {
            background-color: #FFF;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center; /* Center the popup vertically */
            justify-content: center; /* Center the popup horizontally */
        }

        .popup h3 {
            text-align: center;
        }

        .popup button {
            margin-top: 10px;
            background-color: #F5EBEB; /* Set login button color */
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Registration Form</h2>

        <form onsubmit="return validateForm()">
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 18C9.239 18 7 15.761 7 13C7 10.239 9.239 8 12 8C14.761 8 17 10.239 17 13C17 15.761 14.761 18 12 18Z" />
                        <path
                            d="M12 8C10.346 8 9 9.346 9 11C9 12.654 10.346 14 12 14C13.654 14 15 12.654 15 11C15 9.346 13.654 8 12 8Z" />
                    </svg>
                </span>
            </div>

            <div class="password-toggle">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
                <span class="toggle-icon" onclick="togglePasswordVisibility('confirm-password')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 18C9.239 18 7 15.761 7 13C7 10.239 9.239 8 12 8C14.761 8 17 10.239 17 13C17 15.761 14.761 18 12 18Z" />
                        <path
                            d="M12 8C10.346 8 9 9.346 9 11C9 12.654 10.346 14 12 14C13.654 14 15 12.654 15 11C15 9.346 13.654 8 12 8Z" />
                    </svg>
                </span>
                <span id="password-error" class="error"></span>
            </div>

            <div>
    <button type="submit">Register</button>
    <button onclick="redirectToLogin()">Login</button>
</div>

        </form>
    </div>

    <div id="popup" class="popup" style="display: none;">
        <h3>Registered successfully! Please go to the Login page.</h3>
        <button onclick="closePopup()">Close</button>
    </div>

    <script>
        var passwordField = document.getElementById("password");
        var confirmPasswordField = document.getElementById("confirm-password");
        var passwordError = document.getElementById("password-error");
        var popup = document.getElementById("popup");

        function validateForm() {
            var password = passwordField.value;
            var confirmPassword = confirmPasswordField.value;

            if (password !== confirmPassword) {
                passwordError.textContent = "Passwords do not match";
                return false;
            } else {
                passwordError.textContent = "";
                showPopup();
                return true;
            }
        }

        function togglePasswordVisibility(fieldId) {
            var field = document.getElementById(fieldId);
            var icon = field.parentElement.querySelector(".toggle-icon");
            if (field.type === "password") {
                field.type = "text";
                icon.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 18C9.239 18 7 15.761 7 13C7 10.239 9.239 8 12 8C14.761 8 17 10.239 17 13C17 15.761 14.761 18 12 18Z" />
                        <path
                            d="M12 8C10.346 8 9 9.346 9 11C9 12.654 10.346 14 12 14C13.654 14 15 12.654 15 11C15 9.346 13.654 8 12 8Z" />
                        <path
                            d="M12 16C10.939 16 10.033 15.184 10.033 14.143C10.033 13.103 10.939 12.287 12 12.287C13.061 12.287 13.967 13.103 13.967 14.143C13.967 15.184 13.061 16 12 16Z" />
                    </svg>
                `;
            } else {
                field.type = "password";
                icon.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 18C9.239 18 7 15.761 7 13C7 10.239 9.239 8 12 8C14.761 8 17 10.239 17 13C17 15.761 14.761 18 12 18Z" />
                        <path
                            d="M12 8C10.346 8 9 9.346 9 11C9 12.654 10.346 14 12 14C13.654 14 15 12.654 15 11C15 9.346 13.654 8 12 8Z" />
                    </svg>
                `;
            }
        }

        function showPopup() {
            popup.style.display = "block";
        }

        function closePopup(event) {
        event.stopPropagation();
        popup.style.display = "none";
        }

        function redirectToLogin() {
            window.location.href = "{{ route('login') }}";
        }
    </script>
</body>

</html>
