<?php include maoo_temp('header'); ?>
<div class="site-top">
    <a class="left" href="<?php echo maoo_url($date,'user','order'); ?>">
        <i class="fa fa-angle-left"></i>
    </a>
    订单详情
    <a class="right" href="<?php echo $date->siteUrl; ?>?search=1">
        <i class="fa fa-search"></i>
    </a>
</div>
<div class="orderView-part orderView-part-1">
    <p>订单编号：<?php echo $date->order->tradeNo; ?></p>
    <p>订单状态：<?php echo $date->order->statusText; ?></p>
</div>
<div class="orderView-part orderView-part-2">
    <div class="step-list">
        <div class="step">
            <div class="top <?php if($date->order->status>=1) : ?>active<?php endif; ?>">
                <span>下单</span>
            </div>
            <div class="bottom">
                <?php if($date->order->status>=1) : ?>
                    <?php echo date('Y-m-d', $date->order->statusTime1); ?>
                <?php else : ?>
                    --
                <?php endif; ?>
            </div>
        </div>
        <div class="step">
            <div class="top <?php if($date->order->status>=2) : ?>active<?php endif; ?>">
                <span>付款</span>
            </div>
            <div class="bottom">
                <?php if($date->order->status>=2) : ?>
                    <?php echo date('Y-m-d', $date->order->statusTime2); ?>
                <?php else : ?>
                    --
                <?php endif; ?>
            </div>
        </div>
        <div class="step">
            <div class="top <?php if($date->order->status>=3) : ?>active<?php endif; ?>">
                <span>配货</span>
            </div>
            <div class="bottom">
                <?php if($date->order->status>=3) : ?>
                    <?php echo date('Y-m-d', $date->order->statusTime3); ?>
                <?php else : ?>
                    --
                <?php endif; ?>
            </div>
        </div>
        <div class="step">
            <div class="top <?php if($date->order->status>=4) : ?>active<?php endif; ?>">
                <span>出库</span>
            </div>
            <div class="bottom">
                <?php if($date->order->status>=4) : ?>
                    <?php echo date('Y-m-d', $date->order->statusTime4); ?>
                <?php else : ?>
                    --
                <?php endif; ?>
            </div>
        </div>
        <div class="step">
            <div class="top <?php if($date->order->status==5) : ?>active<?php endif; ?>">
                <span>交易成功</span>
            </div>
            <div class="bottom">
                <?php if($date->order->status==5) : ?>
                    <?php echo date('Y-m-d', $date->order->statusTime5); ?>
                <?php else : ?>
                    --
                <?php endif; ?>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="orderView-part orderView-part-3">
    <?php if($date->order->logisticalCom && $date->order->logisticalNu) : ?>
    <p>快递公司：<?php echo $date->order->logisticalCom; ?></p>
    快递单号：<?php echo $date->order->logisticalNu; ?>
    <?php else : ?>
    暂无快递信息
    <?php endif; ?>
</div>
<div class="orderView-part orderView-part-4">
    <?php foreach($date->order->products as $products) : ?>
    <div class="pro">
        <div class="left">
            <div class="img-div" style="background-image:url(<?php echo $products->cover; ?>?imageView2/1/w/380/h/380);"></div>
            <div class="text">
                <div class="title">
                    <?php echo $products->title; ?><?php foreach($products->params as $param) : ?><span><?php echo $param->name; ?></span><?php endforeach; ?>
                </div>
                <div class="price">
                    <?php echo $products->price/100; ?>元 x <?php echo $products->number; ?>
                </div>
            </div>
        </div>
        <div class="right">
            <?php echo $products->price*$products->number/100; ?>元
        </div>
        <div class="clearfix"></div>
    </div>
    <?php endforeach; ?>
</div>
<div class="orderView-part orderView-part-5">
    <p>收货人名：<?php echo $date->order->name; ?></p>
    <p>联系电话：<?php echo $date->order->phone; ?></p>
    <p>收货地址：<?php echo $date->order->province; ?> <?php echo $date->order->city; ?> <?php echo $date->order->area; ?> <?php echo $date->order->address; ?></p>
    <p>邮政编码：<?php echo $date->order->zipcode; ?></p>
</div>
<div class="orderView-part orderView-part-6">
    <p>商品价格：<?php echo $date->order->total/100; ?>元</p>
    <p>配送费用：0元</p>
    <p>应付总额：<?php echo $date->order->total/100; ?>元</p>
</div>
<?php if($date->order->status==1) : ?>
<a class="button" href="<?php echo $date->siteUrl; ?>?m=product&a=confirm&id=<?php echo $date->order->id; ?>">立即支付</a>
<?php elseif($date->order->status==4) : ?>
<a class="button" href="<?php echo $date->siteUrl; ?>/engine/action/orderConfirm.php?id=<?php echo $date->order->id; ?>">确认收货</a>
<?php endif; ?>

<?php include maoo_temp('footer'); ?>