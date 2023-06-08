<!DOCTYPE html>
<html>
<head>
    <title>Project Tracking</title>
    <!-- Add your CSS stylesheets here -->
    <style>
        body {
            background-color: #E4D0D0;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        
        .splash-container {
            text-align: center;
        }
        
        .splash-logo {
            width: 150px;
            height: 150px;
            margin-bottom: 20px;
        }
        
        .splash-message {
            font-size: 24px;
            color: #333;
        }
    </style>
    <script>
    // JavaScript to redirect after 10 seconds
    setTimeout(function() {
      window.location.href = "{{ route('login') }}";// Replace "login.html" with your actual login page URL
    }, 2000); // 2000 milliseconds = 2 seconds
  </script>
</head>
<body>
    <!-- Add your splash screen content here -->
    <div class="splash-container">
        <img class="splash-logo" src="{{ asset('img/logo.png') }}" alt="Logo">
        <h1 class="splash-message">Welcome to PTT</h1>
      
    </div>
</body>
</html>
