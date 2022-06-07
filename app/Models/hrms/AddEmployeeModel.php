<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DistrictModel;
use App\Models\hrms\DesignationModel;
use App\Models\hrms\EmployeeType;

class AddEmployeeModel extends Model
{
    protected $table ='hrms_employees';
    protected $primaryKey = 'employee_id';

    //  protected $fillable = [
    //     // 'employee_id',
    //     'name',
    //     'photo',
    //     'surname',
    //     'dob',
    //     'co',
    //     'co_name',
    //     'gender',
    //     'employee_type',
    //     'joining_designation',
    //     'communication_address',
    //     'communication_address_pin_code',
    //     'permenant_address_same_as_above',
    //     'permenant_address',
    //     'permenant_address_pin_code',
    //     'district',
    //     'ulbid',
    //     'mandal',
    //     'state',
    //     'mobile_number',
    //     'alternative_mobile_number',
    //     'email_id',
    //     'religion',
    //     'caste',
    //     'marital_status',
    //     'if_select_single',
    //     'nationality',
    //     'adhaar_card_number',
    //     'adhaar_card',
    //     'pan_card_number',
    //     'pan_card',
    //     'degree',
    //     'year_of_passing',
    //     'university_college',
    //     'certificates',
    //     'discpline',
    //     'date_of_joining',
    //     'location',
    //     'doj',
    //     'current_grade',
    //     'current_level',
    //     'current_basic_salary',
    //     'pf_number',
    //     'esi_number',
    //     'account_holder_name',
    //     'bank_name',
    //     'account_number',
    //     'ifsc_code',
    //     'relation_name',
    //     'relation_gender',
    //     'relation_type',
    //     'relation_dob',
    //     'relation_occupation',
    //     'family_photo',
    //     'nominee_details',
    //     'nominee_relation',
    //     'nominee_gender',
    //     'nominee_dob',
    //     'objective_aspirations',
    //     'contributions_awards',
    //     'current_role_description',
    //     'discplinary_cases_suspensions',
    //     'created_by',
    //     'status',
    // ];
    protected $guarded = [];
    public function GetCurrentStatus()
    {
        return $this->hasMany('App\Models\hrms\EmployeesCurrentInfosModel', 'employee_id', 'employee_id');
    }
    public function GetWorkExperience()
    {
        return $this->hasMany('App\Models\hrms\EmployeesWorkExpModel', 'employee_id', 'employee_id');
    }
    public function EmployeesnomineeModel()
    {
        return $this->hasMany('App\Models\hrms\EmployeesnomineeModel', 'employee_id', 'employee_id');
    }
    public function EducationDetails()
    {
        return $this->hasMany('App\Models\hrms\EmployeeEducationDetailsModel', 'employee_id', 'employee_id');
    }
    public function EmployeeFamilyDetails()
    {
        return $this->hasMany('App\Models\hrms\EmployeeFamilyDetails', 'employee_id', 'employee_id');
    }
    public function DistrictModel(){
        return $this->hasMany(DistrictModel::class, 'distid', 'district');
    }

    public function DesignationModel(){
        return $this->hasMany(DesignationModel::class, 'id', 'designation');
    }
    public function AddAttendanceModel(){
        return $this->hasMany(AddAttendanceModel::class,'employee_id','employee_id');
    }

    public function GetEmpType()
    {
         return $this->belongsTo('App\Models\hrms\EmployeeType', 'employee_type');
    }

    public function type() {
        return $this->belongsTo(EmployeeType::class, 'employee_type');
    }

    public function scopeBycategory($query, $catid){
        return $query->where('employee_type', $catid);
    }


}
