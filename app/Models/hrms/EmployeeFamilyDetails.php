<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DistrictModel;
use App\Models\hrms\DesignationModel;
use App\Models\hrms\EmployeeType;

class EmployeeFamilyDetails extends Model
{
    protected $table ='hrms_employees_family_details';
    protected $primaryKey = 'member_id';
    
     protected $guarded = [];
   

    
}
