<?php
header("Content-Type: text/html; charset=UTF-8");

//error_reporting(0);
error_reporting(E_ALL ^ E_NOTICE);

//定义根目录
define('ROOT_PATH',dirname(__FILE__).'/..');
define('REQUEST_URL','http://www.mao10.com');

session_save_path(ROOT_PATH.'/upload/session');
session_id();
session_start();

require ROOT_PATH.'/autoload.php';

function maoo_engine_run() {
    $m = $_GET['m'];
    $a = $_GET['a'];
    $mod = strtolower(isset($m) ? $m : "index");
    $act = strtolower(isset($a) ? $a : "index");
    require __DIR__."/router/{$mod}.php";
    $app = New Maoo();
    $app->$act();
    $_SESSION['flash'] = null;
};

function maoo_request($url,$array=array(),$file=false) {
    /*
    $url = REQUEST_URL.$url.'?id='.APP_ID.'&key='.APP_KEY;
    $ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10);
    $result = curl_exec($ch); 
    return json_decode($result);
    */
    $param = array( 
        'appid' => APP_ID,
        'appkey' => APP_KEY
    );
    if($_SESSION['user_name'] && $_SESSION['user_pass']) :
        $param['userName'] = $_SESSION['user_name'];
        $param['userPass'] = $_SESSION['user_pass'];
    endif;
    if($array) :
        foreach ( $array as $k => $v ) { 
            if($k=='custom' && $v) :
                $param[$k] = json_encode($v);
            else :
                $param[$k] = $v;
            endif;
        };
    endif;
    //$post_data = http_build_query($param);
    //$post_data = $param;
    /*
    foreach ( $param as $k => $v ) { 
        $post_data.= "$k=" . urlencode( $v ). "&" ;
    };
    $post_data = substr($post_data, 0, -1);
    */
    if($file) :
        $post_data = $param;
        $url = REQUEST_URL.'/jsonFile'.$url;
    else :
        $post_data = http_build_query($param);
        $url = REQUEST_URL.'/json'.$url;
    endif;
    $ch = curl_init(); //初始化curl
    curl_setopt($ch, CURLOPT_URL,$url); //抓取指定网页
    curl_setopt($ch, CURLOPT_HEADER, 0); //设置header
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //要求结果为字符串且输出到屏幕上
    curl_setopt($ch, CURLOPT_POST, 1); //post提交方式
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    $result = curl_exec($ch); //运行curl
    curl_close($ch);
    $result = json_decode($result);
    if($result->siteUrl && $_SESSION['site_url']!=$result->siteUrl) {
        $_SESSION['site_url'] = $result->siteUrl;
    } elseif(!$result->siteUrl && $_SESSION['site_url']) {
        $result->siteUrl = $_SESSION['site_url'];
    };
    if($result->siteTitle && $_SESSION['site_title']!=$result->siteTitle) {
        $_SESSION['site_title'] = $result->siteTitle;
    } elseif(!$result->siteTitle && $_SESSION['site_title']) {
        $result->siteTitle = $_SESSION['site_title'];
    };
    if($result->siteLogo && $_SESSION['site_logo']!=$result->siteLogo) {
        $_SESSION['site_logo'] = $result->siteLogo;
    } elseif(!$result->siteLogo && $_SESSION['site_logo']) {
        $result->siteLogo = $_SESSION['site_logo'];
    };
    return $result;
};

function maoo_theme() {
    if(maoo_is_mobile()) :
        return 'mobile';
    else :
        return 'default';
    endif;
};

function maoo_temp($name) {
    $temp = ROOT_PATH.'/theme/'.maoo_theme().'/'.$name.'.php';
    if(file_exists($temp)) {
        return $temp;
    } else {
        return ROOT_PATH.'/theme/default/'.$name.'.php';
    }
};

function maoo_css($date) {
    $temp = ROOT_PATH.'/theme/'.maoo_theme().'/style.css';
    if(file_exists($temp)) {
        return $date->siteUrl.'/theme/'.maoo_theme().'/style.css';
    } else {
        return $date->siteUrl.'/theme/default/style.css';
    }
};

function maoo_pagesize($pagesize=false) {
    if(!$pagesize) :
        return 12;
    else :
        return $pagesize;
    endif;
};

function maoo_page_limit($page) {
    $size = maoo_pagesize();
    $a = ($page-1)*$size;
    return array($a,$size);
};

//分页功能
function maoo_pagenavi($count,$page_now,$Page_size,$siteUrl) {
	$page_count = ceil($count/$Page_size);

	$init=1;
	$page_len=5;
	$max_p=$page_count;
	$pages=$page_count;

	//判断当前页码
	if(!$page_now>0){
		$page=1;
	}else {
		$page=$page_now;
	};
	$offset = $Page_size*($page-1);
	$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数
	$pageoffset = ($page_len-1)/2;//页码个数左右偏移量

	$key='<ul class="pagination">';
	$key.="<li class='pnum disabled'><a href='javascript:;'>$page/$pages</a></li>"; //第几页,共几页
    
    if(!$_GET['m']) {
        $_GET['m'] = 'index';
    };
    
    if(!$_GET['a']) {
        $_GET['a'] = 'index';
    };

	if($_GET['m'] && $_GET['a']) {
        if($_GET['id']) :
		  $page_url = $siteUrl."?m=".$_GET['m']."&a=".$_GET['a']."&id=".$_GET['id']."&";
        elseif($_GET['type']) :
		  $page_url = $siteUrl."?m=".$_GET['m']."&a=".$_GET['a']."&type=".$_GET['type']."&";
        elseif($_GET['s']) :
            $page_url = $siteUrl."?m=".$_GET['m']."&a=".$_GET['a']."&s=".$_GET['s']."&";
        elseif($_GET['tag']) :
            $page_url = $siteUrl."?m=".$_GET['m']."&a=".$_GET['a']."&tag=".$_GET['tag']."&";
        else :
		  $page_url = $siteUrl."?m=".$_GET['m']."&a=".$_GET['a']."&";
        endif;
	} else {
        if($_GET['s'] && $_GET['type']) :
            $page_url = $siteUrl."?s=".$_GET['s']."&type=".$_GET['type']."&";
        elseif($_GET['s']) :
            $page_url = $siteUrl."?s=".$_GET['s']."&";
        else :
		  $page_url = $siteUrl."?";
        endif;
	}

	if($page!=1){
		$key.="<li class='first'><a href=\"".$page_url."page=1\">&laquo;</a></li>"; //第一页
		$key.="<li class='prev'><a href=\"".$page_url."page=".($page-1)."\">&lsaquo;</a></li>"; //上一页
	}else {
		$key.="<li class='first disabled'><a href='javascript:;'>&laquo;</a></li>";//第一页
		$key.="<li class='prev disabled'><a href='javascript:;'>&lsaquo;</a></li>"; //上一页
	}
	if($pages>$page_len){
		//如果当前页小于等于左偏移
		if($page<=$pageoffset){
			$init=1;
			$max_p = $page_len;
		}else{//如果当前页大于左偏移
			//如果当前页码右偏移超出最大分页数
			if($page+$pageoffset>=$pages+1){
				$init = $pages-$page_len+1;
			}else{
				//左右偏移都存在时的计算
				$init = $page-$pageoffset;
				$max_p = $page+$pageoffset;
			}
		}
	}
	for($i=$init;$i<=$max_p;$i++){
	if($i==$page){
		$key.='<li class="active"><a href="javascript:;">'.$i.'</a></li>';
	} else {
		$key.="<li><a href=\"".$page_url."page=".$i."\">".$i."</a></li>";
	}
	}
	if($page!=$pages){
		$key.="<li class='next'><a href=\"".$page_url."page=".($page+1)."\">&rsaquo;</a>";//下一页
		$key.="<li class='last'><a href=\"".$page_url."page={$pages}\">&raquo;</a></li>"; //最后一页
	}else {
		$key.='<li class="next disabled"><a href="javascript:;">&rsaquo;</a></li>';//下一页
		$key.='<li class="last disabled"><a href="javascript:;">&raquo;</a></li>'; //最后一页
	}
	$key.='</ul>';

	if($count>$Page_size) {
		return $key;
	}
};

//分页功能
function maoo_nextpageurl($count,$page_now,$size=false) {
	global $redis;
	if($size) {
		$Page_size = $size;
	} else {
		$Page_size = maoo_pagesize();
	};
	$page_count = ceil($count/$Page_size);

	$init=1;
	$page_len=5;
	$max_p=$page_count;
	$pages=$page_count;

	//判断当前页码
	if(empty($page_now)||$page_now<0){
		$page=1;
	}else {
		$page=$page_now;
	};
	$offset = $Page_size*($page-1);
	$page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数
	$pageoffset = ($page_len-1)/2;//页码个数左右偏移量

	if($_GET['m'] && $_GET['a']) {
        if($_GET['id']) :
		  $page_url = maoo_site_url()."?m=".$_GET['m']."&a=".$_GET['a']."&id=".$_GET['id']."&";
        elseif($_GET['type']) :
		  $page_url = maoo_site_url()."?m=".$_GET['m']."&a=".$_GET['a']."&type=".$_GET['type']."&";
        elseif($_GET['s']) :
            $page_url = maoo_site_url()."?m=".$_GET['m']."&a=".$_GET['a']."&s=".$_GET['s']."&";
        elseif($_GET['tag']) :
            $page_url = maoo_site_url()."?m=".$_GET['m']."&a=".$_GET['a']."&tag=".$_GET['tag']."&";
        else :
		  $page_url = maoo_site_url()."?m=".$_GET['m']."&a=".$_GET['a']."&";
        endif;
	} else {
        if($_GET['s'] && $_GET['type']) :
            $page_url = maoo_site_url()."?s=".$_GET['s']."&type=".$_GET['type']."&";
        elseif($_GET['s']) :
            $page_url = maoo_site_url()."?s=".$_GET['s']."&";
        else :
		  $page_url = maoo_site_url()."?";
        endif;
	}
    
	if($pages>$page_len){
		//如果当前页小于等于左偏移
		if($page<=$pageoffset){
			$init=1;
			$max_p = $page_len;
		}else{//如果当前页大于左偏移
			//如果当前页码右偏移超出最大分页数
			if($page+$pageoffset>=$pages+1){
				$init = $pages-$page_len+1;
			}else{
				//左右偏移都存在时的计算
				$init = $page-$pageoffset;
				$max_p = $page+$pageoffset;
			}
		}
	}
	if($page!=$pages){
		$key = $page_url."page=".($page+1);
	}else {
		$key = null;
	}

	if($count>$Page_size) {
		return $key;
	}
};

function maoo_user($id=null) {
    global $redis;
    if($id>=1) :
        $user = $redis->hget('user',$id);
        if($user['id']>=1) :
            return maoo_user_format($user);
        else :
            return null;
        endif;
    else :
        $id = $_SESSION['mxuserid'];
        if($id>=1) :
            $user = $redis->hget('user',$id);
            if($user['pass']==$_SESSION['mxuserpass']) :
                return maoo_user_format($user);
            else :
                return null;
            endif;
        else :
            return null;
        endif;
    endif;
};

//生成随机字符串
function maoo_rand($length = 9) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $str = '';
    for ($i = 0; $i < $length; $i++) {
        $str .= $chars[mt_rand(0, strlen($chars) - 1)];
    }
    return $str;
};


//时间格式化
function maoo_date_format($time){
    $t=time()-$time;
    $f=array(
        '31536000'=>'年',
        '2592000'=>'个月',
        '604800'=>'星期',
        '86400'=>'天',
        '3600'=>'小时',
        '60'=>'分钟',
        '1'=>'秒'
    );
    if($t<=1) {
        return '刚刚';
    } else {
        foreach ($f as $k=>$v)    {
            if (0 !=$c=floor($t/(int)$k)) {
                return $c.$v.'前';
            }
        }
    }
};

//截断
function maoo_cut_str($sourcestr,$cutlength) {
	$returnstr='';
	$i=0;
	$n=0;
	$str_length=strlen($sourcestr);//字符串的字节数
	while (($n<$cutlength) and ($i<=$str_length)) {
		$temp_str=substr($sourcestr,$i,1);
		$ascnum=Ord($temp_str);//得到字符串中第$i位字符的ascii码
		if ($ascnum>=224)    //如果ASCII位高与224，
		{
		$returnstr=$returnstr.substr($sourcestr,$i,3); //根据UTF-8编码规范，将3个连续的字符计为单个字符
		$i=$i+3;            //实际Byte计为3
		$n++;            //字串长度计1
		}
		elseif ($ascnum>=192) //如果ASCII位高与192，
		{
		$returnstr=$returnstr.substr($sourcestr,$i,2); //根据UTF-8编码规范，将2个连续的字符计为单个字符
		$i=$i+2;            //实际Byte计为2
		$n++;            //字串长度计1
		}
		elseif ($ascnum>=65 && $ascnum<=90) //如果是大写字母，
		{
		$returnstr=$returnstr.substr($sourcestr,$i,1);
		$i=$i+1;            //实际的Byte数仍计1个
		$n++;            //但考虑整体美观，大写字母计成一个高位字符
		}
		else                //其他情况下，包括小写字母和半角标点符号，
		{
		$returnstr=$returnstr.substr($sourcestr,$i,1);
		$i=$i+1;            //实际的Byte数计1个
		$n=$n+0.5;        //小写字母和半角标点等与半个高位字符宽…
		}
	}
	if ($str_length>$cutlength){
		$returnstr = $returnstr . '…';//超过长度时在尾处加上省略号
	}
	return $returnstr;
};

//序列化
function mx_serialize($obj) {
    return base64_encode(gzcompress(serialize($obj)));
    //return json_encode($obj);
    //return wddx_serialize_value($obj);
};
//反序列化
function mx_unserialize($txt) {
    if($txt) {
        return unserialize(gzuncompress(base64_decode($txt)));
        //return json_decode($txt,true);
        //return wddx_deserialize($txt);
    } else {
        return false;  
    };
};

function maoo_toShortKey($key) {
    for($i=0; $i<9; $i++) {
        if(substr($key, 0, 1)=='0') {
            $key = substr($key, 1);
        };
    };
    return $key;
};

function maoo_toLongKey($key) {
    for($i=0; $i<9; $i++) {
        if(strlen($key)<10) {
            $key = '0'.$key;
        };
    };
    return $key;
};

//判断移动设备
function maoo_is_mobile() {
	static $is_mobile;
	if ( isset($is_mobile) )
		return $is_mobile;
	if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
		$is_mobile = false;
	} elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false // many mobile devices (all iPhone, iPad, etc.)
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
		|| strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false ) {
			$is_mobile = true;
	} else {
		$is_mobile = false;
	}
	return $is_mobile;
};

//喜欢文章按钮
function maoo_like_post_btn($date,$id) {
	if($date->user) {
        if(in_array($id,$date->user->likePosts)) {
            $btn = '<a href="javascript:maoo_like_post('.$id.');" class="like_post_btn active maoo_like_post_'.$id.'"><i class="fa fa-heart"></i> 取消</a>';
        } else {
            $btn = '<a href="javascript:maoo_like_post('.$id.');" class="like_post_btn maoo_like_post_'.$id.'"><i class="fa fa-heart-o"></i> 喜欢</a>';
        }
	} else {
		$btn = '<a href="'.$date->siteUrl.'?m=user&a=login" class="like_post_btn maoo_like_post_'.$id.'"><i class="fa fa-heart-o"></i> 喜欢</a>';
	};
	return $btn;
};
function maoo_like_post_js($date) {
	if($date->user) {
		$url = $date->siteUrl.'/engine/action/likePost.php?id=';
		$js .= "<script>
		function maoo_like_post(id) {
			$.ajax({
				url: '".$url."' + id,
				type: 'GET',
				dataType: 'json',
				timeout: 9000,
				error: function() {
					alert('提交失败！');
				},
				success: function(date) {
                    if(date.status) {
                        $('.maoo_like_post_'+id).attr('href','javascript:maoo_like_post('+id+');');
					    $('.maoo_like_post_'+id).html('<i class=\'fa fa-heart\'></i> 取消');
                        $('.maoo_like_post_'+id).addClass('active');
                    } else {
                        $('.maoo_like_post_'+id).attr('href','javascript:maoo_like_post('+id+');');
					    $('.maoo_like_post_'+id).html('<i class=\'fa fa-heart-o\'></i> 喜欢');
                        $('.maoo_like_post_'+id).removeClass('active');
                    };
				}
			});
		};
		</script>";
		return $js;
	};
};

//喜欢商品
function maoo_like_product_btn($date,$id) {
	if($date->user) {
        if(in_array($id,$date->user->likeProducts)) {
            $btn = '<a href="javascript:maoo_like_product('.$id.');" class="like_product_btn active maoo_like_product_'.$id.'"><i class="fa fa-heart"></i> 取消</a>';
        } else {
            $btn = '<a href="javascript:maoo_like_product('.$id.');" class="like_product_btn maoo_like_product_'.$id.'"><i class="fa fa-heart-o"></i> 喜欢</a>';
        }
	} else {
		$btn = '<a href="'.$date->siteUrl.'?m=user&a=login" class="like_product_btn maoo_like_product_'.$id.'"><i class="fa fa-heart-o"></i> 喜欢</a>';
	};
	return $btn;
};
function maoo_like_product_js($date) {
	if($date->user) {
		$url = $date->siteUrl.'/engine/action/likeProduct.php?id=';
		$js .= "<script>
		function maoo_like_product(id) {
			$.ajax({
				url: '".$url."' + id,
				type: 'GET',
				dataType: 'json',
				timeout: 9000,
				error: function() {
					alert('提交失败！');
				},
				success: function(date) {
                    if(date.status) {
                        $('.maoo_like_product_'+id).attr('href','javascript:maoo_like_product('+id+');');
					    $('.maoo_like_product_'+id).html('<i class=\'fa fa-heart\'></i> 取消');
					    $('.maoo_like_product_'+id).addClass('active');
                    } else {
                        $('.maoo_like_product_'+id).attr('href','javascript:maoo_like_product('+id+');');
					    $('.maoo_like_product_'+id).html('<i class=\'fa fa-heart-o\'></i> 喜欢');
					    $('.maoo_like_product_'+id).removeClass('active');
                    };
				}
			});
		};
		</script>";
		return $js;
	};
};

//关注用户按钮
function maoo_follow_btn($date,$id) {
	if($date->user) {
        if(in_array($id,$date->user->follows)) {
            $btn = '<a href="javascript:maoo_follow('.$id.');" class="follow_btn active maoo_follow_'.$id.'"><i class="fa fa-star"></i> 取消</a>';
        } else {
            $btn = '<a href="javascript:maoo_follow('.$id.');" class="follow_btn maoo_follow_'.$id.'"><i class="fa fa-star-o"></i> 关注</a>';
        }
	} else {
		$btn = '<a href="'.$date->siteUrl.'?m=user&a=login" class="follow_btn maoo_follow_'.$id.'"><i class="fa fa-star-o"></i> 关注</a>';
	};
	return $btn;
};
function maoo_follow_js($date) {
	if($date->user) {
		$url = $date->siteUrl.'/engine/action/follow.php?id=';
		$js .= "<script>
		function maoo_follow(id) {
			$.ajax({
				url: '".$url."' + id,
				type: 'GET',
				dataType: 'json',
				timeout: 9000,
				error: function() {
					alert('提交失败！');
				},
				success: function(date) {
                    if(date.status) {
                        $('.maoo_follow_'+id).attr('href','javascript:maoo_follow('+id+');');
					    $('.maoo_follow_'+id).html('<i class=\'fa fa-star\'></i> 取消');
                        $('.maoo_follow_'+id).addClass('active');
                    } else {
                        $('.maoo_follow_'+id).attr('href','javascript:maoo_follow('+id+');');
					    $('.maoo_follow_'+id).html('<i class=\'fa fa-star-o\'></i> 关注');
                        $('.maoo_follow_'+id).removeClass('active');
                    };
				}
			});
		};
		</script>";
		return $js;
	};
};

//固定链接
function maoo_url($date,$m='index',$a='index',$array=false) {
	if(REWRITE_MOD) :
		if(is_array($array)) :
            foreach($array as $key=>$val) :
				$num++;
				if($num==1) :
				    $url .= '?'.$key.'='.$val;
				else :
				    $url .= '&'.$key.'='.$val;
				endif;
            endforeach;
        elseif($array) :
            $url = '?id='.$array;
        endif;
        return $date->siteUrl.'/'.$m.'-'.$a.'.html'.$url;
	else :
		if(is_array($array)) :
			foreach($array as $key=>$val) :
				$url .= '&'.$key.'='.$val;
			endforeach;
        elseif($array) :
            $url = '&id='.$array;
		endif;
		return $date->siteUrl.'/?m='.$m.'&a='.$a.$url;
	endif;
};

?>