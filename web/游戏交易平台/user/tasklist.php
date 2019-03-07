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
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 任务大厅 > 我是雇主 > 单人任务</li>
</ul>
<? $leftid=7;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("rcap17.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="g_ac0_h g_bc0_h";
 </script>

 <ul class="ksedi">
 <li class="l1"><label><input name="C2" type="checkbox" onclick="xuan()" /> 全选</label></li>
 <li class="l2">
 <a href="javascript:NcheckDEL(3,'yjcode_task')" class="a1">删除</a>
 <a href="../task/taskadd.php" class="a2">发布任务</a>
 </li>
 </ul>

 <ul class="taskcap">
 <li class="l1">任务</li>
 <li class="l2">预算</li>
 <li class="l3">报名</li>
 <li class="l4">最高报价</li>
 <li class="l5">最低报价</li>
 <li class="l6">操作</li>
 </ul>
  
 <?
 $ses=" where taskty=0 and userid=".$luserid;
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,20,"yjcode_task","order by sj desc");while($row=mysql_fetch_array($res)){
 while1("*","yjcode_taskhf where bh='".$row[bh]."' order by money1 desc");$row1=mysql_fetch_array($res1);$moneyg=$row1[money1];$moneyg=returnjgdw($moneyg,"",0);
 while1("*","yjcode_taskhf where bh='".$row[bh]."' order by money1 asc");$row1=mysql_fetch_array($res1);$moneyd=$row1[money1];$moneyd=returnjgdw($moneyd,"",0);
 $bmnum=returncount("yjcode_taskhf where bh='".$row[bh]."' and userid=".$luserid);
 taskok($row["id"]);
 ?>
 <ul class="tasklist">
 <li class="l0"><? if($row[zt]==0 || $row[zt]==1 || $row[zt]==2|| $row[zt]==5 || $row[zt]==6 || $row[zt]==7 || $row[zt]==9 || $row[zt]==10){?><input name="C1" type="checkbox" value="<?=$row[bh]?>" /><? }?></li>
 <li class="l1">
 <a href="../task/view<?=$row[id]?>.html" target="_blank" title="<?=$row[tit]?>"><?=returntitdian($row[tit],40)?></a><span class="zt"><?=returntask($row[zt])?></span>
 <span class="sj">发布时间：<?=$row[sj]?></span>
 </li>
 <li class="l2">
 <strong><?=$row[money1]?></strong>元
 <? if(!empty($row[money2])){?>
 <span class="zb">中标:<?=$row[money2]?>元</span>
 <? }?>
 </li>
 <li class="l3"><strong><?=$bmnum?></strong>人</li>
 <li class="l4"><strong><?=$moneyg?></strong>元</li>
 <li class="l5"><strong><?=$moneyd?></strong>元</li>
 <li class="l6">
 <? if($bmnum>0 && empty($row[zt])){?>
 <a href="taskbjlist.php?bh=<?=$row[bh]?>" class="btna btna3">选择用户</a>
 <? }?>
 <? if(4==$row[zt]){?>
 <a href="taskys.php?bh=<?=$row[bh]?>" class="btna btna1">进行验收</a>
 <? }?>
 <? if(!empty($row[useridhf])){?>
 <a href="taskgts.php?bh=<?=$row[bh]?>" class="btna btna2">沟通记录</a>
 <? }?>
 </li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="tasklist.php";
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