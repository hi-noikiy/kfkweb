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

<div class="boxcap box">
 <div class="d1"><a href="../">�û�����</a> - �û�����</div>
</div>

<div class="shezhi box" onClick="gourl('pwd.php')"><div class="d1"></div><div class="d2">�޸�����</div><div class="d3"><img src="../img/icon1.png" /></div></div>
<div class="shezhi box" onClick="gourl('touxiang.php')"><div class="d1"></div><div class="d2">����ͷ��</div><div class="d3"><img src="../img/icon1.png" /></div></div>
<div class="shezhi box" onClick="gourl('shdzlist.php')"><div class="d1"></div><div class="d2">�ջ���ַ</div><div class="d3"><img src="../img/icon1.png" /></div></div>

<? include("bottom.php");?>
</body>
</html>