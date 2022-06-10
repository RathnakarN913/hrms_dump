<?php

namespace App\Http\Controllers\hrms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PasswordSettingsController extends Controller
{
    public function index(){
        $data['users'] = DB::table('users')->join('districtmst','users.dist_id','=','districtmst.distid')->where('user_type','PD')->get();
        return view('hrms.passwordSettings',$data);
    }
}
