<?php include maoo_temp('header'); ?>
<div class="site-top">
    <a class="left" href="<?php echo maoo_url($date,'product','cart'); ?>">
        <i class="fa fa-angle-left"></i>
    </a>
    订单结算
    <a class="right" href="<?php echo $date->siteUrl; ?>?search=1">
        <i class="fa fa-search"></i>
    </a>
</div>
<?php if(count($date->addressList)>0) : ?>
<div class="checkout-item checkout-item-1">
    <div class="top">
        <span class="name"><?php echo $date->addressList[0]->name; ?></span>
        <span class="phone"><?php echo $date->addressList[0]->phone; ?></span>
    </div>
    <span class="province"><?php echo $date->addressList[0]->province; ?></span> 
    <span class="city"><?php echo $date->addressList[0]->city; ?></span> 
    <span class="area"><?php echo $date->addressList[0]->area; ?></span> 
    <span class="address"><?php echo $date->addressList[0]->address; ?></span> 
    <span class="zipcode"><?php echo $date->addressList[0]->zipcode; ?></span>
    <i class="fa fa-angle-right"></i>
</div>
<div class="checkout-address-list">
    <?php foreach($date->addressList as $address) : ?>
    <div class="checkout-address-list-item">
        <dl>
            <dt>
                <span class="name"><?php echo $address->name; ?></span>
                <span class="cur">选择此地址</span>
            </dt>
            <dd><span class="phone"><?php echo $address->phone; ?></span></dd>
            <dd>
                <span class="province"><?php echo $address->province; ?></span> 
                <span class="city"><?php echo $address->city; ?></span> 
                <span class="area"><?php echo $address->area; ?></span>
            </dd>
            <dd><span class="address"><?php echo $address->address; ?></span> (<span class="zipcode"><?php echo $address->zipcode; ?></span>)</dd>
        </dl>
    </div>
    <?php endforeach; ?>
</div>
<script>
    $('.checkout-item-1').click(function(){
        $('.checkout-address-list').animate({left:"0"});
    });
    $('.checkout-address-list-item').click(function(){
        var name = $('.name',this).text();
        var phone = $('.phone',this).text();
        var province = $('.province',this).text();
        var city = $('.city',this).text();
        var area = $('.area',this).text();
        var address = $('.address',this).text();
        var zipcode = $('.zipcode',this).text();
        //show
        $('.checkout-item-1 span.name').text(name);
        $('.checkout-item-1 span.phone').text(phone);
        $('.checkout-item-1 span.province').text(province);
        $('.checkout-item-1 span.city').text(city);
        $('.checkout-item-1 span.area').text(area);
        $('.checkout-item-1 span.address').text(address);
        $('.checkout-item-1 span.zipcode').text(zipcode);
        //form
        $('.checkout-bottom-item-2 input[name="name"]').val(name);
        $('.checkout-bottom-item-2 input[name="phone"]').val(phone);
        $('.checkout-bottom-item-2 input[name="province"]').val(province);
        $('.checkout-bottom-item-2 input[name="city"]').val(city);
        $('.checkout-bottom-item-2 input[name="area"]').val(area);
        $('.checkout-bottom-item-2 input[name="address"]').val(address);
        $('.checkout-bottom-item-2 input[name="zipcode"]').val(zipcode);
        //box
        $('.checkout-address-list').animate({left:"200%"});
    });
</script>
<?php else : ?>
<div class="checkout-item checkout-item-1" style="text-align:center">
    请添加收货地址
</div>
<script>
    $('.checkout-item-1').click(function(){
        $.getScript('<?php echo $date->siteUrl; ?>/public/js/address.js',function(){
            $('#address-form').css('display','block');
        })
    });
</script>
<form method="post" action="<?php echo $date->siteUrl; ?>/engine/action/address.php" id="address-form">
    <div class="list">
        <div class="list-item">
            <label>姓名</label>
            <input class="form-control" name="name" placeholder="必填">
            <div class="clearfix"></div>
        </div>
        <div class="list-item">
            <label>手机号</label>
            <input class="form-control" name="phone" placeholder="必填">
            <div class="clearfix"></div>
        </div>
        <div class="list-item">
            <label>省份</label>
            <select class="form-control" id="province" tabindex="4" runat="server" onchange="selectprovince(this);" name="province" datatype="*" errormsg="必须选择您所在的地区"></select>
            <div class="clearfix"></div>
        </div>
        <div class="list-item">
            <label>城市</label>
            <select class="form-control" id="city" tabindex="4" disabled="disabled" runat="server" name="city"></select>
            <div class="clearfix"></div>
        </div>
        <div class="list-item">
            <label>区县</label>
            <input class="form-control" name="area" placeholder="必填">
            <div class="clearfix"></div>
        </div>
        <div class="list-item">
            <label>详细地址</label>
            <textarea rows="2" class="form-control" name="address" placeholder="必填"></textarea>
            <div class="clearfix"></div>
        </div>
        <div class="list-item">
            <label>邮政编码</label>
            <input class="form-control" name="zipcode" placeholder="">
            <div class="clearfix"></div>
        </div>
        <input type="hidden" name="redirect" value="checkout" />
    </div>
    <button type="submit" class="button">保存</button>
 </form>
<?php endif; ?>
<form method="post" action="<?php echo $date->siteUrl; ?>/engine/action/checkout.php">
<div class="checkout-item checkout-item-4">
    <?php foreach($date->carts as $cart) : ?>
    <div class="pro">
        <div class="left">
            <div class="img-div" style="background-image:url(<?php echo $cart->product->cover[0]; ?>?imageView2/1/w/380/h/380);"></div>
            <div class="title">
                <?php echo $cart->product->title; ?><?php foreach($cart->params as $param) : ?><span><?php echo $param->name; ?></span><?php endforeach; ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="right">
            <?php echo $cart->price/100; ?>元 x <?php echo $cart->number; ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php endforeach; ?>
</div>
<div class="checkout-item checkout-item-5">
    <p>商品价格：<?php echo $date->total/100; ?>元</p>
    <p>配送费用：0元</p>
</div>
<div class="checkout-bottom">
    <div class="checkout-bottom-item checkout-bottom-item-1">
        共<?php echo $date->count; ?>件，合计：<span id="total"><?php echo $date->total/100; ?></span>元
    </div>
    <div class="checkout-bottom-item checkout-bottom-item-2">
        <button type="submit">去结算</button>
        <input type="hidden" name="name" value="<?php echo $date->addressList[0]->name; ?>">
        <input type="hidden" name="phone" value="<?php echo $date->addressList[0]->phone; ?>">
        <input type="hidden" name="province" value="<?php echo $date->addressList[0]->province; ?>">
        <input type="hidden" name="city" value="<?php echo $date->addressList[0]->city; ?>">
        <input type="hidden" name="area" value="<?php echo $date->addressList[0]->area; ?>">
        <input type="hidden" name="address" value="<?php echo $date->addressList[0]->address; ?>">
        <input type="hidden" name="zipcode" value="<?php echo $date->addressList[0]->zipcode; ?>">
    </div>
</div>
</form>
<style>
    .site-nav {display: none; }
</style>
<?php include maoo_temp('footer'); ?>