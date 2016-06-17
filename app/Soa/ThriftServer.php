<?php
namespace  App\Soa;
/*
service PhpRemote{
 bool processFunc(1: string inMethod, 2:string inParams),
 string getFunc(1: string inMethod, 2:string inParams),
}
*/
error_reporting(E_ALL);
//$thriftLib = '/jqm/smarthome/thrift/thrift-0.9.3/lib/php/lib';
$SoaRoot = '/mnt/hgfs/linux_code/lumen-api/app/Soa';
$aa = '/mnt/hgfs/linux_code/lumen-api/app/Http';
require_once $SoaRoot. '/Thrift/ClassLoader/ThriftClassLoader.php';
require_once $SoaRoot. '/idl/PhpRemote/PhpRemote.php';
require_once $SoaRoot. '/idl/PhpRemote/Types.php';
require_once $aa. '/Controllers/HomeController.php';

// 没有设置路径就直接把文件夹拷贝到当前目录下
use Thrift\ClassLoader\ThriftClassLoader;
use Thrift\Protocol\TBinaryProtocol;
//use Thrift\Protocol\TCompactProtocol;
//use Thrift\Transport\TSocket;
use Thrift\Transport\TPhpStream;
use Thrift\Transport\TBufferedTransport;
use App\Soa\idl\PhpRemote\PhpRemoteIf;
use App\Soa\idl\PhpRemote\PhpRemoteProcessor;
use App\Http\Controllers\HomeController;
use App\User;
// Load
$loader = new ThriftClassLoader();
$loader->registerNamespace('Thrift',$SoaRoot. '/');
$loader->registerDefinition('PhpRemote',$SoaRoot. '/idl/PhpRemote');
$loader->register();
if (php_sapi_name() == 'cli') {
	ini_set("display_errors", "stderr");
}



$handler = new HomeController();
$processor = new PhpRemoteProcessor($handler);
$phpStream = new TPhpStream(TPhpStream::MODE_R | TPhpStream::MODE_W);
$transport = new TBufferedTransport($phpStream);
$protocol = new TBinaryProtocol($transport, true, true);
//$protocol = new TCompactProtocol($transport, true, true);
$transport->open();
$processor->process($protocol, $protocol);
$transport->close();
?>
