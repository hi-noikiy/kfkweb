<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();

$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);
if(empty($rowuser[txyh]) || empty($rowuser[txname]) || empty($rowuser[txzh])){Audit_alert("��δ�����տ��ʺţ���������","txsz.php");}

if(sqlzhuru($_POST[jvs])=="tixian"){
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 $money1=sqlzhuru($_POST[t1]);
 if(!eregi("^[0-9,\.]+$",$money1)){Audit_alert("���ֽ���ȷ","tixian.php");}
 $m=(float)$money1;
 if($m>$rowuser[money1] || $m<=0){Audit_alert("���ֽ���ȷ������ʧ��","tixian.php");}
 if($m<$rowcontrol[txdi]){Audit_alert("����������ֶ����ʧ��","tixian.php");}
 $bh=time()."tx".$rowuser[id];
 intotable("yjcode_tixian","bh,userid,money1,sj,uip,txyh,txname,txzh,txkhh,zt,sm","'".$bh."',".$rowuser[id].",".$m.",'".$sj."','".$uip."','".$rowuser[txyh]."','".$rowuser[txname]."','".$rowuser[txzh]."','".$rowuser[txkhh]."',4,''");
  PointUpdateM($rowuser[id],$m*(-1));
  PointIntoM($rowuser[id],"��������",$m*(-1));
  php_toheader("../tishi/index.php?admin=999&b=../user/");
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
<script src="../js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
<script language="javascript">
function tj(){
if((document.f1.t1.value).replace(/\s/,"")=="" || isNaN(document.f1.t1.value)){alert("��������Ч�����ֽ��");document.f1.t1.focus();return false;}	
if(parseFloat(document.f1.t1.value)<<?=$rowcontrol[txdi]?>){alert("�������ֲ��õ���<?=$rowcontrol[txdi]?>Ԫ");document.f1.t1.focus();return false;}	
if(confirm("ȷ��Ҫ������")){tjwait();f1.action="tixian.php";}else{return false;}
}
</script>
</head>
<body>
<? include("top.php");?>

<div class="boxcap box">
 <div class="d1"><a href="../">�û�����</a> - ����</div>
</div>

 <form name="f1" method="post" onSubmit="return tj()">
 <input type="hidden" value="tixian" name="jvs" />
 <div class="tishi box">
  <div class="d1">
  <strong>������ʾ��</strong><br>
  ������������µ��տ��ʺ��տ�����ԡ�<a href="txsz.php" class="feng">�޸��տ��ʺ���Ϣ</a>��<br>
  <? if(!empty($rowcontrol[txfl])){?>
  ������Ҫ�۳�<?=$rowcontrol[txfl]*100?>%��������<br>
  <? }?>
  ������<strong style="font-family:Arial, Helvetica, sans-serif;font-size:16px;color:#ff6600;"><?=sprintf("%.2f",$rowuser[money1])?></strong><br>
  �������ֲ��õ���<?=$rowcontrol[txdi]?>Ԫ
  </div>
 </div>
 <div class="uk box">
  <div class="d1"><img src="../img/money.png" /></div>
  <div class="d2"><input type="text" class="inp" placeholder="���������ֽ��" name="t1" /> </div>
 </div>
 <div class="tishi box">
  <div class="d1">
  �������ͣ�<?=$rowuser[txyh]?><br>
  ����/�˺ţ�<?=$rowuser[txzh]?><br>
  <? if($rowuser[txyh]!="֧����" && $rowuser[txyh]!="�Ƹ�ͨ"){?>�����У�<?=$rowuser[txkhh]?><br><? }?>
  ������<strong class="green"><?=$rowuser[txname]?></strong>
  </div>
 </div>

 <div class="tjbutton box">
  <div class="d0"></div>
  <? tjbtnr_m("�ύ����");?>
  <div class="d0"></div>
 </div>

 </form>

<? include("bottom.php");?>
</body>
</html>