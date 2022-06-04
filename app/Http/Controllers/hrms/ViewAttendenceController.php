<?php

namespace App\Http\Controllers\hrms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\hrms\AddEmployeeModel;
use App\Models\hrms\DesignationModel;
use App\Models\hrms\AddAttendanceModel;
use App\Models\hrms\CurrentStatusModel;
use App\Models\hrms\EmployeeType;
use App\Models\hrms\DistricstsModel;
use Session;
use DB;
error_reporting(0);

class ViewAttendenceController extends Controller
{
    public function index(Request $request)
    {
     //echo "View attandance";
    //return;
        $distid = session()->get('distid');
        $data['employeetypes'] = EmployeeType::all();
        $data['districts'] = DistricstsModel::all();
            
        //$params = array('distid'=>Session::get('distid'),'month'=>date('n'),'year'=>date('Y'));
        $params = array('month'=>date('n'),'year'=>date('Y'));
        //$params = array('distid'=>Session::get('distid'));
          //return $data['emp_data'] = AddAttendanceModel::with('DesignationModel','AddEmployeeModel','GetCurrentStatus')->where($params)->get();
           $data['emp_data'] = AddAttendanceModel::with(['GetCurrentStatus'  => function ($query){
            $query->where('current_status', 1)->orwhere('current_status',NULL);   
            }])->with('AddEmployeeModel')->where($params)->get();
           
      // return $getCurrentStatus;
        $data['year']=DB::table('hrms_salary_years')->get();
        $data['month']=DB::table('hrms_month_mst')->get();   
        $emp_type1="";
        $dist1="";
        $ulb1="";
        if($request->post('submit'))
        {
            $emp_type1=$request->post('employee_type');
            $dist1=$request->post('district');
            $ulb1=$request->post('ulbid');
            $month1 = htmlspecialchars(strip_tags($request->post('month')));
            $year1 = htmlspecialchars(strip_tags($request->post('year')));
            
            $month = htmlspecialchars(strip_tags($request->post('month')));
            $year = htmlspecialchars(strip_tags($request->post('year')));
            $emp_type=$request->post('employee_type');
            $dist=$request->post('district');
            $ulb=$request->post('ulbid');
            if($dist=="")
            {
                $condition=array('employee_type'=>$emp_type,'month'=>$month,'year'=>$year);
            }
            else if($dist != "" && $ulb == "" )
            {
                $condition=array('employee_type'=>$emp_type,'distid'=>$dist,'month'=>$month,'year'=>$year);
            }
            else if($dist !="" && $ulb != "")
            {
                $condition=array('employee_type'=>$emp_type,'distid'=>$dist,'ulbid'=>$ulb,'month'=>$month,'year'=>$year);
            }
            else
            {
                
            }
            
            //$params = array('month'=>$month,'year'=>$year);
            //$data['emp_data'] = AddAttendanceModel::with('DesignationModel','AddEmployeeModel')->where($params)->get();
             $data['emp_data'] = AddAttendanceModel::with(['GetCurrentStatus'  => function ($query){
                                $query->where('current_status', 1)->orwhere('current_status',NULL);   
                        }])->with('AddEmployeeModel')->where($condition)->get();
          
        }
        
      //  dd($data);
        return view('hrms.view_attendance',$data , compact('emp_type1','dist1','ulb1','month1','year1'));
    }
}


?>