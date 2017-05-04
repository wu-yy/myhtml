                        <div class="type-group-top-item type-group-top-item-2">
                            <?php if($date->activity->bestAnswer) : ?>
                            问题已关闭
                            <?php else : ?>
                            <?php if($date->activity->coins>0) : ?>
                            <p>回答此问题，如果您的答案被采纳，可以获得<span class="text-danger"><?php echo $date->activity->coins; ?></span>积分奖励。</p>
                            <?php else : ?>
                            <p>此问题没有设置悬赏积分，回答<span class="text-danger">不会</span>获得积分奖励。</p>
                            <?php endif; ?>
                            此问题将在<?php echo date('Y-m-d H:i:s',$date->activity->date+86400*7); ?>关闭。
                            <?php endif; ?>
                        </div>