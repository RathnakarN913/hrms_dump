<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistricstsModel extends Model
{
    protected $table ='Districtmst';
    
     protected $fillable = [
        'distname',
        'rdma',
        'sort_order',
        'distnametelugu',
        'status',
        'adl_collector_name',
        'mobile'
    ];
}
