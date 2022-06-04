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
                            <!--    <div class="col mt-3 mr-3">-->
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
                          <table id="example" class="table table-bordered table-striped mt-3">
                            <thead class="t-head">
                              <tr class="table-primary text-center">
                                <th>S.NO</th>
                                <th>Level</th>
                                <th>District</th>
                                <th>ULB</th>
                                <th>Employee Type</th>
                                <th>No Of Posts</th>

                              </tr>
                            </thead>
                            <tbody class="text-center" id="search_content">
                                @php $i = 1; $vac_tot = 0; $san_tot = 0; @endphp
                                @foreach($designtion as $des)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>
                                         @if($des->level_id == 1)
                                            Head Office
                                            @php
                                                $oc_co = $occupied->where('employee_type',$des->employee_type)->count()
                                            @endphp
                                            
                                        @elseif($des->level_id == 2)
                                            Distict
                                            @php
                                                $oc_co = $occupied->where('employee_type',$des->employee_type)->where('district',@$des->DistricstsModel[0]->distid)->count()
                                            @endphp
                                            
                                        @elseif($des->level_id == 3)
                                            ULB
                                            @php
                                                $oc_co = $occupied->where('employee_type',$des->employee_type)->where('district',@$des->DistricstsModel[0]->distid)->where('ulbid',@$des->UlbmstModel[0]->ulbid)->count()
                                            @endphp
                                            
                                        @else
                                        
                                        @endif
                                    </td>
                                    <td>{{@$des->DistricstsModel[0]->distname}}</td>
                                    <td>{{@$des->UlbmstModel[0]->ulbname}}</td>
                                    <td>
                                        {{@$des->EmployeeType[0]->employee_type_desc}}
                                    </td>
                                    <td>
                                        @if($vac)
                                            {{@$des->post_sanctioned - $oc_co}}
                                            @php
                                                $vac_tot = $vac_tot + @$des->post_sanctioned - $oc_co;
                                            @endphp
                                        @else
                                            {{@$des->post_sanctioned}}
                                            @php
                                                $san_tot = $san_tot + @$des->post_sanctioned;
                                            @endphp
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                <tr class="total-bg">
                                    <td colspan="5">Total</td>
                                    <td>
                                        @if($vac)
                                            {{$vac_tot}}
                                        @else
                                            {{$san_tot}}
                                        @endif
                                    </td>
                                </tr>
                             
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
   


