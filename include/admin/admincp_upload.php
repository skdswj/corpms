<?php
//缺权限判断
//......
if (!defined('IN_CORP')) {
	exit('Access Denied');
}
header('Content-Type:text/html;charset=utf-8');
if($op == 'default' || $op == 'list'){
	$count_sql = 'SELECT COUNT(*) FROM '.tname('files');
	$sql = 'SELECT * FROM '.tname('files').' ORDER BY `date` DESC {LMT)';
	$page = isset($_GET['page']) ? max(intval($_GET['page']), 1) : 1;
	$file_arr = page_division($count_sql, $sql, $page, $page_arr);
}

if($op == 'process'){
	$gid = getcookie('gid');
	if($gid == 1){
		echo "<script>alert('您没上传文件权限');</script>";
		echo "<script>location.href='admincp.php?ac=upload';</script>";
		exit;
	}
	if (empty($_FILES['file_name']['name'])){
		echo "<script>alert('文件名不能为空');</script>";
		echo "<script>location.href='admincp.php?ac=upload';</script>";
		exit;
	}
	$oldfilename = $_FILES["file_name"]['name'];
	$rand1 = rand(0,9);
	$rand2 = rand(0,9);
	$rand3 = rand(0,9);
	$filename = $oldfilename.$rand1.$rand2.$rand3;
	$filetype = substr($oldfilename,strrpos($oldfilename,"."),strlen($oldfilename)-strrpos($oldfilename,"."));
	if ($_FILES['file_name']['size']>10485760) {
		echo "<script>alert('上传文件大小不符');</script>";
		echo "<script>location.href='admincp.php?ac=upload';</script>";
		exit;
	}
	$filename = $filename.$filetype;
	$savedir = "upfiles/".$filename;
	if (move_uploaded_file($_FILES["file_name"]['tmp_name'],$savedir)) {
		$file_name = basename($savedir);
		$description = $_POST['description'];
		$query = 'INSERT INTO '.tname('files')."(fid,date,description,originalname,savedir) VALUES(	NULL,now(),'$description','$oldfilename','$savedir')";
		if($db->query($query)){
			echo "<script>location.href='admincp.php?ac=upload';</script>";
		}
		exit;
	}
	else {
		echo "<script language=javascript>";
		echo "alert('上传失败');";
		echo "location.href='admincp.php?ac=upload';";
		echo "</script>";
		exit;
	}
}
?>