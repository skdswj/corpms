<?php
	//功能：登录
	//最后修改时间：2011.2.12
	if (!defined('IN_CORP')) {
		exit('Access Denied');
	}
	$error_message = '';
	if (count($_POST)){
	
			$user = $db->fetch_first('SELECT uid,username,password,gid FROM '.tname('user').' WHERE `username`=\''.$_POST['username'].'\' AND `password`=\''.encrypt($_POST['password']).'\'');
			if(empty($user)){
				//login error	
				$error_message = '用户名或密码错误';
			}
			else{
				//user login success
				ssetcookie('uid',$user['uid']);
				ssetcookie('username',$user['username']);
				ssetcookie('gid',$user['gid']);	
				header("HTTP/1.1 301 Moved Permanently");
				header("Location: admincp.php?ac=index");
				exit;
			}
	}
	include template('header');
	include template('login');
?>
