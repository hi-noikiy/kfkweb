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
<title>�û�������� - <?=webname?></title>
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
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ������� > ���ǹ��� > ��������</li>
</ul>
<? $leftid=7;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("rcap17.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="g_ac0_h g_bc0_h";
 </script>

 <ul class="ksedi">
 <li class="l1"><label><input name="C2" type="checkbox" onclick="xuan()" /> ȫѡ</label></li>
 <li class="l2">
 <a href="javascript:NcheckDEL(3,'yjcode_task')" class="a1">ɾ��</a>
 <a href="../task/taskadd.php" class="a2">��������</a>
 </li>
 </ul>

 <ul class="taskcap">
 <li class="l1">����</li>
 <li class="l2">Ԥ��</li>
 <li class="l3">����</li>
 <li class="l7">�������</li>
 <li class="l6">����</li>
 </ul>
  
 <?
 $ses=" where taskty=1 and userid=".$luserid;
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"yjcode_task","order by sj desc");while($row=mysql_fetch_array($res)){
 taskok($row["id"]);
 ?>
 <ul class="tasklist">
 <li class="l0"><? if($row[zt]==0 || $row[zt]==1 || $row[zt]==2|| $row[zt]==5 || $row[zt]==6 || $row[zt]==7 || $row[zt]==9){?><input name="C1" type="checkbox" value="<?=$row[bh]?>" /><? }?></li>
 <li class="l1">
 <a href="../task/view<?=$row[id]?>.html" target="_blank" title="<?=$row[tit]?>"><?=returntitdian($row[tit],40)?></a><span class="zt"><?=returntask($row[zt])?></span>
 <span class="sj">����ʱ�䣺<?=$row[sj]?></span>
 </li>
 <li class="l2">
 <strong><?=$row[money1]?></strong>Ԫ
 <span class="zb">����:<?=sprintf("%.0f",$row[money1]/$row[tasknum])?>Ԫ</span>
 </li>
 <li class="l3"><strong><?=$row[tasknum]?></strong>��</li>
 <li class="l7">
 <span class="s1">ʣ��<strong><?=$row[tasknum]-$row[taskcy]?></strong>��</span>
 <span class="s2"></span>
 <span class="s3" style="width:<? $okbfb=$row[taskcy]/$row[tasknum];echo 100*$okbfb;?>px;"></span>
 <span class="s4"><?=sprintf("%.2f",$okbfb*100)?>%</span>
 </li>
 <li class="l6">
 <?
 $needys=returncount("yjcode_taskhf where bh='".$row[bh]."' and taskty=1 and zt=1");
 ?>
 <? if($needys>0){?>
 <a href="taskbjlist1.php?bh=<?=$row[bh]?>&zt=1" class="btna btna1">��������</a>
 <? }?>
 <? if($row[zt]==100){?>
 <a href="taskmoney.php?bh=<?=$row[bh]?>" class="btna btna1">���ɷ���</a>
 <? }?>
 </li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="tasklist1.php";
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