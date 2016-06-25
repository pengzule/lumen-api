<?php
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

	require_once __DIR__. '/idl/PhpRemote/PhpRemote.php';

	// 没有设置路径就直接把文件夹拷贝到当前目录下
	use Thrift\ClassLoader\ThriftClassLoader;
	use Thrift\Protocol\TBinaryProtocol;
	//use Thrift\Protocol\TCompactProtocol;
	//use Thrift\Transport\TSocket;
	use Thrift\Transport\TPhpStream;
	use Thrift\Transport\TBufferedTransport;
	use Log;
	use App\Http\Controllers\ThriftController;
	use App\Http\Controllers\CategoryController;
	use Eshop\Repositories\CategoryRepository;
	// Load
	$loader = new ThriftClassLoader();
	$loader->registerNamespace('Thrift',__DIR__);
	$loader->registerDefinition('PhpRemote',__DIR__. '/idl/PhpRemote');
	$loader->register();
	if (php_sapi_name() == 'cli') {
  		ini_set("display_errors", "stderr");
	}
	
	class PhpRemoteServer implements PhpRemoteIf
	{
		public function processFunc($inMethod, $inParams)
		{

		}
 		public function getFunc($inMethod, $inParams)
		{
			$test = new ThriftController;
			switch ($inMethod)
			{
				case 1:
					$result =  $test->test($inParams);
					break;
				case 2:
					$result =  $test->getcate();
					break;
				case 3:
					$result = "Number 3";
					break;
				default:
					$result = "No number between 1 and 3";
			}
			return $result;

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

