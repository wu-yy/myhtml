<?php include maoo_temp('header'); ?>
<div class="site-top">
    <a class="left" href="<?php echo maoo_url($date,'user'); ?>">
        <i class="fa fa-angle-left"></i>
    </a>
    发表的评论
    <a class="right" href="<?php echo $date->siteUrl; ?>?search=1">
        <i class="fa fa-search"></i>
    </a>
</div>
<div class="home-pro-list">
    <h4 class="title">
        <a href="javascript:;">
            当前共有<?php echo $date->comments->count; ?>评论
        </a>
    </h4>
    <div class="clearfix"></div>
    <?php foreach($date->comments->result as $comment) : ?>
    <div class="home-pro-list-item home-pro-list-item-<?php echo $num; ?>">
        <?php echo $comment->content; ?>
        <div class="info">
            <a href="<?php echo maoo_url($date,'post','single',$comment->in); ?>"><?php echo $comment->post->title; ?></a>
            <span class="point">•</span>
            <span class="date">
                <?php echo date('Y年m月d日 H:i',$comment->date); ?>
            </span>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php echo maoo_pagenavi($date->comments->count,$_GET['page'],$date->pageSizePost,$date->siteUrl); ?>
<?php include maoo_temp('footer'); ?>