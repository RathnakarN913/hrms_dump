<?php

namespace App\Models\api\ivnm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkProgressListModel extends Model
{
    use HasFactory;
    protected $table = 'ivnm_work_status_mst';
}
