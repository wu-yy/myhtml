<?php include maoo_temp('header'); ?>
<div class="breadcrumb-box">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li>
                <a href="<?php echo $date->siteUrl; ?>">首页</a>
            </li>
            <li>
                <a href="<?php echo maoo_url($date,'user'); ?>">
                    用户中心
                </a>
            </li>
            <li class="active">
                与我相关的动态
            </li>
        </ol>
    </div>
</div>
<div class="activity-home">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-20 col">
                <?php if($date->user && $date->user->id==$date->author->id) : ?>
                <div class="user-side activity-user-side-nav mb-20">
                    <dl class="mb-0">
                        <dt>与我相关</dt>
                        <dd>
                            <a <?php if($date->for=='my') : ?>class="active"<?php endif; ?> href="<?php echo maoo_url($date,'user','activity',array('id'=>$date->author->id,'for'=>'my')); ?>">我的动态</a>
                        </dd>
                        <dd>
                            <a <?php if($date->for=='follow') : ?>class="active"<?php endif; ?> href="<?php echo maoo_url($date,'user','activity',array('id'=>$date->author->id,'for'=>'follow')); ?>">关注的动态</a>
                        </dd>
                        <dd>
                            <a <?php if($date->for=='answer') : ?>class="active"<?php endif; ?> href="<?php echo maoo_url($date,'user','activity',array('id'=>$date->author->id,'for'=>'answer')); ?>">回答的提问</a>
                        </dd>
                        <dd>
                            <a <?php if($date->for=='guess') : ?>class="active"<?php endif; ?> href="<?php echo maoo_url($date,'user','activity',array('id'=>$date->author->id,'for'=>'guess')); ?>">投注的竞猜</a>
                        </dd>
                        <dd>
                            <a <?php if($date->for=='read') : ?>class="active"<?php endif; ?> href="<?php echo maoo_url($date,'user','activity',array('id'=>$date->author->id,'for'=>'read')); ?>">支付的有偿阅读</a>
                        </dd>
                    </dl>
                </div>
                <?php endif; ?>
                <?php include maoo_temp('activity-left-side'); ?>
            </div>
            <div class="col-md-12 col-60 col">
                <?php if(!$date->user || $date->user->id==$date->author->id) : ?>
                <?php include maoo_temp('activity-quickPublish'); ?>
                <?php endif; ?>
                <?php if($date->for=='my' || $date->for=='follow') : ?>
                <div class="activity-nav">
                    <a class="activity-nav-item <?php if($date->type==0) echo 'active'; ?>" href="<?php echo maoo_url($date,'user','activity',array('type'=>0,'id'=>$_GET['id'])); ?>">
                        全部
                    </a>
                    <a class="activity-nav-item <?php if($date->type==1) echo 'active'; ?>" href="<?php echo maoo_url($date,'user','activity',array('type'=>1,'id'=>$_GET['id'])); ?>">
                        普通
                    </a>
                    <a class="activity-nav-item <?php if($date->type==2) echo 'active'; ?>" href="<?php echo maoo_url($date,'user','activity',array('type'=>2,'id'=>$_GET['id'])); ?>">
                        提问
                    </a>
                    <a class="activity-nav-item <?php if($date->type==6) echo 'active'; ?>" href="<?php echo maoo_url($date,'user','activity',array('type'=>6,'id'=>$_GET['id'])); ?>">
                        竞猜
                    </a>
                    <a class="activity-nav-item <?php if($date->type==7) echo 'active'; ?>" href="<?php echo maoo_url($date,'user','activity',array('type'=>7,'id'=>$_GET['id'])); ?>">
                        有偿阅读
                    </a>
                </div>
                <?php endif; ?>
                <?php if($date->activitys->count>0) : ?>
                <div class="activity-list">
                    <?php foreach($date->activitys->result as $activity) : ?>
                    <div class="activity-list-item">
                        <?php if($activity->type>1) : ?>
                        <span class="type type-<?php echo $activity->type; ?>">
                            <?php if($activity->type==2) : ?>
                            提问
                            <?php elseif($activity->type==3) : ?>
                            商品
                            <?php elseif($activity->type==4) : ?>
                            活动
                            <?php elseif($activity->type==5) : ?>
                            任务
                            <?php elseif($activity->type==6) : ?>
                            竞猜
                            <?php elseif($activity->type==7) : ?>
                            有偿阅读
                            <?php endif; ?>
                        </span>
                        <?php endif; ?>
                        <a class="avatar" href="<?php echo maoo_url($date,'user','activity',$activity->user->id); ?>">
                            <img src="<?php echo $activity->user->avatar; ?>?imageView2/1/w/60/h/60" />
                        </a>
                        <div class="right">
                            <?php if($activity->title) : ?>
                            <a class="title" href="<?php echo maoo_url($date,'activity','single',$activity->id); ?>">
                                <?php echo $activity->title; ?>
                            </a>
                            <?php endif; ?>
                            <div class="top">
                                <a class="name" href="<?php echo maoo_url($date,'user','activity',$activity->user->id); ?>"><?php echo $activity->user->displayName; ?></a> 发布于 <span class="date"><?php echo date('Y-m-d H:i:s',$activity->date); ?></span>
                            </div>
                            <a class="content" href="<?php echo maoo_url($date,'activity','single',$activity->id); ?>">
                                <?php echo $activity->content; ?>
                            </a>
                            <?php if(count($activity->cover)>0) : ?>
                            <div class="cover-list">
                                <?php foreach($activity->cover as $cover) : ?>
                                <div class="cover-list-item" data-toggle="modal" data-target="#coverModal">
                                    <img src="<?php echo $cover; ?>?imageView2/1/w/100/h/100" src-data="<?php echo $cover; ?>" />
                                </div>
                                <?php endforeach; ?>
                                <div class="clearfix"></div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php echo maoo_pagenavi($date->activitys->count,$_GET['page'],$date->pageSizeActivity,$date->siteUrl); ?>
                <?php else : ?>
                <div class="nothing">没有找到符合条件的动态</div>
                <?php endif; ?>
            </div>
            <div class="col-md-12 col-20 col">
                <?php include maoo_temp('activity-side-user'); ?>
                <?php include maoo_temp('activity-right-side'); ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="coverModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
                </button>
				<h4 class="modal-title">查看图片</h4>
            </div>
			<div class="modal-body text-center">
                <img src="" />
            </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info btn-block" data-dismiss="modal">我看完了</button>
            </div>
		</div>
	</div>
</div>
<script>
    $('.cover-list-item').hover(function(){
        var img = $('img',this).attr('src-data');
        $('#coverModal img').attr('src',img);
    });
</script>
<?php include maoo_temp('footer'); ?>