<?php

header("Content-type: text/html; charset=utf-8"); 
/**
 * 打印输出
 *
 * @param array $data
 * @param integer $value
 * @return void
 * 
 * @Author Ancon<zhongfuzhong@gmail.com>
 */
function p($data, $value = 0)
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    if ($value) {
        exit();
    }
}

/**
 * 头像获取的方式：
 * 1.康盛-kang
 * 2.匹配-pipe
 * 3.插斜杠-laoy
 */

/**
 * 康盛公司的算法
 *
 * @param integer $id
 * @return void
 * 
 * @Author Ancon<zhongfuzhong@gmail.com>
 */
function kang($id = 8)
{
    $uid = intval($id);
    $uid = sprintf("%09d", $uid);
    $dir1 = substr($uid, 0, 3);
    $dir2 = substr($uid, 3, 2);
    $dir3 = substr($uid, 5, 2);
    $name = substr($uid, -2);
    $fileName = $dir1 . '/' . $dir2 . '/' . $dir3 . '/' . $name;
    return $fileName;
}

/**
 * 周大伟的匹配算法，加上了ancon的思想，同时ancon改进
 *
 * @param integer $id
 * @return void
 * 
 * @Author Ancon<zhongfuzhong@gmail.com>
 */
function pipei($id = 8)
{
    $uid = intval($id);
    $uid = 1000000000+$uid;
    $pattern = '/^([\d]{1})([\d]{3})([\d]{2})([\d]{2})([\d]{2})$/i';
    $replacement = '${2}/${3}/${4}/${5}';
    $fileName = preg_replace($pattern, $replacement, $uid);
    return $fileName;
}

/**
 * 老杨的插值算法
 *
 * @param int $id
 * @return void
 * 
 * @Author Ancon<zhongfuzhong@gmail.com>
 */
function laoy($id = 8)
{
    $uid = strval($id);
    for ($i=0; $i < 9; $i++) { 
    	if (strlen($uid) < 9) {
    		$uid = substr_replace($uid, '0', 0, 0);
    	}
    }
    $uid = substr_replace($uid, '/', 3, 0);
    $uid = substr_replace($uid, '/', 6, 0);
    $uid = substr_replace($uid, '/', 9, 0);
}


/**
 * ancon算法，结合康盛
 *
 * @param integer $id
 * @return void
 * 
 * @Author Ancon<zhongfuzhong@gmail.com>
 */
function anconplus($id = 8)
{
    $uid = intval($id);
    $uid = 1000000000+$uid;
    $dir1 = substr($uid, 1, 3);
    $dir2 = substr($uid, 4, 2);
    $dir3 = substr($uid, 6, 2);
    $name = substr($uid, -2);
    $fileName = $dir1 . '/' . $dir2 . '/' . $dir3 . '/' . $name;
}

/**
 * 康盛的结合老杨的算法
 *
 * @param integer $id
 * @return void
 * 
 * @Author Ancon<zhongfuzhong@gmail.com>
 */
function kang($id = 8)
{
    $uid = intval($id);
    $uid = sprintf("%09d", $uid);
    $uid = substr_replace($uid, '/', 3, 0);
    $uid = substr_replace($uid, '/', 6, 0);
    $uid = substr_replace($uid, '/', 9, 0);
}

/**
 * ancon的思想结合老杨的思想算法
 *
 * @param integer $id
 * @return void
 * 
 * @Author Ancon<zhongfuzhong@gmail.com>
 */
function gaij($id = 8)
{
    $uid = intval($id);
    $uid = 1000000000+$uid;
    $uid = substr($uid,1);
    $uid = substr_replace($uid, '/', 3, 0);
    $uid = substr_replace($uid, '/', 6, 0);
    $uid = substr_replace($uid, '/', 9, 0);
}

/**
 * 函数性能测试的函数，传入函数名，和函数参数。
 * 使用可变函数进行测试
 *
 * @param [mixed] $function
 * @param [mixed] $uid
 * @return void
 * 
 * @Author Ancon<zhongfuzhong@gmail.com>
 */
function run_times($function, $uid)
{
	p('调用的函数名是：'.$function);
	$start_time = microtime(true);
	$time = 10000;
	for($i=1;$i<=$time;$i++){
	  $function($uid);
	}
	$end_time = microtime(true);
	echo '循环'.$time.'的时间是：'.($end_time-$start_time).' s';
}

/**
 * 函数性能测试的函数，传入函数名，和函数参数。
 * 使用回调函数进行测试
 *
 * @param [mixed] $function
 * @param [mixed] $uid
 * @return void
 * 
 * @Author Ancon<zhongfuzhong@gmail.com>
 */
function call_back_times($function, $uid)
{
	p('调用的函数名是：'.$function);
	$start_time = microtime(true);
	$time = 10000;
	for($i=1;$i<=$time;$i++){
        call_user_func("$function", "$uid");
	}
	$end_time = microtime(true);
	echo '循环'.$time.'的时间是：'.($end_time-$start_time).' s';
}

run_times('kang',9999999);
run_times('pipe',9999999);
run_times('laoy',9999999);
run_times('zhyu',9999999);
run_times('gaii',9999999);
run_times('gaij',9999999);
call_back_times('pipe',9999999);
