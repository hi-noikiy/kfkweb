<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();

$userid=returnuserid($_SESSION[SHOPUSER]);
if($_GET[e]=="back"){
 $id=$_GET[id];
 while0("*","yjcode_tixian where id=".$id." and userid=".$userid." and zt=4");if($row=mysql_fetch_array($res)){
  updatetable("yjcode_tixian","zt=3,sm='用户撤销' where id=".$id);
  PointUpdateM($userid,$row[money1]);
  PointIntoM($userid,"撤消提现申请",$row[money1]);
 }
 php_toheader("tixianlog.php");
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
 <div class="d1"><a href="../">用户中心</a> - 通知消息</div>
</div>

<?
 
sesCheck();
$bh=$_GET[id];
$userid=returnuserid($_SESSION[SHOPUSER]);

while0("*","yjcode_msg where id= ".$bh );if(!$row=mysql_fetch_array($res)){
	 
	 php_toheader("msglist.php");}
	 
 
?>
 
 
 <div class="txlog box" style="height:60px; text-align:left; line-height:30px; ">
 <strong style=" font-weight:700; font-size:18px"><?=$row[title]?> </strong><br><span  style="color:#CCC">
 <?=$row[sj]?></span>
 </div>
 
 
 <div class="   " >
 <?=$row[nr]?> 
 </div>
 

<? include("bottom.php");?>
</body>
</html>