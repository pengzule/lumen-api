<?php

namespace App\Http\Controllers;

use App\Entity\GenericAgent;


class GenericAgentController extends Controller
{
 public function index()
 {
    $ips =  GenericAgent::where('parent','127.0.0.1:80')->get();

   return view('form')->with('ips',$ips);
 }

}