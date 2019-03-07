<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$ses=" where 1=1";
 
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
<script language="javascript">
function ser(){
location.href="gglist.php?st1="+$("st1").value+"&zt="+$("zt").value;	
}
</script>
</head>
<body>
<?php include("top.html");?>
<script language="javascript">
$("menu2").className="l41";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0202,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

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
 <li class="l1">当前位置：后台首页 - <strong>通知管理</strong></li><li class="l2"></li>
 </ul>

 <!--B-->
 <div class="listkuan">
 
 <ul class="typecap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">&nbsp;网站公告信息</li>
  <li class="l3">用户</li>
 <li class="l4">最后更新</li>
 
 </ul>
 <ul class="typecon">
 <li class="l1">
 <a href="javascript:checkDEL(40,'yjcode_tz')" class="a2">删除</a>
 <a href="tz.php" class="a1">发布通知</a>
 </li>
 </ul>
 <?
 pagef($ses,20,"yjcode_msg","order by sj desc");while($row=mysql_fetch_array($res)){
 
 ?>
 <ul class="typelist2" onmouseover="this.className='typelist2 typelist21';" onmouseout="this.className='typelist2';">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l2" onclick="gourl('<?=$aurl?>')">&nbsp;<?=returntitdian($row["title"],65)?></li>
  <li class="l3"><?=$row[user]?></li>
 <li class="l4"><?=$row[sj]?></li>
 
 </ul>
 <? }?>
 <?
 $nowurl="tzlist.php";
 $nowwd="zt=".$_GET[zt]."&st1=".$_GET[st1];
 include("page.html");
 ?>

 </div>
 <!--E-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>