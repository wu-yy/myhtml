<?php include maoo_temp('header'); ?>
<div class="pro-payDone">
    <div class="container text-center">
        <div class="box">
            <i class="fa fa-check-circle-o"></i>
            <div class="clearfix"></div>
            <h1>支付成功</h1>
            <h4>订单号：<?php echo $date->order->tradeNo; ?></h4>
            <div class="btns">
                <a class="btn btn-info" href="<?php echo maoo_url($date,'product'); ?>">继续购物</a> 
                <a class="btn btn-default" href="<?php echo maoo_url($date,'user','order'); ?>">查看订单</a>
            </div>
        </div>
    </div>
</div>
<?php include maoo_temp('footer'); ?>