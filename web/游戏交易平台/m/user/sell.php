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
<? include("top_sell.php");?>

<div class="listcap box"><div class="d2">�������ң�����ͳ��</div></div>
<div class="iorder box">
 <div class="d1" onClick="gourl('sellorder.php?ddzt=wait')">��Ҫ����<br><strong><?=returncount("yjcode_order where selluserid=".$rowuser[id]." and ddzt='wait'");?></strong></div>
 <div class="d1" onClick="gourl('sellorder.php?ddzt=db')">�ȴ��ջ�<br><strong><?=returncount("yjcode_order where selluserid=".$rowuser[id]." and ddzt='db'");?></strong></div>
 <div class="d1" onClick="gourl('sellorder.php?ddzt=back')">�����˿�<br><strong><?=returncount("yjcode_order where selluserid=".$rowuser[id]." and ddzt='back'");?></strong></div>
 <div class="d1" onClick="gourl('sellorder.php?ddzt=suc')">���׳ɹ�<br><strong><?=returncount("yjcode_order where selluserid=".$rowuser[id]." and ddzt='suc'");?></strong></div>
 <div class="d1 d0" onClick="gourl('paylog.php')">�������<br><strong><?=sprintf("%.2f",$rowuser[money1])?></strong></div>
</div>

<? include("bottom.php");?>
</body>
</html>