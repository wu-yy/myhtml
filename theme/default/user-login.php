<?php include maoo_temp('header'); ?>
    <div class="sign-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">
                                <h2 class="title mb-40">
                                    帐号登录
                                </h2>
                            </div>
                            <form method="post" class="mb-30" action="<?php echo $date->siteUrl; ?>/engine/action/login.php">
                                <div class="form-group mb-30">
                                    <input class="form-control" type="text" placeholder="用户名" name="name" />
                                </div>
                                <div class="form-group mb-30">
                                    <input class="form-control" type="password" placeholder="密码" name="pass" />
                                </div>
                                <button type="submit" class="btn btn-warning btn-block">立即登录</button>
                            </form>
                            <div class="bottom text-center">
                                <ul class="list-inline mb-0">
                                    <li><a href="<?php echo maoo_url($date,'user','reg'); ?>">注册账号</a></li>
                                    <li>|</li>
                                    <li><a href="#">忘记密码?</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include maoo_temp('footer'); ?>