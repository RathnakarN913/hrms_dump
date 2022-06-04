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
.col-ting {
         /*width: 25em;*/
         margin: 0 auto;
         /*margin-top: 3em;*/
         /*margin-bottom: 3em;*/
}
 .file-upload .image-box {
         margin: 0 auto;
         /*margin-top: 1em;*/
         /*height: 15em;*/
         /*width: 20em;*/
         /*background: #e5e5e5;*/
         cursor: pointer;
         overflow: hidden;
         border:1px dashed #999;
         border-radius:5px;
         padding-top: 15px;
}
 .file-upload .image-box img {
         height: 100%;
         /*display: none;*/
}
 .file-upload .image-box p {
         position: relative;
         top: 45%;
         color: #000;
}

.mandatory
{
    color: red;
} <span class="mandatory">*</span>
</style>

<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
// })
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': result.token
//             }
//         });

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
               
               <div class="alert alert-success alert-dismissible" id="alert" style="display:none">
                   <span>
                   
                   </span>
               </div>
               <div class="alert alert-danger" id="alert1" style="display:none">
                   <span></span>
                   <button type="button" class="close" data-dismiss="alert">×</button> 
                </div>
              @if($message = Session::get('error'))
               <div class="alert alert-danger  alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>   
                   <strong>Eroor</strong>
               </div>
               @endif 
               @if($errors->any())
                  
                    <div class="alert alert-danger  alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>   
                           <strong>{{ implode('', $errors->all(':message')) }}</strong>
                     </div>
                @endif
              <div class="bg-white">
                <div class="table-content">
                    <div class="mb-4"><b>Edit Employees Details</b></div>
                  <div class="mb-4 bg-head"><b>Personal Information</b></div>
                  <div class="user-profile-bg"> 
                    <form name="add" method="post" action="{{ route('UpdateEmployee') }}" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-md-9 order-sm-first order-last">
                          @csrf
                          <input type="hidden" class="form-control form-control-sm mb-3" placeholder="" name="edit_emp_id" value="{{ $employeesDTL[0]->employee_id }}" required>
                          <div class="row">
                            <div class="col-md-4">
                              <label>Name <span class="mandatory">*</span></label>
                              <input type="text" class="form-control form-control-sm mb-3" placeholder="Name" id="name-field" name="name" value="{{ $employeesDTL[0]->name }}" required>
                            </div>
                            <div class="col-md-4">
                              <label>Surname <span class="mandatory">*</span></label>
                              <input type="text" class="form-control form-control-sm mb-3" placeholder="Surname" id="surname-field" name="surname" value="{{ $employeesDTL[0]->surname }}">
                            </div>
                            <div class="col-md-4">
                              <label>DOB <span class="mandatory">*</span></label>
                              <input type="date" class="form-control form-control-sm mb-3" placeholder="" onchange="submitBday(this.value)" name="dob" value="{{ $employeesDTL[0]->dob }}" min="1950-01-01" max="<?php echo date("Y-m-d") ?>" onkeydown="return false">
                            </div>
                            <div class="col-md-12">
                              <div class="row">
                              <div class="col-md-4 pr0">
                              <label>S/o, W/o, D/o <span class="mandatory">*</span></label>
                              <select class="form-control-sm mb-3 select-input" name="co" >
                                <option value="">Select</option>
                                @if($relations)
                                @foreach($relations as $key=> $val)
                                 <option value="{{ $val->id }}" @if($val->id == $employeesDTL[0]->co) selected @endif>{{ $val->relation }}</option>
                                @endforeach
                                @endif
                              </select>
                             </div>
                              <div class="col-md-8" style="margin-top: 0px;">
                             <label>Enter Name<span class="mandatory">*</span></label>
                              <input type="text" class="form-control form-control-sm mb-3" placeholder="Enter name here" id="co-name-field" name="co_name" value="{{ $employeesDTL[0]->co_name }}">
                             </div>
                            </div>
                          </div>
                            <div class="col-md-4">
                              <label>Gender <span class="mandatory">*</span></label>
                              <select class="form-control-sm mb-3 select-input" name="gender">
                                <option value="">Select</option>
                                <option value="Male" @if($employeesDTL[0]->gender == 'Male') selected @endif>Male</option>
                                <option value="Female" @if($employeesDTL[0]->gender == 'Female') selected @endif>Female</option>
                                <option value="Transgender" @if($employeesDTL[0]->gender == 'Transgender') selected @endif>Transgender</option>
                              </select>
                            </div>
                            
                            <div class="col-md-4">
                              <label> Employee ID <span class="mandatory">*</span></label>
                              <select class="form-control-sm  select-input" name="employee_type">
                                <option value="">Select</option>
                                @if($employeetypes)
                                @foreach($employeetypes as $key=> $val)
                                 <option value="{{ $val->employee_type_id }}" @if($val->employee_type_id == $employeesDTL[0]->employee_type) selected @endif>{{ $val->employee_type_desc }}</option>
                                @endforeach
                                @endif
                              </select>
                            </div>
                            <div class="col-md-4">

                              <label>Joining Designation <span class="mandatory">*</span></label>
                               <select class="form-control-sm mb-3 select-input" name="joining_designation">
                                <option value="">Select</option>
                                @if($designationsALL)
                                    @foreach($designationsALL as $key=> $val)
                                        <option value="{{ $val->id }}" @if($val->id == $employeesDTL[0]->joining_designation) selected @endif>{{ $val->description }}</option>
                                    @endforeach
                                @endif
                              </select>
                            </div>
                            <div class="col-md-8">
                               <label>Communication Address <span class="mandatory">*</span></label>
                              <textarea class="textarea-form" name="communication_address" id="communication_address" style="height: 64px;" name="communication_address">{{ $employeesDTL[0]->communication_address }}</textarea>
                            </div>
                            <div class="col-md-4">
                              <label>Pin code <span class="mandatory">*</span></label>
                              <input type="text" class="form-control form-control-sm mb-3" placeholder="" maxlength="6" value="{{ $employeesDTL[0]->communication_address_pin_code }}" id="communication_address_pin_code" name="communication_address_pin_code" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                            </div>
                            
                          <div class="mb-3 mt-3 ml-3">
                            <input type="checkbox" id="permenant_address_same_as_above" name="permenant_address_same_as_above" value="1" @if($employeesDTL[0]->permenant_address_same_as_above == 1) checked @endif> Please select Permanant address same as above
                          </div>
                            <div class="col-md-8">
                               <label>Permanant Address <span class="mandatory">*</span></label>
                              <textarea class="textarea-form" name="permenant_address" id="permenant_address" style="height: 64px;">{{ $employeesDTL[0]->permenant_address }}</textarea>
                            </div>
                            <div class="col-md-4">
                              <label>Pin code <span class="mandatory">*</span></label>
                              <input type="text" class="form-control form-control-sm mb-3" maxlength="6" value="{{ $employeesDTL[0]->permenant_address_pin_code }}" placeholder="" id="permenant_address_pin_code" name="permenant_address_pin_code" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <label>District <span class="mandatory"></span></label>
                              <select class="form-control-sm mb-3 select-input" name="district" id="district" onChange="GetUlbs();">
                                <option value="">Select</option>
                                @if($districts)
                                @foreach($districts as $key=> $val)
                                 <option value="{{ $val->distid }}" @if($val->distid == $employeesDTL[0]->district) selected @endif>{{ $val->distname }}</option>
                                @endforeach
                                @endif
                              </select>
                            </div>
                            
                            <div class="col-md-4">
                              <label>Ulb <span class="mandatory"></span></label>
                              <select class="form-control-sm mb-3 select-input" name="ulbid" id="ulbid_list" onChange="GetCurrentDesignationByUlb();">
                                <option value="">Select Ulb</option>
                                @if($GetDistwiseUlbs)
                                @foreach($GetDistwiseUlbs as $key=> $val)
                                 <option value="{{ $val->ulbid }}" @if($val->ulbid == $employeesDTL[0]->ulbid) selected @endif>{{ $val->ulbname }}</option>
                                @endforeach
                                @endif
                              </select>
                            </div>
                            
                            <div class="col-md-4">
                              <label>Mandal <span class="mandatory">*</span></label>
                              <input type="text" class="form-control form-control-sm mb-3" placeholder="" id="mandal-field" name="mandal" value="{{ $employeesDTL[0]->mandal }}">
                            </div>
                            <div class="col-md-4">
                              <label>State <span class="mandatory">*</span></label>
                              <input type="text" class="form-control form-control-sm mb-3" placeholder="" id="state-field" name="state" value="{{ $employeesDTL[0]->state }}">
                            </div>
                            <div class="col-md-4">
                              <label>Mobile number <span class="mandatory">*</span></label>
                             <input type="text" class="form-control form-control-sm mb-3" placeholder="" name="mobile_number" value="{{ $employeesDTL[0]->mobile_number }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                            </div>
                            <div class="col-md-4">
                              <label>Alternative mobile number <span class="mandatory"></span></label>
                              <input type="text" class="form-control form-control-sm mb-3" placeholder="" name="alternative_mobile_number" value="{{ $employeesDTL[0]->alternative_mobile_number }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                            </div>
                            <div class="col-md-4">
                              <label>Email id <span class="mandatory">*</span></label>
                              <input type="email" class="form-control form-control-sm mb-3" placeholder="" name="email_id" value="{{ $employeesDTL[0]->email_id }}">
                            </div>
                            <div class="col-md-4">
                              <label>Religion <span class="mandatory">*</span></label>
                              <select class="form-control-sm mb-3 select-input" name="religion">
                                <option value="">Select</option>
                                @if($religions)
                                @foreach($religions as $key=> $val)
                                 <option value="{{ $val->id }}" @if($val->id == $employeesDTL[0]->religion) selected @endif>{{ $val->religion }}</option>
                                @endforeach
                                @endif
                              </select>
                            </div>
                            <div class="col-md-4">
                              <label>Caste <span class="mandatory">*</span></label>
                             <select class="form-control-sm mb-3 select-input" name="caste">
                                <option value="">Select</option>
                                @if($casts)
                                @foreach($casts as $key=> $val)
                                 <option value="{{ $val->id }}" @if($val->id == $employeesDTL[0]->caste) selected @endif>{{ $val->cast }}</option>
                                @endforeach
                                @endif
                              </select>
                            </div>
                            
                            
                            <div class="col-md-4">
                              <label>Marital status <span class="mandatory">*</span></label>
                              <select class="form-control-sm mb-3 select-input" name="marital_status" id="marital_status" onChange="GetMaritalStatusDtl();">
                                <option value="">Select</option>
                                @if($matrialstatus)
                                @foreach($matrialstatus as $key=> $val)
                                 <option value="{{ $val->id }}" @if($val->id == $employeesDTL[0]->marital_status) selected @endif>{{ $val->matrial_status }}</option>
                                @endforeach
                                @endif
                              </select>
                            </div>
                            <div class="col-md-4">
                              <label class="MaritalHeading">{{ $GetMaritalStatusInfo->status_name }} <span class="mandatory">*</span></label>
                              <input type="text" class="form-control form-control-sm mb-3" placeholder="" id="if_select_single" name="if_select_single" value="{{ $employeesDTL[0]->if_select_single }}">
                            </div>
                            <div class="col-md-4">
                              <label>Nationality <span class="mandatory">*</span></label>
                              <input type="text" class="form-control form-control-sm mb-3" placeholder="" id="nationality" name="nationality" value="{{ $employeesDTL[0]->nationality }}">
                            </div>
                             <div class="col-md-4">
                              <label>Aadhar Card number <span class="mandatory">*</span></label>
                              <input type="text" class="form-control form-control-sm mb-3" maxlength="12" placeholder="" name="adhaar_card_number" value="{{ $employeesDTL[0]->adhaar_card_number }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                            </div>
                             <div class="col-md-4">
                              <label>Upload Aadhar Card <a class="badge bg-success text-white" target="_blank" href="{{ asset('public/assets/employee_files') }}/{{ $employeesDTL[0]->adhaar_card }}"><i class="fas fa-file-alt"></i> File</a></label>
                              <input type="file" class="form-control form-control-sm mb-3" placeholder="" name="adhaar_card">
                            </div>
                           
                            <div class="col-md-4">
                              <label>Pan Card number <span class="mandatory">*</span></label>
                              <input type="text" class="form-control form-control-sm mb-3" placeholder="" id="pan_card_number" name="pan_card_number" value="{{ $employeesDTL[0]->pan_card_number }}" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)">
                            </div>
                            <div class="col-md-4">
                              <label>Upload Pan Card <a class="badge bg-success text-white" target="_blank" href="{{ asset('public/assets/employee_files') }}/{{ $employeesDTL[0]->pan_card }}"><i class="fas fa-file-alt"></i> File</a></label>
                              <input type="file" class="form-control form-control-sm mb-3" placeholder="" name="pan_card">
                            </div>
                          </div>
                          <div class="mb-4 bg-head"><b>Education </b></div>
                          <div class="row">
                          <div class="col-md-4">
                              <label>Name of the Degree <span class="mandatory">*</span></label>
                              <select class="form-control-sm mb-3 select-input" name="degree" onChange="GetDiscipline(this)">
                                <option value="">Select</option>
                                @if($educations)
                                @foreach($educations as $key=> $val)
                                 <option value="{{ $val->id }}" @if($val->id == $employeesDTL[0]->degree) selected @endif>{{ $val->education_name }}</option>
                                @endforeach
                                @endif
                              </select>
                            </div>
                            <div class="col-md-4">
                              <label>Year of passing <span class="mandatory">*</span></label>
                              <select class="form-control-sm mb-3 select-input" name="year_of_passing">
                                <option value="">Select</option>
                                @if($years)
                                @foreach($years as $key=> $val)
                                 <option value="{{ $val->id }}" @if($val->id == $employeesDTL[0]->year_of_passing) selected @endif>{{ $val->year }}</option>
                                @endforeach
                                @endif
                              </select>
                            </div>
                            <div class="col-md-4">
                              <label>University/college <span class="mandatory">*</span></label>
                              <input type="text" class="form-control form-control-sm mb-3" placeholder="" id="university_college" value="{{ $employeesDTL[0]->university_college }}" name="university_college">
                            </div>
                            <div class="col-md-4">
                              <label>Certificates Upload <a class="badge bg-success text-white" target="_blank" href="{{ asset('public/assets/employee_files') }}/{{ $employeesDTL[0]->certificates }}"><i class="fas fa-file-alt"></i> File</a></label>
                              <input type="file" class="form-control form-control-sm mb-3" placeholder="" name="certificates">
                            </div>
                            <div class="col-md-4">
                              <label>Discipline <span class="mandatory">*</span></label>
                              <select class="form-control-sm mb-3 select-input" name="discpline" id="discpline">
                                <option value="">Select</option>
                                @if($discplines)
                                @foreach($discplines as $key=> $val)
                                 <option value="{{ $val->id }}" @if($val->id == $employeesDTL[0]->discpline) selected @endif>{{ $val->discpline }}</option>
                                @endforeach
                                @endif
                              </select>
                            </div>
                          </div>
                         <div class="mb-4 bg-head"><b>Professional</b></div>
                          <div class="row">
                          <div class="col-md-4">
                              <label>Date of joining <span style="font-size: 12px;">( Net effective date) <span class="mandatory">*</span></span></label>
                                <input type="date" class="form-control form-control-sm mb-3" placeholder="" name="date_of_joining" value="{{ $employeesDTL[0]->date_of_joining }}" onkeydown="return false">
                            </div>
                            <div class="col-md-4">
                              <label>Designation <span class="mandatory">*</span></label>
                              <select class="form-control-sm mb-3 select-input" name="designation">
                                <option value="">Select</option>
                                @if($designationsALL)
                                @foreach($designationsALL as $key=> $val)
                                 <option value="{{ $val->id }}" @if($val->id == $employeesDTL[0]->designation) selected @endif>{{ $val->description }}</option>
                                @endforeach
                                @endif
                              </select>
                            </div>
                            <div class="col-md-4">
                              <label>Location <span class="mandatory">*</span></label>
                              <input type="text" class="form-control form-control-sm mb-3" placeholder="" id="location" name="location" value="{{ $employeesDTL[0]->location }}" >
                            </div>
                            <div class="col-md-4">
                              <label>DOJ (Certificates to be uploaded) <a class="badge bg-success text-white" target="_blank" href="{{ asset('public/assets/employee_files') }}/{{ $employeesDTL[0]->doj }}"><i class="fas fa-file-alt"></i> File</a></label>
                              <input type="file" class="form-control form-control-sm mb-3" placeholder="" name="doj">
                            </div>
                          </div>
                          
                          
                        <div class="row">
                          <div class="col-md-4">
                              <label>Current Grade <span class="mandatory">*</span></label>
                              <select class="form-control-sm mb-3 select-input" name="current_grade">
                                <option value="">Select</option>
                                @if($grades)
                                @foreach($grades as $key=> $val)
                                 <option value="{{ $val->id }}" @if($val->id == $employeesDTL[0]->current_grade) selected @endif>{{ $val->grade }}</option>
                                @endforeach
                                @endif
                              </select>
                            </div>
                            <div class="col-md-4">
                              <label>Current Level <span class="mandatory">*</span></label>
                               <select class="form-control-sm mb-3 select-input" name="current_level">
                                <option value="">Select</option>
                                @if($currentlevels)
                                @foreach($currentlevels as $key=> $val)
                                 <option value="{{ $val->id }}" @if($val->id == $employeesDTL[0]->current_level) selected @endif>{{ $val->description }}</option>
                                @endforeach
                                @endif
                              </select>
                            </div>
                            <div class="col-md-4">
                              <label>Category </label>
                               <select class="form-control-sm   select-input" name="category">
                                    <option value="">Select</option>
                                    <option value="c1">C1</option>
                                    <option value="c2">C2</option>
                                    <option value="c3">C3</option>
                              </select>
                            </div>
                          </div>

                        @if($employeesDTL[0]->GetCurrentStatus)
                        @foreach($employeesDTL[0]->GetCurrentStatus as $k => $childCurrentStatus)
                            <div class="row ml-1 render{{ $childCurrentStatus->current_info_id }}" style="background-color: #e2eeef;">  
                            <input type="hidden" value="{{ $childCurrentStatus->current_info_id }}" name="current_info_id[]">
                              <div class="col-md-11 pt-2" style="border-right: 1px #aedde1  solid;">
                                <div class="row">
                                     <div class="col-md-4">
                                      <label>Current Designation <span class="mandatory">@if($k == "0") * @endif</span></label>
                                      <select class="form-control-sm mb-3 select-input" id="current_designations{{ $k }}" name="current_designation[]">
                                        <option value="">Select</option>
                                        @if($designations)
                                            @foreach($designations as $key=> $val)
                                             <option value="{{ $val->id }}" @if($val->id == $childCurrentStatus->current_designation) selected @endif>{{ $val->description }}</option>
                                            @endforeach
                                        @endif
                                      </select>
                                    </div>
                                    
                                    <div class="col-md-4">
                                      <label>Current Status  <span class="mandatory">@if($k == "0") * @endif</span></label>
                                      <select class="form-control-sm mb-3 select-input" name="current_status[]">
                                        <option value="">Select</option>
                                        @if($currentstatus)
                                        @foreach($currentstatus as $key=> $val)
                                         <option value="{{ $val->id }}" @if($val->id == $childCurrentStatus->current_status) selected @endif>{{ $val->status_name }}</option>
                                        @endforeach
                                        @endif
                                      </select>
                                    </div>
                                    
                                    
                                    <div class="col-md-4">
                                      <label>Current Location  <span class="mandatory">@if($k == "0") * @endif</span></label>
                                      <input type="text" class="form-control form-control-sm mb-3" placeholder="" value="{{ $childCurrentStatus->current_location }}" name="current_location[]">
                                    </div>
                                    
                                    <div class="col-md-4">
                                      <label>Duty type  <span class="mandatory">@if($k == "0") * @endif</span></label>
                                      <select class="form-control-sm mb-3 select-input " name="duty_type[]">
                                        <option value="">Select</option>
                                        @if($dutytypes)
                                        @foreach($dutytypes as $key=> $val)
                                         <option value="{{ $val->id }}" @if($val->id == $childCurrentStatus->duty_type) selected @endif>{{ $val->duty_type_name }}</option>
                                        @endforeach
                                        @endif
                                      </select>
                                    </div>
                              </div>  
                          </div>
                          
                           <div class="col-md-1 p-0 d-flex align-items-center justify-content-center">
                              @if($k == 0)
                              <span class="btn-plus add-new"><i class="fas fa-plus"></i></span>
                              @else
                              <span class="btn-minus removeExistsCurrentStatus" onclick="remove(0, 1, {{$childCurrentStatus->current_info_id}})" style="margin-top: 28px; display: inherit;"><i class="fas fa-minus" ></i></span>
                              <!--<span class="btn-minus removeExistsCurrentStatus" style="margin-top: 28px; display: inherit;"><i class="fas fa-minus" onclick="rem({{$childCurrentStatus->current_info_id}})"></i></span>-->
                              @endif
                           </div>
                           <input name="current_designation_no" id="current_designation_no" type="hidden" value="{{ count($employeesDTL[0]->GetCurrentStatus) }}">
                        </div>
                        @endforeach
                        @endif
                            
                        
                        <div class="current_designation">
                            
                        </div>
                        
                          <p class="mt-3 mb-3"><b>Work Experience</b></p>
                          
                            @if($employeesDTL[0]->GetWorkExperience)
                            @foreach($employeesDTL[0]->GetWorkExperience as $keyy => $childWorkExperience)
                            
                            <input type="hidden" value="{{ $childWorkExperience->work_experience_id }}" name="work_experience_id[]">
                            <div class="row   b-3 ml-1" style="background-color: #e2eeef;">
                                <div class="col-md-11 pt-2" style="border-right: 1px #aedde1  solid;">
                                   <div class="row">
                                      <div class="col-md-4  ">
                                          <label>Start date <span class="mandatory">@if($keyy == "0") * @endif</span></label>
                                        <input type="date" name="start_date[]" class="form-control form-control-sm" placeholder="Start date"  value="{{ $childWorkExperience->start_date }}" onkeydown="return false">
                                      </div>
                                      <div class="col-md-4   ">
                                          <label>End date <span class="mandatory">@if($keyy == "0") * @endif</span></label>
                                        <input type="date" name="end_date[]" class="form-control form-control-sm" placeholder="End date"  value="{{ $childWorkExperience->end_date }}" onkeydown="return false">
                                      </div>
                                  
                                    
                                     <div class="col-md-4 ">
                                      <label>Designation <span class="mandatory">@if($keyy == "0") * @endif</span></label>
                                      <select class="form-control-sm mb-3 select-input" name="disgnation[]">
                                        <option value="">Select</option>
                                        @if($designationsALL)
                                        @foreach($designationsALL as $key=> $val)
                                         <option value="{{ $val->id }}" @if($val->id == $childWorkExperience->disgnation) selected @endif>{{ $val->description }}</option>
                                        @endforeach
                                        @endif
                                      </select>
                                    </div>
                                    
                                     <div class="col-md-4 ">
                                          <label>Location <span class="mandatory">@if($keyy == "0") * @endif</span></label>
                                          <input type="text" class="form-control form-control-sm mb-3" placeholder="" name="work_experience_location[]" value="{{ $childWorkExperience->work_experience_location }}">
                                         
                                        </div>
                                       
                                     </div> 
                                </div>
                                <div class="col-md-1 p-0 d-flex align-items-center justify-content-center">
                                      @if($keyy == 0)
                                      <span class="btn-plus add-new1"><i class="fas fa-plus"></i></span>
                                      @else
                                      <span class="btn-minus removeExistsWorkExperience" style="margin-top: 20px; display: inherit;"><i class="bi bi-dash"></i></span>
                                      @endif
                                     
                                </div>
                                <input name="work_experience_no" id="work_experience_no" type="hidden" value="{{ count($employeesDTL[0]->GetWorkExperience) }}">
                            </div>
                            @endforeach
                            @endif
                            
                            <div class="work_experience">
                                
                            </div>
                            
                          <div class="row mt-3">
                               
                                <div class="col-md-4">
                                  <label>Current Basic salary <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm mb-3" placeholder="" value="{{ $employeesDTL[0]->current_basic_salary }}" name="current_basic_salary" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                                </div>
                                
                                <div class="col-md-4">
                                  <label>PF Number <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm mb-3" placeholder="" value="{{ $employeesDTL[0]->pf_number }}" name="pf_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                                </div>
                                
                                <div class="col-md-4">
                                  <label>ESI Number <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm mb-3" placeholder="" value="{{ $employeesDTL[0]->esi_number }}" name="esi_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                                </div>
                                    
                          </div>
                          <div class="row">
                          </div>
                        
                    <div class="mb-4 bg-head"><b>Bank Details</b></div>
                    
                      <div class="row">
                          <div class="col-md-4">
                           <label>Account holder name <span class="mandatory">*</span> </label>
                           <input type="text" class="form-control form-control-sm mb-3" placeholder="" id="account_holder_name" value="{{ $employeesDTL[0]->account_holder_name }}" name="account_holder_name">
                          </div>
                   
                            <div class="col-md-4">
                              <label>Bank name <span class="mandatory">*</span></label>
                             <input type="text" class="form-control form-control-sm mb-3" placeholder="" value="{{ $employeesDTL[0]->bank_name }}" name="bank_name">
                            </div>
                            <div class="col-md-4">
                              <label>Account number <span class="mandatory">*</span></label>
                              <input type="text" class="form-control form-control-sm mb-3" placeholder="" value="{{ $employeesDTL[0]->account_number }}" name="account_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                            </div>
                            <div class="col-md-4">
                              <label>IFSC code <span class="mandatory">*</span> </label>
                              <input type="text" class="form-control form-control-sm mb-3" placeholder="" value="{{ $employeesDTL[0]->ifsc_code }}" name="ifsc_code" >
                            </div>
                        </div>

                      <div class="mb-4 bg-head"><b>Family details</b></div>
                      <div class="row">
                         <div class="col-md-4">
                           <label>Relation name <span class="mandatory">*</span></label>
                         <input type="text" class="form-control form-control-sm mb-3" placeholder="" value="{{ $employeesDTL[0]->relation_name }}" name="relation_name">
                        </div>
                            <div class="col-md-4">
                              <label>Relation gender <span class="mandatory">*</span></label>
                             <select class="form-control-sm mb-3 select-input" name="relation_gender">
                                <option value="">Select</option>
                                <option value="Male" @if($employeesDTL[0]->relation_gender == 'Male') selected @endif>Male</option>
                                <option value="Female" @if($employeesDTL[0]->relation_gender == 'Female') selected @endif>Female</option>
                                <option value="Transgender" @if($employeesDTL[0]->relation_gender == 'Transgender') selected @endif>Transgender</option>
                              </select>
                            </div>
                            <div class="col-md-4">
                              <label>Relation type <span class="mandatory">*</span></label>
                              <select class="form-control-sm mb-3 select-input" name="relation_type">
                                <option value="">Select</option>
                                @if($relations)
                                @foreach($relations as $key=> $val)
                                 <option value="{{ $val->id }}" @if($val->id == $employeesDTL[0]->relation_type) selected @endif>{{ $val->relation }}</option>
                                @endforeach
                                @endif
                              </select>
                            </div>
                            <div class="col-md-4">
                              <label>Relation DOB <span class="mandatory">*</span></label>
                              <input type="date" class="form-control form-control-sm mb-3" placeholder="" value="{{ $employeesDTL[0]->relation_dob }}" name="relation_dob" onkeydown="return false">
                            </div>
                            <div class="col-md-4">
                              <label>Relation occupation <span class="mandatory">*</span></label>
                              <input type="text" class="form-control form-control-sm mb-3" placeholder="" value="{{ $employeesDTL[0]->relation_occupation }}" name="relation_occupation">
                            </div>
                            <div class="col-md-4">
                              <label>Family photo should be added <a class="badge bg-success text-white" target="_blank" href="{{ asset('public/assets/employee_files') }}/{{ $employeesDTL[0]->family_photo }}"><i class="fas fa-file-alt"></i> File</a></label>
                              <input type="file" class="form-control form-control-sm mb-3" placeholder="" name="family_photo">
                            </div>
                        </div>
                        <div class="mb-4 bg-head"><b>Nominee Details</b></div>
                      <div class="row">
                         <div class="col-md-4">
                           <label>Nominee name <span class="mandatory">*</span></label>
                         <input type="text" class="form-control form-control-sm mb-3" placeholder="" value="{{ $employeesDTL[0]->nominee_details }}" name="nominee_details">
                        </div>
                            <div class="col-md-4">
                              <label>Nominee Relation <span class="mandatory">*</span></label>
                              <select class="form-control-sm mb-3 select-input" name="nominee_relation">
                                <option value="">Select</option>
                                @if($relations)
                                @foreach($relations as $key=> $val)
                                 <option value="{{ $val->id }}" @if($val->id == $employeesDTL[0]->nominee_relation) selected @endif>{{ $val->relation }}</option>
                                @endforeach
                                @endif
                              </select>
                            </div>
                            <div class="col-md-4">
                              <label>Nominee gender <span class="mandatory">*</span></label>
                             <select class="form-control-sm mb-3 select-input" name="nominee_gender">
                                <option value="">Select</option>
                                 <option value="Male" @if($employeesDTL[0]->nominee_gender == 'Male') selected @endif>Male</option>
                                <option value="Female" @if($employeesDTL[0]->nominee_gender == 'Female') selected @endif>Female</option>
                                <option value="Transgender" @if($employeesDTL[0]->nominee_gender == 'Transgender') selected @endif>Transgender</option>
                              </select>
                            </div>
                            <div class="col-md-4">
                              <label>Nominee DOB <span class="mandatory">*</span></label>
                              <input type="date" class="form-control form-control-sm mb-3" placeholder="" value="{{ $employeesDTL[0]->nominee_dob }}" name="nominee_dob" onkeydown="return false">
                            </div>
                        </div>
                          <div class="mt-3 mb-3 bg-head"><b>Objective/aspirations <span class="mandatory"></span></b></div>
                            <textarea class="w-100 textarea-h" name="objective_aspirations">{{ $employeesDTL[0]->objective_aspirations }}</textarea>
                          <div class="mt-3 mb-3 bg-head"><b>Contributions/awards <span class="mandatory"></span></b></div>
                          <textarea class="w-100 textarea-h" name="contributions_awards">{{ $employeesDTL[0]->contributions_awards }}</textarea>
                          <div class="mt-3 mb-3 bg-head"><b>Current role description <span class="mandatory"></span></b></div>
                          <textarea class="w-100 textarea-h" name="current_role_description">{{ $employeesDTL[0]->current_role_description }}</textarea>
                          <div class="mt-3 mb-3 bg-head"><b>Disciplinary cases/suspensions <span class="mandatory"></span></b></div>
                          <textarea class="w-100 textarea-h" name="discplinary_cases_suspensions">{{ $employeesDTL[0]->discplinary_cases_suspensions }}</textarea>

                      
                    
                    <div class="text-center mt-2 mb-2 ">
                         <button class="btn btn-md btn-submit" name="submit" value="submit">Submit</button>
                       </div>
                    </div>
                    <div class="col-md-3">
                      <!--<div class="user-prof">-->
                      <!--  <img src="{{ asset('public/assets/employee_files') }}/{{ $employeesDTL[0]->photo }}" class="img-fluid">-->
                      <!--</div>-->
                      
                        <!--<label>Photo</label>-->
                        <!--<input type="file" class="form-control form-control-sm mb-3" name="photo">-->
                      
                      
                      
                      <div class="col-ting">
                            <div class="control-group file-upload" id="file-upload1">
                              <div class="image-box text-center">
                            		 
                            		<img src="{{ asset('public/assets/employee_files') }}/{{ $employeesDTL[0]->photo }}" class="img-fluid rounded">
                            		<div class="image_upload"><small>Please Click here to<br> <strong>Upload New Photo</strong></small><span class="mandatory"> *</span></div>
                            	</div>
                                 <div class="controls" style="display: none;">
                            		<input type="file" name="photo" id="photo"/>
                            	</div>
                            	<center>
                            	
                            </center>	
                            </div>
                        </div>
                      
                      
                    </div>
                  </div>
                  </div>

                  
                 

                  </div>
                </div>
            </form>

      </main>
           
 <div class="row">
           
</div>




</div>

<script>
$(".image-box").click(function(event) {
	var previewImg = $(this).children("img");

	$(this)
		.siblings()
		.children("input")
		.trigger("click");

	$(this)
		.siblings()
		.children("input")
		.change(function() {
			var reader = new FileReader();

			reader.onload = function(e) {
				var urll = e.target.result;
				$(previewImg).attr("src", urll);
				previewImg.parent().css("background", "transparent");
				previewImg.show();
				previewImg.siblings("p").hide();
			};
			reader.readAsDataURL(this.files[0]);
		});
});

</script>
<!--Pie Charts-->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="assets/plugins/easyPieChart/jquery.easypiechart.js"></script>
 
  
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
                employee_type: "required",
                joining_designation: "required",
                communication_address: "required",
                communication_address_pin_code: {
                    required: true,
                    minlength:6,
                    maxlength:6
                },
                permenant_address: "required",
                permenant_address_pin_code: {
                    required: true,
                    minlength:6,
                    maxlength:6
                },
                // district: "required",
                // ulbid: "required",
                mandal: "required",
                state: "required",
                mobile_number: {
                    required: true,
                    minlength:10,
                    maxlength:10
                },
                // alternative_mobile_number: {
                //     required: true,
                //     minlength:10,
                //     maxlength:10
                // },
                email_id: {
                    required: true,
                    email: true
                },
            
                religion: "required",
                caste: "required",
                marital_status: "required",
                if_select_single: "required",
                nationality: "required",
                
                adhaar_card_number: {
                    required: true,
                    minlength:12,
                    maxlength:12
                },
                // adhaar_card: "required",
                pan_card_number: "required",
                // pan_card: "required",
                degree: "required",
                year_of_passing: "required",
                university_college: "required",
                // certificates: "required",
                discpline: "required",
                date_of_joining: "required",
                designation: "required",
                location: "required",
                // doj: "required",
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
                // family_photo: "required",
                
                nominee_details: "required",
                nominee_relation: "required",
                nominee_gender: "required",
                nominee_dob: "required",
                
                // objective_aspirations: "required",
                // contributions_awards: "required",
                // current_role_description: "required",
                // discplinary_cases_suspensions: "required",
                
                // photo: "required",
                
            },
            messages: {
                name: "Please Enter Name",
                surname: "Please Enter surname",
                dob: "Please Select Valid DOB",
                co: "Mandatory Field",
                co_name: "Mandatory Field",
                gender: "Mandatory Field",
                employee_type: "Mandatory Field",
                joining_designation: "Mandatory Field",
                communication_address: "Mandatory Field",
                communication_address_pin_code: "Please Enter 6 Digit valid Pin code",
                permenant_address: "Mandatory Field",
                permenant_address_pin_code: "Please Enter 6 Digit valid Pin code",
                // district: "Mandatory Field",
                // ulbid: "Mandatory Field",
                mandal: "Mandatory Field",
                state: "Mandatory Field",
                
                mobile_number: {
                    required: "Please Enter Mobile Number",
                    minlength: "Please Enter 10 digit valid Mobile Number",
                    maxlength: "Please Enter 10 digit valid Mobile Number",
                },
                alternative_mobile_number: {
                    required: "Please Enter Alternative Mobile Number",
                    minlength: "Please Enter 10 digit valid Alternative Mobile Number",
                    maxlength: "Please Enter 10 digit valid Alternative Mobile Number",
                },
                email_id: "Please enter a valid email address",
                religion: "Mandatory Field",
                caste: "Mandatory Field",
                marital_status: "Mandatory Field",
                if_select_single: "Mandatory Field",
                nationality: "Mandatory Field",
                
                adhaar_card_number: {
                    required: "Please Enter Adhaar Card Number",
                    minlength: "Please Enter 12 digit valid Adhaar Card Number",
                    maxlength: "Please Enter 12 digit valid Adhaar Card Number",
                },
                adhaar_card: "Mandatory Field",
                pan_card_number: "Mandatory Field",
                pan_card: "Mandatory Field",
                degree: "Mandatory Field",
                year_of_passing: "Mandatory Field",
                university_college: "Mandatory Field",
                certificates: "Mandatory Field",
                discpline: "Mandatory Field",
                date_of_joining: "Mandatory Field",
                designation: "Mandatory Field",
                location: "Mandatory Field",
                doj: "Mandatory Field",
                current_grade: "Mandatory Field",
                current_level: "Mandatory Field",
                
                
                "current_designation[]": "Please select category",
                "current_status[]": "Please select category",
                "current_location[]": "Please select category",
                "duty_type[]": "Please select category",
                
                "start_date[]": "Mandatory Field",
                "end_date[]": "Mandatory Field",
                "disgnation[]": "Mandatory Field",
                "work_experience_location[]": "Mandatory Field",
                
                
                current_basic_salary: "Mandatory Field",
                pf_number: "Mandatory Field",
                esi_number: "Mandatory Field",
                
                account_holder_name: "Mandatory Field",
                bank_name: "Mandatory Field",
                account_number: "Mandatory Field",
                ifsc_code: "Mandatory Field",
                
                relation_name: "Mandatory Field",
                relation_gender: "Mandatory Field",
                relation_type: "Mandatory Field",
                relation_dob: "Mandatory Field",
                relation_occupation: "Mandatory Field",
                family_photo: "Mandatory Field",
                
                nominee_details: "Mandatory Field",
                nominee_relation: "Mandatory Field",
                nominee_gender: "Mandatory Field",
                nominee_dob: "Mandatory Field",
                
                objective_aspirations: "Mandatory Field",
                contributions_awards: "Mandatory Field",
                current_role_description: "Mandatory Field",
                discplinary_cases_suspensions: "Mandatory Field",
                
                // photo: "Mandatory Field",
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
        var district = $('#district').val();
        var ulbid = $('#ulbid_list').val();
        
        $.ajax({
               type:'POST',
               url:'{{ route('AddCurrentDesignation'); }}',
               data:{current_designation_no : current_designation_no, district: district, ulbid:ulbid},
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

function rem(no)
{
    var div = document.getElementById("alert");
    var div1 = document.getElementById("alert1");
    //alert(no);
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
    $.ajax({
               type:'POST',
               url:'{{ route('rem_cur_desi'); }}',
               data:{current_designation_no : no},
               dataType: 'JSON',
               beforeSend: function() 
                { 
                    //alert("beforeSend");
                    $("#overlay").fadeIn();
                },
               success:function(data) {
                   if(data==1)
                   {
                        div.innerHTML = 'designation removed successfully';
                        div.style.display = "block";

                   }
                   else
                   {
                        div1.innerHTML = 'Something went wrong please try again';
                        div1.style.display = "block";
                   }
                  
               },
                complete: function() 
                { 
                   // alert("complete");
                    $("#overlay").fadeOut();
                }
            });
    
    
}
    function remove(no, existing = 0, id = 0)
    {
        // rcs();
        //alert(no);
        //  $('.render'+no).css('display', 'none');
         
        //  $('.current_location'+no).val('');
         var IsExistingDesignation = existing;
         
            
            if (confirm('Are you sure you want to delete this current designation?')) {
            
                  var current_designation_no = $('#current_designation_no').val();
                 $.ajax({
                       type:'POST',
                       url:'{{ route('RemoveCurrentDesignation'); }}',
                       data:{"_token": "{{ csrf_token() }}", current_designation_no : current_designation_no, is_existing_designation: IsExistingDesignation, id: id},
                       dataType: 'JSON',
                       beforeSend: function() 
                        { 
                            $("#overlay").fadeIn();
                        },
                       success:function(data) {
                           if(existing) {
                               $('.render'+id).remove(); 
                           } else {
                               $('.render'+no).remove(); 
                           }
                           
                        //   $('#current_designation_no').val(data.return_numbers);
                       },
                        complete: function() 
                        { 
                            $("#overlay").fadeOut();
                        }
                    });
             }
             else {
              return;
            }
    }
    
    function rcs() {
        $.ajax({
            url: '{{ route('rcs'); }}',
            type: 'get',
            dataType: 'json',
            success: function (result) {
                $('meta[name="csrf-token"]').attr('content', result.token);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': result.token
                    }
                });
            },
            error: function (xhr, status, error) {
                console.log(xhr);
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
    
    function GetUlbs()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var district = $('#district').val();
        $('#ulbid_list').empty();
        $('#ulbid_list').html('<option value="">Select Ulb </option>');
        $.ajax({
               type:'POST',
               url:'{{ route('GetUlbs'); }}',
               data:{district : district},
               dataType: 'JSON',
               beforeSend: function() 
                { 
                    $("#overlay").fadeIn();
                },
               success:function(data) {
                //   console.log(data);
                 $.each(data, function(key, value) {
                        $('#ulbid_list').append('<option value="'+ value.ulbid +'">'+ value.ulbname +'</option>');
                    });
                GetCurrentDesignation(district);
               },
                complete: function() 
                { 
                    $("#overlay").fadeOut();
                }
            });
    }
    
    function GetCurrentDesignationByUlb()
    {
        var district = $('#district').val();
        
        GetCurrentDesignation(district);
    }
    function GetCurrentDesignation(district)
    {
        // $('.current_designation').remove();
        jQuery('.current_designation div').html('');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var totalExists = '<?php echo count($employeesDTL[0]->GetCurrentStatus); ?>';
        //alert(totalExists);
        for(num = 0; num < totalExists; num++)
        {
            
            $('#current_designations'+num).empty();
            $('#current_designations'+num).html('<option value="">Select </option>');
            var ulbid = $('#ulbid_list').val();
            $.ajax({
                   type:'POST',
                   url:'{{ route('GetCurrentDesignationS'); }}',
                   data:{district : district, ulbid: ulbid },
                   dataType: 'JSON',
                   beforeSend: function() 
                    { 
                        $("#overlay").fadeIn();
                    },
                   success:function(data) {
                    
                        for(num1 = 0; num1 < totalExists; num1++)
                        {
                            $('#current_designations'+num1).empty();
                            $('#current_designations'+num1).html('<option value="">Select </option>');
                            // $("#current_designations"+num1).prepend('<option selected="selected" value="0"> Select 1 </option>');
                               $.each(data, function(key, value) {
                        
                              $("#current_designations"+num1).append('<option value="'+ value.id +'">'+ value.description +'</option>');
                             
                        });
                        }
                   },
                    complete: function() 
                    { 
                        $("#overlay").fadeOut();
                    }
                });
        }
        
    }
    
    $('#name-field').bind('keypress', namefieldInput);
    $('#name-field').bind('paste', namefieldInput);
    function namefieldInput(event) {
       var value = String.fromCharCode(event.which);
       var pattern = new RegExp(/[a-zåäö ]/i);
       return pattern.test(value);
    }
    
    $('#surname-field').bind('keypress', surnamefieldInput);
    $('#surname-field').bind('paste', surnamefieldInput);
    function surnamefieldInput(event) {
       var value = String.fromCharCode(event.which);
       var pattern = new RegExp(/[a-zåäö ]/i);
       return pattern.test(value);
    }
    
    $('#co-name-field').bind('keypress', conamefieldInput);
    $('#co-name-field').bind('paste', conamefieldInput);
    function conamefieldInput(event) {
       var value = String.fromCharCode(event.which);
       var pattern = new RegExp(/[a-zåäö ]/i);
       return pattern.test(value);
    }
    
    $('#mandal-field').bind('keypress', mandalfieldInput);
    $('#mandal-field').bind('paste', mandalfieldInput);
    function mandalfieldInput(event) {
       var value = String.fromCharCode(event.which);
       var pattern = new RegExp(/[a-zåäö ]/i);
       return pattern.test(value);
    }
    
    $('#state-field').bind('keypress', statefieldInput);
    $('#state-field').bind('paste', statefieldInput);
    function statefieldInput(event) {
       var value = String.fromCharCode(event.which);
       var pattern = new RegExp(/[a-zåäö ]/i);
       return pattern.test(value);
    }
    
    $('#if_select_single').bind('keypress', MaritalstatusfieldInput);
    $('#if_select_single').bind('paste', MaritalstatusfieldInput);
    function MaritalstatusfieldInput(event) {
       var value = String.fromCharCode(event.which);
       var pattern = new RegExp(/[a-zåäö ]/i);
       return pattern.test(value);
    }
    $('#nationality').bind('keypress', nationalityfieldInput);
    $('#nationality').bind('paste', nationalityfieldInput);
    function nationalityfieldInput(event) {
       var value = String.fromCharCode(event.which);
       var pattern = new RegExp(/[a-zåäö ]/i);
       return pattern.test(value);
    }
    $('#university_college').bind('keypress', universitycollegefieldInput);
    $('#university_college').bind('paste', universitycollegefieldInput);
    function universitycollegefieldInput(event) {
       var value = String.fromCharCode(event.which);
       var pattern = new RegExp(/[a-zåäö ]/i);
       return pattern.test(value);
    }
    $('#location').bind('keypress', locationfieldInput);
    $('#location').bind('paste', locationfieldInput);
    function locationfieldInput(event) {
       var value = String.fromCharCode(event.which);
       var pattern = new RegExp(/[a-zåäö ]/i);
       return pattern.test(value);
    }
    
    $('#account_holder_name').bind('keypress', account_holder_namefieldInput);
    $('#account_holder_name').bind('paste', account_holder_namefieldInput);
    function account_holder_namefieldInput(event) {
       var value = String.fromCharCode(event.which);
       var pattern = new RegExp(/[a-zåäö ]/i);
       return pattern.test(value);
    }
    
    $('#pan_card_number').bind('keypress', pan_card_numberfieldInput);
    $('#pan_card_number').bind('keyup', pan_card_numberfieldInput);
    $('#pan_card_number').bind('paste', pan_card_numberfieldInput);
    function pan_card_numberfieldInput(event) {
      var getPanNo = $('#pan_card_number').val().toUpperCase();
       $('#pan_card_number').val(getPanNo);
    }
    
    
    
    
    
    function GetMaritalStatusDtl()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        
       var matrialstatusid = $('#marital_status').val();
       if(matrialstatusid)
       {
           $.ajax({
               type:'POST',
               url:'{{ route('GetMaritalStatus'); }}',
               data:{matrialstatusid : matrialstatusid},
               dataType: 'JSON',
               beforeSend: function() 
                { 
                    $("#overlay").fadeIn();
                },
               success:function(data) {
                  $("#if_select_single").prop("readonly", false);
                 $('.MaritalHeading').text(data.status_name);
               },
                complete: function() 
                { 
                    $("#overlay").fadeOut();
                }
            });
       }
        else
        {
            $('.MaritalHeading').text("Please select Marital status");
             $("#if_select_single").prop("readonly", true);
        }
    }
    
    
    
    function GetDiscipline(NameoftheDegree)
    {
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#discpline').empty();
        $('#discpline').html('<option value="">Select Discipline </option>');
       if(NameoftheDegree.value)
       {
           $.ajax({
               type:'POST',
               url:'{{ route('GetDisciplineLists'); }}',
               data:{nameofthedegree : NameoftheDegree.value},
               dataType: 'JSON',
               beforeSend: function() 
                { 
                    $("#overlay").fadeIn();
                },
               success:function(data) {
                  $.each(data, function(key, value) {
                        $('#discpline').append('<option value="'+ value.id +'">'+ value.discpline +'</option>');
                    });
               },
                complete: function() 
                { 
                    $("#overlay").fadeOut();
                }
            });
       }
    }
    
    
    function submitBday(e) {
        $('#dob-field-error').remove();
        var Bday = new Date(e);
        var Q4A =  ((Date.now() - Bday) / (31557600000));
        if(Q4A < 18) {
            $('input[name=dob]').val('');
            console.log('less than 18');
            $('input[name=dob]').after('<label id="dob-field-error" class="error" for="dob-field">Age should not be less than 18 years!</label>')
            
        } 
    }
    </script>

<!--close-->
 @include('headers.footer')

