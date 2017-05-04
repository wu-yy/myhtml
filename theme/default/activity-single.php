<?php include maoo_temp('header'); ?>
<div class="breadcrumb-box">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li>
                <a href="<?php echo $date->siteUrl; ?>">首页</a>
            </li>
            <li>
                <a href="<?php echo maoo_url($date,'activity'); ?>">最新动态</a>
            </li>
            <li class="active">动态详情</li>
        </ol>
    </div>
</div>
<div class="activity-home">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-20 col">
                <?php include maoo_temp('activity-left-side'); ?>
            </div>
            <div class="col-md-12 col-60 col">
                <div class="activity-single">
                    <div class="top">
                        <a class="avatar" href="<?php echo maoo_url($date,'user','activity',$date->activity->user->id); ?>">
                            <img src="<?php echo $date->activity->user->avatar; ?>?imageView2/1/w/60/h/60" />
                        </a>
                        <p class="mb-0"><a class="name" href="<?php echo maoo_url($date,'user','activity',$date->activity->user->id); ?>"><?php echo $date->activity->user->displayName; ?></a> 发布于 <span class="date"><?php echo date('Y-m-d H:i:s',$date->activity->date); ?></span></p>
                        <?php if($date->complaint>3) : ?>
                        该用户共被投诉<?php echo $date->complaint; ?>次。
                        <?php else : ?>
                        该用户从未被投诉，信用良好。
                        <?php endif; ?>
                    </div>
                    <div class="type-group-top">
                        <?php
                            if($date->activity->type>1) :
                                include maoo_temp('activity-single-type-'.$date->activity->type);
                            endif;
                        ?>
                    </div>
                    <div class="entry">
                        <?php if($date->activity->title) : ?>
                        <?php if($date->activity->type!=3 && $date->activity->type!=4 && $date->activity->type!=6 && $date->activity->type!=7) : ?>
                        <h1 class="title">
                            <?php echo $date->activity->title; ?>
                        </h1>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php if($date->activity->type!=7 || $date->user->id==$date->activity->user->id || ($date->user && in_array($date->user->id,$date->activity->authorize)) ) : ?>
                        <div class="content">
                            <?php echo $date->activity->content; ?>
                        </div>
                        <?php if(count($date->activity->cover)>0) : ?>
                        <div class="cover-list">
                            <?php foreach($date->activity->cover as $cover) : ?>
                            <div class="cover-list-item">
                                <img src="<?php echo $cover; ?>?imageView2/3/w/498" />
                            </div>
                            <?php endforeach; ?>
                            <div class="clearfix"></div>
                        </div>
                        <?php endif; ?>
                        <?php if($date->user && $date->user->id!=$date->activity->user->id) : ?>
                        <button type="button" class="btn btn-info" id="complaint-btn" data-toggle="modal" data-target="#complaintModal">
                            <i class="fa fa-frown-o"></i> 投诉
                        </button>
                        <div class="modal fade" id="complaintModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title mb-0">投诉</h4>
                                    </div>
                                    <form method="post" action="<?php echo $date->siteUrl; ?>/engine/action/complaint.php">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <select class="form-control" name="type">
                                                    <option>请选择投诉类型...</option>
                                                    <option value="1">色情、毒品、反动等违法信息</option>
                                                    <option value="2">低俗内容或人身攻击</option>
                                                    <option value="3">虚假或诈骗信息</option>
                                                    <option value="4">病毒木马及其他恶意程序</option>
                                                    <option value="5">侵犯知识产权</option>
                                                    <option value="6">其他</option>
                                                </select>
                                            </div>
                                            <textarea rows="5" class="form-control" name="content" placeholder="请在此填写具体投诉内容"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info" data-dismiss="modal">取消</button>
                                            <button type="submit" class="btn btn-default">提交</button>
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $date->activity->id; ?>" />
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div> 
                        <?php endif; ?>
                        <?php else : ?>
                        详细内容已经隐藏
                        <?php endif; ?>
                    </div>
                    <?php if($date->activity->type!=2) : ?>
                    <?php include maoo_temp('activity-comment'); ?>
                    <?php else : ?>
                    <?php include maoo_temp('activity-comment2'); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-12 col-20 col">
                <?php $date->author = $date->activity->user; ?>
                <?php include maoo_temp('activity-side-user'); ?>
                <?php include maoo_temp('activity-right-side'); ?>
            </div>
        </div>
    </div>
</div>
<?php include maoo_temp('footer'); ?>