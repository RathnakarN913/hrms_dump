<?php

namespace App\Models\api\ivnm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddWorkDetailsModel extends Model
{
    use HasFactory;
    protected $table = 'ivnm_work_details';
    protected $fillable = [
        'ulbid',
        'work_type_id',
        'work_name',
        'is_site_selection_done',
        'if_selection_no_reason',
        'site_location',
        'site_area',
        'ground_clearance_status',
        'site_location_from_app',
        'latitude',
        'langitude',
        'work_created_date'
        
    ];
}
