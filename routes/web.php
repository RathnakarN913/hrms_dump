<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ivnm\IvnmDashboardController;
use App\Http\Controllers\ulbtoiletmaps\UlbtoiletMapController;
use App\Http\Controllers\ProjectDashboardController;
use App\Http\Controllers\hrms\HrmsDashboardController;
use App\Http\Controllers\TestPageController;
use App\Middleware\UserAuthentication;
use App\Http\Controllers\hrms\AddEmployeeController;
use App\Http\Controllers\hrms\EmployeesCurrentInfos;
use App\Http\Controllers\hrms\EmployeesWorkExpModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\SanctionedPostController;
use App\Http\Controllers\hrms\AttendenceController;
use App\Http\Controllers\hrms\FmAttendanceViewController;
use App\Http\Controllers\hrms\ViewAttendenceController;
use App\Models\hrms\SanctionedPosts;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/


// Route::get('addyear', function() {
//     // foreach()
//     for($i = 1950; $i <= 2022; $i++) {
//         DB::table('hrms_year_mst')->insert(
//              array(
//                     'year'   =>   $i
//              )
//         );
//         echo $i;
//         echo '<br>';
//     }
    
// });

Route::get("/test", [SanctionedPostController::class, "test"])->name('/test');;


Route::get("/", [LoginController::class, "index"])->name('/login');;
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post("checkLogin", [LoginController::class, "checkLogin"])->name('/checkLogin');
Route::get("logout", [LoginController::class, "logout"])->name('/logout');;
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('project-dashboard/{id}', [ProjectDashboardController::class, 'index'])->name('project-dashboard');
Route::get('ward-wise-report', [ProjectDashboardController::class, 'wardwiseReport'])->name('ward-wise-report');
Route::post('ward-wise-report', [ProjectDashboardController::class, 'wardwiseReport'])->name('ward-wise-report');
Route::post('ulb-ward-wise-report', [ProjectDashboardController::class, 'ulbWardwiseReport'])->name('ulb-ward-wise-report');
Route::get('ulb-ward-wise-report', [ProjectDashboardController::class, 'ulbWardwiseReport'])->name('ulb-ward-wise-report');
Route::get('ulb-cleaned-report', [ProjectDashboardController::class, 'ulbCleanReport'])->name('ulb-cleaned-report');
Route::get('ulb-date-cleaned-report', [ProjectDashboardController::class, 'ulbDateCleanReport'])->name('ulb-date-cleaned-report');
Route::post('ulb-date-cleaned-report', [ProjectDashboardController::class, 'ulbDateCleanReport'])->name('ulb-date-cleaned-report');
Route::post('ulb-cleaned-report', [ProjectDashboardController::class, 'ulbCleanReport'])->name('ulb-cleaned-report');
Route::get('test-page', [TestPageController::class, 'index'])->name('test-page');



/*** ivnm project *****/

Route::match(['post','get'], 'ivnm',[IvnmDashboardController::class,'index']);
Route::match(['post','get'], 'vkd',[IvnmDashboardController::class,'vkd']);
Route::match(['post','get'], 'ivnm_vkd_search',[IvnmDashboardController::class,'ivnm_vkd_search']);
Route::match(['post','get'], 'inner_reports/{id}/{id1}',[IvnmDashboardController::class,'inner_reports']);
Route::match(['post','get'], 'ivnmvkdapp',[IvnmDashboardController::class,'downloadapk']);

/**** close ****/

/*** hrms project ***/
Route::match(['post','get'], 'dashboard_hrms',[HrmsDashboardController::class,'index']);
Route::get('headoffice',[SanctionedPostController::class,'index'])->name('headoffice');
//Route::get('headoffice',[SanctionedPostController::class,'index'])->name('headoffice');
Route::match(['post','get'],'district_sanctioned_post',[SanctionedPostController::class,'district'])->name('district_sanctioned_post');
Route::match(['post','get'],'district_sanctioned_post1',[SanctionedPostController::class,'district1'])->name('district_sanctioned_post1');
Route::match(['post','get'],'ulb_sanctioned_posts',[SanctionedPostController::class,'ulb'])->name('ulb_sanctioned_posts');
Route::match(['post','get'],'headofficeinsert',[SanctionedPostController::class,'headofficeinsert'])->name('headofficeinsert');
Route::match(['post','get'],'districtinsert',[SanctionedPostController::class,'districtinsert'])->name('districtinsert');
// Route::match(['post','get'],'districtinsert1',[SanctionedPostController::class,'districtinsert1'])->name('districtinsert1');
Route::match(['post','get'],'ulbinsert',[SanctionedPostController::class,'ulbinsert'])->name('ulbinsert');
Route::match(['post','get'],'overallreport',[SanctionedPostController::class,'overallreport'])->name('overallreport');

Route::match(['post','get'],'occupied_post_inner_report/{id}',[SanctionedPostController::class,'occupied_post_inner_report']);
Route::match(['post','get'],'sanctioned_post_inner_report/{id}',[SanctionedPostController::class,'sanctioned_post_inner_report']);
Route::match(['post','get'],'sanctioned_post_inner_report/{id}/{id1}',[SanctionedPostController::class,'sanctioned_post_inner_report']);
// Route::match(['post','get'],'vaccant_post_inner_report/{id}',[SanctionedPostController::class,'vaccant_post_inner_report']);


Route::match(['post','get'],'head_office_report',[SanctionedPostController::class,'head_office_report'])->name('head_office_report');
Route::match(['post','get'],'district-report',[SanctionedPostController::class,'districtreport'])->name('district-report');
Route::match(['post','get'],'ulb_report',[SanctionedPostController::class,'ulbreport'])->name('ulb_report');

Route::match(['post','get'],'get_post_count',[SanctionedPostController::class,'get_post_count']);



/*** close ***/

/** ulb toilets project ****/
Route::match(['post','get'], 'cppt',[UlbtoiletMapController::class,'index']);
/** close ****/


// Add Employee  
Route::any('add-employee', [AddEmployeeController::class,'index'])->name('AddEmployee');
Route::any('add-new-current_designation', [AddEmployeeController::class,'AddCurrentDesignation'])->name('AddCurrentDesignation');
Route::any('remove-current_designation', [AddEmployeeController::class,'RemoveCurrentDesignation'])->name('RemoveCurrentDesignation');
Route::any('add-new-work-experience', [AddEmployeeController::class,'AddWorkExperience'])->name('AddWorkExperience');
Route::any('remove-work-experience', [AddEmployeeController::class,'RemoveWorkExperience'])->name('RemoveWorkExperience'); 
Route::any('add-Nomineee', [AddEmployeeController::class,'AddNominee'])->name('AddNominee');
Route::any('add-Family', [AddEmployeeController::class,'AddFamily'])->name('AddFamily');

Route::any('remove-Nomineee', [AddEmployeeController::class,'RemoveNomineee'])->name('RemoveNomineee');
Route::any('remove-family', [AddEmployeeController::class,'RemoveFamily'])->name('RemoveFamily');

Route::any('view-employee', [AddEmployeeController::class,'ViewEmployee'])->name('ViewEmployee');
Route::any('reject_employee', [AddEmployeeController::class,'reject_employee'])->name('reject_employee');


Route::any('edit-update-employee/{emp_id}', [AddEmployeeController::class,'EditUpdateEmployee'])->name('EditUpdateEmployee');
Route::any('update-employee', [AddEmployeeController::class,'UpdateEmployee'])->name('UpdateEmployee');

Route::any('Update_gov_Employee', [AddEmployeeController::class,'Update_gov_Employee'])->name('Update_gov_Employee');

Route::any('delete-employee/{id}',[AddEmployeeController::class,'DeleteEmployee'])->name('DeleteEmployee');

Route::any('get-ulbs', [AddEmployeeController::class,'GetUlbs'])->name('GetUlbs');
Route::any('get-marital-status', [AddEmployeeController::class,'GetMaritalStatus'])->name('GetMaritalStatus');
Route::any('get-get-discipline-lists', [AddEmployeeController::class,'GetDisciplineLists'])->name('GetDisciplineLists');

Route::any('create-add-employee', [AddEmployeeController::class,'Create'])->name('CreateAddEmployee');
Route::any('gov_createAddEmployee', [AddEmployeeController::class,'Create_gov'])->name('gov_createAddEmployee');



Route::any('get-current-designation', [AddEmployeeController::class,'GetCurrentDesignationS'])->name('GetCurrentDesignationS');

Route::any('curruntremovefamily', [AddEmployeeController::class,'curruntremovefamily'])->name('curruntremovefamily');
Route::any('removecurruntnominee', [AddEmployeeController::class,'removecurruntnominee'])->name('removecurruntnominee');
Route::any('removeExistsWorkExperience', [AddEmployeeController::class,'removeExistsWorkExperience'])->name('removeExistsWorkExperience');


Route::any('/GetdesignationName/{designation_id}', [AddEmployeeController::class,'GetdesignationName'])->name('GetdesignationName');
Route::any('/validate-selected-designation-avaibility', [AddEmployeeController::class,'ValidateDesignationAvaibility'])->name('validateSelectedDesignationAvaibility');
Route::any('/validate-selected-designation-avaibility2', [AddEmployeeController::class,'ValidateDesignationAvaibility2'])->name('validateSelectedDesignationAvaibility2');


// Add Employee  
// ADD ATTENDENCE
Route::any('add-attendance', [AttendenceController::class,'attendence']);

Route::any('leave_register', [AttendenceController::class,'leave_register']);
Route::any('save_leave_request', [AttendenceController::class,'save_leave_request']);
Route::any('genarate_otp', [AttendenceController::class,'genarate_otp']);
Route::any('verify_otp', [AttendenceController::class,'verify_otp']);
Route::any('forward_ao', [AttendenceController::class,'forward_ao']);
Route::any('get_leave_notifications', [AttendenceController::class,'get_leave_notifications'])->name('get_leave_notifications');



Route::any('leave_check_ao/{id}', [AttendenceController::class,'leave_check_ao']);
Route::any('ao_approve', [AttendenceController::class,'ao_approve']);


Route::any('attendance_report', [AttendenceController::class,'attendance_report']);
Route::any('generate-payslip', [FmAttendanceViewController::class,'index']);
Route::any('create_payslips', [FmAttendanceViewController::class,'create_payslips']);
//view attandance
Route::any('view-attandance', [ViewAttendenceController::class,'index'])->name('view-attandance');

Route::any('rem_cur_desi', [AddEmployeeController::class,'rem_cur_desi'])->name('rem_cur_desi');

Route::get('rcs', function() {
    
    session()->regenerate();
     return response()->json([
        "token"=>csrf_token()],
      200);
      
})->name('rcs');