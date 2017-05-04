<div class="type-group-top-item type-group-top-item-7">
    <?php if($date->activity->title) : ?>
    <h1 class="title">
        <?php echo $date->activity->title; ?>
    </h1>
    <?php endif; ?>
    <div class="excerpt mb-20">
        <?php echo $date->activity->excerpt; ?>
    </div>
    <p>已有<?php echo count($date->activity->authorize); ?>个用户购买此内容。</p>
    <?php if($date->user->id==$date->activity->user->id) : ?>
    除您以外的其他用户，需要支付<span class="text-danger"><?php echo $date->activity->coins; ?></span>积分才可以浏览详细内容。
    <?php elseif($date->user && in_array($date->user->id,$date->activity->authorize)) : ?>
    您已成功支付，可以阅读全部隐藏内容。
    <?php else : ?>
    <p>您需要支付<span class="text-danger"><?php echo $date->activity->coins; ?></span>积分才可以浏览详细内容。</p>
    <a href="<?php echo $date->siteUrl; ?>/engine/action/activityType7.php?id=<?php echo $date->activity->id; ?>" class="btn btn-default">
        <i class="fa fa-certificate"></i> 支付积分
    </a>
    <?php endif; ?>
</div>