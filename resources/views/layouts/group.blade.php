@php
    use App\Models\User;

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
    <link rel="stylesheet" href="https://cdn.syncfusion.com/ej2/material.css" />
<link rel="stylesheet" href="https://cdn.syncfusion.com/ej2/material.css" />

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
   
    <img class="avatar-label" src="{{asset(auth()->user()->profile_img ?: $defaultImage )}}"  alt="Profile Image">
       
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
                <a href="{{ route('projectCoordinator.dashboard') }}" class="nav-link">Dashboard</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('projectCoordinator.project') }}" class="nav-link">Project Overview</a>
              </li>
              <li class="nav-item">
              <a href="{{ route('projectCoordinator.sidebartask') }}" class="nav-link">Task</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('projectCoordinator.groups.index') }}"class="nav-link">Group</a>
              </li>
              <li class="nav-item">
              <a href="{{ route('projectCoordinator.evaluation') }}"class="nav-link">Change Password</a>
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
 
      <form action="{{ route('projectCoordinator.profile.update') }}" method="POST" enctype="multipart/form-data" id="profile-form" class="pro-form">
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
   
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">
              <div class="page-header">     
                <div class="d-flex align-items-center">
                  <ul class="avatars">
<!-- all users profilepic should be display here-->
                  </ul>
                  <!-- <button class="btn btn-round flex-shrink-0" data-toggle="modal" data-target="#user-invite-modal">
                    <i class="material-icons">add</i>
                  </button> -->
                </div>
              </div>
              <hr>
              <ul class="nav nav-tabs nav-fill" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#projects" role="tab" aria-controls="projects" aria-selected="true">Group</a>
                </li>

              </ul>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="projects" role="tabpanel" data-filter-list="content-list-body">
                  <div class="content-list">
                    <div class="row content-list-head">
                      <div class="col-auto">
                        <h3>Group</h3>
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
                       @foreach ($groups as $group)
                      <div class="col-lg-6">
                        <div class="card2 card-project">
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar"
                                    style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                            <div class="card-body">
                                <div class="dropdown card-options">
                   
                        </div>
                        <div>

                        </div>
                        </div><!-- display created group here -->   
                        <ul>
                           
                                <li>
                                    <strong>Project Type:</strong> {{ $group->project_type }}
                                    {{ $group->group_name }}
                                    <br>
                                    <strong>Pitch:</strong> {{ $group->pitch }}
                                    <br>
                                    <strong>Members:</strong>
                                    <ul>
                                      @foreach ($group->users as $user)
                                      <li>{{ $user->username }}</li>
                                  @endforeach
                                    </ul>
                                </li>
                           
                        </ul>
                  
                
</div>
</div>
 <div class="dropdown">
     <!-- Add this code for the modal popup form -->
<div class="modal fade" id="assignSupervisorModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <form action="{{ route('projectCoordinator.group', $group->id) }}" method="post">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Assign Supervisor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label for="supervisor">Select Supervisor:</label>
          <select name="supervisor" id="supervisor" class="form-control">
            @foreach ($supervisors as $supervisor)
              <option value="{{ $supervisor->username }}">{{ $supervisor->username }}</option>
            @endforeach
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Assign Supervisor</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal popup for Create Note -->
<div class="modal fade" id="createNoteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('projectCoordinator.group', $group->id) }}" method="post">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Create Note</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <label for="note">Note:</label>
          <textarea name="note" id="note" class="form-control" rows="4" required></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Create Note</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modify the "Assign Supervisor" link to open the modal popup form -->
@foreach ($groups as $group)
<div class="col-lg-6">
  <div class="card2 card-project">
    <!-- ... other card content ... -->
    <div class="dropdown">
      <button class="btn-options1" type="button" id="cardlist-dropdown-button-{{ $group->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="material-icons">more_vert</i>
      </button>
      <div class="dropdown-menu dropdown-menu-right">
        <!-- Add a data attribute for group_id to identify which group to assign the supervisor to -->
        <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#assignSupervisorModal" data-group-id="{{ $group->id }}">Assign Supervisor</a>
        
        <!-- Add a data attribute for group_id to identify which group to create a note for -->
        <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#createNoteModal" data-group-id="{{ $group->id }}">Create Note</a>
        <!-- Other dropdown menu items -->
      </div>
    </div>
    <!-- ... other card content ... -->
  </div>
</div>
@endforeach

               
</div>
<!-- </div> --> @endforeach
                    <!--end of content list body-->
                  </div>
                </div>
                 
                  <!--end of content list-->
                </div>
                <!--end of tab-->
                <div class="tab-pane fade" id="members" role="tabpanel" data-filter-list="content-list-body">
                  <div class="content-list">
                    <div class="row content-list-head">
                      <div class="col-auto">
                        <h3>Group Members</h3>
                        <!-- <button class="btn btn-round" data-toggle="modal" data-target="#user-invite-modal">
                          <i class="material-icons">add</i>
                        </button> -->
                      </div>
                      <form class="col-md-auto">
                        <div class="input-group input-group-round">
                          <div class="input-group-prepend">
                          <div class="input-group">
  <span class="input-group-text">
    <i class="material-icons">filter_list</i>
  </span>
  <input type="search" class="form-control filter-list-input" placeholder="Filter supervisor" aria-label="Filter Members">
</div>
 </div>
                      </form>   
                    </div>
                    <!--end of content list head-->
                    <div class="content-list-body row">
    <!-- group members display -->
</div>

                  <!--end of content list-->
                </div>
              </div>
              
              <form class="modal fade" id="team-manage-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <!--end of modal head-->
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="team-manage-details-tab" data-toggle="tab" href="#team-manage-details" role="tab" aria-controls="team-manage-details" aria-selected="true">Details</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="team-manage-members-tab" data-toggle="tab" href="#team-manage-members" role="tab" aria-controls="team-manage-members" aria-selected="false">Members</a>
                      </li>
                    </ul>
                    
                    </div>
                    <!--end of modal body-->
                    <div class="modal-footer">
                      <button role="button" class="btn btn-primary" type="submit">
                        Done
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            
          
          </div>
        </div>
    </div>  

</div>
  @if(session('success'))
    <div class="success-message">{{ session('success') }}</div>
  @endif
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
<!-- groupjs -->
<script src="{{ asset('js/student/group.js') }}"></script>


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



