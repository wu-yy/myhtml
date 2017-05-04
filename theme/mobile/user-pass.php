<?php include maoo_temp('header'); ?>
<div class="site-top">
    <a class="left" href="<?php echo maoo_url($date,'user'); ?>">
        <i class="fa fa-angle-left"></i>
    </a>
    修改密码
    <a class="right" href="<?php echo $date->siteUrl; ?>?search=1">
        <i class="fa fa-search"></i>
    </a>
</div>
<form method="post" class="user-set-form" action="<?php echo $date->siteUrl; ?>/engine/action/pass.php">
    <div class="list">
        <div class="list-item">
            <label>当前密码</label>
            <input type="password" name="pass" />
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="list">
        <div class="list-item">
            <label>新密码</label>
            <input type="password" name="pass1" />
            <div class="clearfix"></div>
        </div>
        <div class="list-item">
            <label>确认新密码</label>
            <input type="password" name="pass2" />
            <div class="clearfix"></div>
        </div>
    </div>
    <button class="button" type="submit">保存</button>
</form>
<?php include maoo_temp('footer'); ?>