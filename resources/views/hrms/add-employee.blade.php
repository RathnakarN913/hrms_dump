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
    background-color: #327c95;
    padding: 5px 15px;
    border-radius: 4px;
    font-size: 14px;
    color: white;
    border-left: 5px #f38509 solid;
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
    padding: 10px;
    width: auto;
    border-radius: 6px !important;
    font-size: 16px !important;
    font-weight: 600;
    letter-spacing: 1px;
    margin-top: 7px;
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

.card_bd_pd1{
        padding: 8px !important;
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

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                 <div class="mb-0 ml-4"><b>Add Employees Details</b></div>

                  <div class="bg-white1">

                    <div class="table-content">

                         <form name="add" method="post" action="{{ route('CreateAddEmployee') }}" enctype="multipart/form-data">

                                @csrf


                               <div class="card shadow">

                                <div class="card-body p-3 pb-3">

                                  <div class="row m-0 colr1 p-2">


                            <div class="col-md-3">
                                <lable for="employee_type">Employee Type <span class="mandatory ">*</span></lable>
                                <select class="form-control-sm  select-input" name="employee_type" id="emp_type" onchange="checkulbpost()">
                                    <option value="">Select</option>
                                    @if($employeetypes)
                                        @foreach($employeetypes as $key=> $val)
                                         <option value="{{ $val->employee_type_id }}" @if($val->employee_type_id ==  old('employee_type')) selected @endif >{{ $val->employee_type_desc }}</option>
                                        @endforeach
                                    @endif
                                 </select>
                                   <span class="text-danger">{{$errors->first('employee_type')}}</span>
                            </div>

                        @if(Session::get('user_type')=='PD')

                        <input type="hidden" value="pd" id="ckecpd">

                            <div class="col-md-3">
                                <lable for="district">District <span class="mandatory ">*</span></lable>
                                  <select class="form-control-sm  select-input" name="district" id="district"   onChange="GetUlbs(),checkulbpost()">
                                    <option value="">Select</option>
                                    @if($districts)
                                        @foreach($districts as $key=> $val)
                                         <option value="{{ $val->distid }}" @if($val->distid ==  old('district')) selected @endif>{{ $val->distname }}</option>
                                        @endforeach
                                    @endif
                                  </select>
                                   <span class="text-danger">{{$errors->first('district')}}</span>
                            </div>

                            <div class="col-md-3 ulbhide" style="display:@if(old('ulbid') || old('district')) block @else none @endif" >
                                <lable for="ulbid">ULB</lable>
                                  <select class="form-control-sm  select-input" name="ulbid" id="ulbid_list" onChange="GetCurrentDesignationByUlb(),checkulbpost()">
                                    <option value="">Select Ulb</option>
                                     @if($ulblist)
                                        @foreach($ulblist as $key1=> $val1)
                                         <option value="{{ $val1->ulbid }}" @if($val1->ulbid ==  old('ulbid')) selected @endif>{{ $val1->ulbname }}</option>
                                        @endforeach
                                    @endif
                                  </select>
                            </div>

                      @endif


                                   </div>


                                </div>

                            </div>





                            <div class="card shadow mt-3">
                               <div class="card-header p-0"> <div class="bg-head"><b>Personal Information</b></div> </div>
                                <div class="card-body">

                                  <div class="row m-0 colr1" >

                                        <div class="col-md-9 order-sm-first order-last card_bd_pd">

                                            <div class="row mt-2">
                                    <div class="col-md-4 mb-3">
                                      <label>Name of the Employee <span class="mandatory ">*</span></label>
                                      <input type="text" class="form-control form-control-sm   ml-0" id="name-field" placeholder="Name" name="name" value="{{old('name')}}" >
                                      <span class="text-danger">{{$errors->first('name')}}</span>
                                    </div>
                                    <div class="col-md-4">
                                      <label>Surname <span class="mandatory"></span></label>
                                      <input type="text" class="form-control form-control-sm  ml-0" placeholder="Surname" id="surname-field" name="surname" value="{{old('surname')}}">
                                      <span class="text-danger">{{$errors->first('surname')}}</span>
                                    </div>
                                    <div class="col-md-4">
                                      <label>Date of Birth <span class="mandatory">*</span></label>
                                      <input type="date" class="form-control form-control-sm  ml-0" value="{{old('dob')}}" placeholder="" onchange="submitBday(this.value)" name="dob" min="1950-01-01" max="<?php echo date("Y-m-d") ?>" >
                                      <span class="text-danger">{{$errors->first('dob')}}</span>
                                    </div>

                                    <div class="col-md-4">
                                      <label>Gender <span class="mandatory">*</span></label>
                                      <select class="form-control-sm  select-input" name="gender">
                                        <option value="">Select</option>
                                        <option value="Male" @if(old('gender') == 'Male') selected @endif>Male</option>
                                        <option value="Female" @if(old('gender') == 'Female') selected @endif>Female</option>
                                        <option value="Transgender" @if(old('gender') == 'Transgender') selected @endif>Transgender</option>
                                      </select>
                                      <span class="text-danger">{{$errors->first('gender')}}</span>
                                    </div>
                                     <div class="col-md-4 mb-3">
                                      <label>Marital Status <span class="mandatory">*</span></label>
                                      <select class="form-control-sm  select-input" name="marital_status" value="{{old('marital_status')}}" id="marital_status" onChange="GetMaritalStatusDtl();">
                                        <option value="">Select</option>
                                        @if($matrialstatus)
                                            @foreach($matrialstatus as $key=> $val)
                                             <option value="{{ $val->id }}" @if($val->id == old('marital_status')) selected @endif>{{ $val->matrial_status }}</option>
                                            @endforeach
                                        @endif
                                      </select>
                                      <span class="text-danger">{{$errors->first('marital_status')}}</span>
                                    </div>
                                    <div class="col-md-4">
                                      <label class="MaritalHeading">Please Select Marital Status <span class="mandatory">*</span></label>
                                      <input type="text" class="form-control form-control-sm   ml-0" placeholder="" value="{{old('if_select_single')}}"  name="if_select_single" id="if_select_single">
                                      <span class="text-danger">{{$errors->first('if_select_single')}}</span>
                                    </div>
                                     <div class="col-md-4">
                                      <label>Caste <span class="mandatory">*</span></label>
                                     <select class="form-control-sm   select-input" name="caste">
                                        <option value="">Select</option>
                                        @if($casts)
                                            @foreach($casts as $key=> $val)
                                             <option value="{{ $val->id }}" @if($val->id == old('caste')) selected @endif>{{ $val->cast }}</option>
                                            @endforeach
                                        @endif
                                      </select>
                                      <span class="text-danger">{{$errors->first('caste')}}</span>
                                    </div>
                                     <div class="col-md-4">
                                      <label>Sub Caste<span class="mandatory">*</span></label>
                                      <input type="text" class="form-control form-control-sm  ml-0" id="subcaste" placeholder="" value="{{old('subcaste')}}" name="subcaste">
                                      <span class="text-danger">{{$errors->first('subcaste')}}</span>
                                    </div>
                                    <div class="col-md-4">
                                      <label>Religion <span class="mandatory"></span></label>
                                      <select class="form-control-sm   select-input" name="religion">
                                        <option value="">Select</option>
                                        @if($religions)
                                            @foreach($religions as $key=> $val)
                                             <option value="{{ $val->id }}" @if($val->id == old('religion')) selected @endif>{{ $val->religion }}</option>
                                            @endforeach
                                        @endif
                                      </select>
                                      <span class="text-danger">{{$errors->first('religion')}}</span>
                                    </div>
                                    <div class="col-md-4 pt-3">
                                      <label>Nationality <span class="mandatory"></span></label>
                                      <input type="text" class="form-control form-control-sm  ml-0" id="nationality" placeholder="" value="{{old('nationality')}}" name="nationality">
                                      <span class="text-danger">{{$errors->first('nationality')}}</span>
                                    </div>
                                    </div>

                                            <div class="row">

                                                <div class="col-md-8 pt-3">
                                                   <label>Present Address <span class="mandatory">*</span></label>
                                                  <textarea class="textarea-form form-control" name="communication_address" id="communication_address" value="{{old('communication_address')}}" style="height: 64px;" name="communication_address">{{old('communication_address')}}</textarea>
                                                  <span class="text-danger">{{$errors->first('communication_address')}}</span>
                                                </div>
                                                <div class="col-md-4 pt-3">
                                                  <label>Pin Code <span class="mandatory">*</span></label>
                                                  <input type="text" class="form-control form-control-sm  ml-0" maxlength="6" placeholder="" value="{{old('communication_address_pin_code')}}" id="communication_address_pin_code" name="communication_address_pin_code" oninput="this.value.replace(/[^0-9,]/g, "").replace(/(,.*?),(.*,)?/, "$1"); onkeydown="if(event.key==='.'){event.preventDefault();}">
                                                  <span class="text-danger">{{$errors->first('communication_address_pin_code')}}</span>
                                                </div>

                                              <div class="mb-3 mt-3 ml-3">
                                                <input type="checkbox" id="permenant_address_same_as_above" value="{{old('permenant_address_same_as_above')}}" name="permenant_address_same_as_above" value="1" > Please select Permanent address same as above
                                                <span class="text-danger">{{$errors->first('permenant_address_same_as_above')}}</span>
                                              </div>

                                                <div class="col-md-8">
                                                   <label>Permanent Address <span class="mandatory">*</span></label>
                                                  <textarea class="textarea-form form-control" value="{{old('permenant_address')}}" name="permenant_address" id="permenant_address" style="height: 64px;">{{old('permenant_address')}}</textarea>
                                                  <span class="text-danger">{{$errors->first('permenant_address')}}</span>
                                                </div>
                                                <div class="col-md-4">
                                                  <label>Pin Code <span class="mandatory">*</span></label>
                                                  <input type="text" class="form-control form-control-sm mb-3  ml-0" maxlength="6" placeholder="" id="permenant_address_pin_code" value="{{old('permenant_address_pin_code')}}" name="permenant_address_pin_code" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                                                  <span class="text-danger">{{$errors->first('permenant_address_pin_code')}}</span>
                                                </div>


                                              </div>


                                            <div class="row mt-3">

                                                <div class="col-md-4">
                                                  <label>Mobile Number <span class="mandatory">*</span></label>
                                                 <input type="text" class="form-control form-control-sm  ml-0" maxlength="10" placeholder="" value="{{old('mobile_number')}}" name="mobile_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                                                 <span class="text-danger">{{$errors->first('mobile_number')}}</span>
                                                </div>
                                                <div class="col-md-4">
                                                  <label>Alternative Mobile Number <span class="mandatory"></span></label>
                                                  <input type="text" class="form-control form-control-sm  ml-0 " maxlength="10" placeholder=""  value="{{old('alternative_mobile_number')}}" name="alternative_mobile_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                                                  <span class="text-danger">{{$errors->first('alternative_mobile_number')}}</span>
                                                </div>

                                                 <div class="col-md-4 mb-3">
                                                  <label>Email Id <span class="mandatory">*</span></label>
                                                  <input type="email" class="form-control form-control-sm   ml-0" placeholder="" value="{{old('email_id')}}" name="email_id">
                                                  <span class="text-danger">{{$errors->first('email_id')}}</span>
                                                </div>


                                                </div>

                                        </div>

                                        <div class="col-md-3 pt-3">

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
                                                	<span class="text-danger">{{$errors->first('photo')}}</span>
                                                </center>
                                                </div>
                                            </div>


                                        </div>


                                   </div>


                                </div>

                            </div>


                            <div class="card shadow mt-3">
                                <div class="card-header p-0"> <div class="bg-head"><b>Native Details</b></div> </div>

                                    <div class="card-body card_bd_pd1">

                                      <div class="row colr2 m-1 pt-3 pb-3">

                                            <div class="col-md-4 mb-3">
                                              <label>Native State <span class="mandatory"></span></label>
                                              <input type="text" class="form-control form-control-sm ml-0 " id="state-field" placeholder="" value="{{old('state')}}" name="state" oninput="this.value = this.value.replace(/[^A-z]/g, '').replace(/(\..*)\./g, '$1');">
                                              <span class="text-danger">{{$errors->first('state')}}</span>
                                            </div>

                                             <div class="col-md-4">
                                              <label>Native  District  <span class="mandatory">*</span></label>
                                              <input type="text" class="form-control form-control-sm ml-0 " placeholder="" oninput="this.value = this.value.replace(/[^A-z]/g, '').replace(/(\..*)\./g, '$1');"  id="district-field" value="{{old('native_district')}}" name="native_district">
                                              <span class="text-danger">{{$errors->first('native_district')}}</span>
                                            </div>

                                             <div class="col-md-4">
                                              <label>Native Mandal <span class="mandatory"></span></label>
                                              <input type="text" class="form-control form-control-sm ml-0 " placeholder="" id="mandal-field" value="{{old('mandal')}}" name="mandal" oninput="this.value = this.value.replace(/[^A-z]/g, '').replace(/(\..*)\./g, '$1');">
                                              <span class="text-danger">{{$errors->first('mandal')}}</span>
                                            </div>

                                            <div class="col-md-4">
                                              <label>Upload Native  District Certificate  <span class="mandatory"></span></label>
                                              <input type="file" class="form-control form-control-sm ml-0 " placeholder="" value="{{old('district_certi')}}" name="district_certi">
                                              <span class="text-danger">{{$errors->first('district_certi')}}</span>
                                            </div>

                                   </div>

                                    </div>
                            </div>


                             <div class="card shadow mt-3">

                                   <div class="card-header p-0"> <div class="bg-head"><b>Statutory Details</b></div> </div>

                                    <div class="card-body card_bd_pd1">

                                        <div class="row colr3 m-1 pt-3 pb-3">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Aadhar Card Number <span class="mandatory">*</span></label>
                                                        <input type="text" class="form-control form-control-sm ml-0" maxlength="12" placeholder="" value="{{old('adhaar_card_number')}}" name="adhaar_card_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                                                        <span class="text-danger">{{$errors->first('adhaar_card_number')}}</span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Upload Aadhar Card <span class="mandatory">*</span></label>
                                                        <input type="file" class="form-control form-control-sm  ml-0" placeholder="" value="{{old('adhaar_card')}}" name="adhaar_card">
                                                        <small style="font-size:12px;"><i> <b>Note:</b> Upload files PDF, JPG, PNG only</i></small>
                                                        <span class="text-danger">{{$errors->first('adhaar_card')}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4 mt-3">
                                                    <label>Pan Card Number <span class="mandatory">*</span></label>
                                                    <input type="text" class="form-control form-control-sm ml-0" id="pan_card_number" placeholder="" value="{{old('pan_card_number')}}" name="pan_card_number" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)">
                                                    <span class="text-danger">{{$errors->first('pan_card_number')}}</span>
                                                </div>
                                                <div class="col-md-4 mb-3 mt-3">
                                                    <label>Upload Pan Card <span class="mandatory">*</span></label>
                                                    <input type="file" class="form-control form-control-sm  ml-0" placeholder="" value="{{old('pan_card')}}" name="pan_card">
                                                    <small style="font-size:12px;"><i> <b>Note:</b> Upload files PDF, JPG, PNG only</i></small>
                                                    <span class="text-danger">{{$errors->first('pan_card')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <label>Basic Pay <span class="mandatory">*</span></label>
                                            <input type="text" class="form-control form-control-sm ml-0 " placeholder="" id="current_basic_salary" value="{{old('current_basic_salary')}}" name="current_basic_salary" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                                            <span class="text-danger">{{$errors->first('current_basic_salary')}}</span>
                                            </div>
                                        <div class="col-md-4 mt-3">
                                            <label>PF Number <span class="mandatory">*</span></label>
                                            <input type="text" class="form-control form-control-sm ml-0 " placeholder="" value="{{old('pf_number')}}" id="pf_number" name="pf_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                                            <span class="text-danger">{{$errors->first('pf_number')}}</span>
                                            </div>
                                        <div class="col-md-4 mt-3">
                                            <label>ESI Number <span class="mandatory">*</span></label>
                                            <input type="text" class="form-control form-control-sm ml-0 " id="esi_number" placeholder="" value="{{old('esi_number')}}" name="esi_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                                            <span class="text-danger">{{$errors->first('esi_number')}}</span>
                                            </div>
                                  </div>

                                   </div>
                            </div>

                            <div class="card shadow mt-3">
                                <div class="card-header p-0"> <div class="bg-head"><b>Education Details</b></div> </div>

                                <div class="card-body card_bd_pd1">

                                <div class="row colr4 m-1 pt-3">
                                    <div class="col-md-11">
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label>Educational Qualification <span class="mandatory">*</span></label>
                                                <select class="form-control-sm select-input" name="degree[]" id='degree'  onChange="GetDiscipline(this)">
                                                    <option value="">Select</option>
                                                    @if($educations)
                                                        @foreach($educations as $key=> $val)
                                                        <option value="{{ $val->id }}" @if($val->id == old('degree.0')) selected @endif>{{ $val->education_name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <span class="text-danger">{{$errors->first('degree.0')}}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Year of Passing <span class="mandatory">*</span></label>
                                                <select class="form-control-sm  select-input" name="year_of_passing[]">
                                                    <option value="">Select</option>
                                                    @if($years)
                                                        @foreach($years as $key=> $val)
                                                        <option value="{{ $val->id }}" @if($val->id == old('year_of_passing.0')) selected @endif>{{ $val->year }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <span class="text-danger">{{$errors->first('year_of_passing.0')}}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label>University/College <span class="mandatory">*</span></label>
                                                <input type="text" class="form-control form-control-sm ml-0" id="university_college" placeholder="" value="{{old('university_college.0')}}" name="university_college[]">
                                                <span class="text-danger">{{$errors->first('university_college.0')}}</span>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Specialization <span class="mandatory"></span></label>
                                                {{-- <select class="form-control-sm  select-input" name="discpline" id="discpline"> --}}
                                                    {{-- <option value="">Select</option> --}}
                                                    {{--@if($discplines)
                                                    @foreach($discplines as $key=> $val)
                                                    <option value="{{ $val->id }}" @if($val->id == old('discpline')) selected @endif>{{ $val->discpline }}</option>
                                                    @endforeach
                                                    @endif--}}
                                                {{-- </select> --}}
                                                <input type="text" name="discpline[]" id="" value="{{ old('discpline.0') }}" class="form-control">
                                                <span class="text-danger">{{$errors->first('discpline.0')}}</span>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label>Upload SSC Certificate  <span class="mandatory">*</span></label>
                                                <input type="file" class="form-control form-control-sm ml-0 " placeholder="" value="{{old('certificates')}}" name="certificates">
                                                <small style="font-size:12px;"><i> <b>Note:</b> Upload files PDF, JPG, PNG only</i></small>
                                                <span class="text-danger">{{$errors->first('certificates')}}</span>
                                            </div>
                                            <div class="col-md-4 mb-3 height_cet" style="display:@if(old('degree.0')>1)block @else none @endif">
                                                <label> Highest Qualification Certificate  <span class="mandatory">*</span></label>
                                                <input type="file" class="form-control form-control-sm  height_cet" placeholder="" value="{{old('highest_dgre_certificates.0')}}" name="highest_dgre_certificates[]">
                                                <small style="font-size:12px;"><i> <b>Note:</b> Upload files PDF, JPG, PNG only</i></small>
                                                <span class="text-danger">{{$errors->first('highest_dgre_certificates.0')}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-1 p-0 d-flex align-items-center justify-content-center" >
                                        <span class="btn-plus add_Edu" style="margin:0px 2px"><i class="fa fa-plus"></i></span>
                                       <span class="btn-minus" style="margin:0px 2px"><i class="fa fa-minus"></i></span>
                                  </div>
                                  <input name="edu_no" id="Edu_no" type="hidden" value="0">
                                  <span class="text-danger">{{$errors->first('edu_no')}}</span>

                                </div>
                                    <div class="Edu_no">

                                    </div>
                                </div>
                            </div>


                            <div class="card shadow mt-3">
                                <div class="card-header p-0"> <div class="bg-head"><b>Professional Information</b></div> </div>

                                <div class="card-body card_bd_pd1">

                                     <div class="row colr5 m-1 pt-3">
                                  <div class="col-md-4 mb-3">
                                      <label>Date of Joining <span class="mandatory">*</span> <span style="font-size: 12px;">( First Joining date )</span></label>
                                        <input type="date" class="form-control form-control-sm ml-0" placeholder="" value="{{old('date_of_joining')}}" name="date_of_joining" onkeydown="return false">
                                        <span class="text-danger">{{$errors->first('date_of_joining')}}</span>
                                    </div>
                                    <div class="col-md-4">
                                      <label>Joining Designation <span class="mandatory">*</span></label>
                                      <select class="form-control-sm   select-input" name="designation">
                                        <option value="">Select</option>
                                        @if($designationsALL)
                                            @foreach($designationsALL as $key=> $val)
                                             <option value="{{ $val->id }}" @if($val->id == old('designation')) selected @endif>{{ $val->description }}</option>
                                            @endforeach
                                        @endif
                                      </select>
                                      <span class="text-danger">{{$errors->first('designation')}}</span>
                                    </div>
                                    <div class="col-md-4 ">
                                      <label>Joining Location <span class="mandatory">*</span></label>
                                      <input type="text" class="form-control form-control-sm ml-0" id="location" placeholder="" value="{{old('location')}}" name="location">
                                      <span class="text-danger">{{$errors->first('location')}}</span>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                      <label>DOJ <span style="font-size: 12px;">(Certificates to be uploaded)</span> <span class="mandatory">*</span></label>
                                      <input type="file" class="form-control form-control-sm ml-0 " placeholder="" value="{{old('doj')}}" name="doj">
                                       <small style="font-size:12px;"><i> <b>Note:</b> Upload files PDF, JPG, PNG only</i></small>
                                       <span class="text-danger">{{$errors->first('doj')}}</span>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                      <label>Retirement Date <span style="font-size: 12px;">(From DOB to 61 Years)</span> <span class="mandatory">*</span></label>
                                      <input type="date" class="form-control form-control-sm ml-0" placeholder="" value="{{old('retirement_date')}}" id="retirement_date" name="retirement_date" readonly>
                                       <!--<small style="font-size:12px;"><i> <b>Note:</b> Upload files PDF, JPG, PNG only</i></small>-->
                                       <span class="text-danger">{{$errors->first('retirement_date')}}</span>
                                    </div>
                                  </div>


                                    <div class="row mt-3 colr5 m-1 pt-3">

                                    <div class="col-md-4 pb-3">
                                      <label>Current Level/Category <span class="mandatory">*</span></label>
                                       <select class="form-control-sm select-input" id="level" name="current_level">
                                        <option value="">Select</option>
                                        @if($currentlevels)
                                            @foreach($currentlevels as $key=> $val)
                                             <option value="{{ $val->id }}" @if($val->id == old('current_level')) selected @endif>{{ $val->description }}</option>
                                            @endforeach
                                            <option value="c1" @if('c1' == old('current_level')) selected @endif>C1</option>
                                            <option value="c2" @if('c2' == old('current_level')) selected @endif>C2</option>
                                            <option value="c3" @if('c3' == old('current_level')) selected @endif>C3</option>
                                        @endif
                                      </select>
                                      <span class="text-danger">{{$errors->first('current_level')}}</span>
                                    </div>

                                    <input type="hidden" name="grade_dup" value="{{old('grade_dup')}}" id="grade_dup">
                                     <div class="col-md-4 mb-3" id="grade_div" @if(old('grade_dup') == 1) style="display:block" @else style="display:none" @endif>
                                      <label>Current Grade <span class="mandatory">*</span></label>
                                      <select class="form-control-sm   select-input" name="current_grade">
                                        <option value="">Select</option>
                                        @if($grades)
                                            @foreach($grades as $key=> $val)
                                             <option value="{{ $val->id }}" @if($val->id == old('current_grade')) selected @endif>{{ $val->grade }}</option>
                                            @endforeach
                                        @endif
                                      </select>
                                      <span class="text-danger">{{$errors->first('current_grade')}}</span>
                                    </div>

                                    <!-- <div class="col-md-4">-->
                                    <!--  <label>Current Category </label>-->
                                    <!--   <select class="form-control-sm   select-input" name="category">-->
                                    <!--        <option value="">Select</option>-->

                                    <!--  </select>-->
                                    <!--  <span class="text-danger">{{$errors->first('category')}}</span>-->
                                    <!--</div>-->
                                  </div>


                                   <div class="row colr5 m-1 m-0" style="background-color: #e2eeef;">
                                  <span id="designationerrors"></span>
                                      <div class="col-md-12 pt-2" style="border-right: 1px #aedde1  solid;">
                                        <div class="row">
                                             <div class="col-md-4 mb-3">
                                              <label>Current Designation <span class="mandatory">*</span></label>
                                              <select class="form-control-sm select-input current_designations" id="current_designations" onchange="validateDesignationAvaibility(this.value)" name="current_designation[]">
                                                <option value="">Select</option>
                                                   @if($designations)
                                                        @foreach($designations as $key=> $val)
                                                         <option value="{{ $val->id }}" @if($val->id == old('current_designation.0')) selected @endif>{{ $val->description }}</option>
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
                                                     <option value="{{ $val->id }}" @if($val->id == old('current_status.0')) selected @endif>{{ $val->status_name }}</option>
                                                    @endforeach
                                                @endif
                                              </select>
                                              <span class="text-danger" >{{$errors->first('current_status.0')}}</span>
                                            </div>


                                            <div class="col-md-4">
                                              <label>Current Location <span class="mandatory">*</span></label>
                                              <input type="text" class="form-control form-control-sm ml-0" id="current_location" placeholder="" value="{{old('current_location.0')}}" name="current_location[]">
                                              <span class="text-danger">{{$errors->first('current_location.0')}}</span>
                                            </div>

                                            <!--<div class="col-md-4 mb-3">-->
                                            <!--  <label>Duty type <span class="mandatory">*</span></label>-->
                                            <!--  <select class="form-control-sm   select-input" name="duty_type[]">-->
                                            <!--    <option value="">Select</option>-->
                                            <!--    @if($dutytypes)-->
                                            <!--    @foreach($dutytypes as $key=> $val)-->
                                            <!--     <option value="{{ $val->id }}" @if($val->id == old('duty_type.0')) selected @endif>{{ $val->duty_type_name }}</option>-->
                                            <!--    @endforeach-->
                                            <!--    @endif-->
                                            <!--  </select>-->
                                            <!--  <span class="text-danger">{{$errors->first('duty_type.0')}}</span>-->
                                            <!--</div>-->
                                      </div>
                                  </div>

                                   <!--<div class="col-md-1 p-0 d-flex align-items-center justify-content-center">-->
                                   <!--   <span class="btn-plus add-new" style="margin:0px 2px"><i class="fa fa-plus"></i></span>-->
                                   <!--   <span class="btn-minus" style="margin:0px 2px"><i class="fa fa-minus"></i></span>-->
                                   <!--</div>-->
                                   <input name="current_designation_no" id="current_designation_no" type="hidden" value="0">
                                   <span class="text-danger">{{$errors->first('current_designation_no')}}</span>
                                </div>

                                    <div class="current_designation">

                                    </div>


                                  <p class="mt-3 mb-0 ml-1"><b>Work Experience</b></p>


                                   <div class="row colr5 m-1 m-0" style="background-color: #e2eeef;">
                                        <div class="col-md-11 pb-3 pt-2" style="border-right: 1px #aedde1  solid;">
                                           <div class="row">
                                            <div class="col-md-8 ">
                                              <div class="row mt-2">
                                              <div class="col-md-6  ">
                                                  <label>Start Date <span class="mandatory"></span></label>
                                                <input type="date" name="start_date[]" class="form-control form-control-sm ml-0" value="{{old('start_date.0')}}" placeholder="Start date" onkeydown="return false">
                                                <span class="text-danger">{{$errors->first('start_date.0')}}</span>
                                              </div>
                                              <div class="col-md-6 ">
                                                  <label>End Date <span class="mandatory"></span></label>
                                                <input type="date" name="end_date[]" value="{{old('end_date.0')}}" max={{date('Y-m-d')}} class="form-control form-control-sm ml-0" placeholder="End date" onkeydown="return false">
                                                <span class="text-danger">{{$errors->first('end_date.0')}}</span>
                                              </div>
                                            </div>
                                            </div>

                                             <div class="col-md-4 ">
                                              <label>Designation <span class="mandatory"></span></label>
                                              <select class="form-control-sm  select-input" name="disgnation[]">
                                                <option value="">Select</option>
                                                @if($designationsALL)
                                                @foreach($designationsALL as $key=> $val)
                                                 <option value="{{ $val->id }}" @if($val->id == old('disgnation.0')) selected @endif>{{ $val->description }}</option>
                                                @endforeach
                                                @endif
                                              </select>
                                              <span class="text-danger">{{$errors->first('disgnation.0')}}</span>
                                            </div>

                                             <div class="col-md-4 mt-3">
                                                  <label>Location <span class="mandatory"></span></label>
                                                  <input type="text" class="form-control form-control-sm ml-0" id="work_experience_location" placeholder="" value="{{old('work_experience_location.0')}}" name="work_experience_location[]">
                                                  <span class="text-danger">{{$errors->first('work_experience_location.0')}}</span>
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


                                </div>
                            </div>



                            <div class="card shadow mt-3">
                                <div class="card-header p-0"> <div class="bg-head"><b>Bank Details</b></div> </div>

                                <div class="card-body card_bd_pd1">

                                     <div class="row colr6 m-1 pt-3">
                                  <div class="col-md-4 mb-3">
                                   <label>Account Holder Name <span class="mandatory">*</span></label>
                                   <input type="text" class="form-control form-control-sm ml-0" id="account_holder_name" placeholder="" value="{{old('account_holder_name')}}" name="account_holder_name">
                                   <span class="text-danger">{{$errors->first('account_holder_name')}}</span>
                                  </div>

                                    <div class="col-md-4">
                                      <label>Bank Name <span class="mandatory">*</span></label>
                                     <input type="text" class="form-control form-control-sm ml-0 " placeholder="" value="{{old('bank_name')}}" name="bank_name">
                                     <span class="text-danger">{{$errors->first('bank_name')}}</span>
                                    </div>
                                    <!--<div class="col-md-4">-->
                                    <!--  <label>Account number <span class="mandatory">*</span></label>-->
                                    <!--  <input type="password" class="form-control form-control-sm  " placeholder="" value="{{old('account_number')}}" name="account_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">-->
                                    <!--  <span class="text-danger">{{$errors->first('account_number')}}</span>-->
                                    <!--</div>-->

                                    <div class="col-md-4">
                                      <label>Account Number <span class="mandatory">*</span></label>
                                      <input type="text" class="form-control form-control-sm  ml-0" placeholder="" value="{{old('account_number')}}" name="account_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeydown="if(event.key==='.'){event.preventDefault();}">
                                      <span class="text-danger acnt_nmbr
                                      ">{{$errors->first('account_number')}}</span>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                      <label>IFSC Code <span class="mandatory">*</span></label>
                                      <input type="text" class="form-control form-control-sm ml-0" placeholder="" value="{{old('ifsc_code')}}" name="ifsc_code" >
                                      <span class="text-danger">{{$errors->first('ifsc_code')}}</span>
                                    </div>
                                </div>

                                </div>
                            </div>


                            <div class="card shadow mt-3">
                                <div class="card-header p-0"> <div class="bg-head"><b>Family Details</b></div> </div>

                                <div class="card-body card_bd_pd1">

                                <div class="row colr8 m-1 pt-3">
                                    <div class="col-md-11">
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label>Name <span class="mandatory">*</span></label>
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

                                <div class="Family_no">

                                </div>

                                </div>
                            </div>


                            <div class="card shadow mt-3">
                                <div class="card-header p-0"> <div class="bg-head"><b>Nominee Details</b></div> </div>

                                <div class="card-body card_bd_pd1">

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


                                 <div class="Nominee_no">

                                    </div>




                                </div>
                            </div>


                         <div class="card mt-3 shadow">

                           <div class="card-header p-0"> <div class="bg-head"><b>Disciplinary cases/Suspensions <span class="mandatory">*</span></b></div> </div>

                            <div class="card-body card_bd_pd1 colr9">

                              <div class="">

                                <textarea class="w-100 textarea-h" name="discplinary_cases_suspensions">{{old('discplinary_cases_suspensions')}}</textarea>
                                 <span class="text-danger">{{$errors->first('discplinary_cases_suspensions')}}</span>
                             </div>

                            </div>

                           </div>




                        <div class="card mt-3 shadow">

                           <div class="card-header p-0"> <div class="bg-head"><b>Remarks <span class="mandatory"></span></b></div> </div>

                            <div class="card-body card_bd_pd1 colr10">

                              <div class="">

                                 <textarea class="w-100 textarea-h" name="emp_Remarks">{{old('emp_Remarks')}}</textarea>
                                <span class="text-danger">{{$errors->first('emp_Remarks')}}</span>
                             </div>

                            </div>

                           </div>


                           <div class="card mt-3 shadow">

                           <div class="card-header p-0"> <div class="bg-head"><b>Objective/Inspirations <span class="mandatory"></span></b></div> </div>

                            <div class="card-body card_bd_pd1 colr11">

                              <div class="">

                                 <textarea class="w-100 textarea-h" name="objective_aspirations">{{old('objective_aspirations')}}</textarea>
                               <span class="text-danger">{{$errors->first('objective_aspirations')}}</span>
                             </div>

                            </div>

                           </div>



                         <div class="card mt-3 shadow">

                           <div class="card-header p-0"> <div class="bg-head"><b>Rewards/Achievements <span class="mandatory"></span></b></div> </div>

                            <div class="card-body card_bd_pd1 colr12">

                              <div class="">

                                  <textarea class="w-100 textarea-h" name="contributions_awards">{{old('contributions_awards')}}</textarea>
                                  <span class="text-danger">{{$errors->first('contributions_awards')}}</span>
                             </div>

                            </div>

                           </div>


                           <div class="card mt-3 shadow">

                           <div class="card-header p-0"> <div class="bg-head"><b>Current Role Description <span class="mandatory"></span></b></div> </div>

                            <div class="card-body card_bd_pd1 colr13">

                              <div class="">

                                  <textarea class="w-100 textarea-h" name="current_role_description">{{old('current_role_description')}}</textarea>
                                  <span class="text-danger">{{$errors->first('current_role_description')}}</span>
                             </div>

                            </div>

                           </div>



                         <div class="card mt-3 rounded-0 ">



                            <div class="card-body card_bd_pd1  ">

                              <div class="">

                                  <div class="text-center mt-1 mb-2">
                                     <button class="btn btn-md btn-submit" name="submit" value="submit">Submit</button>
                               </div>

                             </div>

                            </div>

                           </div>




                          </div>




                          </div>
                        </div>
                    </form>

                     </div>


                    </div>

          </main>






    </div>

  </div>


  <script>
      $(document).ready(function(){
          $('#level').on('change',function(){
              var level = $(this).val();
              if(level == 1 || level == 2 || level == 3 || level == 4 || level == 5){
                  $('#grade_div').show();
                  $('#grade_dup').val(1);
              }else{
                  $('#grade_div').hide();
              }
          })
      })
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

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->

<script>
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
<script>
    $(document).ready(function(){
        $('#form_btn').on('click',function(){
            var emp_type = $('#emp_type').val();
            var ckecpd = $('#ckecpd').val();
            var district = $('#district').val();
            if(ckecpd=='pd' && district=='' ){
                 alert('Select District');
                  return false;
            }
            if(emp_type==3){
                if($('#ulbid_list').val()){
                   alert('Select employee type HR or Non HR');
                  $('#ulbid_list').val('');
                  $('#private_form').hide();
                  return false;
                }
            }
           if(emp_type != ''){
            $('#private_form').show();
           }else{
               alert('Please Select Employee Type');
               $('#private_form').hide();
           }
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
function checkulbpost(){
  //  alert();
            var emp_type = $('#emp_type').val();
            var ckecpd = $('#ckecpd').val();
            var district = $('#district').val();
            // if(ckecpd=='pd' && district=='' ){
            //      alert('Select District');
            //       return false;
            // }
            if(emp_type==3){
                if($('#ulbid_list').val()){
                   alert('Select employee type HR or Non HR');
                  $('#ulbid_list').val('');
                  $('#private_form').hide();
                  return false;
                }
            }
        //   if(emp_type != ''){
        //     $('#private_form').show();
        //   }else{
        //       alert('Please Select Employee Type');
        //       $('#private_form').hide();
        //   }
}
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



    $('#permenant_address_same_as_above').on('change', function() {
        var ckeckVal = this.checked ? this.value : '';
        if($('#permenant_address_same_as_above').is(':checked'))
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
    function GetUlbs()
    {
         $('.ulbhide').css('display','none');
         $('.ulbhide').val('');
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
                   console.log(data);
                $('.ulbhide').css('display','block');
                 if(data==''){
                       $('.ulbhide').css('display','none');
                 }else{
                      $.each(data, function(key, value) {

                          $('#ulbid_list').append('<option value="'+ value.ulbid +'">'+ value.ulbname +'</option>');

                    });
                 }

                GetCurrentDesignation(district);
               },
                complete: function()
                {
                    $("#overlay").fadeOut();
                }
            });
    }
    $( document ).ready(function() {
        var district = $('#district').val();
      if(district){
         GetCurrentDesignation(district);
      //   alert( "ready!" );
      }

    });
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
        var employee_type = $('#emp_type').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
               type:'POST',
               url:'{{ route('validateSelectedDesignationAvaibility'); }}',
               data:{designation: designation, district : district, ulbid: ulbid, employee_type:employee_type },
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


    function submitBday(e) {
        $('#dob-field-error').remove();
        var Bday = new Date(e);
        var Q4A =  ((Date.now() - Bday) / (31557600000));
        if(Q4A < 18) {
            $('input[name=dob]').val('');
            $('input[name=dob]').after('<label id="dob-field-error" class="error" for="dob-field">Age should not be less than 18 years!</label>')
        }else{
            var r_date = new Date(Bday.setFullYear(Bday.getFullYear() + 61));

            const offset = r_date.getTimezoneOffset()
            yourDate = new Date(r_date.getTime() - (offset*60*1000));
            r_date = yourDate.toISOString().split('T')[0];
            $('#retirement_date').val(r_date);
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

