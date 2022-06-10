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
.mbl_card {
    margin-left:10px;
}
.total-bg {
        background-color: hsl(56deg 67% 83%) !important;
        font-weight: 600;
}
table.dataTable tbody td {
    padding: 10px 10px !important;
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
       <!--start content-->

        <main class="page-content">
            <div class=" ">
                <div class="table-content" id="table_div">
                    <div class="card mb-3">
                        <div class="card-header bg-white"> <b> HR Salary Report for the Month - {{ date('F', mktime(0, 0, 0, date('m'), 10)); }} </b> </div>
                        <div class="card-body">
                            <div class="thead-scroll">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead class="t-head">
                                        <tr class="table-primary text-center">
                                            <th>SNO</th>
                                            <th>Employee Name</th>
                                            <th>Pay Days</th>
                                            <th>Basic Pay</th>
                                            <th>HRA <br><br> (24%)</th>
                                            <th>EPF Employer Share <br><br> max up to 15000/- <br><br>(13%) </th>
                                            <th>ESI  Employer <br><br> Share <br><br>(3.25%)</th>
                                            <th>FTA as per <br><br> eligibility
                                            </th>
                                            <th>Total <br><br> (gross salry)
                                            </th>
                                            <th>EPF Employer Share <br><br> max up to 15000/- <br><br> (13%)
                                            </th>
                                            <th>EPF Employee Share <br><br> max up to 15000/- <br><br> (12%)
                                            </th>
                                            <th>ESI Employer <br><br> Share (3.25%)
                                            </th>
                                            <th>ESI Gross pay <br><br> less than 21000/- <br><br> (0.75%)
                                            </th>
                                            <th>Profession Tax
                                            </th>
                                            <th>AGIS
                                            </th>
                                            <th>Total Deductions
                                            </th>
                                            <th>Net Payable
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center" id="search_content">
                                        @php $i = 1; @endphp
                                        @foreach ($employee as $emp)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $emp->name }}</td>
                                                <td>{{ round($salary[$emp->employee_id]['pay_days'],1) }}</td>
                                                <td>{{ round($salary[$emp->employee_id]['basic_pay'],1) }}</td>
                                                <td>{{ round($salary[$emp->employee_id]['hra'],1) }}</td>
                                                <td>{{ round($salary[$emp->employee_id]['add_epf'],1) }}</td>
                                                <td>{{ round($salary[$emp->employee_id]['add_esi'],1) }}</td>
                                                <td>{{ round($salary[$emp->employee_id]['fta'],1) }}</td>
                                                <td>{{ round($salary[$emp->employee_id]['gross_salary'],1) }}</td>
                                                <td>{{ round($salary[$emp->employee_id]['ded_epf'],1) }}</td>
                                                <td>{{ round($salary[$emp->employee_id]['ded_epf1'],1) }}</td>
                                                <td>{{ round($salary[$emp->employee_id]['ded_esi'],1) }}</td>
                                                <td>{{ round($salary[$emp->employee_id]['ded_esi1'],1) }}</td>
                                                <td>{{ round($salary[$emp->employee_id]['pt'],1) }}</td>
                                                <td>{{ round($salary[$emp->employee_id]['agis'],1) }}</td>
                                                <td>{{ round($salary[$emp->employee_id]['total_ded'],1) }}</td>
                                                <td>{{ round($salary[$emp->employee_id]['net_pay'],1) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
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

      {{-- <script>
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
                for(let i=2;i<5;i++){
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
  </script> --}}

