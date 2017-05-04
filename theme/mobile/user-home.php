<?php include maoo_temp('header'); ?>
<div class="site-top">
    <a class="left" href="<?php echo $date->siteUrl; ?>">
        <i class="fa fa-angle-left"></i>
    </a>
    <span class="title">个人中心</span>
    <a class="right" href="<?php echo $date->siteUrl; ?>?search=1">
        <i class="fa fa-search"></i>
    </a>
</div>
<div class="user-home-top">
    <div class="bg"></div>
    <div class="name"><?php echo $date->user->displayName; ?></div>
    <div class="avatar img-div">
        <img src="<?php echo $date->user->avatar; ?>?imageView2/1/w/100/h/100" />
    </div>
</div>
<div class="avatar-upload">
    <div class="upload">
        <input type="file" class="form-control" onchange="readFile(this)">
        <button type="button" class="btn btn-warning btn-block">上传头像</button>
    </div>
    <button type="button" class="close-btn">取消</button>
    <script>
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
                dataType: 'json',
                url: "<?php echo $date->siteUrl; ?>/engine/action/avatar.php",
                cache: false,
                contentType: false,
                processData: false,
                success: function(json) {
                    if(json.code==200) {
                        $('.avatar-upload').css('display','none');
                        $('.user-home-top .avatar img').attr('src',json.url+'?imageView2/1/w/108/h/108');
                        return;
                    } else {
                        alert(json.text);
                    };
                },
                error : function(data) {
                    alert('上传失败B');
                }
            });
        };
    </script>
</div>
<script>
    $('.user-home-top .avatar').click(function(){
        $('.avatar-upload').css('display','block');
    });
    $('.close-btn').click(function(){
        $('.avatar-upload').css('display','none');
    });
</script>
<div class="user-home-center">
    <a class="user-home-center-item user-home-center-item-1" href="<?php echo maoo_url($date,'user','order'); ?>">
        <i class="fa fa-calendar-minus-o"></i>
        <div class="clearfix"></div>
        <div class="title">全部订单</div>
        <span></span>
    </a>
    <a class="user-home-center-item user-home-center-item-2" href="<?php echo maoo_url($date,'user','order',array('status'=>1)); ?>">
        <i class="fa fa-credit-card"></i>
        <div class="clearfix"></div>
        <div class="title">待付款</div>
        <span></span>
    </a>
    <a class="user-home-center-item user-home-center-item-3" href="<?php echo maoo_url($date,'user','order',array('status'=>3)); ?>">
        <i class="fa fa-gift"></i>
        <div class="clearfix"></div>
        <div class="title">待收货</div>
        <span></span>
    </a>
    <div class="clearfix"></div>
</div>
<div class="list">
    <a class="list-item" href="<?php echo maoo_url($date,'user','likeProduct'); ?>">
        <i class="fa fa-heart-o"></i> 喜欢的商品 <span>（<?php echo count($date->user->likeProducts); ?>）</span>
    </a>
    <a class="list-item" href="<?php echo maoo_url($date,'user','likePost'); ?>">
        <i class="fa fa-star-o"></i> 喜欢的文章 <span>（<?php echo count($date->user->likePosts); ?>）</span>
    </a>
    <a class="list-item" href="<?php echo maoo_url($date,'user','comment'); ?>">
        <i class="fa fa-comment-o"></i> 发表的评论 <span>（<?php echo $date->commentCount; ?>）</span>
    </a>
</div>
<div class="list">
    <a class="list-item" href="<?php echo maoo_url($date,'user','coins'); ?>">
        <i class="fa fa-database"></i> 积分记录 （现有积分：<?php echo $date->user->coins; ?>）
    </a>
</div>
<!--div class="list">
    <a class="list-item" href="#">
        <i class="fa fa-credit-card"></i> 现金账户
    </a>
    <a class="list-item" href="#">
        <i class="fa fa-diamond"></i> 礼品卡
    </a>
    <a class="list-item" href="#">
        <i class="fa fa-ticket"></i> 优惠券
    </a>
</div>
<div class="list">
    <a class="list-item" href="#">
        <i class="fa fa-smile-o"></i> 我的服务
    </a>
</div-->
<div class="list">
    <a class="list-item" href="<?php echo maoo_url($date,'user','set'); ?>">
        <i class="fa fa-cogs"></i> 设置
    </a>
    <a class="list-item" href="<?php echo maoo_url($date,'user','pass'); ?>">
        <i class="fa fa-lock"></i> 修改密码
    </a>
</div>
<?php include maoo_temp('footer'); ?>