@php
    $defaultImage = 'public/img/Profile.png';
@endphp


<!doctype html>
<html lang="en">

  
<!-- Mirrored from pipeline.mediumra.re/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jul 2023 08:23:11 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-52115242-14"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-52115242-14');
    </script>
    <meta charset="utf-8">
    <title>Project Tracking Tools</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A project management Bootstrap theme by Medium Rare">
    <link href="assets/img/favicon.ico" rel="icon" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
    <link href="{{ asset('css/frontend/theme.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard/projectcordinator.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/chatify/dark.mode.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/chatify/light.mode.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/chatify/style.css') }}">
    
  </head>

  <body>
  @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
  @endif

    <div class="layout layout-nav-side">
      <div class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
        <div class="d-flex align-items-center">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="d-block d-lg-none ml-2">
            <div class="dropdown">
              <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img alt="Image" src="assets/img/avatar-male-4.jpg" class="avatar" />
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a href="nav-side-user.html" class="dropdown-item">Profile</a>
                <a href="utility-account-settings.html" class="dropdown-item">Account Settings</a>
                <a href="#" class="dropdown-item">Log Out</a>
              </div>
            </div>
          </div>
        </div>
        <div class="collapse navbar-collapse flex-column" id="navbar-collapse">
          <ul class="navbar-nav d-lg-block">

            <!-- Sidebar with fields -->
      <div class="sidebar-profile">
      <div class="profile-avatar">
    <label for="avatar-input" class="avatar-label">
   
    <img class="avatar-image" src="{{asset(auth()->user()->profile_img ?: $defaultImage )}}"  alt="Profile Image">
       
    </label>
</div>

        <div class="profile-name" id="username-placeholder"></div>
      </div>

      <div class="username text-center">
      <h4 class="username"><strong>{{ Auth::user()->username }}</strong></h4>
</div>

<button class="edit-profile-button">Edit Profile</button>
</ul>

          <hr>
          <div class="d-none d-lg-block w-100">
            <span class="text-small text-muted">Quick Links</span>
            <ul class="nav nav-small flex-column mt-2">
              <li class="nav-item">
                <a href="{{ route('supervisor.dashboard') }}" class="nav-link">Dashboard</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('supervisor.projects') }}" class="nav-link">Project </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('supervisor.progress') }}" class="nav-link">Progress</a>
              </li>
              <li class="nav-item">
              <a href="#"class="nav-link">Account Setting</a>
              </li>
            </ul>
            <hr>
          </div>
          <div>
            <form>
              <div class="input-group input-group-dark input-group-round">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">search</i>
                  </span>
                </div>
                <input type="search" class="form-control form-control-dark" placeholder="Search" aria-label="Search app">
              </div>
            </form>
            <div class="dropdown mt-2">
              <button class="btn btn-primary btn-block dropdown-toggle" type="button" id="newContentButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Add New
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Team</a>
                <a class="dropdown-item" href="#">Project</a>
                <a class="dropdown-item" href="#">Task</a>
              </div>
            </div>
          </div>
        </div>
        <div class="d-none d-lg-block">
          <div class="dropup">
          <a href="{{ route('projectCoordinator.logout') }}"
   onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
    Logout
</a>

<form id="logout-form" action="{{ route('projectCoordinator.logout') }}" method="POST" style="display: none;">
    @csrf
</form>

            </a>
            <div class="dropdown-menu">
              <a href="nav-side-user.html" class="dropdown-item">Profile</a>
              
              
            </div>
          </div>
        </div>

      </div>
      <div class="main-container">
      <div class="edit-profile-form" style="display: none;">
 
      <form action="{{ route('supervisor.profile.update') }}" method="POST" enctype="multipart/form-data" id="profile-form" class="pro-form">
   @csrf
      <!-- Your existing form fields -->
<i class="fas fa-times" id="close-icon" >
  <button type="submit" class="proclose">X</button>
</i>
    <input type="file" id="avatar-input" name="profile_img" style="display: none;">
    <div class="profile-avatar">
    <label for="avatar-input">
            <i class="fas fa-plus" id="upload-icon"></i>
            @if(Auth::user()->prodile_img)
                <img class="avatar-label" src="{{ asset(Auth::user()->profile_img) }}" id="avatar-preview" alt="Profile Image">
            @else
                <img class="avatar-label" src="{{ asset('img/profile.png') }}" id="avatar-preview" alt="Default Profile Image">
            @endif
        </label>
    </div>
    <div class="pro-field">
        <label for="new-username">Username:</label>
        <input type="text" id="new-username" name="new_username" value="{{ Auth::user()->username }}" required>
        @error('new_username')
        <span class="error-message">{{ $message }}</span>
        @enderror
      </div>

    <!-- Your existing form fields -->
    <div class="pro-field">
    <button type="submit" class="updatebtn">Update Profile</button>

    <!-- Close icon -->
    

</form>

</div>
</div>
<div class="container" id="searchResultsContainer">
  <div class="row justify-content-center">
      <div class="col-lg-11 col-xl-10">
          <div class="page-header">
              <div class="d-flex align-items-center">
                  <ul class="avatars">
                      <!-- all users profilepic should be display here-->
                  </ul>
                  {{-- 
        <button class="btn btn-round flex-shrink-0" data-toggle="modal" data-target="#user-invite-modal">
          <i class="material-icons">add</i>
        </button> --}}
                  <form>
                      <div class="input-group input-group-dark input-group-round">
                          <div class="input-group-prepend">
                              <span class="input-group-text">
                                  <i class="material-icons">search</i>
                              </span>
                          </div>

                          <input type="search" class="form-control form-control-dark" placeholder="Search"
                              aria-label="Search app" id="searchInput">

                          <button type="button" class="btn btn-primary"
                              onclick="validateSearch()">Search</button>

                      </div>
                  </form>

              </div>
          </div>
          <hr>
          <ul class="nav nav-tabs nav-fill" role="tablist">
              <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#projects" role="tab"
                      aria-controls="projects" aria-selected="true">Assigned Projects</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#members" role="tab"
                      aria-controls="members" aria-selected="false">All Projects</a>
              </li>
          </ul>
          <div class="tab-content">
              <div class="tab-pane fade show active" id="projects" role="tabpanel"
                  data-filter-list="content-list-body">
                  <div class="content-list">
                      <div class="row content-list-head">
                          <div class="col-auto">
                              <h3>Projects</h3>
                              
                          </div>
                          <form class="col-md-auto">
                              <div class="input-group input-group-round">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text">
                                          <i class="material-icons">filter_list</i>
                                      </span>
                                  </div>
                                  <input type="search" class="form-control filter-list-input"
                                      placeholder="Filter projects" aria-label="Filter Projects">
                              </div>
                          </form>
                      </div>
                      <!--end of content list head-->
                      <div class="content-list-body row">
                         {{-- Loop through user-attached projects --}}
@if($userProjects->isEmpty())
    <p>No user-attached projects found.</p>
@else
    <ul>
        @foreach($userProjects as $project)
            <li>{{ $project->name }}</li>
        @endforeach
    </ul>
@endif
                      </div>
                      <!-- </div> -->
                      <!--end of content list body-->
                  </div>
                  <!--end of content list-->
              </div>
              <!--end of tab-->
              <div class="tab-pane fade" id="members" role="tabpanel"
                  data-filter-list="content-list-body">
                  <div class="content-list">
                      <div class="row content-list-head">
                          <div class="col-auto">
                              <h3>All Projects</h3>
                              
                          </div>
                          <form class="col-md-auto">
                              <div class="input-group input-group-round">
                                  <div class="input-group-prepend">
                                      <div class="input-group">
                                          <span class="input-group-text">
                                              <i class="material-icons">filter_list</i>
                                          </span>
                                          <input type="search" class="form-control filter-list-input"
                                              placeholder="Filter projects" aria-label="Filter Members">
                                      </div>
                                  </div>
                          </form>
                      </div>
                      <!--end of content list head-->
                      <div class="content-list-body row">
                      {{-- Loop through all projects --}}

@if($allProjects->isEmpty())
    <p>No projects found.</p>
@else
    <ul>
        @foreach($allProjects as $project)
            <li>{{ $project->name }}</li>
        @endforeach
    </ul>
@endif
                                          <!-- <span data-filter-by="text" class="text-body"></span>
   -->
                                      </div>
                                  </a>
                              </div>
                      </div>

                      <!--end of content list-->
                  </div>
              </div>
              <form class="modal fade" id="team-manage-modal" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title">Manage Team</h5>
                              <button type="button" class="close btn btn-round" data-dismiss="modal"
                                  aria-label="Close">
                                  <i class="material-icons">close</i>
                              </button>
                          </div>
                          <!--end of modal head-->
                          <ul class="nav nav-tabs nav-fill" role="tablist">
                              <li class="nav-item">
                                  <a class="nav-link active" id="team-manage-details-tab" data-toggle="tab"
                                      href="#team-manage-details" role="tab"
                                      aria-controls="team-manage-details" aria-selected="true">Details</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" id="team-manage-members-tab" data-toggle="tab"
                                      href="#team-manage-members" role="tab"
                                      aria-controls="team-manage-members" aria-selected="false">Members</a>
                              </li>
                          </ul>
                          <div class="modal-body">
                              <div class="tab-content">
                                  <div class="tab-pane fade show active" id="team-manage-details"
                                      role="tabpanel">
                                      <h6>Supervisor Details</h6>
                                      <div class="form-group row align-items-center">
                                          <label class="col-3">Name</label>
                                          <input class="form-control col" type="text"
                                              placeholder="Team name" name="team-name"
                                              value="Medium Rare" />
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-3">Username</label>
                                          <textarea class="form-control col" rows="3" placeholder="Team description" name="team-description">A small web studio crafting lovely template products.</textarea>
                                      </div>
                                  </div>
                                  <div class="tab-pane fade" id="team-manage-members" role="tabpanel">
                                      <div class="users-manage" data-filter-list="form-group-users">
                                          <div class="mb-3">
                                              <ul class="avatars text-center">
                                              </ul>
                                          </div>
                                          <div class="input-group input-group-round">
                                              <div class="input-group-prepend">
                                                  <span class="input-group-text">
                                                      <i class="material-icons">filter_list</i>
                                                  </span>
                                              </div>
                                              <input type="search" class="form-control filter-list-input"
                                                  placeholder="Filter supervisor"
                                                  aria-label="Filter Members">
                                          </div>

                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!--end of modal body-->
                      <div class="modal-footer">
                          <button role="button" class="btn btn-primary" type="submit">
                              Done
                          </button>
                      </div>
                  </div>
          </div>
       
      </div>
  
  </div>
</div>
</div>

</div>
</div>
</div>

<footer>
<p>&copy; 2023 Kanchan Chaudhary. All rights reserved.</p>
</footer>

<!-- Required vendor scripts (Do not remove) -->
<script src="{{ asset('js/frontend/jquery.min.js') }}"></script>
<script src="{{ asset('js/frontend/popper.min.js') }}"></script>
<script src="{{ asset('js/frontend/bootstrap.js') }}"></script>

<!-- Optional Vendor Scripts (Remove the plugin script here and comment initializer script out of index.js if site does not use that feature) -->
<!-- Autosize - resizes textarea inputs as user types -->
<script src="{{ asset('js/frontend/autosize.min.js') }}"></script>
<!-- Flatpickr (calendar/date/time picker UI) -->
<script src="{{ asset('js/frontend/flatpicker.min.js') }}"></script>
<!-- Prism - displays formatted code boxes -->
<script src="{{ asset('js/frontend/prism.js') }}"></script>
<!-- Shopify Draggable - drag, drop and sort items on page -->
<script src="{{ asset('js/frontend/draggable.bundle.legacy.js') }}"></script>
<script src="{{ asset('js/frontend/swap-animation.js') }}"></script>
<!-- Dropzone - drag and drop files onto the page for uploading -->
<script src="{{ asset('js/frontend/dropzone.min.js') }}"></script>
<!-- List.js - filter list elements -->
<script src="{{ asset('js/frontend/list.min.js') }}"></script>
<!-- Required theme scripts (Do not remove) -->
<script src="{{ asset('js/frontend/theme.js') }}"></script>
<!-- <script src="{{ asset('js/dashboard/projectcordinator.js') }}"></script> -->
<!-- Add this script tag to include Axios from a CDN -->
<script>
function validateSearch() {
  const searchInput = document.getElementById('searchInput');
  const searchTerm = searchInput.value.trim();

  if (searchTerm === '') {
      alert('Please enter a search term.');
      searchInput.focus();
      return;
  }

  // Perform the search here, you can use AJAX to send the search term to the server and fetch search results dynamically.
  // For demonstration purposes, we will use a simple client-side search.

  const projects = document.querySelectorAll('.card-project');
  const searchResultsContainer = document.getElementById('searchResultsContainer');
  searchResultsContainer.innerHTML = '';

  projects.forEach(project => {
      const projectName = project.querySelector('h5[data-filter-by="text"]').innerText.toLowerCase();
      if (projectName.includes(searchTerm.toLowerCase())) {
          searchResultsContainer.appendChild(project.cloneNode(true));
      }
  });
}
</script>


<script>
function updateStatus(status, projectId) {
  var form = document.getElementById('status-form-' + projectId);
  var statusInput = document.getElementById('status-input');
  if (form && statusInput) {
      statusInput.value = status;
      form.submit();
  }
  // console.log("Status:", status);
  // console.log("Project ID:", projectId);

  // You can also update the hidden input field with the selected status if needed.
  document.getElementById('status-input').value = status;
}
</script>

<!-- <script src="{{ asset('js/project.js') }}"></script> -->


<!-- Include the CSRF token in a JavaScript variable -->


<!-- This appears in the demo only - demonstrates different layouts -->
<style>
.layout-switcher {
  position: fixed;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%) translateY(73px);
  color: #fff;
  transition: all .35s ease;
  background: #343a40;
  border-radius: .25rem .25rem 0 0;
  padding: .75rem;
  z-index: 999;
}

.layout-switcher:not(:hover) {
  opacity: .95;
}

.layout-switcher:not(:focus) {
  cursor: pointer;
}

.layout-switcher-head {
  font-size: .75rem;
  font-weight: 600;
  text-transform: uppercase;
}

.layout-switcher-head i {
  font-size: 1.25rem;
  transition: all .35s ease;
}

.layout-switcher-body {
  transition: all .55s ease;
  opacity: 0;
  padding-top: .75rem;
  transform: translateY(24px);
  text-align: center;
}

.layout-switcher:focus {
  opacity: 1;
  outline: none;
  transform: translateX(-50%) translateY(0);
}

.layout-switcher:focus .layout-switcher-head i {
  transform: rotateZ(180deg);
  opacity: 0;
}

.layout-switcher:focus .layout-switcher-body {
  opacity: 1;
  transform: translateY(0);
}

.layout-switcher-option {
  width: 72px;
  padding: .25rem;
  border: 2px solid rgba(255, 255, 255, 0);
  display: inline-block;
  border-radius: 4px;
  transition: all .35s ease;
}

.layout-switcher-option.active {
  border-color: #007bff;
}

.layout-switcher-icon {
  width: 100%;
  border-radius: 4px;
}

.layout-switcher-body:hover .layout-switcher-option:not(:hover) {
  opacity: .5;
  transform: scale(0.9);
}

@media all and (max-width: 990px) {
  .layout-switcher {
      min-width: 250px;
  }
}

@media all and (max-width: 767px) {
  .layout-switcher {
      display: none;
  }
}
</style>
</body>

</html>
