<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$ddbh=$_GET[ddbh];
?>
<html>
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
<!--����E-->
<div class="yjcode">


<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ΢�Ž���</li>
</ul>
<? $leftid=5;include("left.php");?>

<!--RB-->
<div class="right" style="height:700px;">
 <ul class="wz">
 <li class="l0">��ѡ��</li>
 <li class="g_ac0_h g_bc0_h" id="rcap1">΢�Ž���</li>
 </ul>
 
<div id="wxpay_t1">
<iframe name="wxpay_f" id="wxpay_f" marginwidth="1" marginheight="1" frameborder="0" height="100%" width="100%" border="0" src="wxpay/example/buy_native.php?ddbh=<?=$ddbh?>"></iframe>
</div>
 
</div>
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>