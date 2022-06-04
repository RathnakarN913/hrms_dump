<?php

namespace App\Http\Controllers\api\ivnm;

use App\Http\Controllers\Controller;
use App\Models\api\ivnm\LoginModel;
use App\Models\api\ivnm\ApkVersionModel;
use App\Models\api\ivnm\SessionLogModel;
use App\Models\UlbmstModel;
use App\Helper\Helpers;
use Illuminate\Http\Request;
use Session;
class LoginController extends Controller
{
    public function index(Request $request)
    {
        
			
			$user_id    =  htmlspecialchars(strip_tags($request->post('user_id')));
			$password    = $request->post('password');
			$password    = sha1(md5($password));
			$apk_version=  htmlspecialchars(strip_tags($request->post('apk_version')));
			$accessKey = htmlspecialchars(strip_tags($request->post('access_key')));
			$project_code = htmlspecialchars(strip_tags($request->post('project_code')));
			
			/*** check access key ***/
			     $params = array('project_code'=>$project_code,'access_key'=>$accessKey);
			     $userChk = new Helpers();
			     $result = $userChk->checkAccessKey($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = 100;
                     $response['message']     = 'Invalid accesskey. ';
                     echo json_encode($response);
                     exit;
                 }
			
			/** close **/
			
				/*** check apk key ***/
			     $params = array('project_code'=>$project_code,'api_version'=>$apk_version);
			     $userChk = new Helpers();
			     $result = $userChk->checkAccessKey($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = 100;
                     $response['message']     = 'Please update your Application';
                     echo json_encode($response);
                     exit;
                 }
			
			/** close **/
			
			/** check username & password ***/
		
		        $params = array('user_id'=>$user_id,'user_pwd'=>$password);
                $result = LoginModel::where($params)->get();
            
            /** close **/
            
            /** get ulbname **/
            
                $params = array('ulbid'=>$result[0]->ulbid);
                $ulbname = UlbmstModel::where($params)->get();
            
            /** close **/
			//	print_r($params);
    			if(count($result)>0)
    			{
    			    
    			    /*** update session id table : session_logs ***/
    			    $session_id = Session::getId();
    			    $params = array(
    			        'project_code' => $project_code,
    			        'user_id' => $user_id,
    			        'session_id' => $session_id,
    			        'date' => date('Y-m-d H:i:s'),
    			        'ip_address' => $request->ip()
    			        );
    			    
    			    SessionLogModel::insert($params);
    			    
    			    /*** close ***/
    			    
    			    $response['status_code'] = 200;
    				$response['message']     = 'Success'; 
    				$response['username']     = $user_id; 
    				$response['ulbid']     = $result[0]->ulbid;
    				$response['user_type']     = $result[0]->user_type;
    				$response['ulbname']     = $ulbname[0]->ulbname;
    				$response['session_id']     = $session_id;
    			} 
    			else
    			{	
    				$response['status_code'] = 100;
    				$response['message']     = 'Login Failed';
				}
    			
			
			
            echo json_encode($response);
		
    }
}
