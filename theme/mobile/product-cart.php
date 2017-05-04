<?php include maoo_temp('header'); ?>
<div class="site-top">
    <a class="left" href="<?php echo $date->siteUrl; ?>">
        <i class="fa fa-angle-left"></i>
    </a>
    <span class="title">购物车</span>
    <a class="right" href="<?php echo $date->siteUrl; ?>?search=1">
        <i class="fa fa-search"></i>
    </a>
</div>
<?php if($date->count) : ?>
<div class="home-pro-list cart-list">
    <?php foreach($date->carts as $cart) : ?>
    <?php if(!$cart->unset) : ?>
    <div class="home-pro-list-item">
        <div class="left">
            <div class="img-div" style="background-image:url(<?php echo $cart->product->cover[0]; ?>?imageView2/1/w/380/h/380);"></div>
        </div>
        <div class="right">
            <div class="title">
                <?php echo $cart->product->title; ?>
            </div>
            <div class="excerpt">
                <?php if(count($cart->params>0)) : ?>
                <div class="param">
                <?php foreach($cart->params as $param) : ?>
                    <span><?php echo $param->name; ?></span>
                <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <div class="mr-10">售价：<?php echo $cart->price/100; ?>元</div>
                <div>合计：<span class="total"><?php echo $cart->price*$cart->number/100; ?></span>元</div>
            </div>
            <div class="control">
                <div class="left">
                    <div class="minus-plus" id-data="<?php echo $cart->id; ?>">
                        <span class="fa fa-minus minus"></span>
                        <input type="text" class="num changenum" value="<?php echo $cart->number; ?>" />
                        <span class="fa fa-plus plus"></span>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="right">
                    <a href="<?php echo $date->siteUrl; ?>/engine/action/cartDelete.php?id=<?php echo $cart->id; ?>">
                        <i class="fa fa-trash-o"></i>
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>
</div>
<div class="cart-bottom">
    <div class="cart-bottom-item cart-bottom-item-1">
        共<span id="cartSelectCount"><?php echo $date->selectCount; ?></span>件，金额：
        <div class="clearfix"></div>
        <span id="total"><?php echo $date->total/100; ?></span>元
    </div>
    <div class="cart-bottom-item cart-bottom-item-2">
        <a href="<?php echo $date->siteUrl; ?>?m=product">继续购物</a>
    </div>
    <div class="cart-bottom-item cart-bottom-item-3">
        <a href="<?php echo maoo_url($date,'product','checkout'); ?>">去结算</a>
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
<style>
    .site-nav {display: none; }
</style>
<?php else : ?>
<div class="cart-empty">
    <div class="img-div" style="background-image:url(<?php echo $date->siteUrl; ?>/public/img/cart-empty.png);"></div>
    购物车中没有任何商品
</div>
<?php endif; ?>
<?php include maoo_temp('footer'); ?>