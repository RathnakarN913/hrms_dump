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
       background: #4b49ac69 !important;
        text-align: center;
}
.t-head tr th {
    padding: 10px 15px;
    color: white;
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
        background-color: #4b49ac;
    padding: 5px 15px;
    border-radius: 4px;
    font-size: 14px;
    color: white;
}
.user-profile-bg {
    background-color: white;
    border: 1px solid #e2e3e4;
    border-radius: 5px;
    padding: 10px;
}
#myInput {
    width:50%;
    float:right;
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
    background-color: #56a400;
    border-color: #56a400;
    padding: 7px 15px;
    font-size: 16px;
    margin-top: 15px;
    border-radius: 15px;
    width:auto;
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
.w-100
{
    width: 100% importnat;
}
.btn-edit {
       background: #327c95;
    color: #fff;
    width: 100%;
}
.btn-danger11 {
    color: #000;
    background-color: #e76b53;
    border-color: #e76b53;
}
input
{
    border: 2px solid importnat;
}
input[type=search]{
   border: 2px solid ;
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

  <div class="bg-white  w-100">
    <div class="table-content  w-100">
    
      
       @if($message = Session::get('success'))
               <div class="alert alert-danger  alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>   
                   <strong>{{ $message }}</strong>
               </div>
               @endif
                   <div class="row align-items-center mt-3 mb-3 ">
                    <div class="col-md-6">
                        <h4><b>View Employees Details </b></h4></div>
                <div class="col-md-6">
                   <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search here..">
                </div>
            </div>
                 <!--<div class="mb-4"><h4><b>View Employees Details</b></h4></div>-->
                 <!--<div class="col-md-3 float-right">-->
                 <!--             <div class="mb-3 mt-3">-->
                 <!--            <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search here..">     -->
                 <!--            </div>-->
                 <!--        </div>-->
                  <div class="table-responsive">
                  <table class="table table-bordered" id="example1">
                    <thead class="t-head">
                     <tr>
                        <th>S.NO</th>
                         <th>Full Name</th>
                         <th>Employee Type</th>
                         <th>Emp_ID</th>
                         <th>Mobile Number</th>
                         <th>Current Designation</th>
                         <th>Current Work Location</th>
                         <th colspan="2">Actions</th>
                         <!--<th>Delete</th>-->
            
                      </tr>
                    </thead>
                    <tbody class="text-center" id="myTable1">
                        @if($employees)
                        @foreach($employees as $key => $row)
                         <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $row->name." ".$row->surname }}</td>
                            <td>{{ $row->GetEmpType->employee_type_desc }}</td>
                            <td>{{$row->emp_id}}</td>
                            <td>{{ $row->mobile_number }}</td>
                            <!--<td>{{ $row->GetCurrentStatus[0]->current_designation }}</td>-->
                            <td>
                               @php
                                echo App\Http\Controllers\hrms\AddEmployeeController::GetdesignationName($row->GetCurrentStatus[0]->current_designation);
                               @endphp
                            </td>
                            <td>{{ $row->GetCurrentStatus[0]->current_location }}</td>
                            
                            <!--<td><a class="btn btn-info btn-sm" href=""><i class="fas fa-eye"></i> View</a></td>-->
                            <td><a class="@if($row->approve_status == 0 || $row->approve_status == 2) btn btn-danger btn-sm @else btn btn-edit btn-sm @endif" href="{{ url('/edit-update-employee/') }}/{{ $row->employee_id }}">@if($row->approve_status == 0) Pending @elseif($row->approve_status == 2) Review @else Edit @endif </a></td>
                            <td><a class="btn btn-danger11 btn-sm" href="{{ url('/delete-employee/') }}/{{ $row->employee_id }}">Delete</a></td>
            
                         </tr>
                        @endforeach
                        @endif
                     
                    </tbody>
                  </table>
                  </div>
      <div class="text-center mt-4">
           <!--<button onclick="exportTableToExcel('myTable1', 'view employee')" class="btn btn-md btn-submit export-xl" style="">Export Excel</button>-->
           <button class="btn btn-md btn-submit export-xl" style="">Export Excel</button>
      </div>
    </div>
   
  </div>
</main>





</div>
<!--Pie Charts-->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="assets/plugins/easyPieChart/jquery.easypiechart.js"></script>


<!--close-->


<script>
    var myApp = new function () {
        this.printTable = function () {
            var tab = document.getElementById('myTable1');
            var win = window.open('', '', 'height=1000,width=1000');
            win.document.write(tab.outerHTML);
            win.document.close();
            win.print();
        }   
    }
</script>

<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable1");
  var rows = table.getElementsByTagName("tr");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < rows.length; i++) {
    var cells = rows[i].getElementsByTagName("td");
    var j;
    var rowContainsFilter = false;
    for (j = 0; j < cells.length; j++) {
      if (cells[j]) {
        if (cells[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
          rowContainsFilter = true;
          continue;
        }
      }
    }

    if (rowContainsFilter) {
      tr[i].style.display = "";
    } else {
      tr[i].style.display = "none";
    }
  }
}

function myFunction1() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable1");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) 
  {
      //td= tr[i].getElementsByTagName("td")[1];
      td= tr[i].getElementsByTagName("td")[1];
    if (td) 
    {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) 
      {
        tr[i].style.display = "";
      } else 
      {
          tr[i].style.display = "none";
      }
    }
  }
  
}
</script>
 @include('headers.footer')

