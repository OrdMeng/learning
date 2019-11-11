#### vim/vi 中文乱码问题
````
# 编辑（创建）配置文件
vi ~/.vimrc

# 在文件中添加
set fileencodings=utf-8,ucs-bom,gb18030,gbk,gb2312,cp936
set termencoding=utf-8
set encoding=utf-8

# 使配置文件生效
source ~/.vimrc

# 搞定！看看效果吧