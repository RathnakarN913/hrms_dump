@include('headers.header')
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
                      <ol class="breadcrumb">
                        <li><i class="bi bi-house-door"></i></li>
                        <li><a href="#" class="">Sanction post page</a> <i class="fas fa-angle-right"></i> </li>
                        <li><a href="#" class=""> District report</a></li>       
                      </ol>

                      <div class="bg-white">
                        <div class="table-content">
                          <div class="mb-4"><b>Head Office Entry for Sanction Post</b></div>
                          <form name="frm" method="get" action="{{ url('/districtinsert') }}">
                            @csrf
                          <table class="table table-bordered width_50">
                            <thead class="t-head">
                              <tr>
                                <th>S.NO</th>
                                 <th>Designation</th>
                                  <th>Number of sanctioned posts</th>

                              </tr>
                            </thead>
                            <tbody class="text-center">
                            <?php $sum=0; ?> 
                            @foreach(@$district as $key=>$val)
                            
                              <tr>
                              <td>{{@$key+1}}</td>
                                <td>{{@$val->description}}</td>
                                 <td><input type="text" name="headoffice_post_no[]" class="form-control" value="{{@$val->post_sanctioned}}"></td>
                                 <input type="hidden" name="desi_id[]" value="{{@$val->id}}">
                                    <?php $sum=$sum+@$val->post_sanctioned; ?>
                              </tr>
                               
                              
                             

                           
                            @endforeach
                            <tr >
                                <th ><b>Total</b></th>
                                 <th><b>{{@$cnt}}</b></th>
                                  <th><b>{{$sum}}</b></th>
                                    
                              </tr>
                               </tbody>
                          </table>
                          
                          <div class="row">
                            <div class="col-md-6 text-center p-0">
                          <!-- <button class="btn btn-primary" >Save</button> -->
                          <input class="btn btn-primary" type="submit" name="save" value="Save">
                        </div>
                        <div class="col-md-6">
                        </div>
                        </div>
                        </form>
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