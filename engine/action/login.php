<?php 
require __DIR__."/../functions.php";
if($_POST['name'] && $_POST['pass']) :
    $request = array(
        'name'=>$_POST['name'],
        'pass'=>$_POST['pass']
    );
    $date = maoo_request('/user/login/form',$request);
    if($date->code>0) :
        if($date->code==200) :
            $url = $date->siteUrl;
            $_SESSION['user_name'] = $date->user->name;
            $_SESSION['user_pass'] = $date->user->pass;
            $_SESSION['flash'] = '登录成功';
        else :
            $url = $date->siteUrl.'?m=user&a=login';
            $_SESSION['flash'] = $date->text;
        endif;
    else :
        $url = null;
        $_SESSION['flash'] = '与数据服务器通信超时';
    endif;
else :
    $date = maoo_request('/');
    if($date->code>0) :
        $url = $date->siteUrl.'?m=user&a=login';
        $_SESSION['flash'] = '用户名与密码必须填写';
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