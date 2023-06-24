<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <style>
    body {
      margin: 0;
      padding: 0;
    }
    
    #sidebar {
      position: fixed;
      top: 0;
      left: -250px; /* Initially hidden */
      width: 250px;
      height: 100vh;
      background: #333;
      transition: all 0.3s ease;
    }
    
    #sidebar.active {
      left: 0; /* Displayed */
    }
    
    #content {
      margin-left: 250px; /* Adjust for sidebar width */
    }
    
    #menu-icon {
      position: fixed;
      top: 10px;
      left: 10px;
      font-size: 24px;
      color: black;
      cursor: pointer;
      z-index: 999;
    }
    
    #menu-icon:hover {
      color: #aaa;
    }
    
    #close-icon {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 24px;
      color: #fff;
      cursor: pointer;
    }
    
    #close-icon:hover {
      color: #aaa;
    }
    
    #avatar-menu {
      position: fixed;
      top: 10px;
      right: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: #aaa; /* Placeholder background color */
      color: #fff;
      cursor: pointer;
    }
    
    #avatar-menu img {
      width: 100%;
      height: 100%;
      border-radius: 50%;
      object-fit: cover;
    }
    
    #logout-dropdown {
      position: absolute;
      top: 60px;
      right: -100px;
      background: #fff;
      padding: 5px;
      border-radius: 5px;
      display: none;
    }
    
    #avatar-menu.active #logout-dropdown {
      display: block;
    }
    
    #logout-btn {
      padding: 5px 10px;
      background: none;
      border: none;
      cursor: pointer;
    }
    
    #logout-btn:hover {
      background: #eee;
    }
    
    #dropdown-icon {
      position: absolute;
      top: calc(50% - 6px);
      right: 5px;
      font-size: 12px;
      color: black;
      transform: rotate(90deg);
    }
    
    /* Additional styles for the sidebar and content */
    /* Customize these as needed */
    #sidebar ul {
      list-style-type: none;
      padding: 0;
    }
    
    #sidebar ul li {
      padding: 10px;
      color: #fff;
    }
    
    #sidebar ul li:hover {
      background: #555;
      cursor: pointer;
    }
    
    #content {
      padding: 20px;
    }
    
    /* Responsive styles */
    @media only screen and (max-width: 600px) {
      #menu-icon {
        display: none;
      }
      
      #content {
        margin-left: 0;
      }
    }
  </style>
</head>
<body>
  <div id="sidebar">
    <div id="close-icon">&#10006;</div>
    <ul>
      <li>Item 1</li>
      <li>Item 2</li>
      <li>Item 3</li>
      <!-- Add more menu items as needed -->
    </ul>
  </div>
  
  <div id="content">
    <div id="menu-icon">&#9776;</div>
    <input type="text" id="search-input" placeholder="Search">
    <div id="avatar-menu">
      <img src="avatar.jpg" alt="Avatar">
      <span id="dropdown-icon">&#9662;</span>
      <div id="logout-dropdown">
        <button id="logout-btn">Logout</button>
      </div>
    </div>
    <!-- Add your dashboard content here -->
  </div>
  
  <div> supervisor dashboard</div>
  <script>
    var menuIcon = document.getElementById('menu-icon');
    var closeIcon = document.getElementById('close-icon');
    var sidebar = document.getElementById('sidebar');
    var avatarMenu = document.getElementById('avatar-menu');
    
    menuIcon.addEventListener('click', function() {
      sidebar.classList.add('active');
    });
    
    closeIcon.addEventListener('click', function() {
      sidebar.classList.remove('active');
    });
    
    avatarMenu.addEventListener('click', function() {
      avatarMenu.classList.toggle('active');
    });
  </script>
</body>
</html>
