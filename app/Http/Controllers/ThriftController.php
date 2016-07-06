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
  public function __construct(User $users)
  {
    $this->users = $users;
  }

  public function test($request)
  {
    $result = json_decode($request);

    $menber = Product::whereIn('id',$result)->first();
    $menber = $menber->id;
    return $menber;
  }

  public function getcate()
  {
    return redirect('/category');
  }
}