<?php
if (!defined('IN_CORP')) {
	exit('Access Denied');
}

$sql = 'SELECT * FROM '.tname('pubnotice').' ORDER BY `nid` DESC ';
$query = $db->query($sql);
$pubnotices = array();
while ($pubnotice = $db->fetch_array($query)){
	$pubnotices[]=$pubnotice;
}
?>