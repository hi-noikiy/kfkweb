<?
include("../config/conn.php");
include("../config/function.php");
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$id=$_GET[id];
while0("*","yjcode_pro where zt<>99 and id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("../");}
$nowmoney=returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]);

$sqlsell="select * from yjcode_user where id=".$row[userid];mysql_query("SET NAMES 'GBK'");$ressell=mysql_query($sqlsell);
if(!$rowsell=mysql_fetch_array($ressell)){php_toheader("../");}

$nuid=returnuserid($_SESSION["SHOPUSER"]);

$nch="";
if(isset($_COOKIE['prohistoy'])){
$nch=$_COOKIE['prohistoy'];
if(check_in($row[id]."xcf",$nch)){$nch=str_replace($row[id]."xcf","",$nch);}
$a=preg_split("/xcf/",$nch);
if(count($a)>6){$ni=6;}else{$ni=count($a);}
 $nch="";
 for($i=0;$i<=$ni;$i++){
 $nch=$nch.$a[$i]."xcf";
 }
}

$Month = 864000 + time();
setcookie(prohistoy,$row[id]."xcf".$nch, $Month,'/');
$nch=$_COOKIE['prohistoy'];
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="<?=returnjgdw($row[wkey],"",$row[tit])?>">
<meta name="description" content="<?=returnjgdw($row[wdes],"",strgb2312(strip_tags($row[txt]),0,250))?>">
<title><?=$row[tit]?> - <?=webname?></title>
<link href="<?=weburl?>css/basic.css" rel="stylesheet" type="text/css" />
<link href="<?=weburl?>product/index.css" rel="stylesheet" type="text/css" />
<link href="jquery.flexslider.css" rel="stylesheet" type="text/css" >
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script language="javascript" src="<?=weburl?>js/basic.js"></script>
<script language="javascript" src="<?=weburl?>product/index.js"></script>
<script type="text/javascript" src="jquery.flexslider-min.js"></script>
<script language="javascript" src="../js/layer.js"></script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbmain fontyh">
<div class="yjcode">

 <div class="dqwz">
 <ul class="u1">
 <li class="l1">
 当前位置：<a href="<?=weburl?>">首页</a> > <a href="search_j<?=$row[ty1id]?>v.html"><?=returntype(1,$row[ty1id])?></a>
 <? if(0!=$row[ty2id]){?> > <a href="search_j<?=$row[ty1id]?>v_k<?=$row[ty2id]?>v.html"><?=returntype(2,$row[ty2id])?></a><? }?>
 <? if(0!=$row[ty3id]){?> > <a href="search_j<?=$row[ty1id]?>v_k<?=$row[ty2id]?>v_m<?=$row[ty3id]?>v.html"><?=returntype(3,$row[ty3id])?></a><? }?>
 </li>
 </ul>
 </div>

 <div class="jbmain">
 <!--图片B-->
 <div class="qhtp">
   <div class="flexslider">
   <ul class="slides">
   <?
   while1("*","yjcode_tp where bh='".$row[bh]."' order by xh asc");while($row1=mysql_fetch_array($res1)){
   $tpa=preg_split("/\./",$row1[tp]);
   $tp="../".$tpa[0]."-1.jpg";
   ?>
   <li><a href="../tp/showpic.php?bh=<?=$row[bh]?>" target="_blank"><img src="<?=returntppd($tp,"../img/none300x300.gif")?>" width="350" height="350" /></a></li>
   <? }?>
   </ul>
   </div>
   <ul class="u1">
   <? 
   $a1="none";$a2="none";
   if($_SESSION["SHOPUSER"]==""){$a1="";}else{
    if(panduan("probh,userid","yjcode_profav where probh='".$row[bh]."' and userid=".$nuid)==1){$a2="";}else{$a1="";}
   }
   ?>
   <li class="l1" id="favpno" style="display:<?=$a1?>;"><a href="javascript:profavInto('<?=$row[bh]?>')">加入收藏</a></li>
   <li class="l1" id="favpyes" style="display:<?=$a2?>;"><a href="../user/favpro.php">已收藏</a></li>
   </ul>
 </div>
 <script language="javascript">
 $(function(){
  $('.flexslider').flexslider({
  controlNav: false
  });
  $('.flexslider2').cxScroll({
  direction: "top",
  step:5 
  });
 });
 </script>
 <!--图片E-->
 <!--中间B-->
 <div class="jbmiddle" id="jbmiddle">
   <h1><?=$row[tit]?></h1>
   <? $plnum=returncount("yjcode_propj where probh='".$row[bh]."'");if($plnum>0){?>
   <ul class="pful">
   <li class="l1">
   <img src="../img/x1.png" class="img1" width="92" height="15" />
   <? $pf=round(($row[pf1]+$row[pf2]+$row[pf3])/3,2);?>
   <div class="pf" style="width:<?=$pf/5*92?>px;"><img src="../img/x2.png" title="<?=$pf?>分" width="92" height="15" /></div>
   </li>
   <li class="l2"><a href="#pj"><?=$plnum?>条评论</a></li>
   </ul>
   <? }?>
   
   <div class="jg">
   
    <div class="jgm">
    <div class="d0">本站优惠价</div>
    <div class="d1"><span id="nowmoney"><?=sprintf("%.2f",$nowmoney)?></span><span id="nowmoneyY" style="display:none;"><?=$nowmoney?></span></div>
    <div class="d2">
     <span class="s1" id="zhekou"><? if(!empty($row[money1])){echo sprintf("%.1f",$nowmoney/$row[money1]*10)."折";}else{echo "无折扣";}?></span>
     <span class="s2">原价：<s id="yuanjia"><?=returnjgdian($row[money1])?></s></span>
    </div>
    </div>
    
    <ul class="kc">
    <li class="l1">库存</li>
    <li class="l1">销量</li>
    <li class="l2"><span id="nowkcnum"><?=$row[kcnum]?></span></li>
    <li class="l2"><?=$row[xsnum]?></li>
    </ul>
    
   </div>
   
   <? 
   if(2==$row[yhxs] && $sj<=$row[yhsj2]){
   if($sj<$row[yhsj1]){$a=1;}else{$a=2;}
   ?>
   <span id="nyhsj1" style="display:none;"><?=str_replace("-","/",$row[yhsj1])?></span>
   <span id="nyhsj2" style="display:none;"><?=str_replace("-","/",$row[yhsj2])?></span>
   <span id="nmoney2" style="display:none;"><?=returnjgdian($row[money2])?></span>
   <span id="nmoney3" style="display:none;"><?=returnjgdian($row[money3])?></span>
   <span id="nowsj" style="display:none;"><?=str_replace("-","/",$sj)?></span>
   <ul class="u5" id="xsyh">
   <li class="l1">促销</li>
   <li class="l2"><span class="s1"><?=$row[yhsm]?></span><span class="s2">(促销将于<span id="yhsjv"></span>)</span></li>
   </ul>
   <script language="javascript" src="yhsj.js"></script>
   <script language="javascript">yhsj(<?=$a?>);</script>
   <? }?>
   
   <ul class="u0">
   <li class="l1">商品类型：</li>
   <li class="l2"> 
   <? if(0!=$row[ty3id]&&$row[ty1id]==85){?>  
   <?=returntype(3,$row[ty3id])?>
    <? }?>
    <? if(0!=$row[ty4id]&&$row[ty1id]==84){?>  
   <?=returntype(4,$row[ty4id])?>
    <? }?>
   </li>
    </ul>
    <ul class="u0">
      <li class="l1">游戏区服：</li>
   <li class="l2"> <? if(0!=$row[ty2id]){?>  <?=returntype(2,$row[ty2id])?> <? }?> >  <? if(0!=$row[ty4id]){?>  <?=returntype(4,$row[ty4id])?> <? }?> >  <? if(0!=$row[ty5id]){?>  <?=returntype(5,$row[ty5id])?> <? }?></li>
   </ul>
   
   <!--套餐B-->
   <? $alli=returncount("yjcode_taocan where admin is null and zt=0 and probh='".$row[bh]."'");if($alli>0){?>
   <div id="tcnum" style="display:none;"><?=$alli?></div>
   <ul class="utc" id="utc1">
   <li class="l1">套餐</li>
   <li class="l2">
   <? 
   $i=1;
   $ja=0;
   while1("*","yjcode_taocan where admin is null and zt=0 and probh='".$row[bh]."' order by xh asc");while($row1=mysql_fetch_array($res1)){
   if(empty($row1[fhxs])){$k=$row[kcnum];}else{$k=$row1[kcnum];}
   $oncj="taocanonc(".$i.",".$alli.",".$row1[money1].",".$row1[money2].",".$row1[id].",".sprintf("%.1f",$row1[money1]/$row1[money2]*10).",".$k.")";
   if($i==1){$ja=$row1[id];}
   ?>
   <a href="javascript:void(0);" id="taocana<?=$i?>" onClick="<?=$oncj?>"><?=$row1[tit]?><i></i></a>
   <? $i++;}?>
   </li>
   </ul>
   
   <?
   while1("*","yjcode_taocan where admin is null and zt=0 and probh='".$row[bh]."' order by xh asc");while($row1=mysql_fetch_array($res1)){
   $alli2=returncount("yjcode_taocan where admin=2 and zt=0 and tit='".$row1[tit]."' and probh='".$row[bh]."'");if($alli2>0){
   $i=1;
   ?>
   <span id="tc2num<?=$row1[id]?>" style="display:none;"><?=$alli2?></span>
   <ul class="utc" id="tc2div<?=$row1[id]?>" style="display:none;">
   <li class="l1">选择</li>
   <li class="l2">
   <? 
   while2("*","yjcode_taocan where admin=2 and zt=0 and tit='".$row1[tit]."' and probh='".$row[bh]."' order by xh asc");while($row2=mysql_fetch_array($res2)){
   if(empty($row2[fhxs])){$k=$row[kcnum];}else{$k=$row2[kcnum];}
   ?>
   <a href="javascript:void(0);" id="taocan2a<?=$row1[id]?>_<?=$i?>" onClick="taocan2onc(<?=$i?>,<?=$alli2?>,<?=$row2[money1]?>,<?=$row2[money2]?>,<?=$row2[id]?>,<?=sprintf("%.1f",$row2[money1]/$row2[money2]*10)?>,<?=$k?>)"><?=$row2[tit2]?><i></i></a>
   <? $i++;}?>
   </li>
   </ul>
   <? }}?>
   
   <script language="javascript">pretc1id=<?=$ja?>;</script>
   <? }?>
   <!--套餐E-->

   <ul class="u6">
   <li class="l1"><input type="text" onChange="moneycha()" id="tkcnum" value="1" /></li>
   <li class="l2"><a href="javascript:void(0);" onClick="shujia()" class="a1">+</a><a href="javascript:void(0);" onClick="shujian()" class="a2">-</a></li>
   </ul>
   <ul class="u4">
   <li class="l1">
   <a href="javascript:buyInto('<?=$row[bh]?>')" class="buy">立即购买</a>
   <? 
   $a1="none";$a2="none";
   if($_SESSION["SHOPUSER"]==""){$a1="";}else{
	if(panduan("probh,userid","yjcode_car where probh='".$row[bh]."' and userid=".$nuid)==1){$a2="";}else{$a1="";}
   }
   ?>
   <a href="javascript:carInto('<?=$row[bh]?>')" id="cara1" style="display:<?=$a1?>;" class="car">加入购物车</a>
   <a href="../user/car.php" id="cara2" style="display:<?=$a2?>;" class="carok">已在购物车</a>
   <? if(!empty($row[ysweb])){?><a href="../tem/gotourl.php?u=<?=$row[ysweb]?>" target="_blank" class="ysweb">查看演示</a><? }?>
   </li>
   </ul>
   
   <ul class="u3">
   <li class="l1">特色</li>
   <li class="l2">
   <a href="javascript:void(0);" onMouseOver="tscapover(1)" id="tscap1" class="a1">担保交易</a>
   <? if($row[fhxs]==2 || $row[fhxs]==3 || $row[fhxs]==4){?><a href="javascript:void(0);" onMouseOver="tscapover(2)" id="tscap2">自动发货</a><? }?>
   <? if(1==$row[ifuserdj]){?><a href="javascript:void(0);" onMouseOver="tscapover(3)" id="tscap3">VIP折扣</a><? }?>
   </li>
   </ul>
   <div class="tsmain" id="tsmain1">担保交易，安全保证，有问题不解决可申请退款。</div>
   <div class="tsmain" id="tsmain2" style="display:none;">自动发货商品，随时可以购买，零等待。</div>
   <div class="tsmain" id="tsmain3" style="display:none;">不同会员等级尊享不同购买折扣。</div>

  </div>
 <!--中间E-->
 
  <!--卖家B-->
  <? $xy=returnjgdw($rowsell[xinyong],"",returnxy($row[userid],1));?>
  <div class="jbuser">
  <ul class="u1">
  <li class="l1"><img src="../img/userbao.gif" width="200" height="72" /></li>
  </ul>
  <div class="d1">
  <h3><?=$rowsell[shopname]?></h3>
  <ul class="du0"><li class="l1">信誉：</li><li class="l2"><img title="信用值<?=$xy?>" src="../img/dj/<?=returnxytp($xy)?>" /></li></ul>
  <ul class="du1"><li class="l1">掌柜：</li><li class="l2"><?=$rowsell[nc]?></li></ul>
  <ul class="du1"><li class="l1">宝贝：</li><li class="l2"><?=returncount("yjcode_pro where userid=".$rowsell[id]." and zt=0")?>件</li></ul>
  <ul class="du1"><li class="l1">创店：</li><li class="l2"><?=dateYMD($rowsell[sj])?></li></ul>
  <ul class="du2"><li class="l1">QQ：</li><li class="l2"><?=returnqq($row[userid])?></li></ul>
  <? if($rowsell[baomoney]>0){?>
  <div class="dub">已缴纳保证金<strong><?=sprintf("%.2f",$rowsell[baomoney])?></strong>元</div>
  <? }?>
  
  <ul class="du4">
  <li class="l1"><a href="../shop/view<?=$rowsell[id]?>.html" class="g_ac99" target="_blank">进入店铺</a></li>
  <? 
  $a1="none";$a2="none";
  if($_SESSION["SHOPUSER"]==""){$a1="";}else{
  if(panduan("*","yjcode_shopfav where shopid=".$rowsell[id]." and userid=".$nuid."")==1){$a2="";}else{$a1="";}
  }
  ?>
  <li class="l2" id="favsno" style="display:<?=$a1?>;"><a class="g_ac99" href="javascript:shopfavInto(<?=$rowsell[id]?>)">收藏店铺</a></li>
  <li class="l2" id="favsyes" style="display:<?=$a2?>;"><a class="g_ac99" href="../user/favshop.php">已收藏</a></li>
  </ul>
  </div>
  </div>
  <!--卖家E-->
 </div>
 </div>
</div>

<div class="yjcode">
 <!--左侧B-->
 
 <!--左侧E-->
 
 <!--右侧B-->
 <div class="right">
 <ul class="ucap">
 <li class="l1 g_bc0_h" id="bqcap1" onClick="bqonc(1)">商品详情</li>
  
 
 
 </ul>
 <div class="viewtxt fontyh" id="bqdiv1">
        <?
 
   while0("*","yjcode_type where   id=".$row[ty2id]."");if($trow=mysql_fetch_array($res)){
	   if($tarray!=""){
	  
		  ?>           
 <div class="wrap" style="min-height:60px;width:1080px;" id="shuxing">
                                             <dl>
                                
                                
                                   <?
 
  $tarray=explode(",",$trow[sellform]); 
	     $tvarray=unserialize($row[sellform]);
		  $i=0;
	  foreach($tarray as $value){ 
	   ?>
                                        <dt class="left list_info">
                                            <p>
                                                <span class="list_title"><?=$value?>：</span>
                                                <span class="left">
                                                      <?=$tvarray[$i]?>
                                                </span>
                                            </p>
                                        </dt>
               <?
			    $i++;
	   }
  
 
  ?>    
                            
                                
                                </dl>  
                            </div> <?php
							  } }
							?>
                         
 <div style="clear:both">
 <?=$row[txt]?></div></div>
 
 
 
 
 
 <div id="bqdiv2">
 <a name="pj"></a>
 <ul class="pjcap">
 <li class="l1">商品评价</li>
 <li class="l2">描述相符<br><strong class="g_ac0_h"><?=$row[pf1]?></strong></li>
 <li class="l2">发货速度<br><strong class="g_ac0_h"><?=$row[pf2]?></strong></li>
 <li class="l2">服务态度<br><strong class="g_ac0_h"><?=$row[pf3]?></strong></li>
 <li class="l2">综合评分<br><strong class="g_ac0_h"><?=round(($row[pf1]+$row[pf2]+$row[pf3])/3,2)?></strong></li>
 <li class="l3"><a href="../user/order.php?ddzt=suc">写评价赚积分</a></li>
 </ul>
 <? 
 while1("*","yjcode_propj where probh='".$row[bh]."' order by sj desc limit 10");while($row1=mysql_fetch_array($res1)){
 $usertx="../upload/".$row1[userid]."/user.jpg";
 if(!is_file($usertx)){$usertx="../user/img/nonetx.gif";}else{$usertx=$usertx."?id=".rnd_num(1000);} 
 ?>
 <div class="pj">
  <div class="pjleft"><ul class="u1"><li class="l1"><img src="<?=$usertx?>" width="50" height="50" /></li><li class="l2"><?=returnnc($row1[userid])?></li></ul></div>
  <div class="pjright">
  <ul class="u1">
  <li class="l1">
  <img src="../img/x1.png" class="img1" width="76" height="15" />
  <? $pf=round(($row1[pf1]+$row1[pf2]+$row1[pf3])/3,2);?>
  <div class="pf" style="width:<?=$pf/5*76?>px;"><img src="../img/x2.png" title="<?=$pf?>分" width="76" height="15" /></div>
  </li>
  <li class="l2"></li>
  </ul>
  <ul class="u2">
  <li class="l1">
  <?=$row1[txt]?><br>
  <? 
  if(1==$row1[iftp]){
  while2("*","yjcode_tp where bh='".$row1[orderbh]."' order by xh asc");while($row2=mysql_fetch_array($res2)){$tp="../".str_replace(".","-1.",$row2[tp]);
  ?>
  <a href="../<?=$row2[tp]?>" target="_blank"><img src="<?=$tp?>" width="50" height="50" /></a>&nbsp;&nbsp;
  <? }}?>
  </li>
  <? if(!empty($row1[hf])){?><li class="l2">卖家回复：<?=$row1[hf]?></li><? }?>
  </ul>
  </div> 
 </div>
 <? }?>
 <div class="allpj"> </div>
 </div>
 
 
 </div>
 <!--右侧E-->

</div>
<div style=" padding-top:10px; clear:both;border: #E5E5E5 solid 1px; width:1150px; margin:auto;">
<img name="" src="/product/img/stepsell.jpg"   alt=""></div>
<? include("../tem/bottom.html");?>
</body>
</html>