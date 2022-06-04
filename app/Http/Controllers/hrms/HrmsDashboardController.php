<?php

namespace App\Http\Controllers\hrms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectModel;
use App\Models\WardModel;
use App\Models\UlbmstModel;
use App\Models\DistrictModel;
use App\Models\ivnmPhysicalProgressdrpdwnMstModel;
use App\Models\hrms\EmployeesCurrentInfosModel;
use App\Models\ivnm\ivnmWorkProgressStatusModel;
use App\Models\UlbHouseholdData;
use App\Models\Hrms_Sanctioned_PostsModel;
use App\Helper\Helpers;

use Session;
use DB;
error_reporting(0);

class HrmsDashboardController extends Controller
{
    public function index(Request $request)
        {
            /** checkin user authentication ***/
                 $userChk = new Helpers();
                 $result = $userChk->checkUser();
            /** close **/
            
            /** get assigned menus **/
            
            $id =23;
            
            Session::put('project_id',$id);
            Session::put('dashboard','hrms');
          
             
                 $params = array('id'=>$id);
                 $data['projectDetails'] = ProjectModel::where($params)->get();
                 Session::put(array('project_name'=>$data['projectDetails'][0]->project_name));
                 
                 $data['san'] = Hrms_Sanctioned_PostsModel::sum('post_sanctioned');
                 $data['gov_san'] = Hrms_Sanctioned_PostsModel::where('employee_type',3)->sum('post_sanctioned');
                 $data['out_san'] = Hrms_Sanctioned_PostsModel::where('employee_type',2)->sum('post_sanctioned');
                 $data['hr_san'] = Hrms_Sanctioned_PostsModel::where('employee_type',1)->sum('post_sanctioned');
                 $data['occu'] = EmployeesCurrentInfosModel::count();
                 $data['gov_occu'] = EmployeesCurrentInfosModel::where('employee_type',3)->count();
                 $data['out_occu'] = EmployeesCurrentInfosModel::where('employee_type',2)->count();
                 $data['hr_occu'] = EmployeesCurrentInfosModel::where('employee_type',1)->count();
            
                 
                 /** close **/
                 return view('hrms/dashboard',$data);
            
        }
        
        
        
       
       
       
      
}







