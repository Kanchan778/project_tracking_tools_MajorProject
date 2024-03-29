@php
    use App\Models\User;
@endphp

<!doctype html>
<html lang="en">


<!-- Mirrored from pipeline.mediumra.re/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jul 2023 08:23:11 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-52115242-14"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse"
                    aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="d-block d-lg-none ml-2">
                    <div class="dropdown">
                        <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
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

                                <img class="avatar-label"
                                    src="{{ asset(auth()->user()->profile_img ?: $defaultImage) }}"
                                    alt="Profile Image">

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
                            <input type="search" class="form-control form-control-dark" placeholder="Search"
                                aria-label="Search app">
                        </div>
                    </form>
                    <div class="dropdown mt-2">
                        <button class="btn btn-primary btn-block dropdown-toggle" type="button"
                            id="newContentButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

                    <form id="logout-form" action="{{ route('projectCoordinator.logout') }}" method="POST"
                        style="display: none;">
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

                <form action="{{ route('projectCoordinator.profile.update') }}" method="POST"
                    enctype="multipart/form-data" id="profile-form" class="pro-form">
                    @csrf
                    <!-- Your existing form fields -->
                    <i class="fas fa-times" id="close-icon">
                        <button type="submit" class="proclose">X</button>
                    </i>
                    <input type="file" id="avatar-input" name="profile_img" style="display: none;">
                    <div class="profile-avatar">
                        <label for="avatar-input">
                            <i class="fas fa-plus" id="upload-icon"></i>
                            @if (Auth::user()->prodile_img)
                                <img class="avatar-label" src="{{ asset(Auth::user()->profile_img) }}"
                                    id="avatar-preview" alt="Profile Image">
                            @else
                                <img class="avatar-label" src="{{ asset('img/profile.png') }}" id="avatar-preview"
                                    alt="Default Profile Image">
                            @endif
                        </label>
                    </div>
                    <div class="pro-field">
                        <label for="new-username">Username:</label>
                        <input type="text" id="new-username" name="new_username"
                            value="{{ Auth::user()->username }}" required>
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
                        <h1></h1>
                        <p class="lead">Tasks</p>
                        <div class="d-flex align-items-center">
                            {{-- <ul class="avatars">

                                <li>
                                    <a href="#" data-toggle="tooltip" data-placement="top"
                                        title="David Whittaker">
                                        <img alt="David Whittaker" class="avatar"
                                            src="assets/img/avatar-male-4.jpg" />
                                    </a>
                                </li>

                            </ul> --}}
                           
                        </div>
                        <div>
                            <div class="progress">
                                <div class="progress-bar bg-success" style="width:25%;"></div>
                            </div>
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
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tasks" role="tab"
                                aria-controls="tasks" aria-selected="true">Tasks</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tasks" role="tabpanel"
                            data-filter-list="card-list-body">
                            <div class="row content-list-head">
                                <div class="col-auto">
                                    <h3>Tasks</h3>
                                    <button class="btn btn-round" data-toggle="modal" data-target="#task-add-modal">
                                        <i class="material-icons">add</i>
                                    </button>
                                </div>
                                <form class="col-md-auto">
                                    <div class="input-group input-group-round">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">filter_list</i>
                                            </span>
                                        </div>
                                        <input type="search" class="form-control filter-list-input"
                                            placeholder="Filter tasks" aria-label="Filter Tasks">
                                    </div>
                                </form>
                            </div>
                            <!--end of content list head-->

                            <div class="content-list-body">
                                @foreach ($projectsWithTasks as $project)
                                    @foreach ($project->tasks as $task)
                                        <div class="card card-task">
                                            <div class="card-list">
                                                <div class="card-list-head">
                                                    <h2>{{ $project->project_name }}</h2>

                                                    <div class="dropdown">
                                                        <button class="btn-options" type="button"
                                                            id="cardlist-dropdown-button-3" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                            <i class="material-icons">more_vert</i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Rename</a>
                                                            <a class="dropdown-item text-danger"
                                                                href="#">Archive</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-list-body">
                                                    <h6>{{ $task->name }}</h6>
                                                    <div class="card card-task">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 0%" aria-valuenow="25"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="card-title">
                                                                <a href="#">
                                                                    <h6 data-filter-by="text">{{ $task->description }}
                                                                    </h6>
                                                                </a>
                                                                {{-- <span class="text-small">Unscheduled</span> --}}
                                                            </div>
                                                            <div class="card-meta">
                                                                
                                                                <div class="d-flex align-items-center">
                                                                    <i class="material-icons">playlist_add_check</i>
                                                                    <span>-/-</span>
                                                                </div>
                                                                <div class="dropdown card-options">
                                                                    <button class="btn-options" type="button"
                                                                        id="task-dropdown-button-7"
                                                                        data-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false">
                                                                        <i class="material-icons">more_vert</i>
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="#">Mark
                                                                            as done</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item text-danger"
                                                                            href="#">Archive</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach



                            </div>
                        </div>
                        <!--end of content list body-->
                    </div>
                    <!--end of content list-->
                </div>
                <!--end of tab-->
                <div class="tab-pane fade" id="files" role="tabpanel" data-filter-list="dropzone-previews">
                    <div class="content-list">
                        <div class="row content-list-head">
                            <div class="col-auto">
                                <h3>Files</h3>
                            </div>
                            <form class="col-md-auto">
                                <div class="input-group input-group-round">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">filter_list</i>
                                        </span>
                                    </div>
                                    <input type="search" class="form-control filter-list-input"
                                        placeholder="Filter files" aria-label="Filter Tasks">
                                </div>
                            </form>
                        </div>
                        <!--end of content list head-->
                        <div class="content-list-body row">
                            <div class="col">
                                <ul class="d-none dz-template">
                                    <li class="list-group-item dz-preview dz-file-preview">
                                        <div class="media align-items-center dz-details">
                                            <ul class="avatars">
                                                <li>
                                                    <div class="avatar bg-primary dz-file-representation">
                                                        <i class="material-icons">attach_file</i>
                                                    </div>
                                                </li>
                                                <li>
                                                    <img alt="David Whittaker" src="assets/img/avatar-male-4.jpg"
                                                        class="avatar" data-title="David Whittaker"
                                                        data-toggle="tooltip" />
                                                </li>
                                            </ul>
                                            <div class="media-body d-flex justify-content-between align-items-center">
                                                <div class="dz-file-details">
                                                    <a href="#" class="dz-filename">
                                                        <span data-dz-name></span>
                                                    </a>
                                                    <br>
                                                    <span class="text-small dz-size" data-dz-size></span>
                                                </div>
                                                <img alt="Loader" src="assets/img/loader.svg" class="dz-loading" />
                                                <div class="dropdown">
                                                    <button class="btn-options" type="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="material-icons">more_vert</i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">Download</a>
                                                        <a class="dropdown-item" href="#">Share</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item text-danger" href="#"
                                                            data-dz-remove>Delete</a>
                                                    </div>
                                                </div>
                                                <button class="btn btn-danger btn-sm dz-remove" data-dz-remove>
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                        <div class="progress dz-progress">
                                            <div class="progress-bar dz-upload" data-dz-uploadprogress></div>
                                        </div>
                                    </li>
                                </ul>
                                <form class="dropzone" action="https://mediumra.re/dropzone/upload.php">
                                    <span class="dz-message">Drop files here or click here to upload</span>
                                </form>

                                <ul class="list-group list-group-activity dropzone-previews flex-column-reverse">

                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <ul class="avatars">
                                                <li>
                                                    <div class="avatar bg-primary">
                                                        <i class="material-icons">insert_drive_file</i>
                                                    </div>
                                                </li>
                                                <li>
                                                    <img alt="Peggy Brown" src="assets/img/avatar-female-2.jpg"
                                                        class="avatar" data-title="Peggy Brown" data-toggle="tooltip"
                                                        data-filter-by="data-title" />
                                                </li>
                                            </ul>
                                            <div class="media-body d-flex justify-content-between align-items-center">
                                                <div>
                                                    <a href="#" data-filter-by="text">client-questionnaire</a>
                                                    <br>
                                                    <span class="text-small" data-filter-by="text">48kb Text
                                                        Doc</span>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn-options" type="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="material-icons">more_vert</i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">Download</a>
                                                        <a class="dropdown-item" href="#">Share</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item text-danger" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <ul class="avatars">
                                                <li>
                                                    <div class="avatar bg-primary">
                                                        <i class="material-icons">folder</i>
                                                    </div>
                                                </li>
                                                <li>
                                                    <img alt="Harry Xai" src="assets/img/avatar-male-2.jpg"
                                                        class="avatar" data-title="Harry Xai" data-toggle="tooltip"
                                                        data-filter-by="data-title" />
                                                </li>
                                            </ul>
                                            <div class="media-body d-flex justify-content-between align-items-center">
                                                <div>
                                                    <a href="#" data-filter-by="text">moodboard_images</a>
                                                    <br>
                                                    <span class="text-small" data-filter-by="text">748kb ZIP</span>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn-options" type="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="material-icons">more_vert</i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">Download</a>
                                                        <a class="dropdown-item" href="#">Share</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item text-danger" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="media align-items-center">
                                            <ul class="avatars">
                                                <li>
                                                    <div class="avatar bg-primary">
                                                        <i class="material-icons">image</i>
                                                    </div>
                                                </li>
                                                <li>
                                                    <img alt="Ravi Singh" src="assets/img/avatar-male-3.jpg"
                                                        class="avatar" data-title="Ravi Singh" data-toggle="tooltip"
                                                        data-filter-by="data-title" />
                                                </li>
                                            </ul>
                                            <div class="media-body d-flex justify-content-between align-items-center">
                                                <div>
                                                    <a href="#" data-filter-by="text">possible-hero-image</a>
                                                    <br>
                                                    <span class="text-small" data-filter-by="text">1.2mb JPEG
                                                        image</span>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn-options" type="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="material-icons">more_vert</i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">Download</a>
                                                        <a class="dropdown-item" href="#">Share</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item text-danger" href="#">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                 

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--end of content list-->
                </div>
                <div class="tab-pane fade" id="activity" role="tabpanel" data-filter-list="list-group-activity">
                    <div class="content-list">
                        <div class="row content-list-head">
                            <div class="col-auto">
                                <h3>Activity</h3>
                            </div>
                            <form class="col-md-auto">
                                <div class="input-group input-group-round">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">filter_list</i>
                                        </span>
                                    </div>
                                    <input type="search" class="form-control filter-list-input"
                                        placeholder="Filter activity" aria-label="Filter activity">
                                </div>
                            </form>
                        </div>
                        <!--end of content list head-->
                        <div class="content-list-body">
                            <ol class="list-group list-group-activity">

                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <ul class="avatars">
                                            <li>
                                                <div class="avatar bg-primary">
                                                    <i class="material-icons">playlist_add_check</i>
                                                </div>
                                            </li>
                                            <li>
                                                <img alt="Claire" src="assets/img/avatar-female-1.jpg"
                                                    class="avatar" data-filter-by="alt" />
                                            </li>
                                        </ul>
                                        <div class="media-body">
                                            <div>
                                                <span class="h6" data-filter-by="text">Claire</span>
                                                <span data-filter-by="text">completed the task</span><a href="#"
                                                    data-filter-by="text">Set up client chat channel</a>
                                            </div>
                                            <span class="text-small" data-filter-by="text">Just now</span>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <ul class="avatars">
                                            <li>
                                                <div class="avatar bg-primary">
                                                    <i class="material-icons">person_add</i>
                                                </div>
                                            </li>
                                            <li>
                                                <img alt="Ravi" src="assets/img/avatar-male-3.jpg" class="avatar"
                                                    data-filter-by="alt" />
                                            </li>
                                        </ul>
                                        <div class="media-body">
                                            <div>
                                                <span class="h6" data-filter-by="text">Ravi</span>
                                                <span data-filter-by="text">joined the project</span>
                                            </div>
                                            <span class="text-small" data-filter-by="text">5 hours ago</span>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <ul class="avatars">
                                            <li>
                                                <div class="avatar bg-primary">
                                                    <i class="material-icons">playlist_add</i>
                                                </div>
                                            </li>
                                            <li>
                                                <img alt="Kristina" src="assets/img/avatar-female-4.jpg"
                                                    class="avatar" data-filter-by="alt" />
                                            </li>
                                        </ul>
                                        <div class="media-body">
                                            <div>
                                                <span class="h6" data-filter-by="text">Kristina</span>
                                                <span data-filter-by="text">added the task</span><a href="#"
                                                    data-filter-by="text">Produce broad concept directions</a>
                                            </div>
                                            <span class="text-small" data-filter-by="text">Yesterday</span>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <ul class="avatars">
                                            <li>
                                                <div class="avatar bg-primary">
                                                    <i class="material-icons">playlist_add</i>
                                                </div>
                                            </li>
                                            <li>
                                                <img alt="Marcus" src="assets/img/avatar-male-1.jpg" class="avatar"
                                                    data-filter-by="alt" />
                                            </li>
                                        </ul>
                                        <div class="media-body">
                                            <div>
                                                <span class="h6" data-filter-by="text">Marcus</span>
                                                <span data-filter-by="text">added the task</span><a href="#"
                                                    data-filter-by="text">Present concepts and establish direction</a>
                                            </div>
                                            <span class="text-small" data-filter-by="text">Yesterday</span>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <ul class="avatars">
                                            <li>
                                                <div class="avatar bg-primary">
                                                    <i class="material-icons">person_add</i>
                                                </div>
                                            </li>
                                            <li>
                                                <img alt="Sally" src="assets/img/avatar-female-3.jpg"
                                                    class="avatar" data-filter-by="alt" />
                                            </li>
                                        </ul>
                                        <div class="media-body">
                                            <div>
                                                <span class="h6" data-filter-by="text">Sally</span>
                                                <span data-filter-by="text">joined the project</span>
                                            </div>
                                            <span class="text-small" data-filter-by="text">2 days ago</span>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <ul class="avatars">
                                            <li>
                                                <div class="avatar bg-primary">
                                                    <i class="material-icons">date_range</i>
                                                </div>
                                            </li>
                                            <li>
                                                <img alt="Claire" src="assets/img/avatar-female-1.jpg"
                                                    class="avatar" data-filter-by="alt" />
                                            </li>
                                        </ul>
                                        <div class="media-body">
                                            <div>
                                                <span class="h6" data-filter-by="text">Claire</span>
                                                <span data-filter-by="text">rescheduled the task</span><a
                                                    href="#" data-filter-by="text">Target market trend
                                                    analysis</a>
                                            </div>
                                            <span class="text-small" data-filter-by="text">2 days ago</span>
                                        </div>
                                    </div>
                                </li>

                                <li class="list-group-item">
                                    <div class="media align-items-center">
                                        <ul class="avatars">
                                            <li>
                                                <div class="avatar bg-primary">
                                                    <i class="material-icons">add</i>
                                                </div>
                                            </li>
                                            <li>
                                                <img alt="David" src="assets/img/avatar-male-4.jpg" class="avatar"
                                                    data-filter-by="alt" />
                                            </li>
                                        </ul>
                                        <div class="media-body">
                                            <div>
                                                <span class="h6" data-filter-by="text">David</span>
                                                <span data-filter-by="text">started the project</span>
                                            </div>
                                            <span class="text-small" data-filter-by="text">12 days ago</span>
                                        </div>
                                    </div>
                                </li>

                            </ol>
                        </div>
                    </div>
                    <!--end of content list-->
                </div>
            </div>
            <form class="modal fade" id="user-manage-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Manage Users</h5>
                            <button type="button" class="close btn btn-round" data-dismiss="modal"
                                aria-label="Close">
                                <i class="material-icons">close</i>
                            </button>
                        </div>
                        <!--end of modal head-->
                        <div class="modal-body">
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
                                        placeholder="Filter members" aria-label="Filter Members">
                                </div>
                                <div class="form-group-users">

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="user-manage-1"
                                            checked>
                                        <label class="custom-control-label" for="user-manage-1">
                                            <span class="d-flex align-items-center">
                                                <img alt="Claire Connors" src="assets/img/avatar-female-1.jpg"
                                                    class="avatar mr-2" />
                                                <span class="h6 mb-0" data-filter-by="text">Claire Connors</span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="user-manage-2"
                                            checked>
                                        <label class="custom-control-label" for="user-manage-2">
                                            <span class="d-flex align-items-center">
                                                <img alt="Marcus Simmons" src="assets/img/avatar-male-1.jpg"
                                                    class="avatar mr-2" />
                                                <span class="h6 mb-0" data-filter-by="text">Marcus Simmons</span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="user-manage-3"
                                            checked>
                                        <label class="custom-control-label" for="user-manage-3">
                                            <span class="d-flex align-items-center">
                                                <img alt="Peggy Brown" src="assets/img/avatar-female-2.jpg"
                                                    class="avatar mr-2" />
                                                <span class="h6 mb-0" data-filter-by="text">Peggy Brown</span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="user-manage-4"
                                            checked>
                                        <label class="custom-control-label" for="user-manage-4">
                                            <span class="d-flex align-items-center">
                                                <img alt="Harry Xai" src="assets/img/avatar-male-2.jpg"
                                                    class="avatar mr-2" />
                                                <span class="h6 mb-0" data-filter-by="text">Harry Xai</span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="user-manage-5">
                                        <label class="custom-control-label" for="user-manage-5">
                                            <span class="d-flex align-items-center">
                                                <img alt="Sally Harper" src="assets/img/avatar-female-3.jpg"
                                                    class="avatar mr-2" />
                                                <span class="h6 mb-0" data-filter-by="text">Sally Harper</span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="user-manage-6">
                                        <label class="custom-control-label" for="user-manage-6">
                                            <span class="d-flex align-items-center">
                                                <img alt="Ravi Singh" src="assets/img/avatar-male-3.jpg"
                                                    class="avatar mr-2" />
                                                <span class="h6 mb-0" data-filter-by="text">Ravi Singh</span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="user-manage-7">
                                        <label class="custom-control-label" for="user-manage-7">
                                            <span class="d-flex align-items-center">
                                                <img alt="Kristina Van Der Stroem"
                                                    src="assets/img/avatar-female-4.jpg" class="avatar mr-2" />
                                                <span class="h6 mb-0" data-filter-by="text">Kristina Van Der
                                                    Stroem</span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="user-manage-8">
                                        <label class="custom-control-label" for="user-manage-8">
                                            <span class="d-flex align-items-center">
                                                <img alt="David Whittaker" src="assets/img/avatar-male-4.jpg"
                                                    class="avatar mr-2" />
                                                <span class="h6 mb-0" data-filter-by="text">David Whittaker</span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="user-manage-9">
                                        <label class="custom-control-label" for="user-manage-9">
                                            <span class="d-flex align-items-center">
                                                <img alt="Kerri-Anne Banks" src="assets/img/avatar-female-5.jpg"
                                                    class="avatar mr-2" />
                                                <span class="h6 mb-0" data-filter-by="text">Kerri-Anne Banks</span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="user-manage-10">
                                        <label class="custom-control-label" for="user-manage-10">
                                            <span class="d-flex align-items-center">
                                                <img alt="Masimba Sibanda" src="assets/img/avatar-male-5.jpg"
                                                    class="avatar mr-2" />
                                                <span class="h6 mb-0" data-filter-by="text">Masimba Sibanda</span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="user-manage-11">
                                        <label class="custom-control-label" for="user-manage-11">
                                            <span class="d-flex align-items-center">
                                                <img alt="Krishna Bajaj" src="assets/img/avatar-female-6.jpg"
                                                    class="avatar mr-2" />
                                                <span class="h6 mb-0" data-filter-by="text">Krishna Bajaj</span>
                                            </span>
                                        </label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="user-manage-12">
                                        <label class="custom-control-label" for="user-manage-12">
                                            <span class="d-flex align-items-center">
                                                <img alt="Kenny Tran" src="assets/img/avatar-male-6.jpg"
                                                    class="avatar mr-2" />
                                                <span class="h6 mb-0" data-filter-by="text">Kenny Tran</span>
                                            </span>
                                        </label>
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
            </form>
            <form class="modal fade" id="project-edit-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Project</h5>
                            <button type="button" class="close btn btn-round" data-dismiss="modal"
                                aria-label="Close">
                                <i class="material-icons">close</i>
                            </button>
                        </div>
                        <!--end of modal head-->
                        <ul class="nav nav-tabs nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="project-edit-details-tab" data-toggle="tab"
                                    href="#project-edit-details" role="tab" aria-controls="project-edit-details"
                                    aria-selected="true">Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="project-edit-members-tab" data-toggle="tab"
                                    href="#project-edit-members" role="tab" aria-controls="project-edit-members"
                                    aria-selected="false">Members</a>
                            </li>
                        </ul>
                        <div class="modal-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="project-edit-details" role="tabpanel">
                                    <h6>General Details</h6>
                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Name</label>
                                        <input class="form-control col" type="text"
                                            value="Brand Concept and Design" name="project-name" />
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Description</label>
                                        <textarea class="form-control col" rows="3" placeholder="Project description" name="project-description">Research, ideate and present brand concepts for client consideration</textarea>
                                    </div>
                                    <hr>
                                    <h6>Timeline</h6>
                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Start Date</label>
                                        <input class="form-control col" type="text" name="project-start"
                                            placeholder="Select a date" data-flatpickr data-default-date="2021-04-21"
                                            data-alt-input="true" />
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Due Date</label>
                                        <input class="form-control col" type="text" name="project-due"
                                            placeholder="Select a date" data-flatpickr data-default-date="2021-09-15"
                                            data-alt-input="true" />
                                    </div>
                                    <div class="alert alert-warning text-small" role="alert">
                                        <span>You can change due dates at any time.</span>
                                    </div>
                                    <hr>
                                    <h6>Visibility</h6>
                                    <div class="row">
                                        <div class="col">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="visibility-everyone" name="visibility"
                                                    class="custom-control-input" checked>
                                                <label class="custom-control-label"
                                                    for="visibility-everyone">Everyone</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="visibility-members" name="visibility"
                                                    class="custom-control-input">
                                                <label class="custom-control-label"
                                                    for="visibility-members">Members</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="visibility-me" name="visibility"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="visibility-me">Just
                                                    me</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="project-edit-members" role="tabpanel">
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
                                                placeholder="Filter members" aria-label="Filter Members">
                                        </div>
                                        <div class="form-group-users">

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="project-user-1" checked>
                                                <label class="custom-control-label" for="project-user-1">
                                                    <span class="d-flex align-items-center">
                                                        <img alt="Claire Connors" src="assets/img/avatar-female-1.jpg"
                                                            class="avatar mr-2" />
                                                        <span class="h6 mb-0" data-filter-by="text">Claire
                                                            Connors</span>
                                                    </span>
                                                </label>
                                            </div>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="project-user-2" checked>
                                                <label class="custom-control-label" for="project-user-2">
                                                    <span class="d-flex align-items-center">
                                                        <img alt="Marcus Simmons" src="assets/img/avatar-male-1.jpg"
                                                            class="avatar mr-2" />
                                                        <span class="h6 mb-0" data-filter-by="text">Marcus
                                                            Simmons</span>
                                                    </span>
                                                </label>
                                            </div>





                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="project-user-12">
                                                <label class="custom-control-label" for="project-user-12">
                                                    <span class="d-flex align-items-center">
                                                        <img alt="Kenny Tran" src="assets/img/avatar-male-6.jpg"
                                                            class="avatar mr-2" />
                                                        <span class="h6 mb-0" data-filter-by="text">Kenny Tran</span>
                                                    </span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end of modal body-->
                        <div class="modal-footer">
                            <button role="button" class="btn btn-primary" type="submit">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <form class="modal fade" id="task-add-modal" tabindex="-1" aria-hidden="true" action=""
                method="POST">
                @csrf
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">New Task</h5>
                            <button type="button" class="close btn btn-round" data-dismiss="modal"
                                aria-label="Close">
                                <i class="material-icons">close</i>
                            </button>
                        </div>
                        <!--end of modal head-->
                        <ul class="nav nav-tabs nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="task-add-details-tab" data-toggle="tab"
                                    href="#task-add-details" role="tab" aria-controls="task-add-details"
                                    aria-selected="true">Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="task-add-members-tab" data-toggle="tab"
                                    href="#task-add-members" role="tab" aria-controls="task-add-members"
                                    aria-selected="false">Members</a>
                            </li>
                        </ul>
                        <div class="modal-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="task-add-details" role="tabpanel">
                                    <h6>General Details</h6>
                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Name</label>
                                        <input class="form-control col" type="text" placeholder="Task name"
                                            name="task-name" />
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3">Description</label>
                                        <textarea class="form-control col" rows="3" placeholder="Task description" name="task-description"></textarea>
                                    </div>
                                    <hr>
                                    <h6>Timeline</h6>
                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Start Date</label>
                                        <input class="form-control col" type="date" name="start_date"
                                            placeholder="Select a date" />
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Due Date</label>
                                        <input class="form-control col" type="date" name="due_date"
                                            placeholder="Select a date" />
                                    </div>
                                    <div class="alert alert-warning text-small" role="alert">
                                        <span>You can change due dates at any time.</span>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="task-add-members" role="tabpanel">
                                    <div class="users-manage" data-filter-list="form-group-users">
                                        <div class="mb-3">
                                            <ul class="avatars text-center">
                                                <li>
                                                    <img alt="Harry Xai" src="assets/img/avatar-male-2.jpg"
                                                        class="avatar" data-toggle="tooltip"
                                                        data-title="Harry Xai" />
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="input-group input-group-round">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="material-icons">filter_list</i>
                                                </span>
                                            </div>
                                            <input type="search" class="form-control filter-list-input"
                                                placeholder="Filter members" aria-label="Filter Members">
                                        </div>
                                        <div class="form-group-users">


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end of modal body-->
                        <div class="modal-footer">
                            <button type="submit">Create</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    </div>
    <button class="btn btn-primary btn-round btn-floating btn-lg" type="button" data-toggle="collapse"
        data-target="#floating-chat" aria-expanded="false">
        <i class="material-icons">chat_bubble</i>
        <i class="material-icons">close</i>
    </button>
    <div class="collapse sidebar-floating" id="floating-chat">
        <div class="sidebar-content">
            <div class="chat-module" data-filter-list="chat-module-body">
                <div class="chat-module-top">
                    <form>
                        <div class="input-group input-group-round">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">search</i>
                                </span>
                            </div>
                            <input type="search" class="form-control filter-list-input" placeholder="Search chat"
                                aria-label="Search Chat">
                        </div>
                    </form>
                    <div class="chat-module-body">


                        <div class="media chat-item">
                            <img alt="David" src="assets/img/avatar-male-4.jpg" class="avatar" />
                            <div class="media-body">
                                <div class="chat-item-title">
                                    <span class="chat-item-author" data-filter-by="text">David</span>
                                    <span data-filter-by="text">Yesterday</span>
                                </div>
                                <div class="chat-item-body" data-filter-by="text">
                                    <p>Coming along nicely, we&#39;ve got a draft for the client questionnaire
                                        completed, take a look! &#x1f913;</p>

                                </div>

                                <div class="media media-attachment">
                                    <div class="avatar bg-primary">
                                        <i class="material-icons">insert_drive_file</i>
                                    </div>
                                    <div class="media-body">
                                        <a href="#" data-filter-by="text">questionnaire-draft.doc</a>
                                        <span data-filter-by="text">24kb Document</span>
                                    </div>
                                </div>

                            </div>
                        </div>



                    </div>
                </div>
                <div class="chat-module-bottom">
                    <form class="chat-form">
                        <textarea class="form-control" placeholder="Type message" rows="1"></textarea>
                        <div class="chat-form-buttons">
                            <button type="button" class="btn btn-link">
                                <i class="material-icons">tag_faces</i>
                            </button>
                            <div class="custom-file custom-file-naked">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">
                                    <i class="material-icons">attach_file</i>
                                </label>
                            </div>
                        </div>
                    </form>
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

            tasks.forEach(task => {
                const taskName = task.querySelector('h5[data-filter-by="text"]').innerText.toLowerCase();
                if (taskName.includes(searchTerm.toLowerCase())) {
                    searchResultsContainer.appendChild(project.cloneNode(true));
                }
            });
        }
    </script>




    <!-- This appears in the demo only - demonstrates different layouts -->
    <style type="text/css">
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
    <div class="layout-switcher" tabindex="1">
        <div class="layout-switcher-head d-flex justify-content-between">
            <span>Select Layout</span>
            <i class="material-icons">arrow_drop_up</i>
        </div>
        <div class="layout-switcher-body">

            <div class="layout-switcher-option active">
                <a href="nav-side-project.html">
                    <img alt="Navigation Side" src="assets/img/layouts/layout-nav-side.svg"
                        class="layout-switcher-icon" />
                </a>
            </div>

            <div class="layout-switcher-option">
                <a href="nav-top-project.html">
                    <img alt="Navigation Top" src="assets/img/layouts/layout-nav-top.svg"
                        class="layout-switcher-icon" />
                </a>
            </div>

            <div class="layout-switcher-option">
                <a href="nav-top-sidebar-project.html">
                    <img alt="Content Sidebar" src="assets/img/layouts/layout-nav-top-sidebar.svg"
                        class="layout-switcher-icon" />
                </a>
            </div>

        </div>
    </div>

</body>


<!-- Mirrored from pipeline.mediumra.re/nav-side-project.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jul 2023 08:24:18 GMT -->

</html>
