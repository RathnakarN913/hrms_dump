<?php

namespace App\Http\Controllers\ivnm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectModel;
use App\Models\WardModel;
use App\Models\UlbmstModel;
use App\Models\DistrictModel;
use App\Models\ivnmPhysicalProgressdrpdwnMstModel;
use App\Models\ivnm\ivnmWorkDetailsModel;
use App\Models\ivnm\ivnmWorkProgressStatusModel;
use App\Models\UlbHouseholdData;
use App\Models\UlbCleanedDataModel;
use App\Helper\Helpers;
use Session;
use DB;
error_reporting(0);

class IvnmDashboardController extends Controller
{
    public function index(Request $request)
        {
            /** checkin user authentication ***/
                 $userChk = new Helpers();
                 $result = $userChk->checkUser();
            /** close **/
            
            /** get assigned menus **/
            
            $id =21;
            
            Session::put('project_id',$id);
            Session::put('dashboard','ivnm');
            $params = array(
                'menu_project_id'=>Session::get('project_id'),
                'user_id'=>Session::get('user_id')
                );
            $data['services'] = $userChk->getAssignedMenus($params);
            /** close **/
            
            if($request->radio == 'district'){
                $this->validate($request,[
                    'district' => 'required',   
                ]);
                
                  $param = ['distid',$request->district];
                
                // if($request->working_status){
                //     $wr_st = $request->working_status;
                //     if($wr_st == 1){
                //         $attr = ['is_site_selection_done'=>1,'ground_clearance_status'=>2];
                //     }elseif($wr_st == 2){
                //         $attr = ['ground_clearance_status'=>1,'tp_clearance_status'=>2];
                //     }elseif($wr_st == 3){
                //         $attr = ['tp_clearance_status'=>1,'tender_completed_status'=>2];
                //     }elseif($wr_st == 4){
                //         $attr = ['tender_completed_status'=>1,'work_in_progress_status'=>0];
                //     }elseif($wr_st == 5){
                //         $attr = ['work_in_progress_status'=>1];
                //     }elseif($wr_st == 6){
                //         $attr = ['work_in_progress_status'=>2];
                //     }else{
                //         $attr = ['work_type_id'=>1];
                //     }
                // }
                
                $data['ulblist'] = DistrictModel::with('UlbmstModel')->where($parm)->get();
                 foreach($data['ulblist'] as $dist){
                     foreach($dist->UlbmstModel as $ulb){
                         $data['ulbnames'][$ulb->ulbid]['ulbname'] = $ulb->ulbname;
                         $data['ulbnames'][$ulb->ulbid]['distname'] = $dist->distname;
                         $data['ulbnames'][$ulb->ulbid]['comm_name'] = $ulb->comm_name;
                         $data['ulbnames'][$ulb->ulbid]['comm_mobile'] = $ulb->comm_mobile;
                         $data['ulbnames'][$ulb->ulbid]['eng_name'] = $ulb->eng_name;
                         $data['ulbnames'][$ulb->ulbid]['eng_mobile'] = $ulb->eng_mobile;
                         $data['ulbnames'][$ulb->ulbid]['nodal_officer_name'] = $ulb->nodal_officer_name;
                         $data['ulbnames'][$ulb->ulbid]['nodal_officer_mobile'] = $ulb->nodal_officer_mobile;
                     }
                 }
                 
                 
                 $ulblist = UlbmstModel::where('distid',$request->district)->pluck('ulbid');
                 
                 /** get work details ***/
                 
                     $data['result'] = ivnmWorkDetailsModel::with('ivnmWorkProgressStatusModel','ivnmWorkPhotosModel')->where('work_type_id',1)->whereIn('ulbid',$ulblist)->get();
              
                 /** close **/
                
            }
            elseif($request->radio == 'corporation'){
                
                // if($request->working_status){
                //     $wr_st = $request->working_status;
                //     if($wr_st == 1){
                //         $attr = ['is_site_selection_done'=>1,'ground_clearance_status'=>2];
                //     }elseif($wr_st == 2){
                //         $attr = ['ground_clearance_status'=>1,'tp_clearance_status'=>2];
                //     }elseif($wr_st == 3){
                //         $attr = ['tp_clearance_status'=>1,'tender_completed_status'=>2];
                //     }elseif($wr_st == 4){
                //         $attr = ['tender_completed_status'=>1,'work_in_progress_status'=>0];
                //     }elseif($wr_st == 5){
                //         $attr = ['work_in_progress_status'=>1];
                //     }elseif($wr_st == 6){
                //         $attr = ['work_in_progress_status'=>2];
                //     }else{
                //         $attr = ['work_type_id'=>1];
                //     }
                // }
                
                $data['ulblist'] = DistrictModel::with('UlbmstModel')->get();
                 foreach($data['ulblist'] as $dist){
                     foreach($dist->UlbmstModel as $ulb){
                         $data['ulbnames'][$ulb->ulbid]['ulbname'] = $ulb->ulbname;
                         $data['ulbnames'][$ulb->ulbid]['distname'] = $dist->distname;
                         $data['ulbnames'][$ulb->ulbid]['comm_name'] = $ulb->comm_name;
                         $data['ulbnames'][$ulb->ulbid]['comm_mobile'] = $ulb->comm_mobile;
                          $data['ulbnames'][$ulb->ulbid]['eng_name'] = $ulb->eng_name;
                         $data['ulbnames'][$ulb->ulbid]['eng_mobile'] = $ulb->eng_mobile;
                         $data['ulbnames'][$ulb->ulbid]['nodal_officer_name'] = $ulb->nodal_officer_name;
                         $data['ulbnames'][$ulb->ulbid]['nodal_officer_mobile'] = $ulb->nodal_officer_mobile;
                     }
                 }
                 
                 
                 $ulblist = UlbmstModel::where('ulb_type',1)->pluck('ulbid');
                 
                 /** get work details ***/
                 
                    $data['result'] = ivnmWorkDetailsModel::with('ivnmWorkProgressStatusModel','ivnmWorkPhotosModel')->where('work_type_id',1)->whereIn('ulbid',$ulblist)->get();
              
                 /** close **/
              
            }else{
                $data['ulblist'] = DistrictModel::with('UlbmstModel')->get();
                 foreach($data['ulblist'] as $dist){
                     foreach($dist->UlbmstModel as $ulb){
                         $data['ulbnames'][$ulb->ulbid]['ulbname'] = $ulb->ulbname;
                         $data['ulbnames'][$ulb->ulbid]['distname'] = $dist->distname;
                         $data['ulbnames'][$ulb->ulbid]['comm_name'] = $ulb->comm_name;
                         $data['ulbnames'][$ulb->ulbid]['comm_mobile'] = $ulb->comm_mobile;
                          $data['ulbnames'][$ulb->ulbid]['eng_name'] = $ulb->eng_name;
                         $data['ulbnames'][$ulb->ulbid]['eng_mobile'] = $ulb->eng_mobile;
                         $data['ulbnames'][$ulb->ulbid]['nodal_officer_name'] = $ulb->nodal_officer_name;
                         $data['ulbnames'][$ulb->ulbid]['nodal_officer_mobile'] = $ulb->nodal_officer_mobile;
                     }
                 }
                
                
                 /** get work details ***/
                 $data['result'] = ivnmWorkDetailsModel::with('ivnmWorkProgressStatusModel','ivnmWorkPhotosModel')->where('work_type_id',1)->get();
                //  foreach($data['result'] as $item){
                //      dd($item);
                //  }
                 
              
                 /** close **/
                 
            }
                 $data['total'] = ivnmWorkDetailsModel::where('work_type_id',1)->count();
                 
                 $data['site_identy'] = ivnmWorkDetailsModel::where('is_site_selection_done',1)->where('work_type_id',1)->count();
                 $data['ground_clear'] = ivnmWorkDetailsModel::where('ground_clearance_status',1)->where('work_type_id',1)->count();
                 $data['town_planning'] = ivnmWorkDetailsModel::where('tp_clearance_status',1)->where('work_type_id',1)->count();
                 $data['tender'] = ivnmWorkDetailsModel::where('tender_completed_status',1)->where('work_type_id',1)->count();
                 $data['workin_progress'] = ivnmWorkDetailsModel::where('work_final_status',5)->where('work_type_id',1)->count();
                 $data['work_comp'] = ivnmWorkDetailsModel::where('work_final_status',6)->where('work_type_id',1)->count();
                 
                 Session::put('project_id',$id);
                 $params = array('id'=>$id);
                 $data['projectDetails'] = ProjectModel::where($params)->get();
                 Session::put(array('project_name'=>$data['projectDetails'][0]->project_name));
                 $data['project_id'] = $id;
                 
                 /** physical progress list **/
                 
                 $list = ivnmWorkProgressStatusModel::get();
                 $data['work_progress_list'][0]="Site Identification";
                 foreach($list as $key=>$val)
                 {
                     $data['work_progress_list'][$val->id]=$val->description;
                 }
                 
                 /** close ***/
                 
                 /** additional collectors data ***/
                 
                 $collectorsdata = DB::table('ulbmst')->join('Districtmst','ulbmst.distid','=','Districtmst.distid')->get();
                 foreach($collectorsdata as $key=>$val)
                 {
                     $data['contactdata'][$val->ulbid]['collectr_name'] = $val->adl_collector_name." (".$val->mobile.")";
                 }
                 
                 
                 /** close **/
                 return view('ivnm/dashboard',$data);
            
        }
        
        public function vkd(Request $request){
            /** checkin user authentication ***/
                 $userChk = new Helpers();
                 $result = $userChk->checkUser();
            /** close **/
            
            /** get assigned menus **/
            
            $id =21;
            
            Session::put('project_id',$id);
            Session::put('dashboard','ivnm');
            $params = array(
                'menu_project_id'=>Session::get('project_id'),
                'user_id'=>Session::get('user_id')
                );
            $data['services'] = $userChk->getAssignedMenus($params);
            /** close **/
            
            if($request->radio == 'district'){
                $this->validate($request,[
                    'district' => 'required',   
                ]);
                
                  $param = ['distid',$request->district];
                
                // if($request->working_status){
                //     $wr_st = $request->working_status;
                //     if($wr_st == 1){
                //         $attr = ['is_site_selection_done'=>1,'ground_clearance_status'=>2];
                //     }elseif($wr_st == 2){
                //         $attr = ['ground_clearance_status'=>1,'tp_clearance_status'=>2];
                //     }elseif($wr_st == 3){
                //         $attr = ['tp_clearance_status'=>1,'tender_completed_status'=>2];
                //     }elseif($wr_st == 4){
                //         $attr = ['tender_completed_status'=>1,'work_in_progress_status'=>0];
                //     }elseif($wr_st == 5){
                //         $attr = ['work_in_progress_status'=>1];
                //     }elseif($wr_st == 6){
                //         $attr = ['work_in_progress_status'=>2];
                //     }else{
                //         $attr = ['work_type_id'=>1];
                //     }
                // }
                
                $data['ulblist'] = DistrictModel::with('UlbmstModel')->where($parm)->get();
                 foreach($data['ulblist'] as $dist){
                     foreach($dist->UlbmstModel as $ulb){
                         $data['ulbnames'][$ulb->ulbid]['ulbname'] = $ulb->ulbname;
                         $data['ulbnames'][$ulb->ulbid]['distname'] = $dist->distname;
                         $data['ulbnames'][$ulb->ulbid]['comm_name'] = $ulb->comm_name;
                         $data['ulbnames'][$ulb->ulbid]['comm_mobile'] = $ulb->comm_mobile;
                          $data['ulbnames'][$ulb->ulbid]['eng_name'] = $ulb->eng_name;
                         $data['ulbnames'][$ulb->ulbid]['eng_mobile'] = $ulb->eng_mobile;
                         $data['ulbnames'][$ulb->ulbid]['nodal_officer_name'] = $ulb->nodal_officer_name;
                         $data['ulbnames'][$ulb->ulbid]['nodal_officer_mobile'] = $ulb->nodal_officer_mobile;
                     }
                 }
                 
                 
                 $ulblist = UlbmstModel::where('distid',$request->district)->pluck('ulbid');
                 
                 /** get work details ***/
                 
                     $data['result'] = ivnmWorkDetailsModel::with('ivnmWorkProgressStatusModel','ivnmWorkPhotosModel')->where('work_type_id',2)->whereIn('ulbid',$ulblist)->get();
              
                 /** close **/
                
            }
            elseif($request->radio == 'corporation'){
                
                // if($request->working_status){
                //     $wr_st = $request->working_status;
                //     if($wr_st == 1){
                //         $attr = ['is_site_selection_done'=>1,'ground_clearance_status'=>2];
                //     }elseif($wr_st == 2){
                //         $attr = ['ground_clearance_status'=>1,'tp_clearance_status'=>2];
                //     }elseif($wr_st == 3){
                //         $attr = ['tp_clearance_status'=>1,'tender_completed_status'=>2];
                //     }elseif($wr_st == 4){
                //         $attr = ['tender_completed_status'=>1,'work_in_progress_status'=>0];
                //     }elseif($wr_st == 5){
                //         $attr = ['work_in_progress_status'=>1];
                //     }elseif($wr_st == 6){
                //         $attr = ['work_in_progress_status'=>2];
                //     }else{
                //         $attr = ['work_type_id'=>1];
                //     }
                // }
                
                $data['ulblist'] = DistrictModel::with('UlbmstModel')->get();
                 foreach($data['ulblist'] as $dist){
                     foreach($dist->UlbmstModel as $ulb){
                         $data['ulbnames'][$ulb->ulbid]['ulbname'] = $ulb->ulbname;
                         $data['ulbnames'][$ulb->ulbid]['distname'] = $dist->distname;
                         $data['ulbnames'][$ulb->ulbid]['comm_name'] = $ulb->comm_name;
                         $data['ulbnames'][$ulb->ulbid]['comm_mobile'] = $ulb->comm_mobile;
                          $data['ulbnames'][$ulb->ulbid]['eng_name'] = $ulb->eng_name;
                         $data['ulbnames'][$ulb->ulbid]['eng_mobile'] = $ulb->eng_mobile;
                         $data['ulbnames'][$ulb->ulbid]['nodal_officer_name'] = $ulb->nodal_officer_name;
                         $data['ulbnames'][$ulb->ulbid]['nodal_officer_mobile'] = $ulb->nodal_officer_mobile;
                     }
                 }
                 
                 
                 $ulblist = UlbmstModel::where('ulb_type',1)->pluck('ulbid');
                 
                 /** get work details ***/
                 
                     $data['result'] = ivnmWorkDetailsModel::with('ivnmWorkProgressStatusModel','ivnmWorkPhotosModel')->where('work_type_id',2)->whereIn('ulbid',$ulblist)->get();
              
                 /** close **/
              
            }else{
                $data['ulblist'] = DistrictModel::with('UlbmstModel')->get();
                 foreach($data['ulblist'] as $dist){
                     foreach($dist->UlbmstModel as $ulb){
                         $data['ulbnames'][$ulb->ulbid]['ulbname'] = $ulb->ulbname;
                         $data['ulbnames'][$ulb->ulbid]['distname'] = $dist->distname;
                         $data['ulbnames'][$ulb->ulbid]['comm_name'] = $ulb->comm_name;
                         $data['ulbnames'][$ulb->ulbid]['comm_mobile'] = $ulb->comm_mobile;
                          $data['ulbnames'][$ulb->ulbid]['eng_name'] = $ulb->eng_name;
                         $data['ulbnames'][$ulb->ulbid]['eng_mobile'] = $ulb->eng_mobile;
                         $data['ulbnames'][$ulb->ulbid]['nodal_officer_name'] = $ulb->nodal_officer_name;
                         $data['ulbnames'][$ulb->ulbid]['nodal_officer_mobile'] = $ulb->nodal_officer_mobile;
                     }
                 }
                
                
                 /** get work details ***/
                 $data['result'] = ivnmWorkDetailsModel::with('ivnmWorkProgressStatusModel','ivnmWorkPhotosModel')->where('work_type_id',2)->get();
              
                 /** close **/
                 
            }
                 $data['total'] = ivnmWorkDetailsModel::where('work_type_id',2)->count();
                 
                  $data['site_identy'] = ivnmWorkDetailsModel::where('is_site_selection_done',1)->where('work_type_id',2)->count();
                 $data['ground_clear'] = ivnmWorkDetailsModel::where('ground_clearance_status',1)->where('work_type_id',2)->count();
                 $data['town_planning'] = ivnmWorkDetailsModel::where('tp_clearance_status',1)->where('work_type_id',2)->count();
                 $data['tender'] = ivnmWorkDetailsModel::where('tender_completed_status',1)->where('work_type_id',2)->count();
                 $data['workin_progress'] = ivnmWorkDetailsModel::where('work_final_status',5)->where('work_type_id',2)->count();
                 $data['work_comp'] = ivnmWorkDetailsModel::where('work_final_status',6)->where('work_type_id',2)->count();
                 
                 Session::put('project_id',$id);
                 $params = array('id'=>$id);
                 $data['projectDetails'] = ProjectModel::where($params)->get();
                 Session::put(array('project_name'=>$data['projectDetails'][0]->project_name));
                 $data['project_id'] = $id;
                 
                 $list = ivnmWorkProgressStatusModel::get();
                 $data['work_progress_list'][0]="Site Identification";
                 foreach($list as $key=>$val)
                 {
                     $data['work_progress_list'][$val->id]=$val->description;
                 }
                 
                  /** additional collectors data ***/
                 
                 $collectorsdata = DB::table('ulbmst')->join('Districtmst','ulbmst.distid','=','Districtmst.distid')->get();
                 foreach($collectorsdata as $key=>$val)
                 {
                     $data['contactdata'][$val->ulbid]['collectr_name'] = $val->adl_collector_name." (".$val->mobile.")";
                 }
                 
                 
                 /** close **/
                 
                 return view('ivnm/dashboard',$data);
        }
       
       public function inner_reports(Request $request){
           if($request->id1 == 'ivnm'){
               $work_type = 1;
               $data['work_type'] = 'IVNM';
           }elseif($request->id1 == 'vkd'){
               $work_type = 2;
               $data['work_type'] = 'VKD';
           }else{
               Session::flash('error','something went wrong');
               return redirect('ivnm');
           }
           
           if($request->id == 1){
               $param = ['is_site_selection_done'=>2];
           }elseif($request->id == 2){
               $param = ['ground_clearance_status'=>2];
           }elseif($request->id == 3){
               $param = ['tp_clearance_status'=>2];
           }elseif($request->id == 4){
               $param = ['tender_completed_status'=>2];
           }elseif($request->id == 5){
               $param = ['work_final_status'=>5];
           }elseif($request->id == 6){
               $param = ['work_final_status'=>6];
           }else{
               Session::flash('error','something went wrong');
               return redirect('ivnm');
           }
           
           $work_process = $request->id;
           
            $data['ulblist'] = DistrictModel::with('UlbmstModel')->get();
             foreach($data['ulblist'] as $dist){
                 foreach($dist->UlbmstModel as $ulb){
                     $data['ulbnames'][$ulb->ulbid]['ulbname'] = $ulb->ulbname;
                     $data['ulbnames'][$ulb->ulbid]['distname'] = $dist->distname;
                    //  $data['ulbnames'][$ulb->ulbid]['comm_name'] = $ulb->comm_name;
                    //  $data['ulbnames'][$ulb->ulbid]['comm_mobile'] = $ulb->comm_mobile;
                 }
             }
             
            $data['work_process'] = $request->id;
           $data['total'] = ivnmWorkDetailsModel::where('work_type_id',$work_type)->count();
           
          $data['completed'] = ivnmWorkDetailsModel::where('work_final_status',6)->where('work_type_id',$work_type)->count();
           
           $data['result'] = ivnmWorkDetailsModel::with('ivnmWorkProgressStatusModel','ivnmWorkPhotosModel')->where('work_type_id',$work_type)->where($param)->get();
        //   dd($data['result']);
        
        $list = ivnmWorkProgressStatusModel::get();
                 $data['work_progress_list'][0]="Site Identification";
                 foreach($list as $key=>$val)
                 {
                     $data['work_progress_list'][$val->id]=$val->description;
                 }
                 
                  /** additional collectors data ***/
                 
                 $collectorsdata = DB::table('ulbmst')->join('Districtmst','ulbmst.distid','=','Districtmst.distid')->get();
                 foreach($collectorsdata as $key=>$val)
                 {
                     $data['contactdata'][$val->ulbid]['collectr_name'] = $val->adl_collector_name." (".$val->mobile.")";
                     $data['contactdata'][$val->ulbid]['commissioner'] = $val->comm_name." (".$val->comm_mobile.")";
                     $data['contactdata'][$val->ulbid]['ae'] = $val->eng_name." (".$val->eng_mobile.")";
                     $data['contactdata'][$val->ulbid]['nodal'] = $val->nodal_officer_name." (".$val->nodal_officer_mobile.")";
                 }
                 
                 
                 /** close **/
           return view('ivnm/inner_reports',$data);
       }
       
       public function downloadapk(Request $request)
       {
           return view('ivnm/downloadapk');
       }
}







