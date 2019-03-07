<?
include("../config/conn.php");
include("../config/function.php");
if($_SESSION["SHOPUSER"]!=""){php_toheader("../user/");}

//修改该文件，要同步修改下reg/reg.php、reg/qqreturnlast.php 、m/reg/reg.php

//写入数据库开始
if($_GET[action]=="add"){
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 zwzr();
 if(strtolower($_SESSION["authnum_session"])!=strtolower(sqlzhuru($_POST["t5"]))){Audit_alert("验证码不正确，返回修改验证码！","reg.php");}
 
 include("../tem/uc/reg.php");
 
 $uid=sqlzhuru(trim($_POST[t1]));
 $pwd=sqlzhuru($_POST[t2]);
 $nc=sqlzhuru($_POST[t4]);
 $uqq=sqlzhuru($_POST[t6]);
 $email=sqlzhuru($_POST[t7]);
 include("reg_tem.php");
 
 include("../tem/uc/reg1.php");
 
 php_toheader("../user/");
 
}
//写入数据库结束


//推荐人ID COOKIE入
$tid=$_GET[tid];
if(!empty($tid)){
 $Month = 864000 + time();
 setcookie(tjuserid,$tid, $Month,'/');
}

?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>注册会员 - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<div id="bghui" style="position:absolute;top:0px;filter:alpha(Opacity=60);-moz-opacity:0.6;opacity:0.6;background-color:#777;z-index:199;left:0px;"></div>
<div id="openw" class="openw" style="display:none;"><div class="kf"><span id="tangts">系统正在处理数据，请勿刷新或关闭页面……</span></div></div>

<? include("../tem/top.html");?>

<div class="yjcode">
 <div class="mtop">
 <ul class="u1 fontyh">
 <li class="l1"><a href="../"><img border="0" src="../img/logo.png" /></a></li>
 <li class="l2">已有<?=webname?>账号？<a href="./">立即登录</a></li>
 </ul>
 </div>
</div>

<div class="bfb regbfb fontyh">
<div class="yjcode">

  <div class="regleft">
  <form name="f1" method="post" onSubmit="return tj()">
  <ul class="u1">
  <li class="l1">注册帐号</li>
  <li class="l2">
  <input type="text" class="inp1" name="t1" autocomplete="off" disableautocomplete onBlur="userCheck()">
  <span class="s1" id="imgts1"></span>
  <span class="s2" id="ts1">4-20位字母、数字或下划线组合</span>
  </li>
  <li class="l1">密码</li>
  <li class="l2">
  <input type="password" class="inp1" name="t2" autocomplete="off" disableautocomplete onBlur="pwd1chk()">
  <span class="s1" id="imgts2"></span>
  <span class="s2" id="ts2">6-20个字母、数字、下划线的组合</span>
  </li>
  <li class="l1">确认密码</li>
  <li class="l2">
  <input type="password" class="inp1" name="t3" autocomplete="off" disableautocomplete onBlur="pwd2chk()">
  <span class="s1" id="imgts3"></span>
  <span class="s2" id="ts3">确保密码输入正确</span>
  </li>
  <li class="l1">昵称</li>
  <li class="l2">
  <input type="text" class="inp1" name="t4" autocomplete="off" disableautocomplete onBlur="ncCheck()">
  <span class="s1" id="imgts4"></span>
  <span class="s2" id="ts4">请输入您在本站的昵称</span>
  </li>
  <li class="l1">联系QQ</li>
  <li class="l2">
  <input type="text" class="inp1" name="t6" autocomplete="off" disableautocomplete onBlur="qqCheck()">
  <span class="s1" id="imgts6"></span>
  <span class="s2" id="ts6">请务必填写正确的联系QQ</span>
  </li>
  <li class="l1">常用邮箱</li>
  <li class="l2">
  <input type="text" class="inp1" name="t7" autocomplete="off" disableautocomplete onBlur="yxCheck()">
  <span class="s1" id="imgts7"></span>
  <span class="s2" id="ts7">请填写您的常用邮箱</span>
  </li>
  <li class="l1">验证码</li>
  <li class="l2">
  <input type="text" class="inp2" name="t5"> 
  <img src="../config/getYZM.php" onClick="this.src='../config/getYZM.php?'+Math.random();" class="img1" />
  </li>
  <li class="l3"><input type="submit" value="同意以下协议并注册"></li>
  <li class="l4"><a href="../help/aboutview1.html" class="feng" target="_blank">《<?=webname?>会员注册协议》</a></li>
  </ul>
  </form>
  </div>
  
  <div class="regright">
<? adwhile("ADO02");?>
  
  </div>

</div>
</div>

<? include("../tem/bottom.html");?>

</body>
</html>