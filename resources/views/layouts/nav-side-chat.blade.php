<!doctype html>
<html lang="en">

  
<!-- Mirrored from pipeline.mediumra.re/nav-side-chat.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jul 2023 08:24:20 GMT -->
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

        <div class="navbar bg-white breadcrumb-bar">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Overview</a>
              </li>
              <li class="breadcrumb-item"><a href="pages-app.html#">App Pages</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Chat</li>
            </ol>
          </nav>

          <div class="dropdown">
            <button class="btn btn-round" role="button" data-toggle="dropdown" aria-expanded="false">
              <i class="material-icons">settings</i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">

              <a class="dropdown-item" href="#">Manage Members</a>
              <a class="dropdown-item" href="#">Subscribe</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" href="#">Leave Chat</a>

            </div>
          </div>

        </div>
        <div class="content-container">
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
          <div class="sidebar collapse" id="sidebar-collapse">
            <div class="sidebar-content">
              <div class="chat-team-sidebar text-small">
                <div class="chat-team-sidebar-top">
                  <div class="media align-items-center">
                    <a href="#" class="mr-2">
                      <img alt="Team Avatar" src="assets/img/logo-team.jpg" class="avatar avatar-lg" />
                    </a>
                    <div class="media-body">
                      <h5 class="mb-1">Pipeline Fans</h5>
                      <p>A collective of Pipeline enthusiasts sharing the the love</p>
                    </div>
                  </div>
                  <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="members-tab" data-toggle="tab" href="#members" role="tab" aria-controls="members" aria-selected="true">Members</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="files-tab" data-toggle="tab" href="#files" role="tab" aria-controls="files" aria-selected="false">Files</a>
                    </li>
                  </ul>
                </div>
                <div class="chat-team-sidebar-bottom">
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="members" role="tabpanel" data-filter-list="list-group">
                      <form class="px-3 mb-3">
                        <div class="input-group input-group-round">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">filter_list</i>
                            </span>
                          </div>
                          <input type="search" class="form-control filter-list-input" placeholder="Filter members" aria-label="Filter Members">
                        </div>
                      </form>
                      <div class="list-group list-group-flush">

                        <a class="list-group-item list-group-item-action" href="#">
                          <div class="media media-member mb-0">
                            <img alt="Claire Connors" src="assets/img/avatar-female-1.jpg" class="avatar" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">Claire Connors</h6>
                              <span data-filter-by="text">Administrator</span>
                            </div>
                          </div>
                        </a>

                        <a class="list-group-item list-group-item-action" href="#">
                          <div class="media media-member mb-0">
                            <img alt="Marcus Simmons" src="assets/img/avatar-male-1.jpg" class="avatar" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">Marcus Simmons</h6>
                              <span data-filter-by="text">Administrator</span>
                            </div>
                          </div>
                        </a>

                        <a class="list-group-item list-group-item-action" href="#">
                          <div class="media media-member mb-0">
                            <img alt="Peggy Brown" src="assets/img/avatar-female-2.jpg" class="avatar" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">Peggy Brown</h6>
                              <span data-filter-by="text">Project Manager</span>
                            </div>
                          </div>
                        </a>

                        <a class="list-group-item list-group-item-action" href="#">
                          <div class="media media-member mb-0">
                            <img alt="Harry Xai" src="assets/img/avatar-male-2.jpg" class="avatar" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">Harry Xai</h6>
                              <span data-filter-by="text">Project Manager</span>
                            </div>
                          </div>
                        </a>

                        <a class="list-group-item list-group-item-action" href="#">
                          <div class="media media-member mb-0">
                            <img alt="Sally Harper" src="assets/img/avatar-female-3.jpg" class="avatar" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">Sally Harper</h6>
                              <span data-filter-by="text">Developer</span>
                            </div>
                          </div>
                        </a>

                        <a class="list-group-item list-group-item-action" href="#">
                          <div class="media media-member mb-0">
                            <img alt="Ravi Singh" src="assets/img/avatar-male-3.jpg" class="avatar" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">Ravi Singh</h6>
                              <span data-filter-by="text">Developer</span>
                            </div>
                          </div>
                        </a>

                        <a class="list-group-item list-group-item-action" href="#">
                          <div class="media media-member mb-0">
                            <img alt="Kristina Van Der Stroem" src="assets/img/avatar-female-4.jpg" class="avatar" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">Kristina Van Der Stroem</h6>
                              <span data-filter-by="text">Developer</span>
                            </div>
                          </div>
                        </a>

                        <a class="list-group-item list-group-item-action" href="#">
                          <div class="media media-member mb-0">
                            <img alt="David Whittaker" src="assets/img/avatar-male-4.jpg" class="avatar" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">David Whittaker</h6>
                              <span data-filter-by="text">Designer</span>
                            </div>
                          </div>
                        </a>

                        <a class="list-group-item list-group-item-action" href="#">
                          <div class="media media-member mb-0">
                            <img alt="Kerri-Anne Banks" src="assets/img/avatar-female-5.jpg" class="avatar" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">Kerri-Anne Banks</h6>
                              <span data-filter-by="text">Marketing</span>
                            </div>
                          </div>
                        </a>

                        <a class="list-group-item list-group-item-action" href="#">
                          <div class="media media-member mb-0">
                            <img alt="Masimba Sibanda" src="assets/img/avatar-male-5.jpg" class="avatar" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">Masimba Sibanda</h6>
                              <span data-filter-by="text">Designer</span>
                            </div>
                          </div>
                        </a>

                        <a class="list-group-item list-group-item-action" href="#">
                          <div class="media media-member mb-0">
                            <img alt="Krishna Bajaj" src="assets/img/avatar-female-6.jpg" class="avatar" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">Krishna Bajaj</h6>
                              <span data-filter-by="text">Marketing</span>
                            </div>
                          </div>
                        </a>

                        <a class="list-group-item list-group-item-action" href="#">
                          <div class="media media-member mb-0">
                            <img alt="Kenny Tran" src="assets/img/avatar-male-6.jpg" class="avatar" />
                            <div class="media-body">
                              <h6 class="mb-0" data-filter-by="text">Kenny Tran</h6>
                              <span data-filter-by="text">Contributor</span>
                            </div>
                          </div>
                        </a>

                      </div>
                    </div>
                    <div class="tab-pane fade" id="files" role="tabpanel" data-filter-list="dropzone-previews">
                      <form class="px-3 mb-3">
                        <div class="input-group input-group-round">
                          <div class="input-group-prepend">
                            <span class="input-group-text">
                              <i class="material-icons">filter_list</i>
                            </span>
                          </div>
                          <input type="search" class="form-control filter-list-input" placeholder="Filter files" aria-label="Filter Files">
                        </div>
                      </form>
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
                                <img alt="David Whittaker" src="assets/img/avatar-male-4.jpg" class="avatar" data-title="David Whittaker" data-toggle="tooltip" />
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
                                <button class="btn-options" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="material-icons">more_vert</i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="#">Download</a>
                                  <a class="dropdown-item" href="#">Share</a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item text-danger" href="#" data-dz-remove>Delete</a>
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

                      <ul class="list-group list-group-activity dropzone-previews flex-column-reverse list-group-flush">

                        <li class="list-group-item">
                          <div class="media align-items-center">
                            <ul class="avatars">
                              <li>
                                <div class="avatar bg-primary">
                                  <i class="material-icons">insert_drive_file</i>
                                </div>
                              </li>
                              <li>
                                <img alt="Peggy Brown" src="assets/img/avatar-female-2.jpg" class="avatar" data-title="Peggy Brown" data-toggle="tooltip" data-filter-by="data-title" />
                              </li>
                            </ul>
                            <div class="media-body d-flex justify-content-between align-items-center">
                              <div>
                                <a href="#" data-filter-by="text">client-questionnaire</a>
                                <br>
                                <span class="text-small" data-filter-by="text">48kb Text Doc</span>
                              </div>
                              <div class="dropdown">
                                <button class="btn-options" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                <img alt="Harry Xai" src="assets/img/avatar-male-2.jpg" class="avatar" data-title="Harry Xai" data-toggle="tooltip" data-filter-by="data-title" />
                              </li>
                            </ul>
                            <div class="media-body d-flex justify-content-between align-items-center">
                              <div>
                                <a href="#" data-filter-by="text">moodboard_images</a>
                                <br>
                                <span class="text-small" data-filter-by="text">748kb ZIP</span>
                              </div>
                              <div class="dropdown">
                                <button class="btn-options" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                <img alt="Ravi Singh" src="assets/img/avatar-male-3.jpg" class="avatar" data-title="Ravi Singh" data-toggle="tooltip" data-filter-by="data-title" />
                              </li>
                            </ul>
                            <div class="media-body d-flex justify-content-between align-items-center">
                              <div>
                                <a href="#" data-filter-by="text">possible-hero-image</a>
                                <br>
                                <span class="text-small" data-filter-by="text">1.2mb JPEG image</span>
                              </div>
                              <div class="dropdown">
                                <button class="btn-options" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                  <i class="material-icons">insert_drive_file</i>
                                </div>
                              </li>
                              <li>
                                <img alt="Claire Connors" src="assets/img/avatar-female-1.jpg" class="avatar" data-title="Claire Connors" data-toggle="tooltip" data-filter-by="data-title" />
                              </li>
                            </ul>
                            <div class="media-body d-flex justify-content-between align-items-center">
                              <div>
                                <a href="#" data-filter-by="text">LandingPrototypes</a>
                                <br>
                                <span class="text-small" data-filter-by="text">415kb Sketch Doc</span>
                              </div>
                              <div class="dropdown">
                                <button class="btn-options" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                  <i class="material-icons">insert_drive_file</i>
                                </div>
                              </li>
                              <li>
                                <img alt="David Whittaker" src="assets/img/avatar-male-4.jpg" class="avatar" data-title="David Whittaker" data-toggle="tooltip" data-filter-by="data-title" />
                              </li>
                            </ul>
                            <div class="media-body d-flex justify-content-between align-items-center">
                              <div>
                                <a href="#" data-filter-by="text">Branding-Proforma</a>
                                <br>
                                <span class="text-small" data-filter-by="text">15kb Text Document</span>
                              </div>
                              <div class="dropdown">
                                <button class="btn-options" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

        <div class="layout-switcher-option active">
          <a href="nav-side-chat.html">
            <img alt="Navigation Side" src="assets/img/layouts/layout-nav-side.svg" class="layout-switcher-icon" />
          </a>
        </div>

        <div class="layout-switcher-option">
          <a href="nav-top-sidebar-chat.html">
            <img alt="Content Sidebar" src="assets/img/layouts/layout-nav-top-sidebar.svg" class="layout-switcher-icon" />
          </a>
        </div>

      </div>
    </div>

  </body>


<!-- Mirrored from pipeline.mediumra.re/nav-side-chat.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jul 2023 08:24:21 GMT -->
</html>