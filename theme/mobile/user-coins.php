<?php include maoo_temp('header'); ?>
<div class="site-top">
    <a class="left" href="<?php echo maoo_url($date,'user'); ?>">
        <i class="fa fa-angle-left"></i>
    </a>
    积分记录
    <a class="right" href="<?php echo $date->siteUrl; ?>?search=1">
        <i class="fa fa-search"></i>
    </a>
</div>
<div class="home-pro-list">
    <h4 class="title">
        <a href="javascript:;">
            当前共有<?php echo $date->user->coins; ?>积分
        </a>
    </h4>
    <div class="clearfix"></div>
    <?php 
        $num = 0;
        foreach($date->coinsHistory as $coinsHistory) :
            $changeText = '增加';
            $changeClass = 'plus';
            if($coinsHistory->change<0) :
                $changeText = '减少';
                $coinsHistory->change = $coinsHistory->change*-1;
                $changeClass = 'minus';
            endif;
            $num++;
    ?>
    <div class="home-pro-list-item home-pro-list-item-<?php echo $num; ?>">
        于<?php echo $coinsHistory->date ?>因“<span class="text"><?php echo $coinsHistory->text ?></span>”，<span class="type <?php echo $changeClass ?>"><?php echo $changeText ?></span>积分<span class="change"><?php echo $coinsHistory->change ?></span>，当前积分<?php echo $coinsHistory->now ?>。
    </div>
    <?php endforeach; ?>
</div>
<?php include maoo_temp('footer'); ?>