<?php if(!defined('IN_CORP')) exit('Access Denied'); checktplrefresh('/var/www/wj/corpms/./templates/default/header.htm', 1299049648); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-loose.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml" dir="ltr" lang="zh-CN">
<head>
<title>Exam page</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<script src="./fckeditor/fckeditor.js" type="text/javascript"></script>
<!-- fancybox required file start-->
<script src="./js/jquery-1.4.3.min.js" type="text/javascript"></script>
<script src="./fancybox/jquery.fancybox-1.3.4.pack.js" type="text/javascript"></script>
<link rel="stylesheet" href="./fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
<!-- fancybox required file end-->
<script src="./js/common.js" type="text/javascript"></script>
<!-- include ajax start-->
<script src="./js/ajax.js" type="text/javascript"></script>
<!-- include ajax end-->
<!-- fancybox 调用jQuery start -->
<script type="text/javascript">
$(document).ready(function() {

/* This is basic - uses default settings */

$("a#single_image").fancybox();

/* Using custom settings */

$("a#inline").fancybox({
'hideOnContentClick': true
});

/* Apply fancybox to multiple items */

$("a.group").fancybox({
'transitionIn'	:	'elastic',
'transitionOut'	:	'elastic',
'speedIn'		:	600, 
'speedOut'		:	200, 
'overlayShow'	:	false
});

$("a.pro_des").fancybox();

$("a.show_info").fancybox();

$("a.inline").fancybox();

});
</script>
<!-- fancybox 调用jQuery end -->
</head>
<body >
<div id="wrap" class="box" >
<div id="header">

</div>
