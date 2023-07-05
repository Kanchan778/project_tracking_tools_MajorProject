<!DOCTYPE html>
<html>
<head>
  <title>Project Page</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/project.css') }}">
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
  <div class="create-project-container">
    <button id="create-project-btn">+ Create Project</button>
  </div>

  <!-- Create Project Form -->
  <div id="create-project-form" style="display: none;">
    <h2>Create Project <i id="close-icon" class="fas fa-times"></i></h2>
    <form id="project-form" action="{{ route('projects.store') }}" method="POST">
      @csrf
      
      <label for="project-name">Project Name:</label>
      <input type="text" id="project-name" name="project-name" required>

      <label for="section">Section:</label>
      <select id="section" name="section" required>
        <option value="">Select Section</option>
        @foreach($sections as $section)
          <option value="{{ $section }}">{{ $section }}</option>
        @endforeach
      </select>
      
      <label for="semester">Semester:</label>
      <select id="semester" name="semester" required>
        <option value="">Select Semester</option>
        @foreach($semesters as $semester)
          <option value="{{ $semester }}">{{ $semester }}</option>
        @endforeach
      </select>

      <label for="course">Course:</label>
      <select id="course" name="course" required>
        <option value="">Select Course</option>
        <option value="BBA">BBA</option>
        <option value="BBA-BI">BBA-BI</option>
        <option value="BBA-TT">BBA-TT</option>
        <option value="BCIS">BCIS</option>
      </select>

      <label for="project-type">Project Type:</label>
      <select id="project-type" name="project-type" required>
        <option value="">Select Project Type</option>
        <option value="Minor I Project">Minor I Project</option>
        <option value="Minor II Project">Minor II Project</option>
        <option value="Major Project">Major Project</option>
        <option value="Summer Project">Summer Project</option>
      </select>

      <label for="batch">Batch:</label>
      <input type="text" id="batch" name="batch" required>

      <label for="supervisor">Supervisor:</label>
      <select id="supervisor" name="supervisor[]" multiple required>
        @foreach($supervisors as $supervisor)
          <option value="{{ $supervisor->username }}">{{ $supervisor->username }}</option>
        @endforeach
      </select>
      
      <button type="submit">Create</button>
    </form>
  </div>

  <!-- Container for project folders -->
  <div id="project-folders">
    @foreach($projects as $project)
    <div class="project-folder">
      <i class="fas fa-folder"></i>
      <span>{{ $project->project_name }}</span>
    </div>
    @endforeach
  </div>

  @if(session('success'))
    <div class="success-message">{{ session('success') }}</div>
  @endif

  <script src="{{ asset('js/project.js') }}"></script>
</body>
</html>
