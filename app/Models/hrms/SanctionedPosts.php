<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanctionedPosts extends Model
{
    protected $table ='hrms_sanctioned_posts';
    
     protected $fillable = [
        'district_id',
        'ulb_id',
        'ulb_id',
        'designation_id',
        'post_sanctioned',
        'occupied_posts',
        'login_id',
    ];
    
    public function scopeBycategory($query, $catid){
        return $query->where('employee_type', $catid);
    }
    
    public function scopeByLevel($query, $level){
        return $query->where('level_id', $level);
    }
    
    public function scopeByDesignation($query, $designation){
        return $query->where('designation_id', $designation);
    }
    
    public function scopeByDistrict($query, $district){
        return $query->where('district_id', $district);
    }
    
    public function scopeByUlb($query, $ulb){
        return $query->where('ulb_id', $ulb);
    }
}
