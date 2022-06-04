@include('headers.common_header')
     
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
          <!--       <div class="row align-items-center mt-3 mb-3 ">-->
          <!--          <div class="col-md-6">-->
          <!--              <h4 class="pl-3"></h4></div>-->
          <!--      <div class="col-md-6">-->
          <!--          <input id="myInput" type="text" placeholder="Search.." class="form-control">-->
          <!--      </div>-->
          <!--  </div>-->
          <!--  </div>-->
          <!--</div>-->
       <!--end top header-->

       <!--end sidebar -->

       <!--start content-->
            <main class="page-content">
                     

                      <div class=" ">
                          
                        <div class="table-content">
                            
                            <div class="card mb-3">
                                <div class="card-header bg-white"> <b> Overall Sanction Posts Report </b> </div>
                                <div class="card-body">
                                    <div class="thead-scroll">
                              
                          <table id="example1" class="table table-bordered table-striped">
                            <thead class="t-head">
                              <tr class="table-primary text-center">
                                <th>S.NO</th>
                                <th>Designation</th>
                                <th>Number of Sanctioned Posts</th>
                                <th>Number of Posts Occupied</th>
                                <th>No of Vacant Posts</th>

                              </tr>
                            </thead>
                            <tbody class="text-center" id="search_content">
                                @php $i = 1; $tot_allot = 0; @endphp
                              @foreach($designations as $des)
                              <tr >
                                <td>{{$i}}</td>
                                <td>{{$des->DesignationgroupModel[0]->designation}}</td>
                                <td><a href="sanctioned_post_inner_report/{{$des->DesignationgroupModel[0]->group_id}}" target="_blank">{{$san[$des->group_id]}}</a></td>
                                <td><a href="occupied_post_inner_report/{{$des->DesignationgroupModel[0]->group_id}}" target="_blank">{{$allot[$des->group_id]}}</a></td>
                                <td><a href="sanctioned_post_inner_report/{{$des->DesignationgroupModel[0]->group_id}}/3" target="_blank">{{$san[$des->group_id] - $allot[$des->group_id]}}</a></td>
                                
                              </tr>
                              
                                
                              @php
                              $tot_allot = $tot_allot + $allot[$des->group_id];
                              $i++;
                              @endphp
                            @endforeach
                            
                            </tbody>
                            <tfoot>
                                <tr class="total-bg">
                                    <th></th>
                                    <th >Total</th>
                                    <th>{{$total_san}}</th>
                                    <th>{{$tot_allot}}</th>
                                    <th>{{$total_san - $tot_allot}}</th>
                                </tr>
                            </tfoot>
                            
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
   
//   <script>
//       $(document).ready(function(){
//           $('#example1').DataTable({
//                 "bPaginate": false,
//                 dom: 'Bfrtip',
//                 footerCallback: function (row, data, start, end, display) {
//                 var api = this.api();
     
//                 // Remove the formatting to get integer data for summation
//                 var intVal = function (i) {
//                     return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
//                 };
                
//                 // Total over this page
//                 for(let i=2;i<5;i++){
//                     pageTotal = api
//                     .column(i, { page: 'current' })
//                     .data()
//                     .reduce(function (a, b) {
//                         return intVal(a) + intVal(b);
//                     }, 0);
     
//                 // Update footer
//                 $(api.column(i).footer()).html(pageTotal);
//                 }
//             },
//           });
//       })
//   </script>


