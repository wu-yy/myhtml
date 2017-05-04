<div class="site-nav">
    <div class="site-nav-item">
        <a href="<?php echo $date->siteUrl; ?>" class="<?php if($_GET['m']=='product' || ($_GET['m']=='' && $_GET['a']=='')) : ?>active<?php endif; ?>">
            <i class="fa fa-home"></i>
            <div class="clearfix"></div>
            商品
        </a>
    </div>
    <div class="site-nav-item">
        <a href="<?php echo maoo_url($date,'post'); ?>" class="<?php if($_GET['m']=='post') : ?>active<?php endif; ?>">
            <i class="fa fa-calendar-check-o"></i>
            <div class="clearfix"></div>
            文章
        </a>
    </div>
    <div class="site-nav-item">
        <a href="<?php if($date->user) : ?><?php echo maoo_url($date,'product','cart'); ?><?php else : ?><?php echo maoo_url($date,'user','login'); ?><?php endif; ?>">
            <i class="fa fa-cart-plus"></i>
            <div class="clearfix"></div>
            购物车
        </a>
    </div>
    <div class="site-nav-item">
        <?php if($date->user) : ?>
        <a href="<?php echo maoo_url($date,'user'); ?>" class="<?php if($_GET['m']=='user') : ?>active<?php endif; ?>">
            <i class="fa fa-user"></i>
            <div class="clearfix"></div>
            我
        </a>
        <?php else : ?>
        <a href="<?php echo maoo_url($date,'user','login'); ?>">
            <i class="fa fa-user"></i>
            <div class="clearfix"></div>
            登录
        </a>
        <?php endif; ?>
    </div>
    <div class="clearfix"></div>
</div>
<?php if($_SESSION['flash']) : ?>
<div class="alertbox">
    <div class="alert alert-success" role="alert"><?php echo $_SESSION['flash']; ?></div>
    <script>
         setTimeout("$('.alertbox .alert').fadeOut()",3000);
    </script>
</div>
<?php endif; ?>
</body>
</html>