<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();

$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);
if(empty($rowuser[txyh]) || empty($rowuser[txname]) || empty($rowuser[txzh])){Audit_alert("您未设置收款帐号，请先设置","txsz.php");}

if(sqlzhuru($_POST[jvs])=="tixian"){
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 $money1=sqlzhuru($_POST[t1]);
 if(!eregi("^[0-9,\.]+$",$money1)){Audit_alert("提现金额不正确","tixian.php");}
 $m=(float)$money1;
 if($m>$rowuser[money1] || $m<=0){Audit_alert("提现金额不正确，提现失败","tixian.php");}
 if($m<$rowcontrol[txdi]){Audit_alert("低于最低提现额，提现失败","tixian.php");}
 $bh=time()."tx".$rowuser[id];
 intotable("yjcode_tixian","bh,userid,money1,sj,uip,txyh,txname,txzh,txkhh,zt,sm","'".$bh."',".$rowuser[id].",".$m.",'".$sj."','".$uip."','".$rowuser[txyh]."','".$rowuser[txname]."','".$rowuser[txzh]."','".$rowuser[txkhh]."',4,''");
  PointUpdateM($rowuser[id],$m*(-1));
  PointIntoM($rowuser[id],"提现申请",$m*(-1));
  php_toheader("../tishi/index.php?admin=999&b=../user/");
}

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
function tj(){
if((document.f1.t1.value).replace(/\s/,"")=="" || isNaN(document.f1.t1.value)){alert("请输入有效的提现金额");document.f1.t1.focus();return false;}	
if(parseFloat(document.f1.t1.value)<<?=$rowcontrol[txdi]?>){alert("单次提现不得低于<?=$rowcontrol[txdi]?>元");document.f1.t1.focus();return false;}	
if(confirm("确定要提现吗？")){tjwait();f1.action="tixian.php";}else{return false;}
}
</script>
</head>
<body>
<? include("top.php");?>

<div class="boxcap box">
 <div class="d1"><a href="../">用户中心</a> - 提现</div>
</div>

 <form name="f1" method="post" onSubmit="return tj()">
 <input type="hidden" value="tixian" name="jvs" />
 <div class="tishi box">
  <div class="d1">
  <strong>友情提示：</strong><br>
  如果不想用以下的收款帐号收款，您可以【<a href="txsz.php" class="feng">修改收款帐号信息</a>】<br>
  <? if(!empty($rowcontrol[txfl])){?>
  提现需要扣除<?=$rowcontrol[txfl]*100?>%的手续费<br>
  <? }?>
  可用余额：<strong style="font-family:Arial, Helvetica, sans-serif;font-size:16px;color:#ff6600;"><?=sprintf("%.2f",$rowuser[money1])?></strong><br>
  单次提现不得低于<?=$rowcontrol[txdi]?>元
  </div>
 </div>
 <div class="uk box">
  <div class="d1"><img src="../img/money.png" /></div>
  <div class="d2"><input type="text" class="inp" placeholder="请输入提现金额" name="t1" /> </div>
 </div>
 <div class="tishi box">
  <div class="d1">
  提现类型：<?=$rowuser[txyh]?><br>
  卡号/账号：<?=$rowuser[txzh]?><br>
  <? if($rowuser[txyh]!="支付宝" && $rowuser[txyh]!="财付通"){?>开户行：<?=$rowuser[txkhh]?><br><? }?>
  户名：<strong class="green"><?=$rowuser[txname]?></strong>
  </div>
 </div>

 <div class="tjbutton box">
  <div class="d0"></div>
  <? tjbtnr_m("提交申请");?>
  <div class="d0"></div>
 </div>

 </form>

<? include("bottom.php");?>
</body>
</html>