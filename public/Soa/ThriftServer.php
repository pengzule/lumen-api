<?php

/*
service PhpRemote{
 bool processFunc(1: string inMethod, 2:string inParams),
 string getFunc(1: string inMethod, 2:string inParams),
}
*/

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| First we need to get an application instance. This creates an instance
| of the application / container and bootstraps the application so it
| is ready to receive HTTP / Console requests from the environment.
|
*/

require_once __DIR__.'/../../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/


	error_reporting(E_ALL);

	//$thriftLib = '/jqm/smarthome/thrift/thrift-0.9.3/lib/php/lib';
	$SoaRoot = '/mnt/hgfs/linux_code/lumen-api/public';
	require_once $SoaRoot. '/Soa/Thrift/ClassLoader/ThriftClassLoader.php';
	require_once $SoaRoot. '/Soa/idl/PhpRemote/PhpRemote.php';
	require_once $SoaRoot. '/Soa/idl/PhpRemote/Types.php';


	// 没有设置路径就直接把文件夹拷贝到当前目录下
	use Thrift\ClassLoader\ThriftClassLoader;
	use Thrift\Protocol\TBinaryProtocol;
	//use Thrift\Protocol\TCompactProtocol;
	//use Thrift\Transport\TSocket;
	use Thrift\Transport\TPhpStream;
	use Thrift\Transport\TBufferedTransport;
		use Log;
use App\Entity\Member;
use Illuminate\Http\Request;

	// Load
	$loader = new ThriftClassLoader();
	$loader->registerNamespace('Thrift',$SoaRoot. '/Soa/');
	$loader->registerDefinition('PhpRemote',$SoaRoot. '/Soa/idl/PhpRemote');
	$loader->register();
	if (php_sapi_name() == 'cli') {
  		ini_set("display_errors", "stderr");
	}
	
	class PhpRemoteServer implements PhpRemoteIf 
	{
		public function processFunc($inMethod, $inParams)
		{
			file_put_contents('Serverlog.txt',$inMethod,FILE_APPEND);
			file_put_contents('Serverlog.txt',$inMethod,FILE_APPEND);
			return 1;
		}
 		public function getFunc($inMethod, $inParams)
		{

			Log::info('aa');
			$result = 'info';
			$member = Member::where('id',2)->get();
			file_put_contents('Serverlog.txt',$inMethod,FILE_APPEND);
			file_put_contents('Serverlog.txt',$inMethod,FILE_APPEND);
			return $member;
		}
	};

	$handler = new PhpRemoteServer();
	$processor = new PhpRemoteProcessor($handler);
	$phpStream = new TPhpStream(TPhpStream::MODE_R | TPhpStream::MODE_W);
	$transport = new TBufferedTransport($phpStream);
	$protocol = new TBinaryProtocol($transport, true, true);
	//$protocol = new TCompactProtocol($transport, true, true);
	$transport->open();
	$processor->process($protocol, $protocol);
	$transport->close();

