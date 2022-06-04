<?php

namespace App\Http\Controllers\api\ivnm;

use App\Http\Controllers\Controller;
use App\Models\api\ivnm\LoginModel;
use App\Models\api\ivnm\ApkVersionModel;
use App\Models\UlbmstModel;
use App\Models\api\ivnm\WorkTypeModel;
use App\Models\api\ivnm\AddWorkDetailsModel;
use App\Models\api\ivnm\AddWorkPhotosModel;
use App\Models\api\ivnm\UpdateGroundClearanceModel;
use App\Models\api\ivnm\UpdateTpClearanceModel;
use App\Models\api\ivnm\UpdateTenderDetailsModel;
use App\Models\api\ivnm\TenderStatusModel;
use App\Models\api\ivnm\PhysicalProgressListModel;
use App\Models\api\ivnm\WorkProgressListModel;
use App\Models\api\ivnm\WorkPregressDetailsModel;
use App\Models\api\ivnm\FinancialProgressUpdateModel;
use App\Models\api\ivnm\MapBuildingModel;
use App\Models\api\ivnm\AddWorkBackupModel;
use App\Helper\Helpers;
use Illuminate\Http\Request;
use Validator;
use Response;
error_reporting(0);

class MasterController extends Controller
{
    
        public function getWorkTypes(Request $request)
        {
            $apk_version=  htmlspecialchars(strip_tags($request->post('apk_version')));
			$accessKey = htmlspecialchars(strip_tags($request->post('access_key')));
			$project_code = htmlspecialchars(strip_tags($request->post('project_code')));
			$session_id = htmlspecialchars(strip_tags($request->post('session_id')));
			
		/**** required fields validation ****/	
			$rules=array(
            'apk_version' => 'required',
            'access_key' => 'required|alpha_num',
            'project_code' => 'required|alpha_num',
            'session_id' => 'required|alpha_num'
        );
        $messages=array(
        'apk_version.required' => 'apk version required.',
        'access_key.required' => 'apk version required required.',
        'project_code.required' => 'project_code required.',
        'session_id.required' => 'session_id required.'
    );
    
    $validator=Validator::make($request->all(),$rules,$messages);
			if($validator->fails())
                {
                    $response['errors'] = array();
                    //$messages=$validator->messages();
                    $errors=response()->json($validator->errors(), 400);
                    
                    $response['status_code'] = "100";
                    $response['message']     = 'Validation fail';
                    $row['id']="fdsfs";
                    
                    array_push($response['errors'],$errors);
                    echo json_encode($response);
                    exit;
                }
            /*** required validation close ***/
			
			/*** check access key ***/
			     $params = array('project_code'=>$project_code,'access_key'=>$accessKey);
			     $userChk = new Helpers();
			     $result = $userChk->checkAccessKey($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
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
                     $response['status_code'] = "100";
                     $response['message']     = 'Please update your Application';
                     echo json_encode($response);
                     exit;
                 }
			
			/** close **/
			
			/** check user authentication ****/
			
			 $params = array('project_code'=>$project_code,'session_id'=>$session_id,'is_active'=>1);
			     $userChk = new Helpers();
			     $result = $userChk->checkUserAuthentication($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
                     $response['message']     = 'User authentication failed';
                     echo json_encode($response);
                     exit;
                 }
			
			
			/** close ***/
			
			/*** get work types Tabel :ivnm_work_type_mst  ***/
			$response['status_code'] = "200";
            $response['message']     = 'success';
            $response['data'] = array();
            $row = array('id'=>0,'description'=>'--- select ---');
            array_push($response['data'],$row);
			$result = WorkTypeModel::get();
			foreach($result as $key=>$val)
			{
			    $row['id'] = $val->id;
			    $row['description'] = $val->work_type;
			    array_push($response['data'],$row);
			}
			
			/*** close ***/
			echo json_encode($response);
            exit;
			
        }
        
        public function addWorkDetails(Request $request)
        {
            $apk_version=  htmlspecialchars(strip_tags($request->post('apk_version')));
			$accessKey = htmlspecialchars(strip_tags($request->post('access_key')));
			$project_code = htmlspecialchars(strip_tags($request->post('project_code')));
			$session_id = htmlspecialchars(strip_tags($request->post('session_id')));
			
			
			
			/*** check access key ***/
			     $params = array('project_code'=>$project_code,'access_key'=>$accessKey);
			     $userChk = new Helpers();
			     $result = $userChk->checkAccessKey($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
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
                     $response['status_code'] = "100";
                     $response['message']     = 'Please update your Application';
                     echo json_encode($response);
                     exit;
                 }
			
			/** close **/
			
			/** check user authentication ****/
			
			 $params = array('project_code'=>$project_code,'session_id'=>$session_id,'is_active'=>1);
			     $userChk = new Helpers();
			     $result = $userChk->checkUserAuthentication($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
                     $response['message']     = 'User authentication failed';
                     echo json_encode($response);
                     exit;
                 }
			
			
			/** close ***/
			
			/** checking work final status ***/
			
			$work_final_status = 0;
			$is_site_selection_done = 2;
			$ground_clearance_status = 2;
			$tp_clearance_status = 2;
			$tender_completed_status = 2;
			
			if($request->post('is_site_selection_done')==1)
			{
			    $work_final_status=2;
			    $is_site_selection_done = 1;
    			$ground_clearance_status = 2;
    			$tp_clearance_status = 2;
    			$tender_completed_status = 2;
			}
			if($request->post('ground_clearance_status')==1)
			{
			    if($request->post('work_type_id')==1)
			    {
			     $work_final_status=3;
			     $tp_clearance_status = 2;
			    }
			    else
			    {
			        $work_final_status=4;
			        $tp_clearance_status = 1;
			    }
			    $is_site_selection_done = 1;
    			$ground_clearance_status = 1;
    			
    			$tender_completed_status = 2;
			}
			if($request->post('tp_clearance_status')==1)
			{
			    $work_final_status=4;
			    $is_site_selection_done = 1;
    			$ground_clearance_status = 1;
    			$tp_clearance_status = 1;
    			$tender_completed_status = 2;
			}
			if($request->post('tender_completed_status')==1)
			{
			    $work_final_status=5;
			    $is_site_selection_done = 1;
    			$ground_clearance_status = 1;
    			$tp_clearance_status = 1;
    			$tender_completed_status = 1;
			}
			
			/** close ***/
		
			/*** insert work details table: ivnm_work_details **/
			
			
			    
			    $addwork = new AddWorkDetailsModel();
			    $addwork->ulbid = htmlspecialchars(strip_tags($request->post('ulbid')));
			    $addwork->work_type_id=htmlspecialchars(strip_tags($request->post('work_type_id')));
			    $addwork->work_name=htmlspecialchars(strip_tags($request->post('work_name')));
			    $addwork->is_site_selection_done=htmlspecialchars(strip_tags($is_site_selection_done));
			    $addwork->if_selection_no_reason=htmlspecialchars(strip_tags($request->post('if_selection_no_reason')));
			    $addwork->site_location=htmlspecialchars(strip_tags($request->post('site_location')));
			    $addwork->site_area=htmlspecialchars(strip_tags($request->post('site_area')));
			    $addwork->ground_clearance_status=htmlspecialchars(strip_tags($ground_clearance_status));
			    $addwork->ground_clearance_no_reason=htmlspecialchars(strip_tags($request->post('ground_clearance_no_reason')));
			    $addwork->tp_clearance_status=htmlspecialchars(strip_tags($tp_clearance_status));
			    $addwork->tp_clearance_no_reason=htmlspecialchars(strip_tags($request->post('tp_clearance_no_reason')));
			    
			    $addwork->tender_completed_status=htmlspecialchars(strip_tags($tender_completed_status));
			    $addwork->tender_no_reason=htmlspecialchars(strip_tags($request->post('Tender_Reason')));
			    $addwork->tcv_amount=htmlspecialchars(strip_tags($request->post('tcv_amount')));
			    $addwork->ecv_amount=htmlspecialchars(strip_tags($request->post('ecv_amount')));
			    
			    $addwork->contractor_name=htmlspecialchars(strip_tags($request->post('contractor_name')));
			    $addwork->contact_person_name=htmlspecialchars(strip_tags($request->post('contact_person_name')));
			    $addwork->contact_person_mobile=htmlspecialchars(strip_tags($request->post('contact_person_mobile')));
			    $addwork->no_of_buildings=htmlspecialchars(strip_tags($request->post('no_of_buildings')));
			    
			    $addwork->site_location_from_app=htmlspecialchars(strip_tags($request->post('site_location_from_app')));
			    $addwork->latitude=htmlspecialchars(strip_tags($request->post('latitude')));
			    $addwork->langitude=htmlspecialchars(strip_tags($request->post('langitude')));
			    $addwork->remarks=htmlspecialchars(strip_tags($request->post('remarks')));
			    $addwork->work_created_date=date('Y-m-d',strtotime($request->post('work_created_date')));
			    $addwork->work_final_status=$work_final_status;
			    
			    $addwork->save();
			    
			    /*$result = AddWorkDetailsModel::insert($params);*/
			    $work_id = $addwork->id;
			    
			    /** add data to backup table ***/
			    
			    $addwork = new AddWorkBackupModel();
			    $addwork->id = htmlspecialchars(strip_tags($work_id));
			    $addwork->ulbid = htmlspecialchars(strip_tags($request->post('ulbid')));
			    $addwork->work_type_id=htmlspecialchars(strip_tags($request->post('work_type_id')));
			    $addwork->work_name=htmlspecialchars(strip_tags($request->post('work_name')));
			    $addwork->is_site_selection_done=htmlspecialchars(strip_tags($is_site_selection_done));
			    $addwork->if_selection_no_reason=htmlspecialchars(strip_tags($request->post('if_selection_no_reason')));
			    $addwork->site_location=htmlspecialchars(strip_tags($request->post('site_location')));
			    $addwork->site_area=htmlspecialchars(strip_tags($request->post('site_area')));
			    $addwork->ground_clearance_status=htmlspecialchars(strip_tags($ground_clearance_status));
			    $addwork->ground_clearance_no_reason=htmlspecialchars(strip_tags($request->post('ground_clearance_no_reason')));
			    $addwork->tp_clearance_status=htmlspecialchars(strip_tags($tp_clearance_status));
			    $addwork->tp_clearance_no_reason=htmlspecialchars(strip_tags($request->post('tp_clearance_no_reason')));
			    
			    $addwork->tender_completed_status=htmlspecialchars(strip_tags($tender_completed_status));
			    $addwork->tender_no_reason=htmlspecialchars(strip_tags($request->post('Tender_Reason')));
			    $addwork->tcv_amount=htmlspecialchars(strip_tags($request->post('tcv_amount')));
			    $addwork->ecv_amount=htmlspecialchars(strip_tags($request->post('ecv_amount')));
			    
			    $addwork->contractor_name=htmlspecialchars(strip_tags($request->post('contractor_name')));
			    $addwork->contact_person_name=htmlspecialchars(strip_tags($request->post('contact_person_name')));
			    $addwork->contact_person_mobile=htmlspecialchars(strip_tags($request->post('contact_person_mobile')));
			    $addwork->no_of_buildings=htmlspecialchars(strip_tags($request->post('no_of_buildings')));
			    
			    $addwork->site_location_from_app=htmlspecialchars(strip_tags($request->post('site_location_from_app')));
			    $addwork->latitude=htmlspecialchars(strip_tags($request->post('latitude')));
			    $addwork->langitude=htmlspecialchars(strip_tags($request->post('langitude')));
			    $addwork->remarks=htmlspecialchars(strip_tags($request->post('remarks')));
			    $addwork->work_created_date=date('Y-m-d',strtotime($request->post('work_created_date')));
			    $addwork->work_final_status=$work_final_status;
			    
			    $addwork->save();
			    
			    /** close ***/
			    
			    
			    
			    
			    
			    /** update building details ***/
			    
			    if($request->post('no_of_buildings')==1)
			    {
			        $params = array(
    			                'work_id'=>$work_id,
    			                'building_name'=>htmlspecialchars(strip_tags($request->post('work_name'))),
    			                'updated_at'=>date('Y-m-d H:i:s'),
    			                'sort_order'=>1
    			                
    			               );
    			               
    			               MapBuildingModel::insert($params);
			    }
			    else
			    {
			    
    			    if(!empty($request->post('first_buildings')))
    			    {
    			       
    			            $params = array(
    			                'work_id'=>$work_id,
    			                'building_name'=>$request->post('first_buildings'),
    			                'updated_at'=>date('Y-m-d H:i:s'),
    			                'sort_order'=>1
    			                
    			               );
    			               
    			               $result = MapBuildingModel::insert($params);
    			        
    			    }
    			    if(!empty($request->post('second_buildings')))
    			    {
    			       
    			            $params = array(
    			                'work_id'=>$work_id,
    			                'building_name'=>$request->post('second_buildings'),
    			                'updated_at'=>date('Y-m-d H:i:s'),
    			                'sort_order'=>2
    			                
    			               );
    			               
    			               $result = MapBuildingModel::insert($params);
    			        
    			    }
    			    if(!empty($request->post('third_buildings')))
    			    {
    			       
    			            $params = array(
    			                'work_id'=>$work_id,
    			                'building_name'=>$request->post('third_buildings'),
    			                'updated_at'=>date('Y-m-d H:i:s'),
    			                'sort_order'=>3
    			                
    			               );
    			               
    			               $result = MapBuildingModel::insert($params);
    			        
    			    }
			    }
			    /*else
			    {
			        if($request->post('work_type_id')==1)
			        {
			             $params = array(
			                'work_id'=>$work_id,
			                'building_name'=>htmlspecialchars(strip_tags($request->post('work_name'))),
			                'updated_at'=>date('Y-m-d H:i:s')
			                
			               );
			               
			               $result = MapBuildingModel::insert($params);
			        }
			    }*/
			    
			    /*** close ****/
			    
			/** close **/    
			    	/** upload mutliple files ***/
		/*	if($request->hasfile('fileToUpload'))
                 {
                    foreach($request->file('fileToUpload') as $key => $file)
                    {
                        $path = $file->store('public/ivnm');
                        $name = $file->getClientOriginalName();
                        $file->move(public_path().'/ivnm/', $path);  
                        $params = array(
                            'work_id'=>$work_id,
                            'photo_url'=>$path,
                            'status'=>1,
                            'date'=>date('Y-m-d',strtotime($request->post('work_created_date')))
                            );
         
                        AddWorkPhotosModel::insert($params);
         
                    }
                 }*/
            /** file upload completed **/
            
            /** file 1 upload **/
            
            if($request->hasfile('fileToUpload1'))
                 {
                    /*foreach($request->file('fileToUpload') as $key => $file)
                    {*/
                        $file = $request->file('fileToUpload1');
                        $path = $file->store('public/ivnm');
                        $name = $file->getClientOriginalName();
                        $file->move(public_path().'/ivnm/', $path);  
                        $params = array(
                            'work_id'=>$work_id,
                            'photo_url'=>$path,
                            'status'=>1,
                            'date'=>date('Y-m-d',strtotime($request->post('work_created_date')))
                            );
         
                        AddWorkPhotosModel::insert($params);
         
                    /*}*/
                 }
            
            /** close **/
            
            /** file 2 upload **/
            
            if($request->hasfile('fileToUpload2'))
                 {
                    /*foreach($request->file('fileToUpload') as $key => $file)
                    {*/
                        $file = $request->file('fileToUpload2');
                        $path = $file->store('public/ivnm');
                        $name = $file->getClientOriginalName();
                        $file->move(public_path().'/ivnm/', $path);  
                        $params = array(
                            'work_id'=>$work_id,
                            'photo_url'=>$path,
                            'status'=>1,
                            'date'=>date('Y-m-d',strtotime($request->post('work_created_date')))
                            );
         
                        AddWorkPhotosModel::insert($params);
         
                    /*}*/
                 }
            
            /** close **/
            
             /** file 3 upload **/
            
            if($request->hasfile('fileToUpload3'))
                 {
                    /*foreach($request->file('fileToUpload') as $key => $file)
                    {*/
                        $file = $request->file('fileToUpload3');
                        $path = $file->store('public/ivnm');
                        $name = $file->getClientOriginalName();
                        $file->move(public_path().'/ivnm/', $path);  
                        $params = array(
                            'work_id'=>$work_id,
                            'photo_url'=>$path,
                            'status'=>1,
                            'date'=>date('Y-m-d',strtotime($request->post('work_created_date')))
                            );
         
                        AddWorkPhotosModel::insert($params);
         
                    /*}*/
                 }
            
            /** close **/
                 
                 if($work_id > 0)
                 {
                     $response['status_code'] = "200";
                     $response['message']     = 'Work added successfully';
                     
                 }
                 else
                 {
                     $response['status_code'] = "100";
                     $response['message']     = 'Error try again';
                 }
                 
			echo json_encode($response);
            exit;
			
			
			
        }
        
        /**** listing work details ****/
        
        public function listWorkDetails(Request $request)
        {
            $apk_version=  htmlspecialchars(strip_tags($request->post('apk_version')));
			$accessKey = htmlspecialchars(strip_tags($request->post('access_key')));
			$project_code = htmlspecialchars(strip_tags($request->post('project_code')));
			$ulbid = htmlspecialchars(strip_tags($request->post('ulbid')));
			$session_id = htmlspecialchars(strip_tags($request->post('session_id')));
			
			/*** check access key ***/
			     $params = array('project_code'=>$project_code,'access_key'=>$accessKey);
			     $userChk = new Helpers();
			     $result = $userChk->checkAccessKey($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
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
                     $response['status_code'] = "100";
                     $response['message']     = 'Please update your Application';
                     echo json_encode($response);
                     exit;
                 }
			
			/** close **/
			
			/** check user authentication ****/
			
			 $params = array('project_code'=>$project_code,'session_id'=>$session_id,'is_active'=>1);
			     $userChk = new Helpers();
			     $result = $userChk->checkUserAuthentication($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
                     $response['message']     = 'User authentication failed';
                     echo json_encode($response);
                     exit;
                 }
			
			
			/** close ***/
			
			/*** getting work details ****/
			
			
			$response['status_code'] = "200";
            $response['message']     = 'success';
            $response['data'] = array();
            $result = WorkTypeModel::get();
            foreach($result as $key=>$val)
            {
                $work_type_list[$val->id] = $val->work_type;
            }
            $params = array('ulbid'=>$ulbid);
			$details = AddWorkDetailsModel::where($params)->get();
			
			if(count($details) > 0)
			{
    			foreach($details as $key=>$val)
    			{
    			    $row['work_id'] = $val->id;
    			    $row['work_name'] = $val->work_name;
    			    $row['work_type'] = $work_type_list[$val->work_type_id];
    			    array_push($response['data'],$row);
    			}
			}
			else
			{
			        $row['work_id'] = '0';
			        $row['work_type']='';
    			    $row['work_name'] = 'Data not found';
    			    array_push($response['data'],$row);
			}
			
			
			
			
			/** close **/
		
			
                 
			echo json_encode($response);
            exit;
			
			
			
        }
        
        /*** listing close ****/
        
        /*** update work details ***/
        
        public function viewSingleWorkDetails(Request $request)
        {
            
            $apk_version=  htmlspecialchars(strip_tags($request->post('apk_version')));
			$accessKey = htmlspecialchars(strip_tags($request->post('access_key')));
			$project_code = htmlspecialchars(strip_tags($request->post('project_code')));
			$ulbid = htmlspecialchars(strip_tags($request->post('ulbid')));
			$work_id = htmlspecialchars(strip_tags($request->post('work_id')));
			$session_id = htmlspecialchars(strip_tags($request->post('session_id')));
			
			/*** check access key ***/
			     $params = array('project_code'=>$project_code,'access_key'=>$accessKey);
			     $userChk = new Helpers();
			     $result = $userChk->checkAccessKey($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
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
                     $response['status_code'] = "100";
                     $response['message']     = 'Please update your Application';
                     echo json_encode($response);
                     exit;
                 }
			
			/** close **/
			
			/** check user authentication ****/
			
			 $params = array('project_code'=>$project_code,'session_id'=>$session_id,'is_active'=>1);
			     $userChk = new Helpers();
			     $result = $userChk->checkUserAuthentication($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
                     $response['message']     = 'User authentication failed';
                     echo json_encode($response);
                     exit;
                 }
			
			
			/** close ***/
			
			/*** getting work details ****/
			
			
			$response['status_code'] = "200";
            $response['message']     = 'success';
            $response['site_photos'] = array();
            $params = array('id'=>$work_id);
			$details = AddWorkDetailsModel::where($params)->get();
			
			if(count($details) > 0)
			{
    			foreach($details as $key=>$val)
    			{
    			    $response['work_id'] = strval($val->id);
    			    $response['ulbid'] = $val->ulbid;
    			    $response['work_type_id'] = strval($val->work_type_id);
    			    $response['work_name'] = strval($val->work_name);
    			    $response['is_site_selection_done'] = strval($val->is_site_selection_done);
    			    $response['if_selection_no_reason'] = strval($val->if_selection_no_reason);
    			    $response['site_location'] = strval($val->site_location);
    			    $response['site_area'] = sprintf('%.2f', $val->site_area);
    			    $response['ground_clearance_status'] = strval($val->ground_clearance_status);
    			    $response['ground_clearance_no_reason'] = strval($val->ground_clearance_no_reason);
    			    $response['site_location_from_app'] = strval($val->site_location_from_app);
    			    $response['latitude'] = strval($val->latitude);
    			    $response['langitude'] = strval($val->langitude);
    			    $response['work_created_date'] = strval($val->work_created_date);
    			    
    			    $response['tp_clearance_status'] = strval($val->tp_clearance_status);
    			    $response['tp_clearance_no_reason'] = strval($val->tp_clearance_no_reason);
    			    $response['tender_completed_status'] = strval($val->tender_completed_status);
    			    $response['Tender_Reason'] = strval($val->tender_no_reason);
    			    $response['tcv_amount'] = sprintf('%.2f', $val->tcv_amount);;
    			    $response['ecv_amount'] = sprintf('%.2f', $val->ecv_amount);;
    			    $response['contractor_name'] = strval($val->contractor_name);
    			    
    			    $response['contact_person_name'] = strval($val->contact_person_name);
    			    $response['contact_person_mobile'] = strval($val->contact_person_mobile);
    			    $response['no_of_buildings'] = strval($val->no_of_buildings);
    			    $response['remarks'] = strval($val->remarks);
    			    /** get building names ***/
    			    
    			    $response['site_building_details'] = array();
    			    $params = array('work_id'=>$val->id);
    			    $bdetails = MapBuildingModel::where($params)->get();
    			    
    			    
    			    $response['first_buildings'] = strval($bdetails[0]->building_name);
    			    $response['second_buildings'] =strval($bdetails[1]->building_name);
    			    $response['third_buildings'] = strval($bdetails[2]->building_name);
    			    
    			    /*foreach($bdetails as $bdetailskey=>$bdetailsdetails)
    			    {
    			        $row['id']=$bdetailsdetails->id;
    			        $row['building_name']=$bdetailsdetails->building_name;
    			        array_push($response['site_building_details'],$row);
    			    }*/
    			    /** close ***/
    			    
    			    // get site photos
    			    
    			    $params = array('work_id'=>$val->id);
    			   
    			    $photos = AddWorkPhotosModel::where($params)->get();
    			    
    			    $response['photo1'] = strval($photos[0]->photo_url);
    			    $response['photo2'] = strval($photos[1]->photo_url);
    			    $response['photo3'] = strval($photos[2]->photo_url);
    			    
    			    /*foreach($photos as $photkey=>$photodetails)
    			    {
    			        $row['id']=$photodetails->id;
    			        $row['photo_url']=url($photodetails->photo_url);
    			        array_push($response['site_photos'],$row);
    			    }*/
    			    
    			    
    			    
    			    
    			}
			}
			else
			{
			        $response['work_id'] = '0';
    			    $response['work_name'] = 'Data not found';
    			    
			}
			
			
			
			
			/** close **/
		
			
                 
			echo json_encode($response);
            exit;
			
			
			
        
        }
        
        /*** close ****/
        
        
        /*** update work details ****/
        
        public function updateWorkDetails(Request $request)
        {
            
            
            $apk_version=  htmlspecialchars(strip_tags($request->post('apk_version')));
			$accessKey = htmlspecialchars(strip_tags($request->post('access_key')));
			$project_code = htmlspecialchars(strip_tags($request->post('project_code')));
			$ulbid = htmlspecialchars(strip_tags($request->post('ulbid')));
			$work_id = htmlspecialchars(strip_tags($request->post('work_id')));
			$session_id = htmlspecialchars(strip_tags($request->post('session_id')));
			
			/*** check access key ***/
			     $params = array('project_code'=>$project_code,'access_key'=>$accessKey);
			     $userChk = new Helpers();
			     $result = $userChk->checkAccessKey($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
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
                     $response['status_code'] = "100";
                     $response['message']     = 'Please update your Application';
                     echo json_encode($response);
                     exit;
                 }
			
			/** close **/
			
			/** check user authentication ****/
			
			 $params = array('project_code'=>$project_code,'session_id'=>$session_id,'is_active'=>1);
			     $userChk = new Helpers();
			     $result = $userChk->checkUserAuthentication($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
                     $response['message']     = 'User authentication failed';
                     echo json_encode($response);
                     exit;
                 }
			
			
			/** close ***/
			
			/** checking work final status ***/
			
			$work_final_status = 0;
			$is_site_selection_done = 2;
			$ground_clearance_status = 2;
			$tp_clearance_status = 2;
			$tender_completed_status = 2;
			
			if($request->post('is_site_selection_done')==1)
			{
			    $work_final_status=2;
			    $is_site_selection_done = 1;
    			$ground_clearance_status = 2;
    			$tp_clearance_status = 2;
    			$tender_completed_status = 2;
			}
			if($request->post('ground_clearance_status')==1)
			{
			    if($request->post('work_type_id')==1)
			    {
			     $work_final_status=3;
			     $tp_clearance_status = 2;
			    }
			    else
			    {
			        $work_final_status=4;
			        $tp_clearance_status = 1;
			    }
			    $is_site_selection_done = 1;
    			$ground_clearance_status = 1;
    			
    			$tender_completed_status = 2;
			}
			if($request->post('tp_clearance_status')==1)
			{
			    $work_final_status=4;
			    $is_site_selection_done = 1;
    			$ground_clearance_status = 1;
    			$tp_clearance_status = 1;
    			$tender_completed_status = 2;
			}
			if($request->post('tender_completed_status')==1)
			{
			    $work_final_status=5;
			    $is_site_selection_done = 1;
    			$ground_clearance_status = 1;
    			$tp_clearance_status = 1;
    			$tender_completed_status = 1;
			}
			
			/** close ***/
			
			
			
			/*** update work details table: ivnm_work_details **/
			
			$set = array(
			    
			    'work_type_id'=>htmlspecialchars(strip_tags($request->post('work_type_id'))),
			    'work_name'=>htmlspecialchars(strip_tags($request->post('work_name'))),
			    'is_site_selection_done'=>htmlspecialchars(strip_tags($is_site_selection_done)),
			    'if_selection_no_reason'=>htmlspecialchars(strip_tags($request->post('if_selection_no_reason'))),
			    'site_location'=>htmlspecialchars(strip_tags($request->post('site_location'))),
			    'site_area'=>htmlspecialchars(strip_tags($request->post('site_area'))),
			    'site_location_from_app'=>htmlspecialchars(strip_tags($request->post('site_location_from_app'))),
			    'latitude'=>htmlspecialchars(strip_tags($request->post('latitude'))),
			    'langitude'=>htmlspecialchars(strip_tags($request->post('langitude'))),
			    'ground_clearance_status'=>htmlspecialchars(strip_tags($ground_clearance_status)),
			    'ground_clearance_no_reason'=>htmlspecialchars(strip_tags($request->post('ground_clearance_no_reason'))),
			    'tp_clearance_status'=>htmlspecialchars(strip_tags($tp_clearance_status)),
			    'tp_clearance_no_reason'=>htmlspecialchars(strip_tags($request->post('tp_clearance_no_reason'))),
			    'tender_completed_status'=>htmlspecialchars(strip_tags($tender_completed_status)),
			    'tcv_amount'=>htmlspecialchars(strip_tags($request->post('tcv_amount'))),
			    'ecv_amount'=>htmlspecialchars(strip_tags($request->post('ecv_amount'))),
			    'contractor_name'=>htmlspecialchars(strip_tags($request->post('contractor_name'))),
			    'contact_person_name'=>htmlspecialchars(strip_tags($request->post('contact_person_name'))),
			    'contact_person_mobile'=>htmlspecialchars(strip_tags($request->post('contact_person_mobile'))),
			    'no_of_buildings'=>htmlspecialchars(strip_tags($request->post('no_of_buildings'))),
			    'work_final_status'=>$work_final_status,
			    'remarks'=>htmlspecialchars(strip_tags($request->post('remarks')))
			    
			    );
			    
			    $where=array('id'=>$work_id);
			    
			    $result = AddWorkDetailsModel::where($where)->update($set);
			    
			    if($result)
			    {
			        /*$result = AddWorkDetailsModel::insert($params);*/
        			    $work_id = $work_id;
        			    
        			    $where=array('work_id'=>$work_id);
        			   
        			   
        			   /** update building details ***/
			    
                			    if($request->post('no_of_buildings')==1)
                			    {
                			        $condition  = array('work_id'=>$work_id,'sort_order'=>1);
                			        
                			         $set = array(
                    			                
                    			                'building_name'=>htmlspecialchars(strip_tags($request->post('work_name'))),
                    			                'updated_at'=>date('Y-m-d H:i:s')
                    			                
                    			               );
                    			               
                    			               MapBuildingModel::where($condition)->update($set);
                			    }
                			    else
                			    {
                			    
                    			    if(!empty($request->post('first_buildings')))
                    			    {
                    			       
                    			            $condition  = array('work_id'=>$work_id,'sort_order'=>1);
                			        
                			         $set = array(
                    			                
                    			                'building_name'=>htmlspecialchars(strip_tags($request->post('first_buildings'))),
                    			                'updated_at'=>date('Y-m-d H:i:s')
                    			                
                    			               );
                    			               
                    			               MapBuildingModel::where($condition)->update($set);
                    			        
                    			    }
                    			    if(!empty($request->post('second_buildings')))
                    			    {
                    			       
                    			             $condition  = array('work_id'=>$work_id,'sort_order'=>2);
                			        
                			         $set = array(
                    			                
                    			                'building_name'=>htmlspecialchars(strip_tags($request->post('second_buildings'))),
                    			                'updated_at'=>date('Y-m-d H:i:s')
                    			                
                    			               );
                    			               
                    			               MapBuildingModel::where($condition)->update($set);
                    			               
                    			               //$result = MapBuildingModel::insert($params);
                    			        
                    			    }
                    			    if(!empty($request->post('third_buildings')))
                    			    {
                    			       
                    			            $condition  = array('work_id'=>$work_id,'sort_order'=>3);
                			        
                			         $set = array(
                    			                
                    			                'building_name'=>htmlspecialchars(strip_tags($request->post('third_buildings'))),
                    			                'updated_at'=>date('Y-m-d H:i:s')
                    			                
                    			               );
                    			               
                    			               MapBuildingModel::where($condition)->update($set);
                    			               
                    			               //$result = MapBuildingModel::insert($params);
                    			        
                    			    }
                			    }
        			    
        			    /*** close ****/
			    }
			    
			    
			    /*$result = AddWorkDetailsModel::insert($params);*/
			    
			    
			/** close **/    
			    	/** upload mutliple files ***/
		/*	if($request->hasfile('fileToUpload'))
                 {
                    foreach($request->file('fileToUpload') as $key => $file)
                    {
                        $path = $file->store('public/ivnm');
                        $name = $file->getClientOriginalName();
                        $file->move(public_path().'/ivnm/', $path);  
                        $params = array(
                            'work_id'=>$work_id,
                            'photo_url'=>$path,
                            'status'=>1,
                            'date'=>date('Y-m-d',strtotime($request->post('work_created_date')))
                            );
         
                        AddWorkPhotosModel::insert($params);
         
                    }
                 }*/
                 
                 
                 /** file 1 upload **/
            
            if($request->hasfile('fileToUpload1'))
                 {
                    /*foreach($request->file('fileToUpload') as $key => $file)
                    {*/
                        $file = $request->file('fileToUpload1');
                        $path = $file->store('public/ivnm');
                        $name = $file->getClientOriginalName();
                        $file->move(public_path().'/ivnm/', $path);  
                        $params = array(
                            'work_id'=>$work_id,
                            'photo_url'=>$path,
                            'status'=>3,
                            'date'=>date('Y-m-d',strtotime($request->post('work_created_date')))
                            );
         
                        AddWorkPhotosModel::insert($params);
         
                    /*}*/
                 }
            
            /** close **/
            
            /** file 2 upload **/
            
            if($request->hasfile('fileToUpload2'))
                 {
                    /*foreach($request->file('fileToUpload') as $key => $file)
                    {*/
                        $file = $request->file('fileToUpload2');
                        $path = $file->store('public/ivnm');
                        $name = $file->getClientOriginalName();
                        $file->move(public_path().'/ivnm/', $path);  
                        $params = array(
                            'work_id'=>$work_id,
                            'photo_url'=>$path,
                            'status'=>3,
                            'date'=>date('Y-m-d',strtotime($request->post('work_created_date')))
                            );
         
                        AddWorkPhotosModel::insert($params);
         
                    /*}*/
                 }
            
            /** close **/
            
             /** file 3 upload **/
            
            if($request->hasfile('fileToUpload3'))
                 {
                    /*foreach($request->file('fileToUpload') as $key => $file)
                    {*/
                        $file = $request->file('fileToUpload3');
                        $path = $file->store('public/ivnm');
                        $name = $file->getClientOriginalName();
                        $file->move(public_path().'/ivnm/', $path);  
                        $params = array(
                            'work_id'=>$work_id,
                            'photo_url'=>$path,
                            'status'=>3,
                            'date'=>date('Y-m-d',strtotime($request->post('work_created_date')))
                            );
         
                        AddWorkPhotosModel::insert($params);
         
                    /*}*/
                 }
            
            /** close **/
                 
            /** file upload completed **/
			
			          $response['status_code'] = "200";
                     $response['message']     = 'Updated successfully ';
                     echo json_encode($response);
			
        
        
        }
        /*** close ***/
        
        /*** get dropdown work details ***/
        
        public function getDropDownWorkDetails(Request $request)
        {
            
            
            
            $apk_version=  htmlspecialchars(strip_tags($request->post('apk_version')));
			$accessKey = htmlspecialchars(strip_tags($request->post('access_key')));
			$project_code = htmlspecialchars(strip_tags($request->post('project_code')));
			$ulbid = htmlspecialchars(strip_tags($request->post('ulbid')));
			$work_type_id = htmlspecialchars(strip_tags($request->post('work_type_id')));
			$session_id = htmlspecialchars(strip_tags($request->post('session_id')));
			$screen_code = htmlspecialchars(strip_tags($request->post('screen_code')));
			
			/*** check access key ***/
			     $params = array('project_code'=>$project_code,'access_key'=>$accessKey);
			     $userChk = new Helpers();
			     $result = $userChk->checkAccessKey($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
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
                     $response['status_code'] = "100";
                     $response['message']     = 'Please update your Application';
                     echo json_encode($response);
                     exit;
                 }
			
			/** close **/
			
			/** check user authentication ****/
			
			 $params = array('project_code'=>$project_code,'session_id'=>$session_id,'is_active'=>1);
			     $userChk = new Helpers();
			     $result = $userChk->checkUserAuthentication($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
                     $response['message']     = 'User authentication failed';
                     echo json_encode($response);
                     exit;
                 }
			
			
			/** close ***/
			
		/*** getting work details ****/
			
			
			$response['status_code'] = "200";
            $response['message']     = 'success';
            $response['data'] = array();
            $params = array('work_final_status'=>5,'is_site_selection_done'=>1,'ground_clearance_status'=>1,'ground_clearance_status'=>1,'ulbid'=>$ulbid,'work_type_id'=>$work_type_id,'tender_completed_status'=>1);
			$details = AddWorkDetailsModel::where($params)->get();
			
			$row['work_id'] = '0';
    		$row['work_name'] = '--- select -----';
    		array_push($response['data'],$row);
			
			if(count($details) > 0)
			{
    			foreach($details as $key=>$val)
    			{
    			    $row['work_id'] = $val->id;
    			    $row['work_name'] = $val->work_name;
    			    array_push($response['data'],$row);
    			}
			}
			
			
			
			
			
			/** close **/
        echo json_encode($response);
        exit;
        
        
        }
        
        /*** close ****/
        
        /*** update work ground clearance ****/
        
        public function updateWorkGroundClearance(Request $request)
        {
            
            
            
            $apk_version=  htmlspecialchars(strip_tags($request->post('apk_version')));
			$accessKey = htmlspecialchars(strip_tags($request->post('access_key')));
			$project_code = htmlspecialchars(strip_tags($request->post('project_code')));
			$ulbid = htmlspecialchars(strip_tags($request->post('ulbid')));
			$work_id = htmlspecialchars(strip_tags($request->post('work_id')));
			$session_id = htmlspecialchars(strip_tags($request->post('session_id')));
			
			/*** check access key ***/
			     $params = array('project_code'=>$project_code,'access_key'=>$accessKey);
			     
			     $userChk = new Helpers();
			     $result = $userChk->checkAccessKey($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
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
                     $response['status_code'] = "100";
                     $response['message']     = 'Please update your Application';
                     echo json_encode($response);
                     exit;
                 }
			
			/** close **/
			
			/** check user authentication ****/
			
			 $params = array('project_code'=>$project_code,'session_id'=>$session_id,'is_active'=>1);
			     $userChk = new Helpers();
			     $result = $userChk->checkUserAuthentication($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
                     $response['message']     = 'User authentication failed';
                     echo json_encode($response);
                     exit;
                 }
			
			
			/** close ***/
			
			/*** update work ground clearance details table: ivnm_ground_clearance_details **/
			
			$params = array(
			    
			    'ulbid'=>htmlspecialchars(strip_tags($request->post('ulbid'))),
			    'work_type_id'=>htmlspecialchars(strip_tags($request->post('work_type_id'))),
			    'work_id'=>htmlspecialchars(strip_tags($request->post('work_id'))),
			    'is_ground_clearance_done'=>htmlspecialchars(strip_tags($request->post('is_ground_clearance_done'))),
			    'if_gc_no_reasons'=>htmlspecialchars(strip_tags($request->post('if_gc_no_reasons'))),
			    'completeion_date'=>date('Y-m-d',strtotime($request->post('completeion_date'))),
			    'excepted_completion_date'=>date('Y-m-d',strtotime($request->post('excepted_completion_date'))),
			    'active_status'=>1,
			    'date'=>date('Y-m-d',strtotime($request->post('date')))
			    );
			    $set = array('active_status'=>0);
			    $condition = array('work_id'=>$work_id);
			    UpdateGroundClearanceModel::where($condition)->update($set);
			    $where=array('id'=>$work_id);
			    $result = UpdateGroundClearanceModel::insert($params);
			    
			    if($result)
			    {
			        if($request->post('is_ground_clearance_done')==1)
			        {
			            // updating ground clearance status in work_detail table
			            
			            $set = array('ground_clearance_status'=>1);
			            $condition = array('id'=>$work_id);
			            AddWorkDetailsModel::where($condition)->update($set);
			        }
			        
			        $response['status_code'] = "200";
                    $response['message']     = 'Updated successfully ';
			    }
			    else
			    {
			        $response['status_code'] = "100";
                    $response['message']     = 'Error. Try again';
			    }
			    
			    
			    
			
			
			         
                     echo json_encode($response);
			
        
        
        
        }
        
        
        /*** close ****/
        
        /*** updating townplanning clearance **/
        
        public function updateWorkTownplanningClearance(Request $request)
        {
            
            
            
            
            $apk_version=  htmlspecialchars(strip_tags($request->post('apk_version')));
			$accessKey = htmlspecialchars(strip_tags($request->post('access_key')));
			$project_code = htmlspecialchars(strip_tags($request->post('project_code')));
			$ulbid = htmlspecialchars(strip_tags($request->post('ulbid')));
			$work_id = htmlspecialchars(strip_tags($request->post('work_id')));
			$session_id = htmlspecialchars(strip_tags($request->post('session_id')));
			
			/*** check access key ***/
			     $params = array('project_code'=>$project_code,'access_key'=>$accessKey);
			     
			     $userChk = new Helpers();
			     $result = $userChk->checkAccessKey($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
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
                     $response['status_code'] = "100";
                     $response['message']     = 'Please update your Application';
                     echo json_encode($response);
                     exit;
                 }
			
			/** close **/
			
			/** check user authentication ****/
			
			 $params = array('project_code'=>$project_code,'session_id'=>$session_id,'is_active'=>1);
			     $userChk = new Helpers();
			     $result = $userChk->checkUserAuthentication($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
                     $response['message']     = 'User authentication failed';
                     echo json_encode($response);
                     exit;
                 }
			
			
			/** close ***/
			
			/*** update work ground clearance details table: ivnm_ground_clearance_details **/
			
			$params = array(
			    
			    'ulbid'=>htmlspecialchars(strip_tags($request->post('ulbid'))),
			    'work_type_id'=>htmlspecialchars(strip_tags($request->post('work_type_id'))),
			    'work_id'=>htmlspecialchars(strip_tags($request->post('work_id'))),
			    'is_townplaning_clearance_done'=>htmlspecialchars(strip_tags($request->post('is_townplaning_clearance_done'))),
			    'bpno'=>htmlspecialchars(strip_tags($request->post('bpno'))),
			    'if_tp_no_reasons'=>htmlspecialchars(strip_tags($request->post('if_tp_no_reasons'))),
			    'permission_date'=>date('Y-m-d',strtotime($request->post('permission_date'))),
			    'excepted_tpclearance_date'=>date('Y-m-d',strtotime($request->post('excepted_tpclearance_date'))),
			    
			    'active_status'=>1,
			    'date'=>date('Y-m-d',strtotime($request->post('date')))
			    );
			    $set = array('active_status'=>0);
			    $condition = array('work_id'=>$work_id);
			    UpdateTpClearanceModel::where($condition)->update($set);
			    $where=array('id'=>$work_id);
			    $result = UpdateTpClearanceModel::insert($params);
			    
			    if($result)
			    {
			        if($request->post('is_townplaning_clearance_done')==1)
			        {
			            // updating ground clearance status in work_detail table
			            
			            $set = array('tp_clearance_status'=>1);
			            $condition = array('id'=>$work_id);
			            AddWorkDetailsModel::where($condition)->update($set);
			        }
			        
			        $response['status_code'] = "200";
                    $response['message']     = 'Updated successfully ';
			    }
			    else
			    {
			        $response['status_code'] = "100";
                    $response['message']     = 'Error. Try again';
			    }
			    
			    
			    
			
			
			         
                     echo json_encode($response);
			
        
        
        
        
        }
        
        /*** close ****/
        
        /**** update work tender details ****/
        
        public function updateWorkTenderDetails(Request $request)
        {
            
            
            
            
            
            $apk_version=  htmlspecialchars(strip_tags($request->post('apk_version')));
			$accessKey = htmlspecialchars(strip_tags($request->post('access_key')));
			$project_code = htmlspecialchars(strip_tags($request->post('project_code')));
			$ulbid = htmlspecialchars(strip_tags($request->post('ulbid')));
			$work_id = htmlspecialchars(strip_tags($request->post('work_id')));
			$session_id = htmlspecialchars(strip_tags($request->post('session_id')));
			
			/*** check access key ***/
			     $params = array('project_code'=>$project_code,'access_key'=>$accessKey);
			     
			     $userChk = new Helpers();
			     $result = $userChk->checkAccessKey($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
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
                     $response['status_code'] = "100";
                     $response['message']     = 'Please update your Application';
                     echo json_encode($response);
                     exit;
                 }
			
			/** close **/
			
			/** check user authentication ****/
			
			 $params = array('project_code'=>$project_code,'session_id'=>$session_id,'is_active'=>1);
			     $userChk = new Helpers();
			     $result = $userChk->checkUserAuthentication($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
                     $response['message']     = 'User authentication failed';
                     echo json_encode($response);
                     exit;
                 }
			
			
			/** close ***/
			
			/*** update work ground clearance details table: ivnm_ground_clearance_details **/
			
			$params = array(
			    
			    'ulbid'=>htmlspecialchars(strip_tags($request->post('ulbid'))),
			    'work_type_id'=>htmlspecialchars(strip_tags($request->post('work_type_id'))),
			    'work_id'=>htmlspecialchars(strip_tags($request->post('work_id'))),
			    'tender_status'=>htmlspecialchars(strip_tags($request->post('tender_status'))),
			    'status_reason'=>htmlspecialchars(strip_tags($request->post('status_reason'))),
			    'tender_completed_date'=>date('Y-m-d',strtotime($request->post('tender_completed_date'))),
			    'work_awarded_status'=>htmlspecialchars(strip_tags($request->post('work_awarded_status'))),
			    'work_awarded_date'=>date('Y-m-d',strtotime($request->post('work_awarded_date'))),
			    'work_awarded_value'=>htmlspecialchars(strip_tags($request->post('work_awarded_value'))),
			    'agency_name'=>htmlspecialchars(strip_tags($request->post('agency_name'))),
			    'concern_person_name'=>htmlspecialchars(strip_tags($request->post('concern_person_name'))),
			    'designation'=>htmlspecialchars(strip_tags($request->post('designation'))),
			    'mobile'=>htmlspecialchars(strip_tags($request->post('mobile'))),
			    'work_award_expected_date'=>date('Y-m-d',strtotime($request->post('work_award_expected_date'))),
			    'active_status'=>1,
			    'date'=>date('Y-m-d',strtotime($request->post('date')))
			    );
			    $set = array('active_status'=>0);
			    $condition = array('work_id'=>$work_id);
			    UpdateTenderDetailsModel::where($condition)->update($set);
			    $where=array('id'=>$work_id);
			    $result = UpdateTenderDetailsModel::insert($params);
			    
			    if($result)
			    {
			        if($request->post('work_awarded_status')==1)
			        {
			            // updating ground clearance status in work_detail table
			            
			            $set = array('work_awarded_status'=>1,'work_awarded_value'=>htmlspecialchars(strip_tags($request->post('work_awarded_value'))));
			            $condition = array('id'=>$work_id);
			            AddWorkDetailsModel::where($condition)->update($set);
			        }
			        
			        $response['status_code'] = "200";
                    $response['message']     = 'Updated successfully ';
			    }
			    else
			    {
			        $response['status_code'] = "100";
                    $response['message']     = 'Error. Try again';
			    }
			    
			    
			    
			
			
			         
                     echo json_encode($response);
			
        
        
        
        
        
        }
        
        
        /** close ***/
        
        /*** tender status master details ****/
        public function getTenderStatusList(Request $request)
        {
            
            
            
            
            $apk_version=  htmlspecialchars(strip_tags($request->post('apk_version')));
			$accessKey = htmlspecialchars(strip_tags($request->post('access_key')));
			$project_code = htmlspecialchars(strip_tags($request->post('project_code')));
			$ulbid = htmlspecialchars(strip_tags($request->post('ulbid')));
			$work_type_id = htmlspecialchars(strip_tags($request->post('work_type_id')));
			$session_id = htmlspecialchars(strip_tags($request->post('session_id')));
			
			/*** check access key ***/
			     $params = array('project_code'=>$project_code,'access_key'=>$accessKey);
			     $userChk = new Helpers();
			     $result = $userChk->checkAccessKey($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
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
                     $response['status_code'] = "100";
                     $response['message']     = 'Please update your Application';
                     echo json_encode($response);
                     exit;
                 }
			
			/** close **/
			
			/** check user authentication ****/
			
			 $params = array('project_code'=>$project_code,'session_id'=>$session_id,'is_active'=>1);
			     $userChk = new Helpers();
			     $result = $userChk->checkUserAuthentication($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
                     $response['message']     = 'User authentication failed';
                     echo json_encode($response);
                     exit;
                 }
			
			
			/** close ***/
			
		/*** getting work details ****/
			
			
			$response['status_code'] = "200";
            $response['message']     = 'success';
            $response['data'] = array();
            
			$details = TenderStatusModel::get();
			
			$row['status_id'] = '0';
    		$row['status_name'] = '--- select -----';
    		array_push($response['data'],$row);
			
			if(count($details) > 0)
			{
    			foreach($details as $key=>$val)
    			{
    			    $row['status_id'] = $val->id;
    			    $row['status_name'] = $val->tender_description;
    			    array_push($response['data'],$row);
    			}
			}
			
			
			
			
			
			/** close **/
        echo json_encode($response);
        exit;
        
        
        
        }
        
        /** close ***/
        
        /**** get work awarded amount ***/
        
        public function getWorkAwardedAmount(Request $request)
        {
            
            
            
            
            $apk_version=  htmlspecialchars(strip_tags($request->post('apk_version')));
			$accessKey = htmlspecialchars(strip_tags($request->post('access_key')));
			$project_code = htmlspecialchars(strip_tags($request->post('project_code')));
			$ulbid = htmlspecialchars(strip_tags($request->post('ulbid')));
			$work_type_id = htmlspecialchars(strip_tags($request->post('work_type_id')));
			$session_id = htmlspecialchars(strip_tags($request->post('session_id')));
			$work_id = htmlspecialchars(strip_tags($request->post('work_id')));
			
			/*** check access key ***/
			     $params = array('project_code'=>$project_code,'access_key'=>$accessKey);
			     $userChk = new Helpers();
			     $result = $userChk->checkAccessKey($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
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
                     $response['status_code'] = "100";
                     $response['message']     = 'Please update your Application';
                     echo json_encode($response);
                     exit;
                 }
			
			/** close **/
			
			/** check user authentication ****/
			
			 $params = array('project_code'=>$project_code,'session_id'=>$session_id,'is_active'=>1);
			     $userChk = new Helpers();
			     $result = $userChk->checkUserAuthentication($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
                     $response['message']     = 'User authentication failed';
                     echo json_encode($response);
                     exit;
                 }
			
			
			/** close ***/
			
		/*** getting work awarded amount details ****/
			
			
			$response['status_code'] = "200";
            $response['message']     = 'success';
            $response['work_awarded_value']=0.0;
            $response['last_completed_amount'] = 0.0;
            $response['last_paid_amount'] = 0.0;
            
            $params = array('id'=>$work_id);
			$details = AddWorkDetailsModel::where($params)->get();
			if(count($details) > 0)
			{
			 $response['work_awarded_value']     = number_format($details[0]->tcv_amount,2);
			 
    			$params = array('work_id'=>$work_id,'active_status'=>1);
    			$details2 = FinancialProgressUpdateModel::where($params)->get();
    			if(count($details2) > 0)
    			{
    			 $response['last_completed_amount']     = $details2[0]->completed_amount;
    			 $response['last_paid_amount']     = $details2[0]->paid_amount;
    			}
			 
			}
			
			
		
			
			
			
			
			
			/** close **/
        echo json_encode($response);
        exit;
        
        
        
        }
        
        /** close ****/
        /*** get financial progress percent ****/
        
        
        public function getFinancilaProgressPercent(Request $request)
        {
            
            
            
            
            
            $apk_version=  htmlspecialchars(strip_tags($request->post('apk_version')));
			$accessKey = htmlspecialchars(strip_tags($request->post('access_key')));
			$project_code = htmlspecialchars(strip_tags($request->post('project_code')));
			$ulbid = htmlspecialchars(strip_tags($request->post('ulbid')));
			$work_type_id = htmlspecialchars(strip_tags($request->post('work_type_id')));
			$session_id = htmlspecialchars(strip_tags($request->post('session_id')));
			$work_id = htmlspecialchars(strip_tags($request->post('work_id')));
			$current_amount = htmlspecialchars(strip_tags($request->post('current_amount')));
			
			/*** check access key ***/
			     $params = array('project_code'=>$project_code,'access_key'=>$accessKey);
			     $userChk = new Helpers();
			     $result = $userChk->checkAccessKey($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
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
                     $response['status_code'] = "100";
                     $response['message']     = 'Please update your Application';
                     echo json_encode($response);
                     exit;
                 }
			
			/** close **/
			
			/** check user authentication ****/
			
			 $params = array('project_code'=>$project_code,'session_id'=>$session_id,'is_active'=>1);
			     $userChk = new Helpers();
			     $result = $userChk->checkUserAuthentication($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
                     $response['message']     = 'User authentication failed';
                     echo json_encode($response);
                     exit;
                 }
			
			
			/** close ***/
			
		/*** getting work financial percent details ****/
			
			
			$response['status_code'] = "200";
            $response['message']     = 'success';
            $response['financila_progress_percent']="0";
            $work_awarded_value = 0;
            
            $params = array('id'=>$work_id);
			$details = AddWorkDetailsModel::where($params)->get();
			if(count($details) > 0)
			{
			 $work_awarded_value = $details[0]->tcv_amount;
			}
			
			
		
			/** calculate percent ***/
			
			if($work_awarded_value>0)
			{
			  $percent = $current_amount/$work_awarded_value*100;
			}
			else
			{
			    $percent = 0;
			}
			
			$response['financila_progress_percent'] = sprintf('%.2f', $percent);
			/** close **/
			
			
			
			
			/** close **/
        echo json_encode($response);
        exit;
        
        
        
        
        }
        
        /*** close ****/
        
        /*** get physical progress works ***/
        
        public function getPhysicalProgressWorks(Request $request)
        {
            
            
            
            
            
            $apk_version=  htmlspecialchars(strip_tags($request->post('apk_version')));
			$accessKey = htmlspecialchars(strip_tags($request->post('access_key')));
			$project_code = htmlspecialchars(strip_tags($request->post('project_code')));
			$ulbid = htmlspecialchars(strip_tags($request->post('ulbid')));
			$work_type_id = htmlspecialchars(strip_tags($request->post('work_type_id')));
			$work_id = htmlspecialchars(strip_tags($request->post('work_id')));
			$building_id = htmlspecialchars(strip_tags($request->post('building_id')));
			$session_id = htmlspecialchars(strip_tags($request->post('session_id')));
			
			/*** check access key ***/
			     $params = array('project_code'=>$project_code,'access_key'=>$accessKey);
			     $userChk = new Helpers();
			     $result = $userChk->checkAccessKey($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
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
                     $response['status_code'] = "100";
                     $response['message']     = 'Please update your Application';
                     echo json_encode($response);
                     exit;
                 }
			
			/** close **/
			
			/** check user authentication ****/
			
			 $params = array('project_code'=>$project_code,'session_id'=>$session_id,'is_active'=>1);
			     $userChk = new Helpers();
			     $result = $userChk->checkUserAuthentication($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
                     $response['message']     = 'User authentication failed';
                     echo json_encode($response);
                     exit;
                 }
			
			
			/** close ***/
			
			/** get last active record from work progress tables with selected work ***/
			
			if($building_id > 0)
			{
			
			$last_physical_progress_sortorder = 0;
			$params = array('work_id'=>$work_id,'active_status'=>1,'building_id'=>$building_id);
			$result = WorkPregressDetailsModel::where($params)->get();
			if(count($result) > 0)
			{
			
    			$params = array('active_status'=>1,'work_id'=>$work_id,'work_status_id'=>2);
    			$result2 = WorkPregressDetailsModel::where($params)->get();
    			if(count($result2) > 0)
    			{
    			$last_physical_progress_sortorder = $result2[0]->physical_progress_sortorder;
    			
    			}
    			else
    			{
    			    $last_physical_progress_sortorder = $result[0]->physical_progress_sortorder-1;
    			}
			}
			
			$required_physical_progress_sortorder = $last_physical_progress_sortorder+1;
			}
			else
			{
			    $required_physical_progress_sortorder=0;
			}
			/** close ***/
			
		/*** getting work physical progress dropdownl details ****/
			
			
			$response['status_code'] = "200";
            $response['message']     = 'success';
            $response['data'] = array();
            if($work_type_id==1)
            {
            $condition = array('sort_order'=>$required_physical_progress_sortorder,'work_type'=>$work_type_id);
            $details = PhysicalProgressListModel::where($condition)->get();
            }
            else
            {
                $params = array('work_id'=>$work_id,'work_status_id'=>2);
                $result = WorkPregressDetailsModel::where($params)->get();
                $selectedStatusList=array();
                foreach($result as $key=>$val)
                {
                    $selectedStatusList[$val->physical_progress_id] = $val->physical_progress_id;
                }
                
                $condition = array('work_type'=>$work_type_id);
                $details = PhysicalProgressListModel::where($condition)->whereNotIn('id', $selectedStatusList)->get();
            }
			
			
			$row['status_id'] = '0';
    		$row['status_name'] = '--- select -----';
    		array_push($response['data'],$row);
			
			if(count($details) > 0)
			{
    			foreach($details as $key=>$val)
    			{
    			    $row['status_id'] = $val->id."_".$val->sort_order;
    			    $row['status_name'] = $val->description;
    			    array_push($response['data'],$row);
    			}
			}
			
			
			
			
			
			/** close **/
        echo json_encode($response);
        exit;
        
        
        
        
        }
        
        /*** close ****/
        /** get work progress list ****/
        
        public function getWorkStatusList(Request $request)
        {
            
            
            
            
            
            $apk_version=  htmlspecialchars(strip_tags($request->post('apk_version')));
			$accessKey = htmlspecialchars(strip_tags($request->post('access_key')));
			$project_code = htmlspecialchars(strip_tags($request->post('project_code')));
			$ulbid = htmlspecialchars(strip_tags($request->post('ulbid')));
			$session_id = htmlspecialchars(strip_tags($request->post('session_id')));
			
			/*** check access key ***/
			     $params = array('project_code'=>$project_code,'access_key'=>$accessKey);
			     $userChk = new Helpers();
			     $result = $userChk->checkAccessKey($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
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
                     $response['status_code'] = "100";
                     $response['message']     = 'Please update your Application';
                     echo json_encode($response);
                     exit;
                 }
			
			/** close **/
			
			/** check user authentication ****/
			
			 $params = array('project_code'=>$project_code,'session_id'=>$session_id,'is_active'=>1);
			     $userChk = new Helpers();
			     $result = $userChk->checkUserAuthentication($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
                     $response['message']     = 'User authentication failed';
                     echo json_encode($response);
                     exit;
                 }
			
			
			/** close ***/
			
		/*** getting work physical progress dropdownl details ****/
			
			
			$response['status_code'] = "200";
            $response['message']     = 'success';
            $response['data'] = array();
            
			$details = WorkProgressListModel::get();
			
			$row['status_id'] = '0';
    		$row['status_name'] = '--- select -----';
    		array_push($response['data'],$row);
			
			if(count($details) > 0)
			{
    			foreach($details as $key=>$val)
    			{
    			    $row['status_id'] = $val->id;
    			    $row['status_name'] = $val->description;
    			    array_push($response['data'],$row);
    			}
			}
			
			
			
			
			
			/** close **/
        echo json_encode($response);
        exit;
        
        
        
        
        }
        
        /*** close ****/
        
        /*** update work progress details ***/
        
        public function updateWorkProgressDetails(Request $request)
        {
            
            
            
            
            
            
            $apk_version=  htmlspecialchars(strip_tags($request->post('apk_version')));
			$accessKey = htmlspecialchars(strip_tags($request->post('access_key')));
			$project_code = htmlspecialchars(strip_tags($request->post('project_code')));
			$ulbid = htmlspecialchars(strip_tags($request->post('ulbid')));
			$work_id = htmlspecialchars(strip_tags($request->post('work_id')));
			$session_id = htmlspecialchars(strip_tags($request->post('session_id')));
			$building_id = htmlspecialchars(strip_tags($request->post('building_id')));
			$remarks = htmlspecialchars(strip_tags($request->post('remarks')));
			
			/*** check access key ***/
			     $params = array('project_code'=>$project_code,'access_key'=>$accessKey);
			     
			     $userChk = new Helpers();
			     $result = $userChk->checkAccessKey($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
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
                     $response['status_code'] = "100";
                     $response['message']     = 'Please update your Application';
                     echo json_encode($response);
                     exit;
                 }
			
			/** close **/
			
			/** check user authentication ****/
			
			 $params = array('project_code'=>$project_code,'session_id'=>$session_id,'is_active'=>1);
			     $userChk = new Helpers();
			     $result = $userChk->checkUserAuthentication($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
                     $response['message']     = 'User authentication failed';
                     echo json_encode($response);
                     exit;
                 }
			
			
			/** close ***/
			
			/*** update work ground clearance details table: ivnm_ground_clearance_details **/
			
			
			 /** get physical status checklist percent values ***/
			        
			        $list = PhysicalProgressListModel::get();
			        foreach($list as $key=>$val)
			        {
			            $physical_progress_percent_values[$val->id]=$val->completed_percent; 
			        }
			        
			        /** close ***/
			
			/** update activestatus in **/
			$set = array('active_status'=>0);
			$where = array('work_id'=>$work_id,'building_id'=>$building_id);
			WorkPregressDetailsModel::where($where)->update($set);
			
			/** close **/
			
			$val = explode("_",htmlspecialchars(strip_tags($request->post('physical_progress_id'))));;
			$physical_progress_id = $val[0];
			$physical_progress_sortorder = $val[1];
			
			$params = array(
			    
			    'ulbid'=>htmlspecialchars(strip_tags($request->post('ulbid'))),
			    'work_type_id'=>htmlspecialchars(strip_tags($request->post('work_type_id'))),
			    'work_id'=>htmlspecialchars(strip_tags($request->post('work_id'))),
			    'building_id'=>$building_id,
			    'current_amount'=>htmlspecialchars(strip_tags($request->post('current_amount'))),
			    'physical_progress_id'=>$physical_progress_id,
			    'physical_progress_sortorder'=>$physical_progress_sortorder,
			    'work_status_id'=>htmlspecialchars(strip_tags($request->post('work_status_id'))),
			    'financial_progress_percent'=> htmlspecialchars(strip_tags($request->post('financial_progress_percent'))),
			    'physical_progress_percent'=>$physical_progress_percent_values[$val[0]],
			    'pickup_location'=>htmlspecialchars(strip_tags($request->post('pickup_location'))),
			    'latitude'=>htmlspecialchars(strip_tags($request->post('latitude'))),
			    'langitude'=>htmlspecialchars(strip_tags($request->post('langitude'))),
			    'date'=>date('Y-m-d',strtotime($request->post('date'))),
			    'remarks'=>$remarks
			    );
			    
			    
			    $result = WorkPregressDetailsModel::insert($params);
			    
			    if($result)
			    {
			       
			        
			        
			        /*** calculate physical work percentage ****/
			        $total_physical_percent = 0;
			        $condigion = array('work_status_id'=>2,'work_id'=>$work_id);
			        $total_work_underprogress_records = WorkPregressDetailsModel::where($condigion)->get();
			        foreach($total_work_underprogress_records as $key=>$val)
			        {
			            $total_physical_percent+=$physical_progress_percent_values[$val->physical_progress_id]; 
			        }
			        
			        
			        /** close ***/
			        
			            // updating financial_progress_percent in work_detail table
			            $final_status = 5;
			            if($total_physical_percent >=100)
			            {
			                $final_status = 6;
			            }
			           
			            
			            $set = array('work_final_status'=>$final_status,'work_in_progress_status'=>1,'physical_progress_percent'=>$total_physical_percent,'work_progress_last_status'=>$physical_progress_id,'remarks'=>$remarks);
			            $condition = array('id'=>$work_id);
			            AddWorkDetailsModel::where($condition)->update($set);
			            
			            
			            
			            /*** upload images ****/
			            
			            if($request->hasfile('fileToUpload1'))
                 {
                    /*foreach($request->file('fileToUpload') as $key => $file)
                    {*/
                        $file = $request->file('fileToUpload1');
                        $path = $file->store('public/ivnm');
                        $name = $file->getClientOriginalName();
                        $file->move(public_path().'/ivnm/', $path);  
                        $params = array(
                            'work_id'=>$work_id,
                            'photo_url'=>$path,
                            'status'=>2,
                            'physical_progress_id'=>$physical_progress_id,
                            'date'=>date('Y-m-d',strtotime($request->post('date')))
                            );
         
                        AddWorkPhotosModel::insert($params);
         
                    /*}*/
                 }
            
            /** close **/
            
            /** file 2 upload **/
            
            if($request->hasfile('fileToUpload2'))
                 {
                    /*foreach($request->file('fileToUpload') as $key => $file)
                    {*/
                        $file = $request->file('fileToUpload2');
                        $path = $file->store('public/ivnm');
                        $name = $file->getClientOriginalName();
                        $file->move(public_path().'/ivnm/', $path);  
                        $params = array(
                            'work_id'=>$work_id,
                            'photo_url'=>$path,
                            'status'=>2,
                            'physical_progress_id'=>$physical_progress_id,
                            'date'=>date('Y-m-d',strtotime($request->post('date')))
                            );
         
                        AddWorkPhotosModel::insert($params);
         
                    /*}*/
                 }
            
            /** close **/
            
             /** file 3 upload **/
            
            if($request->hasfile('fileToUpload3'))
                 {
                    /*foreach($request->file('fileToUpload') as $key => $file)
                    {*/
                        $file = $request->file('fileToUpload3');
                        $path = $file->store('public/ivnm');
                        $name = $file->getClientOriginalName();
                        $file->move(public_path().'/ivnm/', $path);  
                        $params = array(
                            'work_id'=>$work_id,
                            'photo_url'=>$path,
                            'status'=>2,
                            'physical_progress_id'=>$physical_progress_id,
                            'date'=>date('Y-m-d',strtotime($request->post('date')))
                            );
         
                        AddWorkPhotosModel::insert($params);
         
                    /*}*/
                 }
            
            /** close **/
			            
			            /*** close ****/
			            
			            
			        
			        
			        $response['status_code'] = "200";
                    $response['message']     = 'Updated successfully ';
			    }
			    else
			    {
			        $response['status_code'] = "100";
                    $response['message']     = 'Error. Try again';
			    }
			    
			    
			    
			
			
			         
                     echo json_encode($response);
			
        
        
        
        
        
        
        }
        
        /*** close ****/
        
        
        /*** Yes or no api ***/
        
        public function ynList(Request $request)
        {
            
            
            
            
            
            $apk_version=  htmlspecialchars(strip_tags($request->post('apk_version')));
			$accessKey = htmlspecialchars(strip_tags($request->post('access_key')));
			$project_code = htmlspecialchars(strip_tags($request->post('project_code')));
			$ulbid = htmlspecialchars(strip_tags($request->post('ulbid')));
			$session_id = htmlspecialchars(strip_tags($request->post('session_id')));
			
			/*** check access key ***/
			     $params = array('project_code'=>$project_code,'access_key'=>$accessKey);
			     $userChk = new Helpers();
			     $result = $userChk->checkAccessKey($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
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
                     $response['status_code'] = "100";
                     $response['message']     = 'Please update your Application';
                     echo json_encode($response);
                     exit;
                 }
			
			/** close **/
			
			/** check user authentication ****/
			
			 $params = array('project_code'=>$project_code,'session_id'=>$session_id,'is_active'=>1);
			     $userChk = new Helpers();
			     $result = $userChk->checkUserAuthentication($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
                     $response['message']     = 'User authentication failed';
                     echo json_encode($response);
                     exit;
                 }
			
			
			/** close ***/
			
		/*** getting work physical progress dropdownl details ****/
			
			
			$response['status_code'] = "200";
            $response['message']     = 'success';
            $response['data'] = array();
            
			$details = WorkProgressListModel::get();
			
			$row['status_id'] = '0';
    		$row['status_name'] = '--- select -----';
    		array_push($response['data'],$row);
			$details=array('1'=>'Yes','2'=>'No');
			if(count($details) > 0)
			{
    			foreach($details as $key=>$val)
    			{
    			    $row['status_id'] = $key;
    			    $row['status_name'] = $val;
    			    array_push($response['data'],$row);
    			}
			}
			
			
			
			
			
			/** close **/
        echo json_encode($response);
        exit;
        
        
        
        
        }
        
        /*** close ****/
        /**** dashboard api *****/
        
        public function dashboard(Request $request)
        {
            
            
            
            
            
            $apk_version=  htmlspecialchars(strip_tags($request->post('apk_version')));
			$accessKey = htmlspecialchars(strip_tags($request->post('access_key')));
			$project_code = htmlspecialchars(strip_tags($request->post('project_code')));
			$ulbid = htmlspecialchars(strip_tags($request->post('ulbid')));
			$session_id = htmlspecialchars(strip_tags($request->post('session_id')));
			
			/*** check access key ***/
			     $params = array('project_code'=>$project_code,'access_key'=>$accessKey);
			     $userChk = new Helpers();
			     $result = $userChk->checkAccessKey($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
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
                     $response['status_code'] = "100";
                     $response['message']     = 'Please update your Application';
                     echo json_encode($response);
                     exit;
                 }
			
			/** close **/
			
			/** check user authentication ****/
			
			 $params = array('project_code'=>$project_code,'session_id'=>$session_id,'is_active'=>1);
			     $userChk = new Helpers();
			     $result = $userChk->checkUserAuthentication($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
                     $response['message']     = 'User authentication failed';
                     echo json_encode($response);
                     exit;
                 }
			
			
			/** close ***/
			
		/*** getting dashboard data ****/
			
			
			$response['status_code'] = "200";
            $response['message']     = 'success';
            $response['data'] = array();
            
			/*** getting work details ****/
			
			
		
            $result = WorkTypeModel::get();
            foreach($result as $key=>$val)
            {
                $work_type_list[$val->id] = $val->work_type;
            }
            $params = array('ulbid'=>$ulbid);
			$details = AddWorkDetailsModel::where($params)->get();
			
			if(count($details) > 0)
			{
    			foreach($details as $key=>$val)
    			{
    			    $row['work_id'] = $val->id;
    			    $row['work_name'] = $val->work_name;
    			    $row['work_type'] = $work_type_list[$val->work_type_id];
    			    $row['work_physical_progress'] = number_format($val->physical_progress_percent,2);
    			    $row['work_financial_progress'] = number_format($val->financial_progress_percent,2);
    			    array_push($response['data'],$row);
    			}
			}
			else
			{
			        $row['work_id'] = '0';
    			    $row['work_name'] = 'Data not found';
    			    array_push($response['data'],$row);
			}
			
			
			
			
			
			/** close **/
        echo json_encode($response);
        exit;
        
        
        
        
        }
        
        /**** close *****/
        /**** financil progress update ****/
        
        public function updateWorkFinancialProgress(Request $request)
        {
            
            
            
            
            
            
            $apk_version=  htmlspecialchars(strip_tags($request->post('apk_version')));
			$accessKey = htmlspecialchars(strip_tags($request->post('access_key')));
			$project_code = htmlspecialchars(strip_tags($request->post('project_code')));
			$ulbid = htmlspecialchars(strip_tags($request->post('ulbid')));
			$session_id = htmlspecialchars(strip_tags($request->post('session_id')));
			$work_type_id = htmlspecialchars(strip_tags($request->post('work_type_id')));
			$work_id = htmlspecialchars(strip_tags($request->post('work_id')));
			$completed_amount = htmlspecialchars(strip_tags($request->post('completed_amount')));
			$paid_amount = htmlspecialchars(strip_tags($request->post('paid_amount')));
			$percent_amount = (float)htmlspecialchars(strip_tags($request->post('percent_amount')));
			
			/*** check access key ***/
			     $params = array('project_code'=>$project_code,'access_key'=>$accessKey);
			     $userChk = new Helpers();
			     $result = $userChk->checkAccessKey($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
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
                     $response['status_code'] = "100";
                     $response['message']     = 'Please update your Application';
                     echo json_encode($response);
                     exit;
                 }
			
			/** close **/
			
			/** check user authentication ****/
			
			 $params = array('project_code'=>$project_code,'session_id'=>$session_id,'is_active'=>1);
			     $userChk = new Helpers();
			     $result = $userChk->checkUserAuthentication($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
                     $response['message']     = 'User authentication failed';
                     echo json_encode($response);
                     exit;
                 }
			
			
			/** close ***/
			
		/*** getting dashboard data ****/
			
			
			
            
            
			/*** insert work financila  details ****/
			
			$set = array('active_status'=>0);
			$condition = array('work_id'=>$work_id);
			FinancialProgressUpdateModel::where($condition)->update($set);
			
		    $params = array(
		        'work_type_id'=>$work_type_id,
		        'work_id'=>$work_id,
		        'completed_amount'=>$completed_amount,
		        'paid_amount'=>$paid_amount,
		        'amount_percent'=>(float)$percent_amount,
		        'active_status'=>1
		        );
		        
			$result = FinancialProgressUpdateModel::insert($params);
			if($result)
			{
			    $set = array('financial_progress_percent'=>(float)$percent_amount);
			    $condition = array('id'=>$work_id);
			    AddWorkDetailsModel::where($condition)->update($set);
			    $response['status_code'] = "200";
                $response['message']     = 'Updated successfully';
			}
			else
			{
			     $response['status_code'] = "100";
                 $response['message']     = 'Error. Try again later';
			}
			
			
			
			
			
			
			
			/** close **/
        echo json_encode($response);
        exit;
        
        
        
        
        
        }
        
        
        /*** close ****/
        
        public function getBuildingDetails(Request $request)
        {
            
            
            
            
            
            
            $apk_version=  htmlspecialchars(strip_tags($request->post('apk_version')));
			$accessKey = htmlspecialchars(strip_tags($request->post('access_key')));
			$project_code = htmlspecialchars(strip_tags($request->post('project_code')));
			$ulbid = htmlspecialchars(strip_tags($request->post('ulbid')));
			$session_id = htmlspecialchars(strip_tags($request->post('session_id')));
			$work_id = htmlspecialchars(strip_tags($request->post('work_id')));
			
			/*** check access key ***/
			     $params = array('project_code'=>$project_code,'access_key'=>$accessKey);
			     $userChk = new Helpers();
			     $result = $userChk->checkAccessKey($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
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
                     $response['status_code'] = "100";
                     $response['message']     = 'Please update your Application';
                     echo json_encode($response);
                     exit;
                 }
			
			/** close **/
			
			/** check user authentication ****/
			
			 $params = array('project_code'=>$project_code,'session_id'=>$session_id,'is_active'=>1);
			     $userChk = new Helpers();
			     $result = $userChk->checkUserAuthentication($params);
                 if(count($result)<=0)
                 {
                     $response['status_code'] = "100";
                     $response['message']     = 'User authentication failed';
                     echo json_encode($response);
                     exit;
                 }
			
			
			/** close ***/
			
		/*** getting work physical progress dropdownl details ****/
			
			
			$response['status_code'] = "200";
            $response['message']     = 'success';
            $response['data'] = array();
            
            $params = array('work_id'=>$work_id);
            
			$details = MapBuildingModel::where($params)->get();
			
			$row['building_id'] = '0';
    		$row['building_name'] = '--- select -----';
    		array_push($response['data'],$row);
			
			if(count($details) > 0)
			{
    			foreach($details as $key=>$val)
    			{
    			    $row['building_id'] = $val->id;
    			    $row['building_name'] = $val->building_name;
    			    array_push($response['data'],$row);
    			}
			}
			
			
			
			
			
			/** close **/
        echo json_encode($response);
        exit;
        
        
        
        
        
        }
    
}
