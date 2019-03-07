<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
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

<script language="javascript">
var sjall=5;//定义等待时间为5秒
var nowsms=1; //当前执行的顺序号
var allsms=0; //最大的SMS顺序号
function goback(){
if(sjall<=1){location.href="order.php";}else{
sjall=sjall-1;
document.getElementById("gbnum").innerHTML=sjall;
}
}

//SMSMAIL系统
function timeset(){
document.getElementById("smstzi").style.display="";	
setInterval("goback()",1000);
}



var xmlHttpsms = false;
try {
  xmlHttpsms = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttpsms = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttpsms = false;
  }
}
if (!xmlHttpsms && typeof XMLHttpRequest != 'undefined') {
  xmlHttpsms = new XMLHttpRequest();
}


function updatePagesms() {
  if (xmlHttpsms.readyState == 4) {
    var response = xmlHttpsms.responseText;
	response=response.replace(/[\r\n]/g,'');
	document.getElementById("smslist"+nowsms).className="smslist smslist1";
	document.getElementById("fs"+nowsms).innerHTML="<span class='blue'>发送成功</span>";
	document.getElementById("fszt"+nowsms).innerHTML="<span class='green'>通知已发送，卖家将尽快为您发货</span>";
	if(allsms>nowsms){nowsms=nowsms+1;setTimeout("userChecksms()",5000);}else{timeset();}
  }
}

function userChecksms(){
    var url = "sms_sell_chk.php?id="+document.getElementById("smsid"+nowsms).innerHTML;
    xmlHttpsms.open("post", url, true);
    xmlHttpsms.onreadystatechange = updatePagesms;
    xmlHttpsms.send(null);
	}


</script>

</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 正在通知卖家发货</li>
</ul>
<? include("left.php");?>

<!--RB-->
<div class="right">

 <div class="smscap">您好，您的订单已经支付成功，我们正在给卖家发送提醒，请勿刷新或关闭页面</div>
 <?
 $i=0;
 while0("*","yjcode_smsmail where userid=".$userid." and tyid=1 order by id asc");while($row=mysql_fetch_array($res)){
 if($row[admin]==1){$na="邮件发送中……";}
 else{$na="短信发送中……";}
 $i++;
 ?>
 <div class="smslist" id="smslist<?=$i?>">
 <span id="smsid<?=$i?>" style="display:none;"><?=$row[id]?></span>
 <ul class="u1">
 <li class="l1"><span id="fs<?=$i?>"><?=$na?></span> 接收：<?=strgb2312($row[fa],0,8)?>***</li>
 <li class="l2"><span id="fszt<?=$i?>">正在发送</span></li>
 </ul>
 </div>
 <? 
 }
 ?>
 <div class="smstz" style="display:none;" id="smstzi">发送已成功，页面将在&nbsp;<span id="gbnum" class="red">5</span>&nbsp;秒后跳转</div>
 <script language="javascript">
 allsms=<?=$i?>;
 <? if($i==0){?>timeset();<? }else{?>userChecksms();<? }?>
 </script>

 
</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>