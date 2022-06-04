<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DutyTypeModel extends Model
{
    protected $table ='hrms_duty_type_mst';
    
     protected $fillable = [
        'duty_type_name'
    ];
}
