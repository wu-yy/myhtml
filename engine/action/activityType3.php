<?php 
require __DIR__."/../functions.php";
if($_POST['id']) :
    $request = array(
        'type'=>$_POST['type']
    );
    $date = maoo_request('/activityType3/'.$_POST['id'].'/form',$request);
    if($date->code>0) :
        if($_POST['type']==2) :
            if($date->code==200) :
                echo $date->html;
                exit();
            else :
                $url = $date->siteUrl.'?m=activity&a=single&id='.$_POST['id'];
                $_SESSION['flash'] = $date->text;
            endif;
        else :
            if($date->code==200) :
                $url = $date->siteUrl.'?m=activity&a=single&id='.$_POST['id'];
                $_SESSION['flash'] = '支付成功';
            else :
                $url = $date->siteUrl.'?m=activity&a=single&id='.$_POST['id'];
                $_SESSION['flash'] = $date->text;
            endif;
        endif;
    else :
        $url = null;
        $_SESSION['flash'] = '与数据服务器通信超时';
    endif;
else :
    $date = maoo_request('/');
    if($date->code>0) :
        $url = $date->siteUrl;
        $_SESSION['flash'] = '动态ID参数有误';
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