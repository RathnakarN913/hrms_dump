<?php

namespace App\Models\ivnm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UlbmstModel;

class ivnmWorkDetailsModel extends Model
{
    use HasFactory;
    protected $table = 'ivnm_work_details';
    
    public function UlbmstModel(){
        return $this->belongsTo(UlbmstModel::class,'ulbid','ulbid');
    }
    public function ivnmWorkProgressStatusModel(){
        return $this->belongsTo(ivnmWorkProgressStatusModel::class,'work_final_status','id');
    }
    
    public function ivnmWorkPhotosModel(){
        return $this->hasMany(ivnmWorkPhotosModel::class,'work_id','id');
    }
}
