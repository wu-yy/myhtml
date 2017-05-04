<div class="type-group-top-item type-group-top-item-4">
                            <?php if($date->activity->title) : ?>
                            <h1 class="title">
                                <?php echo $date->activity->title; ?>
                            </h1>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-xs-8 col">
                                    <ul class="list-unstyled mb-20">
                                        <?php if($date->activity->number>0) : ?>
                                        <li>
                                            <div class="left">总名额</div> 
                                            <div class="right">
                                                <?php echo $date->activity->number; ?> 人
                                            </div>
                                        </li>
                                        <?php endif; ?>
                                        <?php if($date->activity->number2>0) : ?>
                                        <li>
                                            <div class="left">最低要求</div> 
                                            <div class="right">
                                                <?php echo $date->activity->number2; ?> 人
                                            </div>
                                        </li>
                                        <?php endif; ?>
                                        <li>
                                            <div class="left">已报名</div> 
                                            <div class="right">
                                                1 人
                                            </div>
                                        </li>
                                        <?php if($date->activity->number>0) : ?>
                                        <li>
                                            <div class="left">剩余名额</div> 
                                            <div class="right price">
                                                49 <small>人</small>
                                            </div>
                                        </li>
                                        <?php endif; ?>
                                        <?php if($date->activity->price>0) : ?>
                                        <li>
                                            <div class="left">报名费用</div> 
                                            <div class="right price">
                                                <?php echo $date->activity->price/100; ?> <small>元</small>
                                            </div>
                                        </li>
                                        <?php endif; ?>
                                        <li>
                                            <div class="left">报名截止时间</div> 
                                            <div class="right">
                                                <?php echo date('Y年m月d日',$date->activity->date+86400*$date->activity->day); ?>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="excerpt">
                                        <i class="fa fa-question-circle-o"></i> 此活动将于<?php echo date('Y年m月d日 H:i:s',$date->activity->date+86400*$date->activity->day); ?>停止报名。
                                    </div>
                                    <?php if($date->activity->number2>0 && $date->activity->price>0) : ?>
                                    <div class="excerpt">
                                        <i class="fa fa-question-circle-o"></i> 若超过报名截止时间仍未达到最低名额要求，报名费用会自动退还到您的账户。
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-xs-4 col">
                                    <button type="button" class="btn btn-success btn-block">
                                        <i class="fa fa-compass"></i> 立即报名
                                    </button>
                                </div>
                            </div>
                        </div>