<?php if(!defined('IN_CORP')) exit('Access Denied'); checktplrefresh('/var/www/wj/corpms/templates/default/admin//corpora.htm', 1299050294); ?>
<?php if($op == 'default' || $op == 'display') { ?>
<div class="main_header">
<div id="icon-center" class="icon32"><br /></div>
<h2>社团管理</h2>
</div>
<div class="content">
<h3><a href="admincp.php?ac=corpora&amp;op=show_add">添加社团</a></h3>	
<table border="1" >
<tr><td>ID</td><td>社团名称</td><td>学院</td><td colspan="3">操作</td></tr><?php if(is_array($corp_arr)) { foreach($corp_arr as $corp) { ?><tr>
<td><?php echo $corp['cid']; ?></td>
<td><a href="admincp.php?ac=corpora&amp;op=showinfo&amp;cid=<?php echo $corp['cid']; ?>" ><?php echo $corp['cname']; ?></a></td>
<td><?php echo $corp['coname']; ?></td>
<td><a href="admincp.php?ac=corpora&amp;op=show_change&amp;cid=<?php echo $corp['cid']; ?>" >修改</a></td>
<td><a href="admincp.php?ac=corpora&amp;op=add_info&amp;cid=<?php echo $corp['cid']; ?>" >添加附加信息</a></td>
<td><a href="admincp.php?ac=corpora&amp;op=del&amp;cid=<?php echo $corp['cid']; ?>" >注销</a></td>
</tr><?php } } ?></table>
<!-- 页码显示段 -->
<?php if($page > $page_arr[0]) { ?><a href="admincp.php?ac=corpora&amp;page=<?php echo $page-1; ?>">上一页</a>&nbsp;<?php } if(is_array($page_arr)) { foreach($page_arr as $no) { if($no != $page) { ?>
&nbsp;<a href="admincp.php?ac=corpora&amp;page=<?php echo $no; ?>"><?php echo $no; ?></a>
<?php } else { ?>
&nbsp;<?php echo $no; } } } if($page < $no) { ?>&nbsp;<a href="admincp.php?ac=corpora&amp;page={$page+1}">下一页</a><?php } ?>
</div>
<?php } if($op == 'showinfo') { ?>
<div class="main_header">
<div id="icon-center" class="icon32"><br /></div>
<h2>社团信息</h2>
</div>
<div class="content">
<table border="1" >
<tr><td>ID</td><td><?php echo $cinfo['cid']; ?></td></tr>
<tr><td>社团名称</td><td><?php echo $cinfo['cname']; ?></td></tr>
<tr><td>学院</td><td><?php echo $cinfo['coname']; ?></td></tr>
<tr><td>分类</td><td><?php echo $cinfo['tname']; ?></td></tr>
<tr><td>会费</td><td><?php echo $cinfo['dues']; ?></td></tr>
<tr><td>社团简介</td><td><?php echo $cinfo['information']; ?></td></tr>
<tr><td>附加信息</td><td><?php echo $cinfo['others']; ?></td></tr>
<tr><td><a href="admincp.php?ac=corpora&amp;op=show_change&amp;cid=<?php echo $cinfo['cid']; ?>" >修改</a></td>
<td><a href="admincp.php?ac=corpora&amp;op=del&amp;cid=<?php echo $cinfo['cid']; ?>" >注销</a></td></tr>
</table>
</div>
<?php } if($op == 'show_add') { ?>
<div class="main_header">
<div id="icon-center" class="icon32"><br /></div>
<h2>添加社团</h2>
</div>
<div class="content">
<form action="admincp.php?ac=corpra&amp;op=add" method="post">
<label for="cname">社团名称：</label><input type="text" id="cname" name="cname" />
<label for="cid">社团编号：</label><input type="text" id="cid" name="cid" />
<label for="dues">会费：</label><input type="text" id="dues" name="dues" />
<label for="dues">会费：</label><input type="text" id="dues" name="dues" />
所属学院：<select name="coid">
<?php echo loop; ?>
<option value="<?php echo $co['coid']; ?>"><?php echo $co['cname']; ?></option>
{/loop}		        
        </select>
所属类型：<select name="tid">
<?php echo loop; ?>
<option value="<?php echo $type['tid']; ?>"><?php echo $type['tname']; ?></option>
{/loop}		        
        </select>
社团简介：<textarea name="info"></textarea>
附加信息：<textarea name="others"></textarea>
</form>
</div>
<?php } ?>


