#### nginx搭建静态web资源服务器

有时候服务器目录下的内容是为了让用户浏览下载的，那么配置nginx静态服务
````
nginx server配置如下
server{
        listen 80;
        server_name niuniu.com;
        root /var/www/niuniu;
        location / {
                index index.php index.html index.htm;
                if (!-e $request_filename) {
                        rewrite ^/(.*)$ /index.php/$1 last;
                }
        }
        #静态服务器配置
        location /css/ {
                root /var/www/niuniu/;
                autoindex on;             # 开启目录浏览
                autoindex_exact_size off; #显示出文件的确切大小，单位是bytes
                autoindex_localtime on;   #显示的文件时间为文件的服务器时间
                charset utf-8; 
                # 此处配置是为了防止文件被浏览器解析 直接下载
                if ($request_filename ~* ^.*?.(txt|doc|pdf|rar|gz|zip|docx|exe|xlsx|ppt|pptx)$){
                    add_header Content-Disposition attachment;
                }
        }
        
        location ~ \.php {
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_index  index.php;

            fastcgi_split_path_info ^(.+\.php)(.*)$;
            fastcgi_param PATH_INFO $fastcgi_path_info;

        fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
            fastcgi_param  SCRIPT_NAME $fastcgi_script_name;
            include        fastcgi_params;
    }
}
````