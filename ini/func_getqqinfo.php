<?php
/**
 * QQ昵称/头像API 
 * 2020.09.29 更新api，同时更换api页面内容获取方式为curl，编码转换也由mb_convert_encoding 换成 iconv
 */
 
header("content-Type: text/html; charset=Utf-8");
$type = @$_GET['type'] ? $_GET['type'] : '';
if(empty($type)){
	//header("Location:http://www.inlojv.com/");
	exit;
}
if($type == "getqqnickname"){
	$qq = isset($_GET['qq']) ? addslashes(trim($_GET['qq'])) : '';
	if(!empty($qq) && is_numeric($qq) && strlen($qq) > 4 && strlen($qq) < 13){
		
		// curl方法
		$api_url = 'http://r.qzone.qq.com/fcg-bin/cgi_get_portrait.fcg?uins='.$qq;
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, $api_url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1); //是否抓取跳转后的页面，如果不加这一条则会返回302
		$page_content = curl_exec($ch);
		if($page_content){
			// $page_content = mb_convert_encoding($page_content, "UTF-8", "GBK"); // 有的服务器使用mb_convert_encoding进行编码转换会报500，所以用iconv
			$page_content = iconv('GBK','UTF-8',$page_content); // 编码转换
			echo $page_content; // 返回类似：portraitCallBack({"984636180":["http://qlogo1.store.qq.com/qzone/984636180/984636180/100",143,-1,0,0,0,"v大叔",0]}) 这样的内容
		}
		
		
	}
}
if($type == "getqqavatar"){
	$qq = isset($_GET['qq']) ? addslashes(trim($_GET['qq'])) : '';
	if(!empty($qq) && is_numeric($qq) && strlen($qq) > 4 && strlen($qq) < 13){
 
		// curl方法
		$api_url = 'http://ptlogin2.qq.com/getface?appid=1006102&imgtype=3&uin='.$qq;
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, $api_url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1); //是否抓取跳转后的页面，如果不加这一条则会返回302
		$qqavatar = curl_exec($ch);
 
		if($qqavatar){
			echo str_replace("pt.setHeader","qqavatarCallBack",$qqavatar);
		}
	}
}