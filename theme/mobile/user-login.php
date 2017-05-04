<?php include maoo_temp('header'); ?>
<style>
    body {background-color: #fff;}
    .list {border-top: 1px solid #e0e0e0; border-bottom: 1px solid #e0e0e0; }
</style>
<form method="post" class="sign-form" action="<?php echo $date->siteUrl; ?>/engine/action/login.php">
    <a href="<?php echo $date->siteUrl; ?>" class="img-div" style="background-image:url(<?php echo $date->siteLogo; ?>);"></a>
    <h1 class="title">用户登录</h1>
    <div class="list">
        <div class="list-item">
            <label>用户名</label>
            <input type="text" name="name" />
            <div class="clearfix"></div>
        </div>
        <div class="list-item">
            <label>密码</label>
            <input type="password" name="pass" />
            <div class="clearfix"></div>
        </div>
    </div>
    <button type="submit" class="button">立即登录</button>
    <div class="text-center">
        还没有账号？<a href="<?php echo maoo_url($date,'user','reg'); ?>">立即注册</a>
    </div>
</form>
<style>
    .site-nav {display: none; }
</style>
<?php include maoo_temp('footer'); ?>