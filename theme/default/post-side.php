<div class="post-side">
    <div class="post-side-item">
        <h4 class="title">
            热门文章
        </h4>
        <ul class="media-list side-post-list">
            <?php foreach($date->custom->postSidePosts as $post) : ?>
            <li class="media side-post-list-item">
                <?php if($post->cover) : ?>
                <div class="media-left">
                    <a class="img-div" href="<?php echo maoo_url($date,'post','single',maoo_toShortKey($post->id)); ?>">
                        <img class="media-object" src="<?php echo $post->cover; ?>?imageView2/1/w/60/h/60" alt="<?php echo $post->title; ?>">
                    </a>
                </div>
                <?php endif; ?>
                <div class="media-body">
                    <h4 class="media-heading">
                        <a href="<?php echo maoo_url($date,'post','single',maoo_toShortKey($post->id)); ?>"><?php echo $post->title; ?></a>
                    </h4>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="post-side-item">
        <h4 class="title">
            最新评论
        </h4>
        <div class="media-list side-comment-list">
            <?php foreach($date->custom->postSideComments as $comment) : ?>
            <a class="media side-comment-list-item" href="<?php echo maoo_url($date,'post','single',maoo_toShortKey($comment->in)); ?>#comment-<?php echo maoo_toShortKey($comment->id); ?>">
                <div class="media-left">
                    <div class="img-div">
                        <img class="media-object" src="<?php echo $comment->user->avatar; ?>?imageView2/1/w/40/h/40" alt="<?php echo $comment->user->displayName; ?>">
                    </div>
                </div>
                <div class="media-body">
                    <h4 class="media-heading">
                        <?php echo $comment->user->displayName; ?>
                    </h4>
                    <div class="content">
                        <?php echo $comment->content; ?>
                    </div>
                    <div class="date">
                        <?php echo date('Y-m-d H:i',$comment->date); ?>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>