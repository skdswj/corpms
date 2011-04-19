<?php
//2011.02.14 --2011.02.25
	if (!defined('IN_CORP')) {
		exit('Access Denied');
	}
	
	
	if($op == 'default' || $op == 'divide' || $op == 'display'){
		$count_sql = 'SELECT COUNT(*) FROM '.tname('pubnotice');
		$sql = 'SELECT * FROM '.tname('user').','.tname('pubnotice').' WHERE '.tname('user').'.uid = '.tname('pubnotice').'.uid ORDER BY `nid` DESC {LMT)';
		$msg = '所有会员';
		$page = isset($_GET['page']) ? max(intval($_GET['page']), 1) : 1;
		$pubnotice_arr = page_division($count_sql, $sql, $page, $page_arr);
		$op = 'display';
	}
	if($op == 'showinfo' || $op == 'show_change'){
		//显示会员信息
		$sql = 'SELECT * FROM '.tname('user').','.tname('pubnotice')." WHERE nid = $_GET[nid] and ".tname('user').'.uid = '.tname('pubnotice').'.uid';
		$pubnoticeinfo = $db->fetch_first($sql);
		#$cosql = 'SELECT * FROM '.tname('user_corporation').','.tname('duty').','.tname('corporation').' WHERE corp_user_corporation.did = corp_duty.did AND corp_user_corporation.cid = corp_corporation.cid AND `uid` = '.$_GET['uid'];
		#$co_arr = $db->fetch_all($cosql);
	}
	if($op == 'new'){
		//更改信息
		global $uid;
		global $username;
		permit(2);
		run_log($uid,$username,"公告");
		$sql = "INSERT INTO ".tname('pubnotice')."(uid,title,content) VALUES ('$uid','".saddslashes($_POST['title'])."','".saddslashes($_POST['content'])."')";	
		$db->query($sql);
		//显示更改后信息
		header("Location: admincp.php?ac=pubnotice&op=display&msg=发表完成");
	}
	if($op == 'del'){
		//删除留言
		permit(2); #管理员以上可以删除留言
		run_log($uid,$username,"删除留言");
		$sql = 'DELETE FROM '.tname('pubnotice').' WHERE `nid` = '.$_GET['nid'].' LIMIT 1';
		$db->query($sql);
		header("Location: admincp.php?ac=pubnotice&op=display&msg=删除完成");
	}
	if($op == 'change'){
		//更改信息
		permit(2);
		run_log($uid,$username,"修改公告");
		$sql = "UPDATE ".tname('pubnotice')." SET uid=$uid,title='".saddslashes($_POST['title'])."',content='".saddslashes($_POST['content'])."' WHERE nid=$_GET[nid]";	
		$db->query($sql);
		//显示更改后信息
		header("Location: admincp.php?ac=pubnotice&op=display&msg=修改完成");
	}
?>