<?


include("config/conn.php");


include("config/function.php");


include("config/xy.php");


$sj=date("Y-m-d H:i:s");


?>


<html>


<head>


<meta http-equiv="x-ua-compatible" content="ie=7" />


<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />


<meta name="keywords" content="<?=$rowcontrol[webkey]?>">


<meta name="description" content="<?=$rowcontrol[webdes]?>">


<title><?=$rowcontrol[webtit]?> - <?=webname?></title>


<link href="css/basic.css" rel="stylesheet" type="text/css" />


<link href="css/index.css" rel="stylesheet" type="text/css" />


<script language="javascript" src="js/basic.js"></script>


<script language="javascript" src="js/jquery.min.js"></script>


<script src="homeimg/imgload.js" type="text/javascript"></script> 


<script language="javascript" src="js/index.js"></script>


<script type="text/javascript">


$(function(){


 $('img.lazy').imglazyload({ 


 event:'scroll', 


 attr:'lazy-src' 


 }); 


});


</script>


</head>


<body>


<? include("tem/top.html");?>


<? 


autoAD("ADI00");


while1("*","yjcode_ad where adbh='ADI00' and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){


$tp="gg/".$row1[bh].".".$row1[jpggif];


$image_size= getimagesize($tp);


?>


<div class="topbanner_hj" style="background:url(<?=$tp?>) no-repeat center 0;height:<?=$image_size[1]?>px;"><a href="<?=$row1[aurl]?>" target="_blank"></a></div>


<? }?>


<? include("tem/top1.html");?>





<!--切换B-->


<div class="banner">


 <div class="flexslider">


 <ul class="slides">


 <? autoAD("jiandan_01");$i=0;while1("*","yjcode_ad where adbh='jiandan_01' and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){if($i==0){$s=" center";}else{$s=" 50% 0";}?>


 <li style="background:url(<?=weburl?>gg/<?=$row1[bh]?>.<?=$row1[jpggif]?>)<?=$s?> no-repeat;"><a href="<?=$row1[aurl]?>" target="_blank"></a></li>


 <? $i++;}?>


 </ul>


 </div>


</div>


<script type="text/javascript" src="homeimg/jquery.flexslider-min.js"></script>


<script type="text/javascript">


$(document).ready(function(){


 $('.flexslider').flexslider({


 directionNav: true,


 pauseOnAction: false,


 pauseOnHover:true,


});


})


</script>


<!--切换E-->





<div class="yjcode fontyh">





<div class="typelist">


 <? $i=1;while1("*","yjcode_type where admin=1 and (iftj is null or iftj=0) order by xh asc limit 4");while($row1=mysql_fetch_array($res1)){?>


 <div class="d1<? if($i==4){?> d0<? }?>">


  <div class="ds1"><a href="product/search_j<?=$row1[id]?>v.html" target="_blank"><?=$row1[type1]?></a></div>


  <div class="ds2">


  <? while2("*","yjcode_type where type1='".$row1[type1]."' and admin=2 order by xh asc limit 14");while($row2=mysql_fetch_array($res2)){?>


  <a href="product/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html" target="_blank"><?=$row2[type2]?></a>


  <? }?>


  </div>


 </div>


 <? $i++;}?>


</div>





<!--推荐产品B-->
 <div class="tjspcap fontyh">推荐商品</div>
 <div class="tjpro fontyh">
 <? 
 $i=1;
 while1("*","yjcode_pro where zt=0 and ifxj=0 and iftuan=1 and yhxs=2 and yhsj2>'".$sj."' order by yhsj2 asc limit 5");while($row1=mysql_fetch_array($res1)){
 $money1=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]);
 $au="product/view".$row1[id].".html";
 $dqsj=str_replace("-","/",$row1[yhsj2]);
 while2("*","yjcode_user where id=".$row1[userid]);$row2=mysql_fetch_array($res2);
 ?>
 <span id="dqsj<?=$i?>" style="display:none;"><?=$dqsj?></span>
 <ul class="u1 u1<?=$i?>">
 <li class="l1"><a href="<?=$au?>" target="_blank"><img class="tp" border="0" src="<?=returntppd(returntp("bh='".$row1[bh]."'","-1"),"img/none200x200.gif")?>" width="198" height="198" /></a>
 <li class="l2"><a href="<?=$au?>" title="<?=$row1[tit]?>" target="_blank"><?=strgb2312($row1[tit],0,50)?></a></li>
 <li class="l3"><?=$money1?>元</li>
 </ul>
 <? $i++;}?>
 </div>
 <script language="javascript">
 userChecksj();
 </script>
 <!--推荐产品E-->

</div>

<div class="bfb bfbh fontyh">
<div class="yjcode">
 <!--列表B-->
 <div class="listcap">
  <div class="d1">新品上架</div>
 <div class="pcap">
  <? $i=1;while1("*","yjcode_type where admin=1 and (iftj is null or iftj=0) order by xh asc limit 6");while($row1=mysql_fetch_array($res1)){?>


<? $i++;}?>
  </div>
 </div>
 <span id="listcapA" style="display:none;"><?=$i?></span>
 <? $i=1;while1("*","yjcode_type where admin=1 and iftj=0 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <div class="container" id="list<?=$i?>"<? if($i!=1){?> style="display:none;"<? }?>>
 <!-- Effect-1 -->
 <?
 $j=1;
 while0("*","yjcode_pro where ifxj=0 and zt=0 and ty1id=".$row1[id]." order by lastsj asc limit 8");while($row=mysql_fetch_array($res)){
 $au="product/view".$row[id].".html";
 $money1=returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]);
 ?>
 <div class="list<? if($j==1 || $j==5){?> list0<? }?>">
 <ul class="u1">
 <li>
 <div class="port-1 effect-2">
  <div class="image-box"><img src="<?=returntppd(returntp("bh='".$row[bh]."'","-1"),"img/none180x180.gif")?>" width="257" height="257" alt="<?=$row[tit]?>"></div>
  <div class="text-desc"><h3><?=returntype(2,$row[ty2id])?></h3><p><?=strgb2312($row[wdes],0,300)?></p><a href="<?=$au?>" target="_blank" class="btn">立即购买</a>
  </div>
 </div>
 </li>
 </ul>
 <ul class="u2">
 <li class="l1"><a href="<?=$au?>" target="_blank" title="<?=$row[tit]?>"><?=strgb2312($row[tit],0,60)?></a></li>
 <li class="l2"><strong><?=sprintf("%.2f",$money1)?></strong></li>
 <li class="l3"><?=sprintf("%.1f",10*$money1/$row[money1])?>折</li>
 </ul>
 </div>
 <? $j++;}?>
 <!-- Effect-1 End -->
 </div>
 <? $i++;}?>
 
 <!--列表E-->
 
 <!--商家B-->
 <div class="listcap listcap1">
  <div class="d1">优质商家</div>
 </div>
 <div class="shoplist">
 <? 
 $i=1;
 while1("*","yjcode_user where pm>0 and shopzt=2 and zt=1 order by pm asc limit 4");while($row1=mysql_fetch_array($res1)){
 $xy=returnjgdw($row1[xinyong],"",returnxy($row1[id],1));
 ?>
 <div class="shop shop<?=$i?>">
  <div class="d1"><img src="<?=returntppd("upload/".$row1[id]."/shop.jpg","img/none300x300.gif")?>" width="261" height="261"></div>
  <div class="d2"><?=returntitdian($row1[seodes],100)?></div>
  <div class="d3">我已经赚了<?=sprintf("%.2f",$row1[sellmall])?>元</div>
  <div class="d4">
  <span class="s1"><a href="shop/view<?=$row1[id]?>.html" target="_blank"><?=$row1[shopname]?></a></span>
  <span class="s2"><img src="img/dj/<?=returnxytp($xy)?>" title="<?=$xy?>分" /></span>
  </div>
 </div>
 <? $i++;}?>
 </div>
 <!--商家E-->
</div>
</div>

<? include("tem/bottom.html");?>
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

</body>
</html>