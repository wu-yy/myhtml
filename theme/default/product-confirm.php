<?php include maoo_temp('header'); ?>
<div class="pro-confirm">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="info">
                        <i class="fa fa-check-circle-o"></i>
                        <div class="left">
                            <div class="top">
                                <h4 class="title">订单提交成功！去付款咯～</h4>
                                <p>现在支付，预计2-7天送达</p>
                                <p>请在尽快完成支付, 已使用的礼品卡和优惠券将不会退回</p>
                                <p class="address-show">收货信息：<?php echo $date->order->name; ?> <?php echo $date->order->phone; ?> <?php echo $date->order->province; ?> <?php echo $date->order->city; ?> <?php echo $date->order->area; ?> <?php echo $date->order->address; ?></p>
                            </div>
                            <div class="collapse" id="collapseConfirm">
                                <div class="address-content">
                                    <ul class="list-unstyled mb-0">
                                        <li><div class="title">订单号：</div><span><?php echo $date->order->tradeNo; ?></span></li>
                                        <li><div class="title">收货信息：</div><?php echo $date->order->name; ?> <?php echo $date->order->phone; ?> <?php echo $date->order->province; ?> <?php echo $date->order->city; ?> <?php echo $date->order->area; ?> <?php echo $date->order->address; ?></li>
                                        <li>
                                            <div class="title">商品名称：</div>
                                            <ul class="list-unstyled mb-0">
                                                <?php foreach($date->order->products as $product) : ?>
                                                <li><?php echo $product->title; ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>
                                        <li><div class="title">配送时间：</div><?php echo $date->order->sendTimeText; ?></li>
                                        <li><div class="title">发票信息：</div><?php echo $date->order->invoiceText; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="right">
                            <div>应付总额：<span class="total"><?php echo $date->order->total/100; ?></span><span>元</span></div>
                            <a role="button" data-toggle="collapse" href="#collapseConfirm" aria-expanded="false" aria-controls="collapseConfirm">订单详情 <i class="fa fa-angle-down"></i></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs pay-type-nav" role="tablist">
                <!--li role="presentation" class="active">
                    <a href="#paytab-1" role="tab" data-toggle="tab">
                        微信支付 <span class="wxtj"></span>
                    </a>
                </li-->
                <li role="presentation" class="active">
                    <a href="#paytab-2" role="tab" data-toggle="tab">支付宝付款</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane" id="paytab-1">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-2">
                                    <img src="<?php echo $date->siteUrl; ?>/public/img/WePayLogo.png" />
                                </div>
                                <div class="col-xs-2">
                                </div>
                                <div class="col-xs-4 text-center">
                                    <img class="mb-10" src="<?php echo $date->siteUrl; ?>/public/img/WePayLogo.png" />
                                    <img src="<?php echo $date->siteUrl; ?>/public/img/WePayText.png" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane active" id="paytab-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="pay">
                                <div class="pay-btn-list">
                                    <?php if($date->siteTestPay==1) : ?>
                                    <a class="pay-btn-list-item pay-btn-list-item-1" href="<?php echo $date->siteUrl; ?>/engine/action/testPay.php?id=<?php echo $date->order->id; ?>"><span></span>模拟支付</a>
                                    <?php endif; ?>
                                    <a class="pay-btn-list-item pay-btn-list-item-2" target="_blank" href="<?php echo $date->siteUrl; ?>/engine/action/alipay.php?id=<?php echo $date->order->id; ?>"><span></span>支付宝</a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--script>
    function get_data() {
		$.ajax({
			type: 'GET',
			url: '/pro/confirm/<%= db.id %>/payed',
			success: function(data) {
				if(data.code==2) {
                    //alert('授权成功');
                     location.href = '/user/order/status/2'
                } else {
                    //alert('授权失败');
                }
			},
		});
	}; 
	setInterval("get_data()",1000);
</script-->
<?php include maoo_temp('footer'); ?>