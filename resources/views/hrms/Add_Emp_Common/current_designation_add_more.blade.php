
 
 <div class="row m-1 pt-3 render<?php echo $numbers; ?>" style="background-color: #e2eeef;">  
                          
  <div class="col-md-11 pt-2" style="border-right: 1px #aedde1  solid;">
    <div class="row " >
      
         <div class="col-md-4">
          <label>Current Designation</label>
          <select class="form-control-sm mb-3 select-input" id="current_designation<?php echo $numbers; ?>" name="current_designation[]">
            <option value="">Select</option>
            @if($designations)
            @foreach($designations as $key=> $val)
             <option value="{{ $val->id }}">{{ $val->description }}</option>
            @endforeach
            @endif
          </select>
        </div>
        
        <div class="col-md-4">
          <label>Current Status</label>
          <select class="form-control-sm mb-3 select-input" id="current_status<?php echo $numbers; ?>" name="current_status[]">
            <option value="">Select</option>
            @if($currentstatus)
            @foreach($currentstatus as $key=> $val)
             <option value="{{ $val->id }}">{{ $val->status_name }}</option>
            @endforeach
            @endif
          </select>
        </div>
        
        
        <div class="col-md-4">
          <label>Current Location</label>
          <input type="text" class="form-control form-control-sm mb-3 ml-0" id="current_location1" placeholder="" name="current_location[]">
        </div>
        
        <div class="col-md-4">
          <label>Duty type</label>
          <select class="form-control-sm mb-3 select-input" id="duty_type<?php echo $numbers; ?>" name="duty_type[]">
            <option value="">Select</option>
            @if($dutytypes)
            @foreach($dutytypes as $key=> $val)
             <option value="{{ $val->id }}">{{ $val->duty_type_name }}</option>
            @endforeach
            @endif
          </select>
          
        </div>
    
  </div>  
    
  </div>
  
   <div class="col-md-1 p-0 d-flex justify-content-center align-items-center">
   <span class="btn-minus " onClick="remove(<?php echo $numbers; ?>);" style="  display: inherit;"><i class="fa fa-minus"></i></span>
  </div>
</div>


<script>
    
    $('#current_location1').bind('keypress', current_location1fieldInput1);
    $('#current_location1').bind('paste', current_location1fieldInput1);
    
    function current_location1fieldInput1(event) {
       var value = String.fromCharCode(event.which);
       var pattern = new RegExp(/[a-zåäö ]/i);
       return pattern.test(value);
    }
</script>

 