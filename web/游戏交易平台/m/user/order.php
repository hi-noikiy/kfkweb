<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$ses=" where userid=".$userid;
$ddzt=$_GET[ddzt];if($ddzt!=""){$ses=$ses." and ddzt='".$ddzt."'";}
if($_GET[page]!=""){$page=$_GET[page];}else{$page=1;}
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
 <div class="d1"><a href="../">用户中心</a> - 订单管理&nbsp;&nbsp;&nbsp;<?=returnorderzt($ddzt)?></div>
</div>

 <!--列表开始-->
 <?
 pagef($ses,10,"yjcode_order","order by sj desc");while($row=mysql_fetch_array($res)){
 $tp="../../".returntp("bh='".$row[probh]."' order by iffm desc","-2");
 $cz="";
 if($row[ddzt]=="suc"){ //交易成功
  if(panduan("userid,orderbh","yjcode_propj where orderbh='".$row[orderbh]."' and userid=".$userid)==0){
  $cz="<a href='orderpj.php?orderbh=".$row[orderbh]."' class='btn feng'>评价</a>";
  }else{
  $cz="<a href='orderpj.php?orderbh=".$row[orderbh]."' class='blue'>已评价</a><br>";
  }
  $cz=$cz."<a href='../product/view".returnproid($row[probh]).".html' target=_blank>再次购买</a>";
 
 }elseif($row[ddzt]=="wait"){ //等待发货
  $cz="请联系客服";
  $cz=$cz."<br><a href='orderclose.php?orderbh=".$row[orderbh]."' class='hui'>取消订单</a>";
 
 }elseif($row[ddzt]=="backsuc"){ //退款成功
  $cz="<a href='../product/view".returnproid($row[probh]).".html' target=_blank>重新购买</a>";
 
 }elseif($row[ddzt]=="backerr"){ //退款失败，不同意退款
  $cz="<a href='shouhuo.php?orderbh=".$row[orderbh]."' class='btn'>收货</a>";
  $cz=$cz."<br><a href='ordertk.php?orderbh=".$row[orderbh]."' class='blue'>再次退款</a>";
  $cz=$cz."<br><a href='../help/aboutview4.html' target=_blank class='hui'>客服介入</a>";

 }elseif($row[ddzt]=="db"){ //担保中
  $cz="<a href='shouhuo.php?orderbh=".$row[orderbh]."' class='btn'>收货</a>";
  $cz=$cz."<br><a href='ordertk.php?orderbh=".$row[orderbh]."' class='hui'>退款</a>";

 }elseif($row[ddzt]=="close"){ //订单取消
  $cz="<a href='../product/view".returnproid($row[probh]).".html' target=_blank>重新购买</a>";
  
 }
 ?>
 <div class="listcap box">
 <? if($row[ddzt]=="wpay"){?><div class="d1"><input name="C1" id="ck<?=$row[id]?>" type="checkbox" value="<?=$row[id]?>" /></div><? }?>
 <div class="d2">编号:<?=$row[orderbh]?>  |  时间:<?=$row[sj]?></div>
 <div class="d3"><?=returnorderzt($row[ddzt])?></div>
 </div>
 <div class="orderlist box">
 <div class="d1">
 <a href="orderview.php?orderbh=<?=$row[orderbh]?>"><img class="tp" src="<?=returntppd($tp,"img/none60x60.gif")?>" width="50" height="50" align="left" /></a>
 </div>
 <div class="d2">
 <a title="<?=$row["tit"]?>" href="orderview.php?orderbh=<?=$row[orderbh]?>" class="a1"><?=returntitdian($row["tit"],60)?></a><br>
 </div>
 <div class="d3"><strong class="feng"><?=returnjgdian($row[money1]*$row[num]+$row[yunfei])?></strong><br><span class="hui"><?=$row[num]?>件</span></div>
 <div class="d4"><?=$cz?></div>
 </div>
 <? }?>
 <!--列表结束-->
 <div class="npa">
 <?
 $nowurl="order.php";
 $nowwd="ddzt=".$_GET[ddzt];
 require("page.html");
 ?>
 </div>

<? include("bottom.php");?>
</body>
</html>