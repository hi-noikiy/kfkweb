<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();

$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}
$sfz1="../../upload/".$rowuser[id]."/".strgb2312($rowuser[sfz],0,15)."-1.jpg";
$sfz2="../../upload/".$rowuser[id]."/".strgb2312($rowuser[sfz],0,15)."-2.jpg";
$sfz3="../../upload/".$rowuser[id]."/".strgb2312($rowuser[sfz],0,15)."-3.jpg";
?>
<html>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>��Ա���� <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>

</head>
<body>
<? include("top.php");?>

<div class="boxcap box">
 <div class="d1"><a href="../">�û�����</a> - ʵ����֤</div>
</div>

<div class="uk box"><div class="d11">��֤״̬��</div><div class="d21"><? 
if(0==$rowuser[sfzrz]){echo "<strong class='blue'>���ύ���ϣ����������֤�������ĵȴ�</strong>";}
elseif(1==$rowuser[sfzrz]){echo "<strong class='green'>�Ѿ�ͨ��ʵ����֤</strong>";}
elseif(2==$rowuser[sfzrz]){echo "<strong class='red'>��֤���ܣ�ԭ��".$rowuser[sfzrzsm]."</strong>";}
elseif(3==$rowuser[sfzrz]){echo "<strong>δ�ύ��֤����</strong>";}
?></div></div>
<div class="uk box"><div class="d11">��ʵ������</div><div class="d21"><?=$rowuser[uname]?></div></div>
<div class="uk box"><div class="d11">���֤�ţ�</div><div class="d21"><?=$rowuser[sfz]?></div></div>

<? if(2==$rowuser[sfzrz] || 3==$rowuser[sfzrz]){?>
<form name="f1" action="smrz1.php">
<div class="tjbutton box">
 <div class="d0"></div>
 <? tjbtnr_m("��ʼ��֤");?>
 <div class="d0"></div>
</div>
</form>
<? }?>

<? if(is_file($sfz1)){?>
<div class="listcap box"><div class="d2">���֤���棺</div></div>
<div class="tishi box">
<div class="d1"><a href="<?=$sfz1?>" target="_blank"><img border="0" src="<?=$sfz1?>" width="170" height="100" /></a></div>
</div>
<? }?>

<? if(is_file($sfz2)){?>
<div class="listcap box"><div class="d2">���֤���棺</div></div>
<div class="tishi box">
<div class="d1"><a href="<?=$sfz2?>" target="_blank"><img border="0" src="<?=$sfz2?>" width="170" height="100" /></a></div>
</div>
<? }?>

<? if(is_file($sfz3)){?>
<div class="listcap box"><div class="d2">�ֳ����֤��Ƭ��</div></div>
<div class="tishi box">
<div class="d1"><a href="<?=$sfz3?>" target="_blank"><img border="0" src="<?=$sfz3?>" width="170" height="100" /></a></div>
</div>
<? }?>


<? include("bottom.php");?>
</body>
</html>