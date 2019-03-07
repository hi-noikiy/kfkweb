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
<div class="yjcode">
<!--头部B-->
<div class="indextop box">
 <div class="d1" onClick="javascript:history.go(-1);"><img src="../img/back.png" style="margin:15px 0 0 0;" /></div>
 <div class="d21">所有分类</div>
 <div class="d3"><a href="../user/"><img src="../img/tx.png" /></a></div>
</div>
<!--头部E-->
</div>

<? while1("*","yjcode_type where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
<div class="type1 box" onClick="gourl('../product/search_j<?=$row1[id]?>v.html')"><div class="d1"><?=$row1[type1]?></div></div>
 <div class="type2 box">
 <div class="dm">
 <? while2("*","yjcode_type where admin=2 and type1='".$row1[type1]."' order by xh asc");while($row2=mysql_fetch_array($res2)){?>
 <div class="d1" onClick="gourl('../product/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html')"><?=$row2[type2]?></div>
 <? }?>
 </div>
 </div>
<? }?>

<? include("../tem/bottom.php");?>
</body>
</html>