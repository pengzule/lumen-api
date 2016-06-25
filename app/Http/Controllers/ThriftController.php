<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Log;
use App\Entity\Product;

class ThriftController  extends Controller
{
  /**
   * @param  $request
   * @return mixed
     */

  public function test($request)
  {
    $result = json_decode($request);

    $menber = Product::whereIn('id',$result)->first();
    return $menber;
  }

  public function getcate()
  {
    return redirect('/category');
  }
}