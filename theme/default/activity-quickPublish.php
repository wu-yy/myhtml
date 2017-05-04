<?php if($date->user) : ?>
<div id="quickPublish-form">
    <div class="title">
        <i class="fa fa-edit"></i> 快速发动态
        <a href="<?php echo maoo_url($date,'activity','publish'); ?>">
            <i class="fa fa-cog"></i> 选择更多动态类型
        </a>
    </div>
    <div class="form-group">
        <textarea rows="3" class="form-control" id="quickPublish-content" placeholder="说点什么吧~"></textarea>
    </div>
    <textarea class="hidden" id="quickPublish-cover">[]</textarea>
    <div class="activity-put-bottom">
        <div class="left">
            <div id="activity-cover-box"></div>
            <div class="clearfix"></div>
        </div>
        <div class="right">
            <button type="submit" class="btn btn-default" id="quickPublish-submit">
                <i class="fa fa-edit"></i> 发动态
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
                                                        dataType : "json",
                                                        url: "<?php echo $date->siteUrl; ?>/engine/action/quickPublishImage.php",
                                                        cache: false,
                                                        contentType: false,
                                                        processData: false,
                                                        success: function(json) {
                                                            if(json.code==200) {
                                                                var cover = $('#quickPublish-cover').val();
                                                                $('#activity-cover-box').append('<div class="cover-img"><div class="img-div" style="background-image:url('+json.url+');"></div><div class="close"><i class="fa fa-times-circle"></i></div></div>');
                                                                var covers = JSON.parse(cover);
                                                                covers.push(json.url);
                                                                $('#quickPublish-cover').val(JSON.stringify(covers));
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
    $('#quickPublish-submit').click(function(){
        var content = $('#quickPublish-content').val();
        var cover = $('#quickPublish-cover').val();
        if(content) {
            $.ajax({
				url: '<?php echo $date->siteUrl; ?>/engine/action/quickPublish.php',
				type: 'POST',
                data : {
                    content : content,
                    cover : cover
                },
				dataType: 'json',
				timeout: 9000,
				error: function() {
					alert('提交失败！');
				},
				success: function(date) {
                    if(date.code==200) {
                        $('#quickPublish-content').val('');
                        $('#activity-cover-box').html('');
                        var covers = date.activity.cover;
                        var coverList = '<div class="cover-list">';
                        for(var i=0; i<covers.length; i++) {
                            coverList += '<div class="cover-list-item" data-toggle="modal" data-target="#coverModal"><img src="'+covers[i]+'?imageView2/1/w/100/h/100" src-data="'+covers[i]+'" /></div>'
                        };
                        coverList += '<div class="clearfix"></div></div>';
                        $('.activity-list').prepend('<div class="activity-list-item"><div class="avatar"><img src="'+date.activity.user.avatar+'?imageView2/1/w/60/h/60" /></div><div class="right"><div class="top"><a class="name" href="#">'+date.activity.user.displayName+'</a> 发布于 <span class="date">'+moment.unix(date.activity.date).format('YYYY-MM-DD HH:mm:ss')+'</span></div><div class="content">'+date.activity.content+'</div>'+coverList+'</div></div>');
                        $('.cover-list-item').hover(function(){
                            var img = $('img',this).attr('src-data');
                            $('#coverModal img').attr('src',img);
                        });
                        console.log(date.activity);
                    } else {
                        console.log(date.text);
                    };
				}
			});  
        };
    });
</script>
<?php else : ?>
<div class="quickPublish-unlogin">请在<a href="<?php echo maoo_url($date,'user','login'); ?>">登录</a>后发布动态</div>
<?php endif; ?>