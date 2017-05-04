<?php 
require __DIR__."/../functions.php";
if($_GET['id']) :
    $date = maoo_request('/postLike/'.$_GET['id'].'/form');
    if($date->code>0) :
        $url = $date->siteUrl.'?m=user&a=likePost';
        if($date->code==200) :
            $_SESSION['flash'] = '成功移除喜欢的文章';
        else :
            $_SESSION['flash'] = $date->text;
        endif;
    else :
        $url = null;
        $_SESSION['flash'] = '与数据服务器通信超时';
    endif;
else :
    $url = null;
    $_SESSION['flash'] = '文章ID参数有误';
endif;
?>
<?php if($url) : ?>
    <!DOCTYPE html><html lang="zh-CN"><meta http-equiv="refresh" content="0;url=<?php echo $url; ?>"><head><meta charset="utf-8"><title>Mao10CMS</title></head><body></body></html>
<?php else : ?>
<script>
    alert('与数据服务器通信超时');
    history.go(-1);
</script>
<?php endif; ?>