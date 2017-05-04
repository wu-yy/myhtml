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
                    账户设置
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
                                    账户设置
                                </h2>
                                <div class="user-set">
                                    <div class="avatar">
                                        <img src="<?php echo $date->user->avatar; ?>?imageView2/1/w/100/h/100" />
                                        <div class="clearfix"></div>
                                        <a href="#" data-toggle="modal" data-target="#avatarModal">设置头像</a>
                                    </div>
                                    <h4 class="title">
                                        基础资料
                                        <a href="#" class="pull-right" data-toggle="modal" data-target="#setModal"><i class="fa fa-pencil-square"></i> 编辑</a>
                                    </h4>
                                    <ul class="list-unstyled">
                                        <li><span>姓名：</span> <?php echo $date->user->displayName; ?></li>
                                        <li><span>性别：</span> <?php if($date->user->sex==1) { ?>男<?php } elseif($date->user->sex==2) { ?>女<?php } ?></li>
                                        <li><span>个性签名：</span> <?php echo $date->user->excerpt; ?></li>
                                    </ul>
                                    <div class="modal fade" id="avatarModal" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">
                                                            &times;
                                                        </span>
                                                    </button>
                                                    <h4 class="modal-title">
                                                        设置头像
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="upload">
                                                        <input type="file" class="form-control" onchange="readFile(this)">
                                                        <button type="button" class="btn btn-warning btn-block">上传图片</button>
                                                    </div>
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
                                                                        $('#avatarModal').modal('hide');
                                                                        $('.user-set .avatar img').attr('src',json.url+'?imageView2/1/w/108/h/108');
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
                                                <div class="modal-footer">
                                                    <div class="row">
                                                        <div class="col-md-6 col-md-offset-3 col">
                                                            <button type="button" class="btn btn-default btn-block" data-dismiss="modal">
                                                                取消
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="setModal" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <form method="post" class="modal-content" action="<?php echo $date->siteUrl; ?>/engine/action/userInfo.php">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">
                                                            &times;
                                                        </span>
                                                    </button>
                                                    <h4 class="modal-title">
                                                        设置资料
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="displayName" value="<?php echo $date->user->displayName; ?>" placeholder="姓名">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                            <i class="fa <?php if($date->user->sex==1) { ?>fa-check-circle<?php } else { ?>fa-circle-thin<?php } ?>"></i>
                                                            男
                                                            <input type="radio" name="sex" value="1" <?php if($date->user->sex==1) { ?>checked<?php } ?> />
                                                        </label>
                                                        <label>
                                                            <i class="fa <?php if($date->user->sex==2) { ?>fa-check-circle<?php } else { ?>fa-circle-thin<?php } ?>"></i>
                                                            女
                                                            <input type="radio" name="sex" value="2" <?php if($date->user->sex==2) { ?>checked<?php } ?> />
                                                        </label>
                                                        <script>
                                                            $('#setModal label').click(function(){
                                                                $('#setModal label i').removeClass('fa-check-circle');
                                                                $('#setModal label i').addClass('fa-circle-thin');
                                                                $('i',this).removeClass('fa-circle-thin');
                                                                $('i',this).addClass('fa-check-circle');
                                                            });
                                                        </script>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="excerpt" placeholder="个性签名"><?php echo $date->user->excerpt; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="row">
                                                        <div class="col-md-6 col">
                                                            <button type="submit" class="btn btn-warning btn-block">
                                                                保存
                                                            </button>
                                                        </div>
                                                        <div class="col-md-6 col">
                                                            <button type="button" class="btn btn-default btn-block" data-dismiss="modal">
                                                                取消
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include maoo_temp('footer'); ?>