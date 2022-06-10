<?php

namespace App\Http\Controllers\hrms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\hrms\AddEmployeeModel;
use App\Models\hrms\MonthWiseSalaryModel;
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
            $hra = ($basic_salary*$emp->DesignationModel[0]->hra)/100;

            // basic  salary based on pay days
            $basic_salary = ($basic_salary*$pay_days)/$no_of_days;

            // pf caluclation
            if($basic_salary > 15000){
                $pf_salary = 15000;
            }else{
                $pf_salary = $basic_salary;
            }
            // esi caluclation
            if($basic_salary + $hra > 21000){
                $data['salary'][$emp->employee_id]['add_esi'] = 0;
                $data['salary'][$emp->employee_id]['ded_esi'] = 0;
                $data['salary'][$emp->employee_id]['ded_esi1'] = 0;
            }else{
                $data['salary'][$emp->employee_id]['add_esi'] = ($basic_salary*$emp->DesignationModel[0]->add_esi)/100;
                $data['salary'][$emp->employee_id]['ded_esi'] = ($basic_salary*$emp->DesignationModel[0]->add_esi)/100;
                $data['salary'][$emp->employee_id]['ded_esi1'] = ($basic_salary*$emp->DesignationModel[0]->ded_esi)/100;
            }

            $data['salary'][$emp->employee_id]['basic_pay'] = $basic_salary;
            $data['salary'][$emp->employee_id]['hra'] = $hra;
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
        $checking = MonthWiseSalaryModel::where('month',date('m'))->where('year',date('Y'))->where('employee_type',1)->first();
        if($checking){
            $data['flag'] = 0;
        }else{
            $data['flag'] = 1;
        }
        return view('hrms.salary',$data);
    }
    public function storeSalary(Request $request)
    {

        $month = $request->month;
        $year = $request->year;
        $employee_type = $request->employee_type;
        $dist = $request->dist;
        $ulb = $request->ulb;
        $employee_id = $request->employee_id;
        $pay_days = $request->pay_days;
        $basic_pay = $request->basic_pay;
        $hra = $request->hra;
        $epf = $request->epf;
        $eesi = $request->eesi;
        $fta = $request->fta;
        $gross_salary = $request->gross_salary;
        $depf = $request->depf;
        $depf1 = $request->depf1;
        $desi = $request->desi;
        $desi1 = $request->desi1;
        $pt = $request->pt;
        $agis = $request->agis;
        $tot_ded = $request->tot_ded;
        $net_pay = $request->net_pay;

        $user_id = session()->get('user_id');



        for($i=0;$i < count($employee_id);$i++){
            $salaryModel = new MonthWiseSalaryModel;
            $salaryModel->month = $month;
            $salaryModel->year = $year;
            $salaryModel->employee_type = $employee_type;
            $salaryModel->district = $dist[$i];
            $salaryModel->ulbid = $ulb[$i];
            $salaryModel->employee_id = $employee_id[$i];
            $salaryModel->payment_days = $pay_days[$i];
            $salaryModel->basic_pay = $basic_pay[$i];
            $salaryModel->hra = $hra[$i];
            $salaryModel->earning_pf = $epf[$i];
            $salaryModel->earning_esi = $eesi[$i];
            $salaryModel->fta = $fta[$i];
            $salaryModel->gross_salary = $gross_salary[$i];
            $salaryModel->ded_pf = $depf[$i];
            $salaryModel->ded_pf1 = $depf1[$i];
            $salaryModel->ded_esi = $desi[$i];
            $salaryModel->ded_esi1 = $desi1[$i];
            $salaryModel->professional_tax = $pt[$i];
            $salaryModel->agis = $agis[$i];
            $salaryModel->total_deductions = $tot_ded[$i];
            $salaryModel->net_pay = $net_pay[$i];
            $salaryModel->created_by = $user_id;
            $salaryModel->updated_by = $user_id;
            $salaryModel->created_at = date('Y-m-d H:i:s');
            $salaryModel->updated_at = date('Y-m-d H:i:s');
            $salaryModel->save();
        }

        return back()->with('success','Salary for this Month Saved Successfully');

    }
}
