<?php include maoo_temp('header'); ?>
<div class="site-top">
    <a class="left" href="<?php echo maoo_url($date,'product','checkout'); ?>">
        <i class="fa fa-angle-left"></i>
    </a>
    支付信息有误
    <a class="right" href="<?php echo $date->siteUrl; ?>?search=1">
        <i class="fa fa-search"></i>
    </a>
</div>
<div class="pro-payDone">
    <div class="container text-center">
        <div class="box">
            <i class="fa fa-exclamation-triangle"></i>
            <div class="clearfix"></div>
            <h1>支付信息有误</h1>
            <h4>如您已支付成功，请即时与网站客服联系。</h4>
            <div class="btns">
                <a class="btn btn-warning" href="<?php echo maoo_url($date,'order','order'); ?>">查看订单</a>
            </div>
        </div>
    </div>
</div>
<?php include maoo_temp('footer'); ?>