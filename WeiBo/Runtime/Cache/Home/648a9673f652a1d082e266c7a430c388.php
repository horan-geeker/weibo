<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>
        
        ThinkPHP
    </title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/layouts/app.css" rel="stylesheet">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="nav navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="/home/user" style="margin-left: 15px;margin-right: 60px;font-size: large">ThinkPHP</a></li>
                <li class="active"><a href="/">首页</a></li>
                <li><a href="#">文章</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">精彩内容 <span class="caret"></span></a>
                    <ul class="bs-menu dropdown-menu">
                        <li><a href="#">PHP</a></li>
                        <li class="divider"></li>
                        <li><a href="#">ThinkPHP</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Laravel</a></li>
                        <li class="divider"></li>
                        <li><a href="#">C++</a></li>
                        <li class="divider"></li>
                        <li><a href="#">JAVA</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/login">登录</a></li>
                <li><a href="#">注册</a></li>
                <li class="dropdown"><a href="#" data-toggle="dropdown"><?php echo ($auth["username"]); ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-btn fa-sign-out"></i>退出
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="site-nav-left-wrap" id="site_nav_left_wrap">

    <div class="nav-top-push"></div>
    <div class="site-nav-left scrollable-container">
        <div class="list-group">
            <a href="#" class="list-group-item"
               data-container="#site_main_container"
               data-toggle="tooltip"
               data-placement="right"
               title="仪表盘">
                <i class="fa fa-dashboard"></i>
                <span class="text">仪表盘</span>
                <span class="glyphicon glyphicon-triangle-left"></span>
            </a>
        </div>

        <div class="list-group">
            <a href="javascript:void(0);"
               class="list-group-item list-group-item-header collapsed"
               data-toggle="collapse"
               data-target="#report_sidebar_nav_collapse">
                <span class="text">报告管理</span>
                <span class="icon-text">报告</span>
                <i class="fa fa-caret-down pull-right"></i>
            </a>

            <div class="list-group site-nav-left-container collapse collapsed"
                 id="report_sidebar_nav_collapse">

                <a href="#" class="list-group-item"
                   data-pjax
                   data-container="#site_main_container"
                   data-toggle="tooltip"
                   data-placement="right"
                   title="去去去">
                    <span class="fake-icon">买买买</span>
                    <span class="text">么么么</span>
                </a>
            </div>
        </div>

        <div class="btn-toggle-site-nav-left text-center" id="btn_toggle_site_nav_left_wrap_style">
            <span class="glyphicon glyphicon-arrow-left"></span>
            <span class="glyphicon glyphicon-arrow-right"></span>
        </div>

        <div class="fix-push-up" style="height: 120px;"></div>
    </div>
</div>
<div class="main">
    <div class="nav-top-push"></div>
    

    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>昵称</th>
                <th>邮箱</th>
                <th>姓氏</th>
                <th>名字</th>
                <th>创建时间</th>
                <th>更新时间</th>
                <th>发布的文章</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($users)): foreach($users as $key=>$user): ?><tr>
                    <td><?php echo ($user["id"]); ?></td>
                    <td><?php echo ($user["username"]); ?></td>
                    <td><?php echo ($user["email"]); ?></td>
                    <td><?php echo ($user["first_name"]); ?></td>
                    <td><?php echo ($user["last_name"]); ?></td>
                    <td><?php echo ($user["created"]); ?></td>
                    <td><?php echo ($user["updated"]); ?></td>
                    <td>
                        <?php if(is_array($user["posts"])): foreach($user["posts"] as $key=>$post): ?><div class="title"><?php echo ($post["title"]); ?></div>
                            <div class="content"><?php echo ($post["content"]); ?></div><?php endforeach; endif; ?>
                    </td>
                </tr><?php endforeach; endif; ?>
            </tbody>
        </table>
        <div class="pagination-container text-center">
            <ul class="pagination">
                <?php
 for ($i = 1; $i <= $totalPages; $i++) { if ($i == I('get.p')) { echo "<li class='active'><a href='/user/p/$i'>$i</a></li>"; } else { echo "<li><a href='/user/p/$i'>$i</a></li>"; } } ?>
            </ul>
        </div>
    </div>



    <?php if($user == 'hejunwei'): ?><div class="text-center">
            <ul class="pagination">
                <li><a href="#">&laquo;</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
            </ul>
        </div><?php endif; ?>

    <script>
        $(function () {
//            $pageContain = $("#pagination").children();
//            $pageContain.remove();
//            $newNode = $pageContain.children().text(function (i,oldText) {
//                return '<li>'+oldText+'</li>';
//            });
//            console.log($newNode);

        });
    </script>

</div>

</body>
</html>