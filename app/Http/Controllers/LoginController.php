<?php

	namespace App\Http\Controllers;
	use Illuminate\Http\Request;
	use App\Models\LoginModel;
    use App\Models\DistrictModel;
	use Session;
	use Validator;
    use DB;

	class LoginController extends Controller
	{
		public function index()
		{
		    if (Session::get('session_id') == Session::getId()) {
            return redirect('/dashboard');
        }
			return view('login');
		}

		/*** login checking method ***/

		public function checkLogin(Request $request)
		{
	    	$validator = Validator::make($request->all(), [
			'username'=>'required',
			'password'=>'required',
			]);

			if($validator->passes())
			{
			    $username = htmlspecialchars(strip_tags($request->post('username')));
				$password = htmlspecialchars(strip_tags(sha1(md5($request->post('password')))));



				$params = array('user_id'=>$username,'user_pwd'=>$password);
				$userDet = LoginModel::where($params)->get();
				if(count($userDet) > 0)
				{
				    Session::put(array(
				        'id'=>$userDet[0]->id,
				        'user_id'=>$userDet[0]->user_id,
				        'user_mobile'=>$userDet[0]->user_mobile,
				        'session_id'=>Session::getId(),
				        'user_type'=>$userDet[0]->user_type,
				        'ulbid'=>$userDet[0]->ulbid,
				        'distid' => $userDet[0]->dist_id,

				        ));

				        return redirect('dashboard');
				}
				else
				{
				    Session::put('error','Invalid username or password');
				    return redirect('/login');
				}
			}
			else
			{


				 Session::put('error','Invalid username or password');
				    return redirect('/login');

			}
		}

		/** close***/

		/*** user logout ***/

		public function logout()
		{
		    Session::flush();
		    return redirect('/login');
		}

        public function create_logins(){
            $dist = DistrictModel::all();
            foreach($dist as $dis){
                $user_id = 'PD_'.str_replace(' ','',$dis->distname);
                $pwd = sha1(md5($user_id));
                $data = array(
                    'user_id' => $user_id,
                    'user_pwd' => $pwd,
                    'user_name' => $user_id,
                    'user_type' => 'PD',
                    'ulbid' => '000',
                    'show_pwd' => $user_id,
                    'dist_id' => $dis->distid,

                );
                DB::table('users')->updateOrInsert(['user_id' => $user_id,],$data);

                $loop_array = array(7,6,11,12,17,26);
                for($i=0;$i<count($loop_array);$i++){
                    $data2 = array(
                        'service_id' => $loop_array[$i],
                        'user_id' => $user_id,
                    );

                    DB::table('user_service_map')->insert($data2);
                }


            }
            dd('complete');
        }

		/** close **/
	}
