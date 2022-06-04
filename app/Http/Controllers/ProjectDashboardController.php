<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProjectModel;
use App\Models\WardModel;
use App\Models\UlbmstModel;
use App\Models\UlbHouseholdData;
use App\Models\UlbCleanedDataModel;
use App\Helper\Helpers;
use Session;
error_reporting(0);

class ProjectDashboardController extends Controller
{
     public function index(Request $request,$id)
        {
            /** checkin user authentication ***/
                 $userChk = new Helpers();
                 $result = $userChk->checkUser();
            /** close **/
            
            /** get assigned menus **/
            Session::put('project_id',$id);
            $params = array(
                
                'menu_project_id'=>Session::get('project_id'),
                'user_id'=>Session::get('user_id')
                );
                
                print_r($params);
            $data['services'] = $userChk->getAssignedMenus($params);
            /*print_r($data['services']);
            exit;*/
            
            
            /** close **/
            
                 
                 Session::put('project_id',$id);
                 $params = array('id'=>$id);
                 $data['projectDetails'] = ProjectModel::where($params)->get();
                 Session::put(array('project_name'=>$data['projectDetails'][0]->project_name));
                 $data['project_id'] = $id;
                 return view('project_dashboard',$data);
           
            
        }
        
        // cdma login ward wise report
        
        public function ulbWardwiseReport(Request $request)
        {
            /** checkin user authentication ***/
                 $userChk = new Helpers();
                 $result = $userChk->checkUser();
            /** close **/
            
           /** get assigned menus **/
            
            $params = array(
                
                'menu_project_id'=>Session::get('project_id'),
                'user_id'=>Session::get('user_id')
                );
            $data['services'] = $userChk->getAssignedMenus($params);
            
            
            /** close **/
                
                
                 if($request->post('search'))
                    {
                        $ulbid = htmlspecialchars(strip_tags($request->post('ulbid')));
                        $date = htmlspecialchars(strip_tags($request->post('datesel')));
                        $params = array('ulbid'=>$ulbid);
                        $data['datesel'] = $date;
                        $fromDate = $date;
                        $toDate = $date;
                        
                    }
                    else
                    {
                        
                         $flag = $request->get('flag');
                          if($flag)
                          {
                              $ulbid = $request->get('ulbid');
                              $fromDate = $request->get('datefrom');
                              $toDate = $request->get('dateto');
                          }
                          
                    $data['ulbid'] = $ulbid;
                    
                    // get ulbname 
                    
                    $data['ulbname'] = UlbmstModel::where('ulbid',$ulbid)->get();
                    
                    $params = array('ulbid'=>$ulbid);
                    $data['fromdate'] = $fromDate;;
                    $data['todate'] = $toDate;;
                    }
                
                
                
                
              /** if page redirecting from ulb wise report in cdma login get ulbid, selected from date and selected to date ***/
             
              
              
              /** close **/
              
              
                /*** get ward data **/
                $params = array('ulbid'=>$ulbid);
                $data['wardList'] = WardModel::where($params)->get();
                foreach($data['ulbList'] as $key=>$val)
                {
                     $data['houseHoles'][$val->ward_id]['households'] = 0;
                     $data['houseHolesCleanedData'][$val->ward_id]['cleanedCount'] = 0;
                     $data['houseHolesCleanedData'][$val->ward_id]['percent'] = 0;
                }
                /** close **/
                
                /** get house hold data **/
                $params = array('ulbid'=>$ulbid);
                $houseHoles = UlbHouseholdData::where($params)->get();
                foreach($houseHoles as $key=>$val)
                {
                    $data['houseHoles'][$val->ward_id]['households'] = $val->households;
                    $data['houseHoles'][$val->ward_id]['otherestablishments'] = $val->comm_establishments+$val->institutions;
                }
                /** close **/
                
                /*** get house hold cleaned data **/
                
                 
                
                $params = array('ulbid'=>$ulbid);
                
                $houseHolesCleanedData = UlbCleanedDataModel::selectRaw('sum(cleaned_count) as cleaned_count,ward_id')->where($params)->where('date','>=',$fromDate)->where('date','<=',$toDate)->groupBy('ward_id')->get();
                foreach($houseHolesCleanedData as $key=>$val)
                {
                    $data['houseHolesCleanedData'][$val->ward_id]['cleanedCount'] = $val->cleaned_count;
                    $data['houseHolesCleanedData'][$val->ward_id]['percent'] = number_format($val->cleaned_count/$data['houseHoles'][$val->ward_id]['households']*100,2);
                }
                /** close ***/
                
                return view('/ulb_wardwise_report',$data);
            
           
        }
        
        /// ulb login ward wise report
        
        public function wardwiseReport(Request $request)
        {
            
                
                /** checkin user authentication ***/
                 $userChk = new Helpers();
                 $result = $userChk->checkUser();
               /** close **/
               
               /** get assigned menus **/
            
            $params = array(
                
                'menu_project_id'=>Session::get('project_id'),
                'user_id'=>Session::get('user_id')
                );
            $data['services'] = $userChk->getAssignedMenus($params);
            
            
            /** close **/
              
              
                /*** get ward data **/
                $params = array('ulbid'=>Session::get('ulbid'));
                $data['wardList'] = WardModel::where($params)->get();
                foreach($data['ulbList'] as $key=>$val)
                {
                     $data['houseHoles'][$val->ward_id]['households'] = 0;
                     $data['houseHolesCleanedData'][$val->ward_id]['cleanedCount'] = 0;
                     $data['houseHolesCleanedData'][$val->ward_id]['percent'] = 0;
                }
                /** close **/
                
                /** get house hold data **/
                $params = array('ulbid'=>Session::get('ulbid'));
                $houseHoles = UlbHouseholdData::where($params)->get();
                foreach($houseHoles as $key=>$val)
                {
                    $data['houseHoles'][$val->ward_id]['households'] = $val->households;
                }
                /** close **/
                
                /*** get house hold cleaned data **/
                
                  if($request->post('search'))
                    {
                        $date = htmlspecialchars(strip_tags($request->post('datesel')));
                        $params = array('ulbid'=>Session::get('ulbid'),'date'=>$date);
                        $data['datesel'] = $date;
                        $fromDate = $date;
                        $toDate = $date;
                    }
                    else
                    {
                    
                    $params = array('ulbid'=>Session::get('ulbid'),'date'=>date('Y-m-d'));
                    $data['datesel'] = date('Y-m-d');;
                    }
                
                
                
                $houseHolesCleanedData = UlbCleanedDataModel::where($params)->get();
                foreach($houseHolesCleanedData as $key=>$val)
                {
                    $data['houseHolesCleanedData'][$val->ward_id]['cleanedCount'] = $val->cleaned_count;
                    $data['houseHolesCleanedData'][$val->ward_id]['percent'] = $val->percent;
                }
                /** close ***/
                
                return view('/wardwise_report',$data);
           
        }
        
        // cdma loign ulbwise report
        
        public function ulbCleanReport(Request $request)
        {
            /** checkin user authentication ***/
                 $userChk = new Helpers();
                 $result = $userChk->checkUser();
            /** close **/
            
            /** get assigned menus **/
            
            $params = array(
                
                'menu_project_id'=>Session::get('project_id'),
                'user_id'=>Session::get('user_id')
                );
            $data['services'] = $userChk->getAssignedMenus($params);
            
            
            /** close **/
              /** search area **/  
                if($request->post('search'))
                    {
                        $fromdate = htmlspecialchars(strip_tags($request->post('datesel')));
                       // $todate = htmlspecialchars(strip_tags($request->post('todatesel')));
                       $todate = htmlspecialchars(strip_tags($request->post('datesel')));
                        $ulbid = htmlspecialchars(strip_tags($request->post('ulbid')));
                        
                        $data['fromdatesel'] = $fromdate;
                        $data['todatesel'] = $fromdate;
                        
                    }
                    else
                    {
                    
                        $fromdate = date('Y-m-d');
                        $todate = date('Y-m-d');
                        
                        $data['fromdatesel'] = $fromdate;
                        $data['todatesel'] = $todate;
                        $ulbid = "";
                    }
                    $data['ulbidsel'] = $ulbid;
                    
                    
                
              /** close **/
              
                /*** get ulb data **/
                $data['ulbList'] = UlbmstModel::get();
                foreach($data['ulbList'] as $key=>$val)
                {
                     
                     $data['houseHoles'][$val->ulbid]['households'] = 0;
                     $data['houseHoles'][$val->ulbid]['otherestablishments'] = 0;
                     $data['houseHolesCleanedData'][$val->ulbid]['cleanedCount'] = 0;
                     $data['houseHolesCleanedData'][$val->ulbid]['percent'] = 0;
                     $data[$val->ulbid]['ulbname'] = $val->ulbname;
                }
                $data['ulbListsearch'] = UlbmstModel::where('ulbid','LIKE',"%{$ulbid}%")->get();
                $data['ulbname'] = 'All';
                if(!empty($ulbid))
                {
                  $data['ulbname'] = $data[$ulbid]['ulbname'];
                }
                /** close **/
                
                /** get house hold data **/
                
                $houseHoles = UlbHouseholdData::selectRaw('sum(households) as households,sum(comm_establishments+institutions) as otherestablishments,ulbid')->groupBy('ulbid')->get();
                foreach($houseHoles as $key=>$val)
                {
                    $data['houseHoles'][$val->ulbid]['households'] = $val->households;
                    $data['houseHoles'][$val->ulbid]['otherestablishments'] = $val->otherestablishments;
                }
                /** close **/
                
                /*** get house hold cleaned data **/
                
                  
                
                
                
                $houseHolesCleanedData = UlbCleanedDataModel::selectRaw('sum(cleaned_count) as cleaned_count,ulbid')->where('date','>=',$fromdate)->where('date','<=',$todate)->groupBy('ulbid')->get();
                foreach($houseHolesCleanedData as $key=>$val)
                {
                    $data['houseHolesCleanedData'][$val->ulbid]['cleanedCount'] = $val->cleaned_count;
                    $data['houseHolesCleanedData'][$val->ulbid]['percent'] = number_format($val->cleaned_count/$data['houseHoles'][$val->ulbid]['households']*100,2);
                }
                /** close ***/
                
                
            
                
                
                
                return view('/ulbwise_report',$data);
           
        }
        /** cdma loign date wise report **/
        
        
        public function date_range($first, $last, $step = '+1 day', $output_format = 'Y-m-d' )
        	{
        
        	    $dates = array();
        	    $current = strtotime($first);
        	    $last = strtotime($last);
        	    
        
        	    while( $current <= $last ) {
        	
        	        $dates[] = date($output_format, $current);
        	        $current = strtotime($step, $current);
        	    }
        	
        	    return $dates;
        	} 
        
        public function ulbDateCleanReport(Request $request)
        {
            
                /** checkin user authentication ***/
                 $userChk = new Helpers();
                 $result = $userChk->checkUser();
            /** close **/
            
            /** get assigned menus **/
            
            $params = array(
                
                'menu_project_id'=>Session::get('project_id'),
                'user_id'=>Session::get('user_id')
                );
            $data['services'] = $userChk->getAssignedMenus($params);
            
            
            /** close **/
            
                $data['ulbListsearch']=array();
                $data['arr_dates']=array();
               
                /*** get ulb data **/
                
                $data['ulbList'] = UlbmstModel::get();
                foreach($data['ulbList'] as $key=>$val)
                {
                    $data[$val->ulbid]['ulbname']=$val->ulbname;;
                }
               
                
                /** close **/
              /** search area **/  
              
                if($request->post('search'))
                    {
                        $fromdate = htmlspecialchars(strip_tags($request->post('datesel')));
                        $todate = htmlspecialchars(strip_tags($request->post('todatesel')));
                        $ulbid = htmlspecialchars(strip_tags($request->post('ulbid')));
                        
                        $data['fromdatesel'] = $fromdate;
                        $data['todatesel'] = $todate;
                        $data['ulbListsearch'] = WardModel::where('ulbid','LIKE',"%{$ulbid}%")->get();
                        $data['ulbidsel'] = $ulbid;
                        
                        $data['ulbname'] = 'All';
                        
                        if(!empty($ulbid))
                        {
                            
                          $data['ulbname'] = $data[$ulbid]['ulbname'];
                          
                        }
                        
                        $data['arr_dates']=$this->date_range($fromdate, $todate);
                         foreach($data['arr_dates'] as $key=>$val)
                            {
                                
                                 $data['houseHolesCleanedData'][$val]['cleanedCount'] = 0;
                                 $data['houseHolesCleanedData'][$val]['percent'] = 0;
                            }
                
              /** close **/
              
                
                
                /** get house hold data **/
                $params = array('ulbid'=>$ulbid);
                $houseHoles = UlbHouseholdData::selectRaw('sum(households) as households,sum(comm_establishments+institutions) as otherestablishments')->where($params)->get();
                foreach($houseHoles as $key=>$val)
                {
                    $data['houseHoles']['households'] = $val->households;
                    $data['houseHoles']['otherestablishments'] = $val->otherestablishments;
                }
                /** close **/
                
                /*** get house hold cleaned data **/
                
                  
                
                
                $params = array('ulbid'=>$ulbid);
                $houseHolesCleanedData = UlbCleanedDataModel::selectRaw('sum(cleaned_count) as cleaned_count,date')->where($params)->where('date','>=',$fromdate)->where('date','<=',$todate)->groupBy('date')->get();
                foreach($houseHolesCleanedData as $key=>$val)
                {
                    $data['houseHolesCleanedData'][$val->date]['cleanedCount'] = $val->cleaned_count;
                    $data['houseHolesCleanedData'][$val->date]['percent'] = number_format($val->cleaned_count/$data['houseHoles']['households']*100,2);
                }
                /** close ***/
                        
                    }
                    
                   
                
                
            
                
                
                
                return view('/ulb_date_wise_report',$data);
            
        }
        
        /** close **/
        
        
        
}
