#### nginx停止
````
获取nginx master进程号
ps -ef|grep nginx 

发送停止信号
kill -QUIT 主进程号  
例如：kill -QUIT 16391

快速停止Nginx：
kill -TERM 主进程号  

强制停止Nginx：
kill -9 主进程号

另外一种神操作
nginx -s reload|reopen|stop|quit  #重新启动并加载配置|重新打开日志文件|停止|退出 nginx
````

#### nginx重载配置
````
-t  #对nginx配置文件进行语法检测，并打印配置文件路径
-c  #以指定配置文件启动
-s  #对nginx发送信号
    #reload 重新加载配置
    #reopen 重新打开日志
    #stop   立即停止nginx 不管有没有正在处理的请求
    #quit   是一个优雅的关闭方式，Nginx在退出前完成已经接受的连接请求。
    
重新加载配置 
nginx -s reload
````

#### nginx日志分割
````
重命名当前日志
mv access.log  access_$(date -d yesterday +"%Y%m%d").log

重新打开配置文件
nginx -s reopen
````

#### nginx热部署
````
我们想使用最新版本的nginx,并且又不能影响用户正常使用。那么热部署就显得尤为重要

获取最新版本的nginx
wget http://nginx.org/download/nginx-1.17.1.tar.gz 

解压并编译
tar zxvf nginx-1.17.1.tar.gz 
./configure --prefix=/usr/local/nginx 
make  #不要make install！！！

将原来的二进制系统程序文件备份一下，以防新升级后的nginx出问题可以方便恢复
cd /usr/local/nginx/sbin/ 
cp nginx nginx.old   

替换二进制执行文件
cp -f ~/nginx-1.17.1/objs/nginx /usr/local/nginx/sbin/nginx

获取旧nginx master进程号
ps -ef|grep nginx   #745

平滑升级
kill -USR2 745 #旧版本主进程号 （现在新，旧版本的nginx实例会同时运行，共同处理请求）

从容关闭旧进程
kill -WINCH 745 #旧版本主进程号

kill参数说明
    -HUP 平滑启动（相当于reload）
    -USR2 平滑升级可执行程序，主要用在版本升级
    -WINCH 从容关闭工作进程
    -USR1 重新打开日志文件，主要用在日志切割（相当于reopen）
    

版本回退 
恢复原来二进制文件
cp nginx.old nginx -f 
kill -HUP 745 #旧版本主进程号 

从容关闭新进程
kill -WINCH 新版本主进程号




````