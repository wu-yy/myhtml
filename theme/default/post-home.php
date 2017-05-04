<?php include maoo_temp('header'); ?>
<div class="container post-home">
    <?php if(count($date->indexRecommends)>0) : ?>
    <div class="post-home-slider">
        <div id="carousel-post-home-generic" class="carousel slide" data-ride="carousel">
            <?php if(count($date->indexRecommends)>1) : ?>
            <ol class="carousel-indicators">
                <?php $num=0; foreach($date->indexRecommends as $slider) : ?>
                <li data-target="#carousel-post-home-generic" data-slide-to="<?php echo $num; ?>" class="<?php if($num==0) echo 'active'; ?>"></li>
                <?php $num++; endforeach; ?>
            </ol>
            <?php endif; ?>
            <div class="carousel-inner" role="listbox">
                <?php $num=0; foreach($date->indexRecommends as $slider) : ?>
                <a class="item <?php if($num==0) echo 'active'; ?>" href="<?php echo $slider->url; ?>" style="background-image:url(<?php echo $slider->img; ?>?imageView2/1/w/1226/h/260);">
                    <div class="carousel-caption"><?php echo $slider->text; ?></div>
                </a>
                <?php $num++; endforeach; ?>
            </div>
            <?php if(count($date->indexRecommends)>1) : ?>
            <a class="left carousel-control" href="#carousel-post-home-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="right carousel-control" href="#carousel-post-home-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </a>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-xs-8 col">
            <div class="post-list">
                <h4 class="title">
                    <span>最新文章</span>
                </h4>
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
                            <?php if($post->excerpt) : echo $post->excerpt; else : echo maoo_cut_str(strip_tags($post->content),99); endif; ?>
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
</div>
<?php include maoo_temp('footer'); ?>