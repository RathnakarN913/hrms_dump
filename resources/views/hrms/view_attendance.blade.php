@include('headers.common_header')
<style>
.error
{
    color: red;
}
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
     .breadcrumb i {
    color: #3361ff;
    margin: 0px 8px;
    font-size: 14px;
}

.breadcrumb i {
    color: #3361ff;
    margin: 0px 8px;
    font-size: 14px;
}
.table-content {
padding: 25px;
}
.t-head {
        background: #8bcbf9;
        text-align: center;
}
.t-head tr th {
    padding: 10px 15px;
}
tr:nth-child(even) {
  background-color: #f0f0f0;
}
.width_50 {
    width: 50%;
}
.menu-titl {
        font-size: 16px;
    padding: 6px 18px;
}
#myInput{
    width: 50%;
    margin-left: 50%;
    border: 1px solid black;
}
.btn-print {
    border: 1px solid #327c95;
    border-radius: 3px;
    background: #327c95;
    color: white;
}
.menu-titl i {

    font-size: 20px;
    color: #3361ff;
}
.text-right {
    text-align: right!important;
}
.text-left {
    text-align: left!important;
}
.text-center {
    text-align: center!important;
}
.bg-head {
    background-color: #9deeff;
    padding: 5px;
    border-radius: 4px;
    font-size: 14px;
}
.user-profile-bg {
    background-color: white;
    border: 1px solid #e2e3e4;
    border-radius: 5px;
    padding: 10px;
}
.form-control-sm {
    min-height: calc(1.5em + 0.5rem + 2px);
    padding: 0.25rem 0.5rem;
    font-size: .875rem;
    border-radius: 0.2rem;
}
.pr0 {
    padding-right: 0px;
}
.select-input {
    width: 100%;
    border: 1px solid #e2e3e4;
    color: #4c5258;
}
.textarea-form {
    width: 100%;
    border: 1px solid #e2e3e4;
    color: #4c5258;
}
.btn-plus i {
    color: white;
    background-color: #56a400;
    padding: 6px 6px;
    cursor: pointer;
    border-radius: 3px;
}
.btn-minus i {
    color: white;
    background-color: #ff0012;
    padding: 6px 6px;
    cursor: pointer;
    border-radius: 3px;
}
.select-input-plus {
    width: 85%;
    border: 1px solid #e2e3e4;
    color: #4c5258;
}
.textarea-h {
    height: 64px;
    border: 1px solid #ced4da;
    border-radius: 3px;
}
.w-100 {
    width: 100%;
}
.btn-submit {
    color: #fff;
    background-color: #3461ff;
    border-color: #3461ff;
    padding: 10px 5px;
    font-size: 16px;
    margin-top: 25px;
    border-radius: 3px;
}
.p0 {
    padding: 0px;
}
.mt20 {
    margin-top: 20px;
}
.user-prof {
    padding: 10px;
    text-align: center;
    border: 1px solid #ced4da;
    border-radius: 5px;
    height: 7%;
    margin: 0px 25px 0px 25px;
}
.dataTables_filter input {
        border: 1px solid #b9b5b5;
    padding: 5px;
    border-radius: 3px;
}

</style>
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
      <div class="main-panel">
        <div class="content-wrapper">
               <main class="page-content">
             
               @if($message = Session::get('success'))
               <div class="alert alert-success  alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>   
                   <strong>{{ $message }}</strong>
               </div>
               @endif
               
               @if($message = Session::get('error'))
               <div class="alert alert-danger  alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>   
                   <strong>{{ $message }}</strong>
               </div>
               @endif
               @if($errors->any())
                   <div class="error"> 
                     {{ implode('', $errors->all(':message')) }}
                    </div>
                @endif
              <div class="bg-white">
                        <div class="table-content">
                          <div class="mb-4"><h4><b>View Attendance Report </b></h4></div>
                          <form action="{{route('view-attandance')}}" name="frm" method="post">
                               @csrf
                             <div class="row align-items-center">
                              <div class="col-md-3 pl-0">
                                  <div class="mb-3 mt-3">
                                    <label for="" class="form-label">Year </label>
                                    <!--<input class="form-control" type="text" name="year" minlength="4" maxlength="4" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}"  >-->
                                     <select class="form-control" name="year" required>
                                <option value="">Select</option>
                                @foreach($year as $key=> $val)
                                 <option value="{{ $val->year_desc }}" <?php if(@$year1 == $val->year_desc) { ?> selected <?php } ?>>{{ $val->year_desc }}</option>
                                @endforeach
                                
                              </select>
                                  </div>
                                   
                              </div>
                               <div class="col-md-3">
                                  <div class="mb-3 mt-3">
                                    <label for="" class="form-label">Month</label>
                                    <!--<input class="form-control" type="text" name="month" minlength="1" maxlength="2" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}" onblur="Calculate_month(this.value)">-->
                                      <select class="form-control" name="month" required >
                                <option value="">Select</option>
                                @foreach($month as $key=> $val)
                                 <option value="{{ $val->month_id }}" <?php if(@$month1 == $val->month_id) { ?> selected <?php } ?>>{{ $val->month_desc }}</option>
                                @endforeach
                                
                              </select>
                                  </div>       
                                   
                              </div>
                              <div class="row">       
                        <div class="col-md-3">
                              <label> Employee Type <span class="mandatory">*</span></label>
                              <select class="form-control-sm  select-input" name="employee_type" required>
                                <option value="">Select</option>
                                @if($employeetypes)
                                    @foreach($employeetypes as $key=> $val)
                                     <option value="{{ $val->employee_type_id }}" <?php if(@$emp_type1 == $val->employee_type_id) { ?> selected <?php } ?>>{{ $val->employee_type_desc }}</option>
                                    @endforeach
                                @endif
                              </select>
                            </div>
                            
                            <div class="col-md-3">
                              <label>District </label>
                              <select class="form-control-sm  select-input" name="district" id="district" onChange="GetUlbs();">
                                <option value="">Select</option>
                                @if($districts)
                                    @foreach($districts as $key=> $val)
                                     <option value="{{ $val->distid }}" <?php if(@$dist1 == $val->distid) { ?> selected <?php } ?> >{{ $val->distname }}</option>
                                    @endforeach
                                @endif
                              </select>
                            </div>
                             <div class="col-md-3">
                              <label>ULB <span class="mandatory"></span></label>
                              <select class="form-control-sm  select-input" name="ulbid" id="ulbid_list" onChange="GetCurrentDesignationByUlb();">
                                  @php
                                    $ul1= App\Models\hrms\Ulbs::where('ulbid',$ulb1)->pluck('ulbname');
                                    @endphp
                                <option value="">@if($ul1[0]!= "") {{$ul1[0]}}  @else Select @endif</option>
                              </select>
                            </div>
                              
                              <div class="col-md-3 mt-1" >
                                 
                                     <button type="submit" name="submit" value="Submit" class="btn btn-md btn-submit"  style="background-color: #56a400; border-color: #56a400;">Submit</button>
                                     
                                
                              </div>
                              
                          </div>
                        
                         <!--<div class="col-md-3 float-right">
                              <div class="mb-3 mt-3">
                             <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for employee names..">     
                             </div>
                         </div>-->
                         <br><br><br><br><br><br><br><br><br><br><br>
                        
                         <div class="table-responsive">
                              <div class="row">
                              <div class="col-md-6">
                                  
                              </div>
                           <div class="col-md-6">
                               <input id="myInput" type="text" placeholder="Search.." class="form-control">
                           </div>
                           </div>
                         
                         <table id="example1" width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-bordered mt-3">
                             
                        <thead class="t-head">
                                <tr class="table-primary">
                                  <td>S.No</td>
                                  <td>Name of The Employee</td>
                                  <td>Employee Id</td>
                                  <td>Designation</td>
                                  <td>No. of Working Days</td>
                                  <td>No. of Days Attended</td>
                                  <td>Balance Leaves</td>
                                  <td>Cumulative Leaves</td>
                                  <td>Remarks of PD</td>
                                </tr>
                            </thead>
                            <tbody class="text-center" id="search_content">
                                
                                @php $i = 1; @endphp
                                @if(count($emp_data) > 0)
                                @foreach($emp_data as $emp)
                                @foreach($emp->DesignationModel as $des)
                                @foreach($emp->AddEmployeeModel as $att)
                                @foreach($emp->GetCurrentStatus as $cur_des)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$att->name}} </td>
                                <td>{{$att->employee_id}}</td>
                            <!--    <td>@php  $emp_type=App\Models\hrms\EmployeeType::where('employee_type_id',$emp->employee_type)->pluck('employee_type_desc'); echo $emp_type[0]; @endphp
                                </td>-->
                                <td>@php echo App\Http\Controllers\hrms\AddEmployeeController::GetdesignationName($cur_des->current_designation); @endphp
                                </td>
                                <td>{{$emp->working_days}}</td>
                                <td>{{$emp->attend_days}}</td>
                                <td>{{$emp->leaved_aviled}}</td>
                                <td>{{$emp->commulative_leaved}}</td>
                                <td>{{$emp->remarks}}</td>
                            </tr>
                                @endforeach
                                @endforeach
                                @endforeach
                                @endforeach
                                @else
                            <tr>
                                  <td colspan="10">No Records Found</td>
                            </tr>
                        @endif
                        </tbody>
                        </table>
                        </div>

                        <div class="mx-auto text-center mt-5">
                                                    
                            <button onclick="exportTableToExcel('example1', 'view attendance report')" class=" btn btn-success btn-sm">Export Excel</button>
                            <!--<button class="export-xl btn btn-primary btn-sm">Print</button>-->
                          <button onclick="myApp.printTable()" class="btn-success btn btn-sm">Print</button>
                          <button  class="btn btn-success btn-sm">Signature</button>
                          
                        </div>
                        
                        </div>
                      </div>
            </form>

      </main>
           
 <div class="row">
           
</div>




</div>


<!--Pie Charts-->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="assets/plugins/easyPieChart/jquery.easypiechart.js"></script>

<script src="datatables/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="assets/datatables/buttons.html5.js" />
<link rel="stylesheet" type="text/css" href="assets/datatables/buttons.print.js" />
<script type="text/javascript" src="assets/datatables/vfs_fonts.js"></script>
<script type="text/javascript" src="assets/datatables/datatables.min.js"></script>



<script>
    var myApp = new function () {
        this.printTable = function () {
            var tab = document.getElementById('example1');
            var win = window.open('', '', 'height=1000,width=1000');
            win.document.write(tab.outerHTML);
            win.document.close();
            win.print();
        }
    }
</script>

<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("example1");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) 
  {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) 
    {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) 
      {
        tr[i].style.display = "";
      } else 
      {
        //tr[0].style.display = "";
          tr[i].style.display = "none";
      }
    }
  }
}
</script>

 <script>
 
 function GetUlbs()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var district = $('#district').val();
        $('#ulbid_list').empty();
        $('#ulbid_list').html('<option value="">Select </option>');
        $.ajax({
               type:'POST',
               url:'{{ route('GetUlbs'); }}',
               data:{district : district},
               dataType: 'JSON',
              /* beforeSend: function() 
                { 
                    $("#overlay").fadeIn();
                },*/
               success:function(data) {
                //   console.log(data);
                 $.each(data, function(key, value) {
                        $('#ulbid_list').append('<option value="'+ value.ulbid +'">'+ value.ulbname +'</option>');
                    });
                GetCurrentDesignation(district);
               },
               /* complete: function() 
                { 
                    $("#overlay").fadeOut();
                }*/
            });
    }
 
   $(document).ready(function() {
        
    $('#example1').DataTable( {
        "bPaginate": false
      
     
    } );
} );
    
    function Calculate_year(year)
    {
        
        //alert(year);
        if(year < 2022)
        {
            alert("Please enter valid year");
            return 0;
        }
    }
    
    function Calculate_month(month)
    {
        
        //alert(year);
        if(month < 1 || month > 12)
        {
            alert("Please enter valid month");
            return 0;
        }
    }
    </script>

<!--close-->
 @include('headers.footer')

