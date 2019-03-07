<?
include("../../config/conn.php");
include("../../config/function.php");
$sj=date("Y-m-d H:i:s");
$id=$_GET[id];
while0("*","yjcode_pro where zt<>99 and id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("../");}
$nowmoney=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));

?>
<html>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title><?=$row[tit]?> <?=webname?></title>
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
 <div class="d21">商品详情</div>
 <div class="d3"><a href="../user/"><img src="../img/tx.png" /></a></div>
</div>
<!--头部E-->

<!--图片B-->
<div class="qh">
<div class="addWrap">
 <div class="swipe" id="mySwipe">
   <div class="swipe-wrap">
   <?
   $i=0;
   while1("*","yjcode_tp where bh='".$row[bh]."' order by xh asc limit 5");while($row1=mysql_fetch_array($res1)){
   $ti=preg_split("/\./",$row1[tp]);
   $tp=$ti[0];
   ?>
   <div><a href="#"><img class="img-responsive" src="<?=returntppd("../../".$tp."-1.jpg","../../img/none300x300.gif")?>" /></a></div>
   <? $i++;}?>
   </div>
  </div>
  <ul id="position"><? for($j=0;$j<$i;$j++){?><li class="<? if(0==$j){?>cur<? }?>"></li><? }?></ul>
</div>
<script src="../js/swipe.js"></script> 
<script type="text/javascript">
var bullets = document.getElementById('position').getElementsByTagName('li');
var banner = Swipe(document.getElementById('mySwipe'), {
auto: 2000,
continuous: true,
disableScroll:false,
callback: function(pos) {
var i = bullets.length;
while (i--) {
bullets[i].className = ' ';
}
bullets[pos].className = 'cur';
}});
</script>
</div>
<!--图片E-->

<div class="tit box"><div class="d1"><?=$row[tit]?></div></div>

<div class="money box">
 <div class="d1"><span id="nowmoney"><?=$nowmoney?></span></div>
 <div class="d2">
 <s id="yuanjia"><?=returnjgdian($row[money1])?></s>&nbsp;&nbsp;&nbsp;&nbsp;
 <span id="zhukou"><? if(!empty($row[money1])){echo sprintf("%.1f",$nowmoney/$row[money1]*10)."折";}else{echo "无折扣";}?></span>
 </div>
</div>

<div class="changg box">
 <div class="d1 d11">销量 <span class="feng"><?=$row[xsnum]?></span></div>
 <div class="d1 d12">收藏 <span class="feng"><?=returncount("yjcode_profav where probh='".$row[bh]."'")?></span></div>
 <div class="d1 d13" onClick="gourl('pjlist_i<?=$row[id]?>v.html');">评价 <span class="feng"><?=returncount("yjcode_propj where probh='".$row[bh]."'")?></span></div>
 <div class="d1 d14">库存 <span class="feng"><span id="nowkcnum"><?=$row[kcnum]?></span></span></div>
</div>

<!--套餐B-->
<? $alli=returncount("yjcode_taocan where admin is null and zt=0 and probh='".$row[bh]."'");if($alli>0){?>
<div id="tcnum" style="display:none;"><?=$alli?></div>
<div class="taocan box" id="utc1">
 <div class="d1">选择套餐：</div>
 <div class="d2">
 <? 
 $i=1;
 $ja=0;
 while1("*","yjcode_taocan where admin is null and zt=0 and probh='".$row[bh]."' order by xh asc");while($row1=mysql_fetch_array($res1)){
 if(empty($row1[fhxs])){$k=$row[kcnum];}else{$k=$row1[kcnum];}
 $oncj="taocanonc(".$i.",".$alli.",".$row1[money1].",".$row1[money2].",".$row1[id].",".sprintf("%.1f",$row1[money1]/$row1[money2]*10).",".$k.")";
 if($i==1){$ja=$row1[id];}
 ?>
 <a href="javascript:void(0);" id="taocana<?=$i?>" onClick="<?=$oncj?>"><?=$row1[tit]?><i></i></a>
 <? $i++;}?>
 </div>
</div>
   
<?
while1("*","yjcode_taocan where admin is null and zt=0 and probh='".$row[bh]."' order by xh asc");while($row1=mysql_fetch_array($res1)){
$alli2=returncount("yjcode_taocan where admin=2 and zt=0 and tit='".$row1[tit]."' and probh='".$row[bh]."'");if($alli2>0){
$i=1;
?>
<span id="tc2num<?=$row1[id]?>" style="display:none;"><?=$alli2?></span>
<div class="taocan box" id="tc2div<?=$row1[id]?>" <? if($ja!=$row1[id]){?> style="display:none;"<? }?>>
 <div class="d1"><?=$row1[tit]?>：</div>
 <div class="d2">
 <? 
 while2("*","yjcode_taocan where admin=2 and zt=0 and tit='".$row1[tit]."' and probh='".$row[bh]."' order by xh asc");while($row2=mysql_fetch_array($res2)){
 if(empty($row2[fhxs])){$k=$row[kcnum];}else{$k=$row2[kcnum];}
 ?>
 <a href="javascript:void(0);" id="taocan2a<?=$row1[id]?>_<?=$i?>" onClick="taocan2onc(<?=$i?>,<?=$alli2?>,<?=$row2[money1]?>,<?=$row2[money2]?>,<?=$row2[id]?>,<?=sprintf("%.1f",$row2[money1]/$row2[money2]*10)?>,<?=$k?>)"><?=$row2[tit2]?><i></i></a>
 <? $i++;}?>
 </div>
</div>
<? }}?>
   
<script language="javascript">
pretc1id=<?=$ja?>;
</script>
<? }?>
<!--套餐E-->


<div class="xqonc box" onClick="gourl('proview<?=$row[id]?>.html')"><div class="d1">商品详情</div><div class="d2">></div></div>

<div class="buyfd">
<div class="buy box">
 <? 
 $a1="none";$a2="none";
 if($_SESSION["SHOPUSER"]==""){$a1="";}else{
  $nuid=returnuserid($_SESSION["SHOPUSER"]);
  if(panduan("probh,userid","yjcode_car where probh='".$row[bh]."' and userid=".$nuid)==1){$a2="";}else{$a1="";}
 }
 ?>
 <div id="cara1" style="display:<?=$a1?>;" onClick="carInto('<?=$row[bh]?>')" class="d1 car">加入购物车</div>
 <div id="cara2" style="display:<?=$a2?>;" class="d1 carok" onClick="gourl('../user/car.php');">已在购物车</div>
 <div class="d2" onClick="buyInto('<?=$row[bh]?>')">立即购买</div>
</div>
</div>

</div>

<script language="javascript">
//套餐选择
var taocanid=0;
var taocanid2=0;
var pretc1id=0;
function taocanonc(a,b,c,d,e,f,g){
 document.getElementById("utc1").className="taocan box utc";
 document.getElementById("nowkcnum").innerHTML=g;
 taocanid=e;
 taocanid2=0;
 if(pretc1id!=0){if(document.getElementById("tc2div"+pretc1id)){document.getElementById("tc2div"+pretc1id).style.display="none";}}
 if(document.getElementById("tc2div"+e)){document.getElementById("tc2div"+e).style.display="";}
 pretc1id=e;
 tc2re(taocanid);
 document.getElementById("nowmoney").innerHTML=""+c;
 document.getElementById("yuanjia").innerHTML=""+d+"元";
 for(i=1;i<=b;i++){
 document.getElementById("taocana"+i).className="taocan box";
 }
 document.getElementById("taocana"+a).className="a1";
 document.getElementById("zhekou").innerHTML=f+"折";
}
function taocan2onc(a,b,c,d,e,f,g){
 if(taocanid==0){alert("请先选择第一级套餐内容");document.getElementById("utc1").className="utc utc1";return false;}
 document.getElementById("tc2div"+taocanid).className="taocan box utc";
 document.getElementById("nowkcnum").innerHTML=g;
 taocanid2=e;
 tc2re(taocanid);
 document.getElementById("nowmoney").innerHTML=""+c;
 document.getElementById("yuanjia").innerHTML=""+d+"元";
 document.getElementById("taocan2a"+taocanid+"_"+a).className="a1";
 document.getElementById("zhekou").innerHTML=f+"折";
}
function tc2re(x){
if(document.getElementById("tc2num"+x)){
document.getElementById("tc2div"+x).className="taocan box utc";
a=parseInt(document.getElementById("tc2num"+x).innerHTML);
for(i=1;i<=a;i++){
document.getElementById("taocan2a"+x+"_"+i).className="taocan box";
}
}
}

//加入购物车
var xmlHttpcar = false;
try {
  xmlHttpcar = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttpcar = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttpcar = false;
  }
}
if (!xmlHttpcar && typeof XMLHttpRequest != 'undefined') {
  xmlHttpcar = new XMLHttpRequest();
}

function carInto(x){
if(document.getElementById("tcnum")){if(taocanid==0){alert("请先选择套餐");return false;}}
if(document.getElementById("tc2div"+taocanid)){if(taocanid2==0){alert("请先选择套餐");return false;}taocanid=taocanid2;}
url = "../../tem/carInto.php?bh="+x+"&kcnum=1&tcid="+taocanid;
xmlHttpcar.open("get", url, true);
xmlHttpcar.onreadystatechange = updatePagecar;
xmlHttpcar.send(null);
}

function updatePagecar() {
 if(xmlHttpcar.readyState == 4) {
 response = xmlHttpcar.responseText;
 response=response.replace(/[\r\n]/g,'');
  if(response=="err1"){location.href="../reg/index.php?reurl=<?=weburl?>m/product/view<?=$row[id]?>.html";return false;}
  else if(response=="err2"){alert("亲~不能将自己的商品放入购物车哦");return false;}
  else if(response=="ok"){
  document.getElementById("cara2").style.display="";
  document.getElementById("cara1").style.display="none";
  }else{alert("未知错误，请刷新重试");return false;}
 }
}

//立即购买
var xmlHttpbuy = false;
try {
  xmlHttpbuy = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttpbuy = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttpbuy = false;
  }
}
if (!xmlHttpbuy && typeof XMLHttpRequest != 'undefined') {
  xmlHttpbuy = new XMLHttpRequest();
}

function buyInto(x){
if(document.getElementById("tcnum")){if(taocanid==0){alert("请先选择套餐");return false;}}
if(document.getElementById("tc2div"+taocanid)){if(taocanid2==0){alert("请先选择套餐");return false;}taocanid=taocanid2;}
url = "../../tem/buyInto.php?bh="+x+"&kcnum=1&tcid="+taocanid;
xmlHttpbuy.open("get", url, true);
xmlHttpbuy.onreadystatechange = updatePagebuy;
xmlHttpbuy.send(null);
}

function updatePagebuy() {
 if(xmlHttpbuy.readyState == 4) {
 response = xmlHttpbuy.responseText;
 response=response.replace(/[\r\n]/g,'');
  if(response=="err1"){location.href="../reg/index.php?reurl=<?=weburl?>m/product/view<?=$row[id]?>.html";return false;}
  else if(response=="err2"){alert("亲~不能购买自己的商品哦");return false;}
  else if(response=="ok"){location.href="../user/car.php";}else{alert("未知错误，请刷新重试");return false;}
 }
}

</script>

<? include("../tem/bottom.php");?>
</body>
</html>