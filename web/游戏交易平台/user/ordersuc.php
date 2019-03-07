<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$orderbh=$_GET[orderbh];
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
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 支付成功</li>
</ul>
<? $leftid=2;include("left.php");?>

<!--RB-->
<div class="right">
 <div class="ordersuc">
 <ul class="u1">
 <li class="l1"><strong>付款成功</strong><br>您可以查看该笔订单的详细信息，点击<a href="orderview.php?orderbh=<?=$orderbh?>" class="blue">查看详情</a></li>
 </ul>
 </div>
 <? 
 if(!empty($orderbh)){
  $userid=returnuserid($_SESSION["SHOPUSER"]);
  while0("*","yjcode_order where orderbh='".$orderbh."' and userid=".$userid);if($row=mysql_fetch_array($res)){
  include("orderv.php");
  }
 }
 ?>
 
</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>