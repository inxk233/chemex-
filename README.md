<p align="center">
    <img src="https://tva1.sinaimg.cn/large/008eGmZEly1gov9jz5uk9j30n10zawfd.jpg" width="120"/>
</p>

<p align="center">
    <a href="https://jq.qq.com/?_wv=1027&k=tnV2HCWU">用户交流群</a>
</p>

<p align="center">
    <img src="https://img.shields.io/badge/Latest Release-3.3.0-orange" />
    <img src="https://img.shields.io/badge/PHP-8+-green" />
    <img src="https://img.shields.io/badge/MySQL-5.7+-blueviolet" />
    <img src="https://img.shields.io/badge/License-GPL3.0-blue" />
</p>

<p align="center">
    <img src="https://travis-ci.com/Celaraze/Chemex.svg?branch=gesha" />
    <img src="https://app.fossa.com/api/projects/git%2Bgithub.com%2FCelaraze%2FChemex.svg?type=shield" />
</p>

<p align="center">
    <img src="https://app.fossa.com/api/projects/git%2Bgithub.com%2FCelaraze%2FChemex.svg?type=large" />
</p>

## Gitee Star 趋势

[![Giteye chart](https://chart.giteye.net/gitee/dcat-phper/chemex/UWZGY8HM.png)](https://giteye.net/chart/UWZGY8HM)

## 贡献者

[![Giteye chart](https://chart.giteye.net/gitee/dcat-phper/chemex/5H7WBLM7.png)](https://giteye.net/chart/5H7WBLM7)

## 鸣谢（咖啡壶）

没有它们就没有 资产管理系统（Chemex）：

`JetBrains` 提供优秀的IDE。

<a href="https://www.jetbrains.com/?from=Chemex" target="_blank">
<img src="https://tva1.sinaimg.cn/large/008eGmZEly1gov9g3tzrnj30u00wj0tn.jpg" width="150"/>
</a>

[Laravel](https://laravel.com) ，优雅的 PHP Web 框架。

[Dcat Admin](https://dcatadmin.com) ，高颜值、高效率的后台开发框架。

`Dr. Peter Schlumbohm`，感谢发明了 Chemex 冲煮咖啡。

## 简介

咖啡壶（Chemex）是一个轻量的、现代设计风格的 ICT 资产管理系统。得益于 [Laravel](https://laravel.com/) 框架以及 [Dcat Admin](https://dcatadmin.com)
开发平台，使其具备了优雅、简洁的优秀体验。 咖啡壶（Chemex）
是完全免费且开源的，任何人都可以无限制的修改代码以及部署服务，这对于很多想要对ICT资产做信息化管理的中小型企业来说，是一个很好的选择：低廉的成本换回的是高效的管理方案，同时又有健康的生态提供支持。

## 特点

使用先进的 Web 框架进行开发。

简洁优雅的使用体验。

灵活可配置的自定义字段。

## 环境要求

`git`，用于管理版本，部署和升级必要工具。

`PHP 8+` ，仅支持 PHP8。

`composer`，PHP 的包管理工具，用于安装必要的依赖包。

`MySQL 5.7+`，数据库引擎，理论上 `MariaDB 10.2 +` 兼容支持。

`ext-zip` 扩展。

`ext-json` 扩展。

`ext-fileinfo` 扩展。

`ext-ldap` 扩展。

`ext-bcmath` 扩展。

`ext-mysqli` 扩展。

`ext-xml` 扩展。

`ext-xmlrpc` 扩展。

以上扩展安装过程注意版本必须与 PHP 版本一致。

## 部署

### 经典 Nginx & PHP-fpm

生产环境下为遵守安全策略，非常建议在服务器本地进行部署，暂时不提供相关线上初始化安装的功能。因此，虽然前期部署的步骤较多，但已经为大家自动化处理了很大部分的流程，只需要跟着下面的命令一步步执行，一般是不会有部署问题的。

1：为你的计算机安装 `PHP8` 环境，参考：[PHP官方](https://www.php.net/downloads) 。

2：为你的计算机安装 `MySQL` 或者 `mariadb`。

3：在你想要的目录中，执行 `git clone https://gitee.com/liuming5678/chemex.git` 完成下载。

4：在项目根目录中，复制 `.env.example` 文件为一份新的，并重命名为 `.env`。

5：根据 `.env` 文件中注释的指引进行配置。

6：在项目根目录中，执行 `composer update -vvv`。

7：你可能使用的web服务器为 `nginx` 以及 `apache`，无论怎样，应用的起始路径在 `/public` 目录，请确保指向正确，同时程序的根目录权限应该调整为：拥有者和你的 Web 服务器运行用户一致，例如 www
用户，切记切记！！！！！且根目录权限为 `755`。`/storage` 目录设置为 `777` 权限。`/public` 目录设置为 `777` 权限。

8：修改web服务器的伪静态规则为：`try_files $uri $uri/ /index.php?$args;`。

9：此时可以通过访问 `http://your_domain` 来使用咖啡壶。管理员账号密码为：`admin / admin`。

10:重置账户密码命令：        php artisan chemex:admin-reset。

11：配置应用信息(重要），在env文件中
APP_NAME=chemex # 应用名称，一般不需要修改
APP_ENV=local
APP_URL=http://127.0.0.1:9999 # 修改默认应用地址和站点配置中地址相同配合上传LOGO使用，在站点配置中设置站点地址！

12：执行安装命令
# 在项目根目录中执行 php artisan chemex:install

## 版本更新

随时随地保持更新可以在项目根目录中执行 `sudo git fetch --all && git reset --hard origin/main && git pull` 命令，将会同步分支的最新修改内容。

然后，执行 `composer update -vvv` 来更新依赖包。

最后，执行 `php artisan chemex:update` 来进行升级。

> 注意，如果提示 permission denied 错误，需要通过 sudo 身份执行。

## 反馈问题

请随时牢记，这是一个开源项目，作者有自己的生活、自己的工作，QQ群建立的目的是提供一个场所供用户们互相交流，作者不会提供1对1的服务。

最好的反馈方式即是在本代码仓库中提交 Issue，我们在空余时间检查并解决。

## 截图

![](https://tva1.sinaimg.cn/large/008eGmZEly1gov9d2pjiaj31lt0u0408.jpg)

![](https://tva1.sinaimg.cn/large/008eGmZEly1gov9csj82yj31lt0u0wgn.jpg)

![](https://tva1.sinaimg.cn/large/008eGmZEly1gov9d07mxfj314d0u0q5e.jpg)

![](https://tva1.sinaimg.cn/large/008eGmZEly1gov9cwrlz4j30ua0u0q63.jpg)

## 咖啡壶没有满足我的需求，我想要咖啡壶成为我想要的样子

咖啡壶是开源的，程序本体及其衍生工具的源码都在你的手中，你可以自行修改成为你想要的样子。

`Fork` 本仓库，修改代码，成为你的。

## 开源协议

咖啡壶（Chemex）遵循 [GPL3.0](https://www.gnu.org/licenses/gpl-3.0.html) 开源协议。
