<?
include("../config/conn.php");
include("../config/function.php");
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$getstr=$_GET[str];
//已有标签 a b c d e f g h i j k l m p s
$tit="商品";
$ses=" where zt=0 and ifxj=0";
$ty1id=returnsx("j");if($ty1id!=-1){$ty1name=returntype(1,$ty1id);$ses=$ses." and ty1id=".$ty1id;$tit=$tit.$ty1name;}
$ty2id=returnsx("k");if($ty2id!=-1){$ty2name=returntype(2,$ty2id);$ses=$ses." and ty2id=".$ty2id;$tit=$tit."/".$ty2name;}
$ty3id=returnsx("m");if($ty3id!=-1){$ty3name=returntype(3,$ty3id);$ses=$ses." and ty3id=".$ty3id;$tit=$tit."/".$ty3name;}
$ty4id=returnsx("i");if($ty4id!=-1){$ty4name=returntype(4,$ty4id);$ses=$ses." and ty4id=".$ty4id;$tit=$tit."/".$ty4name;}
$ty5id=returnsx("l");if($ty5id!=-1){$ty5name=returntype(5,$ty5id);$ses=$ses." and ty5id=".$ty5id;$tit=$tit."/".$ty5name;}
if(returnsx("s")!=-1){
 $skey=safeEncoding(returnsx("s"));
 $a=preg_split("/\s/",$skey);
 $bs="(";
 for($i=0;$i<=count($a);$i++){
 if(!empty($a[$i])){$bs=$bs."tit like '%".$a[$i]."%' and ";}
 }
 $ses=$ses." and ".$bs." tit<>'')";
 $tit=$tit."/".$skey;
}
if(returnsx("b")!=-1){$mon1=returnsx("b");$ses=$ses." and money2>=".$mon1;}
if(returnsx("c")!=-1){$mon2=returnsx("c");$ses=$ses." and money2<=".$mon2;}
if(returnsx("a")!=-1){$ifys=returnsx("a");$ses=$ses." and ysweb<>''";}
if(returnsx("d")!=-1){$ifzdfh=returnsx("d");$ses=$ses." and (fhxs=2 or fhxs=3 or fhxs=4)";}
if(returnsx("g")!=-1){$ifuserdj=returnsx("g");$ses=$ses." and ifuserdj=1";}

if(returnsx("p")!=-1){$page=returnsx("p");}else{$page=1;}
$px="order by lastsj desc";
if(returnsx("f")==1){$px="order by xsnum desc";}
elseif(returnsx("f")==2){$px="order by djl desc";}
elseif(returnsx("f")==3){$px="order by money2 desc";}
elseif(returnsx("f")==4){$px="order by money2 asc";}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=$tit?> - <?=webname?></title>
<link href="../css/basic.css" rel="stylesheet" type="text/css" />
<link href="index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/basic.js"></script>
<script language="javascript" src="index.js"></script>

</head>
<body>

<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>
 
<div class="yjcode">

 <!--selB-->
 <div class="psel fontyh">
 <ul class="u1">
 <li class="l1">
 当前位置：<a href="<?=weburl?>">首页</a> > 商品列表 > 
 <? if($ty1id!=-1){?><a href="search_j<?=$ty1id?>v.html"><?=$ty1name?></a> > <? }?>
 <? if($ty2id!=-1){?><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v.html"><?=$ty2name?></a> > <? }?>
 <? if($ty3id!=-1){?><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v.html"><?=$ty3name?></a> > <? }?>
 </li>
 <li class="l2"><a href="../user/productlx.php" target="_blank"><img src="img/fb.gif" width="147" height="42" border="0" /></a></li>
 </ul>
 
 <ul class="u2">
 <li class="l1">商品分类：</li>
 <li class="l2">
 <a href="./"<? if($ty1id==-1){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>>不限</a>
 </li>
 <li class="l3">
 <? while1("*","yjcode_type where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="search_j<?=$row1[id]?>v.html" <? if(check_in("_j".$row1[id]."v",$getstr)){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>><?=$row1[type1]?></a>
 <? }?>
 </li>
 </ul>
 
 <? if($ty1id!=-1){if(panduan("*","yjcode_type where admin=2 and type1='".$ty1name."'")==1){?>
 <ul class="u2">
 <li class="l1"><?=$ty1name?>：</li>
 <li class="l2">
 <a href="search_j<?=$ty1id?>v.html"<? if($ty2id==-1){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>>不限</a>
 </li>
 <li class="l3">
 <? while1("*","yjcode_type where admin=2 and type1='".$ty1name."' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="search_j<?=$ty1id?>v_k<?=$row1[id]?>v.html" <? if(check_in("_k".$row1[id]."v",$getstr) && check_in("_k".$row1[id]."v",$getstr)){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>><?=$row1[type2]?></a>
 <? }?>
 </li>
 </ul>
 <? }}?>
 
 <? if($ty2id!=-1){if(panduan("*","yjcode_type where admin=3 and type1='".$ty1name."' and type2='".$ty2name."'")==1){?>
 <ul class="u2">
 <li class="l1"><?=$ty2name?>：</li>
 <li class="l2">
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v.html"<? if($ty3id==-1){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>>不限</a>
 </li>
 <li class="l3">
 <? while3("*","yjcode_type where admin=3 and type1='".$ty1name."' and type2='".$ty2name."' order by xh asc");while($row3=mysql_fetch_array($res3)){?>
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$row3[id]?>v.html" <? if(check_in("_m".$row3[id]."v",$getstr)){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>><?=$row3[type3]?></a>
 <? }?>
 </li>
 </ul>
 <? }}?>
 
 <? if($ty3id!=-1){if(panduan("*","yjcode_type where admin=4 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."'")==1){?>
 <ul class="u2">
 <li class="l1"><?=$ty3name?>：</li>
 <li class="l2">
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v.html"<? if($ty4id==-1){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>>不限</a>
 </li>
 <li class="l3">
 <? while3("*","yjcode_type where admin=4 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."' order by xh asc");while($row3=mysql_fetch_array($res3)){?>
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$row3[id]?>v.html" <? if(check_in("_i".$row3[id]."v",$getstr)){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>><?=$row3[type4]?></a>
 <? }?>
 </li>
 </ul>
 <? }}?>
 
 <? if($ty4id!=-1){if(panduan("*","yjcode_type where admin=5 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."' and type4='".$ty4name."'")==1){?>
 <ul class="u2">
 <li class="l1"><?=$ty4name?>：</li>
 <li class="l2">
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$ty4id?>v.html"<? if($ty5id==-1){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>>不限</a>
 </li>
 <li class="l3">
 <? while3("*","yjcode_type where admin=5 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."' and type4='".$ty4name."' order by xh asc");while($row3=mysql_fetch_array($res3)){?>
 <a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$ty4id?>v_l<?=$row3[id]?>v.html" <? if(check_in("_l".$row3[id]."v",$getstr)){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>><?=$row3[type5]?></a>
 <? }?>
 </li>
 </ul>
 <? }}?>

 <? 
 $si=0;
 $sbarr=array();
 while1("*","yjcode_typesx where admin=1 and typeid=".$ty1id." and ifsel=1 order by xh asc");while($row1=mysql_fetch_array($res1)){
 $ev="e".$row1[id]."_";
 $sbarr[$si]=$ev;
 ?>
 <ul class="u2">
 <li class="l1"><?=$row1[name1]?>：</li>
 <li class="l2">
 <a href="<?=rentser($ev,'','','');?>" <? if(check_in("_".$ev."_v",$getstr) || !check_in("_".$ev,$getstr)){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>>不限</a>
 </li>
 <li class="l3">
 <? while2("*","yjcode_typesx where admin=2 and name1='".$row1[name1]."' and typeid=".$row1[typeid]." order by xh asc");while($row2=mysql_fetch_array($res2)){?>
 <a href="<?=rentser($ev,$row2[id],'','');?>" <? if(check_in("_".$ev.$row2[id]."v",$getstr)){?> class="g_ac0_h"<? }else{?> class="g_ac0"<? }?>><?=$row2[name2]?></a>
 <? }?>
 </li>
 </ul>
 <? 
 $si++;
 }
 for($si=0;$si<count($sbarr);$si++){if(returnsx($sbarr[$si])!=-1){$nsx="xcf".returnsx($sbarr[$si])."xcf";$ses=$ses." and tysx like '%".$nsx."%'";}}
 ?>
 </div>
 <!--selE-->

 <!--已选条件B-->
 <div class="nser fontyh">
 <ul class="u1">
 <li class="l1">已选条件：</li>
 <li class="l2">
 <? if($ty1id!=-1){?>
 <span><a href="./" class="g_ac0"><?=$ty1name?></a></span>
 <? }?>
 
 <? if($ty2id!=-1){?>
 <span><a href="search_j<?=$ty1id?>v.html" class="g_ac0"><?=$ty2name?></a></span>
 <? }?>
 
 <? if($ty3id!=-1){?>
 <span><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v.html" class="g_ac0"><?=$ty3name?></a></span>
 <? }?>
 
 <? if($ty4id!=-1){?>
 <span><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v.html" class="g_ac0"><?=$ty4name?></a></span>
 <? }?>
 
 <? if($ty5id!=-1){?>
 <span><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$ty4id?>v.html" class="g_ac0"><?=$ty5name?></a></span>
 <? }?>
 
 <? 
 for($si=0;$si<count($sbarr);$si++){
  $tsx=returnsx($sbarr[$si]);
  if($tsx!=-1){
   while1("*","yjcode_typesx where id=".$tsx);if($row1=mysql_fetch_array($res1)){
   if($row1[admin]==2){
 ?>
 <span><a href="<?=rentser($sbarr[$si],'','','','search');?>" class="g_ac0"><?=$row1[name1]."：".$row1[name2]?></a></span>
 <? }}}}?>
 
 <? 
 if(returnsx("b")!=-1 || returnsx("c")!=-1){ 
  if(returnsx("c")!=-1 && returnsx("b")!=-1){$tjv=returnsx("b")."-".returnsx("c")."元";}
  elseif(returnsx("c")==-1){$tjv=returnsx("b")."元以上";}
  elseif(returnsx("b")==-1){$tjv=returnsx("c")."元以下";}
 ?>
 <span><a href="<?=rentser('b','','c','','search');?>" class="g_ac0"><?=$tjv?></a></span>
 <? }?>
 
 <? if($skey!=""){?>
 <span><a href="<?=rentser('s','','','','search');?>" class="g_ac0"><?=$skey?></a></span>
 <? }?>
 
 <? if($ifys==1){?>
 <span><a href="<?=rentser('a','','','','search');?>" class="g_ac0">有演示站</a></span>
 <? }?>
 
 <? if($ifzdfh==1){?>
 <span><a href="<?=rentser('d','','','','search');?>" class="g_ac0">自动发货</a></span>
 <? }?>
  
 </li>
 </ul>
 </div>
 <!--已选条件E-->

 <div class="listr">
  <? pagef($ses,30,"yjcode_pro",$px);?>
  <!--筛选B-->
  <form name="f1" method="post" onSubmit="return psear()">
  <div class="propx fontyh">
  <ul class="u2">
  <li class="l1">
  <a href="<?=rentser('f','','','');?>"<? if(returnsx("f")==-1){?> class="a1 g_ac1_h"<? }?>>最新</a>
  <a href="<?=rentser('f','1','','');?>"<? if(returnsx("f")==1){?> class="a1 g_ac1_h"<? }?>>销量</a>
  <a href="<?=rentser('f','2','','');?>"<? if(returnsx("f")==2){?> class="a1 g_ac1_h"<? }?>>人气</a>
  <a href="<?=rentser('f','3','','');?>"<? if(returnsx("f")==3 || returnsx("f")==4){?> class="a1 g_ac1_h"<? }?>>价格</a>
  </li>
  
  <li class="l4">价格：</li>
  <li class="l5"><input name="money1" id="money1" value="<?=$mon1?>" type="text" /></li>
  <li class="l6">-</li>
  <li class="l5"><input name="money2" id="money2" value="<?=$mon2?>" type="text" /></li>
  <li class="l7">关键字：</li>
  <li class="l8"><input name="ink1" value="<?=$skey?>" id="ink1" type="text" /></li>
  <li class="l9"><input name="" value="确定" type="submit" /></li>
  <li class="l11">共<strong class="g_ac1_h"><?=$count?></strong>件宝贝</li>
  <li class="l10">
  <a href="<?=rentser('h','2','','');?>"<? if(returnsx("h")==2){?> class="g_bc0_h g_ac0_h"<? }else{?> class="g_bc0"<? }?>>列表</a>
  <a href="<?=rentser('h','1','','');?>"<? if(returnsx("h")==1 || returnsx("h")==-1){?> class="g_bc0_h g_ac0_h"<? }else{?> class="g_bc0"<? }?>>大图</a>
  </li>
  </ul>
  </div>
  </form>
  <!--筛选E-->
  
 
  <? if(returnsx("h")==1 || (0==$rowcontrol[propx] && returnsx("h")==-1)){?>
  <!--图片B-->
  <div class="l">
  <?
  $i=1;
  while($row=mysql_fetch_array($res)){
  $au="view".$row[id].".html";
  while1("id,uqq,shopname","yjcode_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);
  $tit=strgb2312($row[tit],0,50);
  if(!empty($skey)){$tit=str_replace($skey,"<span class='red'>".$skey."</span>",$tit);}
  $tp="../".returntp("bh='".$row[bh]."' order by xh asc","-2");
  ?>
  <div class="lv<? if($i % 5==0){echo " lv0";}?>" onMouseOver="this.className='lv lv1<? if($i % 5==0){echo " lv0";}?>';" onMouseOut="this.className='lv<? if($i % 5==0){echo " lv0";}?>';">
  <ul class="u1 fontyh">
  <li class="l1">
  <div class="bgys">
   <span class="s1"><a href="<?=$au?>" target="_blank">查看详情</a></span>
   <? if(!empty($row[ysweb])){?><span class="s2"><a href="<?=$row[ysweb]?>" target="_blank">直接看演示</a></span><? }?>
  </div>
  <a href="<?=$au?>" target="_blank"><img alt="<?=$row[tit]?>" border="0" src="<?=returntppd($tp,"../img/none180x180.gif")?>" width="210" height="210" /></a>
  </li>
  <li class="l2"><strong><?=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]))?></strong></li>
  <li class="l3"><a href="<?=$au?>" title="<?=$row[tit]?>" target="_blank"><?=$tit?></a></li>
  <li class="l4"><a href="../shop/view<?=$row1[id]?>.html" target="_blank" class="hui"><?=returntitdian($row1[shopname],18)?></a><? if($row[fhxs]==2 || $row[fhxs]==3 || $row[fhxs]==4){?><span><img src="../img/auto.gif" /></span><? }?></li>
  <li class="l5">销量<span class="red"><?=$row[xsnum]?></span>笔</li>
  <li class="l6">评价<span class="green"><?=returncount("yjcode_propj where probh='".$row[bh]."'")?></span></li>
  <li class="l7"> </li>
  </ul>
  </div>
  <? $i++;}?>
  </div>
  <!--图片E-->
  <? }else{?>
 
  <!--列表B-->
 
  <?
  $i=1;
  while($row=mysql_fetch_array($res)){
  $au="view".$row[id].".html";
  while1("id,uqq,shopname,xinyong","yjcode_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);
  $tit=strgb2312($row[tit],0,50);
  if(!empty($skey)){$tit=str_replace($skey,"<span class='red'>".$skey."</span>",$tit);}
  $tp="../".returntp("bh='".$row[bh]."' order by xh asc","-2");
  $xy=returnjgdw($row1[xinyong],"",returnxy($row[userid],1));
  ?>
  <ul class="list" onMouseOver="this.className='list list1';" onMouseOut="this.className='list';">
  
  <li class="l1">
  <a href="view<?=$row[id]?>.html" target="_blank" class="a1 g_ac3" title="<?=$row[tit]?>"><?=returntitdian($row[tit],90)?></a><br>
  <? if($row[fhxs]==2 || $row[fhxs]==3 || $row[fhxs]==4){?><img src="../img/auto.gif" width="81" style="margin:6px 0 5px 0;" height="17" /><br><? }?>
  卖家信用：<img src="../img/dj/<?=returnxytp($xy)?>" /> 
  <br>物品类型： 
  <? if(0!=$row[ty3id]&&$row[ty1id]==85){?>   
  
  <a href="search_j<?=$row[ty1id]?>v_k<?=$row[ty2id]?>v_m<?=$row[ty3id]?>v.html"><?=returntype(3,$row[ty3id])?></a>
  
  <? }?>
  <? if(0!=$row[ty4id]&&$row[ty1id]==84){?>   
  
  <a href="search_j<?=$row[ty1id]?>v_k<?=$row[ty2id]?>v_m<?=$row[ty3id]?>v.html"><?=returntype(4,$row[ty4id])?></a>
  
  <? }?>
  <br>
  游戏/区/服： <? if(0!=$row[ty2id]){?>  <?=returntype(2,$row[ty2id])?> <? }?> >  <? if(0!=$row[ty4id]){?>  <?=returntype(4,$row[ty4id])?> <? }?> >  <? if(0!=$row[ty5id]){?>  <?=returntype(5,$row[ty5id])?> <? }?>
  </li>
  <li class="l2">
  <strong><?=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]))?></strong><br>
  <s class="hui"><?=$row[money1]?>元</s>
  </li>
  <li class="l3"><?=$row[kcnum]?></li>
  <li class="l4">
  <input type="button" value="查看详情" onClick="javascript:location.href='<?=$au?>';" class="inp1 g_ac3" onMouseOver="this.className='inp1 inp11 g_ac3';" onMouseOut="this.className='inp1';" />
  </li>
  </ul>
  <? }?>
  <!--列表B-->
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

<? include("../tem/bottom.html");?>
</body>
</html>