<?php
	require '../include/common.inc.php';
	if (!defined('IN_CORP')) {
		exit('Access Denied');
	}
	$op = $_GET['op'];
	$uid = getcookie('uid');
	
	if($op == 'left_corp')
	{
		$cid = $_GET['cid'];
		echo '确定要退出社团吗？<br />';		
		echo '<a href="admincp.php?ac=corpora&op=left_corp&cid='.$cid.'">确定</a>&nbsp;';
		echo '<a href="admincp.php?ac=corpora&op=had_in">取消</a>';
	}
	if($op == 'apply')
	{
		//申请社团
		$cid = $_GET['cid'];
		$sql = 'SELECT COUNT(*) as sum FROM '.tname('user_corporation').' WHERE `uid`='.$uid;
		$sum = $db->fetch_first($sql);
		if($sum['sum'] == 1)
		{
			echo '您已经申请了一个社团！<br />';
			echo '<a href="admincp.php?ac=corpora&op=apply&cid='.$cid.'">继续申请</a>&nbsp;';
			echo '<a href="admincp.php?ac=corpora&op=display">取消申请</a>';
		}
		elseif($sum['sum'] >= 2){
			//申请过多
			echo '您申请的社团数量过多，请到校社联继续申请！<br />';
			echo '<a href="admincp.php?ac=corpora&op=display">我已了解</a>';
		}
		/*$sql = 'SELECT COUNT(*) as sum FROM '.tname('user_corporation').' WHERE `uid`='.$uid.' AND cid="'.$_GET['cid'].'"';
		$sum = $db->fetch_first($sql);
		if($sum['sum'] > 0){
			//已经申请过
			header('Content-Type:text/html;charset=utf-8');
			echo "<script type=\"text/javascript\">alert('您已经申请该社团');location.href='admincp.php?ac=corpora';</script>";
		}*/
	}
?>