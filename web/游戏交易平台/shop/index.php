
<?
include("../config/conn.php");
include("../config/function.php");
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$getstr=$_GET[str];
$tit="商家风采";
$ses=" where zt=1 and shopzt=2 and shopname<>''";
if(returnsx("s")!=-1){$skey=safeEncoding(returnsx("s"));$ses=$ses." and shopname like '%".$skey."%'";$tit=$tit." ".$skey;}
if(returnsx("q")!=-1){$ses=$ses." and uqq='".returnsx("q")."'";}
if(returnsx("p")!=-1){$page=returnsx("p");}else{$page=1;}
$px="order by sj desc";
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=$tit?> - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>
<script language="javascript">topjconc(2,'店铺');document.getElementById("topt").value="<?=$skey?>";</script>

<div class="yjcode">
 <div class="dqwz">
 <ul class="u1">
 <li class="l1">
 当前位置：<a href="<?=weburl?>">首页</a> > 商家风采
 </ul>
 </div>

 <!--左B-->
 <div class="left">
 <? adwhile("ADS01",0,200,0)?>
 
 <div class="sellm">
 <ul class="u1">
 <li class="l1">服务商收入排行榜</li>
 <li class="l2 l21" id="sellm1" onMouseOver="sellmover(1)">本月销售额</li>
 <li class="l2" id="sellm2" onMouseOver="sellmover(2)">累计收入</li>
 </ul>
 <ul class="u2" id="sellu1">
 <? $i=1;while1("*","yjcode_user where zt=1 and shopzt=2 and shopname<>'' order by sellmyue desc limit 10");while($row1=mysql_fetch_array($res1)){?>
 <li class="l1<? if($i<=3){?> l11<? }?>"><?=$i?></li>
 <li class="l2"><a href="../shop/view<?=$row1[id]?>.html" title="<?=$row1[shopname]?>" target="_blank"><?=strgb2312($row1[shopname],0,16)?></a></li>
 <li class="l3"><strong><?=$row1[sellmyue]?></strong></li>
 <? $i++;}?>
 </ul>
 <ul class="u2" id="sellu2" style="display:none;">
 <? $i=1;while1("*","yjcode_user where zt=1 and shopzt=2 and shopname<>'' order by sellmall desc limit 10");while($row1=mysql_fetch_array($res1)){?>
 <li class="l1<? if($i<=3){?> l11<? }?>"><?=$i?></li>
 <li class="l2"><a href="../shop/view<?=$row1[id]?>.html" title="<?=$row1[shopname]?>" target="_blank"><?=strgb2312($row1[shopname],0,16)?></a></li>
 <li class="l3"><strong><?=$row1[sellmall]?></strong></li>
 <? $i++;}?>
 </ul>
 </div>
 
 <ul class="hotpro">
 <li class="l1">商品推荐</li>
 <? 
 while1("*","yjcode_pro where zt=0 and ifxj=0 and iftj>0 order by iftj asc limit 5");while($row1=mysql_fetch_array($res1)){
 ?>
 <li class="l2"><a href="../product/view<?=$row1[id]?>.html"><img alt="<?=$row1[tit]?>" src="../<?=returntp("bh='".$row1[bh]."' order by iffm asc","-2")?>" width="50" height="50" align="left"></a><a href="../product/view<?=$row1[id]?>.html" title="<?=$row1[tit]?>"><?=returntitdian($row1[tit],35)?></a><br><strong class="feng"><?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></strong></li>
 <? }?>
 </ul> 
 </div>
 <!--左E-->

 <!--右B-->
 <div class="listright">
 
 <div class="shoptj fontyh">
 <ul class="u1">
 <li class="l1">推荐商家</li>
 <li class="l2"><a href="">我也要出现在这里</a></li>
 </ul>
 <? 
 while1("*","yjcode_user where zt=1 and shopzt=2 and pm>0 order by pm asc limit 4");while($row1=mysql_fetch_array($res1)){
 $au="view".$row1[id].".html";
 $sucnum=returnjgdw($row1[xinyong],"",returnxy($row1[id],1));
 ?>
 <div class="d1">
  <div class="dtp"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd("../upload/".$row1[id]."/shop.jpg","../img/none180x180.gif")?>" width="112" height="112" /></a></div>
 <ul class="u2">
 <li class="l1"><a href="<?=$au?>" target="_blank"><?=$row1[shopname]?></a> <img src="../img/dj/<?=returnxytp($sucnum)?>" title="信用值<?=$sucnum?>" /></li>
 <li class="l2"><a href="view<?=$row1[id]?>.html" target="_blank">店铺</a></li>
 <li class="l3">宝贝数量：<?=returncount("yjcode_pro where zt=0 and ifxj=0 and userid=".$row1[id])?>件</li>
 <li class="l4">
  <span class="s1">最<br>新<br>宝<br>贝</span>
  <?
  while2("*","yjcode_pro where userid=".$row1[id]." and zt=0 and ifxj=0 order by lastsj desc limit 4");while($row2=mysql_fetch_array($res2)){
  $au="../product/view".$row2[id].".html";
  $tp="../".returntp("bh='".$row2[bh]."' order by iffm desc","-2");
  ?>
  <span class="s2"><a href="<?=$au?>" target="_blank"><img src="<?=returntppd($tp,"../img/none180x180.gif")?>" width="65" height="68" border="0" /></a></span>
  <? }?>
 </li>
 </ul>
 </div>
 <?
 }
 ?>
 </div>
 
 <div class="listr">
 <?
 pagef($ses,10,"yjcode_user",$px);while($row=mysql_fetch_array($res)){
 $au="view".$row[id].".html";
 $sucnum=returnjgdw($row[xinyong],"",returnxy($row[id],1));
 ?>
 <ul class="u1 fontyh">
 <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd("../upload/".$row[id]."/shop.jpg","../img/none180x180.gif")?>" width="120" height="120" /></a></li>
 <li class="l2">
 <a href="<?=$au?>" target="_blank" class="a1"><?=$row[shopname]?></a> <img src="../img/dj/<?=returnxytp($sucnum)?>" title="信用值<?=$sucnum?>" /><br>
 <? if(1==$row[ifmot]){?><span class="s2"><img src="../img/tel.gif" title="手机已通过认证" /></span><? }?>
 <? if(1==$row[ifemail]){?><span class="s2"><img src="../img/yx.gif" title="邮箱已通过认证" /></span><? }?>
 <span class="s0">掌柜：<?=$row[nc]?></span>
 <span class="s1">商品数量<br><strong class="feng"><?=returncount("yjcode_pro where zt=0 and ifxj=0 and userid=".$row[id])?></strong></span>
 <span class="s1">交易成功<br><strong class="feng"><?=$sucnum?></strong></span>
 <span class="s1">本月销售额<br><strong class="feng"><?=$row[sellmyue]?></strong></span>
 <span class="s1">访客人气<br><strong class="feng"><?=$row[djl]?></strong></span>
 </li>
 <li class="l3">
 <a href="<?=$au?>" class="a1" target="_blank">进入Ta的店铺</a>
 </li>
 </ul>
 <? }?>
 <div class="npa">
 <?
 $nowurl="search";
 $nowwd="";
 require("../tem/page.html");
 ?>
 </div>
 </div>
 
 </div>
 <!--右E-->

</div>

<? include("../tem/bottom.html");?>
</body>
</html>