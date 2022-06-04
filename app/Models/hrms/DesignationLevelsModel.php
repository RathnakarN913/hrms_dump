<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignationLevelsModel extends Model
{
    protected $table ='hrms_designation_levels';
    
     protected $fillable = [
        'Description'
    ];
}
