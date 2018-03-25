# Team
一起找队友
# 环境
mysql+php5.x+Apache

# 配置
1.数据库文件在根目录下 team.sql
2.创建 数据库 team
3.用户名和密码均为 root   "/application/database.php 中修改数据账号密码"
4.配置完成打开浏览器输入 localhost/team/public/index/index/index 进入首页
# 首页
![img](https://github.com/NotFoundGitHub/Team/blob/master/1.png)
# 活动列表
![img](https://github.com/NotFoundGitHub/Team/blob/master/2.png)
# 登录页面
![img](https://github.com/NotFoundGitHub/Team/blob/master/3.png)
# 组队列表
![img](https://github.com/NotFoundGitHub/Team/blob/master/4.png)
# 增加队伍信息
![img](https://github.com/NotFoundGitHub/Team/blob/master/5.png)
# 队伍详情列表
![img](https://github.com/NotFoundGitHub/Team/blob/master/6.png)
# 我加入的
![img](https://github.com/NotFoundGitHub/Team/blob/master/7.png)



# 结构
www  WEB部署目录（或者子目录）
├─application           应用目录
│  ├─common             公共模块目录（可以更改）
│  ├─index        		模块目录
│  │  ├─config.php      模块配置文件
│  │  ├─common.php      模块函数文件
│  │  ├─controller      控制器目录
│  │  │	 │─ActList.php  活动列表
│  │  │  │─Index.php	首页
│  │  │	 │─Team.php		队伍列表
│  │  ├─model           模型目录
│  │  ├─view            视图目录
│  │  └─ ...            更多类库目录
│  │
│  ├─command.php        命令行工具配置文件
│  ├─common.php         公共函数文件
│  ├─config.php         公共配置文件
│  ├─route.php          路由配置文件
│  ├─tags.php           应用行为扩展定义文件
│  └─database.php       数据库配置文件
│
├─public                WEB目录（对外访问目录）
│  ├─index.php          入口文件
│  ├─router.php         快速测试文件
│  └─.htaccess          用于apache的重写
│
├─thinkphp              框架系统目录
│  ├─lang               语言文件目录
│  ├─library            框架类库目录
│  │  ├─think           Think类库包目录
│  │  └─traits          系统Trait目录
│  │
│  ├─tpl                系统模板目录
│  ├─base.php           基础定义文件
│  ├─console.php        控制台入口文件
│  ├─convention.php     框架惯例配置文件
│  ├─helper.php         助手函数文件
│  ├─phpunit.xml        phpunit配置文件
│  └─start.php          框架入口文件