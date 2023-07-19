<!doctype html>
<html lang="en">

  
<!-- Mirrored from pipeline.mediumra.re/nav-top-sidebar-team.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jul 2023 08:24:29 GMT -->
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
    <title>Pipeline Project Management Bootstrap Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A project management Bootstrap theme by Medium Rare">
    <link href="assets/img/favicon.ico" rel="icon" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
    <link href="{{ asset('css/frontend/theme.css') }}"  rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard/projectcordinator.css') }}">
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

      <button class="edit-profile-button">Edit Profile</button>
</ul>

          <hr>
          <div class="d-none d-lg-block w-100">
            <span class="text-small text-muted">Quick Links</span>
            <ul class="nav nav-small flex-column mt-2">
              <li class="nav-item">
                <a href="{{ route('projectCoordinator.nav-side-team') }}" class="nav-link">Team Overview</a>
              </li>
              <li class="nav-item">
              <a href="{{ route('projectCoordinator.nav-side-project') }}" class="nav-link">Project</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('projectCoordinator.nav-side-task') }}"class="nav-link">Single Task</a>
              </li>
              <li class="nav-item">
              <a href="{{ route('projectCoordinator.nav-side-kanban-board') }}"class="nav-link">Account Setting</a>
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
            <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <a href="#" class="dropdown-item">Log Out</a>
            </a>
            <div class="dropdown-menu">
              <a href="nav-side-user.html" class="dropdown-item">Profile</a>
              
              
            </div>
          </div>
        </div>

      </div>
      <div class="main-container">
        <div class="sidebar-container">
          <button class="btn btn-primary btn-round btn-floating btn-lg d-lg-none" type="button" data-toggle="collapse" data-target="#sidebar-collapse" aria-expanded="false">
            <i class="material-icons">more_horiz</i>
            <i class="material-icons">close</i>
          </button>
          <div class="sidebar collapse" id="sidebar-collapse">
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
                      <input type="search" class="form-control filter-list-input" placeholder="Search chat" aria-label="Search Chat">
                    </div>
                  </form>
                  <div class="chat-module-body">

                    <div class="media chat-item">
                      <img alt="Claire" src="assets/img/avatar-female-1.jpg" class="avatar" />
                      <div class="media-body">
                        <div class="chat-item-title">
                          <span class="chat-item-author" data-filter-by="text">Claire</span>
                          <span data-filter-by="text">4 days ago</span>
                        </div>
                        <div class="chat-item-body" data-filter-by="text">
                          <p>Hey guys, just kicking things off here in the chat window. Hope you&#39;re all ready to tackle this great project. Let&#39;s smash some Brand Concept &amp; Design!</p>

                        </div>

                      </div>
                    </div>

                    <div class="media chat-item">
                      <img alt="Peggy" src="assets/img/avatar-female-2.jpg" class="avatar" />
                      <div class="media-body">
                        <div class="chat-item-title">
                          <span class="chat-item-author" data-filter-by="text">Peggy</span>
                          <span data-filter-by="text">4 days ago</span>
                        </div>
                        <div class="chat-item-body" data-filter-by="text">
                          <p>Nice one <a href="#">@Claire</a>, we&#39;ve got some killer ideas kicking about already.
                            <img src="https://giphy.com/gifs/aTeHNLRLrwwwM" alt="alt text" title="Thinking">
                          </p>

                        </div>

                      </div>
                    </div>

                    <div class="media chat-item">
                      <img alt="Marcus" src="assets/img/avatar-male-1.jpg" class="avatar" />
                      <div class="media-body">
                        <div class="chat-item-title">
                          <span class="chat-item-author" data-filter-by="text">Marcus</span>
                          <span data-filter-by="text">3 days ago</span>
                        </div>
                        <div class="chat-item-body" data-filter-by="text">
                          <p>Roger that boss! <a href="#">@Ravi</a> and I have already started gathering some stuff for the mood boards, excited to start! &#x1f525;</p>

                        </div>

                      </div>
                    </div>

                    <div class="media chat-item">
                      <img alt="Ravi" src="assets/img/avatar-male-3.jpg" class="avatar" />
                      <div class="media-body">
                        <div class="chat-item-title">
                          <span class="chat-item-author" data-filter-by="text">Ravi</span>
                          <span data-filter-by="text">3 days ago</span>
                        </div>
                        <div class="chat-item-body" data-filter-by="text">
                          <h1>&#x1f609;</h1>

                        </div>

                      </div>
                    </div>

                    <div class="media chat-item">
                      <img alt="Claire" src="assets/img/avatar-female-1.jpg" class="avatar" />
                      <div class="media-body">
                        <div class="chat-item-title">
                          <span class="chat-item-author" data-filter-by="text">Claire</span>
                          <span data-filter-by="text">2 days ago</span>
                        </div>
                        <div class="chat-item-body" data-filter-by="text">
                          <p>Can&#39;t wait! <a href="#">@David</a> how are we coming along with the <a href="#">Client Objective Meeting</a>?</p>

                        </div>

                      </div>
                    </div>

                    <div class="media chat-item">
                      <img alt="David" src="assets/img/avatar-male-4.jpg" class="avatar" />
                      <div class="media-body">
                        <div class="chat-item-title">
                          <span class="chat-item-author" data-filter-by="text">David</span>
                          <span data-filter-by="text">Yesterday</span>
                        </div>
                        <div class="chat-item-body" data-filter-by="text">
                          <p>Coming along nicely, we&#39;ve got a draft for the client questionnaire completed, take a look! &#x1f913;</p>

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

                    <div class="media chat-item">
                      <img alt="Sally" src="assets/img/avatar-female-3.jpg" class="avatar" />
                      <div class="media-body">
                        <div class="chat-item-title">
                          <span class="chat-item-author" data-filter-by="text">Sally</span>
                          <span data-filter-by="text">2 hours ago</span>
                        </div>
                        <div class="chat-item-body" data-filter-by="text">
                          <p>Great start guys, I&#39;ve added some notes to the task. We may need to make some adjustments to the last couple of items - but no biggie!</p>

                        </div>

                      </div>
                    </div>

                    <div class="media chat-item">
                      <img alt="Peggy" src="assets/img/avatar-female-2.jpg" class="avatar" />
                      <div class="media-body">
                        <div class="chat-item-title">
                          <span class="chat-item-author" data-filter-by="text">Peggy</span>
                          <span data-filter-by="text">Just now</span>
                        </div>
                        <div class="chat-item-body" data-filter-by="text">
                          <p>Well done <a href="#">@all</a>. See you all at 2 for the kick-off meeting. &#x1f91C;</p>

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
        <div class="content-container">

          <div class="breadcrumb-bar navbar bg-white sticky-top">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Overview</a>
                </li>
                <li class="breadcrumb-item"><a href="pages-app.html#">App Pages</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Team</li>
              </ol>
            </nav>

            <div class="dropdown">
              <button class="btn btn-round" role="button" data-toggle="dropdown" aria-expanded="false">
                <i class="material-icons">settings</i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">

                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#team-manage-modal">Edit Team</a>
                <a class="dropdown-item" href="#">Share</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="#">Leave</a>

              </div>
            </div>

          </div>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-xl-9 col-lg-10">
                <div class="page-header">
                  <h1>Medium Rare &#x2615;</h1>
                  <p class="lead">A small web studio crafting lovely template products.</p>
                  <div class="d-flex align-items-center">
                    <ul class="avatars">

                      <li>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Claire Connors">
                          <img alt="Claire Connors" class="avatar" src="assets/img/avatar-female-1.jpg" />
                        </a>
                      </li>

                      <li>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Marcus Simmons">
                          <img alt="Marcus Simmons" class="avatar" src="assets/img/avatar-male-1.jpg" />
                        </a>
                      </li>

                      <li>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Peggy Brown">
                          <img alt="Peggy Brown" class="avatar" src="assets/img/avatar-female-2.jpg" />
                        </a>
                      </li>

                      <li>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Harry Xai">
                          <img alt="Harry Xai" class="avatar" src="assets/img/avatar-male-2.jpg" />
                        </a>
                      </li>

                      <li>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Sally Harper">
                          <img alt="Sally Harper" class="avatar" src="assets/img/avatar-female-3.jpg" />
                        </a>
                      </li>

                      <li>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Ravi Singh">
                          <img alt="Ravi Singh" class="avatar" src="assets/img/avatar-male-3.jpg" />
                        </a>
                      </li>

                      <li>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Kristina Van Der Stroem">
                          <img alt="Kristina Van Der Stroem" class="avatar" src="assets/img/avatar-female-4.jpg" />
                        </a>
                      </li>

                      <li>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="David Whittaker">
                          <img alt="David Whittaker" class="avatar" src="assets/img/avatar-male-4.jpg" />
                        </a>
                      </li>

                      <li>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Kerri-Anne Banks">
                          <img alt="Kerri-Anne Banks" class="avatar" src="assets/img/avatar-female-5.jpg" />
                        </a>
                      </li>

                      <li>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Masimba Sibanda">
                          <img alt="Masimba Sibanda" class="avatar" src="assets/img/avatar-male-5.jpg" />
                        </a>
                      </li>

                      <li>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Krishna Bajaj">
                          <img alt="Krishna Bajaj" class="avatar" src="assets/img/avatar-female-6.jpg" />
                        </a>
                      </li>

                      <li>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Kenny Tran">
                          <img alt="Kenny Tran" class="avatar" src="assets/img/avatar-male-6.jpg" />
                        </a>
                      </li>

                    </ul>
                    <button class="btn btn-round flex-shrink-0" data-toggle="modal" data-target="#user-invite-modal">
                      <i class="material-icons">add</i>
                    </button>
                  </div>
                </div>
                <hr>
                <ul class="nav nav-tabs nav-fill" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#projects" role="tab" aria-controls="projects" aria-selected="true">Projects</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#members" role="tab" aria-controls="members" aria-selected="false">Members</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="projects" role="tabpanel" data-filter-list="content-list-body">
                    <div class="content-list">
                      <div class="row content-list-head">
                        <div class="col-auto">
                          <h3>Projects</h3>
                          <button class="btn btn-round" data-toggle="modal" data-target="#project-add-modal">
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
                            <input type="search" class="form-control filter-list-input" placeholder="Filter projects" aria-label="Filter Projects">
                          </div>
                        </form>
                      </div>
                      <!--end of content list head-->
                      <div class="content-list-body row">

                        <div class="col-lg-6">
                          <div class="card card-project">

                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <div class="card-body">
                              <div class="dropdown card-options">
                                <button class="btn-options" type="button" id="project-dropdown-button-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="material-icons">more_vert</i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="#">Edit</a>
                                  <a class="dropdown-item" href="#">Share</a>
                                </div>
                              </div>
                              <div class="card-title">
                                <a href="#"><h5 data-filter-by="text">New Website</h5></a>
                              </div>
                              <ul class="avatars">

                                <li>
                                  <a href="#" data-toggle="tooltip" title="Kenny">
                                    <img alt="Kenny Tran" class="avatar" src="assets/img/avatar-male-6.jpg" data-filter-by="alt" />
                                  </a>
                                </li>

                                <li>
                                  <a href="#" data-toggle="tooltip" title="Peggy">
                                    <img alt="Peggy Brown" class="avatar" src="assets/img/avatar-female-2.jpg" data-filter-by="alt" />
                                  </a>
                                </li>

                                <li>
                                  <a href="#" data-toggle="tooltip" title="Ravi">
                                    <img alt="Ravi Singh" class="avatar" src="assets/img/avatar-male-3.jpg" data-filter-by="alt" />
                                  </a>
                                </li>

                              </ul>
                              <div class="card-meta d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                  <i class="material-icons mr-1">playlist_add_check</i>
                                  <span class="text-small">6/10</span>
                                </div>
                                <span class="text-small" data-filter-by="text">Due 4 days</span>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="card card-project">

                            <div class="progress">
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <div class="card-body">
                              <div class="dropdown card-options">
                                <button class="btn-options" type="button" id="project-dropdown-button-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="material-icons">more_vert</i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="#">Edit</a>
                                  <a class="dropdown-item" href="#">Share</a>
                                </div>
                              </div>
                              <div class="card-title">
                                <a href="#"><h5 data-filter-by="text">Company Vision Statement</h5></a>
                              </div>
                              <ul class="avatars">

                                <li>
                                  <a href="#" data-toggle="tooltip" title="Harry">
                                    <img alt="Harry Xai" class="avatar" src="assets/img/avatar-male-2.jpg" data-filter-by="alt" />
                                  </a>
                                </li>

                                <li>
                                  <a href="#" data-toggle="tooltip" title="Sally">
                                    <img alt="Sally Harper" class="avatar" src="assets/img/avatar-female-3.jpg" data-filter-by="alt" />
                                  </a>
                                </li>

                                <li>
                                  <a href="#" data-toggle="tooltip" title="Kristina">
                                    <img alt="Kristina Van Der Stroem" class="avatar" src="assets/img/avatar-female-4.jpg" data-filter-by="alt" />
                                  </a>
                                </li>

                                <li>
                                  <a href="#" data-toggle="tooltip" title="Kerri-Anne">
                                    <img alt="Kerri-Anne Banks" class="avatar" src="assets/img/avatar-female-5.jpg" data-filter-by="alt" />
                                  </a>
                                </li>

                                <li>
                                  <a href="#" data-toggle="tooltip" title="Claire">
                                    <img alt="Claire Connors" class="avatar" src="assets/img/avatar-female-1.jpg" data-filter-by="alt" />
                                  </a>
                                </li>

                                <li>
                                  <a href="#" data-toggle="tooltip" title="Marcus">
                                    <img alt="Marcus Simmons" class="avatar" src="assets/img/avatar-male-1.jpg" data-filter-by="alt" />
                                  </a>
                                </li>

                              </ul>
                              <div class="card-meta d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                  <i class="material-icons mr-1">playlist_add_check</i>
                                  <span class="text-small">1/8</span>
                                </div>
                                <span class="text-small" data-filter-by="text">Due 7 days</span>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="card card-project">

                            <div class="progress">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <div class="card-body">
                              <div class="dropdown card-options">
                                <button class="btn-options" type="button" id="project-dropdown-button-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="material-icons">more_vert</i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="#">Edit</a>
                                  <a class="dropdown-item" href="#">Share</a>
                                </div>
                              </div>
                              <div class="card-title">
                                <a href="#"><h5 data-filter-by="text">Update Privacy Policy</h5></a>
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
                                  <span class="text-small">2/8</span>
                                </div>
                                <span class="text-small" data-filter-by="text">Due 8 days</span>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="card card-project">

                            <div class="card-body">
                              <div class="dropdown card-options">
                                <button class="btn-options" type="button" id="project-dropdown-button-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="material-icons">more_vert</i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="#">Edit</a>
                                  <a class="dropdown-item" href="#">Share</a>
                                </div>
                              </div>
                              <div class="card-title">
                                <a href="#"><h5 data-filter-by="text">Update Marketing Collateral</h5></a>
                              </div>
                              <ul class="avatars">

                                <li>
                                  <a href="#" data-toggle="tooltip" title="David">
                                    <img alt="David Whittaker" class="avatar" src="assets/img/avatar-male-4.jpg" data-filter-by="alt" />
                                  </a>
                                </li>

                                <li>
                                  <a href="#" data-toggle="tooltip" title="Masimba">
                                    <img alt="Masimba Sibanda" class="avatar" src="assets/img/avatar-male-5.jpg" data-filter-by="alt" />
                                  </a>
                                </li>

                                <li>
                                  <a href="#" data-toggle="tooltip" title="Krishna">
                                    <img alt="Krishna Bajaj" class="avatar" src="assets/img/avatar-female-6.jpg" data-filter-by="alt" />
                                  </a>
                                </li>

                                <li>
                                  <a href="#" data-toggle="tooltip" title="Harry">
                                    <img alt="Harry Xai" class="avatar" src="assets/img/avatar-male-2.jpg" data-filter-by="alt" />
                                  </a>
                                </li>

                              </ul>
                              <div class="card-meta d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                  <i class="material-icons mr-1">playlist_add_check</i>
                                  <span class="text-small">0/5</span>
                                </div>
                                <span class="text-small" data-filter-by="text">Due 12 days</span>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="card card-project">

                            <div class="progress">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 8%" aria-valuenow="8" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <div class="card-body">
                              <div class="dropdown card-options">
                                <button class="btn-options" type="button" id="project-dropdown-button-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="material-icons">more_vert</i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="#">Edit</a>
                                  <a class="dropdown-item" href="#">Share</a>
                                </div>
                              </div>
                              <div class="card-title">
                                <a href="#"><h5 data-filter-by="text">Brand Concept &amp; Design</h5></a>
                              </div>
                              <ul class="avatars">

                                <li>
                                  <a href="#" data-toggle="tooltip" title="Ravi">
                                    <img alt="Ravi Singh" class="avatar" src="assets/img/avatar-male-3.jpg" data-filter-by="alt" />
                                  </a>
                                </li>

                                <li>
                                  <a href="#" data-toggle="tooltip" title="Masimba">
                                    <img alt="Masimba Sibanda" class="avatar" src="assets/img/avatar-male-5.jpg" data-filter-by="alt" />
                                  </a>
                                </li>

                                <li>
                                  <a href="#" data-toggle="tooltip" title="Peggy">
                                    <img alt="Peggy Brown" class="avatar" src="assets/img/avatar-female-2.jpg" data-filter-by="alt" />
                                  </a>
                                </li>

                                <li>
                                  <a href="#" data-toggle="tooltip" title="Marcus">
                                    <img alt="Marcus Simmons" class="avatar" src="assets/img/avatar-male-1.jpg" data-filter-by="alt" />
                                  </a>
                                </li>

                                <li>
                                  <a href="#" data-toggle="tooltip" title="Kerri-Anne">
                                    <img alt="Kerri-Anne Banks" class="avatar" src="assets/img/avatar-female-5.jpg" data-filter-by="alt" />
                                  </a>
                                </li>

                                <li>
                                  <a href="#" data-toggle="tooltip" title="Claire">
                                    <img alt="Claire Connors" class="avatar" src="assets/img/avatar-female-1.jpg" data-filter-by="alt" />
                                  </a>
                                </li>

                              </ul>
                              <div class="card-meta d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                  <i class="material-icons mr-1">playlist_add_check</i>
                                  <span class="text-small">1/12</span>
                                </div>
                                <span class="text-small" data-filter-by="text">Due 20 days</span>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="card card-project">

                            <div class="card-body">
                              <div class="dropdown card-options">
                                <button class="btn-options" type="button" id="project-dropdown-button-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="material-icons">more_vert</i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="#">Edit</a>
                                  <a class="dropdown-item" href="#">Share</a>
                                </div>
                              </div>
                              <div class="card-title">
                                <a href="#"><h5 data-filter-by="text">Company Getaway</h5></a>
                              </div>
                              <ul class="avatars">

                                <li>
                                  <a href="#" data-toggle="tooltip" title="Claire">
                                    <img alt="Claire Connors" class="avatar" src="assets/img/avatar-female-1.jpg" data-filter-by="alt" />
                                  </a>
                                </li>

                                <li>
                                  <a href="#" data-toggle="tooltip" title="Kristina">
                                    <img alt="Kristina Van Der Stroem" class="avatar" src="assets/img/avatar-female-4.jpg" data-filter-by="alt" />
                                  </a>
                                </li>

                              </ul>
                              <div class="card-meta d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                  <i class="material-icons mr-1">playlist_add_check</i>
                                  <span class="text-small">-/-</span>
                                </div>
                                <span class="text-small" data-filter-by="text">Unscheduled</span>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="card card-project">

                            <div class="card-body">
                              <div class="dropdown card-options">
                                <button class="btn-options" type="button" id="project-dropdown-button-7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="material-icons">more_vert</i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="#">Edit</a>
                                  <a class="dropdown-item" href="#">Share</a>
                                </div>
                              </div>
                              <div class="card-title">
                                <a href="#"><h5 data-filter-by="text">Annual Team Meeting</h5></a>
                              </div>
                              <ul class="avatars">

                                <li>
                                  <a href="#" data-toggle="tooltip" title="Ravi">
                                    <img alt="Ravi Singh" class="avatar" src="assets/img/avatar-male-3.jpg" data-filter-by="alt" />
                                  </a>
                                </li>

                              </ul>
                              <div class="card-meta d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                  <i class="material-icons mr-1">playlist_add_check</i>
                                  <span class="text-small">-/-</span>
                                </div>
                                <span class="text-small" data-filter-by="text">Unscheduled</span>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                      <!--end of content list body-->
                    </div>
                    <!--end of content list-->
                  </div>
                  <!--end of tab-->
                  <div class="tab-pane fade" id="members" role="tabpanel" data-filter-list="content-list-body">
                    <div class="content-list">
                      <div class="row content-list-head">
                        <div class="col-auto">
                          <h3>Members</h3>
                          <button class="btn btn-round" data-toggle="modal" data-target="#user-invite-modal">
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
                            <input type="search" class="form-control filter-list-input" placeholder="Filter members" aria-label="Filter Members">
                          </div>
                        </form>
                      </div>
                      <!--end of content list head-->
                      <div class="content-list-body row">

                        <div class="col-6">
                          <a class="media media-member" href="#">
                            <img alt="Claire Connors" src="assets/img/avatar-female-1.jpg" class="avatar avatar-lg" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">Claire Connors</h6>
                              <span data-filter-by="text" class="text-body">Administrator</span>
                            </div>
                          </a>
                        </div>

                        <div class="col-6">
                          <a class="media media-member" href="#">
                            <img alt="Marcus Simmons" src="assets/img/avatar-male-1.jpg" class="avatar avatar-lg" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">Marcus Simmons</h6>
                              <span data-filter-by="text" class="text-body">Administrator</span>
                            </div>
                          </a>
                        </div>

                        <div class="col-6">
                          <a class="media media-member" href="#">
                            <img alt="Peggy Brown" src="assets/img/avatar-female-2.jpg" class="avatar avatar-lg" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">Peggy Brown</h6>
                              <span data-filter-by="text" class="text-body">Project Manager</span>
                            </div>
                          </a>
                        </div>

                        <div class="col-6">
                          <a class="media media-member" href="#">
                            <img alt="Harry Xai" src="assets/img/avatar-male-2.jpg" class="avatar avatar-lg" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">Harry Xai</h6>
                              <span data-filter-by="text" class="text-body">Project Manager</span>
                            </div>
                          </a>
                        </div>

                        <div class="col-6">
                          <a class="media media-member" href="#">
                            <img alt="Sally Harper" src="assets/img/avatar-female-3.jpg" class="avatar avatar-lg" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">Sally Harper</h6>
                              <span data-filter-by="text" class="text-body">Developer</span>
                            </div>
                          </a>
                        </div>

                        <div class="col-6">
                          <a class="media media-member" href="#">
                            <img alt="Ravi Singh" src="assets/img/avatar-male-3.jpg" class="avatar avatar-lg" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">Ravi Singh</h6>
                              <span data-filter-by="text" class="text-body">Developer</span>
                            </div>
                          </a>
                        </div>

                        <div class="col-6">
                          <a class="media media-member" href="#">
                            <img alt="Kristina Van Der Stroem" src="assets/img/avatar-female-4.jpg" class="avatar avatar-lg" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">Kristina Van Der Stroem</h6>
                              <span data-filter-by="text" class="text-body">Developer</span>
                            </div>
                          </a>
                        </div>

                        <div class="col-6">
                          <a class="media media-member" href="#">
                            <img alt="David Whittaker" src="assets/img/avatar-male-4.jpg" class="avatar avatar-lg" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">David Whittaker</h6>
                              <span data-filter-by="text" class="text-body">Designer</span>
                            </div>
                          </a>
                        </div>

                        <div class="col-6">
                          <a class="media media-member" href="#">
                            <img alt="Kerri-Anne Banks" src="assets/img/avatar-female-5.jpg" class="avatar avatar-lg" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">Kerri-Anne Banks</h6>
                              <span data-filter-by="text" class="text-body">Marketing</span>
                            </div>
                          </a>
                        </div>

                        <div class="col-6">
                          <a class="media media-member" href="#">
                            <img alt="Masimba Sibanda" src="assets/img/avatar-male-5.jpg" class="avatar avatar-lg" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">Masimba Sibanda</h6>
                              <span data-filter-by="text" class="text-body">Designer</span>
                            </div>
                          </a>
                        </div>

                        <div class="col-6">
                          <a class="media media-member" href="#">
                            <img alt="Krishna Bajaj" src="assets/img/avatar-female-6.jpg" class="avatar avatar-lg" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">Krishna Bajaj</h6>
                              <span data-filter-by="text" class="text-body">Marketing</span>
                            </div>
                          </a>
                        </div>

                        <div class="col-6">
                          <a class="media media-member" href="#">
                            <img alt="Kenny Tran" src="assets/img/avatar-male-6.jpg" class="avatar avatar-lg" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">Kenny Tran</h6>
                              <span data-filter-by="text" class="text-body">Contributor</span>
                            </div>
                          </a>
                        </div>

                      </div>
                    </div>
                    <!--end of content list-->
                  </div>
                </div>
                <form class="modal fade" id="user-invite-modal" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Invite Users</h5>
                        <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                      </div>
                      <!--end of modal head-->
                      <div class="modal-body">
                        <p>Send an invite link via email to add members to this team</p>
                        <div>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="material-icons">email</i>
                              </span>
                            </div>
                            <input type="email" class="form-control" placeholder="Recipient email address" aria-label="Recipient email address">
                          </div>
                          <div class="text-right text-small mt-2">
                            <a href="#" role="button">Add another recipient</a>
                          </div>
                        </div>
                      </div>
                      <!--end of modal body-->
                      <div class="modal-footer">
                        <button role="button" class="btn btn-primary" type="submit">
                          Invite users
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
                <form class="modal fade" id="team-manage-modal" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Manage Team</h5>
                        <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                      </div>
                      <!--end of modal head-->
                      <ul class="nav nav-tabs nav-fill" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="team-manage-details-tab" data-toggle="tab" href="#team-manage-details" role="tab" aria-controls="team-manage-details" aria-selected="true">Details</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="team-manage-members-tab" data-toggle="tab" href="#team-manage-members" role="tab" aria-controls="team-manage-members" aria-selected="false">Members</a>
                        </li>
                      </ul>
                      <div class="modal-body">
                        <div class="tab-content">
                          <div class="tab-pane fade show active" id="team-manage-details" role="tabpanel">
                            <h6>Team Details</h6>
                            <div class="form-group row align-items-center">
                              <label class="col-3">Name</label>
                              <input class="form-control col" type="text" placeholder="Team name" name="team-name" value="Medium Rare" />
                            </div>
                            <div class="form-group row">
                              <label class="col-3">Description</label>
                              <textarea class="form-control col" rows="3" placeholder="Team description" name="team-description">A small web studio crafting lovely template products.</textarea>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="team-manage-members" role="tabpanel">
                            <div class="users-manage" data-filter-list="form-group-users">
                              <div class="mb-3">
                                <ul class="avatars text-center">

                                  <li>
                                    <img alt="Claire Connors" src="assets/img/avatar-female-1.jpg" class="avatar" data-toggle="tooltip" data-title="Claire Connors" />
                                  </li>

                                  <li>
                                    <img alt="Marcus Simmons" src="assets/img/avatar-male-1.jpg" class="avatar" data-toggle="tooltip" data-title="Marcus Simmons" />
                                  </li>

                                  <li>
                                    <img alt="Peggy Brown" src="assets/img/avatar-female-2.jpg" class="avatar" data-toggle="tooltip" data-title="Peggy Brown" />
                                  </li>

                                  <li>
                                    <img alt="Harry Xai" src="assets/img/avatar-male-2.jpg" class="avatar" data-toggle="tooltip" data-title="Harry Xai" />
                                  </li>

                                </ul>
                              </div>
                              <div class="input-group input-group-round">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="material-icons">filter_list</i>
                                  </span>
                                </div>
                                <input type="search" class="form-control filter-list-input" placeholder="Filter members" aria-label="Filter Members">
                              </div>
                              <div class="form-group-users">

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="user-manage-1" checked>
                                  <label class="custom-control-label" for="user-manage-1">
                                    <span class="d-flex align-items-center">
                                      <img alt="Claire Connors" src="assets/img/avatar-female-1.jpg" class="avatar mr-2" />
                                      <span class="h6 mb-0" data-filter-by="text">Claire Connors</span>
                                    </span>
                                  </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="user-manage-2" checked>
                                  <label class="custom-control-label" for="user-manage-2">
                                    <span class="d-flex align-items-center">
                                      <img alt="Marcus Simmons" src="assets/img/avatar-male-1.jpg" class="avatar mr-2" />
                                      <span class="h6 mb-0" data-filter-by="text">Marcus Simmons</span>
                                    </span>
                                  </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="user-manage-3" checked>
                                  <label class="custom-control-label" for="user-manage-3">
                                    <span class="d-flex align-items-center">
                                      <img alt="Peggy Brown" src="assets/img/avatar-female-2.jpg" class="avatar mr-2" />
                                      <span class="h6 mb-0" data-filter-by="text">Peggy Brown</span>
                                    </span>
                                  </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="user-manage-4" checked>
                                  <label class="custom-control-label" for="user-manage-4">
                                    <span class="d-flex align-items-center">
                                      <img alt="Harry Xai" src="assets/img/avatar-male-2.jpg" class="avatar mr-2" />
                                      <span class="h6 mb-0" data-filter-by="text">Harry Xai</span>
                                    </span>
                                  </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="user-manage-5">
                                  <label class="custom-control-label" for="user-manage-5">
                                    <span class="d-flex align-items-center">
                                      <img alt="Sally Harper" src="assets/img/avatar-female-3.jpg" class="avatar mr-2" />
                                      <span class="h6 mb-0" data-filter-by="text">Sally Harper</span>
                                    </span>
                                  </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="user-manage-6">
                                  <label class="custom-control-label" for="user-manage-6">
                                    <span class="d-flex align-items-center">
                                      <img alt="Ravi Singh" src="assets/img/avatar-male-3.jpg" class="avatar mr-2" />
                                      <span class="h6 mb-0" data-filter-by="text">Ravi Singh</span>
                                    </span>
                                  </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="user-manage-7">
                                  <label class="custom-control-label" for="user-manage-7">
                                    <span class="d-flex align-items-center">
                                      <img alt="Kristina Van Der Stroem" src="assets/img/avatar-female-4.jpg" class="avatar mr-2" />
                                      <span class="h6 mb-0" data-filter-by="text">Kristina Van Der Stroem</span>
                                    </span>
                                  </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="user-manage-8">
                                  <label class="custom-control-label" for="user-manage-8">
                                    <span class="d-flex align-items-center">
                                      <img alt="David Whittaker" src="assets/img/avatar-male-4.jpg" class="avatar mr-2" />
                                      <span class="h6 mb-0" data-filter-by="text">David Whittaker</span>
                                    </span>
                                  </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="user-manage-9">
                                  <label class="custom-control-label" for="user-manage-9">
                                    <span class="d-flex align-items-center">
                                      <img alt="Kerri-Anne Banks" src="assets/img/avatar-female-5.jpg" class="avatar mr-2" />
                                      <span class="h6 mb-0" data-filter-by="text">Kerri-Anne Banks</span>
                                    </span>
                                  </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="user-manage-10">
                                  <label class="custom-control-label" for="user-manage-10">
                                    <span class="d-flex align-items-center">
                                      <img alt="Masimba Sibanda" src="assets/img/avatar-male-5.jpg" class="avatar mr-2" />
                                      <span class="h6 mb-0" data-filter-by="text">Masimba Sibanda</span>
                                    </span>
                                  </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="user-manage-11">
                                  <label class="custom-control-label" for="user-manage-11">
                                    <span class="d-flex align-items-center">
                                      <img alt="Krishna Bajaj" src="assets/img/avatar-female-6.jpg" class="avatar mr-2" />
                                      <span class="h6 mb-0" data-filter-by="text">Krishna Bajaj</span>
                                    </span>
                                  </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="user-manage-12">
                                  <label class="custom-control-label" for="user-manage-12">
                                    <span class="d-flex align-items-center">
                                      <img alt="Kenny Tran" src="assets/img/avatar-male-6.jpg" class="avatar mr-2" />
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
                          Done
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
                <form class="modal fade" id="project-add-modal" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">New Project</h5>
                        <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                      </div>
                      <!--end of modal head-->
                      <ul class="nav nav-tabs nav-fill" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="project-add-details-tab" data-toggle="tab" href="#project-add-details" role="tab" aria-controls="project-add-details" aria-selected="true">Details</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="project-add-members-tab" data-toggle="tab" href="#project-add-members" role="tab" aria-controls="project-add-members" aria-selected="false">Members</a>
                        </li>
                      </ul>
                      <div class="modal-body">
                        <div class="tab-content">
                          <div class="tab-pane fade show active" id="project-add-details" role="tabpanel">
                            <h6>General Details</h6>
                            <div class="form-group row align-items-center">
                              <label class="col-3">Name</label>
                              <input class="form-control col" type="text" placeholder="Project name" name="project-name" />
                            </div>
                            <div class="form-group row">
                              <label class="col-3">Description</label>
                              <textarea class="form-control col" rows="3" placeholder="Project description" name="project-description"></textarea>
                            </div>
                            <hr>
                            <h6>Timeline</h6>
                            <div class="form-group row align-items-center">
                              <label class="col-3">Start Date</label>
                              <input class="form-control col" type="text" name="project-start" placeholder="Select a date" data-flatpickr data-default-date="2021-04-21" data-alt-input="true" />
                            </div>
                            <div class="form-group row align-items-center">
                              <label class="col-3">Due Date</label>
                              <input class="form-control col" type="text" name="project-due" placeholder="Select a date" data-flatpickr data-default-date="2021-09-15" data-alt-input="true" />
                            </div>
                            <div class="alert alert-warning text-small" role="alert">
                              <span>You can change due dates at any time.</span>
                            </div>
                            <hr>
                            <h6>Visibility</h6>
                            <div class="row">
                              <div class="col">
                                <div class="custom-control custom-radio">
                                  <input type="radio" id="visibility-everyone" name="visibility" class="custom-control-input" checked>
                                  <label class="custom-control-label" for="visibility-everyone">Everyone</label>
                                </div>
                              </div>
                              <div class="col">
                                <div class="custom-control custom-radio">
                                  <input type="radio" id="visibility-members" name="visibility" class="custom-control-input">
                                  <label class="custom-control-label" for="visibility-members">Members</label>
                                </div>
                              </div>
                              <div class="col">
                                <div class="custom-control custom-radio">
                                  <input type="radio" id="visibility-me" name="visibility" class="custom-control-input">
                                  <label class="custom-control-label" for="visibility-me">Just me</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="project-add-members" role="tabpanel">
                            <div class="users-manage" data-filter-list="form-group-users">
                              <div class="mb-3">
                                <ul class="avatars text-center">

                                  <li>
                                    <img alt="Claire Connors" src="assets/img/avatar-female-1.jpg" class="avatar" data-toggle="tooltip" data-title="Claire Connors" />
                                  </li>

                                  <li>
                                    <img alt="Marcus Simmons" src="assets/img/avatar-male-1.jpg" class="avatar" data-toggle="tooltip" data-title="Marcus Simmons" />
                                  </li>

                                  <li>
                                    <img alt="Peggy Brown" src="assets/img/avatar-female-2.jpg" class="avatar" data-toggle="tooltip" data-title="Peggy Brown" />
                                  </li>

                                  <li>
                                    <img alt="Harry Xai" src="assets/img/avatar-male-2.jpg" class="avatar" data-toggle="tooltip" data-title="Harry Xai" />
                                  </li>

                                </ul>
                              </div>
                              <div class="input-group input-group-round">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="material-icons">filter_list</i>
                                  </span>
                                </div>
                                <input type="search" class="form-control filter-list-input" placeholder="Filter members" aria-label="Filter Members">
                              </div>
                              <div class="form-group-users">

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="project-user-1" checked>
                                  <label class="custom-control-label" for="project-user-1">
                                    <span class="d-flex align-items-center">
                                      <img alt="Claire Connors" src="assets/img/avatar-female-1.jpg" class="avatar mr-2" />
                                      <span class="h6 mb-0" data-filter-by="text">Claire Connors</span>
                                    </span>
                                  </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="project-user-2" checked>
                                  <label class="custom-control-label" for="project-user-2">
                                    <span class="d-flex align-items-center">
                                      <img alt="Marcus Simmons" src="assets/img/avatar-male-1.jpg" class="avatar mr-2" />
                                      <span class="h6 mb-0" data-filter-by="text">Marcus Simmons</span>
                                    </span>
                                  </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="project-user-3" checked>
                                  <label class="custom-control-label" for="project-user-3">
                                    <span class="d-flex align-items-center">
                                      <img alt="Peggy Brown" src="assets/img/avatar-female-2.jpg" class="avatar mr-2" />
                                      <span class="h6 mb-0" data-filter-by="text">Peggy Brown</span>
                                    </span>
                                  </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="project-user-4" checked>
                                  <label class="custom-control-label" for="project-user-4">
                                    <span class="d-flex align-items-center">
                                      <img alt="Harry Xai" src="assets/img/avatar-male-2.jpg" class="avatar mr-2" />
                                      <span class="h6 mb-0" data-filter-by="text">Harry Xai</span>
                                    </span>
                                  </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="project-user-5">
                                  <label class="custom-control-label" for="project-user-5">
                                    <span class="d-flex align-items-center">
                                      <img alt="Sally Harper" src="assets/img/avatar-female-3.jpg" class="avatar mr-2" />
                                      <span class="h6 mb-0" data-filter-by="text">Sally Harper</span>
                                    </span>
                                  </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="project-user-6">
                                  <label class="custom-control-label" for="project-user-6">
                                    <span class="d-flex align-items-center">
                                      <img alt="Ravi Singh" src="assets/img/avatar-male-3.jpg" class="avatar mr-2" />
                                      <span class="h6 mb-0" data-filter-by="text">Ravi Singh</span>
                                    </span>
                                  </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="project-user-7">
                                  <label class="custom-control-label" for="project-user-7">
                                    <span class="d-flex align-items-center">
                                      <img alt="Kristina Van Der Stroem" src="assets/img/avatar-female-4.jpg" class="avatar mr-2" />
                                      <span class="h6 mb-0" data-filter-by="text">Kristina Van Der Stroem</span>
                                    </span>
                                  </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="project-user-8">
                                  <label class="custom-control-label" for="project-user-8">
                                    <span class="d-flex align-items-center">
                                      <img alt="David Whittaker" src="assets/img/avatar-male-4.jpg" class="avatar mr-2" />
                                      <span class="h6 mb-0" data-filter-by="text">David Whittaker</span>
                                    </span>
                                  </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="project-user-9">
                                  <label class="custom-control-label" for="project-user-9">
                                    <span class="d-flex align-items-center">
                                      <img alt="Kerri-Anne Banks" src="assets/img/avatar-female-5.jpg" class="avatar mr-2" />
                                      <span class="h6 mb-0" data-filter-by="text">Kerri-Anne Banks</span>
                                    </span>
                                  </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="project-user-10">
                                  <label class="custom-control-label" for="project-user-10">
                                    <span class="d-flex align-items-center">
                                      <img alt="Masimba Sibanda" src="assets/img/avatar-male-5.jpg" class="avatar mr-2" />
                                      <span class="h6 mb-0" data-filter-by="text">Masimba Sibanda</span>
                                    </span>
                                  </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="project-user-11">
                                  <label class="custom-control-label" for="project-user-11">
                                    <span class="d-flex align-items-center">
                                      <img alt="Krishna Bajaj" src="assets/img/avatar-female-6.jpg" class="avatar mr-2" />
                                      <span class="h6 mb-0" data-filter-by="text">Krishna Bajaj</span>
                                    </span>
                                  </label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="project-user-12">
                                  <label class="custom-control-label" for="project-user-12">
                                    <span class="d-flex align-items-center">
                                      <img alt="Kenny Tran" src="assets/img/avatar-male-6.jpg" class="avatar mr-2" />
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
                          Create Project
                        </button>
                      </div>
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

        <div class="layout-switcher-option">
          <a href="nav-side-team.html">
            <img alt="Navigation Side" src="assets/img/layouts/layout-nav-side.svg" class="layout-switcher-icon" />
          </a>
        </div>

        <div class="layout-switcher-option">
          <a href="nav-top-team.html">
            <img alt="Navigation Top" src="assets/img/layouts/layout-nav-top.svg" class="layout-switcher-icon" />
          </a>
        </div>

        <div class="layout-switcher-option active">
          <a href="nav-top-sidebar-team.html">
            <img alt="Content Sidebar" src="assets/img/layouts/layout-nav-top-sidebar.svg" class="layout-switcher-icon" />
          </a>
        </div>

      </div>
    </div>

  </body>


<!-- Mirrored from pipeline.mediumra.re/nav-top-sidebar-team.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jul 2023 08:24:29 GMT -->
</html>