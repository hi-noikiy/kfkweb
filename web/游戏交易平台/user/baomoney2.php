<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'utf8'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader(gloweb);}

//��������ʼ
if($_POST[jvs]=="bao"){
 zwzr();
 $t1=floatval($_POST[t1]);
 if($t1>$rowuser[baomoney]){Audit_alert("���ñ�֤����","baomoney2.php");}
 if($t1<=0){Audit_alert("δ֪����","baomoney1.php");}
 PointIntoB($rowuser[id],"�ⶳ��֤��",$t1*(-1),0,1);
 PointUpdateB($rowuser[id],$t1*(-1)); 
 php_toheader("baomoney2.php?t=suc");
}
//���������� 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript">
function tj(){
if((document.f1.t1.value).replace(/\s/,"")==""){alert("�����뱣֤������");document.f1.t1.focus();return false;}	
if(!confirm("ȷ��Ҫ�ⶳ��֤����")){return false;}
tjwait();
f1.action="baomoney2.php";
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ���ɱ�֤��</li>
</ul>
<? $leftid=5;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("rcap15.php");?>
 <script language="javascript">
 document.getElementById("rcap3").className="g_ac0_h g_bc0_h";
 </script>

 <? systs("��ϲ���������ɹ�!","baomoney2.php")?>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="bao" name="jvs" />
 <ul class="uk">
 <li class="l1">ʣ�ౣ֤��</li>
 <li class="l21"><?=$rowuser[baomoney]?>Ԫ</li>
 <li class="l1">������</li>
 <li class="l21"><?=$rowuser[money1]?>Ԫ</li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> �ⶳ��֤��</li>
 <li class="l2"><input type="text" class="inp" name="t1" /></li>
 <li class="l3"></li>
 <li class="l4"><?=tjbtnr("�ⶳ��֤��")?></li>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>