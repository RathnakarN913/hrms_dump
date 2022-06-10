<?php

namespace App\Http\Controllers\hrms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PasswordSettingsController extends Controller
{
    public function index(){
        $data['users'] = DB::table('users')->join('Districtmst','users.dist_id','=','Districtmst.distid')->where('user_type','PD')->get();
        return view('hrms.passwordSettings',$data);
    }
    public function update_password(Request $request)
    {
        $this->validate($request,[
            'password'=>'required',
            'confirm_password' => 'required',
        ]);

        $user_id = $request->userid;
        $password = $request->password;
        $con_password = $request->confirm_password;


        if($password != $con_password){
            return back()->with('error','password and confirm password not matched');
        }elseif(strlen($password) < 8){
            return back()->with('error','Password should have minimum 8 charecters ');
        }elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password)){
            return back()->with('error','Password should Contain 1 special charecters');
        }elseif(!preg_match('/[0-9]/', $password)){
            return back()->with('error','Password should Contain 1 digit');
        }else{
            $en_pw = sha1(md5($password));
            DB::table('users')->where('id',$user_id)->update(['user_pwd'=>$en_pw,'show_pwd'=>$password]);
            return back()->with('success','password updated succesfully..!');
        }

    }
}
