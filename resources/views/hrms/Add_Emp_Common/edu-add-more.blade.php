<div class="row colr4 m-1 pt-3 edu<?php echo $numbers; ?>">
    <div class="col-md-11">
        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Educational Qualification <span class="mandatory">*</span></label>
                <select class="form-control-sm select-input" name="degree[]" id='degree'  onChange="GetDiscipline(this)">
                    <option value="">Select</option>
                    @if($educations)
                        @foreach($educations as $key=> $val)
                        <option value="{{ $val->id }}" @if($val->id == old('degree')) selected @endif>{{ $val->education_name }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="text-danger">{{$errors->first('degree')}}</span>
            </div>
            <div class="col-md-4">
                <label>Year of passing <span class="mandatory">*</span></label>
                <select class="form-control-sm  select-input" name="year_of_passing[]">
                    <option value="">Select</option>
                    @if($years)
                        @foreach($years as $key=> $val)
                        <option value="{{ $val->id }}" @if($val->id == old('year_of_passing')) selected @endif>{{ $val->year }}</option>
                        @endforeach
                    @endif
                </select>
                <span class="text-danger">{{$errors->first('year_of_passing')}}</span>
            </div>
            <div class="col-md-4">
                <label>University/college <span class="mandatory">*</span></label>
                <input type="text" class="form-control form-control-sm ml-0" id="university_college" placeholder="" value="{{old('university_college')}}" name="university_college[]">
                <span class="text-danger">{{$errors->first('university_college')}}</span>
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
                <input type="text" name="discpline[]" id="" class="form-control">
                <span class="text-danger">{{$errors->first('discpline')}}</span>
            </div>
            {{-- <div class="col-md-4 mb-3">
                <label>Upload SSC Certificate  <span class="mandatory">*</span></label>
                <input type="file" class="form-control form-control-sm ml-0 " placeholder="" value="{{old('certificates')}}" name="certificates">
                <small style="font-size:12px;"><i> <b>Note:</b> Upload files PDF, JPG, PNG only</i></small>
                <span class="text-danger">{{$errors->first('certificates')}}</span>
            </div> --}}
            <div class="col-md-4 mb-3 height_cet" style="display:@if(old('degree')>1)block @else none @endif">
                <label> Highest Qualification Certificate  <span class="mandatory">*</span></label>
                <input type="file" class="form-control form-control-sm  height_cet" placeholder="" value="{{old('highest_dgre_certificates')}}" name="highest_dgre_certificates[]">
                <small style="font-size:12px;"><i> <b>Note:</b> Upload files PDF, JPG, PNG only</i></small>
                <span class="text-danger">{{$errors->first('highest_dgre_certificates')}}</span>
            </div>
        </div>
    </div>

    <div class="col-md-1 p-0 d-flex align-items-center justify-content-center" >
        {{-- <span class="btn-plus add_Edu" style="margin:0px 2px"><i class="fa fa-plus"></i></span> --}}
       <span class="btn-minus" onclick="eduremove(<?php echo $numbers; ?>)" style="margin:0px 2px"><i class="fa fa-minus"></i></span>
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
