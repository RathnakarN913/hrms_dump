@include('headers.common_header')

<style>
.error
{
    color: red;
    font-size:13px;
        
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
    width: 15%;
}

.btn-theme{
    color: #fff;
   background-color: #327c95;
    border-color: #327c95;
    padding:15px;
    width:100%;
    border-radius:6px !important;
    font-size:16px !important;
    font-weight:600;
    letter-spacing:1px;
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
         height: 15em;
         /*width: 20em;*/
         /*background: #e5e5e5;*/
         cursor: pointer;
         overflow: hidden;
         border:1px dashed #999;
         border-radius:5px;
         padding-top:15px;
         padding-bottom:1px;
}
 .file-upload .image-box img {
         height: 100%;
         display: none;
}
 .file-upload .image-box p {
         position: relative;
         top: 17%;
         color: #000;
}
.mandatory
{
    color: red;
}
label {
    display: inline-block;
    margin-bottom: 0.5rem;
    font-size: 15px !important;
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
               
               <!--@if($errors->any())-->
               <!--    <div class="error alert alert-danger"> -->
               <!--      <?php echo "<pre>".implode(",\n",$errors->all(':message'))."</pre>"; ?>-->
               <!--     </div>-->
               <!-- @endif-->
              <div class="bg-white">
                <div class="table-content">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <lable for="employee_type">Employee Type</lable>
                            <select class="form-control-sm  select-input" name="employee_type" id="emp_type">
                                <option value="">Select</option>
                                @if($employeetypes)
                                    @foreach($employeetypes as $key=> $val)
                                     <option value="{{ $val->employee_type_id }}">{{ $val->employee_type_desc }}</option>
                                    @endforeach
                                @endif
                             </select>
                        </div>
                        <div class="col-md-3">
                            <lable for="district">District</lable>
                              <select class="form-control-sm  select-input" name="district" id="district" onChange="GetUlbs();">
                                <option value="">Select</option>
                                @if($districts)
                                    @foreach($districts as $key=> $val)
                                     <option value="{{ $val->distid }}">{{ $val->distname }}</option>
                                    @endforeach
                                @endif
                              </select>
                        </div>
                        <div class="col-md-3">
                            <lable for="ulbid">ULB</lable>
                              <select class="form-control-sm  select-input" name="ulbid" id="ulbid_list" onChange="GetCurrentDesignationByUlb();">
                                <option value="">Select Ulb</option>
                              </select>
                        </div>
                        <div class="col-md-3 mt-3">
                            <button type="button" class="btn btn-theme btn-sm" id="form_btn">Submit</button>
                        </div>
                    </div>
                    
                    
                    
                    <div class="clearfix mb-3"></div>
                    
                    
                    <!--<div class="row mb-3" id="govt_form" style="display:none">-->
                    <!--    <div class="col-md-12">-->
                    <!--        <form name="add1" method="post" action="{{ route('gov_createAddEmployee') }}" enctype="multipart/form-data">-->
                    <!--            @csrf-->
                    <!--            <input type="hidden" name="employee_type" value="3">-->
                    <!--            <input type="hidden" name="district" class="dist_val" value="">-->
                    <!--            <input type="hidden" name="ulbid" class="ulb_val" value="">-->
                    <!--            <div class="mb-4"><b>Govt Employee Form</b></div>-->
                    <!--            <div class="bg-head"><b>Personal Information</b></div>-->
                    <!--            <label for="firstname" generated="true" class="some-class"></label>-->
                    <!--            <div class="user-profile-bg"> -->
                    <!--                <div class="row">-->
                    <!--                    <div class="col-md-9">-->
                    <!--                        <div class="row">-->
                    <!--                            <div class="col-md-4 mb-3">-->
                    <!--                              <label>Name <span class="mandatory">*</span></label>-->
                    <!--                              <input type="text" class="form-control form-control-sm " id="" placeholder="Name" name="name"  >-->
                    <!--                            </div>-->
                    <!--                            <div class="col-md-4 mb-3">-->
                    <!--                              <label>Surname  <span class="mandatory">*</span></label>-->
                    <!--                              <input type="text" class="form-control form-control-sm " id="" placeholder="Surname" name="surname"  >-->
                    <!--                            </div>-->
                    <!--                            <div class="col-md-4 mb-3">-->
                    <!--                              <label>DOB <span class="mandatory">*</span></label>-->
                    <!--                              <input type="date" class="form-control form-control-sm " placeholder="" onchange="submitBday(this.value)" name="dob" min="1950-01-01" max="<?php echo date("Y-m-d") ?>" onkeydown="return false">-->
                    <!--                            </div>-->
                                                
                    <!--                            <div class="col-md-4 mb-3">-->
                    <!--                              <label>Email  <span class="mandatory">*</span></label>-->
                    <!--                              <input type="email" class="form-control form-control-sm " id="" placeholder="Email" name="email_id"  >-->
                    <!--                            </div>-->
                    <!--                            <div class="col-md-4 mb-3">-->
                    <!--                              <label>Phone Number  <span class="mandatory">*</span></label>-->
                    <!--                              <input type="tel" class="form-control form-control-sm " id="" placeholder="Phone Number" name="mobile_number"  >-->
                    <!--                            </div>-->
                                                <!--<div class="col-md-4 mb-3">-->
                                                <!--  <label>Bank Details  <span class="mandatory">*</span></label>-->
                                                <!--  <input type="text" class="form-control form-control-sm " id="" placeholder="Bank Details" name="bank_details"  >-->
                                                <!--</div>-->
                    <!--                            <div class="col-md-4">-->
                                                    
                    <!--                              <label>Current Joining Designation <span class="mandatory">*</span></label>-->
                    <!--                              <select class="form-control-sm select-input current_designations" id="joining_designation" onchange="validateDesignationAvaibility(this.value)" name="current_designation">-->
                    <!--                                <option value="">Select</option>-->
                    <!--                                @if($designations)-->
                    <!--                                    @foreach($designations as $key=> $val)-->
                    <!--                                     <option value="{{ $val->id }}">{{ $val->description }}</option>-->
                    <!--                                    @endforeach-->
                    <!--                                @endif-->
                    <!--                              </select>-->
                    <!--                              <span id="designationerrors"></span>-->
                    <!--                            </div>-->
                    <!--                            <div class="col-md-4">-->
                    <!--                              <label>Duty Type <span class="mandatory">*</span></label>-->
                    <!--                                  <select class="form-control-sm   select-input" name="duty_type">-->
                    <!--                                    <option value="">Select</option>-->
                    <!--                                    @if($dutytypes)-->
                    <!--                                    @foreach($dutytypes as $key=> $val)-->
                    <!--                                     <option value="{{ $val->id }}">{{ $val->duty_type_name }}</option>-->
                    <!--                                    @endforeach-->
                    <!--                                    @endif-->
                    <!--                                  </select>-->
                    <!--                            </div>-->
                    <!--                            <div class="col-md-4 mb-3">-->
                    <!--                              <label>Current Joining Date <span class="mandatory">*</span></label>-->
                    <!--                              <input type="date" class="form-control form-control-sm " placeholder=""  name="date_of_joining" min="1950-01-01" max="<?php echo date("Y-m-d") ?>" onkeydown="return false">-->
                    <!--                            </div>-->
                    <!--                            <div class="col-md-4 mb-3">-->
                    <!--                              <label>Retirement Date <span class="mandatory">*</span></label>-->
                    <!--                              <input type="date" class="form-control form-control-sm " placeholder=""  name="retirement_date" min="{{date('Y-m-d')}}"  onkeydown="return false">-->
                    <!--                            </div>-->
                    <!--                            <div class="col-md-4 mb-3">-->
                    <!--                              <label>Aadhar Card number <span class="mandatory">*</span></label>-->
                    <!--                              <input type="text" class="form-control form-control-sm " maxlength="12" placeholder="" name="adhaar_card_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">-->
                    <!--                            </div>-->
                    <!--                            <div class="col-md-4">-->
                    <!--                              <label>Upload Aadhar Card <span class="mandatory">*</span></label>-->
                    <!--                              <input type="file" class="form-control form-control-sm  " placeholder="" name="adhaar_card">-->
                    <!--                              <small style="font-size:12px;"><i> <b>Note:</b> Upload files PDF, JPG, PNG only</i></small>-->
                    <!--                            </div>-->
                    <!--                            <div class="col-md-4 mb-3">-->
                    <!--                              <label>PAN Card number <span class="mandatory">*</span></label>-->
                    <!--                              <input type="text" class="form-control form-control-sm " maxlength="12" placeholder="" name="pan_card_number"  onkeydown="if(event.key==='.'){event.preventDefault();}">-->
                    <!--                            </div>-->
                    <!--                            <div class="col-md-4">-->
                    <!--                              <label>Upload PAN Card <span class="mandatory">*</span></label>-->
                    <!--                              <input type="file" class="form-control form-control-sm  " placeholder="" name="pan_card">-->
                    <!--                              <small style="font-size:12px;"><i> <b>Note:</b> Upload files PDF, JPG, PNG only</i></small>-->
                    <!--                            </div>-->
                    <!--                            <div class="col-md-12 mb-3">-->
                    <!--                              <label>Address  <span class="mandatory">*</span></label>-->
                    <!--                              <input type="text" class="form-control form-control-sm " id="" placeholder="Address" name="communication_address"  >-->
                    <!--                            </div>-->
                    <!--                        </div>    -->
                                            
                                            <!--bank details-->
                    <!--                            <div class="mb-3 bg-head"><b>Bank Details</b></div>-->
                    <!--                              <div class="row">-->
                    <!--                                  <div class="col-md-4 mb-3">-->
                    <!--                                   <label>Account holder name <span class="mandatory">*</span></label>-->
                    <!--                                   <input type="text" class="form-control form-control-sm " id="account_holder_name" placeholder="" name="account_holder_name">-->
                    <!--                                  </div>-->
                                               
                    <!--                                    <div class="col-md-4">-->
                    <!--                                      <label>Bank name <span class="mandatory">*</span></label>-->
                    <!--                                     <input type="text" class="form-control form-control-sm  " placeholder="" name="bank_name">-->
                    <!--                                    </div>-->
                    <!--                                    <div class="col-md-4">-->
                    <!--                                      <label>Account number <span class="mandatory">*</span></label>-->
                    <!--                                      <input type="text" class="form-control form-control-sm  " placeholder="" name="account_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">-->
                    <!--                                    </div>-->
                    <!--                                    <div class="col-md-4 mb-3">-->
                    <!--                                      <label>IFSC code <span class="mandatory">*</span></label>-->
                    <!--                                      <input type="text" class="form-control form-control-sm " placeholder="" name="ifsc_code" >-->
                    <!--                                    </div>-->
                    <!--                                </div>-->
                                            <!--bank details end-->
                                            
                    <!--                    </div>-->
                                        
                                        
                    <!--                    <div class="col-md-3 ">-->
                    <!--                        <div class="col-ting">-->
                    <!--                            <div class="control-group file-upload" id="file-upload1">-->
                    <!--                              <div class="image-box text-center">-->
                    <!--                            		<p><i class="fa fa-user" style="font-size:135px; color:#CCC"></i>-->
                    <!--                            		<br> Upload Photo here-->
                    <!--                            		</p>-->
                    <!--                            		<img src=" " alt="" class="img-fluid rounded">-->
                    <!--                            	</div>-->
                    <!--                                 <div class="controls" style="display: none;">-->
                    <!--                            		<input type="file" name="photo1" id="photo1"/>-->
                    <!--                            	</div>-->
                    <!--                            	<center>-->
                    <!--                            	<div class="image_upload"><small>Please Click here to Upload Photo </small><span class="mandatory"> *</span></div>-->
                    <!--                            </center>	-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                                          
                    <!--                    </div>-->
                                        
                    <!--                        <div class="text-center mt-2 mb-2">-->
                    <!--                         <button class="btn btn-md btn-submit" name="submit" value="submit">Submit</button>-->
                    <!--                        </div>-->
                                        
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </form>-->
                    <!--    </div>-->
                    <!--</div>-->
                   
                    <div id="private_form" style="display:@if(count($errors) > 0) block @else none @endif">
                      <div class="mb-4"><b>Add Employee</b></div>
                      <div class="bg-head"><b>Personal Information</b></div>
                      <label for="firstname" generated="true" class="some-class"></label>
                      <div class="user-profile-bg"> 
                        <form name="add" method="post" action="{{ route('CreateAddEmployee') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="employee_type" value="{{old('employee_type')}}" class="emp_val">
                                <input type="hidden" name="district" class="dist_val" value="{{old('district')}}">
                                <input type="hidden" name="ulbid" class="ulb_val" value="{{old('ulbid')}}">
                        <div class="row">
                        <div class="col-md-9 order-sm-first order-last">
                              
                              <div class="row">
                                <div class="col-md-4 mb-3">
                                  <label>Name <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm " id="name-field" placeholder="Name" name="name" value="{{old('name')}}" >
                                  <span class="text-danger">{{$errors->first('name')}}</span>
                                </div>
                                <div class="col-md-4">
                                  <label>Surname <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm " placeholder="Surname" id="surname-field" name="surname" value="{{old('surname')}}">
                                  <span class="text-danger">{{$errors->first('surname')}}</span>
                                </div>
                                <div class="col-md-4">
                                  <label>DOB <span class="mandatory">*</span></label>
                                  <input type="date" class="form-control form-control-sm" value="{{old('dob')}}" placeholder="" onchange="submitBday(this.value)" name="dob" min="1950-01-01" max="<?php echo date("Y-m-d") ?>" onkeydown="return false">
                                  <span class="text-danger">{{$errors->first('dob')}}</span>
                                </div>
                                <div class="col-md-12 mb-3">
                                  <div class="row">
                                  <div class="col-md-4 ">
                                  <label>S/o, W/o, D/o <span class="mandatory">*</span></label>
                                  <select class="form-control-sm  select-input" name="co">
                                    <option value="">Select</option>
                                    @if($relations)
                                        @foreach($relations as $key=> $val)
                                         <option value="{{ $val->id }}">{{ $val->relation }}</option>
                                        @endforeach
                                    @endif
                                  </select>
                                  <span class="text-danger">{{$errors->first('co')}}</span>
                                 </div>
                                  <div class="col-md-8" style=""> 
                                  <label>Enter Name<span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm " id="co-name-field" value="{{old('co_name')}}" placeholder="Enter name here" name="co_name">
                                  <span class="text-danger">{{$errors->first('co_name')}}</span>
                                 </div>
                                </div>
                              </div>
                                <div class="col-md-4">
                                  <label>Gender <span class="mandatory">*</span></label>
                                  <select class="form-control-sm  select-input" name="gender">
                                    <option value="">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Transgender">Transgender</option>
                                  </select>
                                  <span class="text-danger">{{$errors->first('gender')}}</span>
                                </div>
                                
                                <div class="col-md-4">
                                  <label> Employee ID <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm " id="" value="" placeholder="Employee ID" name="">
                                  <span class="text-danger"></span>
                                  <!--<select class="form-control-sm  select-input" name="employee_type">-->
                                  <!--  <option value="">Select</option>-->
                                  <!--  @if($employeetypes)-->
                                  <!--      @foreach($employeetypes as $key=> $val)-->
                                  <!--       <option value="{{ $val->employee_type_id }}">{{ $val->employee_type_desc }}</option>-->
                                  <!--      @endforeach-->
                                  <!--  @endif-->
                                  <!--</select>-->
                                </div>
                                
                                <!--<div class="col-md-4">-->
                                <!--  <label>Joining Designation <span class="mandatory">*</span></label>-->
                                <!--   <select class="form-control-sm  select-input" name="joining_designation">-->
                                <!--    <option value="">Select</option>-->
                                <!--    @if($designationsALL)-->
                                <!--        @foreach($designationsALL as $key=> $val)-->
                                <!--         <option value="{{ $val->id }}">{{ $val->description }}</option>-->
                                <!--        @endforeach-->
                                <!--    @endif-->
                                <!--  </select>-->
                                <!--  <span class="text-danger">{{$errors->first('joining_designation')}}</span>-->
                                <!--</div>-->
                                <div class="col-md-8 pt-3">
                                   <label>Communication Address <span class="mandatory">*</span></label>
                                  <textarea class="textarea-form" name="communication_address" id="communication_address" value="{{old('communication_address')}}" style="height: 64px;" name="communication_address"></textarea>
                                  <span class="text-danger">{{$errors->first('communication_address')}}</span>
                                </div>
                                <div class="col-md-4 pt-3">
                                  <label>Pin code <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm " maxlength="6" placeholder="" value="{{old('communication_address_pin_code')}}" id="communication_address_pin_code" name="communication_address_pin_code" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                                  <span class="text-danger">{{$errors->first('communication_address_pin_code')}}</span>
                                </div>
                                
                              <div class="mb-3 mt-3 ml-3">
                                <input type="checkbox" id="permenant_address_same_as_above" value="{{old('permenant_address_same_as_above')}}" name="permenant_address_same_as_above" value="1" > Please select Permanent address same as above
                                <span class="text-danger">{{$errors->first('permenant_address_same_as_above')}}</span>
                              </div>
                                <div class="col-md-8">
                                   <label>Permanent Address <span class="mandatory">*</span></label>
                                  <textarea class="textarea-form" value="{{old('permenant_address')}}" name="permenant_address" id="permenant_address" style="height: 64px;"></textarea>
                                  <span class="text-danger">{{$errors->first('permenant_address')}}</span>
                                </div>
                                <div class="col-md-4">
                                  <label>Pin code <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm mb-3" maxlength="6" placeholder="" id="permenant_address_pin_code" value="{{old('permenant_address_pin_code')}}" name="permenant_address_pin_code" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                                  <span class="text-danger">{{$errors->first('permenant_address_pin_code')}}</span>
                                </div>
                              </div>
                              <div class="row">
                                <!--<div class="col-md-4 mb-3">-->
                                <!--  <label>District <span class="mandatory"></span></label>-->
                                <!--  <select class="form-control-sm  select-input" name="district" id="district" onChange="GetUlbs();">-->
                                <!--    <option value="">Select</option>-->
                                <!--    @if($districts)-->
                                <!--        @foreach($districts as $key=> $val)-->
                                <!--         <option value="{{ $val->distid }}">{{ $val->distname }}</option>-->
                                <!--        @endforeach-->
                                <!--    @endif-->
                                <!--  </select>-->
                                <!--</div>-->
                                <!--<div class="col-md-4">-->
                                <!--  <label>Ulb <span class="mandatory"></span></label>-->
                                <!--  <select class="form-control-sm  select-input" name="ulbid" id="ulbid_list" onChange="GetCurrentDesignationByUlb();">-->
                                <!--    <option value="">Select Ulb</option>-->
                                <!--  </select>-->
                                <!--</div>-->
                                
                                
                                <div class="col-md-4">
                                  <label>Mandal <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm  " placeholder="" id="mandal-field" value="{{old('mandal')}}" name="mandal">
                                  <span class="text-danger">{{$errors->first('mandal')}}</span>
                                </div>
                                <div class="col-md-4 mb-3">
                                  <label>State <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm  " id="state-field" placeholder="" value="{{old('state')}}" name="state">
                                  <span class="text-danger">{{$errors->first('state')}}</span>
                                </div>
                                <div class="col-md-4">
                                  <label>Mobile number <span class="mandatory">*</span></label>
                                 <input type="text" class="form-control form-control-sm " maxlength="10" placeholder="" value="{{old('mobile_number')}}" name="mobile_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                                 <span class="text-danger">{{$errors->first('mobile_number')}}</span>
                                </div>
                                <div class="col-md-4">
                                  <label>Alternative mobile number <span class="mandatory"></span></label>
                                  <input type="text" class="form-control form-control-sm  " maxlength="10" placeholder=""  value="{{old('alternative_mobile_number')}}" name="alternative_mobile_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                                  <span class="text-danger">{{$errors->first('alternative_mobile_number')}}</span>
                                </div>
                                <div class="col-md-4 mb-3">
                                  <label>Email id <span class="mandatory">*</span></label>
                                  <input type="email" class="form-control form-control-sm  " placeholder="" value="{{old('email_id')}}" name="email_id">
                                  <span class="text-danger">{{$errors->first('email_id')}}</span>
                                </div>
                                <div class="col-md-4">
                                  <label>Religion <span class="mandatory">*</span></label>
                                  <select class="form-control-sm   select-input" name="religion">
                                    <option value="">Select</option>
                                    @if($religions)
                                        @foreach($religions as $key=> $val)
                                         <option value="{{ $val->id }}">{{ $val->religion }}</option>
                                        @endforeach
                                    @endif
                                  </select>
                                  <span class="text-danger">{{$errors->first('religion')}}</span>
                                </div>
                                <div class="col-md-4">
                                  <label>Caste <span class="mandatory">*</span></label>
                                 <select class="form-control-sm   select-input" name="caste">
                                    <option value="">Select</option>
                                    @if($casts)
                                        @foreach($casts as $key=> $val)
                                         <option value="{{ $val->id }}">{{ $val->cast }}</option>
                                        @endforeach
                                    @endif
                                  </select>
                                  <span class="text-danger">{{$errors->first('caste')}}</span>
                                </div>
                               {{-- <!--<div class="col-md-4">-->
                                  <label>Sub caste</label>
                                  <input type="text" class="form-control form-control-sm mb-3" placeholder="" value="" name="">
                                  <span class="text-danger"></span>
                                </div>--> --}}
                                <div class="col-md-4 mb-3">
                                  <label>Marital status <span class="mandatory">*</span></label>
                                  <select class="form-control-sm  select-input" name="marital_status" value="{{old('marital_status')}}" id="marital_status" onChange="GetMaritalStatusDtl();">
                                    <option value="">Select</option>
                                    @if($matrialstatus)
                                        @foreach($matrialstatus as $key=> $val)
                                         <option value="{{ $val->id }}">{{ $val->matrial_status }}</option>
                                        @endforeach
                                    @endif
                                  </select>
                                  <span class="text-danger">{{$errors->first('marital_status')}}</span>
                                </div>
                                <div class="col-md-4">
                                  <label class="MaritalHeading">Please select Marital status <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm  " placeholder="" value="{{old('if_select_single')}}"  name="if_select_single" id="if_select_single">
                                  <span class="text-danger">{{$errors->first('if_select_single')}}</span>
                                </div>
                                <div class="col-md-4">
                                  <label>Nationality <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm" id="nationality" placeholder="" value="{{old('nationality')}}" name="nationality">
                                  <span class="text-danger">{{$errors->first('nationality')}}</span>
                                </div>
                                 <div class="col-md-4 mb-3">
                                  <label>Aadhar Card number <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm " maxlength="12" placeholder="" value="{{old('adhaar_card_number')}}" name="adhaar_card_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                                  <span class="text-danger">{{$errors->first('adhaar_card_number')}}</span>
                                </div>
                                 <div class="col-md-4">
                                  <label>Upload Aadhar Card <span class="mandatory">*</span></label>
                                  <input type="file" class="form-control form-control-sm  " placeholder="" value="{{old('adhaar_card')}}" name="adhaar_card">
                                  <small style="font-size:12px;"><i> <b>Note:</b> Upload files PDF, JPG, PNG only</i></small>
                                  <span class="text-danger">{{$errors->first('adhaar_card')}}</span>
                                </div>
                               
                                <div class="col-md-4">
                                  <label>Pan Card number <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm" id="pan_card_number" placeholder="" value="{{old('pan_card_number')}}" name="pan_card_number" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)">
                                  <span class="text-danger">{{$errors->first('pan_card_number')}}</span>
                                </div>
                                <div class="col-md-4 mb-3">
                                  <label>Upload Pan Card <span class="mandatory">*</span></label>
                                  <input type="file" class="form-control form-control-sm  " placeholder="" value="{{old('pan_card')}}" name="pan_card">
                                  <small style="font-size:12px;"><i> <b>Note:</b> Upload files PDF, JPG, PNG only</i></small>
                                  <span class="text-danger">{{$errors->first('pan_card')}}</span>
                                </div>
                              </div>
                              <div class="mb-4 bg-head"><b>Education </b></div>
                              <div class="row">
                              <div class="col-md-4 mb-3">
                                  <label>Name of the Degree <span class="mandatory">*</span></label>
                                  <select class="form-control-sm select-input" name="degree"  onChange="GetDiscipline(this)">
                                    <option value="">Select</option>
                                    @if($educations)
                                        @foreach($educations as $key=> $val)
                                         <option value="{{ $val->id }}">{{ $val->education_name }}</option>
                                        @endforeach
                                    @endif
                                  </select>
                                  <span class="text-danger">{{$errors->first('degree')}}</span>
                                </div>
                                <div class="col-md-4">
                                  <label>Year of passing <span class="mandatory">*</span></label>
                                  <select class="form-control-sm  select-input" name="year_of_passing">
                                    <option value="">Select</option>
                                    @if($years)
                                        @foreach($years as $key=> $val)
                                         <option value="{{ $val->id }}">{{ $val->year }}</option>
                                        @endforeach
                                    @endif
                                  </select>
                                  <span class="text-danger">{{$errors->first('year_of_passing')}}</span>
                                </div>
                                <div class="col-md-4">
                                  <label>University/college <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm" id="university_college" placeholder="" value="{{old('university_college')}}" name="university_college">
                                  <span class="text-danger">{{$errors->first('university_college')}}</span>
                                </div>
                                <div class="col-md-4 mb-3">
                                  <label>Certificates Upload <span class="mandatory">*</span></label>
                                  <input type="file" class="form-control form-control-sm  " placeholder="" value="{{old('certificates')}}" name="certificates">
                                   <small style="font-size:12px;"><i> <b>Note:</b> Upload files PDF, JPG, PNG only</i></small>
                                   <span class="text-danger">{{$errors->first('certificates')}}</span>
                                </div>
                                <div class="col-md-4">
                                  <label>Discipline <span class="mandatory">*</span></label>
                                  <select class="form-control-sm  select-input" name="discpline" id="discpline">
                                    <option value="">Select</option>
                                    {{--@if($discplines)
                                    @foreach($discplines as $key=> $val)
                                     <option value="{{ $val->id }}">{{ $val->discpline }}</option>
                                    @endforeach
                                    @endif--}}
                                  </select>
                                  <span class="text-danger">{{$errors->first('discpline')}}</span>
                                </div>
                              </div>
                             <div class="mb-4 bg-head"><b>Professional</b></div>
                              <div class="row">
                              <div class="col-md-4 mb-3">
                                  <label>Date of joining <span class="mandatory">*</span> <span style="font-size: 12px;">( Net effective date)</span></label>
                                    <input type="date" class="form-control form-control-sm" placeholder="" value="{{old('date_of_joining')}}" name="date_of_joining" onkeydown="return false">
                                    <span class="text-danger">{{$errors->first('date_of_joining')}}</span>
                                </div>
                                <div class="col-md-4">
                                  <label>Designation <span class="mandatory">*</span></label>
                                  <select class="form-control-sm   select-input" name="designation">
                                    <option value="">Select</option>
                                    @if($designationsALL)
                                        @foreach($designationsALL as $key=> $val)
                                         <option value="{{ $val->id }}">{{ $val->description }}</option>
                                        @endforeach
                                    @endif
                                  </select>
                                  <span class="text-danger">{{$errors->first('designation')}}</span>
                                </div>
                                <div class="col-md-4 pr-0">
                                  <label>Location <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm" id="location" placeholder="" value="{{old('location')}}" name="location">
                                  <span class="text-danger">{{$errors->first('location')}}</span>
                                </div>
                                <div class="col-md-4 mb-3">
                                  <label>DOJ <span style="font-size: 12px;">(Certificates to be uploaded)</span> <span class="mandatory">*</span></label>
                                  <input type="file" class="form-control form-control-sm  " placeholder="" value="{{old('doj')}}" name="doj">
                                   <small style="font-size:12px;"><i> <b>Note:</b> Upload files PDF, JPG, PNG only</i></small>
                                   <span class="text-danger">{{$errors->first('doj')}}</span>
                                </div>
                              </div>
                              
                              
                            <div class="row">
                              <div class="col-md-4 mb-3">
                                  <label>Current Grade <span class="mandatory">*</span></label>
                                  <select class="form-control-sm   select-input" name="current_grade">
                                    <option value="">Select</option>
                                    @if($grades)
                                        @foreach($grades as $key=> $val)
                                         <option value="{{ $val->id }}">{{ $val->grade }}</option>
                                        @endforeach
                                    @endif
                                  </select>
                                  <span class="text-danger">{{$errors->first('current_grade')}}</span>
                                </div>
                                <div class="col-md-4">
                                  <label>Current Level <span class="mandatory">*</span></label>
                                   <select class="form-control-sm   select-input" name="current_level">
                                    <option value="">Select</option>
                                    @if($currentlevels)
                                        @foreach($currentlevels as $key=> $val)
                                         <option value="{{ $val->id }}">{{ $val->description }}</option>
                                        @endforeach
                                    @endif
                                  </select>
                                  <span class="text-danger">{{$errors->first('current_level')}}</span>
                                </div>
                                 <div class="col-md-4">
                                  <label>Category </label>
                                   <select class="form-control-sm   select-input" name="category">
                                        <option value="">Select</option>
                                        <option value="c1">C1</option>
                                        <option value="c2">C2</option>
                                        <option value="c3">C3</option>
                                  </select>
                                  <span class="text-danger">{{$errors->first('category')}}</span>
                                </div>
                              </div>
                              
                              
                           <div class="row  ml-1" style="background-color: #e2eeef;">  
                              <span id="designationerrors"></span>
                                  <div class="col-md-11 pt-2" style="border-right: 1px #aedde1  solid;">
                                    <div class="row">
                                         <div class="col-md-4 mb-3">
                                          <label>Current Designation <span class="mandatory">*</span></label>
                                          <select class="form-control-sm select-input current_designations" id="current_designations" onchange="validateDesignationAvaibility(this.value)" name="current_designation[]">
                                            <option value="">Select</option>
                                            @if($designations)
                                                @foreach($designations as $key=> $val)
                                                 <option value="{{ $val->id }}">{{ $val->description }}</option>
                                                @endforeach
                                            @endif
                                          </select>
                                          <span class="text-danger" >{{$errors->first('current_designation.0')}}</span>
                                        </div>
                                        
                                        <div class="col-md-4">
                                          <label>Current Status <span class="mandatory">*</span></label>
                                          <select class="form-control-sm   select-input" name="current_status[]">
                                            <option value="">Select</option>
                                            @if($currentstatus)
                                                @foreach($currentstatus as $key=> $val)
                                                 <option value="{{ $val->id }}">{{ $val->status_name }}</option>
                                                @endforeach
                                            @endif
                                          </select>
                                          <span class="text-danger">{{$errors->first('current_status')}}</span>
                                        </div>
                                        
                                        
                                        <div class="col-md-4">
                                          <label>Current Location <span class="mandatory">*</span></label>
                                          <input type="text" class="form-control form-control-sm" id="current_location" placeholder="" value="{{old('current_location.0')}}" name="current_location[]">
                                          <span class="text-danger">{{$errors->first('current_location')}}</span>
                                        </div>
                                        
                                        <div class="col-md-4 mb-3">
                                          <label>Duty type <span class="mandatory">*</span></label>
                                          <select class="form-control-sm   select-input" name="duty_type[]">
                                            <option value="">Select</option>
                                            @if($dutytypes)
                                            @foreach($dutytypes as $key=> $val)
                                             <option value="{{ $val->id }}">{{ $val->duty_type_name }}</option>
                                            @endforeach
                                            @endif
                                          </select>
                                          <span class="text-danger">{{$errors->first('duty_type')}}</span>
                                        </div>
                                  </div>  
                              </div>
                              
                               <div class="col-md-1 p-0 d-flex align-items-center justify-content-center">
                                  <span class="btn-plus add-new" style="margin:0px 2px"><i class="fa fa-plus"></i></span>
                                  <span class="btn-minus" style="margin:0px 2px"><i class="fa fa-minus"></i></span>
                               </div>
                               <input name="current_designation_no" id="current_designation_no" type="hidden" value="0">
                               <span class="text-danger">{{$errors->first('current_designation_no')}}</span>
                            </div>
                            
                            <div class="current_designation">
                                
                            </div>
                            
                            
                            
                            
                              <p class="mt-3 mb-3"><b>Work Experience</b></p>
                              
                                <div class="row b-3 ml-1" style="background-color: #e2eeef;">
                                    <div class="col-md-11 pb-3 pt-2" style="border-right: 1px #aedde1  solid;">
                                       <div class="row">
                                        <div class="col-md-8 ">
                                          <div class="row">
                                          <div class="col-md-6  ">
                                              <label>Start date <span class="mandatory">*</span></label>
                                            <input type="date" name="start_date[]" class="form-control form-control-sm" placeholder="Start date" onkeydown="return false">
                                            <span class="text-danger">{{$errors->first('start_date')}}</span>
                                          </div>
                                          <div class="col-md-6 ">
                                              <label>End date <span class="mandatory">*</span></label>
                                            <input type="date" name="end_date[]" class="form-control form-control-sm" placeholder="End date" onkeydown="return false">
                                            <span class="text-danger">{{$errors->first('end_date')}}</span>
                                          </div>
                                        </div>
                                        </div>
                                        
                                         <div class="col-md-4 ">
                                          <label>Designation <span class="mandatory">*</span></label>
                                          <select class="form-control-sm  select-input" name="disgnation[]">
                                            <option value="">Select</option>
                                            @if($designationsALL)
                                            @foreach($designationsALL as $key=> $val)
                                             <option value="{{ $val->id }}">{{ $val->description }}</option>
                                            @endforeach
                                            @endif
                                          </select>
                                          <span class="text-danger">{{$errors->first('disgnation')}}</span>
                                        </div>
                                        
                                         <div class="col-md-4">
                                              <label>Location <span class="mandatory">*</span></label>
                                              <input type="text" class="form-control form-control-sm" id="work_experience_location" placeholder="" name="work_experience_location[]">
                                              <span class="text-danger">{{$errors->first('work_experience_location')}}</span>
                                             </div>
                                           </div> 
                                    </div>
                                    <div class="col-md-1 p-0 d-flex align-items-center justify-content-center" >
                                          <span class="btn-plus add-new1" style="margin:0px 2px"><i class="fa fa-plus"></i></span>
                                         <span class="btn-minus" style="margin:0px 2px"><i class="fa fa-minus"></i></span>
                                    </div>
                                    <input name="work_experience_no" id="work_experience_no" type="hidden" value="0">
                                    <span class="text-danger">{{$errors->first('work_experience_no')}}</span>
                                </div>
                                
                                <div class="work_experience">
                                    
                                </div>
                                
                              <div class="row mt-3">
                                   
                                    <div class="col-md-4 mb-3">
                                      <label>Current Basic salary <span class="mandatory">*</span></label>
                                      <input type="text" class="form-control form-control-sm  " placeholder="" value="{{old('current_basic_salary')}}" name="current_basic_salary" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                                      <span class="text-danger">{{$errors->first('current_basic_salary')}}</span>
                                    </div>
                                    
                                    <div class="col-md-4">
                                      <label>PF Number <span class="mandatory">*</span></label>
                                      <input type="text" class="form-control form-control-sm  " placeholder="" value="{{old('pf_number')}}" name="pf_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                                      <span class="text-danger">{{$errors->first('pf_number')}}</span>
                                    </div>
                                    
                                    <div class="col-md-4">
                                      <label>ESI Number <span class="mandatory">*</span></label>
                                      <input type="text" class="form-control form-control-sm  " placeholder="" value="{{old('esi_number')}}" name="esi_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                                      <span class="text-danger">{{$errors->first('esi_number')}}</span>
                                    </div>
                                        
                              </div>
                              <div class="row">
                              </div>
                            
                        <div class="mb-3 bg-head"><b>Bank Details</b></div>
                        
                          <div class="row">
                              <div class="col-md-4 mb-3">
                               <label>Account holder name <span class="mandatory">*</span></label>
                               <input type="text" class="form-control form-control-sm " id="account_holder_name" placeholder="" value="{{old('account_holder_name')}}" name="account_holder_name">
                               <span class="text-danger">{{$errors->first('account_holder_name')}}</span>
                              </div>
                       
                                <div class="col-md-4">
                                  <label>Bank name <span class="mandatory">*</span></label>
                                 <input type="text" class="form-control form-control-sm  " placeholder="" value="{{old('bank_name')}}" name="bank_name">
                                 <span class="text-danger">{{$errors->first('bank_name')}}</span>
                                </div>
                                <div class="col-md-4">
                                  <label>Account number <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm  " placeholder="" value="{{old('account_number')}}" name="account_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                                  <span class="text-danger">{{$errors->first('account_number')}}</span>
                                </div>
                                <div class="col-md-4 mb-3">
                                  <label>IFSC code <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm " placeholder="" value="{{old('ifsc_code')}}" name="ifsc_code" >
                                  <span class="text-danger">{{$errors->first('ifsc_code')}}</span>
                                </div>
                            </div>
    
                          <div class="mb-3 bg-head"><b>Family details</b></div>
                          <div class="row">
                             <div class="col-md-4 mb-3">
                               <label>Relation name <span class="mandatory">*</span></label>
                             <input type="text" class="form-control form-control-sm " placeholder="" value="{{old('relation_name')}}" name="relation_name">
                             <span class="text-danger">{{$errors->first('relation_name')}}</span>
                            </div>
                                <div class="col-md-4">
                                  <label>Relation gender <span class="mandatory">*</span></label>
                                 <select class="form-control-sm   select-input" name="relation_gender">
                                    <option value="">Select</option>
                                    <option>Male</option>
                                    <option>female</option>
                                    <option>Transgender</option>
                                  </select>
                                  <span class="text-danger">{{$errors->first('relation_gender')}}</span>
                                </div>
                                <div class="col-md-4">
                                  <label>Relation type <span class="mandatory">*</span></label>
                                  <select class="form-control-sm   select-input " name="relation_type">
                                    <option value="">Select</option>
                                    @if($relations)
                                    @foreach($relations as $key=> $val)
                                     <option value="{{ $val->id }}">{{ $val->relation }}</option>
                                    @endforeach
                                    @endif
                                  </select>
                                  <span class="text-danger">{{$errors->first('relation_type')}}</span>
                                </div>
                                <div class="col-md-4 mb-3">
                                  <label>Relation DOB <span class="mandatory">*</span></label>
                                  <input type="date" class="form-control form-control-sm  " placeholder="" value="{{old('relation_dob')}}" name="relation_dob" onkeydown="return false">
                                  <span class="text-danger">{{$errors->first('relation_dob')}}</span>
                                </div>
                                <div class="col-md-4">
                                  <label>Relation occupation <span class="mandatory">*</span></label>
                                  <input type="text" class="form-control form-control-sm  " placeholder="" value="{{old('relation_occupation')}}" name="relation_occupation">
                                  <span class="text-danger">{{$errors->first('relation_occupation')}}</span>
                                </div>
                                <div class="col-md-4 mb-3">
                                  <label>Family photo should be added <span class="mandatory">*</span></label>
                                  <input type="file" class="form-control form-control-sm  " placeholder=""  name="family_photo">
                                   <small style="font-size:12px;"><i> <b>Note:</b> Upload files PDF, JPG, PNG only</i></small>
                                   <span class="text-danger">{{$errors->first('family_photo')}}</span>
                                </div>
                            </div>
                            <div class="mb-3 bg-head"><b>Nominee Details</b></div>
                          <div class="row">
                             <div class="col-md-4 mb-3">
                               <label>Nominee name <span class="mandatory">*</span></label>
                             <input type="text" class="form-control form-control-sm " placeholder="" name="nominee_details">
                             <span class="text-danger">{{$errors->first('nominee_details')}}</span>
                            </div>
                                <div class="col-md-4">
                                  <label>Nominee Relation <span class="mandatory">*</span></label>
                                  <select class="form-control-sm   select-input" name="nominee_relation">
                                    <option value="">Select</option>
                                    @if($relations)
                                    @foreach($relations as $key=> $val)
                                     <option value="{{ $val->id }}">{{ $val->relation }}</option>
                                    @endforeach
                                    @endif
                                  </select>
                                  <span class="text-danger">{{$errors->first('nominee_relation')}}</span>
                                </div>
                                <div class="col-md-4">
                                  <label>Nominee gender <span class="mandatory">*</span></label>
                                 <select class="form-control-sm  select-input " name="nominee_gender">
                                    <option value="">Select</option>
                                    <option>Male</option>
                                    <option>female</option>
                                    <option>Transgender</option>
                                  </select>
                                  <span class="text-danger">{{$errors->first('nominee_gender')}}</span>
                                </div>
                                <div class="col-md-4 mb-3">
                                  <label>Nominee DOB <span class="mandatory">*</span></label>
                                  <input type="date" class="form-control form-control-sm " placeholder="" name="nominee_dob" onkeydown="return false">
                                  <span class="text-danger">{{$errors->first('nominee_dob')}}</span>
                                </div>
                            </div>
                              <div class="mt-3 mb-3 bg-head"><b>Objective/aspirations <span class="mandatory"></span></b></div>
                                <textarea class="w-100 textarea-h" name="objective_aspirations"></textarea>
                                <span class="text-danger">{{$errors->first('objective_aspirations')}}</span>
                              <div class="mt-3 mb-3 bg-head"><b>Contributions/awards <span class="mandatory"></span></b></div>
                              <textarea class="w-100 textarea-h" name="contributions_awards"></textarea>
                              <span class="text-danger">{{$errors->first('contributions_awards')}}</span>
                              <div class="mt-3 mb-3 bg-head"><b>Current role description <span class="mandatory"></span></b></div>
                              <textarea class="w-100 textarea-h" name="current_role_description"></textarea>
                              <span class="text-danger">{{$errors->first('current_role_description')}}</span>
                              <div class="mt-3 mb-3 bg-head"><b>Disciplinary cases/suspensions <span class="mandatory"></span></b></div>
                              <textarea class="w-100 textarea-h" name="discplinary_cases_suspensions"></textarea>
                              <span class="text-danger">{{$errors->first('discplinary_cases_suspensions')}}</span>
                              
                           <div class="text-center mt-2 mb-2">
                             <button class="btn btn-md btn-submit" name="submit" value="submit">Submit</button>
                           </div>
    
                          
                        </div>
                        <div class="col-md-3 ">
                          <!--<div class="user-prof">-->
                          <!--  <img src="images/user-profile.png" class="img-fluid">-->
                          <!--</div>-->
                            <div class="col-ting">
                                <div class="control-group file-upload" id="file-upload1">
                                  <div class="image-box text-center">
                                		<p><i class="fa fa-user" style="font-size:135px; color:#CCC"></i>
                                		<br> Upload Photo here
                                		</p>
                                		<img src=" " alt="" class="img-fluid rounded">
                                	</div>
                                     <div class="controls" style="display: none;">
                                		<input type="file" name="photo" id="photo"/>
                                	</div>
                                	<center>
                                	<div class="image_upload"><small>Please Click here to Upload Photo </small><span class="mandatory"> *</span></div>
                                </center>	
                                </div>
                            </div>
                          
                        </div>
                      </div>
                      </div>
    
                    
                     
    
                      </div>
                    </div>
                </form>
                </div>
    
          </main>
               
    
    
    
    
    
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
 
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->

<script>
    $(document).ready(function(){
        $('#form_btn').on('click',function(){
            $('#private_form').show();
            // if(emp_type != ''){
            //     if(emp_type == 3){
            //         $('#govt_form').show();
            //         $('#private_form').hide();
            //     }else{
            //         $('.emp_val').val(emp_type);
                    
            //         $('#govt_form').hide();
            //     }
            // }else{
            //     alert('Please Select Employee Type');
            //     $('#private_form').hide();
            //     $('#govt_form').hide();
            // }
            
        })
    })
</script>
<script>
    $(document).ready(function(){
        $('#emp_type').on('change',function(){
            $('.emp_val').val($(this).val());
            $('#private_form').hide();
        })
    })
</script>

<script>
</script>

 <script>  
// validation 

// jQuery.validator.addMethod("dob", function(value, element) {
//     // $('#dob-field-error').remove();
//         var Bday = new Date(value);
//         var Q4A =  ((Date.now() - Bday) / (31557600000));
//         return (Q4A < 18);
//         // if(Q4A < 18) {
//         //     $('input[name=dob]').val('');
//         //     console.log('less than 18');
//         //     $('input[name=dob]').after('<label id="dob-field-error" class="error" for="dob-field">Age should not be less than 18 years!</label>')
            
//         // } 
// //   return this.optional(element) || /^http:\/\/mycorporatedomain.com/.test(value);
// }, "Age should not be less than 18 years!");


    $(function() {
        // $("form[name='add']").validate({
        //     rules: {
        //         name: "required",
        //         surname: "required",
        //         dob: "required",
        //         dob: "required",
        //         co: "required",
        //         co_name: "required",
        //         gender: "required",
        //         employee_type: "required",
        //         joining_designation: "required",
        //         communication_address: "required",
        //         communication_address_pin_code: {
        //             required: true,
        //             minlength:6,
        //             maxlength:6
        //         },
        //         permenant_address: "required",
        //         permenant_address_pin_code: {
        //             required: true,
        //             minlength:6,
        //             maxlength:6
        //         },
        //         // district: "required",
        //         // ulbid: "required",
        //         mandal: "required",
        //         state: "required",
                
        //         mobile_number: {
        //             required: true,
        //             minlength:10,
        //             maxlength:10
        //         },
        //         // alternative_mobile_number: {
        //         //     required: true,
        //         //     minlength:10,
        //         //     maxlength:10
        //         // },
        //         email_id: {
        //             required: true,
        //             email: true
        //         },
            
        //         religion: "required",
        //         caste: "required",
        //         marital_status: "required",
        //         if_select_single: "required",
        //         nationality: "required",
                
        //         adhaar_card_number: {
        //             required: true,
        //             minlength:12,
        //             maxlength:12
        //         },
        //         adhaar_card: "required",
        //         pan_card_number: "required",
        //         pan_card: "required",
        //         degree: "required",
        //         year_of_passing: "required",
        //         university_college: "required",
        //         certificates: "required",
        //         discpline: "required",
        //         date_of_joining: "required",
        //         designation: "required",
        //         location: "required",
        //         doj: "required",
        //         current_grade: "required",
        //         current_level: "required",
                
        //         // current_designation: "required",
        //         'current_designation[]': {
        //             required: true
        //         },
        //         'current_status[]': {
        //             required: true
        //         },
        //         'current_location[]': {
        //             required: true
        //         },
        //         'duty_type[]': {
        //             required: true
        //         },
                
                
        //         'start_date[]': {
        //             required: true
        //         },
        //         'end_date[]': {
        //             required: true
        //         },
        //         'disgnation[]': {
        //             required: true
        //         },
        //         'work_experience_location[]': {
        //             required: true
        //         },
                
        //         current_basic_salary: "required",
        //         pf_number: "required",
        //         esi_number: "required",
                
        //         account_holder_name: "required",
        //         bank_name: "required",
        //         account_number: "required",
        //         ifsc_code: "required",
                
        //         relation_name: "required",
        //         relation_gender: "required",
        //         relation_type: "required",
        //         relation_dob: "required",
        //         relation_occupation: "required",
        //         family_photo: "required",
                
        //         nominee_details: "required",
        //         nominee_relation: "required",
        //         nominee_gender: "required",
        //         nominee_dob: "required",
                
        //         // objective_aspirations: "required",
        //         // contributions_awards: "required",
        //         // current_role_description: "required",
        //         // discplinary_cases_suspensions: "required",
                
        //         photo: "required",
                
        //     },
        //     messages: {
        //         name: "Please Enter Name",
        //         surname: "Please Enter surname",
        //         dob: "Please Select Valid DOB",
        //         co: "Mandatory Field",
        //         co_name: "Mandatory Field",
        //         gender: "Mandatory Field",
        //         employee_type: "Mandatory Field",
        //         joining_designation: "Mandatory Field",
        //         communication_address: "Mandatory Field",
        //         communication_address_pin_code: "Please Enter 6 Digit valid Pin code",
        //         permenant_address: "Mandatory Field",
        //         permenant_address_pin_code: "Please Enter 6 Digit valid Pin code",
        //         // district: "Mandatory Field",
        //         // ulbid: "Mandatory Field",
        //         mandal: "Mandatory Field",
        //         state: "Mandatory Field",
                
        //         mobile_number: {
        //             required: "Please Enter Mobile Number",
        //             minlength: "Please Enter 10 digit valid Mobile Number",
        //             maxlength: "Please Enter 10 digit valid Mobile Number",
        //         },
        //         alternative_mobile_number: {
        //             required: "Please Enter Alternative Mobile Number",
        //             minlength: "Please Enter 10 digit valid Alternative Mobile Number",
        //             maxlength: "Please Enter 10 digit valid Alternative Mobile Number",
        //         },
        //         email_id: "Please enter a valid email address",
        //         religion: "Mandatory Field",
        //         caste: "Mandatory Field",
        //         marital_status: "Mandatory Field",
        //         if_select_single: "Mandatory Field",
        //         nationality: "Mandatory Field",
        //         adhaar_card_number: "Mandatory Field",
                
        //         adhaar_card_number: {
        //             required: "Please Enter Adhaar Card Number",
        //             minlength: "Please Enter 12 digit valid Adhaar Card Number",
        //             maxlength: "Please Enter 12 digit valid Adhaar Card Number",
        //         },
                
        //         adhaar_card: "Mandatory Field",
        //         pan_card_number: "Mandatory Field",
        //         pan_card: "Mandatory Field",
        //         degree: "Mandatory Field",
        //         year_of_passing: "Mandatory Field",
        //         university_college: "Mandatory Field",
        //         certificates: "Mandatory Field",
        //         discpline: "Mandatory Field",
        //         date_of_joining: "Mandatory Field",
        //         designation: "Mandatory Field",
        //         location: "Mandatory Field",
        //         doj: "Mandatory Field",
        //         current_grade: "Mandatory Field",
        //         current_level: "Mandatory Field",
                
                
        //         "current_designation[]": "Please select category",
        //         "current_status[]": "Please select category",
        //         "current_location[]": "Please select category",
        //         "duty_type[]": "Please select category",
                
        //         "start_date[]": "Mandatory Field",
        //         "end_date[]": "Mandatory Field",
        //         "disgnation[]": "Mandatory Field",
        //         "work_experience_location[]": "Mandatory Field",
                
                
        //         current_basic_salary: "Mandatory Field",
        //         pf_number: "Mandatory Field",
        //         esi_number: "Mandatory Field",
                
        //         account_holder_name: "Mandatory Field",
        //         bank_name: "Mandatory Field",
        //         account_number: "Mandatory Field",
        //         ifsc_code: "Mandatory Field",
                
        //         relation_name: "Mandatory Field",
        //         relation_gender: "Mandatory Field",
        //         relation_type: "Mandatory Field",
        //         relation_dob: "Mandatory Field",
        //         relation_occupation: "Mandatory Field",
        //         family_photo: "Mandatory Field",
                
        //         nominee_details: "Mandatory Field",
        //         nominee_relation: "Mandatory Field",
        //         nominee_gender: "Mandatory Field",
        //         nominee_dob: "Mandatory Field",
                
        //         objective_aspirations: "Mandatory Field",
        //         contributions_awards: "Mandatory Field",
        //         current_role_description: "Mandatory Field",
        //         discplinary_cases_suspensions: "Mandatory Field",
                
        //         photo: "Mandatory Field",
        //     },
           
        //     submitHandler: function(form) {
        //         if($('#photo').val())
        //         {
        //             form.submit();
        //         }
        //         else
        //         {
        //           alert("Please Select Photo");
        //           $('.image_upload').text("Please Select Photo");
        //         }
               
        //     }
        // });
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
    
    function validateDesignationAvaibility(e) {
        closediv();
        var designation = e;
        var district = $('select[name=district]').val();
        var ulbid = $('select[name=ulbid]').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
               type:'POST',
               url:'{{ route('validateSelectedDesignationAvaibility'); }}',
               data:{designation: designation, district : district, ulbid: ulbid },
               dataType: 'JSON',
               beforeSend: function() 
                { 
                    $("#overlay").fadeIn();
                },
               success:function(data) {},
               error: function(jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status == 422) {
                        for (const [key, value] of Object.entries(jqXHR.responseJSON.errors)) {
                            $('.current_designations').val('');
                                $('#designationerrors').after('<span class="input-error" style="color:red">' +value+'</span>');
                        }
                        setTimeout(closediv, 4000);
                    }
                },
                complete: function()  {   $("#overlay").fadeOut(); }
            });
    }
    
    function closediv(){
        $('.input-error').hide();
    }
    function GetCurrentDesignation(district)
    {
        
        jQuery('.current_designation div').html('');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.current_designations').empty();
        $('.current_designations').html('<option value="">Select </option>');
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
                //   console.log(data);
                 $.each(data, function(key, value) {
                        $('.current_designations').append('<option value="'+ value.id +'">'+ value.description +'</option>');
                    });
               },
                complete: function() 
                { 
                    $("#overlay").fadeOut();
                }
            });
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

    $('#name-field').bind('keypress', testInput);
    $('#name-field').bind('paste', testInput);
    function testInput(event) {
       var value = String.fromCharCode(event.which);
       var pattern = new RegExp(/[a-zåäö ]/i);
       return pattern.test(value);
    }

     $('#location').bind('keypress', testInput);
     $('#location').bind('paste', testInput);
    function testInput(event) {
       var value = String.fromCharCode(event.which);
       var pattern = new RegExp(/[a-zåäö ]/i);
       return pattern.test(value);
    }

    $('#surname-field').bind('keypress', surnameTestInput);
    $('#surname-field').bind('paste', surnameTestInput);
    function surnameTestInput(event) {
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
    $('#current_location').bind('keypress', current_locationfieldInput);
    $('#current_location').bind('paste', current_locationfieldInput);
    function current_locationfieldInput(event) {
       var value = String.fromCharCode(event.which);
       var pattern = new RegExp(/[a-zåäö ]/i);
       return pattern.test(value);
    }
    $('#work_experience_location').bind('keypress', work_experience_locationfieldInput);
    $('#work_experience_location').bind('paste', work_experience_locationfieldInput);
    function work_experience_locationfieldInput(event) {
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
    //   alert(getPanNo);
    }

    $('#if_select_single').bind('keypress', if_select_singleFunction);
    $('#if_select_single').bind('keyup', if_select_singleFunction);
    $('#if_select_single').bind('paste', if_select_singleFunction);
    function if_select_singleFunction(event) {
      var getValue = $('#if_select_single').val();
       str = getValue.toLowerCase().replace(/\b[a-z]/g, function(letter) {
            return letter.toUpperCase();
        });
       $('#if_select_single').val(str);
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
            $('input[name=dob]').after('<label id="dob-field-error" class="error" for="dob-field">Age should not be less than 18 years!</label>')
        }
    }


    </script>
    
    <script>
        $(document).ready(function(){
            $('#district').on('change',function(){
                $('.dist_val').val($(this).val());
                $('.ulb_val').val('');
            });
            $('#ulbid_list').on('change',function(){
                $('.ulb_val').val($(this).val());
            })
        })
    </script>

<!--close-->
 @include('headers.footer')

