<?
include("../config/conn.php");
include("../config/function.php");
include("../config/tpclass.php");
sesCheck();
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
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
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ����������֤</li>
</ul>
<? $leftid=1;include("left.php");?>
<!--RB-->
<div class="right">
 <ul class="wz">
 <li class="l0"></li>
 <li class="l1 l2"><a href="openshoprz.php">������֤</a></li>
 <li class="l1"><a href="openshop1.php">��Ҫ����</a></li>
 </ul>
 
 <ul class="uk">
 <li class="l1">��ܰ��ʾ��</li>
 <li class="l21 red"><strong>�𾴵��û����ѣ������ύ������֤��Ϣ�������뿪��</strong></li>
 </ul>

 <? if($rowuser[sfzrz]!=0 && $rowuser[sfzrz]!=1 && strstr($rowcontrol[shoprz],"xcf3xcf")){?>
 <ul class="urz1">
 <li class="l1 err">ʵ����֤</li>
 <li class="l2">ͨ��ʵ����֤������������Ϊ���ṩ���õķ���</li>
 <li class="l3"><a href="smrz.php">�ύ��֤</a></li>
 </ul>
 <? }?>

 <? if(1!=$rowuser[ifmot] && strstr($rowcontrol[shoprz],"xcf1xcf")){?>
 <ul class="urz1">
 <li class="l1 err">�ֻ���</li>
 <li class="l2">�������ֻ�������ע��ʱ���ʺ��ϣ�����ʻ����ʽ�ȫ��</li>
 <li class="l3"><a href="mobbd.php">���ֻ�</a></li>
 </ul>
 <? }?>
 
 <? if(1!=$rowuser[ifemail] && strstr($rowcontrol[shoprz],"xcf2xcf")){?>
 <ul class="urz1">
 <li class="l1 err">���������</li>
 <li class="l2">�������ǵ�¼����ʱ������ͨ�������һ�����</li>
 <li class="l3"><a href="emailbd.php">������</a></li>
 </ul>
 <? }?>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>