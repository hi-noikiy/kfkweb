<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

$sj=date("Y-m-d H:i:s");
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}
$userdj=returnuserdj($rowuser[id]);
$nowdj=0;
if(empty($userdj)){Audit_alert("��վδ���û�Ա�ȼ�ϵͳ������ϵ�ͷ���","./");}

if($_GET[control]=="xf"){ //����
 while1("*","yjcode_userdj where name1='".$userdj."'");if($row1=mysql_fetch_array($res1)){
 if($rowuser[money1]<$row1[money1]){Audit_alert("���㣬���ȳ�ֵ��","userdj.php");}
 $money1=$row1["money1"]*(-1);
 PointUpdateM($rowuser[id],$money1); 
 PointIntoM($rowuser[id],$row1[name1]."��Ա�ȼ�����֧��(����)",$money1);
 if(empty($rowuser[userdjdq])){$dq=$sj;}else{
  $sjv=$rowuser[userdjdq];
  if($rowuser[userdjdq]<$sj){$sjv=$sj;}
  if(empty($row1[jgdw])){$ds="month";}else{$ds="year";}
  $dq=date('Y-m-d H:i:s',strtotime ("+1 ".$ds,strtotime($sjv)));
 }
 updatetable("yjcode_user","userdjdq='".$dq."' where id=".$rowuser[id]);
 }
 php_toheader("userdj.php?t=suc");
 
}elseif($_GET[control]=="ts"){ //�����ȼ�
 while2("*","yjcode_userdj where name1='".$userdj."'");$row2=mysql_fetch_array($res2);
 while1("*","yjcode_userdj where id=".$_GET[id]);if($row1=mysql_fetch_array($res1)){
 
 /*
 if(empty($row2[jgdw])){$nt=$row2[money1]/30;}else{$nt=$row2[money1]/365;}
 if(empty($row1[jgdw])){$st=$row1[money1]/30;}else{$st=$row1[money1]/365;}
 $sjc=DateDiff($dq,$sj,"d");
 $djcj=$st-$nt;
 $cj=intval($djcj*$sjc);
 */
 if(empty($row1[jgdw])){$ts="month";}else{$ts="year";}
 if(empty($rowuser[userdjdq]) || $rowuser[userdjdq]<$sj){$ndq=$sj;}else{$ndq=$rowuser[userdjdq];}
 $dq=date('Y-m-d H:i:s',strtotime ("+1 ".$ts,strtotime($ndq)));

 if($rowuser[money1]<$row1[money1]){Audit_alert("���㣬���ȳ�ֵ��","userdj.php");}
 $money1=$row1[money1]*(-1);
 PointUpdateM($rowuser[id],$money1); 
 PointIntoM($rowuser[id],"��Ա�ȼ�����",$money1);
 updatetable("yjcode_user","userdj='".$row1[name1]."',userdjdq='".$dq."' where id=".$rowuser[id]);
 }
 php_toheader("userdj.php?t=suc");

}


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
function tj(x,y){
 if(confirm("ȷ���ύ��")){}else{return false;}
 location.href="userdj.php?id="+y+"&control="+x;
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ��Ա�ȼ�</li>
</ul>
<? $leftid=3;include("left.php");?>
<!--RB-->
<div class="right">

 <ul class="wz">
 <li class="l0">��ѡ��</li>
 <li class="g_ac0_h g_bc0_h"><a href="userdj.php">��Ա�ȼ�</a></li>
 </ul>
 
 <? systs("��ϲ���������ɹ�!","userdj.php")?>
 <ul class="uk">
 <li class="l1">���ĵȼ���</li>
 <li class="l21"><strong class="green"><?=$userdj?></strong> (���ڣ�<?=returnjgdw($rowuser[userdjdq],"","���ò�����")?>)</li>
 <li class="l1">������</li>
 <li class="l21"><?=sprintf("%.2f",$rowuser[money1])?>Ԫ  [<a href="pay.php" class="red"><strong>��ֵ</strong></a>]</li>
 </ul>

 <ul class="djcap">
 <li class="l1">��Ա�ȼ�</li>
 <li class="l2">�������</li>
 <li class="l3">���ѷ��� </li>
 <li class="l4">����</li>
 </ul>
 <? 
 while2("*","yjcode_userdj where name1='".$userdj."'");if($row2=mysql_fetch_array($res2)){$nowdj=$row2[xh];}
 if(empty($rowuser[userdjdq]) || $rowuser[userdjdq]<$sj){$dq=date('Y-m-d H:i:s',strtotime ("+1 month",strtotime($sj)));}else{$dq=$rowuser[userdjdq];}
 while1("*","yjcode_userdj where zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){
 ?>
 <ul class="djlist">
 <li class="l1"><?=$row1[name1]?></li>
 <li class="l2">�����Ա��Ʒ��<strong><?=$row1[zhekou]?></strong>��</li>
 <li class="l3"><?=$row1[money1]?>Ԫ/<? if(empty($row1[jgdw])){echo "��";}else{echo "��";}?> </li>
 <li class="l4">
 <? if($nowdj<$row1[xh]){?>
 <a href="javascript:void(0);" onclick="tj('ts',<?=$row1[id]?>)" class="a0">�����ȼ�</a>
 <span class="s1" style="display:none;">
 �����:<? 
 if(empty($row2[jgdw])){$nt=$row2[money1]/30;}else{$nt=$row2[money1]/365;}
 if(empty($row1[jgdw])){$st=$row1[money1]/30;}else{$st=$row1[money1]/365;}
 $sjc=DateDiff($dq,$sj,"d");
 $djcj=$st-$nt;
 $cj=intval($djcj*$sjc);
 echo $cj;
 ?>Ԫ
 </span>
 <? }elseif($nowdj==$row1[id]){?>
 <a href="javascript:void(0);" onclick="tj('xf',<?=$row1[id]?>)" class="a1">����</a>
 <? }?>
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