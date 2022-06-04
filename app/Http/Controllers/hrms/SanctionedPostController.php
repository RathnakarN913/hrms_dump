<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProjectModel;
use App\Models\Hrms_DesignationsModel;
use App\Models\Hrms_Sanctioned_PostsModel;
use App\Helper\Helpers;
use DB;
use App\Middleware\UserAuthentication;
use Session;

class SanctionedPostController extends Controller
{
     
    public function index(Request $request)
    {
        //return "dfgjjkdf";
        $userChk = new Helpers();
        $result = $userChk->checkUser();
        
        
        
             
             if(Session::get('user_type')=='C')
             { //return "dfgjdfk";

                 $data['headoffice']=Hrms_Sanctioned_PostsModel::join('hrms_designations','hrms_designations.id','=','hrms_sanctioned_posts.designation_id')->where('hrms_sanctioned_posts.level_id',1)->select('hrms_sanctioned_posts.post_sanctioned','hrms_designations.description','hrms_designations.id')->get();
                 if(sizeof($data['headoffice'])==0)
            {
                 $data['headoffice']=Hrms_DesignationsModel::where('hrms_designations.designation_level',1)->get();
            }
                $data['cnt']=count( $data['headoffice']);
             }
             else
             {
             }
             
            return view('headoffice',$data );
        
        
    }
    public function headofficeinsert(Request $request)
    {
        $login_id= Session::get('user_id');
        $designation_id=1;
        $designation_level=1;
        foreach ($request->headoffice_post_no as $key => $value) 
        {
             $post_sectioned = array('level_id'=>1,'designation_id'=>$request->desi_id[$key],'post_sanctioned'=>$request->headoffice_post_no[$key],'login_id' =>$login_id);
             
             Hrms_Sanctioned_PostsModel::updateOrCreate(['designation_id'=>$request->desi_id[$key]], $post_sectioned);

        }
       
        return redirect()->back();
    }

    public function district(Request $request)
    {
       
        $userChk = new Helpers();
        $result = $userChk->checkUser();
        if(Session::get('user_type')=='C')
        { 
             $data['district']=Hrms_Sanctioned_PostsModel::join('hrms_designations','hrms_designations.id','=','hrms_sanctioned_posts.designation_id')->where('hrms_sanctioned_posts.level_id',2)->select('hrms_sanctioned_posts.post_sanctioned','hrms_designations.description','hrms_designations.id')->get();
              
            if(sizeof($data['district'])==0)
            {
                 $data['district']=Hrms_DesignationsModel::where('hrms_designations.designation_level',2)->get();
            }
                $data['cnt']=count( $data['district']);
        }
             else
             {
             }
            
            return view('district',$data );
    }
    public function districtinsert(Request $request)
    {
        //return $request;
        $login_id= Session::get('user_id');
        $designation_id=1;
        $designation_level=1;
        foreach ($request->headoffice_post_no as $key => $value) 
        {
             $post_sectioned = array('level_id'=>2,'designation_id'=>$request->desi_id[$key],'post_sanctioned'=>$request->headoffice_post_no[$key],'login_id' =>$login_id);
             //print_r($post_sectioned);
             Hrms_Sanctioned_PostsModel::updateOrCreate(['designation_id'=>$request->desi_id[$key]], $post_sectioned);

        }
       
        return redirect('/district');
    }
    public function ulb(Request $request)
    {
       
        $userChk = new Helpers();
        $result = $userChk->checkUser();
        if(Session::get('user_type')=='C')
        { 
              $data['ulb']=Hrms_Sanctioned_PostsModel::join('hrms_designations','hrms_designations.id','=','hrms_sanctioned_posts.designation_id')->where('hrms_sanctioned_posts.level_id',3)->select('hrms_sanctioned_posts.post_sanctioned','hrms_designations.description','hrms_designations.id')->get();
              
            if(sizeof($data['ulb'])==0)
            {
                 $data['ulb']=Hrms_DesignationsModel::where('hrms_designations.designation_level',3)->get();
            }
                $data['cnt']=count( $data['ulb']);
        }
             else
             {
             }
            
            return view('ulb',$data );
    }
    public function ulbinsert(Request $request)
    {
        //return $request;
        $login_id= Session::get('user_id');
        $designation_id=1;
        $designation_level=1;
        foreach ($request->headoffice_post_no as $key => $value) 
        {
             $post_sectioned = array('level_id'=>3,'designation_id'=>$request->desi_id[$key],'post_sanctioned'=>$request->headoffice_post_no[$key],'login_id' =>$login_id);
             //print_r($post_sectioned);
             Hrms_Sanctioned_PostsModel::updateOrCreate(['designation_id'=>$request->desi_id[$key]], $post_sectioned);

        }
       
        return redirect('/district');
    }
    
}
