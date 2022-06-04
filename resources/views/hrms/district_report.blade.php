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
    padding:10px !important;
}
.table td input{
    padding:5px;
}
.total-bg {
        background-color: hsl(56deg 67% 83%) !important;
        font-weight: 600;
}
.table thead th, .jsgrid .jsgrid-table thead th {
    vertical-align: bottom;
    border-bottom: 1px solid #a1a0d4;
    text-align: center;
    padding: 10px 18px;
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

#myInput{
    width: 50%;
    float:right;
}

.table-content {
padding: 25px;
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
                      <!--<ol class="breadcrumb">-->
                      <!--  <li><i class="bi bi-house-door"></i></li>-->
                      <!--  <li><a href="#" class="">Sanction post page</a> <i class="fas fa-angle-right"></i> </li>-->
                      <!--  <li><a href="#" class=""> District wise report</a></li>       -->
                      <!--</ol>-->
                      
                   <div class="table-content">
                      
                     <!--<div class="row align-items-center">-->
                         
                     <!--       <div class="col-md-6 pl-0"> </div>-->
                            
                     <!--       <div class="col-md-6"><input id="myInput" type="text" placeholder="Search.." class="form-control"></div>-->
                            
                     <!--     </div>-->
                    
                      <div class="card ">
                          <div class="card-header bg-white"><b>District Sanction Posts Report</b></div>
                       <div class="card-body" >
                        
                            
                     
                        
                       
                          
                          
                          <div class="table-responsive thead-scroll">
                          <table class="table table-bordered table-striped " id="example1" >
                            <thead class="t-head">
                              <tr class="table-primary">
                                <th rowspan="2" class="sticky-col first-col">S.No</th>
                                 <th rowspan="2" class="sticky-col second-col">District Name</th>
                                 @foreach($designation as $des)
                                 <th colspan="3">{{$des->description}}</th>
                                 @endforeach
                                 
                                  <th colspan="3" style="width: 2%;">Total </th>

                              </tr>
                              <tr class="table-primary">
                                  @foreach($designation as $des)
                                     <th>Occupied</th>
                                      <th>Available</th>
                                      <th>Total</th>
                                 @endforeach
                                   <th>Occupied</th>
                                      <th>Available</th>
                                      <th>Total</th>
                              </tr>
                              
                            </thead>
                            <input type="hidden" name="levelid" value="{{$designation[0]->designation_level}}" class="form-control">
                            <tbody class="text-center" id="search_content">
                                @php $i = 1; $total_occupy = 0; @endphp
                            @foreach($district as $dist)
                            <tr>
                                <td class="sticky-col first-col">{{$i++}}</td>
                                <td class="sticky-col second-col">{{$dist->distname}}</td>
                                @php
                                    $dist_sum = 0;
                                @endphp
                                @foreach($designation as $des)
                                    <td>{{$occupied[$dist->distid][$des->id]}}</td>
                                    <td>{{ $count[$dist->distid][$des->id] - $occupied[$dist->distid][$des->id] }}</td>
                                    <td>{{$count[$dist->distid][$des->id]}}</td>
                                    
                                    @php
                                        $dist_sum = $dist_sum + $occupied[$dist->distid][$des->id];
                                    @endphp
                                @endforeach
                                
                                    <td>{{$dist_sum}}</td>
                                    <td>{{ $dist_count[$dist->distid] - $dist_sum }}</td>
                                    <td>{{$dist_count[$dist->distid]}}</td>
                            </tr>
                            @endforeach
                            

                            </tbody>
                            <tfoot>
                                <tr class="total-bg">
                                <td colspan="2" class="sticky-col first-col">Total</td>
                                @foreach($designation as $des)
                                    <td>{{$des_occupy[$des->id]}}</td>
                                    <td>{{ $des_count[$des->id] - $des_occupy[$des->id] }}</td>
                                    <td>{{$des_count[$des->id]}}</td>
                                    
                                    @php
                                        $total_occupy = $total_occupy + $des_occupy[$des->id];
                                    @endphp
                                
                                @endforeach
                                
                                <td>{{$total_occupy}}</td>
                                <td>{{ $total - $total_occupy }}</td>
                                <td>{{$total}}</td>
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
              </main>
       
       
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
                for(let i=2;i<32;i++){
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