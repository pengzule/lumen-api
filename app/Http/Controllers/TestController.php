<?php namespace

App\Http\Controllers;

use App\Entity\Product;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;



    require_once  '/mnt/hgfs/linux_code/lumen-api/app/Soa/idl/PhpRemote/PhpRemote.php';

// 没有设置路径就直接把文件夹拷贝到当前目录下
    use Thrift\ClassLoader\ThriftClassLoader;
    use Thrift\Protocol\TBinaryProtocol;
    //use Thrift\Protocol\TCompactProtocol;
    //use Thrift\Transport\TSocket;
    use Thrift\Transport\TPhpStream;
    use Thrift\Transport\TBufferedTransport;
    use App\Soa\idl\PhpRemote\PhpRemoteIf;
    use App\Soa\idl\PhpRemote\PhpRemoteProcessor;
    use Log;

    use App\Entity\Member;




class TestController extends Controller {

    public function index(){

        $SoaRoot = '/mnt/hgfs/linux_code/lumen-api/app/Soa';
        // Load
        $loader = new ThriftClassLoader();
        $loader->registerNamespace('Thrift', $SoaRoot . '/');
        $loader->registerDefinition('PhpRemote', $SoaRoot . '/idl/PhpRemote');
        $loader->register();
        if (php_sapi_name() == 'cli') {
            ini_set("display_errors", "stderr");
        }
        Log::info('111111111');
        $men ='pzl';
        $pra ='pzl';
        $handler = new HomeController();
        $result = $handler->getFunc($men,$pra);
       // return $men;
        $processor = new PhpRemoteProcessor($handler);
        $phpStream = new TPhpStream(TPhpStream::MODE_R | TPhpStream::MODE_W);
        $transport = new TBufferedTransport($phpStream);
        $protocol = new TBinaryProtocol($transport, true, true);
        //$protocol = new TCompactProtocol($transport, true, true);

        $transport->open();
        $processor->process($protocol, $protocol);
        $transport->close();

    }
    public function info(){
        //$member = Product::find(1);
        $member = Product::where('id',1)->first();
        Log::info('info');
        return $member;
    }
    public function cate(){
        $result =  redirect('/category');
        return $result;
    }
}

