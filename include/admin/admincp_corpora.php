<?php
//2011.02.14
	if (!defined('IN_CORP')) {
		exit('Access Denied');
	}
	if($op == 'default' || $op == 'display'){
		$count_sql = 'SELECT COUNT(*) FROM '.tname('corporation');
		$sql = 'SELECT `cid`,`corpid`,`cname`,`coname` FROM '.tname('corporation').','.tname('college').' WHERE corp_college.coid = corp_corporation.coid ORDER BY `cid` DESC {LMT)';
		$page = isset($_GET['page']) ? max(intval($_GET['page']), 1) : 1;
		$corp_arr = page_division($count_sql, $sql, $page, $page_arr);
	}
	if($op == 'showinfo'){
		//显示社团信息
		$cid = $_GET['cid'];
		$sql = 'SELECT * FROM '.tname('corporation').','.tname('college').','.tname('type')." WHERE corp_college.coid = corp_corporation.coid AND corp_type.tid = corp_corporation.tid AND `cid` = $cid";	
		$cinfo = $db->fetch_first($sql);
		$sql = 'SELECT * FROM '.tname('user_corporation')." WHERE uid=$uid AND cid=$cid";
		$had = $db->fetch_first($sql);
		$hadin = !empty($had)?true:false;
		$sql = 'select corp_user_corporation.*,corp_user.username from '.tname('user_corporation').','.tname('user').' where corp_user_corporation.uid = corp_user.uid and cid = '.$cinfo['cid'].' and did = 1';
		$user = $db->fetch_first($sql);
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
		$corpid = $_POST['corpid'];
		$cname = $_POST['cname'];
		$coid = $_POST['coid'];
		$dues = $_POST['dues'];
		$tid = $_POST['tid'];
		$information = $_POST['info'];
		$others = $_POST['others'];
		$maxnum = $_POST['maxnum'];
		$sql = "INSERT INTO ".tname('corporation')."(corpid,cname,coid,dues,tid,information,others,maxnum,curnum) VALUES ('$corpid','$cname','$coid','$dues','$tid','$information','$others','$maxnum','0')";	
		$db->query($sql);
		$cid = $db->insert_id();
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: admincp.php?ac=corpora&op=showinfo&cid=$cid");	
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
		$corpid = $_POST['corpid'];
		$cname = $_POST['cname'];
		$coid = $_POST['coid'];
		$dues = $_POST['dues'];
		$tid = $_POST['tid'];
		$information = $_POST['info'];
		$others = $_POST['others'];
		$maxnum = $_POST['maxnum'];
		$curnum = $_POST['curnum'];
		$sql = "UPDATE ".tname('corporation')." SET corpid='$corpid',cname='$cname',coid='$coid',dues='$dues',tid='$tid',information='$information',others='$others',maxnum='$maxnum',curnum='$curnum' WHERE cid = '$cid'";
		$db->query($sql);
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: admincp.php?ac=corpora&op=showinfo&cid=$cid");	
	}
	if($op == 'del'){
		//注销社团
		if($gid >= 2){
		echo "<script>alert('您没注销社团权限');</script>";
		echo "<script>location.href='admincp.php?ac=corpora&op=display';</script>";
		exit;
		}

		$sql = 'DELETE FROM '.tname('corporation').' WHERE `cid` = "'.$_GET['cid'].'" LIMIT 1';
		$db->query($sql);
		$usql = 'DELETE FROM '.tname('user_corporation').' WHERE `cid` = "'.$_GET['cid'].'"';
		$db->query($usql);				
	
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: admincp.php?ac=corpora&op=display&msg=删除成功！");
		
	}
	if($op == 'apply'){
		$sql = 'INSERT INTO '.tname('user_corporation')." VALUES($uid,'$_GET[cid]',0,0)";
		$db->query($sql);
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: admincp.php?ac=corpora&op=display");
	}
	if($op == 'add_info')
	{
		if(!$_POST)
		{
			$cid = $_GET['cid'];
			$sql = 'SELECT `others` FROM '.tname('corporation')." WHERE `cid`='$cid'";
			$c_arr = $db->fetch_first($sql);
			$others = $c_arr['others'];
		}
		else
		{
			$others = $_POST['others'];
			$cid = $_GET['cid'];
			$sql = 'UPDATE '.tname('corporation')." SET `others`='$others' WHERE cid='$cid'";
			$db->query($sql);
			header("HTTP/1.1 301 Moved Permanently");
			header("Location: admincp.php?ac=corpora&op=showinfo&cid=$cid");	
		}		
	}
	if($op == 'had_in')
	{
		$sql = 'select * from '.tname('user_corporation').','.tname('college').','.tname('corporation')." where corp_college.coid = corp_corporation.coid AND corp_user_corporation.cid=corp_corporation.cid and uid=$uid";
		$corp_arr = $db->fetch_all($sql);	
	}
	if($op == 'left_corp')
	{
		$cid = $_GET['cid'];
		$sql = "DELETE FROM ".tname('user_corporation')." WHERE uid = $uid AND cid = $cid LIMIT 1";
		$db->query($sql);
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: admincp.php?ac=corpora&op=had_in");
	}
?>
