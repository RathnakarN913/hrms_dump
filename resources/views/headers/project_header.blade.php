<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>e-Municipal</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ url('assets/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{ url('assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ url('assets/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ url('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css')}}">
  <link rel="stylesheet" href="{{ url('assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ url('assets/js/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ url('assets/css/vertical-layout-light/style16.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ url('assets/images/favicon.png')}}" />
   <link rel="stylesheet" href="{{ url('assets/css/extracss.css')}}">
   
  
</head>
<style>
    .icon-size {
    font-size: 16px;
    margin-right: 15px;
}
</style>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
	  
        <a class="navbar-brand brand-logo mr-5" href="{{ url('/project-dashboard') }}/{{ Session::get('project_id'); }}"><img src="{{ url('assets/images/main_logo.png')}}" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="{{ url('/project-dashboard') }}/{{ Session::get('project_id'); }}"><img src="{{ url('assets/images/pattana_pragathi.png')}}" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <h3 class="font-weight-bold" style="margin: 0px 10px; color: #000000; font-size: 20px;">{{ Session::get('project_name') }}</h3>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
             <!--  Pattana Pragathi -->
			  
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
			
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{ url('assets/images/faces/face28.jpg')}}" alt="profile"/>
               <span class="name_prfle">{{ Session::get('user_id') }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="{{ url('/logout') }}">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
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
      
      @php
     
      
      
      
      foreach($services as $key=>$val)
      {
      $subMenu[$val->id]=array();
        $mainMenu[$val->menu_parent_id][$val->id]['menu_name'] = $val->menu_name;
        $mainMenu[$val->menu_parent_id][$val->id]['menu_icon'] = $val->menu_icon;
        $mainMenu[$val->menu_parent_id][$val->id]['menu_url'] = $val->menu_url;
        
        $subMenu[$val->menu_parent_id][$val->id]['menu_name'] = $val->menu_name;
        $subMenu[$val->menu_parent_id][$val->id]['menu_icon'] = $val->menu_icon;
        $subMenu[$val->menu_parent_id][$val->id]['menu_url'] = $val->menu_url;
      }
      
      
      
      @endphp
      
      
      
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
            <a class="nav-link" href="{{ url('/dashboard') }}">
              <i class="fas fa-th-large icon-size"></i>
              <span class="menu-title">Main Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/project-dashboard') }}/{{ Session::get('project_id'); }}">
                <i class="fas fa-tachometer-alt icon-size"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
          @foreach($mainMenu[0] as $parentid=>$mainmenudetails)
          
         
          
            @if(count($subMenu[$parentid]) <=0)
            
            <li class="nav-item">
            <a class="nav-link" href="{{ url($mainmenudetails['menu_url']) }}">
              <i class="{{ $mainmenudetails['menu_icon'] }}"></i>
              <span class="menu-title">{{ $mainmenudetails['menu_name'] }}</span>
            </a>
          </li>
          
            @else
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="{{ url($mainmenudetails['menu_url']) }}" aria-expanded="false" aria-controls="{{$parentid}}">
                  <i class="{{ $mainmenudetails['menu_icon'] }}"></i>
                  <span class="menu-title">{{ $mainmenudetails['menu_name'] }}</span>
                  <i class="fas fa-calendar-alt icon-size"></i>
                </a>
                <div class="collapse" id="{{$parentid}}">
              <ul class="nav flex-column sub-menu">
                  
                 @foreach($subMenu[$parentid] as $key=>$submenudetails) 
                    <li class="nav-item">
                         <a class="nav-link" href="{{ $submenudetails['menu_url'] }}">{{ $submenudetails['menu_name'] }}</a>
                    </li>
                    
                @endforeach
                
              </ul>
            </div>
          </li>
          @endif
            
          @endforeach
          
          
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/logout') }}">
              <i class="fas fa-sign-out-alt icon-size"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
      </nav>
      
      
      
      <!-- partial -->