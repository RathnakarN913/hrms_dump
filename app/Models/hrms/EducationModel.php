<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationModel extends Model
{
    protected $table ='hrms_education_mst';
    
     protected $fillable = [
        'education_name'
    ];
}
