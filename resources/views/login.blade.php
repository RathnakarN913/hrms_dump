
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Mission for Elimination of Poverty in Municipal Areas (MEPMA)</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ url('assets/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ url('assets/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ url('assets/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ url('assets/css/vertical-layout-light/style20.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ url('assets/images/favicon.png') }}" />
  <style>
      .btn-login {
    background-color:#327c95 !important;
    color:white;
}
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-start pt-3">
          
           <!--<img src="{{ url('assets/images/pattana_pragathi_login.png') }}" alt="logo">-->
          </p>
          </div>
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
               <div style="font-size:28px; font-weight:bold;"> Mission for Elimination of Poverty in Municipal Areas (MEPMA) </div>
                
              </div>
              
              @if(session()->has('error') || session()->has('wrong'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }} {{ session()->get('wrong') }} 
                    </div>
              @endif
                        
               {{Form::open(array('url'=>'/checkLogin','method'=>'POST','autocomplete'=>'off','id'=>'myform'))}}
                @csrf
              <form class="pt-3" action="" method="post">
                  @csrf
                <div class="form-group">
                  <label for="exampleInputEmail">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-user text-primary"></i>
                      </span>
                    </div>
                     {{Form::text('username','',array('class'=>'form-control form-control-lg border-left-0','placeholder'=>'User name',
				                 'id'=>'username','autocomplete'=>'off','required'=>'required', 'placeholder'=>'User name'))}}
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="ti-lock text-primary"></i>
                      </span>
                    </div>
                    {{Form::password('password',array('class'=>'form-control form-control-lg border-left-0','placeholder'=>'Password',
                		                    'id'=>'password','autocomplete'=>'off','required'=>'required'))}}
                				                          
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <!--<div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>-->
                  <!--<a href="#" class="auth-link text-black">Forgot password?</a>-->
                </div>
                <div class="my-3">
                  
                  {{Form::submit('Login', array('class'=>'btn btn-block btn-login btn-lg font-weight-medium auth-form-btn','value'=>'login','name'=>'submit'))}}
                </div>
               
               <br><br>
             <div class="text-center">
                 Powered by <br>
                 <img src="assets/images/vmax2.png" width="100">
             </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ url('assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ url('assets/js/off-canvas.js') }}"></script>
  <script src="{{ url('assets/js/hoverable-collapse.js') }}"></script>
  <script src="{{ url('assets/js/template.js') }}"></script>
  <script src="{{ url('assets/js/settings.js') }}"></script>
  <script src="{{ url('assets/js/todolist.js') }}"></script>
  <script src="{{ url('assets/js/login.js') }}"></script>
  <!-- endinject -->
</body>

</html>
