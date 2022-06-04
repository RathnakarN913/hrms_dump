<?php

namespace App\Http\Controllers\hrms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\hrms\AddEmployeeModel;
use App\Models\hrms\DesignationModel;
use App\Models\UlbmstModel;
use App\Models\hrms\AddAttendanceModel;
use App\Models\DistrictModel;
use App\Models\hrms\MonthModel;
use Session;
use DB;
error_reporting(0);

class FmAttendanceViewController extends Controller
{
    public function index(Request $request){
        
        $params = array('month_id'=>date('n'));
        $data['month_dates_range'] = MonthModel::where($params)->get();
        
        $params = array('month'=>date('n'),'year'=>date('Y'));
        // dd($params);
        $attendanceUpdationData = AddAttendanceModel::selectRaw('distid')->where($params)->groupBy('distid')->get();
        foreach($attendanceUpdationData as $key=>$val)
        {
            $data['districtids'][$val->distid] = $val->distid;
        }
        
        $data['distlist'] = DistrictModel::orderBy('distname')->get();
        return view('hrms.fmattendance_view',$data);
        
    }
    
    public function create_payslips(){
        $params = array('month_id'=>date('n'));
        $data['month_dates_range'] = MonthModel::where($params)->get();
        $params = array('month'=>date('n'),'year'=>date('Y'));
        // dd($params);
        $attendanceUpdationData = AddAttendanceModel::selectRaw('distid')->where($params)->groupBy('distid')->get();
        foreach($attendanceUpdationData as $key=>$val)
        {
              $data['districtids'][$val->distid] = $val->distid;
              $dist_ulb_emp = AddAttendanceModel::join('hrms_employees', 'hrms_employees.employee_id', '=', 'hrms_attendance.employee_id')
              ->where('hrms_attendance.distid',$val->distid)
              ->where('hrms_attendance.ulbid','!=','')
              ->where('hrms_attendance.year','=',date('Y'))
              ->where('hrms_attendance.month','=',date('n'))
              ->Where('hrms_attendance.payslip_status',0)
              ->get();
            // dd($dist_ulb_emp);die;
              foreach($dist_ulb_emp  as $emp){
                //  dd($emp);die;
                   $employess1 = UlbmstModel::join('Districtmst', 'Districtmst.distid', '=', 'ulbmst.distid')->where('ulbmst.distid',$emp->distid)->where('ulbmst.ulbid',$emp->ulbid)->first();
                  //  dd($employess1);die;
                    echo '<table cellspacing="0" cellpadding="0" class="table table-bordered" border=1>
 
                              <tr class="table table-primary">
                                <td colspan="27" width="1860">MONTHLY SALARY BILL OF HR STAFF WORKING IN MEPMA (DPMUs &amp;    ULBs) FOR THE MONTH OF  JANUARY    -2022   (21-01-2022 TO 20-02-2022) </td>
                              </tr>
                              <tr class="table table-primary">
                                <td rowspan="2" width="41">Sl.No.</td>
                                <td rowspan="2" width="109">Name of the District</td>
                                <td rowspan="2" width="103">Name of the ULBs</td>
                                <td rowspan="2" width="97">Name of the Employee &amp; Designation</td>
                                <td rowspan="2" width="67">Designation</td>
                                <td rowspan="2" width="65">Grade</td>
                                <td rowspan="2" width="76">Basic <br>
                                  Pay</td>
                                <td rowspan="2" width="79">Special Rent Allowance (SRA)</td>
                                <td rowspan="2" width="79">EPF (13%) Employer Share max upto 15,000</td>
                                <td rowspan="2" width="64">ESI (3.25%) Employer Share</td>
                                <td rowspan="2" width="73">FTA as per eligibility</td>
                                <td rowspan="2" width="44">Medical Insurance (Employer Share) as decided    later</td>
                                <td rowspan="2" width="103">Gross Pay</td>
                                <td rowspan="2" width="48">No. of Days in month</td>
                                <td rowspan="2" width="39">No. of     Working Days</td>
                                <td rowspan="2" width="78">Gross Pay as per attendance</td>
                                <td colspan="9" width="484">Deductions</td>
                                <td rowspan="2" width="82">Net Pay</td>
                                <td rowspan="2" width="129">Remarks</td>
                              </tr>
                              <tr class="table table-primary">
                                <td width="83">EPF (13%) Employer Share max upto 15,000</td>
                                <td width="68">EPF    (12%) Employee Share max upto 15,000</td>
                                <td width="60">ESI    (3.25%) Employer Share</td>
                                <td width="60">ESI    (0.75%) Gross pay less than Rs. 21000</td>
                                <td width="4">Insurance    (Employee Share) as decided later</td>
                                <td width="60">PT</td>
                                <td width="60">AGIS</td>
                                <td width="23">Balance    FTA deducted if field visits not performed</td>
                                <td width="66">Total    Deductions</td>
                              </tr>
                              <tr class="table table-primary">
                                <td width="41">1</td>
                                <td width="109">2</td>
                                <td width="103">3</td>
                                <td width="97">4</td>
                                <td width="67">5</td>
                                <td width="65">6</td>
                                <td width="76">7</td>
                                <td width="79">8</td>
                                <td width="79">9</td>
                                <td width="64">10</td>
                                <td width="73">11</td>
                                <td width="44">12</td>
                                <td width="103">14</td>
                                <td width="48">15</td>
                                <td width="39">16</td>
                                <td width="78">17</td>
                                <td width="83">18</td>
                                <td width="68">19</td>
                                <td width="60">20</td>
                                <td width="60">21</td>
                                <td width="4">&nbsp;</td>
                                <td width="60">23</td>
                                <td width="60">24</td>
                                <td width="23">25</td>
                                <td width="66">26</td>
                                <td width="82">27</td>
                                <td width="129">28</td>
                              </tr>
                              <tr>
                                <td width="41">1</td>
                                <td dir="LTR" width="109">'.$employess1->distname.' </td>
                                <td dir="LTR" width="103">'.$employess1->ulbname.'  </td>
                                <td width="97">'.$emp->name.'</td>
                                <td width="67">DMC</td>
                                <td width="65">Grade 3</td>
                                <td>'.$emp->current_basic_salary.'</td>
                                <td>3535</td>
                                <td>1950</td>
                                <td>0</td>
                                <td>2500</td>
                                <td width="44">0</td>
                                <td width="103">32362</td>
                                <td width="48">31</td>
                                <td width="39">0</td>
                                <td width="78">0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>0</td>
                                <td>&nbsp;</td>
                                <td>0</td>
                                <td>0</td>
                                <td>&nbsp;</td>
                                <td>0</td>
                                <td>0</td>
                                <td rowspan="10" width="129">Attendance not received</td>
                              </tr>
                              
                            </table>';      
              }
       
        }
        
    }
}
