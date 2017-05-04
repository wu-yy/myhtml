<?php
class Maoo {
	public function index(){
        $date = maoo_request('/product');
        if($date->code==200) :
            $maoo_title = '商品 - '.$date->siteTitle;
            include maoo_temp('product-home');
        else :
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
	public function all(){
        if($_GET['page']>0) :
            $request = array(
                'page'=>$_GET['page']
            );
            $date = maoo_request('/productAll',$request);
        else :
            $date = maoo_request('/productAll');
        endif;
        if($date->code==200) :
            $maoo_title = '全部商品 - '.$date->siteTitle;
            include maoo_temp('product-all');
        else :
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
	public function single(){
        if($_GET['id']) :
            $date = maoo_request('/productSingle/'.$_GET['id']);
            if($date->code==200) :
                $maoo_title = $date->product->title.' - '.$date->siteTitle;
                include maoo_temp('product-single');
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
        if($_GET['id']) :
            if($_GET['page']>0) :
                $request = array(
                    'page'=>$_GET['page']
                );
                $date = maoo_request('/productTerm/'.$_GET['id'],$request);
            else :
                $date = maoo_request('/productTerm/'.$_GET['id']);
            endif;
            if($date->code==200) :
                $maoo_title = $date->term->title.' - '.$date->siteTitle;
                include maoo_temp('product-term');
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
    public function buysuccess(){
        if($_GET['id']) :
            $date = maoo_request('/product/buysuccess/'.$_GET['id']);
            if($date->code==200) :
                $maoo_title = '成功加入购物车 - '.$date->siteTitle;
                include maoo_temp('product-buysuccess');
            else :
                $maoo_title = '错误 - Mao10CMS';
                include maoo_temp('error');
            endif;
        else :
            $date->code = 101;
            $date->text = '商品ID参数错误';
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
	public function cart(){
        $date = maoo_request('/productCart');
        if($date->code==200) :
            $maoo_title = '我的购物车 - '.$date->siteTitle;
            include maoo_temp('product-cart');
        else :
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
	public function checkout(){
        $date = maoo_request('/productCheckout');
        if($date->code==200) :
            $maoo_title = '确认订单 - '.$date->siteTitle;
            include maoo_temp('product-checkout');
        else :
            $maoo_title = '错误 - Mao10CMS';
            include maoo_temp('error');
        endif;
	}
    public function confirm(){
        if($_GET['id']) :
            $date = maoo_request('/product/confirm/'.$_GET['id']);
            if($date->code==200) :
                $maoo_title = '支付订单 - '.$date->siteTitle;
                include maoo_temp('product-confirm');
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
    public function paySuccess(){
        if($_GET['id']) :
            $date = maoo_request('/product/paySuccess/'.$_GET['id']);
            if($date->code==200) :
                $maoo_title = '支付成功 - '.$date->siteTitle;
                include maoo_temp('product-paySuccess');
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
    public function payFalse(){
        if($_GET['id']) :
            $date = maoo_request('/product/payFalse/'.$_GET['id']);
            if($date->code==200) :
                $maoo_title = '支付失败 - '.$date->siteTitle;
                include maoo_temp('product-payFalse');
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
}
