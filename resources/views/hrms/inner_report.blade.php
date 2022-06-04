@include('headers.common_header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
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
table.dataTable tbody th, table.dataTable tbody td {
    padding: 10px 10px !important;
}
.mbl_card {
    margin-left:10px;
}
.total-bg {
        background-color: hsl(56deg 67% 83%) !important;
        font-weight: 600;
}
.modal-body .thead{
    padding : 5px;
    border: 1px solid black;
}

#myInput{
    width: 50%;
    float:right;
}

.table-content {
padding: 25px;
}

</style>
      <div class="main-panel">
        <div class="content-wrapper">
          <!--<div class="row">-->
          <!--  <div class="col-md-12 ">-->
          <!--    <div class="row">-->
          <!--      <div class="col-12 col-xl-8 mb-4 mb-xl-0">-->
                  <!--<div class="mb-4"><b>Overall Sanction Posts Report</b></div>-->
          <!--      </div>-->
          <!--      <div class="col-12 col-xl-4">-->
          <!--       <div class="justify-content-end d-flex">-->
                  
          <!--       </div>-->
          <!--      </div>-->
          <!--    </div>-->
          <!--  </div>-->
          <!--</div>-->
       <!--end top header-->

       <!--end sidebar -->

       <!--start content-->
            <main class="page-content">
                     

                      <div class=" ">
                          
                        <div class="table-content">
                          
                            <!--<div class="row">-->
                            <!--    <div class="col">-->
                            <!--        <h3>{{$curr_des}}</h3>-->
                            <!--    </div>-->
                            <!--    <div class="col">-->
                            <!--        <input id="myInput" type="text" placeholder="Search.." class="form-control">-->
                            <!--    </div>-->
                            <!--</div>-->
                                <div class="row align-items-center mt-3 mb-3 ">
                                    <div class="col-md-6">
                                        <h4><b> </b></h4></div>
                                <div class="col-md-6">
                                    <input id="myInput" type="text" placeholder="Search.." class="form-control">
                                </div>
                            </div>
                            
                            
                            <div class="card mb-3">
                                <div class="card-header bg-white"> <b> {{$curr_des}} </b> </div>
                                <div class="card-body">
                            
                                    <div class="thead-scroll table-responsive">
                          <table id="example" class="table table-bordered table-striped">
                            <thead class="t-head">
                              <tr class="table-primary text-center">
                                <th>S.NO</th>
                                <th>Employee Id</th>
                                <th>Employee Name</th>
                                <th>Employee Type</th>
                                <th>Mobile No.</th>
                                <th>Level</th>
                                <th>District</th>
                                <th>ULB</th>
                                

                              </tr>
                            </thead>
                            <tbody class="text-center" id="search_content">
                                @php $i = 1; $tot_allot = 0; @endphp
                                @foreach($emp as $em)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$em->GetEmployee->emp_id}}</td>
                                    <td>{{$em->GetEmployee->name}}</td>
                                    <td>
                                        @if($em->GetEmployee->employee_type == 1)
                                            HR Policy
                                        @elseif($em->GetEmployee->employee_type == 2)
                                            Outsourcing
                                        @elseif($em->GetEmployee->employee_type == 3)
                                            Government
                                        @else
                                        @endif
                                    </td>
                                    <td>{{$em->GetEmployee->mobile_number}}</td>
                                    <td>
                                        @if($em->GetDesignation->designation_level == 1)
                                            Head Office
                                        @elseif($em->GetDesignation->designation_level == 2)
                                            district
                                        @elseif($em->GetDesignation->designation_level == 3)
                                            ULB
                                        @else
                                            
                                        @endif
                                    </td>
                                    <td>{{@$em->DistricstsModel->distname}}</td>
                                    <td>{{@$em->UlbmstModel->ulbname}}</td>
                                </tr>
                                @endforeach
                             
                            </tbody>
                            
                          </table>
                          </div>
                            
                                </div>
                           </div> 
                            
                            
                            
                            
                            
                          
                           
                          <center>
                         <button onclick="exportTableToExcel('example', 'Overall report')" class="export-xl btn btn-success btn-sm" style="    background-color: #56a400; border-color: #56a400;">Export Excel</button>
                         </center>
                        </div>
                      </div>

              </main>
       <!--end page main-->


       <!--Start Back To Top Button-->
         <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
       <!--End Back To Top Button-->

  </div>
  <!--end wrapper-->
<script>
    var myApp = new function () {
        this.printTable = function () {
            var tab = document.getElementById('example');
            var win = window.open('', '', 'height=1000,width=1000');
            win.document.write(tab.outerHTML);
            win.document.close();
            win.print();
        }
    }
</script>


 
  <!-- Bootstrap bundle JS -->
   @include('headers.footer')
   


