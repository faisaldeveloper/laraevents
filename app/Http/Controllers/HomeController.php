<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Redis;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>'welcome']);        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()){
            $id = Auth::user()->id;
            $name = Auth::user()->name;            
            $redis = app('redis');
            $redis->set('name-'.$id, $name);
        }
               
        return view('home');
    }

    public function welcome()
    {
        $obj = new Helper('loginactivity2.txt');
        $file = $obj->filePath();
        $contents = file_get_contents($file);       

        return view('welcome', ['contents'=> $contents]);
    }
}
