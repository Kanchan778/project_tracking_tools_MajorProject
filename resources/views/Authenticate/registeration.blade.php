<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400&display=swap" rel="stylesheet"> 
    <title>Registration Form</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin-top: 30px;
           margin-bottom: 30px;
        }

        form {
            background-color: rgb(255, 255, 255,0.6);
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
           margin-top: 30px;
           margin-bottom: 30px;
            align-items: center;
            width: 30%;
            height:90%;
            border-radius:10px;
        }

      .avatar{
        margin-left: 120px;
      }
        .username{
            margin-top:20px;
            margin-left:20px;
            font-size:18px;
            font-family: 'Roboto Slab', serif;
        }
        .username input{
            padding:5px 5px 5px 5px;
            width:100%;
            border-radius:10px;
        }
        .username select{
            margin-top:10px;
            background: linear-gradient(90deg, rgb(255, 255, 255) 0%, rgb(255, 253, 255) 1%, rgb(237, 240, 247) 100%);
            font-size:18px;
            padding:8px 50px 8px 50px ;
            border-radius:10px;
            border:none;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.4);
        }
        .btn{
            margin-top:30px;
            background: linear-gradient(90deg, rgba(238,174,174,1) 0%, rgba(225,174,237,1) 1%, rgba(148,171,233,1) 100%);
            font-size:18px;
            padding:8px 50px 8px 50px ;
            border-radius:10px;
            border:none;
            margin-left: 30px;
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
       

        <form action="{{ route('register') }}" method="POST" onsubmit="return validateForm()">
            @csrf
            <div>
                <img class="avatar" src="{{ asset('img/apexlogo.png') }}" alt="Avatar" style="width: 190px; height: 50px; margin-bottom: 10px;">
            </div>
                 <h2 class="avatar" >Registration Form</h2>
            <div  class="username">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div  class="username">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div  class="username">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <span class="toggle-icon" onclick="togglePasswordVisibility('password')">
                    <!-- Password toggle icon code -->
                </span>
            </div>

            <div class="username">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
                <span class="toggle-icon" onclick="togglePasswordVisibility('confirm-password')">
                    <!-- Password toggle icon code -->
                </span>
                <span id="password-error" class="error"></span>
            </div>

            <!-- Add Section field -->
            <div  class="username">
                <label for="section">Section:</label>
                <input type="text" id="section" name="section" required>
            </div>

            <!-- Add Semester field -->
            <div  class="username">
                <label for="semester">Semester:</label>
                <select id="semester" name="semester" required>
                    <option value="">Select Semester</option>
                    <option value="1">1st Semester</option>
                    <option value="2">2nd Semester</option>
                    <option value="3">3rd Semester</option>
                    <option value="4">4th Semester</option>
                    <option value="5">5th Semester</option>
                    <option value="6">6th Semester</option>
                    <option value="7">7th Semester</option>
                    <option value="8">8th Semester</option>
                </select>
            </div>

            <!-- Add Course field -->
            <div  class="username">
                <label for="course">Course:</label>
                <select id="course" name="course" required>
                    <option value="">Select Course</option>
                    <option value="BBA">BBA</option>
                    <option value="BBA-TT">BBA-TT</option>
                    <option value="BBA-BI">BBA-BI</option>
                    <option value="BCIS">BCIS</option>
                </select>
            </div>

            <input type="hidden" name="role" value="student">

            <div>
                <button type="submit" class="btn">Register</button>
                <button onclick="redirectToLogin()" class="btn">Login</button>
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
    //    var registrationSuccessful = true; // Replace with your actual logic to determine success/failure

    //    if (registrationSuccessful) {
    //        document.getElementById('success-popup').style.display = 'flex';
    //    } else {
    //        document.getElementById('error-popup').style.display = 'flex';
    //    }
   </script>
    
</body>

</html>