<div class="row colr8 m-1 pt-3 render-family<?php echo $numbers; ?>">
    <div class="col-md-11">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Relation name <span class="mandatory">*</span></label>
                <input type="text" class="form-control form-control-sm ml-0" placeholder="" value="{{old('relation_name')}}" name="relation_name[]">
                <span class="text-danger">{{$errors->first('relation_name')}}</span>
            </div>
            <div class="col-md-4">
              <label>Relation gender <span class="mandatory">*</span></label>
             <select class="form-control-sm   select-input" name="relation_gender[]">
                <option value="">Select</option>
                <option value="Male" @if('Male' == old('relation_gender')) selected @endif>Male</option>
                <option value="Female" @if('female' == old('relation_gender')) selected @endif>female</option>
                <option value="Transgender" @if('Transgender' == old('relation_gender')) selected @endif>Transgender</option>
              </select>
              <span class="text-danger">{{$errors->first('relation_gender')}}</span>
            </div>
            <div class="col-md-4">
              <label>Relation type <span class="mandatory">*</span></label>
              <select class="form-control-sm   select-input " name="relation_type[]">
                <option value="">Select</option>
                @if($relations)
                @foreach($relations as $key=> $val)
                 <option value="{{ $val->id }}" @if($val->id == old('relation_type')) selected @endif>{{ $val->relation }}</option>
                @endforeach
                @endif
              </select> 
              <span class="text-danger">{{$errors->first('relation_type')}}</span>
            </div>
            <div class="col-md-4 mb-3">
              <label>Relation DOB <span class="mandatory">*</span></label>
              <input type="date" class="form-control form-control-sm ml-0 " placeholder="" value="{{old('relation_dob')}}" name="relation_dob[]" onkeydown="return false">
              <span class="text-danger">{{$errors->first('relation_dob')}}</span>
            </div>
            <div class="col-md-4">
              <label>Relation occupation <span class="mandatory">*</span></label>
              <input type="text" class="form-control form-control-sm  ml-0" placeholder="" value="{{old('relation_occupation')}}" name="relation_occupation[]">
              <span class="text-danger">{{$errors->first('relation_occupation')}}</span>
            </div>
            <!--<div class="col-md-4 mb-3">-->
            <!--  <label>Family photo should be added <span class="mandatory">*</span></label>-->
            <!--  <input type="file" class="form-control form-control-sm ml-0 " placeholder=""  name="family_photo[]">-->
            <!--   <small style="font-size:12px;"><i> <b>Note:</b> Upload files PDF, JPG, PNG only</i></small>-->
            <!--   <span class="text-danger">{{$errors->first('family_photo')}}</span>-->
            <!--</div>-->
        </div>
    </div>
    
    <div class="col-md-1 p-0 d-flex align-items-center justify-content-center" >
          <!--<span class="btn-plus add_Family" style="margin:0px 2px"><i class="fa fa-plus"></i></span>-->
         <span class="btn-minus" onClick="family_remove(<?php echo $numbers; ?>);" style="margin:0px 2px"><i class="fa fa-minus"></i></span>
    </div>
    <input name="family_no" id="Family_no" type="hidden" value="0">
    <span class="text-danger">{{$errors->first('Nominee_no')}}</span>
    
</div>

<script>
    
    $('#work_experience_location1').bind('keypress', work_experience_locationfieldInput1);
    $('#work_experience_location1').bind('paste', work_experience_locationfieldInput1);
    
    function work_experience_locationfieldInput1(event) {
       var value = String.fromCharCode(event.which);
       var pattern = new RegExp(/[a-zåäö ]/i);
       return pattern.test(value);
    }
</script>