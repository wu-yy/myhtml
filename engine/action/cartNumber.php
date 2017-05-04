<?php 
require __DIR__."/../functions.php";
if($_GET['id']) :
    $request = array(
        'id'=>$_GET['id'],
        'number'=>$_GET['number'],
        'type'=>$_GET['type']
    );
    $date = maoo_request('/product/cartNumber',$request);
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
        'text'=>'参数有误'  
    );
endif;
echo json_encode($json);