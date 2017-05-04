<?php
class Maoo {
	public function index(){
        if(!APP_ID || !APP_KEY) :
            $maoo_title = '错误 - Mao10CMS';
            include ROOT_PATH.'/engine/page/install.php';
        else :
            $request = array();
            if($_GET['page']>0) :
                $request['page'] = $_GET['page'];
            endif;
            if($_GET['s']) :
                $request['keyword'] = $_GET['s'];
                $request['type'] = $_GET['type'];
                $date = maoo_request('/',$request);
                $s = $_GET['s'];
                if($date->code==200) :
                    $maoo_title = '搜索：'.$s.' - '.$date->siteTitle;
                    include maoo_temp('search');
                else :
                    $maoo_title = '错误 - Mao10CMS';
                    include maoo_temp('error');
                endif;
            else :
                $date = maoo_request('/product',$request);
                if($date->code==200) :
                    $maoo_title = $date->siteTitle;
                    include maoo_temp('product-home');
                elseif($date->code==251) :
                    $maoo_title = '错误 - Mao10CMS';
                    include ROOT_PATH.'/engine/page/setSiteUrl.php';
                else :
                    $maoo_title = '错误 - Mao10CMS';
                    include maoo_temp('error');
                endif;
            endif;
        endif;
	}
}
