<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ivnm\ivnmWorkDetailsModel;

class UlbmstModel extends Model
{
    use HasFactory;
    protected $table = 'ulbmst';
    
    public function DistrictModel()
    {
        return $this->belongsTo(DistrictModel::class,'distid','distid');
    }
    public function ivnmWorkDetailsModel(){
        return $this->hasMany(ivnmWorkDetailsModel::class,'ulbid','ulbid');
    }
    
}
