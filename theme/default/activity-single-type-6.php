<div class="type-group-top-item type-group-top-item-6">
    <?php 
        $allPutCoins = 0;
        foreach($date->activity->guessList as $guessList) :
            $allPutCoins += $guessList->coins;
        endforeach;
    ?>
    <?php 
        $guessLists = array();
        foreach($date->activity->guess as $guess) :
            $num = 0;
            $guessLists[$guess->key]['if'] = $guess->if;
            $guessLists[$guess->key]['odds'] = $guess->odds;
            $guessLists[$guess->key]['list'] = array();
            foreach($date->activity->guessList as $guessList) :
                if($guessList->key==$guess->key) :
                    array_push($guessLists[$guess->key]['list'],$guessList);
                    unset($date->activity->guessList[$num]);
                endif;
                $num++;
            endforeach;
        endforeach;
    ?>
                            <?php if($date->activity->title) : ?>
                            <h1 class="title">
                                <?php echo $date->activity->title; ?>
                            </h1>
                            <?php endif; ?>
                            <ul class="list-unstyled mb-20">
                                <?php foreach($date->activity->guess as $guess) : ?>
                                <li>
                                    <div class="if">
                                        <div class="left">
                                            <?php echo $guess->if; ?>
                                        </div>
                                        <?php if($date->activity->done) : ?>
                                            <?php if($date->activity->done==$guess->key) : ?>
                                            <button type="button" class="btn btn-danger" >
                                                已获胜
                                            </button>
                                            <?php else : ?>
                                            <button type="button" class="btn btn-info" >
                                                已结束
                                            </button>
                                            <?php endif; ?>
                                        <?php elseif($date->user->id==$date->activity->user->id) : ?>
                                        <button type="button" class="btn btn-default btn-guess" data-toggle="modal" data-target="#guessDoneModal" odds-data="<?php echo $guess->odds; ?>" if-data="<?php echo $guess->if; ?>" key-data="<?php echo $guess->key; ?>">
                                            <i class="fa fa-check-circle-o"></i> 获胜
                                        </button>
                                        <?php elseif(($date->activity->date+86400*30)<strtotime("now")) : ?>
                                        <button type="button" class="btn btn-default">
                                            已结束
                                        </button>
                                        <?php elseif($date->user) : ?>
                                        <button type="button" class="btn btn-default btn-guess" data-toggle="modal" data-target="#guessModal" odds-data="<?php echo $guess->odds; ?>" if-data="<?php echo $guess->if; ?>" key-data="<?php echo $guess->key; ?>">
                                            <i class="fa fa-database"></i> 投注
                                        </button>
                                        <?php else : ?>
                                        <a href="<?php echo maoo_url($date,'user','login'); ?>" class="btn btn-default btn-guess">
                                            <i class="fa fa-database"></i> 投注
                                        </a>
                                        <?php endif; ?>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="odds">
                                        1 赔 <?php echo $guess->odds; ?>
                                    </div>
                                    <?php echo count($guessLists[$guess->key]['list']); ?>人已投注
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php if($date->activity->done) : ?>
                            <div class="done">
                                <?php 
                                    $guess2 = $date->activity->guess1-$date->activity->guess2;
                                    if($guess2>0) :
                                        $guess2text = '赢得了'.$guess2.'积分';
                                    elseif($guess2<0) :
                                        $guess2 = $guess2*-1;
                                        $guess2text = '输掉了'.$guess2.'积分';
                                    else :
                                        $guess2text = '不赔不赚';
                                    endif;
                                ?>
                                此竞猜已结束，总投注积分<?php echo $date->activity->guess3; ?>，所有投注人共赢得了<?php echo $date->activity->guess2; ?>积分，竞猜发起人<?php echo $guess2text; ?>。
                            </div>
                            <?php else : ?>
                                <div class="done">
                                    此竞猜正在进行中，总投注积分已达<?php echo $allPutCoins; ?>积分。
                                </div>
                                <?php if($date->user->id==$date->activity->user->id) : ?>
                                <div class="excerpt">
                                    <i class="fa fa-question-circle-o"></i> 确认某个项目为获胜条件，此竞猜将立即结束。此竞猜将在<?php echo date('Y-m-d H:i:s',$date->activity->date+86400*30); ?>结束。
                                </div>
                                <?php else : ?>
                                <div class="excerpt">
                                    <i class="fa fa-question-circle-o"></i> 竞猜成功可按赔率获得积分奖励。此竞猜最长持续到<?php echo date('Y-m-d H:i:s',$date->activity->date+86400*30); ?>。
                                </div>
                                <div class="excerpt">
                                    <i class="fa fa-question-circle-o"></i> 可重复投注同一项目。
                                </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if($date->user->id==$date->activity->user->id) : ?>
                            <div class="modal fade" id="guessDoneModal" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title">
                                                设置<span id="guess-theif2"></span>为获胜条件
                                            </h4>
                                        </div>
                                        <form method="post" action="<?php echo $date->siteUrl; ?>/engine/action/activityType6Done.php">
                                            <div class="modal-body">
                                                确认后将无法更改，所有积分都将立即结算。
                                            </div>
                                            <div class="modal-footer">
                                                <div class="get-coins-excerpt mb-20">
                                                    <i class="fa fa-question-circle-o"></i> 请如实按照竞猜获胜条件设置，如果作弊，将会被追回所有积分，并永久冻结您的账户。
                                                </div>
                                                <button type="button" class="btn btn-info" data-dismiss="modal">取消</button>
                                                <button type="submit" class="btn btn-default">确认投注</button>
                                            </div>
                                            <input type="hidden" name="key" value="" id="guess-key2" />
                                            <input type="hidden" name="id" value="<?php echo $date->activity->id; ?>" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <script>
                                $('.btn-guess').hover(function(){
                                    var theif = $(this).attr('if-data');
                                    var key = $(this).attr('key-data');
                                    $('#guessDoneModal #guess-theif2').text(theif);
                                    $('#guessDoneModal #guess-key2').val(key);
                                });
                            </script>
                            <?php elseif($date->user) : ?>
                            <div class="modal fade" id="guessModal" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title">
                                                投注 <span id="guess-theif"></span>
                                            </h4>
                                        </div>
                                        <form method="post" action="<?php echo $date->siteUrl; ?>/engine/action/activityType6.php">
                                            <div class="modal-body">
                                                <h4>投注积分</h4>
                                                <div class="odds-text">
                                                    1 赔 <span id="guess-odds"></span>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="coins" class="form-control" value="0" onkeyup="value=value.replace(/[^0-9]/g,'')" onpaste="value=value.replace(/[^0-9]/g,'')" oncontextmenu = "value=value.replace(/[^0-9]/g,'')" id="guess-coins" />
                                                </div>
                                                <div class="get-coins">
                                                    当前投注<span id="guess-coins-text">0</span>积分，若获胜可获赔<span id="guess-result" class="text-danger">0</span>积分
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="get-coins-excerpt">
                                                    <i class="fa fa-question-circle-o"></i> 获赔积分 = 投注积分 x 赔率 + 投注积分。
                                                </div>
                                                <div class="get-coins-excerpt">
                                                    <i class="fa fa-question-circle-o"></i> 您现有<?php echo $date->user->coins; ?>积分，最高可投注<span id="guess-max"></span>积分。
                                                </div>
                                                <div class="get-coins-excerpt mb-20">
                                                    <i class="fa fa-question-circle-o"></i> 最高投注积分不能超过您现有积分，且不能超出竞猜发起人的赔付能力。
                                                </div>
                                                <button type="button" class="btn btn-info" data-dismiss="modal">取消</button>
                                                <button type="submit" class="btn btn-default">确认投注</button>
                                            </div>
                                            <input type="hidden" name="key" value="" id="guess-key" />
                                            <input type="hidden" name="id" value="<?php echo $date->activity->id; ?>" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <script>
                                $('.btn-guess').hover(function(){
                                    var theif = $(this).attr('if-data');
                                    var odds = $(this).attr('odds-data');
                                    var key = $(this).attr('key-data');
                                    $('#guessModal #guess-theif').text(theif);
                                    $('#guessModal #guess-odds').text(odds);
                                    $('#guessModal #guess-key').val(key);
                                    var max = <?php echo $date->activity->user->coins; ?>/odds;
                                    if(max><?php echo $date->user->coins; ?>) {
                                        max = <?php echo $date->user->coins; ?>; 
                                    };
                                    max = max.toFixed(0);
                                    $('#guessModal #guess-max').text(max);
                                });
                                $('#guessModal #guess-coins').keyup(function(){
                                    var coins = $(this).val()*1;
                                    $('#guessModal #guess-coins-text').text(coins);
                                    var odds = $('#guessModal #guess-odds').text()*1;
                                    var result = coins*odds+coins;
                                    $('#guessModal #guess-result').text(result);
                                });
                                $('#guessModal #guess-coins').change(function(){
                                    var coins = $(this).val()*1;
                                    $('#guessModal #guess-coins-text').text(coins);
                                    var odds = $('#guessModal #guess-odds').text()*1;
                                    var result = coins*odds+coins;
                                    $('#guessModal #guess-result').text(result);
                                });
                            </script>
                            <?php endif; ?>
                        </div>
<?php if($date->user && in_array($date->user->id, $date->activity->guessUsers)) : ?>
<div class="type-group-top-item type-group-top-item-6">
    <h1 class="title">您已下注</h1>
    <ul class="list-unstyled mb-0">
    <?php foreach($guessLists as $guess) : ?>
    <?php foreach($guess['list'] as $list) : ?>
    <?php if($list->user==$date->user->id) : ?>
        <li><?php echo $guess['if']; ?>，<?php echo $list->coins; ?>积分，获胜可返还<?php $result = $list->coins*$guess['odds']+$list->coins; echo $result; ?>积分。</li>
    <?php endif; ?>
    <?php endforeach; ?>
    <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>