<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelationModel extends Model
{
    protected $table ='hrms_relation_mst';
    
     protected $fillable = [
        'relation'
    ];
}
