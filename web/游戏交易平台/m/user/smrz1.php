<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();

$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);if($rowuser[sfzrz]!=2 && $rowuser[sfzrz]!=3){php_toheader("smrz.php"); }

if($_POST[jvs]=="smrz"){
 zwzr();
 $sfz=sqlzhuru($_POST[tsfz]);
 if(strlen(stripos($sfz,"/"))>0 || strlen(stripos($sfz,";"))>0){Audit_alert("���֤�����ʽ����","smrz1.php");}
 updatetable("yjcode_user","uname='".sqlzhuru($_POST[tuname])."',sfz='".sqlzhuru($_POST[tsfz])."' where uid='".$_SESSION[SHOPUSER]."'");
 php_toheader("smrz2.php"); 
}
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
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>

<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.uploadifive.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="uploadifive.css">

<script language="javascript">
function tj(){
 if((document.f1.tuname.value).replace("/\s/","")==""){alert("��������ʵ����");document.f1.tuname.focus();return false;}
 if((document.f1.tsfz.value).replace("/\s/","")==""){alert("���������֤����");document.f1.tsfz.focus();return false;}
 tjwait();
 f1.action="smrz1.php";
}
</script>

</head>
<body>
<? include("top.php");?>

<div class="boxcap box">
 <div class="d1"><a href="../">�û�����</a> - ʵ����֤</div>
</div>

<div class="tishi box">
<div class="d1">
��֤���裺<br>
<strong class="blue">һ����д��ʵ���������֤����</strong><br>
�����ϴ����֤������Ƭ<br>
�����ϴ����֤������Ƭ<br>
�ġ��ϴ��ֳ����֤����������Ƭ<br>
</div>
</div>

<form name="f1" method="post" onSubmit="return tj()">
<input type="hidden" value="smrz" name="jvs" />
<div class="uk box">
 <div class="d11">��ʵ������</div>
 <div class="d2"><input type="text" class="inp" name="tuname" value="<?=$rowuser[uname]?>" placeholder="��������ʵ����" /></div>
</div>

<div class="uk box">
 <div class="d11">���֤�ţ�</div>
 <div class="d2"><input type="text" class="inp" name="tsfz" value="<?=$rowuser[sfz]?>" placeholder="���������֤��" /></div>
</div>

<div class="tjbutton box">
 <div class="d0"></div>
 <? tjbtnr_m("��һ��");?>
 <div class="d0"></div>
</div>
</form>

<? include("bottom.php");?>
</body>
</html>