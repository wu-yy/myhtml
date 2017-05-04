<?php include maoo_temp('header'); ?>
<div class="site-top">
    <a class="left" href="<?php echo maoo_url($date,'post','term',$date->post->term->id); ?>">
        <i class="fa fa-angle-left"></i>
    </a>
    <span class="title"><?php echo $date->post->title; ?></span>
    <a class="right" href="<?php echo $date->siteUrl; ?>?search=1">
        <i class="fa fa-search"></i>
    </a>
</div>
<div class="pro-single-entry">
    <h1 class="title">
        <?php echo $date->post->title; ?>
    </h1>
    <div class="info">
        <a href="<?php echo maoo_url($date,'post','term',$date->post->term->id); ?>">
            <?php echo $date->post->term->title; ?>
        </a>
        <span class="point">•</span>
        <span class="date">
            <?php echo date('Y年m月d日 H:i',$date->post->date); ?>
        </span>
    </div>
    <div class="content">
        <?php echo $date->post->content; ?>
    </div>
    <?php if(count($date->post->tags)>0) : ?>
    <div class="tags">
        <i class="fa fa-tags"></i>
        <?php foreach($date->post->tags as $tag) : ?>
        <a href="<?php echo maoo_url($date,'post','tag',array('tag'=>$tag)); ?>"><?php echo $tag; ?></a> 
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>
<div class="post-comment">
    <div class="comment" id="comment">
        <?php if($date->user) : ?>
        <form method="post" action="<?php echo $date->siteUrl; ?>/engine/action/postComment.php" class="comment-form">
            <input type="hidden" name="id" value="<?php echo $date->post->id; ?>" />
            <div class="list">
                <div class="list-item">
                    评论 （<?php echo $date->comments->count; ?>）
                </div>
                <div class="list-item">
                    <textarea style="width:100%" rows="5" name="content" placeholder="说点什么吧~"></textarea>
                    <div class="clearfix"></div>
                </div>
            </div>
            <button type="submit" class="button">提交</button>
        </form>
        <?php else : ?>
        <div class="comment-form">
            <div class="list">
                <div class="list-item">
                    评论 （<?php echo $date->comments->count; ?>）
                </div>
                <div class="list-item">
                    <textarea style="width:100%;color:#a1a1a1;" rows="5" placeholder="说点什么吧~" disabled></textarea>
                    <div class="clearfix"></div>
                </div>
            </div>
            <a href="<?php echo maoo_url($date,'user','login'); ?>" class="button-close">请在登录后发表评论</a>
        </div>
        <?php endif; ?>
        <?php if($date->comments->count>0) : ?>
        <div class="comment-list">
            <?php foreach($date->comments->result as $comment) : ?>
            <div class="comment-list-item">
                <a class="img-div" href="<?php echo maoo_url($date,'user','index',$comment->user->id); ?>">
                    <img class="media-object" src="<?php echo $comment->user->avatar; ?>?imageView2/1/w/40/h/40" alt="<?php echo $comment->user->displayName; ?>">
                </a>
                <div class="comment-body">
                        <h4 class="media-heading">
                            <a href="<?php echo maoo_url($date,'user','index',$comment->user->id); ?>"><?php echo $comment->user->displayName; ?></a>
                        </h4>
                        <div class="content">
                            <?php echo $comment->content; ?>
                            <?php if($comment->coins>0) : ?>
                            <div class="coins">
                                此评论被评为优质评论，获得<?php echo $comment->coins; ?>积分奖励。
                            </div>
                            <?php endif; ?>
                            <div class="date"><?php echo date('Y-m-d H:i',$comment->date); ?></div>
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
                        <a href="#" class="commentReplyBtn" comment-data="<?php echo $comment->id; ?>">
                            <i class="fa fa-mail-reply"></i> 回复
                        </a>
                        <?php endif; ?>
                    </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php if($date->user) : ?>
        <div class="modal fade" id="commentReplyModal">
            <form method="post" action="<?php echo $date->siteUrl; ?>/engine/action/postComment.php">
                <div class="list">
                    <div class="list-item">
                        回复评论：
                    </div>
                    <div class="list-item">
                        <textarea style="width:100%" rows="5" name="content" placeholder="请输入回复内容"></textarea>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <button type="submit" class="button" style="margin-bottom:1rem">提交</button>
                <button type="button" class="button-close">取消</button>
                <input type="hidden" name="id" value="<?php echo $date->post->id; ?>" />
                <input type="hidden" id="commentReplyParent" name="parent" value="" />
            </form>   
        </div>
        <script>
            $('.commentReplyBtn').hover(function(){
                var id = $(this).attr('comment-data');
                $('#commentReplyParent').val(id);
            });
            $('.commentReplyBtn').click(function(){
                $('#commentReplyModal').css('display','block');
            });
            $('#commentReplyModal .button-close').click(function(){
                $('#commentReplyModal').css('display','none');
            });
        </script>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php include maoo_temp('footer'); ?>