<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[bh];
while0("*","yjcode_pro where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("productlist.php");}
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
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbuser">
<div class="yjcode">
<ul class="dqwz">
<li class="l1">����λ�ã�<a href="../" class="acy">��ҳ</a> > <a href="./" class="acy">��Ա����</a> > ��Ʒ�༭ > �ײ�����</li>
</ul>
<? $leftid=1;include("left.php");?>
<!--RB-->
<div class="right">

 <? include("rcap3.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="g_ac0_h g_bc0_h";
 </script>

 <!--B-->
 <ul class="tccap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">&nbsp;�ײ�˵��</li>
 <li class="l3">���</li>
 <li class="l4">ԭ��</li>
 <li class="l5">�Żݼ�</li>
 <li class="l6">����&nbsp;</li>
 </ul>
 <ul class="listcap1">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /> ȫѡ</li>
 <li class="l2">
 <a href="taocanlx.php?bh=<?=$bh?>" class="a1">�����ײ�</a>
 <a href="javascript:NcheckDEL(9,'yjcode_taocan')" class="a2">ɾ��</a>
 </li>
 <li class="l3"></li>
 </ul>

 <?
 while1("*","yjcode_taocan where probh='".$bh."' and userid=".$luserid." and zt=0 and admin is null order by xh asc");while($row1=mysql_fetch_array($res1)){
 $nu="taocan.php?id=".$row1[id]."&bh=".$bh;
 ?>
 <ul class="tclist1" onmouseover="this.className='tclist1 tclist11';" onmouseout="this.className='tclist1';">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row1[id]?>xcf0" /></li>
 <li class="l2" onclick="gourl('<?=$nu?>')">&nbsp;<strong><?=$row1[tit]?></strong></li>
 <li class="l3"><?=$row1[xh]?></li>
 <li class="l4"><?=$row1[money2]?></li>
 <li class="l5 feng"><?=$row1[money1]?></li>
 <li class="l6">
 <? if(4==$row1[fhxs]){?><a href="kclist_tc.php?tcid=<?=$row1[id]?>&bh=<?=$bh?>" target="_blank">������</a> | <? }?>
 <a href="taocan1lx.php?ty1id=<?=$row1[id]?>&bh=<?=$bh?>">��Ӷ����ײ�</a> | <a href="<?=$nu?>">�༭</a>&nbsp;
 </li>
 </ul>
 <?
 while2("*","yjcode_taocan where admin=2 and tit='".$row1[tit]."' and zt=0 and userid=".$luserid." and probh='".$bh."' order by xh asc");while($row2=mysql_fetch_array($res2)){
 $nu="taocan1.php?id=".$row2[id]."&ty1id=".$row1[id]."&bh=".$bh; 
 ?>
 <ul class="tclist2">
 <li class="l1"><input name="C1" type="checkbox" value="xcf<?=$row2[id]?>" /></li>
 <li class="l2" onclick="gourl('<?=$nu?>')">&nbsp;&nbsp;- <?=$row2[tit2]?></li>
 <li class="l3"><?=$row2[xh]?></li>
 <li class="l4"><?=$row2[money2]?></li>
 <li class="l5 feng"><?=$row2[money1]?></li>
 <li class="l6">
 <? if(4==$row2[fhxs]){?><a href="kclist_tc.php?tcid=<?=$row2[id]?>&bh=<?=$bh?>" target="_blank">������</a> | <? }?>
 <a href="<?=$nu?>">�༭</a>&nbsp;
 </li>
 </ul>
 <? }}?>
 <!--E-->
 
</div> 
<!--RE-->

</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>