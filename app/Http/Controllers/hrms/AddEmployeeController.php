<?php

namespace App\Http\Controllers\hrms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectModel;
use App\Models\WardModel;
use App\Models\UlbmstModel;
use App\Models\DistrictModel;
use App\Models\ivnmPhysicalProgressdrpdwnMstModel;
use App\Models\ivnm\ivnmWorkDetailsModel;
use App\Models\ivnm\ivnmWorkProgressStatusModel;
use App\Models\UlbHouseholdData;
use App\Models\UlbCleanedDataModel;
use App\Helper\Helpers;

use App\Models\hrms\RelationModel;
use App\Models\hrms\DesignationModel;
use App\Models\hrms\DesignationLevelsModel;
use App\Models\hrms\DistricstsModel;
use App\Models\hrms\ReligionModel;
use App\Models\hrms\CastModel;
use App\Models\hrms\MatrialStatusModel;
use App\Models\hrms\EducationModel;
use App\Models\hrms\GradeModel;
use App\Models\hrms\CurrentLevelModel;
use App\Models\hrms\DutyTypeModel;
use App\Models\hrms\DiscplineModel;
use App\Models\hrms\YearsModel;
use App\Models\hrms\CurrentStatusModel;
use App\Models\hrms\AddEmployeeModel;
use App\Models\hrms\EmployeesnomineeModel;
use App\Models\hrms\EmployeesCurrentInfosModel;
use App\Models\hrms\EmployeesWorkExpModel;
use App\Models\hrms\Ulbs;
use App\Models\hrms\EmployeeType;
use App\Models\hrms\SanctionedPosts;
use App\Models\hrms\EmployeeFamilyDetails;

use Session;
use DB;
use Redirect;
error_reporting(0);

class AddEmployeeController extends Controller
{
    public function index(Request $request)
    {
       $relations = RelationModel::where('status',2)->get();
       //$designations = DesignationModel::where('designation_level', "1")->get();
       $designationsALL = DesignationModel::get();

       if(Session::get('user_type')=='PD'){
          $districts = DistricstsModel::where('distid',Session::get('distid'))->get();
          $designations = DesignationModel::where('designation_level', "2")->get();
          $ulblist = UlbmstModel::where('distid', Session::get('distid'))->get();
         // dd($ulblist);

       }else{
          $districts = DistricstsModel::all();
          $designations = DesignationModel::where('designation_level', "1")->get();
       }

       $religions = ReligionModel::all();
       $casts = CastModel::all();
       $matrialstatus = MatrialStatusModel::all();
       $educations = EducationModel::all();
       $years = YearsModel::all();
       $grades = GradeModel::all();
       $currentlevels = CurrentLevelModel::all();
       $dutytypes = DutyTypeModel::all();
       $discplines = DiscplineModel::all();
       $currentstatus = CurrentStatusModel::all();
       $employeetypes = EmployeeType::all();
       //   dd($dutytypes);
      // dd(Session::all());
       return view('hrms/add-employee', compact("ulblist","relations", "designations", "designationsALL", "districts", "religions", "casts", "matrialstatus", "educations", "years", "grades", "currentlevels", "dutytypes", "discplines", "currentstatus", "employeetypes"));
    }
    public static function GetdesignationName($designation_id)
    {
        $DesignationsDTL = DesignationModel::where('id', $designation_id)->first();
        return $DesignationsDTL->description;

    }
    public function AddCurrentDesignation(Request $request)
    {
        $get_numbers = $request->current_designation_no;
        $district = $request->district;
        $ulbid = $request->ulbid;
        if($district == "" && $ulbid == "")
        {
            $designations = DesignationModel::where('designation_level', "1")->get();
        }
        else
        {
           if($ulbid == "")
            {
              $designations = DesignationModel::where('designation_level', "2")->get();
            }
            else
            {
               $designations = DesignationModel::where('designation_level', "3")->get();
            }
        }
        $numbers = $get_numbers+1;

        $currentstatus = CurrentStatusModel::all();
        $dutytypes = DutyTypeModel::all();
        $html = view('hrms/Add_Emp_Common/current_designation_add_more', compact("numbers", "designations", "currentstatus", "dutytypes"))->render();
        //echo $html;
        $return_array = array('html' => $html, 'return_numbers' => $numbers);
        echo json_encode($return_array);
    }

    public function RemoveCurrentDesignation(Request $request)
    {

        $get_numbers = $request->current_designation_no;
        $current_info_id = $request->id;
        $isExistingDesignation = $request->is_existing_designation;

        if($isExistingDesignation) {
            $currentinfo = EmployeesCurrentInfosModel::where('current_info_id', $current_info_id)->firstOrFail();
            $currentinfo->delete();
        }

        $numbers = $get_numbers-1;
        $return_array = array('return_numbers' => $numbers);

        return response()->json($return_array, 200);
    }

    public function rem_cur_desi(Request $request)
    {

       // $delete=DB::table('hrms_employees_current_infos')->where('current_info_id',$request->current_designation_no)->delete();
       // echo json_encode($delete);
    }
    public function AddWorkExperience(Request $request)
    {
        $get_numbers = $request->work_experience_no;
        $numbers = $get_numbers+1;
        $designations = DesignationModel::all();
        $currentstatus = CurrentStatusModel::all();
        $dutytypes = DutyTypeModel::all();
        $html = view('hrms/Add_Emp_Common/work-experience-add-more', compact("numbers", "designations", "currentstatus", "dutytypes"))->render();
        //echo $html;
        $return_array = array('html' => $html, 'return_numbers' => $numbers);
        echo json_encode($return_array);
    }
    public function RemoveWorkExperience(Request $request)
    {
        $get_numbers = $request->work_experience_no;
        $numbers = $get_numbers-1;

        $return_array = array('return_numbers' => $numbers);
        echo json_encode($return_array);
    }

    public function RemoveFamily(Request $request)
    {
        $get_numbers = $request->family_no;
        $numbers = $get_numbers-1;

        $return_array = array('return_numbers' => $numbers);
        echo json_encode($return_array);
    }
    public function AddNominee(Request $request)
    {
        $get_numbers = $request->Nominee_no;
        $numbers = $get_numbers+1;
        $relations = RelationModel::all();
        $html = view('hrms/Add_Emp_Common/nomine-add-more', compact("numbers", "relations"))->render();
        //echo $html;
        $return_array = array('html' => $html, 'return_numbers' => $numbers);
        echo json_encode($return_array);
    }

    public function AddFamily(Request $request)
    {
        $get_numbers = $request->Family_no;
        $numbers = $get_numbers+1;
        $relations = RelationModel::all();
        $html = view('hrms/Add_Emp_Common/family-add-more', compact("numbers", "relations"))->render();
        //echo $html;
        $return_array = array('html' => $html, 'return_numbers' => $numbers);
        echo json_encode($return_array);
    }
    public function RemoveNomineee(Request $request)
    {
        $get_numbers = $request->Nominee_no;
        $numbers = $get_numbers-1;

        $return_array = array('return_numbers' => $numbers);
        echo json_encode($return_array);
    }
    public function GetCurrentDesignationS(Request $request)
    {
        $district = htmlspecialchars($request->district);
        $ulbid = htmlspecialchars($request->ulbid);
        if($district == "" && $ulbid == "")
        {
            $return_array = DesignationModel::where('designation_level', "1")->get();
        }
        else
        {
           if($ulbid == "")
            {
              $return_array = DesignationModel::where('designation_level', "2")->get();
            }
            else
            {
               $return_array = DesignationModel::where('designation_level', "3")->get();
            }
        }

        echo json_encode($return_array);
    }


    public function Create(Request $request)
    {
        // dd($request->current_designation);
//         dd($this->_validate_incoming_designations($request));
// dd($request);
        if(Session::get('user_type')=='PD'){
         $dstreg='required';
         }else{
          $dstreg='nullable';
         }
        $reg=[
         'name'=> 'required|regex:/^[\pL\s\-]+$/u',
        //  'surname'=> 'required|regex:/^[\pL\s\-]+$/u',
         'dob'=>'required',
        // 'co'=>'nullable|required',
        // 'co_name'=> 'nullable|required|regex:/^[\pL\s\-]+$/u',
         'gender'=>'required',
         'employee_type'=>'required',
        //  'joining_designation'=>'required',
         'communication_address'=>'required',
         'communication_address_pin_code'=>'required|numeric|digits:6',
         'permenant_address'=>'required',
         'permenant_address_pin_code'=>'required|numeric|digits:6',
          'native_district'=>'required',
          'district'=>$dstreg,
        //  'ulbid'=>'required',
         //'mandal'=>'nullable|required|regex:/^[\pL\s\-]+$/u',
         //'state'=>'nullable|required|regex:/^[\pL\s\-]+$/u',
         'mobile_number'=>'required|numeric|digits:10',
        //  'alternative_mobile_number'=>'required|numeric|digits:10',
        'email_id'=>'required|email',
         //'religion'=>'required',
         'caste'=>'required',
          'subcaste'=>'required',
         'marital_status'=>'required',
         'if_select_single'=>'required',
        //  'nationality'=>'nullable|required|regex:/^[a-zA-Z]+$/u|max:255',
         'adhaar_card_number'=>'required|numeric|digits:12',
         'adhaar_card'=>'required|mimes:jpeg,bmp,jpg,png,pdf',
         'pan_card_number'=>'required|string|size:9',
         'pan_card'=>'required|mimes:jpeg,bmp,jpg,png,pdf',
         'degree'=>'required',
         'highest_dgre_certificates'=>'required_if:degree,2,3,4,5',

         'year_of_passing'=>'required',
         'university_college'=>'required',
         'certificates'=>'required|mimes:jpeg,bmp,jpg,png,pdf',
         'photo'=>'required|mimes:jpeg,bmp,jpg,png,pdf',
         //'discpline'=>'required',
         'date_of_joining'=>'required',
         'designation'=>'required',
         'location'=>'required',
         'doj'=>'required|mimes:jpeg,bmp,jpg,png,pdf',
         'retirement_date' => 'required',
         'current_grade'=>'required_if:current_level,1,2,3,4,5',
         'current_level'=>'required',
         'current_basic_salary'=>'required',
         'pf_number'=>'required',
         'esi_number'=>'required_if:current_basic_salary,>,21000',
         'account_holder_name'=>'required',
         'bank_name'=>'required',
         'account_number'=>'required',
         'ifsc_code'=>'required',
         'relation_name.0'=>'required',
         'relation_gender.0'=>'required',
         'relation_type.0'=>'required',
         'relation_dob.0'=>'required',
         'relation_occupation.0'=>'required',
         'family_photo'=>'required|mimes:jpeg,bmp,jpg,png,pdf',
         'discplinary_cases_suspensions' => 'required',
        //  'nominee_details'=>'required',
        //  'nominee_relation'=>'required',
        //  'nominee_gender'=>'required',
        //  'nominee_dob'=>'required',
        //  'objective_aspirations'=>'required',
        //  'contributions_awards'=>'required',
        //  'current_role_description'=>'required',
        //  'discplinary_cases_suspensions'=>'required',

         "current_designation.*"    => "required",
        //  "current_designation.*"  => "required|string|distinct|min:1",

         "current_status.*"    => "required",
        //  "current_status.*"  => "required|string|distinct|min:1",

         "current_location.*"    => "required",
        //  "current_location.*"  => "required|string|distinct|min:1",

         "duty_type.*"    => "required",
        //  "duty_type.*"  => "required|string|distinct|min:1",

        //  "start_date.*"    => "required",
        //  "start_date.*"  => "required|string|distinct|min:1",

        //  "end_date.*"    => "required",
        //  "end_date.*"  => "required|string|distinct|min:1",

        //  "disgnation.*"    => "required",
        //  "disgnation.*"  => "required|string|distinct|min:1",

        //  "work_experience_location.*"    => "required",
        //  "work_experience_location.*"  => "required|string|distinct|min:1",
        ];

         //dd($reg);
        $this->validate($request,$reg,[
            'current_designation.*.required' => 'The Current Designation Field is Required',
            "current_status.*.required"    => "The current status Field is Required",
             "current_location.*.required"    => "The current location Field is Required",
             "duty_type.*.required"    => "The duty type Field is Required",
             "start_date.*.required"    => "The start date Field is Required",
             "end_date.*.required"    => "The end date Field is Required",
             "disgnation.*.required"    => "The disgnation Field is Required",
             "work_experience_location.*.required"    => "The work experience location Field is Required",
             "highest_dgre_certificates.required_if"    => "The highest Qualification  should be uploaded Required",
            ]);

        if(session()->get('user_type') != 'AO'){
            $approve_status = 0;
        }else{
            $approve_status = 1;
        }

        $name = htmlspecialchars($request->name);
        $surname = htmlspecialchars($request->surname);
        $dob = htmlspecialchars($request->dob);
        $co = htmlspecialchars($request->co);
        $emp_id = htmlspecialchars($request->emp_id);
        $co_name = htmlspecialchars($request->co_name);
        $gender = htmlspecialchars($request->gender);
        $employee_type = htmlspecialchars($request->employee_type);
        $joining_designation = htmlspecialchars($request->joining_designation);
        $communication_address = htmlspecialchars($request->communication_address);
        $communication_address_pin_code = htmlspecialchars($request->communication_address_pin_code);
        $permenant_address_same_as_above = $request->permenant_address_same_as_above ?? 0;
        $permenant_address = htmlspecialchars($request->permenant_address);
        $permenant_address_pin_code = htmlspecialchars($request->permenant_address_pin_code);

        $district = htmlspecialchars($request->district);
        $native_district = htmlspecialchars($request->native_district);

        if($district)
        {
           $district = htmlspecialchars($request->district);
        }
        else
        {
            $district = "NULL";
        }
        $ulbid = htmlspecialchars($request->ulbid);
        if($ulbid)
        {
           $ulbid = htmlspecialchars($request->ulbid);
        }
        else
        {
            $ulbid = "NULL";
        }

        $mandal = htmlspecialchars($request->mandal);
        $state = htmlspecialchars($request->state);
        $mobile_number = htmlspecialchars($request->mobile_number);
        $alternative_mobile_number = htmlspecialchars($request->alternative_mobile_number);
        $email_id = htmlspecialchars($request->email_id);
        $religion = htmlspecialchars($request->religion);
        $caste = htmlspecialchars($request->caste);
        $subcaste = htmlspecialchars($request->subcaste);
        $marital_status = htmlspecialchars($request->marital_status);
        $if_select_single = htmlspecialchars($request->if_select_single);
        $nationality = htmlspecialchars($request->nationality);
        $adhaar_card_number = htmlspecialchars($request->adhaar_card_number);

        // adhaarcard
        $adhaar_card_file = time().'_adhaar'.'.'.$request->adhaar_card->getClientOriginalExtension();
        $request->adhaar_card->move(public_path('./assets/employee_files'), $adhaar_card_file);
        // adhaar card


        $pan_card_number = htmlspecialchars($request->pan_card_number);
        // pan card
        $pan_card_file = time().'_pan'.'.'.$request->pan_card->getClientOriginalExtension();
        $request->pan_card->move(public_path('./assets/employee_files'), $pan_card_file);
        // pan card

        $degree = htmlspecialchars($request->degree);
        $year_of_passing = htmlspecialchars($request->year_of_passing);
        $university_college = htmlspecialchars($request->university_college);


        $discpline = htmlspecialchars($request->discpline);
        $date_of_joining = htmlspecialchars($request->date_of_joining);
        $retirement_date = htmlspecialchars($request->retirement_date);

        $designation = htmlspecialchars($request->designation);
        $location = htmlspecialchars($request->location);


        $current_grade = htmlspecialchars($request->current_grade);
        $current_level = htmlspecialchars($request->current_level);



        $current_basic_salary = htmlspecialchars($request->current_basic_salary);
        $pf_number = htmlspecialchars($request->pf_number);
        $esi_number = htmlspecialchars($request->esi_number);
        $account_holder_name = htmlspecialchars($request->account_holder_name);
        $bank_name = htmlspecialchars($request->bank_name);
        $account_number = htmlspecialchars($request->account_number);
        $ifsc_code = htmlspecialchars($request->ifsc_code);


        // family details

        $relation_name = $request->relation_name;
        $relation_gender = $request->relation_gender;
        $relation_type = $request->relation_type;
        $relation_dob = $request->relation_dob;
        $relation_occupation = $request->relation_occupation;


        $nominee_details = $request->nominee_details;
        $nominee_relation = $request->nominee_relation;
        $nominee_gender = $request->nominee_gender;
        $nominee_dob = $request->nominee_dob;


        $objective_aspirations = htmlspecialchars($request->objective_aspirations);
        $emp_remarks = htmlspecialchars($request->emp_Remarks);

        $contributions_awards = htmlspecialchars($request->contributions_awards);
        $current_role_description = htmlspecialchars($request->current_role_description);
        $discplinary_cases_suspensions = htmlspecialchars($request->discplinary_cases_suspensions);

        //check dist or ulb employee sanctioned posts counts
        if($district != "" && $ulbid != "")
        {

        }
        //check dist or ulb employee sanctioned posts counts
        // insert

        date_default_timezone_set('Asia/Kolkata');
        $currentTime = date('Y-m-d h:i:s');
        $AddEmployeeModel = new AddEmployeeModel;

        $AddEmployeeModel->name = $name;


        if($request->hasFile('photo')){
         // photo
        $photoFileName = time().'_photo'.'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('./assets/employee_files'), $photoFileName);
        // photo
        }

        if($request->hasFile('district_certi')){
         // photo
        $district_certi = time().'_district_certi'.'.'.$request->district_certi->getClientOriginalExtension();
        $request->district_certi->move(public_path('./assets/employee_files'), $district_certi);
        // photo
        }
        $AddEmployeeModel->district_certi = $district_certi;
        $AddEmployeeModel->photo = $photoFileName;
        $AddEmployeeModel->surname = $surname;
        $AddEmployeeModel->dob = $dob;
        $AddEmployeeModel->co = $co;
        $AddEmployeeModel->emp_id = $emp_id;
        $AddEmployeeModel->co_name = $co_name;
        $AddEmployeeModel->gender = $gender;
        $AddEmployeeModel->employee_type = $employee_type;
        $AddEmployeeModel->joining_designation = $joining_designation;
        $AddEmployeeModel->communication_address = $communication_address;
        $AddEmployeeModel->communication_address_pin_code = $communication_address_pin_code;
        $AddEmployeeModel->permenant_address_same_as_above = $permenant_address_same_as_above;
        $AddEmployeeModel->retirement_date = $retirement_date;

        $AddEmployeeModel->permenant_address = $permenant_address;
        $AddEmployeeModel->permenant_address_pin_code = $permenant_address_pin_code;
        $AddEmployeeModel->district = $district;
        $AddEmployeeModel->ulbid = $ulbid;
        $AddEmployeeModel->mandal = $mandal;
        $AddEmployeeModel->state = $state;
        $AddEmployeeModel->native_district = $native_district;

        $AddEmployeeModel->mobile_number = $mobile_number;
        $AddEmployeeModel->alternative_mobile_number = $alternative_mobile_number;
        $AddEmployeeModel->email_id = $email_id;
        $AddEmployeeModel->religion = $religion;
        $AddEmployeeModel->caste = $caste;
        $AddEmployeeModel->subcaste = $subcaste;
        $AddEmployeeModel->marital_status = $marital_status;
        $AddEmployeeModel->if_select_single = $if_select_single;
        $AddEmployeeModel->nationality = $nationality;
        $AddEmployeeModel->adhaar_card_number = $adhaar_card_number;
        $AddEmployeeModel->adhaar_card = $adhaar_card_file;
        $AddEmployeeModel->pan_card_number = $pan_card_number;
        $AddEmployeeModel->pan_card = $pan_card_file;
        $AddEmployeeModel->degree = $degree;
        $AddEmployeeModel->year_of_passing = $year_of_passing;
        $AddEmployeeModel->university_college = $university_college;
         $AddEmployeeModel->emp_remarks = $emp_remarks;
        // certificates
        if($request->hasFile('certificates')){
            $certificates_file = time().'_certificates'.'.'.$request->certificates->getClientOriginalExtension();
            $request->certificates->move(public_path('./assets/employee_files'), $certificates_file);
            $AddEmployeeModel->certificates = $certificates_file;
        }
        // certificates
        // $highest_dgre_certificates
        if($request->hasFile('highest_dgre_certificates')){

        $highest_dgre_certificates = time().'_photo'.'.'.$request->highest_dgre_certificates->getClientOriginalExtension();
        $request->highest_dgre_certificates->move(public_path('./assets/employee_files'), $highest_dgre_certificates);
         $AddEmployeeModel->highest_degree_certificates = $highest_dgre_certificates;
        }
        // $highest_dgre_certificates
        $AddEmployeeModel->discpline = $discpline;
        $AddEmployeeModel->date_of_joining = $date_of_joining;
        $AddEmployeeModel->designation = $designation;
        $AddEmployeeModel->location = $location;
        // doj
        if($request->hasFile('doj')){
        $doj_file = time().'_doj'.'.'.$request->doj->getClientOriginalExtension();
        $request->doj->move(public_path('./assets/employee_files'), $doj_file);
        $AddEmployeeModel->doj = $doj_file;
        // doj
        }

        $AddEmployeeModel->current_grade = $current_grade;
        $AddEmployeeModel->current_level = $current_level;
        $AddEmployeeModel->current_basic_salary = $current_basic_salary;
        $AddEmployeeModel->pf_number = $pf_number;
        $AddEmployeeModel->esi_number = $esi_number;
        $AddEmployeeModel->account_holder_name = $account_holder_name;
        $AddEmployeeModel->bank_name = $bank_name;
        $AddEmployeeModel->account_number = $account_number;
        $AddEmployeeModel->ifsc_code = $ifsc_code;
        $AddEmployeeModel->relation_name = $relation_name;
        $AddEmployeeModel->relation_gender = $relation_gender;
        $AddEmployeeModel->relation_type = $relation_type;
        $AddEmployeeModel->relation_dob = $relation_dob;
        $AddEmployeeModel->relation_occupation = $relation_occupation;



        $AddEmployeeModel->objective_aspirations = $objective_aspirations;
        $AddEmployeeModel->emp_remarks = $emp_remarks;
        $AddEmployeeModel->contributions_awards = $contributions_awards;
        $AddEmployeeModel->current_role_description = $current_role_description;
        $AddEmployeeModel->discplinary_cases_suspensions = $discplinary_cases_suspensions;
        $AddEmployeeModel->approve_status = $approve_status;
        $AddEmployeeModel->status = "Enable";
        $AddEmployeeModel->created_by = "1";
        $AddEmployeeModel->save();
        $empID = $AddEmployeeModel->employee_id;

        // current info insert
        $current_designation = $request->current_designation;
        $current_status = $request->current_status;
        $current_location =  $request->current_location;
        $duty_type = $request->duty_type;


        for($i = 0; $i < count($current_designation); $i++)
        {
            $EmployeesCurrentInfos = new EmployeesCurrentInfosModel;

            $EmployeesCurrentInfos->employee_id = $empID;
            $EmployeesCurrentInfos->district = $district;
            $EmployeesCurrentInfos->ulbid = $ulbid;
            $EmployeesCurrentInfos->employee_type = $employee_type;
            $EmployeesCurrentInfos->current_designation = $current_designation[$i];
            $EmployeesCurrentInfos->current_status = $current_status[$i];
            $EmployeesCurrentInfos->current_location = $current_location[$i];
            $EmployeesCurrentInfos->duty_type = $duty_type[$i];
            $EmployeesCurrentInfos->save();
        }

         for($ik = 0; $ik < count($nominee_details); $ik++){
             if($nominee_details[$ik] != ''){
             $AddnomineeModel = new EmployeesnomineeModel;
             $AddnomineeModel->employee_id = $empID;
             $AddnomineeModel->district = $district;
             $AddnomineeModel->ulbid = $ulbid;
             $AddnomineeModel->employee_type = $employee_type;
             $AddnomineeModel->nominee_details = $nominee_details[$ik];
             $AddnomineeModel->nominee_relation = $nominee_relation[$ik];
             $AddnomineeModel->nominee_gender = $nominee_gender[$ik];
             $AddnomineeModel->nominee_dob = $nominee_dob[$ik];
             $AddnomineeModel->save();
            }
        }

        // Family Members Insert

        //family photo
        if($request->hasFile('family_photo')){
            $family_photo_file = time().'_family_photo'.'.'.$request->family_photo->getClientOriginalExtension();
            $request->family_photo->move(public_path('./assets/employee_files'), $family_photo_file);
            $AddEmployeeModel->family_photo = $family_photo_file;
        }
        // family photo
        for($sr = 0; $sr < count($relation_name);$sr++){
            $FamilyDetails = new EmployeeFamilyDetails;
            if($relation_name[$sr] != ''){
               $FamilyDetails->employee_id = $empID;;
               $FamilyDetails->relation_name = $relation_name[$sr];
               $FamilyDetails->relation_gender = $relation_gender[$sr];
               $FamilyDetails->relation_type = $relation_type[$sr];
               $FamilyDetails->relation_dob = $relation_dob[$sr];
               $FamilyDetails->relation_occupation = $relation_occupation[$sr];
              $FamilyDetails->family_photo  = $family_photo_file;
               $FamilyDetails->save();
            }
        }
        // current info insert
        // work experience insert
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $disgnation = $request->disgnation;
        $work_experience_location = $request->work_experience_location;


        for($j = 0; $j < count($start_date); $j++)
        {
            $EmployeesWorkExp = new EmployeesWorkExpModel;

            $EmployeesWorkExp->employee_id = $empID;
            $EmployeesWorkExp->start_date = $start_date[$j];
            $EmployeesWorkExp->end_date = $end_date[$j];
            $EmployeesWorkExp->disgnation = $disgnation[$j];
            $EmployeesWorkExp->work_experience_location = $work_experience_location[$j];
            $EmployeesWorkExp->save();
        }
        // work experience insert


        return back()->with('success', 'New Employee Added successfully.');
    }

    public function Create_gov(Request $request)
    {

        // dd($request);
//         dd($this->_validate_incoming_designations($request));

        $this->validate($request,[
         'name'=> 'required|regex:/^[\pL\s\-]+$/u',
         'surname'=> 'required|regex:/^[\pL\s\-]+$/u',
         'dob'=>'required',
         'employee_type'=>'required',
         'mobile_number'=>'required|numeric|digits:10',
         'current_designation' => 'required',
         //'email_id'=>'required|email',
         'adhaar_card_number'=>'required|numeric|digits:12',
         'adhaar_card'=>'required|mimes:jpeg,bmp,jpg,png,pdf',
         'pan_card_number'=>'required',
         'pan_card'=>'required|mimes:jpeg,bmp,jpg,png,pdf',
         'date_of_joining'=>'required',
         'account_holder_name'=>'required',
         'bank_name'=>'required',
         'account_number'=>'required',
         'ifsc_code'=>'required',
         "duty_type"    => "required",
         'retirement_date' => 'required',
         'communication_address' => 'required'
        ]);


        $name = htmlspecialchars($request->name);
        $surname = htmlspecialchars($request->surname);
        $dob = htmlspecialchars($request->dob);
        $employee_type = htmlspecialchars($request->employee_type);
        $joining_designation = htmlspecialchars($request->joining_designation);

        $district = htmlspecialchars($request->district);
        if($district)
        {
           $district = htmlspecialchars($request->district);
        }
        else
        {
            $district = "NULL";
        }
        $ulbid = htmlspecialchars($request->ulbid);
        if($ulbid)
        {
           $ulbid = htmlspecialchars($request->ulbid);
        }
        else
        {
            $ulbid = "NULL";
        }


        $mobile_number = htmlspecialchars($request->mobile_number);
        $email_id = htmlspecialchars($request->email_id);

        $adhaar_card_number = htmlspecialchars($request->adhaar_card_number);
        // photo
        $photoFileName = time().'_photo'.'.'.$request->photo1->getClientOriginalExtension();
        $request->photo1->move(public_path('./assets/employee_files'), $photoFileName);
        // photo
        // adhaarcard
        $adhaar_card_file = time().'_adhaar'.'.'.$request->adhaar_card->getClientOriginalExtension();
        $request->adhaar_card->move(public_path('./assets/employee_files'), $adhaar_card_file);
        // adhaar card


        $pan_card_number = htmlspecialchars($request->pan_card_number);
        // pan card
        $pan_card_file = time().'_pan'.'.'.$request->pan_card->getClientOriginalExtension();
        $request->pan_card->move(public_path('./assets/employee_files'), $pan_card_file);
        // pan card

        $date_of_joining = htmlspecialchars($request->date_of_joining);
        $retirement_date = htmlspecialchars($request->retirement_date);

        $communication_address = $request->communication_address;

        $account_holder_name = htmlspecialchars($request->account_holder_name);
        $bank_name = htmlspecialchars($request->bank_name);
        $account_number = htmlspecialchars($request->account_number);
        $ifsc_code = htmlspecialchars($request->ifsc_code);

        //check dist or ulb employee sanctioned posts counts
        if($district != "" && $ulbid != "")
        {

        }
        //check dist or ulb employee sanctioned posts counts
        // insert

        date_default_timezone_set('Asia/Kolkata');
        $currentTime = date('Y-m-d h:i:s');
        $AddEmployeeModel = new AddEmployeeModel;

        $AddEmployeeModel->name = $name;
        $AddEmployeeModel->photo = $photoFileName;
        $AddEmployeeModel->surname = $surname;
        $AddEmployeeModel->dob = $dob;

        $AddEmployeeModel->employee_type = $employee_type;
        $AddEmployeeModel->joining_designation = $joining_designation;

        $AddEmployeeModel->mobile_number = $mobile_number;
        $AddEmployeeModel->email_id = $email_id;

        $AddEmployeeModel->district = $district;
        $AddEmployeeModel->ulbid = $ulbid;

        $AddEmployeeModel->adhaar_card_number = $adhaar_card_number;
        $AddEmployeeModel->adhaar_card = $adhaar_card_file;
        $AddEmployeeModel->pan_card_number = $pan_card_number;
        $AddEmployeeModel->pan_card = $pan_card_file;

        $AddEmployeeModel->date_of_joining = $date_of_joining;
        $AddEmployeeModel->retirement_date = $retirement_date;
        $AddEmployeeModel->communication_address = $communication_address;
        $AddEmployeeModel->account_holder_name = $account_holder_name;
        $AddEmployeeModel->bank_name = $bank_name;
        $AddEmployeeModel->account_number = $account_number;
        $AddEmployeeModel->ifsc_code = $ifsc_code;

        $AddEmployeeModel->status = "Enable";
        $AddEmployeeModel->created_by = "1";
        $AddEmployeeModel->save();
        $empID = $AddEmployeeModel->employee_id;

        // current info insert
        $current_designation = $request->current_designation;
        // $current_status = $request->current_status;
        // $current_location =  $request->current_location;
        $duty_type = $request->duty_type;

        $EmployeesCurrentInfos = new EmployeesCurrentInfosModel;
        $EmployeesCurrentInfos->employee_id = $empID;
        $EmployeesCurrentInfos->district = $district;
        $EmployeesCurrentInfos->ulbid = $ulbid;
        $EmployeesCurrentInfos->current_designation = $current_designation;
        $EmployeesCurrentInfos->duty_type = $duty_type;
        $EmployeesCurrentInfos->save();

        return back()->with('success', 'New Employee Added successfully.');
    }

    public function Update_gov_Employee(Request $request)
    {

        // dd($request);
//         dd($this->_validate_incoming_designations($request));

        $this->validate($request,[
         'name'=> 'required|regex:/^[\pL\s\-]+$/u',
         'surname'=> 'required|regex:/^[\pL\s\-]+$/u',
         'dob'=>'required',
         'employee_type'=>'required',
         'mobile_number'=>'required|numeric|digits:10',
         'current_designation' => 'required',
         //'email_id'=>'required|email',
         'adhaar_card_number'=>'required|numeric|digits:12',
        //  'adhaar_card'=>'required|mimes:jpeg,bmp,jpg,png,pdf',
         'pan_card_number'=>'required',
        //  'pan_card'=>'required|mimes:jpeg,bmp,jpg,png,pdf',
         'date_of_joining'=>'required',
         'account_holder_name'=>'required',
         'bank_name'=>'required',
         'account_number'=>'required',
         'ifsc_code'=>'required',
         "duty_type"    => "required",
         'retirement_date' => 'required',
         'communication_address' => 'required'
        ]);

        $emp_id = $request->edit_emp_id;
        $name = htmlspecialchars($request->name);
        $surname = htmlspecialchars($request->surname);
        $dob = htmlspecialchars($request->dob);
        $employee_type = htmlspecialchars($request->employee_type);
        $joining_designation = htmlspecialchars($request->joining_designation);

        $district = htmlspecialchars($request->district);
        if($district)
        {
           $district = htmlspecialchars($request->district);
        }
        else
        {
            $district = "NULL";
        }
        $ulbid = htmlspecialchars($request->ulbid);
        if($ulbid)
        {
           $ulbid = htmlspecialchars($request->ulbid);
        }
        else
        {
            $ulbid = "NULL";
        }


        $mobile_number = htmlspecialchars($request->mobile_number);
        $email_id = htmlspecialchars($request->email_id);

        $adhaar_card_number = htmlspecialchars($request->adhaar_card_number);


        $pan_card_number = htmlspecialchars($request->pan_card_number);


        $date_of_joining = htmlspecialchars($request->date_of_joining);
        $retirement_date = htmlspecialchars($request->retirement_date);

        $communication_address = $request->communication_address;

        $account_holder_name = htmlspecialchars($request->account_holder_name);
        $bank_name = htmlspecialchars($request->bank_name);
        $account_number = htmlspecialchars($request->account_number);
        $ifsc_code = htmlspecialchars($request->ifsc_code);

        //check dist or ulb employee sanctioned posts counts
        if($district != "" && $ulbid != "")
        {

        }
        //check dist or ulb employee sanctioned posts counts
        // insert

        date_default_timezone_set('Asia/Kolkata');
        $currentTime = date('Y-m-d h:i:s');
        $AddEmployeeModel = new AddEmployeeModel;

        $AddEmployeeModel =  AddEmployeeModel::find($emp_id);


        // photo

        if($request->hasFile('photo'))
        {
           $photoFileName = time().'_photo'.'.'.$request->photo->getClientOriginalExtension();
           $ext = pathinfo($photoFileName, PATHINFO_EXTENSION);

           if($ext == 'jpg' || $ext == 'jpeg' || $ext = 'png' || $ext == 'pdf')
           {
               $request->photo->move(public_path('./assets/employee_files'), $photoFileName);
               $AddEmployeeModel->photo = $photoFileName;
           }

        }

        // adhar photo

        if($request->hasFile('adhaar_card'))
        {
           $adhaar_card_file = time().'_adhaar'.'.'.$request->adhaar_card->getClientOriginalExtension();
           $ext = pathinfo($adhaar_card_file, PATHINFO_EXTENSION);
           if($ext == 'jpg' || $ext == 'jpeg' || $ext = 'png' || $ext == 'pdf')
           {
               $request->adhaar_card->move(public_path('./assets/employee_files'), $adhaar_card_file);
               $AddEmployeeModel->adhaar_card = $adhaar_card_file;
           }
        }

        // pan card photo

        if($request->hasFile('pan_card'))
        {
           $pan_card_file = time().'_pan'.'.'.$request->pan_card->getClientOriginalExtension();
           $ext = pathinfo($pan_card_file, PATHINFO_EXTENSION);
           if($ext == 'jpg' || $ext == 'jpeg' || $ext = 'png' || $ext == 'pdf')
           {
               $request->pan_card->move(public_path('./assets/employee_files'), $pan_card_file);
               $AddEmployeeModel->pan_card = $pan_card_file;
           }

        }

        $AddEmployeeModel->name = $name;
        $AddEmployeeModel->surname = $surname;
        $AddEmployeeModel->dob = $dob;

        $AddEmployeeModel->employee_type = $employee_type;
        $AddEmployeeModel->joining_designation = $joining_designation;

        $AddEmployeeModel->mobile_number = $mobile_number;
        $AddEmployeeModel->email_id = $email_id;

        $AddEmployeeModel->district = $district;
        $AddEmployeeModel->ulbid = $ulbid;

        $AddEmployeeModel->adhaar_card_number = $adhaar_card_number;
        $AddEmployeeModel->pan_card_number = $pan_card_number;

        $AddEmployeeModel->date_of_joining = $date_of_joining;
        $AddEmployeeModel->retirement_date = $retirement_date;
        $AddEmployeeModel->communication_address = $communication_address;
        $AddEmployeeModel->account_holder_name = $account_holder_name;
        $AddEmployeeModel->bank_name = $bank_name;
        $AddEmployeeModel->account_number = $account_number;
        $AddEmployeeModel->ifsc_code = $ifsc_code;

        $AddEmployeeModel->status = "Enable";
        $AddEmployeeModel->created_by = "1";
        $AddEmployeeModel->save();



        // current info Update
        $current_designation = $request->current_designation;

        $duty_type = $request->duty_type;

        $data = array(
         'district' => $district,
         'ulbid' => $ulbid,
         'current_designation' => $current_designation,
         'duty_type' => $duty_type,
        );

        $EmployeesCurrentInfos = EmployeesCurrentInfosModel::where('employee_id',$emp_id)->update($data);


        return back()->with('success', ' Employee Updated successfully.');
    }
    public function ViewEmployee(Request $request)
    {
        if(session()->get('user_type') == 'AO'){
            $employees = AddEmployeeModel::with('GetEmpType', 'GetCurrentStatus')->whereIn('approve_status',[0,1])->get();
        }else{
             $employees = AddEmployeeModel::with('GetEmpType', 'GetCurrentStatus')->where('district',session()->get('distid'))->get();
        }

       //dd($employees);
       return view('hrms/employees', compact("employees"));
    }
    public function EditUpdateEmployee(Request $request)
    {

       $relations = RelationModel::all();
       $districts = DistricstsModel::all();
       $religions = ReligionModel::all();
       $casts = CastModel::all();
       $matrialstatus = MatrialStatusModel::all();
       $educations = EducationModel::all();
       $years = YearsModel::all();
       $grades = GradeModel::all();
       $currentlevels = CurrentLevelModel::all();
       $dutytypes = DutyTypeModel::all();
       $currentstatus = CurrentStatusModel::all();
       $employeetypes = EmployeeType::all();

       $employeesDTL = AddEmployeeModel::with('GetCurrentStatus', 'GetWorkExperience','EmployeesnomineeModel','EmployeeFamilyDetails')->where('employee_id',$request->emp_id)->get();


       $GetDistwiseUlbs = Ulbs::where('distid', $employeesDTL[0]->district)->get();
       $discplines = DiscplineModel::where('education_id', $employeesDTL[0]->degree)->get();

       $GetMaritalStatusInfo = MatrialStatusModel::where('id', $employeesDTL[0]->marital_status)->first();
     //dd($employeesDTL);
       //$designations = DesignationModel::where('designation_level', "1")->get();

       if(($employeesDTL[0]->district == "NULL" && $employeesDTL[0]->ulbid == "NULL") || ($employeesDTL[0]->district == "" && $employeesDTL[0]->ulbid == ""))
        {
            $designations = DesignationModel::where('designation_level', "1")->get();
        }
        else
        {
           if($employeesDTL[0]->ulbid == "NULL" || $employeesDTL[0]->ulbid == "")
            {
              $designations = DesignationModel::where('designation_level', "2")->get();
            }
            else
            {
               $designations = DesignationModel::where('designation_level', "3")->get();
            }
        }
       $designationsALL = DesignationModel::get();

    //   dd($employeesDTL);

    //   if($employeesDTL[0]->employee_type == 3){
    //       return view('hrms/gov_edit_update_employees', compact("employeesDTL", "relations", "designations", "designationsALL", "districts", "religions", "casts", "matrialstatus", "educations", "years", "grades", "currentlevels", "dutytypes", "discplines", "currentstatus", "GetDistwiseUlbs", "GetMaritalStatusInfo", "employeetypes"));
    //   }

       return view('hrms/edit_update_employees', compact("employeesDTL", "relations", "designations", "designationsALL", "districts", "religions", "casts", "matrialstatus", "educations", "years", "grades", "currentlevels", "dutytypes", "discplines", "currentstatus", "GetDistwiseUlbs", "GetMaritalStatusInfo", "employeetypes"));
    }

    public function UpdateEmployee(Request $request)
    {
         // dd($request->current_designation);
//         dd($this->_validate_incoming_designations($request));
// dd($request);
               if(Session::get('user_type')=='PD'){
                     $dstreg='required';
                     }else{
                      $dstreg='nullable';
                     }
               $reg= [
                         'name'=> 'required|regex:/^[\pL\s\-]+$/u',
                        //  'surname'=> 'required|regex:/^[\pL\s\-]+$/u',
                         'dob'=>'required',
                         //'co'=>'nullable|required',
                         //'co_name'=> 'nullable|required|regex:/^[\pL\s\-]+$/u',
                         'gender'=>'required',
                        //  'employee_type'=>'required',
                        //  'joining_designation'=>'required',
                         'communication_address'=>'required',
                         'communication_address_pin_code'=>'required|numeric|digits:6',
                         'permenant_address'=>'required',
                         'permenant_address_pin_code'=>'required|numeric|digits:6',
                          'native_district'=>'required',
                          'district'=>$dstreg,
                        //  'ulbid'=>'required',
                         //'mandal'=>'nullable|required|regex:/^[\pL\s\-]+$/u',
                         //'state'=>'nullable|required|regex:/^[\pL\s\-]+$/u',
                         'mobile_number'=>'required|numeric|digits:10',
                        //  'alternative_mobile_number'=>'required|numeric|digits:10',
                         'email_id'=>'required|email',
                         //'religion'=>'required',
                         'caste'=>'required',
                         'subcaste'=>'required',
                         'marital_status'=>'required',
                         'if_select_single'=>'required',
                        //  'nationality'=>'nullable|required|regex:/^[a-zA-Z]+$/u|max:255',
                         'adhaar_card_number'=>'required|numeric|digits:12',
                        //  'adhaar_card'=>'required|mimes:jpeg,bmp,jpg,png,pdf',
                         'pan_card_number'=>'required|string|size:9',
                        //  'pan_card'=>'required|mimes:jpeg,bmp,jpg,png,pdf',
                         'degree'=>'required',
                          //'highest_dgre_certificates'=>'required_if:degree,2,3,4,5',
                         'year_of_passing'=>'required',
                         'university_college'=>'required',
                        //  'certificates'=>'required|mimes:jpeg,bmp,jpg,png,pdf',
                         //'discpline'=>'required',
                         'date_of_joining'=>'required',
                         'designation'=>'required',
                         'location'=>'required',
                        //  'doj'=>'required|mimes:jpeg,bmp,jpg,png,pdf',
                         'current_grade'=>'required',
                         'current_level'=>'required',
                         'current_basic_salary'=>'required',
                         'pf_number'=>'required',
                         'esi_number'=>'required_if:current_basic_salary,>,21000',
                         //'account_holder_name'=>'required',
                         //'bank_name'=>'required',
                         //'account_number'=>'required',
                         //'ifsc_code'=>'required',
                         'relation_name.0'=>'required',
                         'relation_gender.0'=>'required',
                         'relation_type.0'=>'required',
                         'relation_dob.0'=>'required',
                         'relation_occupation.0'=>'required',
                        //  'family_photo'=>'required|mimes:jpeg,bmp,jpg,png,pdf',
                        //  'nominee_details'=>'required',
                        //  'nominee_relation'=>'required',
                        //  'nominee_gender'=>'required',
                        //  'nominee_dob'=>'required',
                        //  'objective_aspirations'=>'required',
                        //  'contributions_awards'=>'required',
                        //  'current_role_description'=>'required',
                        //  'discplinary_cases_suspensions'=>'required',

                         "current_designation.*"    => "required",
                        //  "current_designation.*"  => "required|string|distinct|min:1",

                         "current_status.*"    => "required",
                        //  "current_status.*"  => "required|string|distinct|min:1",

                         "current_location.*"    => "required",
                        //  "current_location.*"  => "required|string|distinct|min:1",

                         "duty_type.*"    => "required",
                        //  "duty_type.*"  => "required|string|distinct|min:1",

                        //  "start_date.*"    => "required",
                        //  "start_date.*"  => "required|string|distinct|min:1",

                        //  "end_date.*"    => "required",
                        //  "end_date.*"  => "required|string|distinct|min:1",

                        //  "disgnation.*"    => "required",
                        //  "disgnation.*"  => "required|string|distinct|min:1",

                        //  "work_experience_location.*"    => "required",
                        //  "work_experience_location.*"  => "required|string|distinct|min:1",
                        ];
        $this->validate($request,$reg,[
            'current_designation.*.required' => 'The Current Designation Field is Required',
            "current_status.*.required"    => "The current status Field is Required",
             "current_location.*.required"    => "The current location Field is Required",
             "duty_type.*.required"    => "The duty type Field is Required",
             "start_date.*.required"    => "The start date Field is Required",
             "end_date.*.required"    => "The end date Field is Required",
             "disgnation.*.required"    => "The disgnation Field is Required",
             "work_experience_location.*.required"    => "The work experience location Field is Required",
             "highest_dgre_certificates.required_if"    => "The highest Qualification  should be uploaded Required",
            ]);


            if(session()->get('user_type') == "AO"){
                $approve_status = 1;
            }else{
                $approve_status = 0;
            }

        // dd($request);
        $name = htmlspecialchars($request->name);
        $surname = htmlspecialchars($request->surname);
        $dob = htmlspecialchars($request->dob);
        $co = htmlspecialchars($request->co);
        $co_name = htmlspecialchars($request->co_name);
        $gender = htmlspecialchars($request->gender);
        $employee_type = htmlspecialchars($request->employee_type);
        $joining_designation = htmlspecialchars($request->joining_designation);
        $communication_address = htmlspecialchars($request->communication_address);
        $communication_address_pin_code = htmlspecialchars($request->communication_address_pin_code);
        $permenant_address_same_as_above = htmlspecialchars($request->permenant_address_same_as_above);
        $permenant_address = htmlspecialchars($request->permenant_address);
        $permenant_address_pin_code = htmlspecialchars($request->permenant_address_pin_code);
        $district = htmlspecialchars($request->district);
        $native_district = htmlspecialchars($request->native_district);

        if($district)
        {
           $district = htmlspecialchars($request->district);
        }
        else
        {
            $district = "NULL";
        }
        $ulbid = htmlspecialchars($request->ulbid);
        if($ulbid)
        {
           $ulbid = htmlspecialchars($request->ulbid);
        }
        else
        {
            $ulbid = "NULL";
        }
        $mandal = htmlspecialchars($request->mandal);
        $state = htmlspecialchars($request->state);
        $mobile_number = htmlspecialchars($request->mobile_number);
        $alternative_mobile_number = htmlspecialchars($request->alternative_mobile_number);
        $email_id = htmlspecialchars($request->email_id);
        $religion = htmlspecialchars($request->religion);
        $caste = htmlspecialchars($request->caste);
        $emp_remarks = htmlspecialchars($request->emp_Remarks);

        $subcaste= htmlspecialchars($request->subcaste);
        $marital_status = htmlspecialchars($request->marital_status);
        $if_select_single = htmlspecialchars($request->if_select_single);
        $nationality = htmlspecialchars($request->nationality);
        $adhaar_card_number = htmlspecialchars($request->adhaar_card_number);

        $pan_card_number = htmlspecialchars($request->pan_card_number);


        $degree = htmlspecialchars($request->degree);
        $year_of_passing = htmlspecialchars($request->year_of_passing);
        $university_college = htmlspecialchars($request->university_college);


        $discpline = htmlspecialchars($request->discpline);
        $date_of_joining = htmlspecialchars($request->date_of_joining);
        $designation = htmlspecialchars($request->designation);
        $location = htmlspecialchars($request->location);

        $current_grade = htmlspecialchars($request->current_grade);
        $current_level = htmlspecialchars($request->current_level);

        $current_basic_salary = htmlspecialchars($request->current_basic_salary);
        $pf_number = htmlspecialchars($request->pf_number);
        $esi_number = htmlspecialchars($request->esi_number);
        $account_holder_name = htmlspecialchars($request->account_holder_name);
        $bank_name = htmlspecialchars($request->bank_name);
        $account_number = htmlspecialchars($request->account_number);
        $ifsc_code = htmlspecialchars($request->ifsc_code);

        $relation_name = $request->relation_name;
        $relation_gender = $request->relation_gender;
        $relation_type = $request->relation_type;
        $relation_dob = $request->relation_dob;
        $relation_occupation = $request->relation_occupation;




        // $nominee_details = htmlspecialchars($request->nominee_details);
        // $nominee_relation = htmlspecialchars($request->nominee_relation);
        // $nominee_gender = htmlspecialchars($request->nominee_gender);
        // $nominee_dob = htmlspecialchars($request->nominee_dob);

        $objective_aspirations = htmlspecialchars($request->objective_aspirations);
        $contributions_awards = htmlspecialchars($request->contributions_awards);
        $current_role_description = htmlspecialchars($request->current_role_description);
        $discplinary_cases_suspensions = htmlspecialchars($request->discplinary_cases_suspensions);



        // update
        date_default_timezone_set('Asia/Kolkata');
        $currentTime = date('Y-m-d h:i:s');
        $AddEmployeeModel = new AddEmployeeModel;

        $AddEmployeeModel = AddEmployeeModel::find($request->edit_emp_id);

        //  echo "<pre>";print_r($AddEmployeeModel);exit();

        $AddEmployeeModel->name = $name;
        if($request->hasFile('photo'))
        {
           $photoFileName = time().'_photo'.'.'.$request->photo->getClientOriginalExtension();
           $ext = pathinfo($photoFileName, PATHINFO_EXTENSION);

           if($ext == 'jpg' || $ext == 'jpeg' || $ext = 'png' || $ext == 'pdf')
           {
               $request->photo->move(public_path('./assets/employee_files'), $photoFileName);
               $AddEmployeeModel->photo = $photoFileName;
           }

        }

        $AddEmployeeModel->surname = $surname;
        $AddEmployeeModel->dob = $dob;
        $AddEmployeeModel->co = $co;
        $AddEmployeeModel->emp_id = htmlspecialchars($request->emp_id);
        $AddEmployeeModel->co_name = $co_name;
        $AddEmployeeModel->gender = $gender;
        $AddEmployeeModel->employee_type = $employee_type;
        $AddEmployeeModel->joining_designation = $joining_designation;
        $AddEmployeeModel->communication_address = $communication_address;
        $AddEmployeeModel->communication_address_pin_code = $communication_address_pin_code;
        $AddEmployeeModel->permenant_address_same_as_above = $permenant_address_same_as_above;

        $AddEmployeeModel->permenant_address = $permenant_address;
        $AddEmployeeModel->permenant_address_pin_code = $permenant_address_pin_code;
        $AddEmployeeModel->district = $district;
        $AddEmployeeModel->ulbid = $ulbid;
        $AddEmployeeModel->mandal = $mandal;
        $AddEmployeeModel->state = $state;
        $AddEmployeeModel->native_district = $native_district;
        $AddEmployeeModel->mobile_number = $mobile_number;
        $AddEmployeeModel->alternative_mobile_number = $alternative_mobile_number;
        $AddEmployeeModel->email_id = $email_id;
        $AddEmployeeModel->religion = $religion;
        $AddEmployeeModel->caste = $caste;
         $AddEmployeeModel->subcaste = $subcaste;
        $AddEmployeeModel->marital_status = $marital_status;
        $AddEmployeeModel->if_select_single = $if_select_single;
        $AddEmployeeModel->nationality = $nationality;
         $AddEmployeeModel->emp_remarks = $emp_remarks;
        $AddEmployeeModel->adhaar_card_number = $adhaar_card_number;
        // $AddEmployeeModel->adhaar_card = $adhaar_card_file;

        if($request->hasFile('adhaar_card'))
        {
           $adhaar_card_file = time().'_adhaar'.'.'.$request->adhaar_card->getClientOriginalExtension();
           $ext = pathinfo($adhaar_card_file, PATHINFO_EXTENSION);
           if($ext == 'jpg' || $ext == 'jpeg' || $ext = 'png' || $ext == 'pdf')
           {
               $request->adhaar_card->move(public_path('./assets/employee_files'), $adhaar_card_file);
               $AddEmployeeModel->adhaar_card = $adhaar_card_file;
           }
        }
        $AddEmployeeModel->pan_card_number = $pan_card_number;
        // $AddEmployeeModel->pan_card = $pan_card_file;


        if($request->hasFile('pan_card'))
        {
           $pan_card_file = time().'_pan'.'.'.$request->pan_card->getClientOriginalExtension();
           $ext = pathinfo($pan_card_file, PATHINFO_EXTENSION);
           if($ext == 'jpg' || $ext == 'jpeg' || $ext = 'png' || $ext == 'pdf')
           {
               $request->pan_card->move(public_path('./assets/employee_files'), $pan_card_file);
               $AddEmployeeModel->pan_card = $pan_card_file;
           }

        }

        $AddEmployeeModel->degree = $degree;
        $AddEmployeeModel->year_of_passing = $year_of_passing;
        $AddEmployeeModel->university_college = $university_college;
        // $AddEmployeeModel->certificates = $certificates_file;

        if($request->hasFile('certificates'))
        {
           $certificates_file = time().'_certificates'.'.'.$request->certificates->getClientOriginalExtension();
           $ext = pathinfo($certificates_file, PATHINFO_EXTENSION);
           if($ext == 'jpg' || $ext == 'jpeg' || $ext = 'png' || $ext == 'pdf')
           {
               $request->certificates->move(public_path('./assets/employee_files'), $certificates_file);
               $AddEmployeeModel->certificates = $certificates_file;
           }
        }

           if($request->hasFile('highest_dgre_certificates'))
        {
           $highest_dgre_certificates = time().'_highest_dgre_certificates'.'.'.$request->highest_dgre_certificates->getClientOriginalExtension();
           $ext = pathinfo($highest_dgre_certificates, PATHINFO_EXTENSION);
           if($ext == 'jpg' || $ext == 'jpeg' || $ext = 'png' || $ext == 'pdf')
           {
               $request->highest_dgre_certificates->move(public_path('./assets/employee_files'), $highest_dgre_certificates);
               $AddEmployeeModel->highest_degree_certificates = $highest_dgre_certificates;
           }
        }
          if($request->hasFile('district_certi'))
        {
           $district_certi = time().'_district_certi'.'.'.$request->district_certi->getClientOriginalExtension();
           $ext = pathinfo($highest_dgre_certificates, PATHINFO_EXTENSION);
           if($ext == 'jpg' || $ext == 'jpeg' || $ext = 'png' || $ext == 'pdf')
           {
               $request->district_certi->move(public_path('./assets/employee_files'), $district_certi);
               $AddEmployeeModel->district_certi = $district_certi;
           }
        }
        $AddEmployeeModel->discpline = $discpline;
        $AddEmployeeModel->date_of_joining = $date_of_joining;
        $AddEmployeeModel->designation = $designation;
        $AddEmployeeModel->location = $location;
        // $AddEmployeeModel->doj = $doj_file;
        if($request->hasFile('doj'))
        {
           $doj_file = time().'_doj'.'.'.$request->doj->getClientOriginalExtension();
           $ext = pathinfo($doj_file, PATHINFO_EXTENSION);
           if($ext == 'jpg' || $ext == 'jpeg' || $ext = 'png' || $ext == 'pdf')
           {
               $request->doj->move(public_path('./assets/employee_files'), $doj_file);
               $AddEmployeeModel->doj = $doj_file;
           }
        }

        $AddEmployeeModel->current_grade = $current_grade;
        $AddEmployeeModel->current_level = $current_level;
        $AddEmployeeModel->current_basic_salary = $current_basic_salary;
        $AddEmployeeModel->pf_number = $pf_number;
        $AddEmployeeModel->esi_number = $esi_number;
        $AddEmployeeModel->account_holder_name = $account_holder_name;
        $AddEmployeeModel->bank_name = $bank_name;
        $AddEmployeeModel->account_number = $account_number;
        $AddEmployeeModel->ifsc_code = $ifsc_code;
        $AddEmployeeModel->relation_name = $relation_name;
        $AddEmployeeModel->relation_gender = $relation_gender;
        $AddEmployeeModel->relation_type = $relation_type;
        $AddEmployeeModel->relation_dob = $relation_dob;
        $AddEmployeeModel->relation_occupation = $relation_occupation;
        // $AddEmployeeModel->family_photo = $family_photo_file;

        if($request->hasFile('family_photo'))
        {
           $family_photo_file = time().'_family_photo'.'.'.$request->family_photo->getClientOriginalExtension();
           $ext = pathinfo($family_photo_file, PATHINFO_EXTENSION);
           if($ext == 'jpg' || $ext == 'jpeg' || $ext = 'png' || $ext == 'pdf')
           {
               $request->family_photo->move(public_path('./assets/employee_files'), $family_photo_file);
               $AddEmployeeModel->family_photo = $family_photo_file;
           }
        }

        // removing family member details

        EmployeeFamilyDetails::where('employee_id',$request->edit_emp_id)->delete();

        for($sr = 0; $sr < count($relation_name);$sr++){
            $FamilyDetails = new EmployeeFamilyDetails;
            if($relation_name[$sr] != ''){
               $FamilyDetails->employee_id = $request->edit_emp_id;
               $FamilyDetails->relation_name = $relation_name[$sr];
               $FamilyDetails->relation_gender = $relation_gender[$sr];
               $FamilyDetails->relation_type = $relation_type[$sr];
               $FamilyDetails->relation_dob = $relation_dob[$sr];
               $FamilyDetails->relation_occupation = $relation_occupation[$sr];
            //   $FamilyDetails->family_photo  = $family_photo_file;
               $FamilyDetails->save();
            }
        }

        // $AddEmployeeModel->nominee_details = $nominee_details;
        // $AddEmployeeModel->nominee_relation = $nominee_relation;
        // $AddEmployeeModel->nominee_gender = $nominee_gender;
        // $AddEmployeeModel->nominee_dob = $nominee_dob;
        $AddEmployeeModel->objective_aspirations = $objective_aspirations;
        $AddEmployeeModel->contributions_awards = $contributions_awards;
        $AddEmployeeModel->current_role_description = $current_role_description;
        $AddEmployeeModel->discplinary_cases_suspensions = $discplinary_cases_suspensions;
        $AddEmployeeModel->approve_status = $approve_status;
        $AddEmployeeModel->status = "Enable";
        $AddEmployeeModel->created_by = "1";
        $AddEmployeeModel->save();

        // current info update
        $current_info_ids = $request->current_info_id;

        $current_designation = $request->current_designation;
        $current_status = $request->current_status;
        $current_location =  $request->current_location;
        $duty_type = $request->duty_type;


        // $EmployeesCurrentInfos = new EmployeesCurrentInfosModel;

        // check Head Office, District, ULB count exists or not
        if($district == 'NULL' AND $ulbid == 'NULL')
        {
            $ExitsSanctionedPosts = EmployeesCurrentInfosModel::where('employee_id', "$request->edit_emp_id")->get();
            $sanctionPostCounts = 1; // head office
        }
        else
        {
            if($ulbid == 'NULL')
            {
                $ExitsSanctionedPosts = EmployeesCurrentInfosModel::where('employee_id', "$request->edit_emp_id")->where('district', "$district")->get();
                $sanctionPostCounts = 2; // district
            }
            else
            {
                $ExitsSanctionedPosts = EmployeesCurrentInfosModel::where('employee_id', "$request->edit_emp_id")->where('ulbid', "$ulbid")->get();
                $sanctionPostCounts = 3; // ulb
            }
        }

        $current_designation = $request->current_designation;

        $exitsDesignations = array();
        foreach($ExitsSanctionedPosts as $k => $val)
        {
            array_push($exitsDesignations, "$val->current_designation");
        }

        //insert
        $InsertDesignations = array_diff($current_designation, $exitsDesignations);

        $empty = array();
        for($t = count($exitsDesignations); $t < count($current_designation); $t++)
        {
        	array_push($empty, $current_designation[$t]);
        }
        if(count($empty) > 0)
        {
            $InsertDesignations = array_merge($InsertDesignations, $empty);
            $InsertDesignations = array_unique( $InsertDesignations);
        }
        //insert
        // delete
        $DeleteDesignations = array_diff($exitsDesignations, $current_designation);
        if(count($empty) > 0)
        {
            $DeleteDesignations = array_merge($DeleteDesignations, $empty);
            $DeleteDesignations = array_unique( $DeleteDesignations);
        }
        // delete
        // update
        $specialupdateDesignations = array_intersect($exitsDesignations, $current_designation);
        // update
        //dd($InsertDesignations);
        //dd($DeleteDesignations);
        //dd($specialupdateDesignations);

        //update
        if(count($specialupdateDesignations) > 0)
        {
            foreach($current_designation as $currentDesignation)
            {
                for($count = 0; $count < count($specialupdateDesignations); $count++)
                {
                    if(in_array($currentDesignation, $specialupdateDesignations))
                    {
                        $EmployeesCurrentInfosModel = EmployeesCurrentInfosModel::find($request->current_info_id[$count]);
                        $EmployeesCurrentInfosModel->district = $district;
                        $EmployeesCurrentInfosModel->ulbid = $ulbid;

                        $EmployeesCurrentInfosModel->current_designation = $current_designation[$count];
                        $EmployeesCurrentInfosModel->current_status = $current_status[$count];
                        $EmployeesCurrentInfosModel->current_location = $current_location[$count];
                        $EmployeesCurrentInfosModel->duty_type = $duty_type[$count];
                        $EmployeesCurrentInfosModel->save();
                    }
                }
            }
        }
        //update

        //insert
        if(count($InsertDesignations) > 0)
        {
            foreach($InsertDesignations as $roww)
            {
                foreach($current_designation as $keyyy => $currentDesignation)
                {
                    if($currentDesignation == $roww)
                    {
                        $sanctionedPosts1 = SanctionedPosts::where('level_id', "$sanctionPostCounts")->where('designation_id', "$currentDesignation")->first();
                        //echo '<pre>';print_r($sanctionedPosts);
                        $post_sanctioned1 = $sanctionedPosts1->post_sanctioned;
                        $occupied_posts1 = $sanctionedPosts1->occupied_posts;
                        if($post_sanctioned1 > $occupied_posts1)
                        {
                            $this->sanctionUpdate($current_designation[$keyyy], $district, $ulbid);
                            $EmployeesCurrentInfos = new EmployeesCurrentInfosModel;

                            $EmployeesCurrentInfos->employee_id = $request->edit_emp_id;
                            $EmployeesCurrentInfos->district = $district;
                            $EmployeesCurrentInfos->ulbid = $ulbid;
                            $EmployeesCurrentInfos->current_designation = $current_designation[$keyyy];
                            $EmployeesCurrentInfos->current_status = $current_status[$keyyy];
                            $EmployeesCurrentInfos->current_location = $current_location[$keyyy];
                            $EmployeesCurrentInfos->duty_type = $duty_type[$keyyy];
                            $EmployeesCurrentInfos->save();
                        }
                    }
                }
            }
        }
        //insert
        //delete

        if(count($DeleteDesignations) > 0)
        {
            foreach($DeleteDesignations as $rowww)
            {
                $this->sanctionUpdateminus($rowww, $district, $ulbid);
            }
        }
        //delete

        //exit;
        //print_r($sanctionPostCounts);
        // foreach($current_designation as $currentDesignation)
        // {
        //     $sanctionedPosts = SanctionedPosts::where('level_id', "$sanctionPostCounts")->where('designation_id', "$currentDesignation")->first();
        //     //echo '<pre>';print_r($sanctionedPosts);
        //     $post_sanctioned = $sanctionedPosts->post_sanctioned;
        //     $occupied_posts = $sanctionedPosts->occupied_posts;

        //     if($post_sanctioned > $occupied_posts)
        //     {
        //         $getLastAll = EmployeesCurrentInfosModel::where('employee_id', $request->edit_emp_id)->get();
        //         if(count($getLastAll) == count($current_designation))
        //         {
        //             for($count = 0; $count < count($getLastAll); $count++)
        //             {
        //                 if($current_designation[$count] == $currentDesignation)
        //                 {
        //                     $EmployeesCurrentInfosModel = EmployeesCurrentInfosModel::find($request->current_info_id[$count]);
        //                     $EmployeesCurrentInfosModel->district = $district;
        //                     $EmployeesCurrentInfosModel->ulbid = $ulbid;

        //                     $EmployeesCurrentInfosModel->current_designation = $current_designation[$count];
        //                     $EmployeesCurrentInfosModel->current_status = $current_status[$count];
        //                     $EmployeesCurrentInfosModel->current_location = $current_location[$count];
        //                     $EmployeesCurrentInfosModel->duty_type = $duty_type[$count];
        //                     $EmployeesCurrentInfosModel->save();
        //                 }
        //             }
        //         }
        //         else
        //         {
        //             for($count1 = count($getLastAll); $count1 < count($current_designation); $count1++)
        //             {
        //                 $sanctionedPosts1 = SanctionedPosts::where('level_id', "$sanctionPostCounts")->where('designation_id', "$currentDesignation")->first();
        //                 //echo '<pre>';print_r($sanctionedPosts);
        //                 $post_sanctioned1 = $sanctionedPosts1->post_sanctioned;
        //                 $occupied_posts1 = $sanctionedPosts1->occupied_posts;
        //                 if($post_sanctioned1 > $occupied_posts1)
        //                 {
        //                     $this->sanctionUpdate($current_designation[$count1], $district, $ulbid);
        //                     $EmployeesCurrentInfos = new EmployeesCurrentInfosModel;

        //                     $EmployeesCurrentInfos->employee_id = $request->edit_emp_id;
        //                     $EmployeesCurrentInfos->district = $district;
        //                     $EmployeesCurrentInfos->ulbid = $ulbid;
        //                     $EmployeesCurrentInfos->current_designation = $current_designation[$count1];
        //                     $EmployeesCurrentInfos->current_status = $current_status[$count1];
        //                     $EmployeesCurrentInfos->current_location = $current_location[$count1];
        //                     $EmployeesCurrentInfos->duty_type = $duty_type[$count1];
        //                     $EmployeesCurrentInfos->save();
        //                 }
        //             }
        //         }
        //     }
        //     else
        //     {
        //         // return back()->with('error', 'Eroor'); //error
        //         // return Redirect::back();
        //     }
        // }
         //exit;
        // check Head Office, District, ULB count exists or not



        // current info update and insert
        // work experience update
        $work_experience_ids = $request->work_experience_id;
        $start_date = $request->start_date;

        $end_date = $request->end_date;
        $disgnation = $request->disgnation;
        $work_experience_location = $request->work_experience_location;

        $getLastAllExp = EmployeesWorkExpModel::where('employee_id', $request->edit_emp_id)->get();

        if(count($getLastAllExp) == count($start_date))
        {
            for($j = 0; $j < count($getLastAllExp); $j++)
            {
                //dd($work_experience_ids[$j]);
                $EmployeesWorkExpModel = new EmployeesWorkExpModel;
                $EmployeesWorkExpModel = EmployeesWorkExpModel::find($work_experience_ids[$j]);
                $EmployeesWorkExpModel->start_date = $start_date[$j];
                $EmployeesWorkExpModel->end_date = $end_date[$j];
                $EmployeesWorkExpModel->disgnation = $disgnation[$j];
                $EmployeesWorkExpModel->work_experience_location = $work_experience_location[$j];
                $EmployeesWorkExpModel->save();
            }
        }
        else
        {
            for($count11 = count($getLastAllExp); $count11 < count($start_date); $count11++)
            {
                $EmployeesWorkExp = new EmployeesWorkExpModel;

                $EmployeesWorkExp->employee_id = $request->edit_emp_id;
                $EmployeesWorkExp->start_date = $start_date[$count11];
                $EmployeesWorkExp->end_date = $end_date[$count11];
                $EmployeesWorkExp->disgnation = $disgnation[$count11];
                $EmployeesWorkExp->work_experience_location = $work_experience_location[$count11];
                $EmployeesWorkExp->save();
            }
        }


        $nominee_id = $request->nominee_id;
        $nominee_details = $request->nominee_details;

        $nominee_relation = $request->nominee_relation;
        $nominee_gender = $request->nominee_gender;
        $nominee_dob = $request->nominee_dob;

        $getLastAllNMNI = EmployeesnomineeModel::where('employee_id', $request->edit_emp_id)->get();
//DD(count($nominee_details));
        if(count($getLastAllNMNI) == count($nominee_details))
        {
            for($jI = 0; $jI < count($getLastAllNMNI); $jI++)
            {
                 //dd($nominee_gender[$jI]);
                $Employeesnominee = new EmployeesnomineeModel;
                $Employeesnominee = EmployeesnomineeModel::find($nominee_id[$jI]);
                $Employeesnominee->nominee_details = $nominee_details[$jI]?$nominee_details[$jI]:'';
                $Employeesnominee->nominee_relation = $nominee_relation[$jI]?$nominee_relation[$jI]:'';
                $Employeesnominee->nominee_gender = $nominee_gender[$jI]?$nominee_gender[$jI]:'';
                $Employeesnominee->nominee_dob = $nominee_dob[$jI]?$nominee_dob[$jI]:'';
                $Employeesnominee->save();
            }
        }
        else
        {
            for($count111 = count($getLastAllNMNI); $count111 < count($nominee_details); $count111++)
            {
                $Employeesnominee = new EmployeesnomineeModel;
                // dd($nominee_relation[$count111]);
                $Employeesnominee->employee_id = $request->edit_emp_id;
                $Employeesnominee->ulbid = $ulbid;
                $Employeesnominee->district = $district;
                $Employeesnominee->employee_type = $employee_type;
                $Employeesnominee->nominee_details = $nominee_details[$count111]?$nominee_details[$count111]:'';
                $Employeesnominee->nominee_relation = $nominee_relation[$count111]?$nominee_relation[$count111]:'';
                $Employeesnominee->nominee_gender = $nominee_gender[$count111]?$nominee_gender[$count111]:'';
                $Employeesnominee->nominee_dob = $nominee_dob[$count111]?$nominee_dob[$count111]:'';
                $Employeesnominee->save();
            }
        }

        // work experience update

        return back()->with('success', 'Employee Details Updated successfully.');
    }

    public function sanctionUpdate($designation_id, $district_id, $ulb_id)
    {

        if(($district_id == "" && $ulb_id == "") || ($district_id == 'NULL' && $ulb_id == 'NULL'))
        {
            $sanctionedId = 1;
            $DTL = SanctionedPosts::where('level_id', "1")->where('designation_id', $designation_id)->first();
        }
        else
        {
           if($ulb_id == "" || $ulb_id == 'NULL')
            {
              $sanctionedId = 2;
              $DTL = SanctionedPosts::where('level_id', "2")->where('designation_id', $designation_id)->first();
            }
            else
            {
               $sanctionedId = 3;
               $DTL = SanctionedPosts::where('level_id', "3")->where('designation_id', $designation_id)->first();
            }
        }


        $last = $DTL->occupied_posts;
        if(($last == NULL) || ($last <= 0))
        {
            $lastNumber = 0;
        }
        else
        {
            $lastNumber = $last;
        }
        $final = $lastNumber+1;


        $SanctionedPosts = SanctionedPosts::where('designation_id', $designation_id)->where('level_id', $sanctionedId)->first();

        $SanctionedPosts->occupied_posts = $final;
        $SanctionedPosts->save();
        //exit;
    }


    public function sanctionUpdateminus($designation_id, $district_id, $ulb_id)
    {


        // HEAD DEPARMENT
        if(($district_id == "" && $ulb_id == "") || ($district_id == 'NULL' && $ulb_id == 'NULL'))
        {
            $sanctionedId = 1;
            $DTL = SanctionedPosts::where('level_id', "1")->where('designation_id', $designation_id)->first();
        }
        else
        {

            // ULB
//
          if($ulb_id == "" || $ulb_id == 'NULL')
            {
              $sanctionedId = 2;
              $DTL = SanctionedPosts::where('level_id', "2")->where('designation_id', $designation_id)->first();
            }

            // DISTRICT
            else
            {
              $sanctionedId = 3;
              $DTL = SanctionedPosts::where('level_id', "3")->where('designation_id', $designation_id)->first();
            }
        }


        $last = $DTL->occupied_posts;
        if(($last == NULL) || ($last <= 0))
        {
            $lastNumber = 0;
        }
        else
        {
            $lastNumber = $last;
        }
        $final = $lastNumber-1;


        $SanctionedPosts = SanctionedPosts::where('designation_id', $designation_id)->where('level_id', $sanctionedId)->first();

        if(!$SanctionedPosts){
            $error = \Illuminate\Validation\ValidationException::withMessages([
                  'designation' => ['Sanctioned post not available in selected designation!'],
                ]);
            throw $error;

        }



        $SanctionedPosts->occupied_posts = $final;
        $SanctionedPosts->save();
    }

    public function DeleteEmployee(Request $request){

        $id=$request->id;
        $employee=AddEmployeeModel::find($id);
        $info = EmployeesCurrentInfosModel::where('employee_id',$id)->delete();
        $employee->delete();
        return back()->with('success', ' Employee Deleted successfully.');

    }

    public function GetUlbs(Request $request)
    {
        $ulbs = new Ulbs;
        $GetDistwiseUlbs = Ulbs::where('distid', $request->district)->get();
        echo json_encode($GetDistwiseUlbs);
    }
    public function GetMaritalStatus(Request $request)
    {
        $GetMatrialStatus = MatrialStatusModel::where('id', $request->matrialstatusid)->first();

        echo json_encode($GetMatrialStatus);
    }
    public function GetDisciplineLists(Request $request)
    {
        $GetDisciplines = DiscplineModel::where('education_id', $request->nameofthedegree)->get();
        echo json_encode($GetDisciplines);
    }

    protected function _get_sanctioned_post($designation,  $district = null, $ulb = null,$employee_type) {



        $sactionedpost = SanctionedPosts::where('designation_id', $designation)->where('employee_type',$employee_type)
                            ->when($district, function($q) use ($district) {
                                return $q->where('district_id', 'like', $district);
                            })

                            ->when(!$district, function($q) {
                                return $q->whereNull('district_id');
                            })

                            ->when($ulb, function($q) use ($ulb) {
                                return $q->where('ulb_id', 'like', $ulb);
                            })

                            ->when(!$ulb, function($q)  {
                                return $q->whereNull('ulb_id');
                            })
                            ->first();


        return $sactionedpost;
    }

    protected function _get_occupied_post($designation,  $district = null, $ulb = null,$employee_type) {

        $occupiedpost = EmployeesCurrentInfosModel::where('current_designation', $designation)->where('employee_type',$employee_type)
                            ->when($district, function($q) use ($district) {
                                return $q->where('district', 'like', $district);
                            })

                            ->when(!$district, function($q) {
                                return $q->where('district', 'like', 'NULL');
                            })

                            ->when($ulb, function($q) use ($ulb) {
                                return $q->where('ulbid', 'like', $ulb);
                            })

                            ->when(!$ulb, function($q)  {
                                return $q->where('ulbid', 'like', 'NULL');
                            })
                            ->get();

        return $occupiedpost;
    }

    protected function _compare_occupied_to_sactioned_post($designation, $district = null, $ulb = null,$employee_type) {

        return
            ($this->_get_sanctioned_post($designation, $district, $ulb,$employee_type)->post_sanctioned
                    > count($this->_get_occupied_post($designation, $district, $ulb,$employee_type)));
    }

    protected function _update_occupied_posts($designation, $operator, $district = null, $ulb = null){
        $sactionedpost = SanctionedPosts::where('designation_id', $designation)
                            ->when($district, function($q) use ($district) {
                                return $q->where('district_id', 'like', $district);
                            })

                            ->when(!$district, function($q) {
                                return $q->whereNull('district_id');
                            })

                            ->when($ulb, function($q) use ($ulb) {
                                return $q->where('ulb_id', 'like', $ulb);
                            })

                            ->when(!$ulb, function($q)  {
                                return $q->whereNull('ulb_id');
                            })
                            ->first();
        switch($operator) {
            case "+":
                $sactionedpost->occupied_posts = $sactionedpost->occupied_posts++;
            case "-":
               $sactionedpost->occupied_posts = $sactionedpost->occupied_posts--;

            default:
                //handle unrecognized operators
        }
        return $sactionedpost->save();
    }

    protected function _prepare_designation_array($request, $employee) {

        $current_designation = $request->current_designation;
        $current_status = $request->current_status;
        $current_location =  $request->current_location;
        $duty_type = $request->duty_type;


        $designationarray = [];

        for($i = 0; $i < count($current_designation); $i++)
        {
            $tmp = [
                'designation' => $current_designation[$i],
                'current_status' => $current_status[$i],
                'current_location' => $current_location[$i],
                'duty_type' => $duty_type[$i],
                'employee_id' => $employee->id,
                'district' => $request->district ?? null,
                'ulbid' => $request->ulbid ?? null
                ];

                array_push($designationarray, $tmp);
        }

        return $designationarray;
    }

    protected function _add_posts($currentDesignationInfos) {

        foreach($currentDesignationInfos as $info) {
            $EmployeesCurrentInfos = new EmployeesCurrentInfosModel;

            $EmployeesCurrentInfos->employee_id = $info['employee_id'];
            $EmployeesCurrentInfos->district = $info['district'];
            $EmployeesCurrentInfos->ulbid = $info['ulbid'];
            $EmployeesCurrentInfos->current_designation = $info['designation'];
            $EmployeesCurrentInfos->current_status = $info['current_status'];
            $EmployeesCurrentInfos->current_location = $info['current_location'];
            $EmployeesCurrentInfos->duty_type = $info['duty_type'];
            $EmployeesCurrentInfos->save();

            $this->_update_occupied_posts($info['designation'], "+", $info['district'], $info['ulbid']);
        }

    }

    protected function _remove_all_current_designations_of($employee) {
        $employee = AddEmployeeModel::where('employee_id', $employee)->first();
        $currentdesignations = $emplyee->GetCurrentStatus;
        foreach($currentdesignations as $des) {
            $this->_update_occupied_posts($des['current_designation'], "-", $des['district'], $des['ulbid']);
        }

        return $emplyee->GetCurrentStatus()->delete();
    }

    protected function _validate_incoming_designations($designations, $district =null, $ulbid =null,$employee_type) {

        for($i = 0; $i < count($designations); $i++)
        {
            if(!$this->_compare_occupied_to_sactioned_post($designations[$i], $district, $ulbid,$employee_type)) {
                $error = \Illuminate\Validation\ValidationException::withMessages([
                  'designation' => ['Sanctioned post not available in selected designation!'],
                ]);
                throw $error;
                break;
            }
        }

        return true;

    }

    public function ValidateDesignationAvaibility(Request $request) {
       return $this->_validate_incoming_designations((array) $request->designation, $request->district, $request->ulbid,$request->employee_type);
    }

    public function ValidateDesignationAvaibility2(Request $request) {
       $desi = $request->designation;
       $allot = EmployeesCurrentInfosModel::where('current_designation',$desi)->count();
       $tot = SanctionedPosts::where('designation_id',$desi)->sum('post_sanctioned');


       if($tot <= $allot){
           $error = \Illuminate\Validation\ValidationException::withMessages([
                 'designation' => ['Sanctioned post not available in selected designation!'],
            ]);
            throw $error;
       }
       return true;

    }
    public function reject_employee(Request $request){
        $emp = $request->emp;
        $remarks = $request->remarks;

        $AddEmployeeModel = new AddEmployeeModel;
        $AddEmployeeModel =  AddEmployeeModel::find($emp);
        $AddEmployeeModel->approve_status = 2;
        $AddEmployeeModel->remarks = $remarks;
        $result = $AddEmployeeModel->save();

        if($result){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function curruntremovefamily(Request $request){
        $mem = $request->mem_id;
        $members = EmployeeFamilyDetails::find($mem)->delete();
        if($members){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function removecurruntnominee(Request $request){
        $nom = $request->nom_id;
        $nomine = EmployeesnomineeModel::find($nom)->delete();
        if($nomine){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function removeExistsWorkExperience(Request $request){
        $exp = $request->exp_id;
        $expe = EmployeesWorkExpModel::find($exp)->delete();
        if($expe){
            echo 1;
        }else{
            echo 0;
        }
    }

}







