<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hrms_Sanctioned_PostsModel;
use App\Models\hrms\DesignationgroupModel;

class Hrms_DesignationsModel extends Model
{
    use HasFactory;
    protected $table = 'hrms_designations';
    protected $fillable = [
        'description',
        'sort_order',
        'designation_level',
        
    ];
    
    public function Hrms_Sanctioned_PostsModel(){
        return $this->hasMany(Hrms_Sanctioned_PostsModel::class, 'designation_id', 'id');
    }
    
    public function DesignationgroupModel()
    {
        return $this->hasMany(DesignationgroupModel::class,'group_id','group_id');
    }
}
