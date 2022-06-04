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
                          <div class="mb-4"><h4><b>Attendance Entry for the month of {{ $month_dates_range[0]->salary_dates_range }} - {{ date('Y') }} </b></h4></div>
                          <form action="" method="post">
                              <input type="hidden" name="month" value="{{ date('n') }}">
                              <input type="hidden" name="year" value="{{ date('Y') }}">
                              
                              
                       <div class="row">       
                        <div class="col-md-4">
                              <label> Employee Type <span class="mandatory">*</span></label>
                              <select class="form-control-sm  select-input" name="employee_type" >
                                <option value="">Select</option>
                                @if($employeetypes)
                                    @foreach($employeetypes as $key=> $val)
                                     <option value="{{$val->employee_type_id}}" <?php if(@$emp_type1 == $val->employee_type_id) { ?> selected <?php } ?> >{{ $val->employee_type_desc }}</option>
                                    @endforeach
                                @endif
                              </select>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                              <label>District </label>
                              
                              <select class="form-control-sm  select-input" name="district" id="district" onChange="GetUlbs();">
                                <option value="">Select</option>
                                @if($districts)
                                    @foreach($districts as $key=> $val)
                                     <option value="{{ $val->distid }}" <?php if(@$dist1 == $val->distid) { ?> selected <?php } ?>  >{{ $val->distname }}</option>
                                    @endforeach
                                @endif
                              </select>
                            </div>
                             <div class="col-md-4">
                                 <input type="hidden" name="ulb1" id="ulb1" value="{{$ulb1}}">
                                  @php
                                    $ul1= App\Models\hrms\Ulbs::where('ulbid',$ulb1)->pluck('ulbname');
                                    @endphp
                              <label>ULB  <span class="mandatory"></span></label>
                              <select class="form-control-sm  select-input" name="ulbid" id="ulbid_list" onChange="GetCurrentDesignationByUlb();">
                                <option value="">@if($ul1[0]!= "") {{$ul1[0]}}  @else Select @endif</option>
                              </select>
                            </div>
                            </div>
                            <div class="text-center">
                             <button type="submit" name="submit" value="Get Details" class=" btn btn-success btn-sm" style="background-color: #56a400; border-color: #56a400;">Get Details</button>
                         
                         </div>
                            
                            <br><br><br>
                          @csrf
                           <div>
                              <div class="row">
                              <div class="col-md-6">
                                  
                              </div>
                           <div class="col-md-6">
                               <input id="myInput" type="text" placeholder="Search.." class="form-control">
                           </div>
                           </div>
                         <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-bordered mt-3">
                              <thead >
                                <tr class="table-primary">
                                  <td>S.No</td>
                                  <!--<td>DPMU/ULB</td>-->
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
                                @php $i = 1; @endphp
                                @if(count($emp_data) > 0)
                                @foreach($emp_data as $key=>$val)
                                <tbody id="search_content">
                                    <tr >
                                      <td style="vertical-align:middle !important;">{{$i}}</td>
                                      <!--<td><input type="hidden" value="{{$val->district}}"  class="form-control" name="dist[]">{{$val->district}}</td>-->
                                      <input type="hidden" value="{{$val->employee_type}}"  class="form-control" name="employee_type1[]">
                                      <td style="vertical-align:middle !important;"><input type="hidden" value="{{$val->employee_id}}"  class="form-control" name="employee[]">{{$val->name}}</td>
                                      <td style="vertical-align:middle !important;"><input type="hidden" value="{{$val->employee_id}}"  class="form-control" name="employee_id[]">{{$val->employee_id}}</td>
                                      <td style="vertical-align:middle !important;"><input type="hidden" value="{{$val->GetCurrentStatus[0]->current_designation}}"  class="form-control" name="designation[]">@php echo App\Http\Controllers\hrms\AddEmployeeController::GetdesignationName($val->GetCurrentStatus[0]->current_designation);@endphp</td>
                                      <td style="vertical-align:middle !important;"><input type="text" value="{{Carbon\Carbon::now()->daysInMonth}}" id="no_of_days{{$i}}" class="form-control no_of_days" name="no_of_days[]" readonly></td>
                                      <td style="vertical-align:middle !important;"><input type="number" class="form-control attended" id="attended{{$i}}" name="attended[]" value="{{ $previousData[$val->employee_id]['attend_days']}}" onchange=fun1(this.value,{{$i}})></td>
                                      <td style="vertical-align:middle !important;"><input type="number" class="form-control" name="avl_leave[]" value="{{ $previousData[$val->employee_id]['leaved_aviled']}}"></td>
                                      <td style="vertical-align:middle !important;"><input type="text" class="form-control" id="cum_leave{{$i}}" name="comm_leave[]" value="{{ $previousData[$val->employee_id]['commulative_leaved']}}"></td>
                                      <td style="vertical-align:middle !important;"><input type="text" class="form-control" name="remarks[]" value="{{ $previousData[$val->employee_id]['remarks']}}"></td>
                                      @php $i++; @endphp
                                    </tr>
                               <input type="hidden" name="month" value="{{ date('m') }}">
                                @endforeach
                                @else
                                <tr>
                                      <td colspan="10">Employees Data not available</td>
                                </tr>
                                @endif
                              </tbody>
                            </table>
                            </div>
                         
                         <br>
                         <div class="text-center">
                             <button type="submit" name="submit" value="Submit" class=" btn btn-success btn-sm" style="background-color: #56a400; border-color: #56a400;">Submit</button>
                         
                         </div>
                         </form>
                         
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
    
    function GetUlbs()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var district = $('#district').val();
        var ulb1= $('#ulb1').val();
        //alert(ulb1);
        $('#ulbid_list').empty();
        $('#ulbid_list').html('<option value="" >Select </option>');
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

