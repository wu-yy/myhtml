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
    $date = maoo_request('/user/avatar/form',$request, true);
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
            
/*
$date = maoo_request('/');
if($date->code==200) :
    if($date->user) :
        
        $curDateTime = date("YmdHis");
        $ymd = date("Ym");
        $randNum = rand(1000, 9999);
        $out_trade_no = $curDateTime . $randNum;
        $ext = explode('.',$_FILES['image']['name']);
        $count = count($ext);
        $attached_type = $ext[$count-1];
        $fileName = ROOT_PATH.'/upload/image/'.$ymd.'/'.$out_trade_no.'.'.$attached_type;
        $fileName_true = '/upload/image/'.$ymd.'/'.$out_trade_no.'.'.$attached_type;
        $location =  $_FILES["image"]["tmp_name"];
        $filetype = array('png','gif','jpg','jpeg');
        if(in_array($attached_type,$filetype)) :
            if (!is_dir(ROOT_PATH.'/upload/image/')){
                mkdir(ROOT_PATH.'/upload/image/', 0777);
            };
            if (!is_dir(ROOT_PATH.'/upload/image/'.$ymd.'/')){
                mkdir(ROOT_PATH.'/upload/image/'.$ymd.'/', 0777);
            };
            if (!file_exists($fileName)) {
                if (!is_writeable($fileName)) {
                    @chmod($fileName, 0777);
                };
                move_uploaded_file($location,$fileName);
            };
            if(version_compare(PHP_VERSION,'5.6.0', '<')) :
                $request = array(
                    'image'=>'@'.$fileName
                );
            else :
                $request = array(
                    'image'=>new CURLFile($fileName)
                );
            endif;
            $date = maoo_request('/user/avatar/form',$request, true);
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
    else :
        $json = array(
            'code'=>101,
            'text'=>'请先登录'  
        );
    endif;
else :
    $json = array(
        'code'=>101,
        'text'=>'与数据服务器通信超时'  
    );
endif;
*/
echo json_encode($json);
?>