<?
include("config/conn.php");
include("config/function.php");
include("config/xy.php");
$sj=date("Y-m-d H:i:s");
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="<?=$rowcontrol[webkey]?>">
<meta name="description" content="<?=$rowcontrol[webdes]?>">
<title><?=$rowcontrol[webtit]?> - <?=webname?></title>
<link rel="shortcut icon" href="img/favicon.ico" />
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<link href="homeimg/jquery.flexslider.css" rel="stylesheet" type="text/css" >
<script language="javascript" src="js/basic.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/index.js"></script>
<script type="text/javascript" src="homeimg/jquery.flexslider-min.js"></script>
<script language="javascript">
function is_mobile() {
    var regex_match = /(nokia|iphone|android|motorola|^mot-|softbank|foma|docomo|kddi|up.browser|up.link|htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte-|longcos|pantech|gionee|^sie-|portalmmm|jigs browser|hiptop|^benq|haier|^lct|operas*mobi|opera*mini|320x320|240x320|176x220)/i;
  var u = navigator.userAgent;
  if (null == u) {
   return true;
  }
  var result = regex_match.exec(u);

  if (null == result) {
   return false
  } else {
   return true
  }
 }
 if (is_mobile()) {
  document.location.href= '<?=weburl?>m/';
 }
</script>
</head>
<body>
<? 
autoAD("ADI00");
while1("*","yjcode_ad where adbh='ADI00' and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){
$tp="gg/".$row1[bh].".".$row1[jpggif];
$image_size= getimagesize($tp);
?>
<div class="topbanner_hj" style="background:url(<?=$tp?>) no-repeat center 0;height:<?=$image_size[1]?>px;"><a href="<?=$row1[aurl]?>" target="_blank"></a></div>
<? }?>

<? include("tem/top.html");?>
<? include("tem/top1.html");?>
<span id="leftnone" style="display:none">0</span>
<script language="javascript">
leftmenuover();
yhifdis(0);
document.getElementById("topmenu1").className="a1";
</script>

 <!--�л�B-->
 <div class="banner" id="banner" >
 <? autoAD("ke_qh");$i=0;while1("*","yjcode_ad where adbh='ke_qh' and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="<?=$row1[aurl]?>" class="d1" target="_blank" style="background:url(gg/<?=$row1[bh]?>.<?=$row1[jpggif]?>) center no-repeat;"></a>
 <? $i++;}?>
 <div class="d2" id="banner_id">
 <ul style="margin-left:-<?=86*$i/2?>px;">
 <? for($j=0;$j<$i;$j++){?><li></li><? }?>
 </ul>
 </div>
 </div>
 <script type="text/javascript">banner();</script>
 <!--�л�E-->

<div class="yjcode fontyh">
 <!--���ٵ�¼B-->
 <div id="idlno">
 <ul class="u1">
 <li class="l1">��ӭ����<?=webname?>��</li>
 <li class="l2"><img src="homeimg/dl.gif" /></li>
 <li class="l3"><a href="reg/">��¼</a></li>
 </ul>
 </div>
 <div id="idlyes" style="display:none;">
 <ul class="u1">
 <li class="l1">��¼�û���Ϣ</li>
 <li class="l2">
 �� �� ����<span id="idl1" class="blue"></span><br>
 �ʻ��ܶ<span id="idl2" class="feng"></span>Ԫ<br>
 �ʻ����᣺<span id="idl3" class="feng"></span>Ԫ<br>
 �����ֶ<span id="idl4" class="feng"></span>Ԫ<br>
 ���û��֣�<span id="idl5" class="feng"></span>��<br>
 </li>
 <li class="l3">[<a href="user/">��Ա����</a> | <a href="user/un.php">�˳���¼</a>]</li>
 </ul>
 </div>
 <script language="javascript">idldl(1);</script>
 <!--���ٵ�¼E-->
</div>

<div class="bfb"></div>

<div class="yjcode">
 
 <div class="qhad">
 <? adwhile("ke_06");?>
 </div>
 
 <!--�Ƽ���ƷB-->
 <ul class="procap fontyh">
 <li class="l1">��ʱ�Żݴ���</li>
 <li class="l2"><a href="product/" target="_blank">�鿴����>></a></li>
 </ul>
 
 
 <div class="dtj fontyh">
 <? 
 $i=1;
 while1("*","yjcode_pro where zt=0 and ifxj=0 and iftuan=1 and yhxs=2 and yhsj2>'".$sj."' order by yhsj2 asc limit 5");while($row1=mysql_fetch_array($res1)){
 $money1=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]);
 $au="product/view".$row1[id].".html";
 $dqsj=str_replace("-","/",$row1[yhsj2]);
 while2("*","yjcode_user where id=".$row1[userid]);$row2=mysql_fetch_array($res2);
 ?>
 <span id="dqsj<?=$i?>" style="display:none;"><?=$dqsj?></span>
 <ul class="u1 u1<?=$i?>">
 <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd(returntp("bh='".$row1[bh]."'","-1"),"img/none180x180.gif")?>" /></a><span class="djs" id="djs<?=$i?>">���ڼ���</span></li>
 <li class="l2"><a href="<?=$au?>" target="_blank" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,47)?></a></li>
 <li class="l3"><?=sprintf("%.2f",$money1)?></li>
 <li class="l4"><a href="shop/view<?=$row2[id]?>.html" target="_blank"><?=strgb2312($row2[shopname],0,17)?></a></li>
 </ul>
 <? $i++;}?>
 </div>
 <script language="javascript">
 userChecksj();
 </script>
 <!--�Ƽ���ƷE-->
 
 <!--������ƷB-->
 <ul class="procap fontyh">
 <li class="l1">������Ʒ</li>
 <li class="l2"><a href="product/" target="_blank">�鿴����>></a></li>
 </ul>
 <div class="dtj fontyh">
 <? 
 $i=1;
 while0("*","yjcode_pro where zt=0 and ifxj=0 and iftj>0 order by iftj asc limit 5");while($row=mysql_fetch_array($res)){
 $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
 $au="product/view".$row[id].".html";
 while3("*","yjcode_user where id=".$row[userid]);$row3=mysql_fetch_array($res3);
 ?>
 <ul class="u1 u1<?=$i?>">
 <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd(returntp("bh='".$row[bh]."'","-1"),"img/none180x180.gif")?>" /></a></li>
 <li class="l2"><a href="<?=$au?>" target="_blank" title="<?=$row[tit]?>"><?=strgb2312($row[tit],0,47)?></a></li>
 <li class="l3"><?=sprintf("%.2f",$money1)?></li>
 <li class="l4"><a href="shop/view<?=$row3[id]?>.html" target="_blank"><?=strgb2312($row3[shopname],0,17)?></a></li>
 </ul>
 <? $i++;}?>
 </div>
 <!--������ƷE-->
 
 <div class="rmgg">
 <? adwhile("ke_03");?>
 </div>
 
</div>

 <!--��Ʒ�б�B-->
 <?
 autoAD("ke_01");
 autoAD("ke_02");
 $sqlad="select * from yjcode_ad where adbh='ke_01' and zt=0 order by xh asc";mysql_query("SET NAMES 'GBK'");$resad=mysql_query($sqlad);
 $sqlad1="select * from yjcode_ad where adbh='ke_02' and zt=0 order by xh asc";mysql_query("SET NAMES 'GBK'");$resad1=mysql_query($sqlad1);
 $ni=1;
 while1("*","yjcode_type where admin=1 and (iftj is null or iftj=0) order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
 <div class="bfb fontyh<? if($ni % 2==0){?> bfbtype1<? }else{?> bfbtype2<? }?>">
 <div class="yjcode">
 
  <ul class="typecap">
  <li class="l1"><?=$row1[type1]?></li>
  <li class="l2">
  <a href="" class="a1" onMouseOver="typeaover(<?=$ni?>,0)" id="typea<?=$ni?>_0">�Ƽ�</a>
  <? $j=1;while2("*","yjcode_type where admin=2 and type1='".$row1[type1]."' order by xh asc limit 8");while($row2=mysql_fetch_array($res2)){?>
  <a href="" id="typea<?=$ni?>_<?=$j?>" onMouseOver="typeaover(<?=$ni?>,<?=$j?>)"><?=$row2[type2]?></a>
  <? $j++;}?>
  <span id="typea<?=$ni?>" style="display:none;"><?=$j?></span>
  </li>
  </ul>
  
  <div class="leftgg"><? if($rowad=mysql_fetch_array($resad)){adreadID($rowad[id],220,420);}?><div class="gg1"><? if($rowad1=mysql_fetch_array($resad1)){adreadID($rowad1[id],220,160);}?></div></div>
  
  <div class="pdright fontyh" id="dright<?=$ni?>_0">
  <? 
  while0("*","yjcode_pro where zt=0 and ifxj=0 and ty1id=".$row1[id]." and iftj>0 order by iftj asc limit 6");while($row=mysql_fetch_array($res)){
  $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
  $au="product/view".$row[id].".html";
  while3("*","yjcode_user where id=".$row[userid]);$row3=mysql_fetch_array($res3);
  ?>
  <ul class="u1">
  <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd(returntp("bh='".$row[bh]."'","-1"),"img/none180x180.gif")?>" /></a></li>
  <li class="l2"><a href="<?=$au?>" target="_blank" title="<?=$row[tit]?>"><?=strgb2312($row[tit],0,47)?></a></li>
  <li class="l3"><?=sprintf("%.2f",$money1)?></li>
  <li class="l4"><a href="shop/view<?=$row3[id]?>.html" target="_blank"><?=strgb2312($row3[shopname],0,17)?></a></li>
  </ul>
  <? }?>
  </div>

  <? $j=1;while2("*","yjcode_type where admin=2 and type1='".$row1[type1]."' order by xh asc limit 8");while($row2=mysql_fetch_array($res2)){?>
  <div class="pdright fontyh" id="dright<?=$ni?>_<?=$j?>" style="display:none;">
  <? 
  while0("*","yjcode_pro where zt=0 and ifxj=0 and ty1id=".$row1[id]." and ty2id=".$row2[id]." order by lastsj desc limit 6");while($row=mysql_fetch_array($res)){
  $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
  $au="product/view".$row[id].".html";
  while3("*","yjcode_user where id=".$row[userid]);$row3=mysql_fetch_array($res3);
  ?>
  <ul class="u1">
  <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd(returntp("bh='".$row[bh]."'","-1"),"img/none180x180.gif")?>" /></a></li>
  <li class="l2"><a href="<?=$au?>" target="_blank"><?=strgb2312($row[tit],0,47)?></a></li>
  <li class="l3"><?=sprintf("%.2f",$money1)?></li>
  <li class="l4"><a href="shop/view<?=$row3[id]?>.html" target="_blank"><?=$row3[shopname]?></a></li>
  </ul>
  <? }?>
  </div>
  <? $j++;}?>
  
  <div class="rxph">
  <ul class="u1"><li class="l1">�������а�</li><li class="l2"></li></ul>
  <? 
  while0("*","yjcode_pro where zt=0 and ifxj=0 and ty1id=".$row1[id]." order by xsnum desc limit 10");for($i=1;$i<=3;$i++){if($row=mysql_fetch_array($res)){
  $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
  $au="product/view".$row[id].".html";
  ?>
  <ul class="u2 u2<?=$i?>">
  <li class="l1"><a href="<?=$au?>" title="<?=$row[tit]?>" target="_blank"><?=strgb2312($row[tit],0,22)?></a></li>
  <li class="l2">
  <a href="<?=$au?>" target="_blank"><img align="left" border="0" src="<?=returntppd(returntp("bh='".$row[bh]."'","-2"),"img/none180x180.gif")?>" /></a>
  ����<?=$row[xsnum]?>��<br>
  <strong><?=$money1?></strong>
  </li>
  </ul>
  <? }}?>
  <?
  while($row=mysql_fetch_array($res)){
  $au="product/view".$row[id].".html";
  ?>
  <ul class="u3">
  <li class="l1"><img src="homeimg/ph<?=$i?>.gif" /></li>
  <li class="l2"><a href="<?=$au?>" title="<?=$row[tit]?>" target="_blank"><?=returntitdian($row[tit],24)?></a></li>
  </ul>
  <? $i++;}?>
  </div>
 
 </div>
 </div>
 <? $ni++;}?>
 <!--��Ʒ�б�E-->
 
<div class="yjcode">

<!--��ѶB-->
<div class="inews fontyh">
 <ul class="u1">
 <li class="l1">��Ѷ�ٵ�</li>
 <li class="l2">
 <? while1("*","yjcode_newstype where admin=1 order by xh asc limit 7");while($row1=mysql_fetch_array($res1)){?>
 <a href="news/newslist_j<?=$row1[id]?>v.html" target="_blank" class="acy"><?=$row1[name1]?></a> / 
 <? }?>
 </li>
 </ul>
 <div class="dmain">
 
  <div class="d1">
   <div class="flexslider">
   <ul class="slides">
   <? while1("*","yjcode_ad where adbh='ke_04' and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
   <li><a href="<?=$row1[aurl]?>" target="_blank"><img src="gg/<?=$row1[bh]?>.<?=$row1[jpggif]?>" width="425" height="226" border="0" /></a></li>
   <? }?>
   </ul>
   </div>
  </div>
  
  <div class="d2">
  <? while1("*","yjcode_news where zt=0 order by lastsj desc limit 16");if($row1=mysql_fetch_array($res1)){?>
  <a href="news/txtlist_i<?=$row1[id]?>v.html" class="a1" target="_blank" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,38)?></a>
  <? }?>
  <? for($i=1;$i<=6;$i++){if($row1=mysql_fetch_array($res1)){?>
  <a href="news/txtlist_i<?=$row1[id]?>v.html" target="_blank" class="a2 acyn" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,38)?></a>
  <? }}?>
  </div>
  <div class="d3">
  <ul class="du1">
  <li class="l1">��ҵ��Ѷ</li>
  <li class="l2"><a href="news/" class="acyn" target="_blank">����</a></li>
  <? while($row1=mysql_fetch_array($res1)){?>
  <li class="l3"><a href="news/txtlist_i<?=$row1[id]?>v.html" target="_blank" title="<?=$row1[tit]?>" class="acyn"><?=strgb2312($row1[tit],0,35)?></a></li>
  <? }?>
  </ul>
  </div>
 </div>
 <div class="dad"><? adwhile("ke_05",2)?></div> 
</div>
<!--��ѶE-->

</div>

<div class="bfb bfbhz">
<div class="yjcode fontyh">
 <!--����B-->
 <ul class="u1">
 <li class="l1">��������</li>
 <li class="l2">
 <? autoAD("ADI13");while0("*","yjcode_ad where adbh='ADI13' and zt=0 order by xh asc");while($row=mysql_fetch_array($res)){?>
 <a href="<?=$row[aurl]?>" target="_blank"><img alt="<?=$row[tit]?>" border=0 src="gg/<?=$row[bh]?>.<?=$row[jpggif]?>" width="100" height="35"></a>
 <? }?>
 </li>
 <li class="l3">
 <? autoAD("ADI14");while0("*","yjcode_ad where adbh='ADI14' and type1='����' and zt=0 order by xh asc");while($row=mysql_fetch_array($res)){?>
 <a href="<?=$row[aurl]?>" target="_blank"><?=$row[tit]?></a>
 <? }?>
 </li>
 </ul>
 <!--����E-->
</div>
</div>

<? include("tem/bottom.html");?>
<script language="javascript">
$(function(){
 $('.flexslider').flexslider({
 controlNav: false
 });
 $('.flexslider2').cxScroll({
 direction: "top",
 step:5 
 });
});
</script>

</body>
</html>