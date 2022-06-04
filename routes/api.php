<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ivnm\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::match(['post'], 'ivnm/login','App\Http\Controllers\api\ivnm\LoginController@index');
Route::match(['post'], 'ivnm/dashboard','App\Http\Controllers\api\ivnm\MasterController@dashboard');
Route::match(['post'], 'ivnm/work-type','App\Http\Controllers\api\ivnm\MasterController@getWorkTypes');
Route::match(['post'], 'ivnm/add-work-details','App\Http\Controllers\api\ivnm\MasterController@addWorkDetails');
Route::match(['post'], 'ivnm/list-work-details','App\Http\Controllers\api\ivnm\MasterController@listWorkDetails');
Route::match(['post'], 'ivnm/view-single-work-details','App\Http\Controllers\api\ivnm\MasterController@viewSingleWorkDetails');
Route::match(['post'], 'ivnm/update-work-details','App\Http\Controllers\api\ivnm\MasterController@updateWorkDetails');
Route::match(['post'], 'ivnm/get-dropdown-work-details','App\Http\Controllers\api\ivnm\MasterController@getDropDownWorkDetails');
Route::match(['post'], 'ivnm/update-work-ground-clearance','App\Http\Controllers\api\ivnm\MasterController@updateWorkGroundClearance');
Route::match(['post'], 'ivnm/update-work-townplanning-clearance','App\Http\Controllers\api\ivnm\MasterController@updateWorkTownplanningClearance');
Route::match(['post'], 'ivnm/tender-status-list','App\Http\Controllers\api\ivnm\MasterController@getTenderStatusList');
Route::match(['post'], 'ivnm/update-work-tender-details','App\Http\Controllers\api\ivnm\MasterController@updateWorkTenderDetails');
Route::match(['post'], 'ivnm/get-work-awarded-amount','App\Http\Controllers\api\ivnm\MasterController@getWorkAwardedAmount');
Route::match(['post'], 'ivnm/get-financial-progress-percent','App\Http\Controllers\api\ivnm\MasterController@getFinancilaProgressPercent');
Route::match(['post'], 'ivnm/get-physical-progress-works','App\Http\Controllers\api\ivnm\MasterController@getPhysicalProgressWorks');
Route::match(['post'], 'ivnm/get-work-status-list','App\Http\Controllers\api\ivnm\MasterController@getWorkStatusList');
Route::match(['post'], 'ivnm/update-work-progress-details','App\Http\Controllers\api\ivnm\MasterController@updateWorkProgressDetails');
Route::match(['post'], 'ivnm/update-financial-progress','App\Http\Controllers\api\ivnm\MasterController@updateWorkFinancialProgress');
Route::match(['post'], 'ivnm/yn-list','App\Http\Controllers\api\ivnm\MasterController@ynList');
Route::match(['post'], 'ivnm/get-building-details','App\Http\Controllers\api\ivnm\MasterController@getBuildingDetails');
