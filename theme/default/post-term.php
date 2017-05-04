<?php include maoo_temp('header'); ?>
<div class="breadcrumb-box">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li>
                <a href="<?php echo $date->siteUrl; ?>">首页</a></li>
            <li>
                <a href="<?php echo maoo_url($date,'post'); ?>">全部文章</a>
            </li>
            <li class="active"><?php echo $date->term->title; ?></li>
        </ol>
    </div>
</div>
<div class="container post-home post-term">
    <h4 class="title">
        <span>
            <?php echo $date->term->title; ?>
        </span>
    </h4>
    <div class="well">
        <?php echo $date->term->excerpt; ?>
    </div>
    <div class="row">
        <div class="col-xs-8 col">
            <div class="post-list">
                <?php foreach($date->posts->result as $post) : ?>
                <div class="post-list-item">
                    <?php if($post->cover) : ?>
                    <a class="left" href="<?php echo maoo_url($date,'post','single',$post->id); ?>">
                        <img src="<?php echo $post->cover; ?>?imageView2/1/w/200/h/150" />
                    </a>
                    <?php endif; ?>
                    <div class="right <?php if($post->cover) : ?>haveCover<?php endif; ?>">
                        <h4 class="title">
                            <a href="<?php echo maoo_url($date,'post','single',$post->id); ?>">
                                <?php echo $post->title; ?>
                            </a>
                        </h4>
                        <div class="info">
                            <a href="<?php echo maoo_url($date,'post','term',$post->term->id); ?>"><?php echo $post->term->title; ?></a>
                            <span class="point">•</span>
                            <span class="date">
                                <?php echo date('Y年m月d日 H:i',$post->date); ?>
                            </span>
                            <div class="comment">
                                <i class="fa fa-comment-o"></i> <?php echo $post->comment; ?>
                            </div>
                        </div>
                        <div class="excerpt">
                            <?php if($post->excerpt) : ?>
                            <?php echo $post->excerpt; ?>
                            <?php else : ?>
                            <?php echo maoo_cut_str(strip_tags($post->content),99); ?>
                            <?php endif; ?>
                        </div>
                        <?php if($post->tags) : ?>
                        <div class="tags">
                            <i class="fa fa-tags"></i>
                            <?php foreach($post->tags as $tag) : ?>
                            <a href="<?php echo maoo_url($date,'post','tag',array('tag'=>$tag)); ?>">
                                <?php echo $tag; ?>
                            </a>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php echo maoo_pagenavi($date->posts->count,$_GET['page'],$date->pageSizePost,$date->siteUrl); ?>
        </div>
        <div class="col-xs-4 col">
            <?php include maoo_temp('post-side'); ?>
        </div>
    </div>
    <!--div class="well">
        <?php print_r($date); ?>
    </div-->
</div>
<?php include maoo_temp('footer'); ?>