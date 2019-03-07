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
<title>会员中心 <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<? include("top.php");?>

<div class="boxcap box">
 <div class="d1"><a href="../">用户中心</a> - 用户设置</div>
</div>

<div class="shezhi box" onClick="gourl('pwd.php')"><div class="d1"></div><div class="d2">修改密码</div><div class="d3"><img src="../img/icon1.png" /></div></div>
<div class="shezhi box" onClick="gourl('touxiang.php')"><div class="d1"></div><div class="d2">设置头像</div><div class="d3"><img src="../img/icon1.png" /></div></div>
<div class="shezhi box" onClick="gourl('shdzlist.php')"><div class="d1"></div><div class="d2">收货地址</div><div class="d3"><img src="../img/icon1.png" /></div></div>

<? include("bottom.php");?>
</body>
</html>