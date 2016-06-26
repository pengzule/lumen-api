<?php

namespace App\Http\Controllers;

use App\Entity\GenericAgent;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Result;
use Log;
class GenericAgentController extends Controller
{
 public function index()
 {
    $ips =  GenericAgent::where('parent','127.0.0.1:80')->get();
    $time = Carbon::now();
   return view('form')->with('ips',$ips)
                      ->with('time',$time);
 }
 
 public function subchild(Request $request)
 {
    $result = new Result;
    $name = $request->input('name','');   
    
    $ips = GenericAgent::where('parent',$name)->get();
    log::info($ips);
    $time = Carbon::now();
     
    $result->status = 0;
    $result->message= '返回成功';
    $result->ips = $ips;
    $result->time = $time;
    
    return $result->toJson();
 }

}