## 命令行指引
您还可以按照以下说明从计算机中上传现有文件。




#### Git 全局设置
````
git config --global user.name "ordmeng "
git config --global user.email "ordmeng@163.com"
````

#### 创建一个新存储库
````
git clone https://github.com/OrdMeng/learning.git
cd test
touch README.md
git add README.md
git commit -m "add README"
git push -u origin master
````


#### 推送现有文件夹
````
cd existing_folder
git init
git remote add origin https://github.com/OrdMeng/learning.git
git add .
git commit -m "Initial commit"
git push -u origin master
````


#### 推送现有的 Git 存储库
````
cd existing_repo
git remote rename origin old-origin
git remote add origin https://github.com/OrdMeng/learning.git
git push -u origin --all
git push -u origin --tags
````