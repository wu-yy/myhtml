<?php 
require __DIR__."/../functions.php";
if($_POST['id']) :
    if($_POST['content']) :
        $request = array(
            'content'=>$_POST['content'],
            'parent'=>$_POST['parent']
        );
        $date = maoo_request('/activityComment/'.$_POST['id'].'/form',$request);
        if($date->code>0) :
            $url = $date->siteUrl.'?m=activity&a=single&id='.$_POST['id'].'#comment';
            if($date->code==200) :
                $_SESSION['flash'] = '评论发布成功';
            else :
                $_SESSION['flash'] = $date->text;
            endif;
        else :
            $url = null;
            $_SESSION['flash'] = '与数据服务器通信超时';
        endif;
    else :
        $date = maoo_request('/');
        if($date->code>0) :
            $url = $date->siteUrl.'?m=activity&a=single&id='.$_POST['id'];
            $_SESSION['flash'] = '评论内容必须填写';
        else :
            $url = null;
            $_SESSION['flash'] = '与数据服务器通信超时';
        endif;
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