<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$ses=" where zt<>99 and taskty=1";
if($_GET[st1]!=""){$ses=$ses." and tit like '%".$_GET[st1]."%'";}
if($_GET[zt]!=""){$ses=$ses." and zt=".$_GET[zt];}
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
location.href="tasklist1.php?st1="+$("st1").value;	
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
 <li class="l1">当前位置：后台首页 - 任务大厅 - <strong>多人任务</strong></li><li class="l2"></li>
 </ul>
 
 <div class="rights">
 &nbsp;<strong>提示：</strong><br>
 &nbsp;<span class="red">删除交易中的记录，会导致会员资金不同步，请慎重</span>
 </div>

 <!--B-->
 <div class="listkuan">
 <ul class="psel">
 <li class="l1">关键词：</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l3"><a href="javascript:ser()" class="a2">搜索</a></li>
 </ul>
 <ul class="typecap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">&nbsp;任务主题</li>
 <li class="l15">审核</li>
 <li class="l3">参与任务</li>
 <li class="l4">发起时间</li>
 <li class="l7">操作</li>
 </ul>
 <ul class="typecon">
 <li class="l1">
 <a href="javascript:checkDEL('21a','yjcode_task')" class="a2">删除</a>
 </li>
 </ul>
 <?
 pagef($ses,20,"yjcode_task","order by sj desc");while($row=mysql_fetch_array($res)){
 $aurl="task1.php?id=".$row[id];
 taskok($row["id"]);
 ?>
 <ul class="typelist2" onmouseover="this.className='typelist2 typelist21';" onmouseout="this.className='typelist2';">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[bh]?>" /></li>
 <li class="l2" onclick="gourl('<?=$aurl?>')">&nbsp;<?=strgb2312($row["tit"],0,78)?></li>
 <li class="l15"><?=returntask($row[zt])?></li>
 <li class="l3"><?=returncount("yjcode_taskhf where bh='".$row[bh]."'")?></li>
 <li class="l4"><?=$row[sj]?></li>
 <li class="l7">
 <a href="<?=$aurl?>">编辑</a> | <a href="../task/view<?=$row[id]?>.html" target="_blank">预览</a>
 </li>
 </ul>
 <? }?>
 <?
 $nowurl="tasklist1.php";
 $nowwd="st1=".$_GET[st1]."&zt=".$_GET[zt];
 include("page.html");
 ?>

 </div>
 <!--E-->
 
</div>

</div>

<?php include("bottom.html");?>
</body>
</html>