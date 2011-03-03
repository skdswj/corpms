<?php if(!defined('IN_CORP')) exit('Access Denied'); checktplrefresh('/var/www/wj/corpms/./templates/default/login.htm', 1299049648); ?>
<form action="cp.php?ac=login" method="post">
<input type="text" name="username" />
<input type="password" name="password" />
<?php echo $error_message; ?><input type="submit" />
</form>