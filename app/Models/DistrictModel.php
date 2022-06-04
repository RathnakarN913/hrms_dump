<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistrictModel extends Model
{
    use HasFactory;
    protected $table ='Districtmst';

    public function UlbmstModel()
    {
        return $this->hasMany(UlbmstModel::class,'dist_id','distid');
    }
}
