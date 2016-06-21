<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Log;


$SoaRoot = '/mnt/hgfs/linux_code/lumen-api/app/Soa';
$file = '/mnt/hgfs/linux_code/lumen-api/app';
require_once $SoaRoot. '/Thrift/ClassLoader/ThriftClassLoader.php';
require_once $SoaRoot. '/idl/PhpRemote/PhpRemote.php';
require_once $SoaRoot. '/idl/PhpRemote/Types.php';

use Thrift\ClassLoader\ThriftClassLoader;
use Thrift\Protocol\TBinaryProtocol;
//use Thrift\Protocol\TCompactProtocol;
//use Thrift\Transport\TSocket;
use Thrift\Transport\TPhpStream;
use Thrift\Transport\TBufferedTransport;
use App\Soa\idl\PhpRemote\PhpRemoteIf ;
use App\Soa\idl\PhpRemote\Test ;
use App\Entity\Member;
use App\Http\Controllers\TestController;
use App\Soa\idl\PhpRemote\PhpRemoteProcessor;

class HomeController  implements PhpRemoteIf
{
  public function index(){
    $menber = Member::where('id',2)->get();
    Log::info('1212315453131');
    echo $menber;
  }
  public function processFunc($inMethod, $inParams)
  {

    file_put_contents('Serverlog.txt',$inMethod,FILE_APPEND);
    file_put_contents('Serverlog.txt',$inMethod,FILE_APPEND);
    return 1;
  }

  public function getFunc($inMethod, $inParams)
  {


    $func = __FUNCTION__;
    Log::info($func);
    $mysqli  =  mysqli_init ();
    if (! $mysqli ) {
      die( 'mysqli_init failed' );
    }

    if (! $mysqli -> options ( MYSQLI_INIT_COMMAND ,  'SET AUTOCOMMIT = 0' )) {
      die( 'Setting MYSQLI_INIT_COMMAND failed' );
    }

    if (! $mysqli -> options ( MYSQLI_OPT_CONNECT_TIMEOUT ,  5 )) {
      die( 'Setting MYSQLI_OPT_CONNECT_TIMEOUT failed' );
    }

    if (! $mysqli -> real_connect ( '192.168.226.85' ,  'root' ,  'root' ,  'book' )) {
      die( 'Connect Error ('  .  mysqli_connect_errno () .  ') '
          .  mysqli_connect_error ());
    }

    $result =  'Success... '  .  $mysqli -> host_info;

    $mysqli -> close ();

    file_put_contents('Serverlog.txt',$inMethod,FILE_APPEND);
    file_put_contents('Serverlog.txt',$inMethod,FILE_APPEND);
    return  $result;
  }
};

