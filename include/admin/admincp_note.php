<?php
//2011.02.14 --2011.02.25
	if (!defined('IN_CORP')) {
		exit('Access Denied');
	}
	
	
	if($op == 'default' || $op == 'divide' || $op == 'display'){
		$count_sql = 'SELECT COUNT(*) FROM '.tname('note');
		$sql = 'SELECT * FROM '.tname('user').','.tname('note').' WHERE '.tname('user').'.uid = '.tname('note').'.uid ORDER BY `nid` DESC {LMT)';
		$msg = '所有会员';
		$page = isset($_GET['page']) ? max(intval($_GET['page']), 1) : 1;
		$note_arr = page_division($count_sql, $sql, $page, $page_arr);
		$op = 'display';
	}
	if($op == 'showinfo'){
		//显示会员信息
		$sql = 'SELECT * FROM '.tname('user').','.tname('note')." WHERE nid = $_GET[nid] and ".tname('user').'.uid = '.tname('note').'.uid';
		$noteinfo = $db->fetch_first($sql);
		#$cosql = 'SELECT * FROM '.tname('user_corporation').','.tname('duty').','.tname('corporation').' WHERE corp_user_corporation.did = corp_duty.did AND corp_user_corporation.cid = corp_corporation.cid AND `uid` = '.$_GET['uid'];
		#$co_arr = $db->fetch_all($cosql);
	}
	if($op == 'new'){
		//更改信息
		global $uid;
		global $username;
		permit(4);
		run_log($uid,$username,"留言");
		$sql = "INSERT INTO ".tname('note')."(uid,title,content) VALUES ('$uid','".saddslashes(comstrag_tags($_POST['title']))."','".saddslashes(comstrag_tags($_POST['content']))."')";	
		$db->query($sql);
		//显示更改后信息
		header("Location: admincp.php?ac=note&op=display&msg=留言成功");
	}
	if($op == 'del'){
		//删除留言
		permit(2); #管理员以上可以删除留言
		run_log($uid,$username,"删除留言");
		$sql = 'DELETE FROM '.tname('note').' WHERE `nid` = '.$_GET['nid'].' LIMIT 1';
		$db->query($sql);
		header("Location: admincp.php?ac=note&op=display&msg=留言已删除");
	}
	
?>