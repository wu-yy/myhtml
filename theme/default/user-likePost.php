<?php include maoo_temp('header'); ?>
    <div class="breadcrumb-box">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li>
                    <a href="<?php echo $date->siteUrl; ?>">
                        首页
                    </a>
                </li>
                <li>
                    <a href="<?php echo maoo_url($date,'user'); ?>">
                        用户中心
                    </a>
                </li>
                <li class="active">
                    喜欢的文章
                </li>
            </ol>
        </div>
    </div>
    <div class="user-center">
        <div class="container">
            <div class="row">
                <?php include maoo_temp('user-side'); ?>
                <div class="col-md-12 col-80 col">
                    <div class="user-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h2 class="title">
                                    喜欢的文章
                                </h2>
                                <div class="user-like">
                                    <?php if($date->posts->count>0) : ?>
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
                                    <?php else : ?>
                                    <div class="nolike">
                                        您暂未收藏任何商品。
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <?php echo maoo_pagenavi($date->posts->count,$_GET['page'],$date->pageSizePost,$date->siteUrl); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include maoo_temp('footer'); ?>