<?php include maoo_temp('header'); ?>
<div class="site-top">
    <a class="left" href="<?php echo maoo_url($date,'user'); ?>">
        <i class="fa fa-angle-left"></i>
    </a>
    账户设置
    <a class="right" href="<?php echo $date->siteUrl; ?>?search=1">
        <i class="fa fa-search"></i>
    </a>
</div>
<form method="post" class="user-set-form" action="<?php echo $date->siteUrl; ?>/engine/action/userInfo.php">
    <div class="list">
        <div class="list-item">
            <label>姓名</label>
            <input type="text" name="displayName" value="<?php echo $date->user->displayName; ?>" />
            <div class="clearfix"></div>
        </div>
        <div class="list-item">
            <label>性别</label>
            <label class="sex-radio">
                <i class="fa <?php if($date->user->sex==1) : ?>fa-check-circle<?php else : ?>fa-circle-thin<?php endif; ?>"></i>
                男
                <input type="radio" name="sex" value="1" <?php if($date->user->sex==1) : ?>checked<?php endif; ?> />
            </label>
            <label class="sex-radio">
                <i class="fa <?php if($date->user->sex==2) : ?>fa-check-circle<?php else : ?>fa-circle-thin<?php endif; ?>"></i>
                女
                <input type="radio" name="sex" value="2" <?php if($date->user->sex==1) : ?>checked<?php endif; ?>>
            </label>
            <script>
                $('.sex-radio').click(function(){
                    $('.sex-radio i').removeClass('fa-check-circle');
                    $('.sex-radio i').addClass('fa-circle-thin');
                    $('i',this).removeClass('fa-circle-thin');
                    $('i',this).addClass('fa-check-circle');
                });
            </script>
            <div class="clearfix"></div>
        </div>
        <div class="list-item">
            <label>个性签名</label>
            <input type="text" name="excerpt" value="<?php echo $date->user->excerpt; ?>" />
            <div class="clearfix"></div>
        </div>
    </div>
    <button class="button" type="submit" style="margin-bottom:1rem;">保存</button>
    <a class="button-close" href="<?php echo maoo_url($date,'user','logout'); ?>">退出登录</a>
</form>
<?php include maoo_temp('footer'); ?>