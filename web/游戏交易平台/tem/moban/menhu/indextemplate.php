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
<script language="javascript" src="js/basic.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/index.js"></script>
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
<span id="leftnone" style="display:none;"></span>
<script language="javascript">
leftmenuover();
yhifdis(0);
document.getElementById("topmenu1").className="a1";
</script>

 <!--�л�B-->
 <div class="banner" id="banner" >
 <? autoAD("menhu_01");$i=0;while1("*","yjcode_ad where adbh='menhu_01' and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
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

<div class="yjcode">
<!--������ÿ�ʼ-->
<div class="iright">
<div class="cap">���½���</div>
<div class="igd" id="Marquee">
<!--������ʼ-->
<?
while1("*","yjcode_order where (ddzt='suc' or ddzt='db' or ddzt='wait') order by sj desc limit 30");while($row1=mysql_fetch_array($res1)){
?>
<div class="gd">
<table align="left" width="210" style="color:#fff;">
<tr>
<td width="210" style="line-height:20px;"><?=strgb2312(returnnc($row1[userid]),0,10)?> ������ <span><?=returntitdian($row1[tit],33)?></span> <strong class="feng"><?=$row1[money1]*$row1[num]?></strong> [<?=strip_tags(returnorderzt($row1[ddzt]))?>]</td>
</tr>
</table>
</div>
<? }?>
<script>
var Mar = document.getElementById("Marquee");
var child_div=Mar.getElementsByTagName("div")
var picH = 47;//�ƶ��߶�
var scrollstep=3;//�ƶ�����,Խ��Խ��
var scrolltime=20;//�ƶ�Ƶ��(����)Խ��Խ��
var stoptime=3000;//���ʱ��(����)
var tmpH = 0;
Mar.innerHTML += Mar.innerHTML;
function start(){
if(tmpH < picH){
tmpH += scrollstep;
if(tmpH > picH )tmpH = picH ;
Mar.scrollTop = tmpH;
setTimeout(start,scrolltime);
}else{
tmpH = 0;
Mar.appendChild(child_div[0]);
Mar.scrollTop = 0;
setTimeout(start,stoptime);
}
}
setTimeout(start,stoptime);
</script>
<!--��������-->
</div>

<div class="cap">�Ƽ�����</div>
<? while1("*","yjcode_user where zt=1 and shopzt=2 and shopname<>'' and pm>0 order by pm asc limit 4");while($row1=mysql_fetch_array($res1)){sellmoneytj($row1[id]);?>
<ul class="stj">
<li class="l1"><a href="shop/view<?=$row1[id]?>.html" target="_blank"><img width="50" height="50" src="<?=returntppd("upload/".$row1[id]."/shop.jpg","img/none180x180.gif")?>" /></a></li>
<li class="l2"><a href="shop/view<?=$row1[id]?>.html" target="_blank"><?=strgb2312($row1[shopname],0,17)?></a><br>�������룺<span class="feng"><?=$row1[sellmall]?></span></li>
</ul>
<? }?>

 </div>
<!--������ý���-->
</div>

<div class="bfb"></div>

<div class="yjcode">
 <div class="tjad"><? adread("shang_03",220,140)?></div>
 <!--ͳ��B-->
 <div class="tongji fontyh">
  <ul class="u1">
  <li class="l1">����ͳ��</li>
  <?
  $inittjarr=array(0,0,0,0);
  $inittjb=preg_split("/,/",$rowcontrol[inittj]);
  for($i=0;$i<count($inittjb);$i++){
  if(is_numeric($inittjb[$i])){$inittjarr[$i]=$inittjb[$i];}
  }
  ?>
  <li class="l2">��Ա��<strong> <?=returncount("yjcode_user")+$inittjarr[0]?> </strong>λ</li>
  <li class="l2">��Ʒ��<strong> <?=returncount("yjcode_pro where zt=0 and ifxj=0")+$inittjarr[1]?> </strong>��</li>
  <li class="l2">���ף�<strong> <?=returncount("yjcode_order where (ddzt='wait' or ddzt='db' or ddzt='back' or ddzt='suc')")+$inittjarr[2]?> </strong>��</li>
  <li class="l2">��<strong> <?=sprintf("%.0f",$inittjarr[3]+returnsum("money1*num","yjcode_order where ddzt<>'backsuc' and ddzt<>'close'"))?> </strong>Ԫ</li>
  </ul>
  <ul class="u2">
  <li class="l1">��վ����</li>
  <li class="l2">
  <? while0("*","yjcode_gg where zt=0 order by sj desc limit 4");while($row=mysql_fetch_array($res)){?>
  <a href="help/ggview<?=$row[id]?>.html" title="<?=$row[tit]?>" target="_blank">[<?=dateMD($row[sj])?>] <?=returntitdian($row[tit],36)?></a>
  <? }?>
  </li>
  </ul>
 </div>
 <!--ͳ��E-->
 
 <!--�Ƽ���ƷB-->
 <div class="tjpro fontyh">
 <? 
 $i=1;
 while1("*","yjcode_pro where zt=0 and ifxj=0 and iftuan=1 and yhxs=2 and yhsj2>'".$sj."' order by yhsj2 asc limit 5");while($row1=mysql_fetch_array($res1)){
 $money1=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]);
 $au="product/view".$row1[id].".html";
 $dqsj=str_replace("-","/",$row1[yhsj2]);
 while2("*","yjcode_user where id=".$row1[userid]);$row2=mysql_fetch_array($res2);
 ?>
 <span id="dqsj<?=$i?>" style="display:none;"><?=$dqsj?></span>
 <ul class="u1 u1<?=$i?>" onMouseOver="this.className='u1 u1<?=$i?> u21';" onMouseOut="this.className='u1 u1<?=$i?>';">
 <li class="l1"><a href="<?=$au?>" target="_blank"><img class="tp" border="0" src="<?=returntppd(returntp("bh='".$row1[bh]."'","-1"),"img/none200x200.gif")?>" width="200" height="180" /></a><span class="djs" id="djs<?=$i?>">���ڼ���</span><img class="xs" src="homeimg/xs.png" /></li>
 <li class="l2"><a href="<?=$au?>" title="<?=$row1[tit]?>" target="_blank"><?=strgb2312($row1[tit],0,56)?></a></li>
 <li class="l3"><?=$money1?></li>
 <li class="l4"><a href="<?=$au?>" target="_blank">ȥ����</a></li>
 </ul>
 <? $i++;}?>
 </div>
 <script language="javascript">
 userChecksj();
 </script>
 <!--�Ƽ���ƷE-->

 <!--�б�B-->
 <?
 $i=1;
 while1("*","yjcode_type where admin=1 and iftj=0 order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
 <div class="icaplist fontyh">
  <div class="d1" style="border-left:<?=$row1[col]?> solid 3px;"><?=$row1[type1]?></div>
  <ul class="u1">
  <li class="l1 l11" id="icap<?=$i?>_1" onMouseOver="icapover(<?=$i?>,1)">�Ƽ���Ʒ</li>
  <li class="l1" id="icap<?=$i?>_2" onMouseOver="icapover(<?=$i?>,2)">������Ʒ</li>
  <li class="l2">
  <? while2("*","yjcode_type where admin=2 and type1='".$row1[type1]."' order by xh asc limit 4");while($row2=mysql_fetch_array($res2)){?>
  <a href="product/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html" target="_blank"><?=$row2[type2]?></a> | 
  <? }?>
  <a href="product/search_j<?=$row1[id]?>v.html">����>></a>
  </li>
  </ul>
 </div>
 
 <div class="ilistleft">
  <div class="d1">�����ϼ���Ʒ</div>
  <? 
   while0("*","yjcode_pro where ifxj=0 and zt=0 and ty1id=".$row1[id]." order by lastsj desc limit 8");while($row=mysql_fetch_array($res)){
   $au="product/view".$row[id].".html";
   $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
   ?>
  <ul class="u1">
   <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd(returntp("bh='".$row[bh]."'","-2"),"img/none60x60.gif")?>" width="45" height="45" /></a></li>
   <li class="l2"><a href="<?=$au?>" target="_blank" title="<?=$row[tit]?>"><?=returntitdian($row[tit],19)?></a><br><span class="s1"><?=$money1?></span></li>
  
  
  </ul>
  <? }?>
 </div>
 
 <div class="ilist" id="ilist<?=$i?>_1">
  <?
  while0("*","yjcode_pro where ifxj=0 and zt=0 and iftj>0 and ty1id=".$row1[id]." order by iftj asc limit 10");while($row=mysql_fetch_array($res)){
  $au="product/view".$row[id].".html";
  $money1=returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]);
  ?>
  <div class="d1">
  <ul class="u1">
  <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd(returntp("bh='".$row[bh]."'","-2"),"img/none180x180.gif")?>" width="165" height="165" /></a></li>
  <li class="l2">�Żݼ�:<strong><?=$money1?>Ԫ</strong></li>
  <li class="l3"><?=sprintf("%.1f",10*$money1/$row[money1])?>��</li>
  <li class="l4"><a href="<?=$au?>" class="a1" target="_blank" title="<?=$row[tit]?>"><?=strgb2312($row[tit],0,47)?></a></li>
  </ul>
  </div>
  <? }?>
 </div>
 
 <div class="ilist" id="ilist<?=$i?>_2" style="display:none;">
  <?
  while0("*","yjcode_pro where ifxj=0 and zt=0 and iftj>0 and ty1id=".$row1[id]." order by xsnum asc limit 10");while($row=mysql_fetch_array($res)){
  $au="product/view".$row[id].".html";
  $money1=returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]);
  ?>
  <div class="d1">
  <ul class="u1">
  <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd(returntp("bh='".$row[bh]."'","-2"),"img/none180x180.gif")?>" width="165" height="165" /></a></li>
  <li class="l2">�Żݼ�:<strong><?=$money1?>Ԫ</strong></li>
  <li class="l3"><?=sprintf("%.1f",10*$money1/$row[money1])?>��</li>
  <li class="l4"><a href="<?=$au?>" class="a1" target="_blank" title="<?=$row[tit]?>"><?=strgb2312($row[tit],0,47)?></a></li>
  </ul>
  </div>
  <? }?>
 </div>
 
 <? $i++;}?>
 <!--�б�E-->

 <!--����B-->
 <div class="bolink">
 <ul class="u1">
 <li class="l1 fontyh"><?=webname?>�������</li>
 <li class="l2">
 <? autoAD("ADI13");while0("*","yjcode_ad where adbh='ADI13' and zt=0 order by xh asc");while($row=mysql_fetch_array($res)){?>
 <a href="<?=$row[aurl]?>" target="_blank"><img alt="<?=$row[tit]?>" border=0 src="gg/<?=$row[bh]?>.<?=$row[jpggif]?>" width="100" height="35"></a>
 <? }?>
 </li>
 </ul>
 <ul class="u1">
 <li class="l1 fontyh"><?=webname?>��������</li>
 <li class="l3">
 <? autoAD("ADI14");while0("*","yjcode_ad where adbh='ADI14' and type1='����' and zt=0 order by xh asc");while($row=mysql_fetch_array($res)){?>
 <a href="<?=$row[aurl]?>" target="_blank"><?=$row[tit]?></a>
 <? }?>
 </li>
 </ul>
 </div>
 <!--����E-->

</div>

<? include("tem/bottom.html");?>

</body>
</html>