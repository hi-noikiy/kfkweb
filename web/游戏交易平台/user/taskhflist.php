<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="css/task.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript">
function myok(x,y){
if(!confirm("您确定已经完成该任务了吗？")){return false;}
location.href="taskhflist.php?control=ok&id="+x+"&bh="+y;
}
function myclo(x,y){
if(!confirm("您确认要取消该任务吗？")){return false;}
location.href="taskhflist.php?control=clo&id="+x+"&bh="+y;
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 我接手的单人任务</li>
</ul>
<? $leftid=7;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("rcap9.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="g_ac0_h g_bc0_h";
 </script>

 <ul class="ksedi">
 <li class="l1"><label><input name="C2" type="checkbox" onclick="xuan()" /> 全选</label></li>
 <li class="l2">
 <a href="javascript:NcheckDEL('3a','yjcode_taskhf')" class="a1">删除</a>
 <a href="../task/" target="_blank" class="a2">去找任务</a>
 </li>
 </ul>

 <ul class="taskhfcap">
 <li class="l1">任务</li>
 <li class="l2">雇主预算</li>
 <li class="l3">报价</li>
 <li class="l4">状态</li>
 <li class="l5">操作</li>
 </ul>
  
 <?
 $ses=" where taskty=0 and useridhf=".$luserid;
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"yjcode_taskhf","order by sj desc");while($row=mysql_fetch_array($res)){
 while1("*","yjcode_task where bh='".$row[bh]."'");$row1=mysql_fetch_array($res1);
 $au="../task/view".$row1[id].".html";
 ?>
 <ul class="taskhflist">
 <li class="l0"><? if($row[ifxz]==0){?><input name="C1" type="checkbox" value="<?=$row[bh]?>" /><? }?></li>
 <li class="l1"><a href="<?=$au?>" title="<?=$row1[tit]?>" target="_blank"><?=strgb2312(strip_tags($row1[tit]),0,100)?></a><span class="sj"><?=$row[sj]?></span></li>
 <li class="l2"><strong><?=$row1[money1]?></strong>元</li>
 <li class="l3"><strong><?=$row[money1]?></strong>元</li>
 <li class="l4">
 <? if(3==$row1[zt] && $row1[useridhf]==$luserid){?>
 <span class="s1">已中标</span>
 <span class="s2"><?=$row[rwdq]?><br>前提交验收</span>
 <? }else{?><span class="zt"><?=returntask($row1[zt])?></span><? }?>
 &nbsp;
 </li>
 <li class="l5">
 <? if(3==$row1[zt]){?>
 <a href="taskysjs.php?bh=<?=$row[bh]?>" class="btna btna1">请验收</a>
 <? }?>
 <a href="taskgt.php?bh=<?=$row[bh]?>" class="btna btna3">沟通记录</a>
 </li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="taskhflist.php";
 $nowwd="";
 require("page.html");
 ?>
 </div>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>