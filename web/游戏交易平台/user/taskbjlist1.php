<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[bh];
$userid=returnuserid($_SESSION[SHOPUSER]);
$sqltask="select * from yjcode_task where bh='".$bh."' and taskty=1 and userid=".$userid."";mysql_query("SET NAMES 'GBK'");$restask=mysql_query($sqltask);
if(!$rowtask=mysql_fetch_array($restask)){php_toheader("tasklist1.php");}
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

 <? include("taskv1.php");?>

 <ul class="taskbjcap1">
 <li class="l1">���ַ���Ϣ</li>
 <li class="l2">Ӷ��</li>
 <li class="l3">QQ</li>
 <li class="l4">�ֻ�</li>
 <li class="l5">״̬</li>
 <li class="l6">����</li>
 </ul>
 <?
 $ses=" where taskty=1 and bh='".$bh."'";
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,20,"yjcode_taskhf","order by sj desc");while($row=mysql_fetch_array($res)){
 while2("*","yjcode_user where id=".$row[useridhf]);$row2=mysql_fetch_array($res2);
 ?>
 <ul class="taskbj1">
 <li class="l1"><?=$row2[nc]?></li>
 <li class="l2"><strong><?=$row[money1]?></strong>Ԫ</li>
 <li class="l3"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$row2[uqq]?>&site=<?=weburl?>&menu=yes" target="_blank"><?=$row2[uqq]?></a></li>
 <li class="l4"><?=$row2[mot]?></li>
 <li class="l5"><?=returntask1($row[zt])?></li>
 <li class="l6">
 <? if(1==$row[zt]){?>
 <a href="taskys1.php?bh=<?=$bh?>&hfid=<?=$row[id]?>" class="btna1">��������</a>
 <? }?>
 </li>
 </ul>
 <div class="taskbjsm">�������ԣ�<?=strip_tags(returnjgdw($row[txt],"","δ��д�κ�˵��"))?></div>
 <div class="taskxx"></div>
 <? }?>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>