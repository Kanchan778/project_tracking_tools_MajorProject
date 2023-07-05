<!DOCTYPE html>
<html>
<head>
  <title>Navbar</title>
  <style>
    /* CSS styling for the navbar */
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #C4DFDF;
      padding: 10px;
    }

    .navbar .logo {
      font-size: 20px;
      font-weight: bold;
    }

    .navbar .search-bar {
      flex: 1;
      margin: 0 10px;
      padding: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .navbar .notification {
      position: relative;
    }

    .navbar .notification .badge {
      position: absolute;
      top: -5px;
      right: -5px;
      width: 20px;
      height: 20px;
      background-color: red;
      border-radius: 50%;
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 12px;
    }

    .navbar .avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: #ccc;
      cursor: pointer;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 120px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  <div class="navbar">
    <div class="logo">
      Logo
    </div>
    <input type="text" class="search-bar" placeholder="Search...">
    <div class="notification">
      <i class="fas fa-bell"></i>
      <div class="badge">3</div>
    </div>
    <div class="dropdown">
      <div class="avatar"></div>
      <div class="dropdown-content">
        <a href="#">Profile</a>
        <a href="#">Settings</a>
        <a href="#">Logout</a>
      </div>
    </div>
  </div>

  <script>
    // JavaScript code for notifications and avatar functionality
    // You can replace the following code with your own logic
    const badge = document.querySelector('.badge');
    const avatar = document.querySelector('.avatar');

    // Simulate notifications count
    const notificationsCount = 3;
    if (notificationsCount > 0) {
      badge.textContent = notificationsCount;
      badge.style.display = 'flex';
    }

    // Simulate avatar click
    avatar.addEventListener('click', () => {
      console.log('Avatar clicked');
      // Add your logic here for avatar dropdown menu
    });
  </script>
</body>
</html>
