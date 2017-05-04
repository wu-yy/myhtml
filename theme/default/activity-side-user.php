<div class="activity-side">
    <div class="activity-side-item activity-side-item-user">
        <a class="avatar" href="<?php echo maoo_url($date,'user','activity',$date->author->id); ?>">
            <img src="<?php echo $date->author->avatar; ?>?imageView2/1/w/100/h/100" />
        </a>
        <div class="name">
            <?php echo $date->author->displayName; ?>
        </div>
        <div class="count">
            <span>关注 <?php echo $date->author->follow; ?></span>
            <span>粉丝 <?php echo $date->author->fans; ?></span>
        </div>
        <?php echo maoo_follow_btn($date,$date->author->id); ?>
    </div>
</div>
<?php echo maoo_follow_js($date); ?>