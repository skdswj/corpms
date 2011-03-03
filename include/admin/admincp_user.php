<?php
//2011.02.14 --2011.02.25
	if (!defined('IN_CORP')) {
		exit('Access Denied');
	}
	if($op == 'default' || $op == 'display'){
		$count_sql = 'SELECT COUNT(*) FROM '.tname('user');
		$sql = 'SELECT * FROM '.tname('user').','.tname('college').' WHERE corp_college.coid = corp_user.coid ORDER BY `uid` DESC {LMT)';
		$page = isset($_GET['page']) ? max(intval($_GET['page']), 1) : 1;
		$user_arr = page_division($count_sql, $sql, $page, $page_arr);
	}
	if($op == 'showinfo'){
		//显示会员信息
		$sql = 'SELECT * FROM '.tname('user').','.tname('college').','.tname('group').','.tname('major')
				.' WHERE corp_college.coid = corp_user.coid AND corp_user.gid = corp_group.gid AND corp_user.mid = corp_major.mid AND `uid` = '.$_GET['uid'];
		$userinfo = $db->fetch_first($sql);
		$cosql = 'SELECT * FROM '.tname('user_corporation').','.tname('duty').','.tname('corporation').' WHERE corp_user_corporation.did = corp_duty.did AND corp_user_corporation.cid = corp_corporation.cid AND `uid` = '.$_GET['uid'];
		$co_arr = $db->fetch_all($cosql);
	}
	if($op == 'show_change'){
		//显示更改会员信息
		$sql = 'SELECT * FROM '.tname('user').','.tname('college').','.tname('group')
				.' WHERE corp_college.coid = corp_user.coid AND corp_user.gid = corp_group.gid AND	`uid` = '.$_GET['uid'];
		$userinfo = $db->fetch_first($sql);
		$cosql = 'SELECT * FROM '.tname('user_corporation').','.tname('duty').','.tname('corporation').' WHERE corp_user_corporation.did = corp_duty.did AND corp_user_corporation.cid = corp_corporation.cid AND `uid` = '.$_GET['uid'];
		$co_arr = $db->fetch_all($cosql);
		$grsql = 'SELECT * FROM '.tname('group');
		$gr_arr = $db->fetch_all($grsql);
		$dusql = 'SELECT * FROM '.tname('duty');
		$du_arr = $db->fetch_all($dusql);
		$colsql = 'SELECT * FROM '.tname('college');
		$col_arr = $db->fetch_all($colsql);
		$msql = 'SELECT * FROM '.tname('major').' WHERE `coid` = '.$userinfo['coid'];
		$m_arr = $db->fetch_all($msql);		
	}
	if($op == 'change'){
		//更改信息
		$username = $_POST['username'];
		$uid = $_GET['uid'];
		$sex = $_POST['sex'];
		$number = $_POST['number'];
		$coid = $_POST['coid'];
		$mid = $_POST['mid'];
		$class = $_POST['class'];
		$phone = $_POST['phone'];
		$gid = $_POST['gid'];
		print_r($_POST);
		if(is_array($_POST['did'])){
		foreach($_POST['did'] as $key => $did){
				//echo $key;
				$sql = 'UPDATE '.tname('user_corporation').' SET did = "'.$did.'" WHERE cid = "'.$key.'"';
				$db->query($sql);					
		}
		}
		$sql = "UPDATE ".tname('user')." SET username='$username',uid='$uid',sex='$sex',number='$number',coid='$coid',mid='$mid',class='$class',phone='$phone',gid='$gid' WHERE uid = '$uid'";
		//print_r($_POST);
		//echo $sql;
		$db->query($sql);
		//显示更改后信息		
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: admincp.php?ac=user&op=showinfo&uid={$uid}");
	}
	if($op == 'new_psw'){
		//更改密码
		$newpsw = encrypt($_POST['newpsw']);
		$sql = 'UPDATE '.tname('user').' SET password = "'.$newpsw.'" WHERE uid = "'.$_GET['uid'].'"';
		$db->query($sql);
	}
	if($op == 'del'){
		//删除会员
		$sql = 'DELETE FROM '.tname('user').' WHERE `uid` = '.$_GET['uid'].' LIMIT 1';
		$db->query($sql);
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: admincp.php?ac=user&op=display");
	}
	
?>