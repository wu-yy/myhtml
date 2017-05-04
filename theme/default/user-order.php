<?php include maoo_temp('header'); ?>
    <div class="breadcrumb-box">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li>
                    <a href="<?php echo $date->siteUrl; ?>">
                        首页
                    </a>
                </li>
                <li>
                    <a href="<?php echo maoo_url($date,'user'); ?>">
                        用户中心
                    </a>
                </li>
                <li class="active">
                    我的订单
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
                                    我的订单 <small>请谨防钓鱼链接或诈骗电话</small>
                                </h2>
                                <div class="user-order">
                                    <div class="nav">
                                        <ul class="list-inline mb-0 pull-left">
                                            <li class="<?php if(!is_numeric($_GET['status'])) echo 'active'; ?>"><a href="<?php echo $date->siteUrl; ?>?m=user&a=order">全部有效订单</a></li>
                                            <li>|</li>
                                            <li class="<?php if($_GET['status']==1) echo 'active'; ?>"><a href="<?php echo $date->siteUrl; ?>?m=user&a=order&status=1">待支付</a></li>
                                            <li>|</li>
                                            <li class="<?php if($_GET['status']==3) echo 'active'; ?>"><a href="<?php echo $date->siteUrl; ?>?m=user&a=order&status=3">待收货</a></li>
                                            <li>|</li>
                                            <li class="<?php if($_GET['status']==10) echo 'active'; ?>"><a href="<?php echo $date->siteUrl; ?>?m=user&a=order&status=10">已关闭</a></li>
                                        </ul>
                                        <!--form action="/user/order/search" method="get" class="pull-right" id="order-serach">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="s" placeholder="输入商品名称、订单号">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                            </div>
                                        </form>
                                        <script>
                                            $('#order-serach span.input-group-addon').click(function(){
                                                $('#order-serach').submit();
                                                return;
                                            });
                                        </script-->
                                        <div class="clearfix"></div>
                                    </div>
                                    <?php foreach($date->orders->result as $order) : ?>
                                    <div class="order order-<?php echo $order->status; ?>">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="title mt-0"><?php echo $order->statusText; ?></h4>
                                                <ul class="list-inline mb-0">
                                                    <li><?php echo date('Y年m月d日',$order->statusTime1); ?></li>
                                                    <li>|</li>
                                                    <li><?php echo $date->user->displayName; ?></li>
                                                    <li>|</li>
                                                    <li>订单号：<?php echo $order->tradeNo; ?></li>
                                                </ul>
                                                <div class="orderTotal">
                                                    订单金额：<span class="total"><?php echo $order->total/100; ?></span>元
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <?php foreach($order->products as $products) : ?>
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a class="img-div" href="<?php echo maoo_url($date,'product','single',$products->product); ?>">
                                                            <img class="media-object" src="<?php echo $products->cover; ?>?imageView2/1/w/80/h/80">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a class="media-heading" href="<?php echo maoo_url($date,'product','single',$products->product); ?>">
                                                            <?php echo $products->title; ?>
                                                            <?php foreach($products->params as $param) : ?>
                                                            <span><?php echo $param->name; ?></span>
                                                            <?php endforeach; ?>
                                                        </a>
                                                        <div class="clearfix"></div>
                                                        <?php echo $products->price/100; ?>元 x <?php echo $products->number; ?>
                                                    </div>
                                                </div>
                                                <?php endforeach; ?>
                                                <div class="btn-box">
                                                    <?php if($order->status==1) : ?>
                                                    <a href="<?php echo maoo_url($date,'product','confirm',$order->id); ?>" class="btn btn-default btn-block">立即支付</a>
                                                    <?php elseif($order->status==4) : ?>
                                                    <a href="<?php echo $date->siteUrl; ?>/engine/action/orderConfirm.php?id=<?php echo $order->id; ?>" class="btn btn-default btn-block">确认收货</a>
                                                    <?php endif; ?>
                                                    <a href="<?php echo maoo_url($date,'user','orderView',$order->id); ?>" class="btn btn-info btn-block">订单详情</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                                <?php echo maoo_pagenavi($date->orders->count,$_GET['page'],$date->pageSizeProduct,$date->siteUrl); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include maoo_temp('footer'); ?>