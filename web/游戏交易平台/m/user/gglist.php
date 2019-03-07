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
 <div class="d1"><a href="../">用户中心</a> - 公告</div>
</div>

 <?
 $ses=" where zt<>99";
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"yjcode_gg","order by sj desc");while($row=mysql_fetch_array($res)){
 $cz="";
 
 ?>
 <a  href="gg.php?id=<?=$row[id]?>">
 <div class="txlog box" style="height:40px">
 <div class="d1" style="width:60%"><?=$row[tit]?></div>
 
 <div class="d3" style="width:40%; text-align:left"> <?=$row[sj]?>  </div>
 </div>
 </a>
 <? }?>

 <div class="npa">
 <?
 $nowurl="gglist.php";
 $nowwd="";
 require("page.html");
 ?>
 </div>

<? include("bottom.php");?>
</body>
</html>