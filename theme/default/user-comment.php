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
                    发表的评论
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
                                    发表的评论
                                </h2>
                                <div class="user-postComment">
                                    <?php if($date->comments->count>0) : ?>
                                    <ul class="list-unstyled">
                                        <?php foreach($date->comments->result as $comment) : ?>
                                        <li class="user-postComment-list-item">
                                            <div class="content">
                                                <?php echo $comment->content; ?>
                                            </div>
                                            <div class="info">
                                                <a href="<?php echo maoo_url($date,'post','single',$comment->in); ?>"><?php echo $comment->post->title; ?></a>
                                                <span class="point">•</span>
                                                <span class="date">
                                                    <?php echo date('Y年m月d日 H:i',$comment->date); ?>
                                                </span>
                                            </div>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php endif; ?>
                                </div>
                                <?php echo maoo_pagenavi($date->comments->count,$_GET['page'],$date->pageSizePost,$date->siteUrl); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include maoo_temp('footer'); ?>