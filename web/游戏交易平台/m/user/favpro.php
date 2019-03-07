<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$userid=returnuserid($_SESSION[SHOPUSER]);
$sj=date("Y-m-d H:i:s");
if($_GET[control]=="del"){
deletetable("yjcode_profav where userid=".$userid." and id=".$_GET[id]);
php_toheader("favpro.php");
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
 <div class="d1"><a href="../">用户中心</a> - 收藏夹</div>
</div>

 <?
 if($_GET[page]!=""){$page=$_GET[page];}else{$page=1;}
 pagef(" where userid=".$userid,10,"yjcode_profav","order by sj desc");while($row=mysql_fetch_array($res)){
 while1("*","yjcode_pro where bh='".$row[probh]."' order by lastsj desc limit 5");$row1=mysql_fetch_array($res1);
 ?>
 <div class="favpro box">
 <div class="d1"><a href="../product/view<?=$row1[id]?>.html"><img border="0" src="../../<?=returntp("bh='".$row1[bh]."' order by iffm desc limit 1","-2")?>" width="50" height="50" /></a></div>
 <div class="d2">
 <a href="../product/view<?=$row1[id]?>.html"><?=returntitdian($row1["tit"],70)?></a><br>
 <strong class="feng"><?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></strong>
 </div>
 <div class="d3"><a href="favpro.php?id=<?=$row[id]?>&control=del">移除</a></div>
 </div>
 <? }?>
 <div class="npa">
 <?
 $nowurl="favpro.php";
 $nowwd="";
 require("page.html");
 ?>
 </div>
 
<? include("bottom.php");?>
</body>
</html>