<?php
class Maoo {
	public function index(){
        $date = maoo_request('/user');
        if($date->code==200) :
            $maoo_title = '用户中心 - '.$date->siteTitle;
            include maoo_temp('user-home');
        else :
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
	public function reg(){
        $date = maoo_request('/user/reg');
        if($date->code==200) :
            $maoo_title = '用户注册 - '.$date->siteTitle;
            include maoo_temp('user-reg');
        else :
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
	public function login(){
        $date = maoo_request('/user/login');
        if($date->code==200) :
            $maoo_title = '用户登录 - '.$date->siteTitle;
            include maoo_temp('user-login');
        else :
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
	public function logout(){
        $_SESSION['user_name'] = $date->user->name;
        $_SESSION['user_pass'] = $date->user->pass;
        echo '<script>history.go(-1);</script>';
	}
	public function set(){
        $date = maoo_request('/user/set');
        if($date->code==200) :
            $maoo_title = '账户设置 - '.$date->siteTitle;
            include maoo_temp('user-set');
        else :
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
	public function likePost(){
        $request = array();
        if($_GET['page']>0) :
            $request['page'] = $_GET['page'];
        endif;
        $date = maoo_request('/user/likePost',$request);
        if($date->code==200) :
            $maoo_title = '我喜欢的文章 - '.$date->siteTitle;
            include maoo_temp('user-likePost');
        else :
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
	public function likeProduct(){
        $request = array();
        if($_GET['page']>0) :
            $request['page'] = $_GET['page'];
        endif;
        $date = maoo_request('/user/likeProduct',$request);
        if($date->code==200) :
            $maoo_title = '我喜欢的商品 - '.$date->siteTitle;
            include maoo_temp('user-likeProduct');
        else :
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
	public function comment(){
        $request = array();
        if($_GET['page']>0) :
            $request['page'] = $_GET['page'];
        endif;
        $date = maoo_request('/user/comment', $request);
        if($date->code==200) :
            $maoo_title = '我的评论 - '.$date->siteTitle;
            include maoo_temp('user-comment');
        else :
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
	public function pass(){
        $date = maoo_request('/user/pass');
        if($date->code==200) :
            $maoo_title = '修改密码 - '.$date->siteTitle;
            include maoo_temp('user-pass');
        else :
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
	public function coins(){
        $date = maoo_request('/user/coins');
        if($date->code==200) :
            $maoo_title = '积分记录 - '.$date->siteTitle;
            include maoo_temp('user-coins');
        else :
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
	public function order(){
        $request = array();
        if($_GET['page']>0) :
            $request['page'] = $_GET['page'];
        endif;
        if($_GET['status']>0) :
            $request['status'] = $_GET['status'];
        endif;
        $date = maoo_request('/user/order',$request);
        if($date->code==200) :
            $maoo_title = '我的订单 - '.$date->siteTitle;
            include maoo_temp('user-order');
        else :
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
	public function orderView(){
        if($_GET['id']) :
            $date = maoo_request('/user/orderView/'.$_GET['id']);
            if($date->code==200) :
                $maoo_title = '订单详情 - '.$date->siteTitle;
                include maoo_temp('user-orderView');
            else :
                $maoo_title = '错误 - Mao10CMS';
                include maoo_temp('error');
            endif;
        else :
            $date->code = 101;
            $date->text = '订单ID参数错误';
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
	public function activity(){
        if($_GET['id']) :
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
            if($_GET['for']) :
                $request['for'] = $_GET['for'];
            endif;
            $date = maoo_request('/user/activity/'.$_GET['id'],$request);
            if($date->code==200) :
                $maoo_title = '我的动态 - '.$date->siteTitle;
                include maoo_temp('user-activity');
            else :
                $maoo_title = '错误 - Mao10CMS';
                include maoo_temp('error');
            endif;
        else :
            $date->code = 101;
            $date->text = '用户ID参数错误';
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
}
