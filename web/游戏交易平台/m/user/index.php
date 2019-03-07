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

<div class="listcap box"><div class="d2">我是买家，常用统计</div></div>
<div class="iorder box">
 <div class="d1"  >可用余额<br><strong><?=sprintf("%.2f",$rowuser[money1])?></strong></div>
 <div class="d1" >保证金<br><strong><?=sprintf("%.2f",$rowuser[baomoney])?></strong></div>
 <div class="d1" >冻结金额<br><strong><?=sprintf("%.2f",$rowuser[djmoney])?></strong></div>
 
</div>

<div class="listcap box"><div class="d2">常用菜单导航</div></div>

<div class="usermenu box">
 <div class="d1" onClick="gourl('pay.php')"><img src="img/pay.png" /><br>去充值</div>
 <div class="d1" onClick="gourl('car.php')"><img src="img/car.png" /><br>购物车</div>
 <div class="d1" onClick="gourl('favpro.php')"><img src="img/fav.png" /><br>收藏夹</div>
 <div class="d1 d0" onClick="gourl('/user/productlx.php')"><img src="img/txjl.png" /><br>我要卖</div>
</div>

<div class="usermenu box">
 <div class="d1" onClick="gourl('emailbd.php')"><img src="img/mail.png" /><br>绑定邮箱</div>
 <div class="d1" onClick="gourl('mobbd.php')"><img src="img/mot.png" /><br>手机绑定</div>
 <div class="d1" onClick="gourl('inf.php')"><img src="img/inf.png" /><br>个人资料</div>
 <div class="d1 d0" onClick="gourl('txsz.php')"><img src="img/tixian.png" /><br>提现设置</div>
</div>

<div class="usermenu box">
 <div class="d1" onClick="gourl('paylog.php')"><img src="img/tx.png" /><br>资金记录</div>
 <div class="d1" onClick="gourl('jflog.php')"><img src="img/jf.png" /><br>积分明细</div>
 <div class="d1" onClick="gourl('smrz.php')"><img src="img/smrz.png" /><br>实名认证</div>
 <div class="d1 d0" onClick="gourl('tixianlog.php')"><img src="img/txjl.png" /><br>提现记录</div>
</div>

<div class="usermenu box">
  <div class="d1 d0" onClick="gourl('tixian.php')"><img src="img/qu.png" /><br>去提现</div>
 <div class="d1" onClick="gourl('jflog.php')"> <br> </div>
 <div class="d1" onClick="gourl('smrz.php')"> <br> </div>
 <div class="d1 d0" onClick="gourl('tixianlog.php')"> <br> </div>
</div>

<? include("bottom.php");?>
</body>
</html>