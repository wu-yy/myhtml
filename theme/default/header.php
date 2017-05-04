<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $maoo_title; ?></title>
<link href="<?php echo $date->siteUrl; ?>/public/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo $date->siteUrl; ?>/public/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo maoo_css($date); ?>" rel="stylesheet">
<!--[if lt IE 9]>
<script src="<?php echo $date->siteUrl; ?>/public/js/html5shiv.min.js"></script>
<script src="<?php echo $date->siteUrl; ?>/public/js/respond.min.js"></script>
<![endif]-->
<script src="<?php echo $date->siteUrl; ?>/public/js/jquery.min.js"></script>
<script src="<?php echo $date->siteUrl; ?>/public/js/bootstrap.min.js"></script>
<script src="<?php echo $date->siteUrl; ?>/public/js/moment.js"></script>
</head>
<body>
<div class="topbar">
    <div class="container">
        <div class="left">
            <a href="<?php echo $date->siteUrl; ?>">首页</a>
            <a href="<?php echo maoo_url($date,'product'); ?>">商品</a>
            <a href="<?php echo maoo_url($date,'post'); ?>">文章</a>
            <a href="<?php echo maoo_url($date,'activity'); ?>">动态</a>
        </div>
        <div class="right">
            <ul class="list-inline mb-0">
                <?php if($date->user) : ?>
                <li>
                    <a href="<?php echo maoo_url($date,'user','activity',$date->user->id); ?>">我的动态</a>
                </li>
                <li>
                    <a href="<?php echo $date->siteUrl; ?>?m=user&a=index">用户中心</a>
                    <div class="dropdown">
                        <a href="<?php echo maoo_url($date,'user','order'); ?>">我的订单</a>
                        <a href="<?php echo maoo_url($date,'user','set'); ?>">账户设置</a>
                        <a href="<?php echo maoo_url($date,'user','likeProduct'); ?>">商品收藏</a>
                        <a href="<?php echo maoo_url($date,'user','logout'); ?>">退出登录</a>
                    </div>
                </li>
                <li>
                    <?php if($date->day==$date->user->qiandaoDay) : ?>
                    <a id="maoo_qiandao_btn" href="javascript:;">已签到</a>
                    <?php else : ?>
                    <a id="maoo_qiandao_btn" href="javascript:maoo_qiandao();">每日签到</a>
                    <script>
                        function maoo_qiandao() {
                            $.ajax({
                                url: '<?php echo $date->siteUrl; ?>/engine/action/qiandao.php',
                                type: 'GET',
                                dataType: 'json',
                                timeout: 9000,
                                error: function() {
                                    alert('提交失败！');
                                },
                                success: function(data) {
                                    if(data.code==200) {
                                        $('#maoo_qiandao_btn').attr('href','javascript:;');
                                        $('#maoo_qiandao_btn').addClass('active');
                                        $('#maoo_qiandao_btn').html('签到成功');
                                    } else {
                                        alert(data.text);
                                    };
                                }
                            });
                        };
                    </script>
                    <?php endif; ?>
                </li>
                <li class="<?php if($date->cartSelectCount>0) echo 'cartin'; else echo 'active'; ?>">
                    <a href="<?php echo maoo_url($date,'product','cart'); ?>">
                        <i class="fa fa-shopping-bag"></i> 购物车 (<?php echo $date->cartSelectCount; ?>)
                    </a>
                </li>
                <?php else : ?>
                <li>
                    <a href="<?php echo maoo_url($date,'user','login'); ?>">登录</a>
                </li>
                <li>
                    <a href="<?php echo maoo_url($date,'user','reg'); ?>">注册</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="header">
    <div class="container">
        <a class="logo" href="<?php echo $date->siteUrl; ?>" title="<?php echo $date->siteTitle; ?>">
            <img src="<?php echo $date->siteLogo; ?>?imageView2/1/w/250/h/60" />
        </a>
        <div class="nav">
            <?php foreach($date->siteNavList as $nav) : ?>
            <a href="<?php echo $nav->url; ?>" order-data="<?php echo $nav->order; ?>"><?php echo $nav->text; ?></a>
            <?php endforeach; ?>
        </div>
        <div class="search">
            <form method="get" action="<?php echo $date->siteUrl; ?>" id="search-form">
                <div class="input-group">
                    <input type="text" name="s" class="form-control" placeholder="搜索本站">
                    <span class="input-group-addon" id="search-btn">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
            </form>
            <script>
                $('#search-form span.input-group-addon').click(function(){
                    $('#search-form').submit();
                    return;
                });
            </script>
        </div>
    </div>
</div>