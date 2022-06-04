<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    use HasFactory;
    
    protected $table = 'projects';
    
    /*public function ulbProjectMapModel()
    {
        return $this->hasOne(UlbProjectMapModel::class);
    }*/
}
