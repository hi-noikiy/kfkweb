<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();

$userid=returnuserid($_SESSION[SHOPUSER]);
if($_GET[e]=="back"){
 $id=$_GET[id];
 while0("*","yjcode_tixian where id=".$id." and userid=".$userid." and zt=4");if($row=mysql_fetch_array($res)){
  updatetable("yjcode_tixian","zt=3,sm='�û�����' where id=".$id);
  PointUpdateM($userid,$row[money1]);
  PointIntoM($userid,"������������",$row[money1]);
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
<title>��Ա���� <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<? include("top.php");?>

<div class="boxcap box">
 <div class="d1"><a href="../">�û�����</a> - �ʽ��¼</div>
</div>

 <?
 $ses=" where userid=".$userid;
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"yjcode_tixian","order by sj desc");while($row=mysql_fetch_array($res)){
 $cz="";
 if($row[zt]==4){$cz="<a href='tixianlog.php?e=back&id=".$row[id]."'>����</a>";}
 ?>
 <div class="txlog box">
 <div class="d1"><?=$row[sj]?></div>
 <div class="d2"><strong><?=returntxzt($row[zt],$row[sm])?></strong><br><?=$row[txname]?>,<?=$row[txyh]?>(<?=$row[txzh]?>)</div>
 <div class="d3"><strong class="feng"><?=$row[money1]?></strong><br><?=$cz?></div>
 </div>
 <? }?>

 <div class="npa">
 <?
 $nowurl="tixianlog.php";
 $nowwd="";
 require("page.html");
 ?>
 </div>

<? include("bottom.php");?>
</body>
</html>