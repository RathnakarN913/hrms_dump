<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulbs extends Model
{
    protected $table ='ulbmst';
    
     protected $fillable = [
        'distid',
        'ulbid',
        'ulbname',
        'ulb_type',
        'ulb_grade',
        'ulbnametelugu',
        'pincode',
        'access_key',
        'lat',
        'lng',
        'website_links',
        'Mail_IDs',
        'api_ulbname',
        'address',
        'banner',
        'comm_name',
        'comm_mobile',
        'ae_name',
        'ae_mobile',
        'eng_name',
        'eng_mobile',
        'nodal_officer_name',
        'nodal_officer_mobile',
        'ivnm_eng_id',
        'vkd_eng_id'
    ];
}
