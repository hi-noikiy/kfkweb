<?
include("../../config/conn.php");
include("../../config/function.php");
$getstr=$_GET[str];
$ty1id=returnsx("j");
$ty2id=returnsx("k");
$ses=" where zt=0";
if(returnsx("p")!=-1){$page=returnsx("p");}else{$page=1;}
if($ty1id!=-1){$ses=$ses." and type1id=".$ty1id."";$ty1name=returnnewstype(1,$ty1id);}
if($ty2id!=-1){$ses=$ses." and type2id=".$ty2id."";$ty2name=returnnewstype(2,$ty2id);}
?>
<html>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>������Ѷ <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<div class="yjcode">
<!--ͷ��B-->
<div class="indextop box">
 <div class="d1" onClick="javascript:history.go(-1);"><img src="../img/back.png" style="margin:15px 0 0 0;" /></div>
 <div class="d21">��Ѷ</div>
 <div class="d3"><a href="../user/"><img src="../img/tx.png" /></a></div>
</div>
<!--ͷ��E-->
</div>

<!--����B-->
<div class="search box">
 <div class="d1" onClick="sertjonc(1,3)"><? if($ty1id!=-1){echo $ty1name;}else{echo "ѡ�����";}?></div>
 <? if($ty1id!=-1){if(panduan("*","yjcode_newstype where admin=2 and name1='".$ty1name."'")==1){?>
 <div class="d1" onClick="sertjonc(2,3)"><? if($ty2id!=-1){echo $ty2name;}else{echo "ѡ�����";}?></div>
 <? }}?>
</div>
<!--����E-->

<!--����1B-->
<div class="sertj box" id="sertj1" style="display:none;">
 <div class="d1">
 <a href="newslist.html" <? if(check_in("_jv",$getstr) || !check_in("_j",$getstr)){?> class="nx"<? }?>>���з���</a>
 <? while1("*","yjcode_newstype where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="newslist_j<?=$row1[id]?>v.html" <? if(check_in("_j".$row1[id]."v",$getstr)){?> class="nx"<? }?>><?=$row1[name1]?></a>
 <? }?>
 </div>
</div>
<!--����1E-->

<? if($ty1id!=-1){?>
<!--����2B-->
<div class="sertj box" id="sertj2" style="display:none;">
 <div class="d1">
 <a href="newslist_<?=$ty1id?>v.html" <? if(check_in("_kv",$getstr) || !check_in("_k",$getstr)){?> class="nx"<? }?>>ѡ�����</a>
 <? while1("*","yjcode_newstype where admin=2 and name1='".$ty1name."' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="newslist_j<?=$ty1id?>v_k<?=$row1[id]?>v.html" <? if(check_in("_k".$row1[id]."v",$getstr)){?> class="nx"<? }?>><?=$row1[name2]?></a>
 <? }?>
 </div>
</div>
<!--����2E-->
<? }?>

<div class="yjcode">
<? 
$i=1;pagef($ses,10,"yjcode_news","order by lastsj desc");while($row=mysql_fetch_array($res)){
$tit=returntitdian($row[tit],64);
$tpv="../../".returntp("bh='".$row[bh]."' order by xh asc","-1");
?>
<div class="ilist box" onClick="gourl('txtlist_i<?=$row[id]?>v.html');">
 <div class="d1"><img src="<?=returntppd($tpv,"../../img/none180x180.gif")?>" /></div>
 <div class="d2">
  <span class="s1"><?=$tit?></span>
  <span class="s2">��ע��<?=$row[djl]?></span>
  <span class="s3"><?=dateYMDHM($row[lastsj])?></span>
 </div>
</div>
<? }?>
</div>

<div class="npa">
<?
$nowurl="newslist";
$nowwd="";
require("../tem/page.html");
?>
</div>

<? include("../tem/bottom.php");?>
</body>
</html>