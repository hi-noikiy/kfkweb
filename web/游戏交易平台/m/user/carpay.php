<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}
$sj=date("Y-m-d H:i:s");
include("../../user/buycheck.php");

//B
if(sqlzhuru($_POST[jvs])=="carpay" && sqlzhuru($_POST[R1])=="alipay"){
if($needmoney<=$usermoney){Audit_alert("您的可用余额储足，请用余额直接支付。","carpay.php?carid=".$carid);}
zwzr();
$bh=time();
$uip=$_SERVER["REMOTE_ADDR"];
$ddbh=time()."|".$rowuser[id];	
$money1=sprintf("%.2f",($needmoney-$usermoney));
intotable("yjcode_dingdang","bh,ddbh,userid,sj,uip,money1,ddzt,alipayzt,bz,ifok,carid","'".$bh."','".$ddbh."',".$rowuser[id].",'".$sj."','".$uip."',".$money1.",'等待买家付款','','',0,'".$caridarr."'");

require_once("../../user/alipay.config.php");
$payment_type = "1";
$notify_url = weburl."user/notify_carpay.php"; //服务器异步通知页面路径
$return_url = weburl."m/user/order.php";//页面跳转同步通知页面路径
$seller_email = $rowcontrol[seller_email];//卖家支付宝帐户
$out_trade_no = $ddbh;//商户订单号
$subject = webname."收银台结算";//订单名称
$body =  webname."收银台结算";
$show_url = weburl;//商品展示地址

//开始即时到帐
if(0==$rowcontrol[zftype]){ 
$alipay_config['cacert']    = getcwd().'\\cacert.pem';
require_once("../../user/lib/alipay_submit.class.php");
$total_fee = $money1;//付款金额
$anti_phishing_key = "";//防钓鱼时间戳
$exter_invoke_ip = "";//客户端的IP地址
$parameter = array(
		"service" => "create_direct_pay_by_user",
		"partner" => trim($alipay_config['partner']),
		"payment_type"	=> $payment_type,
		"notify_url"	=> $notify_url,
		"return_url"	=> $return_url,
		"seller_email"	=> $seller_email,
		"out_trade_no"	=> $out_trade_no,
		"subject"	=> $subject,
		"total_fee"	=> $total_fee,
		"body"	=> $body,
		"show_url"	=> $show_url,
		"anti_phishing_key"	=> $anti_phishing_key,
		"exter_invoke_ip"	=> $exter_invoke_ip,
		"_input_charset"	=> trim(strtolower($alipay_config['input_charset'])));
//结束即时到帐

}

//建立请求
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "正在跳转，请稍候");
echo $html_text;exit;


}elseif(sqlzhuru($_POST[jvs])=="carmypay"){//余额支付
 if($needmoney>$usermoney){Audit_alert("您的可用余额不足，返回重试。","carpay.php?carid=".$carid);}
 zwzr();
 $buyform="区服：".$_POST[yxfwq]."账号：".$_POST[yxzh]."等级：".$_POST[yxdj]."角色名：".$_POST[yxjsm]."QQ号：".$_POST[yxqq]."备注信息：".$_POST[yxbz];
 include("../../user/buy.php");
 php_toheader("../tishi/index.php?admin=4");

}
//E
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

function carpaytj(x){
 r=document.getElementsByName("R1");
 rv="";
 for(i=0;i<r.length;i++){
 if(r[i].checked==true){rv=r[i].value;}
 }
 <? if($usermoney<$needmoney){?>if(rv==""){alert("您的可用余额储足");location.href="pay.php";return false;}<? }?>
 if(rv=="alipay" || rv==""){fu="carpay.php?carid="+x;}
 else if(rv=="tenpay"){fu="../../user/tenpay/buy_index.php?carid="+x;}
 else if(rv=="ips"){fu="../../user/ips/buy_OrderPay.php?carid="+x;}
 else if(rv=="bank"){fu="../../user/bank/buy_Send.php?carid="+x;}
 
 //else if(rv=="wxpay"){f1.action="../../user/wxpay/buy_index.php?m=yes&carid="+x;}
 <? if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') == false ) {?>
 else if(rv=="wxpay"){f1.action="../../user/wxpay/buy_index.php?m=yes&carid="+x;}
 <? }else{?>
 else if(rv=="wxpay"){f1.action="wxpay/wxpay_jspay.php?carid="+x;}
 <? }?>
 
 else if(rv=="otherpay"){f1.action="../../user/otherpay/buy_otherpay.php?carid="+x;}
 else if(rv=="yunpay"){f1.action="../../user/yunpay/buy_yunpay.php?carid="+x;}
 f1.action=fu;
}
function tjonc(){
 tjwait();
}
</script>
</head>
<body>
<? include("top.php");?>

<div class="boxcap box">
 <div class="d1"><a href="../">用户中心</a> - 收银台结算</div>
</div>

  <form name="f1" method="post" onSubmit="return carpaytj('<?=$carid?>')">
  <div class="listcap box"><div class="d2">结算统计：</div></div>
  <div class="syt box">
  <div class="d1">待支付：<strong><?=sprintf("%.2f",$needmoney)?></strong> 元</div>
  <div class="d2">可用余额：<strong><?=sprintf("%.2f",$usermoney)?></strong>元</div>
  

  </div>
  <div class="uk box">
 <div class="d11">区服：</div>
 <div class="d2"><input type="text" name="yxfwq" value="" placeholder="请输入区服"></div>
</div>


  <div class="uk box">
 <div class="d11">账号：</div>
 <div class="d2"><input type="text" name="yxzh" value="" placeholder="请输入账号"></div>
</div>


<div class="uk box">
 <div class="d11">等级：</div>
 <div class="d2"><input type="text" name="yxdj" value="" placeholder="请输入等级"></div>
</div>



<div class="uk box">
 <div class="d11">角色名：</div>
 <div class="d2"><input type="text" name="yxdj" value="" placeholder="请输入角色名"></div>
</div>





<div class="uk box">
 <div class="d11">QQ号：</div>
 <div class="d2"><input type="text" name="yxqq" value="" placeholder="请输入QQ号"></div>
</div>
  
  
  
  <? if($usermoney<$needmoney){?>
  <div class="pay box">
   <div class="paym">
   
   <ul class="pay1">
   <li class="l1">&nbsp;&nbsp;采用第三方平台支付<strong><?=sprintf("%.2f",($needmoney-$usermoney))?></strong>元</li>
  
   <? if(!empty($rowcontrol[partner]) && !empty($rowcontrol[security_code]) && !empty($rowcontrol[seller_email]) && 3!=$rowcontrol[zftype]){?>
   <li class="l2"><input name="R1" id="alipay" checked="checked" type="radio" value="alipay" /><img onClick="xz('alipay')" src="../../user/img/pay/alipay.gif" /></li>
   <? }?>
  
   <? if(!empty($rowcontrol[tenpay1]) && !empty($rowcontrol[tenpay2])){?>
   <li class="l2">
   <input name="R1" id="tenpay" type="radio" value="tenpay" /><img src="../../user/img/pay/tenpay.gif" onClick="xz('tenpay')" />
   </li>
   <? }?>

   <? if(!empty($rowcontrol[ipsshh]) && !empty($rowcontrol[ipszs])){?>
   <li class="l2">
   <input name="R1" id="ips" type="radio" value="ips" /><img src="../../user/img/pay/ips.gif" onClick="xz('ips')" />
   </li>
   <? }?>
  
   <? if(!empty($rowcontrol[bankbh]) && !empty($rowcontrol[bankkey])){?>
   <li class="l2">
   <input name="R1" id="bank" type="radio" value="bank" /><img src="../../user/img/pay/bank.gif" onClick="xz('bank')" />
   </li>
   <? }?>

   <? if(!empty($rowcontrol[wxpay]) && $rowcontrol[wxpay]!=",,,"){?>
   <li class="l2">
   <input name="R1" id="wxpay" type="radio" value="wxpay" /><img src="../../user/img/pay/wxpay.gif" onClick="xz('wxpay')" />
   </li>
   <? }?> 
  
   <? if(!empty($rowcontrol[otherpay])){$a=preg_split("/,/",$rowcontrol[otherpay]);?>
   <li class="l2">
   <input name="R1" id="otherpay" type="radio" value="otherpay" /><img src="../../user/img/pay/otherpay.jpg" width="150" height="50" onClick="xz('otherpay')" />
   </li>
   <? }?>

   <? if(!empty($rowcontrol[yunpay]) && $rowcontrol[yunpay]!=",,"){?>
   <li class="l2">
   <input name="R1" id="yunpay" type="radio" value="yunpay" /><img src="../../user/img/pay/yunpay.png" width="150" height="50" onClick="xz('yunpay')" />
   </li>
   <? }?>

   </ul>
  
   </div>
  </div>
  <? }?>

  <div class="carbtn" onClick="tjonc()">
   <div id="tjbtn"><input type="submit" class="tjinput" value="确认付款" /></div>
   <div class="tjing" id="tjing" style="display:none;">
   <img style="margin:0 0 6px 0;" src="../img/ajax_loader.gif" width="208" height="13" /><br />正在处理数据，请不要刷新页面，也不要关闭页面 ^_^
   </div>
  </div>
  <input type="hidden" value="<? if($usermoney<$needmoney){echo "carpay";}else{echo "carmypay";}?>" name="jvs" />

  </form>

</body>
</html>