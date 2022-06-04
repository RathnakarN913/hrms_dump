<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    
    protected $table ='services';
    
    public function userServiceMap()
    {
        return $this->hasMany(UserServiceModel::class,'service_id','id');
    }
}
