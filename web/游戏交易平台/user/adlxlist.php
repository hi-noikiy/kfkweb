<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$zt=$_GET[zt]; 

if($_GET[control]=="sd"){
 $userid=returnuserid($_SESSION[SHOPUSER]);
 while1("*","yjcode_ad where zt=1 and userid=".$userid." and id=".$_GET[id]);if(!$row1=mysql_fetch_array($res1)){php_toheader("adlxlist.php?zt=1");}
 PointUpdateM($userid,$row1[money1]);
 PointIntoM($userid,"�����������λ".$row1[adbh],$row1[money1]);
 if($row1[type1]=="ͼƬ" || $row1[type1]=="����"){
  delFile("../ad/".$row1[bh].".".$row1[jpggif]);
  delFile("../ad/".$row1[bh]."-99.".$row1[jpggif]);
 }
 deletetable("yjcode_ad where id=".$_GET[id]);
 php_toheader("adlxlist.php?zt=1&t=suc");
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
function addel(x){
 if(!confirm("ȷ��Ҫ�����𣿳�������û��Զ��˻��������ʻ���")){return false;}
 location.href="adlxlist.php?control=sd&zt=1&id="+x;
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > �ҵĹ��λ</li>
</ul>
<? $leftid=1;include("left.php");?>

<!--RB-->
<div class="right">

 <? include("rcap14.php");?>
 <script language="javascript">
 <? if($zt==0){?>document.getElementById("rcap2").className="g_ac0_h g_bc0_h";<? }elseif($zt==1){?>document.getElementById("rcap3").className="g_ac0_h g_bc0_h";<? }?>
 </script>
 <? systs("��ϲ���������ɹ�!","adlxlist.php?zt=".$zt)?>

 <ul class="adlistcap">
 <li class="l1">�����</li>
 <li class="l2">������</li>
 <li class="l3">�����ʽ</li>
 <li class="l4">���״̬</li>
 <li class="l5">����</li>
 </ul>
 <?
 $ses=" where userid=".$luserid;
 if($zt==0){$ses=$ses." and zt=0";}
 elseif($zt==1){$ses=$ses." and zt=1";}
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"yjcode_ad","order by sj desc");while($row=mysql_fetch_array($res)){
 autoAD($row[adbh]);
 ?>
 <ul class="adlist" onmouseover="this.className='adlist adlist1';" onmouseout="this.className='adlist';">
 <li class="l1"><?=$row[adbh]?></li>
 <li class="l2"><?=$row[tit]?></li>
 <li class="l3"><?=$row[type1]?></li>
 <li class="l4">
 <?
 if(0==$row[zt]){
  $str="<span class='blue'>չʾ��</span>";
  $str=$str."<br>��ֹ��".$row[dqsj];
  $astr="";
 }elseif(1==$row[zt]){
  $str="<span class='feng'>������</span>";
  if(0==$row[fflx]){$s="";}else{$s=" and xh=".$row[xh]."";}
  $pd=returncount("yjcode_ad where zt=1 and sj>'".$row[sj]."'".$s);
  $str=$str."<br><span class='green'>ǰ�滹��".$pd."��</span>";
  $astr="<br><a href=\"javascript:void(0);\" onclick=\"addel(".$row[id].")\">����</a>";
 }
 echo $str;
 ?>
 </li>
 <li class="l5">
 <a href="adlxLook.php?id=<?=$row[id]?>" target="_blank">Ԥ��</a><?=$astr?>
 </li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="adlxlist.php";
 $nowwd="zt=".$zt;
 require("page.html");
 ?>
 </div>

</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>