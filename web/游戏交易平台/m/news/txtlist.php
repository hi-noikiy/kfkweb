<?
include("../../config/conn.php");
include("../../config/function.php");
$getstr=$_GET[str];
$id=returnsx("i");
while0("*","yjcode_news where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader(weburl."404.html");exit;}

$ty1name=returnnewstype(1,$row[type1id]);
$ty2name=returnnewstype(2,$row[type2id]);

$sj=date("Y-m-d H:i:s");
while1("*","yjcode_news where type1id=".$row[type1id]." and type2id=".$row[type2id]." and zt=0 and lastsj>='".$row[lastsj]."' and id<>".$row[id]." order by sj asc");
if($row1=mysql_fetch_array($res1)){$pre="<a href='txtlist_i".$row1[id]."v.html' class='a1'>上一篇</a>";}
while1("*","yjcode_news where type1id=".$row[type1id]." and type2id=".$row[type2id]." and zt=0 and lastsj<='".$row[lastsj]."' and id<>".$row[id]." order by sj desc");
if($row1=mysql_fetch_array($res1)){$nex="<a href='txtlist_i".$row1[id]."v.html' class='a2'>下一篇</a>";}
checkdjl("c2",$row[id],"yjcode_news");
$t=preg_split("/_ueditor_page_break_tag_/",$row[txt]);
if(returnsx("p")==-1){$page=1;}else{$page=returnsx("p");}
$txt=$t[$page-1];
?>
<html>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta name="keywords" content="<?=$row[wkey]?>">
<meta name="description" content="<?=$row[wdes]?>">
<title><?=$row[tit]?> - <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<div class="yjcode">

<!--头部B-->
<div class="indextop box">
 <div class="d1" onClick="javascript:history.go(-1);"><img src="../img/back.png" style="margin:15px 0 0 0;" /></div>
 <div class="d21"><?=$ty1name?></div>
 <div class="d3"><a href="../user/"><img src="../img/tx.png" /></a></div>
</div>
<!--头部E-->

<div class="wz box">
 <div class="d1">
 <a href="" class="feng"><?=$ty1name?> > </a>
 <a href=""><?=$ty2name?></a> > 详情
 </div>
</div>

<div class="ntit box">
<div class="d1">
<strong><?=$row[tit]?></strong><br>
<?=dateYMDHM($row[lastsj])?>  <?=$row[ly]?> 阅读:<?=$row[djl]?>
</div>
</div>

<div class="ntxt box"><div class="d1"><?=$row[txt]?></div></div>

<div class="xgtxt box">
 <div class="dm">
 <?=$pre?>
 <?=$nex?>
 </div>
</div>

</div>

<? include("../tem/bottom.php");?>
</body>
</html>