<?php 
require __DIR__."/../functions.php";
$request = array(
    'name'=>$_POST['displayName'],
    'sex'=>$_POST['sex'],
    'excerpt'=>$_POST['excerpt']
);
$date = maoo_request('/user/info/form',$request);
if($date->code>0) :
    $url = $date->siteUrl.'?m=user&a=set';
    if($date->code==200) :
        $_SESSION['flash'] = '修改昵称成功';
    else :
        $_SESSION['flash'] = $date->text;
    endif;
else :
    $url = null;
    $_SESSION['flash'] = '与数据服务器通信超时';
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