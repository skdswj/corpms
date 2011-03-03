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
		//print_r($cinfo);
	}
	if($op == 'show_add'){
		//显示添加社团	
	}
	if($op == 'add'){
		//添加社团	
	}
	if($op == 'show_change'){
		//显示更改社团信息		
		
	}
	if($op == 'change'){
		//更改社团信息
	}
	if($op == 'del'){
		//删除社团
	}
?>