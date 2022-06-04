<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearsModel extends Model
{
    protected $table ='hrms_year_mst';
    
     protected $fillable = [
        'year'
    ];
}
