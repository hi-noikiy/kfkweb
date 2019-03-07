<?
include("../../config/conn.php");
include("../../config/function.php");
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no" />
<title>所有分类 - 手机版<?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="../js/basic.js" type="text/javascript"></script>
</head>
<body>
<div class="contact box"><div class="d1"><a href="../"><img src="../img/logo.png" /></a></div></div>

<div class="shezhi box"><div class="d1"><img src="../img/regmot.png" /></div><div class="d2">联系电话</div><div class="d3"><img src="../img/icon1.png" /></div></div>
<div class="txt box">
 <div class="d1"><?=$rowcontrol[webtelv]?></div>
</div>
<div class="shezhi box"><div class="d1"><img src="../img/regqq.png" /></div><div class="d2">客服QQ</div><div class="d3"><img src="../img/icon1.png" /></div></div>
<div class="txt box">
 <div class="d1">
 <?
 $a1=preg_split("/,/",$rowcontrol[webqqv]);
 for($i=0;$i<count($a1);$i++){
  $b1=preg_split("/\*/",$a1[$i]);
  echo "<a href='http://wpa.qq.com/msgrd?v=3&uin=".$b1[0]."&site=".weburl."&menu=yes'>".$b1[1]."：".$b1[0]."</a><br>";
 }
 ?>
 </div>
</div>

<? include("../tem/bottom.php");?>
</body>
</html>