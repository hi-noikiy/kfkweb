<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[bh];
$userid=returnuserid($_SESSION[SHOPUSER]);
$sqltask="select * from yjcode_task where bh='".$bh."' and taskty=0 and userid=".$userid."";mysql_query("SET NAMES 'GBK'");$restask=mysql_query($sqltask);
if(!$rowtask=mysql_fetch_array($restask)){php_toheader("tasklist.php");}
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
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ������� > �������� > ѡ���û�</li>
</ul>
<? $leftid=7;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("rcap17.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="g_ac0_h g_bc0_h";
 </script>

 <? include("taskv.php");?>

 <ul class="taskbjcap">
 <li class="l1">���ַ���Ϣ</li>
 <li class="l2">����</li>
 <li class="l3">���׳ɹ�</li>
 <li class="l4">����ʧ��</li>
 <li class="l5">QQ</li>
 <li class="l6">�ֻ�</li>
 <li class="l7">����</li>
 </ul>
 <?
 $ses=" where taskty=0 and bh='".$bh."'";
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,20,"yjcode_taskhf","order by sj desc");while($row=mysql_fetch_array($res)){
 while2("*","yjcode_user where id=".$row[useridhf]);$row2=mysql_fetch_array($res2);
 ?>
 <ul class="taskbj">
 <li class="l1"><?=$row2[nc]?></li>
 <li class="l2"><strong><?=$row[money1]?></strong>Ԫ</li>
 <li class="l3"><strong><?=returncount("yjcode_task where zt=5 and useridhf=".$row[useridhf]."")?></strong>��</li>
 <li class="l4"><strong><?=returncount("yjcode_task where zt=9 and useridhf=".$row[useridhf]."")?></strong>��</li>
 <li class="l5"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$row2[uqq]?>&site=<?=weburl?>&menu=yes" target="_blank"><?=$row2[uqq]?></a></li>
 <li class="l6"><?=$row2[mot]?></li>
 <li class="l7">
 <? if(0==$rowtask[zt]){?>
 <a href="taskbjsel.php?bh=<?=$bh?>&mid=<?=$row[id]?>" class="btna1">ѡ��TA</a>
 <? }elseif(3==$rowtask[zt] && $rowtask[useridhf]==$row[useridhf]){?>
 <a href="taskgts.php?bh=<?=$bh?>" class="btna2">���б�</a>
 <? }?>
 </li>
 </ul>
 <div class="taskbjsm">�������ԣ�<?=strip_tags(returnjgdw($row[txt],"","δ��д�κ�˵��"))?></div>
 <div class="taskxx"></div>
 <? }?>
 <div class="npa">
 <?
 $nowurl="taskbjlist.php";
 $nowwd="bh=".$bh;
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