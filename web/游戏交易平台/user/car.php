<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}
$sj=date("Y-m-d H:i:s");

//函数B
if($_GET[action]=="del"){
deletetable("yjcode_car where id=".$_GET[id]." and userid=".$rowuser[id]);
php_toheader("car.php");
}elseif($_GET[action]=="dall"){
deletetable("yjcode_car where userid=".$rowuser[id]);
echo "ok";exit;
}
//函数E
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function xuanall(){
xuan();
carmoney(0);
}

var fhxs5=0;
function carmoney(x){
am=0;
xok=0;
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
  xok++;
  if(parseInt(document.getElementById("fhxs"+i).innerHTML)==5){fhxs5=1;}
 }
}
document.getElementById("xuanok").innerHTML=xok;
document.getElementById("moneyall").innerHTML=am;
document.getElementById("yhmoney").innerHTML=yhm;
if(x!=0){
 inpmoney=parseFloat(document.getElementById("inpmoney"+x).value);
 inpnum=parseInt(document.getElementById("inpnum"+x).value);
 document.getElementById("moneyz"+x).innerHTML=accMul(inpnum,inpmoney);
}
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
if(carid==""){layer.alert("未选择任何结算商品", {icon:5});return false;}
if(fhxs5==1){
shd=parseInt(document.getElementById("shdzid").innerHTML);
if(shd==0){layer.alert("请先选择收货地址", {icon:5});return false;}
}
location.href="carpay.php?carid="+carid;
}

function txtonc(x){
layer.open({
  type: 2,
  area: ['322px', '250px'],
  title:["给卖家的留言","text-align:left"],
  skin: 'layui-layer-rim', //加上边框
  content:['carmsg.php?id='+x, 'no'] 
});
}

function delcar(){
layer.open({
		content: '您确认要清空购物车吗？',
		btn: ['确认', '取消'],
		shadeClose: false,
		yes: function(){
			layer.msg('正在清空', {icon: 16  ,time: 0,shade :0.25});
 $.get("car.php",{action:"dall"},function(result){
  if(result=="ok"){location.href="car.php";}
  else{layer.alert('清理失败，请重试', {icon:5});return false;}
 });
		}, no: function(){
			layer.close(layer.index);
		}
		});
		

}

function addshdz(){
layer.open({
  type: 2,
  area: ['700px', '420px'],
  title:["编辑收货地址","text-align:left"],
  skin: 'layui-layer-rim', //加上边框
  content:['shdzlx.php', 'no'] 
});
}

function ediadd(b){
layer.open({
  type: 2,
  area: ['700px', '420px'],
  title:["编辑收货地址","text-align:left"],
  skin: 'layui-layer-rim', //加上边框
  content:['shdz.php?bh='+b, 'no'] 
});
}

</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 购物车</li>
</ul>

<div id="shdzmain" style="display:none;">
 <div class="d1">选择收货地址</div>
 <? $shdzid=0;$i=1;while1("*","yjcode_shdz where zt=0 and userid=".$rowuser[id]." order by ifmr desc");while($row1=mysql_fetch_array($res1)){?>
 <ul class="u1<? if($i % 4==0){?> u0<? }?><? if(($row1[ifmr]==1 && $_GET[shdz]=="") or ($row1[id]==$_GET[shdz])){$shdzid=$row1[id];echo " u11";}?>">
 <li class="l1"><?=$row1[add1v]?><strong><?=$row1[add2v]?></strong> <?=$row1[add3v]." ".$row1[addr]." ".$row1[mot]?> (<?=$row1[lxr]?> 收)</li>
 <li class="l2"><a href="car.php?shdz=<?=$row1[id]?>" class="feng">选择</a> | <a href="javascript:void(0);" onclick="ediadd('<?=$row1[bh]?>')" class="feng">修改</a></li>
 </ul>
 <? $i++;}?>
 <div class="adddz"><a href="javascript:void(0);" onclick="addshdz()">添加收货地址</a></div>
</div>
<? if(!empty($shdzid)){updatetable("yjcode_car","shdzid=".$shdzid." where userid=".$rowuser[id]);}?>
<span id="shdzid" style="display:none;"><?=$shdzid?></span>

<ul class="cartbcap">
<li class="l1"><label><input name="C2" onclick="xuanall()" checked="checked" type="checkbox" value="" />&nbsp;&nbsp; 全选</label></li>
<li class="l2">商品信息</li>
<li class="l3">给卖家的留言</li>
<li class="l4">单价</li>
<li class="l5">数量</li>
<li class="l6">总价</li>
<li class="l7">操作</li>
</ul>

<? $sqlyf="select * from yjcode_shdz where id=".$shdzid;mysql_query("SET NAMES 'GBK'");$resyf=mysql_query($sqlyf);$rowyf=mysql_fetch_array($resyf);?>

<?
$i=1;
while0("*","yjcode_car where userid=".$rowuser[id]." group by selluserid order by sj desc");while($row=mysql_fetch_array($res)){
$sqlu="select * from yjcode_user where id=".$row[selluserid];mysql_query("SET NAMES 'GBK'");$resu=mysql_query($sqlu);$rowu=mysql_fetch_array($resu);
$shoptp="../upload/".$rowu[id]."/shop.jpg";
?>
<ul class="cartcap">
<? if(is_file($shoptp)){?>
<li class="l1"><img src="<?=$shoptp?>" /></li>
<? }?>
<li class="l2">店铺：<?=$rowu[shopname]?></li>
<li class="l3"><a href="http://wpa.qq.com/msgrd?v=1&uin=<?=$rowu[uqq]?>&site=<?=weburl?>&menu=yes" target="_blank"><img src="../img/qq5.gif" /></a></li>
</ul>
<div class="cartlist">
<?
while1("*","yjcode_car where userid=".$rowuser[id]." and selluserid=".$row[selluserid]." order by sj desc");while($row1=mysql_fetch_array($res1)){
$tp="../".returntp("bh='".$row1[probh]."' order by iffm desc","-2");
while2("*","yjcode_pro where bh='".$row1[probh]."' and zt=0 and ifxj=0");if($row2=mysql_fetch_array($res2)){
$money=returnyhmoney($row2[yhxs],$row2[money2],$row2[money3],$sj,$row2[yhsj1],$row2[yhsj2],$row2[id]);
$money1=$row2["money1"];
$au="../product/view".$row2[id].".html";
?>
<ul class="u1">
<li class="l1"><input name="C1" id="check<?=$i?>" type="checkbox" checked="checked" onclick="carmoney(0)" value="<?=$row1[id]?>" /></li>
<li class="l2"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd($tp,"img/none100x100")?>" width="80" height="80" /></a></li>
<li class="l3">
<a href="<?=$au?>" target="_blank" class="a2" title="<?=$row2["tit"]?>"><?=returntitdian($row2["tit"],128)?></a><br>
发货形式：<?=returnfhxs($row2[fhxs])?><span id="fhxs<?=$i?>" style="display:none"><?=$row2[fhxs]?></span><br>
<? 
if(!empty($row1[tcid])){
while3("*","yjcode_taocan where id=".$row1[tcid]);if($row3=mysql_fetch_array($res3)){
$money=$row3[money1];
$money1=$row3[money2];
$tit=$row3[tit];
if($row3[admin]==2){$tit=$tit." ".$row3[tit2];}
echo $tit;
}}?>
</li>
<li class="l4">
<textarea id="text<?=$row[id]?>" readonly="readonly" onclick="txtonc(<?=$row[id]?>)"><?=returnjgdw($row1[bz],"","未填写留言")?></textarea>
</li>
<li class="l5"><s><?=returnjgdian($money1)?></s><br><strong><?=returnjgdian($money)?></strong></li>
<li class="l6">
<input style="display:none;" id="inpmoney<?=$i?>" type="text" value="<?=$money?>" />
<input class="inp1" id="inpnum<?=$i?>" onchange="carmoney(<?=$i?>)" onkeyup="value=value.replace(/[^\d]/g,'');carmoney(<?=$i?>);" type="text" value="<?=$row1[num]?>" />
</li>
<li class="l7">
<strong class="s1"><span id="moneyz<?=$i?>"><?=$money*$row1[num]?></span></strong>
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
</li>
<li class="l8"><a href="car.php?action=del&id=<?=$row1[id]?>">删除</a></li>
</ul>
<? $i++;}}?>
</div>
<? }?>

<ul class="carjs">
<li class="l2"><a href="javascript:void(0);" onclick="delcar()">清空购物车</a></li>
<li class="l3">已选商品 <strong id="xuanok">0</strong> 件</li>
<li class="l4">已优惠<span id="yhmoney">0</span>元，实付：<span class="s1" id="moneyall">0</span></li>
<li class="l5"><img src="img/js.gif" style="cursor:pointer;" onclick="carjs()" /></li>
</ul>
<span id="carallnum" style="display:none;"><?=$i?></span>
<script language="javascript">
carmoney(0);
</script>

</div>
<? include("../tem/bottom.html");?>
</body>
</html>