<?php include maoo_temp('header'); ?>
<?php if($_GET['search']==1) : ?>
<?php include maoo_temp('search-form'); ?>
<?php else : ?>
<form method="get" action="<?php echo $date->siteUrl; ?>" class="home-search">
    <i class="fa fa-search"></i> 
    <input type="text" name="s" placeholder="搜索本站" />
</form>
<?php if(count($date->indexRecommends)>0) : ?>
<div class="home-slider">
    <div class="banner">
        <ul>
            <?php $num=0; foreach($date->indexRecommends as $slider) : ?>
            <li>
                <a href="<?php echo $slider->url; ?>" class="img-div" style="background-image:url(<?php echo $slider->img; ?>?imageView2/1/w/750/h/500);"></a>
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
<?php endif; ?>
<div class="home-stars">
    <?php $num = 0; foreach($date->productRecommend2[0] as $product) : $num++; if($num<4) : ?>
    <div class="home-stars-item">
        <a class="img-div" href="<?php echo maoo_url($date,'product','single',$product->id); ?>" style="background-image:url(<?php echo $product->cover[0]; ?>?imageView2/1/w/200/h/200);"></a>
    </div>
    <?php endif; endforeach; ?>
    <div class="clearfix"></div>
</div>
<?php foreach($date->homeproductTerms as $productTerm) : ?>
<div class="home-pro-list">
    <h4 class="title">
        <a href="<?php echo maoo_url($date,'product','term',$productTerm->id); ?>">
            <?php echo $productTerm->title; ?>
            <span>更多</span>
        </a>
    </h4>
    <div class="clearfix"></div>
    <?php $num = 0; foreach($productTerm->products as $product) : $num++; ?>
    <a class="home-pro-list-item home-pro-list-item-<?php echo $num; ?>" href="<?php echo maoo_url($date,'product','single',$product->id); ?>">
        <div class="left">
            <div class="img-div" style="background-image:url(<?php echo $product->cover[0]; ?>?imageView2/1/w/160/h/160);"></div>
        </div>
        <div class="right">
            <div class="title"><?php echo $product->title; ?></div>
            <div class="excerpt"><?php echo $product->excerpt; ?></div>
            <div class="price"><?php echo $product->minPrice/100; ?>元起</div>
        </div>
        <div class="clearfix"></div>
    </a>
    <?php endforeach; ?>
</div>
<?php endforeach; ?>
<?php endif; ?>
<?php include maoo_temp('footer'); ?>