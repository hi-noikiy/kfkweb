<?
include("../../config/conn.php");
include("../../config/function.php");
$getstr=$_GET[str];
$id=returnsx("i");
while0("*","yjcode_pro where zt<>99 and id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("../");}
$sj=date("Y-m-d H:i:s");
?>
<html>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title><?=$row[tit]?>怎么样好不好、买家购买心得 - <?=webname?></title>
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
 <div class="d21">评价信息</div>
 <div class="d3"><a href="../user/"><img src="../img/tx.png" /></a></div>
</div>
<!--头部E-->

<? 
if(returnsx("p")!=-1){$page=returnsx("p");}else{$page=1;}
pagef(" where probh='".$row[bh]."'",20,"yjcode_propj","order by sj desc");while($row=mysql_fetch_array($res)){
$usertx="../../upload/".$row[userid]."/user.jpg";
if(!is_file($usertx)){$usertx="../../user/img/nonetx.gif";}else{$usertx=$usertx."?id=".rnd_num(1000);} 
?>
<div class="pjlist box">
 <div class="d1"><img src="<?=$usertx?>" width="50" height="50" /><br><?=returnnc($row[userid])?></div>
 <div class="d2">
  <span class="s1">
  <img src="../../img/x1.png" class="img1" width="76" height="15" />
  <? $pf=round(($row[pf1]+$row[pf2]+$row[pf3])/3,2);?>
  <div class="pf" style="width:<?=$pf/5*76?>px;"><img src="../../img/x2.png" width="76" height="15" /></div>
  </span>
  <span class="s2"><?=dateYMDHM($row[sj])?></span>
  <span class="s3"><?=$row[txt]?></span><? if(!empty($row[hf])){?><span class="s4">卖家回复：<?=$row[hf]?></span><? }?>
 </div>
</div>
<? }?>

</div>

<div class="npa">
<?
$nowurl="pjlist";
$nowwd="";
require("../tem/page.html");
?>
</div>

<? include("../tem/bottom.php");?>
</body>
</html>