<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();

if(sqlzhuru($_POST[jvs])=="tx"){
 zwzr();
 if(empty($_POST[t1])){Audit_alert("验证码有误！","txsz.php");}
 $zfmm=sha1(sqlzhuru($_POST[t1]));
 if(panduan("uid,zfmm","yjcode_user where zfmm='".$zfmm."' and uid='".$_SESSION[SHOPUSER]."'")==0){Audit_alert("安全码有误！","txsz.php");}
 updatetable("yjcode_user","txyh='".sqlzhuru($_POST[ttxyh])."',txname='".sqlzhuru($_POST[ttxname])."',txzh='".sqlzhuru($_POST[ttxzh])."',txkhh='".sqlzhuru($_POST[ttxkhh])."' where uid='".$_SESSION[SHOPUSER]."'");
 php_toheader("../tishi/index.php?admin=999&b=../user/txsz.php"); 

}

$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);

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
 if((document.f1.ttxzh.value).replace("/\s/","")==""){alert("请输入卡号/账号");document.f1.ttxzh.focus();return false;}
 if((document.f1.ttxname.value).replace("/\s/","")==""){alert("请输入户名");document.f1.ttxname.focus();return false;}
 if((document.f1.t1.value).replace("/\s/","")==""){alert("请输入安全码");document.f1.t1.focus();return false;}
 tjwait();
 f1.action="txsz.php";
}

function txlxcha(){
 tx=document.getElementById("ttxyh").value;
 if(tx=="支付宝" || tx=="微信"){document.getElementById("khh").style.display="none";}else{document.getElementById("khh").style.display="";}
}
</script>
</head>
<body>
<? include("top.php");?>

<div class="boxcap box">
 <div class="d1"><a href="../">用户中心</a> - 提现设置</div>
</div>

 <form name="f1" method="post" onSubmit="return tj()">
 <input type="hidden" value="tx" name="jvs" />
 <div class="uk box">
  <div class="d11">提现类型：</div>
  <div class="d2">
  <select name="ttxyh" id="ttxyh" onchange="txlxcha()">
  <?
  $yharr=preg_split("/xcf/",$rowcontrol[txyh]);
  for($i=0;$i<count($yharr);$i++){
  if(!empty($yharr[$i])){
  ?>
  <option value="<?=$yharr[$i]?>"<? if($rowuser[txyh]==$yharr[$i]){?> selected="selected"<? }?>><?=$yharr[$i]?></option>
  <?
  }}
  ?>
  </select>
  </div>
 </div>
 <div class="uk box">
  <div class="d11">收款账号：</div>
  <div class="d2"><input type="text" value="<?=$rowuser[txzh]?>" placeholder="请输入银行卡号/账号" name="ttxzh" /></div>
 </div>
 <div class="uk box" id="khh">
  <div class="d11">开户银行：</div>
  <div class="d2"><input type="text" value="<?=$rowuser[txkhh]?>" placeholder="请输入开户行名称" name="ttxkhh" /></div>
 </div>
 <div class="uk box">
  <div class="d11">真实户名：</div>
  <div class="d2"><input type="text" value="<?=$rowuser[txname]?>" placeholder="请输入户名" name="ttxname" /></div>
 </div>
 <div class="uk box">
  <div class="d11">支付密码：</div>
  <div class="d2"><input type="password" class="inp" placeholder="请输入支付密码" name="t1" /></div>
 </div>

 <div class="tjbutton box">
 <div class="d0"></div>
 <? tjbtnr_m("提交");?>
 <div class="d0"></div>
 </div>
 </form>

<? include("bottom.php");?>
<script language="javascript">txlxcha();</script>
</body>
</html>