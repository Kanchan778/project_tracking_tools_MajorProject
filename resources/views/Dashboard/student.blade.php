<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard/student.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif

  <!-- Navbar -->
  <nav>
    <div class="navbar-container">
    <h1 class="dashboard-title">Student Dashboard</h1>
      <div class="navbar-icons">
        <button id="search-button"><i class="fas fa-search"></i></button>
        <button id="filter-button"><i class="fas fa-filter"></i></button>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="sidebar">
      <!-- Sidebar with fields -->
      <div class="sidebar-profile">
        <div class="profile-avatar">
          <label for="avatar-input" class="avatar-label">
            <i class="fas fa-plus"></i>
          </label>
          <input type="file" id="avatar-input" style="display: none;">
        </div>
        <div class="profile-name" id="username-placeholder"></div>
      </div>

      <div class="username text-center">
    <h4><strong>{{ Auth::user()->username }}</strong></h4>
</div>

      <button class="edit-profile-button">Edit Profile</button>

      <ul class="sidebar-links">
        <li><i class="fas fa-project-diagram"></i><a href="{{ route('Project') }}">Projects</a></li>
        <li><i class="fas fa-users"></i><a href="{{ route('Supervisor') }}">Supervisors</a></li>
        <li><i class="fas fa-graduation-cap"></i><a href="#">Groups</a></li>
        <li><i class="fas fa-cog"></i><a href="#">Settings</a></li>
        <li><i class="fas fa-sign-out-alt"></i><a href="{{ route('login') }}" id="logout-link">Logout</a></li>
      </ul>
    </div>
    <!-- Search Field -->
<div id="search-field" style="display: none;">
  <input type="text" placeholder="Search...">
  <ul id="search-history-list"></ul>
</div>

    <div class="content">
      <div class="content-wrapper">
        <div class="main-content">
          <div class="field-container" id="projects">
            <h3><i class="fas fa-project-diagram"></i> <a href="">Projects</a></h3>
            <ul id="project-list">
        @if(Auth::user()->projects)
            @foreach(Auth::user()->projects as $project)
                <li>{{ $project->project_type }}</li>
            @endforeach
        @endif
    </ul>
          </div>

          <div class="field-container" id="supervisors">
            <h3><i class="fas fa-users"></i><a href="{{ route('Supervisor') }}">Supervisors</a></h3>
            <ul id="supervisor-list"></ul>
          </div>

          <div class="field-container" id="students">
            <h3><i class="fas fa-graduation-cap"></i> Groups</h3>
            <ul id="student-list"></ul>
          </div>

          <div class="field-container" id="students">
            <h3><i class="fas fa-graduation-cap"></i> Batch</h3>
            <ul id="student-list"></ul>
          </div>
        </div>
      </div>
      <div class="fields-container" id="chart-conatiner">
            <h3><i class="chart"></i> Chart</h3>
            <div id="chart-container"></div>
          </div>

      <div class="chat-container">
        <h3><i class="fas fa-comment-alt"></i> Chat Messages</h3>
        <ul id="chat-messages-list"></ul>
      </div>
    </div>
  </div>

  <footer>
        <p>&copy; 2023 Kanchan Chaudhary. All rights reserved.</p>
      </footer>

  <script src="{{ asset('js/dashboard/student.js') }}"></script>
</body>
</html>
