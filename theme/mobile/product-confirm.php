<?php include maoo_temp('header'); ?>
<div class="site-top">
    <a class="left" href="<?php echo maoo_url($date,'product','checkout'); ?>">
        <i class="fa fa-angle-left"></i>
    </a>
    付款
    <a class="right" href="<?php echo $date->siteUrl; ?>?search=1">
        <i class="fa fa-search"></i>
    </a>
</div>
<div class="home-pro-list">
    <h4 class="title">
        <a href="javascript:;">
            订单提交成功！去付款咯～
        </a>
    </h4>
    <style>p {margin-bottom: 1rem;}</style>
    <div class="home-pro-list-item">
        <div class="right" style="width:100%;">
            <p>现在支付，预计2-7天送达</p>
            <p>请在尽快完成支付, 已使用的礼品卡和优惠券将不会退回</p>
            <p class="address-show">收货信息：<?php echo $date->order->name; ?> <?php echo $date->order->phone; ?> <?php echo $date->order->province; ?> <?php echo $date->order->city; ?> <?php echo $date->order->area; ?> <?php echo $date->order->address; ?></p>
            <div class="price">总金额：<?php echo $date->order->total/100; ?>元</div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<a class="button" target="_blank" href="<?php echo $date->siteUrl; ?>/engine/action/alipay.php?id=<?php echo $date->order->id; ?>">
    使用支付宝付款
</a>
<?php include maoo_temp('footer'); ?>