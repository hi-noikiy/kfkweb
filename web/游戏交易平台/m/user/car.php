<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$userid=returnuserid($_SESSION[SHOPUSER]);
//函数B
if($_GET[action]=="del"){
deletetable("yjcode_car where id=".$_GET[id]." and userid=".$userid);
php_toheader("car.php");
}
//函数E
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
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function xuanall(){
xuan();
carmoney();
}

var fhxs5=0;
function carmoney(){
am=0;
yhm=0; //优惠值
carallv=parseInt(document.getElementById("carallnum").innerHTML);
for(i=1;i<carallv;i++){
 c=document.getElementById("check"+i).checked;
 if(c==true){
  inpmoney=parseFloat(document.getElementById("inpmoney"+i).value);
  inpnum=parseInt(document.getElementById("inpnum"+i).value);
  ddm=accMul(inpnum,inpmoney);//单个商品总价
  yhz=parseInt(document.getElementById("yhzhi"+i).innerHTML);
  if(yhz!=10){yhm=yhm+ddm-ddm*yhz/10;ddm=ddm*yhz/10;}
  yf=parseInt(document.getElementById("yunfei"+i).innerHTML);
  am=addNum(am,ddm+yf);
  if(parseInt(document.getElementById("fhxs"+i).innerHTML)==5){fhxs5=1;}
 }
}
document.getElementById("moneyall").innerHTML=am;
document.getElementById("yhmoney").innerHTML=yhm;
if(fhxs5==1){document.getElementById("shdzmain").style.display="";}else{document.getElementById("shdzmain").style.display="none";}
}

function carjs(){
carid="";
carallv=parseInt(document.getElementById("carallnum").innerHTML);
for(i=1;i<carallv;i++){
 c=document.getElementById("check"+i).checked;
 if(c==true){
  carid=carid+document.getElementById("check"+i).value+"-"+document.getElementById("inpnum"+i).value+"c";
 }
}
if(carid==""){layer.open({content: '未选择任何结算商品',btn: '我知道了'});return false;}
if(fhxs5==1){
shd=parseInt(document.getElementById("shdzid").innerHTML);
if(shd==0){layer.open({content: '请先选择收货地址',btn: '我知道了'});return false;}
}
location.href="carpay.php?carid="+carid;
}

function cjian(x){
a=parseInt(document.getElementById("inpnum"+x).value);
if(a>1){document.getElementById("inpnum"+x).value=a-1;}
carmoney();
}

function cjia(x){
a=parseInt(document.getElementById("inpnum"+x).value);
document.getElementById("inpnum"+x).value=a+1;
carmoney();
}

function txtonc(x){
carallv=parseInt(document.getElementById("carallnum").innerHTML);
for(i=1;i<carallv;i++){
d=document.getElementById("txta"+i);
if(d){d.style.display="none";document.getElementById("text"+i).className="";}
}
document.getElementById("txta"+x).style.display="";document.getElementById("text"+x).className="t1";
}

function txtaonc(x,y){
 layer.open({type: 2,content: '正在保存'});
 $.post("bzphp.php",{bzv:document.getElementById("text"+x).value,cid:y},function(result){
  if(result=="ok"){
  layer.close(layer.index);
  document.getElementById("txta"+x).style.display="none";
  document.getElementById("text"+x).className="";
  }
  else{layer.open({content: '保存失败，请重试',btn: '我知道了'});return false;}
 });
}
</script>
</head>
<body>
<? include("top.php");?>

<div class="boxcap box">
 <div class="d1">购物车</div>
</div>

<div id="shdzmain" style="display:none;">
 <?
 $shdzid=$_GET[shdz];
 if(empty($shdzid)){$ses=" order by ifmr desc limit 1";}else{$ses=" and id=".$shdzid;}
 while1("*","yjcode_shdz where zt=0 and userid=".$rowuser[id]."".$ses);if($row1=mysql_fetch_array($res1)){
 $shdzid=$row1[id];
 ?>
 <div class="shdz box" onClick="gourl('carshdz.php')">
 <div class="d1">
 <span class="s1">收货人：<?=$row1[lxr]?></span><span class="s2"><?=$row1[mot]?></span>
 <span class="s3"><?=$row1[add1v].$row1[add2v].$row1[add3v].$row1[addr]?></span>
 </div>
 <div class="d2">修改</div>
 </div>
 <? }?>
 <? if(empty($shdzid)){?><div class="shdzadd box"><div class="d1"><a href="shdzlx.php">添加收货地址</a></div></div><? }?>
 <? if(!empty($shdzid)){updatetable("yjcode_car","shdzid=".$shdzid." where userid=".$rowuser[id]);}?>
 <span id="shdzid" style="display:none;"><?=$shdzid?></span>
</div>


<? $shdzid=returnjgdw($shdzid,"",0);$sqlyf="select * from yjcode_shdz where id=".$shdzid;mysql_query("SET NAMES 'GBK'");$resyf=mysql_query($sqlyf);$rowyf=mysql_fetch_array($resyf);?>

<?
$i=1;
while0("*","yjcode_car where userid=".$rowuser[id]." group by selluserid order by sj desc");while($row=mysql_fetch_array($res)){
$sqlu="select * from yjcode_user where id=".$row[selluserid];mysql_query("SET NAMES 'GBK'");$resu=mysql_query($sqlu);$rowu=mysql_fetch_array($resu);
$shoptp="../upload/".$rowu[id]."/shop.jpg";
?>
<div class="carM box">
 <div class="d1">店铺：<?=$rowu[shopname]?></div>
 <div class="d2"></div>
</div>

<?
while1("*","yjcode_car where userid=".$rowuser[id]." and selluserid=".$row[selluserid]." order by sj desc");while($row1=mysql_fetch_array($res1)){
$tp="../../".returntp("bh='".$row1[probh]."' order by iffm desc","-2");
while2("*","yjcode_pro where bh='".$row1[probh]."' and zt=0 and ifxj=0");if($row2=mysql_fetch_array($res2)){
$money=returnyhmoney($row2[yhxs],$row2[money2],$row2[money3],$sj,$row2[yhsj1],$row2[yhsj2],$row2[id]);
$money1=$row2["money1"];
$au="../product/view".$row2[id].".html";
?>
<div class="car box">
 <div class="d1"><input onClick="carmoney()" checked="checked" name="C1" id="check<?=$i?>" type="checkbox" value="<?=$row1[id]?>" /></div>
 <div class="d2"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd($tp,"img/none60x60.gif")?>" width="50" height="50" /></a></div>
 <div class="d3">
 <span class="s1">
 <?=$row2["tit"]?>
 <span id="fhxs<?=$i?>" style="display:none"><?=$row2[fhxs]?></span>
 <? 
 if(!empty($row1[tcid])){
 while3("*","yjcode_taocan where id=".$row1[tcid]);if($row3=mysql_fetch_array($res3)){
 $money=$row3[money1];
 $money1=$row3[money2];
 $tit=$row3[tit];
 if($row3[admin]==2){$tit=$tit." ".$row3[tit2];}
 echo "<span class='hui'>(套餐:".$tit.")</span>";
 }}?>
 </span>

 <? $yf=0;if($row2[fhxs]==5){$yf=returnyunfei($rowyf[add1],$rowyf[add2],$rowyf[add3],$row2[userid]);if($yf>0){?>
 <span class="yf">运费<?=$yf?>元</span>
 <? }}?>
 <span style="display:none;" id="yunfei<?=$i?>"><?=$yf?></span>

 <?
 /*读取优惠B*/
 $yhzhi=10;
 if(!empty($row2[ifuserdj])){
  if(!empty($rowuser[userdj])){$s=" and name1='".$rowuser[userdj]."'";$djname=$rowuser[userdj];}else{$s="";$djname="";}
  $sqlu4="select * from yjcode_prouserdj where probh='".$row2[bh]."' and djname='".$djname."'";mysql_query("SET NAMES 'GBK'");$resu4=mysql_query($sqlu4);
  if($rowu4=mysql_fetch_array($resu4)){
   $userdj=$rowu4[djname];
   $yhzhi=$rowu4[zhi];
  }else{
   $sqlu3="select * from yjcode_userdj where zt=0".$s." order by xh asc limit 1";mysql_query("SET NAMES 'GBK'");$resu3=mysql_query($sqlu3);
   if($rowu3=mysql_fetch_array($resu3)){
   $userdj=$rowu3[name1];
   $yhzhi=$rowu3[zhekou];
   } 
  }
 }
 if($yhzhi!=10 && !empty($yhzhi)){echo "<span class='yh'>".$userdj."享".$yhzhi."折</span>";}
 /*读取优惠E*/
 ?>
 <span id="yhzhi<?=$i?>" style="display:none;"><?=$yhzhi?></span>

 <span class="s3"><strong><?=$money?></strong>&nbsp;&nbsp;&nbsp;<s><?=$money1?></s></span>
 <span class="s4">
  <span onClick="cjian(<?=$i?>)">-</span><input id="inpnum<?=$i?>" class="tjinput" type="text" value="<?=$row1[num]?>" /><span onClick="cjia(<?=$i?>)">+</span>
 </span>
 <div class="liuyan">
  <textarea id="text<?=$i?>" onclick="txtonc(<?=$i?>)" placeholder="选填：给卖家的留言"><?=$row1[bz]?></textarea>
  <a href="javascript:void(0);" id="txta<?=$i?>" onclick="txtaonc(<?=$i?>,<?=$row1[id]?>)" style="display:none;">保存</a>
 </div>
 <input style="display:none;" id="inpmoney<?=$i?>" type="text" value="<?=$money?>" />
 </div>
</div>
<?
$i++;
}}}
?>

<div class="carjsF"></div>
<div class="carjs">
 <div class="d1">已优惠<span id="yhmoney" class="feng">0</span>元,实付:<span class="s1" id="moneyall">0</span></div>
 <div class="d2" onClick="carjs()">结算</div>
</div>
<span id="carallnum" style="display:none;"><?=$i?></span>
<script language="javascript">
carmoney();
</script>

</body>
</html>