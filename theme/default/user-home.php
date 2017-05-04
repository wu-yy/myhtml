<?php include maoo_temp('header'); ?>
    <div class="breadcrumb-box">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li>
                    <a href="<?php echo $date->siteUrl; ?>">
                        首页
                    </a>
                </li>
                <li class="active">
                    用户中心
                </li>
            </ol>
        </div>
    </div>
    <div class="user-center">
        <div class="container">
            <div class="row">
                <?php include maoo_temp('user-side'); ?>
                <div class="col-md-12 col-80 col">
                    <div class="user-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="user-home">
                                    <div class="info">
                                        <img class="avatar" src="<?php echo $date->user->avatar; ?>?imageView2/1/w/100/h/100" />
                                        <div class="row">
                                            <div class="col-md-6 col">
                                                <h3 class="title"><?php echo $date->user->displayName; ?></h3>
                                                <div class="hello">
                                                    现有积分：<?php echo $date->user->coins; ?>
                                                    <a class="ml-10" href="<?php echo maoo_url($date,'user','coins'); ?>">查看积分记录</a>
                                                </div>
                                                <a class="set" href="<?php echo maoo_url($date,'user','set'); ?>">修改个人信息 ></a>
                                            </div>
                                            <div class="col-md-6 col">
                                                <!--ul class="list-unstyled mb-0">
                                                    <li>账户安全：普通</li>
                                                    <li>绑定手机：<a href="#" class="btn btn-warning pull-right">绑定</a></li>
                                                    <li>绑定邮箱：179*****91@q*.com</li>
                                                </ul-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="data-list">
                                        <div class="row">
                                            <div class="col-md-6 col">
                                                <div class="data">
                                                    <img src="<?php echo $date->siteUrl; ?>/public/img/portal-icon-1.png" />
                                                    <h4>待支付的订单：<span><?php echo $date->orderStatus1Count; ?></span></h4>
                                                    <a href="<?php echo maoo_url($date,'user','order',array('status'=>1)); ?>">查看待支付订单 <i class="fa fa-angle-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col">
                                                <div class="data">
                                                    <img src="<?php echo $date->siteUrl; ?>/public/img/portal-icon-2.png" />
                                                    <h4>待收货的订单：<span><?php echo $date->orderStatus3Count; ?></span></h4>
                                                    <a href="<?php echo maoo_url($date,'user','order',array('status'=>3)); ?>">查看待收货订单 <i class="fa fa-angle-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col">
                                                <div class="data">
                                                    <img src="<?php echo $date->siteUrl; ?>/public/img/portal-icon-4.png" />
                                                    <h4>喜欢的商品：<span><?php echo count($date->user->likeProducts); ?></span></h4>
                                                    <a href="<?php echo maoo_url($date,'user','likeProduct'); ?>">查看喜欢的商品 <i class="fa fa-angle-right"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col">
                                                <div class="data">
                                                    <img src="<?php echo $date->siteUrl; ?>/public/img/portal-icon-3.png" />
                                                    <h4>发表的评论数：<span><?php echo $date->commentCount; ?></span></h4>
                                                    <a href="<?php echo maoo_url($date,'user','comment'); ?>">查看发表的评论 <i class="fa fa-angle-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include maoo_temp('footer'); ?>