<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Mission for Elimination of Poverty in Municipal Areas (MEPMA)</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style20.css')}}">
   <!--<link rel="stylesheet" href="{{ asset('assets/css/extracss1.css')}}">-->
  <!--<link rel="stylesheet" href="{{ asset('assets/css/extracss.css')}}">-->
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png')}}" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">

        <a class="navbar-brand brand-logo mr-5" href="{{ url('/dashboard') }}"><img src="{{ asset('assets/images/main_logo2.png')}}" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="{{ url('/dashboard') }}"><img src="{{ asset('assets/images/mepma.png')}}" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>

        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
             <!--  Pattana Pragathi -->

            </div>
          </li>
        </ul>

        <ul class="navbar-nav navbar-nav-right">
			<img src="https://telangana.emunicipal.in/assets/images/ktr-kcr1-b.png"class="kcr_ktr">

			<!--Nofification Bell-->
			<li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>


          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <!--<img src="{{ asset('assets/images/faces/face28.jpg')}}" alt="profile"/>-->
              <span class="name_prfle">{{ Session::get('user_id') }}</span>
            </a>
            <!--<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">-->
            <!--  <a class="dropdown-item">-->
            <!--    <i class="ti-settings text-primary"></i>-->
            <!--    Settings-->
            <!--  </a>-->
            <!--  <a class="dropdown-item" href="{{ url('/logout') }}">-->
            <!--    <i class="ti-power-off text-primary"></i>-->
            <!--    Logout-->
            <!--  </a>-->
            <!--</div>-->
          </li>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>

      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->



      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('dashboard') }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/logout') }}">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
      </nav>



      <!-- partial -->
