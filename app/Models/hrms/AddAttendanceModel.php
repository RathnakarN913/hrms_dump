<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddAttendanceModel extends Model
{
    use HasFactory;
    protected $table ='hrms_attendance';
    
    public function DesignationModel(){
        return $this->hasMany(DesignationModel::class,'id','designation_id');
    }
    
     public function AddEmployeeModel(){
        return $this->hasMany(AddEmployeeModel::class,'employee_id','employee_id');
    }
     public function GetCurrentStatus()
    {
        return $this->hasMany('App\Models\hrms\EmployeesCurrentInfosModel', 'employee_id', 'employee_id');
    }
}
