<?php 
require __DIR__."/../functions.php";
if($_POST['content']) :
    $request = array();
    $request['content'] = $_POST['content'];
    if(is_array($_POST['cover'])) :
        $request['cover'] = json_encode($_POST['cover']);
    elseif($_POST['cover']) :
        $request['cover'] = json_encode(array($_POST['cover']));
    endif;
    if($_POST['title']) :
        $request['title'] = $_POST['title'];
    endif;
    $request['type'] = $_POST['type'];
    if($_POST['type']==2) :
        $request['coins'] = $_POST['type2_coins'];
    elseif($_POST['type']==3) :
        $request['price'] = $_POST['type3_price']*100;
        $request['number'] = $_POST['type3_number'];
        $request['day'] = $_POST['type3_day'];
    elseif($_POST['type']==4) :
        $request['price'] = $_POST['type4_price']*100;
        $request['number'] = $_POST['type4_number'];
        $request['number2'] = $_POST['type4_number2'];
        $request['day'] = $_POST['type4_day'];
    elseif($_POST['type']==5) :
        $request['price'] = $_POST['type5_price']*100;
        $request['number'] = $_POST['type5_number'];
    elseif($_POST['type']==6) :
        $guess = array();
        for($i=0; $i<5; $i++) {
            if($_POST['type6_if'][$i] && $_POST['type6_odds'][$i]>0) {
                array_push($guess, array(
                    'if'=>$_POST['type6_if'][$i],
                    'odds'=>$_POST['type6_odds'][$i]
                ));
            };
        };
        $request['guess'] = json_encode($guess);
    elseif($_POST['type']==7) :
        $request['coins'] = $_POST['type7_coins'];
        $request['excerpt'] = $_POST['type7_excerpt'];
    endif;
    $date = maoo_request('/activity/publish/form',$request);
    if($date->code>0) :
        if($date->code==200) :
            $url = $date->siteUrl.'?m=activity&a=single&id='.$date->activity->id;
            $_SESSION['flash'] = '发布动态成功';
        else :
            $url = $date->siteUrl.'?m=activity&a=publish';
            $_SESSION['flash'] = $date->text;
        endif;
    else :
        $url = null;
        $_SESSION['flash'] = '与数据服务器通信超时';
    endif;
else :
    $url = null;
    $_SESSION['flash'] = '动态内容不能为空';
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