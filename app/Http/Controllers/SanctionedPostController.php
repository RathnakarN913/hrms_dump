<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProjectModel;
use App\Models\Hrms_DesignationsModel;
use App\Models\hrms\DesignationgroupModel;
use App\Models\Hrms_Sanctioned_PostsModel;
use App\Models\hrms\DistricstsModel;
use App\Models\UlbmstModel;
use App\Models\hrms\SanctionedPosts;

use App\Models\hrms\AddEmployeeModel;
use App\Models\hrms\EmployeeType;
use App\Models\hrms\DesignationModel;
use App\Models\hrms\EmployeesCurrentInfosModel;
use App\Helper\Helpers;
use DB;
use App\Middleware\UserAuthentication;
use Session;

class SanctionedPostController extends Controller
{
    public function index(Request $request)
    {
        $userChk = new Helpers();
        $result = $userChk->checkUser();
            if(Session::get('user_type')=='AO')
            {

                $data['headoffice']=Hrms_DesignationsModel::where('hrms_designations.designation_level','1')->orderby('sort_order','asc')->get();
                $data['emp_type'] = EmployeeType::all();

                $posts = Hrms_Sanctioned_PostsModel::where('level_id',1)->get();

                foreach($data['headoffice'] as $hed){
                    foreach($data['emp_type'] as $type){
                        $data['post1'][$hed->id][$type->employee_type_id] = $posts->where('employee_type',$type->employee_type_id)->where('designation_id',$hed->id)->sum('post_sanctioned');
                    }
                    $data['post'][$hed->id] = Hrms_Sanctioned_PostsModel::where('designation_id',$hed->id)->where('level_id',1)->sum('post_sanctioned');
                }

                foreach($data['emp_type'] as $type){
                    $data['post2'][$type->employee_type_id] = $posts->where('employee_type',$type->employee_type_id)->sum('post_sanctioned');
                }




                $data['cnt']=count( $data['headoffice']);
                $data['total']=Hrms_Sanctioned_PostsModel::where('level_id',1)->sum('post_sanctioned');
            }
            else
            {
            }
            // dd($data);
            return view('hrms.headoffice',$data );


    }
    public function headofficeinsert(Request $request)
    {
        $login_id= Session::get('user_id');

        // dd($request);

        $desi_id = $request->desi_id;
        $emp_level = $request->emp_level;

        $post = $request->post;

        for($i=0;$i<count($desi_id);$i++){
            $post_in = array(
                'level_id' => 1,
                'designation_id' => $desi_id[$i],
                'employee_type' => $emp_level[$i],
                'post_sanctioned'=>$post[$i],
                'login_id' =>$login_id,
            );
            $data1 = array(
                'designation_id'=>$desi_id[$i],
                'employee_type'=>$emp_level[$i]
            );

            Hrms_Sanctioned_PostsModel::updateOrCreate($data1, $post_in);
        }


        // foreach ($post as $key => $value)
        // {
        //      $post_sectioned = array('level_id'=>1,'designation_id'=>$request->desi_id[$key],'post_sanctioned'=>$request->headoffice_post_no[$key],'login_id' =>$login_id);

        //      Hrms_Sanctioned_PostsModel::updateOrCreate(['designation_id'=>$request->desi_id[$key]], $post_sectioned);

        // }

        return redirect()->back()->withErrors(['msg' =>"Data inserted successfully."]);
    }
    public function district1(Request $request)
    {
        $userChk = new Helpers();
        $result = $userChk->checkUser();
        if(Session::get('user_type')=='AO')
        {

             $data['dist']=DistricstsModel::all();;
             $data['desi_id']=DB::table('hrms_designations')->where('designation_level',2)->orderby('description','asc')->get();
             //$data['post']=array();
             foreach($data['desi_id'] as $key=>$val)
             {
              $data['post'][$val->id]=DB::table('hrms_sanctioned_posts')->where('designation_id',$val->id)->get();
             $data['pd_cnt']=DB::table('hrms_sanctioned_posts')->select('designation_id', DB::raw('SUM(post_sanctioned) as total'))->where('designation_id',7)->groupBy('designation_id')->get();
              $data['dmc_cnt']=DB::table('hrms_sanctioned_posts')->select('designation_id', DB::raw('SUM(post_sanctioned) as total'))->where('designation_id',8)->groupBy('designation_id')->get();
             $data['admc_cnt']=DB::table('hrms_sanctioned_posts')->select('designation_id', DB::raw('SUM(post_sanctioned) as total'))->where('designation_id',9)->groupBy('designation_id')->get();
             $data['sass_cnt']=DB::table('hrms_sanctioned_posts')->select('designation_id', DB::raw('SUM(post_sanctioned) as total'))->where('designation_id',11)->groupBy('designation_id')->get();
             $data['jass_cnt']=DB::table('hrms_sanctioned_posts')->select('designation_id', DB::raw('SUM(post_sanctioned) as total'))->where('designation_id',12)->groupBy('designation_id')->get();
             $data['aofc_cnt']=DB::table('hrms_sanctioned_posts')->select('designation_id', DB::raw('SUM(post_sanctioned) as total'))->where('designation_id',3)->groupBy('designation_id')->get();


                foreach($data['post'][$val->id] as $k=>$v)
                {
                  //  echo $v->district_id. "  ". $v->designation_id."  ";
                      $data['post'][$v->district_id][$v->designation_id]=$v->post_sanctioned."<br>";
                }
             }
            //return $data['post'][$val->id];
        }
//return;
        //return $data;
            //return $data['no_post'][$val1->ulb_id][$val1->designation_id];
            //return redirect()->back()->withErrors(['msg' =>"Data inserted successfully."]);
            return view('hrms.district',$data );
    }

     public function district(Request $request)
    {
        $userChk = new Helpers();
        $result = $userChk->checkUser();
        if(Session::get('user_type')=='AO')
        {
             $data['district'] = DistricstsModel::orderby('distname','asc')->get();
             $data['designation'] = Hrms_DesignationsModel::where('designation_level',2)->orderby('sort_order','asc')->get();
             $data['emp_type'] = EmployeeType::all();

             if($request->district){
                 $data['ind_dist'] = $request->district;
             }else{
                $data['ind_dist'] = '01';
             }
             $data['ind_dist_name'] = DistricstsModel::where('distid',$data['ind_dist'])->value('distname');
             $data['desi_val'] = Hrms_Sanctioned_PostsModel::where('district_id',$data['ind_dist'])->where('level_id',2)->get();


             $data['total'] = Hrms_Sanctioned_PostsModel::where('level_id',2)->sum('post_sanctioned');
        }
    //   dd($data['designation']);
            return view('hrms.district',$data );
    }

    public function districtinsert1(Request $request)
    {
        $login_id= Session::get('user_id');

        foreach($request->post as $key=>$val)
        {
           //return $val;
            if($request->post[$key]== "0")
            {

            }
           /* else if($request->post[$key]=="")
            {

            }*/
            else
            {
                if($request->post[$key]=="")
                {
                    $post=0;
                }
                else
                {
                    $post=$request->post[$key];
                }
                $dist_id=$request->dist_id[$key];
                 $desi_id=$request->desi_id[$key];
                //$post=$request->post[$key];
               if($desi_id==12)
               {
                $post_sectioned = array('level_id'=>2,'district_id'=>$dist_id,'ulb_id'=>"",'designation_id'=>$desi_id,'post_sanctioned'=>$post,'login_id' =>$login_id);
       print_r($post_sectioned);
    echo "<br>";
               }
               if($desi_id==7)
               {
                $post_sectioned = array('level_id'=>2,'district_id'=>$dist_id,'ulb_id'=>"",'designation_id'=>$desi_id,'post_sanctioned'=>$post,'login_id' =>$login_id);
       print_r($post_sectioned);
    echo "<br>";
               }
               // $ins=Hrms_Sanctioned_PostsModel::updateOrCreate(['district_id'=>$dist_id,'ulb_id'=>"",'designation_id'=>$desi_id], $post_sectioned);

            }

        }
return;
        return redirect()->back()->withErrors(['msg' =>"Data inserted successfully."]);
    }


     public function districtinsert(Request $request)
    {
        // dd($request->all());
        $login_id= Session::get('user_id');

        $post = $request->post;
        $dist_id = $request->dist;
        $levelid = $request->levelid;
        $desid = $request->designation;
        $emp_type = $request->emp_type;


        for($i=0;$i < count($post);$i++){
            if($post[$i] == ''){
                $post[$i] = 0;
            }
            $data = array(
                'district_id' => $dist_id,
                'level_id' => $levelid,
                'designation_id' => $desid[$i],
                'employee_type' => $emp_type[$i],
                'post_sanctioned' => $post[$i],
                'login_id' => $login_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            $data1 = array(
                'district_id' => $dist_id,
                'level_id' => $levelid,
                'designation_id' => $desid[$i],
                'employee_type' => $emp_type[$i],
            );

            $repeat = Hrms_Sanctioned_PostsModel::updateOrCreate($data1,$data);

        }

        return redirect()->back()->withErrors(['msg' =>"Data inserted successfully."]);
    }


    public function ulbinsert(Request $request)
    {

        $login_id= Session::get('user_id');

        // dd($request);

        $post = $request->post;
        $distid = $request->distid;
        $desid = $request->desid;
        $ulbid = $request->ulbid;
        $emp_type = $request->emp_type;

        for($i=0;$i < count($post);$i++){
            if($post[$i] == ''){
                $post[$i] = 0;
            }

            $data = array(
                'district_id' => $distid,
                'ulb_id' => $ulbid,
                'level_id' => 3,
                'designation_id' => $desid[$i],
                'employee_type' => $emp_type[$i],
                'post_sanctioned' => $post[$i],
                'login_id' => $login_id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );

            $data1 = array(
                'district_id' => $distid,
                'ulb_id' => $ulbid,
                'level_id' => 3,
                'designation_id' => $desid[$i],
                'employee_type' => $emp_type[$i],
            );

            Hrms_Sanctioned_PostsModel::updateOrCreate($data1,$data);

        }

        return redirect()->back()->withErrors(['msg' =>"Data inserted successfully."]);


    }
    public function ulb(Request $request)
    {

        $userChk = new Helpers();
        $result = $userChk->checkUser();
        if(Session::get('user_type')=='AO')
        {
            $data['ulblist'] = UlbmstModel::with('DistrictModel')->orderby('ulbname','asc')->get();
            $data['designation'] = Hrms_DesignationsModel::where('designation_level',3)->orderby('sort_order','asc')->get();
            $data['emp_type'] = EmployeeType::all();

            if($request->ulb == ''){
                $data['ind_ulb'] = '001';
            }else{
                $data['ind_ulb'] = $request->ulb;
            }

            $data['ulb_name'] = UlbmstModel::where('ulbid',$data['ind_ulb'])->first();

            $data['post_count'] = Hrms_Sanctioned_PostsModel::where('level_id',3)->where('ulb_id',$data['ind_ulb'])->get();

        }
            return view('hrms.ulb',$data );
    }
    public function overallreport(Request $request)
    {
        $userChk = new Helpers();
        $result = $userChk->checkUser();
        if(Session::get('user_type')=='AO')
        {
            $data['designations'] = Hrms_DesignationsModel::with('DesignationgroupModel')->orderby('sort_order','asc')->groupby('group_id')->get();
            // dd($data['designations']);

            $data['designations1'] = Hrms_DesignationsModel::all();


            foreach($data['designations1'] as $des){
            //   $str = str_replace(' ','',$des->description);
                $data['allot'][$des->group_id] = 0;
                $data['san'][$des->group_id] = 0;

                $data['state']['allot'][$des->group_id] = 0;
                $data['state']['san'][$des->group_id] = 0;

                $data['dist']['allot'][$des->group_id] = 0;
                $data['dist']['san'][$des->group_id] = 0;

                $data['ulb']['allot'][$des->group_id] = 0;
                $data['ulb']['san'][$des->group_id] = 0;
            }

            $post_data = DB::table('hrms_sanctioned_posts')->get();
            $allot_data = DB::table('hrms_employees_current_infos')->join('hrms_designations','hrms_designations.id','=','hrms_employees_current_infos.current_designation')->get();

            foreach($data['designations1'] as $des){
                // $str = str_replace(' ','',$des->description);
                $data['allot'][$des->group_id] = $data['allot'][$des->group_id] + $allot_data->where('current_designation',$des->id)->count();
                $data['san'][$des->group_id] = $data['san'][$des->group_id] + $post_data->where('designation_id',$des->id)->sum('post_sanctioned');

                $data['state']['allot'][$des->group_id] = $allot_data->where('current_designation',$des->id)->where('designation_level',1)->count();
                $data['state']['san'][$des->group_id] = $data['state']['san'][$des->group_id] + $post_data->where('designation_id',$des->id)->where('level_id',1)->sum('post_sanctioned');

                $data['dist']['allot'][$des->group_id] = $allot_data->where('current_designation',$des->id)->where('designation_level',2)->count();
                $data['dist']['san'][$des->group_id] = $post_data->where('designation_id',$des->id)->where('level_id',2)->sum('post_sanctioned');

                $data['ulb']['allot'][$des->group_id] = $allot_data->where('current_designation',$des->id)->where('designation_level',3)->count();
                $data['ulb']['san'][$des->group_id] = $post_data->where('designation_id',$des->id)->where('level_id',3)->sum('post_sanctioned');
            }

            // dd($data);

            $data['total_san'] = Hrms_Sanctioned_PostsModel::sum('post_sanctioned');

        }
        else
        {
        }
        // dd($data);
        return view('hrms.overallreport',$data );

    }


    public function test() {
        $this->_getAllSactionedPostByCat();
    }
    protected function _getAllSactionedPostByCat($cat = null) {
        dd(SanctionedPosts::bycategory(1)->sum('occupied_posts'));
    }

    protected function _getAllSactionedPostByDesig($designation = null) {

    }

    public function getOverAllCount(){
        $data['designations'] = Hrms_DesignationsModel::with('DesignationgroupModel')->orderby('description','asc')->groupby('group_id')->get();
            // dd($data['designations']);

            $data['designations1'] = Hrms_DesignationsModel::all();


            foreach($data['designations1'] as $des){
            //   $str = str_replace(' ','',$des->description);
                $data['allot'][$des->group_id] = 0;
                $data['san'][$des->group_id] = 0;

                $data['state']['allot'][$des->group_id] = 0;
                $data['state']['san'][$des->group_id] = 0;

                $data['dist']['allot'][$des->group_id] = 0;
                $data['dist']['san'][$des->group_id] = 0;

                $data['ulb']['allot'][$des->group_id] = 0;
                $data['ulb']['san'][$des->group_id] = 0;
            }

            $post_data = DB::table('hrms_sanctioned_posts')->get();
            $allot_data = DB::table('hrms_employees_current_infos')->join('hrms_designations','hrms_designations.id','=','hrms_employees_current_infos.current_designation')->get();

            foreach($data['designations1'] as $des){
                // $str = str_replace(' ','',$des->description);
                $data['allot'][$des->group_id] = $data['allot'][$des->group_id] + $allot_data->where('current_designation',$des->id)->count();
                $data['san'][$des->group_id] = $data['san'][$des->group_id] + $post_data->where('designation_id',$des->id)->sum('post_sanctioned');

                $data['state']['allot'][$des->group_id] = $allot_data->where('current_designation',$des->id)->where('designation_level',1)->count();
                $data['state']['san'][$des->group_id] = $data['state']['san'][$des->group_id] + $post_data->where('designation_id',$des->id)->where('level_id',1)->sum('post_sanctioned');

                $data['dist']['allot'][$des->group_id] = $allot_data->where('current_designation',$des->id)->where('designation_level',2)->count();
                $data['dist']['san'][$des->group_id] = $post_data->where('designation_id',$des->id)->where('level_id',2)->sum('post_sanctioned');

                $data['ulb']['allot'][$des->group_id] = $allot_data->where('current_designation',$des->id)->where('designation_level',3)->count();
                $data['ulb']['san'][$des->group_id] = $post_data->where('designation_id',$des->id)->where('level_id',3)->sum('post_sanctioned');
            }

            // dd($data);

            $data['total_san'] = Hrms_Sanctioned_PostsModel::sum('post_sanctioned');

            $i = 1; $tot_allot = 0;
            foreach($designations as $des){
                $tot_allot = $tot_allot + $allot[$des->group_id];
                $i++;
            }
                $data['tot_allot'] = $tot_allot;
                $data['vacant']= $data['total_san'] - $tot_allot;

                dd($data);
    }


    public function head_office_report(Request $request)
    {

        $userChk = new Helpers();
        $result = $userChk->checkUser();
        if(Session::get('user_type')=='AO')
        {
            $data['designations'] = Hrms_DesignationsModel::with('Hrms_Sanctioned_PostsModel')->where('designation_level',1)->orderby('sort_order','asc')->get();

            foreach($data['designations'] as $des){
                $data['allot'][$des->id] = DB::table('hrms_employees_current_infos')->where('current_designation',$des->id)->count();
            }
            $data['total_san'] = Hrms_Sanctioned_PostsModel::where('level_id',1)->sum('post_sanctioned');

        }
        else
        {
        }
       // return $data;

        return view('hrms.headofficereport',$data );

    }
    public function districtreport(Request $request)
    {


        $userChk = new Helpers();
        $result = $userChk->checkUser();
        if(Session::get('user_type')=='AO')
        {
             $data['district'] = DistricstsModel::orderby('distname','asc')->get();
             $data['designation'] = Hrms_DesignationsModel::where('designation_level',2)->orderby('sort_order','asc')->get();

            //  dd($data['designation']);

             foreach($data['district'] as $dist){
                 foreach($data['designation'] as $des){
                     $data1 = array(
                        'district_id' => $dist->distid,
                        'level_id' => 2,
                        'designation_id' => $des->id,
                    );
                    $data2 = array(
                        'district_id' => $dist->distid,
                        'level_id' => 2,
                    );
                    $data3 = array(
                        'district' => $dist->distid,
                        'current_designation' => $des->id,
                    );
                     $data['count'][$dist->distid][$des->id] = Hrms_Sanctioned_PostsModel::where($data1)->sum('post_sanctioned');
                     $data['occupied'][$dist->distid][$des->id] = EmployeesCurrentInfosModel::where($data3)->count();
                 }
                 $data['dist_count'][$dist->distid] = Hrms_Sanctioned_PostsModel::where($data2)->sum('post_sanctioned');
                 $data['dist_occupied'][$dist->distid] = EmployeesCurrentInfosModel::where('district',$dist->distid)->count();
             }

             foreach($data['designation'] as $des){
                 $data3 = array(
                        'level_id' => 2,
                        'designation_id' => $des->id,
                    );
                $data['des_count'][$des->id] = Hrms_Sanctioned_PostsModel::where($data3)->sum('post_sanctioned');
                $data['des_occupy'][$des->id] = EmployeesCurrentInfosModel::where('current_designation',$des->id)->count();
             }

             $data['total'] = Hrms_Sanctioned_PostsModel::where('level_id',2)->sum('post_sanctioned');
        }

        return view('hrms.district_report',$data );

    }
    public function ulbreport(Request $request)
    {
        $userChk = new Helpers();
        $result = $userChk->checkUser();
        if(Session::get('user_type')=='AO')
        {
            $data['ulblist'] = UlbmstModel::with('DistrictModel')->orderby('ulbname','asc')->get();
            $data['designation'] = Hrms_DesignationsModel::where('designation_level',3)->orderby('sort_order','ASC')->get();

            foreach($data['ulblist'] as $ulb){
                foreach($data['designation'] as $des){
                     $data1 = array(
                        'ulb_id' => $ulb->ulbid,
                        'level_id' => 3,
                        'designation_id' => $des->id,
                    );
                    $data2 = array(
                        'ulb_id' => $ulb->ulbid,
                        'level_id' => 3,
                    );
                    $data3 = array(
                        'ulbid' => $ulb->ulbid,
                        'current_designation' => $des->id,
                    );
                     $data['count'][$ulb->ulbid][$des->id] = Hrms_Sanctioned_PostsModel::where($data1)->sum('post_sanctioned');
                     $data['occupied'][$ulb->ulbid][$des->id] = EmployeesCurrentInfosModel::where($data3)->count();
                }
                $data['ulb_count'][$ulb->ulbid] = Hrms_Sanctioned_PostsModel::where($data2)->sum('post_sanctioned');
                $data['ulb_occupy'][$ulb->ulbid] = EmployeesCurrentInfosModel::where('ulbid',$ulb->ulbid)->count();
            }

            foreach($data['designation'] as $des){
                 $data3 = array(
                        'level_id' => 3,
                        'designation_id' => $des->id,
                    );
                $data['des_count'][$des->id] = Hrms_Sanctioned_PostsModel::where($data3)->sum('post_sanctioned');
                $data['des_occupy'][$des->id] = EmployeesCurrentInfosModel::where('current_designation',$des->id)->count();
             }
            $data['total'] = Hrms_Sanctioned_PostsModel::where('level_id',3)->sum('post_sanctioned');
        }
        return view('hrms.ulb_report',$data );
    }

    public function get_post_count(Request $request){
        $desid = $request->desid;
        $attr = ['current_designation'=> $request->desid,'hrms_employees.employee_type'=>$request->emp];
        if($request->dist){
            $attr = ['hrms_employees_current_infos.district'=> $request->dist,'current_designation'=> $request->desid,'hrms_employees.employee_type'=>$request->emp];
        }
        if($request->ulb){
            $attr = ['hrms_employees_current_infos.ulbid'=> $request->ulb,'current_designation'=> $request->desid,'hrms_employees_current_infos.district'=> $request->dist,'hrms_employees.employee_type'=>$request->emp];
        }

        $pos_count = DB::table('hrms_employees')->join('hrms_employees_current_infos','hrms_employees_current_infos.employee_id','=','hrms_employees.employee_id')
                     ->where($attr)->count();


        echo $pos_count;
    }

    public function occupied_post_inner_report(Request $request){
        $group_id = $request->id;

        $des = Hrms_DesignationsModel::where('group_id',$group_id)->pluck('id');

        $data['emp'] = EmployeesCurrentInfosModel::with('GetEmployee','DistricstsModel','UlbmstModel','GetDesignation')->whereIn('current_designation',$des)->get();
        $data['curr_des'] = DB::table('hrms_designations_group')->where('group_id',$group_id)->value('designation');

        return view('hrms.inner_report',$data);
    }
    public function sanctioned_post_inner_report(Request $request){

        $group_id = $request->id;
        $data['vac'] = $request->id1;


        $des = Hrms_DesignationsModel::where('group_id',$group_id)->pluck('id');
        $data['curr_des'] = DB::table('hrms_designations_group')->where('group_id',$group_id)->value('designation');

        $data['designtion'] = Hrms_Sanctioned_PostsModel::with('DistricstsModel','UlbmstModel','EmployeeType')->whereIn('designation_id',$des)->where('post_sanctioned','>','0')->get();
        // dd($data['designtion']);

        $data['occupied'] = EmployeesCurrentInfosModel::whereIn('current_designation',$des)->get();

            // dd($data['occupied']);

        return view('hrms.sanctioned_post_inner_report',$data);
    }

    // public function vaccant_post_inner_report(Request $request){
    //     $group_id = $request->id;
    //     $des = Hrms_DesignationsModel::where('group_id',$group_id)->pluck('id');

    //     $designtion = Hrms_Sanctioned_PostsModel::whereIn('designation_id',$des)->where('post_sanctioned','>','0')->get();

    //     foreach($designtion as $des){
    //         dd($des);
    //     }
    // }







}
