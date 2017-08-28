<?php

interface RequestInterface
{
    // 我们之前讲过装饰者模式，这里是通过闭包函数实现
    // 通过之后实现类及调用就可以看出
    public static function handle(Closure $next);
}

class Request1 implements RequestInterface
{
    public static function handle(Closure $next)
    {
        // echo("<pre>");
        // print_r($next);
        // echo("</pre>");        
        echo "Request1 Begin." . "<br />";
        $next();
        echo "Request1 End." . "<br />";
    }
}

class Request2 implements RequestInterface
{
    public static function handle(Closure $next)
    {
        // echo("<pre>");
        // print_r($next);
        // echo("</pre>");        
        echo "Request2 Begin." . "<br />";
        $next();
        echo "Request2 End." . "<br />";
    }
}

class Request3 implements RequestInterface
{
    public static function handle(Closure $next)
    {
        // echo("<pre>");
        // print_r($next);
        // echo("</pre>");        
        echo "Request3 Begin." . "<br />";
        $next();
        echo "Request3 End." . "<br />";
    }
}

class Request4 implements RequestInterface
{
    public static function handle(Closure $next)
    {
        // echo("<pre>");
        // print_r($next);
        // echo("</pre>");        
        echo "Request4 Begin." . "<br />";
        $next();
        echo "Request4 End." . "<br />";
    }
}

class Client
{
    // 这里包含了所有的请求
    private $pipes = [
        'Request1',
        // 'Request2',
        // 'Request3',
        // 'Request4',
    ];

    // 这里就是思维导图中默认返回的匿名回调函数
    private function defaultClosure()
    {
        return function () {
            echo 'llllllllllllllllllllllllllllllllllllll...' . "<br />";
        };
    }

    // 这里就是整个请求处理管道的关键
    private function getSlice()
    {
        return function ($stack, $pipe)
        {
            static $time = 0;
            print_r($time);
            echo('<hr>');
            $time++;
            print_r($stack);
            echo('<hr>');
            echo('<hr>');
            return function () use ($stack, $pipe)
            {
                print_r($stack);
                if($pipe){

                    print_r($pipe);
                    
                } else {
                    echo('arg1');
                }
            echo('<hr>');
            echo('<hr>');
            echo('<hr>');
            echo('<hr>');

                return $pipe::handle($stack);
            };
        };
    }

    // 这里是负责发起请求处理
    public function then()
    {
        echo('<pre>');
        // print_r(array_reduce($this->pipes, $this->getSlice()));
        // print_r(array_reduce($this->pipes, $this->getSlice(), $this->defaultClosure()));
        echo("</pre>");
        echo('<hr/>');
        call_user_func(array_reduce($this->pipes, $this->getSlice(), $this->defaultClosure()));
        // $call_user_func = array_reduce($this->pipes, $this->getSlice(), $this->defaultClosure());
        // $call_user_func->exec();
    }
}


$worker = new Client();
$worker->then();
?>