@include('headers.project_header')




      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Ward wise report</h3>
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
                              <select name="ulbid" class="js-example-basic-single w-100" style="padding: 4px;">
                                  <option value="">--- All ----</option>
                                  @foreach($ulbList as $key=>$val)
                                  <option value="{{$val->ulbid}}" @if($val->ulbid==$ulbidsel) selected @endif>{{$val->ulbname}}</option>
                                  @endforeach
                              </select>
                              </div>
                              <div class="col-md-3">
                             <label> Date: </label>
                             <input type="date" id="datepicker" name="datesel" value="{{$fromdatesel}}" class="js-example-basic-single w-100">
                              <!--To Date: <input type="date" id="datepicker2" name="todatesel" value="{{$todatesel}}">-->
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
                    <div class="table-responsive" style="overflow-x:unset !important">
                        <button onclick="exportTableToExcel('example1', 'e-municipal')" class="export-xl">Export Excel</button>  
                      <table id="example1" border="1" class="display expandable-table" style="width:100%">
                          <thead>
                            <tr class="t_head">
                              <td colspan="6"><center>ULB Name: {{ $ulbname }}</center></td>
                             
                          </tr>
                          <tr class="t_head">
                              <td colspan="2"><center>Date: {{ date('d',strtotime($fromdatesel)) }}</center></td>
                              <td colspan="4"><center>Month: {{ date('m',strtotime($fromdatesel)) }}</center></td>
                          </tr>
                          <tr class="t_head">
                              <td>Sno</td>
                              <td>ULB name</td>
                              <td>No.of Households</td>
                              <td>No.of Households cleaned</td>
                              <td>No.of Other establishments</td>
                              <td>%</td>
                          </tr>
                         </thead>  
                          @php $i=1; $totalhouseholds = 0; $totalhousholdscleaned = 0; $totalOtherEstablishments = 0; @endphp
                          @foreach($ulbListsearch as $key=>$val)
                          @php 
                          $totalhouseholds+=$houseHoles[$val->ulbid]['households'];
                          $totalhousholdscleaned+=$houseHolesCleanedData[$val->ulbid]['cleanedCount'];
                          $totalOtherEstablishments+=$houseHoles[$val->ulbid]['otherestablishments'];
                          
                          @endphp
                          <tr>
                              <td>{{ $i }}</td>
                              <td><a href="{{ url('ulb-ward-wise-report') }}?ulbid={{$val->ulbid}}&datefrom={{$fromdatesel}}&dateto={{$todatesel}}&flag=1">{{$val->ulbname}}</a></td>
                              <td>{{ $houseHoles[$val->ulbid]['households'] }}</td>
                              <td>{{ $houseHolesCleanedData[$val->ulbid]['cleanedCount'] }}</td>
                              <td>{{ $houseHoles[$val->ulbid]['otherestablishments'] }}</td>
                              <td>{{ $houseHolesCleanedData[$val->ulbid]['percent'] }}</td>
                          </tr>
                          @php $i++; @endphp
                          @endforeach
                          <tfoot>
                              <tr>
                              <td></td>
                              <td></td>
                              <td>{{ $totalhouseholds }}</td>
                              <td>{{ $totalhousholdscleaned }}</td>
                              <td>{{ $totalOtherEstablishments }}</td>
                              <td>
                                  @if($totalhouseholds > 0)
                                  {{number_format($totalhousholdscleaned/$totalhouseholds*100,2)}}
                                  @else
                                  0
                                  @endif
                             </td>
                              </tr>
                          </tfoot>
                      </table>
                      <button onclick="exportTableToExcel('example1', 'e-municipal')" class="export-xl">Export Excel</button>
                   </div>   
                      
                  </div>
                  
                 
               
              </div>
            </div>
           
            
          </div>
          </div>
          </div>
           
        </div>
        @include('headers.footer')
        
        <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.js"></script>
<script>
$(document).ready(function()
{
    $( "#datepicker" ).datepicker();
});

</script>-->

<script src="datatables/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="assets/datatables/buttons.html5.js" />
<link rel="stylesheet" type="text/css" href="assets/datatables/buttons.print.js" />


<script type="text/javascript" src="assets/datatables/vfs_fonts.js"></script>
<script type="text/javascript" src="assets/datatables/datatables.min.js"></script>

<script>

    $(document).ready(function() {
        
        $('#example1').DataTable( {
        "bPaginate": false,
      
    } );
    
    /*$('#example1').DataTable( {
        "bPaginate": false,
      dom: 'Bfrtip',
      buttons: [
         {
          extend: 'csv',
          "download": "download",
          
        },
        {
          extend: 'excel',
          "download": 'download',
          
        }
      ]
    } );*/
} );



</script>


        


