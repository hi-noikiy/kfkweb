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
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/index.js"></script>
</head>
<body>
<script language="javascript">
document.getElementById("topmenu1").className="a1";
</script>
<? include("tem/top.html");?>
<? include("tem/top1.html");?>
 <!--�л�B-->
 <div class="banner" id="banner" >
 <?
  $i=1;
  while1("*","yjcode_ad where adbh='shang_01' order by xh asc");while($row1=mysql_fetch_array($res1)){
  ?>
  <a href="<?=$row1[aurl]?>" class="d1" target="_blank" style="background:url(gg/<?=$row1[bh]?>.<?=$row1[jpggif]?>) center no-repeat;"></a>
<?
  $i++;
  }
  ?>
  <div class="d2" id="banner_id">
 <ul style="margin-left:-86px;">
 <? for($j=1;$j<$i;$j++){?><li></li><? }?> </ul>
 </div>
 </div>
 <script type="text/javascript">banner();</script>
 <!--�л�E-->

<div class="yjcode">
 <!--���ٵ�¼B-->
 <div id="idlno">
 <ul class="u1 fontyh">
 <li class="l1">���ٵ�¼��վ</li>
 <li class="l2">��¼����</li>
 <li class="l3"><a href="reg/reg.php">���ע��</a></li>
 <li class="l4"><input type="text" id="it1" /></li>
 <li class="l2">��¼���룺</li>
 <li class="l3"><a href="reg/getmm.php">�������룿</a></li>
 <li class="l4"><input type="password" id="it2" /></li>
 <li class="l5"><input type="button" id="idl" value="��¼" onClick="idldl(0)" /><input type="button" id="idling" disabled style="display:none;" value="���ڵ�¼" /></li>
 <li class="l6"><a href="config/qq/oauth/index.php"><img border="0" src="img/qq_login.png" /></a></li>
 </ul>
 </div>
 <div id="idlyes" style="display:none;">
 <ul class="u1 fontyh">
 <li class="l1">��¼�û���Ϣ</li>
 <li class="l2">
 �� �� ����<span id="idl1" class="blue"></span><br>
 �ʻ��ܶ<span id="idl2" class="feng"></span>Ԫ<br>
 �ʻ����᣺<span id="idl3" class="feng"></span>Ԫ<br>
 �����ֶ<span id="idl4" class="feng"></span>Ԫ<br>
 ���û��֣�<span id="idl5" class="feng"></span>��<br>
 </li>
 <li class="l3">[<a href="user/">��Ա����</a> | <a href="user/un.php">�˳���¼</a>]</li>
 </ul>
 </div>
 <script language="javascript">idldl(1);</script>
 <!--���ٵ�¼E-->
 
</div>

<div class="bfb"></div>

<div class="yjcode">
 <div class="tjad"><a href=<?=weburl?>help/view8.html target=_blank><img border=0 src=gg/1449455730ad16.gif width=220 height=140></a></div>
 <!--ͳ��B-->
 <div class="tongji fontyh">
  <ul class="u1">
  <li class="l1">����ͳ��</li>
    <li class="l2">��Ա��<strong> <?=$inittjarr[0]+returncount("yjcode_user")?> </strong>λ</li>
  <li class="l2">��Ʒ��<strong> <?=$inittjarr[1]+returncount("yjcode_pro where zt=0 and ifxj=0")?> </strong>��</li>
  <li class="l2">���ף�<strong> <?=$inittjarr[2]+returncount("yjcode_order where (ddzt='wait' or ddzt='db' or ddzt='back' or ddzt='suc')")?> </strong>��</li>
  <li class="l2">��<strong> <?=sprintf("%.0f",$inittjarr[3]+returnsum("money1*num","yjcode_order where ddzt<>'backsuc' and ddzt<>'close'"))?> </strong>Ԫ</li>
  </ul>
  <ul class="u2">
  <li class="l1">��վ����</li>
  <li class="l2">
  <? while0("*","yjcode_gg where zt=0 order by sj desc limit 3");while($row=mysql_fetch_array($res)){?>
    <a href="help/ggview<?=$row[id]?>.html" title="<?=$row[tit]?>" target="_blank">[<?=dateMD($row[sj])?>] <?=strgb2312($row[tit],0,26)?></a>
     <? }?>
    </li>
  </ul>
 </div>
 <!--ͳ��E-->
 
 <!--�Ƽ���ƷB-->
 <ul class="tjprocap fontyh">
 <li class="l1">��ʱ�Żݴ���</li>
 <li class="l2"><a href="product/" target="_blank">�鿴����>></a></li>
 </ul>
 <div class="tjpro fontyh">
 <? 
$i=1;
while1("*","yjcode_pro where zt=0 and ifxj=0 and iftuan=1 and yhxs=2 and yhsj2>'".$sj."' order by yhsj2 asc limit 4");while($row1=mysql_fetch_array($res1)){
$money1=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]);
$au="product/view".$row1[id].".html";
$dqsj=str_replace("-","/",$row1[yhsj2]);
while2("*","yjcode_user where id=".$row1[userid]);$row2=mysql_fetch_array($res2);
?>
  <span id="dqsj<?=$i?>" style="display:none;"><?=$dqsj?></span>
 <ul class="u1 u1<?=$i?>" onMouseOver="this.className='u1 u1<?=$i?> u21';" onMouseOut="this.className='u1 u1<?=$i?>';">
 <li class="l1"><a href="<?=$au?>" target="_blank"><img class="tp" border="0" src="<?=returntppd(returntp("bh='".$row1[bh]."'","-1"),"img/none200x200.gif")?>" width="200" height="180" /></a><span class="djs" id="djs<?=$i?>">���ڼ���</span></li>
 <li class="l2"><a href="<?=$au?>" title="<?=$row1[tit]?>"" target="_blank"><?=strgb2312($row1[tit],0,56)?></a></li>
 <li class="l3"><?=$money1?></li>
 <li class="l4"><a href="<?=$au?>" target="_blank">ȥ����</a></li>
 </ul>
  <? $i++;}?>
  </div>
 <script language="javascript">
 userChecksj();
 </script>
 <!--�Ƽ���ƷE-->
 
 <!--�Ƽ��̼�B-->
 <ul class="tjshopcap fontyh">
 <li class="l1">�Ƽ��̼�</li>
 <li class="l2"><a href="reg/reg.php" target="_blank">��ҲҪ��פ</a></li>
 </ul>
 <div class="tjshop fontyh">
  <div class="dleft">
  <? while1("*","yjcode_user where zt=1 and shopzt=2 and shopname<>'' and pm>0 order by pm asc limit 1");while($row1=mysql_fetch_array($res1)){?>
    <ul class="u1">
  <li class="l1"><img width="85" height="85" src="<?=returntppd("upload/".$row1[id]."/shop.jpg","img/none180x180.gif")?>" /></li>
  <li class="l2">
  <a href="shop/view<?=$row1[id]?>.html" target="_blank"><?=strgb2312($row1[shopname],0,17)?></a>
  <span class="s1">���룺</span>
  <span class="s2"><strong><?=$row1[sellmyue]?></strong></span>
  </li>
  </ul>
  <? }?>
  <? $i=2;while1("*","yjcode_user where zt=1 and shopzt=2 and shopname<>'' and pm>1 order by pm asc limit 4");while($row1=mysql_fetch_array($res1)){?>
    <ul class="u2">
  <li class="l1"><img width="40" height="40" src="<?=returntppd("upload/".$row1[id]."/shop.jpg","img/none60x60.gif")?>" /></li>
  <li class="l2 l2<?=$i?>">
  <a href="shop/view<?=$row1[id]?>.html" target="_blank"><?=strgb2312($row1[shopname],0,17)?></a>
  <span class="s1">���룺</span>
  <span class="s2"><strong><?=$row1[sellmyue]?></strong></span>
  </li>
  </ul>
  <? $i++;}?>
    </div>
  
  <div class="dright">
  <? while1("*","yjcode_user where zt=1 and shopzt=2 and shopname<>'' and pm>0 order by pm asc limit 2");while($row1=mysql_fetch_array($res1)){?>
      <div class="d1">
   <ul class="u1">
   <li class="l1"><a href="shop/view<?=$row1[id]?>.html" target="_blank"><img width="110" height="110" src="<?=returntppd("upload/".$row1[id]."/shop.jpg","img/none60x60.gif")?>" /></a></li>
   <li class="l2">
   <a href="shop/view<?=$row1[id]?>.html" target="_blank" class="a1 yanse1"><?=strgb2312($row1[shopname],0,17)?></a><br>
   <img src="img/dj/<?=returnxytp($xy)?>" class="img1"/><br>
     <!--
	  <span class="s1"><a href="<?=$au?>" target="_blank"><?=strgb2312($row1[tit],0,44)?></a></span>
   <span class="s2"><?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></span>-->
      <a class="s3" href="">��Ӫ��<?=$row1[seokey]?></a>
   </li>
   </ul>
   </div>
   <? }?>
     <!-- <div class="d1">
   <ul class="u1">
   <li class="l1"><a href="shop/view57.html" target="_blank"><img width="110" height="110" src="img/none180x180.gif" /></a></li>
   <li class="l2">
   <a href="shop/view57.html" target="_blank" class="a1 yanse1">���ʰ��ֽ���</a><br>
   <img src="img/dj/s-star-1.gif" class="img1" title="����ֵ0" /><br>
      <a class="s3" href="">��Ӫ��</a>
   </li>
   </ul>
   </div>-->
   <? $i=1;while1("*","yjcode_user where zt=1 and shopzt=2 and shopname<>'' and pm>5 order by pm asc limit 3");while($row1=mysql_fetch_array($res1)){?>
         <div class="d2 d2<?=$i?>">
   <ul class="u1">
   <li class="l1"><a href="shop/view<?=$row1[id]?>.html" target="_blank"><img width="110" height="110" src="<?=returntppd("upload/".$row1[id]."/shop.jpg","img/none60x60.gif")?>" /></a></li>
   <li class="l2">
   <a href="shop/view<?=$row1[id]?>.html" target="_blank" class="a1 yanse1"><?=strgb2312($row1[shopname],0,17)?></a><br>
      </li>
   </ul>
   </div>
   <? $i++;}?>
     <!-- <div class="d2 d22">
   <ul class="u1">
   <li class="l1"><a href="shop/view88.html" target="_blank"><img width="110" height="110" src="img/none180x180.gif" /></a></li>
   <li class="l2">
   <a href="shop/view88.html" target="_blank" class="a1 yanse1">ģ���й�</a><br>
      </li>
   </ul>
   </div>
      <div class="d2 d23">
   <ul class="u1">
   <li class="l1"><a href="shop/view124.html" target="_blank"><img width="110" height="110" src="img/none180x180.gif" /></a></li>
   <li class="l2">
   <a href="shop/view124.html" target="_blank" class="a1 yanse1">555</a><br>
      </li>
   </ul>
   </div>-->
     </div>
  
 </div>
 <!--�Ƽ��̼�E-->

 <!--��Ʒ�б�B-->
  <ul class="typecap fontyh">
 <li class="l1">1F ��Ϸ�㿨</li>
 <li class="l2">
 <? while1("*","yjcode_type where admin=1 and id=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
	  <? while2("*","yjcode_type where type1='".$row1[type1]."' and admin=2 order by xh asc");while($row2=mysql_fetch_array($res2)){?>
  <a href="<?=weburl?>product/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html" target="_blank"><?=$row2[type2]?></a> / 
  <? }?>
			<? }?>
  </li>
 </ul>
 <div class="typem fontyh">
  <div class="dleft">
   <div class="d1">
   <?
 $i=1;
while1("*","yjcode_pro where zt=0 and iftj>0 and ty1id=1 order by yhsj2 asc limit 4");while($row1=mysql_fetch_array($res1)){
$money1=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]);
$au="product/view".$row1[id].".html";
$dqsj=str_replace("-","/",$row1[yhsj2]);
while2("*","yjcode_user where id=".$row1[userid]);$row2=mysql_fetch_array($res2);
?>
      <ul class="u1">
   <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd(returntp("bh='".$row1[bh]."'","-2"),"img/none200x200.gif")?>" width="40" height="40" /></a></li>
   <li class="l2"><a href="<?=$au?>" target="_blank" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,56)?></a><br><span class="s1"><?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></span><span class="s2">��:<?=$row1[xsnum]?>��</span></li>
   </ul>
   <? }?>
    
      <div class="ad"><a href=<?=weburl?>help/view8.html target=_blank><img border=0 src=ad/1449404487ad51.jpg width=240 height=230></a></div>
   </div>
  </div>
  
  <div class="dright">
  <?
 $i=1;
while1("*","yjcode_pro where zt=0 and ty1id=1 order by yhsj2 asc limit 10");while($row1=mysql_fetch_array($res1)){
$money1=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]);
$au="product/view".$row1[id].".html";
$dqsj=str_replace("-","/",$row1[yhsj2]);
while2("*","yjcode_user where id=".$row1[userid]);$row2=mysql_fetch_array($res2);
?>
      <div class="d1" onMouseOver="this.className='d1 d11';" onMouseOut="this.className='d1';">
   <ul class="u1">
   <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd(returntp("bh='".$row1[bh]."'","-2"),"img/none200x200.gif")?>" width="166" height="166" /></a></li>
   <li class="l2">
   <a href="<?=$au?>" class="a1" target="_blank" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,56)?></a>
   <span class="s1"><?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></span>
   <span class="s2"><?=$row1[xsnum]?>���ѹ�</span>
   </li>
   </ul>
   </div>
   <? }?>
     
     </div>
  
 </div>
  <ul class="typecap fontyh">
 <li class="l1">2F IDC��</li>
 <li class="l2">
 <? while1("*","yjcode_type where admin=1 and id=2 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
	  <? while2("*","yjcode_type where type1='".$row1[type1]."' and admin=2 order by xh asc");while($row2=mysql_fetch_array($res2)){?>
  <a href="<?=weburl?>product/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html" target="_blank"><?=$row2[type2]?></a> / 
   <? }?>
			<? }?>
  </li>
 </ul>
 <div class="typem fontyh">
  <div class="dleft">
   <div class="d1">
      <?
 $i=1;
while1("*","yjcode_pro where zt=0 and iftj>0 and ty1id=2 order by yhsj2 asc limit 4");while($row1=mysql_fetch_array($res1)){
$money1=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]);
$au="product/view".$row1[id].".html";
$dqsj=str_replace("-","/",$row1[yhsj2]);
while2("*","yjcode_user where id=".$row1[userid]);$row2=mysql_fetch_array($res2);
?>
      <ul class="u1">
   <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd(returntp("bh='".$row1[bh]."'","-2"),"img/none200x200.gif")?>" width="40" height="40" /></a></li>
   <li class="l2"><a href="<?=$au?>" target="_blank" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,56)?></a><br><span class="s1"><?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></span><span class="s2">��:<?=$row1[xsnum]?>��</span></li>
   </ul>
   <? }?>
      <div class="ad"><a href=<?=weburl?>help/view8.html target=_blank><img border=0 src=ad/1449405323ad58.jpg width=240 height=230></a></div>
   </div>
  </div>
  
  <div class="dright">
   <?
 $i=1;
while1("*","yjcode_pro where zt=0 and ty1id=2 order by yhsj2 asc limit 10");while($row1=mysql_fetch_array($res1)){
$money1=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]);
$au="product/view".$row1[id].".html";
$dqsj=str_replace("-","/",$row1[yhsj2]);
while2("*","yjcode_user where id=".$row1[userid]);$row2=mysql_fetch_array($res2);
?>
      <div class="d1" onMouseOver="this.className='d1 d11';" onMouseOut="this.className='d1';">
   <ul class="u1">
   <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd(returntp("bh='".$row1[bh]."'","-2"),"img/none200x200.gif")?>" width="166" height="166" /></a></li>
   <li class="l2">
   <a href="<?=$au?>" class="a1" target="_blank" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,56)?></a>
   <span class="s1"><?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></span>
   <span class="s2"><?=$row1[xsnum]?>���ѹ�</span>
   </li>
   </ul>
   </div>
   <? }?>
      
     </div>
  
 </div>
  <ul class="typecap fontyh">
 <li class="l1">3F Դ����</li>
 <li class="l2">
  <? while1("*","yjcode_type where admin=1 and id=5 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
	  <? while2("*","yjcode_type where type1='".$row1[type1]."' and admin=2 order by xh asc");while($row2=mysql_fetch_array($res2)){?>
  <a href="<?=weburl?>product/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html" target="_blank"><?=$row2[type2]?></a> / 
   <? }?>
			<? }?>
  </li>
 </ul>
 <div class="typem fontyh">
  <div class="dleft">
   <div class="d1">
        <?
 $i=1;
while1("*","yjcode_pro where zt=0 and iftj>0 and ty1id=5 order by yhsj2 asc limit 4");while($row1=mysql_fetch_array($res1)){
$money1=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]);
$au="product/view".$row1[id].".html";
$dqsj=str_replace("-","/",$row1[yhsj2]);
while2("*","yjcode_user where id=".$row1[userid]);$row2=mysql_fetch_array($res2);
?>
      <ul class="u1">
   <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd(returntp("bh='".$row1[bh]."'","-2"),"img/none200x200.gif")?>" width="40" height="40" /></a></li>
   <li class="l2"><a href="<?=$au?>" target="_blank" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,56)?></a><br><span class="s1"><?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></span><span class="s2">��:<?=$row1[xsnum]?>��</span></li>
   </ul>
   <? }?>
      <div class="ad"><a href=<?=weburl?>help/view8.html target=_blank><img border=0 src=ad/1449405519ad70.jpg width=240 height=230></a></div>
   </div>
  </div>
  
  <div class="dright">
      <div class="d1" onMouseOver="this.className='d1 d11';" onMouseOut="this.className='d1';">
   <?
 $i=1;
while1("*","yjcode_pro where zt=0 and ty1id=5 order by yhsj2 asc limit 10");while($row1=mysql_fetch_array($res1)){
$money1=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]);
$au="product/view".$row1[id].".html";
$dqsj=str_replace("-","/",$row1[yhsj2]);
while2("*","yjcode_user where id=".$row1[userid]);$row2=mysql_fetch_array($res2);
?>
      <div class="d1" onMouseOver="this.className='d1 d11';" onMouseOut="this.className='d1';">
   <ul class="u1">
   <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd(returntp("bh='".$row1[bh]."'","-2"),"img/none200x200.gif")?>" width="166" height="166" /></a></li>
   <li class="l2">
   <a href="<?=$au?>" class="a1" target="_blank" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,56)?></a>
   <span class="s1"><?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></span>
   <span class="s2"><?=$row1[xsnum]?>���ѹ�</span>
   </li>
   </ul>
   </div>
   <? }?>
     </div>
  
 </div>
  <ul class="typecap fontyh">
 <li class="l1">4F �����</li>
 <li class="l2">
 <? while1("*","yjcode_type where admin=1 and id=6 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
	  <? while2("*","yjcode_type where type1='".$row1[type1]."' and admin=2 order by xh asc");while($row2=mysql_fetch_array($res2)){?>
  <a href="<?=weburl?>product/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html" target="_blank"><?=$row2[type2]?></a> / 
   <? }?>
			<? }?>
  </li>
 </ul>
 <div class="typem fontyh">
  <div class="dleft">
   <div class="d1">
      <?
 $i=1;
while1("*","yjcode_pro where zt=0 and iftj>0 and ty1id=6 order by yhsj2 asc limit 4");while($row1=mysql_fetch_array($res1)){
$money1=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]);
$au="product/view".$row1[id].".html";
$dqsj=str_replace("-","/",$row1[yhsj2]);
while2("*","yjcode_user where id=".$row1[userid]);$row2=mysql_fetch_array($res2);
?>
      <ul class="u1">
   <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd(returntp("bh='".$row1[bh]."'","-2"),"img/none200x200.gif")?>" width="40" height="40" /></a></li>
   <li class="l2"><a href="<?=$au?>" target="_blank" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,56)?></a><br><span class="s1"><?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></span><span class="s2">��:<?=$row1[xsnum]?>��</span></li>
   </ul>
   <? }?>
      <div class="ad"><a href=<?=weburl?>help/view8.html target=_blank><img border=0 src=ad/1449405899ad7.jpg width=240 height=230></a></div>
   </div>
  </div>
  
  <div class="dright">
     <?
 $i=1;
while1("*","yjcode_pro where zt=0 and ty1id=6 order by yhsj2 asc limit 10");while($row1=mysql_fetch_array($res1)){
$money1=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]);
$au="product/view".$row1[id].".html";
$dqsj=str_replace("-","/",$row1[yhsj2]);
while2("*","yjcode_user where id=".$row1[userid]);$row2=mysql_fetch_array($res2);
?>
      <div class="d1" onMouseOver="this.className='d1 d11';" onMouseOut="this.className='d1';">
   <ul class="u1">
   <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd(returntp("bh='".$row1[bh]."'","-2"),"img/none200x200.gif")?>" width="166" height="166" /></a></li>
   <li class="l2">
   <a href="<?=$au?>" class="a1" target="_blank" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,56)?></a>
   <span class="s1"><?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></span>
   <span class="s2"><?=$row1[xsnum]?>���ѹ�</span>
   </li>
   </ul>
   </div>
   <? }?>
     </div>
  
 </div>
  <ul class="typecap fontyh">
 <li class="l1">5F ΢ʱ��</li>
 <li class="l2">
  <? while1("*","yjcode_type where admin=1 and id=7 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
	  <? while2("*","yjcode_type where type1='".$row1[type1]."' and admin=2 order by xh asc");while($row2=mysql_fetch_array($res2)){?>
  <a href="<?=weburl?>product/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html" target="_blank"><?=$row2[type2]?></a> / 
   <? }?>
			<? }?>
  </li>
 </ul>
 <div class="typem fontyh">
  <div class="dleft">
   <div class="d1">
       <?
 $i=1;
while1("*","yjcode_pro where zt=0 and iftj>0 and ty1id=7 order by yhsj2 asc limit 4");while($row1=mysql_fetch_array($res1)){
$money1=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]);
$au="product/view".$row1[id].".html";
$dqsj=str_replace("-","/",$row1[yhsj2]);
while2("*","yjcode_user where id=".$row1[userid]);$row2=mysql_fetch_array($res2);
?>
      <ul class="u1">
   <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd(returntp("bh='".$row1[bh]."'","-2"),"img/none200x200.gif")?>" width="40" height="40" /></a></li>
   <li class="l2"><a href="<?=$au?>" target="_blank" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,56)?></a><br><span class="s1"><?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></span><span class="s2">��:<?=$row1[xsnum]?>��</span></li>
   </ul>
   <? }?>
      <div class="ad"><a href=<?=weburl?>help/view8.html target=_blank><img border=0 src=ad/1449406020ad20.jpg width=240 height=230></a></div>
   </div>
  </div>
  
  <div class="dright">
      <?
 $i=1;
while1("*","yjcode_pro where zt=0 and ty1id=7 order by yhsj2 asc limit 10");while($row1=mysql_fetch_array($res1)){
$money1=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]);
$au="product/view".$row1[id].".html";
$dqsj=str_replace("-","/",$row1[yhsj2]);
while2("*","yjcode_user where id=".$row1[userid]);$row2=mysql_fetch_array($res2);
?>
      <div class="d1" onMouseOver="this.className='d1 d11';" onMouseOut="this.className='d1';">
   <ul class="u1">
   <li class="l1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?=returntppd(returntp("bh='".$row1[bh]."'","-2"),"img/none200x200.gif")?>" width="166" height="166" /></a></li>
   <li class="l2">
   <a href="<?=$au?>" class="a1" target="_blank" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,56)?></a>
   <span class="s1"><?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></span>
   <span class="s2"><?=$row1[xsnum]?>���ѹ�</span>
   </li>
   </ul>
   </div>
   <? }?>
     </div>
  
 </div>
  <!--��Ʒ�б�E-->
 

<!--����B-->
<div class="pl">

<div class="gdmain">
<ul class="u1"><li class="l1">��������</li><li class="l2"></li></ul>
<div class="igd" id="Marquee">
<!--������ʼ-->
<?
while1("*","yjcode_propj order by sj desc limit 30");while($row1=mysql_fetch_array($res1)){
while2("*","yjcode_pro where bh='".$row1[probh]."'");$row2=mysql_fetch_array($res2);
$au="product/view".$row2[id].".html";
?>
<div class="gd">
<table align="left" width="358">
<tr>
<td width="65" valign="middle"><a href="<?=$au?>" target="_blank"><img alt="<?=$row1[tit]?>" src="<?=returntp("bh='".$row2[bh]."' order by xh asc","-2")?>" width="58" height="58" class="tp" /></a></td>
<td width="293" style="line-height:20px;">
<span class="hui"><?=strgb2312($row2[tit],0,44)?><br><?=dateYMDHM($row1[sj])?></span><br><?=returntitdian($row1[txt],40)?>
</td>
</tr>
</table>
</div>
<? }?>
<script>
var Mar = document.getElementById("Marquee");
var child_div=Mar.getElementsByTagName("div")
var picH = 67;//�ƶ��߶�
var scrollstep=3;//�ƶ�����,Խ��Խ��
var scrolltime=20;//�ƶ�Ƶ��(����)Խ��Խ��
var stoptime=3000;//���ʱ��(����)
var tmpH = 0;
Mar.innerHTML += Mar.innerHTML;
function start(){
if(tmpH < picH){
tmpH += scrollstep;
if(tmpH > picH )tmpH = picH ;
Mar.scrollTop = tmpH;
setTimeout(start,scrolltime);
}else{
tmpH = 0;
Mar.appendChild(child_div[0]);
Mar.scrollTop = 0;
setTimeout(start,stoptime);
}
}
setTimeout(start,stoptime);
</script>
<!--��������-->
</div>
</div>

<? while1("*","yjcode_newstype where admin=1 order by xh asc limit 2");while($row1=mysql_fetch_array($res1)){?>
<ul class="u2">
<li class="l1"><?=$row1[name1]?></li><li class="l2"><a href="news/newslist_j<?=$row1[id]?>v.html" target="_blank">����</a></li>
<? while2("*","yjcode_news where type1id=".$row1[id]." and zt=0 order by lastsj desc limit 8");while($row2=mysql_fetch_array($res2)){?>
<li class="l3"><a href="news/txtlist_i<?=$row2[id]?>v.html" title="<?=$row2[tit]?>" target="_blank"><?=returntitcss(strgb2312($row2[tit],0,53),$row2[ifjc],$row2[titys])?></a></li>
<? }?>
</ul>
<? }?>
</div>
</div>
<!--����E-->

 <!--����B-->
 <div class="bolink">
 <ul class="u1">
 <li class="l1 fontyh"><?=webname?>�������</li>
 <li class="l2">
 <? while0("*","yjcode_ad where adbh='ADI13' order by xh asc");while($row=mysql_fetch_array($res)){?>
 <a href="<?=$row[aurl]?>" target="_blank"><img alt="<?=$row[tit]?>" border=0 src="gg/<?=$row[bh]?>.<?=$row[jpggif]?>" width="100" height="35"></a>
 <? }?>
 </li>
 </ul>
 <ul class="u1">
 <li class="l1 fontyh"><?=webname?>��������</li>
 <li class="l3">
 <? while0("*","yjcode_ad where adbh='ADI14' and type1='����' order by xh asc");while($row=mysql_fetch_array($res)){?>
 <a href="<?=$row[aurl]?>" target="_blank"><?=$row[tit]?></a>
 <? }?>
 </li>
 </ul>
 </div>
 <!--����E-->

</div>

<? include("tem/bottom.html");?>
</body>
</html>