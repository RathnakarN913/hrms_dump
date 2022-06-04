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
    vertical-align: middle;
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
        background: #8bcbf9;
        text-align: center;
}
.t-head tr th {
    padding: 10px 15px;
    vertical-align: middle;
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
#myInput{
    width: 50%;
    margin-left: 50%;
    border: 1px solid black;
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
    border: 1px solid #56a400 !important;
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
.table {
    text-align: center !important;
}

input:read-only {
    background-color: #d8e2e5 !important;
}


.myotp form input{
  display:inline-block;
  width:50px;
  height:50px;
  text-align:center;
}

td input.form-control {
    width: 60px !important;
}
.sticky-col {
  position: -webkit-sticky;
  position: sticky;
  background-color: white;
  z-index:99;
}
.first-col {
  width: 30px;
  min-width: 30px;
  max-width: 30px;
  left: 0px;
}
.second-col {
  width: 100px;
  min-width: 100px;
  max-width: 100px;
  left: 30px;
}
.third-col{
   width: 100px;
  min-width: 100px;
  max-width: 100px;
  left: 130px; 
}
.sub-col{
   width: 40px;
  min-width: 40px;
  max-width: 40px;
  left: 130px; 
}
.sub-col1{
   width: 80px;
  min-width: 80px;
  max-width: 80px;
  left: 170px; 
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
                   
                   <div class="card">
                       
  <div class="card-body">  
  
    <div class="bg-white">
            <div class="row align-items-center mt-4 mb-4 ">
                
                    <div class="col-md-6">
                        <h4 style="padding-left:15px;"><b>Leave Managment</b></h4>
                     </div>
                     
                    <div class="col-md-6">
                        <input id="myInput" type="text" placeholder="Search.." class="form-control">
                    </div>
                
            </div>
            
            @php 
              
                  $i=1; $cnt = 0; $cnt1 = 0; $cnt2 = 0; $cnt3 = 0; $gtot = 0; $month = date('m'); $year = date('Y'); $gtot_att = 0;$lop=0;
                  $no_of_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                  
              $monthName = date('F', mktime(0, 0, 0, date('m'), 10)); 
              @endphp
        
    <form id="myform" method="post" action="{{url('save_leave_request')}}" enctype="multipart/form-data">
    @csrf
            <div class="d-flex p-3 " style="background-color:#BEEBE9;">
                <input type="hidden" id="district" value="{{$district}}">
                <img src="{{url('assets/images/Parliament_icon.png')}}" height='26'>
               <h5 class="mt-2 ml-2"><b>District : {{$distname}}  </b></h5>
               
               <h5 class="mt-2 ml-5"><b>Month: {{$monthName}}</b></h5>
               
               <!--<lable for="month" class="ml-5 mt-2">Month: $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));</lable>-->
               <!--@php $month = date('m'); @endphp;-->
               <!--<select class="form-select ml-3" name="month" style="width:20%;" disabled>-->
               <!--    <option value="">Select Month</option>-->
               <!--    <option value="1" @if($month == 1) selected @endif>January</option>-->
               <!--    <option value="2" @if($month == 2) selected @endif>February</option>-->
               <!--    <option value="3" @if($month == 3) selected @endif>March</option>-->
               <!--    <option value="4" @if($month == 4) selected @endif>April</option>-->
               <!--    <option value="5" @if($month == 5) selected @endif>May</option>-->
               <!--    <option value="6" @if($month == 6) selected @endif>June</option>-->
               <!--    <option value="7" @if($month == 7) selected @endif>July</option>-->
               <!--    <option value="8" @if($month == 8) selected @endif>Auguest</option>-->
               <!--    <option value="9" @if($month == 9) selected @endif>September</option>-->
               <!--    <option value="10" @if($month == 10) selected @endif>October</option>-->
               <!--    <option value="11" @if($month == 11) selected @endif>November</option>-->
               <!--    <option value="12" @if($month == 12) selected @endif>December</option>-->
               <!--</select>-->
                
               <h5 class="mt-2 ml-5"><b>No of Working Days : {{$no_of_days}}</b></h5>
               
            </div>
            
            
            
            
      <div class="  table-responsive thead-scroll">
          
        
        <table class="table" border="1" style="font-size:13px;" id="example">
          <thead class="t-head" style="position: sticky;top: 0;">
            <tr class="table-primary text-center">
              <th style="padding: 10px; position: sticky;top: 0; font-size: 12px !important;" rowspan="2" class="sticky-col first-col">S<br>NO</th>
              <th style="width: 20%; position: sticky;top: 0; font-size: 12px !important;" rowspan="2" class="sticky-col second-col">ULB</th>
              <th style="width: 20%; position: sticky;top: 0; font-size: 12px !important;" colspan="2" class="sticky-col third-col">Employee </th>
              @foreach($leave as $le)
              <th style="width: 20%; position: sticky;top: 0; font-size: 12px !important;" colspan="2" title="{{$le->leave_description}}">{{$le->leave_code}} </th>
              @endforeach
              <th style="width: 20%; position: sticky;top: 0; font-size: 12px !important;" rowspan="2">AVLD<br>Total </th>
              <th style="width: 20%; position: sticky;top: 0; font-size: 12px !important;" rowspan="2" title="Loss of Pay">LOP </th>
              <th style="width: 20%; position: sticky;top: 0; font-size: 12px !important;" rowspan="2">Pay <br> Days</th>
                <th style="width: 20%; position: sticky;top: 0; font-size: 12px !important;" rowspan="2">Performance<br> Report<br> Upload</th>
            </tr>
            <tr>
                <th style="padding: 10px; position: sticky;top: 0; font-size: 12px !important;" class="sticky-col sub-col">Id</th>
              <th style="width: 20%; position: sticky;top: 0; font-size: 12px !important;" class="sticky-col sub-col1">Name </th>
              
              @foreach($leave as $le)
              <th style="width: 20%; position: sticky;top: 0; font-size: 12px !important;" title="Opening Balence">OPG</th>
              <th style="width: 20%; position: sticky;top: 0; font-size: 12px !important;"  title="Availed Leaves">AVLD </th>
              @endforeach
              
            </tr>
          </thead>
          <tbody class="text-center" id="search_content">
              
              @foreach($employee as $emp)
              @php
                $tot =  0;
              @endphp
                <tr class="pad-tdd">
                    <td class="sticky-col first-col">{{$i++}}</td>
                    <td style="font-size: 12px !important;" class="sticky-col second-col"><input type="hidden" name="ulb[]" value="{{$emp->ulbid}}" >{{$emp->ulbname}}</td>
                   <td style="font-size: 12px !important;" class="sticky-col sub-col"><input type="hidden" name="employee[]" value="{{$emp->employee_id}}" >{{$emp->emp_id}}</td>
                            <td class="input-group-sm sticky-col sub-col1" >
                                {{$emp->name}} <br> {{$emp->surname}}
                            </td>
                            
                            @foreach($leave as $le)
                                @php 
                                
                                    $col = $le->leave_code.'opg';
                                    $coll = $le->leave_code.'avld';
                                    
                                    $cnt = $leave_count->where('employee_id',$emp->employee_id)->sum($col);
                                    $cnt1 = $leave_count->where('employee_id',$emp->employee_id)->sum($coll);
                                    $lop = $leave_count->where('employee_id',$emp->employee_id)->sum('lop');
                                    
                                    $tot = $tot + $cnt1;
                                    
                                @endphp
                                
                                <td class="input-group-sm">
                                    <input type="" name="{{$le->leave_code}}opg[]" class="form-control" value="{{$cnt}}"  @if(session()->get('user_type') != 'AO') @if(count($leave_count->where('employee_id',$emp->employee_id)) > 0) readonly @endif @endif      @if($ao_status) @if(session()->get('user_type') == 'AO') @if($le->leave_code == 'AL' || $le->leave_code == 'ML' || $le->leave_code == 'PL') @else readonly @endif @else readonly @endif @endif>
                                </td>
                                <td class="input-group-sm">
                                    <input type=""  class="form-control" name="{{$le->leave_code}}avld[]" value="{{$cnt1}}" @if($ao_status) @if(session()->get('user_type') == 'AO') @if($le->leave_code == 'AL' || $le->leave_code == 'ML' || $le->leave_code == 'PL') @else readonly @endif @else readonly @endif @endif>
                                </td>
                            @endforeach
                            <td class="input-group-sm">
                                <input type="text"  class="form-control" value="{{$tot}}" readonly>
                            </td>
                            <td class="input-group-sm">
                                <input type="text"  class="form-control" value="{{$lop}}" name="lop[]">
                            </td>
                            <td class="input-group-sm">
                                <input type="text"  class="form-control" value="{{$tot_att = $no_of_days - $lop}}" readonly>
                            </td>
                             <td class="input-group-sm">
                                 <a class="badge bg-success text-white" target="_blank" href="{{ asset('public/assets/hrms/performance') }}/{{ $image[$emp->employee_id] }}"> <i class="fas fa-file-alt"></i>old File </a>
                                 @if(session()->get('user_type') != 'AO')
                                    <input type="file" name="performance[]" >
                                 @endif
                             </td>
                    </tr>
                    @php $gtot_att = $gtot_att + $tot_att; @endphp
                @endforeach
              
              <tr class="table-primary text-center">
                  <td colspan="4" class="sticky-col first-col">Total</td>
                  
                    @foreach($leave as $le)
                    
                        @php 
                            $col = $le->leave_code.'opg';
                            $coll = $le->leave_code.'avld';
                            
                            $cnt2 = $leave_count->sum($col);
                            $cnt3 = $leave_count->sum($coll);
                            
                            $gtot = $gtot + $cnt3;
                            
                        @endphp
                    
                        <td class="input-group-sm">
                            {{$cnt2}}
                            <!--<input type="text" class="form-control" value="" readonly>-->
                        </td>
                        <td class="input-group-sm">
                            {{$cnt3}}
                            <!--<input type="text" class="form-control" value="" readonly>-->
                        </td>
                    @endforeach
                    
                    <td class="input-group-sm">
                        {{$gtot}}
                        <!--<input type="text" class="form-control" value="" readonly>-->
                    </td>
                    
                    <td class="input-group-sm">
                        {{$leave_count->sum('lop')}}
                        <!--<input type="text" class="form-control" value="" readonly>-->
                    </td>
                    
                    <td>{{$gtot_att}}</td>
                    
                    <td></td>
              </tr>
           
           </tbody>

        </table>      
                        
      </div>
      <br>
      
      @if(!$ao_status)
      <div class="row">
         <div class="col-md-10">
             <div class="row d-flex justify-content-center">
                 
                  <div class="col-md-2">
                      <button class="btn btn-submit btn-sm" type="submit" name="save" style="border-radius: 15px !important;width: 80%;margin-top: 0px;line-height: 20px;">Save</button>
                  </div>
                  
                  <div class="col-md-2">
                      <button  class="btn btn-secondary btn-sm" type="button" style="color:white; background-color:#327c95; border:1px solid#327c95" id="genarate_otp">Generate OTP</button>
                  </div>
                  
                   
                    
                  
            </div>
        </div>
      </div>
      
      
      
      @endif
      
      
      @if(session()->get('user_type') == 'AO')
      @if($ao_status != 2)
      
        <div class="row">
            
            <div class="col-md-1">
                <button class="btn btn-success" type="submit" id="approve_btn">Approve</button>
            </div>
            
            <!--<div class="col-md-1">-->
            <!--    <button class="btn btn-danger" type="button" id="reject_btn">Reject</button>-->
            <!--</div>-->
            
            <!--<div class="col-md-4">-->
            <!--    <div class="form-group">-->
            <!--        <label for="remarks">Remarks</label>-->
            <!--        <textarea class="form-control" id="remarks" rows="3"></textarea>-->
            <!--      </div>-->
            <!--</div>-->
        </div>
        
      @endif
      @endif
      
        <!--  <div class="col-md-7 mt-4 text-start">-->
        <!--    <div class=" d-flex align-items-center justify-content-around">-->
        <!--      <div>-->
        <!--      </div>-->
        <!--      <div>-->
              
          
        <!--  </div>-->
          
           
        <!--  <div style="display:block;">-->
              
        <!--            <div>-->
        <!--          </div>-->
        <!-- </div>-->
        <!--</div>-->
        
        <!--</div>-->
    
    </form>
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
         
         <div class="text-center mt-2" style="margin-left: 15px;">   
             <button class="btn btn-success btn-sm btn-block" type="button" id="verify_btn" style="border-radius: 3px;">Verify</button> 
         </div> 
       </div>
       
       <div>
           
       </div>
       
      </div>

      <!-- Modal footer -->
      <div class="modal-footer d-flex"> 
         
        <div id="fwd_div" style="display:none">
            <button type ="button" class="btn btn-danger btn-sm"  id="ao_fwd_btn"> Forward to HO</button>
        </div>
      </div>

    </div>
  </div>
</div>
                   
            </main>
           
 <div class="row">
           
</div>




</div>


<script>
    $(document).ready(function(){
        $('#genarate_otp').on('click',function(){
            $('#otp_div').hide();
            $('#fwd_div').hide();
            $.ajax({
               type:'GET',
               url:'genarate_otp',
               data:{},
               beforeSend: function() 
                { 
                    $("#overlay").fadeIn();
                },
               success:function(result) {
                   $('#otp_hide').show();
                //   $('#verify_btn').show();
                   $('#otp_field').val(result);
                   $('#genarate_otp').html('Re Genarate OTP');
                   
               },
                complete: function() 
                { 
                    $("#overlay").fadeOut();
                    var myModal = new bootstrap.Modal(document.getElementById('myModal'))
                    myModal.show();
                }
            })     
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('#verify_btn').on('click',function(){
            $('#otp_div').show();
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
                   }else{
                       alert('otp verification failed');
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
                    //setTimeout(modal_close,1800);
                }
            })     
        });
    });
    
    function modal_close(){
       // alert();
      // $('#myModal').modal('hide');
   //    var myModal = new bootstrap.Modal(document.getElementById('myModal'));
  //     mymodal.close();
    } 
</script>

<script>
    $(document).ready(function(){
        $('#ao_fwd_btn').on('click',function(){
            $.ajax({
                type:'GET',
               url:'forward_ao',
               data:{},
               beforeSend: function() 
                { 
                    $("#overlay").fadeIn();
                },
               success:function(result) {
                   if(result == 1){
                      alert('Forwarded to AO');
                      location.reload();
                   }else{
                       alert('Problem in Forwarding to AO'); 
                   }
                   
               },
                complete: function() 
                { 
                    $("#overlay").fadeOut();
                }
            })
        })
    })
</script>

<!--<script>-->
<!--    $(document).ready(function(){-->
<!--        $('#approve_btn').on('click',function(){-->
<!--            var district = $('#district').val();-->
<!--            var _token = '<?php echo csrf_token(); ?>';-->
            
<!--            $.ajax({-->
<!--               url:'<?php echo url('ao_approve') ?>',-->
<!--               type:'POST',-->
<!--               data:{-->
<!--                   district:district,-->
<!--                   remarks:remarks,-->
<!--                   _token:_token,-->
<!--               },-->
<!--               beforeSend: function() -->
<!--                { -->
<!--                    $("#overlay").fadeIn();-->
<!--                },-->
<!--               success:function(result){-->
<!--                   if(result == 1){-->
<!--                       alert('the following leaves are approved');-->
<!--                       window.location.href = "https://telangana.emunicipal.in/hrms/dashboard_hrms";-->
<!--                   }else{-->
<!--                       alert('somthing went wrong! Try again');-->
<!--                   }-->
<!--               },-->
<!--               complete: function() -->
<!--                { -->
<!--                    $("#overlay").fadeOut();-->
<!--                }-->
<!--            });-->
<!--        })-->
<!--    })-->
<!--</script>-->


<!--Pie Charts-->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="assets/plugins/easyPieChart/jquery.easypiechart.js"></script>
 <script>
     function fun1(attendeddays,i)
     {
         var workingdays = parseInt($("#no_of_days" + i).val());
         var attendeddays = parseInt(attendeddays);
         //alert(attendeddays);
        
         
         var commultiveleaver = workingdays - attendeddays;
         
         $("#cum_leave" + i).val(commultiveleaver);
         
         if(attendeddays <= workingdays)
         {
         var commultiveleaver = workingdays - attendeddays;
         $("#cum_leave" + i).val(commultiveleaver);
         }
         else
         {
             alert('no of attended days should be less than or equal to working days');
             $("#attended" + i).val('');
             $("#cum_leave" + i).val('');
            
         }
         
         
         
     }
 </script>
 <script>
     $(document).ready(function(){
         $('.attended').on('change',function(){
             var num = id.match(/\d+/);
             var no_of_days = $('#no_of_days').val();
             var attended = $('#attended').val();
             var leave = no_of_days - attended;
             $('#cum_leave').val(leave);
         });
     });
 </script>

<!--close-->
 @include('headers.footer')

