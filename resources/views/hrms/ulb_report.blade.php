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
.table td{
    padding:10px !important;
}
.mbl_card {
    margin-left:10px;
}
.total-bg {
        background-color: hsl(56deg 67% 83%) !important;
        font-weight: 600;
}
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
.table-responsive > .table-bordered {
    border: 1px solid #a1a0d4 !important;
}
table.dataTable thead th, table.dataTable thead td {
    padding: 10px 18px;
    border-bottom: 1px solid #a1a0d4 !important;
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
          <div class="row">
            <div class="col-md-12 ">
              
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
    
<div  >
  <div >  
  
    <div class="">
        
      <div class="table-content">
          
        <!--<div class="mb-4"><h4><b>ULB Sanction Posts Report</b></h4></div>-->
        
        <!--<form name="frm" method="post" action="{{ url('/ulbinsert') }}">-->
         <!--@csrf-->
         <div id="table-print " class="">
             
                <!-- <div class="row align-items-center mt-3 mb-3 ">-->
                <!--    <div class="col-md-6">-->
                <!--        <h4><b></b></h4></div>-->
                <!--    <div class="col-md-6">-->
                <!--        <input id="myInput" type="text" placeholder="Search.." class="form-control">-->
                <!--    </div>-->
                <!--</div>-->
            
             <!--<input id="myInput" type="text" placeholder="Search.." class="form-control">-->
             
              <div class="card ">
                          <div class="card-header bg-white"><b>ULB Sanction Posts Report </b></div>
                       <div class="card-body" style="padding-left: 0px !important;">
                           
                            <div class="table-responsive thead-scroll">
                <table class="table table-bordered table-striped " id="example1">
          <thead class="t-head">
            <tr class="table-primary text-center">
              <th rowspan="2" class="sticky-col first-col">S.No</th>
              <th rowspan="2" class="sticky-col second-col">ULB Name</th>
            @foreach($designation as $des)
                <th colspan="3">{{$des->description}}</th>
            @endforeach
          
              <th colspan="3">Total</th>
            </tr>
            <tr class="table-primary text-center">
                @foreach($designation as $des)
                    <td>Occupied</td>
                    <td>Available</td>
                    <td>Total</td>
                @endforeach
              
                <td>Occupied</td>
                <td>Available</td>
                <td>Total</td>
            </tr>
          </thead>
          <tbody class="text-center" id="search_content">
              @php $i = 1; $total_occupy = 0; @endphp
              @foreach($ulblist as $ulb)
                <tr>
                    <td class="sticky-col first-col">{{$i++}}</td>
                    <td class="sticky-col second-col">{{$ulb->ulbname}}</td>
                    @foreach($designation as $des)
                    <td>{{$occupied[$ulb->ulbid][$des->id]}}</td>
                    <td>{{ $count[$ulb->ulbid][$des->id] - $occupied[$ulb->ulbid][$des->id] }}</td>
                    <td>{{$count[$ulb->ulbid][$des->id]}}</td>
                    @endforeach
                    <td>{{$ulb_occupy[$ulb->ulbid]}}</td>
                    <td>{{ $ulb_count[$ulb->ulbid] - $ulb_occupy[$ulb->ulbid] }}</td>
                    <td>{{$ulb_count[$ulb->ulbid]}}</td>
                </tr>
              @endforeach
              
           
           </tbody>
           <tfoot>
               <tr class="total-bg">
                  <th colspan="2" class="sticky-col first-col">Total</th>
                   @foreach($designation as $des)
                   <th>{{$des_occupy[$des->id]}}</th>
                   <th>{{ $des_count[$des->id] - $des_occupy[$des->id] }}</th>
                    <th>{{$des_count[$des->id]}}</th>
                    
                    @php
                        $total_occupy = $total_occupy + $des_occupy[$des->id];
                    @endphp
                    
                   @endforeach
                   <th>{{$total_occupy}}</th>
                   <th>{{$total - $total_occupy}}</th>
                   <th>{{$total}}</th>
              </tr>
           </tfoot>

        </table>
           </div>
                           
                           
                        </div>
              </div>          
              
           
           
        </div>
        
        
          <center>
              
         <button onclick="exportTableToExcel('example', 'Overall report')" class="export-xl btn btn-success btn-sm" style="    background-color: #56a400; border-color: #56a400;">Export Excel</button>
         </center>
        <!--</form>-->
      </div>
    </div>
    
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

 <script>
      $(document).ready(function(){
          $('#example1').DataTable({
                "bPaginate": false,
                dom: 'Bfrtip',
                footerCallback: function (row, data, start, end, display) {
                var api = this.api();
     
                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                };
                
                // Total over this page
                for(let i=2;i<17;i++){
                    pageTotal = api
                    .column(i, { page: 'current' })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
     
                // Update footer
                $(api.column(i).footer()).html(pageTotal);
                }
            },
          });
      })
  </script>
   
   
   