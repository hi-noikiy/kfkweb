<?
include("../../config/conn.php");
include("../../config/function.php");
$getstr=$_GET[str];

$ty1id=returnsx("j");
$ty2id=returnsx("k");
$ty3id=returnsx("m");
?>
<html>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>商品列表 <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<div class="topfix">

<!--头部B-->
<div class="indextop box">
 <div class="d1" onClick="javascript:history.go(-1);"><img src="../img/back.png" style="margin:15px 0 0 0;" /></div>
 <div class="d2" onClick="gourl('../search/main.php')"><span class="s1"></span><span class="s2">请输入搜索关键词！</span></div>
 <div class="d3"><img src="../img/lb.png" style="margin:4px 0 0 0;" /></div>
</div>
<!--头部E-->

<!--搜索B-->
<div class="search box">
 <div class="d1" onClick="sertjonc(1,3)"><? if($ty1id!=-1){$type1name=returntype(1,$ty1id);echo $type1name;}else{echo "选择分类";}?></div>
 <? if($ty1id!=-1){if(panduan("*","yjcode_type where admin=2 and type1='".$type1name."'")==1){?>
 <div class="d1" onClick="sertjonc(2,3)"><? if($ty2id!=-1){$type2name=returntype(2,$ty2id);echo $type2name;}else{echo "选择分类";}?></div>
 <? }}?>
 <? if($ty2id!=-1){if(panduan("*","yjcode_type where admin=3 and type1='".$type1name."' and type2='".$type2name."'")==1){?>
 <div class="d1" onClick="sertjonc(3,3)"><? if($ty3id!=-1){$type3name=returntype(3,$ty3id);echo $type3name;}else{echo "选择分类";}?></div>
 <? }}?>
</div>
<!--搜索E-->

<div class="ntopv"></div>
</div>

<!--分类1B-->
<div class="sertj box" id="sertj1" style="display:none;">
 <div class="d1">
 <a href="search.html" <? if(check_in("_jv",$getstr) || !check_in("_j",$getstr)){?> class="nx"<? }?>>所有分类</a>
 <? while1("*","yjcode_type where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="search_j<?=$row1[id]?>v.html" <? if(check_in("_j".$row1[id]."v",$getstr)){?> class="nx"<? }?>><?=$row1[type1]?></a>
 <? }?>
 </div>
</div>
<!--分类1E-->

<? if($ty1id!=-1){?>
<!--分类2B-->
<div class="sertj box" id="sertj2" style="display:none;">
 <div class="d1">
 <a href="search_j<?=$ty1id?>v.html" <? if(check_in("_kv",$getstr) || !check_in("_k",$getstr)){?> class="nx"<? }?>>选择分类</a>
 <? while1("*","yjcode_type where admin=2 and type1='".$type1name."' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="search_j<?=$ty1id?>v_k<?=$row1[id]?>v.html" <? if(check_in("_k".$row1[id]."v",$getstr)){?> class="nx"<? }?>><?=$row1[type2]?></a>
 <? }?>
 </div>
</div>
<!--分类2E-->
<? }?>

<? if($ty2id!=-1){?>
<!--分类3B-->
<div class="sertj box" id="sertj3" style="display:none;">
 <div class="d1">
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v.html" <? if(check_in("_mv",$getstr) || !check_in("_m",$getstr)){?> class="nx"<? }?>>选择分类</a>
 <? while1("*","yjcode_type where admin=3 and type1='".$type1name."' and type2='".$type2name."' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$row1[id]?>v.html" <? if(check_in("_m".$row1[id]."v",$getstr)){?> class="nx"<? }?>><?=$row1[type3]?></a>
 <? }?>
 </div>
</div>
<!--分类3E-->
<? }?>

<div class="allnum">共<strong id="pronum">0</strong>个商品</div>
<!--列表B-->
<div id="listtxt"><div class="nps" id="nps1" style="display:none;"></div></div>
<!--列表E-->
<script language="javascript">
var cHeight = 0;
cHeight = document.documentElement.scrollTop==0? document.body.clientHeight : document.documentElement.clientHeight;
readlist('<?=$getstr?>');
</script>

<? include("../tem/bottom.php");?>
</body>
</html>