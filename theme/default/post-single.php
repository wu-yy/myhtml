<?php include maoo_temp('header'); ?>
<div class="breadcrumb-box">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li>
                <a href="<?php echo $date->siteUrl; ?>">首页</a></li>
            <li>
                <a href="<?php echo maoo_url($date,'post'); ?>">全部文章</a>
            </li>
            <li>
                <a href="<?php echo maoo_url($date,'post','term',$date->post->term->id); ?>">
                    <?php echo $date->post->term->title; ?>
                </a>
            </li>
            <li class="active"><?php echo $date->post->title; ?></li>
        </ol>
    </div>
</div>
<div class="container post-content">
    <div class="row">
        <div class="col-xs-8 col">
            <div class="post-entry">
                <h1 class="title"><?php echo $date->post->title; ?></h1>
                <div class="info">
                    <a href="<?php echo maoo_url($date,'post','term',$date->post->term->id); ?>">
                        <?php echo $date->post->term->title; ?>
                    </a>
                    <span class="point">•</span>
                    <span class="date">
                        <?php echo date('Y年m月d日 H:i',$date->post->date); ?>
                    </span>
                    <div class="like">
                        <?php echo maoo_like_post_btn($date,$date->post->id); ?>
                    </div>
                </div>
                <div class="entry"><?php echo $date->post->content; ?></div>
                <div class="tags">
                    <i class="fa fa-tags"></i>
                    <?php foreach($date->post->tags as $tag) : ?>
                    <a href="<?php echo maoo_url($date,'post','tag',array('tag'=>$tag)); ?>"><?php echo $tag; ?></a> 
                    <?php endforeach; ?>
                </div>
                <div class="comment" id="comment">
                    <h4 class="title">
                        评论 （<?php echo $date->comments->count; ?>）
                    </h4>
                    <?php if($date->user) : ?>
                    <form method="post" action="<?php echo $date->siteUrl; ?>/engine/action/postComment.php" class="comment-form">
                        <input type="hidden" name="id" value="<?php echo $date->post->id; ?>" />
                        <div class="form-group">
                            <textarea rows="5" class="form-control" name="content" placeholder="说点什么吧~"></textarea>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-default">提交</button>
                        </div>
                    </form>
                    <?php else : ?>
                    <div class="comment-form">
                        <div class="form-group">
                            <textarea rows="5" class="form-control" name="content" placeholder="说点什么吧~" disabled></textarea>
                        </div>
                        <div class="text-right">
                            <a href="<?php echo maoo_url($date,'user','login'); ?>" class="btn btn-default">请在登录后发表评论</a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if($date->comments->count>0) : ?>
                    <div class="comment-list">
                        <?php foreach($date->comments->result as $comment) : ?>
                        <div class="comment-list-item">
                            <div class="media">
                                <div class="media-left">
                                    <a class="img-div" href="<?php echo maoo_url($date,'user','index',$comment->user->id); ?>">
                                        <img class="media-object" src="<?php echo $comment->user->avatar; ?>?imageView2/1/w/40/h/40" alt="<?php echo $comment->user->displayName; ?>">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="<?php echo maoo_url($date,'user','index',$comment->user->id); ?>"><?php echo $comment->user->displayName; ?></a>
                                        <span><?php echo date('Y-m-d H:i',$comment->date); ?></span>
                                    </h4>
                                    <div class="content">
                                        <?php echo $comment->content; ?>
                                        <?php if($comment->coins>0) : ?>
                                        <div class="coins">
                                            此评论被评为优质评论，获得<?php echo $comment->coins; ?>积分奖励。
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php if(count($comment->childs)>0) : ?>
                                    <div class="childs">
                                        <ul class="list-unstyled">
                                        <?php foreach($comment->childs as $childs) : ?>
                                        <li>
                                            <a href="<?php echo maoo_url($date,'user','index',$childs->user->id); ?>"><?php echo $childs->user->displayName; ?></a> : <?php echo $childs->content; ?>
                                            <?php if($date->user) : ?>
                                            <a href="#" class="commentReplyBtn" comment-data="<?php echo $childs->id; ?>" id="commentReply<?php echo $childs->id; ?>" data-toggle="modal" data-target="#commentReplyModal">回复</a>
                                            <?php endif; ?>
                                            <?php if($childs->coins>0) : ?>
                                            <div class="coins">
                                                此评论被评为优质评论，获得<?php echo $childs->coins; ?>积分奖励。
                                            </div>
                                            <?php endif; ?>
                                            <?php if(count($childs->childs)>0) : ?>
                                            <div class="childs-childs ml-10">
                                                <ul class="list-unstyled">
                                                <?php foreach($childs->childs as $childs2) : ?>
                                                <li>
                                                    <a href="<?php echo maoo_url($date,'user','index',$childs2->user->id); ?>"><?php echo $childs2->user->displayName; ?></a> : <?php echo $childs2->content; ?>
                                                    <?php if($childs2->coins>0) : ?>
                                                    <div class="coins">
                                                        此评论被评为优质评论，获得<?php echo $childs2->coins; ?>积分奖励。
                                                    </div>
                                                    <?php endif; ?>
                                                </li>
                                                <?php endforeach; ?>
                                                </ul>
                                            </div>
                                            <?php endif; ?>
                                        </li>
                                        <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($date->user) : ?>
                                    <a href="#" class="commentReplyBtn" comment-data="<?php echo $comment->id; ?>" id="commentReply<?php echo $comment->id; ?>" data-toggle="modal" data-target="#commentReplyModal">
                                        <i class="fa fa-mail-reply"></i> 回复
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php if($date->user) : ?>
                    <div class="modal fade" id="commentReplyModal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title">回复评论：</h4>
                                </div>
                                <form method="post" action="<?php echo $date->siteUrl; ?>/engine/action/postComment.php">
                                    <input type="hidden" name="id" value="<?php echo $date->post->id; ?>" />
                                    <input type="hidden" id="commentReplyParent" name="parent" value="" />
                                    <div class="modal-body">
                                        <textarea rows="3" name="content" class="form-control" placeholder="请输入回复内容"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-dismiss="modal">取消</button>
                                        <button type="submit" class="btn btn-default">提交</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <script>
                        $('.commentReplyBtn').hover(function(){
                            var id = $(this).attr('comment-data');
                            $('#commentReplyParent').val(id);
                        });
                    </script>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-xs-4 col">
            <?php include maoo_temp('post-side'); ?>
        </div>
    </div>
</div>
<?php echo maoo_like_post_js($date); ?>
<?php include maoo_temp('footer'); ?>