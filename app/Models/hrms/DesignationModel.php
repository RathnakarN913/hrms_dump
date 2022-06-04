<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DesignationgroupModel;

class DesignationModel extends Model
{
    protected $table ='hrms_designations';
    
     protected $fillable = [
        'description',
        'sort_order',
        'designation_level'
    ];
    
    public function DesignationgroupModel()
    {
        return $this->hasMany(DesignationgroupModel::class,'group_id','group_id');
    }
}
