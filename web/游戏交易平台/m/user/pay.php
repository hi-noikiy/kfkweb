<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
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
<script language="javascript">
function xz(x){
document.getElementById(x).checked=true;	
}

function tj(){
 t1v=document.f1.t1.value;
 if(t1v.replace(/\s/,"")=="" || isNaN(t1v)){alert("请输入充值金额");return false;}
 r=document.getElementsByName("R1");
 rv="";
 for(i=0;i<r.length;i++){if(r[i].checked==true){rv=r[i].value;}}
 if(rv==""){alert("请选择支付方式");return false;}
 if(rv=="alipay" || rv==""){fu="../../user/pay.php?ifwap=yes";}
 else if(rv=="tenpay"){fu="../../user/tenpay/index.php?ifwap=yes";}
 else if(rv=="ips"){fu="../../user/ips/OrderPay.php?ifwap=yes";}
 else if(rv=="bank"){fu="../../user/bank/Send.php?ifwap=yes";}
 
 <? if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') == false ) {?>
 else if(rv=="wxpay"){f1.action="../../user/wxpay/index.php?ifwap=yes&m="+t1v;}
 <? }else{?>
 else if(rv=="wxpay"){f1.action="wxpay/wxpay_jspay_pay.php";}
 <? }?>
 else if(rv=="wxewm"){f1.action="../../user/pay.php?ifwap=yes";}
 else if(rv=="aliewm"){f1.action="../../user/pay.php?ifwap=yes";}
 else if(rv=="otherpay"){f1.action="../../user/otherpay/otherpay.php?ifwap=yes";}
 else if(rv=="yunpay"){f1.action="../../user/yunpay/yunpay.php?ifwap=yes";}
 tjwait();
 f1.action=fu;
}
</script>
</head>
<body>
<? include("top.php");?>

<div class="boxcap box">
 <div class="d1"><a href="../">用户中心</a> - 在线充值</div>
</div>

<form name="f1" method="post" onSubmit="return tj()">
<input type="hidden" value="pay" name="jvs" />

<div class="uk box">
 <div class="d11">充值金额</div>
 <div class="d2"><input type="text" name="t1" value="<?=$_GET[m]?>" /></div>
</div>

<div class="pay box">
 <div class="paym">
 
 <ul class="pay1">

 <? if(empty($rowcontrol[zftype]) && !empty($rowcontrol[partner]) && !empty($rowcontrol[security_code]) && !empty($rowcontrol[seller_email])){?>
 <li class="l2"><input name="R1" id="alipay" type="radio" value="alipay" /><img onClick="xz('alipay')" src="../../user/img/pay/alipay.gif" /></li>
 <? }elseif(3==$rowcontrol[zftype]){?>
 <li class="l2">
 <input name="R1" id="aliewm" type="radio" value="aliewm"<? if($ifpays==0){?> checked="checked"<? $ifpays=1;}?> /><img onClick="xz('aliewm')" src="../../user/img/pay/alipay.gif" />
 </li>
 <? }?>
 
 <? if(!empty($rowcontrol[tenpay1]) && !empty($rowcontrol[tenpay2])){?>
 <li class="l2"><input name="R1" id="tenpay" type="radio" value="tenpay" /><img src="../../user/img/pay/tenpay.gif" onClick="xz('tenpay')" /></li>
 <? }?>

 <? if(!empty($rowcontrol[ipsshh]) && !empty($rowcontrol[ipszs])){?>
 <li class="l2"><input name="R1" id="ips" type="radio" value="ips" /><img src="../../user/img/pay/ips.gif" onClick="xz('ips')" /></li>
 <? }?>

 <? if(!empty($rowcontrol[bankbh]) && !empty($rowcontrol[bankkey])){?>
 <li class="l2"><input name="R1" id="bank" type="radio" value="bank" /><img src="../../user/img/pay/bank.gif" onClick="xz('bank')" /></li>
 <? }?>

 <? if(empty($rowcontrol[wxpayfs]) && !empty($rowcontrol[wxpay]) && $rowcontrol[wxpay]!=",,,"){?>
 <li class="l2"><input name="R1" id="wxpay" type="radio" value="wxpay" /><img src="../../user/img/pay/wxpay.gif" onClick="xz('wxpay')" /></li>
 <? }elseif($rowcontrol[wxpayfs]==1){?>
 <li class="l2">
 <input name="R1" id="wxewm" type="radio" value="wxewm"<? if($ifpays==0){?> checked="checked"<? $ifpays=1;}?> /><img src="../../user/img/pay/wxpay.gif" onClick="xz('wxewm')" />
 </li>
 <? }?>

 <? if(!empty($rowcontrol[yunpay]) && $rowcontrol[yunpay]!=",,"){?>
 <li class="l2"><input name="R1" id="yunpay" type="radio" value="yunpay" /><img src="../../user/img/pay/yunpay.png" onClick="xz('yunpay')" /></li>
 <? }?>

 <? if(!empty($rowcontrol[otherpay])){$a=preg_split("/,/",$rowcontrol[otherpay]);?>
 <li class="l2"><input name="R1" id="otherpay" type="radio" value="otherpay" /><img src="../../user/img/pay/otherpay.jpg" onClick="xz('otherpay')" /></li>
 <? }?>
   
 </ul>
  
 </div>
</div>

<div class="carbtn">
 <div id="tjbtn"><input type="submit" class="tjinput" value="立即充值" /></div>
 <div class="tjing" id="tjing" style="display:none;">
 <img style="margin:0 0 6px 0;" src="../img/ajax_loader.gif" width="208" height="13" /><br />正在处理数据，请不要刷新页面，也不要关闭页面 ^_^
 </div>
</div>

</form>

</body>
</html>