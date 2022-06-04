<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentStatusModel extends Model
{
    protected $table ='hrms_status_mst';
    
     protected $fillable = [
        'status_name'
    ];
    
}
