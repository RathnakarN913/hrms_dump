<?php

namespace App\Models\ivnm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ivnmWorkProgressStatusModel extends Model
{
    use HasFactory;
    protected $table = 'ivnm_work_progress_status';
    
    public function ivnmWorkDetailsModel(){
        return $this->hasMany(ivnmWorkProgressStatusModel::class,'id','work_final_status');
    }
    
}
