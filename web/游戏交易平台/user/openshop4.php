<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);
if(2!=$rowuser[shopzt] && 4!=$rowuser[shopzt]){php_toheader("openshop3.php");}

//��������ʼ
if($_POST[jvs]=="openshop"){
 zwzr();
 $t1=sha1(sqlzhuru($_POST[t1]));
 if(panduan("uid,pwd","yjcode_user where uid='".$_SESSION[SHOPUSER]."' and pwd='".$t1."'")==0){Audit_alert("��¼������֤ʧ�ܣ��������ԣ�","openshop4.php");}
 $d=preg_split("/xcf/",$_POST[d1]);
 while1("*","yjcode_openyue where id=".$d[2]);if(!$row1=mysql_fetch_array($res1)){Audit_alert("����ʧ�ܣ��������ԣ�","openshop4.php");}
 $m=$row1[money1];
 if($m>$rowuser[money1]){Audit_alert("�������������ȳ�ֵ��","openshop4.php");}
 $sj=date("Y-m-d H:i:s");
 $dqsj=$rowuser[dqsj];if(empty($dqsj)){$dqsj=$sj;}
 $dqsj=date('Y-m-d H:i:s',strtotime ("+".$row1[yue]." month",strtotime($dqsj)));
 if($dqsj<$sj){Audit_alert("����ʧ�ܣ����ѵ����������Ϊ2038�꣡","openshop4.php");}
 PointUpdateM($rowuser[id],$m*(-1));
 PointIntoM($rowuser[id],"��������",$m*(-1));
 updatetable("yjcode_user","shopzt=2,dqsj='".$dqsj."' where uid='".$_SESSION[SHOPUSER]."'");
 php_toheader("openshop4.php?t=suc");
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
if((document.f1.t1.value).replace(/\s/,"")==""){alert("�������¼����");document.f1.t1.focus();return false;}	
if(confirm("ȷ���ύ��")){tjwait();f1.action="openshop4.php";}else{return false;}
}
function fycha(){
d=(document.f1.d1.value).split("xcf");
a=addNum(0,d[1]);
document.getElementById("needmoney").innerHTML=a+"Ԫ";
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">

<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ��������</li>
</ul>
<? $leftid=1;include("left.php");?>
<!--RB-->
<div class="right">
 <ul class="wz">
 <li class="l0"></li>
 <li class="l1 l2"><a href="openshop4.php">��������</a></li>
 </ul>
 <? systs("��ϲ�������ѳɹ�!","openshop4.php")?>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="openshop" name="jvs" />
 <ul class="uk">
 <li class="l1">��ǰ���ڣ�</li>
 <li class="l21"><strong><?=$rowuser[dqsj]?></strong></li>
 <li class="l1">���ѷ��ã�</li>
 <li class="l21 red"><strong id="needmoney"></strong></li>
 <li class="l1">�������ޣ�</li>
 <li class="l21 red">
 <select name="d1" onchange="fycha()">
 <? while1("*","yjcode_openyue order by yue asc");while($row1=mysql_fetch_array($res1)){if($row1[yue] % 12==0){$nd=$row1[yue]/12;$nd=$nd."��";}else{$nd=$row1[yue]."����";}?>
 <option value="<?=$row1[yue]?>xcf<?=$row1[money1]?>xcf<?=$row1[id]?>"><?=$nd?> (���ã�<?=$row1[money1]?>Ԫ)</option>
 <? }?>
 </select>
 </li>
 <li class="l1">���Ŀ�����</li>
 <li class="l21 green"><strong><?=$rowuser[money1]?> Ԫ</strong> [<a href="pay.php">�����ֵ</a>]</li>
 <li class="l1">��¼���룺</li>
 <li class="l2"><input type="password" class="inp" name="t1" /></li>
 <li class="l3"></li>
 <li class="l4"><?=tjbtnr("��һ��")?></li>
 </ul>
 </form>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
<script language="javascript">fycha();</script>
</body>
</html>