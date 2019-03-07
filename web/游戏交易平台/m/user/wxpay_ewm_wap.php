<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck();
$money1=$_GET[money1];
$sj=date("Y-m-d H:i:s");
if(sqlzhuru($_POST[jvs])=="pay"){
 zwzr();
 $t1=sqlzhuru($_POST[t1]);
 $t2=sqlzhuru($_POST[t2]);
 if(empty($t1)){Audit_alert("请输入与扫码支付一致的金额","wxpay_ewm_wap.php");}
 if(empty($t2)){Audit_alert("请输入扫码支付成功后的微信订单号","wxpay_ewm_wap.php");}
 if(panduan("*","yjcode_payreng where ddbh='".$t2."'")){Audit_alert("该微信订单号已经录入，无法重复提交","wxpay_ewm.php");}
 $userid=returnuserid($_SESSION[SHOPUSER]);
 intotable("yjcode_payreng","money1,type1,userid,ddbh,sj,ifok","".$t1.",2,".$userid.",'".$t2."','".$sj."',1");
 php_toheader("wxpay_ewm_wap.php?t=suc"); 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户管理面板 - <?=webname?></title>
<html>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>会员中心 <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script language="javascript" src="../../js/basic.js"></script>
<script language="javascript" src="js/../index.js"></script>
<script language="javascript" src="../../js/jquery.min.js"></script>
<script language="javascript">
function tj(){
 if((document.f1.t1.value).replace("/\s/","")==""){alert("请输入与扫码支付一致的金额");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace("/\s/","")==""){alert("请输入扫码支付成功后的微信订单号");document.f1.t2.focus();return false;}
 if(!confirm("确认已经扫码支付，并且以下信息都核实")){return false;}
 tjwait();
 f1.action="wxpay_ewm_wap.php";
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


<div class="pay box" style="border:none">
 <div class="paym">
 
 <ul class="pay1">

  <li class="" style="text-align:center"> <img src="../../img/wxpay_ewm.jpg"  width="300" height="300" /></li>
    <li class="" style="text-align:left; color:#F00; font-weight:bold">
  <? systs("恭喜您，操作成功，<strong>我们将尽快核实入账</strong>，请稍等!","wxpay_ewm.php")?></li>
  <li class="" style="text-align:left"> 请打开手机<span class="red">微信</span>，扫描以上二维码充值转账，如有疑问，请咨询客服QQ </li>
 
 
    
 </ul>
  
 </div>
</div>

 

<div class="uk box">
 <div class="d11">充值金额</div>
 <div class="d2"><input type="text" class="inp" name="t1" value="<?=$money1?>" /></div>
</div>

<div class="uk box">
 <div class="d11">微信订单号</div>
 <div class="d2"><input type="text" class="inp" name="t2" />  </div>
</div>


<div class="carbtn">
 <div id="tjbtn"><input type="submit" class="tjinput" value="立即充值" /></div>
 <div class="tjing" id="tjing" style="display:none;">
 <img style="margin:0 0 6px 0;" src="../../img/ajax_loader.gif" width="208" height="13" /><br />正在处理数据，请不要刷新页面，也不要关闭页面 ^_^
 </div>
</div>
 </form>



 
 
</body>
</html>