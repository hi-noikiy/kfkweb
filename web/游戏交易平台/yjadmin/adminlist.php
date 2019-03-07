<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$ses=" where id>0";
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>管理系统</title>
<link href="css/default.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js"></script>
</head>
<body>
<?php include("top.html");?>
<script language="javascript">
$("menu2").className="l21";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="adminmain">

<div class="left">
 <div class="lefttop"></div>
 <div class="leftmain">
 <?php include("menu_user.php");?>
 </div>
 <div class="lefttop"></div>
</div>

<div class="right" id="right">
 <ul class="wz">
 <li class="l1">当前位置：后台首页 - 管理员 - 列表</li><li class="l2"></li>
 </ul>
 
 <!--begin-->
 <div class="listkuan">
 <ul class="typecap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l11">&nbsp;管理员帐号</li>
 <li class="l14">称呼</li>
 <li class="l10">操作</li>
 </ul>
 <ul class="typecon">
 <li class="l1">
 <a href="javascript:checkDEL(11,'yjcode_admin')" class="a1">删除管理员</a>
 <a href="admin.php" class="a2">新增</a>
 </li>
 </ul>
 <?
 pagef($ses,20,"yjcode_admin","order by id desc");
 while($row=mysql_fetch_array($res)){
 $aurl="admin.php?action=update&id=".$row[id];
 ?>
 <ul class="typelist1" onmouseover="this.className='typelist1 typelist11';" onmouseout="this.className='typelist1';">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l11" onclick="gourl('<?=$aurl?>')">&nbsp;<strong><?=$row[adminuid]?></strong></li>
 <li class="l14"><?=$row[uname]?></li>
 <li class="l10"><a href="<?=$aurl?>">编辑</a></li>
 </ul>
 <? }?>
 <?
 $nowurl="adminlist.php";
 $nowwd="";
 include("page.html");
 ?>
 </div>
 <!--end-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>