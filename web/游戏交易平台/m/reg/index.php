<?
include("../../config/conn.php");
include("../../config/function.php");
if($_SESSION["SHOPUSER"]!=""){php_toheader("../user/");}
if(!empty($_GET[reurl])){$_SESSION["tzURL"]=$_GET[reurl];}

//��¼��֤��ʼ
if($_GET[action]=="login" && sqlzhuru($_POST[jvs])=="login"){
 zwzr();
 $WAPLJ=1;
 include("../../tem/uc/login.php");
 $uid=sqlzhuru($_POST[t1]);$pwd=sqlzhuru($_POST[t2]);
 include("../../reg/login_tem.php");
 php_toheader(returnjgdw($_SESSION["tzURL"],"","../user/"));
}
//��¼��֤����
?>
<html>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>��Ա��¼ <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
</head>
<body>
<div class="yjcode">

<!--ͷ��B-->
<div class="indextop box">
 <div class="d1" onClick="javascript:history.go(-1);"><img src="../img/back.png" style="margin:15px 0 0 0;" /></div>
 <div class="d21">��¼</div>
 <div class="d3"></div>
</div>
<!--ͷ��E-->

<form name="f1" method="post" onSubmit="return login()">
<input type="hidden" value="login" name="jvs" />
<div class="login box">
 <div class="d1"><img src="../img/user.png" /></div>
 <div class="d2"><input type="text" placeholder="���������ڱ�վ���ʺ�" name="t1" /></div>
</div>

<div class="login box">
 <div class="d1"><img src="../img/suo.png" /></div>
 <div class="d2"><input type="password" placeholder="�������¼����" name="t2" /></div>
</div>

<div class="loginDH box">
 <div class="d1"><a href="reg.php">ע�����˺�</a></div>
 <div class="d2"><a href="../../config/qq/oauth/index.php?tz=wap">QQ��¼</a></div>
</div>

<div class="loginbtn box">
 <div class="d0"></div>
 <div class="d1" id="tjbtn"><input type="submit" class="tjinput" value="�� ¼" /></div>
 <div class="d1" id="tjing" style="display:none;"><img style="margin:0 0 8px 0;" src="../img/ajax_loader.gif" /><br>���ڼ��أ����Ժ�</div>
 <div class="d0"></div>
</div>

</form>

</div>
<? include("../tem/bottom.php");?>
</body>
</html>