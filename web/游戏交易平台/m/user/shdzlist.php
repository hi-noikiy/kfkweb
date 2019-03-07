<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$userid=returnuserid($_SESSION[SHOPUSER]);
$sj=date("Y-m-d H:i:s");
if($_GET[control]=="del"){
deletetable("yjcode_shdz where userid=".$userid." and id=".$_GET[id]);
php_toheader("shdzlist.php");
}
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
 <div class="d1">收货地址</div>
 <? if(panduan("*","yjcode_car where userid=".$rowuser[id]."")==1){?>
 <div class="d2 red" onClick="gourl('car.php')">前往购物车</div>
 <? }?>
</div>

 <?
 if($_GET[page]!=""){$page=$_GET[page];}else{$page=1;}
 pagef(" where zt=0 and userid=".$userid,10,"yjcode_shdz","order by sj desc");while($row=mysql_fetch_array($res)){
 $addr=returnarea($row[add1])." ".returnarea($row[add2])." ".returnarea($row[add3])." ".$row[addr];
 ?>
 <div class="shdzlist box">
 <div class="d1"><a href="shdz.php?bh=<?=$row[bh]?>"><?=$row[lxr]?>(<?=$row[mot]?>)<br><? if(1==$row[ifmr]){?><span class="red">[默认]</span> <? }?><?=$addr?></a></div>
 <div class="d2"><a href="shdzlist.php?id=<?=$row[id]?>&control=del">移除</a></div>
 </div>
 <? }?>
 <div class="npa">
 <?
 $nowurl="shdzlist.php";
 $nowwd="";
 require("page.html");
 ?>
 </div>
 
<div class="bottoma" onClick="gourl('shdzlx.php')">添加新地址</div>
</body>
</html>