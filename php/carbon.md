## carbon
Carbon 是php的日期处理类库（A simple PHP API extension for DateTime.）
关于在Laravel中日期时间处理包Carbon的简单使用，需要的朋友可以参考下。

#### 安装
可以通过composer来安装Carbon，由于 Laravel 项目已默认安装了此包，所以不需要再次执行上面的命令。
````
composer require nesbot/carbon
````

#### 获取当前时间
如果不指定时区，他会使用php.ini中时区配置
````
echo Carbon::now(); // 2019-01-01 10:00:00
echo Carbon::today(); // 今天日期
echo Carbon::tomorrow(); // 明天
echo Carbon::yesterday(); // 昨天
````

#### 获取字串类型日期
默认返回一个对象，可以直接echo的原因是因为有 __toString 魔术方法
````
echo Carbon::now()->toDateString(); //2016-10-14
echo Carbon::now()->toDateTimeString(); //2016-10-14 20:22:50
````

#### 日期解析 （支持语义解析 用法类似 strtotime）
个人觉着这是一个比较实用的功能
````
echo Carbon::parse('today')->toDateTimeString(); //获取今天的日期

echo Carbon::parse('2019-01-03 +10 days')->toDateTimeString().PHP_EOL;

````

#### 构建日期
使用单独的年月日时分秒参数构建日期
````
$year = '2015';
$month = '04';
$day = '12';
echo Carbon::createFromDate($year, $month, $day); //2015-04-12 20:55:59

$hour = '02';
$minute = '15':
$second = '30';
echo Carbon::create($year, $month, $day, $hour, $minute, $second); //2015-04-12 02:15:30

echo Carbon::createFromDate(null, 12, 25); // 年默认为当前年份

````

#### 日期操作
modify方法可以传递算数运算符 + -
````
echo Carbon::now()->addDays(25); //2016-11-09 14:00:01

echo Carbon::now()->addWeeks(3); //2016-11-05 14:00:01

echo Carbon::now()->addHours(25); //2016-10-16 15:00:01

echo Carbon::now()->subHours(2); //2016-10-15 12:00:01

echo Carbon::now()->addHours(2)->addMinutes(12); //2016-10-15 16:12:01

echo Carbon::now()->modify('+15 days'); //2016-10-30 14:00:01

echo Carbon::now()->modify('-2 days'); //2016-10-13 14:00:01

````

#### 日期比较
要判断一个日期是否介于两个日期之间，可以使用 between() 方法.
第三个可选参数指定比较是否可以相等，默认为 true：
````
$first = Carbon::create(2012, 9, 5, 1);

$second = Carbon::create(2012, 9, 5, 5);

var_dump(Carbon::create(2012, 9, 5, 3)->between($first, $second));     // bool(true)

var_dump(Carbon::create(2012, 9, 5, 5)->between($first, $second));     // bool(true)

var_dump(Carbon::create(2012, 9, 5, 5)->between($first, $second, false));  // bool(false)
````

#### 计算指定日期的差值
diffInDays-天； diffInHours-小时
````
$taday = Carbon::parse('today');
$yesterday = Carbon::parse('yesterday');

echo  $yesterday->diffInDays($taday,false); //返回为正负数 1

echo  $taday->diffInDays($yesterday,false); // -1

````




