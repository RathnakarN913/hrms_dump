<?php

namespace App\Models\hrms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthWiseSalaryModel extends Model
{
    use HasFactory;
    protected $table = 'hrms_month_wise_salary';
    protected $guarded = [];
}
