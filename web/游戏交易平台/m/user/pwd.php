<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();

//��������ʼ
if($_POST[jvs]=="password"){
 zwzr();
 $pwd=sha1(sqlzhuru($_POST[t1]));
 $pwd1=sha1(sqlzhuru($_POST[t2]));
 $pwd2=sqlzhuru($_POST[t2]);
 $uid=$_SESSION[SHOPUSER];
 if(panduan("*","yjcode_user where uid='".$uid."' and pwd='".$pwd."'")==0){Audit_alert("ԭ������֤ʧ�ܣ��������ԣ�","pwd.php");}
 updatetable("yjcode_user","pwd='".$pwd1."' where uid='".$_SESSION[SHOPUSER]."'");
 $WAPLJ=1;
 include("../../tem/uc/pwd.php");
 php_toheader("../tishi/index.php?admin=1");
}
//����������

?>
<html>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>��Ա���� <?=webname?></title>
<link rel="stylesheet" href="../css/basic.css">
<link rel="stylesheet" href="index.css">
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
<script language="javascript">
function tj(){
 v=document.f1.t1.value;if(v.length == 0 || v.indexOf(" ")>=0){alert("�����������");document.f1.t1.focus();return false;}	
 v=document.f1.t2.value;if(v.length == 0 || v.indexOf(" ")>=0){alert("������������");document.f1.t2.focus();return false;}	
 if(document.f1.t2.value!=document.f1.t3.value){alert("��������������벻һ��");document.f1.t3.focus();return false;}	
 tjwait();
 f1.action="pwd.php";
}
</script>
</head>
<body>
<? include("top.php");?>

<div class="boxcap box">
 <div class="d1"><a href="../">�û�����</a> - �޸�����</div>
</div>

<form name="f1" method="post" onSubmit="return tj()">
<input type="hidden" value="password" name="jvs" />
<div class="uk box">
 <div class="d1"><img src="../img/pay.png" /></div>
 <div class="d2"><input type="password" name="t1" placeholder="����������ԭ����" /></div>
</div>

<div class="uk box">
 <div class="d1"><img src="../img/suo.png" /></div>
 <div class="d2"><input type="password" name="t2" placeholder="������������" /></div>
</div>

<div class="uk box">
 <div class="d1"><img src="../img/suo.png" /></div>
 <div class="d2"><input type="password" name="t3" placeholder="���ٴ�����������" /></div>
</div>

<div class="tjbutton box">
 <div class="d0"></div>
 <? tjbtnr_m("�޸�����");?>
 <div class="d0"></div>
</div>

</form>

<? include("bottom.php");?>
</body>
</html>