<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\hrms\Hrms_DesignationsModel;

class EmployeesCurrentInfosModel extends Model
{
    protected $table ='hrms_employees_current_infos';
    protected $primaryKey = 'current_info_id';
    
     protected $fillable = [
        'employee_id',
        'district',
        'ulbid',
        'current_designation',
        'current_status',
        'current_location',
        'duty_type'
        
    ];
    
    public function GetEmployee()
    {
         return $this->belongsTo('App\Models\hrms\AddEmployeeModel', 'employee_id');
    }
    
    public function GetDesignation()
    {
         return $this->belongsTo('App\Models\Hrms_DesignationsModel', 'current_designation');
    }
    
     public function DistricstsModel()
    {
         return $this->belongsTo('App\Models\hrms\DistricstsModel', 'district','distid');
    }
    
    public function UlbmstModel()
    {
         return $this->belongsTo('App\Models\UlbmstModel', 'ulbid','ulbid');
    }
    
    public function employeeType() {
        return $this->belongsTo(EmployeeType::class, 'employee_type');
    }
    
    
    
}
