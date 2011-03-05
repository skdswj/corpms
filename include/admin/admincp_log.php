<?php
	if (!defined('IN_CORP')) {
		exit('Access Denied');
	}
	if($op == 'default' || $op == 'display'){
		$count_sql = 'SELECT COUNT(*) FROM '.tname('log');
		$sql = 'SELECT * FROM '.tname('log').' ORDER BY `date` DESC {LMT)';
		$page = isset($_GET['page']) ? max(intval($_GET['page']), 1) : 1;
		$log_arr = page_division($count_sql, $sql, $page, $page_arr);
	}
?>