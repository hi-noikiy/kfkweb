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
 <div class="d1">选择收货地址</div>
 <div class="d2 red" onClick="gourl('shdzlist.php')">管理</div>
</div>

 <?
 if($_GET[page]!=""){$page=$_GET[page];}else{$page=1;}
 pagef(" where zt=0 and userid=".$rowuser[id],10,"yjcode_shdz","order by sj desc");while($row=mysql_fetch_array($res)){
 $addr=returnarea($row[add1])." ".returnarea($row[add2])." ".returnarea($row[add3])." ".$row[addr];
 $au="car.php?shdz=".$row[id];
 ?>
 <div class="shdzlist box" onClick="gourl('<?=$au?>')">
 <div class="d1"><?=$row[lxr]?>(<?=$row[mot]?>)<br><? if(1==$row[ifmr]){?><span class="red">[默认]</span> <? }?><?=$addr?></div>
 <div class="d2"><a href="<?=$au?>">选择</a></div>
 </div>
 <? }?>
 <div class="npa">
 <?
 $nowurl="carshdz.php";
 $nowwd="";
 require("page.html");
 ?>
 </div>
 
</body>
</html>