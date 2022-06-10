<?php

namespace App\Http\Controllers\hrms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\hrms\AddEmployeeModel;
use DB;

class SalaryController extends Controller
{
    public function index(){
        $data['employee'] = AddEmployeeModel::with('DesignationModel')->where('employee_type',1)->get();

        $no_of_days = date('t');
        $leaves = DB::table('hrms_employee_leave_details')->where('month',date('m'))->where('year',date('Y'))->get();

        foreach($data['employee']  as $emp){
            $pay_days = $no_of_days - $leaves->where('employee_id',$emp->employee_id)->sum('lop');
            $data['salary'][$emp->employee_id]['pay_days'] = $pay_days;
            $basic_salary = $emp->current_basic_salary;

            // basic  salary based on pay days
            $basic_salary = ($basic_salary*$pay_days)/$no_of_days;

            // pf caluclation
            if($basic_salary > 15000){
                $pf_salary = 15000;
            }else{
                $pf_salary = $basic_salary;
            }
            // esi caluclation
            if($basic_salary > 21000){
                $data['salary'][$emp->employee_id]['add_esi'] = 0;
                $data['salary'][$emp->employee_id]['ded_esi'] = 0;
                $data['salary'][$emp->employee_id]['ded_esi1'] = 0;
            }else{
                $data['salary'][$emp->employee_id]['add_esi'] = ($basic_salary*$emp->DesignationModel[0]->add_esi)/100;
                $data['salary'][$emp->employee_id]['ded_esi'] = ($basic_salary*$emp->DesignationModel[0]->add_esi)/100;
                $data['salary'][$emp->employee_id]['ded_esi1'] = ($basic_salary*$emp->DesignationModel[0]->ded_esi)/100;
            }

            $data['salary'][$emp->employee_id]['basic_pay'] = $basic_salary;
            $data['salary'][$emp->employee_id]['hra'] = ($basic_salary*$emp->DesignationModel[0]->hra)/100;
            $data['salary'][$emp->employee_id]['add_epf'] = ($pf_salary*$emp->DesignationModel[0]->add_epf)/100;
            $data['salary'][$emp->employee_id]['ded_epf'] = ($pf_salary*$emp->DesignationModel[0]->add_epf)/100;
            $data['salary'][$emp->employee_id]['ded_epf1'] = ($pf_salary*$emp->DesignationModel[0]->ded_epf)/100;

            $data['salary'][$emp->employee_id]['fta'] = $emp->DesignationModel[0]->fta;
            $data['salary'][$emp->employee_id]['gross_salary'] = $data['salary'][$emp->employee_id]['basic_pay'] + $data['salary'][$emp->employee_id]['hra'] |+ $data['salary'][$emp->employee_id]['add_epf'] + $data['salary'][$emp->employee_id]['add_esi'] + $data['salary'][$emp->employee_id]['fta'];
            if($data['salary'][$emp->employee_id]['gross_salary'] > 20000){
                $data['salary'][$emp->employee_id]['pt'] = 200;
            }else{
                $data['salary'][$emp->employee_id]['pt'] = 150;
            }
            $data['salary'][$emp->employee_id]['agis'] = 100;

            $data['salary'][$emp->employee_id]['total_ded'] = $data['salary'][$emp->employee_id]['ded_epf'] + $data['salary'][$emp->employee_id]['ded_epf1'] + $data['salary'][$emp->employee_id]['ded_esi'] + $data['salary'][$emp->employee_id]['ded_esi1'] + $data['salary'][$emp->employee_id]['pt'] + $data['salary'][$emp->employee_id]['agis'];

            $data['salary'][$emp->employee_id]['net_pay'] = $data['salary'][$emp->employee_id]['gross_salary'] - $data['salary'][$emp->employee_id]['total_ded'];

        }
        // dd($data);
        return view('hrms.salary',$data);
    }
}
