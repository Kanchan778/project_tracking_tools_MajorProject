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
                <a href="{{ route('supervisor.projects') }}" class="nav-link">Project </a>
              </li>
{{--              
              <li class="nav-item">
                <a href="{{ route('projectCoordinator.nav-side-task') }}"class="nav-link"></a>
            
           
              </li> --}}
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
      <div class="main-container">

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-9">
              <section class="py-4 py-lg-5">
               
                <style>
                  p {
                      font-size: 20px;
                  }
          
                  .container {
                      background-color: rgb(250, 249, 249);
                      width: 80%;
                      border-radius: 15px;
                  }
          
                  .progress-bar {
                      background-color: rgb(192, 192, 192);
                      height: 30px;
                      border-radius: 15px;
                      position: relative;
                      margin-bottom: 20px;
                  }
                  .progress1{
                    margin-left: 200px;
                    margin-bottom: 50px;
                  }
          
                  .progress-bar .status {
                      background-color: rgb(116, 194, 92);
                      color: white;
                      padding: 1%;
                      text-align: center;
                      font-size: 20px;
                      border-radius: 15px;
                      position: absolute;
                      top: 0;
                      left: 0;
                      width: 0;
                      height: 100%;
                      transition: width 0.5s ease;
                  }
          .bar-super{
            font-size: 20px;
          }
                  .concept {
                      width: 100%;
                  }
          
                  .proposal {
                      width: 100%;
                  }
          
                  .report {
                      width: 100%;
                  }
          
                  .code {
                      width: 100%;
                  }
              </style>
          </head>
          <body>
            <h2 class="progress1">Progress Bar</h2>
              <label class="checkbox-super">
                  <input type="checkbox" name="checkbox1" onclick="toggleItem('concept')"> Concept Paper
              </label>
          
              <label  class="checkbox-super">
                  <input type="checkbox" name="checkbox2" onclick="toggleItem('proposal')"> Proposal
              </label>
          
              <label  class="checkbox-super">
                  <input type="checkbox" name="checkbox3" onclick="toggleItem('report')"> Report
              </label>
          
              <label  class="checkbox-super">
                  <input type="checkbox" name="checkbox4" onclick="toggleItem('code')"> Source Code
              </label>

          
              <p class="bar-super">Concept Paper</p>
              <div class="container concept" id="conceptContainer">
                  <div class="progress-bar">
                      <div class="status concept-paper" id="conceptStatus">100%</div>
                  </div>
              </div>
          
              <p>Proposal</p>
              <div class="container proposal" id="proposalContainer">
                  <div class="progress-bar">
                      <div class="status proposal-paper" id="proposalStatus">100%</div>
                  </div>
              </div>
          
              
              <p>Report</p>
              <div class="container report" id="reportContainer">
                  <div class="progress-bar">
                      <div class="status report-paper" id="reportStatus">100%</div>
                  </div>
              </div>
          
              <p>Source Code</p>
              <div class="container code" id="codeContainer">
                  <div class="progress-bar">
                      <div class="status code-paper" id="codeStatus">100%</div>
                  </div>
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
        <p>&copy; 2023 Kanchan Chaudhary. All rights reserved.</p>
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


      <script>
        function toggleItem(itemName) {
            const itemContainer = document.querySelector(`#${itemName}Container`);
            const itemStatus = document.querySelector(`#${itemName}Status`);
            if (itemContainer.style.display === 'none' || itemContainer.style.display === '') {
                itemContainer.style.display = 'block';
                setTimeout(() => {
                    itemStatus.style.width = '100%';
                }, 10);
            } else {
                itemStatus.style.width = '0';
                setTimeout(() => {
                    itemContainer.style.display = 'none';
                }, 500);
            }
        }
    </script>

    <!-- This appears in the demo only - demonstrates different layouts -->
    <style type="text/css">
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