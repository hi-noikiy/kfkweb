<? include("../tem/openwv.php");?>
<? include("../tem/top.html");?>

<?
checkdjl("c1",$uid,"yjcode_user");
$sj1=date("Y-m-d H:i:s",strtotime("-30 day"));
$c=returncount("yjcode_order where selluserid=".$rowuser[id]." and (ddzt='wait' or ddzt='db' or ddzt='suc') and sj>='".$sj1."' and sj<='".$sj."'");
$f=sprintf("%.2f",returnsum("money1*num","yjcode_order where selluserid=".$rowuser[id]." and (ddzt='wait' or ddzt='db' or ddzt='suc') and sj>='".$sj1."' and sj<='".$sj."'"));
$sucnum=returnjgdw($rowuser[xinyong],"",returnxy($uid,1));

$mspf=returnjgdw(returnjgdian($rowuser[pf1]),"","5.00");
$fhpf=returnjgdw(returnjgdian($rowuser[pf2]),"","5.00");
$shpf=returnjgdw(returnjgdian($rowuser[pf3]),"","5.00");
?>
<div class="yjcode">
 <div class="shoptop1">
  <div class="d1"><a href="view<?=$uid?>.html"><?=$rowuser[shopname]?></a></div>

 <div class="d2" id="d2div" onmouseenter="topd2over()" onmouseleave="topd2out()">
  <span class="s2">
  <img src="../img/dj/<?=returnxytp($sucnum)?>" title="<?=$sucnum?>分" />
  </span>
  <span class="s3">
  <? if(1==$rowuser[ifmot]){?><img src="img/sj1.gif" title="手机已通过认证" /><? }else{?><img src="img/sj0.gif" title="手机未认证" /><? }?>
  <? if(1==$rowuser[ifemail]){?><img src="img/yx1.gif" title="邮箱已通过认证" /><? }else{?><img src="img/yx0.gif" title="邮箱未认证" /><? }?>
  </span>
  <span class="s4">[ 描述：<span class="green"><?=$mspf?></span> | 发货：<span class="green"><?=$fhpf?></span> | 售后：<span class="green"><?=$shpf?></span> ]</span>
   <!--拉框B-->
  <div id="lkuang" style="display:none;">
  <ul class="u1">
  <li class="l1">掌柜：<?=$rowuser[nc]?><br>
  <? if(!empty($rowuser[uqq])){?>
  <a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$rowuser[uqq]?>&site=<?=gloweb?>&menu=yes" target="_blank"><img src="../img/qq5.gif" border="0" /> <?=$rowuser[uqq]?></a>
  <? }?>
  </li>
  <li class="l2"><span>个人认证信息<br><?=dateYMD($rowuser[sj])?></span></li>
  <li class="l3">
  <? if(1==$rowuser[ifmot]){?><img src="img/sj1.gif" title="手机已通过认证" /><? }else{?><img src="img/sj0.gif" title="手机未认证" /><? }?>
  <? if(1==$rowuser[ifemail]){?><img src="img/yx1.gif" title="邮箱已通过认证" /><? }else{?><img src="img/yx0.gif" title="邮箱未认证" /><? }?>
  <br>
  <? if(1==$rowuser[ifmot]){?>手机已认证 <? }?>
  <? if(1==$rowuser[ifemail]){?> 邮箱已认证<? }?><br>
  <? if($rowuser[baomoney]>0){?>保证金：<span class="red"><?=$rowuser[baomoney]?>元</span><? }?>
  </li>
  <li class="l4">
  店铺综合指数<br>
  商品数量：<span class="red"><?=returncount("yjcode_pro where userid=".$rowuser[id]." and zt=0")?></span><br>
  累计访客：<span class="red"><?=$rowuser[djl]?></span><br>
  综合评分：<span class="red"><?=sprintf("%.2f",($mspf+$fhpf+$shpf)/3)?></span><br>
  </li>
  <li class="l5">
  店铺经营指数<br>
  共交易：<span class="red"><?=returncount("yjcode_order where selluserid=".$rowuser[id])?></span>笔<br>
  月交易：<span class="red"><?=$c?></span>笔<br>
  月成交：<span class="red"><?=$f?></span>元
  </li>
  <li class="l6">
  <? 
  $a1="none";$a2="none";
  $nuid=returnuserid($_SESSION["SHOPUSER"]);
  if($_SESSION["SHOPUSER"]==""){$a1="";}else{
  if(panduan("*","yjcode_shopfav where shopid=".$rowuser[id]." and userid=".$nuid."")==1){$a2="";}else{$a1="";}
  }
  ?>
  <a id="favsno" style="display:<?=$a1?>;" href="javascript:shopfavInto(<?=$rowuser[id]?>)">收藏店铺</a>
  <a id="favsyes" style="display:<?=$a2?>;" href="../user/favshop.php">已收藏</a>
  </li>
  </ul>
  </div>
  <!--拉框E-->
 </div>

  <div class="d4">近一月成交：<span><?=$c?></span>笔 ，共<span><?=$f?></span>元</div>
  <div class="d6"></div>
  <div class="d5">
  <a id="favsno1" style="display:<?=$a1?>;" href="javascript:shopfavInto(<?=$rowuser[id]?>)">收藏店铺</a>
  <a id="favsyes1" style="display:<?=$a2?>;" href="../user/favshop.php">已收藏</a>
  </div>
 </div>
</div>
<?
while1("*","yjcode_ad where adbh='ADSHOP01' and zt=0 order by xh asc limit 1");$row1=mysql_fetch_array($res1);
$bannar=returntppd("../upload/".$rowuser[id]."/bannar.jpg","../gg/".$row1[bh].".".$row1[jpggif]);
?>
<div class="bfb shopbfb" style="background:url(<?=$bannar?>) center top no-repeat;"></div>

<div class="bfb bfbshopm">
<div class="yjcode">
 <div class="menu">
 <a href="view<?=$uid?>.html" id="shopmenu1">首页</a>
 <a href="prolist_i<?=$uid?>v.html" id="shopmenu2">所有宝贝</a>
 <a href="aboutview<?=$uid?>.html" id="shopmenu3">关于我们</a>
 </div>
</div>
</div>