<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[bh];
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}
$userid=$rowuser[id];
$sqltask="select * from yjcode_task where bh='".$bh."' and taskty=1 and userid=".$userid." and zt=100";mysql_query("SET NAMES 'GBK'");$restask=mysql_query($sqltask);
if(!$rowtask=mysql_fetch_array($restask)){php_toheader("tasklist1.php");}


if($_GET[control]=="jn"){
 $zjm=0;
 if(empty($rowtask[yjfs])){$zjm=$rowtask[money1]*$rowcontrol[taskyj];}
 elseif($rowtask[yjfs]==2){$zjm=$rowtask[money1]*$rowcontrol[taskyj]*0.5;}
 $money3=$rowtask[money1]+$zjm;
 $djmoney=$money3-$rowtask[money4];
 if($djmoney>$rowuser[money1]){Audit_alert("���㣬���ȳ�ֵ","taskmoney.php?bh=".$bh);}
 PointIntoM($rowuser[id],"����ʼ��������(������".$bh.")",$djmoney*(-1));
 PointUpdateM($rowuser[id],$djmoney*(-1));
 updatetable("yjcode_task","zt=101,money2=".$rowtask[money1].",money3=".$money3." where id=".$rowtask[id]);
 php_toheader("tasklist1.php");
 
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
<link href="css/task.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<script language="javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
<script language="javascript">
function tj(){
if(!confirm("ȷ��Ҫ���ɷ�����")){return false;}
layer.msg('���ڴ���', {icon: 16  ,time: 0,shade :0.25});
f1.action="taskmoney.php?bh=<?=$bh?>&control=jn";
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ������� > ���ǹ��� > �������� > ���ɷ���</li>
</ul>
<? $leftid=7;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("rcap17.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="g_ac0_h g_bc0_h";
 </script>

 <? include("taskv1.php");?>

 <ul class="taskmain">
 <li class="l1">�н���ã�</li>
 <li class="l2">
 <? 
 $zjm=0;
 if(empty($rowtask[yjfs])){$zjm=$rowtask[money1]*$rowcontrol[taskyj];echo "�����е�������Ϊ<strong class='feng'>".$zjm."</strong>";}
 elseif($rowtask[yjfs]==1){echo "���ַ��е�";}
 elseif($rowtask[yjfs]==2){$zjm=$rowtask[money1]*$rowcontrol[taskyj]*0.5;echo "˫�����е�һ�룬����Ϊ<strong class='feng'>".$zjm."</strong>";}
 ?>
 </li>
 <li class="l1">���ɷ��ã�</li>
 <li class="l2"><strong class="feng"><?=sprintf("%.2f",$zjm+$rowtask[money1])?></strong>Ԫ</li>
 <li class="l1">�ҵ���</li>
 <li class="l2"><strong class="red"><?=sprintf("%.2f",$rowuser[money1])?></strong>Ԫ</li>
 </ul>
 <form name="f1" method="post" onsubmit="return tj()">
 <div class="ftjbtn"><? tjbtnr("���ɷ���","taskmoney.php")?></div>
 </form>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>