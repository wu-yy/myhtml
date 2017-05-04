<?php 
require __DIR__."/../functions.php";
if($_GET['id']) :
    $date = maoo_request('/postLike/'.$_GET['id'].'/form');
    if($date->code>0) :
        $json = $date;
    else :
        $json = array(
            'code'=>101,
            '与数据服务器通信超时'  
        );
    endif;
else :
    $json = array(
        'code'=>101,
        'text'=>'文章ID参数有误'  
    );
endif;
echo json_encode($json);
?>