<?php
class Maoo {
	public function index(){
        $request = array();
        $request['custom'] = array(
            array(
                'table' => 'comment',
                'limit' => array(0,5),
                'key' => array(
                    'type' => 'post'
                ),
                'deep' => array(
                    'key' => 'user',
                    'table' => 'user',
                    'with' => 'id'
                ),
                'result' => 'postSideComments'
            ),
            array(
                'table' => 'post',
                'key' => array(
                    'cover' => array(
                        'value' => null,
                        'if' => '!='
                    )
                ),
                'limit' => array(0,5),
                'sort' => 'desc',
                'sortBy' => 'views',
                'result' => 'postSidePosts'
            )
        );
		if($_GET['page']>0) :
            $request = array(
                'page'=>$_GET['page']
            );
            $date = maoo_request('/post',$request);
        else :
            $date = maoo_request('/post',$request);
        endif;
        if($date->code==200) :
            $maoo_title = '全部文章 - '.$date->siteTitle;
            include maoo_temp('post-home');
        else :
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
	public function single(){
        $request = array();
        $request['custom'] = array(
            array(
                'table' => 'comment',
                'limit' => array(0,5),
                'key' => array(
                    'type' => 'post'
                ),
                'deep' => array(
                    'key' => 'user',
                    'table' => 'user',
                    'with' => 'id'
                ),
                'result' => 'postSideComments'
            ),
            array(
                'table' => 'post',
                'key' => array(
                    'cover' => array(
                        'value' => null,
                        'if' => '!='
                    )
                ),
                'limit' => array(0,5),
                'sort' => 'desc',
                'sortBy' => 'views',
                'result' => 'postSidePosts'
            )
        );
        if($_GET['id']) :
            $date = maoo_request('/postSingle/'.$_GET['id'],$request);
            if($date->code==200) :
                $maoo_title = $date->post->title.' - '.$date->siteTitle;
                include maoo_temp('post-single');
            else :
                $maoo_title = '错误 - Mao10CMS';
                include maoo_temp('error');
            endif;
        else :
            $date->code = 101;
            $date->text = '文章ID参数错误';
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
	public function term(){
        $request = array();
        $request['custom'] = array(
            array(
                'table' => 'comment',
                'limit' => array(0,5),
                'key' => array(
                    'type' => 'post'
                ),
                'deep' => array(
                    'key' => 'user',
                    'table' => 'user',
                    'with' => 'id'
                ),
                'result' => 'postSideComments'
            ),
            array(
                'table' => 'post',
                'key' => array(
                    'cover' => array(
                        'value' => null,
                        'if' => '!='
                    )
                ),
                'limit' => array(0,5),
                'sort' => 'desc',
                'sortBy' => 'views',
                'result' => 'postSidePosts'
            )
        );
        if($_GET['id']) :
            $date = maoo_request('/postTerm/'.$_GET['id'], $request);
            if($date->code==200) :
                $maoo_title = $date->term->title.' - '.$date->siteTitle;
                include maoo_temp('post-term');
            else :
                $maoo_title = '错误 - Mao10CMS';
                include maoo_temp('error');
            endif;
        else :
            $date->code = 101;
            $date->text = '分类ID参数错误';
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
	public function tag(){
        $request = array();
        $request['custom'] = array(
            array(
                'table' => 'comment',
                'limit' => array(0,5),
                'key' => array(
                    'type' => 'post'
                ),
                'deep' => array(
                    'key' => 'user',
                    'table' => 'user',
                    'with' => 'id'
                ),
                'result' => 'postSideComments'
            ),
            array(
                'table' => 'post',
                'key' => array(
                    'cover' => array(
                        'value' => null,
                        'if' => '!='
                    )
                ),
                'limit' => array(0,5),
                'sort' => 'desc',
                'sortBy' => 'views',
                'result' => 'postSidePosts'
            )
        );
        if($_GET['tag']) :
            $request['tag'] = $_GET['tag'];
            $date = maoo_request('/postTag',$request);
            if($date->code==200) :
                $maoo_title = 'TAG：'.$date->tag.' - '.$date->siteTitle;
                include maoo_temp('post-tag');
            else :
                $maoo_title = '错误 - Mao10CMS';
                include maoo_temp('error');
            endif;
        else :
            $date->code = 101;
            $date->text = '标签参数错误';
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
}
