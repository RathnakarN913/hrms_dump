<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;

class TestPageController extends Controller
{
    public function index()
    {
        echo "test page";
        $result = Services::whereHas('userServiceMap',function($query)
        {
            $query->where('user_id','CDMA');
        })->get();
        echo "<pre>";
        print_r($result);
        exit;
    }
}
