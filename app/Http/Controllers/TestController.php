<?php

namespace App\Http\Controllers;
use idl\PhpRemote\PhpRemoteIf;

class TestController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |    Route::get('/', 'HomeController@showWelcome');
    |
    */
    public function __construct(PhpRemoteIf $test)
    {
        $this->test = $test;
    }

    public function showWelcome()
    {
        $inMethod ='inMethod';
        $inParams ='123';
        $this->test->getFunc($inMethod, $inParams);

    }

}