<?php 
require __DIR__."/../functions.php";
$request = array(
    'query'=>json_encode($_GET)
);
$date = maoo_request('/product/alipayReturn',$request);
if($date->code>0) :
    if($date->code==200) :
        $url = $date->siteUrl.'?m=product&a=paySuccess&id='.$date->id;
    else :
        $url = $date->siteUrl.'?m=product&a=payFalse&id='.$date->id;
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