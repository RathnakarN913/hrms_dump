<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeesWorkExpModel extends Model
{
    protected $table ='hrms_employees_work_experiences';
    protected $primaryKey = 'work_experience_id';
    
      protected $fillable = [
        'employee_id',
        'start_date',
        'end_date',
        'disgnation',
        'work_experience_location',
        'created_at',
        'updated_at'
        
    ];
    
    public function GetEmployee()
    {
         return $this->belongsTo('App\Models\hrms\AddEmployeeModel', 'employee_id');
    }
}
