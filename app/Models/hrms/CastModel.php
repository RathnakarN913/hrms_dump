<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CastModel extends Model
{
    protected $table ='hrms_cast_mst';
    
     protected $fillable = [
        'cast'
    ];
}
