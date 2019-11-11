```
我们通常使用$_SERVER获取服务器环境信息，但是我们却不能在$_SERVER数组中获取是本地环境还是生产环境，
我们可以通过配置nginx和PHP让$_SERVER支持ENVIROMENT
```
### 通过nginx的fastcgi_param来设置
````
location ~ \.php($|/) {
    try_files         $uri =404;
    fastcgi_pass      unix:/tmp/php-cgi.sock;
    fastcgi_index     index.php;
    include           fastcgi_params;
    fastcgi_param     SCRIPT_FILENAME  $document_root$fastcgi_script_name;
    fastcgi_param     RUNTIME_ENVIROMENT 'PRO'; # PRO or DEV
}

这里只添加了fastcgi_param RUNTIME_ENVIROMENT 'PRO'一个值

nginx -s reload
````

### 配置php-fpm.conf
````
直接在配置文件中添加：
env[RUNTIME_ENVIROMENT] = 'PRO'

添加后重启php-fpm
service restart php-fpm
或者killall php-fpm 
./php-fpm

````

现在您已经走过了所有流程 var_dump($_SERVER)看看效果吧