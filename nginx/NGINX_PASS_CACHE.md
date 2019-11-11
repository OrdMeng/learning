#### nginx反向代理
````
server{
	listen 80;
	server_name proxya.com;
	location / {
		proxy_pass http://proxyb.com;
	}
}

# proxy_pass 用于代理转发 proxy_pass后面的url加/，表示绝对根路径；如果没有/，表示相对路径

假设下面四种情况分别用 http://proxya.com/proxy/test.html 进行访问。

第一种：
location /proxy/ {
    proxy_pass http://proxyb.com/;
}
代理到URL：http://proxyb.com/test.html

第二种（相对于第一种，最后少一个 / ）
location /proxy/ {
    proxy_pass http://proxyb.com;
}
代理到URL：http://proxyb.com/proxy/test.html

第三种：
location /proxy/ {
    proxy_pass http://proxyb.com/aaa/;
}
代理到URL：http://proxyb.com/aaa/test.html


````

#### nginx 静态文件缓存
````
proxy_cache_path /cache levels=1:2 keys_zone=cache:10m max_size=10g inactive=60m use_temp_path=off;

server{
	listen 80;
	server_name proxya.com;
	location / {
		proxy_pass http://proxyb.com;
	}
	location ~ .*\.(gif|jpg|png|css|js)(.*)  {
        proxy_pass http://proxyb.com;
		proxy_cache cache;
    	proxy_cache_valid   200 304 12h;
    	proxy_cache_valid   any 10m;
    	add_header  Nginx-Cache "$upstream_cache_status";
		proxy_cache_key $host$uri$is_args$args;
	}
}

# proxy_cache_path 缓存文件存放位置
# levels=1:2       代表缓存的目录结构为2级目录
# keys_zone=cache:10m 申请一个10兆的空间存在缓存的key 名称为cache
# max_size 最大存储缓存的空间10G
# inactive 未被访问文件在缓存中保留时间，本配置中如果60分钟未被访问则不论状态是否为expired，缓存控制程序会删掉文件。inactive默认是10分钟。
           需要注意的是，inactive和expired配置项的含义是不同的，expired只是缓存过期，但不会被删除，inactive是删除指定时间内未被访问的缓存文件
# use_temp_path 如果为off，则nginx会将缓存文件直接写入指定的cache文件中，而不是使用temp_path存储。
# proxy_cache cache;  启动名称为cache的缓存
# proxy_cache_valid 200 302 10m; 只对响应码为200，301，302的访问请求资源设置缓存时间10m


````