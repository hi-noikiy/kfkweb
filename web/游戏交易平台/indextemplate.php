<?
include("config/conn.php");
include("config/function.php");
$sj=date("Y-m-d H:i:s");
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="<?=$rowcontrol[webkey]?>">
<meta name="description" content="<?=$rowcontrol[webdes]?>">
<title><?=$rowcontrol[webtit]?></title>
<link rel="shortcut icon" href="img/favicon.ico" />
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/index.js"></script>
<? if(empty($rowcontrol[ifwap])){?>
<script language="javascript">
if(is_mobile()) {document.location.href= '<?=weburl?>m/';}
</script>
<? }?>
</head>
<body>
<? 
autoAD("ADI00");
while1("*","yjcode_ad where adbh='ADI00' and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){
$tp="gg/".$row1[bh].".".$row1[jpggif];
$image_size= getimagesize($tp); 
?>
<div class="topbanner_hj" style="background:url(<?=$tp?>) no-repeat center 0;height:<?=$image_size[1]?>px;"><a href="<?=$row1[aurl]?>" target="_blank"></a></div>
<? }?>

<? include("tem/top.html");?>
<div class="yjcode">
<? while1("*","yjcode_ad where adbh='ADLP' and zt=0 order by xh asc limit 1");if($row1=mysql_fetch_array($res1)){?>
<div id="toplsad" onMouseOver="rels()"><a href="<?=$row1[aurl]?>" target="_blank"><img border="0" src="<?=weburl?>gg/<?=$row1[bh]?>.<?=$row1[jpggif]?>" /></a></div>
<span id="toplsimg" style="display:none;"><?=weburl?>gg/<?=$row1[bh]?>.<?=$row1[jpggif]?></span>
<? }?>
</div>
<? include("tem/top1.html");?>

<!--对联广告判断开始-->
<? while1("*","yjcode_ad where adbh='ADDL' and zt=0 order by xh asc limit 1");if($row1=mysql_fetch_array($res1)){?>
<script language="JavaScript" src="js/dlad.js"></script>
<script language="javascript">
 var theFloaters= new floaters();
 //右面
 theFloaters.addItem('followDiv1','document.body.clientWidth-106',80,'<?=adwhile("ADDL",1)?><span class="dlclo" onclick="dlonc()">关闭</span>');
 //左面
 theFloaters.addItem('followDiv2',6,80,'<?=adwhile("ADDL",1)?><span class="dlclo" onclick="dlonc()">关闭</span>');
 theFloaters.play();
</script>
<? }?>
<!--对联广告判断结束-->


<div class="yjcode">

<!--左侧导航开始-->
 
<!--左侧导航结束-->

<!--切换开始-->
<div class="qh">
 <div class="container" id="idTransformView">
  <ul class="slider" id="idSlider">
  <?
  autoAD("ADI04");
  $i=1;
  while1("*","yjcode_ad where adbh='ADI04' and zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){
  ?>
    <li><a href="<?=$row1[aurl]?>"><img src="gg/<?=$row1[bh]?>.<?=$row1[jpggif]?>" width="680" height="221" border="0" /></a></li>
  <?
  $i++;
  }
  ?>
  </ul>
  <span style="display:none" id="qhai"><?=$i-1?></span>
  <ul class="num" id="idNum">
   <? for($j=1;$j<$i;$j++){?><li><?=$j?></li><? }?>
  </ul>
 </div>  
</div>
<!--切换结束-->

<!--公告调用开始-->
<div class="iright">
<div class="index_login">
<div class="clear" style="height:20px;"></div>
	<div class="touxiang"><a href="user/" target="_blank"><img src="user/img/nonetx.gif" id="itx"> </a></div>
	<div class="intr"><h5 id="vv881name" style="font-size:12px;">Hi，你好！</h5><p>欢迎您<span id="iuid" class="s1"></span></p></div>
     <ul class="ksdl2" id="ksdl3" style="display:none;">
 <li class="l1">
 可用余额：<span id="imoney" class="s2"></span>
 </li>
 <li class="l3">[<a href="user/">会员中心</a>] [<a href="user/un.php">安全退出</a>]</li>
 </ul>
<div class="clear" style="height:10px;"></div>
<div class="indexlogin1  "><a href="/product/search_h2v.html">我要买</a></div>
<div class="indexlogin2  "><a href="/user/productlx.php">我要卖</a></div>
<div class="indexlogin3  " id="ksdl1"><a href="/reg/reg.php">免费注册</a></div>
<div class="indexlogin4  " id="ksdl2"><a href="/reg/">登录</a></div>

<div class="clear" style="height:15px;"></div>
 
 </div>
 
 
 
 <div class="web_notice">
<div class="clear" style="height:5px;"></div>
<div class="vv881title"><h5>公告通知</h5>
<a class="themore" href="news/list.php?cat_id=3">&gt;</a></div>

	  <ul> <? while0("*","yjcode_gg where zt=0 order by sj desc limit 5");while($row=mysql_fetch_array($res)){?>
	             <li><a href="help/ggview<?=$row[id]?>.html" title="<?=$row[tit]?>" target="_blank"><?=strgb2312($row[tit],0,26)?></a></li>
	         <? }?>
	     </ul>
					
	 </div>
 
 <div class="box2_right1" style="margin-top:10px;">
<div class="clear" style="height:5px;"></div>
<div class="vv881title"><h5>交易排行</h5><span class="example">热门交易风向标！<i class="bg"></i></span></div>
<div class="trade-ranking">
	<ul>
    
     <?
	 $i=1;
	  while1("*","yjcode_type where admin=2  order by xh asc  limit 9");while($row1=mysql_fetch_array($res1)){?>
 
	 <div class="trade-ranking-column" id="DivShopPaiHangFlag1_S1"   style="">
	 <div class="rank"><p class="num<? if($i<=2){echo $i;}else{echo 3;}?>"><?=$i?></p></div>
	 <div class="trade-ranking-text"><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a></div>
	</div>
	
   <?
   $i++;
    }?>

	       

</ul></div></div>
 
 
 <div class="box2_right2" style="margin-top:10px;">
<div class="clear" style="height:5px;"></div>
<div class="vv881title"><h5>常见问题</h5></div>
<div class="box3_right_con">
<ul>
<? while2("*","yjcode_news where type1id=22 and zt=0 order by lastsj desc limit 4");while($row2=mysql_fetch_array($res2)){?>

    		    <li><h3><a href="news/txtlist_i<?=$row2[id]?>v.html" title="<?=$row2[tit]?>" target="_blank"><?=returntitcss(strgb2312($row2[tit],0,53),$row2[ifjc],$row2[titys])?></a></h3><p><?=strgb2312($row2[wdes],0,50)?>...</p></li>
		<? }?>	  
	 
</ul>
</div>
 
</div>
 
 
 <?
 $inittjarr=array(0,0,0,0);
 $inittjb=preg_split("/,/",$rowcontrol[inittj]);
 for($i=0;$i<count($inittjb);$i++){
 if(is_numeric($inittjb[$i])){$inittjarr[$i]=$inittjb[$i];}
 }
 ?>
 
</div>
<!--公告调用结束-->
<div style="clear: both"></div>
<!--最新交易开始-->
<div class="newjy">
<span class="s1">最新交易</span>
 
 <ul id="rolltxt">
 <? $i=0;while1("*","yjcode_order where (ddzt='wait' or ddzt='db' or ddzt='suc') order by sj desc limit 20");while($row1=mysql_fetch_array($res1)){?>
 <li><?=returnnc($row1[userid])?> 购买了 <span class="blue"><?=returntitdian($row1[tit],100)?></span> 单价：<strong>￥<?=$row1[money1]?></strong> [<?=returnorderzt($row1[ddzt])?>]</li>
 <? $i++;}?>
 </ul>
</div>
<span id="jynum" style="display:none;"><?=$i?></span>
<script language="javascript" src="js/jy.js"> </script>
<!--最新交易结束-->

 

<!--列表开始-->
 <div class="box_left1" style="float:left;margin: 10px 0 0 10px;">
<div class="box2_tt1">
<a href="#" id="tt_a0" class="tt1_a2" style="width:60px; font-size:12px; font-family:'微软雅黑';" onMouseOver="sele2('tt_c0',this,'tt_a0')">热门游戏</a>
<a href="#" id="tt_a1" class="tt1_a1" onMouseOver="sele2('tt_c1',this,'tt_a1')">A</a>
<a href="#" id="tt_a2" class="tt1_a1" onMouseOver="sele2('tt_c2',this,'tt_a2')">B</a>
<a href="#" id="tt_a3" class="tt1_a1" onMouseOver="sele2('tt_c3',this,'tt_a3')">C</a>
<a href="#" id="tt_a4" class="tt1_a1" onMouseOver="sele2('tt_c4',this,'tt_a4')">D</a>
<a href="#" id="tt_a5" class="tt1_a1" onMouseOver="sele2('tt_c5',this,'tt_a5')">E</a>
<a href="#" id="tt_a6" class="tt1_a1" onMouseOver="sele2('tt_c6',this,'tt_a6')">F</a>
<a href="#" id="tt_a7" class="tt1_a1" onMouseOver="sele2('tt_c7',this,'tt_a7')">G</a>
<a href="#" id="tt_a8" class="tt1_a1" onMouseOver="sele2('tt_c8',this,'tt_a8')">H</a>
<a href="#" id="tt_a9" class="tt1_a1" onMouseOver="sele2('tt_c9',this,'tt_a9')">I</a>
<a href="#" id="tt_a10" class="tt1_a1" onMouseOver="sele2('tt_c10',this,'tt_a10')">J</a>
<a href="#" id="tt_a11" class="tt1_a1" onMouseOver="sele2('tt_c11',this,'tt_a11')">K</a>
<a href="#" id="tt_a12" class="tt1_a1" onMouseOver="sele2('tt_c12',this,'tt_a12')">L</a>
<a href="#" id="tt_a13" class="tt1_a1" onMouseOver="sele2('tt_c13',this,'tt_a13')">M</a>
<a href="#" id="tt_a14" class="tt1_a1" onMouseOver="sele2('tt_c14',this,'tt_a14')">N</a>
<a href="#" id="tt_a15" class="tt1_a1" onMouseOver="sele2('tt_c15',this,'tt_a15')">O</a>
<a href="#" id="tt_a16" class="tt1_a1" onMouseOver="sele2('tt_c16',this,'tt_a16')">P</a>
<a href="#" id="tt_a17" class="tt1_a1" onMouseOver="sele2('tt_c17',this,'tt_a17')">Q</a>
<a href="#" id="tt_a18" class="tt1_a1" onMouseOver="sele2('tt_c18',this,'tt_a18')">R</a>
<a href="#" id="tt_a19" class="tt1_a1" onMouseOver="sele2('tt_c19',this,'tt_a19')">S</a>
<a href="#" id="tt_a20" class="tt1_a1" onMouseOver="sele2('tt_c20',this,'tt_a20')">T</a>
<a href="#" id="tt_a21" class="tt1_a1" onMouseOver="sele2('tt_c21',this,'tt_a21')">U</a>
<a href="#" id="tt_a22" class="tt1_a1" onMouseOver="sele2('tt_c22',this,'tt_a22')">V</a>
<a href="#" id="tt_a23" class="tt1_a1" onMouseOver="sele2('tt_c23',this,'tt_a23')">W</a>
<a href="#" id="tt_a24" class="tt1_a1" onMouseOver="sele2('tt_c24',this,'tt_a24')">X</a>
<a href="#" id="tt_a25" class="tt1_a1" onMouseOver="sele2('tt_c25',this,'tt_a25')">Y</a>
<a href="#" id="tt_a26" class="tt1_a1" onMouseOver="sele2('tt_c26',this,'tt_a26')">Z</a>
</div>
 


<div id="tt_c1" class="box2_cc1" style="display: none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='A' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>

<div id="tt_c2" class="box2_cc1" style="display: none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='B' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>


<div id="tt_c3" class="box2_cc1" style="display: none;">
<ul> 
 <? while1("*","yjcode_type where admin=2 and zm='C' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul>
</div>

<div id="tt_c4" class="box2_cc1" style="display: none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='D' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>
<div id="tt_c5" class="box2_cc1" style="display: none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='E' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>
<div id="tt_c6" class="box2_cc1" style="display: none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='F' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>
<div id="tt_c7" class="box2_cc1" style="display: none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='G' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>
<div id="tt_c8" class="box2_cc1" style="display: none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='H' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>
<div id="tt_c9" class="box2_cc1" style="display: none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='I' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>
<div id="tt_c10" class="box2_cc1" style="display: none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='J' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>
<div id="tt_c11" class="box2_cc1" style="display: none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='K' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>
<div id="tt_c12" class="box2_cc1" style="display: none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='L' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>
<div id="tt_c13" class="box2_cc1" style="display: none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='M' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>
<div id="tt_c14" class="box2_cc1" style="display: none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='N' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>
<div id="tt_c15" class="box2_cc1" style="display: none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='O' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>
<div id="tt_c16" class="box2_cc1" style="display: none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='P' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>
<div id="tt_c17" class="box2_cc1" style="display: none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='Q' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>
<div id="tt_c18" class="box2_cc1" style="display: none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='R' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>
<div id="tt_c19" class="box2_cc1" style="display:none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='S' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>
<div id="tt_c20" class="box2_cc1" style="display: none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='T' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>
<div id="tt_c21" class="box2_cc1" style="display:none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='U' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>
<div id="tt_c22" class="box2_cc1" style="display:none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='V' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>
<div id="tt_c23" class="box2_cc1" style="display: none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='W' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>
<div id="tt_c24" class="box2_cc1" style="display: none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='X' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>
<div id="tt_c25" class="box2_cc1" style="display: none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='Y' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>


<div id="tt_c26" class="box2_cc1" style="display: none;"><ul> 
 <? while1("*","yjcode_type where admin=2 and zm='Z' order by id asc");while($row1=mysql_fetch_array($res1)){?>
<li> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> 
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul></div>



<div class="box2_cc1" id="tt_c0" style="display: block;">
<ul> 
  <? while1("*","yjcode_type where admin=2 and rm=1 order by id asc");while($row1=mysql_fetch_array($res1)){?>

<li><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"> <? $ntp="upload/type/type2_".$row1[id].".png"; ?><img src="<?=$ntp?>"  /> </a>
  <p><a href="<?=weburl?>product/search_k<?=$row1[id]?>v.html"><?=$row1[type2]?></a><span class="star5"></span></p></li>
  <? }?>
</ul>
</div>



</div>

 <div class="box_left1" style="float:left;margin: 10px 0 0 10px; height:480px">
 
 <div class="box3_div">
<div class="clear" style="height:5px;"></div>
<div class="vv881title"><h5>最新发布</h5>
<!--<a class="themore" href="#">></a>--></div>
	<div class="ordercon" style=" width:400px; float:left">
			<div class="align_bottom">
			<?
					while0("*","yjcode_pro where ifxj=0    order by lastsj desc limit 8");while($row=mysql_fetch_array($res)){	
					?>
			<dl>
				<dd class="col1"><a href="product/view<?=$row[id]?>.html" target="_blank"><?=$row[tit]?></a></dd>
				<dd class="col2">￥<?=$row[money1]?></dd>
				<dd class="col3">
				剩余<?=$row[kcnum]?>件				</dd>
			</dl>
			
	 <?
	 }
?>
			
										</div>
		
</div>




<div class="ordercon" style=" width:400px; float:left">
			<div class="align_bottom">
			
		 	<?
					while0("*","yjcode_pro where ifxj=0     order by lastsj desc limit 9,16");while($row=mysql_fetch_array($res)){	
					?>
			<dl>
				<dd class="col1"><a href="product/view<?=$row[id]?>.html" target="_blank"><?=$row[tit]?></a></dd>
				<dd class="col2">￥<?=$row[money1]?></dd>
				<dd class="col3">
				剩余<?=$row[kcnum]?>件				</dd>
			</dl>
			
	 <?
	 }
?>
			
			
										</div>
		
</div>



</div>
 
 </div>
<!--列表结束-->

<!--评论B-->
  <!--友情B-->
 <div class="bolink">
 <section>
        <div class="safepromise">
            <div class="safe_item1">
                <p class="f14r">安全保障</p>
                <p>防盗措施 保障交易安全</p>
            </div>
            <div class="safe_item2">
                <p class="f14r">免手续费</p>
                <p>所有交易无任何手续费</p>
            </div>
            <div class="safe_item3">
                <p class="f14r">专业团队</p>
                <p>快速专业引导完成交易</p>
            </div>
            <div class="safe_item4">
                <p class="f14r">7X24小时客服</p>
                <p>客服7X24小时贴心服务</p>
            </div>
        </div>
    </section>
 
 </div>
 <!--友情E-->

<!--商家B-->
 
<!--商家E-->

 <!--友情B-->
  
 <!--友情E-->

</div>

<? include("tem/bottom.html");?>
</body>
</html>