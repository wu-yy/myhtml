<?php include maoo_temp('header'); ?>
    <div class="breadcrumb-box">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li>
                    <a href="<?php echo $date->siteUrl; ?>">
                        首页
                    </a>
                </li>
                <li>
                    <a href="<?php echo maoo_url($date,'user'); ?>">
                        用户中心
                    </a>
                </li>
                <li class="active">
                    修改密码
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
                                <h2 class="title">
                                    修改密码
                                </h2>
                                <div class="row user-pass">
                                    <div class="col-md-4 col-md-offset-4 col">
                                        <h2 class="title text-center">
                                            修改密码
                                        </h2>
                                        <form method="post" action="<?php echo $date->siteUrl; ?>/engine/action/pass.php">
                                            <div class="form-group">
                                                <input type="password" class="form-control input-lg" placeholder="当前密码" name="pass">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control input-lg" placeholder="新密码" name="pass1">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control input-lg" placeholder="确认新密码" name="pass2">
                                            </div>
                                            <button type="submit" class="btn btn-warning btn-block btn-lg">
                                                确认修改
                                            </button>
                                        </form>
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