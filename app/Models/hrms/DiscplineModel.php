<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscplineModel extends Model
{
    protected $table ='discpline_mst';
    
     protected $fillable = [
        'discpline',
        'education_id'
    ];
}
