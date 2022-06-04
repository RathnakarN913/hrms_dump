@include('headers.project_header')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.css"/>



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
             <div class="card">
          <div class="card-body">
                  <form action="" method="post" class="row">
                      @csrf
                      <div class="col-md-3">
                    <label> Date:</label>
                     <input type="date" id="datepicker" name="datesel" value="{{$datesel}}">
                     </div>
                  <input type="submit" name="search" value="search" class="search_btn" style="margin-top:27px;">
                  </form>
             </div>
           </div>
          
           
           
            <div class="card mt-4">
          <div class="card-body">
          <div class="row">
           
            <div class="col-md-12 grid-margin transparent">
              <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive" style="overflow-x: unset !important;">  
                      <table id="example1" class="display expandable-table" style="width:100%">
                          <thead>
                          <tr>
                              <td>Sno</td>
                              <td>Ward name</td>
                              <td>No.of Households</td>
                              <td>No.of Households cleaned</td>
                              <td>%</td>
                          </tr>
                         </thead>  
                          @php $i=1; $totalhouseholds = 0; $totalhousholdscleaned = 0; @endphp
                          @foreach($wardList as $key=>$val)
                          @php 
                          $totalhouseholds+=$houseHoles[$val->ward_id]['households'];
                          $totalhousholdscleaned+=$houseHolesCleanedData[$val->ward_id]['cleanedCount'];
                          
                          @endphp
                          <tr>
                              <td>{{ $i }}</td>
                              <td>{{$val->ward_desc}}</td>
                              <td>{{$houseHoles[$val->ward_id]['households']}}</td>
                              <td>{{$houseHolesCleanedData[$val->ward_id]['cleanedCount']}}</td>
                              <td>{{$houseHolesCleanedData[$val->ward_id]['percent']}}</td>
                          </tr>
                          @php $i++; @endphp
                          @endforeach
                          <tfoot>
                              <tr>
                              <td></td>
                              <td></td>
                              <td>{{$totalhouseholds}}</td>
                              <td>{{$totalhousholdscleaned}}</td>
                              <td>{{number_format($totalhousholdscleaned/$totalhouseholds*100,2)}}</td>
                              </tr>
                          </tfoot>
                      </table>
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
      dom: 'Bfrtip',
      buttons: [
         {
          extend: 'csv',
          "download": "download"
        },
        {
          extend: 'excel',
          "download": 'download'
        }
      ]
    } );
} );
</script>


        


