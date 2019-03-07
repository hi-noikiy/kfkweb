<?
include("../../config/conn.php");
include("../../config/function.php");
if($_SESSION["SHOPUSER"]!=""){php_toheader("../user/");}

//写入数据库开始
if($_GET[action]=="add" && $_POST[jvs]=="reg"){
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 zwzr();
 $WAPLJ=1;
 include("../../tem/uc/reg.php");
 
 $uid=sqlzhuru(trim($_POST[t1]));
 $pwd=sqlzhuru($_POST[t2]);
 $nc=sqlzhuru($_POST[t1]);
 $uqq=sqlzhuru($_POST[t6]);
 $email=sqlzhuru($_POST[t7]);
 include("../../reg/reg_tem.php");
 
 include("../../tem/uc/reg1.php");
 
 php_toheader(returnjgdw($_SESSION["tzURL"],"","../user/"));
 
}
//写入数据库结束
?>
<html>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>会员注册 <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<div class="yjcode">

<!--头部B-->
<div class="indextop box">
 <div class="d1" onClick="javascript:history.go(-1);"><img src="../img/back.png" style="margin:15px 0 0 0;" /></div>
 <div class="d21">用户注册</div>
 <div class="d3"></div>
</div>
<!--头部E-->

<form name="f1" method="post" onSubmit="return tj()">
<input type="hidden" value="reg" name="jvs" />
<div class="login box">
 <div class="d1"><img src="../img/user.png" /></div>
 <div class="d2"><input type="text" placeholder="注册账号" name="t1" onBlur="userCheck()"/></div>
</div>
<div class="tishi box">
  <div class="s1" id="imgts1" style="display:none;"></div>
  <div class="s2" id="ts1" style="display:none;"></div>
</div>

<div class="login box">
 <div class="d1"><img src="../img/suo.png" /></div>
 <div class="d2"><input type="password" placeholder="密码" name="t2" onBlur="pwd1chk()"/></div>
</div>
<div class="tishi box">
  <div class="s1" id="imgts2" style="display:none;"></div>
  <div class="s2" id="ts2" style="display:none;"></div>
</div>

<div class="login box">
 <div class="d1"><img src="../img/regqq.png" /></div>
 <div class="d2"><input type="text" placeholder="常用LINE" name="t6" onBlur="qqCheck()"/></div>
</div>
<div class="tishi box">
  <div class="s1" id="imgts6" style="display:none;"></div>
  <div class="s2" id="ts6" style="display:none;"></div>
</div>

<div class="login box">
 <div class="d1"><img src="../img/regmail.png" /></div>
 <div class="d2"><input type="text" placeholder="邮箱地址" name="t7" onBlur="yxCheck()"/></div>
</div>
<div class="tishi box">
  <div class="s1" id="imgts7" style="display:none;"></div>
  <div class="s2" id="ts7" style="display:none;"></div>
</div>

<div class="loginbtn box">
 <div class="d0"></div>
 <div class="d1" id="tjbtn"><input type="submit" class="tjinput" value="注 册" /></div>
 <div class="d1" id="tjing" style="display:none;"><img style="margin:0 0 8px 0;" src="../img/ajax_loader.gif" /><br>正在加载，请稍候</div>
 <div class="d0"></div>
</div>

</form>

</div>

<? include("../tem/bottom.php");?>
</body>
</html>