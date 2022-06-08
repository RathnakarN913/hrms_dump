<?php

namespace App\Http\Controllers\hrms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\hrms\AddEmployeeModel;
use App\Models\hrms\DesignationModel;
use App\Models\hrms\AddAttendanceModel;
use App\Models\hrms\MonthModel;
use App\Models\hrms\EmployeeType;
use App\Models\hrms\DistricstsModel;
use App\Models\hrms\LeaveTypeMstModel;
use Session;
use DB;
use DateTime;
error_reporting(0);

class AttendenceController extends Controller
{
    public function attendence(Request $request)
    {
        $distid = session()->get('distid');
        /*$condition = array('district'=>$distid);
        $data['emp_data'] = AddEmployeeModel::where($condition)->get();*/
        //print_r($request->post('employee_type'));
        $data['employeetypes'] = EmployeeType::all();
        $data['districts'] = DistricstsModel::all();
        $designations = DesignationModel::get();
        $emp_type1="";
        $dist1="";
        $ulb1="";
        foreach($designations as $key=>$val)
        {
            $data['designations'][$val->id] = $val->description;
        }
        if($request->post('submit') == "Get Details")
        {
            $emp_type1=$request->post('employee_type');
            $dist1=$request->post('district');
            $ulb1=$request->post('ulbid');
            $emp_type=$request->post('employee_type');
            $dist=$request->post('district');
            $ulb=$request->post('ulbid');
            if($dist=="")
            {
                $condition=array('employee_type'=>$emp_type);
            }
            else if($dist != "" && $ulb == "" )
            {
                $condition=array('employee_type'=>$emp_type,'district'=>$dist);
            }
            else if($dist !="" && $ulb != "")
            {
                $condition=array('employee_type'=>$emp_type,'district'=>$dist,'ulbid'=>$ulb);
            }
            else
            {

            }

                 $data['emp_data'] = AddEmployeeModel::with('GetCurrentStatus')->where($condition)->get();
                //$data['emp_data'] = AddEmployeeModel::where($condition)->get();

        }
        else
        {
            // employee attendence caluclation
                $start = date('Y-m-01');
                $last = date('Y-m-t');

                $begin  = new DateTime($start);
                $end    = new DateTime($last);
                // dd($begin);
                $sun_count = 0;
                while ($begin <= $end) // Loop will work begin to the end date
                {
                    if($begin->format("D") == "Sun") //Check that the day is Sunday here
                    {
                        $sun_count = $sun_count + 1;
                    }

                    $begin->modify('+1 day');
                }

                $data['holidays'] = DB::table('holiday_mst')->whereBetween('date',[$start,$last])->count();

                $data['sun_count'] = $sun_count + 1;

                $district = session()->get('distid');
             $data['emp_data'] = AddEmployeeModel::with('GetCurrentStatus')->where('district',$district)->get();

             $next_month = date('m') + 1;
             $avl_leave = DB::table('hrms_employee_leave_details')->where('month',$next_month)->get();

             $leave = DB::table('hrms_employee_leave_details')->where('month',date('m'))->get();

             foreach ($data['emp_data'] as $emp) {
                $alopg = $avl_leave->where('employee_id',$emp->employee_id)->sum('ALopg');
                $alavld = $leave->where('employee_id',$emp->employee_id)->sum('ALavld');

                $SCLopg = $avl_leave->where('employee_id',$emp->employee_id)->sum('SCLopg');
               $SCLavld = $leave->where('employee_id',$emp->employee_id)->sum('SCLavld');

               $CLopg = $avl_leave->where('employee_id',$emp->employee_id)->sum('CLopg');
               $CLavld = $leave->where('employee_id',$emp->employee_id)->sum('CLavld');

               $MLopg = $avl_leave->where('employee_id',$emp->employee_id)->sum('MLopg');
               $MLavld = $leave->where('employee_id',$emp->employee_id)->sum('MLavld');

               $PLopg = $avl_leave->where('employee_id',$emp->employee_id)->sum('PLopg');
               $PLavld = $leave->where('employee_id',$emp->employee_id)->sum('PLavld');

               $ELopg = $avl_leave->where('employee_id',$emp->employee_id)->sum('ELopg');
               $ELavld = $leave->where('employee_id',$emp->employee_id)->sum('ELavld');

               $SLopg = $avl_leave->where('employee_id',$emp->employee_id)->sum('SLopg');
               $SLavld = $leave->where('employee_id',$emp->employee_id)->sum('SLavld');

               $SDLopg = $avl_leave->where('employee_id',$emp->employee_id)->sum('SDLopg');
               $SDLavld = $leave->where('employee_id',$emp->employee_id)->sum('SDLavld');

                 $data['leave'][$emp->employee_id]['total_opg'] = $alopg + $SCLopg + $CLopg + $PLopg + $ELopg + $SLopg + $SDLopg;
                 $data['leave'][$emp->employee_id]['total_avl'] = $alavld + $SCLavld + $CLavld + $PLavld + $ELavld + $SLavld + $SDLavld;
                 $data['leave'][$emp->employee_id]['lop'] = $leave->where('employee_id',$emp->employee_id)->sum('lop');
             }

            //$data['emp_data'] = AddEmployeeModel::get();
        }
        if($request->post('submit')=="Submit")
        {
            $month = htmlspecialchars(strip_tags($request->post('month')));
            $year = htmlspecialchars(strip_tags($request->post('year')));
            $condition = array('distid'=>Session::get('distid'),'month'=>date('n'),'year'=>date('Y'));
            AddAttendanceModel::where($condition)->delete();

            foreach($request->post('employee') as $key=>$emp_id)
            {

                if($request->post('attended')[$key] <=$request->post('no_of_days')[$key])
                {
                    //return  $request->post('employee_type')[$key];

                     $insertParams = array(

                        'ulbid' =>'',
                        'distid' =>Session::get('distid'),
                        'year' =>$year,
                        'month' =>$month,
                        'employee_id' =>$emp_id,
                        'employee_type' => $request->post('employee_type1')[$key],
                        'designation_id' =>$request->post('designation')[$key],
                        'working_days' =>$request->post('no_of_days')[$key],
                        'attend_days' =>$request->post('attended')[$key],
                        'leaved_aviled' =>$request->post('avl_leave')[$key],
                        'commulative_leaved' =>$request->post('comm_leave')[$key],
                        'remarks' =>$request->post('remarks')[$key],
                        'created_at' =>date('Y-m-d H:i:s'),
                        'updated_at' =>date('Y-m-d H:i:s'),
                        'date' =>date('Y-m-d')
                        );
                        AddAttendanceModel::insert($insertParams);
                }
            }
            Session::flash('success','Attendance updated successfully');
        }



        $params = array('month_id'=>date('n'));

        $data['month_dates_range'] = MonthModel::where($params)->get();

        $params = array('distid'=>Session::get('distid'),'month'=>date('n'),'year'=>date('Y'));

     $previousData = AddAttendanceModel::where($params)->get();
        foreach($previousData as $key=>$val)
        {
            $data['previousData'][$val->employee_id]['employee_id'] = $val->employee_id;
            $data['previousData'][$val->employee_id]['year'] = $val->year;
            $data['previousData'][$val->employee_id]['month'] = $val->month;
            $data['previousData'][$val->employee_id]['designation_id'] = $val->designation_id;
            $data['previousData'][$val->employee_id]['working_days'] = $val->working_days;
            $data['previousData'][$val->employee_id]['attend_days'] = $val->attend_days;
            $data['previousData'][$val->employee_id]['leaved_aviled'] = $val->leaved_aviled;
            $data['previousData'][$val->employee_id]['commulative_leaved'] = $val->commulative_leaved;
            $data['previousData'][$val->employee_id]['remarks'] = $val->remarks;
        }
         //dd($data['emp_data']);

        return view('hrms.add_attendence',$data, compact('emp_type1','dist1','ulb1'));
    }
    public function attendance_report(){
        $distid = session()->get('distid');
        /*$data['employee'] = AddEmployeeModel::with('DesignationModel','AddAttendanceModel')->where('district',$distid)->get();*/
        $data['employee'] = AddEmployeeModel::with('DesignationModel','AddAttendanceModel')->get();

        return view('hrms.attendance_report',$data);
    }

    public function leave_register(){
        // dd(session()->all());

        $district = session()->get('distid');
        $data['district'] = $district;
        $data['distname'] = DistricstsModel::where('distid',$district)->value('distname');
        $data['employee'] = DB::table('hrms_employees')->leftjoin('ulbmst','hrms_employees.ulbid','=','ulbmst.ulbid')
                ->join('Districtmst','Districtmst.distid','=','hrms_employees.district')
                ->where('district',$district)->get();
        $data['leave_count'] = DB::table('hrms_employee_leave_details')->where('district',$district)->where('month',date('m'))->where('year',date('Y'))->get();


        foreach($data['leave_count'] as $le){
            $data['image'][$le->employee_id] = $le->performance;
        }
        $data['ao_status'] = $data['leave_count'][0]->ao_status;
        $data['leave'] = LeaveTypeMstModel::all();
        return view('hrms.leave_register',$data);
    }
    public function save_leave_request(Request $request){
        // $this->validate($request,['month'=>'required']);

        $district = session()->get('distid');
        $ulb = $request->ulb;
        $employee = $request->employee;
        $month = date('m');
        $year = date('Y');
        $ALopg =  $request->ALopg;
        $ALavld =  $request->ALavld;
        $SCLopg =  $request->SCLopg;
        $SCLavld =  $request->SCLavld;
        $CLopg =  $request->CLopg;
        $CLavld =  $request->CLavld;
        $MLopg =  $request->MLopg;
        $MLavld =  $request->MLavld;
        $PLopg =  $request->PLopg;
        $PLavld =  $request->PLavld;
        $ELopg =  $request->ELopg;
        $ELavld =  $request->ELavld;
        $SLopg =  $request->SLopg;
        $SLavld =  $request->SLavld;
        $SDLopg =  $request->SDLopg;
        $SDLavld =  $request->SDLavld;
        $lop = $request->lop;
        $performance = $request->performance;

        $new_year = date('Y');
        $new_month = $month + 1;
        if($month == 12){
            $new_year = $year + 1;
            $new_month = 1;
        }

        if(session()->get('user_type') == 'AO'){
            for($i=0;$i<count($employee);$i++){
            if($ALopg[$i] == ''){ $ALopg[$i] = 0; }
            if($ALavld[$i] == ''){ $ALavld[$i] = 0; }

            if($MLopg[$i] == ''){ $MLopg[$i] = 0; }
            if($MLavld[$i] == ''){ $MLavld[$i] = 0; }
            if($PLopg[$i] == ''){ $PLopg[$i] = 0; }
            if($PLavld[$i] == ''){ $PLavld[$i] = 0; }

            if($lop[$i] == ''){ $lop[$i] = 0; }


            // $dup = DB::table('hrms_employee_leave_details')->where('month',$month)->where('employee_id',$employee[$i])->first();

            // $photo = $performance[$i];
            // if($dup){
            //     $photoFileName = $dup->performance;
            // }else{
            //     $photoFileName = '';
            // }
            // if($photo){
            //     $photoFileName = time().'_performance'.'.'.$photo->getClientOriginalExtension();
            //     $photo->move(public_path('./assets/hrms/performance'), $photoFileName);
            // }

            $data = array(
                'ALopg' => $ALopg[$i],
                'ALavld' => $ALavld[$i],
                'MLopg' => $MLopg[$i],
                'MLavld' => $MLavld[$i],
                'PLopg' => $PLopg[$i],
                'PLavld' => $PLavld[$i],
                'lop' => $lop[$i],
                'ao_status' => 2,
                // 'performance' => $photoFileName,

            );

                DB::table('hrms_employee_leave_details')->where('month',$month)->where('year',$year)->where('employee_id',$employee[$i])->update($data);
        }
        $monthName = date('F', mktime(0, 0, 0, $month, 10));
        $msg = 'Attendence Register for the month of '.$monthName.' is ready to be send to FM';
            return back()->with('success',$msg);

        }else{
            for($i=0;$i<count($employee);$i++){
                if($ALopg[$i] == ''){ $ALopg[$i] = 0; }
                if($ALavld[$i] == ''){ $ALavld[$i] = 0; }
                if($SCLopg[$i] == ''){ $SCLopg[$i] = 0; }
                if($SCLavld[$i] == ''){ $SCLavld[$i] = 0; }
                if($CLopg[$i] == ''){ $CLopg[$i] = 0; }
                if($CLavld[$i] == ''){ $CLavld[$i] = 0; }
                if($MLopg[$i] == ''){ $MLopg[$i] = 0; }
                if($MLavld[$i] == ''){ $MLavld[$i] = 0; }
                if($PLopg[$i] == ''){ $PLopg[$i] = 0; }
                if($PLavld[$i] == ''){ $PLavld[$i] = 0; }
                if($ELopg[$i] == ''){ $ELopg[$i] = 0; }
                if($ELavld[$i] == ''){ $ELavld[$i] = 0; }
                if($SLopg[$i] == ''){ $SLopg[$i] = 0;   }
                if($SLavld[$i] == ''){  $SLavld[$i] = 0; }
                if($SDLopg[$i] == ''){ $SDLopg[$i] = 0; }
                if($SDLavld[$i] == ''){ $SDLavld[$i] = 0; }
                if($lop[$i] == ''){ $lop[$i] = 0; }


                $dup = DB::table('hrms_employee_leave_details')->where('month',$month)->where('year',$year)->where('employee_id',$employee[$i])->first();

                $photo = $performance[$i];
                if($dup){
                    $photoFileName = $dup->performance;
                }else{
                    $photoFileName = '';
                }
                if($photo){
                    $photoFileName = time().'_performance'.'.'.$photo->getClientOriginalExtension();
                    $photo->move(public_path('./assets/hrms/performance'), $photoFileName);
                }

                $data = array(
                    'employee_id' => $employee[$i],
                    'district' => $district,
                    'ulbid' => $ulb[$i],
                    'month' => $month,
                    'year' => date('Y'),
                    'ALopg' => $ALopg[$i],
                    'ALavld' => $ALavld[$i],
                    'SCLopg' => $SCLopg[$i],
                    'SCLavld' => $SCLavld[$i],
                    'CLopg' => $CLopg[$i],
                    'CLavld' => $CLavld[$i],
                    'MLopg' => $MLopg[$i],
                    'MLavld' => $MLavld[$i],
                    'PLopg' => $PLopg[$i],
                    'PLavld' => $PLavld[$i],
                    'ELopg' => $ELopg[$i],
                    'ELavld' => $ELavld[$i],
                    'SLopg' => $SLopg[$i],
                    'SLavld' => $SLavld[$i],
                    'SDLopg' => $SDLopg[$i],
                    'SDLavld' => $SDLavld[$i],
                    'lop' => $lop[$i],
                    'performance' => $photoFileName,

                );



                $data1 = array(
                    'employee_id' => $employee[$i],
                    'district' => $district,
                    'ulbid' => $ulb[$i],
                    'month' => $new_month,
                    'year' => $new_year,
                    'ALopg' => $ALopg[$i] - $ALavld[$i],
                    'SCLopg' => $SCLopg[$i] - $SCLavld[$i],
                    'CLopg' => $CLopg[$i] - $CLavld[$i],
                    'MLopg' => $MLopg[$i] - $MLavld[$i],
                    'PLopg' => $PLopg[$i] - $PLavld[$i],
                    'ELopg' => $ELopg[$i] - $ELavld[$i],
                    'SLopg' => $SLopg[$i] - $SLavld[$i],
                    'SDLopg' => $SDLopg[$i] - $SDLavld[$i],
                    'ALavld' => 0,
                    'SCLavld' => 0,
                    'CLavld' => 0,
                    'MLavld' => 0,
                    'PLavld' => 0,
                    'ELavld' => 0,
                    'SLavld' => 0,
                    'SDLavld' => 0,
                    'lop' => 0,
                );


                if($dup){
                    DB::table('hrms_employee_leave_details')->where('month',$month)->where('year',$year)->where('employee_id',$employee[$i])->update($data);
                }else{
                    DB::table('hrms_employee_leave_details')->insert($data);
                }

                 $dup1 = DB::table('hrms_employee_leave_details')->where('month',$new_month)->where('year',$new_year)->where('employee_id',$employee[$i])->first();
                if($dup1){
                    DB::table('hrms_employee_leave_details')->where('month',$new_month)->where('year',$new_year)->where('employee_id',$employee[$i])->update($data1);
                }else{
                    DB::table('hrms_employee_leave_details')->insert($data1);
                }

            }
            return back()->with('success','Leave Details Inserted succesfully');
        }


    }
    public function genarate_otp(){
        $otp = rand(1000,9999);
        $html = $otp;
        DB::table('users')->where('user_id',session()->get('user_id'))->update(['otp'=>$otp]);
        echo $html;
    }
    public function verify_otp(Request $request){
        $this->validate($request,[
            'otp' => 'required',
        ]);

        $otp = $request->otp;

        $result = DB::table('users')->where('user_id',session()->get('user_id'))->where('otp',$otp)->first();


        if($result){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function forward_ao(){
        $district = session()->get('distid');
        $month = date('m');
        $year = date('Y');
        $data = array('ao_status'=>1);
        $result = DB::table('hrms_employee_leave_details')->where('district',$district)->where('month',$month)->where('year',$year)->update($data);
        if($result){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function get_leave_notifications(){

        if(session()->get('user_type') == 'AO'){
            $leaves = DB::table('hrms_employee_leave_details')
                      ->join('Districtmst','Districtmst.distid','=','hrms_employee_leave_details.district')
                      ->where('ao_status',1)->groupby('district')->get();
            $html='';

            foreach($leaves as $le){
                $html.='<a class="dropdown-item preview-item" href="'.url("leave_check_ao").'/'.$le->distid.'">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-success">
                        <i class="fa fa-check ml-2"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <h6 class="preview-subject font-weight-normal"> A notification  from PD <b>'.$le->distname.'</b> <br> to Review/Approve  the Leaves</h6>

                    </div>
                  </a><hr>';
            }


            // new employee count

            $employee = AddEmployeeModel::with('DistrictModel')->where('approve_status',0)->get();

            foreach($employee as $emp){
                    $html.='<a class="dropdown-item preview-item" href="https://telangana.emunicipal.in/hrms/edit-update-employee/'.$emp->employee_id.'"">
                        <div class="preview-thumbnail">
                          <div class="preview-icon bg-success">
                            <i class="fa fa-check ml-2"></i>
                          </div>
                        </div>
                        <div class="preview-item-content">
                          <h6 class="preview-subject font-weight-normal"> A notification  from PD <b>'.$emp->DistrictModel[0]->distname.'</b> <br> to Review/Approve  the <b> "'.$emp->name.'" </b> Employee</h6>

                        </div>
                      </a><hr>';
                }

                 $count = count($employee) + count($leaves);


            $data = array('html'=>$html,'count'=>$count);

            return response()->json($data, 200);
        }else{
            // new employee count
            $district = session()->get('distid');
            $employee = AddEmployeeModel::with('DistrictModel')->where('district',$district)->where('approve_status',2)->get();

            foreach($employee as $emp){
                    $html.='<a class="dropdown-item preview-item" href="https://telangana.emunicipal.in/hrms/edit-update-employee/'.$emp->employee_id.'">
                        <div class="preview-thumbnail">
                          <div class="preview-icon bg-success">
                            <i class="fa fa-check ml-2"></i>
                          </div>
                        </div>
                        <div class="preview-item-content">
                          <h6 class="preview-subject font-weight-normal"> A notification  from AO to Review <br> the <b> "'.$emp->name.'" </b> Employees Details</h6>

                        </div>
                      </a><hr>';
                }

                 $count = count($employee);


            $data = array('html'=>$html,'count'=>$count);

            return response()->json($data, 200);
        }
    }
    public function leave_check_ao(Request $request){
        $district = $request->id;
        $data['district'] = $district;
        $data['distname'] = DistricstsModel::where('distid',$district)->value('distname');
        $data['employee'] = DB::table('hrms_employees')->leftjoin('ulbmst','hrms_employees.ulbid','=','ulbmst.ulbid')
                ->join('Districtmst','Districtmst.distid','=','hrms_employees.district')
                ->where('district',$district)->get();
        $data['leave_count'] = DB::table('hrms_employee_leave_details')->where('district',$district)->where('month',date('m'))->where('year',date('Y'))->get();
        foreach($data['leave_count'] as $le){
            $data['image'][$le->employee_id] = $le->performance;
        }
        $data['ao_status'] = $data['leave_count'][0]->ao_status;
        $data['leave'] = LeaveTypeMstModel::all();
        return view('hrms.leave_register',$data);
    }
    public function ao_approve(Request $request){
        $district = $request->district;
        $remarks = $request->remarks;
        dd($remarks);
        $result = DB::table('hrms_employee_leave_details')->where('district',$district)->where('month',date('m'))->where('year',date('Y'))->update(['ao_status'=>2,'ao_remarks'=>$remarks]);

        if($result){
            echo 1;
        }else{
            echo 0;
        }
    }
}
