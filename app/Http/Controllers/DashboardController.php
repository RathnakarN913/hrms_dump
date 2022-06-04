<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProjectModel;
use App\Helper\Helpers;
use App\Middleware\UserAuthentication;
use Session;

class DashboardController extends Controller
{
     
    public function index(Request $request)
    {
        $userChk = new Helpers();
        $result = $userChk->checkUser();
        
        
        
             
             if(Session::get('user_type')=='C')
             {
               $params = array('active_status'=>1);
               $data['allProjects'] = ProjectModel::where($params)->orderBy('project_order')->get();
             }
             else
             {
                 $params = array('ulbid'=>Session::get('ulbid'),'active_status'=>1);
                 $data['allProjects'] = ProjectModel::join('ulb_project_map','projects.id','=','ulb_project_map.project_id')->where($params)->orderBy('project_order')->get();
                 
                 
             }
             
            return view('dashboard',$data);
        
        
    }
    
    
}
