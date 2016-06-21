<?php namespace

App\Http\Controllers;

use App\Http\Controllers\Controller;
error_reporting(E_ALL);
//$thriftLib = '/jqm/smarthome/thrift/thrift-0.9.3/lib/php/lib';
$SoaRoot = '/mnt/hgfs/linux_code/lumen-api/app/Soa';
$aa = '/mnt/hgfs/linux_code/lumen-api/app/Http';
require_once $SoaRoot. '/Thrift/ClassLoader/ThriftClassLoader.php';
require_once $SoaRoot. '/idl/PhpRemote/PhpRemote.php';
require_once $SoaRoot. '/idl/PhpRemote/Types.php';


// 没有设置路径就直接把文件夹拷贝到当前目录下
use App\Soa\idl\PhpRemote\Type;
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
    use Log;
use App\Entity\Member;




class TestController extends Controller {
    public function test(){
        $SoaRoot = '/mnt/hgfs/linux_code/lumen-api/app/Soa';
        // Load
        $loader = new ThriftClassLoader();
        $loader->registerNamespace('Thrift', $SoaRoot . '/');
        $loader->registerDefinition('PhpRemote', $SoaRoot . '/idl/PhpRemote');
        $loader->register();
        if (php_sapi_name() == 'cli') {
            ini_set("display_errors", "stderr");
        }
        $test = new Type();
        $test->test();

        Log::info('111111111');
        $men ='pzl';
        $pra ='pzl';
        $handler = new HomeController();
        $handler->getFunc($men,$pra);

        $processor = new PhpRemoteProcessor($handler);

        $phpStream = new TPhpStream(TPhpStream::MODE_R | TPhpStream::MODE_W);

        $transport = new TBufferedTransport($phpStream);

        $protocol = new TBinaryProtocol($transport, true, true);

//$protocol = new TCompactProtocol($transport, true, true);


        $processor->process($protocol, $protocol);
        $transport->close();

    }
    public function info(){
        $member = Member::where('id',2)->get();
        Log::info('info');
        return $member;
    }
}

