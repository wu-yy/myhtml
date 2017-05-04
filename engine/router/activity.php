<?php
class Maoo {
	public function index(){
        $request = array();
        $request['custom'] = array(
            array(
                'table' => 'product',
                'limit' => array(0,5),
                'result' => 'activitySideProducts'
            ),
            array(
                'table' => 'post',
                'limit' => array(0,5),
                'key' => array(
                    'cover' => array(
                        'value' => null,
                        'if' => '!='
                    )  
                ),
                'result' => 'activitySidePosts'
            )
        );
		if($_GET['page']>0) :
            $request['page'] = $_GET['page'];
        endif;
		if($_GET['type']>0) :
            $request['type'] = $_GET['type'];
        endif;
        $date = maoo_request('/activity',$request);
        if($date->code==200) :
            $maoo_title = '动态 - '.$date->siteTitle;
            include maoo_temp('activity-home');
        else :
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
	public function publish(){
        $request = array();
        $request['custom'] = array(
            array(
                'table' => 'product',
                'limit' => array(0,5),
                'result' => 'activitySideProducts'
            ),
            array(
                'table' => 'post',
                'limit' => array(0,5),
                'key' => array(
                    'cover' => array(
                        'value' => null,
                        'if' => '!='
                    )  
                ),
                'result' => 'activitySidePosts'
            )
        );
		$date = maoo_request('/activity/publish',$request);
        if($date->code==200) :
            $maoo_title = '发布动态 - '.$date->siteTitle;
            include maoo_temp('activity-publish');
        else :
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
	public function single(){
        $request = array();
        $request['custom'] = array(
            array(
                'table' => 'product',
                'limit' => array(0,5),
                'result' => 'activitySideProducts'
            ),
            array(
                'table' => 'post',
                'limit' => array(0,5),
                'key' => array(
                    'cover' => array(
                        'value' => null,
                        'if' => '!='
                    )  
                ),
                'result' => 'activitySidePosts'
            )
        );
        if($_GET['id']) :
            $date = maoo_request('/activitySingle/'.$_GET['id'],$request);
            if($date->code==200) :
                if($date->activity->title) :
                    $maoo_title = $date->activity->title.' - '.$date->siteTitle;
                else :
                    $maoo_title = maoo_cut_str(strip_tags($date->activity->content),30).' - '.$date->siteTitle;
                endif;
                include maoo_temp('activity-single');
            else :
                $maoo_title = '错误 - Mao10CMS';
                include maoo_temp('error');
            endif;
        else :
            $date->code = 101;
            $date->text = '动态ID参数错误';
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
}
