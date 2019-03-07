<?
include("../config/conn.php");
include("../config/function.php");
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$uid=$_GET[id];
$sqluser="select * from yjcode_user where zt=1 and shopzt=2 and id=".$uid;mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("./");}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=$rowuser[shopname]?>的网上店铺 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="shop.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("shopmenu1").className="a1";
</script>

<div class="yjcode">

 <!--左B-->
 <? include("left.php");?>
 <!--左E-->
 
 <!--右B-->
 <div class="iright">
  <ul class="u1"><li class="l1">商品推荐</li><li class="l2"><a href="prolist_i<?=$uid?>v.html">查看更多>></a></li></ul>
  <div class="plist">
  <? 
  while1("*","yjcode_pro where userid=".$uid." and zt=0 and ifxj=0 order by lastsj desc limit 12");while($row1=mysql_fetch_array($res1)){
  $au="../product/view".$row1[id].".html";
  $tp="../".returntp("bh='".$row1[bh]."' order by iffm desc","-2");
  ?>
  <ul class="u2">
  <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" title="<?=$row1[tit]?>"  src="<?=returntppd($tp,"../img/none180x180.gif")?>" width="180" height="180" /></a></li>
  <li class="l2"><strong><?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></strong></li>
  <li class="l3"><a href="<?=$au?>" target="_blank" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,50)?></a></li>
  <li class="l4">成交：<?=$row1[xsnum]?>次</li>
  <li class="l5"><a href="<?=$au?>" target="_blank">立即购买</a></li>
  </ul>
  <? }?>
  </div>
 </div>
 <!--右E-->

</div>
<? include("../tem/bottom.html");?>
</body>
</html>