<?php

namespace App\Http\Controllers\hrms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\hrms\AddEmployeeModel;

class SalaryController extends Controller
{
    public function index(){
        $data['employee'] = AddEmployeeModel::with('DesignationModel')->where('employee_type',1)->get();
        foreach($data['employee']  as $emp){
            // $data['salary'][$emp->employee_id]['basic_pay'] =
        }
        return view('hrms.salary');
    }
}
