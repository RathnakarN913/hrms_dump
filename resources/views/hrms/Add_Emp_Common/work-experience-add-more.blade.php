<div class="row m-1 pt-3 b-3 render-work-exp<?php echo $numbers; ?>" style="background-color: #e2eeef;">
    <div class="col-md-11 pt-2" style="border-right: 1px #aedde1  solid;">
       <div class="row">
           
      
        <div class="col-md-6  mb-3">
          <div class="row">
          <div class="col-md-6  ">
              <label>Start date</label>
            <input type="date" name="start_date[]" class="form-control form-control-sm" placeholder="Start date" onkeydown="return false">
          </div>
          <div class="col-md-6  pl-0">
              <label>End date</label>
            <input type="date" name="end_date[]" class="form-control form-control-sm" placeholder="End date" onkeydown="return false">
          </div>
        </div>
        </div>
        
         <div class="col-md-3 p-0">
          <label>Disgnation</label>
          <select class="form-control-sm mb-3 select-input" name="disgnation[]">
            <option value="">Select</option>
            @if($designations)
            @foreach($designations as $key=> $val)
             <option value="{{ $val->id }}">{{ $val->description }}</option>
            @endforeach
            @endif
          </select>
        </div>
        
         <div class="col-md-3">
              <label>Location</label>
              <input type="text" class="form-control form-control-sm mb-3" placeholder="" id="work_experience_location1" name="work_experience_location[]">
             
            </div>
           
         </div> 
    </div>
    <div class="col-md-1 p-0 d-flex align-items-center justify-content-center">
          <!--<span class="btn-plus"><i class="bi bi-plus-lg"></i></span>-->
         <span class="btn-minus" onClick="work_experience_remove(<?php echo $numbers; ?>);" style="  display: inherit;"><i class="fa fa-minus"></i></span>
    </div>
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