<?php include maoo_temp('header'); ?>
    <div class="breadcrumb-box">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li>
                    <a href="/">
                        首页
                    </a>
                </li>
                <li>
                    <a href="/">
                        用户中心
                    </a>
                </li>
                <li>
                    <a href="/">
                        我的订单
                    </a>
                </li>
                <li class="active">
                    订单详情
                </li>
            </ol>
        </div>
    </div>
    <div class="user-center">
        <div class="container">
            <div class="row">
                <?php include maoo_temp('user-side'); ?>
                <div class="col-md-12 col-80 col">
                    <div class="user-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h2 class="title">
                                    订单详情 <small>请谨防钓鱼链接或诈骗电话，了解更多></small>
                                </h2>
                                <div class="user-orderView">
                                    <div class="top">
                                        订单号：<?php echo $date->order->tradeNo; ?>
                                        <?php if($date->order->status==1) : ?>
                                        <a class="pull-right btn btn-default" href="<?php echo $date->siteUrl; ?>?m=product&a=confirm&id=<?php echo $date->order->id; ?>">立即支付</a>
                                        <?php elseif($date->order->status==4) : ?>
                                        <a class="pull-right btn btn-warning" href="<?php echo $date->siteUrl; ?>/engine/action/orderConfirm.php?id=<?php echo $date->order->id; ?>">确认收货</a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="progress-box">
                                        <h3 class="title"><?php echo $date->order->statusText; ?></h3>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-<?php if($date->order->status>=1) : ?>success<?php else : ?>default<?php endif; ?>" style="width: 20%">
                                                <span>下单</span>
                                            </div>
                                            <div class="progress-bar progress-bar-<?php if($date->order->status>=2) : ?>success<?php else : ?>default<?php endif; ?>" style="width: 20%">
                                                <span>付款</span>
                                            </div>
                                            <div class="progress-bar progress-bar-<?php if($date->order->status>=3) : ?>success<?php else : ?>default<?php endif; ?>" style="width: 20%">
                                                <span>准备发货</span>
                                            </div>
                                            <div class="progress-bar progress-bar-<?php if($date->order->status>=4) : ?>success<?php else : ?>default<?php endif; ?>" style="width: 20%">
                                                <span>已发货</span>
                                            </div>
                                            <div class="progress-bar progress-bar-<?php if($date->order->status==5) : ?>success<?php else : ?>default<?php endif; ?>" style="width: 20%">
                                                <span>交易成功</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-xs-20 col">
                                                <?php if($date->order->status>=1) : ?>
                                                    <?php echo date('Y年m月d日 h:i', $date->order->statusTime1); ?>
                                                <?php else : ?>
                                                    --
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-xs-12 col-xs-20 col">
                                                <?php if($date->order->status>=2) : ?>
                                                    <?php echo date('Y年m月d日 h:i', $date->order->statusTime2); ?>
                                                <?php else : ?>
                                                    --
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-xs-12 col-xs-20 col">
                                                <?php if($date->order->status>=3) : ?>
                                                    <?php echo date('Y年m月d日 h:i', $date->order->statusTime3); ?>
                                                <?php else : ?>
                                                    --
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-xs-12 col-xs-20 col">
                                                <?php if($date->order->status>=4) : ?>
                                                    <?php echo date('Y年m月d日 h:i', $date->order->statusTime4); ?>
                                                <?php else : ?>
                                                    --
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-xs-12 col-xs-20 col">
                                                <?php if($date->order->status==5) : ?>
                                                    <?php echo date('Y年m月d日 h:i', $date->order->statusTime5); ?>
                                                <?php else : ?>
                                                    --
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collapse" id="collapseDelivery">
                                        <?php if($date->order->logisticalCom && $date->order->logisticalNu) : ?>
                                        <ul class="list-unstyled mb-20">
                                            <li>快递公司：<?php echo $date->order->logisticalCom; ?></li>
                                            <li>快递单号：<?php echo $date->order->logisticalNu; ?></li>
                                        </ul>
                                        <?php else : ?>
                                        <div class="nothing">暂无快递信息</div>
                                        <?php endif; ?>
                                    </div>
                                    <a class="btn btn-info btn-block btn-delivery" role="button" data-toggle="collapse" href="#collapseDelivery" aria-expanded="false" aria-controls="collapseDelivery">展开快递详情 <i class="fa fa-angle-down"></i></a>
                                    <div class="user-orderViewList">
                                        <?php foreach($date->order->products as $products) : ?>
                                        <div class="user-orderViewListSingle">
                                            <div class="left">
                                                <a class="img-div" href="<?php echo maoo_url($date,'product','single',$products->product); ?>">
                                                    <img src="<?php echo $products->cover; ?>?imageView2/1/w/80/h/80" />
                                                </a>
                                            </div>
                                            <div class="center">
                                                <a href="<?php echo maoo_url($date,'product','single',$products->product); ?>">
                                                    <?php echo $products->title; ?>
                                                    <?php foreach($products->params as $param) : ?>
                                                    <span><?php echo $param->name; ?></span>
                                                    <?php endforeach; ?>
                                                </a>
                                            </div>
                                            <div class="right">
                                                <?php echo $products->price/100; ?>元 x <?php echo $products->number; ?>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="user-orderViewInfo">
                                        <dl>
                                            <dt>收货信息</dt>
                                            <dd>姓 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 名：<?php echo $date->order->name; ?></dd>
                                            <dd>联系电话：<?php echo $date->order->phone; ?></dd>
                                            <dd>收货地址：<?php echo $date->order->province; ?> <?php echo $date->order->city; ?> <?php echo $date->order->area; ?> <?php echo $date->order->address; ?></dd>
                                        </dl>
                                        <dl>
                                            <dt>支付方式及送货时间</dt>
                                            <dd>支付方式：<?php echo $date->order->channel; ?></dd>
                                            <dd>送货时间：<?php echo $date->order->sendTimeText; ?></dd>
                                        </dl>
                                        <dl>
                                            <dt>发票信息</dt>
                                            <dd>发票类型：<?php echo $date->order->invoiceText; ?></dd>
                                        </dl>
                                    </div>
                                    <div class="user-orderViewPrice">
                                        <div class="pull-right">
                                            <dl class="dl-horizontal">
                                                <dt>商品总价：</dt>
                                                <dd><?php echo $date->order->total/100; ?>元</dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>运 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 费：</dt>
                                                <dd>0元</dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>订单金额：</dt>
                                                <dd><?php echo $date->order->total/100; ?>元</dd>
                                            </dl>
                                            <dl class="dl-horizontal last">
                                                <dt>实付金额：</dt>
                                                <dd><span><?php echo $date->order->total/100; ?></span>元</dd>
                                            </dl>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include maoo_temp('footer'); ?>