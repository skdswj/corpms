<?php
if (!defined('IN_CORP')) {
	exit('Access Denied');
}

$uid = getcookie('uid');

$sql = 'SELECT * FROM '.tname('pubnotice').' ORDER BY `nid` DESC ';
$query = $db->query($sql);
$pubnotices = array();
while ($pubnotice = $db->fetch_array($query)){
	$pubnotices[]=$pubnotice;
}

$sql = "SELECT * FROM ".tname('user_corporation')." WHERE uid = $uid AND is_accept = 1";
$co_arr = $db->fetch_all($sql);
if(!empty($co_arr))ssetcookie('had_reg','已注册');
else ssetcookie('had_reg','未注册');
?>