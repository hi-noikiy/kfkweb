<?
include("../config/conn.php");
include("../config/function.php");
//���ñ�ǩa b j k p
$ses=" where (zt=0 or zt=3 or zt=4 or zt=5 or zt=101 or zt=102)";
$taskty=returnsx("a");if($taskty!=-1){$ses=$ses." and taskty=".$taskty;}
$taskzt=returnsx("b");if($taskzt==-1){$ses=$ses." and (zt=0 or zt=3 or zt=4 or zt=101)";}else{$ses=$ses." and (zt=5 or zt=102)";}
$ty1id=returnsx("j");if($ty1id!=-1){$ses=$ses." and type1id=".$ty1id;$ty1name=returntasktype(1,$ty1id);}
$ty2id=returnsx("k");if($ty2id!=-1){$ses=$ses." and type2id=".$ty2id;$ty2name=returntasktype(2,$ty2id);}
if(returnsx("p")!=-1){$page=returnsx("p");}else{$page=1;}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>������� - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>
<script language="javascript" src="../js/layer.js"></script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>
<div class="yjcode">
 <div class="dqwz">
 <ul class="u1">
 <li class="l1">��ǰλ�ã�<a href="<?=weburl?>">��ҳ</a> > �������</li></ul>
 </div>
</div>

<div class="bfb bfbtask fontyh">
<div class="yjcode">
 
 <!--��ԱB-->
 <div class="hy">
  <? 
  if(!empty($_SESSION[SHOPUSER])){$usertx="../upload/".returnuserid($_SESSION[SHOPUSER])."/user.jpg";if(!is_file($usertx)){$usertx="../user/img/nonetx.gif";}
  $sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
  if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}
  ?>
  <? }else{?>
  <? }?>
 </div>
 <!--��ԱE-->
 
 <div class="tasklist">
 
 <div class="tasksel">
 <ul class="listcap">
 <li class="l1">�������ͣ�</li>
 <li class="l2">
 <a href="<?=rentser('j','','k','')?>"<? if(returnsx("j")==-1){?> class="g_bg1"<? }else{?> class="g_ac0"<? }?>>ȫ��</a>
 <? while1("*","yjcode_tasktype where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="<?=rentser('j',$row1[id],'k','')?>"<? if(returnsx("j")==$row1[id]){?> class="g_bg1"<? }else{?> class="g_ac0"<? }?>><?=$row1[name1]?></a>
 <? }?>
 </li>
 </ul>
 <? if($ty1id!=-1){?>
 <ul class="listcap">
 <li class="l1"><?=$ty1name?>��</li>
 <li class="l2">
 <a href="<?=rentser('k','','','')?>"<? if(returnsx("k")==-1){?> class="g_bg1"<? }else{?> class="g_ac0"<? }?>>ȫ��</a>
 <? while1("*","yjcode_tasktype where admin=2 and name1='".$ty1name."' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="<?=rentser('k',$row1[id],'p','1')?>"<? if(returnsx("k")==$row1[id]){?> class="g_bg1"<? }else{?> class="g_ac0"<? }?>><?=$row1[name2]?></a>
 <? }?>
 </li>
 </ul>
 <? }?>
 <ul class="listcap listcap0">
 <li class="l1">������ʽ��</li>
 <li class="l2">
 <a href="<?=rentser('a','','','')?>"<? if(returnsx("a")==-1){?> class="g_bg1"<? }else{?> class="g_ac0"<? }?>>ȫ��</a>
 <a href="<?=rentser('a','0','','')?>"<? if(returnsx("a")==0){?> class="g_bg1"<? }else{?> class="g_ac0"<? }?>>��������</a>
 <a href="<?=rentser('a','1','','')?>"<? if(returnsx("a")==1){?> class="g_bg1"<? }else{?> class="g_ac0"<? }?>>��������</a>
 </li>
 </ul>
 </div>
 
 <ul class="rwcap g_bc0_h">
 <li class="<? if($taskzt==-1){?>l11 g_bg1<? }else{?>l1<? }?>"><a href="./">������</a></li>
 <li class="<? if($taskzt==1){?>l11 g_bg1<? }else{?>l1<? }?>"><a href="search_b1v.html">�ѽ���</a></li>
 <li class="l2"><a href="taskadd.php" class="a1">��������</a><a href="./" class="a2">ˢ������</a></li>
 </ul>
 
 <ul class="rwbt">
 <li class="l1">�������</li>
 <li class="l2">�йܽ��</li>
 <li class="l3">������ʽ</li>
 <li class="l4">ʣ������</li>
 <li class="l5">��Ԥ��</li>
 <li class="l6">�������</li>
 <li class="l7">����</li>
 </ul>
 
 <?
 pagef($ses,30,"yjcode_task","order by sj desc");while($row=mysql_fetch_array($res)){
 taskok($row[id]);
 ?>
 <ul class="ulist fontyh">
 <li class="l1">
 <a href="view<?=$row[id]?>.html" title="<?=$row[tit]?>" target="_blank" class="g_ac2"><?=returntitdian($row[tit],50)?></a><br>
 <span class="hui"><?=strgb2312(strip_tags($row[txt]),0,60)?></span>
 </li>
 <li class="l2"><? if($row[money3]>0){?><span class="s1">���йܽ��</span><? }else{?><span class="s2">ѡ����й�</span><? }?></li>
 <li class="l3"><?=returntaskxs($row[taskty])?></li>
 <?
 if(empty($row[taskty])){
 ?>
 <li class="l4">
 <? if(empty($row[zt])){?><strong>1</strong>��<? }else{?><strong>0</strong>��<? }?>
 </li>
 <? }else{?>
 <li class="l41">
 <span class="s1"><strong><?=$row[tasknum]-$row[taskcy]?></strong>��(��<?=$row[tasknum]?>��)</span>
 <span class="s2"></span>
 <span class="s3" style="width:<? $okbfb=$row[taskcy]/$row[tasknum];echo 100*(1-$okbfb);?>px;"></span>
 <span class="s4"><?=sprintf("%.2f",(1-$okbfb)*100)?>%</span>
 </li>
 <? }?>
 <li class="l5"><strong><?=$row[money1]?></strong>Ԫ</li>
 <li class="l6"><?=returntask($row[zt])?></li>
 <li class="l7">
 <?
 if((empty($row[taskty]) && 0==$row[zt]) || (1==$row[taskty] && 101==$row[zt])){
 ?>
 <a href="view<?=$row[id]?>.html" class="a1" target="_blank">��������</a>
 <?
 }else{
 ?>
 <a href="view<?=$row[id]?>.html" class="a2" target="_blank">�鿴����</a>
 <? }?>
 </li>
 </ul>
 <? }?>
 <div class="npa">
 <?
 $nowurl="search";
 $nowwd="";
 require("../tem/page.html");
 ?>
 </div>
 </div>
 
</div>
</div>
<? include("../tem/bottom.html");?>
</body>
</html>