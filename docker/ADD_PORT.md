给正在运行的容器添加端口映射
````
如果一个容器已经在运行，想要给当前容器添加新的端口映射是没有相关的docker命令的
我们采用常规操作，即将容器打包成镜像后再创建新的容器

1. 停止正在运行的容器
docker ps # 获取容器ID
docker stop 61371241a1a7

2. 将容器打包成新的镜像
docker commit 61371241a1a7 new-image

3. 创建新的容器 我们新容器的端口为80、8001
docker run  --privileged -itd --name nginx_php7_new2 -p 8001:8001 -p 80:80  -v /Users/mengfanmin/www:/var/www new-image

#### 参数说明
--privileged  使用此参数会使container用户真正的root权限，否则container中的root只是普通用户权限
-itd -i:以交互模式运行容器，通常与 -t 同时使用
     -t:为容器重新分配一个伪输入终端，通常与 -i 同时使用
     -d:后台运行容器，并返回容器ID
--name 容器别名
-p 指定端口映射  主机端口：容器端口
-v 文件目录挂在  本机目录：容器目录

````