<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$userid=returnuserid($_SESSION[SHOPUSER]);
$sj=date("Y-m-d H:i:s");
if($_GET[control]=="del"){
deletetable("yjcode_shopfav where userid=".$userid." and id=".$_GET[id]);
php_toheader("favshop.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 店铺收藏</li>
</ul>
<? $leftid=2;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("rcap7.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="g_ac0_h g_bc0_h";
 </script>
 
 <!--店铺收藏B-->
 <?
 if($_GET[page]!=""){$page=$_GET[page];}else{$page=1;}
 pagef(" where userid=".$userid,10,"yjcode_shopfav","order by sj desc");while($row=mysql_fetch_array($res)){
 while1("*","yjcode_user where id=".$row[shopid]);$row1=mysql_fetch_array($res1);
 ?>
 <div class="favshop">
 <ul class="u1">
 <li class="l1"><img border="0" src="../upload/<?=$row[shopid]?>/shop.jpg" class="tp" width="80" height="80" /><br><a href="favshop.php?control=del&id=<?=$row[id]?>"><img border="0" src="img/icon4.gif" border="0" width="18" height="16" /></a></li>
 <li class="l2"><strong><?=$row1[shopname]?></strong><br>掌柜QQ： <?=$row1[uqq]?> </li>
 </ul>
 <ul class="u2">
 <? while1("*","yjcode_pro where userid=".$row[shopid]." and ifxj=0 and zt=0 order by lastsj desc limit 5");while($row1=mysql_fetch_array($res1)){?>
 <li class="l1"><a href="../product/view<?=$row1[id]?>.html" target="_blank"><img border="0" src="../<?=returntp("bh='".$row1[bh]."' order by iffm desc limit 1","-2")?>" width="100" height="100" /><br><?=returntitdian($row1[tit],30)?></a><br><strong class="feng"><?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></strong></li>
 <? }?>
 </ul>
 </div>
 <?
 }
 ?>
 <?
 $nowurl="favshop.php";
 $nowwd="";
 include("page.html");
 ?>
 <!--店铺收藏E-->

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>