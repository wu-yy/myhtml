<?php include maoo_temp('header'); ?>
<div class="site-top">
    <a class="left" href="<?php echo $date->siteUrl; ?>">
        <i class="fa fa-angle-left"></i>
    </a>
    全部商品
    <a class="right" href="<?php echo $date->siteUrl; ?>?search=1">
        <i class="fa fa-search"></i>
    </a>
</div>
<div class="home-pro-list">
    <?php if($date->products->count>0) : ?>
    <?php $num = 0; foreach($date->products->result as $product) : $num++; ?>
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
    <?php else : ?>
    <div class="home-pro-list-item">
        没有任何商品
    </div>
    <?php endif; ?>
</div>
<?php echo maoo_pagenavi($date->products->count,$_GET['page'],$date->pageSizePost,$date->siteUrl); ?>
<?php include maoo_temp('footer'); ?>