<?php 
require __DIR__."/../functions.php";
$ext = explode('.',$_FILES['image']['name']);
$count = count($ext);
$attached_type = $ext[$count-1];
$filetype = array('png','gif','jpg','jpeg');
if(in_array($attached_type,$filetype)) :
    if(version_compare(PHP_VERSION,'5.6.0', '<')) :
        $request = array(
            'type'=>$attached_type,
            'image'=>'@'.$_FILES['image']["tmp_name"]
        );
    else :
        $request = array(
            'type'=>$attached_type,
            'image'=>new CURLFile($_FILES['image']["tmp_name"])
        );
    endif;
    $date = maoo_request('/active/quickPublish/form',$request, true);
    if($date->code>0) :
        $json = $date;
    else :
        $json = array(
            'code'=>101,
            'text'=>'与数据服务器通信超时'  
        );
    endif;
else :
    $json = array(
        'code'=>101,
        'text'=>'文件类型错误，或没有权限'  
    );
endif;
echo json_encode($json);
?>