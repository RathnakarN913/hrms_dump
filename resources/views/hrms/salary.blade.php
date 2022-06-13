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
                    @if (session()->has('success'))
                        <div class="alert alert-success">{{ session()->get('success') }}</div>
                    @endif
                    <div class="card mb-3">
                        <div class="card-header bg-white"> <b> HR Salary Report for the Month - {{ date('F', mktime(0, 0, 0, date('m'), 10)); }} </b> </div>
                        <div class="card-body">
                            <form method="post" action="save_salary">
                                @csrf
                                <input type="hidden" name="month" id="" value="{{ date('m') }}">
                                <input type="hidden" name="year" id="" value="{{ date('Y') }}">
                                <input type="hidden" name="employee_type" id="" value="1">
                                <div class="thead-scroll">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead class="t-head">
                                            <tr class="table-primary text-center">
                                                <td colspan="4"></td>
                                                <td>24%</td>
                                                <td>13%</td>
                                                <td>3.25%</td>
                                                <td colspan="2">FLAT</td>
                                                <td>13%</td>
                                                <td>12%</td>
                                                <td>3.25%</td>
                                                <td>0.75%</td>
                                                <td colspan="4">FLAT</td>

                                            </tr>
                                            <tr class="table-primary text-center">
                                                <th rowspan="2">SNO</th>
                                                <th rowspan="2">Employee Name</th>
                                                <th rowspan="2">Pay Days</th>
                                                <th colspan="6">Total Earnings</th>
                                                <th colspan="7">Total Deductions</th>
                                                <th>Net Payable</th>
                                            </tr>
                                            <tr class="table-primary text-center">
                                                <th>Basic Pay</th>
                                                <th>HRA</th>
                                                <th>EPF<br><br> <small>(max 15000/-)</small> </th>
                                                <th>ESI</th>
                                                <th>FTA</th>
                                                <th>Gross Salary</th>
                                                <th>EPF <br><br><small> (max 15000/-)</small></th>
                                                <th>EPF  <br><br> <small> max 15000/- </small></th>
                                                <th>ESI</th>
                                                <th>ESI</th>
                                                <th>Professional <br><br> Tax</th>
                                                <th>AGIS</th>
                                                <th>Total</th>
                                                <th>Pay</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center" id="search_content">
                                            @php $i = 1; @endphp
                                            @foreach ($employee as $emp)
                                            <input type="hidden" name="dist[]" id="" value="{{ $emp->district }}">
                                            <input type="hidden" name="ulb[]" id="" value="{{ $emp->ulbid }}">
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td><input type="hidden" name="employee_id[]" id="" value="{{ $emp->employee_id }}"> {{ $emp->name }}</td>
                                                    <td><input type="hidden" name="pay_days[]" id="" value="{{ $salary[$emp->employee_id]['pay_days'] }}"> {{ $salary[$emp->employee_id]['pay_days'] }}</td>
                                                    <td class="text-right"><input type="hidden" name="basic_pay[]" id="" value="{{ round($salary[$emp->employee_id]['basic_pay'],1) }}"> {{ number_format(round($salary[$emp->employee_id]['basic_pay'],1)) }}</td>
                                                    <td class="text-right"><input type="hidden" name="hra[]" id="" value="{{ round($salary[$emp->employee_id]['hra'],1) }}">{{ number_format(round($salary[$emp->employee_id]['hra'],1)) }}</td>
                                                    <td class="text-right"><input type="hidden" name="epf[]" id="" value="{{ round($salary[$emp->employee_id]['add_epf'],1) }}"> {{ number_format(round($salary[$emp->employee_id]['add_epf'],1)) }}</td>
                                                    <td class="text-right"><input type="hidden" name="eesi[]" id="" value="{{ round($salary[$emp->employee_id]['add_esi'],1) }}"> {{ number_format(round($salary[$emp->employee_id]['add_esi'],1)) }}</td>
                                                    <td class="text-right"><input type="hidden" name="fta[]" id="" value="{{ round($salary[$emp->employee_id]['fta'],1) }}"> {{ number_format(round($salary[$emp->employee_id]['fta'],1)) }}</td>
                                                    <td class="text-right"><input type="hidden" name="gross_salary[]" id="" value="{{ round($salary[$emp->employee_id]['gross_salary'],1) }}"> {{ number_format(round($salary[$emp->employee_id]['gross_salary'],1)) }}</td>
                                                    <td class="text-right"><input type="hidden" name="depf[]" id="" value="{{ round($salary[$emp->employee_id]['ded_epf'],1) }}">{{ number_format(round($salary[$emp->employee_id]['ded_epf'],1)) }}</td>
                                                    <td class="text-right"><input type="hidden" name="depf1[]" id="" value="{{ round($salary[$emp->employee_id]['ded_epf1'],1) }}"> {{ number_format(round($salary[$emp->employee_id]['ded_epf1'],1)) }}</td>
                                                    <td class="text-right"><input type="hidden" name="desi[]" id="" value="{{ round($salary[$emp->employee_id]['ded_esi'],1) }}">{{ number_format(round($salary[$emp->employee_id]['ded_esi'],1)) }}</td>
                                                    <td class="text-right"><input type="hidden" name="desi1[]" id="" value="{{ round($salary[$emp->employee_id]['ded_esi1'],1) }}">{{ number_format(round($salary[$emp->employee_id]['ded_esi1'],1)) }}</td>
                                                    <td class="text-right"><input type="hidden" name="pt[]" id="" value="{{ round($salary[$emp->employee_id]['pt'],1) }}">{{ number_format(round($salary[$emp->employee_id]['pt'],1)) }}</td>
                                                    <td class="text-right"><input type="hidden" name="agis[]" id="" value="{{ round($salary[$emp->employee_id]['agis'],1) }}">{{ number_format(round($salary[$emp->employee_id]['agis'],1)) }}</td>
                                                    <td class="text-right"><input type="hidden" name="tot_ded[]" id="" value="{{ round($salary[$emp->employee_id]['total_ded'],1) }}">{{ number_format(round($salary[$emp->employee_id]['total_ded'],1)) }}</td>
                                                    <td class="text-right"><input type="hidden" name="net_pay[]" id="" value="{{ round($salary[$emp->employee_id]['net_pay'],1) }}">{{ number_format(round($salary[$emp->employee_id]['net_pay'],1)) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                </div>
                                <center>

                                    @if ($flag )
                                        <button class="btn btn-success mt-3" type="submit">Save</button>
                                    @endif
                                </center>
                            </form>
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

