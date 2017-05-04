<?php include maoo_temp('header'); ?>
<div class="site-top">
    <a class="left" href="<?php echo maoo_url($date,'user'); ?>">
        <i class="fa fa-angle-left"></i>
    </a>
    喜欢的商品
    <a class="right" href="<?php echo $date->siteUrl; ?>?search=1">
        <i class="fa fa-search"></i>
    </a>
</div>
<div class="home-pro-list">
    <?php foreach($date->products->result as $product) : ?>
    <a class="home-pro-list-item" href="<?php echo maoo_url($date,'product','single',$product->id); ?>">
        <div class="left">
            <div class="img-div" style="background-image:url(<?php echo $product->cover[0]; ?>?imageView2/1/w/380/h/380);"></div>
        </div>
        <div class="right">
            <div class="title"><?php echo $product->title; ?></div>
            <div class="excerpt"><?php echo $product->like; ?>人喜欢</div>
            <div class="price"><?php echo $product->minPrice/100; ?>元起</div>
        </div>
        <div class="clearfix"></div>
    </a>
    <?php endforeach; ?>
</div>
<?php echo maoo_pagenavi($date->products->count,$_GET['page'],$date->pageSizeProduct,$date->siteUrl); ?>
<?php include maoo_temp('footer'); ?>