<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\hrms\AddEmployeeModel;

class EmployeeType extends Model
{
    protected $table ='hrms_employee_type_mst';
    protected $primaryKey = 'employee_type_id';
    
     protected $fillable = [
        'employee_type_desc'
    ];
    
    public function employee() {
        return $this->hasMany(AddEmployeeModel::class, 'employee_type');
    }
    
    // public function GetEmployeeType(){
    //     return $this->hasMany(AddEmployeeModel::class,'employee_type');
    // }
}
