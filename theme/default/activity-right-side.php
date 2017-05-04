<div class="activity-side">
    <div class="activity-side-item activity-side-posts">
        <h4 class="title">最新文章</h4>
        <?php foreach($date->custom->activitySidePosts as $post) : $post->id = maoo_toShortKey($post->id); ?>
        <div class="activity-side-posts-item">
            <a href="<?php echo maoo_url($date,'post','single',$post->id); ?>" class="img-div">
                <img src="<?php echo $post->cover; ?>?imageView2/1/w/200/h/150" />
            </a>
            <a class="title" href="<?php echo maoo_url($date,'post','single',$post->id); ?>">
                <?php echo $post->title; ?>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</div>