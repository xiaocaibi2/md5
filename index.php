<?php
/*
*Author:md5.lol
*http://www.md5.lol
*/

$time_start = microtime(true);


if(!empty($_POST)&&!empty($_POST['q'])){
	
	$e = trim($_POST['q']);
	if((strlen($e) == 16) || (strlen($e) == 32))
	{
		set_time_limit(0);				//不限定脚本执行时间
		$q=strip_tags(trim($e));
		$url = "http://www.md5.lol/api/md5/".$q;
		$results=file_get_contents($url);
		$obj=json_decode($results); 
	}else{
		$obj= array("s" => false,"r" => "本站仅支持md5密文"); 
		$obj = json_decode(json_encode($obj));
	}
		
	
	
}
 
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>单页版md5解密- Powered By md5.lol </title>
<meta name="copyright" content="md5.lol" />
<meta name="keywords" content="md5解密,32位md5解密,16位md5解密" />
<meta name="description" content="每个人也许都有一个梦想,打造自己的md5解密网站,www.md5.lol帮你完成心愿,只要将本程序放到PHP网络空间,即可调用400亿条md5记录(www.md5.lol/api/md5)为您的用户解密" />
<link rel="stylesheet" type="text/css" href="html/default.css" />
	<style type="text/css">
	body,td,th {
	color: #FFF;
}
    a:link {
	color: #0C0;
	text-decoration: none;
}
    body {
	background-color: #000;
}
    a:visited {
	text-decoration: none;
	color: #999;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
	color: #F00;
}
    </style>
<script>
<!--
    function check(form){
if(form.q.value==""){
  alert("请输入密文！本站仅支持md5密文");
  form.q.focus();
  return false;
 }
}
-->
</script>
	</head>
	<body>
	<div id="container"><div id="header"><a href="http://www.md5.lol" ><h1>免费md5解密</h1></a></div><br /><br />

<form name="from" method="post">
			<div id="content"><div id="create_form"><label>请输入密文：<input class="inurl" size="26" id="unurl" name="q" value="<?php echo !empty($q)?$q:''; ?>"/></label>
	<p class="ali"><label for="alias">即将上线同IP查询域名服务:</label><span><a href="http://www.md5.lol/api/ip" title="IP反查域名">了解详情</a></span></p><p class="but"><input onclick="check(form)" type="submit" value="Search" class="submit" /></p>
		</form></div>﻿
		<?php
		if(isset($obj)){
			if($obj->s)
			{
				echo '<ul>恭喜,解密成功:<font color=#ffff00><strong>';
				echo $obj->r;
				echo '</strong><br /><li>数据来源:<a href="http://www.md5.lol/api/md5">www.md5.lol</a><br /></li></font>';
				echo '</ul>';
				
			}else
			{
				echo '<ul>解密失败,进入后台破解...';
				echo '</ul>';
			}
			
		}
		?>
		<div id="nav">
</div>
<div id="footer">
<p>md5解密 ©2015-2016 Powered By <a href="http://www.md5.lol/" target="_blank">md5.lol<a></p>
</div>
</body>
</html>