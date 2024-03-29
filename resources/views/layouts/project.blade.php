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
                                    src="{{ asset(auth()->user()->profile_img ?: $defaultImage) }}" alt="Profile Image">

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

                    <div class="dropdown mt-2">
                        <button class="btn btn-primary btn-block dropdown-toggle" type="button" id="newContentButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

        <div class="container" id="searchResultsContainer">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-xl-10">
                    <div class="page-header">
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                @foreach ($allUsers as $user)
                               
                                <ul class="avatars">
                           <li>      
        <a href="#" data-toggle="tooltip" data-placement="top" title="{{ $user->name }}">
            <img class="avatar-image" src="{{ asset($user->profile_img) }}" alt="Profile Image">
        </a></li> 
    </ul>
                                @endforeach
                                 </div>
                 
                      
                        </div>

                    </div>
                    <form>
                        <div class="input-group input-group-dark input-group-round">
                            <div class="input-group-prepend">
                                <span class="input-group-text1">
                                    <i class="material-icons">search</i>
                                    <input type="search" class="form-control1" placeholder="Search"
                                aria-label="Search app" id="searchInput">
                                </span>
                            </div>

                            

                            <button type="button" class="btn btn-primary"
                                onclick="validateSearch()">Search</button>

                        </div>
                    
                    </form>
                
                    <hr>
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#projects" role="tab"
                                aria-controls="projects" aria-selected="true">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#members" role="tab"
                                aria-controls="members" aria-selected="false">Supervisor</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="projects" role="tabpanel"
                            data-filter-list="content-list-body">
                            <div class="content-list">
                                <div class="row content-list-head">
                                    <div class="col-auto">
                                        <h3>Projects</h3>
                                        <button class="btn btn-round" data-toggle="modal"
                                            data-target="#project-add-modal">
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
                                                placeholder="Filter projects" aria-label="Filter Projects">
                                        </div>
                                    </form>
                                </div>
                                <!--end of content list head-->
                                <div class="content-list-body row">
                                    @foreach ($projects as $project)
                                        <div class="col-lg-6">
                                            <div class="card card-project">
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                        style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="dropdown card-options">
                                                        <button class="btn-options" type="button"
                                                            id="project-dropdown-button-{{ $project->id }}"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <!-- <i class="material-icons"><h6>Status</h6></i> -->
                                                        </button>

                                                        <form class="cor-status" id="status-form-{{ $project->id }}"
                                                            action="{{ route('projectCoordinator.projects.updateStatusFromDropdown', ['project' => $project->id, 'status' => 'Active']) }}"
                                                            method="post">
                                                            @method('PUT')
                                                            @csrf
                                                            <input type="hidden" name="status" id="status-input">
                                                            <a href="{{ route('projectCoordinator.projects.updateStatusFromDropdown', [$project->id, 'Active']) }}"
                                                                class="dropdown-item">Active</a>
                                                            <a href="{{ route('projectCoordinator.projects.updateStatusFromDropdown', [$project->id, 'In Evaluation']) }}"
                                                                class="dropdown-item"
                                                                onclick="updateStatus('In Evaluation', {{ $project->id }})">In
                                                                Evaluation</a>
                                                            <a href="{{ route('projectCoordinator.projects.updateStatusFromDropdown', [$project->id, 'Completed']) }}"
                                                                class="dropdown-item"
                                                                onclick="updateStatus('Completed', {{ $project->id }})">Completed</a>
                                                        </form>
                                                    </div>

                                                    <div>
                                                        <a
                                                            href="{{ route('projectCoordinator.nav-side-project.task', $project->id) }}">
                                                            <h5 data-filter-by="text">{{ $project->project_name }}
                                                            </h5>
                                                        </a>
                                                    </div>

                                                    <div class="card-meta d-flex justify-content-between">

                                                      <ul><li>    @if ($project->due_date)
                                                        @php
                                                            $remainingDays = max(0, (strtotime($project->due_date) - time()) / (60 * 60 * 24));
                                                        @endphp
                                                        <div class="d-flex align-items-center">
                                                            <span class="text-small">
                                                                @if ($remainingDays > 0)
                                                                    {{ $remainingDays }}
                                                                    day{{ $remainingDays == 1 ? '' : 's' }} <br>
                                                                    remaining for due date
                                                                @else
                                                                    Due date has passed
                                                                @endif
                                                            </span>
                                                        </div>
                                                    @else
                                                        <div class="d-flex align-items-center"></div>
                                                            <span class="text-small">No due date set for this
                                                                project</span>
                                                        </div>
                                                    @endif</li>
                                                    <li>
                                                      <div>
                                                        <!-- Display the project status from the status column -->
                                                        <span class="text-small">{{ $project->status }}</span>
                                                    </div>

                                                    </li>
                                                  </ul>
 
                                                </div>
                                     
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
                                        <h3>Supervisor</h3>
                                        <button class="btn btn-round" data-toggle="modal"
                                            data-target="#user-invite-modal">
                                            <i class="material-icons">add</i>
                                        </button>
                                    </div>
                                    <form class="col-md-auto">
                                        <div class="input-group input-group-round">
                                            <div class="input-group-prepend">
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">filter_list</i>
                                                    </span>
                                                    <input type="search" class="form-control filter-list-input"
                                                        placeholder="Filter supervisor" aria-label="Filter Members">
                                                </div>
                                            </div>
                                    </form>
                                </div>
                                <!--end of content list head-->
                                <div class="content-list-body row">
                                    @foreach ($supervisors as $supervisor)
                                        <div class="col-6">
                                            <a class="media media-member" href="#">
                                                <img class="avatar-label2" src="{{ asset($supervisor->profile_img) }}" alt="Profile Image">

                                                <div class="media-body">
                                                    <h6 class="mb-0" data-filter-by="text">
                                                        {{ $supervisor->username }}</h6>
                                                    <!-- <span data-filter-by="text" class="text-body">{{ $supervisor->role }}</span>
             -->
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>

                                <!--end of content list-->
                            </div>
                        </div>
                        <form class="modal fade" id="user-invite-modal" tabindex="-1" aria-hidden="true"
                            action="{{ route('projectCoordinator.supervisors.store') }}" method="POST"
                            onsubmit="return validateForm()">
                            @csrf
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Supervisor</h5>
                                        <button type="button" class="close btn btn-round" data-dismiss="modal"
                                            aria-label="Close">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </div>
                                    <!--end of modal head-->
                                    <div class="modal-body">
                                        <div>
                                            <div class="input-group1">
                                                <div class="input-group-prepend">
                                                    <label for="email">Email:</label>
                                                </div>
                                                <input type="email" id="email" name="email" required>
                                            </div>
                                            <div class="input-group1">
                                                <div class="input-group-prepend">
                                                    <label for="email">Username:</label>
                                                </div>
                                                <input type="text" id="email" name="username" required>
                                            </div>
                                            <div class="input-group1">
                                                <div class="input-group-prepend">
                                                    <label for="email">Password:</label>
                                                </div>
                                                <input type="password" id="password" name="password" required>
                                            </div>
                                            <div class="input-group1">
                                                <div class="input-group-prepend">
                                                    <label for="email">Department:</label>
                                                </div>
                                                <input type="text" id="email" name="department" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end of modal body-->
                                    <div class="modal-footer">
                                        <button class="cor-btn" type="submit">Add</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                    </form>

                    <form class="modal fade" id="project-add-modal" tabindex="-1" aria-hidden="true"
                        action="{{ route('projectCoordinator.projects.store') }}" method="POST">
                        @csrf
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">New Project</h5>
                                    <button type="button" class="close btn btn-round" data-dismiss="modal"
                                        aria-label="Close">
                                        <i class="material-icons">close</i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="project-add-details"
                                            role="tabpanel">
                                            <h6>Project Details</h6>
                                            <hr>

                                            <div class="form-group row align-items-center">
                                                <label class="col-3">Project Name:</label>
                                                <input type="text" class="form-control col" name="project_name"
                                                    required>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label class="col-3">Section:</label>
                                                <select class="form-control col" name="section[]" multiple required>
                                                    @foreach ($sections as $section)
                                                        <option value="{{ $section }}">{{ $section }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group row align-items-center">
                                                <label class="col-3">Semester:</label>
                                                <select class="form-control col" name="semester" required>
                                                    @foreach ($semesters as $semester)
                                                        <option value="{{ $semester }}">{{ $semester }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label class="col-3">Course:</label>
                                                <select class="form-control col" name="course" required>
                                                    <option value="">Select Course</option>
                                                    <option value="BBA">BBA</option>
                                                    <option value="BBA-BI">BBA-BI</option>
                                                    <option value="BBA-TT">BBA-TT</option>
                                                    <option value="BCIS">BCIS</option>
                                                </select>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label class="col-3">Project Type:</label>
                                                <select class="form-control col" name="project_type" required>
                                                    <option value="">Select Project Type</option>
                                                    <option value="Minor I Project">Minor I Project</option>
                                                    <option value="Minor II Project">Minor II Project</option>
                                                    <option value="Major Project">Major Project</option>
                                                    <option value="Summer Project">Summer Project</option>
                                                </select>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label class="col-3">Batch:</label>
                                                <input type="text" class="form-control col" name="batch"
                                                    required>
                                            </div>
                                            <div class="form-group row align-items-center">
                                                <label class="col-3">Supervisor:</label>
                                                <select class="form-control col" name="supervisor[]" multiple
                                                    required>
                                                    @foreach ($supervisors as $supervisor)
                                                        <option value="{{ $supervisor->username }}">
                                                            {{ $supervisor->username }}</option>
                                                    @endforeach
                                                </select>
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
                                            <hr>
                                            <h6>Visibility</h6>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="visibility-everyone"
                                                            name="visibility" class="custom-control-input"
                                                            value="everyone" checked>
                                                        <label class="custom-control-label"
                                                            for="visibility-everyone">Everyone</label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="visibility-members"
                                                            name="visibility" class="custom-control-input"
                                                            value="members">
                                                        <label class="custom-control-label"
                                                            for="visibility-members">Members</label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="visibility-me" name="visibility"
                                                            class="custom-control-input" value="me">
                                                        <label class="custom-control-label" for="visibility-me">Just
                                                            me</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="project-add-members" role="tabpanel">
                                                <!-- Members section content -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Display validation errors if any
@if ($errors->any())
<div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
        </ul>
    </div>
@endif -->
                                    <div class="modal-footer">
                                        <button type="submit" class="cor-btn">Create</button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
                @if (session('success'))
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
        .container5{
            width: 50%;
        }
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
