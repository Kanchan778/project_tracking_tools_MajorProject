
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
                <a href="{{ route('student.projects.index') }}" class="nav-link">Dashboard</a>
            </li>
            
            
                          <li class="nav-item">
                          <a href="{{ route('student.student.innergroup') }}" class="nav-link">Your Group</a>
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
 
      <form action="{{ route('student.profile.update') }}" method="POST" enctype="multipart/form-data" id="profile-form" class="pro-form">
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
      <div class="main-container">

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-9">
              <section class="py-4 py-lg-5">
                <h1 class="display-4 mb-3">Your Group</h1>
                <div>
                    @if ($group)
                        <style>
                            table {
                                border-collapse: collapse;
                                width: 100%;
                                background-color: #fff;
                            }
                            th, td {
                                border: 1px solid rgb(141, 137, 137);
                                padding: 8px;
                            }
                            th {
                                font-weight: bold;
                            }
                        </style>
                        <table>
                            <tr>
                                <th>Group Name:</th>
                                <td>{{ $group->group_name }}</td>
                            </tr>
                            <tr>
                                <th>Project Type:</th>
                                <td>{{ $group->project_type }}</td>
                            </tr>
                            @if ($group->groupSupervisor)
                                <tr>
                                    <th>Assigned Supervisor:</th>
                                    <td>{{ $group->groupSupervisor->supervisor_username }}</td>
                                </tr>
                            @else
                                <tr>
                                    <th>Pitch:</th>
                                    <td>{{ $group->pitch }} <span style="color: red;">(Supervisor not assigned yet)</span></td>
                                </tr>
                            @endif
                            <!-- Add more fields as needed -->
                    
                            <!-- You can also loop through any related data if available, for example, group members -->
                            <tr>
                                <th>Group Members:</th>
                                <td>
                                    <ul>
                                        @foreach ($group->users as $user)
                                            <li>{{ $user->username }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    @else
                        <p>No group attached to the student.</p>
                    @endif
                </div>
                <br>
            
                <a href="#" class="custom-button"  data-toggle="modal" data-target="#assignRoleModal">Assign Role</a>
                <div class="modal fade" id="assignRoleModal" tabindex="-1" role="dialog" aria-labelledby="assignRoleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="assignRoleModalLabel">Assign Role</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <form method="post" action="{{ route('student.assign.roles') }}">
                                  @csrf
                                  @if ($group)
    <table class="table">
        <thead>
            <tr>
                <th>Username</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($group->users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>
                        <select name="roles[{{ $user->id }}][]" multiple>
                            <option value="">Frontend</option>
                            <option value="">Backend</option>
                            <option value="">Testing</option>
                            <option value="">Documentation</option>
                            <option value="">Leader</option>
                        </select>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No group found for the current student.</p>
@endif

                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Assign Roles</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              

              {{-- Edit Button, Upload Files, Isuues --}}
              <a href="#"  class="custom-button"  data-toggle="modal" data-target="#noteModal">Notes</a>
              <div class="modal fade" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="assignRoleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="assignRoleModalLabel">Create  Note</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <form
                          action="{{ route('student.innergroup.storeNote', ['groupId' => $group->id]) }}"
                          method="POST">
                          @csrf
                          <div class="modal-header">
                              <h5 class="modal-title">Create Note</h5>
                              <button type="button" class="close"
                                  data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <label for="note">Note:</label>
                              <textarea name="note" id="note" class="form-control" rows="4" required></textarea>
                              {{-- <label for="note">Created by:</label>
<input name="note" id="note" class="form-control" rows="4" required></input> --}}
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary"
                                  data-dismiss="modal">Cancel</button>
                              <button type="submit" class="btn btn-primary">Create
                                  Note</button>
                          </div>
                      </form>
                        
                        </div>
                    </div>
                </div>
            </div>

            <a href="#"  class="custom-button" data-toggle="modal" data-target="#uploadModal">Upload Files</a>
              <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="assignRoleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="assignRoleModalLabel">Upload Files</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="#">
                                @csrf
                              
                                <div class="form-group">
                                  <label for="file">Select File</label>
                                  <input type="file" name="file" id="file" class="form-control">
                              </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- your_view_name.blade.php -->
            <div class="custom-card">
<h6>Tasks</h6>
<div>
    @if ($group->notes->isEmpty())
        <p>Nothing found here</p>
    @else
        <ul>
            @foreach ($group->notes as $note)
                <li>{{ $note->note }} - {{ $note->created_by }}</li>
            @endforeach
        </ul>
    @endif
</div>
            </div>

            </section>
            
            </div>
          </div>
        </div>
</div>
      </div>
    </div>

    <footer>
        <p>&copy; 2023 Kanchan Chaudhary. All rights reserved.</p>-->
      </footer>

    <!-- Required vendor scripts (Do not remove) -->
    <script type="text/javascript" src="{{ asset('js/frontend/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/frontend/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/frontend/bootstrap.js') }}"></script>

    <!-- Optional Vendor Scripts (Remove the plugin script here and comment initializer script out of index.js if site does not use that feature) -->

    <!-- Autosize - resizes textarea inputs as user types -->
    <script type="text/javascript" src="{{ asset('js/frontend/autosize.min.js') }}"></script>
    <!-- Flatpickr (calendar/date/time picker UI) -->
    <script type="text/javascript" src="{{ asset('js/frontend/flatpicker.min.js') }}"></script>
    <!-- Prism - displays formatted code boxes -->
    <script type="text/javascript" src="{{ asset('js/frontend/prism.js') }}"></script>
    <!-- Shopify Draggable - drag, drop and sort items on page -->
    <script type="text/javascript" src="{{ asset('js/frontend/draggable.bundle.legacy.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/frontend/swap-animation.js') }}"></script>
    <!-- Dropzone - drag and drop files onto the page for uploading -->
    <script type="text/javascript" src="{{ asset('js/frontend/dropzone.min.js') }}"></script>
    <!-- List.js - filter list elements -->
    <script type="text/javascript" src="{{ asset('js/frontend/list.min.js') }}"></script>

    <!-- Required theme scripts (Do not remove) -->
    <script type="text/javascript" src="{{ asset('js/frontend/theme.js') }}"></script>
      <!-- Cordinator js-->
      <script src="{{ asset('js/dashboard/projectcordinator.js') }}"></script>

    <!-- This appears in the demo only - demonstrates different layouts -->
    <style type="text/css">
      .custom-button {
    display: inline-block;
    padding: 8px 16px;
    background-color: #255fb6;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    border: none;
    cursor: pointer;
    margin-left: 15px;
    margin-top: 20px;
    transition: background-color 0.3s ease;
  }

  /* Hover effect */
  .custom-button:hover {
    background-color: #0056b3;
  }
  .custom-card {
    background-color: #f8f9fa;
    border: 1px solid #ced4da;
    border-radius: 4px;
    padding: 16px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-top: 60px;
  }

  .custom-card h6 {
    margin-bottom: 12px;
    font-weight: bold;
    color: #007bff;
  }

  .custom-card ul {
    margin: 0;
    padding: 0;
    list-style: none;
  }

  .custom-card li {
    margin-bottom: 8px;
    color: #333;
  }

  .custom-card p {
    margin: 0;
    color: #777;
  }
      .layout-switcher{ position: fixed; bottom: 0; left: 50%; transform: translateX(-50%) translateY(73px); color: #fff; transition: all .35s ease; background: #343a40; border-radius: .25rem .25rem 0 0; padding: .75rem; z-index: 999; }
            .layout-switcher:not(:hover){ opacity: .95; }
            .layout-switcher:not(:focus){ cursor: pointer; }
            .layout-switcher-head{ font-size: .75rem; font-weight: 600; text-transform: uppercase; }
            .layout-switcher-head i{ font-size: 1.25rem; transition: all .35s ease; }
            .layout-switcher-body{ transition: all .55s ease; opacity: 0; padding-top: .75rem; transform: translateY(24px); text-align: center; }
            .layout-switcher:focus{ opacity: 1; outline: none; transform: translateX(-50%) translateY(0); }
            .layout-switcher:focus .layout-switcher-head i{ transform: rotateZ(180deg); opacity: 0; }
            .layout-switcher:focus .layout-switcher-body{ opacity: 1; transform: translateY(0); }
            .layout-switcher-option{ width: 72px; padding: .25rem; border: 2px solid rgba(255,255,255,0); display: inline-block; border-radius: 4px; transition: all .35s ease; }
            .layout-switcher-option.active{ border-color: #007bff; }
            .layout-switcher-icon{ width: 100%; border-radius: 4px; }
            .layout-switcher-body:hover .layout-switcher-option:not(:hover){ opacity: .5; transform: scale(0.9); }
            @media all and (max-width: 990px){ .layout-switcher{ min-width: 250px; } }
            @media all and (max-width: 767px){ .layout-switcher{ display: none; } }
    </style>
    <div class="layout-switcher" tabindex="1">
      <div class="layout-switcher-head d-flex justify-content-between">
        <span>Select Layout</span>
        <i class="material-icons">arrow_drop_up</i>
      </div>
      <div class="layout-switcher-body">

      </div>
    </div>

  </body>

</html>