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


.table td{
    padding:5px !important;
}
.table td input{
    padding:5px;
}

</style>



      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 ">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">District Entry for Sanction Post </h3>
        </span></h6>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  
                 </div>
                </div>
              </div>
            </div>
          </div>
            @if($errors->any())
<div class="alert alert-success alert-dismissible">
                {{$errors->first()}}
            </div>
@endif
       <!--end top header-->

       <!--end sidebar -->

       <!--start content-->
       
        <main class="page-content">
                      <!--<ol class="breadcrumb">-->
                      <!--  <li><i class="bi bi-house-door"></i></li>-->
                      <!--  <li><a href="#" class="">Sanction post page</a> <i class="fas fa-angle-right"></i> </li>-->
                      <!--  <li><a href="#" class=""> District wise report</a></li>       -->
                      <!--</ol>-->

                      <div class="card bg-white mt-4">
                       <div class="card-body">
                        <div class="table-content">
                          <div class="mb-4"><b>District Entry for Sanction Post</b></div>
                          <form name="frm" method="post" action="{{ url('/districtinsert') }}">
                            @csrf
                          <table class="table table-bordered table-striped table-responsive" >
                            <thead class="t-head">
                              <tr class="table-primary">
                                <th>S.NO</th>
                                 <th>District Name</th>
                                 @foreach($designation as $des)
                                 <th>{{$des->description}}</th>
                                 @endforeach
                                 
                                  <th>Total </th>

                              </tr>
                            </thead>
                            <input type="hidden" name="levelid" value="{{$designation[0]->designation_level}}" class="form-control">
                            <tbody class="text-center">
                                @php $i = 1 @endphp
                            @foreach($district as $dist)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$dist->distname}}</td>
                                @for($s=0;$s < count($designation);$s++)
                                    <td>
                                        <input type="text" name="post[]" value="{{$count[$dist->distid][$designation[$s]->id]}}" class="form-control">
                                        <input type="hidden" name="distid[]" value="{{$dist->distid}}" class="form-control">
                                        <input type="hidden" name="desid[]" value="{{$designation[$s]->id}}" class="form-control">
                                        
                                    </td>
                                @endfor
                                <td>{{$dist_count[$dist->distid]}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="2">Total</td>
                                @for($s=0;$s < count($designation);$s++)
                                <td>{{$des_count[$designation[$s]->id]}}</td>
                                @endfor
                                <td></td>
                            </tr>

                            </tbody>
                            
                          </table>
                          <div class="row mt-3">
                            <div class="col-md-12 text-center p-0">
                          <!-- <button class="btn btn-primary" >Save</button> -->
                          <input class="btn btn-primary" type="submit" name="save" value="Save">
                        </div>
                         
                        </div>
                        </form>
                        </div>
                       </div>    
                      </div>
 
              </main>
       
       
        <!--Start Back To Top Button-->
         <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
       <!--End Back To Top Button-->

  </div>
  <!--end wrapper-->

 
  <!-- Bootstrap bundle JS -->
   @include('headers.footer')