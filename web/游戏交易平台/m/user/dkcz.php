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
 t1v=document.f1.type.value;
  t2v=document.f1.ddbh.value;
   t3v=document.f1.ddmm.value;
 if(t1v==""){alert("请输入点卡类型：");return false;}
 if(t2v.replace(/\s/,"")==""){alert("请输入点卡序号");return false;}
  if(t3v.replace(/\s/,"")==""){alert("请输入充值卡密");return false;}
 r=document.getElementsByName("R1");
 rv="wxpay";
// for(i=0;i<r.length;i++){if(r[i].checked==true){rv=r[i].value;}}
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

 
 <div class="systs" style=" margin-top:24px; font-size:14px;">恭喜您，操作成功，<strong>我们将尽快核实入账</strong>，请稍等!</div>
 
  <p><a href="pay.php" style=" display:block;width:70px; height:32px; line-height:32px; font-size:14px; text-align:center; background-color:#f5f5f5; border:1px solid #d6d7dc; border-radius:4px; margin-top:30px;">继续充值</a>





</p>
 
</body>
</html>