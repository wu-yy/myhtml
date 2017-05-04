<?php 
require __DIR__."/../functions.php";
if($_GET['id']) :
    $date = maoo_request('/setAnswer/'.$_GET['id'].'/form',$request);
    if($date->code>0) :
        if($date->code==200) :
            $url = $date->siteUrl.'?m=activity&a=single&id='.$date->activity->id;
            $_SESSION['flash'] = '采纳答案成功';
        else :
            $url = null;
            $_SESSION['flash'] = $date->text;
        endif;
    else :
        $url = null;
        $_SESSION['flash'] = '与数据服务器通信超时';
    endif;
else :
    $date = maoo_request('/');
    if($date->code>0) :
        $url = $date->siteUrl;
        $_SESSION['flash'] = '答案ID参数有误';
    else :
        $url = null;
        $_SESSION['flash'] = '与数据服务器通信超时';
    endif;
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