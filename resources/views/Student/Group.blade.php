<!DOCTYPE html>
<html>
<head>
  <title>Project Page</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/student/group.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
 
   <!-- Navbar -->
   <nav>
    <div class="navbar-container">
      <button id="back-button"><i class="fas fa-arrow-left"></i></button>
      <h1>Project Page</h1>
      <div class="navbar-icons">
        <button id="search-button"><i class="fas fa-search"></i></button>
        <button id="filter-button"><i class="fas fa-filter"></i></button>
      </div>
    </div>
  </nav>
 <!-- Small container for "Create Project" button -->
 <div class="create-group-container">
    <button id="create-group-btn">+ Create Group</button>
  </div>

  <!-- Create Project Form -->
<div id="create-group-form" style="display: none;">
  <h2>Create Project</h2>
  <form action="" method="POST">
    @csrf

    <div>
        <label for="group_name">Group Name:</label>
        <input type="text" name="group_name" id="group_name" required>
    </div>

    <div>
        <label for="project_title">Project Title:</label>
        <input type="text" name="project_title" id="project_title" required>
    </div>

    <div>
        <label for="members">Group Members:</label>
        <div id="members-container">
            <div class="member">
                <input type="email" name="members[0][email]" required>
                <div class="roles">
                    <label for="member_roles">Roles:</label>
                    <select name="members[0][roles][]" multiple required>
                        <option value="Frontend">Frontend</option>
                        <option value="Backend">Backend</option>
                        <option value="Testing">Testing</option>
                        <option value="Report">Report</option>
                        <option value="Research">Research</option>
                        <option value="Full Stack">Full Stack</option>
                    </select>
                </div>
            </div>
        </div>
        <button type="button" id="add-member">Add Member</button>
    </div>

    <button type="submit">Create Group</button>
</form>

<script>
    
</script>

  <!-- Container for group folders -->

  <script src="{{ asset('js/student/group.js') }}"></script>
</body>
</html>
