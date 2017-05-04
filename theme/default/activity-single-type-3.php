<div class="type-group-top-item type-group-top-item-3">
                            <?php if($date->activity->title) : ?>
                            <h1 class="title">
                                <?php echo $date->activity->title; ?>
                            </h1>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-xs-8 col">
                                    <ul class="list-unstyled mb-20">
                                        <li>
                                            <div class="left">价格</div> 
                                            <div class="right price">
                                                <?php echo $date->activity->price/100; ?> <small>元</small>
                                            </div>
                                        </li>
                                        <?php if($date->activity->number>0) : ?>
                                        <li>
                                            <div class="left">剩余数量</div> 
                                            <div class="right">
                                                <?php echo $date->activity->number; ?>
                                            </div>
                                        </li>
                                        <?php endif; ?>
                                        <li>
                                            <div class="left">已出售</div> 
                                            <div class="right">
                                                <?php echo $date->activity->sales; ?>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">承诺发货时间</div> 
                                            <div class="right">
                                                <?php echo $date->activity->day; ?>天
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="excerpt">
                                        <i class="fa fa-question-circle-o"></i> 卖家必须必须在承诺发货时间内发货，若超过承诺发货时间仍未发货，则会全额退款至您的账户。
                                    </div>
                                </div>
                                <div class="col-xs-4 col">
                                    <?php if($date->activity->number>0 && $date->activity->sales>=$date->activity->number) : ?>
                                    <button type="button" class="btn btn-danger btn-block">
                                        已售完
                                    </button>
                                    <?php elseif(!$date->user) : ?>
                                    <a class="btn btn-danger btn-block" href="<?php echo maoo_url($date,'user','login'); ?>">
                                        <i class="fa fa-gift"></i> 立即购买
                                    </a>
                                    <?php else : ?>
                                    <button type="buttom" class="btn btn-danger btn-block" data-toggle="modal" data-target="#activityBuyModal">
                                        <i class="fa fa-gift"></i> 立即购买
                                    </button>
                                    <div class="modal fade" id="activityBuyModal" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title">选择支付方式</h4>
                                                </div>
                                                <form method="post" action="<?php echo $date->siteUrl; ?>/engine/action/activityType3.php">
                                                    <div class="modal-body">
                                                        <label class="active">
                                                            账户余额
                                                            <input type="radio" name="type" value="1" checked />
                                                        </label>
                                                        <label>
                                                            支付宝
                                                            <input type="radio" name="type" value="2" />
                                                        </label>
                                                        <div class="clearfix"></div>
                                                        您的账户余额为<?php echo $date->user->cash; ?>元。
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-info" data-dismiss="modal">取消</button>
                                                        <button type="button" class="btn btn-default">立即付款</button>
                                                    </div>
                                                    <input type="hidden" name="id" value="<?php echo $date->activity->id; ?>" />
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        $('#activityBuyModal label').click(function(){
                                            $('#activityBuyModal label').removeClass('active');
                                            $(this).addClass('active');
                                        });        
                                    </script>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>