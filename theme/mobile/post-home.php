<?php include maoo_temp('header'); ?>
<div class="site-top">
    <a class="left" href="<?php echo $date->siteUrl; ?>">
        <i class="fa fa-angle-left"></i>
    </a>
    <span class="title">全部文章</span>
    <a class="right" href="<?php echo $date->siteUrl; ?>?search=1">
        <i class="fa fa-search"></i>
    </a>
</div>
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
<div class="home-pro-list">
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
                <?php echo $post->term->title; ?>
                <span class="point">•</span>
                <?php echo date('Y年m月d日 H:i',$post->date); ?>
            </div>
        </div>
        <div class="clearfix"></div>
    </a>
    <?php endforeach; ?>
</div>
<?php echo maoo_pagenavi($date->posts->count,$_GET['page'],$date->pageSizePost,$date->siteUrl); ?>
<?php include maoo_temp('footer'); ?>