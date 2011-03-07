<?php
//2011.02.14
	if (!defined('IN_CORP')) {
		exit('Access Denied');
	}
	if($op == 'default' || $op == 'display'){
		$count_sql = 'SELECT COUNT(*) FROM '.tname('corporation');
		$sql = 'SELECT `cid`,`cname`,`coname` FROM '.tname('corporation').','.tname('college').' WHERE corp_college.coid = corp_corporation.coid ORDER BY `cid` DESC {LMT)';
		$page = isset($_GET['page']) ? max(intval($_GET['page']), 1) : 1;
		$corp_arr = page_division($count_sql, $sql, $page, $page_arr);
	}
	if($op == 'showinfo'){
		//显示社团信息
		$sql = 'SELECT * FROM '.tname('corporation').','.tname('college').','.tname('type').' WHERE corp_college.coid = corp_corporation.coid AND corp_type.tid = corp_corporation.tid AND `cid` = "'.$_GET['cid'].'"';
		//echo $sql;		
		$cinfo = $db->fetch_first($sql);
		
	}
	if($op == 'show_add'){
		//显示添加社团	
		$cosql = 'SELECT * FROM '.tname('college');
		$co_arr = $db->fetch_all($cosql);
		//print_r($co);
		$tysql = 'SELECT * FROM '.tname('type');
		$t_arr = $db->fetch_all($tysql);
	}
	if($op == 'add'){
		//添加社团	
		$cid = $_POST['cid'];
		$cname = $_POST['cname'];
		$coid = $_POST['coid'];
		$dues = $_POST['dues'];
		$tid = $_POST['tid'];
		$information = $_POST['info'];
		$others = $_POST['others'];
		$maxnum = $_POST['maxnum'];
		$sql = "INSERT INTO ".tname('corporation')."(cid,cname,coid,dues,tid,information,others,maxnum,curnum) VALUES ('$cid','$cname','$coid','$dues','$tid','$information','$others','$maxnum','0')";	
		$db->query($sql);
	}
	if($op == 'show_change'){
		//显示更改社团信息
		$sql = 'SELECT * FROM '.tname('corporation').','.tname('college').','.tname('type').' WHERE corp_college.coid = corp_corporation.coid AND corp_type.tid = corp_corporation.tid AND `cid` = "'.$_GET['cid'].'"';		
		$cinfo = $db->fetch_first($sql);	
		$cosql = 'SELECT * FROM '.tname('college');
		$co_arr = $db->fetch_all($cosql);
		//print_r($cinfo);
		$tysql = 'SELECT * FROM '.tname('type');
		$t_arr = $db->fetch_all($tysql);
	}
	if($op == 'change'){
		//更改社团信息
		$cid = $_GET['cid'];
		$cname = $_POST['cname'];
		$coid = $_POST['coid'];
		$dues = $_POST['dues'];
		$tid = $_POST['tid'];
		$information = $_POST['info'];
		$others = $_POST['others'];
		$maxnum = $_POST['maxnum'];
		$curnum = $_POST['curnum'];
		$sql = "UPDATE ".tname('corporation')." SET cname='$cname',coid='$coid',dues='$dues',tid='$tid',information='$information',others='$others',maxnum='$maxnum',curnum='$curnum' WHERE cid = '$cid'";
		$db->query($sql);
	}
	if($op == 'del'){
		//注销社团
		$sql = 'DELETE FROM '.tname('corporation').' WHERE `cid` = '.$_GET['cid'].' LIMIT 1';
		$db->query($sql);
		$usql = 'DELETE FROM '.tname('user_corporation').' WHERE `cid` = '.$_GET['cid'];
		$db->query($usql);
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: admincp.php?ac=corpora&op=display");
	}
?>