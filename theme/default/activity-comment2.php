<?php if($date->activity->bestAnswer) : ?>
<div class="comment mb-10">
<?php 
        foreach($date->answers->result as $comment) :
            if($comment->user->id==$date->activity->bestAnswer->user) :
                $date->activity->bestAnswer->user = $comment->user;
            endif;
        endforeach;
    ?>
    <h4 class="title">
                            <i class="fa fa-star-o"></i> 最佳答案
                        </h4>
    <div class="comment-list">
                            <div class="comment-list-item">
                                <div class="media">
                                    <div class="media-left">
                                        <a class="img-div" href="<?php echo maoo_url($date,'user','index',$date->activity->bestAnswer->user->id); ?>">
                                            <img class="media-object" src="<?php echo $date->activity->bestAnswer->user->avatar; ?>?imageView2/1/w/40/h/40" alt="<?php echo $date->activity->bestAnswer->user->displayName; ?>">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <a href="<?php echo maoo_url($date,'user','index',$date->activity->bestAnswer->user->id); ?>"><?php echo $date->activity->bestAnswer->user->displayName; ?></a>
                                            <span><?php echo date('Y-m-d H:i',$date->activity->bestAnswer->date); ?></span>
                                        </h4>
                                        <div class="content">
                                            <?php echo $date->activity->bestAnswer->content; ?>
                                        </div>
                                        <?php if(count($date->activity->bestAnswer->cover)>0) : ?>
                                        <div class="cover-list">
                                            <?php foreach($date->activity->bestAnswer->cover as $cover) : ?>
                                            <div class="cover-list-item">
                                                <img src="<?php echo $cover; ?>?imageView2/3/w/448" />
                                            </div>
                                            <?php endforeach; ?>
                                            <div class="clearfix"></div>
                                        </div>
                                        <?php endif; ?>
                                        获得<span class="text-danger"><?php echo $date->activity->coins; ?></span>积分奖励。
                                    </div>
                                </div>
                            </div>
                        </div>

</div>
<?php endif; ?>
<div class="comment" id="comment">
                        <h4 class="title">
                            全部答案 （<?php echo $date->answers->count; ?>）
                        </h4>
                        <?php if(!$date->activity->bestAnswer) : ?>
                        <?php if($date->user) : ?>
                        <form method="post" action="<?php echo $date->siteUrl; ?>/engine/action/activityAnswer.php" class="comment-form">
                            <input type="hidden" name="id" value="<?php echo $date->activity->id; ?>" />
                            <div class="form-group">
                                <textarea rows="5" class="form-control" id="answer-publish-form-content" name="content" placeholder="写下您的答案~"></textarea>
                            </div>
                            <div class="activity-put-bottom">
                                <div class="left">
                                    <div id="activity-cover-box"></div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="right">
                                    <button type="button" class="btn btn-default" id="quickPublish-submit">
                                        <i class="fa fa-edit"></i> 提交答案
                                    </button>
                                    <div class="activity-upload">
                                        <input type="file" onchange="readFile(this)" />
                                        <button type="button" class="btn btn-info btn-block">
                                            <i class="fa fa-file-image-o"></i> 添加图片
                                        </button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
    <script>
    $('#quickPublish-submit').click(function(){
        var content = $('#answer-publish-form-content').val();
        if(content!='') {
            $('.comment-form').submit();
        };
    });
    function readFile(obj){
                                                    var file = obj.files[0]; 
                                                    if(!/image\/\w+/.test(file.type)){
                                                        alert("请确保文件为图像类型");
                                                        return false;
                                                    };
                                                    data = new FormData();
                                                    data.append("image", file);
                                                    $.ajax({
                                                        data: data,
                                                        type: "POST",
                                                        dataType : "json",
                                                        url: "<?php echo $date->siteUrl; ?>/engine/action/quickPublishImage.php",
                                                        cache: false,
                                                        contentType: false,
                                                        processData: false,
                                                        success: function(json) {
                                                            if(json.code==200) {
                                                                $('#activity-cover-box').append('<div class="cover-img"><div class="img-div" style="background-image:url('+json.url+');"></div><input type="hidden" name="cover" value="'+json.url+'"><div class="close"><i class="fa fa-times-circle"></i></div></div>');
                                                                return;
                                                            } else {
                                                                alert(json.text);
                                                            };
                                                        },
                                                        error : function(data) {
                                                            alert('上传失败');
                                                        }
                                                    });
                                                };
                                                $('#activity-cover-box .cover-img .close').click(function(){
                                                    $(this).parent('.cover-img').remove();
                                                });
</script>
                        <?php else : ?>
                        <div class="comment-form">
                            <div class="form-group">
                                <textarea rows="5" class="form-control" name="content" placeholder="写下您的答案~" disabled></textarea>
                            </div>
                            <div class="text-right">
                                <a href="<?php echo maoo_url($date,'user','login'); ?>" class="btn btn-default">请在登录后回答问题</a>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php if($date->answers->count>0) : ?>
                        <div class="comment-list">
                            <?php foreach($date->answers->result as $comment) : ?>
                            <div class="comment-list-item">
                                <div class="media">
                                    <div class="media-left">
                                        <a class="img-div" href="<?php echo maoo_url($date,'user','index',$comment->user->id); ?>">
                                            <img class="media-object" src="<?php echo $comment->user->avatar; ?>?imageView2/1/w/40/h/40" alt="<?php echo $comment->user->displayName; ?>">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <a href="<?php echo maoo_url($date,'user','index',$comment->user->id); ?>"><?php echo $comment->user->displayName; ?></a>
                                            <span><?php echo date('Y-m-d H:i',$comment->date); ?></span>
                                        </h4>
                                        <div class="content">
                                            <?php echo $comment->content; ?>
                                        </div>
                                        <?php if(count($comment->cover)>0) : ?>
                                        <div class="cover-list">
                                            <?php foreach($comment->cover as $cover) : ?>
                                            <div class="cover-list-item">
                                                <img src="<?php echo $cover; ?>?imageView2/3/w/448" />
                                            </div>
                                            <?php endforeach; ?>
                                            <div class="clearfix"></div>
                                        </div>
                                        <?php endif; ?>
                                        <?php if(!$date->activity->bestAnswer && $date->activity->user->id==$date->user->id) : ?>
                                        <a href="<?php echo $date->siteUrl; ?>/engine/action/setAnswer.php?id=<?php echo $comment->id; ?>">采纳为最佳答案</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>