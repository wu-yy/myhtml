<?php include maoo_temp('header'); ?>
<div class="site-top">
    <a class="left" href="<?php echo maoo_url($date,'user'); ?>">
        <i class="fa fa-angle-left"></i>
    </a>
    我的订单
    <a class="right" href="<?php echo $date->siteUrl; ?>?search=1">
        <i class="fa fa-search"></i>
    </a>
</div>
<div class="order-list">
    <?php foreach($date->orders->result as $order) : ?>
    <a class="order-list-item" href="<?php echo maoo_url($date,'user','orderView',$order->id); ?>">
        <div class="top">
            <div class="left">
                <div class="date">订单时间：<?php echo date('Y年m月d日',$order->statusTime1); ?></div>
            </div>
            <div class="right">
                <?php echo $order->statusText; ?>
            </div>
            <div class="clearfix"></div>
            <div class="tradeNo">订单编号：<?php echo $order->tradeNo; ?></div>
        </div>
        <div class="center">
            <?php foreach($order->products as $products) : ?>
            <div class="pro">
                <div class="left">
                    <div class="img-div" style="background-image:url(<?php echo $products->cover; ?>?imageView2/1/w/360/h/360);"></div>
                </div>
                <div class="title">
                    <?php echo $products->title; ?><?php foreach($products->params as $param) : ?><span><?php echo $param->name; ?></span><?php endforeach; ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="bottom">
            总金额：<span><?php echo $order->total/100; ?>元</span>
        </div>
    </a>
    <?php endforeach; ?>
</div>
<?php echo maoo_pagenavi($date->orders->count,$_GET['page'],$date->pageSizeProduct,$date->siteUrl); ?>
<?php include maoo_temp('footer'); ?>