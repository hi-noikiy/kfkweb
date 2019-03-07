<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$money1=$_GET[money1];
$ifwap=$_GET[ifwap];
if("yes"==$ifwap){
	Header("Location: ../m/user/alipay_ewm_wap.php?money1=".$money1); 
	}
$sj=date("Y-m-d H:i:s");
if(sqlzhuru($_POST[jvs])=="pay"){
 zwzr();
 $t1=sqlzhuru($_POST[t1]);
 $t2=sqlzhuru($_POST[t2]);
 if(empty($t1)){Audit_alert("请输入与扫码支付一致的金额","alipay_ewm.php");}
 if(empty($t2)){Audit_alert("请输入扫码支付成功后的支付宝订单号","alipay_ewm.php");}
 if(panduan("*","yjcode_payreng where ddbh='".$t2."'")){Audit_alert("该支付宝订单号已经录入，无法重复提交","alipay_ewm.php");}
 $userid=returnuserid($_SESSION[SHOPUSER]);
 intotable("yjcode_payreng","money1,type1,userid,ddbh,sj,ifok","".$t1.",1,".$userid.",'".$t2."','".$sj."',1");
 php_toheader("alipay_ewm.php?t=suc"); 
}

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
function tj(){
 if((document.f1.t1.value).replace("/\s/","")==""){alert("请输入与扫码支付一致的金额");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace("/\s/","")==""){alert("请输入扫码支付成功后的支付宝订单号");document.f1.t2.focus();return false;}
 if(!confirm("确认已经扫码支付，并且以下信息都核实")){return false;}
 tjwait();
 f1.action="alipay_ewm.php";
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<!--积分E-->
<div class="yjcode">

<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 微信结算</li>
</ul>
<? $leftid=5;include("left.php");?>

<!--RB-->
<div class="right">
 <ul class="wz">
 <li class="l0"></li>
 <li class="l1 l2">扫码支付</li>
 </ul>
 
 <? systs("恭喜您，操作成功，<strong>我们将尽快核实入账</strong>，请稍等!","alipay_ewm.php")?>
 <ul class="uk1">
 <li class="l1"></li>
 <li class="l2"><img src="../img/alipay_ewm.jpg" width="150" height="150" /></li>
 </ul>
 
 <form name="f1" method="post" onSubmit="return tj()">
 <input type="hidden" value="pay" name="jvs" />
 <ul class="uk">
 <li class="l1">操作提示：</li>
 <li class="l21">请打开手机<span class="red">支付宝</span>，扫描以上二维码充值转账，如有疑问，请咨询右侧客服QQ</li>
 <li class="l1">充值金额：</li>
 <li class="l2"><input type="text" class="inp" name="t1" value="<?=$money1?>" /> <span class="red">请务必与实际充值金额保持一致</span></li>
 <li class="l1">支付宝订单号：</li>
 <li class="l2"><input type="text" class="inp" name="t2" /> <span class="red">请输入扫码支付成功后的支付宝订单号</span></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("提交充值")?></li>
 </ul>
 </form>
 
</div>
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>