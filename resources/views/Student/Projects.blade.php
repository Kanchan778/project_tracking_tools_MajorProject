<!doctype html>
<html lang="en">
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
    <link href="{{ asset('css/frontend/theme.css') }}"  rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard/student.css') }}">
</head>
<body>
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
                                <i class="fas fa-plus"></i>
                            </label>
                            <input type="file" id="avatar-input" style="display: none;">
                        </div>
                        <div class="profile-name" id="username-placeholder"></div>
                    </div>
                    <div class="username text-center">
                        <h4><strong>{{ Auth::user()->username }}</strong></h4>
                    </div>
                   <div>
                    <button class="edit-profile-button">Edit Profile</button>
                    <div id="edit-profile-form" style="display: none;">
  <form id="edit-profile" action="{{ route('projectCoordinator.profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
<input type="file" id="avatar-input" style="display: none;">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="{{ $user->username }}" required>
    
    <button type="submit">Save</button>
  </form>
</div>


</div>
                        
                </ul>
                <hr>
                <div class="d-none d-lg-block w-100">
                    <span class="text-small text-muted">Quick Links</span>
                    <ul class="nav nav-small flex-column mt-2">
                        <li class="nav-item">
                            <a href="{{ route('student.projects.index') }}" class="nav-link">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('student.student.group') }}" class="nav-link">Group</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="{{ route('projectCoordinator.nav-side-task') }}" class="nav-link">Single Task</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('projectCoordinator.nav-side-kanban-board') }}" class="nav-link">Account Setting</a>
                        </li> -->
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
   
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">
              <div class="page-header">     
                <div class="d-flex align-items-center">
                  <ul class="avatars">
<!-- all users profilepic should be display here-->
                  </ul>
                  <button class="btn btn-round flex-shrink-0" data-toggle="modal" data-target="#user-invite-modal">
                    <i class="material-icons">add</i>
                  </button>
                </div>
              </div>
              <hr>
              <ul class="nav nav-tabs nav-fill" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#projects" role="tab" aria-controls="projects" aria-selected="true">Your Projects</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#members" role="tab" aria-controls="members" aria-selected="false">All Projects</a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="projects" role="tabpanel" data-filter-list="content-list-body">
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
                          <input type="search" class="form-control filter-list-input" placeholder="Filter projects" aria-label="Filter Projects">
                        </div>
                      </form>
                    </div>
                    <!--end of content list head-->
                    <div class="content-list-body row">
 

 <!--end of content list head-->
 <div class="content-list-body row">
   <!-- display project from student that is project title -->


   @foreach ($user->projects as $project)
    <div class="col-lg-6">
      <div class="card card-project">
        <div class="progress">
          <div class="progress-bar bg-danger" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="card-body">
        
          </div>
          <div class="card-title">
            <a href="#"><h5 data-filter-by="text">{{ $project->project_type }}</h5></a>
          </div>
          <ul class="avatars">
            <li>
              <a href="#" data-toggle="tooltip" title="Claire">
                <img alt="Claire Connors" class="avatar" src="assets/img/avatar-female-1.jpg" data-filter-by="alt" />
              </a>
            </li>
          </ul>
          <div class="card-meta d-flex justify-content-between">
    <div class="d-flex align-items-center">
        <i class="material-icons mr-1">playlist_add_check</i>
        <span class="text-small">{{ $project->remainingDays }} days remaining for due date</span>
          
    </div>
</div>

        </div>
      </div>
    </div>
  @endforeach

</div>
</div>
</div>


                   
</div>    </div>
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



