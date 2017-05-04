<?php 
require __DIR__."/../functions.php";
$date = maoo_request('/user/qiandao/form');
if($date->code>0) :
    $json = $date;
else :
    $json = array(
        'code'=>101,
        '与数据服务器通信超时'  
    );
endif;
echo json_encode($json);
?>