<?php include maoo_temp('header'); ?>
<div class="site-top pro-single-top">
    <a class="left" href="<?php echo maoo_url($date,'product','term',$date->product->term->id); ?>">
        <i class="fa fa-angle-left"></i>
    </a>
    <a class="right" href="<?php echo $date->siteUrl; ?>?search=1">
        <i class="fa fa-search"></i>
    </a>
</div>
<div class="pro-single-cover">
    <div class="banner">
        <ul>
            <?php foreach($date->product->cover as $cover) : ?>
            <li>
                <div class="img-div" style="background-image:url(<?php echo $cover; ?>?imageView2/1/w/482/h/482);"></div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<script>
    $(function() {
        $('.banner').unslider({
            speed: 500, 
            delay: 3000,
            complete: function() {},
            keys: true, 
            dots: false,
            fluid: false
        });
    });
</script>
<div class="pro-single-info">
    <div class="left">
        <div class="title"><?php echo $date->product->title; ?></div>
        <div class="price" price-data="<?php echo $date->product->price; ?>">
            <?php if($date->product->minPrice!=$date->product->maxPrice) : ?><span><?php echo $date->product->minPrice/100; ?> - <?php echo $date->product->maxPrice/100; ?></span><?php else : ?><?php echo $date->product->minPrice/100; ?><?php endif; ?> 元
        </div>
    </div>
    <!--div class="right">
        <i class="fa fa-share-square-o"></i>
    </div-->
    <div class="clearfix"></div>
    <div class="excerpt"><?php echo $date->product->excerpt; ?></div>
</div>
<div class="pro-single-entry">
    <?php echo $date->product->content; ?>
</div>
<div class="pro-single-bottom">
    <a class="left" href="<?php echo $date->siteUrl; ?>">
        <i class="fa fa-home"></i>
    </a>
    <?php if(count($date->product->param)>0) : ?>
    <button class="pro-single-buy" id="show-cart-form" type="button">立即购买</button>
    <?php else : ?>
    <form method="post" action="<?php echo $date->siteUrl; ?>/engine/action/cart.php">
        <input type="hidden" name="id" value="<?php echo $date->product->id; ?>" />
        <button class="pro-single-buy" type="submit">立即购买</button>
    </form>
    <?php endif; ?>
    <a class="right" href="<?php echo maoo_url($date,'product','cart'); ?>">
        <i class="fa fa-shopping-cart"></i>
    </a>
</div>
<?php if(count($date->product->param)>0) : ?>
<form id="pro-single-form" method="post" action="<?php echo $date->siteUrl; ?>/engine/action/cart.php">
    <input type="hidden" name="id" value="<?php echo $date->product->id; ?>" />
    <textarea class="hidden" id="param-form" name="params"></textarea>
    <?php if(count($date->product->param)>0) : ?>
    <?php foreach($date->product->param as $param) : ?>
    <div class="optional" name-data="<?php echo $param->title; ?>">
        <div class="name"><?php echo $param->title; ?>：</div>
        <?php $num = 0; foreach($param->list as $list) : ?>
        <label class="" price-data="<?php echo $list->price; ?>">
            <?php echo $list->name; ?>
            <input type="radio" name="param" value="<?php echo $list->name; ?>" />
        </label>
        <?php $num++; endforeach; ?>
        <div class="clearfix"></div>
    </div>
    <?php endforeach; ?>
    <script>
        $('.optional label').click(function(){
            var out = $(this).parent('.optional');
            $('label',out).removeClass('active');
            $(this).addClass('active');
            var priceRe = $('.pro-single .price').attr('price-data')*1;
            var price = 0;
            $('.optional label.active').each(function(){
                price += $(this).attr('price-data')*1;
            });
            $('.price span').text((price+priceRe)/100);
            var params = [];
            $('.optional').each(function(){
                params.push({
                    title : $(this).attr('name-data'),
                    name : $('.active input',this).val()
                });
            });
            $('#param-form').html(JSON.stringify(params));
        });
    </script>
    <?php endif; ?>
    <button type="submit" class="add-cart-btn">
        <i class="fa fa-cart-plus"></i>加入购物车
    </button>
    <script>
        $('.btn-addCart').click(function(){
            var num = 0;
            $('.optional label.active').each(function(){
                num++;
            });
            if(num!=<?php echo count($date->product->param); ?>) {
                alert('请选择全部参数');
                return false;
            };
        });
    </script>
</form>
<div class="pro-single-form-bg"></div>
<script>
    var height = $('#pro-single-form').height()*1+10;
    $('#pro-single-form').css('bottom',-height);
    $('#show-cart-form').click(function(){
        $('#pro-single-form').animate({bottom:"0"});
        $('.pro-single-form-bg').css('display','block');
    });
    $('.pro-single-form-bg').click(function(){
        $('#pro-single-form').animate({bottom:-height});
        $('.pro-single-form-bg').css('display','none');
    });
</script>
<?php endif; ?>
<style>
    .site-nav {display: none; }
</style>
<?php include maoo_temp('footer'); ?>