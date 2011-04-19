<?php
//2011.02.14 --2011.02.25
	if (!defined('IN_CORP')) {
		exit('Access Denied');
	}
	permit(1);
	if($op == 'default' || $op == 'divide' || $op == 'display'){
		$count_sql = 'SELECT COUNT(*) FROM '.tname('user');
		$sql = #'SELECT * FROM '.tname('user').','.tname('group').','.tname('moderator').','.tname('corporation').' WHERE 
			'select g.*,m.*,c.*,u.* from corp_user u
				left join corp_group g on g.gid=u.gid
				left join corp_moderator m on m.uid=u.uid
				left join corp_corporation c on c.cid = m.cid
				where u.gid <= 3 
		  		ORDER BY u.gid';
		  	#$query = $db->query($sql);
		  	#var_dump(mysql_fetch_assoc($query));
		  	#exit();
		$page = isset($_GET['page']) ? max(intval($_GET['page']), 1) : 1;
		$user_arr = page_division($count_sql, $sql, $page, $page_arr);
		#var_dump($user_arr);
		$op = 'display';
		
		$sql = 'SELECT * FROM '.tname('groups');
		$query = $db->query($sql);
		$groups = array();
		while($row = $db->fetch_array($query)){
			$groups[]= $row;
		}
		
		$sql = 'SELECT * FROM '.tname('corporation');
		$query = $db->query($sql);
		$corporations = array();
		while($row = $db->fetch_array($query)){
			$corporations[]= $row;
		}
	}
	if($op == 'change'){
		//更改职位
		$sql = 'UPDATE '.tname('user')." SET gid = $_GET[gid] WHERE uid = $_GET[uid]";
		$db->query($sql);
		run_log(getcookie('uid'),getcookie('username'),"修改$_GET[uid]的管理员级别");
		header("Location: admincp.php?ac=adminmana&op=display&msg=更改完成");
	}
	if($op == 'moderator'){
		//更改负责社团
		$sql = 'REPLACE INTO '.tname('moderator')." SET cid = '$_GET[cid]', uid = '$_GET[uid]'";
		$db->query($sql);
		run_log(getcookie('uid'),getcookie('username'),"修改$_GET[uid]的管理员级别");
		header("Location: admincp.php?ac=adminmana&op=display&msg=更改完成");
	}
?>