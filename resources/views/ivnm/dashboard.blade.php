@include('headers.common_header')
<style>
       .table th, .jsgrid .jsgrid-table th, .table td, .jsgrid .jsgrid-table td {
    padding: 10px 3px;
    vertical-align: top;
    border-top: 1px solid #CED4DA;
}
.table th, .jsgrid .jsgrid-table th, .table td, .jsgrid .jsgrid-table td {
    vertical-align: top;
    line-height: 1;
    white-space: break-spaces;
}
.card .card-body {
    padding: 5px;
}
.content-wrapper {
    background: #F5F7FF;
    padding: 20px;
    width: 100%;
    -webkit-flex-grow: 1;
    flex-grow: 1;
}
.clr-white {
    color:white!important;
}
svg > g:last-child > g:last-child {
    pointer-events: none !important
    
}
div.google-visualization-tooltip { 
    pointer-events: none !important
    }
    .export-btn {
      margin: 10px 0px;
      padding: 5px;
    }
</style>
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Dashboard</h3>
				</span></h6>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  
                 </div>
                </div>
              </div>
            </div>
            
          </div>
           
          <div class="row">
            <div class="col-md-12 grid-margin transparent">
              <div class="row"> 
                  <a type="button" href="ivnm" @if(Request::segment(1) == 'ivnm') class="btn btn-sm btn-primary clr-white px-5 ml-3" @else class="btn btn-sm clr-white btn-secondary px-5 ml-3" @endif >IVNM</a>
                  <a type="button" href="vkd" @if(Request::segment(1) == 'vkd') class="btn btn-sm btn-primary px-5 ml-3" @else class="btn btn-sm btn-secondary px-5 ml-3" @endif>VKD</a>
              </div>
              <br>
              
              <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-xl-6 row-cols-xxl-6">
                  
              <div class="col">
                <div class="card radius-10">
                  <div class="card-body text-center" style="height:  230px;">
                   <a target="_blank" href="inner_reports/1/{{Request::segment(1)}}">  
                     <center>
                          <div id="piechart" style="width: 130px; height: 130px;"></div>
                        
                      </center> 
                      </a>
                      <p class="mb-0"><strong>{{$site_identy}}/{{$total}} </strong></p>
                     <p class="mb-0">Site Identification</p>
                     
                  </div>
                </div>
              </div>
              
              <div class="col">
                <div class="card radius-10">
                  <div class="card-body text-center" style="height:  230px;">
                   <a target="_blank" href="inner_reports/2/{{Request::segment(1)}}">       
                    <center>
                         <div id="piechart2" style="width: 130px; height: 130px;"></div>
                        
                      </center>  
                     </a>
                      <p class="mb-0"><strong>{{$ground_clear}}/{{$total}}</strong></p>
                     <p class="mb-0">Ground Clearance status</p>
                  </div>
                </div>
              </div>
              @if(Request::segment(1) == 'ivnm')
              <div class="col">
                <div class="card radius-10">
                  <div class="card-body text-center" style="height:  230px;">
                   <a target="_blank" href="inner_reports/3/{{Request::segment(1)}}">      
                    <center>
                          <div id="piechart3" style="width: 130px; height: 130px;"></div>
                        
                      </center>
                      </a>
                       <p class="mb-0"><strong>{{$town_planning}}/{{$total}}</strong></p>
                     <p class="mb-0">Town Planning Clearance</p>
                  </div>
                </div>
              </div>
              @endif
              
               <div class="col">
                <div class="card radius-10">
                  <div class="card-body text-center" style="height:  230px;">
                   <a target="_blank" href="inner_reports/4/{{Request::segment(1)}}">       
                    <center>
                         <div id="piechart4" style="width: 130px; height: 130px;"></div>
                        
                      </center>  
                     </a> 
                      <p class="mb-0"><strong>{{$tender}}/{{$total}}</strong></p>
                     <p class="mb-0">Tender Process</p>
                  </div>
                </div>
              </div>
              
              <div class="col">
                <div class="card radius-10">
                  <div class="card-body text-center" style="height:  230px;">
                  <a target="_blank" href="inner_reports/5/{{Request::segment(1)}}">       
                    <center>
                         <div id="piechart5" style="width: 130px; height: 130px;"></div>
                        
                      </center>   
                      </a>
                       <p class="mb-0"><strong>{{$workin_progress}}/{{$total}}</strong></p>
                     <p class="mb-0">Work in progress</p>
                  </div>
                </div>
              </div>
              
              <div class="col">
                <div class="card radius-10">
                  <div class="card-body text-center" style="height: 230px;">
                  <a target="_blank" href="inner_reports/6/{{Request::segment(1)}}">    
                    <center>
                          <div id="piechart6" style="width: 130px; height: 130px;"></div>
                        
                      </center>  
                     </a>
                      <p class="mb-0"><strong>{{$work_comp}}/{{$total}}</strong></p>
                     <p class="mb-0">Work Completion</p>
                  </div>
                </div>
              </div>
              
            </div>
              
              <br>
              
              <div class="col-md-12">
                <div class="card radius-10 ">
                  <div class="card-body">
                      
                      @if(session()->has('error'))
                        <div class="alert alert-danger"> {{ session()->get('error') }} </div>
                      @endif
                      
                      @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    
                      <form method="post" action="">
                        @csrf
                        
                        @if(Request::segment(1) == 'ivnm') 
                        <input type="hidden" name="work_type" id="work_type" value="1">
                        @else 
                        <input type="hidden" name="work_type" id="work_type" value="2">
                        @endif
                        
                        <!--<div class="row align-items-center">-->
                            
                        <!--</div>-->
                        
                        
                        
                        <div class="row align-items-center">
                            
                            <div class="col-md-2 text-right">
                                <div class="form-check">
                                  <input class="form-check-input radio" type="radio" name="radio" id="radio" value="corporation">
                                  <!--<label class="form-check-label" for="corporation">-->
                                    Corporations
                                  <!--</label>-->
                                </div>
                            </div>
                            <div class="col-md-2 text-right">
                                <div class="form-check">
                                  <input class="form-check-input radio" type="radio" name="radio" id="radio2" value="district">
                                  <!--<label class="form-check-label" for="corporation">-->
                                    District
                                  <!--</label>-->
                                </div>
                            </div>
                            
                            <div style="display:none;" id="search_div">
                                <!--<div class="col-md-1 text-right" style="text-align:right;">-->
                                <!--    <div class="mb-3 mt-3">-->
                                <!--        <label class="form-label">District </label>-->
                                <!--     </div>-->
                                <!--</div>-->
                                <div class="col-md-3">
                                    <select class="form-select" name="district" id="district" >
                                      <option value="">---Select District--- </option>
                                      @foreach($ulblist as $key)
                                      <option value="{{$key->distid}}">{{$key->distname}}</option>
                                      @endforeach
                                    </select>
                                </div>
                                <!--<div class="col-md-1 text-right" style="text-align:right;">-->
                                <!--     <div class="mb-3 mt-3">-->
                                <!--        <label class="form-label">Select </label>-->
                                <!--     </div>-->
                                <!--</div>-->
                                <!--<div class="col-md-3">-->
                                <!--    <select class="form-select" name="working_status" id="working_status" >-->
                                <!--      <option value="">---Select--- </option>-->
                                <!--       <option value="1">Site Identification</option>-->
                                <!--       <option value="2"> Ground Clearance </option>-->
                                <!--       <option value="3"> Town Planning Clearance</option>-->
                                <!--       <option value="4"> Tender Process</option>-->
                                <!--       <option value="5"> Work in progress</option>-->
                                <!--       <option value="6"> Work Completion</option>-->
                                      <!--@foreach($progress as $pro)-->
                                      <!--<option value="{{$pro->id}}">{{$pro->description}}</option>-->
                                      <!--@endforeach-->
                                <!--    </select>-->
                                <!--</div>-->
                            </div>
                                <div class="col-md-1 text-right" style="text-align:right;">
                                     <div class="mb-3 mt-3">
                                        <button class="btn btn-sm btn-primary" id="form_search">Search</button>
                                      </div>
                                </div>
                        </div>
                    </form>
                            
                            
                           <div class=" ">
                               <div class="table-responsive" style="height:80vh">
                               <button onclick="exportTableToExcel('example1', 'e-municipal')" class="export-xl export-btn">Export Excel</button>
                               <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-bordered table-striped" style="border-collapse: separate;    table-layout: fixed;" id="example1">
                                    <thead style="position:sticky;top:0">
                                        <tr class="table-primary text-center" >
                                            <td rowspan="2" style="width: 4%;">S.No</td>
                                            <td rowspan="2" style="width:8%;">District</td>
                                            <td rowspan="2" style="width:8%;">ULB </td>
                                            <td rowspan="2" style="width:8%;">Location</td>
                                            <td rowspan="2" style="    width: 6%;">Area in Acres (Extent)</td>
                                            <td rowspan="2" style="    width: 6%;">Estimated Contract Value(ECV) in Laks  </td>
                                            <td rowspan="2" style="    width: 6%;">Tender Contract Value(TCV) in Laks </td>
                                            <td rowspan="2" style="    width: 7%;">Current Status</td>
                                            <td colspan="2" style="width:12%;">Percentage</td>
                                            <td rowspan="2" style="width:15%;">Remarks</td>
                                            <td rowspan="2" style="width:7%;">Photo</td>
                                            <td rowspan="2" style="width:7%;">Contact</td>
                                            </tr>
                                            <tr class="table-primary">
                                            <td>Physical</td>
                                            <td>Financial</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp
                                        @foreach($result as $value)
                                    	    <tr class="text-center">
                                    	      <td>{{$i}}</td>
                                    	      <td>{{ $ulbnames[$value->ulbid]['distname'] }}</td>
                                    	      <td>{{ $ulbnames[$value->ulbid]['ulbname'] }}</td>
                                    	      <td>{{ $value->site_location }}</td>
                                    	      @if($value->site_area == 0)
                                    	        <td>-</td>
                                    	      @else
                                    	        <td>{{ $value->site_area }}</td>
                                    	      @endif
                                    	      
                                    	      <td>{{$value->ecv_amount}}</td>
                                    	      <td>{{ $value->tcv_amount }}</td>
                                    	      <!--<td>{{$value->ivnmWorkProgressStatusModel->description}}</td>-->
                                    	      <td>{{$work_progress_list[$value->work_final_status]}}</td>
                                    	      <td>{{ $value->physical_progress_percent }}%</td>
                                    	      <td>{{ $value->financial_progress_percent }}%</td>
                                    	      <td>{{ $value->remarks }}</td>
                                    	      <td class="text-center">
                                               <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$i}}">Photos</button>
                                    		  </td>
                                    		  <td>
                                    		      <i class="fas fa-info-circle tool-tiip" data-toggle="tooltip" data-placement="top" title="ACLB: {{$contactdata[$value->ulbid]['collectr_name']}} , Commissioner: {{ $ulbnames[$value->ulbid]['comm_name'] }} ({{ $ulbnames[$value->ulbid]['comm_mobile'] }}),Engineer:{{ $ulbnames[$value->ulbid]['eng_name'] }} ({{$ulbnames[$value->ulbid]['eng_mobile']   }}) , Nodal Officer:{{ $ulbnames[$value->ulbid]['nodal_officer_name']  }} ({{ $ulbnames[$value->ulbid]['nodal_officer_mobile']  }})"></i> 
                                    		  </td>
                                            </tr> 
                                            
                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="ModalLabel">Photos</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @foreach($value->ivnmWorkPhotosModel as $item)
                                                                <img src={{asset($item->photo_url)}}>
                                                            @endforeach
                                                        </div>
                                                        <div class="modal-footer">
                                                        <!--<button type="button" class="btn btn-success">Send message</button>-->
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @php $i++ @endphp
                                        @endforeach
                                      
                                        
                            	    
                                  </tbody>
                            </table>
                            <button onclick="exportTableToExcel('example1', 'e-municipal')" class="export-xl export-btn">Export Excel</button>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>




</div>


<!--Pie Charts-->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="assets/plugins/easyPieChart/jquery.easypiechart.js"></script>
    
   <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart2);
      google.charts.setOnLoadCallback(drawChart3);
      google.charts.setOnLoadCallback(drawChart4);
      google.charts.setOnLoadCallback(drawChart5);
       google.charts.setOnLoadCallback(drawChart6);
      
      function drawChart() {
        
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Completed',     <?php echo $site_identy; ?>],
          ['Progress',      <?php echo $total - $site_identy; ?>],
          
        ]);

        var options = {
          legend: 'none',
          colors: ['#408f0b', '#ff0000']
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
        
      }
      
      function drawChart2() {
    
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Completed',     <?php echo $ground_clear; ?>],
          ['Progress',      <?php echo $total - $ground_clear; ?>],
          
        ]);

        var options = {
          legend: 'none',
          colors: ['#408f0b', '#ff0000']
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
        chart.draw(data, options);
        
      }
      
      
      function drawChart3() {
    
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Completed',     <?php echo $town_planning; ?>],
          ['Progress',      <?php echo $total - $town_planning; ?>],
          
        ]);

        var options = {
          legend: 'none',
          colors: ['#408f0b', '#ff0000']
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));
        chart.draw(data, options);
        
      }
      
      function drawChart4() {
    
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Completed',     <?php echo $tender; ?>],
          ['Progress ',      <?php echo $total - $tender; ?>],
          
        ]);

        var options = {
          legend: 'none',
          colors: ['#408f0b', '#ff0000']
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart4'));
        chart.draw(data, options);
        
      }
      
       function drawChart5() {
    
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work In Progress',     <?php echo $workin_progress; ?>],
          ['Not Started ',      <?php echo $total - $workin_progress; ?>],
          
        ]);

        var options = {
          legend: 'none',
          colors: ['#408f0b', '#ff0000']
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart5'));
        chart.draw(data, options);
        
      }
      
       function drawChart6() {
    
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Completed',     <?php echo $work_comp; ?>],
          ['Not completed ',      <?php echo $total - $work_comp; ?>],
          
        ]);

        var options = {
          legend: 'none',
          colors: ['#408f0b', '#ff0000']
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart6'));
        chart.draw(data, options);
        
      }
    </script>
    
    <script>
        $(document).ready(function(){
            $('.radio').on('click',function(){
                if($(this).val() == 'district'){
                    $('#search_div').show();
                }
            });
        });
    </script>

<!--close-->
        @include('headers.footer')

