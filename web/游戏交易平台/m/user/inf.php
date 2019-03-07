<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();

if(sqlzhuru($_POST[jvs])=="inf"){
 zwzr();
 $nc=sqlzhuru($_POST[tnc]);
 if(empty($nc)){Audit_alert("请输入昵称","inf.php");}
 updatetable("yjcode_user","uqq='".sqlzhuru($_POST[tuqq])."',weixin='".sqlzhuru($_POST[tweixin])."' where uid='".$_SESSION[SHOPUSER]."'");
 if(panduan("uid,nc","yjcode_user where uid<>'".$_SESSION[SHOPUSER]."' and nc='".$nc."'")){Audit_alert("该昵称已被其他用户使用","inf.php");}
 updatetable("yjcode_user","nc='".$nc."' where uid='".$_SESSION[SHOPUSER]."'");
 php_toheader("../tishi/index.php?admin=3"); 
}

$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}

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
 if((document.f1.tnc.value).replace("/\s/","")==""){alert("请输入昵称");document.f1.tnc.focus();return false;}
 tjwait();
 f1.action="inf.php";
}
</script>
</head>
<body>
<? include("top.php");?>

<div class="boxcap box">
 <div class="d1"><a href="../">用户中心</a> - 个人资料</div>
</div>

<form name="f1" method="post" onSubmit="return tj()">
<input type="hidden" value="inf" name="jvs" />
<div class="uk box">
 <div class="d11">您的昵称：</div>
 <div class="d2"><input type="text" name="tnc" value="<?=$rowuser[nc]?>" placeholder="请输入您的原密码" /></div>
</div>
<div class="uk box">
 <div class="d11">LINE&nbsp;号码：</div>
 <div class="d2"><input type="text" name="tuqq" value="<?=$rowuser[uqq]?>" placeholder="请输入您的常用QQ号码" /></div>
</div>
<div class="uk box">
 <div class="d11">微信号码：</div>
 <div class="d2"><input type="text" name="tweixin" value="<?=$rowuser[weixin]?>" placeholder="请输入您的微信号码" /></div>
</div>

<div class="tjbutton box">
 <div class="d0"></div>
 <? tjbtnr_m("保存修改");?>
 <div class="d0"></div>
</div>

</form>

<? include("bottom.php");?>
</body>
</html>