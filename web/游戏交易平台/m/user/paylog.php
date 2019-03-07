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
 <div class="d1"><a href="../">用户中心</a> - 资金记录</div>
</div>

 <?
 $ses=" where userid=".$rowuser[id];
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"yjcode_moneyrecord","order by sj desc");while($row=mysql_fetch_array($res)){
 ?>
 <div class="paylog box">
 <div class="d1"><?=$row[sj]?></div>
 <div class="d3"><? if($row[moneynum]>0){?><span class="blue">收入</span><? }else{?><span class="red">支出</span><? }?></div>
 <div class="d4"><?=$row[tit]?></div>
 <div class="d2"><?=$row[moneynum]?>元</div>
 </div>
 <? }?>

 <div class="npa">
 <?
 $nowurl="paylog.php";
 $nowwd="";
 require("page.html");
 ?>
 </div>

<? include("bottom.php");?>
</body>
</html>