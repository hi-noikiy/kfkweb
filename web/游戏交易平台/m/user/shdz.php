<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();

$bh=$_GET[bh];
$userid=returnuserid($_SESSION["SHOPUSER"]);
if($_GET[control]=="update"){
 $sj=date("Y-m-d H:i:s");	
 $ifmr=intval($_POST[R1]);
 if(1==$ifmr){updatetable("yjcode_shdz","ifmr=0");}
 $area1=sqlzhuru($_POST[area1]);
 $area2=sqlzhuru($_POST[add2]);
 $area3=sqlzhuru($_POST[add3]);
 updatetable("yjcode_shdz","lxr='".sqlzhuru($_POST[t1])."',add1=".$area1.",add1v='".returnarea($area1)."',add2=".$area2.",add2v='".returnarea($area2)."',add3=".$area3.",add3v='".returnarea($area3)."',addr='".sqlzhuru($_POST[t2])."',mot='".sqlzhuru($_POST[t3])."',yb='".sqlzhuru($_POST[t4])."',sj='".$sj."',zt=0,ifmr=".$ifmr." where bh='".$bh."' and userid=".$userid);
 php_toheader("../tishi/index.php?admin=999&b=../user/shdzlist.php"); 
}

while0("*","yjcode_shdz where bh='".$bh."' and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("shdzlist.php");}
$ifarea="yes";
$add1=$row[add1];
$add2=$row[add2];
$add3=$row[add3];

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
if(document.f1.t1.value==""){alert("�������ջ�������");document.f1.t1.focus();return false;}	
if(document.f1.t2.value==""){alert("��������ϸ��ַ");document.f1.t2.focus();return false;}	
if(document.f1.t3.value==""){alert("�������ֻ�����");document.f1.t3.focus();return false;}	
tjwait();
f1.action="shdz.php?control=update&bh=<?=$bh?>";
}
function area1cha(){
 farea2.location="../tem/area2.php?area1id="+document.getElementById("area1").value;	
}
</script>
</head>
<body>
<? include("top.php");?>

<div class="boxcap box">
 <div class="d1"><a href="../">�û�����</a> - �ջ���ַ [<a href="shdzlist.php">����</a>]</div>
</div>

<form name="f1" method="post" onSubmit="return tj()">
<input type="hidden" value="inf" name="jvs" />
<div class="uk box">
 <div class="d11">�ռ��ˣ�</div>
 <div class="d2"><input type="text" name="t1" value="<?=$row[lxr]?>" placeholder="�������ռ�������" /></div>
</div>
<div class="uk1 box">
 <div class="d1">���ڵ�����</div>
 <div class="d2"><? include("../tem/area.php");?></div>
</div>
<div class="uk box">
 <div class="d11">��ϸ��ַ��</div>
 <div class="d2"><input type="text" name="t2" value="<?=$row[addr]?>" placeholder="��������ϸ��ַ" /></div>
</div>
<div class="uk box">
 <div class="d11">�ֻ����룺</div>
 <div class="d2"><input type="text" name="t3" value="<?=$row[mot]?>" placeholder="�������ֻ�����" /></div>
</div>
<div class="uk box">
 <div class="d11">�������룺</div>
 <div class="d2"><input type="text" name="t4" value="<?=$row[yb]?>" placeholder="��������������" /></div>
</div>
<div class="uk box">
 <div class="d11">Ĭ�ϵ�ַ��</div>
 <div class="d2">
 <select name="R1">
 <option value="0"<? if(empty($row[ifmr])){?> selected<? }?>>��</option>
 <option value="1"<? if($row[ifmr]==1){?> selected<? }?>>��</option>
 </select>
 </div>
</div>

<div class="tjbutton box">
 <div class="d0"></div>
 <? tjbtnr_m("�����޸�");?>
 <div class="d0"></div>
</div>

</form>

<? include("bottom.php");?>
</body>
</html>