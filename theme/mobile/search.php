<?php include maoo_temp('header'); ?>
<div class="site-top">
    <a class="left" href="<?php echo $date->siteUrl; ?>">
        <i class="fa fa-angle-left"></i>
    </a>
    <span class="title">搜索</span>
    <a class="right" href="<?php echo $date->siteUrl; ?>?search=1">
        <i class="fa fa-search"></i>
    </a>
</div>
<div class="home-pro-list">
    <div class="home-pro-list-item">
        搜索：“<?php echo $_GET['s']; ?>”
    </div>
</div>
<div class="search-nav">
    <div class="left">
        <a href="<?php echo $date->siteUrl; ?>?s=<?php echo $s; ?>&type=product" class="<?php if($date->searchType=='product') : ?>active<?php endif; ?>">商品</a>
    </div>
    <div class="right">
        <a href="<?php echo $date->siteUrl; ?>?s=<?php echo $s; ?>&type=post" class="<?php if($date->searchType=='post') : ?>active<?php endif; ?>">文章</a>
    </div>
    <div class="clearfix"></div>
</div>
<?php if($date->searchType=='product') : ?>
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
        没有搜索到任何商品
    </div>
    <?php endif; ?>
</div>
<?php echo maoo_pagenavi($date->products->count,$_GET['page'],$date->pageSizePost,$date->siteUrl); ?>
<?php endif; ?>
<?php if($date->searchType=='post') : ?>
<div class="home-pro-list">
    <?php if($date->posts->count>0) : ?>
    <?php foreach($date->posts->result as $post) : ?>
    <a class="home-pro-list-item home-pro-list-item-<?php echo $post->id; ?>" href="<?php echo maoo_url($date,'post','single',$post->id); ?>">
        <?php if($post->cover) : ?>
        <div class="left">
            <div class="img-div" style="background-image:url(<?php echo $post->cover; ?>?imageView2/1/w/380/h/380);"></div>
        </div>
        <?php endif; ?>
        <div class="right" style="<?php if(!$post->cover) : ?>width:100%<?php endif; ?>">
            <div class="title"><?php echo $post->title; ?></div>
            <div class="excerpt">
                <?php if($post->excerpt) : ?>
                <?php echo $post->excerpt; ?>
                <?php else : ?>
                <?php echo maoo_cut_str(strip_tags($post->content),99); ?>
                <?php endif; ?>
            </div>
            <div class="date">
                <?php echo date('Y年m月d日 H:i',$post->date); ?>
            </div>
        </div>
        <div class="clearfix"></div>
    </a>
    <?php endforeach; ?>
    <?php else : ?>
    <div class="home-pro-list-item">
        没有搜索到任何文章
    </div>
    <?php endif; ?>
</div>
<?php echo maoo_pagenavi($date->posts->count,$_GET['page'],$date->pageSizePost,$date->siteUrl); ?>
<?php endif; ?>
<?php include maoo_temp('footer'); ?>