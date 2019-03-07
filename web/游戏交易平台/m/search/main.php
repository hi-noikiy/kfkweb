<?
include("../../config/conn.php");
include("../../config/function.php");
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no" />
<title>商品搜索 - 手机版<?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<style type="text/css">
body{background-color:#EBEBEB;}
</style>
</head>
<body>
<!--内页头部B-->
<div class="ntop">输入商品关键词</div>
<!--内页头部E-->

<form name="f1" method="post" action="index.php?admin=1">
<div class="uk box">
 <div class="d1"><input placeholder="请输入商品关键词" type="text" name="topt" /></div>
</div>

<div class="tjbutton box">
 <div class="d0"></div>
 <? tjbtnr_m("开始搜索");?>
 <div class="d0"></div>
</div>

</form>

<? include("../tem/bottom.php");?>
</body>
</html>