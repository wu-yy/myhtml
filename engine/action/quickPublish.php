<?php 
require __DIR__."/../functions.php";
if($_POST['content']) :
    $request = array();
    $request['content'] = $_POST['content'];
    if($_POST['cover']) :
        $request['cover'] = $_POST['cover'];
    endif;
    $date = maoo_request('/activity/quickPublish/form',$request);
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
        'text'=>'动态内容不能为空'  
    );
endif;
echo json_encode($json);
?>