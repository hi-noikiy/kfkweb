<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

if(sqlzhuru($_POST[jvs])=="inf"){
 zwzr();
 $nc=sqlzhuru($_POST[tnc]);
 if(empty($nc)){Audit_alert("请输入昵称","inf.php");}
 updatetable("yjcode_user","uqq='".sqlzhuru($_POST[tuqq])."',weixin='".sqlzhuru($_POST[tweixin])."' where uid='".$_SESSION[SHOPUSER]."'");
 if(panduan("uid,nc","yjcode_user where uid<>'".$_SESSION[SHOPUSER]."' and nc='".$nc."'")){Audit_alert("该昵称已被其他用户使用","inf.php");}
 updatetable("yjcode_user","nc='".$nc."' where uid='".$_SESSION[SHOPUSER]."'");
 php_toheader("inf.php?t=suc"); 
}

$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}

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
function tj(){
 if((document.f1.tnc.value).replace("/\s/","")==""){layer.alert('请输入昵称', {icon:5});document.f1.tnc.focus();return false;}
 tjwait();
 f1.action="inf.php";
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > 个人基本资料</li>
</ul>
<? $leftid=3;include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap1.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="g_ac0_h g_bc0_h";
 </script>
 <? systs("恭喜您，操作成功!","inf.php")?>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="inf" name="jvs" />
 <ul class="uk">
 <li class="l1">用户帐号：</li>
 <li class="l21"><?=$_SESSION[SHOPUSER]?></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> 昵称：</li>
 <li class="l2"><input type="text" class="inp" name="tnc" value="<?=$rowuser[nc]?>" /></li>
 <li class="l1">邮箱地址：</li>
 <li class="l21"><?=$rowuser["email"]?> <a href="emailbd.php" class="blue">[邮箱认证]</a></li>
 <li class="l1">手机号码：</li>
 <li class="l21"><?=$rowuser[mot]?> <a href="mobbd.php" class="blue">[修改手机号码]</a></li>
 <li class="l1">QQ号码：</li>
 <li class="l2"><input type="text" class="inp" name="tuqq" value="<?=$rowuser[uqq]?>" /></li>
 <li class="l1">微信号码：</li>
 <li class="l2"><input type="text" class="inp" name="tweixin" value="<?=$rowuser[weixin]?>" /></li>
 <li class="l3"></li>
 <li class="l4"><? tjbtnr("保存修改")?></li>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>