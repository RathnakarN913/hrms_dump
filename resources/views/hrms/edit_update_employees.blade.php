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
    background: #d5eef7;
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
    background-color:#327c95;
    padding: 5px 15px;
    border-radius: 4px;
    font-size: 17px;
    color: white;
    border-left: 5px #f38509 solid;
}
.user-profile-bg {
    /*background-color: white;*/
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
    width:auto;
}
.btn-submit:hover {
    color: #fff;
    background-color:#508d0d;
}

.btn-danger {
    color: #fff;
    background-color: #ff2121;
    border-color: #ff1414;
    padding: 7px 15px;
    font-size: 16px;
    margin-top: 15px;
    border-radius: 15px;
    width:auto;
}
.btn-danger:hover {
    color: #fff;
    background-color:#c31616;
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
input:read-only {
    background-color: #e5e5e5 !important;
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

.card_bd_pd{
        padding: 25px !important;
}

.card_bd_pd1{
        padding: 8px !important;
}

.mandatory
{
    color: red;
}

.colr1{
    background-color: #FFF2F2;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}


.colr2{
    background-color: #e6fbf8;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}
.colr3{
    background-color: #FEFBE7;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}

.colr4{
    background-color: #ffeff3;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}

.colr5{
    background-color: #def3e7;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}

.colr6{
    background-color: #FFF6EA;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}
.colr7{
    background-color: #e7f1eb;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}
.colr8{
    background-color: #E4FBFF;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}
.colr9{
    background-color: #FFE2E2;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}
.colr10{
    background-color: #E0ECE4;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}
.colr11{
    background-color: #F8E1F4;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}
.colr12{
    background-color: #CFF1EF;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}
.colr13{
    background-color: #d8ebd9;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}
.colr14{
    background-color: #E1F2FB;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}


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
                   <div class="error alert alert-danger">
                     <?php echo "<pre>".implode(",\n",$errors->all(':message'))."</pre>"; ?>
                    </div>
                @endif

                <div class="mb-0 ml-4"><b>Edit Employees Details</b></div>

              <div class="bg-white1">

                <div class="table-content">

                  <div>

                      <form name="add" method="post" action="{{ route('UpdateEmployee') }}" enctype="multipart/form-data">

                       <div class="card shadow">
                       <div class="card-header p-0"> <div class=" bg-head"><b>Personal Information</b></div> </div>
                        <div class="card-body">

                           <div class="row m-0 colr1" >

                              <div class="col-md-9 order-sm-first order-last card_bd_pd">

                                   @csrf
                          <input type="hidden" class="form-control form-control-sm mb-3" placeholder="" id="edit_emp_id" name="edit_emp_id" value="{{ $employeesDTL[0]->employee_id }}" required>
                          <input type="hidden" name="employee_type" value="{{$employeesDTL[0]->employee_type}}">
                          <input type="hidden" name="district" value="{{$employeesDTL[0]->district}}">
                          <input type="hidden" name="ulbid" value="{{$employeesDTL[0]->ulbid}}">


                            <div class="row">
                            <div class="col-md-4">
                              <label>Name of the Employee  <span class="mandatory">*</span></label>
                              <input type="text" class="form-control form-control-sm mb-3 ml-0" placeholder="Name" id="name-field" name="name" value="{{ $employeesDTL[0]->name }}" required>
                            </div>
                            <div class="col-md-4">
                              <label>Surname <span class="mandatory"></span></label>
                              <input type="text" class="form-control form-control-sm mb-3 ml-0" placeholder="Surname" id="surname-field" name="surname" value="{{ $employeesDTL[0]->surname }}">
                            </div>
                            <div class="col-md-4">
                              <label>Date of Birth <span class="mandatory">*</span></label>
                              <input type="date" class="form-control form-control-sm mb-3 ml-0" placeholder="" onchange="submitBday(this.value)" name="dob" value="{{ $employeesDTL[0]->dob }}" min="1950-01-01" max="<?php echo date("Y-m-d") ?>" onkeydown="return false">
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
                              <label>Marital Status <span class="mandatory">*</span></label>
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
                              <label class="MaritalHeading ">{{ $GetMaritalStatusInfo->status_name }} <span class="mandatory">*</span></label>
                              <input type="text" class="form-control form-control-sm mb-3 ml-0" placeholder="" id="if_select_single" name="if_select_single" value="{{ $employeesDTL[0]->if_select_single }}">
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
                                  <label>Sub Caste<span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm" id="subcaste" placeholder="" value="{{$employeesDTL[0]->subcaste}}" name="subcaste">
                                  <span class="text-danger">{{$errors->first('subcaste')}}</span>
                                </div>
                            <div class="col-md-4">
                              <label>Religion <span class="mandatory"></span></label>
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
                              <label >Nationality <span class="mandatory"></span></label>
                              <input type="text" class="form-control form-control-sm mb-3 ml-0" placeholder="" id="nationality" name="nationality" value="{{ $employeesDTL[0]->nationality }}">
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-8">
                               <label>Present Address <span class="mandatory">*</span></label>
                              <textarea class="textarea-form form-control" name="communication_address" id="communication_address" style="height: 64px;" name="communication_address">{{ $employeesDTL[0]->communication_address }}</textarea>
                            </div>
                            <div class="col-md-4">
                              <label>Pin Code <span class="mandatory">*</span></label>
                              <input type="text" class="form-control form-control-sm mb-3 ml-0" placeholder="" maxlength="6" value="{{ $employeesDTL[0]->communication_address_pin_code }}" id="communication_address_pin_code" name="communication_address_pin_code" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                            </div>

                          <div class="mb-3 mt-3 ml-3">
                            <input type="checkbox" id="permenant_address_same_as_above" name="permenant_address_same_as_above" value="1" @if($employeesDTL[0]->permenant_address_same_as_above == 1) checked @endif> Please select Permanant address same as above
                          </div>
                            <div class="col-md-8">
                               <label>Permanant Address <span class="mandatory">*</span></label>
                              <textarea class="textarea-form form-control" name="permenant_address" id="permenant_address" style="height: 64px;">{{ $employeesDTL[0]->permenant_address }}</textarea>
                            </div>
                            <div class="col-md-4">
                              <label>Pin Code <span class="mandatory">*</span></label>
                              <input type="text" class="form-control form-control-sm mb-3 ml-0" maxlength="6" value="{{ $employeesDTL[0]->permenant_address_pin_code }}" placeholder="" id="permenant_address_pin_code" name="permenant_address_pin_code" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                            </div>
                             <div class="col-md-4">
                              <label>Mobile Number <span class="mandatory">*</span></label>
                             <input type="text" class="form-control form-control-sm mb-3 ml-0" placeholder="" name="mobile_number" value="{{ $employeesDTL[0]->mobile_number }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                            </div>
                            <div class="col-md-4">
                              <label>Alternative Mobile Number <span class="mandatory"></span></label>
                              <input type="text" class="form-control form-control-sm mb-3 ml-0" placeholder="" name="alternative_mobile_number" value="{{ $employeesDTL[0]->alternative_mobile_number }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                            </div>
                            <div class="col-md-4">
                              <label>Email Id <span class="mandatory">*</span></label>
                              <input type="email" class="form-control form-control-sm mb-3 ml-0" placeholder="" name="email_id" value="{{ $employeesDTL[0]->email_id }}">
                            </div>
                          </div>


                              </div>

                            <div class="col-md-3 pt-3">

                                 <div class="col-ting">
                            <div class="control-group file-upload" id="file-upload1">
                              <div class="image-box text-center">

                            		<img src="{{ asset('assets/employee_files') }}/{{ $employeesDTL[0]->photo }}" class="img-fluid rounded">
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


                       <div class="card mt-3 shadow">

                       <div class="card-header p-0"> <div class="bg-head"><b>Native Details</b></div> </div>

                        <div class="card-body card_bd_pd1">

                            <div class="row colr2 m-1 pt-3">

                                <div class="col-md-4">
                                  <label>Native State <span class="mandatory"></span></label>
                                  <input type="text" class="form-control form-control-sm mb-3 ml-0" placeholder="" id="state-field" name="state" value="{{ $employeesDTL[0]->state }}">
                                </div>
                                <div class="col-md-4">
                                  <label>Native District <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm mb-3 ml-0" placeholder="" id="district-field" name="native_district" value="{{ $employeesDTL[0]->native_district }}">
                                </div>
                                <div class="col-md-4">
                                  <label>Native Mandal <span class="mandatory"></span></label>
                                  <input type="text" class="form-control form-control-sm mb-3 ml-0" placeholder="" id="mandal-field" name="mandal" value="{{ $employeesDTL[0]->mandal }}">
                                </div>
                                <div class="col-md-4">
                                  <label>Uploaded Native District Certificate <a class="badge bg-success text-white" target="_blank" href="{{ asset('assets/employee_files') }}/{{ $employeesDTL[0]->district_certi }}"><i class="fas fa-file-alt"></i> File</a></label>
                                  <input type="file" class="form-control form-control-sm mb-3 ml-0" placeholder="" name="district_certi">
                                </div>


                          </div>



                        </div>

                       </div>



                       <div class="card mt-3 shadow">

                       <div class="card-header p-0"> <div class="bg-head"><b>Statutory Details</b></div> </div>

                        <div class="card-body card_bd_pd1">


                            <div class="row  m-1 pt-3">
                                <div class="col-md-4">
                                  <label>Aadhar Card Number <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm mb-3 ml-0" maxlength="12" placeholder="" name="adhaar_card_number" value="{{ $employeesDTL[0]->adhaar_card_number }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                                </div>

                                 <div class="col-md-4">
                                  <label>Upload Aadhar Card <a class="badge bg-success text-white" target="_blank" href="{{ asset('assets/employee_files') }}/{{ $employeesDTL[0]->adhaar_card }}"><i class="fas fa-file-alt"></i> File</a></label>
                                  <input type="file" class="form-control form-control-sm mb-3 ml-0" placeholder="" name="adhaar_card">
                                </div>
                            </div>

                            <div class="row  m-1 pt-3">
                                <div class="col-md-4">
                                  <label>Pan Card Number <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm mb-3 ml-0" placeholder="" id="pan_card_number" name="pan_card_number" value="{{ $employeesDTL[0]->pan_card_number }}" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)">
                                </div>
                                <div class="col-md-4">
                                  <label>Upload Pan Card <a class="badge bg-success text-white" target="_blank" href="{{ asset('assets/employee_files') }}/{{ $employeesDTL[0]->pan_card }}"><i class="fas fa-file-alt"></i> File</a></label>
                                  <input type="file" class="form-control form-control-sm mb-3 ml-0" placeholder="" name="pan_card">
                                </div>
                            </div>


                            <div class="row colr3 m-1 pt-3">

                            <div class="col-md-4">
                                  <label>Basic Salary <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm mb-3 ml-0" placeholder="" value="{{ $employeesDTL[0]->current_basic_salary }}" name="current_basic_salary" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="current_basic_salary">
                                </div>

                                <div class="col-md-4">
                                  <label>PF Number <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm mb-3 ml-0" placeholder="" value="{{ $employeesDTL[0]->pf_number }}" name="pf_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                                </div>

                                <div class="col-md-4">
                                  <label>ESI Number <span class="mandatory">*</span></label>
                                  <input type="text" id="esi_number" class="form-control form-control-sm mb-3 ml-0" placeholder="" @if($employeesDTL[0]->current_basic_salary >21000) readonly @endif value="{{ $employeesDTL[0]->esi_number }}" name="esi_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                                </div>
                          </div>



                        </div>

                       </div>



                       <div class="card mt-3 shadow">

                       <div class="card-header p-0"> <div class="bg-head"><b>Education Details</b></div> </div>

                        <div class="card-body card_bd_pd1">
                    @if($employeesDTL[0]->EducationDetails)
                    @foreach($employeesDTL[0]->EducationDetails as $keyy => $childedu)
                    <div class="row">
                        <div class="col-md-11">
                            <div class="row colr4 m-1 pt-3">
                                    <div class="col-md-4">
                                        <label>Educational Qualification  <span class="mandatory">*</span></label>
                                        <select class="form-control-sm mb-3 select-input" id="degree" name="degree[]" onChange="GetDiscipline(this)">
                                            <option value="">Select</option>
                                                @if($educations)
                                                    @foreach($educations as $key=> $val)
                                                        <option value="{{ $val->id }}" @if($val->id == $childedu->degree) selected @endif>{{ $val->education_name }}</option>
                                                    @endforeach
                                                @endif
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Year of Passing <span class="mandatory">*</span></label>
                                        <select class="form-control-sm mb-3 select-input" name="year_of_passing[]">
                                            <option value="">Select</option>
                                                @if($years)
                                                    @foreach($years as $key=> $val)
                                                        <option value="{{ $val->id }}" @if($val->id == $childedu->year_of_passing) selected @endif>{{ $val->year }}</option>
                                                    @endforeach
                                                @endif
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>University/College <span class="mandatory">*</span></label>
                                        <input type="text" class="form-control form-control-sm mb-3" placeholder="" id="university_college" value="{{ $childedu->university_college }}" name="university_college[]">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Discipline <span class="mandatory"></span></label>

                                        <!--- <select class="form-control-sm mb-3 select-input" name="discpline" id="discpline">
                                            <option value="">Select</option>
                                            @if($discplines)
                                            @foreach($discplines as $key=> $val)
                                            <option value="{{ $val->id }}" @if($val->id == $employeesDTL[0]->discpline) selected @endif>{{ $val->discpline }}</option>
                                            @endforeach
                                            @endif
                                        </select> -->

                                        <input type="text" name="discpline[]" id="" class="form-control" value="{{ $childedu->discpline }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label>SSC Certificate Upload <a class="badge bg-success text-white" target="_blank" href="{{ asset('assets/employee_files') }}/{{ $employeesDTL[0]->certificates }}"><i class="fas fa-file-alt"></i> File</a></label>
                                        <input type="file" class="form-control form-control-sm mb-3 ml-0" placeholder="" name="certificates">
                                    </div>
                                    <div class="col-md-4 height_cet" style='@if( $childedu->degree > 1) display:block @else display:none @endif'>
                                        <label>Highest Qualification Certificate <a class="badge bg-success text-white" target="_blank" href="{{ asset('assets/employee_files') }}/{{ $childedu->highest_dgre_certificates }}"><i class="fas fa-file-alt"></i> File</a></label>
                                        <input type="file" class="form-control form-control-sm mb-3 ml-0" placeholder="" name="highest_dgre_certificates[]">
                                    </div>

                            </div>
                        </div>
                            <div class="col-md-1 p-0 d-flex align-items-center justify-content-center">
                                    @if($keyy == 0)
                                    <span class="btn-plus add_Edu"><i class="fas fa-plus"></i></span>
                                    @else
                                    <span class="btn-minus " onclick="" style="margin-top: 20px; display: inherit;"><i class="fa fa-minus"></i></span>
                                    @endif

                            </div>
                            <input name="edu_no" id="Edu_no" type="hidden" value="{{ count($employeesDTL[0]->EducationDetails) }}">

                    </div>

                        @endforeach
                        @endif

                        <div class="Edu_no">

                        </div>
                        </div>

                       </div>


                       <div class="card mt-3 shadow">

                       <div class="card-header p-0"> <div class="bg-head"><b>Professional Information</b></div> </div>

                        <div class="card-body card_bd_pd1">

                            <div class="row colr5 m-1 pt-3">

                          <div class="col-md-4">
                              <label>Date of Joining <span style="font-size: 12px;">(First Joining date) <span class="mandatory">*</span></span></label>
                                <input type="date" class="form-control form-control-sm mb-3 ml-0" placeholder="" name="date_of_joining" value="{{ $employeesDTL[0]->date_of_joining }}" onkeydown="return false">
                            </div>
                            <div class="col-md-4">
                              <label>Joining Designation <span class="mandatory">*</span></label>
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
                              <label>Joining Location <span class="mandatory">*</span></label>
                              <input type="text" class="form-control form-control-sm mb-3 ml-0" placeholder="" id="location" name="location" value="{{ $employeesDTL[0]->location }}" >
                            </div>
                            <div class="col-md-4">
                              <label>DOJ (Certificates to be Uploaded) <a class="badge bg-success text-white" target="_blank" href="{{ asset('assets/employee_files') }}/{{ $employeesDTL[0]->doj }}"><i class="fas fa-file-alt"></i> File</a></label>
                              <input type="file" class="form-control form-control-sm mb-3 ml-0" placeholder="" name="doj">
                            </div>

                          <div class="col-md-4  ">
                                  <label>Retirement Date<span style="font-size: 12px;">(From DOB to 61 Years)</span> <span class="mandatory">*</span></label>
                                  <input type="date" class="form-control form-control-sm ml-0" placeholder="" value="{{ $employeesDTL[0]->retirement_date }}" id="retirement_date" name="retirement_date" readonly="">
                                   <!--<small style="font-size:12px;"><i> <b>Note:</b> Upload files PDF, JPG, PNG only</i></small>-->
                                   <span class="text-danger"></span>
                                </div>

                          </div>

                            <div class="row mt-3 colr5 m-1 pt-3">


                             <div class="col-md-4">
                              <label>Current Level/Category <span class="mandatory">*</span></label>
                               <select class="form-control-sm mb-3 select-input" id="level" name="current_level">
                                <option value="">Select</option>
                                @if($currentlevels)
                                @foreach($currentlevels as $key=> $val)
                                 <option value="{{ $val->id }}" @if($val->id == $employeesDTL[0]->current_level) selected @endif>{{ $val->description }}</option>
                                @endforeach
                                <option value="">Select</option>
                                    <option value="c1" @if("c1" == $employeesDTL[0]->current_level) selected @endif>C1</option>
                                    <option value="c2" @if("c2" == $employeesDTL[0]->current_level) selected @endif>C2</option>
                                    <option value="c3" @if("c3" == $employeesDTL[0]->current_level) selected @endif>C3</option>
                                @endif
                              </select>
                            </div>

                            <div class="col-md-4" id="grade_div">
                              <label>Current Grade <span class="mandatory">*</span></label>
                              <select class="form-control-sm mb-3 select-input" name="current_grade" id="grade">
                                <option value="">Select</option>
                                @if($grades)
                                @foreach($grades as $key=> $val)
                                 <option value="{{ $val->id }}" @if($val->id == $employeesDTL[0]->current_grade) selected @endif>{{ $val->grade }}</option>
                                @endforeach
                                @endif
                              </select>
                            </div>

                          </div>


                           @if($employeesDTL[0]->GetCurrentStatus)
                        @foreach($employeesDTL[0]->GetCurrentStatus as $k => $childCurrentStatus)
                            <div class="row colr5 m-1 m-0 render{{ $childCurrentStatus->current_info_id }}" style="background-color: #e2eeef; border-bottom-left-radius: 10px;  border-bottom-right-radius: 10px;">
                            <input type="hidden" value="{{ $childCurrentStatus->current_info_id }}" name="current_info_id[]">
                              <div class="col-md-12 pt-2" style="border-right: 1px #aedde1  solid;">
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
                                      <input type="text" class="form-control form-control-sm mb-3 ml-0" placeholder="" value="{{ $childCurrentStatus->current_location }}" name="current_location[]">
                                    </div>

                                   <!--- <div class="col-md-4">
                                      <label>Duty type  <span class="mandatory">@if($k == "0") * @endif</span></label>
                                      <select class="form-control-sm mb-3 select-input " name="duty_type[]">
                                        <option value="">Select</option>
                                        @if($dutytypes)
                                        @foreach($dutytypes as $key=> $val)
                                         <option value="{{ $val->id }}" @if($val->id == $childCurrentStatus->duty_type) selected @endif>{{ $val->duty_type_name }}</option>
                                        @endforeach
                                        @endif
                                      </select>
                                    </div> -->




                              </div>
                          </div>

                           <!--- <div class="col-md-1 p-0 d-flex align-items-center justify-content-center">
                              @if($k == 0)
                              <span class="btn-plus add-new"><i class="fas fa-plus"></i></span>
                              @else
                              <span class="btn-minus removeExistsCurrentStatus" onclick="remove(0, 1, {{$childCurrentStatus->current_info_id}})" style="margin-top: 28px; display: inherit;"><i class="fas fa-minus" ></i></span>
                              <span class="btn-minus removeExistsCurrentStatus" style="margin-top: 28px; display: inherit;"><i class="fas fa-minus" onclick="rem({{$childCurrentStatus->current_info_id}})"></i></span>
                              @endif
                           </div> -->


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
                            <div class="row mt-2  b-3 m-0" style="background-color: #e2eeef; border-bottom-left-radius: 10px;     border-bottom-right-radius: 10px;">
                                <div class="col-md-11 pt-2" style="border-right: 1px #aedde1  solid;">
                                   <div class="row">
                                      <div class="col-md-4  ">
                                          <label>Start Date <span class="mandatory"></span></label>
                                        <input type="date" name="start_date[]" class="form-control form-control-sm ml-0" placeholder="Start date"  value="{{ $childWorkExperience->start_date }}" onkeydown="return false">
                                      </div>
                                      <div class="col-md-4   ">
                                          <label>End Date <span class="mandatory"></span></label>
                                        <input type="date" name="end_date[]" class="form-control form-control-sm ml-0" placeholder="End date"  value="{{ $childWorkExperience->end_date }}" onkeydown="return false">
                                      </div>


                                     <div class="col-md-4 ">
                                      <label>Designation <span class="mandatory"></span></label>
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
                                          <label>Location <span class="mandatory"></span></label>
                                          <input type="text" class="form-control form-control-sm mb-3 ml-0" placeholder="" name="work_experience_location[]" value="{{ $childWorkExperience->work_experience_location }}">

                                        </div>

                                     </div>
                                </div>
                                <div class="col-md-1 p-0 d-flex align-items-center justify-content-center">
                                      @if($keyy == 0)
                                      <span class="btn-plus add-new1"><i class="fas fa-plus"></i></span>
                                      @else
                                      <span class="btn-minus removeExistsWorkExperience" onclick="removeExistsWorkExperience({{ $childWorkExperience->work_experience_id }})" style="margin-top: 20px; display: inherit;"><i class="fa fa-minus"></i></span>
                                      @endif

                                </div>
                                <input name="work_experience_no" id="work_experience_no" type="hidden" value="{{ count($employeesDTL[0]->GetWorkExperience) }}">
                            </div>
                            @endforeach
                            @endif

                            <div class="work_experience">

                            </div>




                        </div>

                       </div>


                       <div class="card mt-3 shadow">

                       <div class="card-header p-0"> <div class="bg-head"><b>Bank Details</b></div> </div>

                            <div class="card-body card_bd_pd1">

                              <div class="row  colr6 m-1 pt-3">

                              <div class="col-md-4">
                               <label>Account Holder Name <span class="mandatory"></span> </label>
                               <input type="text" class="form-control form-control-sm mb-3 ml-0" placeholder="" id="account_holder_name" value="{{ $employeesDTL[0]->account_holder_name }}" name="account_holder_name">
                              </div>

                                <div class="col-md-4">
                                  <label>Bank Name <span class="mandatory"></span></label>
                                 <input type="text" class="form-control form-control-sm mb-3 ml-0" placeholder="" value="{{ $employeesDTL[0]->bank_name }}" name="bank_name">
                                </div>
                                <div class="col-md-4">
                                  <label>Account Number <span class="mandatory"></span></label>
                                  <input type="text" class="form-control form-control-sm mb-3 ml-0" placeholder="" value="{{ $employeesDTL[0]->account_number }}" name="account_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                                </div>
                                <div class="col-md-4">
                                  <label>IFSC Code <span class="mandatory"></span> </label>
                                  <input type="text" class="form-control form-control-sm mb-3 ml-0" placeholder="" value="{{ $employeesDTL[0]->ifsc_code }}" name="ifsc_code" >
                                </div>
                            </div>

                            </div>

                       </div>
                       <div class="card mt-3 shadow">

                       <div class="card-header p-0"> <div class="bg-head"><b>Family Details</b></div> </div>

                            <div class="card-body card_bd_pd1">

                            @if(count($employeesDTL[0]->EmployeeFamilyDetails) > 0)

                            @foreach($employeesDTL[0]->EmployeeFamilyDetails as $keyy => $familydetails)

                            <input type="hidden" value="{{ $familydetails->member_id }}" name="member_id[]">
                               <div class="row colr8 m-1 pt-3">
                                   <div class="col-md-11 pt-2" style="border-right: 1px #aedde1  solid;">

                                           <div class="row">
                                     <div class="col-md-4">
                                       <label>Relation Name <span class="mandatory">*</span></label>
                                     <input type="text" class="form-control form-control-sm mb-3 ml-0" placeholder="" value="{{ $familydetails->relation_name }}" name="relation_name[]">
                                    </div>
                                        <div class="col-md-4">
                                          <label>Relation Gender <span class="mandatory">*</span></label>
                                         <select class="form-control-sm mb-3 select-input" name="relation_gender[]">
                                            <option value="">Select</option>
                                            <option value="Male" @if($familydetails->relation_gender == 'Male') selected @endif>Male</option>
                                            <option value="Female" @if($familydetails->relation_gender == 'Female') selected @endif>Female</option>
                                            <option value="Transgender" @if($familydetails->relation_gender == 'Transgender') selected @endif>Transgender</option>
                                          </select>
                                        </div>
                                        <div class="col-md-4">
                                          <label>Relation type <span class="mandatory">*</span></label>
                                          <select class="form-control-sm mb-3 select-input" name="relation_type[]">
                                            <option value="">Select</option>
                                            @if($relations)
                                            @foreach($relations as $key=> $val)
                                             <option value="{{ $val->id }}" @if($val->id == $familydetails->relation_type) selected @endif>{{ $val->relation }}</option>
                                            @endforeach
                                            @endif
                                          </select>
                                        </div>
                                        <div class="col-md-4">
                                          <label>Relation DOB <span class="mandatory">*</span></label>
                                          <input type="date" class="form-control form-control-sm mb-3 ml-0" placeholder="" value="{{ $familydetails->relation_dob }}" name="relation_dob[]" onkeydown="return false">
                                        </div>
                                        <div class="col-md-4">
                                          <label>Relation Occupation <span class="mandatory">*</span></label>
                                          <input type="text" class="form-control form-control-sm mb-3 ml-0" placeholder="" value="{{ $familydetails->relation_occupation }}" name="relation_occupation[]">
                                        </div>
                                        <div class="col-md-4">
                                          <label>Family Photo should be added <a class="badge bg-success text-white" target="_blank" href="{{ asset('assets/employee_files') }}/{{ $employeesDTL[0]->family_photo }}"><i class="fas fa-file-alt"></i> File</a></label>
                                          <input type="file" class="form-control form-control-sm mb-3 ml-0" placeholder="" name="family_photo">
                                        </div>
                                        </div>
                                        </div>

                                            <div class="col-md-1 p-0 d-flex align-items-center justify-content-center">
                                      @if($keyy == 0)
                                      <span class="btn-plus add_Family"><i class="fas fa-plus"></i></span>
                                      @else
                                      <span class="btn-minus removeExistsfamily" onClick="removeExistsfamily({{$familydetails->member_id}})" style="margin-top: 20px; display: inherit;"><i class="fa fa-minus" ></i></span>
                                      @endif

                                </div>
                                <input name="Nominee_no" id="Family_no" type="hidden" value="{{ count($employeesDTL[0]->EmployeeFamilyDetails) }}">
                               </div>
                              @endforeach
                              @else
                              <!--extra code for no family details-->
                              <div class="row colr8 m-1 pt-3">
                                    <div class="col-md-11">
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label>Relation Name <span class="mandatory">*</span></label>
                                                <input type="text" class="form-control form-control-sm ml-0" placeholder="" value="{{old('relation_name.0')}}" name="relation_name[]">
                                                <span class="text-danger">{{$errors->first('relation_name.0')}}</span>
                                            </div>
                                            <div class="col-md-4">
                                              <label>Relation Gender <span class="mandatory">*</span></label>
                                             <select class="form-control-sm   select-input" name="relation_gender[]">
                                                <option value="">Select</option>
                                                <option value="Male" @if('Male' == old('relation_gender.0')) selected @endif>Male</option>
                                                <option value="Female" @if('female' == old('relation_gender.0')) selected @endif>female</option>
                                                <option value="Transgender" @if('Transgender' == old('relation_gender.0')) selected @endif>Transgender</option>
                                              </select>
                                              <span class="text-danger">{{$errors->first('relation_gender.0')}}</span>
                                            </div>
                                            <div class="col-md-4">
                                              <label>Relation type <span class="mandatory">*</span></label>
                                              <select class="form-control-sm   select-input " name="relation_type[]">
                                                <option value="">Select</option>
                                                @if($relations)
                                                @foreach($relations as $key=> $val)
                                                 <option value="{{ $val->id }}" @if($val->id == old('relation_type.0')) selected @endif>{{ $val->relation }}</option>
                                                @endforeach
                                                @endif
                                              </select>
                                              <span class="text-danger">{{$errors->first('relation_type.0')}}</span>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                              <label>Relation DOB <span class="mandatory">*</span></label>
                                              <input type="date" class="form-control form-control-sm ml-0 " placeholder="" value="{{old('relation_dob.0')}}" name="relation_dob[]" onkeydown="return false">
                                              <span class="text-danger">{{$errors->first('relation_dob.0')}}</span>
                                            </div>
                                            <div class="col-md-4">
                                              <label>Relation Occupation <span class="mandatory">*</span></label>
                                              <input type="text" class="form-control form-control-sm  ml-0" placeholder="" value="{{old('relation_occupation.0')}}" name="relation_occupation[]">
                                              <span class="text-danger">{{$errors->first('relation_occupation.0')}}</span>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                              <label>Family Photo should be added <span class="mandatory">*</span></label>
                                              <input type="file" class="form-control form-control-sm ml-0 " placeholder=""  name="family_photo">
                                               <small style="font-size:12px;"><i> <b>Note:</b> Upload files PDF, JPG, PNG only</i></small>
                                               <span class="text-danger">{{$errors->first('family_photo')}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-1 p-0 d-flex align-items-center justify-content-center" >
                                          <span class="btn-plus add_Family" style="margin:0px 2px"><i class="fa fa-plus"></i></span>
                                         <span class="btn-minus" style="margin:0px 2px"><i class="fa fa-minus"></i></span>
                                    </div>
                                    <input name="family_no" id="Family_no" type="hidden" value="0">
                                    <span class="text-danger">{{$errors->first('family_no')}}</span>

                                </div>


                                <!--extra cose for no family details-->
                              @endif
                              <div class="Family_no">

                            </div>
                            </div>

                       </div>

                        <!--<p class="mt-3 mb-3"><b>Work Experience</b></p>-->


                          <div class="card mt-3 shadow">

                       <div class="card-header p-0"> <div class="bg-head"><b>Nominee Details</b></div> </div>

                            <div class="card-body card_bd_pd1">


                            @if(count($employeesDTL[0]->EmployeesnomineeModel) > 0)
                            @foreach($employeesDTL[0]->EmployeesnomineeModel as $keyy => $nominnedetails)

                            <input type="hidden" value="{{ $nominnedetails->id }}" name="nominee_id[]">
                            <div class="row mt-2  b-3 m-0" style="background-color: #e2eeef; border-bottom-left-radius: 10px;     border-bottom-right-radius: 10px;">
                                <div class="col-md-11 pt-2" style="border-right: 1px #aedde1  solid;">

                                           <div class="row">
                                            <div class="col-md-8 ">
                                              <div class="row">
                                              <div class="col-md-6  ">
                                                  <label>Nominee Name <span class="mandatory"></span></label>
                                                     <input type="text" class="form-control form-control-sm " placeholder="" value="{{$nominnedetails->nominee_details}}" name="nominee_details[]">
                                                     <span class="text-danger">{{$errors->first('nominee_details.0')}}</span>
                                              </div>
                                              <div class="col-md-6 ">
                                                <label>Nominee Relation <span class="mandatory"></span></label>
                                                  <select class="form-control-sm   select-input" name="nominee_relation[]">
                                                    <option value="">Select</option>
                                                    @if($relations)
                                                    @foreach($relations as $key=> $val)
                                                     <option value="{{ $val->id }}" @if($val->id == $nominnedetails->nominee_relation) ) selected @endif>{{ $val->relation }}</option>
                                                    @endforeach
                                                    @endif
                                                  </select>
                                                  <span class="text-danger">{{$errors->first('nominee_relation.0')}}</span>
                                              </div>
                                            </div>
                                            </div>

                                             <div class="col-md-4 ">
                                            <label>Nominee Gender <span class="mandatory"></span></label>
                                             <select class="form-control-sm  select-input " name="nominee_gender[]">
                                                <option value="">Select</option>
                                                <option value="Male" @if('Male' == $nominnedetails->nominee_gender) selected @endif>Male</option>
                                                <option value="Female" @if('Female' == $nominnedetails->nominee_gender) selected @endif>Female</option>
                                                <option value="Transgender" @if('Transgender' == $nominnedetails->nominee_gender) selected @endif>Transgender</option>
                                              </select>
                                              <span class="text-danger">{{$errors->first('nominee_gender.0')}}</span>
                                            </div>

                                             <div class="col-md-4">
                                                 <label>Nominee DOB <span class="mandatory"></span></label>
                                                  <input type="date" class="form-control form-control-sm " placeholder="" value="{{$nominnedetails->nominee_dob}}" name="nominee_dob[]" onkeydown="return false">
                                                  <span class="text-danger">{{$errors->first('nominee_dob.0')}}</span>
                                               </div>
                                        </div>

                                </div>
                                <div class="col-md-1 p-0 d-flex align-items-center justify-content-center">
                                      @if($keyy == 0)
                                      <span class="btn-plus add_Nominee"><i class="fas fa-plus"></i></span>
                                      @else
                                      <span class="btn-minus removeExistsnominee" onclick="removecurruntnominee({{ $nominnedetails->id }})" style="margin-top: 20px; display: inherit;"><i class="fa fa-minus"></i></span>
                                      @endif

                                </div>
                                <input name="Nominee_no" id="Nominee_no" type="hidden" value="{{ count($employeesDTL[0]->EmployeesnomineeModel) }}">
                            </div>
                            @endforeach
                            @else
                                <div class="row colr7 m-1 pt-3" style="background-color: #e2eeef;">
                                        <div class="col-md-11 pb-3 pt-2" style="border-right: 1px #aedde1  solid;">
                                           <div class="row">
                                            <div class="col-md-8 ">
                                              <div class="row">
                                              <div class="col-md-6  ">
                                                  <label>Nominee Name <span class="mandatory"></span></label>
                                                     <input type="text" class="form-control form-control-sm " placeholder="" value="{{old('nominee_details.0')}}" name="nominee_details[]">
                                                     <span class="text-danger">{{$errors->first('nominee_details.0')}}</span>
                                              </div>
                                              <div class="col-md-6 ">
                                                <label>Nominee Relation <span class="mandatory"></span></label>
                                                  <select class="form-control-sm   select-input" name="nominee_relation[]">
                                                    <option value="">Select</option>
                                                    @if($relations)
                                                    @foreach($relations as $key=> $val)
                                                     <option value="{{ $val->id }}" @if($val->id == old('nominee_relation.0')) selected @endif>{{ $val->relation }}</option>
                                                    @endforeach
                                                    @endif
                                                  </select>
                                                  <span class="text-danger">{{$errors->first('nominee_relation.0')}}</span>
                                              </div>
                                            </div>
                                            </div>

                                             <div class="col-md-4 ">
                                            <label>Nominee Gender <span class="mandatory"></span></label>
                                             <select class="form-control-sm  select-input " name="nominee_gender[]">
                                                <option value="">Select</option>
                                                <option value="Male" @if('Male' == old('nominee_gender.0')) selected @endif>Male</option>
                                                <option value="Female" @if('Female' == old('nominee_gender.0')) selected @endif>Female</option>
                                                <option value="Transgender" @if('Transgender' == old('nominee_gender.0')) selected @endif>Transgender</option>
                                              </select>
                                              <span class="text-danger">{{$errors->first('nominee_gender.0')}}</span>
                                            </div>

                                             <div class="col-md-4">
                                                 <label>Nominee DOB <span class="mandatory"></span></label>
                                                  <input type="date" class="form-control form-control-sm " placeholder="" value="{{old('nominee_dob.0')}}" name="nominee_dob[]" onkeydown="return false">
                                                  <span class="text-danger">{{$errors->first('nominee_dob.0')}}</span>
                                               </div>
                                        </div>
                                       </div>
                                        <div class="col-md-1 p-0 d-flex align-items-center justify-content-center" >
                                              <span class="btn-plus add_Nominee" style="margin:0px 2px"><i class="fa fa-plus"></i></span>
                                             <span class="btn-minus" style="margin:0px 2px"><i class="fa fa-minus"></i></span>
                                        </div>
                                        <input name="work_experience_no" id="Nominee_no" type="hidden" value="0">
                                        <span class="text-danger">{{$errors->first('Nominee_no')}}</span>

                                 </div>
                            @endif

                            <div class="Nominee_no">

                            </div>
                            </div>

                       </div>



                       <div class="card mt-3 shadow">

                       <div class="card-header p-0"> <div class="bg-head"><b>Disciplinary Cases/Suspensions</b></div> </div>

                        <div class="card-body card_bd_pd1 colr9">

                          <div class="">

                            <textarea class="w-100 textarea-h form-control" name="discplinary_cases_suspensions">{{ $employeesDTL[0]->discplinary_cases_suspensions }}</textarea>

                         </div>

                        </div>

                       </div>



                      <!--- <div class="card mt-3 shadow">

                       <div class="card-header p-0"> <div class="bg-head"><b>Remarks <span class="mandatory"></span></b></div> </div>

                        <div class="card-body card_bd_pd1 colr10">

                          <div class="">

                            <textarea class="w-100 textarea-h form-control" name="emp_Remarks">{{ $employeesDTL[0]->emp_Remarks }}</textarea>

                            <span class="text-danger">{{$errors->first('emp_Remarks')}}</span>

                         </div>

                        </div>

                       </div> -->



                       <div class="card mt-3 shadow">

                       <div class="card-header p-0"> <div class="bg-head"><b>Objective/Inspirations <span class="mandatory"></span></b></div> </div>

                        <div class="card-body card_bd_pd1 colr11">

                          <div class=" ">

                           <textarea class="w-100 textarea-h form-control" name="objective_aspirations">{{ $employeesDTL[0]->objective_aspirations }}</textarea>

                         </div>

                        </div>

                       </div>


                       <div class="card mt-3 shadow">

                       <div class="card-header p-0"> <div class="bg-head"><b>Awards/Achievements <span class="mandatory"></span></b></div> </div>

                        <div class="card-body card_bd_pd1 colr12">

                          <div class=" ">

                          <textarea class="w-100 textarea-h form-control" name="contributions_awards">{{ $employeesDTL[0]->contributions_awards }}</textarea>

                         </div>

                        </div>

                       </div>


                       <div class="card mt-3 shadow">

                       <div class="card-header p-0"> <div class="bg-head"><b>Current Role Descriptions <span class="mandatory"></span></b></div> </div>

                        <div class="card-body card_bd_pd1 colr13">

                          <div class=" ">

                           <textarea class="w-100 textarea-h form-control" name="current_role_description">{{ $employeesDTL[0]->current_role_description }}</textarea>

                         </div>

                        </div>

                       </div>




                       @if($employeesDTL[0]->remarks != null)
                       @if(session()->get('user_type') != 'AO'))
                        <div class="card mt-3 shadow">

                       <div class="card-header p-0"> <div class="bg-head"><b>Remarks by AO <span class="mandatory"></span> </b></div> </div>

                        <div class="card-body card_bd_pd1 colr14">

                          <div class="">
                              <textarea class="w-100 textarea-h form-control" >{{ $employeesDTL[0]->remarks }}s</textarea>

                         </div>

                        </div>

                       </div>


                       @endif
                       @endif



                       @if(session()->get('user_type') == 'AO')
                             @if($employeesDTL[0]->approve_status == 0)

                              <div class="card mt-3 shadow">

                               <div class="card-header p-0"> <div class="bg-head"><b>Remarks <span class="mandatory"></span> </b></div> </div>

                                <div class="card-body card_bd_pd1 colr15">

                                  <div class=" ">

                                      <textarea name="remarks" class="form-control" row="5" id="remarks"></textarea>

                                 </div>

                                </div>

                              </div>



                             @endif
                             @endif





                              <div class="card mt-3  ">
                                <div class="card-body card_bd_pd">

                                  <div class="row d-flex justify-content-center">

                                      <div class="col-md-2">
                                          <button class="btn btn-md btn-submit w-100" name="submit" value="submit" >
                                         @if(session()->get('user_type') == 'AO')
                                         @if($employeesDTL[0]->approve_status == 0)
                                           <i class="far fa-check-circle"></i> Approve
                                         @else
                                          <i class="fas fa-edit"></i>  Update
                                         @endif
                                         @else
                                          <i class="fas fa-edit"></i>  Update
                                         @endif
                                         </button>
                                      </div>


                                          @if(session()->get('user_type') == 'AO')
                                             @if($employeesDTL[0]->approve_status == 0)
                                             <div class="col-md-2">
                                                <button class="btn btn-danger btn-md   w-100" id="reject_btn" type="button" > <i class="far fa-times-circle"></i> Reject</button>
                                                 </div>
                                             @endif
                                             @endif


                                 </div>

                                </div>

                              </div>






                      </form>

                  </div>









      </main>

 <div class="row">

</div>




</div>
<script>
    function removeExistsWorkExperience(id){
        var exp_id = id;
        var _token='<?php echo csrf_token() ?>';
        $.ajax({
            url:"<?php echo url('removeExistsWorkExperience') ?>",
            type:"POST",
            data:{
                exp_id:exp_id,
                _token:_token,
            },
            beforeSend:function(){
                $('#overlay').fadeIn();
            },
            success:function(result){
                if(result == 1){
                    alert('Experienced deleted');
                    location.reload();
                }else{
                    alert('somthing went wrong!');
                }
            },
            complete:function(){
                $('#overlay').fadeOut();
            }
        })
    }
</script>

<script>
    function removeExistsfamily(id){
        var mem_id = id;
        var _token='<?php echo csrf_token() ?>';
        $.ajax({
            url:"<?php echo url('curruntremovefamily') ?>",
            type:"POST",
            data:{
                mem_id:mem_id,
                _token:_token,
            },
            beforeSend:function(){
                $('#overlay').fadeIn();
            },
            success:function(result){
                if(result == 1){
                    alert('family member deleted');
                    location.reload();
                }else{
                    alert('somthing went wrong!');
                }
            },
            complete:function(){
                $('#overlay').fadeOut();
            }
        })
    }
</script>

<script>
    function removecurruntnominee(id){
        var nom_id = id;
        var _token='<?php echo csrf_token() ?>';
        $.ajax({
            url:"<?php echo url('removecurruntnominee') ?>",
            type:"POST",
            data:{
                nom_id:nom_id,
                _token:_token,
            },
            beforeSend:function(){
                $('#overlay').fadeIn();
            },
            success:function(result){
                if(result == 1){
                    alert('Nominee deleted');
                    location.reload();
                }else{
                    alert('somthing went wrong!');
                }
            },
            complete:function(){
                $('#overlay').fadeOut();
            }
        })
    }
</script>

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
     $(document).ready(function(){
         $('#reject_btn').on('click',function(){
             var emp = $('#edit_emp_id').val();
             var remarks = $('#remarks').val();
             var _token = '<?php echo csrf_token(); ?>';
             $.ajax({
                 url:'<?php echo url("reject_employee") ?>',
                 type:'POST',
                 data:{
                     emp:emp,
                     remarks:remarks,
                     _token:_token,
                 },
                 beforeSend:function(){
                     $("#overlay").fadeIn();
                 },
                 success:function(result){
                     if(result == 1){
                         alert('This Employee Forwarded to PD for Review');
                         window.location.href="https://telangana.emunicipal.in/hrms/view-employee";
                     }else{
                         alert('Somthing went Wrong! Try again');
                     }
                 },
                 complete:function(){
                     $("#overlay").fadeout();
                 }

             })
         })
     })
 </script>

<script>
 $('.add_Edu').on('click', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var Edu_no = $('#Edu_no').val();
        $.ajax({
               type:'POST',
               url:'{{ route('AddEdu'); }}',
               data:{Edu_no : Edu_no},
               dataType: 'JSON',
               beforeSend: function()
                {
                    $("#overlay").fadeIn();
                },
               success:function(data) {
                  $(".Edu_no").append(data.html);
                  $('#Edu_no').val(data.return_numbers);
               },
                complete: function()
                {
                    $("#overlay").fadeOut();
                }
            });
    });
</script>

<script>

    function eduremove(no)
    {
        var edu_no = $('#Edu_no').val();

        $.ajax({
               type:'POST',
               url:'{{ route('RemoveEdu'); }}',
               data:{edu_no : edu_no},
               dataType: 'JSON',
               beforeSend: function()
                {
                    $("#overlay").fadeIn();
                },
               success:function(data) {
                   $('.edu'+no).remove();
                  $('#Edu_no').val(data.return_numbers);
               },
                complete: function()
                {
                    $("#overlay").fadeOut();
                }
            });
    }

</script>

<script>
      $(document).ready(function(){
          $('#level').on('change',function(){
              var level = $(this).val();
              if(level == 1 || level == 2 || level == 3 || level == 4 || level == 5){
                  $('#grade_div').show();
                //   $('#grade_dup').val(1);
              }else{
                  $('#grade_div').hide();
                  $('#grade').val('');
              }
          });
      });

      $(document).ready(function(){
              var level = $('#level').val();
              if(level == 1 || level == 2 || level == 3 || level == 4 || level == 5){
                  $('#grade_div').show();
                //   $('#grade_dup').val(1);
              }else{
                  $('#grade_div').hide();
                  $('#grade').val('');
              }
      });
  </script>

 <script>
// validation
    // $(function() {
    //     $("form[name='add']").validate({
    //         rules: {
    //             name: "required",
    //             surname: "required",
    //             dob: "required",
    //             dob: "required",
    //             co: "required",
    //             co_name: "required",
    //             gender: "required",
    //             employee_type: "required",
    //             joining_designation: "required",
    //             communication_address: "required",
    //             communication_address_pin_code: {
    //                 required: true,
    //                 minlength:6,
    //                 maxlength:6
    //             },
    //             permenant_address: "required",
    //             permenant_address_pin_code: {
    //                 required: true,
    //                 minlength:6,
    //                 maxlength:6
    //             },
    //             // district: "required",
    //             // ulbid: "required",
    //             mandal: "required",
    //             state: "required",
    //             mobile_number: {
    //                 required: true,
    //                 minlength:10,
    //                 maxlength:10
    //             },
    //             // alternative_mobile_number: {
    //             //     required: true,
    //             //     minlength:10,
    //             //     maxlength:10
    //             // },
    //             email_id: {
    //                 required: true,
    //                 email: true
    //             },

    //             religion: "required",
    //             caste: "required",
    //             marital_status: "required",
    //             if_select_single: "required",
    //             nationality: "required",

    //             adhaar_card_number: {
    //                 required: true,
    //                 minlength:12,
    //                 maxlength:12
    //             },
    //             // adhaar_card: "required",
    //             pan_card_number: "required",
    //             // pan_card: "required",
    //             degree: "required",
    //             year_of_passing: "required",
    //             university_college: "required",
    //             // certificates: "required",
    //             discpline: "required",
    //             date_of_joining: "required",
    //             designation: "required",
    //             location: "required",
    //             // doj: "required",
    //             current_grade: "required",
    //             current_level: "required",

    //             // current_designation: "required",
    //             'current_designation[]': {
    //                 required: true
    //             },
    //             'current_status[]': {
    //                 required: true
    //             },
    //             'current_location[]': {
    //                 required: true
    //             },
    //             'duty_type[]': {
    //                 required: true
    //             },


    //             'start_date[]': {
    //                 required: true
    //             },
    //             'end_date[]': {
    //                 required: true
    //             },
    //             'disgnation[]': {
    //                 required: true
    //             },
    //             'work_experience_location[]': {
    //                 required: true
    //             },

    //             current_basic_salary: "required",
    //             pf_number: "required",
    //             esi_number: "required",

    //             account_holder_name: "required",
    //             bank_name: "required",
    //             account_number: "required",
    //             ifsc_code: "required",

    //             relation_name: "required",
    //             relation_gender: "required",
    //             relation_type: "required",
    //             relation_dob: "required",
    //             relation_occupation: "required",
    //             // family_photo: "required",

    //             nominee_details: "required",
    //             nominee_relation: "required",
    //             nominee_gender: "required",
    //             nominee_dob: "required",

    //             // objective_aspirations: "required",
    //             // contributions_awards: "required",
    //             // current_role_description: "required",
    //             // discplinary_cases_suspensions: "required",

    //             // photo: "required",

    //         },
    //         messages: {
    //             name: "Please Enter Name",
    //             surname: "Please Enter surname",
    //             dob: "Please Select Valid DOB",
    //             co: "Mandatory Field",
    //             co_name: "Mandatory Field",
    //             gender: "Mandatory Field",
    //             employee_type: "Mandatory Field",
    //             joining_designation: "Mandatory Field",
    //             communication_address: "Mandatory Field",
    //             communication_address_pin_code: "Please Enter 6 Digit valid Pin code",
    //             permenant_address: "Mandatory Field",
    //             permenant_address_pin_code: "Please Enter 6 Digit valid Pin code",
    //             // district: "Mandatory Field",
    //             // ulbid: "Mandatory Field",
    //             mandal: "Mandatory Field",
    //             state: "Mandatory Field",

    //             mobile_number: {
    //                 required: "Please Enter Mobile Number",
    //                 minlength: "Please Enter 10 digit valid Mobile Number",
    //                 maxlength: "Please Enter 10 digit valid Mobile Number",
    //             },
    //             alternative_mobile_number: {
    //                 required: "Please Enter Alternative Mobile Number",
    //                 minlength: "Please Enter 10 digit valid Alternative Mobile Number",
    //                 maxlength: "Please Enter 10 digit valid Alternative Mobile Number",
    //             },
    //             email_id: "Please enter a valid email address",
    //             religion: "Mandatory Field",
    //             caste: "Mandatory Field",
    //             marital_status: "Mandatory Field",
    //             if_select_single: "Mandatory Field",
    //             nationality: "Mandatory Field",

    //             adhaar_card_number: {
    //                 required: "Please Enter Adhaar Card Number",
    //                 minlength: "Please Enter 12 digit valid Adhaar Card Number",
    //                 maxlength: "Please Enter 12 digit valid Adhaar Card Number",
    //             },
    //             adhaar_card: "Mandatory Field",
    //             pan_card_number: "Mandatory Field",
    //             pan_card: "Mandatory Field",
    //             degree: "Mandatory Field",
    //             year_of_passing: "Mandatory Field",
    //             university_college: "Mandatory Field",
    //             certificates: "Mandatory Field",
    //             discpline: "Mandatory Field",
    //             date_of_joining: "Mandatory Field",
    //             designation: "Mandatory Field",
    //             location: "Mandatory Field",
    //             doj: "Mandatory Field",
    //             current_grade: "Mandatory Field",
    //             current_level: "Mandatory Field",


    //             "current_designation[]": "Please select category",
    //             "current_status[]": "Please select category",
    //             "current_location[]": "Please select category",
    //             "duty_type[]": "Please select category",

    //             "start_date[]": "Mandatory Field",
    //             "end_date[]": "Mandatory Field",
    //             "disgnation[]": "Mandatory Field",
    //             "work_experience_location[]": "Mandatory Field",


    //             current_basic_salary: "Mandatory Field",
    //             pf_number: "Mandatory Field",
    //             esi_number: "Mandatory Field",

    //             account_holder_name: "Mandatory Field",
    //             bank_name: "Mandatory Field",
    //             account_number: "Mandatory Field",
    //             ifsc_code: "Mandatory Field",

    //             relation_name: "Mandatory Field",
    //             relation_gender: "Mandatory Field",
    //             relation_type: "Mandatory Field",
    //             relation_dob: "Mandatory Field",
    //             relation_occupation: "Mandatory Field",
    //             family_photo: "Mandatory Field",

    //             nominee_details: "Mandatory Field",
    //             nominee_relation: "Mandatory Field",
    //             nominee_gender: "Mandatory Field",
    //             nominee_dob: "Mandatory Field",

    //             objective_aspirations: "Mandatory Field",
    //             contributions_awards: "Mandatory Field",
    //             current_role_description: "Mandatory Field",
    //             discplinary_cases_suspensions: "Mandatory Field",

    //             // photo: "Mandatory Field",
    //         },
    //         submitHandler: function(form) {
    //           form.submit();
    //         }
    //     });
    // });


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
       var deg = parseInt($('#degree').val());
        //  alert(deg);
            if(deg == '1' || deg == ''){
                $('.height_cet').css('display','none');
            }else{
                $('.height_cet').css('display','block');
            }


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

    $('.add_Nominee').on('click', function() {
        // alert(1);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var Nominee_no = $('#Nominee_no').val();
        $.ajax({
               type:'POST',
               url:'{{ route('AddNominee'); }}',
               data:{Nominee_no : Nominee_no},
               dataType: 'JSON',
               beforeSend: function()
                {
                    $("#overlay").fadeIn();
                },
               success:function(data) {
                  $(".Nominee_no").append(data.html);
                  $('#Nominee_no').val(data.return_numbers);
               },
                complete: function()
                {
                    $("#overlay").fadeOut();
                }
            });
    });

     $('.add_Family').on('click', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var Family_no = $('#Family_no').val();
        $.ajax({
               type:'POST',
               url:'{{ route('AddFamily'); }}',
               data:{Family_no : Family_no},
               dataType: 'JSON',
               beforeSend: function()
                {
                    $("#overlay").fadeIn();
                },
               success:function(data) {
                  $(".Family_no").append(data.html);
                  $('#Family_no').val(data.return_numbers);
               },
                complete: function()
                {
                    $("#overlay").fadeOut();
                }
            });
    });

     function family_remove(no)
    {
         var family_no = $('#family_no').val();
         $.ajax({
               type:'POST',
               url:'{{ route('RemoveFamily'); }}',
               data:{family_no : family_no},
               dataType: 'JSON',
               beforeSend: function()
                {
                    $("#overlay").fadeIn();
                },
               success:function(data) {
                   $('.render-family'+no).remove();
               },
                complete: function()
                {
                    $("#overlay").fadeOut();
                }
            });
    }

     function nominee_remove(no)
    {
         var Nominee_no = $('#Nominee_no').val();
         $.ajax({
               type:'POST',
               url:'{{ route('RemoveNomineee'); }}',
               data:{Nominee_no : Nominee_no},
               dataType: 'JSON',
               beforeSend: function()
                {
                    $("#overlay").fadeIn();
                },
               success:function(data) {
                   $('.render-nominee'+no).remove();
               },
                complete: function()
                {
                    $("#overlay").fadeOut();
                }
            });
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

     $(document).ready(function(){
        $('#current_basic_salary').on('change',function(){
            var sal = parseInt($(this).val());

            if(sal > 21000){
                $('#esi_number').prop('readonly',true);
            }else{
                $('#esi_number').prop('readonly',false);
            }
        })
    })
    </script>



<!--close-->
 @include('headers.footer')

