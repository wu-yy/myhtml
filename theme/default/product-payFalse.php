<?php include maoo_temp('header'); ?>
<div class="pro-payDone">
    <div class="container text-center">
        <div class="box">
            <i class="fa fa-exclamation-triangle"></i>
            <div class="clearfix"></div>
            <h1>支付信息有误</h1>
            <h4>如您已支付成功，请即时与网站客服联系。</h4>
            <div class="btns">
                <a class="btn btn-info" href="<?php echo $date->siteUrl; ?>">返回首页</a> 
                <a class="btn btn-default" href="<?php echo maoo_url($date,'user','order'); ?>">查看订单</a>
            </div>
        </div>
    </div>
</div>
<?php include maoo_temp('footer'); ?>