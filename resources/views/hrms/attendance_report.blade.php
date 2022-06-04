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
        text-align: center !important;
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
.table {
    text-align: center !important;
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
                          <div class="mb-4"><b>Attendance report for the month of {{ date('M') }} - {{ date('Y') }} </b></div>
                          <form action="" method="post">
                              <input type="hidden" name="month" value="{{ date('n') }}">
                              <input type="hidden" name="year" value="{{ date('Y') }}">
                              
                          @csrf
                         <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-bordered">
                              <tbody>
                                <tr class="table-primary">
                                  <td>S.No</td>
                                  <!--<td>DPMU/ULB</td>-->
                                  <td>Name of the Employee</td>
                                  <td>Designation</td>
                                  <td>No. of working days</td>
                                  <td>No. of days attended</td>
                                  <td>Leaves availed during the month</td>
                                  <td>Cumulative leaves</td>
                                  <td>Remarks of PD</td>
                                </tr>
                                @php $i = 1; @endphp
                                @if(count($employee) > 0)
                                @foreach($employee as $emp)
                                @foreach($emp->DesignationModel as $des)
                                @foreach($emp->AddAttendanceModel as $att)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$emp->name}}</td>
                                        <td>{{$des->description}}</td>
                                        <td>{{$att->working_days}}</td>
                                        <td>{{$att->attend_days}}</td>
                                        <td>{{$att->leaved_aviled}}</td>
                                        <td>{{$att->commulative_leaved}}</td>
                                        <td>{{$att->remarks}}</td>
                                    </tr>
                                   
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
                         
                         <br>
                         <center>
                             <input type="submit" name="submit" value="submit" class="btn btn-sm btn-primary"  style="background-color: #56a400; border-color: #56a400;">
                         
                         </center>
                         </form>
                         <!--<table width="100%" border="1" cellspacing="0" cellpadding="0" class=" mt20 table table-bordered">
                              <tbody>
                                <tr class="table-primary">
                                  <td>S.No</td>
                                  <td>DPMU/ULB</td>
                                  <td>Name of the Employee</td>
                                  <td>Designation</td>
                                  <td>No. of working days</td>
                                  <td>No. of days attended</td>
                                  <td>Leaves availed during the month</td>
                                  <td>Cumulative leaves</td>
                                  <td>Remarks of PD</td>
                                </tr>
                                <tr>
                                  <td>1</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                </tr>
                                <tr>
                                  <td>2</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                </tr>
                              </tbody>
                            </table>-->
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
 <script>
     function fun1(attendeddays,i)
     {
         var workingdays = parseInt($("#no_of_days" + i).val());
         var attendeddays = parseInt(attendeddays);
         
        
         
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
  
 <script>  
// validation 
    $(function() {
        $("form[name='add']").validate({
            rules: {
                name: "required",
                surname: "required",
                dob: "required",
                dob: "required",
                co: "required",
                co_name: "required",
                gender: "required",
                joining_designation: "required",
                communication_address: "required",
                communication_address_pin_code: "required",
                permenant_address: "required",
                permenant_address_pin_code: "required",
                district: "required",
                mandal: "required",
                state: "required",
                mobile_number: "required",
                alternative_mobile_number: "required",
                
                email_id: {
                    required: true,
                    email: true
                },
            
                religion: "required",
                caste: "required",
                marital_status: "required",
                if_select_single: "required",
                nationality: "required",
                adhaar_card_number: "required",
                adhaar_card: "required",
                pan_card_number: "required",
                pan_card: "required",
                degree: "required",
                year_of_passing: "required",
                university_college: "required",
                certificates: "required",
                discpline: "required",
                date_of_joining: "required",
                designation: "required",
                location: "required",
                doj: "required",
                current_grade: "required",
                current_level: "required",
                
                // current_designation: "required",
                'current_designation[]': {
                    required: true
                },
                'current_status[]': {
                    required: true
                },
                'current_location[]': {
                    required: true
                },
                'duty_type[]': {
                    required: true
                },
                
                
                'start_date[]': {
                    required: true
                },
                'end_date[]': {
                    required: true
                },
                'disgnation[]': {
                    required: true
                },
                'work_experience_location[]': {
                    required: true
                },
                
                current_basic_salary: "required",
                pf_number: "required",
                esi_number: "required",
                
                account_holder_name: "required",
                bank_name: "required",
                account_number: "required",
                ifsc_code: "required",
                
                relation_name: "required",
                relation_gender: "required",
                relation_type: "required",
                relation_dob: "required",
                relation_occupation: "required",
                family_photo: "required",
                
                nominee_details: "required",
                nominee_relation: "required",
                nominee_gender: "required",
                nominee_dob: "required",
                
                objective_aspirations: "required",
                contributions_awards: "required",
                current_role_description: "required",
                discplinary_cases_suspensions: "required",
                
                photo: "required",
                
            },
            messages: {
                name: "Please Enter Name",
                surname: "Please Enter surname",
                dob: "Please Select DOB",
                co: "Field can not be empty",
                co_name: "Field can not be empty",
                gender: "Field can not be empty",
                joining_designation: "Field can not be empty",
                communication_address: "Field can not be empty",
                communication_address_pin_code: "Field can not be empty",
                permenant_address: "Field can not be empty",
                permenant_address_pin_code: "Field can not be empty",
                district: "Field can not be empty",
                mandal: "Field can not be empty",
                state: "Field can not be empty",
                mobile_number: "Field can not be empty",
                alternative_mobile_number: "Field can not be empty",
                email_id: "Please enter a valid email address",
                religion: "Field can not be empty",
                caste: "Field can not be empty",
                marital_status: "Field can not be empty",
                if_select_single: "Field can not be empty",
                nationality: "Field can not be empty",
                adhaar_card_number: "Field can not be empty",
                adhaar_card: "Field can not be empty",
                pan_card_number: "Field can not be empty",
                pan_card: "Field can not be empty",
                degree: "Field can not be empty",
                year_of_passing: "Field can not be empty",
                university_college: "Field can not be empty",
                certificates: "Field can not be empty",
                discpline: "Field can not be empty",
                date_of_joining: "Field can not be empty",
                designation: "Field can not be empty",
                location: "Field can not be empty",
                doj: "Field can not be empty",
                current_grade: "Field can not be empty",
                current_level: "Field can not be empty",
                
                
                "current_designation[]": "Please select category",
                "current_status[]": "Please select category",
                "current_location[]": "Please select category",
                "duty_type[]": "Please select category",
                
                "start_date[]": "Field can not be empty",
                "end_date[]": "Field can not be empty",
                "disgnation[]": "Field can not be empty",
                "work_experience_location[]": "Field can not be empty",
                
                
                current_basic_salary: "Field can not be empty",
                pf_number: "Field can not be empty",
                esi_number: "Field can not be empty",
                
                account_holder_name: "Field can not be empty",
                bank_name: "Field can not be empty",
                account_number: "Field can not be empty",
                ifsc_code: "Field can not be empty",
                
                relation_name: "Field can not be empty",
                relation_gender: "Field can not be empty",
                relation_type: "Field can not be empty",
                relation_dob: "Field can not be empty",
                relation_occupation: "Field can not be empty",
                family_photo: "Field can not be empty",
                
                nominee_details: "Field can not be empty",
                nominee_relation: "Field can not be empty",
                nominee_gender: "Field can not be empty",
                nominee_dob: "Field can not be empty",
                
                objective_aspirations: "Field can not be empty",
                contributions_awards: "Field can not be empty",
                current_role_description: "Field can not be empty",
                discplinary_cases_suspensions: "Field can not be empty",
                
                photo: "Field can not be empty",
            },
            submitHandler: function(form) {
               form.submit();
            }
        });
    });


    $('#permenant_address_same_as_above').on('change', function() {
        var ckeckVal = this.checked ? this.value : '';
        if(ckeckVal)
        {
            var communication_address = $('#communication_address').val();
            var communication_address_pin_code = $('#communication_address_pin_code').val();
            // append in permenant address area
            $('#permenant_address').val(communication_address);
            $('#permenant_address_pin_code').val(communication_address_pin_code);
        }
        else
        {
            $('#permenant_address').val("");
            $('#permenant_address_pin_code').val("");
        }
    });
    
    // add new
    
    $('.add-new').on('click', function() {
        // alert(1);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var current_designation_no = $('#current_designation_no').val();
        $.ajax({
               type:'POST',
               url:'{{ route('AddCurrentDesignation'); }}',
               data:{current_designation_no : current_designation_no},
               dataType: 'JSON',
               beforeSend: function() 
                { 
                    $("#overlay").fadeIn();
                },
               success:function(data) {
                  $(".current_designation").append(data.html);
                  $('#current_designation_no').val(data.return_numbers);
               },
                complete: function() 
                { 
                    $("#overlay").fadeOut();
                }
            });
    });


    function remove(no)
    {
        //  $('.render'+no).css('display', 'none');
         
        //  $('.current_location'+no).val('');
         
         var current_designation_no = $('#current_designation_no').val();
         $.ajax({
               type:'POST',
               url:'{{ route('RemoveCurrentDesignation'); }}',
               data:{current_designation_no : current_designation_no},
               dataType: 'JSON',
               beforeSend: function() 
                { 
                    $("#overlay").fadeIn();
                },
               success:function(data) {
                   $('.render'+no).remove(); 
                //   $('#current_designation_no').val(data.return_numbers);
               },
                complete: function() 
                { 
                    $("#overlay").fadeOut();
                }
            });
    }
    
    $('.add-new1').on('click', function() {
        // alert(1);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var work_experience_no = $('#work_experience_no').val();
        $.ajax({
               type:'POST',
               url:'{{ route('AddWorkExperience'); }}',
               data:{work_experience_no : work_experience_no},
               dataType: 'JSON',
               beforeSend: function() 
                { 
                    $("#overlay").fadeIn();
                },
               success:function(data) {
                  $(".work_experience").append(data.html);
                  $('#work_experience_no').val(data.return_numbers);
               },
                complete: function() 
                { 
                    $("#overlay").fadeOut();
                }
            });
    });
    
    
    function work_experience_remove(no)
    {
         var work_experience_no = $('#work_experience_no').val();
         $.ajax({
               type:'POST',
               url:'{{ route('RemoveWorkExperience'); }}',
               data:{work_experience_no : work_experience_no},
               dataType: 'JSON',
               beforeSend: function() 
                { 
                    $("#overlay").fadeIn();
                },
               success:function(data) {
                   $('.render-work-exp'+no).remove(); 
               },
                complete: function() 
                { 
                    $("#overlay").fadeOut();
                }
            });
    }
    </script>

<!--close-->
 @include('headers.footer')

