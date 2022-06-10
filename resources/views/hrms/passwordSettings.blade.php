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
                        <div class="card-header bg-white"> <b> <h3> User Details </h3></b> </div>
                        <div class="card-body">
                            <div class="thead-scroll">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead class="t-head">
                                        <tr class="table-primary text-center">
                                            <th>SNO</th>
                                            <th>User Name</th>
                                            <th>District</th>
                                            <th>User Mobile</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center" id="search_content">
                                        @php $i = 1; @endphp
                                        @foreach ($users as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $item->user_name }}</td>
                                                <td>{{ $item->distname }}</td>
                                                <td>{{ $item->dtcpMobile }}</td>
                                                <td><button class="btn btn-warning btn-sm" onclick="reset_password({{ $item->dist_id }})">Reset Password</button></td>
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

<script>
    function reset_password(id){
            $.ajax({
               type:'GET',
               url:'genarate_otp',
               data:{},
               beforeSend: function()
                {
                    $("#overlay").fadeIn();
                },
               success:function(result) {
                   $('#genarate_otp').html('Re Genarate OTP');

               },
                complete: function()
                {
                    $("#overlay").fadeOut();
                    var myModal = new bootstrap.Modal(document.getElementById('myModal'))
                    myModal.show();
                }
            })
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

