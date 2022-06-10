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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="alert alert-danger">{{ session()->get('error') }}</div>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
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
                                                <td><button class="btn btn-warning btn-sm" onclick="reset_password({{ $item->id }})">Reset Password</button></td>
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


              <!-- The Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header p-3">
                            <h4 class="modal-title ">Verify OTP </h4>
                            <button class="btn-close" data-bs-dismiss="modal" style="border:0px;"> <i class="fa fa-times"></i> </button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div>
                                <div id="otp_div"></div>
                            </div>
                            <div class="text-center text-black-50">
                                We have sent the code verification <br> to your mobile number
                            </div>
                            <div class="text-center text-black mt-2">
                                Enter OTP here
                            </div>
                            <div class="myotp text-center" style="width:250px; margin:auto;">
                                <input type="text" class="form-control"  placeholder="Enter Your OTP" id="otp_field">
                                <input type="hidden" name="user_id" id="user_id" value="">
                                <div class="text-center mt-2" style="margin-left: 15px;">
                                    <button class="btn btn-success btn-sm btn-block" type="button" id="verify_btn" style="border-radius: 3px;">Verify</button>
                                </div>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer d-flex">

                        {{-- <div id="fwd_div" style="display:none">

                            <button type ="button" class="btn btn-danger btn-sm"  id="ao_fwd_btn"> Forward to HO</button>
                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            {{-- modal end --}}

            {{-- password model --}}

             <!-- The Modal -->
             <div class="modal fade" id="passModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header p-3">
                            <h4 class="modal-title ">Reset Password</h4>
                            <button class="btn-close" data-bs-dismiss="modal" style="border:0px;"> <i class="fa fa-times"></i> </button>
                        </div>

                        <!-- Modal body -->
                        <form action="update_password" onsubmit="return validatePass()" method="post">
                            @csrf
                            <div class="modal-body">
                                <div>
                                    <div id="error_div"></div>
                                    <input type="hidden" name="userid" id="userid">
                                </div>
                                <div class="text-center text-black mt-2">
                                    Password
                                </div>
                                <div class="text-center" style="width:250px; margin:auto;">
                                    <input type="password" class="form-control" name="password" placeholder="Enter Password" id="password" autocomplete="off" required>
                                </div>

                                <div class="text-center text-black mt-2">
                                    Confirm Password
                                </div>
                                <div class="text-center" style="width:250px; margin:auto;">
                                    <input type="password" class="form-control" name="confirm_password"  placeholder="Enter Confirm Password" id="confirm_password" autocomplete="off" required>
                                    <div class="text-center mt-2" style="margin-left: 15px;">
                                        <button class="btn btn-success btn-sm btn-block" type="submit" style="border-radius: 3px;">Update Password</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- Modal footer -->
                        <div class="modal-footer d-flex">
                            {{-- <div id="fwd_div" style="display:none">
                                <button type ="button" class="btn btn-danger btn-sm"  id="ao_fwd_btn"> Forward to HO</button>
                            </div> --}}
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
    function validatePass(){
        var pass = $('#password').val();
        var con_pass = $('#confirm_password').val();
        const specialChars = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
        const regex = /\d/;
        if(pass == ''){
            $('#error_div').html('<p class="alert alert-danger">Please Enter Password..!</p>');
            return false;
        }else if(pass != con_pass){
            $('#error_div').html('<p class="alert alert-danger">Password and confirm password not matched..!</p>');
            return false;
         }else if(pass.length < 8){
            $('#error_div').html('<p class="alert alert-danger">Password should have minimum 8 charecters</p>');
            return false;
         }else if(!specialChars.test(pass)){
            $('#error_div').html('<p class="alert alert-danger">Password should Contain 1 special charecters</p>');
            return false;
         }else if(!regex.test(pass)){
            $('#error_div').html('<p class="alert alert-danger">Password should Contain 1 digit</p>');
            return false;
         }else{
            return true;
         }
    }
</script>

<script>
    function reset_password(id){
        $('#otp_div').hide();
            $.ajax({
               type:'GET',
               url:'genarate_otp',
               data:{},
               beforeSend: function()
                {
                    $("#overlay").fadeIn();
                },
               success:function(result) {
                   $('#otp_field').val(result);
                   $('#user_id').val(id);

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


<script>
    $(document).ready(function(){
        $('#verify_btn').on('click',function(){
            $('#otp_div').show();
            var userid = $('#user_id').val();
            var _token = '<?php echo csrf_token() ?>';
            var otp = $('#otp_field').val();
            if(otp == ''){
                $('#otp_div').html('<p class="alert alert-danger">OTP Field Required</p>');
                return false;
            }
            $.ajax({
               type:'POST',
               url:'verify_otp',
               data:{otp:otp,_token:_token},
               beforeSend: function()
                {
                    $("#overlay").fadeIn();
                },
               success:function(result) {
                   if(result == 1){
                       $('#fwd_div').show();
                       $('#otp_div').html('<div class="alert alert-success"> <i class="fa-solid fa-check"></i> OTP Verified</div>');
                       $('#userid').val(userid);
                        setTimeout(modal_close,1000);
                   }else{
                       $('#otp_div').html('<p class="alert alert-danger"><i class="fa-solid fa-xmark"></i>OTP Verifiaction Failed</p>');
                   }
               },
               error: function(jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status == 422) {
                        alert('Otp Required');
                    }
                },
                complete: function()
                {
                    $("#overlay").fadeOut();
                    //setTimeout(modal_close,1000);
                }
            })
        });
    });

    function modal_close(){
        $('#myModal').modal('hide');
        var myModal = new bootstrap.Modal(document.getElementById('passModal'))
        myModal.show();

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

