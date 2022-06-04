<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Mission for Elimination of Poverty in Municipal Areas (MEPMA)</title>
  <!--jquery-->
    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style20.css')}}">
   <link rel="stylesheet" href="{{ asset('assets/css/extracss1.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/fontawesome-6.1.1/css/all.css')}}">
 <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap5_icons/bootstrap-icons.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<style>

.sidebar .nav .nav-item .nav-link{
    white-space: inherit !important;
}
.sidebar .nav.sub-menu .nav-item .nav-link{
    padding: 10px !important;
}
.sidebar .nav.sub-menu{
    padding: 0px 6px !important;
}
.sidebar .nav.sub-menu .nav-item::before{
    display:none!important;
}
.myactive {
    color: #ffffff;
    background: #7fa3af !important;
}

    .icon-size {
    font-size: 16px;
    margin-right: 15px;
}
/*.navbar .navbar-menu-wrapper {*/
/*        width: calc(100% - 195px) !important;*/
/*}*/
 #overlay {
     position: fixed;
     top: 0;
     z-index: 1200;
     width: 100%;
     height: 100%;
     display: none;
     background: rgba(0, 0, 0, 0.6);
 }

 .cv-spinner {
     height: 100%;
     display: flex;
     justify-content: center;
     align-items: center;
 }

 .spinner {
     width: 40px;
     height: 40px;
     border: 4px #ddd solid;
     border-top: 4px #2e93e6 solid;
     border-radius: 50%;
     animation: sp-anime 0.8s infinite linear;
 }

 @keyframes sp-anime {
     100% {
         transform: rotate(360deg);
     }
 }

 .is-hide {
     display: none;
 }
 .table td, .jsgrid .jsgrid-table td {
    vertical-align: middle;
}

.ringing{
  display:block;
  width: 40px;
  /*height: 40px;*/
  font-size: 40px;
  /*margin:50px auto 0;*/
  color: #9e9e9e;
  -webkit-animation: ring 4s .7s ease-in-out infinite;
  -webkit-transform-origin: 50% 4px;
  -moz-animation: ring 4s .7s ease-in-out infinite;
  -moz-transform-origin: 50% 4px;
  animation: ring 4s .7s ease-in-out infinite;
  transform-origin: 50% 4px;
}

@-webkit-keyframes ring {
  0% { -webkit-transform: rotateZ(0); }
  1% { -webkit-transform: rotateZ(30deg); }
  3% { -webkit-transform: rotateZ(-28deg); }
  5% { -webkit-transform: rotateZ(34deg); }
  7% { -webkit-transform: rotateZ(-32deg); }
  9% { -webkit-transform: rotateZ(30deg); }
  11% { -webkit-transform: rotateZ(-28deg); }
  13% { -webkit-transform: rotateZ(26deg); }
  15% { -webkit-transform: rotateZ(-24deg); }
  17% { -webkit-transform: rotateZ(22deg); }
  19% { -webkit-transform: rotateZ(-20deg); }
  21% { -webkit-transform: rotateZ(18deg); }
  23% { -webkit-transform: rotateZ(-16deg); }
  25% { -webkit-transform: rotateZ(14deg); }
  27% { -webkit-transform: rotateZ(-12deg); }
  29% { -webkit-transform: rotateZ(10deg); }
  31% { -webkit-transform: rotateZ(-8deg); }
  33% { -webkit-transform: rotateZ(6deg); }
  35% { -webkit-transform: rotateZ(-4deg); }
  37% { -webkit-transform: rotateZ(2deg); }
  39% { -webkit-transform: rotateZ(-1deg); }
  41% { -webkit-transform: rotateZ(1deg); }

  43% { -webkit-transform: rotateZ(0); }
  100% { -webkit-transform: rotateZ(0); }
}

@-moz-keyframes ring {
  0% { -moz-transform: rotate(0); }
  1% { -moz-transform: rotate(30deg); }
  3% { -moz-transform: rotate(-28deg); }
  5% { -moz-transform: rotate(34deg); }
  7% { -moz-transform: rotate(-32deg); }
  9% { -moz-transform: rotate(30deg); }
  11% { -moz-transform: rotate(-28deg); }
  13% { -moz-transform: rotate(26deg); }
  15% { -moz-transform: rotate(-24deg); }
  17% { -moz-transform: rotate(22deg); }
  19% { -moz-transform: rotate(-20deg); }
  21% { -moz-transform: rotate(18deg); }
  23% { -moz-transform: rotate(-16deg); }
  25% { -moz-transform: rotate(14deg); }
  27% { -moz-transform: rotate(-12deg); }
  29% { -moz-transform: rotate(10deg); }
  31% { -moz-transform: rotate(-8deg); }
  33% { -moz-transform: rotate(6deg); }
  35% { -moz-transform: rotate(-4deg); }
  37% { -moz-transform: rotate(2deg); }
  39% { -moz-transform: rotate(-1deg); }
  41% { -moz-transform: rotate(1deg); }

  43% { -moz-transform: rotate(0); }
  100% { -moz-transform: rotate(0); }
}

@keyframes ring {
  0% { transform: rotate(0); }
  1% { transform: rotate(30deg); }
  3% { transform: rotate(-28deg); }
  5% { transform: rotate(34deg); }
  7% { transform: rotate(-32deg); }
  9% { transform: rotate(30deg); }
  11% { transform: rotate(-28deg); }
  13% { transform: rotate(26deg); }
  15% { transform: rotate(-24deg); }
  17% { transform: rotate(22deg); }
  19% { transform: rotate(-20deg); }
  21% { transform: rotate(18deg); }
  23% { transform: rotate(-16deg); }
  25% { transform: rotate(14deg); }
  27% { transform: rotate(-12deg); }
  29% { transform: rotate(10deg); }
  31% { transform: rotate(-8deg); }
  33% { transform: rotate(6deg); }
  35% { transform: rotate(-4deg); }
  37% { transform: rotate(2deg); }
  39% { transform: rotate(-1deg); }
  41% { transform: rotate(1deg); }

  43% { transform: rotate(0); }
  100% { transform: rotate(0); }
}

.navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .count-indicator .count {
    position: absolute;
    left: 47%;
    width: 12px;
    height: 12px;
    border-radius: 100%;
    background: #ff0000;
    top: -2px;
    border: 1px solid #ffffff;
}

.navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .count-indicator i {
    font-size: 2rem;
    vertical-align: middle;
}

.notification {
  /*background-color: #555;*/
  color: white;
  text-decoration: none;
  padding: 15px 26px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}

.notification .badge {
  position: absolute;
  top: -3px;
  right: 2px;
  padding: 3px 5px;
  border-radius: 50%;
  background-color: red;
  color: white;
}


element.style {
}
.preview-list .preview-item .preview-thumbnail .preview-icon {
    padding: 0px;
    text-align: center;
    display: -webkit-flex;
    display: flex;
    -webkit-align-items: center;
    align-items: center;
    -webkit-justify-content: center;
    justify-content: center;
}
.preview-list .preview-item .preview-thumbnail img, .preview-list .preview-item .preview-thumbnail .preview-icon {
    width: 20px;
    height: 20px;
    border-radius: 100%;
}
.navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .navbar-dropdown .dropdown-item i {
    font-size: 12px;
}

input:read-only {
  background-color: #c5c3c3 !important;
}
</style>
<body>
     <div id="overlay">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
         @php
            Session::put('dashboard','dashboard_hrms');
         @endphp
        <a class="navbar-brand brand-logo" href="{{ Session::get('dashboard'); }}"><img src="{{ asset('assets/images/main_logo2.png')}}" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="{{ Session::get('dashboard'); }}"><img src="{{ asset('assets/images/mepma.png')}}" alt="logo"/></a>
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

            	<!--Nofification Bell-->
			<li class="nav-item dropdown">

			    <a class="nav-link count-indicator dropdown-toggle notification" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <!--<span>Inbox</span>-->
                  <i class="icon-bell mx-0"></i>
                  <span id="badge" ></span>
                </a>

            <!--<a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">-->
            <!--  <i class="icon-bell mx-0 ringing">1</i>-->
            <!--  <span class="count"></span>-->
            <!--</a>-->

            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <span id="notification_bar"></span>



            </div>
          </li>

          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{ asset('assets/images/faces/face28.jpg')}}" alt="profile"/>
               <span class="name_prfle">{{ Session::get('user_id') }}</span>
            </a>
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

      use App\Helper\Helpers;
      /*use Request;
      use Session;*/

      /** checkin user authentication ***/
                 $userChk = new Helpers();
                 $result = $userChk->checkUser();
            /** close **/

            /** get assigned menus **/


            $params = array(
                'menu_project_id'=>Session::get('project_id'),
                'user_id'=>Session::get('user_id')
                );


            $services = $userChk->getAssignedMenus($params);
            if(count($services)<=0)
            {
            $services=array('0');
            }

            /** check requested is assigned to the user or not ***/

            $requested_uri = Request::path();
            $arr = explode('/',$requested_uri);



            $assigned_services = $userChk->getURLAuthourization($services,$arr[0]);

            if($assigned_services==0)
            {
                echo "<div class='container'><div class='col-md-12'><div style='color:red; padding-top:8rem' class='text-center' > <br></br><br></br><h2>Your not a authorized user to view this page</h2></div></div></div>";
                exit;
            }





      foreach($services as $key=>$val)
      {
          if($val->show_in_menu_status==1)
          {





                $mainMenu[$val->menu_parent_id][$val->id]['menu_name'] = $val->menu_name;
                $mainMenu[$val->menu_parent_id][$val->id]['menu_icon'] = $val->menu_icon;
                $mainMenu[$val->menu_parent_id][$val->id]['menu_url'] = $val->menu_url;
                $mainMenu[$val->menu_parent_id][$val->id]['id'] = $val->id;
                $mainMenu[$val->menu_parent_id][$val->id]['has_dropdown'] = $val->has_dropdown;

                $subMenu[$val->menu_parent_id][$val->id]['menu_name'] = $val->menu_name;
                $subMenu[$val->menu_parent_id][$val->id]['menu_icon'] = $val->menu_icon;
                $subMenu[$val->menu_parent_id][$val->id]['menu_url'] = $val->menu_url;
            }
      }


      @endphp



    <nav class="sidebar sidebar-offcanvas" id="sidebar">




        <ul class="nav">

             @foreach($mainMenu[0] as $parentid=>$mainmenudetails)

             @if($mainmenudetails['has_dropdown'] =='0')
                  <li class="nav-item">
                    <a class="nav-link {{ (request()->is($mainmenudetails['menu_url'])) ? 'myactive' : '' }}" href="{{ url($mainmenudetails['menu_url']) }}">
                      <i class="{{ $mainmenudetails['menu_icon'] }}"></i>
                      <span class="menu-title">{{ $mainmenudetails['menu_name'] }}</span>
                    </a>
                  </li>
              @else

                  <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic_{{ $parentid }}" aria-expanded="false" aria-controls="ui-basic_{{ $parentid }}">
                      <i class="{{ $mainmenudetails['menu_icon'] }}"></i>
                      <span class="menu-title">{{ $mainmenudetails['menu_name'] }}</span>
                      <i class="menu-arrow"></i>
                    </a>

                    <div class="collapse" id="ui-basic_{{ $parentid }}">

                      <ul class="nav flex-column sub-menu">
                          @foreach($subMenu[$parentid] as $key=>$submenudetails)
                                <li class="nav-item">
                                     <a class="nav-link {{ (request()->is($submenudetails['menu_url'])) ? 'myactive' : '' }}" href="{{ url($submenudetails['menu_url']) }}">{{ $submenudetails['menu_name'] }}</a>
                                </li>
                          @endforeach
                      </ul>

                    </div>
                  </li>

                  @endif

          @endforeach


          <li class="nav-item">
                    <a class="nav-link" href="{{url('logout')}}">
                      <i class="fas fa-sign-out-alt menu-icon"></i>
                      <span class="menu-title">Logout</span>
                    </a>
            </li>

        </ul>




      </nav>
      <!-- partial -->

      <script>
          $(document).ready(function(){
              $.ajax({
                  url:"{{url('get_leave_notifications')}}",
                  type:"GET",
                  data:{},
                  success:function(data){
                      if(data.count >= 1){
                          $('.icon-bell').addClass('ringing');
                          $('#badge').addClass('badge');
                          $('#badge').html(data.count);
                          $('#notification_bar').html(data.html)
                      }
                  }
              })
          })
      </script>





