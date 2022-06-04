<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReligionModel extends Model
{
    protected $table ='hrms_religion_mst';
    
     protected $fillable = [
        'religion'
    ];
}
