<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$userid=returnuserid($_SESSION[SHOPUSER]);

if($_GET[control]=="ok"){ //���
 $bh=$_GET[bh];
 while0("*","yjcode_taskhf where bh='".$bh."' and taskty=1 and id=".$_GET[id]." and useridhf=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("taskhflist1.php");}
 $sj=date("Y-m-d H:i:s");
 $txt="�Ѿ�������񣬷�����������";
 intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$bh."',".$row[userid].",".$userid.",2,'".$txt."','".$sj."',''");
 updatetable("yjcode_taskhf","zt=1 where id=".$_GET[id]." and zt=0 and useridhf=".$userid);
 php_toheader("taskhflist1.php");
 
}elseif($_GET[control]=="pt"){ //����ƽ̨����
 while0("*","yjcode_taskhf where id=".$_GET[id]." and taskty=1 and zt=3 and useridhf=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("taskhflist1.php");}
 updatetable("yjcode_taskhf","zt=4 where id=".$row[id]);
 $sj=date("Y-m-d H:i:s");
 $txt="���������ղ�ͨ������������ͬ��Ҫ��ƽ̨����";
 intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$row[bh]."',".$row[userid].",".$userid.",2,'".$txt."','".$sj."',''");
 php_toheader("taskhflist1.php");

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
<script language="javascript">
function myok(x,y){
if(!confirm("��ȷ���Ѿ���ɸ���������")){return false;}
location.href="taskhflist1.php?control=ok&id="+x+"&bh="+y;
}
function ptjr(x){
if(!confirm("ȷ��Ҫ����ƽ̨������")){return false;}
location.href="taskhflist1.php?control=pt&id="+x;
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ������� > ���ǽ��ַ� > ��������</li>
</ul>
<? $leftid=7;include("left.php");?>

<!--RB-->
<div class="right">
 <? include("rcap9.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="g_ac0_h g_bc0_h";
 </script>

 <ul class="taskhfcap">
 <li class="l1">����</li>
 <li class="l2">����Ԥ��</li>
 <li class="l3">����Ӷ��</li>
 <li class="l4">״̬</li>
 <li class="l5">����</li>
 </ul>
  
 <?
 $ses=" where taskty=1 and useridhf=".$luserid;
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"yjcode_taskhf","order by sj desc");while($row=mysql_fetch_array($res)){
 while1("*","yjcode_task where bh='".$row[bh]."'");$row1=mysql_fetch_array($res1);
 $au="../task/view".$row1[id].".html";
 ?>
 <ul class="taskhflist">
 <li class="l0"></li>
 <li class="l1"><a href="<?=$au?>" title="<?=$row1[tit]?>" target="_blank"><?=strgb2312(strip_tags($row1[tit]),0,100)?></a><span class="sj"><?=$row[sj]?></span></li>
 <li class="l2"><strong><?=$row1[money1]?></strong>Ԫ</li>
 <li class="l3"><strong><?=$row[money1]?></strong>Ԫ</li>
 <li class="l4">
 <span class="zt"><?=returntask1($row[zt])?></span>
 </li>
 <li class="l5">
 <? if(0==$row[zt]){?>
 <a href="taskysjs1.php?bh=<?=$row[bh]?>&hfid=<?=$row[id]?>" class="btna btna1">������</a>
 <? }elseif(3==$row[zt]){?>
 <a href="javascript:void(0);" onclick="ptjr(<?=$row[id]?>)" class="btna btna1">����ƽ̨����</a>
 <? }?>
 <a href="taskgt1.php?bh=<?=$row[bh]?>&hfid=<?=$row[id]?>" class="btna btna3">��ͨ��¼</a>
 </li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="taskhflist1.php";
 $nowwd="";
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