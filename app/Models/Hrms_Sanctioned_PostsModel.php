<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hrms_DesignationsModel;
use App\Models\hrms\DistricstsModel;
use App\Models\hrms\EmployeeType;

class Hrms_Sanctioned_PostsModel extends Model
{
    use HasFactory;
    protected $table = 'hrms_sanctioned_posts';
     protected $fillable = [
        'level_id',
        'district_id',
        'ulb_id',
        'designation_id',
        'employee_type',
        'post_sanctioned',
        'login_id',
    ];
    
    public function Hrms_DesignationsModel(){
        return $this->hasMany(Hrms_DesignationsModel::class, 'foreign_key', 'owner_key');
    }
    public function DistricstsModel(){
        return $this->hasMany(DistricstsModel::class, 'distid', 'district_id');
    }
    public function UlbmstModel(){
        return $this->hasMany(UlbmstModel::class, 'ulbid', 'ulb_id');
    }
    
    public function EmployeeType(){
        return $this->hasMany(EmployeeType::class, 'employee_type_id', 'employee_type');
    }
    
    
}
