@include('headers.common_header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .card {
    border-radius: 10px;
}
.card-body {
       padding: 0.50rem !important;
}
.card-set {
    width: 240px;
    height: 110px;
    background: white;
    padding:0.50rem;
}
.mbl_card {
    margin-left:10px;
}

</style>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 ">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome to e-Municipal</h3>
        </span></h6>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  
                 </div>
                </div>
              </div>
            </div>
          </div>
       <!--end top header-->

       <!--end sidebar -->

       <!--start content-->
            <main class="page-content">
                      <!--<ol class="breadcrumb">-->
                      <!--  <li><i class="bi bi-house-door"></i></li>-->
                      <!--  <li><a href="#" class="">Sanction post page</a> <i class="fas fa-angle-right"></i> </li>-->
                      <!--  <li><a href="#" class="">Over all report</a></li>       -->
                      <!--</ol>-->

                      <div class="bg-white">
                        <div class="table-content">
                          <div class="mb-4"><b>Over all wise posts report</b></div>
                          <table class="table table-bordered table-responsive" id="example">
                            <thead class="t-head">
                              <tr>
                                <th>S.NO</th>
                                 <th>Designation</th>
                                  <th>Number of sanctioned posts</th>
                                   <th>Number of posts occupied</th>
                                    <th>No of vacant posts</th>

                              </tr>
                            </thead>
                            <tbody class="text-center">
                              <?php $s_post=0; $o_post=0; $v_post=0;?>
                              @foreach(@$overall as $key=>$val)
                              <tr>
                              <td>{{@$key+1}}</td>
                                <td>{{@$val->description}}</td>
                                <td> @if(@$val->post_sanctioned=="") {{0}} @else  {{@$val->post_sanctioned}} @endif</td>
                               
                                  <td>0</td>
                                   <td><?php echo $no_v_post=@$val->post_sanctioned-0; ?></td>
                                    <?php $s_post=$s_post+@$val->post_sanctioned;
                                          $o_post=$o_post;
                                          $v_post=$v_post+$no_v_post; ?>
                              </tr>
                             @endforeach
                              <tr >
                                <td>Total</td>
                                <td>Total</td>
                                 <td>{{@$s_post}}</td>
                                  <td>{{@$o_post}}</td>
                                   <td>{{@$v_post}}</td>
                                    
                              </tr>

                            </tbody>
                            
                          </table>
                        </div>
                      </div>

              </main>
       <!--end page main-->


       <!--Start Back To Top Button-->
         <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
       <!--End Back To Top Button-->

  </div>
  <!--end wrapper-->

 
  <!-- Bootstrap bundle JS -->
   @include('headers.footer')