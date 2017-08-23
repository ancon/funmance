/**
 * [是否为数字]
 * @Author   Ancon<zhongfuzhong@gmail.com>
 * @DateTime 2017-08-23T17:27:30+0800
 * @param    {[type]}                      number [传入一个数]
 * @return   {Boolean}                            [返回是否为真]
 */
function isNumber(number) {
    var reg = /(^0\.\d+$)|(^[1-9]\d*(\.\d+)?$)/;
    return reg.test(number);
}

/**
 * 测试循环次数
 * @Author   Ancon<zhongfuzhong@gmail.com>
 * @DateTime 2017-08-23T17:58:51+0800
 * @param    {string}                      functionName [description]
 * @param    {mixed}                      number       [description]
 * @return   {void}                                   [description]
 */
function runTimes(functionName, number) {
    var startTime = new Date().getTime();
    var time = 10000000;
    for (var index = 0; index < time; index++) {
        functionName(number);
    }
    var endTime = new Date().getTime();
    var result = functionName(number);
    console.log('调用的函数是：'+functionName);
    console.log('调用结果'+result);
    console.log('开始时间'+startTime);
    console.log('结束时间'+endTime);
    console.log('循环'+time+'的时间是：'+(endTime-startTime)+'毫秒');
}

runTimes(isNumber,19);
runTimes(isNaN,19);