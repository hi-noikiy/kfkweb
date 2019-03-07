<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$ses=" where zt<>99";
if($_GET[st1]!=""){$ses=$ses." and tit like '%".$_GET[st1]."%'";}
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
location.href="helplist.php?st1="+$("st1").value;	
}
</script>
</head>
<body>
<?php include("top.html");?>
<script language="javascript">
$("menu5").className="l51";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0602,")){echo "<div class='noneqx'>无权限</div>";exit;}?>

<div class="adminmain">

<div class="left">
 <div class="lefttop"></div>
 <div class="leftmain">
 <?php include("menu_ad.php");?>
 </div>
 <div class="lefttop"></div>
</div>

<div class="right" id="right">
 <ul class="wz">
 <li class="l1">当前位置：后台首页 - <strong>帮助中心</strong></li><li class="l2"></li>
 </ul>

 <!--B-->
 <div class="listkuan">
 <ul class="psel">
 <li class="l1">关键词：</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l3"><a href="javascript:ser()" class="a2">搜索</a></li>
 </ul>
 <ul class="typecap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">&nbsp;帮助主题</li>
 <li class="l15">分组</li>
 <li class="l3">关注</li>
 <li class="l4">最后更新</li>
 <li class="l7">操作</li>
 </ul>
 <ul class="typecon">
 <li class="l1">
 <a href="javascript:checkDEL(2,'yjcode_help')" class="a2">删除</a>
 <a href="helplx.php" class="a1">发布内容</a>
 </li>
 </ul>
 <?
 pagef($ses,20,"yjcode_help","order by sj desc");while($row=mysql_fetch_array($res)){
 $aurl="help.php?bh=".$row[bh];
 ?>
 <ul class="typelist2" onmouseover="this.className='typelist2 typelist21';" onmouseout="this.className='typelist2';">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2" onclick="gourl('<?=$aurl?>')">&nbsp;<?=strgb2312($row["tit"],0,78)?></li>
 <li class="l15"><?=returnhelptype(1,$row[ty1id])?></li>
 <li class="l3"><?=$row[djl]?></li>
 <li class="l4"><?=$row[sj]?></li>
 <li class="l7">
 <a href="<?=$aurl?>">修改</a> | <a href="#" target="_blank">预览</a>
 </li>
 </ul>
 <? }?>
 <?
 $nowurl="helplist.php";
 $nowwd="st1=".$_GET[st1];
 include("page.html");
 ?>

 </div>
 <!--E-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>