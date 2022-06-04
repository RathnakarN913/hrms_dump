<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeModel extends Model
{
    protected $table ='hrms_grade_mst';
    
     protected $fillable = [
        'grade'
    ];
}
