<?php 
require __DIR__."/../functions.php";
$request = array(
    'query'=>json_encode($_POST)
);
$date = maoo_request('/product/alipayNotify',$request);
if($date->code>0) :
    echo $date->text;
else :
    echo 'fail';
endif;
?>