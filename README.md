<div align=center>

![logo](https://plaintalks.com/uploads/default/original/2X/7/7f17a8ddc74e028dec6ca1a394daf9dec3158f79.png)
</div>

[桂林市红色旅游资源在线语料库网站](http://www.glrcc.cn) （Guilin Red Culture Corpus）提供双语文本检索和分享功能。供英语、翻译相关专业的爱好者，学生和老师学习使用。  

该网站是对BiCorpus开源项目的二次开发(已获得原作者授权)。

原项目地址：[BiCorpus](https://github.com/hanlintao/BiCorpus)

plaintalks论坛帖子：[BiCorpus是什么？](https://plaintalks.com/t/topic/504)

# **演示视频**

https://user-images.githubusercontent.com/67557089/236703839-e7975bf7-cc62-4d49-b880-1dc0b4888249.mp4

# **缘起**

前年，我（被老师推荐去）参与了英语专业那边的一个大创，是做一个红色旅游题材的双语语料库。英语那边的老师说要做一个类似 BiCorpus 的网站。

后来回去研究，确认了自己（太菜）搞不定。无意中发现 BiCorpus 的网站正是韩老师的开源项目，就用邮件询问了韩老师能不能二次开发用于自己的项目，韩老师答应了。于是就开始了基于 BiCorpus 开源项目的二次开发之旅。

# **网站构思**

首先是进行网站构思，因为我的项目用不上 BiCorpus 的所有功能，就选取保留了部分功能，同时新增了许多新功能。所以其实我并不需要搞懂整个项目，只需要研究自己所需要改的部分就行

![image|375x500](https://plaintalks.com/uploads/default/original/2X/5/5082c76b51d1edaa77897fbdbe107972f74a77b6.png)

我在开源项目的基础上，修改并简化了网站的部分布局以使得用户能够更好的进行相关操作；同时改进网站的功能。
原有的开源项目并没有注册功能，用户名和密码需要管理员提供，操作不便。便在此基础上添加了注册功能，同时实现了用户名和密码检测功能（用户名少于6位，用户名与其他已注册用户重复，密码复杂性太低都无法成功注册）；
在上传语料的页面时加强了提示；
添加了网页信息页，声明网站的开发者和源代码作者信息。

# **设计开发（主要功能的修改）**

1. **用户名和密码检测功能（用户名少于6位，用户名与其他已注册用户重复，密码复杂性太低都无法成功注册）**
用正则表达式实现，不满足条件就提示。
下面为部分代码
![image|690x304](https://plaintalks.com/uploads/default/original/2X/f/f0dddbab753ec944344eec709486d9387f21d1c2.png)

2. **注册功能（新增普通用户注册页，并新增用户名和密码检测功能）**
其实就是用原项目的 [team.php](https://github.com/hanlintao/BiCorpus/blob/main/team.php) 和 [usercreate.php](https://github.com/hanlintao/BiCorpus/blob/main/usercreate.php)修改得来的。
新弄了个普通用户注册页面regist.php来注册普通用户
大致思路是
先复制 [team.php](https://github.com/hanlintao/BiCorpus/blob/main/team.php) 的新增用户的代码
去掉regist.php访问的限制（为了让未注册的游客也可以访问）
修改或去掉usercreate.php新增用户的限制（为了让未注册的游客也可以注册用户）
从而让任何人都可以访问普通用户注册页，进行注册。
```
regist.php
删去60多行那边的 if($user_type ==1 ) 判断，**但一定保留其中的内容**
修改90多行那边的用户类型选择，因为普通用户注册界面只能注册普通用户

usercreate.php
修改（其实不太好改）或删去7行左右的整个判断语句的代码
if($user_type != 1)
{
	header("Location: index.php");
}
```

3. **上传语料（加强提示）**
这个忘了当时咋弄的了，就不说了。

4. **信息说明（声明网站的开发者和源代码作者信息）**
这个没啥好说的，就照着原项目的 [关于页](http://bicovid.org/notes/) 的风格写的。
![image|690x421](https://plaintalks.com/uploads/default/original/2X/b/b071163450ed321352c704277d5d1cbb4ffd5a08.png)

5. **手机端**
本来想改的，就是改成和电脑端一致，有注册、登录、下载、用户之类的功能，但是太菜没改出来。

# **部署网站**

（大创项目能报销云服务器和域名费用的，所以没有太多纠结）

经过小组成员的搜索资料与讨论，确定网站的服务器选择了腾讯云的轻量应用服务器。腾讯云是中国最大的几家云服务器厂商之一，其为客户提供性能强大、安全、稳定的云产品。接着，使用phpstudy-linux面板(小皮面板)的服务器运维管理面板来进行网站的部署。最终得以在网络上访问和使用该网站。

因为一开始就跟着老师的教程用的window系统的phpstudy部署项目，所以服务器的Linux系统上就也使用phpstudy-linux面板来部署（当然用宝塔也是可以的）。window和linux部署还是有稍微的不同的，不过可以查阅资料自学来解决，难度不大。

![image|444x500](https://plaintalks.com/uploads/default/original/2X/7/7240cf2ee2df0250c55214e87af050d9fceaeac5.png)

之后申请了一个域名，并连接上服务器的IP地址（不得不说域名备份是真的麻烦，搞了我近一个月）。

![image|690x295](https://plaintalks.com/uploads/default/original/2X/7/7240cf2ee2df0250c55214e87af050d9fceaeac5.png)

最后的运行效果

![image|400x500](https://plaintalks.com/uploads/default/original/2X/6/6609309e7c8753970be00ded046e556f2a1053ea.jpeg)



# **功能展示（因为太长了就在这里讲）**

**1. 用户注册功能**
<div align=center>

![image|690x366](https://plaintalks.com/uploads/default/original/2X/8/8c77a1113c1eaf66347256a31d9bfb0fa03d1dfa.png)

图一 注册页面（正确输入）

![image|690x366](https://plaintalks.com/uploads/default/original/2X/7/7a8c1496f21e2f084ae8bf462a46a467174822f8.png)

图二 注册成功提示

![image|690x366](https://plaintalks.com/uploads/default/original/2X/3/333bd9dc53db8646408a41ae872904201c0ad13e.png)

图三 注册页面（未填写完用户信息）

![image|690x366](https://plaintalks.com/uploads/default/original/2X/c/c4eac70953fe564f9aa33f55c9490a80735107de.png)

图四 注册失败提示（未填写完用户信息）

![image|690x366](https://plaintalks.com/uploads/default/original/2X/1/1ab5c5c3dcf1cea5aae11838f01de691905f664a.png)

图五 注册页面（用户名少于六位）

![image|690x366](https://plaintalks.com/uploads/default/original/2X/b/be69da4194fd36b986bab18726f463e3203a74f5.png)

图六 注册失败提示（用户名少于六位）

![image|690x366](https://plaintalks.com/uploads/default/original/2X/0/03c90497b9ea0a0758d7b8ec181212e32becb5d5.png)

图七 注册页面（密码不符合规范）

![image|690x366](https://plaintalks.com/uploads/default/original/2X/f/f76644fcbe96ae4dc1900f8f797b4a87e875925a.png)

图八 注册失败提示（密码不符合规范）</div>

**2. 用户登录功能**
<div align=center>

![image|690x366](https://plaintalks.com/uploads/default/original/2X/e/e5021b6946fbc2157082720791e3adcad0953123.png)

图九 登录页面（未注册用户名）

![image|690x366](https://plaintalks.com/uploads/default/original/2X/f/ff262848e7ef2c47229e67c0332b58b80ccfbfa6.png)

图十 登录失败提示（未注册用户名）

![image|690x366](https://plaintalks.com/uploads/default/original/2X/6/6078ddafdc3e7a57cdbde83235eb94297175ff34.png)

图十一 登录页面（用户名或密码错误）

![image|690x366](https://plaintalks.com/uploads/default/original/2X/d/db14d4b8490854930a325ccf5473ab0256183844.png)

图十二 登录失败提示（用户名或密码错误）</div>

**3. 用户上传语料功能**
<div align=center>

![image|690x366](https://plaintalks.com/uploads/default/original/2X/7/712e50e622e4a36c7a08594b1ce45e65b350aab0.png)

图十三 用户上传语料

![image|690x366](https://plaintalks.com/uploads/default/original/2X/e/e0698b19a428f7150607ae3da728d06b00c8a456.png)

图十四 用户上传语料成功提示

![image|690x366](https://plaintalks.com/uploads/default/original/2X/7/7d468874e04212252579e5216514fc426505bf22.png)

图十五 用户查看语料审核状态</div>

**4. 管理员审核语料功能**
<div align=center>

![image|690x366](https://plaintalks.com/uploads/default/original/2X/7/7a674937fb88064782b9c01afe2d7a77f97e88c5.png)

图十六 管理员审核语料

![image|690x366](https://plaintalks.com/uploads/default/original/2X/b/b36c7114c2144486c11fb82dc68674095088724c.jpeg)

图十七 管理员预览语料

![image|690x366](https://plaintalks.com/uploads/default/original/2X/a/ad5b6593556629819df848c893a5ab8b7c6d16b8.png)

图十八 管理员审核发布用户上传的语料

![image|690x366](https://plaintalks.com/uploads/default/original/2X/7/7d0af7eb24a1b5ff78d6fe03014645d69b32e5b1.jpeg)

图十九 首页（语料成功显示）

![image|690x366](https://plaintalks.com/uploads/default/original/2X/2/2d508cb8bffb6a4b13d7ab35756bb1d8bbd9025f.png)

图二十 管理员撤回用户上传的语料

![image|690x366](https://plaintalks.com/uploads/default/original/2X/3/32dd7c7af1262a5359081a88b46feb0a8925a080.png)

图二十一 首页（语料被撤回不显示）</div>
