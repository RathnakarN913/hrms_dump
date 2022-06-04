<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentLevelModel extends Model
{
    protected $table ='hrms_grade_level';
    
     protected $fillable = [
        'Description'
    ];
}
