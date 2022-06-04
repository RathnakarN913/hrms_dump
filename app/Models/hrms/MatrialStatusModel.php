<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatrialStatusModel extends Model
{
    protected $table ='hrms_matrial_status_mst';
    
     protected $fillable = [
        'matrial_status',
        'status_name'
    ];
}
