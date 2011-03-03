<?php if(!defined('IN_CORP')) exit('Access Denied'); checktplrefresh('/var/www/wj/corpms/templates/default/admin//user.htm', 1299050299); ?>
<?php if($op == 'default' || $op == 'display') { ?>
<div class="main_header">
<div id="icon-center" class="icon32"><br /></div>
<h2>会员管理</h2>
</div>
<div class="content">
<table border="1" >
<tr><td>ID</td><td>姓名</td><td>学号</td><td>学院</td><td colspan="3">操作</td></tr><?php if(is_array($user_arr)) { foreach($user_arr as $user) { ?><tr><td><?php echo $user['uid']; ?></td><td><a href="admincp.php?ac=user&amp;op=showinfo&amp;uid=<?php echo $user['uid']; ?>" ><?php echo $user['username']; ?></a></td><td><?php echo $user['number']; ?></td><td><?php echo $user['coname']; ?></td><td><a href="admincp.php?ac=user&amp;op=show_change&amp;uid=<?php echo $user['uid']; ?>" >修改</a></td><td><a href="admincp.php?ac=user&amp;op=new_password&amp;uid=<?php echo $user['uid']; ?>" >修改密码</a></td><td><a href="admincp.php?ac=user&amp;op=del&amp;uid=<?php echo $user['uid']; ?>" >删除</a></td></tr><?php } } ?></table>
<!-- 页码显示段 -->
<?php if($page > $page_arr[0]) { ?><a href="admincp.php?ac=user&amp;page=<?php echo $page-1; ?>">上一页</a>&nbsp;<?php } if(is_array($page_arr)) { foreach($page_arr as $no) { if($no != $page) { ?>
&nbsp;<a href="admincp.php?ac=user&amp;page=<?php echo $no; ?>"><?php echo $no; ?></a>
<?php } else { ?>
&nbsp;<?php echo $no; } } } if($page < $no) { ?>&nbsp;<a href="admincp.php?ac=user&amp;page={$page+1}">下一页</a><?php } ?>
</div>
<?php } if($op == 'showinfo') { ?>
<div class="main_header">
<div id="icon-center" class="icon32"><br /></div>
<h2>会员信息</h2>
</div>
<div class="content">
<table border="1" >
<tr><td>ID</td><td><?php echo $userinfo['uid']; ?></td></tr>
<tr><td>姓名</td><td><?php echo $userinfo['username']; ?></td></tr>
<tr><td>学号</td><td><?php echo $userinfo['number']; ?></td></tr>
<tr><td>性别</td><td><?php if($userinfo['sex'] == 0) { ?>女<?php } else { ?>男<?php } ?></td></tr>
<tr><td>学院</td><td><?php echo $userinfo['coname']; ?></td></tr>
<tr><td>专业</td><td><?php echo $userinfo['mname']; ?></td></tr>
<tr><td>班级</td><td><?php echo $userinfo['class']; ?></td></tr>
<tr><td>联系方式</td><td><?php echo $userinfo['phone']; ?></td></tr>
<tr><td>用户类型</td><td><?php echo $userinfo['gname']; ?></td></tr>
<tr><td>社团</td><td>职务</td></tr>
<?php if($co_arr == array()) { ?>
<tr><td>无</td><td>无</td></tr>
<?php } else { if(is_array($co_arr)) { foreach($co_arr as $co) { ?>		
<tr><td><?php echo $co['cname']; ?></td><td><?php echo $co['dname']; ?></td></tr><?php } } } ?>
<tr><td><a href="admincp.php?ac=user&amp;op=show_change&amp;uid=<?php echo $userinfo['uid']; ?>" >修改</a></td><td><a href="admincp.php?ac=user&amp;op=del&amp;uid=<?php echo $userinfo['uid']; ?>" >删除</a></tr>
<tr><td colspan="2"><a href="admincp.php?ac=user&amp;op=new_password&amp;uid=<?php echo $user['uid']; ?>" >修改密码</a></td></tr>
</table>
</div>
<?php } if($op == 'show_change') { ?>
<div class="main_header">
<div id="icon-center" class="icon32"><br /></div>
<h2>会员信息修改</h2>
</div>
<div class="content">
<form action="admincp.php?ac=user&amp;op=change&amp;uid=<?php echo $userinfo['uid']; ?>" method="post">
姓名：<input type="text" name="username" value="<?php echo $userinfo['username']; ?>" /><br />
学号：<input type="text" name="number" value="<?php echo $userinfo['number']; ?>" /><br />
性别：<input type="radio" name="sex" value="1" <?php if($userinfo['sex'] == 1) { ?>checked = "checked"<?php } ?> />男<input type="radio" name="sex" value="0" <?php if($userinfo['sex'] == 0) { ?> checked = "checked"<?php } ?> />女<br />
学院：<select name="coid"><?php if(is_array($col_arr)) { foreach($col_arr as $col) { if($col['coid'] == $userinfo['coid']) { $select = 'selected = "selected"'; } else { $select = ''; } ?>
<option value="<?php echo $col['coid']; ?>" <?php echo $select; ?>><?php echo $col['coname']; ?></option><?php } } ?>  </select><br />
专业：<select name="mid"><?php if(is_array($m_arr)) { foreach($m_arr as $m) { if($m['mid'] == $userinfo['mid']) { $select = 'selected = "selected"'; } else { $select = ''; } ?>
<option value="<?php echo $m['mid']; ?>" <?php echo $select; ?>><?php echo $m['mname']; ?></option><?php } } ?>  </select><br />
班级：<input type="text" name="class" value="<?php echo $userinfo['class']; ?>" /><br />
联系方式：<input type="text" name="phone" value="<?php echo $userinfo['phone']; ?>" /><br />
所在社团：<?php if($co_arr != array()) { ?>	
<table border="1">
<tr><td>社团名称</td><td>职务</td><td>操作</td></tr><?php if(is_array($co_arr)) { foreach($co_arr as $co) { ?><tr>
<td><?php echo $co['cname']; ?></td>
<td><?php if(is_array($du_arr)) { foreach($du_arr as $du) { if($co['did'] == $du['did']) { $check = 'checked = "checked"'; } else { $check = ''; } ?>
<input type="radio" name="did[<?php echo $co['cid']; ?>]" value="<?php echo $du['did']; ?>" <?php echo $check; ?> /><?php echo $du['dname']; ?>
 <?php } } ?></td>
<td><a href="">退出社团</a></td>
</tr>					<?php } } ?></table>
<?php } else { ?>无<br /><input type="hidden" name="did" value="" />
<?php } ?>
用户类型：<?php if(is_array($gr_arr)) { foreach($gr_arr as $gr) { if($userinfo['gid'] == $gr['gid']) { $check = 'checked = "checked"'; } else { $check = ''; } ?>
<input type="radio" name="gid" value="<?php echo $gr['gid']; ?>" <?php echo $check; ?> /><?php echo $gr['gname']; ?>
  <?php } } ?><br /><input type="submit" value="修改"/>
</form>
</div>	
<?php } if($op == 'new_password') { ?>
<div class="main_header">
<div id="icon-center" class="icon32"><br /></div>
<h2>修改密码</h2>
</div>
<div class="content">
<form action="admincp.php?ac=user&amp;op=new_psw&amp;uid=<?php echo $_GET['uid']; ?>" method="post">
<label for="newpsw">输入新密码</label><input type="password" id="newpsw" name="newpsw"/><br />
<label for="newpsw2">再次输入密码</label><input type="password" id="newpsw2" name="newpsw2"/><br />
<input type="submit" value="提交" />
</form>
</div>
<?php } if($op == 'new_psw') { ?>
<div class="main_header">
<div id="icon-center" class="icon32"><br /></div>
<h2>修改密码</h2>
</div>
<div class="content">
<h1>修改成功！</h1><br />
<h3><a href="admincp.php?ac=user">返回</a></h3>		
</div>
<?php } ?>
