<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserServiceModel extends Model
{
    use HasFactory;
    protected $table ="user_service_map";
    
    public function services()
    {
        $this->belongsTo('App\Models\Services','id','service_id');
    }
}
