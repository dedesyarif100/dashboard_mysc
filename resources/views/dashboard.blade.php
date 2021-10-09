<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  <!-- DevExtreme theme -->
  {{-- <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/21.1.5/css/dx.light.css"> --}}
  <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/21.1.5/css/dx.common.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/21.1.5/css/dx.light.css" />

  <!-- DevExtreme library -->
  <script type="text/javascript" src="https://cdn3.devexpress.com/jslib/21.1.5/js/dx.all.js"></script>
  <style>
    #chartdiv {
      width: 100%;
      height: 400px;
    }
    #pie,#pie1,#pie2 {
      height: auto;
    }
  </style>
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="dashboard.html">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="icons.html">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Icons</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="map.html">
                <i class="ni ni-pin-3 text-primary"></i>
                <span class="nav-link-text">Google</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.html">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Profile</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tables.html">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Tables</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.html">
                <i class="ni ni-key-25 text-info"></i>
                <span class="nav-link-text">Login</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.html">
                <i class="ni ni-circle-08 text-pink"></i>
                <span class="nav-link-text">Register</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="upgrade.html">
                <i class="ni ni-send text-dark"></i>
                <span class="nav-link-text">Upgrade</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Documentation</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">Getting started</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html" target="_blank">
                <i class="ni ni-palette"></i>
                <span class="nav-link-text">Foundation</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="_blank">
                <i class="ni ni-ui-04"></i>
                <span class="nav-link-text">Components</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html" target="_blank">
                <i class="ni ni-chart-pie-35"></i>
                <span class="nav-link-text">Plugins</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush">
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>5 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="../assets/img/theme/team-5.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                </div>
                <!-- View all -->
                <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                <div class="row shortcuts px-4">
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                      <i class="ni ni-calendar-grid-58"></i>
                    </span>
                    <small>Calendar</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                      <i class="ni ni-email-83"></i>
                    </span>
                    <small>Email</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                      <i class="ni ni-credit-card"></i>
                    </span>
                    <small>Payments</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                      <i class="ni ni-books"></i>
                    </span>
                    <small>Reports</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                      <i class="ni ni-pin-3"></i>
                    </span>
                    <small>Maps</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                      <i class="ni ni-basket"></i>
                    </span>
                    <small>Shop</small>
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">John Snow</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header pb-6">
      <div class="container-fluid">
        {{-- <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Default</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
          <!-- Card stats -->
        </div> --}}
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt-1">
      <div class="row">
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class=" text-uppercase ls-1 mb-1">Overview</h6>
                  <h5 class="h3 mb-0">Perusahaan (Juli)</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
                <div class="demo-container">
                  <div id="chart-demo">
                    <div id="chart"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <div class="col-xl-6">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class=" text-uppercase ls-1 mb-1">Overview</h6>
                  <h5 class="h3 mb-0">Perusahaan (Agustus)</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
                <div class="demo-container">
                  <div id="chart-demo">
                    <div id="chart1"></div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class=" text-uppercase ls-1 mb-1">Overview</h6>
                  <h5 class="h3 mb-0">Jumlah Perusahaan Berdasarkan Paket</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="demo-container">
                <div id="pie"></div>
              </div>

            </div>
          </div>
        </div>


        <div class="col-xl-6">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class=" text-uppercase ls-1 mb-1">Overview</h6>
                  <h5 class="h3 mb-0">Jumlah Karyawan Berdasarkan Paket</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="demo-container">
                <div id="pie1"></div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col-xl-4 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Total Perusahaan Baru Hari ini</h5>
                  <span class="h2 font-weight-bold mb-0">{{ $count_now }}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="ni ni-badge"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                {{-- <span class="text-danger mr-2"><i class="fa fa-arrow-down"></i> 3.48%</span> --}}
                <?php echo $selisihperusahaan;?>
                <span class="text-nowrap">Sejak akhir bulan lalu</span>
              </p>
            </div>
          </div>
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Total Tugas Proyek Hingga Hari Ini</h5>
                  <span class="h2 font-weight-bold mb-0">{{ $totalprojecttask }}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="ni ni-single-copy-04"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">

              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-8">
          <div class="card" style="height: 90%">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Perusahaan Baru Hari ini</h3>
                </div>
                {{-- <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div> --}}
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">PIC</th>
                    <th scope="col">Paket</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if(count($perusahaan) < 0){
                      for($x=0;$x<count($perusahaan);$x++){
                        echo "<tr>
                            <td style='max-width:251px;white-space:normal;'>".$perusahaan[$x]['nama']."</td>
                            <td style='max-width:251px;white-space:normal;'>".$perusahaan[$x]['jml']."</td>
                            <td>".$perusahaan[$x]['pic']."</td>
                            <td>".$perusahaan[$x]['lic']."</td>
                        </tr>";
                      }
                    } else {
                      echo "<tr>
                            <td>Tidak Ada Data</td>
                        </tr>";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class=" text-uppercase ls-1 mb-1">Overview</h6>
                  <h5 class="h3 mb-0">Jumlah Feedback</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
                <div class="demo-container">
                  <div id="chart-demo">
                    <div id="chart2"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>

      <div class="row">
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col-9">
                  <h6 class=" text-uppercase ls-1 mb-1">Overview</h6>
                  <h5 class="h3 mb-0">Jumlah Feedback Berdasarkan Kategori</h5>
                </div>
                <div class="col-3">
                  <h6 class=" text-uppercase ls-1 mb-1">adudu</h6>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="demo-container">
                <div id="pie2"></div>
              </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Jumlah Feedback Hari ini</h5>
                    <span class="h2 font-weight-bold mb-0">{{ $feedbacktoday }}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                      <i class="ni ni-send"></i>
                    </div>
                  </div>
                </div>
                {{-- <p class="mt-3 mb-0 text-sm">
                  <?php echo $selisihperusahaan;?>
                  <span class="text-nowrap">Sejak akhir bulan lalu</span>
                </p> --}}
              </div>
            </div>
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Total Tugas Proyek Yang Sudah Terselesaikan</h5>
                    <span class="h2 font-weight-bold mb-0">{{ $feedbacksolved }}</span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                      <i class="ni ni-satisfied"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>

      <div class="row">
        <div class="col-xl-12">
          <div class="card" style="height: 90%;">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Daftar Feedback</h3>
                </div>
                {{-- <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div> --}}
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Perusahaan</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach ($datafeedback as $datafeedbacktemp) {
                      echo "<tr>
                        <td>".date("d-m-Y", strtotime($datafeedbacktemp['createdate']))."</td>
                        <td>".$datafeedbacktemp['kategori']."</td>
                        <td>".$datafeedbacktemp['namadepan']." ".$datafeedbacktemp['namabelakang']."</td>
                        <td>".$datafeedbacktemp['perusahaan']."</td>
                        <td style='white-space: normal;'>".$datafeedbacktemp['keterangan']."</td>";
                      if($datafeedbacktemp['solved'] == null){
                        echo "<td> Belum Selsai</td>";
                      } else {
                        echo "<td>Selesai</td>";
                      }
                      echo "</tr>";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>

  <script>
    $(function(){
      var chart = $("#chart").dxChart({
          palette: "blue",
          dataSource: <?php echo $resultables; ?>,
          commonSeriesSettings: {
              type: "spline",
              argumentField: "tgl",
              label: {
                  visible: true,
                  format: {
                      type: "fixedPoint",
                      precision: 0
                  }
              }
          },
          commonAxisSettings: {
              grid: {
                  visible: true
              }
          },
          margin: {
              bottom: 20
          },
          series: [
              { valueField: "value", name: "jumlah" },
          ],
          tooltip:{
              enabled: true,
              customizeTooltip: function (arg) {
                return {
                    text: arg.argumentText + " = " + arg.valueText
                };
              }
          },
          legend: {
              visible: false,
              verticalAlignment: "top",
              horizontalAlignment: "right"
          },
          "export": {
              enabled: false
          },
          argumentAxis: {
              label:{
                  format: {
                      type: "decimal"
                  }
              },
              allowDecimals: false,
              axisDivisionFactor: 60
          },
          title: ""
      }).dxChart("instance");
    });

    $(function(){
      var chart = $("#chart1").dxChart({
          palette: "blue",
          dataSource: <?php echo $resultables1; ?>,
          commonSeriesSettings: {
              type: "spline",
              argumentField: "tgl",
              label: {
                  visible: true,
                  format: {
                      type: "fixedPoint",
                      precision: 0
                  }
              }
          },
          commonAxisSettings: {
              grid: {
                  visible: true
              }
          },
          margin: {
              bottom: 20
          },
          series: [
              { valueField: "value", name: "jumlah" },
          ],
          tooltip:{
              enabled: true,
              customizeTooltip: function (arg) {
                return {
                    text: arg.argumentText + " = " + arg.valueText
                };
              }
          },
          legend: {
              visible: false,
              verticalAlignment: "top",
              horizontalAlignment: "right"
          },
          "export": {
              enabled: false
          },
          argumentAxis: {
              label:{
                  format: {
                      type: "decimal"
                  }
              },
              allowDecimals: false,
              axisDivisionFactor: 60
          },
          title: ""
      }).dxChart("instance");
    });

    $(function(){
      var chart = $("#chart2").dxChart({
          palette: "blue",
          dataSource: <?php echo $dataharianfeedbackline; ?>,
          commonSeriesSettings: {
              type: "spline",
              argumentField: "createdate",
              label: {
                  visible: true,
                  format: {
                      type: "fixedPoint",
                      precision: 0
                  }
              }
          },
          commonAxisSettings: {
              grid: {
                  visible: true
              }
          },
          margin: {
              bottom: 20
          },
          series: [
              { valueField: "jumlah", name: "jumlah" },
          ],
          tooltip:{
              enabled: true,
              customizeTooltip: function (arg) {
                return {
                    text: arg.argumentText + " = " + arg.valueText
                };
              }
          },
          legend: {
              visible: false,
              verticalAlignment: "top",
              horizontalAlignment: "right"
          },
          "export": {
              enabled: false
          },
          argumentAxis: {
              label:{
                  format: {
                      type: "decimal"
                  }
              },
              allowDecimals: false,
              axisDivisionFactor: 60
          },
          title: ""
      }).dxChart("instance");
    });
  </script>

  <script>
    $(function(){
      $("#pie").dxPieChart({
          palette: "bright",
          startAngle: 60,
          dataSource: <?php echo $pieperusahaan; ?>,
          title: "",
          legend: {
              visible: false,
              horizontalAlignment: "center",
              verticalAlignment: "bottom"
          },
          "export": {
              enabled: false
          },
          series: [{
              argumentField: "namapaket",
              valueField: "jumlah",
              label: {
                  visible: true,
                  connector: {
                      visible: true,
                      width: 0.5
                  },
                  format: "fixedPoint",
                  customizeText: function (point) {
                      return point.argumentText + ": " + point.valueText;
                  }
              },
              // smallValuesGrouping: {
              //     mode: "smallValueThreshold",
              //     threshold: 4.5
              // }
          }]
      });
    });

    $(function(){
      $("#pie1").dxPieChart({
          palette: "bright",
          startAngle: 60,
          dataSource: <?php echo $piekaryawan; ?>,
          title: "",
          legend: {
              visible: false,
              horizontalAlignment: "center",
              verticalAlignment: "bottom"
          },
          "export": {
              enabled: false
          },
          series: [{
              argumentField: "namapaket",
              valueField: "jumlahkaryawan",
              label: {
                  visible: true,
                  connector: {
                      visible: true,
                      width: 0.5
                  },
                  format: "fixedPoint",
                  customizeText: function (point) {
                      return point.argumentText + ": " + point.valueText;
                  }
              },
              // smallValuesGrouping: {
              //     mode: "smallValueThreshold",
              //     threshold: 4.5
              // }
          }]
      });
    });

    $(function(){
      $("#pie2").dxPieChart({
          palette: "bright",
          startAngle: 60,
          dataSource: <?php echo $countfeedbackkategori; ?>,
          title: "",
          legend: {
              visible: false,
              horizontalAlignment: "center",
              verticalAlignment: "bottom"
          },
          "export": {
              enabled: false
          },
          series: [{
              argumentField: "jenis",
              valueField: "jumlah",
              label: {
                  visible: true,
                  connector: {
                      visible: true,
                      width: 0.5
                  },
                  format: "fixedPoint",
                  customizeText: function (point) {
                      return point.argumentText + ": " + point.valueText;
                  }
              },
              // smallValuesGrouping: {
              //     mode: "smallValueThreshold",
              //     threshold: 4.5
              // }
          }]
      });
    });
  </script>


</body>

</html>
