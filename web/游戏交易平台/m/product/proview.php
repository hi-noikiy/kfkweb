<?
include("../../config/conn.php");
include("../../config/function.php");
$sj=date("Y-m-d H:i:s");
$id=$_GET[id];
while0("*","yjcode_pro where zt<>99 and id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("../");}
?>
<html>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title><?=$row[tit]?> <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<div class="yjcode">

<!--头部B-->
<div class="indextop box">
 <div class="d1" onClick="javascript:history.go(-1);"><img src="../img/back.png" style="margin:15px 0 0 0;" /></div>
 <div class="d21">商品详情</div>
 <div class="d3"><a href="../user/"><img src="../img/tx.png" /></a></div>
</div>
<!--头部E-->

<div class="protxt box">
 <div class="protxtM"><?=$row[txt]?></div>
</div>

</div>

<? include("../tem/bottom.php");?>
</body>
</html>