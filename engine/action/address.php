<?php 
require __DIR__."/../functions.php";
$request = array(
    'name'=>$_POST['name'],
    'phone'=>$_POST['phone'],
    'province'=>$_POST['province'],
    'city'=>$_POST['city'],
    'area'=>$_POST['area'],
    'address'=>$_POST['address'],
    'zipcode'=>$_POST['zipcode']
);
$date = maoo_request('/product/address',$request);
if($date->code>0) :
    $url = $date->siteUrl.'?m=product&a=checkout';
    if($date->code==200) :
        $_SESSION['flash'] = '添加收货信息成功';
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