<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
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

<div class="listcap box"><div class="d2">������ң�����ͳ��</div></div>
<div class="iorder box">
 <div class="d1"  >�������<br><strong><?=sprintf("%.2f",$rowuser[money1])?></strong></div>
 <div class="d1" >��֤��<br><strong><?=sprintf("%.2f",$rowuser[baomoney])?></strong></div>
 <div class="d1" >������<br><strong><?=sprintf("%.2f",$rowuser[djmoney])?></strong></div>
 
</div>

<div class="listcap box"><div class="d2">���ò˵�����</div></div>

<div class="usermenu box">
 <div class="d1" onClick="gourl('pay.php')"><img src="img/pay.png" /><br>ȥ��ֵ</div>
 <div class="d1" onClick="gourl('car.php')"><img src="img/car.png" /><br>���ﳵ</div>
 <div class="d1" onClick="gourl('favpro.php')"><img src="img/fav.png" /><br>�ղؼ�</div>
 <div class="d1 d0" onClick="gourl('/user/productlx.php')"><img src="img/txjl.png" /><br>��Ҫ��</div>
</div>

<div class="usermenu box">
 <div class="d1" onClick="gourl('emailbd.php')"><img src="img/mail.png" /><br>������</div>
 <div class="d1" onClick="gourl('mobbd.php')"><img src="img/mot.png" /><br>�ֻ���</div>
 <div class="d1" onClick="gourl('inf.php')"><img src="img/inf.png" /><br>��������</div>
 <div class="d1 d0" onClick="gourl('txsz.php')"><img src="img/tixian.png" /><br>��������</div>
</div>

<div class="usermenu box">
 <div class="d1" onClick="gourl('paylog.php')"><img src="img/tx.png" /><br>�ʽ��¼</div>
 <div class="d1" onClick="gourl('jflog.php')"><img src="img/jf.png" /><br>������ϸ</div>
 <div class="d1" onClick="gourl('smrz.php')"><img src="img/smrz.png" /><br>ʵ����֤</div>
 <div class="d1 d0" onClick="gourl('tixianlog.php')"><img src="img/txjl.png" /><br>���ּ�¼</div>
</div>

<div class="usermenu box">
  <div class="d1 d0" onClick="gourl('tixian.php')"><img src="img/qu.png" /><br>ȥ����</div>
 <div class="d1" onClick="gourl('jflog.php')"> <br> </div>
 <div class="d1" onClick="gourl('smrz.php')"> <br> </div>
 <div class="d1 d0" onClick="gourl('tixianlog.php')"> <br> </div>
</div>

<? include("bottom.php");?>
</body>
</html>