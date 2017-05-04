<?php include maoo_temp('header'); ?>
<?php if($date->count) : ?>
<div class="pro-cart">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-2 col">
                            <a href="<?php echo $date->siteUrl; ?>/engine/action/cartSelect.php"><i class="fa fa-check  <?php if($date->selectCount==$date->count) echo 'active'; ?>"></i></a>
                            全选
                        </div>
                        <div class="col-md-4 col">
                            商品名称
                        </div>
                        <div class="col-md-1 col text-center">
                            单价
                        </div>
                        <div class="col-md-3 col text-center">
                            数量
                        </div>
                        <div class="col-md-1 col text-center">
                            小计
                        </div>
                        <div class="col-md-1 col text-center">
                            操作
                        </div>
                    </div>
                </div>
                <ul class="list-group">
                    <?php foreach($date->carts as $cart) : ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-2 col">
                                <a href="<?php echo $date->siteUrl; ?>/engine/action/cartSelect.php?id=<?php echo $cart->id; ?>">   <i class="fa fa-check <?php if(!$cart->unset) echo 'active'; ?>"></i>
                                </a>
                                <a class="img-div pull-right" href="<?php echo maoo_url($date,'product','single',$cart->product->id); ?>">
                                    <img src="<?php echo $cart->product->cover[0]; ?>?imageView2/1/w/80/h/80" />
                                </a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-4 col">
                                <div class="pr">
                                    <!--span class="label label-warning">加购价</span-->
                                    <a class="title" href="<?php echo $cart->product->id; ?>">
                                        <?php echo $cart->product->title; ?>
                                        <?php foreach($cart->params as $param) : ?>
                                        <span><?php echo $param->name; ?></span>
                                        <?php endforeach; ?>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-1 col text-center">
                                <?php echo $cart->price/100; ?>
                            </div>
                            <div class="col-md-3 col text-center">
                                <div class="input-group minus-plus" id-data="<?php echo $cart->id; ?>">
                                    <span class="input-group-addon minus">
                                        <i class="fa fa-minus"></i>
                                    </span>
                                    <input type="text" class="form-control text-center changenum" value="<?php echo $cart->number; ?>">
                                    <span class="input-group-addon plus">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-1 col text-center total">
                                <span class="total"><?php echo $cart->price*$cart->number/100; ?></span>元
                            </div>
                            <div class="col-md-1 col text-center">
                                <a href="<?php echo $date->siteUrl; ?>/engine/action/cartDelete.php?id=<?php echo $cart->id; ?>"><i class="fa fa-close"></i></a>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="panel panel-default panel-bottom">
                <div class="panel-body pr">
                    <ul class="list-inline mb-0 pull-left">
                        <li><a href="<?php echo $date->siteUrl; ?>?m=product">继续购物</a></li>
                        <li>|</li>
                        <li>共 <span id="cartCount"><?php echo $date->count; ?></span> 件商品，已选择 <span id="cartSelectCount"><?php echo $date->selectCount; ?></span> 件</li>
                    </ul>
                    <div class="total">合计(不含运费)：<span id="total"><?php echo $date->total/100; ?></span><span>元</span></div>
                    <div class="clearfix"></div>
                    <a class="btn btn-warning" href="<?php echo maoo_url($date,'product','checkout'); ?>">去结算</a>
                </div>
            </div>
            <script>
                $('.minus-plus .minus').click(function(){
                    var minusplus = $(this).parent('.minus-plus');
                    var pro = $(minusplus).attr('id-data');
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo $date->siteUrl; ?>/engine/action/cartNumber.php',
                        data: {
                            number: -1,
                            id : pro,
                            type : 1
                        },
                        dataType : 'json',
                        success: function(json) {
                            if(json.code==200) {
                                var row = $(minusplus).parent('.col').parent('.row');
                                $('.form-control',row).val(json.reNumber);
                                $('span.total',row).text(json.reTotal/100);
                                $('#total').text(json.total/100);
                                $('#cartCount').text(json.count);
                                $('#cartSelectCount').text(json.selectCount);
                            } else {
                                alert(json.text);
                            };
                        },
                        error: function(data) {
                            alert('无法加载购物车信息');
                        }
                    });
                });
                $('.minus-plus .plus').click(function(){
                    var minusplus = $(this).parent('.minus-plus');
                    var pro = $(minusplus).attr('id-data');
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo $date->siteUrl; ?>/engine/action/cartNumber.php',
                        data: {
                            number: 1,
                            id : pro,
                            type : 1
                        },
                        dataType : 'json',
                        success: function(json) {
                            if(json.code==200) {
                                var row = $(minusplus).parent('.col').parent('.row');
                                $('.form-control',row).val(json.reNumber);
                                $('span.total',row).text(json.reTotal/100);
                                $('#total').text(json.total/100);
                                $('#cartCount').text(json.count);
                                $('#cartSelectCount').text(json.selectCount);
                            } else {
                                alert(json.text);
                            };
                        },
                        error: function(data) {
                            alert('无法加载购物车信息');
                        }
                    });
                });
                $('.minus-plus .changenum').change(function(){
                    var minusplus = $(this).parent('.minus-plus');
                    var pro = $(minusplus).attr('id-data');
                    var number = $(this).val()*1;
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo $date->siteUrl; ?>/engine/action/cartNumber.php',
                        data: {
                            number: number,
                            id : pro,
                            type : 2
                        },
                        dataType : 'json',
                        success: function(json) {
                            if(json.code==200) {
                                var row = $(minusplus).parent('.col').parent('.row');
                                $('.form-control',row).val(json.reNumber);
                                $('span.total',row).text(json.reTotal/100);
                                $('#total').text(json.total/100);
                                $('#cartCount').text(json.count);
                                $('#cartSelectCount').text(json.selectCount);
                            } else {
                                alert(json.text);
                            };
                        },
                        error: function(data) {
                            alert('无法加载购物车信息');
                        }
                    });
                });
            </script>
        </div>
    </div>
<?php else : ?>
    <div class="pro-cart-empty">
        <div class="container">
            <div class="cart-empty">
                <h1 class="title">您的购物车还是空的</h1>
                <a href="<?php echo maoo_url($date,'product'); ?>" class="btn btn-warning">马上去购物</a>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php include maoo_temp('footer'); ?>