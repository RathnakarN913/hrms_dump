<?php
namespace App\Helper;
use Session;
use App\Models\Services;
use App\Models\api\ivnm\ApkVersionModel;
use App\Models\api\ivnm\SessionLogModel;
use Illuminate\Database\Eloquent\Builder;
class Helpers
{
    /*** check Api user validity ****/
    
    public function checkUserAuthentication($params)
    {
        return SessionLogModel::where($params)->get();
    }
    
    /*** close ****/
    /** check Access key ***/
    
    public function checkAccessKey($params)
    {
        return ApkVersionModel::where($params)->get();
    }
    
    public function checkUser()
    {
        
        
        if(Session::get('session_id') == Session::getId())
        {
            return 1;
        }
        else
        {
            echo "<script>window.location='/hrms/logout'</script>";
        }
        
    }
    
    
    public function getURLAuthourization($services,$requested_uri)
    {
        /*echo $requested_uri;
        print_r($services);
        exit;*/
       foreach($services as $key=>$val)
       {
           $assignedServices[$val->menu_url] = $val->menu_url;
       }
       if(in_array($requested_uri,$assignedServices))
       {
           return 1;
       }
       else
       {
           return 0;
       }
       
    }
    
    public function getAssignedMenus($params)
    {
        
        $userid =  $params['user_id'];
        /** getting services from services and user_servie_map table ***/
        
        $services = Services::whereHas('userServiceMap',function(Builder $query) use ($params)
        {
            $query->where('user_id',$params['user_id']);
        })->where('menu_project_id',$params['menu_project_id'])->orderBy('menu_order')->get();
        
        return $services;
        
        //return $services = Services::join('user_service_map','services.id','=','user_service_map.service_id')->where($params)->orderBy('menu_order')->get();
    }
}
?>