@include('headers.project_header')

<style>
    .table-responsive {
    display: block;
    width: 100%;
    overflow-x: unset !important;

}
</style>


      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Date wise report</h3>
				</span></h6>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  
                 </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="">
              <div class="card">
            <div class="card-body">
                  <form action="" method="post" class="row">
                      @csrf
                      
                          <div class="col-md-3">
                              <label> ULB:</label>
                              <select name="ulbid" class="js-example-basic-single w-100" style="padding: 4px;" required>
                                  <option value="">--- All ----</option>
                                  @foreach($ulbList as $key=>$val)
                                  <option value="{{$val->ulbid}}" @if($val->ulbid==$ulbidsel) selected @endif>{{$val->ulbname}}</option>
                                  @endforeach
                              </select>
                              </div>
                              <div class="col-md-3">
                             <label> Date:</label>
                             <input type="date" id="datepicker" name="datesel" value="{{$fromdatesel}}" class="js-example-basic-single w-100" max="{{ date('Y-m-d') }}" required>
                             </div>
                              <div class="col-md-3">
                              <label>To Date:</label> 
                              <input type="date" id="datepicker2" name="todatesel" value="{{$todatesel}}"  required  max="{{ date('Y-m-d') }}">
                             </div>
                          <input type="submit" name="search" value="search" class="search_btn" style="margin-top: 27px;">
                  </form>
                  </div>
                   </div>
             
          </div>
           
           
            <div class="card mt-4">
            <div class="card-body">
          <div class="row">
           
            <div class="col-md-12 grid-margin transparent">
              <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive" style="overflow-x: unset !important;">
                        @if(count($arr_dates)>0)  
                        <button onclick="exportTableToExcel('example1', 'e-municipal')"  class="export-xl">Export Excel</button>
                      <table id="example1" border="1" class="display expandable-table" style="width:100%">
                          <thead>
                              <tr class="t_head">
                              <td colspan="6"><center>ULB Name: {{ $ulbname }}</center></td>
                             
                          </tr>
                          <tr class="t_head">
                              <td colspan="6"><center>From: {{ date('d-m-Y',strtotime($fromdatesel)) }} to {{ date('d-m-Y',strtotime($todatesel)) }}</center></td>
                              
                          </tr>
                          <tr class="t_head">
                              <td>Sno</td>
                              <td>Date</td>
                              <td>No.of Households</td>
                              <td>No.of Households cleaned</td>
                              <td>No.of Other establishments</td>
                              <td>%</td>
                          </tr>
                         </thead>
                         
                          @php $i=1; $totalhouseholds = 0; $totalhousholdscleaned = 0; @endphp
                          @foreach($arr_dates as $key=>$date)
                          @php 
                          
                          
                          @endphp
                          <tr>
                              <td>{{ $i }}</td>
                              <td><a href="">{{ date('d-m-Y',strtotime($date)) }}</a></td>
                              <td>{{ $houseHoles['households'] }}</td>
                              <td>{{ $houseHolesCleanedData[$date]['cleanedCount'] }}</td>
                              <td>{{ $houseHoles['otherestablishments'] }}</td>
                              <td>{{ $houseHolesCleanedData[$date]['percent'] }}</td>
                          </tr>
                          @php $i++; @endphp
                          @endforeach
                          
                      </table>
                      <button onclick="exportTableToExcel('example1', 'e-municipal')" class="export-xl">Export Excel</button>
                      @endif
                   </div>   
                      
                  </div>
                  
                 
               
              </div>
            </div>
           
            
          </div>
          </div>
          </div>
           
        </div>
        @include('headers.footer')
        
      

<script src="datatables/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="assets/datatables/buttons.html5.js" />
<link rel="stylesheet" type="text/css" href="assets/datatables/buttons.print.js" />


<script type="text/javascript" src="assets/datatables/vfs_fonts.js"></script>
<script type="text/javascript" src="assets/datatables/datatables.min.js"></script>

<script>

    $(document).ready(function() {
        
    $('#example1').DataTable( {
        "bPaginate": false
      
     
    } );
} );
</script>


        


