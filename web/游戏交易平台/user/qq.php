<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
if($_GET[action]=="del"){
updatetable("yjcode_user","ifqq=0,openid='' where uid='".$_SESSION[SHOPUSER]."'");	
php_toheader("qq.php");
}

$sqluser="select uid,ifqq from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);

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
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">您的位置：<a href="../" class="acy">首页</a> > <a href="./" class="acy">会员中心</a> > QQ绑定/解绑</li>
</ul>
<? $leftid=3;include("left.php");?>
<!--RB-->
<div class="right">
 <? include("rcap1.php");?>
 <script language="javascript">
 document.getElementById("rcap6").className="g_ac0_h g_bc0_h";
 </script>
 <? systs("恭喜您，操作成功!","qq.php")?>
 
 <? if(0==$rowuser[ifqq]){?>
 <ul class="qqtxt">
 <li class="l1">
 <a href="../config/qq/oauth/index.php"><img border="0" src="../img/qq_login.png" /></a><br>
 点击按钮，立即绑定QQ帐号
 </li>
 <li class="l2">
 使用QQ帐号登录本站，您可以……<br>
 用QQ帐号轻松登录<br>
 无须记住本站的帐号和密码，随时使用QQ帐号密码轻松登录
 </li>
 </ul>
 <? }elseif(1==$rowuser[ifqq]){?>
 <ul class="qqtxt">
 <li class="l3">
 <strong>您已将本站帐号与QQ号码绑定</strong><br>
 解除已绑定帐号？<br>
 <input type="button" class="btn1" onclick="gourl('qq.php?action=del')" onmouseover="this.className='btn2';" onmouseout="this.className='btn1';" value="确认解除" />
 </li>
 </ul>
 <? }?>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>