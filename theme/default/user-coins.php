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
                    积分记录
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
                                    积分记录 
                                    <small>当前共有<?php echo $date->user->coins; ?>积分</small>
                                </h2>
                                <div class="user-coins">
                                    <?php if(count($date->coinsHistory)>0) : ?>
                                    <ul class="list-unstyled">
                                        <?php 
                                            foreach($date->coinsHistory as $coinsHistory) :
                                                $changeText = '增加';
                                                $changeClass = 'plus';
                                                if($coinsHistory->change<0) :
                                                    $changeText = '减少';
                                                    $coinsHistory->change = $coinsHistory->change*-1;
                                                    $changeClass = 'minus';
                                                endif;
                                        ?>
                                        <li>
                                            于<?php echo $coinsHistory->date ?>因“<span class="text"><?php echo $coinsHistory->text ?></span>”，<span class="type <?php echo $changeClass ?>"><?php echo $changeText ?></span>积分<span class="change"><?php echo $coinsHistory->change ?></span>，当前积分<?php echo $coinsHistory->now ?>。
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include maoo_temp('footer'); ?>