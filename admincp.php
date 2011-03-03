<?php
  //  echo "hello!";
define('NOROBOT', TRUE);
define('INCORPADMIN', TRUE);
require_once './include/common.inc.php';
include_once './fckeditor/fckeditor.php';
/*if(!getcookie('is_admin')){
	echo "<script language=javascript>alert('您没有权限进行此操作！');location.href='cp.php?ac=home';</script>";
	exit;
}*/
//$tplrefresh = 1; //是否自动更新模板缓存
$tpldir = 'templates/default/admin/';
$styleid ='admin'; //模板id号
$timeout = 60; //模板缓存文件过期时间
$language = include CORP_ROOT.$tpldir.'/language.php'; //language.php的编码需要和系统的编码一致

$ac = isset($_GET['ac'])?$_GET['ac']:'index';
$op = isset($_GET['op'])?$_GET['op']:'default';

//用户信息
$uid = getcookie('uid');
$username = getcookie('username');
$gid = getcookie('gid');

include_once(CORP_ROOT.'./include/admin/admincp_'.$ac.'.php');
include_once template("default");
include_once template("$ac");

?>
