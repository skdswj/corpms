<?php if(!defined('IN_CORP')) exit('Access Denied'); checktplrefresh('/var/www/wj/corpms/templates/default/admin//userinfo.htm', 1297688156); ?>
<div class="main_header">
<div id="icon-center" class="icon32"><br /></div>
<h2>会员管理</h2>
</div>
<div class="content">
<table border="1" >
<tr><td>ID</td><td><?php echo $userinfo['uid']; ?></td></tr>
<tr><td>姓名</td><td><?php echo $userinfo['username']; ?></td></tr>
<tr><td>学号</td><td><?php echo $userinfo['number']; ?></td></tr>
<tr><td>性别</td><td><?php if($userinfo['sex']=0) { ?>女<?php } else { ?>男<?php } ?></td></tr>
<tr><td>学院</td><td><?php echo $userinfo['coname']; ?></td></tr>
<tr><td>专业</td><td><?php echo $userinfo['major']; ?></td></tr>
<tr><td>班级</td><td><?php echo $userinfo['class']; ?></td></tr>
<tr><td>联系方式</td><td><?php echo $userinfo['phone']; ?></td></tr>
<tr><td>用户类型</td><td><?php echo $userinfo['gname']; ?></td></tr>
<tr><td>社团</td><td>s</td></tr>
</table>

</div>